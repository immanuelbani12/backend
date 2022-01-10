<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailDiabetesModel extends Model
{
    protected $table            = 'detail_diabetes';
    protected $primaryKey       = 'id_detail_diabetes';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pemeriksaan', 
        'bmi', 
        'aktivitas_fisik', 
        'lingkar_pinggang',
        'gula_darah',
        'buah_sayur',
        'obat_hipertensi',
        'keturunan',
        'score_diabetes',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_pemeriksaan' => 'required'
    ];
}
