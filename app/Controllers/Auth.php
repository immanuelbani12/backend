<?php

namespace App\Controllers;
use Firebase\JWT\JWT;

use App\Models\LoginModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->LoginModel = new loginModel();
    }

    public function masuk()
    {
        if (isset($_SESSION['username']) && isset($_SESSION['token'])){
            redirect(site_url().'/Auth/login');
        }else{
            return view('pages/masuk');
        }
    }

    public function login()
    {
        if (isset($_SESSION['username']) && isset($_SESSION['token'])){
            $username = $_SESSION['username'];
            $token = $_SESSION['token'];

            $query = $this->LoginModel->getLoginToken($username, $token);
        }else{
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");

            $query = $this->LoginModel->getLogin($username, $password);
            if(!count($query)>0) {
                return redirect()->to('/Auth/masuk');
            } 
            
            $key = getenv('TOKEN_SECRET');
            $payload = array(
                "iat" => 1356999524,
                "nbf" => 1357000000,
                "id_login" => $query[0]->id_login,
                "username" => $query[0]->username
            );
 
            $token = JWT::encode($payload, $key, "HS256");
            
            $dataUpdate = array(
                'token' => $token,
                'login_status' => '1',
            );

            $this->LoginModel->update_data($query[0]->id_login, $dataUpdate);
        }

        if (count($query)>0){
            $session = \Config\Services::session();
            foreach ($query as $row)
            {
                $session->set("nama",$row->nama);
                $session->set("username",$row->username);
                $session->set("role",$row->role);
                $session->set("token",$token);
                if ($row->role == "A"){
                    return redirect()->to('/Institusi');
                }
                else if ($row->role == "I"){
                    return redirect()->to('/User');
                }
            }
        }else{
            return redirect()->to('/Auth/masuk');
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();

        $dataUpdate = array(
            'token' => null,
            'login_status' => '0',
        );

        $this->LoginModel->updateByToken($session->get('token'), $dataUpdate);

        $session->destroy();

        return redirect()->to('/Auth/masuk');
    }

    public function getToken($panjang){
     $token = array(
         range(1,9),
         range('a','z'),
         range('A','Z')
     );

     $karakter = array();
     foreach($token as $key=>$val){
         foreach($val as $k=>$v){
             $karakter[] = $v;
         }
     }

     $token = null;
     for($i=1; $i<=$panjang; $i++){
         // mengambil array secara acak
         $token .= $karakter[rand($i, count($karakter) - 1)];
     }

     return $token;
    }
}