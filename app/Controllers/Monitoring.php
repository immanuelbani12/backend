<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function UnduhDataScreeningPenyakit(){
        $institusi = $this->InstitusiModel->getInstitusi_by_id_login($this->token->id_login);

        $data = $this->MonitoringModel->getLastListScreeningDetail($institusi[0]->id_institusi);

        $inputFileName = '../public/excel/data_skrining.xlsx';

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

        $i = 1;
        // dd($data);
        foreach($data as $row){
            $i++;
            $spreadsheet->getActiveSheet()->setCellValue('A'.$i, $row->kode_user);
            $spreadsheet->getActiveSheet()->setCellValue('B'.$i, $row->nama_user);
            $spreadsheet->getActiveSheet()->setCellValue('C'.$i, '\''.$row->no_telp);
            $spreadsheet->getActiveSheet()->setCellValue('D'.$i, $row->jenis_kelamin == "L" ? "Laki-laki" : "Perempuan");
            $spreadsheet->getActiveSheet()->setCellValue('E'.$i, $row->bmi);

            $aktivitas_fisik = "";
            switch($row->aktivitas_fisik){
                case 1: $aktivitas_fisik = "Ya";
                break;
                case 2: $aktivitas_fisik = "Tidak";
                break;
                case 3: $aktivitas_fisik = "Jarang";
                break;
                default: $aktivitas_fisik = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('F'.$i, $aktivitas_fisik);

            $merokok = "";
            switch($row->merokok){
                case 1: $merokok = "Perokok Aktif";
                break;
                case 2: $merokok = "Sedang berusaha berhenti merokok";
                break;
                case 3: $merokok = "Tidak Merokok";
                break;
                default: $merokok = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('G'.$i, $merokok);

            $tekanan_darah = "";
            switch($row->tekanan_darah){
                case 1: $tekanan_darah = "> 140/90";
                break;
                case 2: $tekanan_darah = "120 - 139 / 80 - 89";
                break;
                case 3: $tekanan_darah = "< 120/80";
                break;
                case 4: $tekanan_darah = "Tidak diketahui";
                break;
                default: $tekanan_darah = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('H'.$i, $tekanan_darah);
            $spreadsheet->getActiveSheet()->setCellValue('I'.$i, $row->gula_darah==1 ? "Ya" : "Tidak");

            $kadar_gula = "";
            switch($row->kadar_gula){
                case 1: $kadar_gula = "< 120";
                break;
                case 2: $kadar_gula = "120 - 150";
                break;
                case 3: $kadar_gula = "> 150";
                break;
                case 4: $kadar_gula = "Tidak diketahui";
                break;
                default: $kadar_gula = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('J'.$i, $kadar_gula);

            $kadar_kolesterol = "";
            switch($row->kadar_kolesterol){
                case 1: $kadar_kolesterol = "> 240";
                break;
                case 2: $kadar_kolesterol = "200-239";
                break;
                case 3: $kadar_kolesterol = "< 200";
                break;
                case 4: $kadar_kolesterol = "Tidak diketahui";
                break;
                default: $kadar_kolesterol = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('K'.$i, $kadar_kolesterol);

            $riwayat_stroke = "";
            switch($row->riwayat_stroke){
                case 1: $riwayat_stroke = "Ya";
                break;
                case 2: $riwayat_stroke = "Tidak";
                break;
                case 3: $riwayat_stroke = "Tidak diketahui";
                break;
                default: $riwayat_stroke = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('L'.$i, $riwayat_stroke);

            $irama_jantung = "";
            switch($row->irama_jantung){
                case 1: $irama_jantung = "Ya";
                break;
                case 2: $irama_jantung = "Tidak diketahui";
                break;
                case 3: $irama_jantung = "Tidak pernah";
                break;
                default: $irama_jantung = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('M'.$i, $irama_jantung);
            $spreadsheet->getActiveSheet()->setCellValue('N'.$i, $row->buah_sayur==1 ? "Setiap hari" : "Tidak setiap hari");
            $spreadsheet->getActiveSheet()->setCellValue('O'.$i, $row->obat_hipertensi==1 ? "Tidak" : "Ya");

            $keturunan = "";
            switch($row->keturunan){
                case 1: $keturunan = "Tidak";
                break;
                case 2: $keturunan = "Kakek/Nenek, Bibi, Paman, atau sepupu dekat";
                break;
                case 3: $keturunan = "Orang tua, Kakak, Adik, Anak kandung";
                break;
                default: $keturunan = "";
            }
            $spreadsheet->getActiveSheet()->setCellValue('P'.$i, $keturunan);
            $spreadsheet->getActiveSheet()->setCellValue('Q'.$i, $row->hasil_diabetes);
            $spreadsheet->getActiveSheet()->setCellValue('R'.$i, $row->hasil_stroke);
            $spreadsheet->getActiveSheet()->setCellValue('S'.$i, $row->hasil_kardiovaskular);
        }


        $filename = 'DataSkriningPenyakit.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');
        
        $writer = new Xlsx($spreadsheet);
        setlocale(LC_ALL, 'en_US');
        $writer->save('php://output');
        exit();
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
