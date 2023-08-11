<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notadinas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_nota' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'nota_dari' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'tgl_nota' => [
                'type' => 'DATE',
            ],

            'perihal' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'keterangan' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_nota');
        $this->forge->createTable('nota_dinas', true);
    }

    public function down()
    {
        $this->forge->dropTable('nota_dinas', true);
    }
}
