<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" content="SLIP desa Oelatimo,
    Sistem Layanan Informasi Publik Desa Oelatimo">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <style>
        p {
            margin-bottom: 0 !important;
        }
    </style>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- jquery -->
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page tables -->
    <link href="<?= base_url('assets/admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- My CSS Style -->
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/ico/'); ?>favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url('assets/ico/'); ?>apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/ico/'); ?>favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/ico/'); ?>favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/ico/'); ?>favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/ico/'); ?>favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/ico/'); ?>favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?= base_url('assets/ico/'); ?>mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="<?= base_url('assets/ico/'); ?>mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="<?= base_url('assets/ico/'); ?>mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="<?= base_url('assets/ico/'); ?>mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="<?= base_url('assets/ico/'); ?>mstile-310x310.png" />

</head>

<body id="website-body">
    <div class="se-pre-con" data-flashdata="<?= $this->session->flashdata('checkData'); ?>"></div>
    <!-- Page Wrapper -->
    <div id="wrapper">