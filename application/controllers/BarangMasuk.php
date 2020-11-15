<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMasuk extends CI_Controller {

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
        $this->form_validation->set_rules("nama_barang_masuk","Unit Kerja","required|trim");
        $this->form_validation->set_rules("jumlah_barang_masuk","Kode Satuan Kerja","required|trim|numeric");
        $this->form_validation->set_rules("harga_satuan_barang","Alamat","required|trim|numeric");
        $this->form_validation->set_rules("total_harga","Nomor Telepon","required|trim|numeric");
        $this->form_validation->set_rules("nota_barang_masuk","Nota Barang Masuk","required|trim");

        if($this->form_validation->run() == false) {
            $data['title'] = "Admin Page | SIPERMA";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('username'));
            //Mengambil data work unit
		    $this->load->model('barang_masuk_model','barang_masuk');
		    $data['barang_masuk'] = $this->barang_masuk->GetDataBarangMasuk();
            $this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_navbar',$data);
			$this->load->view('admin/pengaturanBarangMasuk/index',$data);
			$this->load->view('templates/admin_footer',$data);
        } else {
            $data = [
                'nama_barang_masuk' => htmlspecialchars($this->input->post('nama_barang_masuk'),true),
                'jumlah_barang_masuk' => htmlspecialchars($this->input->post('jumlah_barang_masuk'),true),
                'harga_satuan_barang' => htmlspecialchars($this->input->post('harga_satuan_barang'),true),
                'total_harga' => htmlspecialchars($this->input->post('total_harga'),true),
                'nota_barang_masuk' =>htmlspecialchars($this->input->post('nota_barang_masuk'),true),
                'created_at' => time(),
                'updated_at' => time()
            ];
            
            $this->db->insert('barang_masuk',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Barang Masuk berhasil terdaftar.</div>");
			redirect('BarangMasuk');
        }
    }

    public function editDataBarang($id_barang_masuk) {
		$data['title'] = "Admin Page | SIPERMA";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		//Mengambil data ruangan yang di edit
		$this->load->model('barang_masuk_model','barang_masuk');
		$data['barang_masuk'] = $this->barang_masuk->GetEditDataBarangMasuk($id_barang_masuk);
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_navbar',$data);
		$this->load->view('admin/pengaturanBarangMasuk/editBarangMasuk',$data);
		$this->load->view('templates/admin_footer',$data);
    }
    
    public function doEditDataBarang() {
        $id_barang_masuk = $_POST['id_barang_masuk'];
        $data = [
			    'nama_barang_masuk' => htmlspecialchars($this->input->post('nama_barang_masuk'),true),
                'jumlah_barang_masuk' => htmlspecialchars($this->input->post('jumlah_barang_masuk'),true),
                'harga_satuan_barang' => htmlspecialchars($this->input->post('harga_satuan_barang'),true),
                'total_harga' => htmlspecialchars($this->input->post('total_harga'),true),
                'nota_barang_masuk' =>htmlspecialchars($this->input->post('nota_barang_masuk'),true),
                'updated_at' => time()
        ];
        $where = ['id_barang_masuk' => $id_barang_masuk];
        $this->load->model('barang_masuk_model','barang_masuk');
        $result = $this->barang_masuk->UpdateDataBarangMasuk('barang_masuk',$data,$where);
        if($result >= 1) {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Barang Masuk Telah Diupdate!
            </div>');
            redirect('barangmasuk');
        } else {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Barang Masuk Gagal Diupdate
            </div>');
            redirect('BarangMasuk/editDataBarangMasuk/'.$id_barang_masuk);
        }
    }

            public function hapusDataBarang($id) {
                $where = array('id_barang_masuk' => $id);
                $this->load->model('barang_masuk_model');
            $res = $this->barang_masuk_model->DeleteData('barang_masuk',$where);
            if($res >= 1) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-success">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Barang Berhasil Dihapus!
				</div>');
				redirect('barangmasuk');
			} else {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-dismissible alert-danger">
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
  						Barang Gagal Dihapus!
				</div>');
				redirect('barangmasuk');
			}

	}
    


}