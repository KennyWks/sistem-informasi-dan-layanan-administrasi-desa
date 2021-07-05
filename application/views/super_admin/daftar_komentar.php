<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Daftar Komentar</h6>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-pem'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-pem'); ?>"></div>

        </div>
        <div class="card-body">
            <div class="table-responsive daftarKomentar">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Berita Yang Dikomentari</th>
                            <th>Isi Komentar</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Status Baca</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Berita Yang Dikomentari</th>
                            <th>Isi Komentar</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Status Baca</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <?php
                                $rowBerita = $this->db->get_where('berita', ['id_berita' => $row['id_berita']])->row_array(); ?>
                                <td><?= $rowBerita['judul']; ?></td>
                                <td><?= word_limiter($row['isi_komentar'], 5); ?></td>
                                <td><?= date('d F Y H:m:s', $row['tgl']); ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['hp']; ?></td>
                                <td>
                                    <?php if ($row['baca'] == 1) {
                                        echo "Sudah Dibaca";
                                    } else {
                                        echo "Belum dibaca";
                                    } ?>
                                <td>
                                    <a href="#" class="badge badge-info tampilmodalBacaKomentar" data-toggle="modal" data-target="#formModal" data-id="<?= $row['id_komentar']; ?>">Baca</a>
                                    <a href="<?= base_url('Super_Admin/hapusKomentar/'); ?><?= $row['id_komentar']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->