<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengantin_model extends CI_Model
{
    public function tambah_pengantin($param)
    {
        return $this->db->insert('pengantin', $param);
    }

    public function login_pengantin($param)
    {
        return $this->db->where($param)->get('pengantin')->result();
    }

    public function get_pengantin()
    {
        $query = "select * from pengantin";
        return $this->db->query($query)->result_array();
    }
}
