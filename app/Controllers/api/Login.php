<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class Login extends ResourceController
{
    protected $modelName = 'App\Models\LoginModel';
    protected $format = 'json';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = $this->request->getJSON();

        $user = $this->model->where("username", $data->username)->first();
        if(!$user) return $this->failNotFound('Email Not Found');
 
        $verify = strcmp(md5($data->password), $user['password']);
        if($verify) return $this->fail('Wrong Password');
 
        $key = getenv('TOKEN_SECRET');
        $payload = array(
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "id_login" => $user['id_login'],
            "username" => $user['username']
        );
 
        $token = JWT::encode($payload, $key, "HS256");
        $data = array(
            "token" => $token
        );
        $this->model->update_data('id_login', 'login', $user['id_login'], array('token' => $token));
        return $this->respond($data);
    }
}
