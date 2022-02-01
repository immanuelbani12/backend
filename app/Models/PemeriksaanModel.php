<?php

namespace App\Models;

use CodeIgniter\Model;

class PemeriksaanModel extends Model
{
    protected $table            = 'pemeriksaan';
    protected $primaryKey       = 'id_pemeriksaan';
    // protected $returnType       = Pemeriksaan::class;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user', 
        'hasil_diabetes', 
        'hasil_kolesterol', 
        'hasil_stroke'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_user' => 'required'
    ];
}
