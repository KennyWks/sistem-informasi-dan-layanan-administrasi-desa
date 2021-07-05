<?php

function admin_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('otentifikasi');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];

        $userAkses = $ci->db->get_where('user_akses_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);
        if ($userAkses->num_rows() < 1) {
            redirect('otentifikasi/blocked');
        }
    }
}

function penduduk_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id_peddk')) {
        redirect('Otentifikasi_Penduduk/');
    }
}

function cek_akses($role_id, $menu_id)
{
    $ci = get_instance();
    $result = $ci->db->get_where('user_akses_menu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($result->num_rows() > 0) {
        return "checked='cheked'";
    }
}
