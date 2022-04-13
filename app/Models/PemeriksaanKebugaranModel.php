<?php

namespace App\Models;

use CodeIgniter\Model;

class PemeriksaanKebugaranModel extends Model
{
    protected $table            = 'pemeriksaan_kebugaran';
    protected $primaryKey       = 'id_pemeriksaan_kebugaran';
    // protected $returnType       = PemeriksaanKebugaran::class;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user', 
        'hasil_kebugaran'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_user' => 'required'
    ];

    public function get_user_by_id_latest($id){
        $builder = $this->db->table('pemeriksaan_kebugaran');
        $builder->select('*');
        // $builder->join('user', 'user.id_user = pemeriksaan_kebugaran.id_user');
        $builder->where('pemeriksaan_kebugaran.id_user', $id);
        $builder->orderBy('pemeriksaan_kebugaran.created_at', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_user_by_id_all($id){
        $builder = $this->db->table('pemeriksaan_kebugaran');
        $builder->select('*');
        // $builder->join('user', 'user.id_user = pemeriksaan_kebugaran.id_user');
        $builder->where('pemeriksaan_kebugaran.id_user', $id);
        $builder->orderBy('pemeriksaan_kebugaran.created_at', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
