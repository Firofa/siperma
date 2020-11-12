<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		//Cek jika bukan pengguna
		if($this->session->userdata('level_access_id') !== '3') {
			redirect();
		}
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$data['title'] = "User Page | SIPERMA";
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		$this->load->view('user/index',$data);
	}
}