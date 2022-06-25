<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

use App\Models\UserModel;
use App\Models\LoginModel;
use App\Models\InstitusiModel;

class Daftar extends ResourceController
{
    public function __construct()
    {
        $this->UserModel        = new UserModel();
        $this->LoginModel       = new LoginModel();
        $this->InstitusiModel   = new InstitusiModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->request->getJSON();

        $login = $this->LoginModel->where("username", $data->username)->first();
        if($login) return $this->failNotFound('Nomor telepon sudah terdaftar');

        $group = $this->InstitusiModel->where("kode_group", $data->kode_group)->first();
        if(!$group) return $this->failNotFound('Kode group tidak ditemukan');

        $user = $this->UserModel->where("kode_user", $data->kode_user)->where("id_institusi", $group['id_institusi'])->first();
        if(!$user) return $this->failNotFound('Nomor peserta tidak ditemukan');

        // $institusi = $this->InstitusiModel->where("id_institusi", $user['id_institusi'])->first();
        // if(!$institusi) return $this->failNotFound('Institusi tidak ditemukan');

        $dataLogin = array(
            'username'  => $data->username,
        );

        $this->LoginModel->update_data($user['id_login'], $dataLogin);

        $dataUser = array(
            'no_telp'       => $data->username,
        );

        $this->UserModel->update_data($user['id_user'], $dataUser);
 
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "id_login" => $user['id_login'],
            "username" => $data->username
        );
 
        $token = JWT::encode($payload, $key, "HS256");
        $data = array(
            "id_login" => $user['id_login'],
            "id_user" => $user['id_user'],
            "nama_user" => $user['nama_user'],
            "kode_user" => $data->kode_user,
            "id_institusi" => $user['id_institusi'],
            "id_login_institusi" => $group['id_login'],
            "nama_institusi" => $group['nama_institusi'],
            "no_telp_institusi" => $group['no_telp_institusi'],
            "logo_institusi" => $group['logo'],
            "token"   => $token
        );
        $this->LoginModel->update_data($user['id_login'], array('token' => $token));
        return $this->respond($data);
    }
}
