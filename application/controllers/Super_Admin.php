<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_Admin extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Super_Admin_model', 'SA');
    }
    
    public function index()
    {
        admin_logged_in();
        $data['title'] = 'Dashboard';
        $data['user'] = $this->SA->getSession();

        //TODO:Card
        $data['permohonan'] = $this->SA->hitungPermohonan();
        $data['setujui'] = $this->SA->hitungDisetujui();

        $data['POnline'] = $this->SA->hitungPOnline();
        $data['PTotal'] = $this->SA->hitungPTotal();

        //TODO: get data grafik area kunjungan
        $data['bln1'] = $this->SA->grafikPBln1();
        $data['bln2'] = $this->SA->grafikPBln2();
        $data['bln3'] = $this->SA->grafikPBln3();
        $data['bln4'] = $this->SA->grafikPBln4();
        $data['bln5'] = $this->SA->grafikPBln5();
        $data['bln6'] = $this->SA->grafikPBln6();
        $data['bln7'] = $this->SA->grafikPBln7();
        $data['bln8'] = $this->SA->grafikPBln8();
        $data['bln9'] = $this->SA->grafikPBln9();
        $data['bln10'] = $this->SA->grafikPBln10();
        $data['bln11'] = $this->SA->grafikPBln11();
        $data['bln12'] = $this->SA->grafikPBln12();

        //TODO: get data grafik pie sk
        $data['data1'] = $this->db->get('sk_tdkmampu')->num_rows();
        $data['data2'] = $this->db->get('sk_susunank')->num_rows();
        $data['data3'] = $this->db->get('sk_kematian')->num_rows();
        $data['data4'] = $this->db->get('sk_domisili')->num_rows();
        $data['data5'] = $this->db->get('sk_usaha')->num_rows();
        $data['data6'] = $this->db->get('sk_jbternak')->num_rows();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/index', $data);
        $this->load->view('templates/admin/footer');
    }

    //TODO: Tamu
    public function daftarTamu()
    {
        admin_logged_in();
        $data['title'] = 'Data Tamu';
        $data['user'] = $this->SA->getSession();
        $data['tamu'] = $this->SA->getDaftarTamu();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/daftar_tamu', $data);
        $this->load->view('templates/admin/footer');
    }

    public function hapusTamu($id_tamu)
    {
        admin_logged_in();
        $this->db->delete('tamu', ['id_tamu' => $id_tamu]);
        redirect('Super_Admin/daftarTamu');
    }

    //TODO: berita
    public function daftarBerita()
    {
        admin_logged_in();
        $data['title'] = 'Berita';
        $data['user'] = $this->SA->getSession();
        $data['berita'] = $this->SA->getDaftarBerita();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/daftar_berita', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambahBerita()
    {
        admin_logged_in();
        $data['title'] = 'Tambah Berita';
        $data['user'] = $this->SA->getSession();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Isi Berita', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/tambah_berita', $data);
            $this->load->view('templates/admin/footer');
        } else {

            //TODO: cek foto jika ada
            $uploadFoto = $_FILES['foto']['name'];

            if ($uploadFoto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1024';
                $config['upload_path'] = './assets/img-berita';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $fotoLama = $data['user']['foto'];
                    if ($fotoLama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img-berita/' . $fotoLama);
                    }
                    $fotoBaru = $this->upload->data('file_name');

                    $data = [
                        'judul' => htmlspecialchars($this->input->post('judul', true)),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'tanggal' => time(),
                        'penulis' => htmlspecialchars($this->input->post('penulis', true)),
                        'foto' => $fotoBaru
                    ];
                    $this->db->insert('berita', $data);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('Super_Admin/daftarBerita');
                }
            } else {
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul', true)),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'tanggal' => time(),
                    'penulis' => htmlspecialchars($this->input->post('penulis', true)),
                    'foto' => 'default.jpg'
                ];
                $this->db->insert('berita', $data);
            }
            $this->session->set_flashdata('tambah-berita', 'Berita');
            redirect('Super_Admin/daftarBerita');
        }
    }

    public function ubahBerita($id_berita)
    {
        admin_logged_in();
        $data['title'] = 'Ubah Berita';
        $data['user'] = $this->SA->getSession();
        $data['berita'] = $this->db->get_where('berita', array('id_berita' => $id_berita))->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Isi Berita', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/ubah_berita', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = array(
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'deskripsi' => $this->input->post('deskripsi'),
                'penulis' => htmlspecialchars($this->input->post('penulis', true))
            );

            //TODO: cek foto jika ada
            $uploadFoto = $_FILES['foto']['name'];

            if ($uploadFoto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1024';
                $config['upload_path'] = './assets/img-berita';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $fotoLama = $data['user']['foto'];
                    if ($fotoLama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img-berita/' . $fotoLama);
                    }
                    $fotoBaru = $this->upload->data('file_name');
                    $this->db->set('foto', $fotoBaru);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('Super_Admin/daftarBerita');
                }
            }
            $this->db->where('id_berita', $this->input->post('id_berita'));
            $this->db->update('berita', $data);
            $this->session->set_flashdata('ubah-berita', 'Berita');
            redirect('Super_Admin/daftarBerita');
        }
    }

    public function hapusBerita($id_berita)
    {
        admin_logged_in();
        $query = "SELECT foto FROM berita WHERE id_berita = $id_berita";
        $fotoLama = $this->db->query($query)->result_array();

        if ($fotoLama[0]['foto'] != 'default.jpg') {
            unlink(FCPATH . 'assets/img-berita/' . $fotoLama[0]['foto']);
        }
        $this->db->delete('berita', array('id_berita' => $id_berita));
        redirect('Super_Admin/daftarBerita');
    }

    //TODO: role
    public function role()
    {
        admin_logged_in();
        $data['title'] = 'Role';
        $data['user'] = $this->SA->getSession();
        $data['role'] = $this->SA->getUserRole();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/role', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('tambah_role', 'Role');
            redirect('Super_Admin/role');
        }
    }

    public function getDataBerita()
    {
        admin_logged_in();
        $id_berita = $this->input->post('id');
        echo json_encode($this->db->get_where('berita', ['id_berita' => $id_berita])->row_array());
    }

    public function getDataUbahRole()
    {
        admin_logged_in();
        $role_id = $this->input->post('id');
        echo json_encode($this->db->get_where('user_role', ['id' => $role_id])->row_array());
    }

    public function ubahRole()
    {
        admin_logged_in();
        $data = [
            "role" => htmlspecialchars($this->input->post('role', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
        $this->session->set_flashdata('ubah_role', 'Role');
        redirect('Super_Admin/role');
    }

    public function hapusRole($id)
    {
        admin_logged_in();
        $this->db->delete('user_role', array('id' => $id));
        redirect('Super_Admin/role');
    }

    //TODO: role akses
    public function roleAkses($id)
    {
        admin_logged_in();
        $data['title'] = 'Role Akses';
        $data['user'] = $this->SA->getSession();
        $data['role'] = $this->SA->getUserRoleById($id);
        $data['menu'] = $this->SA->getUserMenu($id);

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/role_akses', $data);
        $this->load->view('templates/admin/footer');
    }

    public function ubahAkses()
    {
        admin_logged_in();
        $menu_Id = $this->input->post('menuId');
        $role_Id = $this->input->post('roleId');

        $data = [
            'menu_id' => $menu_Id,
            'role_id' => $role_Id
        ];

        $result = $this->db->get_where('user_akses_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_akses_menu', $data);
        } else {
            $this->db->delete('user_akses_menu', $data);
        }
    }

    public function daftarNewAdmin()
    {
        admin_logged_in();
        $data['judul'] = 'Daftar Admin';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'Alamat email yang anda masukan sudah terdaftar'
            ]
        );

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|min_length[8]|matches[password2]',
            [
                'matches' => 'Password dan konfirmasi password tidak sama!',
                'min_length' => 'Password terlalu pendek! Minimal 8 karakter.'
            ]
        );

        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/login/header', $data);
            $this->load->view('super_admin/daftar_newAdmin');
            $this->load->view('templates/login/footer');
        } else {

            $email = $this->input->post('email', true);

            //TODO: siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'tgl_buat' => time()
            ];

            $this->SA->daftar();
            $this->db->insert('user_token', $user_token);

            $this->_kirimEmail($token, 'verifikasi');

            $this->session->set_flashdata('daftar-user', 'User');
            redirect('Super_Admin');
        }
    }

    private function _kirimEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'desa.oelatimo@gmail.com',
            'smtp_pass' => 'Oelatimo123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('desa.oelatimo@gmail.com', 'Webite Desa Oelatimo');
        $this->email->to($this->input->post('email'));
        if ($type == 'verifikasi') {
            $this->email->subject('Verifikasi akun');
            $this->email->message('
            <h3>Hai!</h3>
            <p>Klik link "Aktivasi Sekarang!" untuk verifikasi akun anda : <a href="' . base_url() . 'Super_Admin/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi sekarang!</a></p><br>
            <p>Salam</p><br>
            <p><a style="text-decoration:none;" href="' . base_url() . '">"SLIP Desa Oelatimo"</a></p>');
        } else  if ($type == 'lupaPassword') {
            $this->email->subject('Ubah Password Akun');
            $this->email->message('
            <h3>Hai!</h3>
            <p>Klik link "Ubah Password Sekarang!" untuk mengubah password akun anda : <a href="' . base_url() . 'Super_Admin/aturUlangPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ubah Password Sekarang!</a></p><br>
            <p>Salam</p><br>
            <p><a style="text-decoration:none;" href="' . base_url() . '">"SLIP Desa Oelatimo"</a></p>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['tgl_buat'] < (60 * 60 * 24)) {
                    $this->db->set('aktif', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center mb-1" role="alert">' . $email . ' telah diaktivasi! Silahkan login.</div>');
                    redirect('otentifikasi/');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mb-1" role="alert">Aktivasi akun gagal! Token kedaluwarsa.</div>');
                    redirect('otentifikasi/');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mb-1" role="alert">Aktivasi akun gagal! Token tidak valid.</div>');
                redirect('otentifikasi/');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mb-1" role="alert">Aktivasi akun gagal! Email tidak valid.</div>');
            redirect('otentifikasi/');
        }
    }

    public function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Lupa Password';
            $this->load->view('templates/login/header', $data);
            $this->load->view('otentifikasi/lupa_password');
            $this->load->view('templates/login/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'aktif' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'tgl_buat' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_kirimEmail($token, 'lupaPassword');

                $this->session->set_flashdata('message', '<div class="alert alert-success mb-0 text-center" role="alert">Silahkan cek email anda untuk mengubah password!</div>');
                redirect('Super_Admin/lupaPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mb-0 text-center" role="alert">Maaf, email anda mungkin belum terdaftar atau belum diaktivasi!</div>');
                redirect('Super_Admin/lupaPassword');
            }
        }
    }

    public function aturUlangPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('atur_email', $email);
                $this->ubahPassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Ubah Password akun gagal! Token tidak valid.</div>');
                redirect('otentifikasi');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Ubah akun gagal! Email tidak valid.</div>');
            redirect('otentifikasi');
        }
    }

    public function ubahPassword()
    {
        if (!$this->session->userdata('atur_email')) {
            redirect('otentifikasi');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Ubah Password';
            $this->load->view('templates/login/header', $data);
            $this->load->view('otentifikasi/ubah_password');
            $this->load->view('templates/login/footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('atur_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('atur_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Password berhasil diubah! Silahkan login.</div>');
            redirect('otentifikasi');
        }
    }

    //TODO: komentar model + controller
    public function daftarKomentar()
    {
        admin_logged_in();
        $data['title'] = 'Daftar Komentar';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->SA->getDaftarKomentar();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/daftar_komentar');
        $this->load->view('templates/admin/footer', $data);
    }

    public function hapusKomentar($id_komentar)
    {
        admin_logged_in();
        $this->db->delete('komentar', array('id_komentar' => $id_komentar));
        redirect('Super_Admin/daftarKomentar');
    }

    public function getDataKomentar()
    {
        admin_logged_in();
        $id_komentar = $this->input->post('id');
        echo json_encode($this->db->get_where('komentar', ['id_komentar' => $id_komentar])->row_array());
    }

    public function ubahBacaKomentar()
    {
        admin_logged_in();
        $data = [
            "baca" => 1
        ];

        $this->db->where('id_komentar', $this->input->post('id'));
        $this->db->update('komentar', $data);
    }

    //TODO: pesan model + controller
    public function daftarPesan()
    {
        admin_logged_in();
        $data['title'] = 'Daftar Pesan';
        $data['user'] = $this->SA->getSession();
        $data['pesan'] = $this->SA->getDaftarPesan();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/daftar_pesan');
        $this->load->view('templates/admin/footer', $data);
    }

    public function hapusPesan($id_pesan)
    {
        admin_logged_in();
        $this->db->delete('pesan', array('id_pesan' => $id_pesan));
        redirect('Super_Admin/daftarPesan');
    }

    public function getDataPesan()
    {
        admin_logged_in();
        $id_pesan = $this->input->post('id');
        echo json_encode($this->db->get_where('pesan', ['id_pesan' => $id_pesan])->row_array());
    }

    public function ubahBacaPesan()
    {
        admin_logged_in();
        $data = [
            "baca" => 1
        ];

        $this->db->where('id_pesan', $this->input->post('id'));
        $this->db->update('pesan', $data);
    }

    //TODO: Kades
    public function daftarKades()
    {
        admin_logged_in();
        $data['title'] = 'Sejarah Kades';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->SA->getSejarahKades();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/daftar_kades', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambahKades()
    {
        admin_logged_in();
        $data['title'] = 'Tambah Kades';
        $data['user'] = $this->SA->getSession();
        $data['jabatan'] = $this->db->get('jabatan_kades')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('awal', 'Tahun Awal', 'required|trim|numeric|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('akhir', 'Tahun Akhir', 'required|trim|numeric|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('pidato', 'Pidato', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/tambah_kades', $data);
            $this->load->view('templates/admin/footer');
        } else {

            //TODO: cek foto jika ada
            $uploadFoto = $_FILES['foto']['name'];

            if ($uploadFoto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '250';
                $config['upload_path'] = './assets/img-kades';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $fotoLama = $data['user']['foto'];
                    if ($fotoLama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img-kades/' . $fotoLama);
                    }
                    $fotoBaru = $this->upload->data('file_name');

                    $data = [
                        'nama' => htmlspecialchars($this->input->post('nama', true)),
                        'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                        'awal' => htmlspecialchars($this->input->post('awal', true)),
                        'akhir' => htmlspecialchars($this->input->post('akhir', true)),
                        'pidato' => $this->input->post('pidato'),
                        'foto' => $fotoBaru
                    ];
                    $this->db->insert('sejarah_kades', $data);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('Super_Admin/daftarKades');
                }
            } else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                    'awal' => htmlspecialchars($this->input->post('awal', true)),
                    'akhir' => htmlspecialchars($this->input->post('akhir', true)),
                    'pidato' => $this->input->post('pidato'),
                    'foto' => 'default.jpg'
                ];
                $this->db->insert('sejarah_kades', $data);
            }
            $this->session->set_flashdata('tambah-kades', 'Kades');
            redirect('Super_Admin/daftarKades');
        }
    }

    public function ubahKades($id_kades)
    {
        admin_logged_in();
        $data['title'] = 'Ubah Kades';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get_where('sejarah_kades', array('id_kades' => $id_kades))->row_array();
        $data['jabatan'] = $this->db->get('jabatan_kades')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('awal', 'Tahun Awal', 'required|trim|numeric|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('akhir', 'Tahun Akhir', 'required|trim|numeric|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('pidato', 'Pidato', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/ubah_kades', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = array(
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'awal' => htmlspecialchars($this->input->post('awal', true)),
                'akhir' => htmlspecialchars($this->input->post('akhir', true)),
                'pidato' => $this->input->post('pidato')
            );

            //TODO: cek foto jika ada
            $uploadFoto = $_FILES['foto']['name'];

            if ($uploadFoto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '250';
                $config['upload_path'] = './assets/img-kades';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $fotoLama = $data['user']['foto'];
                    if ($fotoLama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img-kades/' . $fotoLama);
                    }
                    $fotoBaru = $this->upload->data('file_name');
                    $this->db->set('foto', $fotoBaru);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $error['error']);
                    redirect('Super_Admin/daftarKades');
                }
            }
            $this->db->where('id_kades', $this->input->post('id_kades'));
            $this->db->update('sejarah_kades', $data);
            $this->session->set_flashdata('ubah-kades', 'Kades');
            redirect('Super_Admin/daftarKades');
        }
    }

    public function hapusKades($id_kades)
    {
        admin_logged_in();
        $query = "SELECT foto FROM sejarah_kades WHERE id_kades = $id_kades";
        $fotoLama = $this->db->query($query)->result_array();

        if ($fotoLama[0]['foto'] != 'default.jpg') {
            unlink(FCPATH . 'assets/img-kades/' . $fotoLama[0]['foto']);
        }
        $this->db->delete('sejarah_kades', array('id_kades' => $id_kades));
        redirect('Super_Admin/daftarKades');
    }

    //TODO: wilayah
    public function daftarWilayah()
    {
        admin_logged_in();
        $data['title'] = 'Wilayah';
        $data['user'] = $this->SA->getSession();
        $data['wilayah'] = $this->SA->getDaftarWilayah();

        $this->form_validation->set_rules('dusun', 'Data Dusun', 'required|trim');
        $this->form_validation->set_rules('rw', 'Data RW', 'required|trim');
        $this->form_validation->set_rules('rt', 'Data RT', 'required|trim|is_unique[wilayah.rt]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_wilayah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                "dusun" => htmlspecialchars($this->input->post('dusun', true)),
                "rw" => htmlspecialchars($this->input->post('rw', true)),
                "rt" => htmlspecialchars($this->input->post('rt', true))
            ];

            $this->db->insert('wilayah', $data);
            $this->session->set_flashdata('tambah-wilayah', 'Wilayah');
            redirect('Super_Admin/daftarWilayah');
        }
    }

    public function getDataUbahWilayah()
    {
        admin_logged_in();
        $id_wilayah = $this->input->post('id_wilayah');
        echo json_encode($this->db->get_where('wilayah', ['id_wilayah' => $id_wilayah])->row_array());
    }

    public function ubahWilayah()
    {
        admin_logged_in();
        $data['title'] = 'Wilayah';
        $data['user'] = $this->SA->getSession();
        $data['wilayah'] = $this->SA->getDaftarWilayah();

        $this->form_validation->set_rules('dusun', 'Data Dusun', 'required|trim');
        $this->form_validation->set_rules('rw', 'Data RW', 'required|trim');
        $this->form_validation->set_rules('rt', 'Data RT', 'required|trim|is_unique[wilayah.rt]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_wilayah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                "dusun" => htmlspecialchars($this->input->post('dusun', true)),
                "rw" => htmlspecialchars($this->input->post('rw', true)),
                "rt" => htmlspecialchars($this->input->post('rt', true))
            ];

            $this->db->where('id_wilayah', $this->input->post('id_wilayah'));
            $this->db->update('wilayah', $data);
            $this->session->set_flashdata('ubah-wilayah', 'Wilayah');
            redirect('Super_Admin/daftarWilayah');
        }
    }

    public function hapusWilayah($id_wilayah)
    {
        admin_logged_in();
        $this->db->delete('wilayah', array('id_wilayah' => $id_wilayah));
        redirect('Super_Admin/daftarWilayah');
    }

    //TODO: Form Lahan
    public function lahan()
    {
        admin_logged_in();
        $data['title'] = 'Form Lahan';
        $data['user'] = $this->SA->getSession();
        $data['lahan'] = $this->db->get('lahan')->row_array();

        $this->form_validation->set_rules('wilayah', 'Kolom Lahan Wilayah', 'required|trim|numeric');
        $this->form_validation->set_rules('pemukiman', 'Kolom Lahan Pemukiman', 'required|trim|numeric');
        $this->form_validation->set_rules('pertanian', 'Kolom Lahan Pertanian', 'required|trim|numeric');
        $this->form_validation->set_rules('perkebunan', 'Kolom Lahan Perkebunan', 'required|trim|numeric');
        $this->form_validation->set_rules('tambak', 'Kolom Lahan Tambak', 'required|trim|numeric');
        $this->form_validation->set_rules('hutan', 'Kolom Lahan Hutan', 'required|trim|numeric');
        $this->form_validation->set_rules('embung', 'Kolom Lahan Embung', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/form_lahan', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->SA->ubahLahan();
            $this->session->set_flashdata('ubah-lahan', 'Lahan');
            redirect('Super_Admin/lahan');
        }
    }

    //TODO: Saspras
    public function daftarSaspras()
    {
        admin_logged_in();
        $data['title'] = 'Saspras';
        $data['user'] = $this->SA->getSession();
        $data['saspras'] = $this->SA->getDaftarSaspras();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_saspras', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->SA->tambahSaspras();
            $this->session->set_flashdata('tambah-saspras', 'Saspras');
            redirect('Super_Admin/daftarSaspras');
        }
    }

    public function getDataUbahSaspras()
    {
        admin_logged_in();
        $id_saspras = $this->input->post('id_saspras');
        echo json_encode($this->db->get_where('saspras', ['id_saspras' => $id_saspras])->row_array());
    }

    public function ubahSaspras()
    {
        admin_logged_in();
        $data['title'] = 'Saspras';
        $data['user'] = $this->SA->getSession();
        $data['saspras'] = $this->SA->getDaftarSaspras();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_saspras', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                "nama" => htmlspecialchars($this->input->post('nama', true)),
                "kondisi" => htmlspecialchars($this->input->post('kondisi', true)),
                "pemilik" => htmlspecialchars($this->input->post('pemilik', true)),
                "jenis" => htmlspecialchars($this->input->post('jenis', true))
            ];

            $this->db->where('id_saspras', $this->input->post('id_saspras'));
            $this->db->update('saspras', $data);
            $this->session->set_flashdata('ubah-saspras', 'Saspras');
            redirect('Super_Admin/daftarSaspras');
        }
    }

    public function hapusSaspras($id_saspras)
    {
        admin_logged_in();
        $this->db->delete('saspras', array('id_saspras' => $id_saspras));
        redirect('Super_Admin/daftarSaspras');
    }

    //TODO: Atur APBDesa
    public function daftarAPBDesa()
    {
        admin_logged_in();
        $data['title'] = 'APBDesa';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->SA->getDaftarAPBDesa();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/daftar_apbdesa', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambahAPBDesa()
    {
        admin_logged_in();
        $data['title'] = 'Tambah APBDesa';
        $data['user'] = $this->SA->getSession();

        $this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required|trim');
        $this->form_validation->set_rules('pasli', 'Pendapatan Asli', 'required|trim');
        $this->form_validation->set_rules('transfer', 'Transfer', 'required|trim');
        $this->form_validation->set_rules('plain', 'Pendapatan Lain', 'required|trim');
        $this->form_validation->set_rules('belanja', 'Belanja', 'required|trim');
        $this->form_validation->set_rules('ppdb', 'Pelaksaan Pembangunan Desa', 'required|trim');
        $this->form_validation->set_rules('ppdp', 'Penyelenggaraan Pemerintahan Desa', 'required|trim');
        $this->form_validation->set_rules('pmd', 'Pemberdayaan Masyarakat Desa', 'required|trim');
        $this->form_validation->set_rules('pkd', 'Pembinaan Kemasyarakatan Desa', 'required|trim');
        $this->form_validation->set_rules('btt', 'Belanja Tak Terduga', 'required|trim');
        $this->form_validation->set_rules('pembiayaan', 'Pembiayaan', 'required|trim');
        $this->form_validation->set_rules('kas', 'Kas', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|max_length[4]|min_length[4]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/tambah_apbdesa', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $tahun = $this->input->post('tahun');
            $anggaran = $this->input->post('anggaran');

            $query = "SELECT tahun,anggaran FROM apbdesa WHERE tahun = " . $tahun . " AND anggaran = '" . $anggaran . "'";
            $duplicat = $this->db->query($query)->num_rows();

            if ($duplicat > 0) {
                $this->session->set_flashdata('error-apbdesa', '<div class="alert alert-danger text-center mb-1" role="alert">Maaf, data sudah ada!</div>');
                redirect('Super_Admin/tambahAPBDesa');
            } else {
                $this->SA->tambahDataAPBDesa();
                $this->session->set_flashdata('tambah-APBDesa', 'APBDesa');
                redirect('Super_Admin/daftarAPBDesa');
            }
        }
    }

    public function ubahAPBDesa($id_apbdesa)
    {
        admin_logged_in();
        $data['title'] = 'Ubah APBDesa';

        $data['user'] = $this->SA->getSession();

        $data['row'] = $this->db->get_where('view_apbdesa', ['id_apbdesa' => $id_apbdesa])->row_array();

        $this->form_validation->set_rules('pendapatan', 'Pendapatan', 'required|trim');
        $this->form_validation->set_rules('pasli', 'Pendapatan Asli', 'required|trim');
        $this->form_validation->set_rules('transfer', 'Transfer', 'required|trim');
        $this->form_validation->set_rules('plain', 'Pendapatan Lain', 'required|trim');
        $this->form_validation->set_rules('belanja', 'Belanja', 'required|trim');
        $this->form_validation->set_rules('ppdb', 'Pelaksaan Pembangunan Desa', 'required|trim');
        $this->form_validation->set_rules('ppdp', 'Penyelenggaraan Pemerintahan Desa', 'required|trim');
        $this->form_validation->set_rules('pmd', 'Pemberdayaan Masyarakat Desa', 'required|trim');
        $this->form_validation->set_rules('pkd', 'Pembinaan Kemasyarakatan Desa', 'required|trim');
        $this->form_validation->set_rules('btt', 'Belanja Tak Terduga', 'required|trim');
        $this->form_validation->set_rules('pembiayaan', 'Pembiayaan', 'required|trim');
        $this->form_validation->set_rules('kas', 'Kas', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|max_length[4]|min_length[4]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/ubah_apbdesa', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->SA->ubahDataAPBDesa();
            $this->session->set_flashdata('ubah-APBDesa', 'APBDesa');
            redirect('Super_Admin/daftarAPBDesa');
        }
    }

    public function hapusAPBDesa($id_apbdesa)
    {
        admin_logged_in();
        $this->db->delete('apbdesa', ['id_apbdesa' => $id_apbdesa]);
        $this->db->delete('papbdesa', ['kode_apbdesa' => $id_apbdesa]);
        $this->db->delete('bapbdesa', ['kode_apbdesa' => $id_apbdesa]);
        redirect('Super_Admin/daftarAPBDesa');
    }

    //TODO: Lembaga - Karang Taruna 
    public function daftarPengurusKT()
    {
        admin_logged_in();
        $data['title'] = 'Karang Taruna';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('kt')->result_array();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/daftar_kt', $data);
        $this->load->view('templates/admin/footer', $data);
    }

    public function getDataUbahKT()
    {
        admin_logged_in();
        $id_kt = $this->input->post('id_kt');
        echo json_encode($this->db->get_where('kt', ['id_kt' => $id_kt])->row_array());
    }

    public function ubahPengurusKT()
    {
        admin_logged_in();
        $data['title'] = 'Karang Taruna';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('kt')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_kt', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true))
            ];
            $this->db->where('id_kt', $this->input->post('id_aparat'));
            $this->db->update('kt', $data);
            $this->session->set_flashdata('ubah-kt', 'Pengurus Karang Taruna');
            redirect('Super_Admin/daftarPengurusKT');
        }
    }

    //TODO: Lembaga - LPM 
    public function daftarPengurusLPM()
    {
        admin_logged_in();
        $data['title'] = 'LPM';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('lpm')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_lpm', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->SA->tambahDataPengurusLPM();
            $this->session->set_flashdata('tambah-lpm', 'Pengurus LPM');
            redirect('Super_Admin/daftarPengurusLPM');
        }
    }

    public function getDataUbahLPM()
    {
        admin_logged_in();
        $id_lpm = $this->input->post('id_lpm');
        echo json_encode($this->db->get_where('lpm', ['id_lpm' => $id_lpm])->row_array());
    }

    public function ubahPengurusLPM()
    {
        admin_logged_in();
        $data['title'] = 'LPM';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('lpm')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_lpm', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true))
            ];
            $this->db->where('id_lpm', $this->input->post('id_aparat'));
            $this->db->update('lpm', $data);
            $this->session->set_flashdata('ubah-lpm', 'Pengurus LPM');
            redirect('Super_Admin/daftarPengurusLPM');
        }
    }

    public function hapusAnggotaLPM($id_lpm)
    {
        admin_logged_in();
        $this->db->delete('lpm', ['id_lpm' => $id_lpm]);
        redirect('Super_Admin/daftarPengurusLPM');
    }

    //TODO: Lembaga - PKK 
    public function daftarPengurusPKK()
    {
        admin_logged_in();
        $data['title'] = 'PKK';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('pkk')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_pkk', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->SA->tambahDataPengurusPKK();
            $this->session->set_flashdata('tambah-pkk', 'Pengurus PKK');
            redirect('Super_Admin/daftarPengurusPKK');
        }
    }

    public function getDataUbahPKK()
    {
        admin_logged_in();
        $id_pkk = $this->input->post('id_pkk');
        echo json_encode($this->db->get_where('pkk', ['id_pkk' => $id_pkk])->row_array());
    }

    public function ubahPengurusPKK()
    {
        admin_logged_in();
        $data['title'] = 'PKK';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('pkk')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_pkk', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true))
            ];
            $this->db->where('id_pkk', $this->input->post('id_aparat'));
            $this->db->update('pkk', $data);
            $this->session->set_flashdata('ubah-pkk', 'Pengurus PKK');
            redirect('Super_Admin/daftarPengurusPKK');
        }
    }

    public function hapusAnggotaPKK($id_pkk)
    {
        admin_logged_in();
        $this->db->delete('pkk', ['id_pkk' => $id_pkk]);
        redirect('Super_Admin/daftarPengurusPKK');
    }

    //TODO: Lembaga - BPD 
    public function daftarPengurusBPD()
    {
        admin_logged_in();
        $data['title'] = 'BPD';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('bpd')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_bpd', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->SA->tambahDataPengurusBPD();
            $this->session->set_flashdata('tambah-bpd', 'Pengurus BPD');
            redirect('Super_Admin/daftarPengurusBPD');
        }
    }

    public function getDataUbahBPD()
    {
        admin_logged_in();
        $id_bpd = $this->input->post('id_bpd');
        echo json_encode($this->db->get_where('bpd', ['id_bpd' => $id_bpd])->row_array());
    }

    public function ubahPengurusBPD()
    {
        admin_logged_in();
        $data['title'] = 'BPD';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('bpd')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_bpd', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true))
            ];
            $this->db->where('id_bpd', $this->input->post('id_aparat'));
            $this->db->update('bpd', $data);
            $this->session->set_flashdata('ubah-bpd', 'Pengurus BPD');
            redirect('Super_Admin/daftarPengurusBPD');
        }
    }

    public function hapusAnggotaBPD($id_bpd)
    {
        admin_logged_in();
        $this->db->delete('bpd', ['id_bpd' => $id_bpd]);
        redirect('Super_Admin/daftarPengurusBPD');
    }

    //TODO: Lembaga - Pemerintah 
    public function daftarAparatPemerintah()
    {
        admin_logged_in();
        $data['title'] = 'Pemerintah';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('pemerintah')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[pemerintah.jabatan]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_pemerintah', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->SA->tambahDataAparat();
            $this->session->set_flashdata('tambah-data', 'Perangkat Kantor Desa');
            redirect('Super_Admin/daftarAparatPemerintah');
        }
    }

    public function tambahKepalaDusun()
    {
        admin_logged_in();
        $data['title'] = 'Pemerintah';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('pemerintah')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[pemerintah.jabatan]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_pemerintah', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->SA->tambahDataKepalaDusun();
            $this->session->set_flashdata('tambah-data', 'Kepala Dusun');
            redirect('Super_Admin/daftarAparatPemerintah');
        }
    }

    public function getDataAparatPemerintah()
    {
        admin_logged_in();
        $id_pem = $this->input->post('id_pem');
        echo json_encode($this->db->get_where('pemerintah', ['id_pem' => $id_pem])->row_array());
    }

    public function ubahAparatPemerintah()
    {
        admin_logged_in();
        $data['title'] = 'Pemerintah';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('pemerintah')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[pemerintah.jabatan]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_pemerintah', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true))
            ];
            $this->db->where('id_pem', $this->input->post('id_pem'));
            $this->db->update('pemerintah', $data);
            $this->session->set_flashdata('ubah-data', 'Perangkat Desa');
            redirect('Super_Admin/daftarAparatPemerintah');
        }
    }

    public function ubahSekdes()
    {
        admin_logged_in();
        $data['title'] = 'Pemerintah';
        $data['user'] = $this->SA->getSession();
        $data['rows'] = $this->db->get('pemerintah')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Pengurus', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_pemerintah', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true))
            ];
            $this->db->where('id_pem', $this->input->post('id_pem'));
            $this->db->update('pemerintah', $data);
            $this->session->set_flashdata('ubah-data', 'Sekretaris Desa');
            redirect('Super_Admin/daftarAparatPemerintah');
        }
    }

    public function hapusAparatPemerintah($id_pem)
    {
        admin_logged_in();
        $this->db->delete('pemerintah', ['id_pem' => $id_pem]);
        redirect('Super_Admin/daftarAparatPemerintah');
    }

    //TODO: Managemen Surat 
    public function daftarSK()
    {
        admin_logged_in();
        $data['title'] = 'Managemen Surat';
        $data['user'] = $this->SA->getSession();
        $data['sk'] = $this->SA->getDataSK();

        $this->form_validation->set_rules('nama', 'Nama Surat', 'required|trim');
        $this->form_validation->set_rules('nomor', 'Nomor Surat', 'required|trim|is_unique[jenis_sk.nomor2]|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_surat', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $this->SA->tambahDataSK();
            $this->session->set_flashdata('tambah-data', 'Surat Keterangan');
            redirect('Super_Admin/daftarSK');
        }
    }

    public function ubahSK()
    {
        admin_logged_in();
        $data['title'] = 'Managemen Surat';
        $data['user'] = $this->SA->getSession();
        $data['sk'] = $this->SA->getDataSK();

        $this->form_validation->set_rules('nomor', 'Nomor Surat', 'required|trim|is_unique[jenis_sk.nomor2]|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('super_admin/daftar_surat', $data);
            $this->load->view('templates/admin/footer', $data);
        } else {
            $data = [
                'nomor2' => htmlspecialchars($this->input->post('nomor', true))
            ];
            $this->db->where('id_sk', $this->input->post('id_sk'));
            $this->db->update('jenis_sk', $data);
            $this->session->set_flashdata('ubah-sk', 'Surat Keterangan');
            redirect('Super_Admin/daftarSK');
        }
    }

    public function getDataUbahSK()
    {
        admin_logged_in();
        $id_sk = $this->input->post('id_sk');
        echo json_encode($this->db->get_where('jenis_sk', ['id_sk' => $id_sk])->row_array());
    }

    public function hapusSK($id_sk)
    {
        admin_logged_in();
        $this->db->delete('jenis_sk', ['id_sk' => $id_sk]);
        redirect('Super_Admin/daftarSK');
    }

    public function aktifSK()
    {
        admin_logged_in();
        $data = [
            'aktif' => 1
        ];
        $this->db->where('id_sk', $this->input->post('id'));
        $this->db->update('jenis_sk', $data);
    }

    public function nonAktifSK()
    {
        admin_logged_in();
        $data = [
            'aktif' => 0
        ];
        $this->db->where('id_sk', $this->input->post('id'));
        $this->db->update('jenis_sk', $data);
    }

    public function verifikasiSK()
    {
        admin_logged_in();
        $data['title'] = 'Verifikasi SK';
        $data['user'] = $this->SA->getSession();
        $data['sk'] = $this->SA->getDataSK();
        $data['nosurat'] = $this->SA->getDataNomorSurat();

        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('super_admin/verifikasi/index', $data);
        $this->load->view('templates/admin/footer', $data);
    }
}
