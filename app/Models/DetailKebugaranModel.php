<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKebugaranModel extends Model
{
    protected $table            = 'detail_kebugaran';
    protected $primaryKey       = 'id_detail_kebugaran';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pemeriksaan_kebugaran',
        'pertanyaan_1',
        'pertanyaan_2',
        'pertanyaan_3',
        'pertanyaan_4',
        'pertanyaan_5',
        'pertanyaan_6',
        'pertanyaan_7',
        'pertanyaan_8',
        'pertanyaan_9',
        'pertanyaan_10',
        'pertanyaan_11',
        'pertanyaan_12',
        'pertanyaan_13',
        'score_kebugaran'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_pemeriksaan_kebugaran' => 'required'
    ];
}
