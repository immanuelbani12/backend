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
            'nama'    => 'UserTest',
            'username' => '081212121212',
            'password' => md5('user'),
            'role' => 'U',
        ];
        // Using Query Builder
        $this->db->table('login')->insert($data);
    }
}
