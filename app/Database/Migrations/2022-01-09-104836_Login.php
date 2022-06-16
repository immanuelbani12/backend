<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Login extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_login' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                // 'unique' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'unique' => true,
                'null' => true,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 1,
            ],
            'id_connection' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => true,
            ],
            'login_status' => [
                'type' => 'INT',
                'constraint' => 1,
                'comment' => '1 = Online, 0 = Offline'
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_login', true);
        $this->forge->createTable('login', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('login', true);
    }
}
