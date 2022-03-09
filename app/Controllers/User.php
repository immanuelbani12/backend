<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function UserTemplate(){
        $inputFileName = '../public/excel/data_pasien.xlsx';

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

        $filename = 'DataPasien.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');
        
        $writer = new Xlsx($spreadsheet);
        setlocale(LC_ALL, 'en_US');
        $writer->save('php://output');
        exit();
    }

    public function UserUpload(){
        $session = session();
        $file_excel = $this->request->getFile('data_pasien');
        
        $ext = $file_excel->getClientExtension();
        if($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();

        $klinik = $this->KlinikModel->getKlinik_by_id_login($session->get("id_login"));

        foreach($data as $x => $row) {
            $db = \Config\Database::connect();
            $cekLogin = $db->table('login')->getWhere(['username'=>$row[2]])->getResult();

            if ($row[1] == NULL || $row[2] == NULL || $row[0] == "No" || count($cekLogin) > 0) 
                continue;
            
            $nama       = $row[1];
            $no_telp    = $row[2];

            $data = array(
                'nama'      => $nama,
                'username'  => $no_telp,
                'role'      => "U",
            );
    
            $this->LoginModel->insert($data);
    
            $data = array(
                'id_login'      => $this->LoginModel->insertID(),
                'id_klinik'     => $klinik[0]->id_klinik,
                'nama_user'     => $nama,
                'no_telp'       => $no_telp
            );
    
            $this->UserModel->insert($data);
            
        }
        
        $session->setFlashdata('msg', 'Berhasil import excel');
        return redirect()->to('/User');
    }
}
