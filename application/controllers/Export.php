<?php

require('application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class export extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Bio_model');
    }

    public function index() {
        $membered = $this->Bio_model->tampil_data('bio')->result();
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->getColumnDimension('A')->setWidth('7');
        $sheet->getColumnDimension('B')->setWidth('25');
        $sheet->getColumnDimension('C')->setWidth('20');
        $sheet->getColumnDimension('D')->setWidth('20');
        $sheet->getColumnDimension('E')->setWidth('10');

        $sheet->getStyle('A:Z')->getAlignment()->setHorizontal('center');

        $sheet->setCellValue('A1', 'Riset Data Diri Bulan Ini')
                    ->setCellValue('A2', 'NO')
                    ->setCellValue('B2', 'NAMA')
                    ->setCellValue('C2', 'JENIS KELAMIN')
                    ->setCellValue('D2', 'TANGGAL LAHIR')
                    ->setCellValue('E2', 'UMUR')
                    ->getStyle('A2:E2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_PATTERN_DARKGRID)
                    ->getStartColor()->setARGB('#4f7bdb');

        $columns = 3;
        $numbers = 1;
        $sheet->mergeCells('A1:E1');
        foreach ($membered as $identifier) {
            $sheet->setCellValue('A' . $columns,  $numbers)
                  ->setCellValue('B' . $columns,  $identifier->nama)
                  ->setCellValue('C' . $columns,  $identifier->jenis_kelamin)
                  ->setCellValue('D' . $columns,  $identifier->tanggal_lahir)
                  ->setCellValue('E' . $columns,  $identifier->umur)
                  ->getStyle('A'.$columns.':E'.$columns)->getAlignment()->setWrapText(true);
        
            $columns++;
            $numbers++;

        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="cetak_contoh.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

}