<?php

namespace App\Models;

use CodeIgniter\Model;

class suratkeluarModel extends Model
{

    protected $table = "surat_keluar";
    protected $allowedFields = [
        'id_suratkeluar',
        'kategori', 'tgl_terima',
        'tujuan',
        'tgl_surat',
        'perihal'
    ];
}
