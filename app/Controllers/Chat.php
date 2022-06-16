<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LoginModel;
use App\Models\ChatModel;
use App\Models\InstitusiModel;

class Chat extends BaseController
{
    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->LoginModel       = new LoginModel();
        $this->ChatModel        = new ChatModel();
        $this->InstitusiModel   = new InstitusiModel();

        helper('auth_helper');
        $this->token = checkToken($this->session->get('token'), $this->LoginModel);
    }

    public function index()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);
        $data['list_users'] = $this->ChatModel->getUserWithStatus($this->token->id_login, $institusi[0]->id_institusi);

        $data['nama_institusi'] = $this->session->get('nama');
        return view('admin/view_chat', $data);
    }

}