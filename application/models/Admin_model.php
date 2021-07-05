<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getSession()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getPenduduk($limit, $start, $keyword)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('nik', $keyword);
            $this->db->or_like('no_kk', $keyword);
        }
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('pendidikan', 'pendidikan.kode_pendidikan = penduduk.pendidikan');
        $this->db->order_by('id_peddk', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function getDataPekerjaan()
    {
        return $this->db->get('pekerjaan')->result_array();
    }

    public function getDataHubungan()
    {
        return $this->db->get('hubungan')->result_array();
    }

    public function getDataPendidikan()
    {
        return $this->db->get('pendidikan')->result_array();
    }

    public function ubahDataPenduduk()
    {
        $data = [
            "no_kk" => htmlspecialchars($this->input->post('no_kk', true)),
            "nik" => htmlspecialchars($this->input->post('nik', true)),
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "rt" => htmlspecialchars($this->input->post('rt', true)),
            "rw" => htmlspecialchars($this->input->post('rw', true)),
            "dusun" => htmlspecialchars($this->input->post('dusun', true)),
            "jk" => htmlspecialchars($this->input->post('jk', true)),
            "hubungan" => htmlspecialchars($this->input->post('hubungan', true)),
            "tempat_lahir" => htmlspecialchars($this->input->post('tempat_lahir', true)),
            "tgl_lahir" => htmlspecialchars($this->input->post('tgl_lahir', true)),
            "umur" => htmlspecialchars($this->input->post('umur', true)),
            "status" => htmlspecialchars($this->input->post('status', true)),
            "suku" => htmlspecialchars($this->input->post('suku', true)),
            "agama" => htmlspecialchars($this->input->post('agama', true)),
            "pendidikan" => htmlspecialchars($this->input->post('pendidikan', true)),
            "pekerjaan" => htmlspecialchars($this->input->post('pekerjaan', true)),
            "ket" => htmlspecialchars($this->input->post('ket', true))
        ];
        $this->db->where('id_peddk', $this->input->post('id_peddk'));
        $this->db->update('penduduk', $data);
    }

    public function tambahDataPenduduk()
    {
        $data = [
            "no_kk" => htmlspecialchars($this->input->post('no_kk', true)),
            "nik" => htmlspecialchars($this->input->post('nik', true)),
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "rt" => htmlspecialchars($this->input->post('rt', true)),
            "rw" => htmlspecialchars($this->input->post('rw', true)),
            "dusun" => htmlspecialchars($this->input->post('dusun', true)),
            "jk" => htmlspecialchars($this->input->post('jk', true)),
            "hubungan" => htmlspecialchars($this->input->post('hubungan', true)),
            "tempat_lahir" => htmlspecialchars($this->input->post('tempat_lahir', true)),
            "tgl_lahir" => htmlspecialchars($this->input->post('tgl_lahir', true)),
            "umur" => htmlspecialchars($this->input->post('umur', true)),
            "status" => htmlspecialchars($this->input->post('status', true)),
            "suku" => htmlspecialchars($this->input->post('suku', true)),
            "agama" => htmlspecialchars($this->input->post('agama', true)),
            "pendidikan" => htmlspecialchars($this->input->post('pendidikan', true)),
            "pekerjaan" => htmlspecialchars($this->input->post('pekerjaan', true)),
            "ket" => htmlspecialchars($this->input->post('ket', true)),
            "tgl" => date("Y-m-d")
        ];
        $this->db->insert('penduduk', $data);
    }

    public function getDataKK($limit, $start, $rt)
    {
        if ($rt) {
            $this->db->like('rt', $rt);
        }
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('pendidikan', 'pendidikan.kode_pendidikan = penduduk.pendidikan');
        $this->db->group_by("no_kk");
        $this->db->order_by('id_peddk', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }
}
