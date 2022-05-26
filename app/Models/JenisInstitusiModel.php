<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisInstitusiModel extends Model
{
    protected $table            = 'jenis_institusi';
    protected $primaryKey       = 'id_jenis';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_jenis'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama_jenis' => 'required'
    ];

    function getJenis(){
        $builder = $this->db->table('jenis_institusi');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResult();
    }
}
