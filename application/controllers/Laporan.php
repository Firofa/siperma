<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
    
    public function index() {
        $data['title'] = "Admin Page | SIPERMA";
        //Ambil data user
        $this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('username'));
        //Mengambil data work unit
        $this->load->model('barang_masuk_model','barang_masuk');
        $data['barang_masuk'] = $this->barang_masuk->GetDataBarangMasuk();
        //Ambil data notifikasi permintaan barang
		$this->load->model('permintaan_model','permintaan');
		$data['notifikasiPermintaan'] = $this->permintaan->GetPermintaanPending();
		$data['notifikasiCount'] = count($data['notifikasiPermintaan']);
		//End Ambil data notifikasi permintaan barang
		$this->load->view('admin/laporan/laporanBarangMasuk',$data);
    }

    public function barangKeluar() {
        $data['title'] = "Admin Page | SIPERMA";
        //Ambil data user
        $this->load->model('User_model','user');
        $data['user'] = $this->user->GetUser($this->session->userdata('username'));
        //Mengambil data work unit
        $this->load->model('permintaan_model','permintaan');
        $data['permintaan'] = $this->permintaan->GetAllDataPermintaanDetailValidateOnly();
        //Ambil data notifikasi permintaan barang
		$this->load->model('permintaan_model','permintaan');
		$data['notifikasiPermintaan'] = $this->permintaan->GetPermintaanPending();
		$data['notifikasiCount'] = count($data['notifikasiPermintaan']);
		//End Ambil data notifikasi permintaan barang
        $this->load->view('admin/laporan/laporanBarangKeluar',$data);
    }

}

?>