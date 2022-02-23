<?php

namespace App\Models;

use CodeIgniter\Model;

class KlinikModel extends Model
{
    protected $table            = 'klinik';
    protected $primaryKey       = 'id_klinik';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_login', 
        'nama_klinik', 
        'email_klinik', 
        'alamat_klinik'
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_login' => 'required',
        'nama_klinik' => 'required',
        'email_klinik' => 'required',
        'alamat_klinik' => 'required',
    ];

    function getKlinik(){
        $builder = $this->db->table('klinik');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResult();
    }

    function getKlinik_by_id_login($id_login){
        $builder = $this->db->table('klinik');
        $builder->select('*');
        $builder->where('id_login', $id_login);
        $query = $builder->get();
        return $query->getResult();
    }

    function getKlinik_by_id($id_klinik){
        $builder = $this->db->table('klinik');
        $builder->select('*');
        $builder->where('id_klinik', $id_klinik);
        $query = $builder->get();
        return $query->getResult();
    }
}
