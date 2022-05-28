<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

use App\Models\InstitusiModel;
use App\Models\JenisInstitusiModel;
use App\Models\LoginModel;

class Institusi extends BaseController
{
    public function __construct()
    {
        $this->session              = \Config\Services::session();
        $this->InstitusiModel       = new InstitusiModel();
        $this->JenisInstitusiModel  = new JenisInstitusiModel();
        $this->LoginModel           = new LoginModel();
    }

    public function index()
    {
        $data['institusi']  = $this->InstitusiModel->getInstitusi();
        $data['jenis']      = $this->JenisInstitusiModel->getJenis();

        return view('admin/view_institusi', $data);
    }

    public function add(){
         // cek if email is used
         $cek_email = $this->InstitusiModel->cekEmail($this->request->getPost('email'));

         if (intval($cek_email[0]->jumlah) > 0) {
             $this->session->setFlashdata('error', 'Email sudah digunakan');
             return redirect()->to('/Institusi');
         }

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('email'),
            'password'  => md5($this->request->getPost('password')),
            'role'      => "I",
        );

        $this->LoginModel->insert($data);

        $data = array(
            'id_login'          => $this->LoginModel->insertID(),
            'id_jenis'          => $this->request->getPost('id_jenis'),
            'nama_institusi'    => $this->request->getPost('nama'),
            'email_institusi'   => $this->request->getPost('email'),
            'no_telp_institusi' => $this->request->getPost('no_telp'),
            'alamat_institusi'  => $this->request->getPost('alamat'),
        );

        $img = $this->request->getFile('logo');
        if(($img->getName() != '')){
            $logo = $this->uploadImage($img);
            if(isset($logo['errors'])){
                $this->session->setFlashdata('error', $logo['errors']);
                return redirect()->to(base_url('/Institusi'));
            }else{
                $data['logo'] = $logo['path'];
            }
        }

        $this->InstitusiModel->insert($data);

        $this->session->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/Institusi');
    }

    public function update(){
        // cek if email is used
        // $cek_email = $this->InstitusiModel->cekEmail($this->request->getPost('email'));

        // if (count($cek_email) > 0) {
        //     $this->session->setFlashdata('error', 'Email sudah digunakan');
        //     return redirect()->to('/Institusi');
        // }

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('email'),
        );

        if($this->request->getPost('password') != ''){
            $data['password'] = md5($this->request->getPost('password'));
        }

        $this->LoginModel->update($this->request->getPost('id_login'), $data);

        $data = array(
            'id_jenis'          => $this->request->getPost('id_jenis'),
            'nama_institusi'    => $this->request->getPost('nama'),
            'email_institusi'   => $this->request->getPost('email'),
            'no_telp_institusi' => $this->request->getPost('no_telp'),
            'alamat_institusi'  => $this->request->getPost('alamat')
        );

        $img = $this->request->getFile('logo');
        if(($img->getName() != '')){
            $logo = $this->uploadImage($img);
            if(isset($logo['errors'])){
                $this->session->setFlashdata('error', $logo['errors']);
                return redirect()->to(base_url('/Institusi'));
            }else{
                $data['logo'] = $logo['path'];
            }
        }

        $this->InstitusiModel->update($this->request->getPost('id_institusi'), $data);

        $this->session->setFlashdata('success', 'Data berhasil di edit');
        return redirect()->to('/Institusi');
    }

    public function delete($id_institusi, $id_login){
        $this->InstitusiModel->delete(['id_institusi' => $id_institusi]);
        $this->LoginModel->delete(['id_login' => $id_login]);

        $this->session->setFlashdata('success', 'Data berhasil dihapus');

        echo site_url('/Institusi');
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

        // dd(getcwd().DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'institusi'.DIRECTORY_SEPARATOR);

        if (! $img->hasMoved()) {
            $name = $img->getRandomName();
            $img->move(getcwd().DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'institusi'.DIRECTORY_SEPARATOR, $name, true);

            $data = ['path' => $name];
            return $data;
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return $data;
        }
    }
}
