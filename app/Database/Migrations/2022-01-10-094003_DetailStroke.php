<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailStroke extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_detail_stroke' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pemeriksaan' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            // 'umur' => [
            //     'type' => 'INT',
            //     'null' => true,
            // ],
            // 'berat_badan' => [
            //     'type' => 'DECIMAL',
            //     'constraint' => '10,3',
            //     'null' => true,
            // ],
            // 'tinggi_badan' => [
            //     'type' => 'DECIMAL',
            //     'constraint' => '10,3',
            //     'null' => true,
            // ],
            'bmi' => [
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'null' => true,
            ],
            'aktivitas_fisik' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'merokok' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'tekanan_darah' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'kadar_kolesterol' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'riwayat_stroke' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'irama_jantung' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'riwayat_stroke' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'gula_darah' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'high_score' => [
                'type' => 'INT',
                'constraint' => '2',
                'null' => true,
                'default' => '0',
            ],
            'medium_score' => [
                'type' => 'INT',
                'constraint' => '2',
                'null' => true,
                'default' => '0',
            ],
            'low_score' => [
                'type' => 'INT',
                'constraint' => '2',
                'null' => true,
                'default' => '0',
            ],
            'hasil_stroke' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_detail_stroke', true);
        $this->forge->addForeignKey('id_pemeriksaan', 'pemeriksaan', 'id_pemeriksaan');
        $this->forge->createTable('detail_stroke', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('detail_stroke', true);
    }
}
