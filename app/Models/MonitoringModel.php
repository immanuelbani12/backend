<?php

namespace App\Models;

use CodeIgniter\Model;

class MonitoringModel extends Model
{
    function getTotalSudahScreening($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM USER
        WHERE id_klinik = $id_klinik
        AND sudah_screening = 1
        ")->getResult();
    }

    function getTotalBelumScreening($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM USER
        WHERE id_klinik = $id_klinik
        AND sudah_screening = 0
        ")->getResult();
    }

    function getListScreening($id_klinik){
        return $this->db->query("SELECT *
        FROM USER
        WHERE id_klinik = $id_klinik
        ")->getResult();
    }

    function getTotalDiabetes($id_klinik){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM USER
        WHERE id_klinik = $id_klinik
        AND sudah_screening = 1
        ")->getResult();
    }
}
