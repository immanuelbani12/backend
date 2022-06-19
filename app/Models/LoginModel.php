<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'login';
    protected $primaryKey       = 'id_login';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 
        'username', 
        'password', 
        'token',
        'role',
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'nama' => 'required',
        // 'username' => 'required',
        // 'password' => 'required',
    ];

    function getLogin($username, $password){
        $builder = $this->db->table('login');
        $builder->select('*');
        $builder->where('username', $username);
        $builder->where('password = MD5("'.$password.'")');
        $query = $builder->get();
        return $query->getResult();
    }

    function getLoginToken($username, $token){
        $builder = $this->db->table('login');
        $builder->select('*');
        $builder->where('username', $username);
        $builder->where('token', $token);
        $query = $builder->get();
        return $query->getResult();
    }

    function getLoginById($id_login){
        $builder = $this->db->table('login');
        $builder->select('*');
        $builder->where('id_login', $id_login);
        $query = $builder->get();
        return $query->getResult();
    }

    function update_data($where,$data){
        $builder = $this->db->table('login');
        $builder->where('id_login', $where);
        return $builder->update($data);
    }

    function updateByToken($where,$data){
        $builder = $this->db->table('login');
        $builder->where('token', $where);
        return $builder->update($data);
    }
}
