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
        'username' => 'required',
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

    function update_data($id,$table,$where,$data){
        $builder = $this->db->table($table);
        $builder->where($id, $where);
        return $builder->update($data);
    }
}
