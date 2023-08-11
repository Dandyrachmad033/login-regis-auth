<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Suratmasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_suratkeluar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'tgl_terima' => [
                'type' => 'DATE',
            ],

            'tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'tgl_surat' => [
                'type' => 'DATE',

            ],

            'perihal' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_suratkeluar');
        $this->forge->createTable('surat_keluar', true);
    }

    public function down()
    {
        $this->forge->dropTable('surat_keluar', true);
    }
}
