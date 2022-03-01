<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\LoginModel;
use App\Models\KlinikModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->UserModel    = new UserModel();
        $this->LoginModel   = new LoginModel();
        $this->KlinikModel   = new KlinikModel();
    }

    public function index()
    {
        $session = session();

        $klinik = $this->KlinikModel->getKlinik_by_id_login($session->get("id_login"));

        $data['pasien'] = $this->UserModel->getUser($klinik[0]->id_klinik);
        return view('admin/view_user', $data);
    }

    public function add(){
        $session = session();

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('no_telp'),
            // 'password'  => md5($this->request->getPost('password')),
            'role'      => "U",
        );

        $klinik = $this->KlinikModel->getKlinik_by_id_login($session->get("id_login"));

        $this->LoginModel->insert($data);

        $data = array(
            'id_login'      => $this->LoginModel->insertID(),
            'id_klinik'     => $klinik[0]->id_klinik,
            'nama_user'     => $this->request->getPost('nama'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tinggi_badan'  => $this->request->getPost('tinggi_badan'),
            'berat_badan'   => $this->request->getPost('berat_badan'),
        );

        $this->UserModel->insert($data);

        $session->setFlashdata('msg', 'Data berhasil ditambahkan');
        return redirect()->to('/User');
    }

    public function update(){
        $session = session();

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('no_telp'),
        );

        $this->LoginModel->update($this->request->getPost('id_login'), $data);

        $data = array(
            'nama_user'     => $this->request->getPost('nama'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tinggi_badan'  => $this->request->getPost('tinggi_badan'),
            'berat_badan'   => $this->request->getPost('berat_badan'),
        );

        $this->UserModel->update($this->request->getPost('id_user'), $data);

        $session->setFlashdata('msg', 'Data berhasil di edit');
        return redirect()->to('/User');
    }

    public function delete($id_user, $id_login){
        $session = session();

        $this->UserModel->delete(['id_user' => $id_user]);
        $this->LoginModel->delete(['id_login' => $id_login]);

        $session->setFlashdata('msg', 'Data berhasil dihapus');

        echo site_url('/User');
    }
}
