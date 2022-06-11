<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id_artikel';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_login', 
        // 'id_institusi', 
        'judul_artikel',
        'gambar_artikel',
        'isi_artikel', 
        'kategori_artikel', 
        'jenis_artikel',
    ];

    // Dates
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_login'      => 'required',
        // 'id_institusi'  => 'required',
        'judul_artikel' => 'required',
        'isi_artikel'   => 'required',
        'kategori_artikel' => 'required', 
        'jenis_artikel' => 'required',
    ];

    function getArtikel($id_login){
        $builder = $this->db->table('artikel');
        $builder->select('*');
        $builder->where('id_login', $id_login);
        $query = $builder->get();
        return $query->getResult();
    }

    function getArtikelById($id_artikel){
        $builder = $this->db->table('artikel');
        $builder->select('*');
        $builder->where('id_artikel', $id_artikel);
        $query = $builder->get();
        return $query->getResult();
    }

    function update_data($where,$data){
        $builder = $this->db->table('artikel');
        $builder->where('id_artikel', $where);
        return $builder->update($data);
    }
}
