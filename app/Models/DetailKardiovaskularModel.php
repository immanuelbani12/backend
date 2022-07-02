<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKardiovaskularModel extends Model
{
    protected $table            = 'detail_kardiovaskular';
    protected $primaryKey       = 'id_detail_kardiovaskular';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pemeriksaan', 
        'merokok', 
        'obat_hipertensi', 
        'kadar_gula',
        'tekanan_darah',
        'kadar_kolesterol',
        'score_kardiovaskular'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_pemeriksaan' => 'required'
    ];
}
