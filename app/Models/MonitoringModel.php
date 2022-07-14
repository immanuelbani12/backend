<?php

namespace App\Models;

use CodeIgniter\Model;

class MonitoringModel extends Model
{
    function getTotalSudahScreening($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND sudah_screening = 1
        ")->getResult();
    }

    function getTotalBelumScreening($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND sudah_screening = 0
        ")->getResult();
    }

    function getListScreening($id_institusi){
        return $this->db->query("SELECT *
         FROM `user`
         WHERE id_institusi = $id_institusi
         ")->getResult();
    }

    function getListSudahScreening($id_institusi){
        return $this->db->query("SELECT *
         FROM `user`
         WHERE id_institusi = $id_institusi
         AND sudah_screening = 1
         ")->getResult();
    }

    function getLastListScreening($id_institusi){
        return $this->db->query("SELECT u.`nama_user`, u.no_telp, p.* FROM pemeriksaan p, `user` u, (SELECT MAX(id_pemeriksaan) AS id_pemeriksaan FROM pemeriksaan
        GROUP BY id_user) last_pemeriksaan
        WHERE p.`id_pemeriksaan` = last_pemeriksaan.id_pemeriksaan
        AND p.`id_user` = u.`id_user`
        AND u.`id_institusi` = $id_institusi
        ")->getResult();
    }

    function getLastListScreeningDetail($id_institusi){
        return $this->db->query("SELECT u.`kode_user`, u.`nama_user`, u.no_telp, u.`jenis_kelamin`, 
        dd.`bmi`, dd.`aktivitas_fisik`, ds.`merokok`, ds.`tekanan_darah`, 
        dd.`gula_darah`, dk.`kadar_gula`, dk.`kadar_kolesterol`, ds.`riwayat_stroke`, 
        ds.`irama_jantung`, dd.`buah_sayur`, dd.`obat_hipertensi`, dd.`keturunan`,
        p.`hasil_diabetes`, p.`hasil_stroke`, p.`hasil_kardiovaskular`
        FROM pemeriksaan p, `user` u, `detail_diabetes` dd, `detail_kardiovaskular` dk, `detail_stroke` ds,(SELECT MAX(id_pemeriksaan) AS id_pemeriksaan FROM pemeriksaan GROUP BY id_user) last_pemeriksaan
        WHERE p.`id_pemeriksaan` = last_pemeriksaan.id_pemeriksaan
        AND p.`id_user` = u.`id_user`
        AND dd.`id_pemeriksaan` = last_pemeriksaan.id_pemeriksaan
        AND ds.`id_pemeriksaan` = last_pemeriksaan.id_pemeriksaan
        AND dk.`id_pemeriksaan` = last_pemeriksaan.id_pemeriksaan
        AND u.`id_institusi` = $id_institusi
        ")->getResult();
    }

    function getTotalDiabetes($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND risiko_diabetes = 1
        ")->getResult();
    }

    function getTotalKardiovaskular($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND risiko_kardiovaskular = 1
        ")->getResult();
    }

    function getTotalStroke($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND risiko_stroke = 1
        ")->getResult();
    }

    function getTotalTidakDiabetes($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND risiko_diabetes = 0
        ")->getResult();
    }

    function getTotalTidakStroke($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND risiko_stroke = 0
        ")->getResult();
    }

    function getTotalTidakKardiovaskular($id_institusi){
        return $this->db->query("SELECT COUNT(1) AS jumlah
        FROM `user`
        WHERE id_institusi = $id_institusi
        AND risiko_kardiovaskular = 0
        ")->getResult();
    }
}
