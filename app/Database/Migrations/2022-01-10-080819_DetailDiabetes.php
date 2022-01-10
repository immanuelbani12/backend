<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailDiabetes extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_detail_diabetes' => [
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
            // 'gender' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => '10',
            //     'null' => true,
            // ],
            'lingkar_pinggang' => [
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'null' => true,
            ],
            'gula_darah' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'buah_sayur' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'obat_hipertensi' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'keturunan' => [
                'type' => 'INT',
                'constraint' => '1',
                'null' => true,
            ],
            'score_diabetes' => [
                'type' => 'INT',
                'constraint' => '2',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_detail_diabetes', true);
        $this->forge->addForeignKey('id_pemeriksaan', 'pemeriksaan', 'id_pemeriksaan');
        $this->forge->createTable('detail_diabetes', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('detail_diabetes', true);
    }
}
