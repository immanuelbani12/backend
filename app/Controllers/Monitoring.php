<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LoginModel;
use App\Models\KlinikModel;
use App\Models\MonitoringModel;

class Monitoring extends BaseController
{
    protected $helpers = ['auth_helper'];

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->LoginModel = new loginModel();
        $this->KlinikModel = new KlinikModel();
        $this->MonitoringModel = new MonitoringModel();
    }

    public function JumlahScreening()
    {   
        $token = checkToken($this->session->get('token'), $this->LoginModel);
        $klinik = $this->KlinikModel->getKlinik_by_id_login($token->id_login);

        $data['sudah_screening']    = $this->MonitoringModel->getTotalSudahScreening($klinik[0]->id_klinik);
        $data['belum_screening']    = $this->MonitoringModel->getTotalBelumScreening($klinik[0]->id_klinik);
        $data['list']               = $this->MonitoringModel->getListScreening($klinik[0]->id_klinik);

        return view('admin/view_monitoring_jumlah_screening', $data);
    }

    public function RisikoPenyakit()
    {
        return view('admin/view_monitoring_risiko_penyakit');
    }

    public function RisikoDiabetes()
    {
        return view('admin/view_monitoring_risiko_diabetes');
    }

    public function RisikoStroke()
    {
        return view('admin/view_monitoring_risiko_stroke');
    }

    public function RisikoKolesterol()
    {
        return view('admin/view_monitoring_risiko_kolesterol');
    }
}
