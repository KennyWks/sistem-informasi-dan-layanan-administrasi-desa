<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Pesan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Email</th>
                            <th>Nomor</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Belakang</th>
                            <th>Email</th>
                            <th>Nomor</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($pesan as $p) : ?>
                            <tr>

                                <td><?= $i++; ?></td>
                                <td><?= $p['nama_depan']; ?></td>
                                <td><?= $p['nama_belakang']; ?></td>
                                <td><?= $p['email']; ?></td>
                                <td><?= $p['nomor']; ?></td>
                                <td><?= word_limiter($p['pesan'], 5); ?></td>
                                <td><?= tanggal_indonesia(date('Y-m-d', $p['tgl'])); ?></td>
                                <td><?= date('h:m', $p['tgl']); ?> WITA</td>
                                <td><?php if ($p['baca'] == '0') : ?>
                                        Belum Dibaca
                                    <?php else : ?>
                                        Sudah Dibaca
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="#" class="badge badge-info tampilModalBacaPesan" data-toggle="modal" data-target="#formModal" data-id="<?= $p['id_pesan']; ?>">Baca</a>
                                    <a href="<?= base_url('Super_Admin/hapusPesan/'); ?><?= $p['id_pesan']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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