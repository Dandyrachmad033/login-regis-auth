<?php

namespace App\Models;

use CodeIgniter\Model;

class p2pmModel extends Model
{
    protected $table = "p2pm";
    protected $allowedFields = [
        'id',
        'surat_dari',
        'nomor_surat',
        'tgl_surat',
        'tgl_terima',
        'nomor_kendali',
        'disposisi',
        'tgl_disposisi',
        'perihal',
        'kabid',
        'tgl_kabid',
        'kasubag',
        'tgl_kasubag',
        'kasi',
        'tgl_kasi',
        'sekre',
        'tgl_sekre',
        'tuju_kadin',
        'tuju_kabid',
        'tuju_kasubag',
        'tuju_kasi',
        'tuju_sekdin'


    ];
}
