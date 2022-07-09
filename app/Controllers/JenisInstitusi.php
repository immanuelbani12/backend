<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\JenisInstitusiModel;

class JenisInstitusi extends BaseController
{
    public function __construct()
    {
        $this->session      = \Config\Services::session();
        $this->JenisModel   = new JenisInstitusiModel();
    }

    public function index()
    {
        $data['jenis'] = $this->JenisModel->getJenis();
        return view('admin/view_jenis', $data);
    }

    public function add(){
        $data = array(
            'nama_jenis'       => $this->request->getPost('nama'),
        );

        $this->JenisModel->insert($data);

        $this->session->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/JenisInstitusi');
    }

    public function update(){
        $data = array(
            'nama_jenis'       => $this->request->getPost('nama'),
        );

        $this->JenisModel->update($this->request->getPost('id_jenis'), $data);

        $this->session->setFlashdata('success', 'Data berhasil di edit');
        return redirect()->to('/JenisInstitusi');
    }

    public function delete($id_jenis){
        $this->JenisModel->delete(['id_jenis' => $id_jenis]);

        $this->session->setFlashdata('success', 'Data berhasil dihapus');

        echo site_url('/JenisInstitusi');
    }
}
