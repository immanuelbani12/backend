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

    // function getUserWithStatus($id_login, $id_institusi){
    //     $builder = $this->db->table('login');
    //     $builder->select('id_login, nama, username, login_status, 
    //     (SELECT COUNT(*) FROM chat 
    //     WHERE to_login_id = '.$id_login.' AND from_login_id = login.id_login AND status = 0) AS count_status');
    //     $builder->where('id_login IN (SELECT id_login FROM user WHERE id_institusi = '.$id_institusi.')');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    function getAllChatByUser($to_login_id, $from_login_id){
        $builder = $this->db->table('chat c');
        $builder->select('a.nama as from_user_name, b.nama as to_user_name, c.*');
        $builder->join('login a', 'a.id_login = c.from_login_id');
        $builder->join('login b', 'b.id_login = c.to_login_id');
        $builder->where('(c.from_login_id = '.$from_login_id.' AND c.to_login_id = '.$to_login_id.')
        OR (c.from_login_id = '.$to_login_id.' AND c.to_login_id = '.$from_login_id.')');
        $query = $builder->get();
        return $query->getResult();
    }

    function updateChatStatus($to_login_id, $from_login_id, $data){
        $builder = $this->db->table('chat');
        $builder->where('to_login_id', $to_login_id);
        $builder->where('from_login_id', $from_login_id);
        return $builder->update($data);
    }

    function update_data($where,$data){
        $builder = $this->db->table('chat');
        $builder->where('id_chat', $where);
        return $builder->update($data);
    }
}
