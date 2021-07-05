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
            <td class="judul"><b>KETERANGAN JUAL BELI TERNAK</b></td>
            <hr class="garis_skdomisili">
        </tr>

        <tr>
            <td class="no_surat">Nomor : <?= $nomorKab['nomor2']; ?> / DO / &nbsp;&nbsp;&nbsp; / <?= bulan_romawi(date('m')) ?> / <?= date('Y'); ?></td>
        </tr>
    </table>
    <!-- Akhir Nomor surat -->

    <!-- Isi surat -->
    <table width="100%" border="0" style="margin-bottom: 10px">
        <tr>
            <td style="text-align: justify;">Yang bertanda tangan dibawah ini Pemerintah Desa Oelatimo
                dengan ini menerangkan bahwa :
            </td>
        </tr>
    </table>
    <table class="data" style="margin-bottom: 20px">
        <tr>
            <td style="width: 200px">Nama</td>
            <td style="width: 1px">:</td>
            <td><b><?= $penduduk['nama']; ?></b></td>
        </tr>
        <tr>
            <td style="width: 200px">Alamat</td>
            <td style="width: 1px">:</td>
            <td>RT <?= $penduduk['rt']; ?> / RW <?= $penduduk['rw']; ?> Dusun <?= $penduduk['dusun']; ?> Desa Oelatimo</td>
        </tr>
    </table>
    <table class="data" style="margin-bottom: 10px">
        <tr>
            <td>Nama tersebut diatas adalah pemilik ternak miliknya sendiri dengan ciri ciri sebagai berikut : </td>
        </tr>
    </table>
    <table class="data" style="margin-bottom: 20px">
        <tr>
            <td style="width: 200px">Jenis Ternak</td>
            <td style="width: 1px">:</td>
            <td><?= $data['jenis_ternak']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px">Jenis Kelamin</td>
            <td style="width: 1px">:</td>
            <td><?= $data['jenis_kelamin']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px">Umur</td>
            <td style="width: 1px">:</td>
            <td><?= $data['umur']; ?> Bulan/Tahun/Adik</td>
        </tr>
        <tr>
            <td style="width: 200px">Warna Bulu</td>
            <td style="width: 1px">:</td>
            <td><?= $data['warna_bulu']; ?></td>
        </tr>
        <tr>
            <td style="width: 200px">Potongan Telinga</td>
            <td style="width: 1px">:</td>
            <td><img src="<?= base_url('assets/img/kosong.png') ?>"></td>
        </tr>
        <tr>
            <td style="width: 200px">Cap</td>
            <td style="width: 1px">:</td>
            <td><?= $data['cap']; ?></td>
        </tr>
    </table>
    <table class="data" style="margin-bottom: 10px">
        <tr>
            <td> Ternak tersebut hendak dijual kepada : </td>
        </tr>
    </table>
    <table class="data">
        <tr>
            <td style="width: 200px">Nama</td>
            <td style="width: 1px">:</td>
            <td><b><?= $data['nama_pembeli']; ?></b></td>
        </tr>
        <tr>
            <td style="width: 200px">Alamat</td>
            <td style="width: 1px">:</td>
            <td><?= $data['alamatp']; ?></td>
        </tr>
    </table>
    <table width="100%" border="0" style="margin-top: 20px">
        <tr>
            <td style="text-align: justify;">
                Demikian surat keterangan jual beli ternak ini dibuat untuk dipergunakan sebagaimana mestinya
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