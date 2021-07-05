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
            <td class="judul">SURAT KETERANGAN TIDAK MAMPU</td>
            <hr class="garis_skTdkMamapu">
        </tr>

        <tr>
            <td class="no_surat">Nomor : <?= $nomorKab['nomor2']; ?> / DO / &nbsp;&nbsp;&nbsp; / <?= bulan_romawi(date('m')) ?> / <?= date('Y'); ?></td>
        </tr>
    </table>
    <!-- Akhir Nomor surat -->

    <!-- Isi surat -->
    <table width="100%" border="0" style="margin-bottom: 20px">
        <tr>
            <td>Yang bertanda tangan di bawah ini Pemerintah Desa Oelatimo, menerangkan bahwa : </td>
        </tr>
    </table>
    <table class="data">
        <tr>
            <td style="width: 200px">Nama</td>
            <td style="width: 1px">:</td>
            <td><b><?= $penduduk['nama']; ?></b></td>
        </tr>
        <tr>
            <td style="width: 200px">Tempat Tanggal Lahir</td>
            <td style="width: 1px">:</td>
            <td><?= ucfirst(strtolower($penduduk['tempat_lahir'])); ?>, <?= tanggal_indonesia($penduduk['tgl_lahir']); ?></td>
        </tr>
        <tr>
            <td style="width: 200px">Jenis Kelamin</td>
            <td style="width: 1px">:</td>
            <?php if ($penduduk['jk'] == 'L') : ?>
                <td>Laki-laki</td>
            <?php else : ?>
                <td>Perempuan</td>
            <?php endif; ?>
        </tr>
        <tr>
            <td style="width: 200px">Pekerjaan</td>
            <td style="width: 1px">:</td>
            <td><?= $penduduk['pekerjaan']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px">Agama</td>
            <td style="width: 1px">:</td>
            <td><?= $penduduk['agama']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px">Alamat</td>
            <td style="width: 1px">:</td>
            <td>RT <?= $penduduk['rt']; ?> / RW <?= $penduduk['rw']; ?> Desa Oelatimo, Kec. Kupang</td>
        </tr>
    </table>
    <table width="100%" border="0" style="margin-top: 20px">
        <tr>
            <td style="text-align: justify;">
                <p>Bahwa nama tersebut diatas adalah benar warga masyarakat Desa Oelatimo, Kecamatan Kupang Timur yang berekonomi lemah ( tidak mampu ) kepadanya diberikan surat keterangan tidak mampu ini sebagai kelengkapan Administrasi.</p>
                <p>Demikian surat keterangan ini diberikan untuk dapat di pergunakan sebagaimana mestinya.</p>
            </td>
        </tr>
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