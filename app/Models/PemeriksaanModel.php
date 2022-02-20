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

    public function get_user_by_id_latest($id){
        $builder = $this->db->table('pemeriksaan');
        $builder->select('*');
        // $builder->join('user', 'user.id_user = pemeriksaan.id_user');
        $builder->where('pemeriksaan.id_user', $id);
        $builder->orderBy('pemeriksaan.created_at', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_user_by_id_all($id){
        $builder = $this->db->table('pemeriksaan');
        $builder->select('*');
        // $builder->join('user', 'user.id_user = pemeriksaan.id_user');
        $builder->where('pemeriksaan.id_user', $id);
        $builder->orderBy('pemeriksaan.created_at', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
