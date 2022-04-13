<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DetailKebugaranModel;
use App\Models\LoginModel;
use App\Models\UserModel;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class PemeriksaanKebugaran extends ResourceController
{
    protected $modelName = 'App\Models\PemeriksaanKebugaranModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->KebugaranModel   = new DetailKebugaranModel();
        $this->LoginModel       = new LoginModel();
        $this->UserModel        = new UserModel();
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

            return true;
        
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function index()
    {
        $check = $this->checkToken();
        if(!$check) return $this->fail('Invalid Token');
        
        return $this->respond($this->model->findAll());
    }

    public function show($slug = null, $id = null)
    {
        $check = $this->checkToken();
        if(!$check) return $this->fail('Invalid Token');

        if($slug == 'user'){
            $data = $this->model->get_user_by_id_latest($id);
            return $this->respond($data);
        }

        if($slug == 'userAll'){
            $data = $this->model->get_user_by_id_all($id);
            return $this->respond($data);
        }

        $record = $this->model->find($id);
        if (!$record) {
            # code...
            return $this->failNotFound(sprintf(
                'post with id %d not found',
                $id
            ));
        }

        return $this->respond($record);
    }

    public function create()
    {
        $check = $this->checkToken();
        if(!$check) return $this->fail('Invalid Token');

        $data = $this->request->getJSON();

        $decoded_json = array();

        foreach($data as $indicator)
        {
            $decoded_json[$indicator->question] = $indicator->answer;
        }

        $data = (object) $decoded_json;

        $kebugaran   = $this->get_kebugaran($data);

        $data_pemeriksaan = array(
            'id_user' => $data->id_user,
            'hasil_kebugaran' => $kebugaran['hasil'],
            'score_kebugaran' => $kebugaran['score']
        );

        if (!$this->model->save($data_pemeriksaan)) {
            # code...
            return $this->fail($this->model->errors());
        }

        $data->id_pemeriksaan_kebugaran = $this->model->insertID();

        $data->score_kebugaran = $kebugaran['score'];

        $data_update = array(
            'risiko_kebugaran' => $kebugaran['hasil'] == 'Tidak Bugar' ? 1 : 0,
        );

        $this->UserModel->update_data($data->id_user, $data_update);
        $this->KebugaranModel->save($data);

        return $this->respondCreated($this->model->find($data->id_pemeriksaan_kebugaran), 'Pemeriksaan Kebugaran created');
    }

    public function get_kebugaran($data)
    {
        $qs1 = $data->pertanyaan_1;
        $qs2 = $data->pertanyaan_2;
        $qs3 = $data->pertanyaan_3;
        $qs4 = $data->pertanyaan_4;
        $qs5 = $data->pertanyaan_5;
        $qs6 = $data->pertanyaan_6;
        $qs7 = $data->pertanyaan_7;
        $qs8 = $data->pertanyaan_8;
        $qs9 = $data->pertanyaan_9;
        $qs10 = $data->pertanyaan_10;
        $qs11 = $data->pertanyaan_11;
        $qs12 = $data->pertanyaan_12;
        $qs13 = $data->pertanyaan_13;

        $kebugaran_res = (4 - $qs1) + (4 - $qs2) 
        + (4 - $qs3) + (4 - $qs4) + (4 - $qs5) 
        + (4 - $qs6) + (0 + $qs7) + (0 + $qs8) 
        + (4 - $qs9) + (4 - $qs10) + (4 - $qs11) 
        + (4 - $qs12) + (4 - $qs13);

        $hasil = "";

        if ($kebugaran_res < 13){
            $hasil = "Tidak Bugar";
        }
        else if ($kebugaran_res >= 13 and $kebugaran_res < 26){
            $hasil = "Bugar Rendah";
        }
        else if ($kebugaran_res >= 26 and $kebugaran_res < 39){
            $hasil = "Bugar Menengah";
        }
        else if ($kebugaran_res >= 39){
            $hasil = "Bugar";
        }

        return array(
            'score' => $kebugaran_res,
            'hasil' => $hasil
        );
    }
}
