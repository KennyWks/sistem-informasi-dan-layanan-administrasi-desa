<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembaga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lembaga_model', 'lembaga');
    }

    public function pemerintah()
    {
        $data['judul'] = 'Pemerintah';

        $data['rows_kades'] = $this->lembaga->getDataKades();
        $data['row_perangkat'] = $this->lembaga->getAllDataPerangkat();
        $data['row_dusun'] = $this->lembaga->getAllDataDusun();

        $this->load->view('templates/header', $data);
        $this->load->view('lembaga/pemerintah', $data);
        $this->load->view('templates/footer');
    }

    public function bpd()
    {
        $data['judul'] = 'BPD';

        $data['rows'] = $this->lembaga->getAllDataBPD();

        $this->load->view('templates/header', $data);
        $this->load->view('lembaga/bpd', $data);
        $this->load->view('templates/footer');
    }

    public function lpm()
    {
        $data['judul'] = 'LPM';

        $data['rows'] = $this->lembaga->getAllDataLPM();

        $this->load->view('templates/header', $data);
        $this->load->view('lembaga/lpm', $data);
        $this->load->view('templates/footer');
    }

    public function pkk()
    {
        $data['judul'] = 'PKK';

        $data['rows'] = $this->lembaga->getAllDataPKK();

        $this->load->view('templates/header', $data);
        $this->load->view('lembaga/pkk', $data);
        $this->load->view('templates/footer');
    }

    public function kt()
    {
        $data['judul'] = 'Karang Taruna';

        $data['rows'] = $this->lembaga->getAllDataKT();

        $this->load->view('templates/header', $data);
        $this->load->view('lembaga/kt', $data);
        $this->load->view('templates/footer');
    }
}
