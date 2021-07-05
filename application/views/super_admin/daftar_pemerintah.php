<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <button class="btn btn-primary btn-sm mx-2 my-2 tambahAparatPemerintah" data-toggle="modal" data-target="#formModalPemerintah">Tambah Aparat</button>
                <button class="btn btn-primary btn-sm tambahKepalaDusun" data-toggle="modal" data-target="#formModalPemerintah">Tambah Kepala Dusun</button>
            </div>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-data'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-data'); ?>"></div>
        </div>
        <div class="card-body">
            <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['jabatan']; ?></td>
                                <td>
                                    <?php if ($row['jabatan'] != 'Sekretaris Desa') : ?>
                                        <a href="<?= base_url('Super_Admin'); ?>/hapusAparatPemerintah/<?= $row['id_pem']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                    <?php endif; ?>
                                    <?php if ($row['jabatan'] == 'Sekretaris Desa') : ?>
                                        <a href="#" class="badge badge-success tampilModalUbahSekdes" data-toggle="modal" data-target="#formModalPemerintah" data-id="<?= $row['id_pem']; ?>">Ubah</a>
                                    <?php else : ?>
                                        <a href="#" class="badge badge-success tampilModalUbahAparat" data-toggle="modal" data-target="#formModalPemerintah" data-id="<?= $row['id_pem']; ?>">Ubah</a>
                                    <?php endif; ?>

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

<!-- Modal Pemerintah -->
<div class="modal fade" id="formModalPemerintah" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judulModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id_pem" id="id_pem">
                    <div class="form-group">
                        <input type="text" class="form-control nama" name="nama" autocomplete="off" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control jabatan" name="jabatan" autocomplete="off" placeholder="Posisi">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Ubah</button></div>
                </form>
            </div>
        </div>
    </div>
</div>