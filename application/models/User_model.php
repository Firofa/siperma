<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function GetUser($username) {
        $data = $this->db->get_where('users',[
			'username' => $username]);
        return $data->row_array();
    }

    public function GetDetailDataUsers() {
            $data = $this->db->query("SELECT * FROM `users` 
                                        JOIN `level_access` 
                                        ON `users`.`level_access_id` = `level_access`.`id_level_access` 
                                        JOIN `ruangan`
                                        ON `users`.`ruangan_id` = `ruangan`.`id_ruangan`
                                        JOIN `work_unit`
                                        ON `users`.`work_unit_id` = `work_unit`.`id_work_unit` 
                                        ");
            return $data->result_array();
    }

    public function GetDetailDataUsersTwo() {
        $data = $this->db->query("SELECT * FROM `users` 
                                    JOIN `level_access` 
                                    ON `users`.`level_access_id` = `level_access`.`id_level_access` 
                                    JOIN `ruangan`
                                    ON `users`.`ruangan_id` = `ruangan`.`id_ruangan`
                                    JOIN `work_unit`
                                    ON `users`.`work_unit_id` = `work_unit`.`id_work_unit` 
                                    WHERE `users`.`level_access_id` != 1");
        return $data->result_array();
}

    public function GetDetailUser($id_user) {
        $data = $this->db->query("SELECT * FROM `users` 
                                        JOIN `level_access` 
                                        ON `users`.`level_access_id` = `level_access`.`id_level_access` 
                                        JOIN `ruangan`
                                        ON `users`.`ruangan_id` = `ruangan`.`id_ruangan`
                                        JOIN `work_unit`
                                        ON `users`.`work_unit_id` = `work_unit`.`id_work_unit`
                                        WHERE `users`.`id_users` = ".$id_user 
                                        );
        return $data->row_array();
    }

    public function UpdateDataUser($tableName, $data, $where) {
        $res = $this->db->Update($tableName,$data,$where);
        return $res;
    }

    public function GetDetailDataUsersByName($name) {
        $data = $this->db->query("SELECT * FROM `users` 
                                    JOIN `level_access` 
                                    ON `users`.`level_access_id` = `level_access`.`id_level_access` 
                                    JOIN `ruangan`
                                    ON `users`.`ruangan_id` = `ruangan`.`id_ruangan`
                                    JOIN `work_unit`
                                    ON `users`.`work_unit_id` = `work_unit`.`id_work_unit` 
                                    WHERE `users`.`name` = ".$name);
        return $data->row_array();
    }
}