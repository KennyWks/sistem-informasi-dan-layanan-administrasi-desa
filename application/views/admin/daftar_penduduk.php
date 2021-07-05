<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Penduduk <a href="<?= base_url('admin/tambahPenduduk'); ?>" class="badge badge-primary">+</a></h6>
        </div>
        <div class="card-body">
            <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah_penduduk'); ?>"></div>
            <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah_penduduk'); ?>"></div>
            <div class="row my-2">
                <div class="col-md-9">
                    <form action="<?= base_url('admin/daftarPenduduk'); ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Nomor KK, NIK, Nama..." name="keyword" autocomplete="off">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('admin/daftarKK'); ?>" class="btn btn-primary">Data Nomor KK</a>
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
                            <th>Aksi</th>
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
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (empty($rows)) : ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Maaf, data penduduk yang anda cari tidak ditemukan!
                            </div>
                        <?php endif; ?>
                        <?php foreach ($rows as $p) : ?>
                            <tr>
                                <td><?= ++$start; ?></td>
                                <td><?= $p['no_kk']; ?></td>
                                <td><?= $p['nik']; ?></td>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['rt']; ?></td>
                                <td><?= $p['rw']; ?></td>
                                <td><?= $p['dusun']; ?></td>
                                <td><?= $p['jk']; ?></td>
                                <td><?= $p['hubungan']; ?></td>
                                <td><?= $p['tempat_lahir']; ?></td>
                                <td><?= $p['tgl_lahir']; ?></td>
                                <td><?= $p['umur']; ?></td>
                                <td><?= $p['status']; ?></td>
                                <td><?= $p['suku']; ?></td>
                                <td><?= $p['agama']; ?></td>
                                <td><?= $p['deskripsi']; ?></td>
                                <td><?= $p['pekerjaan']; ?></td>
                                <td><?= $p['ket']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/ubahPenduduk/') . $p['id_peddk']; ?>" class="badge badge-success">Ubah</a>
                                    <a href="<?= base_url('admin/hapusPenduduk/') . $p['id_peddk']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
                                </td>
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