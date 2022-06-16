<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LoginModel;
use App\Models\ArtikelModel;
use App\Models\InstitusiModel;

class Artikel extends BaseController
{
    public function __construct()
    {
        $this->session          = \Config\Services::session();
        $this->LoginModel       = new LoginModel();
        $this->ArtikelModel     = new ArtikelModel();
        $this->InstitusiModel   = new InstitusiModel();

        helper('auth_helper');
        $this->token = checkToken($this->session->get('token'), $this->LoginModel);
    }

    public function index()
    {
        //$institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        // $data['institusi'] = $institusi;
        $data['artikel'] = $this->ArtikelModel->getArtikel($this->token->id_login);
        return view('admin/view_artikel', $data);
    }

    public function tambahArtikel()
    {
        // $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        // $data['institusi'] = $institusi;
        return view('admin/view_tambah_artikel');
    }

    public function editArtikel($id_artikel)
    {
        // $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        // $data['institusi'] = $institusi;
        $data['artikel'] = $this->ArtikelModel->getArtikelById($id_artikel);
        return view('admin/view_edit_artikel', $data);
    }

    public function add(){
        $data = array(
            'id_login'          => $this->token->id_login,
            'judul_artikel'     => $this->request->getPost('judul_artikel'),
            'kategori_artikel'  => $this->request->getPost('kategori_artikel'),
            'jenis_artikel'     => $this->request->getPost('jenis_artikel'),
        );

        $img = $this->request->getFile('gambar_artikel');
        if(($img->getName() != '')){
            $gambar = $this->uploadImage($img);
            if(isset($gambar['errors'])){
                $this->session->setFlashdata('error', $gambar['errors']);
                return redirect()->to(base_url('/Artikel/tambahArtikel'));
            }else{
                $data['gambar_artikel'] = $gambar['path'];
            }
        }

        if($this->request->getPost('jenis_artikel') == '1') {
            $data['isi_artikel'] = $this->request->getPost('text_artikel');
        } else {
            $data['isi_artikel'] = $this->request->getPost('video_artikel');
        }

        $this->ArtikelModel->insert($data);

        $this->session->setFlashdata('success', 'Artikel berhasil ditambahkan');
        return redirect()->to('/Artikel');
    }

    public function update(){
        $data = array(
            'judul_artikel'     => $this->request->getPost('judul_artikel'),
            'kategori_artikel'  => $this->request->getPost('kategori_artikel'),
            'jenis_artikel'     => $this->request->getPost('jenis_artikel'),
        );

        $img = $this->request->getFile('gambar_artikel');
        if(($img->getName() != '')){
            $gambar = $this->uploadImage($img);
            if(isset($gambar['errors'])){
                $this->session->setFlashdata('error', $gambar['errors']);
                return redirect()->to(base_url('/Artikel/editArtikel'));
            }else{
                $data['gambar_artikel'] = $gambar['path'];
            }
        }

        if($this->request->getPost('jenis_artikel') == '1') {
            $data['isi_artikel'] = $this->request->getPost('text_artikel');
        } else {
            $data['isi_artikel'] = $this->request->getPost('video_artikel');
        }

        $this->ArtikelModel->update($this->request->getPost('id_artikel'), $data);

        $this->session->setFlashdata('success', 'Artikel berhasil di edit');
        return redirect()->to('/Artikel');
    }

    public function delete($id_artikel){
        $this->ArtikelModel->delete(['id_artikel' => $id_artikel]);

        $this->session->setFlashdata('success', 'Data berhasil dihapus');

        echo site_url('/Artikel');
    }

    public function uploadImage($img){
        $validationRule = [
            'gambar_artikel' => [
                'label' => 'Image File',
                'rules' => 'uploaded[gambar_artikel]'
                    . '|is_image[gambar_artikel]'
                    . '|mime_in[gambar_artikel,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[gambar_artikel,1000]'
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return $data;
        }

        // dd(getcwd().DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'institusi'.DIRECTORY_SEPARATOR);

        if (! $img->hasMoved()) {
            $name = $img->getRandomName();
            $img->move(getcwd().DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'artikel'.DIRECTORY_SEPARATOR, $name, true);

            $data = ['path' => $name];
            return $data;
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            return $data;
        }
    }
}
