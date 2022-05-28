<?php

namespace App\Models;

use CodeIgniter\Model;

class InstitusiModel extends Model
{
    protected $table            = 'institusi';
    protected $primaryKey       = 'id_institusi';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_login',
        'id_jenis',
        'nama_institusi', 
        'email_institusi',
        'no_telp_institusi', 
        'alamat_institusi',
        'logo',
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_login' => 'required',
        'id_jenis' => 'required',
        'nama_institusi' => 'required',
        'email_institusi' => 'required',
        'no_telp_institusi' => 'required',
        'alamat_institusi' => 'required',
        // 'logo' => 'required',
    ];

    function getInstitusi(){
        $builder = $this->db->table('institusi i');
        $builder->select('i.*, j.nama_jenis');
        $builder->join('jenis_institusi j', 'i.id_jenis = j.id_jenis');
        $query = $builder->get();
        return $query->getResult();
    }

    function getInstitusi_by_id_login($id_login){
        $builder = $this->db->table('institusi');
        $builder->select('*');
        $builder->where('id_login', $id_login);
        $query = $builder->get();
        return $query->getResult();
    }

    function getInstitusi_by_id($id_institusi){
        $builder = $this->db->table('institusi');
        $builder->select('*');
        $builder->where('id_institusi', $id_institusi);
        $query = $builder->get();
        return $query->getResult();
    }

    function cekEmail($email){
        $builder = $this->db->table('institusi');
        $builder->select('count(1) as jumlah');
        $builder->where('email_institusi', $email);
        $query = $builder->get();
        return $query->getResult();
    }

    function getInstitusibyEmail($email){
        $builder = $this->db->table('institusi');
        $builder->select('*');
        $builder->where('email_institusi', $email);
        $query = $builder->get();
        return $query->getResult();
    }
}
