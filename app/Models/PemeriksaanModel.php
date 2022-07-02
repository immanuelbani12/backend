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
        'hasil_kardiovaskular', 
        'hasil_stroke'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_user' => 'required'
    ];

    public function get_user_by_id_latest($id){
        $builder = $this->db->table('pemeriksaan p');
        $builder->select('p.*, d.kadar_gula, d.kadar_kolesterol, d.tekanan_darah');
        $builder->join('detail_stroke d', 'd.id_pemeriksaan = p.id_pemeriksaan');
        $builder->where('p.id_user', $id);
        $builder->orderBy('p.created_at', 'DESC');
        $builder->limit(1);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_user_by_id_all($id){
        $builder = $this->db->table('pemeriksaan p');
        $builder->select('p.*, d.kadar_gula, d.kadar_kolesterol, d.tekanan_darah');
        $builder->join('detail_stroke d', 'd.id_pemeriksaan = p.id_pemeriksaan');
        $builder->where('p.id_user', $id);
        $builder->orderBy('p.created_at', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_all(){
        $builder = $this->db->table('pemeriksaan p');
        $builder->select('p.*, d.kadar_gula, d.kadar_kolesterol, d.tekanan_darah');
        $builder->join('detail_stroke d', 'd.id_pemeriksaan = p.id_pemeriksaan');
        $builder->orderBy('p.created_at', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_by_id($id){
        $builder = $this->db->table('pemeriksaan p');
        $builder->select('p.*, d.kadar_gula, d.kadar_kolesterol, d.tekanan_darah');
        $builder->join('detail_stroke d', 'd.id_pemeriksaan = p.id_pemeriksaan');
        $builder->where('p.id_pemeriksaan', $id);
        $builder->orderBy('p.created_at', 'DESC');
        $query = $builder->get();
        return $query->getResult();
    }
}
