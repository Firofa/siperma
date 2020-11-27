<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {
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
    
    public function pengaturanRuangan() {
        $this->form_validation->set_rules("ruangan","Ruangan","required|trim");
        if($this->form_validation->run() == false) {
            $data['title'] = "Admin Page | SIPERMA";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('username'));
            //Mengambil data ruangan
		    $this->load->model('ruangan_model','ruangan');
            $data['ruangan'] = $this->ruangan->GetDataRuangan();
            //Ambil data notifikasi permintaan barang
            $this->load->model('permintaan_model','permintaan');
            $data['notifikasiPermintaan'] = $this->permintaan->GetPermintaanPending();
            $data['notifikasiCount'] = count($data['notifikasiPermintaan']);
            //End Ambil data notifikasi permintaan barang
            $this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_navbar',$data);
			$this->load->view('admin/pengaturanRuangan/index',$data);
			$this->load->view('templates/admin_footer',$data);
        } else {
            $data = [
                'ruangan' => htmlspecialchars($this->input->post('ruangan'),true)
            ];
            $this->db->insert('ruangan',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Ruangan berhasil terdaftar.</div>");
			redirect('ruangan/pengaturanRuangan');
        }
    }

    public function editDataRuangan($id_ruangan) {
		$data['title'] = "Admin Page | SIPERMA";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		//Mengambil data ruangan yang di edit
		$this->load->model('ruangan_model','ruangan');
        $data['ruangan'] = $this->ruangan->GetEditDataRuangan($id_ruangan);
        //Ambil data notifikasi permintaan barang
		$this->load->model('permintaan_model','permintaan');
		$data['notifikasiPermintaan'] = $this->permintaan->GetPermintaanPending();
		$data['notifikasiCount'] = count($data['notifikasiPermintaan']);
		//End Ambil data notifikasi permintaan barang
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_navbar',$data);
		$this->load->view('admin/pengaturanRuangan/editRuangan',$data);
		$this->load->view('templates/admin_footer',$data);
    }
    
    public function doEditDataRuangan() {
        $id_ruangan = $_POST['id_ruangan'];
        $ruangan = $_POST['ruangan'];
        $data = [
			'id_ruangan' => $id_ruangan,
            'ruangan' => $ruangan
        ];
        $where = ['id_ruangan' => $id_ruangan];
        $this->load->model('ruangan_model','ruangan');
        $result = $this->ruangan->UpdateDataRuangan('ruangan',$data,$where);
        if($result >= 1) {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Ruangan Telah Diupdate!
            </div>');
            redirect('ruangan/pengaturanRuangan');
        } else {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Ruangan Gagal Diupdate
            </div>');
            redirect('ruangan/editDataRuangan/'.$id_ruangan);
        }
    }




}