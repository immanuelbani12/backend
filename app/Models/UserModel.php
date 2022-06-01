<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_login', 
        'id_institusi', 
        'kode_group',
        'kode_user',
        'nama_user', 
        'no_telp', 
        'tgl_lahir',
        'jenis_kelamin',
        'tinggi_badan',
        'berat_badan',
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_login'      => 'required',
        'id_institusi'  => 'required',
        'kode_user'     => 'required',
        'nama_user'     => 'required',
        'no_telp'       => 'required',
        // 'tgl_lahir'     => 'required',
        // 'jenis_kelamin' => 'required',
        // 'tinggi_badan'  => 'required',
        // 'berat_badan'   => 'required'
    ];

    function getUser($id_institusi){
        $builder = $this->db->table('user');
        $builder->select('*');
        $builder->where('id_institusi', $id_institusi);
        $query = $builder->get();
        return $query->getResult();
    }

    function getUserData($id_login){
        $builder = $this->db->table('user');
        $builder->select('*');
        $builder->where('id_login', $id_login);
        $query = $builder->get();
        return $query->getResult();
    }

    function getUserById($id_user){
        $builder = $this->db->table('user');
        $builder->select('*');
        $builder->where('id_user', $id_user);
        $query = $builder->get();
        return $query->getResult();
    }

    function cekNoTelp($no_telp){
        $builder = $this->db->table('user');
        $builder->select('COUNT(1) AS jumlah');
        $builder->where('no_telp', $no_telp);
        $query = $builder->get();
        return $query->getResult();
    }

    function update_data($where,$data){
        $builder = $this->db->table('user');
        $builder->where('id_user', $where);
        return $builder->update($data);
    }
}
