<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_unit_model extends CI_Model {
    
    public function GetDataWorkUnit() {
        $data = $this->db->get('work_unit');
        return $data->result_array();
    }

}