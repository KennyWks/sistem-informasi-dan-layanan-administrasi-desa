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
            <div class="modal-body">Pilih "Logout" jika ingin keluar dari akun.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('otentifikasi/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal baca isi pesan, komentar, dan isi berita -->
<div class="modal fade" id="formModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal"></h5>
                <button class="close tombolTutup" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="baca" class="baca">
                    <div class="deskripsi"></div>
                    <br>
                    <span class="nama_depan"></span> <span class="nama_belakang"></span>
            </div>
            <div class="modal-footer tutup">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Lembaga (Kecuali Pemerintah) -->
<div class="modal fade" id="formModalLembaga" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
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
                    <input type="hidden" name="id_aparat" id="id_aparat">
                    <div class="form-group">
                        <input type="text" class="form-control nama" name="nama" autocomplete="off" placeholder="Nama Pengurus">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Ubah</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- preloading animate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<!-- Bootstrap core JavaScript-->
<!-- <script src="<?= base_url('assets/admin/'); ?>vendor/jquery/jquery.min.js"></script> -->
<script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/admin/'); ?>js/sb-admin-2.min.js"></script>

<!-- My JavaScript -->
<script src="<?= base_url('assets/admin/js/'); ?>scriptAdmin.js"></script>

<!-- Page level plugins tables-->
<script src="<?= base_url('assets/admin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts tables-->
<script src="<?= base_url('assets/admin/'); ?>js/demo/datatables-demo.js"></script>

<!-- jquery mask -->
<script src="<?= base_url('assets/admin/'); ?>js/jquery.mask.min.js"></script>

<!-- Sweet Alert Js-->
<script src="<?= base_url('assets/dist/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/scriptSweetAlert.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/admin/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<?php if ($title == "Dashboard") {
    echo '<script src="' . base_url('assets/admin/') . 'js/demo/chart-area-demo.js"></script>';
    echo '<script src="' . base_url('assets/admin/') . 'js/demo/chart-pie-sk.js"></script>';
} ?>

</body>

</html>