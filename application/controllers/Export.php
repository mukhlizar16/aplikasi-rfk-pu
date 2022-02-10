<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class Export extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// TODO: export data PAGU to excel
		$excel = new Spreadsheet();
		// Settingan awal fil excel
		$excel->getProperties()
			->setCreator("E-Monev")
			->setLastModifiedBy("E-Monev")
			->setTitle("Data Pagu")
			->setSubject("Rekapitulasi Data Pagu")
			->setDescription("Data Pagu")
			->setKeywords("Data Pagu");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => [
					'borderStyle' => Border::BORDER_THIN,
				],
				'bottom' => [
					'borderStyle' => Border::BORDER_THIN,
				],
				'left' => [
					'borderStyle' => Border::BORDER_THIN,
				],
				'right' => [
					'borderStyle' => Border::BORDER_THIN,
				]
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => [
					'borderStyle' => Border::BORDER_HAIR,
				],
				'bottom' => [
					'borderStyle' => Border::BORDER_HAIR,
				],
				'left' => [
					'borderStyle' => Border::BORDER_HAIR,
				],
				'right' => [
					'borderStyle' => Border::BORDER_HAIR,
				]
			)
		);

		// style untuk middle
		$middle = [
			'alignment' => array(
				'horizontal' => Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => [
					'borderStyle' => Border::BORDER_HAIR,
				],
				'bottom' => [
					'borderStyle' => Border::BORDER_HAIR,
				],
				'left' => [
					'borderStyle' => Border::BORDER_HAIR,
				],
				'right' => [
					'borderStyle' => Border::BORDER_HAIR,
				]
			)
		];

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PAGU"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "PROGRAM");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "KEGIATAN");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "SUB KEGIATAN");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "URAIAN PEKERJAAN");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "LOKASI");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "VOLUME");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "SATUAN");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "PAGU");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "JENIS");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "SUMBER DANA");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);

		// ambil data dari database
		$anggaran = $this->Admin_model->total_anggaran_pagu()->row();
		$datas = $this->Admin_model->show_pagu_data()->result_array();
		// print_r($datas);
		// die();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4

		$excel->setActiveSheetIndex(0)->setCellValue('A4', "Dinas PUPR");	// set nama dinas
		$excel->getActiveSheet()->mergeCells('A4:B4');
		$excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE);
		$excel->setActiveSheetIndex(0)->setCellValue('C4', $anggaran->jumlah);	// set nilai total anggaran dinas
		$excel->getActiveSheet()->mergeCells('C4:K4');
		$excel->getActiveSheet()->getStyle('C4')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_RP);
		$excel->getActiveSheet()->getStyle('C4')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A4:K4')->applyFromArray($style_row);	// set border row

		foreach ($datas as $data) {
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['nm_p']);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nm_k']);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['nama_sub']);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['pekerjaan']);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data['lokasi']);
			$excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data['volume']);
			$excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data['satuan']);
			$excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data['pagu']);
			$excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data['jenis']);
			$excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['sumber']);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($middle);
			$excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($middle);
			$excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($middle);
			$excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_RP);
			$excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($middle);
			$excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($middle);

			$no++;
			$numrow++;
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(40); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom F
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom G
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Set width kolom H
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom I
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom J

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet()->setTitle("Data Pagu");
		$excel->setActiveSheetIndex(0);
		$excel->getActiveSheet()->setShowGridlines(false);

		$writer = new Xlsx($excel);
		$filename = 'EMonev-Data Pagu';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	public function excel()
	{
		$anggaran = $this->Admin_model->total_anggaran_pagu()->row();
		$total = $this->Admin_model->get_total_pagu()->result();
		$datas = $this->Admin_model->show_pagu_data()->result_array();
		echo 'Dinas PUPR Kabupaten Aceh Barat <br>';
		echo $anggaran->jumlah;
		echo '<br>';
		$urut = 1;
		$no = 1;
		foreach ($total as $t) {
			echo '<h1>' . $urut++ . '</h1>';
			echo '<b>' . $t->nm_p . ': ' . rupiah($t->sum) . '</b>';
			echo '<br>';
			foreach ($datas as $data) {
				if ($data['id_program'] === $t->id_program) {
					echo $no++ . '. ' . $data['nm_p'];
					echo '<br>';
					echo '<b>Kegiatan: </b>' . $data['nm_k'];
					echo '<br>';
					echo '<b>Sub Kegiatan: </b>' . $data['nama_sub'];
					echo '<br>';
					echo '<b>Pekerjaan: </b>' . $data['pekerjaan'];
					echo '<br>';
					echo '<b>Lokasi: </b>' . $data['lokasi'];
					echo '<br>';
					echo '<b>Volume: </b>' . $data['volume'];
					echo '<br>';
					echo '<b>Pagu: </b>' . rupiah($data['pagu']);
					echo '<br>';
					echo '<b>Jenis: </b>' . $data['jenis'];
					echo '<br>';
					echo '<b>Sumber Dana: </b>' . $data['belanja'];
					echo '<br><br>';
				}
			}
		}
	}

	public function test()
	{
		$total = $this->Admin_model->get_total_pagu()->result();
		$data = array();
		foreach ($total as $t) {
			foreach ($this->Admin_model->get_kegiatan_pagu($t->id_program)->result() as $kegiatan) {
				foreach ($this->Admin_model->get_subkegiatan_pagu($kegiatan->id)->result() as $sk) {
					$data[] = [
						'ID program' => $t->id_program,
						'nama program' => $t->nm_p,
						'jumlah' => $t->sum,
						'kegiatan' => $kegiatan->nama_kegiatan,
						'subkegiatan' => $sk->nama_subkegiatan
					];
				}
			}
		}
		print_r($data);
	}
}

/* End of file Export.php and path \application\controllers\Export.php */
