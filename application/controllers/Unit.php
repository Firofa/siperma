<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
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

    public function index() {
        $this->form_validation->set_rules("work_unit","Unit Kerja","required|trim");
        $this->form_validation->set_rules("kode_satker","Kode Satuan Kerja","required|trim");
        $this->form_validation->set_rules("alamat","Alamat","required|trim");
        $this->form_validation->set_rules("no_telp","Nomor Telepon","required|trim|numeric");
        $this->form_validation->set_rules("ketua","Ketua","required|trim");
        $this->form_validation->set_rules("wakil_ketua","Wakil Ketua","required|trim");
        $this->form_validation->set_rules("sekretaris","Sekretaris","required|trim");
        $this->form_validation->set_rules("pj_barang_persediaan","PJ Barang Persediaan","required|trim");
        if($this->form_validation->run() == false) {
            $data['title'] = "Admin Page | SIPERMA";
            //Ambil data user
            $this->load->model('User_model','user');
            $data['user'] = $this->user->GetUser($this->session->userdata('username'));
            //Mengambil data work unit
		    $this->load->model('work_unit_model','work_unit');
            $data['unit'] = $this->work_unit->GetDataWorkUnit();
            //Ambil data notifikasi permintaan barang
            $this->load->model('permintaan_model','permintaan');
            $data['notifikasiPermintaan'] = $this->permintaan->GetPermintaanPending();
            $data['notifikasiCount'] = count($data['notifikasiPermintaan']);
            //End Ambil data notifikasi permintaan barang
            $this->load->view('templates/admin_header',$data);
			$this->load->view('templates/admin_navbar',$data);
			$this->load->view('admin/pengaturanUnit/index',$data);
			$this->load->view('templates/admin_footer',$data);
        } else {
            $data = [
                'work_unit' => htmlspecialchars($this->input->post('work_unit'),true),
                'kode_satker' => htmlspecialchars($this->input->post('kode_satker'),true),
                'alamat' => htmlspecialchars($this->input->post('alamat'),true),
                'no_telp' => htmlspecialchars($this->input->post('no_telp'),true),
                'ketua' => htmlspecialchars($this->input->post('ketua'),true),
                'wakil_ketua' => htmlspecialchars($this->input->post('wakil_ketua'),true),
                'sekretaris' => htmlspecialchars($this->input->post('sekretaris'),true),
                'pj_barang_persediaan' => htmlspecialchars($this->input->post('pj_barang_persediaan'),true),
                'logo_kantor' => 'logo.jpg'
            ];
            //Cek gambar
            $upload_image = $_FILES['logo_kantor'];
			if($upload_image == '') {
                $upload_image = 'logo.jpg';
				$data['logo_kantor'] = $upload_image;
			} else {
                $config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/logo/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('logo_kantor')) {
                    $new_image = $this->upload->data('file_name');
					$data['logo_kantor'] = $new_image;
				} else {
					echo $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>'); 
				}
			}
            $this->db->insert('work_unit',$data);
			$this->session->set_flashdata("message","<div class='alert alert-success' role='alert'>Unit berhasil terdaftar.</div>");
			redirect('unit');
        }
    }

    public function editDataUnit($id_work_unit) {
		$data['title'] = "Admin Page | SIPERMA";
		//Ambil data user login
		$this->load->model('User_model','user');
		$data['user'] = $this->user->GetUser($this->session->userdata('username'));
		//Mengambil data work unit yang di edit
		$this->load->model('work_unit_model','unit');
        $data['unit'] = $this->unit->GetEditDataWorkUnit($id_work_unit);
        //Ambil data notifikasi permintaan barang
		$this->load->model('permintaan_model','permintaan');
		$data['notifikasiPermintaan'] = $this->permintaan->GetPermintaanPending();
		$data['notifikasiCount'] = count($data['notifikasiPermintaan']);
		//End Ambil data notifikasi permintaan barang
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/admin_navbar',$data);
		$this->load->view('admin/pengaturanUnit/editUnit',$data);
		$this->load->view('templates/admin_footer',$data);
    }
    
    public function doEditDataUnit() {
        $id_work_unit = $_POST['id_work_unit'];
        $work_unit = $_POST['work_unit'];
        $kode_satker = $_POST['kode_satker'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $ketua = $_POST['ketua'];
        $wakil_ketua = $_POST['wakil_ketua'];
        $sekretaris = $_POST['sekretaris'];
        $pj_barang_persediaan = $_POST['pj_barang_persediaan'];
        $upload_image = $_FILES['logo_kantor']['name'];
        $this->load->model('work_unit_model','unit');
        //Cek Image Masuk
        $data['unit_kerja'] = $this->unit->GetEditDataWorkUnit($id_work_unit);
        if($upload_image) 
        {
            $config['upload_path'] = './assets/img/logo/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('logo_kantor')) {
                $old_image = $data['unit_kerja']['logo_kantor'];
                if($old_image != 'logo.jpg') {
                    unlink(FCPATH . 'assets/img/logo/'.$old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('logo_kantor',$new_image);
            } else {
                echo $this->upload->display_errors();
            }
        } 
        
        $data = [
            'work_unit' => $work_unit,
            'kode_satker' => $kode_satker,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'ketua' => $ketua,
            'wakil_ketua' => $wakil_ketua,
            'sekretaris' => $sekretaris,
            'pj_barang_persediaan' => $pj_barang_persediaan,
        ];
        $where = ['id_work_unit' => $id_work_unit];
        $result = $this->unit->UpdateDataWorkUnit('work_unit',$data,$where);
        if($result >= 1) {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Unit Kerja Telah Diupdate!
            </div>');
            redirect('unit');
        } else {
            $this->session->set_flashdata('message', 
            '<div class="alert alert-dismissible alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      Data Unit Kerja Gagal Diupdate
            </div>');
            redirect('unit/editUnit/'.$id_ruangan);
        }
    }

}

?>