<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_controller
{
    public function index()
    {
        $ip = $this->input->ip_address();
        $tgl = strtotime(date('Y-m-d'));

        $cekDataK = $this->db->get_where('kunjungan', ['ip' => $ip, 'tgl' => $tgl])->num_rows();
        if ($cekDataK == 0) {
            $data = [
                'ip' => $ip,
                'tgl' => $tgl,
                'online' => time()
            ];
            $this->db->insert('kunjungan', $data);
        }

        $data['judul'] = 'Beranda';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}