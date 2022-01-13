<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Lokasi extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('lokasi_model', 'lokasi');
    }

    public function tambah_post()
    {
        $param = $this->post();

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $newPath = './assets/lokasi/';

            if (!is_dir($newPath)) {
                mkdir($newPath, 0777, TRUE);
            }

            $config['upload_path'] = $newPath;
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = '3000';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $data = array(
                    'nama' => $param['nama'],
                    'jenis' => $param['jenis'],
                    'alamat' => $param['alamat'],
                    'akun_ig' => $param['akun_ig'],
                    'no_wa' => $param['no_wa'],
                    'latitude' => $param['latitude'],
                    'longitude' => $param['longitude'],
                    'foto' => $upload_image,
                );

                $insert = $this->lokasi->tambah_l($data);

                if ($insert == 1) {
                    $this->response(['status' => true, 'message' => 'Berhasil'], 200);
                } else {
                    $this->response(['status' => false, 'message' => 'Gagal'], 200);
                }
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            $this->response(['status' => false, 'message' => 'gagal upload'],  200);
        }
    }

    public function jenis_get()
    {
        $param = $this->get();

        $id = $param['jenis'];
    
        $data = $this->lokasi->jenis($id);

        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Berhasil.', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Belum ada daftar lokasi tersedia.'], 200);
        }
    }

    public function index_get()
    {
        $id = $this->get('id_tempat');

        if ($id === NULL) {
            $lokasi = $this->lokasi->get_lokasi();
        } else {
            $lokasi = $this->lokasi->get_lokasi($id);
        }

        if ($lokasi) {
            $this->response(['status' => true, 'message' => 'Lokasi ditemukan', 'data' => $lokasi],  200);
        } else {
            $this->response(['status' => false, 'message' => 'Lokasi tidak ditemukan'],  200);
        }
    }
}
