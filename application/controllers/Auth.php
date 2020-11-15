<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->_goToDefaultPage();
		$this->form_validation->set_rules("username","Username","required|trim");
		$this->form_validation->set_rules("password","Password","required|trim");
		$this->form_validation->set_rules("tahun","Tahun","required|trim");

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login | SIPERMA';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login_view');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login() 
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$tahun = $this->input->post('tahun');

		$user = $this->db->get_where('users', ['username'=>$username])->row_array();
		
		//Jika user tidak null / Ada
		if($user)
		{
			//Jika user aktif
			if($user['is_active'] == 1)
			{
				//Cek Password
				if(password_verify($password, $user['password'])) 
				{
					//Cek tahun
					if($tahun == $user['tahun'])
					{
						$data =[
							'id_users'				=> $user['id_users'],
							'username' 				=> $user['username'],
							'level_access_id'		=> $user['level_access_id'] 
						];
						$this->session->set_userdata($data);
						//Cek Level Akses
						if($user['level_access_id'] == 1) 
						{
								redirect('admin');
						} else {
								redirect('user');
						}
					} else {
						$this->session->set_flashdata("message","<div class='alert alert-danger' role='alert'>Wrong Year!</div>");
						redirect('auth');	
					}
				} else {
					$this->session->set_flashdata("message","<div class='alert alert-danger' role='alert'>Wrong Password.</div>");
					redirect('auth');	
				}
			} else {
				$this->session->set_flashdata("message","<div class='alert alert-danger' role='alert'>Akun anda diblokir.</div>");
				redirect('auth');	
			}
		} else {
			$this->session->set_flashdata("message","<div class='alert alert-danger' role='alert'>Username tidak terdaftar.</div>");
			redirect('auth');
		}
				
	}

	private function _goToDefaultPage() {
		//Mengembalikan User sesuai level akses
		if($this->session->userdata('level_access_id')  == 1) {
			redirect('admin');
		} else if($this->session->userdata('level_access_id')  == 2) {
			redirect('admin');
		} else if($this->session->userdata('level_access_id')  == 3) {
			redirect('user');
		}
	}

	public function logout() 
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level_access_id');
		$this->session->set_flashdata('message',"<div class='alert alert-success' role='alert'>You have been logged out.</div>");
		redirect('auth');
	}
}
