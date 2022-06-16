<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chat extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_chat' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'to_login_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'from_login_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'message' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 1,
                'comment' => 'sudah di baca atau belum. 1 = Yes, 0 = No'
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id_chat', true);
        $this->forge->createTable('chat', true);

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('chat', true);
    }
}
