<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_login' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_user' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'unique' => true,
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'CHAR',
                'constraint' => 1,
            ],
            'tinggi_badan' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'berat_badan' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_login', 'login', 'id_login');
        $this->forge->createTable('user', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}
