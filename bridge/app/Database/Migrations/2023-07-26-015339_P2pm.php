<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class P2pm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'surat_dari' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'tgl_surat' => [
                'type' => 'DATE',

            ],
            'tgl_terima' => [
                'type' => 'DATE',

            ],
            'nomor_kendali' => [
                'type' => 'Varchar',
                'constraint' => 250,

            ],
            'teruskan_kepada' => [
                'type' => 'Varchar',
                'constraint' => 250,
            ],
            'disposisi' => [
                'type' => 'Varchar',
                'constraint' => 250,
            ],
            'tgl_disposisi' => [
                'type' => 'DATE',
            ],
            'perihal' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'kabid' => [
                'type' => 'Varchar',
                'constraint' => 250,
                'null' => true,
            ],
            'tgl_kabid' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'kasubag' => [
                'type' => 'Varchar',
                'constraint' => 250,
                'null' => true,
            ],
            'tgl_kasubag' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'kasi' => [
                'type' => 'Varchar',
                'constraint' => 250,
                'null' => true,
            ],
            'tgl_kasi' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'sekre' => [
                'type' => 'Varchar',
                'constraint' => 250,
                'null' => true,
            ],
            'tgl_sekre' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('p2pm', true);
    }

    public function down()
    {
        $this->forge->dropTable('p2pm', true);
    }
}
