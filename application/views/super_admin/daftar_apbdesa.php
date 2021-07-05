<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Tabel APBDesa <a href="<?= base_url('Super_Admin/tambahAPBDesa'); ?>" class="badge badge-primary">+</a></h6>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-APBDesa'); ?>"></div>
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-APBDesa'); ?>"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pendapatan</th>
                            <th>Pendapatan Asli</th>
                            <th>Transfer</th>
                            <th>Pendapatan Lain</th>
                            <th>Belanja</th>
                            <th>Pelaksanaan Pembangunan Desa</th>
                            <th>Penyelenggaraan Pemerintahan Desa</th>
                            <th>Pemberdayaan Masyarakat Desa</th>
                            <th>Pembinaan Kemasyarakatan Desa</th>
                            <th>Belanja Tak Terduga</th>
                            <th>Pembiayaan</th>
                            <th>Kas</th>
                            <th>Tahun</th>
                            <th>Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Pendapatan</th>
                            <th>Pendapatan Asli</th>
                            <th>Transfer</th>
                            <th>Pendapatan Lain</th>
                            <th>Belanja</th>
                            <th>Pelaksanaan Pembangunan Desa</th>
                            <th>Penyelenggaraan Pemerintahan Desa</th>
                            <th>Pemberdayaan Masyarakat Desa</th>
                            <th>Pembinaan Kemasyarakatan Desa</th>
                            <th>Belanja Tak Terduga</th>
                            <th>Pembiayaan</th>
                            <th>Kas</th>
                            <th>Tahun</th>
                            <th>Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= number_format($row['pendapatan']); ?></td>
                                <td><?= number_format($row['pasli']); ?></td>
                                <td><?= number_format($row['transfer']); ?></td>
                                <td><?= number_format($row['plain']); ?></td>
                                <td><?= number_format($row['belanja']); ?></td>
                                <td><?= number_format($row['ppdb']); ?></td>
                                <td><?= number_format($row['ppdp']); ?></td>
                                <td><?= number_format($row['pmd']); ?></td>
                                <td><?= number_format($row['pkd']); ?></td>
                                <td><?= number_format($row['btt']); ?></td>
                                <td><?= number_format($row['pembiayaan']); ?></td>
                                <td><?= number_format($row['kas']); ?></td>
                                <td><?= $row['tahun']; ?></td>
                                <td>
                                    <?php if ($row['anggaran'] == 'A') {
                                        echo 'Awal';
                                    } else {
                                        echo 'Perubahan';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('Super_Admin/ubahAPBDesa/') . $row['id_apbdesa']; ?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url('Super_Admin/hapusAPBDesa/') . $row['id_apbdesa']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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