<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Pemberdayaan Kesejahteraan Keluarga <a href="#" class="badge badge-primary tombolTambahDataPKK" data-toggle="modal" data-target="#formModalLembaga">+</a></h6>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-pkk'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-pkk'); ?>"></div>
            <div class="error-ubah" data-flashdata="<?= $this->session->flashdata('error-ubah-pkk'); ?>"></div>
        </div>
        <div class="card-body">
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
                            <th>Jabatan</th>
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
                                    <?php if ($row['jabatan'] != 'Ketua PKK' && $row['jabatan'] != 'Sekretaris PKK' && $row['jabatan'] != 'Bendahara PKK') : ?>
                                        <a href="<?= base_url('Super_Admin'); ?>/hapusAnggotaPKK/<?= $row['id_pkk']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                    <?php endif; ?>
                                    <a href="#" class="badge badge-success tampilModalUbahPKK" data-toggle="modal" data-target="#formModalLembaga" data-id="<?= $row['id_pkk']; ?>">Ubah</a>
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