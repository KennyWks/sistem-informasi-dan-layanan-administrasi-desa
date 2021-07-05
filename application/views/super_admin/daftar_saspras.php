<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Sarana & Prasarana <a href="#" class="badge badge-primary tombolTambahDataSaspras" data-toggle="modal" data-target="#formModalSaspras">+</a></h6>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-saspras'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-saspras'); ?>"></div>
        </div>
        <div class="card-body">
            <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kondisi</th>
                            <th>Pemilik</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kondisi</th>
                            <th>Pemilik</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($saspras as $s) : ?>
                            <tr>

                                <td><?= $i++; ?></td>
                                <td><?= $s['nama']; ?></td>
                                <td><?php if ($s['kondisi'] == "RB") {
                                        echo "Rusak Berat";
                                    } else if ($s['kondisi'] == "RS") {
                                        echo "Rusak Sedang";
                                    } else {
                                        echo "Baik";
                                    } ?></td>
                                <td><?= $s['pemilik']; ?></td>
                                <td><?= $s['jenis']; ?></td>
                                <td>
                                    <a href="#" class="badge badge-success tampilModalUbahSaspras" data-toggle="modal" data-target="#formModalSaspras" data-id="<?= $s['id_saspras']; ?>">Ubah</a>
                                    <a href="<?= base_url('Super_Admin/hapusSaspras/'); ?><?= $s['id_saspras']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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
<div class="modal fade" id="formModalSaspras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Judul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" id="id_saspras" name="id_saspras">
                    <div class="form-group">
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama Saspras" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control kondisi" name="kondisi">
                            <option value="B">Baik</option>
                            <option value="RS">Rusak Sedang</option>
                            <option value="RB">Rusak Berat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pemilik">Pemilik</label>
                        <select class="form-control pemilik" name="pemilik">
                            <option value="Desa">Desa</option>
                            <option value="Perseorangan">Perseorangan</option>
                            <option value="Swasta">Swasta</option>
                            <option value="Lembaga">Lembaga</option>
                            <option value="Kabupaten">Kabupaten</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Pusat">Pusat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control jenis" name="jenis">
                            <option value="Air Bersih">Air Bersih</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Rohani">Rohani</option>
                            <option value="Transportasi">Transportasi</option>
                            <option value="Umum">Umum</option>
                            <option value="Olaraga">Olaraga</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">tombol</button>
                </form>
            </div>
        </div>
    </div>
</div>