<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Klinik extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_klinik' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_login' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_klinik' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email_klinik' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
            ],
            'no_telp_klinik' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'alamat_klinik' => [
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
        $this->forge->addKey('id_klinik', true);
        $this->forge->addForeignKey('id_login', 'login', 'id_login');
        $this->forge->createTable('klinik', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('klinik', true);
    }
}
