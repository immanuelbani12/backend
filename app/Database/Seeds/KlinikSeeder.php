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
            'no_telp_klinik'=> '08123456789',
            'alamat_klinik' => 'Jl. Sutorejo',
            'logo'          => 'sample-logo.jpg',
        ];
        // Using Query Builder
        $this->db->table('klinik')->insert($data);
    }
}
