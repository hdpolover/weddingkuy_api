<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{
    public function get_lokasi($id = null)
    {
        if ($id == null) {
            $query = "select * from lokasi_tempat";
            return $this->db->query($query)->result();
        } else {
            $query = "select * from lokasi_tempat where id_tempat = " . $id;
            return $this->db->query($query)->result();
        }
    }

    public function jenis($jenis)
    {
        $query = "select * from lokasi_tempat where jenis = '" . $jenis . "'";
            return $this->db->query($query)->result();
    }

    public function tambah_l($param)
    {
        return $this->db->insert('lokasi_tempat', $param);
    }
}
