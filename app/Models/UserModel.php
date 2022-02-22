<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // protected $table            = 'pemeriksaan';
    // protected $primaryKey       = 'id_pemeriksaan';
    // // protected $returnType       = Pemeriksaan::class;
    // protected $protectFields    = true;
    // protected $allowedFields    = [
    //     'id_user', 
    //     'hasil_diabetes', 
    //     'hasil_kolesterol', 
    //     'hasil_stroke'
    // ];

    // // Dates
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    // protected $validationRules = [
    //     'id_user' => 'required'
    // ];

    function getLogin($email, $password){
        $builder = $this->db->table('login');
        $builder->select('*');
        $builder->where('email', $email);
        $builder->where('password = MD5("'.$password.'")');
        $query = $builder->get();
        return $query->getResult();
    }

    function getLoginToken($username, $token){
        $builder = $this->db->table('login');
        $builder->select('*');
        $builder->where('email', $username);
        $builder->where('token', $token);
        $query = $builder->get();
        return $query->getResult();
    }

    function getUserData($id_login){
        $builder = $this->db->table('login');
        $builder->select('*');
        $builder->where('id_login', $id_login);
        $query = $builder->get();
        return $query->getResult();
    }

    function update_data($id,$table,$where,$data){
        $builder = $this->db->table($table);
        $builder->where($id, $where);
        return $builder->update($data);
    }
}
