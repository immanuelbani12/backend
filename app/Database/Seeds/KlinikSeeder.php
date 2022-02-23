<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KlinikSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_login' => '2',
            'nama_klinik'   => 'Klinik Sutorejo',
            'email_klinik'  => 'klinik@gmail.com',
            'alamat_klinik' => 'Jl. Sutorejo',
        ];
        // Using Query Builder
        $this->db->table('klinik')->insert($data);
    }
}
