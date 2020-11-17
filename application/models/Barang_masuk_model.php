<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk_model extends CI_Model {

    public function GetDataBarangMasuk() {
        $where = [
            'is_deleted' => "No"
        ];
        $data = $this->db->get_where('barang_masuk',$where);
        return $data->result_array();
    }
    public function GetEditDataBarangMasuk($id_barang_masuk) {
        $data = $this->db->query("SELECT * FROM `barang_masuk` 
                                WHERE `barang_masuk`.`id_barang_masuk` = ".$id_barang_masuk
                                );
        return $data->row_array();
    }

    public function UpdateDataBarangMasuk($tableName,$data,$where){
        $res = $this->db->Update($tableName,$data,$where);
        return $res;
    }

    public function DeleteData($tableName, $where) {
		$res = $this->db->Delete($tableName,$where);
		return $res;
    }
    
    public function GetDataBarangMasukById($id_barang_masuk){
        $data = $this->db->query("SELECT * FROM `barang_masuk` 
                                 WHERE `barang_masuk`.`id_barang_masuk` = ".$id_barang_masuk);
        return $data->row_array();
    }
}