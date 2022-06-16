<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table            = 'chat';
    protected $primaryKey       = 'id_chat';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'to_login_id',
        'from_login_id',
        'message', 
        'status', 
    ];

    // Dates
    protected $createdField  = 'created_at';

    protected $validationRules = [
        'to_login_id'   => 'required',
        'from_login_id' => 'required',
        'message'       => 'required', 
        'status'        => 'required',
    ];

    function getUserWithStatus($id_login, $id_institusi){
        $builder = $this->db->table('login');
        $builder->select('id_login, nama, username, login_status, 
        (SELECT COUNT(*) FROM chat 
        WHERE to_login_id = '.$id_login.' AND from_login_id = login.id_login AND status = 0) AS count_status');
        $builder->where('id_login IN (SELECT id_login FROM user WHERE id_institusi = '.$id_institusi.')');
        $query = $builder->get();
        return $query->getResult();
    }
}
