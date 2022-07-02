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
        $data['kardiovaskular'] = $this->MonitoringModel->getTotalKardiovaskular($institusi[0]->id_institusi);
        $data['stroke']     = $this->MonitoringModel->getTotalStroke($institusi[0]->id_institusi);
        $data['list']       = $this->MonitoringModel->getListSudahScreening($institusi[0]->id_institusi);

        return view('admin/view_monitoring_risiko_penyakit', $data);
    }

    public function RisikoDiabetes()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['list']      = $this->MonitoringModel->getLastListScreening($institusi[0]->id_institusi);

        $risiko_sangat_tinggi = 0;
        $risiko_tinggi = 0;
        $risiko_sedang = 0;
        $risiko_rendah = 0;
        $risiko_sangat_rendah = 0;

        foreach($data['list'] as $row){
            switch($row->hasil_diabetes){
                case "Risiko Sangat Tinggi": $risiko_sangat_tinggi++;
                break;
                case "Risiko Tinggi": $risiko_tinggi++;
                break;
                case "Risiko Sedang": $risiko_sedang++;
                break;
                case "Risiko Rendah": $risiko_rendah++;
                break;
                default: $risiko_sangat_rendah++; 
            }
        }

        $data['risiko_sangat_tinggi'] = $risiko_sangat_tinggi;
        $data['risiko_tinggi'] = $risiko_tinggi;
        $data['risiko_sedang'] = $risiko_sedang;
        $data['risiko_rendah'] = $risiko_rendah;
        $data['risiko_sangat_rendah'] = $risiko_sangat_rendah;

        return view('admin/view_monitoring_risiko_diabetes', $data);
    }

    public function RisikoStroke()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['list']      = $this->MonitoringModel->getLastListScreening($institusi[0]->id_institusi);

        $risiko_tinggi = 0;
        $risiko_menengah = 0;
        $risiko_rendah = 0;

        foreach($data['list'] as $row){
            switch($row->hasil_stroke){
                case "Risiko Tinggi": $risiko_tinggi++;
                break;
                case "Risiko Menengah": $risiko_menengah++;
                break;
                default: $risiko_rendah++;
            }
        }

        $data['risiko_tinggi'] = $risiko_tinggi;
        $data['risiko_menengah'] = $risiko_menengah;
        $data['risiko_rendah'] = $risiko_rendah;

        return view('admin/view_monitoring_risiko_stroke', $data);
    }

    public function RisikoKardiovaskular()
    {
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data['institusi'] = $institusi;
        $data['list']      = $this->MonitoringModel->getLastListScreening($institusi[0]->id_institusi);

        $risiko_tinggi = 0;
        $risiko_menengah = 0;
        $risiko_rendah = 0;
        $tidak_berisiko = 0;

        foreach($data['list'] as $row){
            switch($row->hasil_kardiovaskular){
                case "Risiko Tinggi": $risiko_tinggi++;
                break;
                case "Risiko Menengah": $risiko_menengah++;
                break;
                case "Risiko Rendah" : $risiko_rendah++;
                break;
                default: $tidak_berisiko++;
            }
        }

        $data['risiko_tinggi'] = $risiko_tinggi;
        $data['risiko_menengah'] = $risiko_menengah;
        $data['risiko_rendah'] = $risiko_rendah;
        $data['tidak_berisiko'] = $tidak_berisiko;

        return view('admin/view_monitoring_risiko_kardiovaskular', $data);
    }
}
