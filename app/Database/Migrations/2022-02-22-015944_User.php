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
            'id_institusi' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'kode_group' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'kode_user' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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
            'sudah_screening' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
            'risiko_diabetes' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
            'risiko_kolesterol' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
            'risiko_stroke' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
            'risiko_kebugaran' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_login', 'login', 'id_login');
        $this->forge->addForeignKey('id_institusi', 'institusi', 'id_institusi');
        $this->forge->addUniqueKey(['id_institusi', 'kode_user']);
        $this->forge->createTable('user', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}
