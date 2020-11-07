<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();
		echo "Selamat Datang ".$data['user']['name'];
	}
}