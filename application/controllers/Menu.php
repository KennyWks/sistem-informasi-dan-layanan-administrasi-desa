<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        admin_logged_in();
        $this->load->model('Super_Admin_model', 'SA');
    }

    //TODO: Menu
    public function index()
    {
        $data['title'] = 'Atur Menu';
        $data['user'] = $this->SA->getSession();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('tambah_menu', 'Menu');
            redirect('menu');
        }
    }

    public function getDataUbahMenu()
    {
        $menu_id = $this->input->post('id');
        echo json_encode($this->db->get_where('user_menu', ['id' => $menu_id])->row_array());
    }

    public function ubahMenu()
    {
        $data = [
            "menu" => htmlspecialchars($this->input->post('menu', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
        $this->session->set_flashdata('ubah_menu', 'Menu');
        redirect('menu');
    }

    public function hapusMenu($id)
    {
        $this->db->delete('user_menu', array('id' => $id));
        redirect('menu');
    }

    //TODO: Sub-Menu
    public function subMenu()
    {
        $data['title'] = 'Atur Submenu';
        $data['user'] = $this->SA->getSession();

        $data['subMenu'] = $this->SA->getSubMenu();
        $data['Menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('menu/sub_menu', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $this->SA->tambahSubMenu();
            $this->session->set_flashdata('tambah_submenu', 'Submenu');
            redirect('menu/subMenu');
        }
    }

    public function getDataUbahSubMenu()
    {
        $menu_id = $this->input->post('id');
        echo json_encode($this->db->get_where('user_sub_menu', ['id' => $menu_id])->row_array());
    }

    public function ubahSubMenu()
    {
        $data = [
            "judul" => htmlspecialchars($this->input->post('judul', true)),
            "menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
            "url" => htmlspecialchars($this->input->post('url', true)),
            "icon" => htmlspecialchars($this->input->post('icon', true)),
            "aktif" => htmlspecialchars($this->input->post('aktif', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
        $this->session->set_flashdata('ubah_submenu', 'Submenu');
        redirect('menu/subMenu');
    }

    public function hapusSubMenu($id)
    {
        $this->db->delete('user_sub_menu', array('id' => $id));
        redirect('menu/subMenu');
    }
}
