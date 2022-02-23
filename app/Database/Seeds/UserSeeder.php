<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_login'      => '3',
            'id_klinik'     => '1',
            'nama_user'     => 'Bambang',
            'no_telp'       => '08123456789',
            'tgl_lahir'     => '1999-10-24',
            'jenis_kelamin' => 'L',
            'berat_badan'   => '70',
            'tinggi_badan'  => '170'
        ];
        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
