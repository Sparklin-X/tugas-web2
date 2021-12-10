<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetak_pdf_file extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$pdf = new FPDF('l','mm', 'A5');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(190 ,7 ,'Universitas Mercu Buana', 0, 1 ,'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(190 ,7 ,'Daftar Mahasiswa Teknik Informatika', 0, 1, 'C');

		$pdf->Cell(10 ,7 ,'', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->cell(9 ,6 ,'No', 1, 0);
		$pdf->cell(23 ,6 ,'NAMA', 1, 0);
		$pdf->cell(80 ,6 ,'JENIS KELAMIN', 1, 0);
		$pdf->cell(40 ,6 ,'TANGGAL LAHIR', 1, 0);
		$pdf->cell(35 ,6 ,'UMUR', 1, 1);
		$pdf->SetFont('Arial', '',10);
		$user = $this->db->get('bio')->result();
		$no = 0;
		foreach ($user as $row)
		{
			$no++;
			$pdf->Cell(9 ,6 ,$no, 1, 0);
			$pdf->Cell(23 ,6 ,$row->nama, 1, 0);
			$pdf->Cell(80 ,6 ,$row->jenis_kelamin, 1, 0);
			$pdf->Cell(40 ,6 ,$row->tanggal_lahir, 1, 0);
			$pdf->Cell(35 ,6 ,$row->umur, 1, 1);

		}

		$pdf->Output();
	}
}
