<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Wilayah <a href="#" class="badge badge-primary tombolTambahDataWilayah" data-toggle="modal" data-target="#formModalWilayah">+</a></h6>

            <div class="error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-wilayah'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-wilayah'); ?>"></div>

        </div>
        <div class="card-body">
            <?= form_error('dusun', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('rt', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('rw', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Dusun</th>
                            <th>RW</th>
                            <th>RT</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Dusun</th>
                            <th>RW</th>
                            <th>RT</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($wilayah as $w) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $w['dusun']; ?></td>
                                <td><?= $w['rw']; ?></td>
                                <td><?= $w['rt']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-success tampilModalUbahWilayah" data-toggle="modal" data-target="#formModalWilayah" data-id="<?= $w['id_wilayah']; ?>">Ubah</a>
                                    <a href="<?= base_url('Super_Admin/hapusWilayah/'); ?><?= $w['id_wilayah']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="formModalWilayah" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Super_Admin/daftarWilayah'); ?>" method="post">
                    <input type="hidden" name="id_wilayah" id="id_wilayah">
                    <div class="form-group">
                        <input type="text" class="form-control nomor_dusun" name="dusun" placeholder="Dusun">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control nomor_rw" name="rw" placeholder="RW">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control nomor_rt" name="rt" placeholder="RT">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button></div>
                </form>
            </div>
        </div>
    </div>
</div>