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
		$data['title'] = 'Login | SIPERMA';
		$this->load->view('templates/auth_header',$data);
		$this->load->view('auth/login_view');
		$this->load->view('templates/auth_footer');
	}

	public function registration()
	{
		$this->form_validation->set_rules("name","Name","required|trim");
		$this->form_validation->set_rules("nip","NIP","required|trim|numeric");
		$this->form_validation->set_rules("jabatan","Jabatan","required|trim");
		$this->form_validation->set_rules("pangkat","Pangkat","required|trim");
		$this->form_validation->set_rules("tahun","Tahun","required|trim|numeric");
		$this->form_validation->set_rules("username","Username","required|trim|is_unique[users.username]");
		$this->form_validation->set_message('is_unique','The Username already used.');
		$this->form_validation->set_rules("password","Password","required|trim|min_length[8]|matches[password_confirmation]");
		$this->form_validation->set_message('matches','Password not match');
		$this->form_validation->set_message('min_length','Password too short');
		$this->form_validation->set_rules("password_confirmation","Password Confirmaation","required|trim|matches[password]");
		$this->form_validation->set_rules("level_akses_id","Level Akses","required|trim");
		$this->form_validation->set_rules("work_unit_id","Unit Kerja","required|trim");
		$this->form_validation->set_rules("ruangan_id","Ruangan","required|trim");


		if($this->form_validation->run() == false) {
			$data['title'] = 'Registration | SIPERMA';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/registration_view');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name'),true),
				'nip' => htmlspecialchars($this->input->post('nip'),true),
				'jabatan' => htmlspecialchars($this->input->post('jabatan'),true),
				'pangkat' => htmlspecialchars($this->input->post('pangkat'),true),
				'tahun' => htmlspecialchars($this->input->post('tahun'),true),
				'username' => htmlspecialchars($this->input->post('username'),true),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level_access_id' => htmlspecialchars($this->input->post('level_access_id'),true),
				'work_unit_id' => htmlspecialchars($this->input->post('work_unit_id'),true),
				'ruangan_id' => htmlspecialchars($this->input->post('ruangan_id'),true),
				'is_active' => 1,
				'created_at' => time()
			];
			$this->db->insert('users',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Akun berhasil terdaftar.</div>");
			redirect('auth/registration');
		}
	}
}
