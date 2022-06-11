<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LoginModel;
use App\Models\InstitusiModel;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Artikel extends ResourceController
{
    protected $modelName = 'App\Models\ArtikelModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->LoginModel       = new LoginModel();
        $this->InstitusiModel   = new InstitusiModel();
    }

    public function checkToken(){
        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if(!$header) return false;
        $token = explode(' ', $header)[1];
 
        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            $data = $this->LoginModel->getLoginToken($decoded->username, $token);
            if(!count($data)>0) return false;

            return $decoded;
        
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function index(){
        $token = $this->checkToken();
        if(!$token) return $this->fail('Invalid Token');
        
        $institusi = $this->InstitusiModel->getInstitusi_by_id($token->id_institusi);
        return $this->respond($this->model->getArtikel($institusi[0]->id_login));
    }
}
