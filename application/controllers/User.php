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
		$data['user']['menu'] = "home";
		$this->load->view('templates/user_header',$data);
		$this->load->view('templates/user_navbar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('templates/user_footer');
	}
	
	public function permintaanBarang()
	{
		$data['title'] = "Form Permintaan Barang | SIPERMA";
		//Load model yang diperlukan
		$this->load->model('User_model','user');
		$this->load->model('Barang_masuk_model','barang');
		//Mengambil data user
		$data['user'] = $this->user->GetDetailUser($this->session->userdata('id_users'));
		//cek menu
		$data['user']['menu'] = "permintaan_barang";
		//Ambil data barang
		$data['barang'] = $this->barang->GetDataBarangMasuk();
		//load view
		$this->load->view('templates/user_header',$data);
		$this->load->view('templates/user_navbar',$data);
		$this->load->view('user/permintaanBarang',$data);
	}

	public function tambahPermintaanBarang() {
		$a = $this->input->post('hidden_barang_id');
		for($count = 0; $count<count($a); $count++) {
			$data = array(
				'user_id' => $this->input->post('id_users'),
				'barang_id' => $a[$count],
				'periode_permintaan' => $this->input->post('periode_permintaan'),
				'jumlah_permintaan' => $_POST['hidden_jumlah_permintaan'][$count],
				'created_at' => time(),
				'status_permintaan' => 'Pending'
			);
		$this->db->insert('permintaan_barang',$data);

		}
	}

	public function lihatPermintaan() {
		$data['title'] = "Lihat Permintaan Page | SIPERMA";
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		$data['user']['menu'] = "lihatPermintaan";
		//Ambil data Permintaan by User
		$this->load->model('Permintaan_model','permintaan');
		$data['permintaan'] = $this->permintaan->GetPermintaanByUser($this->session->userdata('id_users'),$data['user']['ruangan_id']);
		//load view
		$this->load->view('templates/user_header',$data);
		$this->load->view('templates/user_navbar',$data);
		$this->load->view('user/lihatPermintaan',$data);
		$this->load->view('templates/user_footer');
	}
}