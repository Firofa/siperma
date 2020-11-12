<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_unit_model extends CI_Model {
    
    public function GetDataWorkUnit() {
        $data = $this->db->get('work_unit');
        return $data->result_array();
    }

    public function GetEditDataWorkUnit($id_work_unit){
        $data = $this->db->query("SELECT * FROM `work_unit` WHERE `work_unit`.`id_work_unit` = ".$id_work_unit);
        return $data->row_array();
    }

    public function UpdateDataWorkUnit($tableName,$data,$where) {
        $res = $this->db->Update($tableName,$data,$where);
        return $res;
    }
}