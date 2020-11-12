<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_access_model extends CI_Model {
    
    public function GetDataLevel() {
        $data = $this->db->get('level_access');
        return $data->result_array();
    }

    public function GetDataLevelTwo() {
        $data = $this->db->query("SELECT *
                                  FROM `level_access`
                                  WHERE `id_level_access` != 1
                                  ");
        return $data->result_array();
    }

}