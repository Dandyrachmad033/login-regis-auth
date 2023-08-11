<?php

namespace App\Models;

use CodeIgniter\Model;

class notadinasModel extends Model
{

    protected $table = "nota_dinas";
    protected $allowedFields = [
        'id_nota',
        'nota_dari',
        'tgl_nota',
        'perihal',
        'nomor_surat',
        'keterangan'
    ];
}
