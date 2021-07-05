<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Daftar Tamu <a href="<?= base_url('Layanan/tambahTamu'); ?>" class="badge badge-primary" target="_blank">+</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Nomor HP</th>
                            <th>Instansi</th>
                            <th>Tujuan</th>
                            <th>Saran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Nomor HP</th>
                            <th>Instansi</th>
                            <th>Tujuan</th>
                            <th>Saran</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($tamu as $t) : ?>
                            <tr>

                                <td><?= $i++; ?></td>
                                <td><?= $t['nama']; ?></td>
                                <td><?= tanggal_indonesia(date('Y-m-d', $t['tanggal'])); ?></td>
                                <td><?= $t['no_hp']; ?></td>
                                <td><?= $t['instansi']; ?></td>
                                <td><?= $t['tujuan']; ?></td>
                                <td><?= $t['saran']; ?></td>
                                <td>
                                    <a href="<?= base_url('Super_Admin/hapusTamu/' . $t['id_tamu']); ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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