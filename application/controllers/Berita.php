<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model', 'berita');
    }

    public function index()
    {
        $data['judul'] = 'Kabar Desa';

        if ($this->input->post('keyword', true)) {
            $data['keyword'] = $this->input->post('keyword', true);
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->session->mark_as_temp('keyword', 5);

        //config
        $this->db->like('judul', $data['keyword']);
        $this->db->or_like('deskripsi', $data['keyword']);
        $this->db->from('berita');

        //menghitung dan mengirim pada view agar menampilakan jumlah pencarian (angka)
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        //Jumlah data per halaman
        $config['per_page'] = 5;

        //Config
        $config['base_url'] = base_url() . 'berita/index';

        //berapa jumlah nomor di sebelah pagination yang aktif
        $config['num_links'] = 5;

        //inisialize
        $this->pagination->initialize($config);

        //segment url
        $data['start'] = $this->uri->segment(3);
        $data['rows'] = $this->berita->getBerita($config['per_page'], $data['start'], $data['keyword']);

        $data['randBerita'] = $this->berita->getAllRandBerita();
        $data['beritaTerpopuler'] = $this->berita->getBeritaTerpopuler();

        $this->load->view('templates/header', $data);
        $this->load->view('berita/index', $data);
        $this->load->view('templates/footer');
    }

    //TODO: Melihat berita by id_berita
    public function detailBerita($id_berita)
    {
        $data['judul'] = 'Baca Berita';

        $data['hitungK'] = $this->berita->hitungSemuaKomentar($id_berita);
        $data['row'] = $this->berita->getBeritaById($id_berita);
        $data['randBerita'] = $this->berita->getAllRandBerita();
        $data['beritaTerpopuler'] = $this->berita->getBeritaTerpopuler();

        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|trim');
        $this->form_validation->set_rules('hp', 'Nomor HP', 'required|max_length[13]|min_length[11]|trim');
        $this->form_validation->set_rules('isi_komentar', 'Komentar', 'required|max_length[150]|trim');
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

            // Pass captcha image to view
            $data['captchaImg'] = $captcha['image'];

            $this->load->view('templates/header', $data);
            $this->load->view('berita/detail_berita', $data);
            $this->load->view('templates/footer');
        } else {

            // Unset previous captcha and set new captcha word
            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);

            $this->berita->kirimKomentar();
            $this->session->set_flashdata('flash_kirim_komentar', 'Dikirim');
            redirect("berita/detailBerita/$id_berita");
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

    public function lihatKomentar($id_berita)
    {
        $data['judul'] = 'Lihat Komentar';

        $data['hitungK'] = $this->berita->hitungSemuaKomentar($id_berita);
        $data['row'] = $this->berita->getBeritaById($id_berita);
        $data['randBerita'] = $this->berita->getAllRandBerita();
        $data['beritaTerpopuler'] = $this->berita->getBeritaTerpopuler();

        $this->load->view('templates/header', $data);
        $this->load->view('berita/lihat_komentar', $data);
        $this->load->view('templates/footer');
    }

    public function paginationASC($id_berita)
    {
        $setting = array();
        $setting["base_url"] = "#";
        $setting["total_rows"] = $this->berita->hitungSemuaKomentar($id_berita);
        $setting["per_page"] = 5;
        $setting["uri_segment"] = 4;
        $setting["use_page_numbers"] = TRUE;
        $setting["num_links"] = 5;

        $this->pagination->initialize($setting);
        $page = $this->uri->segment($setting["uri_segment"]);
        $start = ($page - 1) * $setting["per_page"];

        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'card_komentar'   => $this->berita->ambilDataASC($id_berita, $setting["per_page"], $start)
        );
        echo json_encode($output);
    }

    public function paginationDESC($id_berita)
    {
        $setting = array();
        $setting["base_url"] = "#";
        $setting["total_rows"] = $this->berita->hitungSemuaKomentar($id_berita);
        $setting["per_page"] = 5;
        $setting["uri_segment"] = 4;
        $setting["use_page_numbers"] = TRUE;
        $setting["num_links"] = 5;

        $this->pagination->initialize($setting);
        $page = $this->uri->segment($setting["uri_segment"]);
        $start = ($page - 1) * $setting["per_page"];

        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'card_komentar'   => $this->berita->ambilDataDESC($id_berita, $setting["per_page"], $start)
        );
        echo json_encode($output);
    }
}
