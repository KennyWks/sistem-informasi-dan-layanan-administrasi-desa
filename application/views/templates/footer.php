<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#website-body">
    <i class="fa fa-angle-double-up fa-2x"></i>
</a>

<!-- Footer -->
<div class="mt-3">
    <footer class="py-4 bg-dark float-bottom">
        <div class="container my-auto">
            <div class="copyright text-center my-auto text-white">
                <span>&copy; SLIP Desa Oelatimo <?= date("Y"); ?></span>
            </div>
        </div>
    </footer>
</div>

<!-- Preloading JavaScript -->
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- jquery easing -->
<script src="<?= base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.compatibility.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.js"></script>
<script src="<?= base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- My JavaScript Sweet Alert -->
<script src="<?= base_url('assets/dist/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/scriptSweetAlert.js"></script>

<!-- My Script -->
<script src="<?= base_url(); ?>assets/js/script.js"></script>

<!-- captcha -->
<script>
    $(document).ready(function() {
        //kontak
        $('.refreshCaptcha1').on('click', function() {
            $.get('<?= base_url('kontak/refreshCaptcha'); ?>', function(data) {
                $('#captImgKontak').html(data);
            });
        });

        //berita
        $('.refreshCaptcha2').on('click', function() {
            $.get('<?= base_url('berita/refreshCaptcha'); ?>', function(data) {
                $('#captImgBerita').html(data);
            });
        });

        //surat keterangan
        $('.refreshCaptcha3').on('click', function() {
            $.get('<?= base_url('Surat_Keterangan/refreshCaptcha'); ?>', function(data) {
                $('#captskUsaha').html(data);
            });
        });

        //pilihan data grafik di APBDesa
        $('.pilih').change(function() {
            const data = $('.pilih').find('option:selected').val();
            if (data == 'P') {
                $(".frameAPbdes").attr("src", "<?= base_url('tentang/getDataAPBDesaP'); ?>");
            } else {
                $(".frameAPbdes").attr("src", "<?= base_url('tentang/getDataAPBDesaA'); ?>");
            }
        });
    });
</script>

<!-- urutkan komentar yang sudah lama -->
<script>
    const id_berita = $('.id_berita').data('id');
    $('.lama').on('click', function() {
        function load_comment_data(page) {
            $.ajax({
                url: "<?= base_url('berita/paginationASC/'); ?>" + id_berita + "/" + page,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.card_komentar').html(data.card_komentar);
                    $('.pagination_link').html(data.pagination_link);
                }
            });
        }

        load_comment_data(1);

        if ($('section').hasClass('lihatKomentar')) {
            $(document).on("click", ".pagination li a", function(event) {
                event.preventDefault();
                const page = $(this).data("ci-pagination-page");
                load_comment_data(page);
            });
        }
    });
</script>

<!-- urutkan komentar yang baru dikirim -->
<script>
    const id1 = $('.id_berita').data('id');
    $('.baru').on('click', function() {
        function load_comment_data(page) {
            $.ajax({
                url: "<?= base_url('berita/paginationDESC/'); ?>" + id1 + "/" + page,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.card_komentar').html(data.card_komentar);
                    $('.pagination_link').html(data.pagination_link);
                }
            });
        }

        load_comment_data(1);

        if ($('section').hasClass('lihatKomentar')) {
            $(document).on("click", ".pagination li a", function(event) {
                event.preventDefault();
                const page = $(this).data("ci-pagination-page");
                load_comment_data(page);
            });
        }
    });
</script>

<!-- pagination dan data komentar dengan jquery -->
<script>
    $(document).ready(function() {
        const id2 = $('.id_berita').data('id');
        // script tampilkan pagination via jquery
        function load_comment_data(page) {
            $.ajax({
                url: "<?= base_url('berita/paginationDESC'); ?>/" + id2 + "/" + page,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.card_komentar').html(data.card_komentar);
                    $('.pagination_link').html(data.pagination_link);
                }
            });
        }

        load_comment_data(1);
        if ($('section').hasClass('lihatKomentar')) {
            $(document).on("click", ".pagination li a", function(event) {
                event.preventDefault();
                var page = $(this).data("ci-pagination-page");
                load_comment_data(page);
            });
        }
    });
</script>


<script>
    $(document).ready(function() {
        $('.Adeskel').hide();

        $('.pilihDesaKel').change(function() {
            const pilihDesaKel = $('.pilihDesaKel').find('option:selected').val();
            if (pilihDesaKel == 'Desa') {
                $('#Adeskel').attr('placeholder', 'Nama Desa');
                $('.Adeskel').show();
            } else if (pilihDesaKel == 'Kelurahan') {
                $('#Adeskel').attr('placeholder', 'Nama Kelurahan');
                $('.Adeskel').show();
            } else {
                $('.Adeskel').hide();
            }
        });
    });
</script>

<script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>

</html>