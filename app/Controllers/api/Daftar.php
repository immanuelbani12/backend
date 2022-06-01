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

        $user = $this->UserModel->where("kode_user", $data->kode_user)->first();
        if(!$user) return $this->failNotFound('Nomor peserta tidak ditemukan');

        $institusi = $this->InstitusiModel->where("id_institusi", $user['id_institusi'])->first();
        if(!$institusi) return $this->failNotFound('Institusi tidak ditemukan');

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
            "id_user" => $user['id_user'],
            "nama_user" => $data->nama,
            "kode_user" => $data->kode_user,
            "id_institusi" => $user['id_institusi'],
            "nama_institusi" => $institusi['nama_institusi'],
            "logo_institusi" => $institusi['logo'],
            "token"   => $token
        );
        $this->LoginModel->update_data($user['id_login'], array('token' => $token));
        return $this->respond($data);
    }
}
