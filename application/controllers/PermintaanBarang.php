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
        $this->load->view('templates/admin_header',$data);
        $this->load->view('templates/admin_navbar',$data);
        $this->load->view('admin/pengaturanPermintaanBarang/index',$data);
        $this->load->view('templates/admin_footer',$data);
    }


}

?>