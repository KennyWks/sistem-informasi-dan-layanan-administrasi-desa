<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-info">Riwayat Surat Keterangan</h6>
    </div>
    <div class="card-body">
      <div class="alert alert-primary text-center" role="alert">
        Silahkan pilih surat keterangan di bawah ini untuk melihat informasi.
      </div>
      <div class="row mb-3">
        <div class="col-lg">
          <select class="form-control pilih">
            <option value="" selected>Pilih Surat Keterangan</option>
            <?php foreach ($sk as $surat) : ?>
              <option value="<?= $surat['id_sk']; ?>"><?= $surat['nama']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="tabel-data"></div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->