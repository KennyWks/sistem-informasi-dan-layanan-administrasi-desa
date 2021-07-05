<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_Keterangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model', 'penduduk');
    }

    public function routingSK()
    {
        penduduk_logged_in();
        if ($this->input->post('sk') == 1) {
            $this->stidakMampu();
        } else if ($this->input->post('sk') == 2) {
            $this->sSusunanKel();
        } else if ($this->input->post('sk') == 3) {
            $this->sDomisili();
        } else if ($this->input->post('sk') == 4) {
            $this->sKematian();
        } else if ($this->input->post('sk') == 5) {
            $this->sJBternak();
        } else {
            $this->session->set_flashdata('error_sk', 'Surat keterangan yang anda minta gagal diproses.');
            redirect('penduduk');
        }
    }

    public function sJBternak()
    {
        $data['title'] = 'SK Jual Beli Ternak';
        $data['sk'] = $this->penduduk->getDataSK();
        $data['penduduk'] = $this->penduduk->getSession();
        $data['kades'] = $this->penduduk->getDataKades();
        $data['nomorKab'] = $this->db->get_where('jenis_sk', ['id_sk' => $this->input->post('sk')])->row_array();

        $this->form_validation->set_rules('umur', 'Umur Ternak', 'required|trim|numeric|max_length[2]');
        $this->form_validation->set_rules('warna', 'Warna Bulu Ternak', 'required|trim');
        $this->form_validation->set_rules('pembeli', 'Nama Pembeli', 'required|trim');
        $this->form_validation->set_rules('alamatp', 'Alamat Pembeli', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/penduduk/header', $data);
            $this->load->view('templates/penduduk/sidebar', $data);
            $this->load->view('templates/penduduk/topbar', $data);
            $this->load->view('penduduk/index', $data);
            $this->load->view('templates/penduduk/footer', $data);
        } else {
            $kode = $this->penduduk->tambahSKJbternak();
            $kodeAngka = preg_replace('/[^0-9\-]/', '', $kode);

            $data['data'] = $this->penduduk->getDataJbTernak($kodeAngka);

            $mpdf = new \Mpdf\Mpdf();
            $html = $this->load->view('penduduk/cetak_sk/jbTernak', $data, TRUE);

            $footer = array(
                'odd' => array(
                    'L' => array(
                        'content' => $kode,
                        'font-size' => 8,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#808080'
                    ),
                    'C' => array(
                        'content' => '',
                        'font-size' => 10,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#000000'
                    ),
                    'R' => array(
                        'content' => '',
                        'font-size' => 10,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#000000'
                    ),
                    'line' => 0,
                ),
                'even' => array()
            );
            $mpdf->SetFooter($footer);
            $mpdf->WriteHTML($html);
            $mpdf->Output("SK JBTernak_" . $data['penduduk']['nik'], \Mpdf\Output\Destination::INLINE);
        }
    }

    public function stidakMampu()
    {
        penduduk_logged_in();
        $data['title'] = 'SK Tidak Mampu';
        $data['penduduk'] = $this->penduduk->getSession();
        $data['kades'] = $this->penduduk->getDataKades();
        $data['nomorKab'] = $this->db->get_where('jenis_sk', ['id_sk' => $this->input->post('sk')])->row_array();

        $kode = $this->penduduk->tambahSKTidakMampu();

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('penduduk/cetak_sk/tidakMampu', $data, TRUE);
        $footer = array(
            'odd' => array(
                'L' => array(
                    'content' => $kode,
                    'font-size' => 8,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#808080'
                ),
                'C' => array(
                    'content' => '',
                    'font-size' => 10,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#000000'
                ),
                'R' => array(
                    'content' => '',
                    'font-size' => 10,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#000000'
                ),
                'line' => 0,
            ),
            'even' => array()
        );
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($html);
        $mpdf->Output("SK Tidak Mampu_" . $data['penduduk']['nik'], \Mpdf\Output\Destination::INLINE);
    }

    public function sKematian()
    {
        penduduk_logged_in();
        $data['title'] = 'SK Kematian';
        $data['penduduk'] = $this->penduduk->getSession();
        $data['kades'] = $this->penduduk->getDataKades();
        $data['nomorKab'] = $this->db->get_where('jenis_sk', ['id_sk' => $this->input->post('sk')])->row_array();

        // get data dan konversi dari array multideminsional ke single array
        $datadusun = $this->penduduk->getDataDusun();
        $data['rowDusun'] = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($datadusun)), 0);
        $datarw = array_merge($this->penduduk->getDataRW());
        $data['rowRW'] = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($datarw)), 0);
        $datart = $this->penduduk->getDataRT();
        $data['rowRT'] = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($datart)), 0);

        //data array di luar db.
        $data['status'] = $this->penduduk->dataStatus();;
        $data['agama'] = $this->penduduk->dataAgama();

        //panggil data di dalam db
        $data['pendidikan'] = $this->penduduk->getDataPendidikan();
        $data['pekerjaan'] = $this->penduduk->getDataPekerjaan();
        $data['sk'] = $this->penduduk->getDataSK();
        // var_dump($this->input->post('tgl'));
        // var_dump(date("Y-m-d"));
        // die;

        $this->form_validation->set_rules('tgl', 'Tanggal Meninggal', 'required|trim|callback_validTglMeninggal');
        $this->form_validation->set_rules('tempat', 'Tempat Meninggal', 'required|trim');
        $this->form_validation->set_rules('sebab', 'Penyebab Meninggal', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/penduduk/header', $data);
            $this->load->view('templates/penduduk/sidebar', $data);
            $this->load->view('templates/penduduk/topbar', $data);
            $this->load->view('penduduk/index', $data);
            $this->load->view('templates/penduduk/footer', $data);
        } else {
            $idpeddk = $this->session->userdata('id_peddk');

            $hasilRow = $this->db->get_where('sk_kematian', ['id_peddk' =>  $idpeddk])->num_rows();
            if ($hasilRow == 0) {
                $kode = $this->penduduk->tambahSkKematian();
            }

            $data['deskripsi'] = $this->db->get_where('sk_kematian', ['id_peddk' => $idpeddk])->row_array();

            $mpdf = new \Mpdf\Mpdf();
            $html = $this->load->view('penduduk/cetak_sk/kematian', $data, TRUE);

            $footer = array(
                'odd' => array(
                    'L' => array(
                        'content' => $kode,
                        'font-size' => 8,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#808080'
                    ),
                    'C' => array(
                        'content' => '',
                        'font-size' => 10,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#000000'
                    ),
                    'R' => array(
                        'content' => '',
                        'font-size' => 10,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#000000'
                    ),
                    'line' => 0,
                ),
                'even' => array()
            );
            $mpdf->SetFooter($footer);
            $mpdf->WriteHTML($html);
            $mpdf->Output("SK Kematian_" . $data['penduduk']['nik'], \Mpdf\Output\Destination::INLINE);
        }
    }

    public function validTglMeninggal()
    {
        $inputTGL = strtotime($this->input->post('tgl'));
        $sekarang = time();
        if ($inputTGL > $sekarang) {
            $this->form_validation->set_message('validTglMeninggal', 'Tanggal kematian yang anda masukan tidak valid!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function sSusunanKel()
    {
        penduduk_logged_in();
        $data['title'] = 'SK Susanan Keluarga';
        $data['penduduk'] = $this->penduduk->getSession();;
        $data['kades'] = $this->penduduk->getDataKades();
        $data['nomorKab'] = $this->db->get_where('jenis_sk', ['id_sk' => $this->input->post('sk')])->row_array();

        $data['kk'] = $this->db->get_where('penduduk', ['no_kk' => $data['penduduk']['no_kk'], 'hubungan' => 'KK'])->row_array();
        $data['susunan'] = $this->penduduk->getDataKeluarga($data['penduduk']['no_kk']);

        $kode = $this->penduduk->tambahSkSusunanK();

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('penduduk/cetak_sk/susunanKel', $data, TRUE);
        $footer = array(
            'odd' => array(
                'L' => array(
                    'content' => $kode,
                    'font-size' => 8,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#808080'
                ),
                'C' => array(
                    'content' => '',
                    'font-size' => 10,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#000000'
                ),
                'R' => array(
                    'content' => '',
                    'font-size' => 10,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#000000'
                ),
                'line' => 0,
            ),
            'even' => array()
        );
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($html);
        $mpdf->Output("SK SusunanKeluarga_" . $data['penduduk']['no_kk'], \Mpdf\Output\Destination::INLINE);
    }

    public function sDomisili()
    {
        penduduk_logged_in();
        $data['title'] = 'SK Domisili';
        $data['penduduk'] = $this->penduduk->getSession();;
        $data['kades'] = $this->penduduk->getDataKades();
        $data['nomorKab'] = $this->db->get_where('jenis_sk', ['id_sk' => $this->input->post('sk')])->row_array();

        $kode = $this->penduduk->tambahSkDomisili();

        $mpdf = new \Mpdf\Mpdf();
        if ($this->input->post('foto') == 0) {
            $html = $this->load->view('penduduk/cetak_sk/domisili', $data, TRUE);
        } else {
            $html = $this->load->view('penduduk/cetak_sk/domisiliP', $data, TRUE);
        }

        $footer = array(
            'odd' => array(
                'L' => array(
                    'content' => $kode,
                    'font-size' => 8,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#808080'
                ),
                'C' => array(
                    'content' => '',
                    'font-size' => 10,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#000000'
                ),
                'R' => array(
                    'content' => '',
                    'font-size' => 10,
                    'font-style' => 'B',
                    'font-family' => 'serif',
                    'color' => '#000000'
                ),
                'line' => 0,
            ),
            'even' => array()
        );
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($html);
        $mpdf->Output("SK Domisili_" . $data['penduduk']['no_kk'], \Mpdf\Output\Destination::INLINE);
    }

    public function skUsaha($id_sk)
    {
        $data['judul'] = 'Pengajuan SK Usaha';
        $data['nomorKab'] = $this->db->get_where('jenis_sk', ['id_sk' => $id_sk])->row_array();
        $data['kades'] = $this->penduduk->getDataKades();
        $data['agama'] = $this->penduduk->dataAgama();
        $data['pekerjaan'] = $this->penduduk->getDataPekerjaan();

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|max_length[16]|min_length[16]|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim|valid_date|callback_validTglLahir');
        $this->form_validation->set_rules('Arumah', 'Alamat Jalan Atau Nomor Rumah', 'required|trim');
        $this->form_validation->set_rules('Art', 'RT', 'required|trim|numeric');
        $this->form_validation->set_rules('Arw', 'RW', 'required|trim|numeric');
        $this->form_validation->set_rules('deskel', 'Desa/Kelurahan Belum Dipilih', 'required|trim');
        $this->form_validation->set_rules('Adeskel', 'Desa/Kelurahan', 'required|trim');
        $this->form_validation->set_rules('Akec', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|max_length[1]|min_length[1]|numeric');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('bidang', 'Bidang Usaha', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi Usaha', 'required|trim');
        $this->form_validation->set_rules('captcha', '', 'callback_verify');

        if ($this->form_validation->run() == FALSE) {

            // Captcha configuration
            $vals = array(
                'word'          => '',
                'img_path'      => './assets/captcha/',
                'img_url'       => base_url('assets/captcha/'),
                'font_path'     => FCPATH . 'assets/fonts/roboto-black.ttf',
                'img_width'     => '340',
                'img_height'    => 100,
                'expiration'    => 60,
                'word_length'   => 8,
                'font_size'     => 25,
                'img_id'        => 'Imageid',
                'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                // White background and border, black text and blue grid
                'colors'     => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(111, 251, 248)
                )
            );
            $captcha = create_captcha($vals);

            // Unset previous captcha and set new captcha word
            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);

            // Pass captcha image to view
            $data['captchaImg'] = $captcha['image'];

            $this->load->view('templates/header', $data);
            $this->load->view('layanan/form_skUsaha', $data);
            $this->load->view('templates/footer');
        } else {
            // Unset previous captcha and set new captcha word
            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);

            $kode = $this->penduduk->buatSkUsaha();

            $kodeAngka = preg_replace('/[^0-9\-]/', '', $kode);

            $data['data'] = $this->penduduk->getDataSKUsaha($kodeAngka);
            $mpdf = new \Mpdf\Mpdf();
            $html = $this->load->view('penduduk/cetak_sk/sk_usaha', $data, TRUE);

            $footer = array(
                'odd' => array(
                    'L' => array(
                        'content' => $kode,
                        'font-size' => 8,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#808080'
                    ),
                    'C' => array(
                        'content' => '',
                        'font-size' => 10,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#000000'
                    ),
                    'R' => array(
                        'content' => '',
                        'font-size' => 10,
                        'font-style' => 'B',
                        'font-family' => 'serif',
                        'color' => '#000000'
                    ),
                    'line' => 0,
                ),
                'even' => array()
            );
            $mpdf->SetFooter($footer);
            $mpdf->WriteHTML($html);
            $mpdf->Output("SK Usaha_" . $data['data']['nik'], \Mpdf\Output\Destination::INLINE);
        }
    }

    //TODO: function verifikasi tgl lahir
    public function validTglLahir()
    {
        $inputTGL = strtotime($this->input->post('tgl_lahir'));
        $sekarang = time();
        if ($inputTGL > $sekarang) {
            $this->form_validation->set_message('validTglLahir', 'Tanggal lahir yang anda masukan tidak valid!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //TODO: function untuk verifikasi captcha
    public function verify()
    {
        $inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');

        if ($inputCaptcha === $sessCaptcha) {
            return TRUE;
        } else {
            $this->form_validation->set_message('verify', 'Maaf, karakter yang anda masukan salah!');
            return FALSE;
        }
    }

    //TODO: function untuk reload via ajax captcha
    public function refreshCaptcha()
    {
        // Captcha configuration
        $vals = array(
            'word'          => '',
            'img_path'      => './assets/captcha/',
            'img_url'       => base_url('assets/captcha/'),
            'font_path'     => FCPATH . 'assets/fonts/roboto-black.ttf',
            'img_width'     => '340',
            'img_height'    => 100,
            'expiration'    => 60,
            'word_length'   => 8,
            'font_size'     => 25,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and blue grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(111, 251, 248)
            )
        );
        $captcha = create_captcha($vals);

        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Display captcha image
        echo $captcha['image'];
    }

    public function daftarSkTdkmampu()
    {
        $rows = $this->penduduk->skTdkMampu();
        $tabel = ' 
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if (time() - $row['tgl'] > (60 * 60 * 48) && $row['status'] == 0) {
                $this->db->delete('sk_tdkmampu', ['tgl' => $row['tgl']]);
            }

            if ($row['status'] == 0) {
                $status = '<a href="#" class="badge badge-danger ubahStatusSKTM" data-toggle="modal" data-target="#formVerifikasi" data-tgl="' . $row['tgl'] . '"><i class="fas fa-times"></i></a>';
            } else {
                $status = '<div class="badge badge-primary"><i class="fas fa-check-square"></i></div>';
            }
            $tabel .= ' <tr>
                            <td>' . $i++ . '</td> 
                            <td>' . $row['nik'] . '</td>
                            <td>' . $row['nama'] . '</td>
                            <td>' . $row['tujuan'] . '</td>
                            <td>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</td>
                            <td>SKTM' . $row['tgl'] . '</td>
                            <td>' . $status . '</td>
                        </tr> ';
        }
        $tabel .= '
                </tbody>
            </table>
        </div>
        <script src="' . base_url('assets/admin/') . 'js/demo/datatables-demo.js"></script>';
        echo json_encode($tabel);
    }

    public function getDataSKTM()
    {
        $tgl = $this->input->post('tgl');
        echo json_encode($this->db->get_where('sk_tdkmampu', ['tgl' => $tgl])->row_array());
    }

    public function ubahStatusSKTM()
    {
        $data = [
            'status' => 1
        ];
        $this->db->where('tgl', $this->input->post('tgl_buat'));
        $this->db->update('sk_tdkmampu', $data);

        $dataNoSK = [
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat')
        ];
        $this->db->insert('no_surat', $dataNoSK);

        $this->session->set_flashdata('verifikasi', 'SK Tidak Mampu');
        redirect('Super_Admin/verifikasiSK');
    }

    public function daftarSkSusunanK()
    {
        $rows = $this->penduduk->skSusunanK();
        $tabel = ' 
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if (time() - $row['tgl'] > (60 * 60 * 48) && $row['status'] == 0) {
                $this->db->delete('sk_susunank', ['tgl' => $row['tgl']]);
            }

            if ($row['status'] == 0) {
                $status = '<a href="#" class="badge badge-danger ubahStatusSKSK" data-toggle="modal" data-target="#formVerifikasi" data-tgl="' . $row['tgl'] . '"><i class="fas fa-times"></i></a>';
            } else {
                $status = '<div class="badge badge-primary"><i class="fas fa-check-square"></i></div>';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $row['nik'] . '</th>
                            <th>' . $row['nama'] . '</th>
                            <th>' . $row['tujuan'] . '</th>
                            <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
                            <th>SKTM' . $row['tgl'] . '</th>
                            <th>' . $status . '</th>
                        </tr> ';
        }
        $tabel .= '
                </tbody>
            </table>
        </div>
        <script src="' . base_url('assets/admin/') . 'js/demo/datatables-demo.js"></script>';
        echo json_encode($tabel);
    }

    public function getDataSKSK()
    {
        $tgl = $this->input->post('tgl');
        echo json_encode($this->db->get_where('sk_susunank', ['tgl' => $tgl])->row_array());
    }

    public function ubahStatusSKSK()
    {
        $data = [
            'status' => 1
        ];
        $this->db->where('tgl', $this->input->post('tgl_buat'));
        $this->db->update('sk_susunank', $data);

        $dataNoSK = [
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat')
        ];
        $this->db->insert('no_surat', $dataNoSK);
        $this->session->set_flashdata('verifikasi', 'SK Susunan Keluarga');
        redirect('Super_Admin/verifikasiSK');
    }

    public function daftarSkDomisili()
    {
        $rows = $this->penduduk->skDomisili();
        $tabel = ' 
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if (time() - $row['tgl'] > (60 * 60 * 48) && $row['status'] == 0) {
                $this->db->delete('sk_domisili', ['tgl' => $row['tgl']]);
            }

            if ($row['status'] == 0) {
                $status = '<a href="#" class="badge badge-danger ubahStatusSKD" data-toggle="modal" data-target="#formVerifikasi" data-tgl="' . $row['tgl'] . '"><i class="fas fa-times"></i></a>';
            } else {
                $status = '<div class="badge badge-primary"><i class="fas fa-check-square"></i></div>';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $row['nik'] . '</th>
                            <th>' . $row['nama'] . '</th>
                            <th>' . $row['tujuan'] . '</th>
                            <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
                            <th>SKD' . $row['tgl'] . '</th>
                            <th>' . $status . '</th>
                        </tr> ';
        }
        $tabel .= '
                </tbody>
            </table>
        </div>
        <script src="' . base_url('assets/admin/') . 'js/demo/datatables-demo.js"></script>';
        echo json_encode($tabel);
    }

    public function getDataSKD()
    {
        $tgl = $this->input->post('tgl');
        echo json_encode($this->db->get_where('sk_domisili', ['tgl' => $tgl])->row_array());
    }

    public function ubahStatusSKD()
    {
        $data = [
            'status' => 1
        ];
        $this->db->where('tgl', $this->input->post('tgl_buat'));
        $this->db->update('sk_domisili', $data);

        $dataNoSK = [
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat')
        ];
        $this->db->insert('no_surat', $dataNoSK);
        $this->session->set_flashdata('verifikasi', 'SK Domisili');
        redirect('Super_Admin/verifikasiSK');
    }

    public function daftarSkKematian()
    {
        $rows = $this->penduduk->skKematian();
        $tabel = ' 
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Meninggal</th>
                        <th>Tempat Meninggal</th>
                        <th>Sebab Meninggal</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Meninggal</th>
                        <th>Tempat Meninggal</th>
                        <th>Sebab Meninggal</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            // if ($row['status'] == 0) {
            //     $status = '<a href="' . base_url('Surat_Keterangan/ubahStatusSKK/' . $row['id_peddk'] . '') . '"><i class="fas fa-times"></i></a>';
            // } else {
            //     $status = '<a href="#"><i class="fas fa-check-square"></i></a>';
            // }

            if ($row['status'] == 0) {
                $status = '<a href="#" class="badge badge-danger ubahStatusSKK" data-toggle="modal" data-target="#formVerifikasi" data-id="' . $row['id_peddk'] . '"><i class="fas fa-times"></i></a>';
            } else {
                $status = '<div class="badge badge-primary"><i class="fas fa-check-square"></i></div>';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $row['nik'] . '</th>
                            <th>' . $row['nama'] . '</th>
                            <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
                            <th>' . $row['tempat'] . '</th>
                            <th>' . $row['sebab'] . '</th>
                            <th>SKK' . $row['id_peddk'] . '</th>
                            <th>' . $status . '</th>
                        </tr> ';
        }
        $tabel .= '
                </tbody>
            </table>
        </div>
        <script src="' . base_url('assets/admin/') . 'js/demo/datatables-demo.js"></script>';
        echo json_encode($tabel);
    }

    public function getDataSKK()
    {
        $id = $this->input->post('id');
        echo json_encode($this->db->get_where('sk_kematian', ['id_peddk' => $id])->row_array());
    }

    public function ubahStatusSKK()
    {

        $data = [
            'status' => 1
        ];
        $this->db->where('id_peddk', $this->input->post('tgl_buat'));
        $this->db->update('sk_kematian', $data);

        $dataNoSK = [
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat')
        ];
        $this->db->insert('no_surat', $dataNoSK);
        $this->session->set_flashdata('verifikasi', 'SK Kematian');
        redirect('Super_Admin/verifikasiSK');
    }

    public function daftarSkJbternak()
    {
        $rows = $this->penduduk->skJBternak();
        $tabel = ' 
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Ternak</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Ternak</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if (time() - $row['tgl'] > (60 * 60 * 48) && $row['status'] == 0) {
                $this->db->delete('sk_jbternak', ['tgl' => $row['tgl']]);
            }

            if ($row['status'] == 0) {
                $status = '<a href="#" class="badge badge-danger ubahStatusSKJBT" data-toggle="modal" data-target="#formVerifikasi" data-tgl="' . $row['tgl'] . '"><i class="fas fa-times"></i></a>';
            } else {
                $status = '<div class="badge badge-primary"><i class="fas fa-check-square"></i></div>';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $row['nik'] . '</th>
                            <th>' . $row['nama'] . '</th>
                            <th>' . $row['jenis_ternak'] . '</th>
                            <th>' . $row['nama_pembeli'] . '</th>
                            <th>' . $row['alamatp'] . '</th>
                            <th>SKJBT' . $row['tgl'] . '</th>
                            <th>' . $status . '</th>
                        </tr> ';
        }
        $tabel .= '
                </tbody>
            </table>
        </div>
        <script src="' . base_url('assets/admin/') . 'js/demo/datatables-demo.js"></script>';
        echo json_encode($tabel);
    }

    public function getDataSKJBT()
    {
        $tgl = $this->input->post('tgl');
        echo json_encode($this->db->get_where('sk_jbternak', ['tgl' => $tgl])->row_array());
    }

    public function ubahStatusSKJBT()
    {
        $data = [
            'status' => 1
        ];
        $this->db->where('tgl', $this->input->post('tgl_buat'));
        $this->db->update('sk_jbternak', $data);

        $dataNoSK = [
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat')
        ];
        $this->db->insert('no_surat', $dataNoSK);
        $this->session->set_flashdata('verifikasi', 'SK Jual Beli Ternak');
        redirect('Super_Admin/verifikasiSK');
    }

    public function daftarSkUsaha()
    {
        $rows = $this->penduduk->skUsaha();
        $tabel = ' 
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Bidang Usaha</th>
                        <th>Lokasi Usaha</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Bidang Usaha</th>
                        <th>Lokasi Usaha</th>
                        <th>Kode Surat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if (time() - $row['tgl_buat'] > (60 * 60 * 48) && $row['status'] == 0) {
                $this->db->delete('sk_usaha', ['tgl_buat' => $row['tgl_buat']]);
            }

            if ($row['status'] == 0) {
                $status = '<a href="#" class="badge badge-danger ubahStatusSKU" data-toggle="modal" data-target="#formVerifikasi" data-tgl="' . $row['tgl_buat'] . '"><i class="fas fa-times"></i></a>';
            } else {
                $status = '<div class="badge badge-primary"><i class="fas fa-check-square"></i></div>';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $row['nik'] . '</th>
                            <th>' . $row['nama'] . '</th>
                            <th>RT ' . $row['Art'] . ' RW ' . $row['Arw'] . ' ' . $row['Adeskel'] . ' Kecamatan ' . $row['Akec'] . '</th>
                            <th>' . $row['bidang'] . '</th>
                            <th>' . $row['lokasi'] . '</th>
                            <th>SKU' . $row['tgl_buat'] . '</th>
                            <th>' . $status . '</th>
                        </tr> ';
        }
        $tabel .= '
                </tbody>
            </table>
        </div>
        <script src="' . base_url('assets/admin/') . 'js/demo/datatables-demo.js"></script>';
        echo json_encode($tabel);
    }

    public function getDataSKU()
    {
        $tgl_buat = $this->input->post('tgl_buat');
        echo json_encode($this->db->get_where('sk_usaha', ['tgl_buat' => $tgl_buat])->row_array());
    }

    public function ubahStatusSKU()
    {
        $data = [
            'status' => 1
        ];
        $this->db->where('tgl_buat', $this->input->post('tgl_buat'));
        $this->db->update('sk_usaha', $data);

        $dataNoSK = [
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat')
        ];
        $this->db->insert('no_surat', $dataNoSK);
        $this->session->set_flashdata('verifikasi', 'SK Usaha');
        redirect('Super_Admin/verifikasiSK');
    }
}
