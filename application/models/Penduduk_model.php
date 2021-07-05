<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{
    public function getDataDusun()
    {
        $this->db->select('dusun');
        $this->db->distinct();
        return $this->db->get('wilayah')->result_array();
    }

    public function getDataRW()
    {
        $this->db->select('rw');
        $this->db->distinct();
        return $this->db->get('wilayah')->result_array();
    }

    public function getDataRT()
    {
        $this->db->select('rt');
        return $this->db->get('wilayah')->result_array();
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
            "tempat_lahir" => htmlspecialchars($this->input->post('tempat_lahir', true)),
            "tgl_lahir" => htmlspecialchars($this->input->post('tgl_lahir', true)),
            "umur" => htmlspecialchars($this->input->post('umur', true)),
            "status" => htmlspecialchars($this->input->post('status', true)),
            "suku" => htmlspecialchars($this->input->post('suku', true)),
            "agama" => htmlspecialchars($this->input->post('agama', true)),
            "pendidikan" => htmlspecialchars($this->input->post('pendidikan', true)),
            "pekerjaan" => htmlspecialchars($this->input->post('pekerjaan', true))
        ];

        $this->db->where('id_peddk', $this->input->post('id_peddk'));
        $this->db->update('penduduk', $data);
    }

    public function getSession()
    {
        return $this->db->get_where('penduduk', ['id_peddk' => $this->session->userdata('id_peddk')])->row_array();
    }

    public function getDataPekerjaan()
    {
        return $this->db->get('pekerjaan')->result_array();
    }

    public function getDataPendidikan()
    {
        return $this->db->get('pendidikan')->result_array();
    }

    public function getDataSK()
    {
        $query = "SELECT * FROM jenis_sk WHERE aktif = 1 AND id_sk != 8";
        return $this->db->query($query)->result_array();
    }

    public function dataAgama()
    {
        return ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu', 'Pengahayat Kepercayaan', 'Lain-lain'];
    }

    public function dataStatus()
    {
        return ['Belum Kawin', 'Kawin', 'Cerai Mati', 'Cerai Hidup', 'Duda', 'Janda'];
    }

    public function getDataKades()
    {
        $this->db->select('*');
        $this->db->from('sejarah_kades');
        $this->db->join('jabatan_kades', 'sejarah_kades.jabatan = jabatan_kades.kode_jabatan');
        $this->db->order_by('id_kades', 'DESC');
        return $this->db->get()->row_array();
    }

    public function tambahSkKematian()
    {
        $tgl =  strtotime($this->input->post('tgl'));
        $data = [
            'id_peddk' => $this->session->userdata('id_peddk'),
            'id_sk' => htmlspecialchars($this->input->post('sk', true)),
            'tgl' => $tgl,
            'tempat' => htmlspecialchars(ucfirst(strtolower($this->input->post('tempat', true)))),
            'sebab' => htmlspecialchars(ucfirst(strtolower($this->input->post('sebab', true)))),
            'status' => 0
        ];
        $kode = 'SKK' . $this->session->userdata('id_peddk');
        $this->db->insert('sk_kematian', $data);
        return $kode;
    }

    public function tambahSKTidakMampu()
    {
        $kode = time();
        $data = [
            'id_peddk' => $this->session->userdata('id_peddk'),
            'id_sk' => htmlspecialchars($this->input->post('sk', true)),
            'tujuan' => htmlspecialchars($this->input->post('tujuan', true)),
            'tgl' => $kode,
            'status' => 0
        ];

        $this->db->insert('sk_tdkmampu', $data);
        return 'SKTM' . $kode;
    }

    public function tambahSkDomisili()
    {
        $kode = time();
        $data = [
            'id_peddk' => $this->session->userdata('id_peddk'),
            'id_sk' => htmlspecialchars($this->input->post('sk', true)),
            'foto' => htmlspecialchars($this->input->post('foto', true)),
            'tujuan' => htmlspecialchars($this->input->post('tujuan', true)),
            'tgl' => $kode,
            'status' => 0
        ];

        $this->db->insert('sk_domisili', $data);
        return 'SKD' . $kode;
    }

    public function tambahSkSusunanK()
    {
        $kode = time();
        $data = [
            'id_peddk' => $this->session->userdata('id_peddk'),
            'id_sk' => htmlspecialchars($this->input->post('sk', true)),
            'tujuan' => htmlspecialchars($this->input->post('tujuan', true)),
            'tgl' => $kode,
            'status' => 0
        ];

        $this->db->insert('sk_susunank', $data);
        return 'SKSK' . $kode;
    }

    public function getDataKeluarga($no_kk)
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('hubungan', 'penduduk.hubungan = hubungan.kode_hubungan');
        $this->db->where(['no_kk' => $no_kk]);
        $this->db->order_by('id_hubungan', 'ASC');
        return $this->db->get()->result_array();
    }

    public function buatSkUsaha()
    {
        $kode = time();
        $deskel = htmlspecialchars(ucfirst(strtolower($this->input->post('Adeskel', true))));

        if ($this->input->post('deskel', true) == "Desa") {
            $Adeskel = "Desa " . $deskel;
        } else {
            $Adeskel = "Kelurahan " . $deskel;
        }

        $data = [
            "nik" => htmlspecialchars($this->input->post('nik', true)),
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "tempat_lahir" => htmlspecialchars(ucfirst(strtolower($this->input->post('tempat_lahir', true)))),
            "tgl_lahir" => strtotime(htmlspecialchars($this->input->post('tgl_lahir', true))),
            "Arumah" => htmlspecialchars($this->input->post('Arumah', true)),
            "Art" => htmlspecialchars($this->input->post('Art', true)),
            "Arw" => htmlspecialchars($this->input->post('Arw', true)),
            "Adeskel" => $Adeskel,
            "Akec" => htmlspecialchars(ucfirst(strtolower($this->input->post('Akec', true)))),
            "pekerjaan" => htmlspecialchars($this->input->post('pekerjaan', true)),
            "agama" => htmlspecialchars($this->input->post('agama', true)),
            "bidang" => htmlspecialchars(ucfirst(strtolower($this->input->post('bidang', true)))),
            "lokasi" => htmlspecialchars($this->input->post('lokasi', true)),
            "tgl_buat" => $kode,
            'status' => 0
        ];
        $this->db->insert('sk_usaha', $data);
        return 'SKU' . $kode;
    }

    public function getDataSKUsaha($kode)
    {
        $this->db->select('*');
        $this->db->from('sk_usaha');
        $this->db->join('pekerjaan', 'sk_usaha.pekerjaan = pekerjaan.id_pekerjaan');
        $this->db->where(['tgl_buat' => $kode]);
        return $this->db->get()->row_array();
    }

    public function tambahSKJbternak()
    {
        $kode = time();
        $data = [
            'id_peddk' => $this->session->userdata('id_peddk'),
            'id_sk' => htmlspecialchars($this->input->post('sk', true)),
            'jenis_ternak' => htmlspecialchars($this->input->post('jenis', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jkt', true)),
            'umur' => htmlspecialchars($this->input->post('umur', true)),
            'warna_bulu' => htmlspecialchars(ucfirst(strtolower($this->input->post('warna', true)))),
            'cap' => htmlspecialchars($this->input->post('cap', true)),
            'nama_pembeli' => htmlspecialchars(strtoupper($this->input->post('pembeli', true))),
            'alamatp' => htmlspecialchars($this->input->post('alamatp', true)),
            'tgl' => $kode,
            'status' => 0
        ];

        $this->db->insert('sk_jbternak', $data);
        return 'SKJBT' . $kode;
    }

    public function getDataJbTernak($kode)
    {
        return $this->db->get_where('sk_jbternak', ['tgl' => $kode])->row_array();
    }

    public function skTdkMampu()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('sk_tdkmampu', 'penduduk.id_peddk = sk_tdkmampu.id_peddk');
        return $this->db->get()->result_array();
    }

    public function skSusunanK()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('sk_susunank', 'penduduk.id_peddk = sk_susunank.id_peddk');
        return $this->db->get()->result_array();
    }

    public function skDomisili()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('sk_domisili', 'penduduk.id_peddk = sk_domisili.id_peddk');
        return $this->db->get()->result_array();
    }

    public function skKematian()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('sk_kematian', 'penduduk.id_peddk = sk_kematian.id_peddk');
        return $this->db->get()->result_array();
    }

    public function skJBternak()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->join('sk_jbternak', 'penduduk.id_peddk = sk_jbternak.id_peddk');
        return $this->db->get()->result_array();
    }

    public function skUsaha()
    {
        return $this->db->get('sk_usaha')->result_array();
    }
}
