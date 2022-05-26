<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisInstitusi extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_jenis' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('jenis_institusi', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('jenis_institusi', true);
    }
}
