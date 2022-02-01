<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailStrokeModel extends Model
{
    protected $table            = 'detail_stroke';
    protected $primaryKey       = 'id_detail_stroke';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pemeriksaan', 
        'bmi', 
        'aktivitas_fisik', 
        'merokok',
        'tekanan_darah',
        'kadar_kolesterol',
        'riwayat_stroke',
        'irama_jantung',
        'kadar_gula',
        'high_score',
        'medium_score',
        'low_score'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_pemeriksaan' => 'required'
    ];
}
