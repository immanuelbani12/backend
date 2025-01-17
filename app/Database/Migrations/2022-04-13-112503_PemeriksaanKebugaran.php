<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemeriksaanKebugaran extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_pemeriksaan_kebugaran' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'hasil_kebugaran' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'score_kebugaran' => [
                'type' => 'INT',
                'constraint' => '2',
                'null' => true,
                'default' => '0',
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_pemeriksaan_kebugaran', true);
        // $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->createTable('pemeriksaan_kebugaran', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('pemeriksaan_kebugaran', true);
    }
}
