<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

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
            'id_login'          => $this->LoginModel->insertID(),
            'nama_klinik'       => $this->request->getPost('nama'),
            'email_klinik'      => $this->request->getPost('email'),
            'no_telp_klinik'    => $this->request->getPost('no_telp'),
            'alamat_klinik'     => $this->request->getPost('alamat'),
        );

        $img = $this->request->getFile('logo');
        if(($img->getName() != '')){
            $logo = $this->uploadImage($img);
            if(isset($logo['errors'])){
                $session->setFlashdata('msg', $logo['errors']);
                return redirect()->to(base_url('/Klinik'));
            }else{
                $data['logo'] = $logo['path'];
            }
        }

        $this->KlinikModel->insert($data);

        $session->setFlashdata('msg', 'Data berhasil ditambahkan');
        return redirect()->to('/Klinik');
    }

    public function update(){
        $session = session();

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('email'),
        );

        if($this->request->getPost('password') != ''){
            $data['password'] = md5($this->request->getPost('password'));
        }

        $this->LoginModel->update($this->request->getPost('id_login'), $data);

        $data = array(
            'nama_klinik'       => $this->request->getPost('nama'),
            'email_klinik'      => $this->request->getPost('email'),
            'no_telp_klinik'    => $this->request->getPost('no_telp'),
            'alamat_klinik'     => $this->request->getPost('alamat')
        );

        $img = $this->request->getFile('logo');
        if(($img->getName() != '')){
            $logo = $this->uploadImage($img);
            if(isset($logo['errors'])){
                $session->setFlashdata('errors', $logo['errors']);
                return redirect()->to(base_url('/Klinik'));
            }else{
                $data['logo'] = $logo['path'];
            }
        }

        $this->KlinikModel->update($this->request->getPost('id_klinik'), $data);

        $session->setFlashdata('msg', 'Data berhasil di edit');
        return redirect()->to('/Klinik');
    }

    public function delete($id_klinik, $id_login){
        $session = session();

        $this->KlinikModel->delete(['id_klinik' => $id_klinik]);
        $this->LoginModel->delete(['id_login' => $id_login]);

        $session->setFlashdata('msg', 'Data berhasil dihapus');

        echo site_url('/Klinik');
    }

    public function uploadImage($img){
        $validationRule = [
            'logo' => [
                'label' => 'Image File',
                'rules' => 'uploaded[logo]'
                    . '|is_image[logo]'
                    . '|mime_in[logo,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[logo,100]'
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return $data;
        }

        // dd($img);

        if (! $img->hasMoved()) {
            $name = $img->getRandomName();
            $img->move('./media/klinik/', $name, true);

            $data = ['path' => $name];
            return $data;
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return $data;
        }
    }
}
