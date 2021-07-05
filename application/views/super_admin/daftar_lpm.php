<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Lembaga Pemberdayaan Masyarakat <a href="#" class="badge badge-primary tombolTambahDataLPM" data-toggle="modal" data-target="#formModalLembaga">+</a></h6>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-lpm'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-lpm'); ?>"></div>
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
                                    <?php if ($row['jabatan'] != 'Ketua LPM' && $row['jabatan'] != 'Sekretaris LPM' && $row['jabatan'] != 'Bendahara LPM') : ?>
                                        <a href="<?= base_url('Super_Admin'); ?>/hapusAnggotaLPM/<?= $row['id_lpm']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                    <?php endif; ?>
                                    <a href="#" class="badge badge-success tampilModalUbahLPM " data-toggle="modal" data-target="#formModalLembaga" data-id="<?= $row['id_lpm']; ?>">Ubah</a>
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