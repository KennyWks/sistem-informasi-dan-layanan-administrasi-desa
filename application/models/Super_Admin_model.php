<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_Admin_model extends CI_Model
{
    public function getSession()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getDaftarTamu()
    {
        return $this->db->get('tamu')->result_array();
    }

    public function getDataSK()
    {
        return $this->db->get('jenis_sk')->result_array();
    }

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM user_sub_menu JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
               ";
        return $this->db->query($query)->result_array();
    }

    public function tambahSubMenu()
    {
        $data = [
            "judul" => htmlspecialchars($this->input->post('judul', true)),
            "menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
            "url" => htmlspecialchars($this->input->post('url', true)),
            "icon" => htmlspecialchars($this->input->post('icon', true)),
            "aktif" => htmlspecialchars($this->input->post('aktif', true))
        ];
        $this->db->insert('user_sub_menu', $data);
    }

    public function getUserRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getUserRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function getUserMenu($id)
    {
        return $this->db->get_where('user_menu', ['id !=' => $id])->result_array();
    }

    public function daftar()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'foto' =>  'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'aktif' => 0,
            'tgl_buat' => time()
        ];
        $this->db->insert('user', $data);
    }

    public function getDaftarBerita()
    {
        $this->db->order_by('id_berita', 'DESC');
        return $this->db->get('berita')->result_array();
    }

    public function getSejarahKades()
    {
        $query = "SELECT `sejarah_kades`.*,`jabatan_kades`.`deskripsi`
        FROM `sejarah_kades` JOIN `jabatan_kades`
        ON `sejarah_kades`.`jabatan` = jabatan_kades.`kode_jabatan`";
        return $this->db->query($query)->result_array();
    }

    public function getDaftarKomentar()
    {
        $this->db->order_by('id_komentar', 'DESC');
        return $this->db->get('komentar')->result_array();
    }

    public function getDaftarPesan()
    {
        $this->db->order_by('id_pesan', 'DESC');
        return $this->db->get('pesan')->result_array();
    }

    public function getDaftarWilayah()
    {
        $this->db->order_by('id_wilayah', 'DESC');
        return $this->db->get('wilayah')->result_array();
    }

    public function ubahLahan()
    {
        $data = array(
            'wilayah' => htmlspecialchars($this->input->post('wilayah', true)),
            'pemukiman' => htmlspecialchars($this->input->post('pemukiman', true)),
            'pertanian' => htmlspecialchars($this->input->post('pertanian', true)),
            'perkebunan' => htmlspecialchars($this->input->post('perkebunan', true)),
            'tambak' => htmlspecialchars($this->input->post('tambak', true)),
            'hutan' => htmlspecialchars($this->input->post('hutan', true)),
            'embung' => htmlspecialchars($this->input->post('embung', true)),
        );

        $this->db->where('id_lahan', $this->input->post('id_lahan'));
        $this->db->update('lahan', $data);
    }

    public function getDaftarSaspras()
    {
        return $this->db->get('saspras')->result_array();
    }

    public function tambahSaspras()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "kondisi" => htmlspecialchars($this->input->post('kondisi', true)),
            "pemilik" => htmlspecialchars($this->input->post('pemilik', true)),
            "jenis" => htmlspecialchars($this->input->post('jenis', true))
        ];
        $this->db->insert('saspras', $data);
    }

    public function getDaftarAPBDesa()
    {
        return $this->db->get('view_apbdesa')->result_array();
    }

    //TODO: Kelola APBDesa
    public function tambahDataAPBDesa()
    {
        $dataAPBDesa = [
            "pendapatan" => intval(str_replace(',', '', $this->input->post('pendapatan'))),
            "belanja" => intval(str_replace(',', '', $this->input->post('belanja'))),
            "pembiayaan" => intval(str_replace(',', '', $this->input->post('pembiayaan'))),
            "kas" => intval(str_replace(',', '', $this->input->post('kas'))),
            "tahun" => intval(str_replace(',', '', $this->input->post('tahun'))),
            "anggaran" => htmlspecialchars($this->input->post('anggaran', true))
        ];
        $this->db->insert('apbdesa', $dataAPBDesa);

        $query = "SELECT id_apbdesa FROM apbdesa WHERE tahun = " . $dataAPBDesa['tahun'] . " AND anggaran = '" . $dataAPBDesa['anggaran'] . "'";
        $dataq = $this->db->query($query)->row_array();

        $dataP = [
            "kode_apbdesa" => $dataq['id_apbdesa'],
            "pasli" => intval(str_replace(',', '', $this->input->post('pasli'))),
            "transfer" => intval(str_replace(',', '', $this->input->post('transfer'))),
            "plain" => intval(str_replace(',', '', $this->input->post('plain')))
        ];
        $this->db->insert('papbdesa', $dataP);

        $dataB = [
            "kode_apbdesa" => $dataq['id_apbdesa'],
            "ppdb" => intval(str_replace(',', '', $this->input->post('ppdb'))),
            "ppdp" => intval(str_replace(',', '', $this->input->post('ppdp'))),
            "pmd" => intval(str_replace(',', '', $this->input->post('pmd'))),
            "pkd" => intval(str_replace(',', '', $this->input->post('pkd'))),
            "btt" => intval(str_replace(',', '', $this->input->post('btt')))
        ];
        $this->db->insert('bapbdesa', $dataB);
    }

    public function ubahDataAPBDesa()
    {
        $dataAPBDesa = [
            "pendapatan" => intval(str_replace(',', '', $this->input->post('pendapatan'))),
            "belanja" => intval(str_replace(',', '', $this->input->post('belanja'))),
            "pembiayaan" => intval(str_replace(',', '', $this->input->post('pembiayaan'))),
            "kas" => intval(str_replace(',', '', $this->input->post('kas')))
        ];
        $this->db->where('id_apbdesa', $this->input->post('id_apbdesa'));
        $this->db->update('apbdesa', $dataAPBDesa);

        $dataP = [
            "pasli" => intval(str_replace(',', '', $this->input->post('pasli'))),
            "transfer" => intval(str_replace(',', '', $this->input->post('transfer'))),
            "plain" => intval(str_replace(',', '', $this->input->post('plain')))
        ];
        $this->db->where('kode_apbdesa', $this->input->post('id_apbdesa'));
        $this->db->update('papbdesa', $dataP);

        $dataB = [
            "ppdb" => intval(str_replace(',', '', $this->input->post('ppdb'))),
            "ppdp" => intval(str_replace(',', '', $this->input->post('ppdp'))),
            "pmd" => intval(str_replace(',', '', $this->input->post('pmd'))),
            "pkd" => intval(str_replace(',', '', $this->input->post('pkd'))),
            "btt" => intval(str_replace(',', '', $this->input->post('btt')))
        ];
        $this->db->where('kode_apbdesa', $this->input->post('id_apbdesa'));
        $this->db->update('bapbdesa', $dataB);
    }

    public function tambahDataPengurusLPM()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "jabatan" => "Anggota",
        ];
        $this->db->insert('lpm', $data);
    }

    public function tambahDataPengurusPKK()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "jabatan" => "Anggota",
        ];
        $this->db->insert('pkk', $data);
    }

    public function tambahDataPengurusBPD()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "jabatan" => "Anggota",
        ];
        $this->db->insert('bpd', $data);
    }

    public function tambahDataAparat()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "kode_perangkat" => "PKD",
            "jabatan" => htmlspecialchars($this->input->post('jabatan', true))
        ];
        $this->db->insert('pemerintah', $data);
    }

    public function tambahDataKepalaDusun()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "kode_perangkat" => "KD",
            "jabatan" => htmlspecialchars($this->input->post('jabatan', true))
        ];
        $this->db->insert('pemerintah', $data);
    }

    public function tambahDataSK()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "nomor2" => htmlspecialchars($this->input->post('nomor', true)),
        ];
        $this->db->insert('jenis_sk', $data);
    }

    public function hitungPermohonan()
    {
        //TODO: data sk permohonan
        $row1 = $this->db->get_where('sk_tdkmampu', ['status' => 0])->num_rows();
        $row2 = $this->db->get_where('sk_susunank', ['status' => 0])->num_rows();
        $row3 = $this->db->get_where('sk_kematian', ['status' => 0])->num_rows();
        $row4 = $this->db->get_where('sk_domisili', ['status' => 0])->num_rows();
        $row5 = $this->db->get_where('sk_usaha', ['status' => 0])->num_rows();
        $row6 = $this->db->get_where('sk_jbternak', ['status' => 0])->num_rows();
        return $row1 + $row2 + $row3 + $row4 + $row5 + $row6;
    }

    public function hitungDisetujui()
    {
        //TODO sk disetujui
        $row1 = $this->db->get_where('sk_tdkmampu', ['status' => 1])->num_rows();
        $row2 = $this->db->get_where('sk_susunank', ['status' => 1])->num_rows();
        $row3 = $this->db->get_where('sk_kematian', ['status' => 1])->num_rows();
        $row4 = $this->db->get_where('sk_domisili', ['status' => 1])->num_rows();
        $row5 = $this->db->get_where('sk_usaha', ['status' => 1])->num_rows();
        $row6 = $this->db->get_where('sk_jbternak', ['status' => 1])->num_rows();
        return $row1 + $row2 + $row3 + $row4 + $row5 + $row6;
    }

    public function hitungPOnline()
    {
        $bataswaktu  = time() - 300;
        $query = "SELECT * FROM kunjungan WHERE `online` > $bataswaktu ";
        return $this->db->query($query)->num_rows();
    }

    public function hitungPTotal()
    {
        $query = "SELECT * FROM kunjungan WHERE tgl = '" . strtotime(date('Y-m-d')) . "' GROUP BY ip";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln1()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 01";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln2()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 02";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln3()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 03";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln4()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 04";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln5()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 05";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln6()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 06";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln7()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 07";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln8()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 08";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln9()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 09";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln10()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 10";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln11()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 11";
        return $this->db->query($query)->num_rows();
    }

    public function grafikPBln12()
    {
        $query = "SELECT * FROM kunjungan WHERE FROM_UNIXTIME(tgl, '%m') = 12";
        return $this->db->query($query)->num_rows();
    }

    public function getDataNomorSurat()
    {
        $query = "SELECT no_surat FROM no_surat ORDER BY id DESC";
        return $this->db->query($query)->row_array();
    }
}
