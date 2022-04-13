<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KlinikSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_login' => '2',
            'nama_klinik'   => 'Klinik Apadok',
            'email_klinik'  => 'apadok@gmail.com',
            'no_telp_klinik'=> '08123456789',
            'alamat_klinik' => 'Jl. Keputih 1/13',
            'logo'          => 'sample-logo.jpg',
        ];
        // Using Query Builder
        $this->db->table('klinik')->insert($data);

        $data = [
            'id_login' => '3',
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
