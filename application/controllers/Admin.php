<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			$this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_navbar',$data);
			$this->load->view('admin/index',$data);
			$this->load->view('templates/admin_footer',$data);
	}

	public function pengaturanPegawai() {
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
		$data['title'] = "Admin Page | SIPERMA";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		//Ambil Seluruh data pengguna
		if($this->session->userdata('level_access_id') == "1") 
		{ 
			//Mengambil data user termasuk super admin (khusus super admin)
			$data['pengguna'] = $this->user->getDetailDataUsers();
		} else {
			//Mengambil data user hanya Admin Barang dan Pegawai
			$data['pengguna'] = $this->user->getDetailDataUsersTwo();
		}
		//Mengambil data level akses
		$this->load->model('Level_access_model','level_akses');
		if($this->session->userdata('level_access_id') == "1") 
		{
			//Mengambil level akses termasuk super admin
			$data['level_akses'] = $this->level_akses->GetDataLevel();
		} else {
			//Mengambil level akses tidak termasuk super admin
			$data['level_akses'] = $this->level_akses->GetDataLevelTwo();
		}
		//Mengambil data ruangan
		$this->load->model('ruangan_model','ruangan');
		$data['ruangan'] = $this->ruangan->GetDataRuangan();
		//Mengambil data work unit
		$this->load->model('work_unit_model','work_unit');
		$data['work_unit'] = $this->work_unit->GetDataWorkUnit();
			$this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_navbar',$data);
			$this->load->view('admin/pengaturanPegawai/index',$data);
			$this->load->view('templates/admin_footer',$data);
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name'),true),
				'nip' => htmlspecialchars($this->input->post('nip'),true),
				'jabatan' => htmlspecialchars($this->input->post('jabatan'),true),
				'pangkat' => htmlspecialchars($this->input->post('pangkat'),true),
				'tahun' => htmlspecialchars($this->input->post('tahun'),true),
				'username' => htmlspecialchars($this->input->post('username'),true),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level_access_id' => htmlspecialchars($this->input->post('level_akses_id'),true),
				'work_unit_id' => htmlspecialchars($this->input->post('work_unit_id'),true),
				'ruangan_id' => htmlspecialchars($this->input->post('ruangan_id'),true),
				'is_active' => 1,
				'created_at' => time()
			];
			$this->db->insert('users',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Akun berhasil terdaftar.</div>");
			redirect('admin/pengaturanPegawai');
		}
	}

	public function editDataUser($id_user) {
		$data['title'] = "Admin Page | SIPERMA";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		//Mengambil data level akses
		$this->load->model('Level_access_model','level_akses');
		$data['level_akses'] = $this->level_akses->GetDataLevel();
		//Mengambil data ruangan
		$this->load->model('ruangan_model','ruangan');
		$data['ruangan'] = $this->ruangan->GetDataRuangan();
		//Mengambil data work unit
		$this->load->model('work_unit_model','work_unit');
		$data['work_unit'] = $this->work_unit->GetDataWorkUnit();
		// Ambil data user yang akan di edit
		$data['edit_user'] = $this->user->GetDetailUser($id_user);
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_navbar',$data);
		$this->load->view('admin/pengaturanPegawai/editPegawai',$data);
		$this->load->view('templates/admin_footer',$data);
	}

	public function doEditDataUser() {
		$id_users = $_POST['id_users'];
		$name = $_POST['name'];
		$nip = $_POST['nip'];
		$jabatan = $_POST['jabatan'];
		$pangkat = $_POST['pangkat'];
		$tahun = $_POST['tahun'];
		$work_unit_id = $_POST['work_unit_id'];
		$ruangan_id = $_POST['ruangan_id'];

		$data = [
			'name' => $name,
			'nip' => $nip,
			'jabatan' => $jabatan,
			'pangkat' => $pangkat,
			'tahun' => $tahun,
			'work_unit_id' => $work_unit_id,
			'ruangan_id' => $ruangan_id,
			'updated_at' => time()
		];
		$where = ['id_users' => $id_users];
		$this->load->model('user_model','user');
		$result = $this->user->UpdateDataUser('users',$data,$where);
		if($result >= 1) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-success">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data User Telah Diupdate!
				</div>');
				redirect('admin/pengaturanPegawai');
			} else {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Data User Gagal Diupdate
				</div>');
				redirect('admin/editDataUser/'.$id_users);
			}
	}

	public function pengaturanHakAkses() {
		$this->form_validation->set_rules("name","Name","required|trim");
		$this->form_validation->set_rules("nip","NIP","required|trim|numeric");
		$this->form_validation->set_rules("jabatan","Jabatan","required|trim");
		$this->form_validation->set_rules("level_akses_id","Level Akses","required|trim");
		$this->form_validation->set_rules("is_active","Level Akses","required|trim");

		if($this->form_validation->run() == false) {
		$data['title'] = "Admin Page | SIPERMA";
		//Ambil data user
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		//Ambil Seluruh data pengguna
		$data['pengguna'] = $this->user->getDetailDataUsers();
			$this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_navbar',$data);
			$this->load->view('admin/pengaturanHakAkses/index',$data);
			$this->load->view('templates/admin_footer',$data);
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name'),true),
				'nip' => htmlspecialchars($this->input->post('nip'),true),
				'jabatan' => htmlspecialchars($this->input->post('jabatan'),true),
				'pangkat' => htmlspecialchars($this->input->post('pangkat'),true),
				'tahun' => htmlspecialchars($this->input->post('tahun'),true),
				'username' => htmlspecialchars($this->input->post('username'),true),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level_access_id' => htmlspecialchars($this->input->post('level_akses_id'),true),
				'work_unit_id' => htmlspecialchars($this->input->post('work_unit_id'),true),
				'ruangan_id' => htmlspecialchars($this->input->post('ruangan_id'),true),
				'is_active' => 1,
				'created_at' => time()
			];
			$this->db->insert('users',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Akun berhasil terdaftar.</div>");
			redirect('admin/pengaturanPegawai');
		}
	}
}