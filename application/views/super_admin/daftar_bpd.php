<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Badan Permusyawaratan Desa <a href="#" class="badge badge-primary tombolTambahDataBPD" data-toggle="modal" data-target="#formModalLembaga">+</a></h6>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-bpd'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-bpd'); ?>"></div>
        </div>
        <div class="card-body">
            <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                                    <?php if ($row['jabatan'] != 'Ketua BPD' && $row['jabatan'] != 'Sekretaris BPD' && $row['jabatan'] != 'Bendahara BPD') : ?>
                                        <a href="<?= base_url('Super_Admin'); ?>/hapusAnggotaBPD/<?= $row['id_bpd']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                    <?php endif; ?>
                                    <a href="#" class="badge badge-success tampilModalUbahBPD" data-toggle="modal" data-target="#formModalLembaga" data-id="<?= $row['id_bpd']; ?>">Ubah</a>
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