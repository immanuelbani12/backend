<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class institusiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_login' => '2',
            'id_jenis' => '2',
            'nama_institusi'   => 'Klinik Apadok',
            'email_institusi'  => 'apadok@gmail.com',
            'no_telp_institusi'=> '08123456789',
            'alamat_institusi' => 'Jl. Keputih 1/13',
            'logo'          => 'sample-logo.jpg',
        ];
        // Using Query Builder
        $this->db->table('institusi')->insert($data);

        $data = [
            'id_login' => '3',
            'id_jenis' => '2',
            'nama_institusi'   => 'Klinik Sutorejo',
            'email_institusi'  => 'klinik@gmail.com',
            'no_telp_institusi'=> '08123456789',
            'alamat_institusi' => 'Jl. Sutorejo',
            'logo'          => 'sample-logo.jpg',
        ];
        // Using Query Builder
        $this->db->table('institusi')->insert($data);
    }
}
