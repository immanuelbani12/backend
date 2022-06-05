<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Institusi extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_institusi' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_login' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'id_jenis' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'kode_group' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'nama_institusi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email_institusi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
            ],
            'no_telp_institusi' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'alamat_institusi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_institusi', true);
        $this->forge->addForeignKey('id_login', 'login', 'id_login');
        $this->forge->addForeignKey('id_jenis', 'jenis_institusi', 'id_jenis');
        $this->forge->createTable('institusi', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('institusi', true);
    }
}
