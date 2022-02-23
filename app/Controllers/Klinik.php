<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\KlinikModel;
use App\Models\LoginModel;

class Klinik extends BaseController
{
    public function __construct()
    {
        $this->KlinikModel  = new KlinikModel();
        $this->LoginModel   = new LoginModel();
    }

    public function index()
    {
        $data['klinik'] = $this->KlinikModel->getKlinik();
        return view('admin/view_klinik', $data);
    }

    public function add(){
        $session = session();

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('email'),
            'password'  => md5($this->request->getPost('password')),
            'role'      => "K",
        );

        $this->LoginModel->insert($data);

        $data = array(
            'id_login'      => $this->LoginModel->insertID(),
            'nama_klinik'   => $this->request->getPost('nama'),
            'email_klinik'  => $this->request->getPost('email'),
            'alamat_klinik' => $this->request->getPost('alamat')
        );

        $this->KlinikModel->insert($data);

        $session->setFlashdata('msg', 'Data berhasil ditambahkan');
        return redirect()->to('/Klinik');
    }

    public function delete($id_klinik, $id_login){
        $session = session();

        $this->KlinikModel->delete(['id_klinik' => $id_klinik]);
        $this->LoginModel->delete(['id_login' => $id_login]);

        $session->setFlashdata('msg', 'Data berhasil dihapus');

        echo site_url('/Klinik');
    }
}
