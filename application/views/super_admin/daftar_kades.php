<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-info">Tabel Pimpinan Desa <a href="<?= base_url('Super_Admin/tambahKades'); ?>" class="badge badge-primary">+</a></h6>
      <div class="error-UploadFoto" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
      <div class="tambah-data" data-flashdata="<?= $this->session->flashdata('tambah-kades'); ?>"></div>
      <div class="ubah-data" data-flashdata="<?= $this->session->flashdata('ubah-kades'); ?>"></div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Posisi</th>
              <th>Periode</th>
              <th>Foto</th>
              <th>Pidato</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Posisi</th>
              <th>Periode</th>
              <th>Foto</th>
              <th>Pidato</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i = 1;
            foreach ($rows as $row) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td><?= $row['awal']; ?> - <?= $row['akhir']; ?></td>
                <td><img style="width: 50px; height:50px;" src="<?= base_url(); ?>/assets/img-kades/<?= $row['foto']; ?>" alt="oelatimo"></td>
                <td><?= word_limiter($row['pidato'], 6); ?></td>
                <td>
                  <a href="<?= base_url('Super_Admin/ubahKades/') . $row['id_kades']; ?>" class="badge badge-success">Ubah</a>
                  <a href="<?= base_url('Super_Admin/hapusKades/') . $row['id_kades']; ?>" class="badge badge-danger tombol-hapus">Hapus</a>
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