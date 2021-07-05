<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        admin_logged_in();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Penduduk_model', 'penduduk');
    }

    //TODO: Function Admin
    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->admin->getSession();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek foto jika ada
            $uploadFoto = $_FILES['foto']['name'];

            if ($uploadFoto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1024';
                $config['upload_path'] = './assets/img-admin';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $fotoLama = $data['user']['foto'];
                    if ($fotoLama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img-admin/' . $fotoLama);
                    }
                    $fotoBaru = $this->upload->data('file_name');
                    $this->db->set('foto', $fotoBaru);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('Admin');
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('ubah_user', 'User');
            redirect('Admin');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->admin->getSession();

        $this->form_validation->set_rules('passLama', 'Password lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password baru', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi password baru', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/ubah_password', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $passLama = $this->input->post('passLama');

            $passBaru = $this->input->post('password1');

            if (!password_verify($passLama, $data['user']['password'])) {
                // cek password sama dengan di form
                $this->session->set_flashdata('passSalah', 'Password lama yang anda masukan salah.');
                redirect('Admin/ubahPassword');
            } else {
                if ($passLama == $passBaru) {
                    // cek password baru sama dengan yang lama di database
                    $this->session->set_flashdata('passSalah', 'Password anda tidak boleh sama dengan yang lama.');
                    redirect('Admin/ubahPassword');
                } else {
                    // password ok
                    $password_Hash = password_hash($passBaru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_Hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('ubahPass', 'Password');
                    redirect('Admin/ubahPassword');
                }
            }
        }
    }

    //penduduk
    public function daftarPenduduk()
    {
        $data['title'] = 'Penduduk';
        $data['user'] = $this->admin->getSession();

        if ($this->input->post('keyword')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // unset session keyword setelah 5 detik
        $this->session->mark_as_temp('keyword', 5);
        //config cari
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('no_kk', $data['keyword']);
        $this->db->or_like('nik', $data['keyword']);

        $this->db->from('penduduk');

        $config['total_rows'] = $this->db->count_all_results();
        //menghitung dan mengirim pada view agar menampilakan jumlah pencarian (angka)
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        //Config
        $config['base_url'] = base_url() . 'admin/daftarPenduduk';

        //berapa jumlah nomor di sebelah pagination yang aktif
        $config['num_links'] = 5;

        //initialize
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Awal';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Terakhir';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];

        //inisialize
        $this->pagination->initialize($config);

        //segment url
        $data['start'] = $this->uri->segment(3);
        $data['rows'] = $this->admin->getPenduduk($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/daftar_penduduk', $data);
        $this->load->view('templates/admin/footer');
    }

    public function ubahPenduduk($id_peddk)
    {
        $data['title'] = 'Ubah Penduduk';

        //panggil data sesuai sesion login aktif
        $data['user'] = $this->admin->getSession();
        $data['penduduk'] = $this->db->get_where('penduduk', ['id_peddk' => $id_peddk])->row_array();

        // penduduk model
        $data['rowDusun'] = $this->penduduk->getDataDusun();
        $data['rowRW'] = $this->penduduk->getDataRW();
        $data['rowRT'] = $this->penduduk->getDataRT();
        $data['pekerjaan'] = $this->admin->getDataPekerjaan();
        $data['hubungan'] = $this->admin->getDataHubungan();
        $data['pendidikan'] = $this->admin->getDataPendidikan();

        //data array di luar db.
        $data['status'] = $this->penduduk->dataStatus();;
        $data['agama'] = $this->penduduk->dataAgama();

        $this->form_validation->set_rules('no_kk', 'NO KK', 'required|numeric|trim|max_length[16]|min_length[16]');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|max_length[16]|min_length[16]|trim|callback_validNIK');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhir', 'Tanggal Lahir', 'required|valid_date|trim');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
        $this->form_validation->set_rules('suku', 'Suku', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/ubah_penduduk', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->admin->ubahDataPenduduk();
            $this->session->set_flashdata('ubah_penduduk', 'Penduduk');
            redirect('admin/daftarPenduduk');
        }
    }

    public function hapusPenduduk($id_peddk)
    {
        $this->db->delete('penduduk', array('id_peddk' => $id_peddk));
        redirect('admin/daftarPenduduk');
    }

    public function tambahPenduduk()
    {
        $data['title'] = 'Tambah Penduduk';
        $data['user'] = $this->admin->getSession();

        // penduduk model
        $data['rowDusun'] = $this->penduduk->getDataDusun();
        $data['rowRW'] = $this->penduduk->getDataRW();
        $data['rowRT'] = $this->penduduk->getDataRT();
        $data['pekerjaan'] = $this->admin->getDataPekerjaan();
        $data['hubungan'] = $this->admin->getDataHubungan();
        $data['pendidikan'] = $this->admin->getDataPendidikan();

        //data array di luar db.
        $data['status'] = $this->penduduk->dataStatus();
        $data['agama'] = $this->penduduk->dataAgama();

        $this->form_validation->set_rules('no_kk', 'NO KK', 'required|numeric|trim|max_length[16]|min_length[16]');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|max_length[16]|min_length[16]|trim|callback_validNIK');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'required');
        $this->form_validation->set_rules('hubungan', 'Hubungan', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|valid_date|trim');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric|trim');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('suku', 'Suku', 'required|alpha|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/tambah_penduduk', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->admin->tambahDataPenduduk();
            $this->session->set_flashdata('tambah_penduduk', 'Penduduk');
            redirect('admin/daftarPenduduk');
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

    public function daftarKK()
    {
        $data['user'] = $this->admin->getSession();
        $data['rowRT'] = $this->penduduk->getDataRT();

        if ($this->input->post('rt')) {
            $data['rt'] = $this->input->post('rt');
            $this->session->set_userdata('rt', $data['rt']);
        } else {
            $data['rt'] = $this->session->userdata('rt');
        }

        // unset session rt setelah 25 detik
        $this->session->mark_as_temp('rt', 30);
        //config cari
        $this->db->like('rt', $data['rt']);
        $this->db->from('penduduk');

        $config['total_rows'] = $this->db->count_all_results();
        //menghitung dan mengirim pada view agar menampilakan jumlah pencarian (angka)
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        //Config
        $config['base_url'] = base_url() . 'admin/daftarKK';

        //berapa jumlah nomor di sebelah pagination yang aktif
        $config['num_links'] = 5;

        //initialize
        $this->pagination->initialize($config);

        //segment url
        $data['start'] = $this->uri->segment(3);
        $data['kk'] = $this->admin->getDataKK($config['per_page'], $data['start'], $data['rt']);
        $data['title'] = 'RT ' . $data['rt'] . ' - Total Nomor KK : ' . $config['total_rows'] . ' Data';

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/daftar_kk', $data);
        $this->load->view('templates/admin/footer');
    }
}
