<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_artikel' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_login' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            // 'id_institusi' => [
            //     'type' => 'INT',
            //     'unsigned' => true,
            // ],
            'judul_artikel' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'gambar_artikel' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'isi_artikel' => [
                'type' => 'TEXT',
            ],
            // 'link_artikel' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => 255,
            //     'null' => true,
            // ],
            'kategori_artikel' => [
                'type' => 'INT',
                'constraint' => 1,
                'comment' => '1 = stroke, 2 = Diabetes, 3 = Kardiovaskular, 4 = Kebugaran',
            ],
            'jenis_artikel' => [
                'type' => 'INT',
                'constraint' => 1,
                'comment' => '1 = text, 2 = video',
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_artikel', true);
        $this->forge->addForeignKey('id_login', 'login', 'id_login');
        // $this->forge->addForeignKey('id_institusi', 'institusi', 'id_institusi');
        $this->forge->createTable('artikel', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('artikel', true);
    }
}
