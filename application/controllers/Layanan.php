<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_controller
{
    public function index()
    {
        $data['judul'] = 'Layanan';
        $data['layanan'] = $this->db->get('jenis_sk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('layanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahTamu()
    {
        $data['judul'] = 'Buku Tamu';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|numeric|max_length[13]|min_length[11]');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required|trim');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
        $this->form_validation->set_rules('saran', 'Saran', 'required|max_length[150]|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('layanan/form_tamu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'no_hp' => $this->input->post('no_hp'),
                'tanggal' => time(),
                'instansi' => $this->input->post('instansi'),
                'tujuan' => $this->input->post('tujuan'),
                'saran' => htmlspecialchars($this->input->post('saran', true))
            ];

            $this->db->insert('tamu', $data);
            $this->session->set_flashdata('tambah-tamu', 'Anda');
            redirect('Layanan/tambahTamu');
        }
    }
}
