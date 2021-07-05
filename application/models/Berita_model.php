<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_model
{
    public function getAllBerita()
    {
        return $this->db->get('berita')->result_array();  // Produces: SELECT * FROM mytable
    }

    public function getAllRandBerita()
    {
        $this->db->order_by('id_berita', 'RANDOM'); //order by id and DESC
        $this->db->limit(5);  // Produces: LIMIT 5
        return $this->db->get('berita')->result_array();  // Produces: SELECT * FROM mytable
    }

    public function hitungSemuaKomentar($id_berita)
    {
        return $this->db->get_where('komentar', ['id_berita' => $id_berita])->num_rows();
    }

    function ambilDataASC($id_berita, $limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("komentar");
        $this->db->where(['id_berita' => $id_berita]);
        $this->db->order_by("id_komentar", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '';
        foreach ($query->result() as $row) {
            $output .= '<div class="komentar">
            <div class="card mb-1">
            <div class="card-body">
                <div><small class="text-primary" id="nama">' . $row->nama . '</small> | <small class="text-muted" id="tgl">' .  tanggal_indonesia_lengkap(date('Y-m-d', $row->tgl)) . '</small></div>
                <div><small id="isi_komentar">' . $row->isi_komentar . '
                </small></div>
                </div>
            </div>';
        }
        $output .= '</div>';
        return $output;
    }

    function ambilDataDESC($id_berita, $limit, $start)
    {
        $output = '';
        $this->db->select("*");
        $this->db->from("komentar");
        $this->db->where(['id_berita' => $id_berita]);
        $this->db->order_by("id_komentar", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $output .= '';
        foreach ($query->result() as $row) {
            $output .= '<div class="komentar">
            <div class="card mb-1"> 
            <div class="card-body">
                <div><small class="text-primary" id="nama">' . $row->nama . '</small> | <small class="text-muted" id="tgl">' . tanggal_indonesia_lengkap(date('Y-m-d', $row->tgl)) . '</small></div>
                <div><small id="isi_komentar">' . $row->isi_komentar . '
                </small></div>
                </div>
            </div>';
        }
        $output .= '</div>';
        return $output;
    }


    public function getBeritaById($id_berita)
    {
        if ($id_berita != null) {
            $query = "SELECT jml_baca FROM berita WHERE id_berita = $id_berita";
            $row = $this->db->query($query)->row_array();
            $h = $row['jml_baca'];
            $count =  $h + 1;
            $data = array(
                'jml_baca' => $count
            );
            $this->db->where('id_berita', $id_berita);
            $this->db->update('berita', $data);
        }
        return $this->db->get_where('berita', ['id_berita' => $id_berita])->row_array(); // Produces: SELECT * FROM mytable where
    }

    public function getBeritaTerpopuler()
    {
        $this->db->limit(5);  // Produces: LIMIT 5
        $this->db->order_by('jml_baca', 'DESC'); //order by id and DESC
        return $this->db->get('berita')->result_array();  // Produces: SELECT * FROM mytable
    }

    public function getBerita($limit, $start, $keyword)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('deskripsi', $keyword);
        }
        $this->db->order_by('id_berita', 'DESC');
        return $this->db->get('berita', $limit, $start)->result_array();
    }

    public function kirimKomentar()
    {
        $data = [
            "id_berita" =>  htmlspecialchars($this->input->post('id_berita', true)),
            "isi_komentar" =>  htmlspecialchars($this->input->post('isi_komentar', true)),
            "tgl" =>  time(),
            "nama" =>  htmlspecialchars($this->input->post('nama', true)),
            "email" =>  htmlspecialchars($this->input->post('email', true)),
            "hp" =>  htmlspecialchars($this->input->post('hp', true)),
            "baca" =>  0

        ];
        $this->db->insert('komentar', $data);
    }
}
