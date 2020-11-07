<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('auth/login_view');
		$this->load->view('templates/auth_footer');
	}

	public function registration()
	{
		$this->load->view('templates/auth_header');
		$this->load->view('auth/registration_view');
		$this->load->view('templates/auth_footer');
	}
}
