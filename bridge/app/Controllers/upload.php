<?php

namespace App\Controllers;

use App\Models\p2pmModel;
use App\Models\dbdModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;

class upload extends BaseController
{
    public function inserting()
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('excelFile');

            if ($file->isValid() && $file->getExtension() === 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($file->getTempName());
                $worksheet = $spreadsheet->getActiveSheet();

                $rows = $worksheet->toArray();
                $data = [];

                if (!empty($rows)) {
                    $startRow = 11;

                    for ($i = $startRow; $i <= count($rows); $i++) {

                        $id = $worksheet->getCell('A' . $i)->getValue();
                        $tgl = $worksheet->getCell('G' . $i)->getValue();
                        $nama = $worksheet->getCell('B' . $i)->getValue();
                        $nik = $worksheet->getCell('C' . $i)->getValue();
                        $ibu = $worksheet->getCell('U' . $i)->getValue();
                        $alamat = $worksheet->getCell('E' . $i)->getValue();
                        $domisili = $worksheet->getCell('E' . $i)->getValue();
                        $lahir = $worksheet->getCell('I' . $i)->getValue();
                        $jenis_kelamin = $worksheet->getCell('D' . $i)->getValue();

                        $data[] = [
                            'id' => $id,
                            'tanggal_pemeriksaan' => $tgl,
                            'nama' => $nama,
                            'NIK' => $nik,
                            'nama_ibu_kandung' => $ibu,
                            'alamat' => $alamat,
                            'alamat_domisili' => $domisili,
                            'tanggal_lahir' => $lahir,
                            'jenis_kelamin' => $jenis_kelamin,
                            // Menambahkan nilai dari kolom B ke dalam array data
                        ];
                    }

                    $model = new dbdModel();
                    $model->insertBatch($data);
                } else {
                    // Handle the case when there are no rows with data
                }
            } else {
                // File tidak valid atau bukan file Excel (.xlsx)
                // Handle kesalahan di sini
            }
        }

        return redirect()->route('Menu-two');
    }

    public function deleting()
    {
        $db = new dbdModel();
        $db->truncate();
        return redirect()->route('Menu-two');
    }

    public function load()
    {
        function bulanInggris($month)
        {
            $bulan = [
                'January'   => '01',
                'February'  => '02',
                'March'     => '03',
                'April'     => '04',
                'May'       => '05',
                'June'      => '06',
                'July'      => '07',
                'August'    => '08',
                'September' => '09',
                'October'   => '10',
                'November'  => '11',
                'December'  => '12',
            ];

            return $bulan[$month];
        }


        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('excelFile');

            if ($file->isValid() && $file->getExtension() === 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($file->getTempName());
                $worksheet = $spreadsheet->getActiveSheet();

                $rows = $worksheet->toArray();
                $data = [];
                $lastRow = $worksheet->getHighestRow();
                if (!empty($rows)) {
                    $startRow = 5;
                    $rowCount = count($rows);

                    for ($i = $startRow; $i <= $rowCount; $i++) {

                        $id = $worksheet->getCell('A' . $i)->getValue();
                        $tglsurat = $worksheet->getCell('B' . $i)->getValue();
                        if (!empty($tglsurat)) {
                            $parsedDatesurat = date_parse($tglsurat);
                            $eventDateFormattedsurat = $parsedDatesurat['year'] . '-' . $parsedDatesurat['month'] . '-' . $parsedDatesurat['day'];
                        } else {
                            $eventDateFormattedsurat = null;
                        }
                        $tglterima = $worksheet->getCell('C' . $i)->getValue();

                        if (!empty($tglterima)) {
                            $parsedDateterima = date_parse($tglterima);
                            $eventDateFormattedterima = $parsedDateterima['year'] . '-' . $parsedDateterima['month'] . '-' . $parsedDateterima['day'];
                        } else {
                            $eventDateFormattedterima = null;
                        }
                        $nosurat = $worksheet->getCell('D' . $i)->getValue();
                        $nokendali = $worksheet->getCell('E' . $i)->getValue();
                        $suratdari = $worksheet->getCell('F' . $i)->getValue();
                        $perihal = $worksheet->getCell('G' . $i)->getValue();
                        $tglkadin = $worksheet->getCell('H' . $i)->getValue();
                        if (!empty($tglkadin)) {
                            $parsedDatekadin = date_parse($tglkadin);
                            $eventDateFormattedkadin = $parsedDatekadin['year'] . '-' . $parsedDatekadin['month'] . '-' . $parsedDatekadin['day'];
                        } else {
                            $eventDateFormattedkadin = null;
                        }
                        $tujukadin = $worksheet->getCell('I' . $i)->getValue();
                        $isikadin = $worksheet->getCell('J' . $i)->getValue();
                        $tujusekdin = $worksheet->getCell('L' . $i)->getValue();
                        $tglsekdin = $worksheet->getCell('K' . $i)->getValue();
                        if (!empty($tglsekdin)) {
                            $parsedDatesekdin = date_parse($tglsekdin);
                            $eventDateFormattedsekdin = $parsedDatesekdin['year'] . '-' . $parsedDatesekdin['month'] . '-' . $parsedDatesekdin['day'];
                        } else {
                            $eventDateFormattedsekdin = null;
                        }
                        $isisekdin = $worksheet->getCell('M' . $i)->getValue();
                        $tujukasubag = $worksheet->getCell('O' . $i)->getValue();
                        $tglkasubag = $worksheet->getCell('N' . $i)->getValue();
                        if (!empty($tglkasubag)) {
                            $parsedDatekasubag = date_parse($tglkasubag);
                            $eventDateFormattedkasubag = $parsedDatekasubag['year'] . '-' . $parsedDatekasubag['month'] . '-' . $parsedDatekasubag['day'];
                        } else {
                            $eventDateFormattedkasubag = null;
                        }
                        $isikasubag = $worksheet->getCell('P' . $i)->getValue();
                        $tujukasi = $worksheet->getCell('U' . $i)->getValue();
                        $tglkasi = $worksheet->getCell('T' . $i)->getValue();
                        if (!empty($tglkasi)) {
                            $parsedDatekasi = date_parse($tglkasi);
                            $eventDateFormattedkasi = $parsedDatekasi['year'] . '-' . $parsedDatekasi['month'] . '-' . $parsedDatekasi['day'];
                        } else {
                            $eventDateFormattedkasi = null;
                        }
                        $isikasi = $worksheet->getCell('V' . $i)->getValue();
                        $tujukabid = $worksheet->getCell('R' . $i)->getValue();
                        $tglkabid = $worksheet->getCell('Q' . $i)->getValue();
                        if (!empty($tglkabid)) {
                            $parsedDatekabid = date_parse($tglkabid);
                            $eventDateFormattedkabid = $parsedDatekabid['year'] . '-' . $parsedDatekabid['month'] . '-' . $parsedDatekabid['day'];
                        } else {
                            $eventDateFormattedkabid = null;
                        }
                        $isikabid = $worksheet->getCell('S' . $i)->getValue();


                        $data[] = [
                            'id' => $id,
                            'surat_dari' => $suratdari,
                            'nomor_surat' => $nosurat,
                            'tgl_surat' => $eventDateFormattedsurat,
                            'tgl_terima' => $eventDateFormattedterima,
                            'nomor_kendali' => $nokendali,
                            'disposisi' => $isikadin,
                            'tgl_disposisi' => $eventDateFormattedkadin,
                            'perihal' => $perihal,
                            'kabid' => $isikabid,
                            'tgl_kabid' => $eventDateFormattedkabid,
                            'kasubag' => $isikasubag,
                            'tgl_kasubag' => $eventDateFormattedkasubag,
                            'kasi' => $isikasi,
                            'tgl_kasi' => $eventDateFormattedkasi,
                            'sekre' => $isisekdin,
                            'tgl_sekre' => $eventDateFormattedsekdin,
                            'tuju_kadin' => $tujukadin,
                            'tuju_kabid' => $tujukabid,
                            'tuju_kasubag' => $tujukasubag,
                            'tuju_kasi' => $tujukasi,
                            'tuju_sekdin' => $tujusekdin,
                            // Menambahkan nilai dari kolom B ke dalam array data
                        ];
                    }

                    $model = new p2pmModel();
                    $model->insertBatch($data);
                } else {
                    // Handle the case when there are no rows with data
                }
            } else {
                // File tidak valid atau bukan file Excel (.xlsx)
                // Handle kesalahan di sini
            }
            return redirect()->route('Dashboard');
        }
    }
}
