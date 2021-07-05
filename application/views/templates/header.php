<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#317EFB" />
    <meta name="Description" content="SLIP desa Oelatimo,
    Sistem Layanan Informasi Publik Desa Oelatimo">

    <title><?= $judul; ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

    <!-- Icon FontAwesome -->
    <link href="<?= base_url('assets/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Viga Font CSS URL -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

    <!-- Manifest PWA -->
    <link rel="manifest" href="<?= base_url(); ?>manifest.json">

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
    <div class="se-pre-con"></div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="nav">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="<?= base_url(); ?>assets/img/logo.png" class="rounded-circle float-right" width="30px" alt="oelatimo">
            </a>
            <a href="<?= base_url(); ?>" class="text-light mr-auto web_desa">Website Desa Oelatimo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-label="Collapse Button" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if ($judul == 'Beranda') : ?>
                            <a class="nav-link mynav active" href="<?= base_url(); ?>">Beranda</a>
                        <?php else : ?>
                            <a class="nav-link mynav" href="<?= base_url(); ?>">Beranda</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($judul == 'Kabar Desa') : ?>
                            <a class="nav-link mynav active" href="<?= base_url(); ?>berita">Berita</a>
                        <?php else : ?>
                            <a class="nav-link mynav" href="<?= base_url(); ?>berita">Berita</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if ($judul == 'Sejarah' || $judul == 'Wilayah' || $judul == 'Statistik' || $judul == 'Monografi' || $judul == 'Potensi') : ?>
                            <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tentang</a>
                        <?php else : ?>
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tentang</a>
                        <?php endif; ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url(); ?>tentang/sejarah"><i class="fa fa-history"></i> Sejarah</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>tentang/wilayah"><i class="fa fa-flag"></i> Wilayah</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>tentang/statistik"><i class="fas fa-chart-bar"></i> Statisik</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>tentang/monografi"><i class="fas fa-file-alt"></i> Monografi</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>tentang/potensi"><i class="fa fa-paper-plane"></i> Potensi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if ($judul == 'Pemerintah' || $judul == 'BPD' || $judul == 'LPM' || $judul == 'PKK' || $judul == 'Karang Taruna') : ?>
                            <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lembaga</a>
                        <?php else : ?>
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lembaga</a>
                        <?php endif; ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= base_url(); ?>lembaga/pemerintah"><i class="fa fa-university"></i> Pemerintah</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>lembaga/bpd"><i class="fa fa-university"></i> BPD</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>lembaga/lpm"><i class="fa fa-university"></i> LPM</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>lembaga/pkk"><i class="fa fa-university"></i> PKK</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>lembaga/kt"><i class="fa fa-university"></i> Karang Taruna</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?php if ($judul == 'Pembangunan') : ?>
                            <a class="nav-link mynav active" href="<?= base_url(); ?>pembangunan">Pembangunan</a>
                        <?php else : ?>
                            <a class="nav-link mynav" href="<?= base_url(); ?>pembangunan">Pembangunan</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($judul == 'Layanan') : ?>
                            <a class="nav-link mynav active" href="<?= base_url(); ?>layanan">Layanan</a>
                        <?php else : ?>
                            <a class="nav-link mynav" href="<?= base_url(); ?>layanan">Layanan</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($judul == 'Kontak') : ?>
                            <a class="nav-link mynav active" href="<?= base_url(); ?>kontak">Kontak</a>
                        <?php else : ?>
                            <a class="nav-link mynav" href="<?= base_url(); ?>kontak">Kontak</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>