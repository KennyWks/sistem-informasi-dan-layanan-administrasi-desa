<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Otentifikasi_Penduduk extends CI_controller
{
    public function index()
    {
        if ($this->session->userdata('id_peddk')) {
            redirect('penduduk');
        }

        $data['judul'] = 'Login Penduduk';

        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'required|trim|min_length[16]|max_length[16]',
            [
                'min_length' => 'Minimal 16 karakter pada kolom NIK!',
                'max_length' => 'Maksimal 16 karakter pada kolom NIK!'
            ]
        );
        $this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/login/header', $data);
            $this->load->view('otentifikasi/login_penduduk');
            $this->load->view('templates/login/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nik = $this->input->post('nik');
        $no_kk = $this->input->post('no_kk');
        $penduduk = $this->db->get_where('penduduk', ['nik' => $nik])->row_array();

        if ($penduduk) {
            if ($no_kk == $penduduk['no_kk']) {
                $data = [
                    'id_peddk' => $penduduk['id_peddk']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('checkData', 'Selamat');
                redirect('penduduk');
            } else {
                $this->session->set_flashdata('flash_salahNoKK', 'Salah');
                redirect('Otentifikasi_Penduduk/index');
            }
        } else {
            $this->session->set_flashdata('flash_BelumTerdaftar', 'Terdaftar!');
            redirect('Otentifikasi_Penduduk/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_peddk');
        $this->session->set_flashdata('flash_logout', 'Keluar');
        redirect('Otentifikasi_Penduduk');
    }

    //TODO: function untuk halaman blokir
    public function blocked_penduduk()
    {
        $data['title'] = 'Akses Diblokir';
        $this->load->view('templates/admin/header', $data);
        $this->load->view('otentifikasi/blocked_penduduk');
    }
}
