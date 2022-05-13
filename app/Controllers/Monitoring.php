<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LoginModel;
use App\Models\KlinikModel;
use App\Models\MonitoringModel;

class Monitoring extends BaseController
{
    // protected $helpers = ['auth_helper'];

    public function __construct()
    {
        $this->cachePage(1);

        $this->session = \Config\Services::session();
        
        $this->LoginModel = new loginModel();
        $this->KlinikModel = new KlinikModel();
        $this->MonitoringModel = new MonitoringModel();

        helper('auth_helper');
        $this->token = checkToken($this->session->get('token'), $this->LoginModel);
    }

    public function JumlahScreening()
    {   
        $klinik = $this->KlinikModel->getKlinik_by_id_login($this->token->id_login);

        $data['sudah_screening']    = $this->MonitoringModel->getTotalSudahScreening($klinik[0]->id_klinik);
        $data['belum_screening']    = $this->MonitoringModel->getTotalBelumScreening($klinik[0]->id_klinik);
        $data['list']               = $this->MonitoringModel->getListScreening($klinik[0]->id_klinik);

        return view('admin/view_monitoring_jumlah_screening', $data);
    }

    public function RisikoPenyakit()
    {
        $klinik = $this->KlinikModel->getKlinik_by_id_login($this->token->id_login);

        $data['diabetes']   = $this->MonitoringModel->getTotalDiabetes($klinik[0]->id_klinik);
        $data['kolesterol'] = $this->MonitoringModel->getTotalKolesterol($klinik[0]->id_klinik);
        $data['stroke']     = $this->MonitoringModel->getTotalStroke($klinik[0]->id_klinik);
        $data['list']       = $this->MonitoringModel->getListScreening($klinik[0]->id_klinik);

        return view('admin/view_monitoring_risiko_penyakit', $data);
    }

    public function RisikoDiabetes()
    {
        $klinik = $this->KlinikModel->getKlinik_by_id_login($this->token->id_login);

        $data['diabetes']       = $this->MonitoringModel->getTotalDiabetes($klinik[0]->id_klinik);
        $data['tidak_diabetes'] = $this->MonitoringModel->getTotalTidakDiabetes($klinik[0]->id_klinik);
        $data['list']           = $this->MonitoringModel->getListScreening($klinik[0]->id_klinik);

        return view('admin/view_monitoring_risiko_diabetes', $data);
    }

    public function RisikoStroke()
    {
        $klinik = $this->KlinikModel->getKlinik_by_id_login($this->token->id_login);

        $data['stroke']         = $this->MonitoringModel->getTotalStroke($klinik[0]->id_klinik);
        $data['tidak_stroke']   = $this->MonitoringModel->getTotalTidakStroke($klinik[0]->id_klinik);
        $data['list']           = $this->MonitoringModel->getListScreening($klinik[0]->id_klinik);

        return view('admin/view_monitoring_risiko_stroke', $data);
    }

    public function RisikoKolesterol()
    {
        $klinik = $this->KlinikModel->getKlinik_by_id_login($this->token->id_login);

        $data['kolesterol']         = $this->MonitoringModel->getTotalKolesterol($klinik[0]->id_klinik);
        $data['tidak_kolesterol']   = $this->MonitoringModel->getTotalTidakKolesterol($klinik[0]->id_klinik);
        $data['list']               = $this->MonitoringModel->getListScreening($klinik[0]->id_klinik);

        return view('admin/view_monitoring_risiko_kolesterol', $data);
    }
}
