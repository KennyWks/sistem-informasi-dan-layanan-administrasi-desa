<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang_model extends CI_model
{
    public function getAllDataSejarahKades()
    {
        $query = "SELECT `sejarah_kades`.*,`jabatan_kades`.`deskripsi`
        FROM `sejarah_kades` JOIN `jabatan_kades`
        ON `sejarah_kades`.`jabatan` = jabatan_kades.`kode_jabatan`";
        return $this->db->query($query)->result_array();
    }

    public function hitungDataRT()
    {
        $this->db->from('wilayah');
        return $this->db->count_all_results();
    }

    public function hitungDataRW()
    {
        $queryDusun = "SELECT DISTINCT dusun FROM wilayah";
        $count = $this->db->query($queryDusun)->result_array();

        foreach ($count as $key) {
            $query = "SELECT DISTINCT rw FROM wilayah WHERE dusun = " . $key['dusun'];
            $varibel[] = $this->db->query($query)->result_array();
        }

        $array = array_map("count", $varibel);
        $totalDusun = array_sum($array);

        return $totalDusun;
    }

    public function hitungDataDusun()
    {
        $this->db->distinct();
        $this->db->select('dusun');
        return $this->db->get('wilayah')->num_rows();
    }

    public function getDataLahan()
    {
        return $this->db->get('lahan')->row_array();
    }

    public function getCountAllPenduduk()
    {
        return $this->db->get('penduduk')->num_rows();
    }
}
