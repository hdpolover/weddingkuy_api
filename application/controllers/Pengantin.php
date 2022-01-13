<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Pengantin extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengantin_model', 'pengantin');
    }

    public function index_get()
    {
        $pengantin = $this->pengantin->get_pengantin();

        if ($pengantin) {
            $this->response(['status' => true, 'message' => 'pengantin ditemukan', 'data' => $pengantin],  200);
        } else {
            $this->response(['status' => false, 'message' => 'pengantin tidak ditemukan'],  200);
        }
    }

    public function login_get()
    {
        $param = $this->get();

        $where = array(
            'id_pengantin' => $param['id_pengantin']
        );

        $data = $this->pengantin->login_pengantin($where);

        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Berhasil login.', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Username tidak ditemukan atau password salah. Silakan coba lagi.'], 200);
        }
    }
}
