<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailKebugaran extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_detail_kebugaran' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pemeriksaan_kebugaran' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'pertanyaan_1' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa lelah secara fisik'
            ],
            'pertanyaan_2' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa lemah di semua hal'
            ],
            'pertanyaan_3' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa lesu'
            ],
            'pertanyaan_4' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa lelah secara fisik dan psikis'
            ],
            'pertanyaan_5' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa kesulitan memulai sesuatu karena saya lelah'
            ],
            'pertanyaan_6' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa kesulitan menyelesaikan sesuatu karena saya lelah'
            ],
            'pertanyaan_7' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya memiliki energi'
            ],
            'pertanyaan_8' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya bisa mengerjakan aktivitas seperti biasa'
            ],
            'pertanyaan_9' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya butuh tidur seharian'
            ],
            'pertanyaan_10' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa terlalu lelah untuk makan'
            ],
            'pertanyaan_11' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya membutuhkan bantuan untuk mengerjakan aktivitas seperti biasa'
            ],
            'pertanyaan_12' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya merasa frustrasi menjadi terlalu lelah untuk melakukan sesuatu yang saya ingin kerjakan'
            ],
            'pertanyaan_13' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
                'comment' => 'Saya harus membatasi aktivitas sosial saya karena saya lelah'
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
        $this->forge->addKey('id_detail_kebugaran', true);
        $this->forge->addForeignKey('id_pemeriksaan_kebugaran', 'pemeriksaan_kebugaran', 'id_pemeriksaan_kebugaran');
        $this->forge->createTable('detail_kebugaran', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('detail_kebugaran', true);
    }
}
