<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_tamu_model extends CI_Model
{
    public function tambah_tamu($param)
    {
        return $this->db->insert('buku_tamu', $param);
    }

    public function riwayat($id)
    {
        $query = "SELECT bt.* FROM buku_tamu bt, pengantin p where p.id_pengantin = bt.id_pengantin and bt.id_pengantin = '" . $id . "'";
        return $this->db->query($query)->result_array();
    }

    public function data($id)
    {
        $query = "SELECT bt.* FROM buku_tamu bt, pengantin p where p.id_pengantin = bt.id_pengantin and bt.id_pengantin = '" . $id . "'";
        return $this->db->query($query)->result_array();
    }
}
