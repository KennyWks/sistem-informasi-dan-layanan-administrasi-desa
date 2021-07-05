<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Daftar Nomor KK Berdasarkan RT</a></h6>
        </div>
        <div class="card-body">
            <div class="row my-2">
                <div class="col-md-9">
                    <form action="<?= base_url('admin/daftarKK'); ?>" method="post">
                        <div class="input-group mb-3">
                            <select class="form-control pilih" name="rt">
                                <option value="" selected>Pilih Alamat RT</option>
                                <?php foreach ($rowRT as $rt) : ?>
                                    <option value="<?= $rt['rt']; ?>">RT <?= $rt['rt']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No KK</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Dusun</th>
                            <th>Gender</th>
                            <th>Hubungan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Status</th>
                            <th>Suku</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Ket</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>No KK</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Dusun</th>
                            <th>Gender</th>
                            <th>Hubungan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Status</th>
                            <th>Suku</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Ket</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (empty($kk)) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Maaf, data penduduk yang anda cari tidak ditemukan!
                            </div>
                        <?php endif; ?>
                        <?php foreach ($kk as $rkk) : ?>
                            <tr>
                                <td><?= ++$start; ?></td>
                                <td><?= $rkk['no_kk']; ?></td>
                                <td><?= $rkk['nik']; ?></td>
                                <td><?= $rkk['nama']; ?></td>
                                <td><?= $rkk['rt']; ?></td>
                                <td><?= $rkk['rw']; ?></td>
                                <td><?= $rkk['dusun']; ?></td>
                                <td><?= $rkk['jk']; ?></td>
                                <td><?= $rkk['hubungan']; ?></td>
                                <td><?= $rkk['tempat_lahir']; ?></td>
                                <td><?= $rkk['tgl_lahir']; ?></td>
                                <td><?= $rkk['umur']; ?></td>
                                <td><?= $rkk['status']; ?></td>
                                <td><?= $rkk['suku']; ?></td>
                                <td><?= $rkk['agama']; ?></td>
                                <td><?= $rkk['deskripsi']; ?></td>
                                <td><?= $rkk['pekerjaan']; ?></td>
                                <td><?= $rkk['ket']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->