<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; SLIP Desa Oelatimo <?= date("Y"); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#website-body">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" jika ingin keluar dari akun.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('Otentifikasi_Penduduk/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- penduduk modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Permohonan Surat Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Surat_Keterangan/routingSK'); ?>" method="POST">
                    <input type="hidden" name="id_peddk" value="<?= $penduduk['id_peddk']; ?>">
                    <div class="form-group">
                        <label for="sk">Pilih Surat Keterangan</label>
                        <select class="form-control sk" name="sk">
                            <option value="">Pilih</option>
                            <?php foreach ($sk as $surat) : ?>
                                <option value="<?= $surat['id_sk']; ?>"><?= $surat['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="data-ternak">
                        <div class="form-group">
                            <label for="jenis">Jenis Ternak</label>
                            <select class="form-control" name="jenis" id="jenis">
                                <option value="Sapi" selected>Sapi</option>
                                <option value="Kerbau">Kerbau</option>
                                <option value="Babi">Babi</option>
                                <option value="Kambing">Kambing</option>
                                <option value="Domba">Domba</option>
                                <option value="Kuda">Kuda</option>
                                <option value="Ayam">Ayam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jkt">Jenis Kelamin Ternak</label>
                            <select class="form-control" name="jkt" id="jkt">
                                <option value="Jantan" selected>Jantan</option>
                                <option value="Betina">Betina</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" name="umur" autocomplete="off" class="form-control" placeholder="Umur Ternak (Bulan/Tahun/Adik)">
                        </div>
                        <div class="form-group">
                            <input type="text" name="warna" autocomplete="off" class="form-control" placeholder="Warna Bulu Ternak">
                        </div>
                        <div class="form-group">
                            <label for="cap">Ada Cap Pada Ternak?</label>
                            <select class="form-control" name="cap" id="cap">
                                <option value="Tidak" selected>Tidak</option>
                                <option value="Ya">Ya</option>
                            </select>
                        </div>
                    </div>
                    <div class="pembeli">
                        <div class="form-group">
                            <input type="text" id="pembeli" autocomplete="off" name="pembeli" class="form-control" placeholder="Nama Pembeli">
                        </div>
                        <div class="form-group">
                            <label for="Art">Alamat Pembeli Ternak</label>
                            <input type="text" id="alamatp" name="alamatp" autocomplete="off" class="form-control" placeholder="Alamat Jalan, RT, RW, Dusun, Desa/Kelurahan dan Kecamatan">
                            <small class="text-danger">Alamat Jalan, RT, RW, Dusun, Desa/Kelurahan dan Kecamatan</small>
                        </div>
                    </div>
                    <div class="form-skkeamtian">
                        <div class="form-group">
                            <label for="tgl">Tanggal Meninggal</label>
                            <input type="date" autocomplete="off" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" class="form-control" name="tgl">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="tempat" autocomplete="off" placeholder="Tempat Meninggal">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="sebab" autocomplete="off" placeholder="Penyebab Meninggal">
                        </div>
                    </div>
                    <div class="form-group foto">
                        <label for="foto" class="text-danger">Pakai Foto ?</label>
                        <select class="form-control vfoto" name="foto" id="foto">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        <small class="text-danger fotop">Perhatian : Mohon siapkan foto dengan ukuran 3 X 4</small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control tujuan" name="tujuan" autocomplete="off" placeholder="Tujuan Penggunaan Surat Ini Untuk...">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Proses</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<!-- preloading animate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/admin/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins tables-->
<script src="<?= base_url('assets/admin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Sweet Alert Js-->
<script src="<?= base_url('assets/dist/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/scriptSweetAlert.js"></script>

<script>
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
    //pilihan data riwayat sk
    $('.pilih').change(function() {
        const pilih = $('.pilih').find('option:selected').val();
        if (pilih == 1) {
            $('.tabel-data').show();
            $.ajax({
                url: "<?= base_url('penduduk/getSKtdkMampu'); ?>",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.tabel-data').html(data);
                }
            });
        } else if (pilih == 2) {
            $('.tabel-data').show();
            $.ajax({
                url: "<?= base_url('penduduk/getSKsusunanK'); ?>",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.tabel-data').html(data);
                }
            });
        } else if (pilih == 3) {
            $('.tabel-data').show();
            $.ajax({
                url: "<?= base_url('penduduk/getSKdomisili'); ?>",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.tabel-data').html(data);
                }
            });
        } else if (pilih == 4) {
            $('.tabel-data').show();
            $.ajax({
                url: "<?= base_url('penduduk/getSKkematian'); ?>",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.tabel-data').html(data);
                }
            });
        } else if (pilih == 5) {
            $('.tabel-data').show();
            $.ajax({
                url: "<?= base_url('penduduk/getSKjbternak'); ?>",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.tabel-data').html(data);
                }
            });
        } else {
            $('.tabel-data').hide();
        }
    });

    $('.buatsk').on('click', function() {
        $('.form-skkeamtian').hide();
        $('.tujuan').hide();
        $('.foto').hide();
        $('.data-ternak').hide();
        $('.pembeli').hide();
        $('.sk option:first').prop('selected', true);
    });

    $('.sk').change(function() {
        const data = $('.sk').find('option:selected').val();
        if (data == 1 || data == 2) {
            $('.form-skkeamtian').hide();
            $('.foto').hide();
            $('.tujuan').show();
            $('.data-ternak').hide();
            $('.pembeli').hide();
        } else if (data == 3) {
            $('.form-skkeamtian').hide();
            $('.foto').show();
            $('.tujuan').show();
            $('.data-ternak').hide();
            $('.pembeli').hide();
        } else if (data == 4) {
            $('.form-skkeamtian').show();
            $('.tujuan').hide();
            $('.foto').hide();
            $('.data-ternak').hide();
            $('.pembeli').hide();
        } else {
            $('.form-skkeamtian').hide();
            $('.tujuan').hide();
            $('.foto').hide();
            $('.data-ternak').show();
            $('.pembeli').show();
        }
    });

    $('.vfoto').change(function() {
        const vfoto = $('.vfoto').find('option:selected').val();
        if (vfoto == 1) {
            $('.fotop').show();
        } else {
            $('.fotop').hide();
        }
    });
</script>

</body>

</html>