<?php

namespace App\Models;

use CodeIgniter\Model;

class MonitoringModel extends Model
{
    function getTotalSudahScreening($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND sudah_screening = 1
        ")->getResult();
    }

    function getTotalBelumScreening($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND sudah_screening = 0
        ")->getResult();
    }

    function getListScreening($id_klinik){
        return $this->db->query("SELECT *
        FROM `user`
        WHERE id_klinik = $id_klinik
        ")->getResult();
    }

    function getTotalDiabetes($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND risiko_diabetes = 1
        ")->getResult();
    }

    function getTotalKolesterol($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND risiko_kolesterol = 1
        ")->getResult();
    }

    function getTotalStroke($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND risiko_stroke = 1
        ")->getResult();
    }

    function getTotalTidakDiabetes($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND risiko_diabetes = 0
        ")->getResult();
    }

    function getTotalTidakStroke($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND risiko_stroke = 0
        ")->getResult();
    }

    function getTotalTidakKolesterol($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_klinik = $id_klinik
        AND risiko_kolesterol = 0
        ")->getResult();
    }
}
