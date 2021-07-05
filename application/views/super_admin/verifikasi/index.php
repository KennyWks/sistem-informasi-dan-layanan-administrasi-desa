<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="verifikasi" data-flashdata="<?= $this->session->flashdata('verifikasi'); ?>"></div>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Tabel Data</h6>
        </div>
        <div class="card-body">
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

<div class="modal fade" id="formVerifikasi" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title judulModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="text-danger">Nomor Surat Terakhir Yang Dimasukan : <?= $nosurat['no_surat']; ?></div>
                    <input type="hidden" name="tgl_buat" id="tgl_buat">
                    <div class="form-group">
                        <input type="text" class="form-control tgl_buat" name="kode_surat" readonly>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="no_surat" required autocomplete="off" placeholder="Nomor Surat">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Verifikasi</button></div>
                </form>
            </div>
        </div>
    </div>
</div>