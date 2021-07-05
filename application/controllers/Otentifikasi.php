<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Otentifikasi extends CI_controller
{
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $data['judul'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[8]',
            ['min_length' => 'Kolom massword minimal 8 karakter']
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/login/header', $data);
            $this->load->view('otentifikasi/login');
            $this->load->view('templates/login/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['aktif'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Super_Admin');
                    } else {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mb-1" role="alert">Maaf, password anda salah.</div>');
                    redirect('otentifikasi/index');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mb-1" role="alert">Maaf, akun ini belum diaktivasi.</div>');
                redirect('otentifikasi/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mb-1" role="alert">Maaf, akun ini tidak ditemukan.</div>');
            redirect('otentifikasi/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center mb-1" role="alert">Selamat! Anda berhasil logout</div>');
        redirect('otentifikasi');
    }

    //TODO: function untuk halaman blokir
    public function blocked()
    {
        $data['title'] = 'Akses Diblokir';
        $this->load->view('templates/admin/header', $data);
        $this->load->view('otentifikasi/blocked');
    }
}
