<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembangunan extends CI_controller
{
    public function index()
    {
        $data['judul'] = 'Pembangunan';

        $this->load->view('templates/header', $data);
        $this->load->view('pembangunan/index');
        $this->load->view('templates/footer');
    }
}
