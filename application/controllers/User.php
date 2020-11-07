<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['title'] = "User Page | SIPERMA";
		$data['user'] = $this->db->get_where('users',[
			'username' => $this->session->userdata('username')])->row_array();
		$this->load->view('user/index',$data);
	}
}