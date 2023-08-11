<?php

namespace App\Controllers;

use App\Models\p2pmModel;
use App\Models\dbdModel;
use App\Models\notadinasModel;
use App\Models\suratkeluarModel;
use App\Models\surattugasModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use DateTime;

class export extends BaseController
{


    public function download()
    {
        $model = new p2pmModel();
        $data = $model->findAll();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        function bulanIndonesia($month)
        {
            $bulan = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            return $bulan[(int)$month];
        }


        $dataFormatted = [];

        foreach ($data as $item) {
            $itemFormatted = $item; // Kloning data asli
            if (isset($item['tgl_surat'])) {
                $tglSurat = new DateTime($item['tgl_surat']);
                $itemFormatted['tgl_surat'] = $tglSurat->format('d') . ' ' . bulanIndonesia($tglSurat->format('m')) . ' ' . $tglSurat->format('Y');
            } else {
                $itemFormatted['tgl_surat'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_terima'])) {
                $tglterima = new DateTime($item['tgl_terima']);
                $itemFormatted['tgl_terima'] = $tglterima->format('d') . ' ' . bulanIndonesia($tglterima->format('m')) . ' ' . $tglterima->format('Y');
            } else {
                $itemFormatted['tgl_terima'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_disposisi'])) {
                $tgldisposisi = new DateTime($item['tgl_disposisi']);
                $itemFormatted['tgl_disposisi'] = $tgldisposisi->format('d') . ' ' . bulanIndonesia($tgldisposisi->format('m')) . ' ' . $tgldisposisi->format('Y');
            } else {
                $itemFormatted['tgl_disposisi'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_kabid'])) {
                $tglkabid = new DateTime($item['tgl_kabid']);
                $itemFormatted['tgl_kabid'] = $tglkabid->format('d') . ' ' . bulanIndonesia($tglkabid->format('m')) . ' ' . $tglkabid->format('Y');
            } else {
                $itemFormatted['tgl_kabid'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_kasubag'])) {
                $tglkasubag = new DateTime($item['tgl_kasubag']);
                $itemFormatted['tgl_kasubag'] = $tglkasubag->format('d') . ' ' . bulanIndonesia($tglkasubag->format('m')) . ' ' . $tglkasubag->format('Y');
            } else {
                $itemFormatted['tgl_kasubag'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_kasi'])) {
                $tglkasi = new DateTime($item['tgl_kasi']);
                $itemFormatted['tgl_kasi'] = $tglkasi->format('d') . ' ' . bulanIndonesia($tglkasi->format('m')) . ' ' . $tglkasi->format('Y');
            } else {
                $itemFormatted['tgl_kasi'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_sekre'])) {
                $tglsekre = new DateTime($item['tgl_sekre']);
                $item['tgl_sekre'] = $tglsekre->format('d') . ' ' . bulanIndonesia($tglsekre->format('m')) . ' ' . $tglsekre->format('Y');
            } else {
                $item['tgl_sekre'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }


            $dataFormatted[] = $itemFormatted; // Tambahkan data yang telah diformat ke dalam array baru
        }



        $sheet->getStyle('A3:L3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(35);
        $sheet->getColumnDimension('H')->setWidth(37);
        $sheet->getColumnDimension('I')->setWidth(40);
        $sheet->getStyle('J')->getAlignment()->setWrapText(true);
        $sheet->getColumnDimension('J')->setWidth(30);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(24);
        $sheet->getColumnDimension('M')->setWidth(24);
        $sheet->getColumnDimension('N')->setWidth(27);
        $sheet->getColumnDimension('O')->setWidth(27);
        $sheet->getColumnDimension('P')->setWidth(27);
        $sheet->getColumnDimension('Q')->setWidth(20);
        $sheet->getColumnDimension('R')->setWidth(20);
        $sheet->getColumnDimension('S')->setWidth(20);
        $sheet->getColumnDimension('T')->setWidth(20);
        $sheet->getColumnDimension('U')->setWidth(20);
        $sheet->getColumnDimension('V')->setWidth(20);


        $values = [
            'A' => 'NO',
            'B' => 'ASAL SURAT ',
            'C' => 'NOMOR SURAT',
            'D' => 'TGL SURAT',
            'E' => 'TGL TERIMA',
            'F' => 'NO KENDALI',
            'G' => 'TUJUAN KADIN',
            'H' => 'DISPOSISI',
            'I' => 'TGL DISPOSISI',
            'J' => 'PERIHAL',
            'K' => 'TUJUAN KABID',
            'L' => 'KABID',
            'M' => 'TGL KABID',
            'N' => 'TUJUAN KASUBAG',
            'O' => 'KASUBAG',
            'P' => 'TGL KASUBAG',
            'Q' => 'TUJUAN KASI',
            'R' => 'KASI',
            'S' => 'TGL KASI',
            'T' => 'TUJUAN SEKDIN',
            'U' => 'SEKRETARIS',
            'V' => 'TGL SEKRETARIS',


        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '3', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }

        $row = 4;
        foreach ($dataFormatted as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['surat_dari']);
            $sheet->setCellValue('C' . $row, $item['nomor_surat']);
            $sheet->setCellValue('D' . $row, $item['tgl_surat']);
            $sheet->setCellValue('E' . $row, $item['tgl_terima']);
            $sheet->setCellValue('F' . $row, $item['nomor_kendali']);
            $sheet->setCellValue('G' . $row, $item['tuju_kadin']);
            $sheet->setCellValue('H' . $row, $item['disposisi']);
            $sheet->setCellValue('I' . $row, $item['tgl_disposisi']);
            $sheet->setCellValue('J' . $row, $item['perihal']);
            $sheet->setCellValue('K' . $row, $item['tuju_kabid']);
            $sheet->setCellValue('L' . $row, $item['kabid']);
            $sheet->setCellValue('M' . $row, $item['tgl_kabid']);
            $sheet->setCellValue('N' . $row, $item['tuju_kasubag']);
            $sheet->setCellValue('O' . $row, $item['kasubag']);
            $sheet->setCellValue('P' . $row, $item['tgl_kasubag']);
            $sheet->setCellValue('Q' . $row, $item['tuju_kasi']);
            $sheet->setCellValue('R' . $row, $item['kasi']);
            $sheet->setCellValue('S' . $row, $item['tgl_kasi']);
            $sheet->setCellValue('T' . $row, $item['tuju_sekdin']);
            $sheet->setCellValue('U' . $row, $item['sekre']);
            $sheet->setCellValue('V' . $row, $item['tgl_sekre']);
            $row++;
        }


        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V'];
        foreach ($columns as $column) {
            $sheet->getStyle($column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Surat.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function exporting()
    {
        $model = new dbdModel();
        $data = $model->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $lastColumn = 'T';
        $sheet->mergeCells('A1:T2');
        $sheet->mergeCells('M3:T3');
        $sheet->mergeCells('R4:T5');
        $sheet->getStyle('A3:L3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C5DDB8'); // Mengatur warna hijau pada judul
        $sheet->getStyle('A3:L3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('R6:T6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('C5DDB8');
        $sheet->getStyle('M3:T3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');
        $sheet->getStyle('M4:Q4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');
        $sheet->getStyle('R6:T6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');
        $sheet->getStyle('R4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F0BF60');

        // Mengatur lebar kolom T dan mengatur lebar kolom lain secara otomatis
        $columns = range('A', 'D');
        foreach ($columns as $column) {
            $sheet->mergeCells($column . '3:' . $column . '6');
        }
        $sheet->mergeCells('E3:E5');
        $columns = range('F', 'L');
        foreach ($columns as $column) {
            $sheet->mergeCells($column . '3:' . $column . '6');
        }
        $columns = range('M', 'Q');
        foreach ($columns as $column) {
            $sheet->mergeCells($column . '4:' . $column . '6');
        }


        $align = $sheet->getStyle('A3:L3')->getAlignment();
        $align->setVertical(Alignment::VERTICAL_CENTER);
        $align->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $alignbaru = $sheet->getStyle('M4:Q4')->getAlignment();
        $alignbaru->setVertical(Alignment::VERTICAL_CENTER);
        $alignbaru->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $alignend = $sheet->getStyle('R4')->getAlignment();
        $alignend->setVertical(Alignment::VERTICAL_CENTER);
        $alignend->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension($lastColumn)->setAutoSize(true);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(46);
        $sheet->getColumnDimension('G')->setWidth(46);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('A')->setWidth(8);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('E')->setWidth(35);
        $sheet->getColumnDimension('C')->setWidth(37);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(30);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(24);
        $sheet->getColumnDimension('N')->setWidth(24);
        $sheet->getColumnDimension('O')->setWidth(27);
        $sheet->getColumnDimension('P')->setWidth(27);
        $sheet->getColumnDimension('Q')->setWidth(27);
        $sheet->getColumnDimension('R')->setWidth(20);
        $sheet->getColumnDimension('S')->setWidth(20);
        $sheet->getColumnDimension('T')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->setCellValue('E6', '(jika nik tidak ada)');
        $sheet->setCellValue('M3', 'DENGUE');
        $sheet->setCellValue('R4', 'Pengendalian Vektor');
        $sheet->setCellValue('R6', 'PSN 3M Plus');
        $sheet->setCellValue('S6', 'LARVASIDASI');
        $sheet->setCellValue('T6', 'FOGGING');

        $values = [
            'A' => 'NO',
            'B' => 'TANGGAL PEMERIKSAAN',
            'C' => 'NAMA',
            'D' => 'NIK(WAJIB)',
            'E' => 'NAMA IBU KANDUNG',
            'F' => 'ALAMAT(KTP)',
            'G' => 'ALAMAT DOMISILI',
            'H' => 'PROVINSI',
            'I' => 'KAB/KOTA',
            'J' => 'TEMPAT LAHIR',
            'K' => 'TANGGAL LAHIR(DD-MM-YYYY)',
            'L' => 'JENIS KELAMIN'

        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '3', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }
        $values = [
            'M' => 'DIAGNOSIS LAB',
            'N' => 'DIAGNOSIS KLINIS',
            'O' => 'STATUS AKHIR',
            'P' => 'PE',
            'Q' => 'HASIL PE',
            'R' => 'Pengendalian Vektor',



        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '4', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }
        // Data
        $row = 7;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['tanggal_pemeriksaan']);
            $sheet->setCellValue('C' . $row, $item['nama']);
            $sheet->setCellValue('K' . $row, $item['NIK']);
            $sheet->setCellValue('Q' . $row, $item['nama_ibu_kandung']);
            $sheet->setCellValue('F' . $row, $item['alamat']);
            $sheet->setCellValue('G' . $row, $item['alamat_domisili']);
            $sheet->setCellValue('L' . $row, $item['jenis_kelamin']);
            $sheet->setCellValue('N' . $row, $item['tanggal_lahir']);
            $row++;
        }

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Mengatur penempatan teks ke tengah
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set the headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="siarvi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function export_surat_keluar()
    {
        $model = new suratkeluarModel();
        $data = $model->findAll();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        function bulanIndo($month)
        {
            $bulan = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            return $bulan[(int)$month];
        }

        $dataFormatted = [];

        foreach ($data as $item) {
            $itemFormatted = $item; // Kloning data asli
            if (isset($item['tgl_terima'])) {
                $tglterima = new DateTime($item['tgl_terima']);
                $itemFormatted['tgl_terima'] = $tglterima->format('d') . ' ' . bulanIndo($tglterima->format('m')) . ' ' . $tglterima->format('Y');
            } else {
                $itemFormatted['tgl_terima'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_surat'])) {
                $tglSurat = new DateTime($item['tgl_surat']);
                $itemFormatted['tgl_surat'] = $tglSurat->format('d') . ' ' . bulanIndo($tglSurat->format('m')) . ' ' . $tglSurat->format('Y');
            } else {
                $itemFormatted['tgl_surat'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            $dataFormatted[] = $itemFormatted;
        }

        $sheet->getStyle('A3:F3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(25);

        $values = [
            'A' => 'No',
            'B' => 'NAMA PEGAWAI',
            'C' => 'TANGGAL TERIMA',
            'D' => 'TUJUAN',
            'E' => 'TANGGAL SURAT',
            'F' => 'PERIHAL',
        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '3', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }

        $row = 4;
        foreach ($dataFormatted as $item) {
            $sheet->setCellValue('A' . $row, $item['id_suratkeluar']);
            $sheet->setCellValue('B' . $row, $item['kategori']);
            $sheet->setCellValue('C' . $row, $item['tgl_terima']);
            $sheet->setCellValue('D' . $row, $item['tujuan']);
            $sheet->setCellValue('E' . $row, $item['tgl_surat']);
            $sheet->setCellValue('F' . $row, $item['perihal']);
            $row++;
        }

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $columns = ['A', 'B', 'C', 'D', 'E', 'F'];
        foreach ($columns as $column) {
            $sheet->getStyle($column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        }


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Surat keluar.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function export_surat_tugas()
    {
        $model = new surattugasModel();
        $data = $model->findAll();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        function Bulan($month)
        {
            $bulan = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            return $bulan[(int)$month];
        }

        $dataFormatted = [];

        foreach ($data as $item) {
            $itemFormatted = $item; // Kloning data asli
            if (isset($item['tgl_dasarsurat'])) {
                $tgldasarsurat = new DateTime($item['tgl_dasarsurat']);
                $itemFormatted['tgl_dasarsurat'] = $tgldasarsurat->format('d') . ' ' . Bulan($tgldasarsurat->format('m')) . ' ' . $tgldasarsurat->format('Y');
            } else {
                $itemFormatted['tgl_dasarsurat'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_berangkat'])) {
                $tglberangkat = new DateTime($item['tgl_berangkat']);
                $itemFormatted['tgl_berangkat'] = $tglberangkat->format('d') . ' ' . Bulan($tglberangkat->format('m')) . ' ' . $tglberangkat->format('Y');
            } else {
                $itemFormatted['tgl_berangkat'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            if (isset($item['tgl_pulang'])) {
                $tglpulang = new DateTime($item['tgl_pulang']);
                $itemFormatted['tgl_pulang'] = $tglpulang->format('d') . ' ' . bulan($tglpulang->format('m')) . ' ' . $tglpulang->format('Y');
            } else {
                $itemFormatted['tgl_pulang'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            $dataFormatted[] = $itemFormatted;
        }

        $sheet->getStyle('A3:K3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);


        $values = [
            'A' => 'No',
            'B' => 'NOMOR SURAT',
            'C' => 'NOMOR DASAR SURAT',
            'D' => 'KATEGORI',
            'E' => 'TANGGAL DASAR SURAT',
            'F' => 'MAKSUD SURAT',
            'G' => 'TEMPAT BERANGKAT',
            'H' => 'TEMPAT TUJUAN',
            'I' => 'LAMA PERJALANAN',
            'J' => 'TANGGAL BERANGKAT',
            'K' => 'TANGGAL PULANG',
        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '3', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }

        $row = 4;
        foreach ($dataFormatted as $item) {
            $sheet->setCellValue('A' . $row, $item['id_stugas']);
            $sheet->setCellValue('B' . $row, $item['nomor_stugas']);
            $sheet->setCellValue('C' . $row, $item['no_dasar_stugas']);
            $sheet->setCellValue('D' . $row, $item['kategori']);
            $sheet->setCellValue('E' . $row, $item['tgl_dasarsurat']);
            $sheet->setCellValue('F' . $row, $item['maksud_stugas']);
            $sheet->setCellValue('G' . $row, $item['tempat_brkt']);
            $sheet->setCellValue('H' . $row, $item['tempat_tujuan']);
            $sheet->setCellValue('I' . $row, $item['lama_perjalanan']);
            $sheet->setCellValue('J' . $row, $item['tgl_berangkat']);
            $sheet->setCellValue('K' . $row, $item['tgl_pulang']);
            $row++;
        }

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];
        foreach ($columns as $column) {
            $sheet->getStyle($column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        }


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Surat Tugas.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function export_nota_dinas()
    {
        $model = new notadinasModel();
        $data = $model->findAll();
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        function Bulanindone($month)
        {
            $bulan = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            return $bulan[(int)$month];
        }

        $dataFormatted = [];

        foreach ($data as $item) {
            $itemFormatted = $item; // Kloning data asli
            if (isset($item['tgl_nota'])) {
                $tglnota = new DateTime($item['tgl_nota']);
                $itemFormatted['tgl_nota'] = $tglnota->format('d') . ' ' . Bulanindone($tglnota->format('m')) . ' ' . $tglnota->format('Y');
            } else {
                $itemFormatted['tgl_nota'] = '-'; // Ganti dengan tanda hubung jika tanggal kosong
            }

            $dataFormatted[] = $itemFormatted;
        }

        $sheet->getStyle('A3:F3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(25);


        $values = [
            'A' => 'No',
            'B' => 'TANGGAL NOTA',
            'C' => 'NOTA DARI',
            'D' => 'NOMOR SURAT',
            'E' => 'PERIHAL',
            'F' => 'KETERANGAN',
        ];
        foreach ($values as $column => $value) {
            $sheet->setCellValueExplicit($column . '3', $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        }

        $row = 4;
        foreach ($dataFormatted as $item) {
            $sheet->setCellValue('A' . $row, $item['id_nota']);
            $sheet->setCellValue('B' . $row, $item['nota_dari']);
            $sheet->setCellValue('C' . $row, $item['tgl_nota']);
            $sheet->setCellValue('D' . $row, $item['nomor_surat']);
            $sheet->setCellValue('E' . $row, $item['perihal']);
            $sheet->setCellValue('F' . $row, $item['keterangan']);
            $row++;
        }

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $columns = ['A', 'B', 'C', 'D', 'E', 'F'];
        foreach ($columns as $column) {
            $sheet->getStyle($column)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        }


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Nota Dinas.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
