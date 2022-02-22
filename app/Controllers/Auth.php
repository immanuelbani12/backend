<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
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

            $query = $this->UserModel->getLoginToken($username, $token);
        }else{
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");

            $query = $this->UserModel->getLogin($username, $password);
            if(!count($query)>0) {
                return redirect()->to('/Auth/masuk');
            } 
            
            $token = $this->getToken(50);

            $this->UserModel->update_data('id_login', 'login', $query[0]->id_login, array('token' => $token));
        }

        if (count($query)>0){
            $session = \Config\Services::session();
            foreach ($query as $row)
            {
                $session->set("id_login",$row->id_login);
                $session->set("nama",$row->nama);
                $session->set("username",$row->username);
                $session->set("role",$row->role);
                $session->set("token",$token);
                if ($row->role == "A"){
                    return redirect()->to('/Monitoring');
                }
                else if ($row->role == "K"){
                    // return redirect()->to(site_url().'/Auth/masuk');
                }
            }
        }else{
            return redirect()->to('/Auth/masuk');
        }
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        redirect(site_url().'/Auth/masuk');
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