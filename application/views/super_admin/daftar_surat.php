<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Daftar Surat Keterangan <a href="#" class="badge badge-primary tombolTambahDataSK" data-toggle="modal" data-target="#formModalSK">+</a></h6>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-sk'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-sk'); ?>"></div>
        </div>
        <div class="card-body">
            <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nomor', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Surat</th>
                            <th>Nomor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Surat</th>
                            <th>Nomor</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($sk as $s) : ?>
                            <tr>

                                <td><?= $i++; ?></td>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['nomor2']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-success tampilModalUbahSK" data-toggle="modal" data-target="#formModalSK" data-id="<?= $s['id_sk']; ?>">Ubah</a>
                                    <?php if ($s['aktif'] == 1) : ?>
                                        <a href="" class="badge badge-warning non-aktif" data-id="<?= $s['id_sk']; ?>">Nonaktif</a>
                                    <?php else : ?>
                                        <a href="" class="badge badge-info aktif" data-id="<?= $s['id_sk']; ?>">Aktikan</a>
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

<!-- Modal SK -->
<div class="modal fade" id="formModalSK" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judulModal">Tambah Surat Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Super_Admin/daftarSK'); ?>" method="post">
                    <input type="hidden" name="id_sk" id="id_sk">
                    <div class="form-group">
                        <input type="text" class="form-control nama" name="nama" autocomplete="off" placeholder="Nama Atau Jenis Surat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control nomor" name="nomor" autocomplete="off" placeholder="Nomor Surat Keterangan">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambah</button></div>
                </form>
            </div>
        </div>
    </div>
</div>