<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/admin/js/sb-admin-2.min.js"></script>

<!-- Sweet Alert Js-->
<script src="<?= base_url('assets/dist/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/scriptSweetAlert.js"></script>

<!-- script preloading animate -->
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });

    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
</body>

</html>