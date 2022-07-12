<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DetailStrokeModel;
use App\Models\DetailDiabetesModel;
use App\Models\DetailKardiovaskularModel;
use App\Models\LoginModel;
use App\Models\UserModel;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Pemeriksaan extends ResourceController
{
    protected $modelName = 'App\Models\PemeriksaanModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->DiabetesModel    = new DetailDiabetesModel();
        $this->StrokeModel      = new DetailStrokeModel();
        $this->KardiovaskularModel  = new DetailKardiovaskularModel();
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
        if(!$check) return $this->failUnauthorized("Invalid token"); 
        
        return $this->respond($this->model->get_all());
    }

    public function show($slug = null, $id = null)
    {
        $check = $this->checkToken();
        if(!$check) return $this->failUnauthorized("Invalid token"); 

        if($slug == 'user'){
            $data = $this->model->get_user_by_id_latest($id);
            return $this->respond($data);
        }

        if($slug == 'userAll'){
            $data = $this->model->get_user_by_id_all($id);
            return $this->respond($data);
        }

        $record = $this->model->get_by_id($id);
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
        if(!$check) return $this->failUnauthorized("Invalid token"); 

        $data = $this->request->getJSON();
		
		/*Contoh Input API dari Android	[{"answer":"Laki-laki","question":"jenis_kelamin"},{"answer":"11/1/2022","question":"tanggal_lahir"},{"answer":"3432","question":"tinggi_badan"},{"answer":"34324","question":"berat_badan"},{"answer":"2","question":"aktivitas_fisik"},{"answer":"2","question":"merokok"},{"answer":"324234","question":"lingkar_pinggang"},{"answer":"1","question":"histori_hipertensi"},{"answer":"2","question":"tekanan_darah"},{"answer":"1","question":"gula_darah"},{"answer":"3","question":"kadar_gula"},{"answer":"3","question":"kadar_kolesterol"},{"answer":"3","question":"riwayat_stroke"},{"answer":"3","question":"irama_jantung"},{"answer":"2","question":"buah_sayur"},{"answer":"2","question":"obat_hipertensi"},{"answer":"2","question":"keturunan"},{"answer":"4","question":"kolesterol_hdl"},{"answer":"69","question":"id_user"}]
		*/

        // Update Following Input API yang ada di repo AlgoTA
        $decoded_json = array();

        foreach($data as $indicator)
        {
            $decoded_json[$indicator->question] = $indicator->answer;
        }

        $data = (object) $decoded_json;
        // Update Ends Here


        $diabetes   = $this->get_diabetes($data);
        $stroke     = $this->get_stroke($data);
        $kardiovaskular = $this->get_kardiovaskular($data);

        $data_pemeriksaan = array(
            'id_user' => $data->id_user,
            'hasil_diabetes' => $diabetes['hasil'],
            'hasil_kardiovaskular' => $kardiovaskular['hasil'],
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

        $data_update = array(
            'sudah_screening'   => 1,
            'risiko_diabetes'   => $diabetes['hasil'] == 'Risiko Tinggi' || $diabetes['hasil'] == 'Risiko Sangat Tinggi' ? 1 : 0,
            'risiko_kardiovaskular' => $kardiovaskular['hasil'] == 'Risiko Tinggi' ? 1 : 0,
            'risiko_stroke'     => $stroke['hasil'] == 'Risiko Tinggi' ? 1 : 0,
            'tgl_lahir'         => date("Y-m-d", strtotime($data->tanggal_lahir)),
            'jenis_kelamin'     => $data->jenis_kelamin,
            'tinggi_badan'      => $data->tinggi_badan,
            'berat_badan'       => $data->berat_badan
        );

        $this->UserModel->update_data($data->id_user, $data_update);
        $this->DiabetesModel->save($data);
        $this->StrokeModel->save($data);
        $this->KardiovaskularModel->save($data);

        return $this->respondCreated($this->model->get_by_id($data->id_pemeriksaan), 'Pemeriksaan created');
    }

    // Update All Indicator
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

        if($data->aktivitas_fisik !== 1){
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

        if($data->gula_darah == 1){
            $score += 5;
        }

        if($data->buah_sayur == 2){
            $score += 1;
        }

        if($data->obat_hipertensi == 2){
            $score += 2;
        }

        if($data->keturunan == 3){
            $score += 5;
        }
        elseif($data->keturunan == 2){
            $score += 3;
        }

        if($score > 20){
            $diabetes_risk = "Risiko Sangat Tinggi";
        }
        elseif($score >= 15){
            $diabetes_risk = "Risiko Tinggi";
        }
        elseif($score >= 12){
            $diabetes_risk = "Risiko Sedang";
        }
        elseif($score >= 7){
            $diabetes_risk = "Risiko Sedikit Tinggi";
        }
        else{
            $diabetes_risk = "Risiko Rendah";
        }

        return array(
            'hasil' => $diabetes_risk,
            'score' => $score
        );
    }

    // Update All Indicator
    public function get_stroke($data)
    {
        $high = 0;
        $medium = 0;
        $low = 0;

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

        if($data->aktivitas_fisik == 1){
            $low++;
        } else if($data->aktivitas_fisik == 3) {
            $medium++;
        } else {
            $high++;
        }

        if($data->merokok == 3){
            $low++;
        } else if($data->merokok == 2) {
            $medium++;
        } else {
            $high++;
        }

        if($data->tekanan_darah == 3){
            $low++;
        } else if($data->tekanan_darah == 2) {
            $medium++;
        } else {
            $high++;
        }

        if($data->kadar_kolesterol == 3){
            $low++;
        } else if($data->kadar_kolesterol  == 2) {
            $medium++;
        } else {
            $high++;
        }

        if($data->riwayat_stroke  == 2){
            $low++;
        } else if($data->riwayat_stroke  == 3) {
            $medium++;
        } else {
            $high++;
        }

        if($data->irama_jantung == 3){
            $low++;
        } else if($data->irama_jantung  == 2) {
            $medium++;
        } else {
            $high++;
        }

        if($data->kadar_gula == 1){
            $low++;
        } else if($data->kadar_gula == 2) {
            $medium++;
        } else {
            $high++;
        }

        $hasil = "";
        //Rework Stroke Scoring based on Checklist
        if ($high >= 3) {
            $hasil = "Risiko Tinggi";
        }
        else if ($high + $medium >= 4){
            $hasil = "Risiko Menengah";
        } else {
            $hasil = "Risiko Rendah";
        }

        return array(
            'high' => $high,
            'medium' => $medium,
            'low' => $low,
            'hasil' => $hasil
        );
    }

    public function get_kardiovaskular($data)
    {
        $year = date('Y');
        $birth_day = explode("/", $data->tanggal_lahir);
        $birth_year = $birth_day[2];
        $age = intval($year) - intval($birth_year);

        $isMale = False;
        $smoker = True;
        $hypertensive = False;
        $diabetic = False;

        if($data->jenis_kelamin == "Laki-laki"){
            $isMale = True;
        }

        if($data->merokok == 3){
            $smoker = False;
        }

        if ($data->obat_hipertensi == 2){
            $hypertensive = True;
        }

        if ($data->gula_darah == 1){
           $diabetic = True;
        }
        
        if($data->keturunan == 3){
            $diabetic = True;
        }
        elseif($data->keturunan == 2){
            $diabetic = True;
        }

        if($data->tekanan_darah == 3){
            $sbp = 110;
        }else if($data->tekanan_darah == 2){
            $sbp = 130;
        }else{
            $sbp = 150;
        }

        if($data->kadar_kolesterol == 3){
            $chol = 190;
        }else if($data->kadar_kolesterol == 2){
            $chol = 220;
        }else{
            $chol = 250;
        }

        if($data->kolesterol_hdl == 3){
            $hdl = 60;
        }else if($data->kolesterol_hdl == 2){
            $hdl = 40;
        }else{
            $hdl = 20;
        }

        if ($age < 40 || $age > 79){
            return array(
                'score' => 0,
                'hasil' => "Risiko Rendah"
            );
        }
        $lnAge = log($age);
        $lnTotalChol = log($chol);
        $lnHdl = log($hdl);
        if($hypertensive == True){
            $trlnsbp = log($sbp);
        }else{
            $trlnsbp = 0;
        }
        if($hypertensive == True){
            $ntlnsbp = 0;
        }else{
            $ntlnsbp = log($sbp);
        }
        $ageTotalChol = $lnAge * $lnTotalChol;
        $ageHdl = $lnAge * $lnHdl;
        $agetSbp = $lnAge * $trlnsbp;
        $agentSbp = $lnAge * $ntlnsbp;
        if($smoker == True){
            $ageSmoke = $lnAge;
        }else{
            $ageSmoke = 0;
        }
        if (!$isMale){
            $s010Ret = 0.9665;
            $mnxbRet = -29.18;
            $predictRet = (
                -29.799 * $lnAge
                + 4.884 * $lnAge ** 2
                + 13.54 * $lnTotalChol
                + -3.114 * $ageTotalChol
                + -13.578 * $lnHdl
                + 3.149 * $ageHdl
                + 2.019 * $trlnsbp
                + 1.957 * $ntlnsbp
                + -1.665 * $ageSmoke
            );
            if($smoker == True){
                $predictRet += 7.574;
            }
            if($diabetic == True){
                $predictRet += 0.661;
            }
        }
        else{
            $s010Ret = 0.9144;
            $mnxbRet = 61.18;
            $predictRet = (
                12.344 * $lnAge
                + 11.853 * $lnTotalChol
                + -2.664 * $ageTotalChol
                + -7.99 * $lnHdl
                + 1.769 * $ageHdl
                + 1.797 * $trlnsbp
                + 1.764 * $ntlnsbp
                + -1.795 * $ageSmoke
            );
            if($smoker == True){
                $predictRet += 7.837;
            }
            if($diabetic == True){
                $predictRet += 0.658;
            }
        }

        $pct = 1 - $s010Ret ** exp($predictRet - $mnxbRet);
        $kardiovaskular_res = round($pct * 100 * 10) / 10;
        $hasil = "";

        if ($kardiovaskular_res < 5){
            $hasil = "Risiko Rendah";
        }
        elseif ($kardiovaskular_res >= 5 and $kardiovaskular_res <= 7.4){
            $hasil = "Risiko Ambang Batas";
        }
        elseif ($kardiovaskular_res >= 7.5 and $kardiovaskular_res <= 19.9){
            $hasil = "Risiko Menengah";
        }
        elseif ($kardiovaskular_res >= 20){
            $hasil = "Risiko Tinggi";
        }

        return array(
            'score' => $kardiovaskular_res,
            'hasil' => $hasil
        );
    }
}
