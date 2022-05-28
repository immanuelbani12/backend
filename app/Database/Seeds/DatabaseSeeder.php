<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('JenisSeeder');
        $this->call('LoginSeeder');
        $this->call('InstitusiSeeder');
        $this->call('UserSeeder');
    }
}
