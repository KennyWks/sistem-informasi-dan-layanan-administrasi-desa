<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Berita <a href="<?= base_url('Super_Admin/tambahBerita'); ?>" class="badge badge-primary">+</a></h6>

            <div class="error-UploadFoto" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-berita'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-berita'); ?>"></div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th>Pembaca</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th>Pembaca</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($berita as $b) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= word_limiter($b['judul'], 5); ?></td>
                                <td><img style="width: 70px; height:50px;" src="<?= base_url(); ?>/assets/img-berita/<?= $b['foto']; ?>" alt="oelatimo"></td>
                                <td><?= word_limiter($b['deskripsi'], 5); ?></td>
                                <td><?= date('d F Y H:m:s', $b['tanggal']); ?></td>
                                <td><?= $b['penulis']; ?></td>
                                <td><?= $b['jml_baca']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-info modalBacaBeritaBySA" data-toggle="modal" data-target="#formModal" data-id="<?= $b['id_berita']; ?>">Baca</a>
                                    <a href="<?= base_url('Super_Admin/ubahBerita/'); ?><?= $b['id_berita']; ?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url('Super_Admin/hapusBerita/'); ?><?= $b['id_berita']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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