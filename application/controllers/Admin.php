<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Admin extends RestController
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('admin_model', 'admin');
        $this->load->model('pengantin_model', 'pengantin');
    }

    public function index_get()
    {
        $id = $this->get('id_admin');

        if ($id === NULL) {
            $admin = $this->admin->get_admin();
        } else {
            $admin = $this->admin->get_admin($id);
        }

        if ($admin) {
            $this->response(['status' => true, 'message' => 'Admin ditemukan', 'data' => $admin],  200);
        } else {
            $this->response(['status' => false, 'message' => 'Admin tidak ditemukan'],  200);
        }
    }

    public function login_get()
    {
        $param = $this->get();

        $where = array(
            'username' => $param['username'],
            'password' => $param['password']
        );

        $data = $this->admin->login_admin($where);

        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Berhasil login.', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Username tidak ditemukan atau password salah. Silakan coba lagi.'], 200);
        }
    }

    public function rand_string($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

    public function tambah_admin_post()
    {
        $param = $this->post();

        $data = [
            'username' => $param['username'],
            'password' => $param['password']
        ];

        $res = $this->admin->tambah_admin($data);

        if ($res > 0) {
            $this->response(['status' => true, 'message' => 'Admin berhasil ditambahkan'],  200);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal menambahkan admin'],  200);
        }
    }

    public function tambah_pengantin_post()
    {
        $param = $this->post();

        $id = $this->rand_string(8);

        $data = [
            'nama' => $param['nama'],
            'id_pengantin' => $id
        ];

        $res = $this->pengantin->tambah_pengantin($data);

        if ($res > 0) {
            $this->response(['status' => true, 'message' => 'Pengantin berhasil ditambahkan'],  200);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal menambahkan pengantin'],  200);
        }
    }
}
