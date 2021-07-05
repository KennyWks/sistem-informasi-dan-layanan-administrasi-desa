<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/sk.css'); ?>">
</head>

<body>
    <!-- Kop surat -->
    <table width="100%" border="0">
        <tr>
            <td width="25%" rowspan="10"><img class="kop-img" src="<?= base_url('assets/img/logo_desa.png'); ?>"></td>
        </tr>
        <tr>
            <td class="kop">PEMERINTAH KABUPATEN KUPANG</td>
            <td></td>
        </tr>
        <tr>
            <td class="kop">KECAMATAN KUPANG TIMUR</td>
            <td></td>
        </tr>
        <tr>
            <td class="kop">DESA OELATIMO</td>
            <td></td>
        </tr>
    </table>

    <table class="tabel-garis">
        <tr>
            <td>
                <hr class="garis-kop">
            </td>
        </tr>
    </table>
    <!-- Akhir Kop surat -->

    <!-- Nomor surat -->
    <table class="tabel-no-surat" border="0">
        <tr>
            <td class="judul">SURAT KETERANGAN SUSUNAN KELUARGA</td>
            <hr class="garis_skSusunanKel">
        </tr>

        <tr>
            <td class="no_surat">Nomor : <?= $nomorKab['nomor2']; ?> / DO / &nbsp;&nbsp;&nbsp; / <?= bulan_romawi(date('m')) ?> / <?= date('Y'); ?></td>
        </tr>
    </table>
    <!-- Akhir Nomor surat -->

    <!-- Isi surat -->
    <table width="100%" border="0" style="margin-top: 20px;margin-bottom: 10px; vertical-align: top">
        <tr>
            <td style="width:200px">Nama Kepala Keluarga</td>
            <td style="width:1px">:</td>
            <td><b><?= $kk['nama']; ?></b></td>
        </tr>
        <tr>
            <td style="width:200px">Alamat</td>
            <td style="width:1px">:</td>
            <td>RT <?= $kk['rt']; ?> / RW <?= $kk['rw']; ?> Desa Oelatimo</td>
        </tr>
    </table>

    <table style="width:100%; border-collapse:collapse; text-align:center;" border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>TEMPAT TANGGAL LAHIR</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($susunan as $s) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $s['nama'] ?></td>
                    <td><?= ucfirst(strtolower($s['tempat_lahir'])); ?>, <?= tanggal_indonesia($s['tgl_lahir']); ?></td>
                    <td><?= $s['deskripsi']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Akhir Isi surat -->

    <!-- tanggal -->
    <table width="100%" border="0">
        <tr>
            <td></td>
            <td class="tgl_sah">Oelatimo, <?= tanggal_indonesia(date('Y-m-d')); ?></td>
        </tr>
    </table>
    <!-- akhir tanggal -->

    <!-- ttd -->
    <table width="100%" border="0">
        <tr>
            <td class="ttd"><?= $kades['deskripsi']; ?></td>
        </tr>

        <?php if ($kades['jabatan'] == 4) : ?>
            <tr>
                <td style="text-align: center;">Sekretaris</td>
            </tr>
        <?php endif; ?>

        <tr>
            <td class="kolom_ttd"></td>
        </tr>
        <tr>
            <td class="ttd_nama"><b><?= $kades['nama']; ?></b></td>
        </tr>
        <tr>
            <?php if ($kades['nip'] == null) : ?>
                <td class="nip"></td>
            <?php else : ?>
                <td class="nip"><?= $kades['nip']; ?></td>
            <?php endif; ?>
        </tr>

    </table>
    <!-- akhir ttd -->

</body>

</html>