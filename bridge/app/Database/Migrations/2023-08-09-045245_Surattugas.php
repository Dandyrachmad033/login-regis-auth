<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Surattugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stugas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'nomor_stugas' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'no_dasar_stugas' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'tgl_dasarsurat' => [
                'type' => 'DATE',

            ],

            'perihal' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'maksud_stugas' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'tempat_brkt' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'tempat_tujuan' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'lama_perjalanan' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'tgl_berangkat' => [
                'type' => 'DATE',

            ],

            'tgl_pulang' => [
                'type' => 'DATE',

            ],
        ]);
        $this->forge->addPrimaryKey('id_stugas');
        $this->forge->createTable('surat_tugas', true);
    }

    public function down()
    {
        $this->forge->dropTable('surat_dinas', true);
    }
}
