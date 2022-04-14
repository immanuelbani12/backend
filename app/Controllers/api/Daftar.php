<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

use App\Models\UserModel;
use App\Models\LoginModel;

class Daftar extends ResourceController
{
    public function __construct()
    {
        $this->UserModel    = new UserModel();
        $this->LoginModel   = new LoginModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->request->getJSON();

        $user = $this->LoginModel->where("username", $data->username)->first();
        if($user) return $this->failNotFound('Nomor telepon sudah terdaftar');

        $dataLogin = array(
            'nama'      => $data->nama,
            'username'  => $data->username,
            // 'password'  => md5($data->password),
            'role'      => "N",
        );

        $this->LoginModel->insert($dataLogin);
        $id_login = $this->LoginModel->insertID();

        $dataUser = array(
            'id_login'      => $id_login,
            'id_klinik'     => 1,
            'nama_user'     => $data->nama,
            'no_telp'       => $data->username,
            'kode_group'    => $data->kode_group,
            // 'tgl_lahir'     => $data->tgl_lahir,
            // 'jenis_kelamin' => $data->jenis_kelamin,
            // 'tinggi_badan'  => $data->tinggi_badan,
            // 'berat_badan'   => $data->berat_badan,
        );

        $this->UserModel->insert($dataUser);
 
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "id_login" => $id_login,
            "username" => $data->username
        );
 
        $token = JWT::encode($payload, $key, "HS256");
        $data = array(
            "id_user" => $this->UserModel->insertID(),
            "nama_user" => $data->nama,
            "kode_group" => $data->kode_group,
            "id_klinik" => 1,
            "nama_klinik" => "Klinik Apadok",
            "logo_klinik" => "sample-logo.jpg",
            "token"   => $token
        );
        $this->LoginModel->update_data('id_login', 'login', $id_login, array('token' => $token));
        return $this->respond($data);
    }
}
