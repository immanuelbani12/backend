<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

use App\Models\UserModel;
use App\Models\KlinikModel;

class Login extends ResourceController
{
    protected $modelName = 'App\Models\LoginModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->KlinikModel  = new KlinikModel();
        $this->UserModel    = new UserModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->request->getJSON();

        $user = $this->model->where("username", $data->username)->first();
        if(!$user) return $this->failNotFound('Nomor telepon tidak terdaftar');
 
        // $verify = strcmp(md5($data->password), $user['password']);
        // if($verify) return $this->fail('Wrong Password');
 
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "id_login" => $user['id_login'],
            "username" => $user['username']
        );

        $userData = $this->UserModel->getUserData($user['id_login']);
        $klinikData = $this->KlinikModel->getKlinik_by_id($userData[0]->id_klinik);
 
        $token = JWT::encode($payload, $key, "HS256");
        $data = array(
            "id_user" => $userData[0]->id_user,
            "nama_user" => $userData[0]->nama_user,
            "id_klinik" => $userData[0]->id_klinik,
            "nama_klinik" => $klinikData[0]->nama_klinik,
            "logo_klinik" => $klinikData[0]->logo,
            "token"   => $token
        );
        $this->model->update_data('id_login', 'login', $user['id_login'], array('token' => $token));
        return $this->respond($data);
    }
}
