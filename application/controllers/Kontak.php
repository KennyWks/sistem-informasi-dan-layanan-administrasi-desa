<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_controller
{
    public function index()
    {
        $data['judul'] = 'Kontak';

        $this->form_validation->set_rules('NDepan', 'Nama Depan', 'required|trim');
        $this->form_validation->set_rules('NBelakang', 'Nama Belakang', 'required|trim');
        $this->form_validation->set_rules('Email', 'Email', 'valid_email|trim');
        $this->form_validation->set_rules('NKontak', 'Nomor Kontak', 'required|numeric|trim|max_length[13]');
        $this->form_validation->set_rules('Pesan', 'Pesan', 'required|max_length[150]|trim');
        $this->form_validation->set_rules('captcha', '', 'callback_verify');

        if ($this->form_validation->run() == FALSE) {

            // Captcha configuration
            $vals = array(
                'word'          => '',
                'img_path'      => './assets/captcha/',
                'img_url'       => base_url('assets/captcha/'),
                'font_path'     => FCPATH . 'assets/fonts/roboto-black.ttf',
                'img_width'     => 250,
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
            $this->load->view('kontak/index', $data);
            $this->load->view('templates/footer');
        } else {

            // Unset previous captcha and set new captcha word
            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);

            $data = [
                "nama_depan" => htmlspecialchars($this->input->post('NDepan', true)),
                "nama_belakang" => htmlspecialchars($this->input->post('NBelakang', true)),
                "email" => htmlspecialchars($this->input->post('Email', true)),
                "nomor" => htmlspecialchars($this->input->post('NKontak', true)),
                "pesan" => htmlspecialchars($this->input->post('Pesan', true)),
                "tgl" => time(),
                "baca" => 0
            ];
            $this->db->insert('pesan', $data);
            $this->session->set_flashdata('flash_kirim', 'Dikirim');
            redirect('kontak');
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
            'img_width'     => 250,
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
}
