<?php

namespace App\Models;

use CodeIgniter\Model;

class surattugasModel extends Model
{

    protected $table = "surat_tugas";
    protected $allowedFields = [
        'id_stugas',
        'nomor_stugas',
        'no_dasar_stugas',
        'kategori',
        'tgl_dasarsurat',
        'maksud_stugas',
        'tempat_brkt',
        'tempat_tujuan',
        'lama_perjalanan',
        'tgl_berangkat',
        'tgl_pulang'
    ];
}
