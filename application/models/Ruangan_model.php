<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_model extends CI_Model {
    
    public function GetDataRuangan() {
        $data = $this->db->get('ruangan');
        return $data->result_array();
    }

    public function GetEditDataRuangan($id_ruangan) {
        $data = $this->db->query("SELECT * FROM `ruangan` WHERE `ruangan`.`id_ruangan` = ".$id_ruangan);
        return $data->row_array();
    }

    public function UpdateDataRuangan($tableName,$data,$where){
        $res = $this->db->Update($tableName,$data,$where);
        return $res;
    }

    public function DeleteData($tableName, $where) {
		$res = $this->db->Delete($tableName,$where);
		return $res;
	}
}