<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Buku_tamu extends RestController
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('buku_tamu_model', 'buku_tamu');
    }

    public function simpan_tamu_post()
    {
        $param = $this->post();

        $now = new DateTime();

        $data = [
            'id_pengantin' => $param['id_pengantin'],
            'nama' => $param['nama'],
            'tgl_scan' => $now->format('Y-m-d H:i:s'),
        ];

        $res = $this->buku_tamu->tambah_tamu($data);

        if ($res > 0) {
            $this->response(['status' => true, 'message' => 'tamu berhasil ditambahkan'],  200);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal menambahkan tamu'],  200);
        }
    }


    public function riwayat_get()
    {
        $param = $this->get();

        $id = $param['id_pengantin'];

        $data = $this->buku_tamu->riwayat($id);

        if ($data != null) {
            $this->response(['status' => true, 'message' => 'Berhasil.', 'data' => $data], 200);
        } else {
            $this->response(['status' => false, 'message' => 'Belum ada riwayat tamu.'], 200);
        }
    }

    public function download_get()
    {
        $param = $this->get();

        $id = $param['id_pengantin'];

        $data = $this->buku_tamu->riwayat($id);

        $now = new DateTime();
        $tgl = $now->format('Y-m-d');

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('weddingkuy')
            ->setLastModifiedBy('Admin Weddingkuy')
            ->setTitle('Riwayat Buku Tamu Pengantin');
        // add style to the header
        $styleArray = array(
            'font' => array(
                'bold' => true,
            ),
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ),
            'borders' => array(
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('rgb' => '333333'),
                ),
            ),
            'fill' => array(
                'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array('rgb' => '0d0d0d'),
                'endColor'   => array('rgb' => 'f2f2f2'),
            ),
        );
        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($styleArray);
        // auto fit column to content
        foreach (range('A', 'C') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
        }
        // set the names of header cells
        $sheet->setCellValue('A1', 'No.');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tanggal Scan');
        // Add some data
        $x = 2;
        $i = 1;
        foreach ($data as $get) {
            $sheet->setCellValue('A' . $x, $i);
            $sheet->setCellValue('B' . $x, $get['nama']);
            $sheet->setCellValue('C' . $x, $get['tgl_scan']);
            $x++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Riwayt_Buku_Tamu';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
