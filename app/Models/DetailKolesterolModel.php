<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKolesterolModel extends Model
{
    protected $table            = 'detail_kolesterol';
    protected $primaryKey       = 'id_detail_kolesterol';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pemeriksaan', 
        'merokok', 
        'obat_hipertensi', 
        'kadar_gula',
        'tekanan_darah',
        'kadar_kolesterol',
        'score_kolesterol'
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
