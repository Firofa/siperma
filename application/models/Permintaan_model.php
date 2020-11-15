<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_model extends CI_Model {

    public function GetPermintaanByUser($id_user,$ruangan_id) {
        $data = $this->db->query("SELECT * FROM `permintaan_barang`
                                JOIN `users`
                                ON `permintaan_barang`.`user_id` = `users`.`id_users`
                                JOIN `barang_masuk`
                                ON `permintaan_barang`.`barang_id` = `barang_masuk`.`id_barang_masuk`
                                JOIN `ruangan`
                                ON  `ruangan`.`id_ruangan` = ".$ruangan_id."
                                WHERE `user_id` =".$id_user);
        return $data->result_array();
    }

    public function GetAllDataPermintaanDetail() {
        $data = $this->db->query("SELECT * FROM `permintaan_barang`
                                JOIN `users`
                                ON `permintaan_barang`.`user_id` = `users`.`id_users`
                                JOIN `barang_masuk`
                                ON `permintaan_barang`.`barang_id` = `barang_masuk`.`id_barang_masuk`
                                JOIN `ruangan`
                                ON `ruangan`.`id_ruangan` = `users`.`ruangan_id`
                                ");
        return $data->result_array();                        
    }
}
?>