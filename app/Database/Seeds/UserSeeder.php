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

        $data = [
            'id_login'      => '4',
            'id_klinik'     => '1',
            'nama_user'     => 'Rahayu',
            'no_telp'       => '08111111111',
            'tgl_lahir'     => '2001-01-19',
            'jenis_kelamin' => 'P',
            'berat_badan'   => '56',
            'tinggi_badan'  => '155'
        ];
        // Using Query Builder
        $this->db->table('user')->insert($data);

        $data = [
            'id_login'      => '5',
            'id_klinik'     => '1',
            'nama_user'     => 'Sutejo',
            'no_telp'       => '08222222222',
            'tgl_lahir'     => '1988-03-18',
            'jenis_kelamin' => 'L',
            'berat_badan'   => '73',
            'tinggi_badan'  => '167'
        ];
        // Using Query Builder
        $this->db->table('user')->insert($data);
    }
}
