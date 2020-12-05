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
				'created_at' => time()
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

	public function changepassword() {
		$data['title'] = "Change Password";
		$data['user'] = $this->db->get_where('users', [
			'username' => $this->session->userdata('username')])->row_array();
		$data['user']['menu'] = "ubah_password";
		
		$this->form_validation->set_rules('currentPassword','Current password','required|trim');
		$this->form_validation->set_rules('new_password1', 'New password', 'required|trim|min_length[8]|matches[new_password2]' , [
					'matches' => 'Password dont match!',
					'min_length' => 'Password too short!',
			]);
		$this->form_validation->set_rules('new_password2', 'Confirm new password', 'required|trim|matches[new_password1]');

		if ($this->form_validation->run() == false) {
		$this->load->view('templates/user_header',$data);
		$this->load->view('templates/user_navbar',$data);
		$this->load->view('user/ubahpassword',$data);
		$this->load->view('templates/user_footer');
		
		} else {

		$currentPassword = $this->input->post('currentPassword');
		$newPassword = $this->input->post('new_password1');
		if(!password_verify($currentPassword, $data['user']['password'])) {
			$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						<strong>Oops!</strong> Password Lama Salah!
				</div>');
			redirect('user/changepassword');
		} else {
			if($currentPassword	== $newPassword) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-warning">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						<strong>Oops!</strong> Password Lama Dan Baru Tidak Boleh Sama!
				</div>');
				redirect('user/changepassword');
			} else {
				$password_hash = password_hash($newPassword,PASSWORD_DEFAULT);
				$this->db->set('password',$password_hash);
				$this->db->where('username',$this->session->userdata('username'));
				$this->db->update('users');

				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-success">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						<strong>Well Done!</strong> Password Berhasil Diubah!
				</div>');
			redirect('user/changepassword');
			}
		}

		}
	}

	public function lihatStokBarang() {
		$data['title'] = "Lihat Stok Barang Page | SIPERMA";
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		$data['user']['menu'] = "lihatStokBarang";
		//Ambil data Permintaan by User
		$this->load->model('Barang_masuk_model','barang_masuk');
		$data['barang'] = $this->barang_masuk->GetDataBarangMasuk();
		//load view
		$this->load->view('templates/user_header',$data);
		$this->load->view('templates/user_navbar',$data);
		$this->load->view('user/lihatStokBarang',$data);
		$this->load->view('templates/user_footer');
	}
	
}