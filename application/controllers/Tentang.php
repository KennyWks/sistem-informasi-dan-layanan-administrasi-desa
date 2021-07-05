<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tentang_model', 'tentang');
        $this->db->conn_id->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, true);
    }

    public function sejarah()
    {
        $data['judul'] = 'Sejarah';
        $data['rows'] = $this->tentang->getAllDataSejarahKades();

        $this->load->view('templates/header', $data);
        $this->load->view('tentang/sejarah', $data);
        $this->load->view('templates/footer');
    }

    public function wilayah()
    {
        $data['judul'] = 'Wilayah';
        $data['rowRT'] = $this->tentang->hitungDataRT();
        $data['rowRW'] = $this->tentang->hitungDataRW();
        $data['rowDusun'] = $this->tentang->hitungDataDusun();
        $data['lahan'] = $this->tentang->getDataLahan();

        $this->load->view('templates/header', $data);
        $this->load->view('tentang/wilayah', $data);
        $this->load->view('templates/footer');
    }

    public function monografi()
    {
        $data['judul'] = 'Monografi';
        $this->load->view('templates/header', $data);
        $this->load->view('tentang/monografi');
        $this->load->view('templates/footer');
    }

    public function potensi()
    {
        $data['judul'] = 'Potensi';
        $this->load->view('templates/header', $data);
        $this->load->view('tentang/potensi');
        $this->load->view('templates/footer');
    }

    public function statistik()
    {
        $data['judul'] = 'Statistik';
        $this->load->view('templates/header', $data);
        $this->load->view('tentang/statistik', $data);
        $this->load->view('templates/footer');
    }

    public function getDataPenduduk()
    {
        //Penduduk
        $data['penduduk'] = $this->hitungAllPenduduk();

        //Status
        $status = "SELECT `status` as name, COUNT(*) AS y FROM penduduk GROUP BY `status`";
        $data['status'] = $this->db->query($status)->result_array();

        //Pekerjaan
        $pekerjaan = "SELECT `pekerjaan` as name, COUNT(*) AS y FROM penduduk GROUP BY `pekerjaan`";
        $data['pekerjaan'] = $this->db->query($pekerjaan)->result_array();

        //Jenis Kelamin
        $data['laki2'] = $this->db->get_where('penduduk', ['jk' => 'L'])->num_rows();
        $data['perempuan'] = $this->db->get_where('penduduk', ['jk' => 'P'])->num_rows();

        //KK
        $data['kk'] = $this->db->get_where('penduduk', ['hubungan' => 'KK'])->num_rows();

        //Usia laki-laki
        $query1 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 0 AND 5";
        $dataL1 = $this->db->query($query1)->num_rows();
        $data['satuL'] = ($dataL1 * 100) / $data['laki2'];

        $query2 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 6 AND 12";
        $dataL2 = $this->db->query($query2)->num_rows();
        $data['duaL'] = ($dataL2 * 100) / $data['laki2'];

        $query3 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 13 AND 20";
        $dataL3 = $this->db->query($query3)->num_rows();
        $data['tigaL'] = ($dataL3 * 100) / $data['laki2'];

        $query4 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 21 AND 30";
        $dataL4 = $this->db->query($query4)->num_rows();
        $data['empatL'] = ($dataL4 * 100) / $data['laki2'];

        $query5 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 31 AND 45";
        $dataL5 = $this->db->query($query5)->num_rows();
        $data['limaL'] = ($dataL5 * 100) / $data['laki2'];

        $query6 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 46 AND 65";
        $dataL6 = $this->db->query($query6)->num_rows();
        $data['enamL'] = ($dataL6 * 100) / $data['laki2'];

        $query7 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 66 AND 75";
        $dataL7 = $this->db->query($query7)->num_rows();
        $data['tujuhL'] = ($dataL7 * 100) / $data['laki2'];

        $query8 = "SELECT umur FROM penduduk where jk = 'L' AND umur BETWEEN 76 AND 85";
        $dataL8 = $this->db->query($query8)->num_rows();
        $data['delapanL'] = ($dataL8 * 100) / $data['laki2'];

        $query9 = "SELECT umur FROM penduduk where jk = 'L' AND umur > 85";
        $dataL9 = $this->db->query($query9)->num_rows();
        $data['sembilanL'] = ($dataL9 * 100) / $data['laki2'];

        //Usia Perempuan
        $query1 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 0 AND 5";
        $dataP1 = $this->db->query($query1)->num_rows();
        $data['satuP'] = ($dataP1 * 100) / $data['perempuan'];

        $query2 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 6 AND 12";
        $dataP2 = $this->db->query($query2)->num_rows();
        $data['duaP'] = ($dataP2 * 100) / $data['perempuan'];

        $query3 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 13 AND 20";
        $dataP3 = $this->db->query($query3)->num_rows();
        $data['tigaP'] = ($dataP3 * 100) / $data['perempuan'];

        $query4 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 21 AND 30";
        $dataP4 = $this->db->query($query4)->num_rows();
        $data['empatP'] = ($dataP4 * 100) / $data['perempuan'];

        $query5 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 31 AND 45";
        $dataP5 = $this->db->query($query5)->num_rows();
        $data['limaP'] = ($dataP5 * 100) / $data['perempuan'];

        $query6 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 46 AND 65";
        $dataP6 = $this->db->query($query6)->num_rows();
        $data['enamP'] = ($dataP6 * 100) / $data['perempuan'];

        $query7 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 66 AND 75";
        $dataP7 = $this->db->query($query7)->num_rows();
        $data['tujuhP'] = ($dataP7 * 100) / $data['perempuan'];

        $query8 = "SELECT umur FROM penduduk where jk = 'P' AND umur BETWEEN 76 AND 85";
        $dataP8 = $this->db->query($query8)->num_rows();
        $data['delapanP'] = ($dataP8 * 100) / $data['perempuan'];

        $query9 = "SELECT umur FROM penduduk where jk = 'P' AND umur > 85";
        $dataP9 = $this->db->query($query9)->num_rows();
        $data['sembilanP'] = ($dataP9 * 100) / $data['perempuan'];

        //perkembangan penduduk laki2
        $Qbulan1L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-01-01' AND '" . date('Y') . "-01-30'";
        $data['bulan1L'] = $this->db->query($Qbulan1L)->num_rows();

        $Qbulan2L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-02-01' AND '" . date('Y') . "-02-28'";
        $data['bulan2L'] = $this->db->query($Qbulan2L)->num_rows();

        $Qbulan3L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-03-01' AND '" . date('Y') . "-03-30'";
        $data['bulan3L'] = $this->db->query($Qbulan3L)->num_rows();

        $Qbulan4L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-04-01' AND '" . date('Y') . "-04-30'";
        $data['bulan4L'] = $this->db->query($Qbulan4L)->num_rows();

        $Qbulan5L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-05-01' AND '" . date('Y') . "-05-30'";
        $data['bulan5L'] = $this->db->query($Qbulan5L)->num_rows();

        $Qbulan6L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-06-01' AND '" . date('Y') . "-06-30'";
        $data['bulan6L'] = $this->db->query($Qbulan6L)->num_rows();

        $Qbulan7L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-07-01' AND '" . date('Y') . "-07-30'";
        $data['bulan7L'] = $this->db->query($Qbulan7L)->num_rows();

        $Qbulan8L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-08-01' AND '" . date('Y') . "-08-30'";
        $data['bulan8L'] = $this->db->query($Qbulan8L)->num_rows();

        $Qbulan9L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-09-01' AND '" . date('Y') . "-09-30'";
        $data['bulan9L'] = $this->db->query($Qbulan9L)->num_rows();

        $Qbulan10L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-10-01' AND '" . date('Y') . "-10-30'";
        $data['bulan10L'] = $this->db->query($Qbulan10L)->num_rows();

        $Qbulan11L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-11-01' AND '" . date('Y') . "-11-30'";
        $data['bulan11L'] = $this->db->query($Qbulan11L)->num_rows();

        $Qbulan12L = "SELECT tgl FROM penduduk where jk = 'L' AND tgl BETWEEN '" . date('Y') . "-12-01' AND '" . date('Y') . "-12-30'";
        $data['bulan12L'] = $this->db->query($Qbulan12L)->num_rows();

        //perkembangan penduduk perempuan
        $Qbulan1P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-01-01' AND '" . date('Y') . "-01-30'";
        $data['bulan1P'] = $this->db->query($Qbulan1P)->num_rows();

        $Qbulan2P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-02-01' AND '" . date('Y') . "-02-28'";
        $data['bulan2P'] = $this->db->query($Qbulan2P)->num_rows();

        $Qbulan3P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-03-01' AND '" . date('Y') . "-03-30'";
        $data['bulan3P'] = $this->db->query($Qbulan3P)->num_rows();

        $Qbulan4P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-04-01' AND '" . date('Y') . "-04-30'";
        $data['bulan4P'] = $this->db->query($Qbulan4P)->num_rows();

        $Qbulan5P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-05-01' AND '" . date('Y') . "-05-30'";
        $data['bulan5P'] = $this->db->query($Qbulan5P)->num_rows();

        $Qbulan6P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-06-01' AND '" . date('Y') . "-06-30'";
        $data['bulan6P'] = $this->db->query($Qbulan6P)->num_rows();

        $Qbulan7P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-07-01' AND '" . date('Y') . "-07-30'";
        $data['bulan7P'] = $this->db->query($Qbulan7P)->num_rows();

        $Qbulan8P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-08-01' AND '" . date('Y') . "-08-30'";
        $data['bulan8P'] = $this->db->query($Qbulan8P)->num_rows();

        $Qbulan9P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-09-01' AND '" . date('Y') . "-09-30'";
        $data['bulan9P'] = $this->db->query($Qbulan9P)->num_rows();

        $Qbulan10P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-10-01' AND '" . date('Y') . "-10-30'";
        $data['bulan10P'] = $this->db->query($Qbulan10P)->num_rows();

        $Qbulan11P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-11-01' AND '" . date('Y') . "-11-30'";
        $data['bulan11P'] = $this->db->query($Qbulan11P)->num_rows();

        $Qbulan12P = "SELECT tgl FROM penduduk where jk = 'P' AND tgl BETWEEN '" . date('Y') . "-12-01' AND '" . date('Y') . "-12-30'";
        $data['bulan12P'] = $this->db->query($Qbulan12P)->num_rows();

        $this->load->view('tentang/iframe/penduduk', $data);
    }

    public function getDataPendidikan()
    {
        //pendidikan
        $data['penduduk'] = $this->hitungAllPenduduk();

        //hitung pendidikan tampilkan ke cards
        $cardpen = "SELECT `pendidikan`.`deskripsi`, `penduduk`.`pendidikan`, COUNT(*) AS data FROM penduduk JOIN pendidikan ON `penduduk`.`pendidikan` = `pendidikan`.`kode_pendidikan` GROUP BY `penduduk`.`pendidikan`";
        $data['Cards'] = $this->db->query($cardpen)->result_array();

        $gridPend = "SELECT `pendidikan`.`deskripsi` as name, COUNT(*) AS y FROM penduduk JOIN pendidikan ON `penduduk`.`pendidikan` = `pendidikan`.`kode_pendidikan` GROUP BY `penduduk`.`pendidikan`";
        $data['gridLabel'] = $this->db->query($gridPend)->result_array();

        $this->load->view('tentang/iframe/pendidikan', $data);
    }

    public function getDataAPBDesaA()
    {
        $query9 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') - 1 . "AND anggaran = 'A'";
        $data['row'] = $this->db->query9($query9)->row_array();

        $query8 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') + 4 . "AND anggaran = 'A'";
        $data['row8'] = $this->db->query($query8)->row_array();

        $query7 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') + 3 . "AND anggaran = 'A'";
        $data['row7'] = $this->db->query($query7)->row_array();

        $query6 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') + 2 . "AND anggaran = 'A'";
        $data['row6'] = $this->db->query($query6)->row_array();

        $query5 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') + 1 . "AND anggaran = 'A'";
        $data['row5'] = $this->db->query($query5)->row_array();

        $query4 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') . "AND anggaran = 'A'";
        $data['row4'] = $this->db->query($query4)->row_array();

        $query3 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') - 1 . "AND anggaran = 'A'";
        $data['row3'] = $this->db->query($query3)->row_array();

        $query2 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') - 2 . "AND anggaran = 'A'";
        $data['row2'] = $this->db->query($query2)->row_array();

        $query1 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') - 3 . "AND anggaran = 'A'";
        $data['row1'] = $this->db->query($query1)->row_array();

        $this->load->view('tentang/iframe/apbdesa', $data);
    }

    public function getDataAPBDesaP()
    {
        $date9 = date("Y") - 1;
        $query9 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date9 . " AND anggaran = 'P'";
        $data['row'] = $this->db->query($query9)->row_array();

        $date8 = date("Y") + 4;
        $query8 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date8 . " AND anggaran = 'P'";
        $data['row8'] = $this->db->query($query8)->row_array();

        $date7 =  date("Y") + 3;
        $query7 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date7 . " AND anggaran = 'P'";
        $data['row7'] = $this->db->query($query7)->row_array();

        $date6 =  date("Y") + 2;
        $query6 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date6 . " AND anggaran = 'P'";
        $data['row6'] = $this->db->query($query6)->row_array();

        $date5 =  date("Y") + 1;
        $query5 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date5 . " AND anggaran = 'P'";
        $data['row5'] = $this->db->query($query5)->row_array();

        $query4 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . date('Y') . " AND anggaran = 'P'";
        $data['row4'] = $this->db->query($query4)->row_array();

        $date3 =  date('Y') - 1;
        $query3 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date3 . " AND anggaran = 'P'";
        $data['row3'] = $this->db->query($query3)->row_array();

        $date2 =  date('Y') - 2;
        $query2 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date2 . " AND anggaran = 'P'";
        $data['row2'] = $this->db->query($query2)->row_array();

        $date1 =  date('Y') - 3;
        $query1 = "select `db_desa`.`apbdesa`.`id_apbdesa` AS `id_apbdesa`,`db_desa`.`apbdesa`.`pendapatan` AS `pendapatan`,`db_desa`.`apbdesa`.`belanja` AS `belanja`,`db_desa`.`apbdesa`.`pembiayaan` AS `pembiayaan`,`db_desa`.`apbdesa`.`kas` AS `kas`,`db_desa`.`apbdesa`.`tahun` AS `tahun`,`db_desa`.`apbdesa`.`anggaran` AS `anggaran`,`db_desa`.`bapbdesa`.`ppdb` AS `ppdb`,`db_desa`.`bapbdesa`.`ppdp` AS `ppdp`,`db_desa`.`bapbdesa`.`pmd` AS `pmd`,`db_desa`.`bapbdesa`.`pkd` AS `pkd`,`db_desa`.`bapbdesa`.`btt` AS `btt`,`db_desa`.`papbdesa`.`pasli` AS `pasli`,`db_desa`.`papbdesa`.`transfer` AS `transfer`,`db_desa`.`papbdesa`.`plain` AS `plain`,((`db_desa`.`papbdesa`.`pasli` + `db_desa`.`papbdesa`.`transfer`) + `db_desa`.`papbdesa`.`plain`) AS `Rpendapatan`,((((`db_desa`.`bapbdesa`.`ppdb` + `db_desa`.`bapbdesa`.`ppdp`) + `db_desa`.`bapbdesa`.`pmd`) + `db_desa`.`bapbdesa`.`pkd`) + `db_desa`.`bapbdesa`.`btt`) AS `Rbelanja` from ((`db_desa`.`apbdesa` join `db_desa`.`papbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`papbdesa`.`kode_apbdesa`))) join `db_desa`.`bapbdesa` on((`db_desa`.`apbdesa`.`id_apbdesa` = `db_desa`.`bapbdesa`.`kode_apbdesa`))) WHERE tahun = " . $date1 . " AND anggaran = 'P'";
        $data['row1'] = $this->db->query($query1)->row_array();
        $this->load->view('tentang/iframe/apbdesa', $data);
    }

    //lahan
    public function getDataLahan()
    {
        $data['lahan'] = $this->tentang->getDataLahan();
        $this->load->view('tentang/iframe/lahan', $data);
    }

    //Saspras
    public function getDataSaspras()
    {
        //hitung semua saspras
        $data['saspras'] = $this->db->get('saspras')->num_rows();

        //hitung by kondisi
        $data['sb'] = $this->db->get_where('saspras', ['kondisi' => 'B'])->num_rows();
        $data['srs'] = $this->db->get_where('saspras', ['kondisi' => 'RS'])->num_rows();
        $data['srb'] = $this->db->get_where('saspras', ['kondisi' => 'RB'])->num_rows();

        //hitung by pemilik
        $data['desa'] = $this->db->get_where('saspras', ['pemilik' => 'Desa'])->num_rows();
        $data['orang'] = $this->db->get_where('saspras', ['pemilik' => 'Perseorangan'])->num_rows();
        $data['swasta'] = $this->db->get_where('saspras', ['pemilik' => 'Swasta'])->num_rows();
        $data['lembaga'] = $this->db->get_where('saspras', ['pemilik' => 'Lembaga'])->num_rows();
        $data['kab'] = $this->db->get_where('saspras', ['pemilik' => 'Kabupaten'])->num_rows();
        $data['prov'] = $this->db->get_where('saspras', ['pemilik' => 'Provinsi'])->num_rows();
        $data['pusat'] = $this->db->get_where('saspras', ['pemilik' => 'Pusat'])->num_rows();

        //hitung by jenis
        $data['air'] = $this->db->get_where('saspras', ['jenis' => 'Air Bersih'])->num_rows();
        $data['pendidikan'] = $this->db->get_where('saspras', ['jenis' => 'Pendidikan'])->num_rows();
        $data['kesehatan'] = $this->db->get_where('saspras', ['jenis' => 'Kesehatan'])->num_rows();
        $data['rohani'] = $this->db->get_where('saspras', ['jenis' => 'Rohani'])->num_rows();
        $data['transport'] = $this->db->get_where('saspras', ['jenis' => 'Transportasi'])->num_rows();
        $data['umum'] = $this->db->get_where('saspras', ['jenis' => 'Umum'])->num_rows();
        $data['lainnya'] = $this->db->get_where('saspras', ['jenis' => 'Lainnya'])->num_rows();
        $data['olaraga'] = $this->db->get_where('saspras', ['jenis' => 'Olaraga'])->num_rows();

        $this->load->view('tentang/iframe/saspras', $data);
    }

    private function hitungAllPenduduk()
    {
        return $this->tentang->getCountAllPenduduk();
    }
}
