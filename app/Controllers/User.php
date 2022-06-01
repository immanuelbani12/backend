<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\UserModel;
use App\Models\LoginModel;
use App\Models\InstitusiModel;
use App\Models\PemeriksaanModel;
use App\Models\PemeriksaanKebugaranModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->session                      = \Config\Services::session();
        $this->UserModel                    = new UserModel();
        $this->LoginModel                   = new LoginModel();
        $this->InstitusiModel               = new InstitusiModel();
        $this->PemeriksaanModel             = new PemeriksaanModel();
        $this->PemeriksaanKebugaranModel    = new PemeriksaanKebugaranModel();

        helper('auth_helper');
        $this->token = checkToken($this->session->get('token'), $this->LoginModel);
    }

    public function index()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['peserta'] = $this->UserModel->getUser($institusi[0]->id_institusi);
        return view('admin/view_user', $data);
    }

    public function DetailUser($id_user){
        $data['user']       = $this->UserModel->getUserById($id_user);
        $data['risiko']     = $this->PemeriksaanModel->get_user_by_id_all($id_user);
        $data['kebugaran']  = $this->PemeriksaanKebugaranModel->get_user_by_id_all($id_user);
        return view('admin/view_detail_user', $data);
    }

    public function add(){
        // cek if number is used
        $cek_no_telp = $this->UserModel->cekNoTelp($this->request->getPost('no_telp'));

        if (intval($cek_no_telp[0]->jumlah) > 0) {
            $this->session->setFlashdata('error', 'No Telp sudah digunakan');
            return redirect()->to('/User');
        }

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('no_telp'),
            // 'password'  => md5($this->request->getPost('password')),
            'role'      => "U",
        );

        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $this->LoginModel->insert($data);

        $data = array(
            'id_login'      => $this->LoginModel->insertID(),
            'id_institusi'  => $institusi[0]->id_institusi,
            'kode_user'     => $this->request->getPost('kode_user'),
            'nama_user'     => $this->request->getPost('nama'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tinggi_badan'  => $this->request->getPost('tinggi_badan'),
            'berat_badan'   => $this->request->getPost('berat_badan'),
        );

        $this->UserModel->insert($data);

        $this->session->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to('/User');
    }

    public function update(){

        // cek if number is used
        $no_telp = $this->request->getPost('no_telp');
        $cek_no_telp = $this->UserModel->cekNoTelp($no_telp);
        $user = $this->UserModel->getUserById($this->request->getPost('id_user'));

        if ($user[0]->no_telp != $no_telp && intval($cek_no_telp[0]->jumlah) > 0) {
            $this->session->setFlashdata('error', 'No Telp sudah digunakan');
            return redirect()->to('/User');
        }

        $data = array(
            'nama'      => $this->request->getPost('nama'),
            'username'  => $this->request->getPost('no_telp'),
        );

        $this->LoginModel->update($this->request->getPost('id_login'), $data);

        $data = array(
            'kode_user'     => $this->request->getPost('kode_user'),
            'nama_user'     => $this->request->getPost('nama'),
            'no_telp'       => $this->request->getPost('no_telp'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tinggi_badan'  => $this->request->getPost('tinggi_badan'),
            'berat_badan'   => $this->request->getPost('berat_badan'),
        );

        $this->UserModel->update($this->request->getPost('id_user'), $data);

        $this->session->setFlashdata('success', 'Data berhasil di edit');
        return redirect()->to('/User');
    }

    public function delete($id_user, $id_login){
        $this->UserModel->delete(['id_user' => $id_user]);
        $this->LoginModel->delete(['id_login' => $id_login]);

        $this->session->setFlashdata('success', 'Data berhasil dihapus');

        echo site_url('/User');
    }

    public function UserTemplate(){
        $inputFileName = '../public/excel/data_peserta.xlsx';

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
        $file_excel = $this->request->getFile('data_peserta');
        
        $ext = $file_excel->getClientExtension();
        if($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();

        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        foreach($data as $x => $row) {
            $db = \Config\Database::connect();
            $cekLogin = $db->table('login')->getWhere(['username'=>$row[2]])->getResult();

            if ($row[1] == NULL || $row[2] == NULL || $row[0] == "No" || count($cekLogin) > 0) 
                continue;
            
            $nama       = $row[1];
            $no_telp    = $row[2];

            // cek if number is used
            $cek_no_telp = $this->UserModel->cekNoTelp($no_telp);

            if (intval($cek_no_telp[0]->jumlah) > 0) {
                continue;
            }

            $data = array(
                'nama'      => $nama,
                'username'  => $no_telp,
                'role'      => "U",
            );
    
            $this->LoginModel->insert($data);
    
            $data = array(
                'id_login'      => $this->LoginModel->insertID(),
                'id_institusi'     => $institusi[0]->id_institusi,
                'nama_user'     => $nama,
                'no_telp'       => $no_telp
            );
    
            $this->UserModel->insert($data);
            
        }
        
        $this->session->setFlashdata('success', 'Berhasil import excel');
        return redirect()->to('/User');
    }
}
