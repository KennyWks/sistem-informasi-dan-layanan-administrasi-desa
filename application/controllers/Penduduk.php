<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        penduduk_logged_in();
        $this->load->model('Penduduk_model', 'penduduk');
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['penduduk'] = $this->penduduk->getSession();

        // get data dan konversi dari array multideminsional ke single array
        $datadusun = $this->penduduk->getDataDusun();
        $data['rowDusun'] = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($datadusun)), 0);
        $datarw = array_merge($this->penduduk->getDataRW());
        $data['rowRW'] = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($datarw)), 0);
        $datart = $this->penduduk->getDataRT();
        $data['rowRT'] = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($datart)), 0);

        //data array di luar db.
        $data['status'] = $this->penduduk->dataStatus();
        $data['agama'] = $this->penduduk->dataAgama();

        //panggil data di dalam db
        $data['pendidikan'] = $this->penduduk->getDataPendidikan();
        $data['pekerjaan'] = $this->penduduk->getDataPekerjaan();
        $data['sk'] = $this->penduduk->getDataSK();

        $this->form_validation->set_rules('no_kk', 'NO KK', 'required|numeric|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|max_length[16]|min_length[16]|trim|callback_validNIK');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim|valid_date');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
        $this->form_validation->set_rules('suku', 'Suku', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/penduduk/header', $data);
            $this->load->view('templates/penduduk/sidebar', $data);
            $this->load->view('templates/penduduk/topbar', $data);
            $this->load->view('penduduk/index', $data);
            $this->load->view('templates/penduduk/footer', $data);
        } else {
            $this->penduduk->ubahDataPenduduk();
            $this->session->set_flashdata('ubah_penduduk', 'Penduduk');
            redirect('penduduk');
        }
    }

    public function validNIK()
    {
        $kode = ["5", "3", "0", "1", "0", "6"];
        $split = str_split($this->input->post('nik'), 1);
        $nik_array = array_slice($split, 0, 6);

        if ($kode == $nik_array) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validNIK', 'Maaf, NIK tidak sesuai dengan lokasi anda berdomisili. Silahkan masukan NIK yang lain atau hubungi pencatatan sipil setempat untuk mendapatkan NIK baru.');
            return FALSE;
        }
    }

    public function riwayatsk()
    {
        $data['title'] = 'Riwayat Pembuatan S.K';
        $data['penduduk'] = $this->penduduk->getSession();
        $data['sk'] = $this->penduduk->getDataSK();

        $this->load->view('templates/penduduk/header', $data);
        $this->load->view('templates/penduduk/sidebar', $data);
        $this->load->view('templates/penduduk/topbar', $data);
        $this->load->view('penduduk/riwayat_sk', $data);
        $this->load->view('templates/penduduk/footer', $data);
    }

    public function getSKtdkMampu()
    {
        $rows = $this->db->get_where('sk_tdkmampu', ['id_peddk' => $this->session->userdata('id_peddk')])->result_array();
        $tabel = '
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if ($row['status'] == 1) {
                $status = 'Sudah Diverifikasi';
            } else {
                $status = 'Belum Diverifikasi';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $row['tujuan'] . '</th>
                            <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
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

    public function getSKsusunanK()
    {
        $rows = $this->db->get_where('sk_susunank', ['id_peddk' => $this->session->userdata('id_peddk')])->result_array();
        $tabel = '
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if ($row['status'] == 1) {
                $status = 'Sudah Diverifikasi';
            } else {
                $status = 'Belum Diverifikasi';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $row['tujuan'] . '</th>
                            <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
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

    public function getSKdomisili()
    {
        $rows = $this->db->get_where('sk_domisili', ['id_peddk' => $this->session->userdata('id_peddk')])->result_array();
        $tabel = '
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menggunakan Foto</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Menggunakan Foto</th>
                        <th>Tujuan Penggunaan</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if ($row['foto'] == 0) {
                $foto = "Tidak";
            } else {
                $foto = "Ya";
            }
            if ($row['status'] == 1) {
                $status = "Sudah Diverifikasi";
            } else {
                $status = "Belum Diverifikasi";
            }

            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . $foto . '</th>
                            <th>' . $row['tujuan'] . '</th>
                            <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
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

    public function getSKkematian()
    {
        $rows = $this->db->get_where('sk_kematian', ['id_peddk' => $this->session->userdata('id_peddk')])->result_array();
        $tabel = '
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tempat Meninggal</th>
                        <th>Sebab Meninggal</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tempat Meninggal</th>
                        <th>Sebab Meninggal</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if ($row['status'] == 1) {
                $status = 'Sudah Diverifikasi';
            } else {
                $status = 'Belum Diverifikasi';
            }
            $tabel .= '<tr>
                      <th>' . $i++ . '</th>
                      <th>' . $row['tempat'] . '</th>
                      <th>' . $row['sebab'] . '</th>
                      <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
                      <th>' . $status . '</th>
                   </tr>';
        }
        $tabel .= '</tbody>
            </table>
        </div>
        <script src="' . base_url('assets/admin/') . 'js/demo/datatables-demo.js"></script>';
        echo json_encode($tabel);
    }

    public function getSKjbternak()
    {
        $rows = $this->db->get_where('sk_jbternak', ['id_peddk' => $this->session->userdata('id_peddk')])->result_array();
        $tabel = '
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>';
        $i = 1;
        foreach ($rows as $row) {
            if ($row['status'] == 1) {
                $status = 'Sudah Diverifikasi';
            } else {
                $status = 'Belum Diverifikasi';
            }
            $tabel .= ' <tr>
                            <th>' . $i++ . '</th>
                            <th>' . tanggal_indonesia(date('Y-m-d', $row['tgl'])) . '</th>
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
}
