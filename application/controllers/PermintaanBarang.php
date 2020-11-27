<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanBarang extends CI_Controller {
    
    public function __construct() 
	{
		parent::__construct();
		//Cek jika bukan admin
		$role = $this->session->userdata('level_access_id');
		if($role !== "1" && $role !== "2") {
			redirect();
        }
        $this->load->library('form_validation'); 
    }
    
    public function index()
    {  
        $data['title'] = "Admin Page | SIPERMA";
        //Ambil data user
        $this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('username'));
        //Mengambil data work unit
        $this->load->model('permintaan_model','permintaan');
        $data['permintaan'] = $this->permintaan->GetAllDataPermintaanDetail();
        //Ambil data notifikasi permintaan barang
		$data['notifikasiPermintaan'] = $this->permintaan->GetPermintaanPending();
		$data['notifikasiCount'] = count($data['notifikasiPermintaan']);
		//End Ambil data notifikasi permintaan barang
        $this->load->view('templates/admin_header',$data);
        $this->load->view('templates/admin_navbar',$data);
        $this->load->view('admin/pengaturanPermintaanBarang/index',$data);
        $this->load->view('templates/admin_footer',$data);
    }

    public function validasi($id_permintaan_barang) {
        $this->load->model('permintaan_model','permintaan');
        //Cek barang yang diminta cukup atau tidak
        $dataPermintaan = $this->permintaan->getDataPermintaanJoinBarang($id_permintaan_barang);
        if(intval($dataPermintaan['jumlah_permintaan']) > intval($dataPermintaan['jumlah_barang_masuk'])) 
        {
            $this->session->set_flashdata("message","<div class='alert alert-danger' role='alert'>Permintaan Barang Gagal Di Validasi Karena Barang tidak mencukupi.</div>");
            redirect('PermintaanBarang');
        } else {
            //Mengurangi Barang Masuk Karena Telah Diminta
            $dataBarangMasukBaru = intval($dataPermintaan['jumlah_barang_masuk']) - intval($dataPermintaan['jumlah_permintaan']);
            $update_barang_masuk = [
                'jumlah_barang_masuk' => $dataBarangMasukBaru
            ];
            $this->db->update('barang_masuk',$update_barang_masuk,"id_barang_masuk = ".$dataPermintaan['id_barang_masuk']);   
            //Ubah status menjadi Disetujui Karena Telah divalidasi
            $data = [
                'status_permintaan' => 'Disetujui'
            ];
            $this->db->update('permintaan_barang',$data,"id_permintaan_barang = ".$id_permintaan_barang);
            $this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Permintaan Barang Divalidasi.</div>");
            redirect('PermintaanBarang');
        }
    }

    public function tolak($id_permintaan_barang) {
        $this->load->model('permintaan_model','permintaan');
        $data = [
            'status_permintaan' => 'Ditolak'
        ];
        $this->db->update('permintaan_barang',$data,"id_permintaan_barang = ".$id_permintaan_barang);
        $this->session->set_flashdata("message","<div class='alert alert-danger' role='alert'>Permintaan Barang Ditolak.</div>");
        redirect('PermintaanBarang');

    }

    public function cetak($id_permintaan_barang) {
        //Ambil Data Admin
        $this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('username'));
        //Ambil Data Laporan
        $this->load->model('permintaan_model','permintaan');
        $data['permintaan'] = $this->permintaan->GetDataBuktiCetakPermintaan($id_permintaan_barang);
        $this->load->view('admin/pengaturanPermintaanBarang/cetak',$data);
    }

    public function hapus($id_permintaan_barang) {
        $this->db->delete('permintaan_barang', array('id_permintaan_barang' => $id_permintaan_barang));
        $this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Permintaan Barang Berhasil Dihapus.</div>");
        redirect('PermintaanBarang');

    }


}

?>