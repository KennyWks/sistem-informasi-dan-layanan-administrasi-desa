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
            <td class="judul">SURAT KETERANGAN KEMATIAN</td>
            <hr class="garis-skKematian">
        </tr>

        <tr>
            <td class="no_surat">Nomor : <?= $nomorKab['nomor2']; ?> / DO / &nbsp;&nbsp;&nbsp; / <?= bulan_romawi(date('m')) ?> / <?= date('Y'); ?></td>
        </tr>
    </table>
    <!-- Akhir Nomor surat -->

    <!-- Isi surat -->
    <table width="100%" border="0" style="margin-bottom: 20px">
        <tr>
            <td>Yang bertanda tangan dibawah ini Pemerintah Desa Oelatimo, menerangkan dengan sebenarnya bahwa :</td>
        </tr>
    </table>
    <table class="data">
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Nama</td>
            <td style="width:1px">:</td>
            <td><b><?= $penduduk['nama']; ?></b></td>
        </tr>
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Tempat tanggal lahir</td>
            <td style="width:1px">:</td>
            <td><?= ucfirst(strtolower($penduduk['tempat_lahir'])); ?>, <?= tanggal_indonesia($penduduk['tgl_lahir']); ?></td>
        </tr>
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Jenis Kelamin</td>
            <td style="width:1px">:</td>
            <?php if ($penduduk['jk'] == 'L') : ?>
                <td>Laki-laki</td>
            <?php else : ?>
                <td>Perempuan</td>
            <?php endif; ?>
        </tr>
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Agama</td>
            <td style="width:1px">:</td>
            <td><?= $penduduk['agama']; ?></td>
        </tr>
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Alamat</td>
            <td style="width:1px">:</td>
            <td>RT <?= $penduduk['rt']; ?> / RW <?= $penduduk['rw']; ?> Desa Oelatimo, Kec. Kupang Timur</td>
        </tr>
    </table>
    <table width="100%" border="0" style="margin-bottom: 20px">
        <tr>
            <td>Telah meninggal dunia :</td>
        </tr>
    </table>
    <table class="data">
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Hari</td>
            <td style="width:1px">:</td>
            <td><b><?= nama_hari(date('l', $deskripsi['tgl'])); ?></b></td>
        </tr>
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177">Tanggal</td>
            <td style="width:1px">:</td>
            <td><?= tanggal_indonesia(date('Y-m-d', $deskripsi['tgl'])); ?></td>
        </tr>
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Di</td>
            <td style="width:1px">:</td>
            <td><?= $deskripsi['tempat']; ?></td>
        </tr>
        <tr>
            <td style="width: 50px;"></td>
            <td style="width:177px">Disebabkan karena</td>
            <td style="width:1px">:</td>
            <td><?= $deskripsi['sebab']; ?></td>
        </tr>
    </table>
    <table width="100%" border="0" style="margin-top: 20px">
        <tr>
            <td style="text-align: justify;">
                <p>Demikian surat keterangan Kematian ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
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