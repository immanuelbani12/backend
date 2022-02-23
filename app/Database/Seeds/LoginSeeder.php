<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoginSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama'    => 'Administrator',
            'username' => 'admin@gmail.com',
            'password' => md5('admin'),
            'role' => 'A',
        ];
        // Using Query Builder
        $this->db->table('login')->insert($data);

        $data = [
            'nama'     => 'Klinik Sutorejo',
            'username' => 'klinik@gmail.com',
            'password' => md5('klinik'),
            'role' => 'K',
        ];
        // Using Query Builder
        $this->db->table('login')->insert($data);

        $data = [
            'nama'    => 'Bambang',
            'username' => '08123456789',
            'password' => md5('user'),
            'role' => 'U',
        ];
        // Using Query Builder
        $this->db->table('login')->insert($data);
    }
}
