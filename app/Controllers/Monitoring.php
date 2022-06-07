<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\LoginModel;
use App\Models\InstitusiModel;
use App\Models\MonitoringModel;

class Monitoring extends BaseController
{
    // protected $helpers = ['auth_helper'];

    public function __construct()
    {
        $this->cachePage(1);

        $this->session = \Config\Services::session();
        
        $this->LoginModel = new loginModel();
        $this->InstitusiModel = new InstitusiModel();
        $this->MonitoringModel = new MonitoringModel();

        helper('auth_helper');
        $this->token = checkToken($this->session->get('token'), $this->LoginModel);
    }

    public function JumlahScreening()
    {   
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['sudah_screening']    = $this->MonitoringModel->getTotalSudahScreening($institusi[0]->id_institusi);
        $data['belum_screening']    = $this->MonitoringModel->getTotalBelumScreening($institusi[0]->id_institusi);
        $data['list']               = $this->MonitoringModel->getListScreening($institusi[0]->id_institusi);

        return view('admin/view_monitoring_jumlah_screening', $data);
    }

    public function RisikoPenyakit()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['diabetes']   = $this->MonitoringModel->getTotalDiabetes($institusi[0]->id_institusi);
        $data['kolesterol'] = $this->MonitoringModel->getTotalKolesterol($institusi[0]->id_institusi);
        $data['stroke']     = $this->MonitoringModel->getTotalStroke($institusi[0]->id_institusi);
        $data['list']       = $this->MonitoringModel->getListScreening($institusi[0]->id_institusi);

        return view('admin/view_monitoring_risiko_penyakit', $data);
    }

    public function RisikoDiabetes()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['diabetes']       = $this->MonitoringModel->getTotalDiabetes($institusi[0]->id_institusi);
        $data['tidak_diabetes'] = $this->MonitoringModel->getTotalTidakDiabetes($institusi[0]->id_institusi);
        $data['list']           = $this->MonitoringModel->getListScreening($institusi[0]->id_institusi);

        return view('admin/view_monitoring_risiko_diabetes', $data);
    }

    public function RisikoStroke()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['stroke']         = $this->MonitoringModel->getTotalStroke($institusi[0]->id_institusi);
        $data['tidak_stroke']   = $this->MonitoringModel->getTotalTidakStroke($institusi[0]->id_institusi);
        $data['list']           = $this->MonitoringModel->getListScreening($institusi[0]->id_institusi);

        return view('admin/view_monitoring_risiko_stroke', $data);
    }

    public function RisikoKolesterol()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['kolesterol']         = $this->MonitoringModel->getTotalKolesterol($institusi[0]->id_institusi);
        $data['tidak_kolesterol']   = $this->MonitoringModel->getTotalTidakKolesterol($institusi[0]->id_institusi);
        $data['list']               = $this->MonitoringModel->getListScreening($institusi[0]->id_institusi);

        return view('admin/view_monitoring_risiko_kolesterol', $data);
    }
}
