<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LoginModel;

class Chat extends BaseController
{
    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->LoginModel       = new LoginModel();

        helper('auth_helper');
        $this->token = checkToken($this->session->get('token'), $this->LoginModel);
    }

    public function index()
    {
        $data['nama_institusi'] = $this->session->get('nama');
        return view('admin/view_chat', $data);
    }

}
