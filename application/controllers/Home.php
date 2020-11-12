<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('level_access_id') == 1) {
			redirect('admin');
		} else if($this->session->userdata('level_access_id') == 2) {
			redirect('admin');
		} else  if($this->session->userdata('level_access_id') == 3) {
			redirect('user');
		} else {
		$this->load->view('home/home_view');
		}
	}
}
