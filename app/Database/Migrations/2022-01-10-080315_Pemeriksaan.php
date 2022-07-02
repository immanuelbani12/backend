<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemeriksaan extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_pemeriksaan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'hasil_diabetes' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'hasil_kardiovaskular' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'hasil_stroke' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_pemeriksaan', true);
        // $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->createTable('pemeriksaan', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('pemeriksaan', true);
    }
}
