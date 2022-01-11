<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DetailStrokeModel;
use App\Models\DetailDiabetesModel;

class Pemeriksaan extends ResourceController
{
    protected $modelName = 'App\Models\PemeriksaanModel';
    protected $format = 'json';

    public function __construct()
        {
            $this->DiabetesModel = new DetailDiabetesModel();
            $this->StrokeModel = new DetailStrokeModel();
        }

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
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
        $data = $this->request->getJSON();

        $diabetes = $this->get_diabetes($data);
        $stroke = $this->get_stroke($data);

        $data_pemeriksaan = array(
            'id_user' => $data->id_user,
            'hasil_diabetes' => $diabetes['hasil'],
            // 'hasil_kolesterol' => $kolesterol->hasil,
            'hasil_stroke' => $stroke['hasil']
        );

        if (!$this->model->save($data_pemeriksaan)) {
            # code...
            return $this->fail($this->model->errors());
        }

        $data->id_pemeriksaan = $this->model->insertID();

        $data->low_score = $stroke['low'];
        $data->medium_score = $stroke['medium'];
        $data->high_score =$stroke['high'];  

        $data->score_diabetes = $diabetes['score']; 
        $data->bmi = intval($data->berat_badan) / pow(intval($data->tinggi_badan)/100,2); 

        $this->DiabetesModel->save($data);
        $this->StrokeModel->save($data);

        return $this->respondCreated($this->model->find($this->model->insertID()), 'Pemeriksaan created');
    }

    public function get_diabetes($data)
    {
        $year = date('Y');
        $score = 0;
        $diabetes_risk = "";

        $gender = $data->jenis_kelamin; 

        $birth_day = explode("/", $data->tanggal_lahir);
        $birth_year = $birth_day[2];
        $age = intval($year) - intval($birth_year);

        if($age > 64){
            $score += 4;
        }
        elseif($age >= 55){
            $score += 3;
        }
        elseif($age >= 45){
            $score += 2;
        }

        $bmi = intval($data->berat_badan) / pow(intval($data->tinggi_badan)/100,2);
        if($bmi > 30){
            $score += 3;
        }
        elseif($bmi >=25 ){
            $score += 1;
        }

        if($data->aktivitas_fisik == 2){
            $score += 2;
        }

        if($gender == "Laki-laki"){
            if(intval($data->lingkar_pinggang) > 102){
                $score += 4;
            }
            elseif(intval($data->lingkar_pinggang) >= 94){
                $score += 3;
            }
        }
        else{
            if(intval($data->lingkar_pinggang) > 88){
                $score += 4;
            }
            elseif(intval($data->lingkar_pinggang) >= 80){
                $score += 3;
            }
        }

        if($data->gula_darah){
            $score += 5;
        }

        if(!$data->buah_sayur){
            $score += 1;
        }

        if($data->obat_hipertensi){
            $score += 2;
        }

        if($data->keturunan == 2){
            $score += 5;
        }
        elseif($data->keturunan == 1){
            $score += 3;
        }

        if($score > 20){
            $diabetes_risk = "Sangat Tinggi";
        }
        elseif($score >= 15){
            $diabetes_risk = "Tinggi";
        }
        elseif($score >= 12){
            $diabetes_risk = "Sedang";
        }
        elseif($score >= 7){
            $diabetes_risk = "Rendah";
        }
        else{
            $diabetes_risk = "Sangat Rendah";
        }

        return array(
            'hasil' => $diabetes_risk,
            'score' => $score
        );
    }

    public function get_stroke($data)
    {
        $high = 0;
        $medium = 0;
        $low = 0;
        $year = date('d/m/Y');
        
        $bmi = intval($data->berat_badan) / pow(intval($data->tinggi_badan)/100,2);
        if ($bmi <= 25){
            $low++;
        }
        else if ($bmi <= 30){
            $medium++;
        }
        else{
            $high++;
        }

        if($data->aktivitas_fisik == 2){
            $low++;
        } else if($data->aktivitas_fisik == 1) {
            $medium++;
        } else {
            $high++;
        }

        if($data->merokok == 0){
            $low++;
        } else if($data->merokok == 1) {
            $medium++;
        } else {
            $high++;
        }

        if($data->tekanan_darah == 0){
            $low++;
        } else if($data->tekanan_darah == 2) {
            $medium++;
        } else {
            $high++;
        }

        if($data->kadar_kolesterol == 0){
            $low++;
        } else if($data->kadar_kolesterol  == 1) {
            $medium++;
        } else {
            $high++;
        }

        if($data->riwayat_stroke  == 0){
            $low++;
        } else if($data->riwayat_stroke  == 1) {
            $medium++;
        } else {
            $high++;
        }

        if($data->irama_jantung == 0){
            $low++;
        } else if($data->irama_jantung  == 1) {
            $medium++;
        } else {
            $high++;
        }

        if($data->kadar_gula == 0){
            $low++;
        } else if($data->kadar_gula == 1) {
            $medium++;
        } else {
            $high++;
        }

        $hasil = "";
        if ($high > 2) $hasil = "Strokecard Tinggi";
        if ($medium > 3 && $medium < 7) $hasil = "Strokecard Menengah";
        if ($low > 5 && $low < 9) $hasil = "Strokecard Rendah";

        return array(
            'high' => $high,
            'medium' => $medium,
            'low' => $low, 
            'hasil' => $hasil
        );
    }
}
