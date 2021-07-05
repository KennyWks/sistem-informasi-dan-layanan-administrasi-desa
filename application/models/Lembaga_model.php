<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembaga_model extends CI_Model
{
    public function getDataKades()
    {
        $this->db->select("*");
        $this->db->from("sejarah_kades");
        $this->db->limit(1);
        $this->db->order_by('akhir', "DESC");
        return $this->db->get()->result_array();
    }

    public function getAllDataPerangkat()
    {
        $this->db->order_by('id_pem', 'ASC');
        return $this->db->get_where('pemerintah', ['kode_perangkat' => 'PKD'])->result_array();
    }

    public function getAllDataDusun()
    {
        $this->db->order_by('jabatan', 'ASC');
        return $this->db->get_where('pemerintah', ['kode_perangkat' => 'KD'])->result_array();
    }

    public function getAllDataBPD()
    {
        return $this->db->get('bpd')->result_array();
    }

    public function getAllDataLPM()
    {
        return $this->db->get('lpm')->result_array();
    }

    public function getAllDataPKK()
    {
        return $this->db->get('pkk')->result_array();
    }

    public function getAllDataKT()
    {
        return $this->db->get('kt')->result_array();
    }
}
