<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_jenis'    => 'Perusahaan',
        ];
        // Using Query Builder
        $this->db->table('jenis_institusi')->insert($data);

        $data = [
            'nama_jenis'    => 'Klinik',
        ];
        // Using Query Builder
        $this->db->table('jenis_institusi')->insert($data);
    }
}
