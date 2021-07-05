-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2020 at 12:23 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `apbdesa`
--

DROP TABLE IF EXISTS `apbdesa`;
CREATE TABLE IF NOT EXISTS `apbdesa` (
  `id_apbdesa` int(11) NOT NULL AUTO_INCREMENT,
  `pendapatan` int(11) NOT NULL,
  `belanja` int(11) NOT NULL,
  `pembiayaan` int(11) NOT NULL,
  `kas` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `anggaran` varchar(1) NOT NULL,
  PRIMARY KEY (`id_apbdesa`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apbdesa`
--

INSERT INTO `apbdesa` (`id_apbdesa`, `pendapatan`, `belanja`, `pembiayaan`, `kas`, `tahun`, `anggaran`) VALUES
(1, 1350000000, 1300000000, 25000000, 25000000, '2020', 'A'),
(2, 1250000000, 1150000000, 25000000, 25000000, '2020', 'P'),
(3, 1200000000, 1100000000, 22000000, 10000000, '2019', 'A'),
(4, 1100000000, 1000000000, 10000000, 5000000, '2019', 'P'),
(5, 1100000000, 1000000000, 10000000, 5000000, '2018', 'A'),
(6, 1200000000, 1100000000, 22000000, 10000000, '2018', 'P'),
(7, 1100000000, 1000000000, 10000000, 5000000, '2017', 'A'),
(8, 1200000000, 1100000000, 22000000, 10000000, '2017', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `bapbdesa`
--

DROP TABLE IF EXISTS `bapbdesa`;
CREATE TABLE IF NOT EXISTS `bapbdesa` (
  `id_belanja` int(11) NOT NULL AUTO_INCREMENT,
  `kode_apbdesa` int(11) NOT NULL,
  `ppdb` int(11) NOT NULL,
  `ppdp` int(11) NOT NULL,
  `pmd` int(11) NOT NULL,
  `pkd` int(11) NOT NULL,
  `btt` int(11) NOT NULL,
  PRIMARY KEY (`id_belanja`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bapbdesa`
--

INSERT INTO `bapbdesa` (`id_belanja`, `kode_apbdesa`, `ppdb`, `ppdp`, `pmd`, `pkd`, `btt`) VALUES
(1, 1, 700000000, 100000000, 100000000, 100000000, 40000000),
(2, 2, 1000000000, 100000000, 50000000, 50000000, 14000000),
(3, 3, 800000000, 100000000, 100000000, 100000000, 40000000),
(4, 4, 600000000, 100000000, 50000000, 50000000, 40000000),
(5, 5, 550000000, 150000000, 50000000, 40000000, 50000000),
(6, 6, 700000000, 100000000, 40000000, 100000000, 100000000),
(7, 7, 650000000, 50000000, 40000000, 50000000, 50000000),
(8, 8, 750000000, 50000000, 50000000, 40000000, 150000000);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text,
  `deskripsi` text,
  `tanggal` int(11) DEFAULT NULL,
  `penulis` text,
  `jml_baca` int(11) NOT NULL,
  `foto` text,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `deskripsi`, `tanggal`, `penulis`, `jml_baca`, `foto`) VALUES
(1, 'Penyerahan beras rastra TA 2020 Quartal 1.', 'Kegiatan ini dilakukan bertempat di kantor Desa Oelatimo dan penduduk di dusun I sebagai penerima.', 1585757409, 'Kenny A.N Perulu', 102, 'codeigniter.jpg'),
(2, 'Pengumpulan data untuk pembuatan sertifikat.', 'Kegiatan ini dilakukan bertempat di kantor desa Oelatimo dan masyarakat setempat sebagai penerima sertifikat.', 1585757409, 'Jhun', 23, 'default.jpg'),
(3, 'Rapat untuk penyusunan APBDesa tahuan anggaran 2019.', '<p>Kegiatan ini dilakukan bertempat di kantor desa Oelatimo dan Kepala desa, Perangkat Desa dan Badan Pemusyawaratan Desa (BPD).</p>', 1585757409, 'Apris', 4, 'stikom.jpg'),
(5, 'Rapat untuk penyusunan APBDesa tahuan anggaran 2018.', 'Kegiatan ini dilakukan bertempat di kantor Desa Oelatimo dan penduduk di dusun I sebagai penerima.', 1585757409, 'Kenny A.N Perulu', 1, '5d563e8483dfe.jpg'),
(7, 'Rapat untuk penyusunan APBDesa tahuan anggaran 2017.', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis consectetur voluptate? Sapiente molestiae magnam mollitia est inventore, rem voluptates odit a odio ipsa, ea ducimus culpa nulla quidem quam?', 1585757409, 'Kenny A.N Perulu', 2, '5d5acf4343acb.jpg'),
(9, 'Pengumpulan data untuk pembuatan sertifikat.', 'Kegiatan ini dilakukan bertempat di kantor desa Oelatimo dan masyarakat setempat sebagai penerima sertifikat.', 1585757409, 'Jhun', 628, 'codeignitera.jpg'),
(10, 'Rapat untuk penyusunan APBDesa tahuan anggaran 2017.', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis consectetur voluptate? Sapiente molestiae magnam mollitia est inventore, rem voluptates odit a odio ipsa, ea ducimus culpa nulla quidem quam?</p>', 1585757409, 'Kenny A.N Perulu', 6, '5d5acf4343acb.jpg'),
(12, 'Penyerahan beras rastra TA 2020 Quartal 1.', '<p>Kenny sya pergi ke rumaha untuk menghabiskan waktu dengan ayah bersama kita pasti bisa dan itu adalah ketika saya.</p>', 1585757409, 'Kenny A.N Perulu', 5, 'codeigniter.jpg'),
(26, 'Lanuncing SLIP Desa Oelatimo', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta corporis consectetur voluptate? Sapiente molestiae magnam mollitia est inventore, rem voluptates odit a odio ipsa, ea ducimus culpa nulla quidem quam?</p>', 1585936638, 'Admin', 25, 'default.jpg'),
(30, 'SLIP Desa Oelatimo', '<p style=\"text-align:justify\"><strong>Pengembangan aplikasi desa SLIP desa oelatimo</strong></p>', 1586794782, 'Kenny Perulu', 168, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bpd`
--

DROP TABLE IF EXISTS `bpd`;
CREATE TABLE IF NOT EXISTS `bpd` (
  `id_bpd` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  PRIMARY KEY (`id_bpd`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bpd`
--

INSERT INTO `bpd` (`id_bpd`, `nama`, `jabatan`) VALUES
(1, 'Yohanis Lake', 'Ketua BPD'),
(2, '-', 'Sekretaris BPD'),
(3, '-', 'Bendahara BPD'),
(4, '-', 'Anggota 1 BPD'),
(5, '-', 'Anggota 2 BPD'),
(6, '-', 'Anggota 3 BPD');

-- --------------------------------------------------------

--
-- Table structure for table `hubungan`
--

DROP TABLE IF EXISTS `hubungan`;
CREATE TABLE IF NOT EXISTS `hubungan` (
  `id_hubungan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_hubungan` varchar(5) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_hubungan`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hubungan`
--

INSERT INTO `hubungan` (`id_hubungan`, `kode_hubungan`, `deskripsi`) VALUES
(1, 'KK', 'Kepala Keluarga'),
(2, 'S', 'Suami'),
(3, 'I', 'Istri'),
(11, 'L', 'Lainnya'),
(5, 'MEN', 'Menantu'),
(6, 'C', 'Cucu'),
(7, 'OT', 'Orang Tua'),
(8, 'MER', 'Mertua'),
(9, 'FL', 'Famili lain'),
(10, 'P', 'Pembantu'),
(4, 'A', 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_kades`
--

DROP TABLE IF EXISTS `jabatan_kades`;
CREATE TABLE IF NOT EXISTS `jabatan_kades` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jabatan` int(1) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_kades`
--

INSERT INTO `jabatan_kades` (`id_jabatan`, `kode_jabatan`, `deskripsi`) VALUES
(1, 1, 'Kepala Desa'),
(2, 2, 'Pj Kepala Desa'),
(3, 3, 'PlH Kepala Desa'),
(4, 4, 'An.Pj Kepala Desa');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sk`
--

DROP TABLE IF EXISTS `jenis_sk`;
CREATE TABLE IF NOT EXISTS `jenis_sk` (
  `id_sk` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `nomor2` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id_sk`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_sk`
--

INSERT INTO `jenis_sk` (`id_sk`, `nama`, `nomor2`, `aktif`) VALUES
(1, 'SK Tidak Mampu', 423, 1),
(2, 'SK Susunan Keluarga', 424, 1),
(3, 'SK Domisili', 425, 1),
(4, 'SK Kematian', 426, 1),
(5, 'SK Jual Beli Ternak', 427, 1),
(8, 'SK Usaha', 428, 0);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_berita` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text,
  `hp` varchar(12) NOT NULL,
  `baca` int(1) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kt`
--

DROP TABLE IF EXISTS `kt`;
CREATE TABLE IF NOT EXISTS `kt` (
  `id_kt` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  PRIMARY KEY (`id_kt`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kt`
--

INSERT INTO `kt` (`id_kt`, `nama`, `jabatan`) VALUES
(1, 'Musa A Lalan', 'Ketua Karang Taruna'),
(2, '-', 'Wakil Ketua Karang Taruna'),
(3, '-', 'Sekretaris Karang Taruna'),
(4, '-', 'Bendahara Karang Taruna');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

DROP TABLE IF EXISTS `kunjungan`;
CREATE TABLE IF NOT EXISTS `kunjungan` (
  `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL,
  `tgl` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  PRIMARY KEY (`id_kunjungan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
--

DROP TABLE IF EXISTS `lahan`;
CREATE TABLE IF NOT EXISTS `lahan` (
  `id_lahan` int(11) NOT NULL AUTO_INCREMENT,
  `wilayah` float NOT NULL,
  `pemukiman` float NOT NULL,
  `pertanian` float NOT NULL,
  `perkebunan` float NOT NULL,
  `tambak` float NOT NULL,
  `hutan` float NOT NULL,
  `embung` float NOT NULL,
  PRIMARY KEY (`id_lahan`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`id_lahan`, `wilayah`, `pemukiman`, `pertanian`, `perkebunan`, `tambak`, `hutan`, `embung`) VALUES
(1, 1650, 50, 240, 210, 40, 1000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `lpm`
--

DROP TABLE IF EXISTS `lpm`;
CREATE TABLE IF NOT EXISTS `lpm` (
  `id_lpm` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  PRIMARY KEY (`id_lpm`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpm`
--

INSERT INTO `lpm` (`id_lpm`, `nama`, `jabatan`) VALUES
(1, '-', 'Ketua LPM'),
(2, '-', 'Sekretaris LPM'),
(3, '-', 'Bendahara LPM'),
(4, '-', 'Anggota 1 LPM'),
(5, '-', 'Anggota 2 LPM'),
(9, '-', 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `nomor_surat`
--

DROP TABLE IF EXISTS `nomor_surat`;
CREATE TABLE IF NOT EXISTS `nomor_surat` (
  `id_nomor_surat` int(11) NOT NULL AUTO_INCREMENT,
  `sk_mati` text NOT NULL,
  `sk_tidakmampu` text NOT NULL,
  `sk_domisili` text NOT NULL,
  `sk_susunanKel` text NOT NULL,
  `sk_usaha` text NOT NULL,
  PRIMARY KEY (`id_nomor_surat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomor_surat`
--

INSERT INTO `nomor_surat` (`id_nomor_surat`, `sk_mati`, `sk_tidakmampu`, `sk_domisili`, `sk_susunanKel`, `sk_usaha`) VALUES
(1, '11', '22', '33', '44', '55');

-- --------------------------------------------------------

--
-- Table structure for table `no_surat`
--

DROP TABLE IF EXISTS `no_surat`;
CREATE TABLE IF NOT EXISTS `no_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_surat` varchar(50) NOT NULL,
  `no_surat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `papbdesa`
--

DROP TABLE IF EXISTS `papbdesa`;
CREATE TABLE IF NOT EXISTS `papbdesa` (
  `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_apbdesa` int(11) NOT NULL,
  `pasli` int(11) NOT NULL,
  `transfer` int(11) NOT NULL,
  `plain` int(11) NOT NULL,
  PRIMARY KEY (`id_pendapatan`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papbdesa`
--

INSERT INTO `papbdesa` (`id_pendapatan`, `kode_apbdesa`, `pasli`, `transfer`, `plain`) VALUES
(1, 1, 25000000, 1200000000, 75000000),
(2, 2, 30000000, 1170000000, 60000000),
(3, 3, 30000000, 1100000000, 30000000),
(4, 4, 15000000, 850000000, 35000000),
(5, 5, 25000000, 825000000, 50000000),
(6, 6, 10000000, 1100000000, 50000000),
(7, 7, 10000000, 925000000, 15000000),
(8, 8, 40000000, 1100000000, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` text NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Pelajar/Mahasiswa'),
(2, 'Petani'),
(3, 'Perawat/Bidan'),
(4, 'PNS'),
(5, 'Guru'),
(6, 'Wiraswasta'),
(7, 'Wirausaha'),
(8, 'Pendeta'),
(9, 'Anggota TNI'),
(10, 'Anggota Polri'),
(11, 'Ibu Rumah Tangga (IRT)'),
(12, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `pemerintah`
--

DROP TABLE IF EXISTS `pemerintah`;
CREATE TABLE IF NOT EXISTS `pemerintah` (
  `id_pem` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `kode_perangkat` varchar(3) NOT NULL,
  `jabatan` text NOT NULL,
  PRIMARY KEY (`id_pem`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemerintah`
--

INSERT INTO `pemerintah` (`id_pem`, `nama`, `kode_perangkat`, `jabatan`) VALUES
(2, 'Apris Kono', 'PKD', 'Sekretaris Desa'),
(3, '-', 'PKD', 'Kasi Pemerintahan'),
(4, '-', 'PKD', 'Kasi Pelayanan'),
(5, '-', 'PKD', 'Kasi Kesejahteraan'),
(6, '-', 'PKD', 'Kaur Perencanaan'),
(7, '-', 'PKD', 'Kaur Keuangan'),
(8, '-', 'PKD', 'Kaur Umum & TU'),
(9, '-', 'KD', 'Kepala Dusun 1'),
(10, '-', 'KD', 'Kepala Dusun 2'),
(11, '-', 'KD', 'Kepala Dusun 3'),
(12, '-', 'KD', 'Kepala Dusun 4');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pendidikan` int(2) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `kode_pendidikan`, `deskripsi`) VALUES
(1, 1, 'Tidak/Belum Sekolah/TK/PAUD'),
(2, 2, 'Belum tamat SD/sederajat'),
(3, 3, 'Tamat SD/sederajat'),
(4, 4, 'Tamat SLTP/sederajat'),
(5, 5, 'Tamat SLTA/sederajat'),
(6, 6, 'Tamat Diploma I/II'),
(7, 7, 'Tamat Akademi/Diploma III/Sarjana Muda'),
(8, 8, 'Tamat Diploma IV/Strata I'),
(9, 9, 'Tamat Strata II'),
(10, 10, 'Tamat Strata III');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE IF NOT EXISTS `penduduk` (
  `id_peddk` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(17) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` text,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `dusun` int(2) DEFAULT NULL,
  `jk` varchar(9) DEFAULT NULL,
  `hubungan` text,
  `tempat_lahir` text,
  `tgl_lahir` date DEFAULT NULL,
  `umur` varchar(2) DEFAULT NULL,
  `status` text,
  `suku` text,
  `agama` text,
  `pendidikan` int(2) DEFAULT NULL,
  `pekerjaan` text,
  `ket` text,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_peddk`)
) ENGINE=InnoDB AUTO_INCREMENT=1254 DEFAULT CHARSET=latin1;

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` text NOT NULL,
  `nama_belakang` text NOT NULL,
  `email` text NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` int(11) NOT NULL,
  `baca` int(1) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pkk`
--

DROP TABLE IF EXISTS `pkk`;
CREATE TABLE IF NOT EXISTS `pkk` (
  `id_pkk` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  PRIMARY KEY (`id_pkk`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkk`
--

INSERT INTO `pkk` (`id_pkk`, `nama`, `jabatan`) VALUES
(1, 'Pujiati Metkono', 'Ketua PKK'),
(2, '-', 'Sekretaris PKK'),
(3, '-', 'Bendahara PKK'),
(4, '-', 'Anggota 1 PKK'),
(5, '-', 'Anggota 2 PKK'),
(6, '-', 'Anggota 3 PKK');

-- --------------------------------------------------------

--
-- Table structure for table `saspras`
--

DROP TABLE IF EXISTS `saspras`;
CREATE TABLE IF NOT EXISTS `saspras` (
  `id_saspras` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `kondisi` varchar(3) NOT NULL,
  `pemilik` text NOT NULL,
  `jenis` text NOT NULL,
  PRIMARY KEY (`id_saspras`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saspras`
--

INSERT INTO `saspras` (`id_saspras`, `nama`, `kondisi`, `pemilik`, `jenis`) VALUES
(1, 'Sumur Air PNPM Mandiri', 'RS', 'Pusat', 'Transportasi'),
(2, 'Lapangan Voli Dusun 1', 'RB', 'Provinsi', 'Olaraga'),
(3, 'TK Dusun II', 'RS', 'Provinsi', 'Pendidikan'),
(4, 'Jalan raya', 'RB', 'Kabupaten', 'Umum'),
(5, 'Bak Penampungan Dusun III', 'RS', 'Pusat', 'Air Bersih'),
(6, 'Kebun Desa', 'B', 'Perseorangan', 'Lainnya'),
(8, 'Pastorial GMIT', 'B', 'Swasta', 'Rohani'),
(9, 'Sumur Air Dusun 4', 'B', 'Lembaga', 'Air Bersih'),
(10, 'Pusat Moll Beras', 'RS', 'Lembaga', 'Lainnya'),
(11, 'Pustu Dusun III', 'B', 'Kabupaten', 'Kesehatan'),
(12, 'SD Inpres Oelatimo', 'B', 'Kabupaten', 'Pendidikan'),
(13, 'Lapangan Voli Kantor Desa', 'B', 'Swasta', 'Olaraga'),
(14, 'Sumur Bor Dusun I', 'B', 'Desa', 'Air Bersih'),
(15, 'Gedung Posyandu', 'B', 'Desa', 'Kesehatan'),
(16, 'Sumur Bor Dusun II', 'B', 'Desa', 'Air Bersih'),
(17, 'Sumur Bor Dusun IV', 'B', 'Desa', 'Air Bersih'),
(19, 'Lapangan Tenis', 'RB', 'Pusat', 'Olaraga');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_kades`
--

DROP TABLE IF EXISTS `sejarah_kades`;
CREATE TABLE IF NOT EXISTS `sejarah_kades` (
  `id_kades` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) DEFAULT NULL,
  `nama` text NOT NULL,
  `jabatan` varchar(2) NOT NULL,
  `awal` varchar(78) NOT NULL,
  `akhir` varchar(4) NOT NULL,
  `foto` text NOT NULL,
  `pidato` text,
  PRIMARY KEY (`id_kades`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sejarah_kades`
--

INSERT INTO `sejarah_kades` (`id_kades`, `nip`, `nama`, `jabatan`, `awal`, `akhir`, `foto`, `pidato`) VALUES
(1, NULL, 'Alis Elia Metkono', '1', '2007', '2013', 'default.jpg', '<p>-</p>'),
(2, NULL, 'Alis Elia Metkono', '1', '2013', '2019', 'default.jpg', '<p>-</p>'),
(3, '', 'Justen Jibrael Lalan', '2', '2019', '2021', 'default.jpg', '<p>Assalamu&rsquo;alaikum wr. wb., Syalom! Salam sejaterah untuk kita semua.</p>\r\n\r\n<p>Kami sampaikan selamat datang di situs web Desa Oelatimo. Kami senang Anda sudah berkunjung, semoga melalui situs web ini kami dapat memberikan segala informasi yang aktual dan terperbarui langsung dari Desa kami. Situs web ini merupakan salah satu wujud dari komitmen Pemerintah Desa Oelatimo, pada pentingnya komunikasi dan transparansi publik.</p>\r\n\r\n<p>Kami berharap, partisipasi publik pada pembangunan Desa akan meningkat seiring dengan peningkatan kepercayaan kepada Pemerintahan serta seluruh program pembangunan yang telah disusun bersama.</p>\r\n\r\n<p>Situs web ini adalah bagian dari Sistem Informasi Desa yang mulai diimplementasikan di Desa kami pada tahun 2020. Selain media komunikasi publik berupa situs web ini, pelayanan administrasi kependudukan dan pengelolaan administrasi pemerintahan di Desa kini telah berbasis Teknologi Informasi.</p>\r\n\r\n<p>Wassalamu&rsquo;alaikum wr. wb. Syalom! Salam sejaterah untuk kita semua.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `sk_domisili`
--

DROP TABLE IF EXISTS `sk_domisili`;
CREATE TABLE IF NOT EXISTS `sk_domisili` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_peddk` int(11) NOT NULL,
  `id_sk` int(2) NOT NULL,
  `foto` int(1) NOT NULL,
  `tujuan` text NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_jbternak`
--

DROP TABLE IF EXISTS `sk_jbternak`;
CREATE TABLE IF NOT EXISTS `sk_jbternak` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_peddk` int(11) NOT NULL,
  `id_sk` int(2) NOT NULL,
  `jenis_ternak` text NOT NULL,
  `jenis_kelamin` varchar(6) NOT NULL,
  `umur` varchar(2) NOT NULL,
  `warna_bulu` text NOT NULL,
  `cap` varchar(5) NOT NULL,
  `nama_pembeli` text NOT NULL,
  `alamatp` text NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_kematian`
--

DROP TABLE IF EXISTS `sk_kematian`;
CREATE TABLE IF NOT EXISTS `sk_kematian` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_peddk` int(11) NOT NULL,
  `id_sk` int(2) NOT NULL,
  `tgl` int(11) NOT NULL,
  `tempat` text NOT NULL,
  `sebab` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_susunank`
--

DROP TABLE IF EXISTS `sk_susunank`;
CREATE TABLE IF NOT EXISTS `sk_susunank` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_peddk` int(11) NOT NULL,
  `id_sk` int(2) NOT NULL,
  `tujuan` text NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_tdkmampu`
--

DROP TABLE IF EXISTS `sk_tdkmampu`;
CREATE TABLE IF NOT EXISTS `sk_tdkmampu` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `id_peddk` int(11) NOT NULL,
  `id_sk` int(2) NOT NULL,
  `tujuan` text NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_usaha`
--

DROP TABLE IF EXISTS `sk_usaha`;
CREATE TABLE IF NOT EXISTS `sk_usaha` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` int(11) NOT NULL,
  `Arumah` text NOT NULL,
  `Art` varchar(5) NOT NULL,
  `Arw` varchar(5) NOT NULL,
  `Adeskel` text NOT NULL,
  `Akec` text NOT NULL,
  `pekerjaan` int(1) NOT NULL,
  `agama` text NOT NULL,
  `bidang` text NOT NULL,
  `lokasi` text NOT NULL,
  `tgl_buat` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

DROP TABLE IF EXISTS `tamu`;
CREATE TABLE IF NOT EXISTS `tamu` (
  `id_tamu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `tanggal` int(11) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `instansi` text NOT NULL,
  `tujuan` text NOT NULL,
  `saran` text NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `foto` text,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `tgl_buat` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_admin`, `nama`, `email`, `foto`, `password`, `role_id`, `aktif`, `tgl_buat`) VALUES
(1, 'Kenny Perulu', 'kenny.perulu@gmail.com', 'sasando.jpg', '$2y$10$RWJDbOfcOkyujU5W93T4iOSzDF8wI8Uve53IbD0Wi552HiYgf7wMm', 1, 1, 1583991958),
(2, 'Jhun Selai', 'jhun@gmail.com', 'codeignitera.jpg', '$2y$10$ePSewpz2IKKrTZsN57ylEOtZQvlZ2tDRxy89OS.ViLvtKlrC2ALtO', 2, 1, 1583992051),
(3, 'Test', 'exmple@gmail.com', 'default.jpg', '$2y$10$/LbKNaOm4sDMjZKBf1QhA.26mQicWMH4wUvQwZaehQW37UNSgtitu', 2, 1, 1585489855);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_menu`
--

DROP TABLE IF EXISTS `user_akses_menu`;
CREATE TABLE IF NOT EXISTS `user_akses_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(28, 1, 16),
(3, 2, 2),
(27, 1, 3),
(8, 1, 2),
(29, 1, 17),
(34, 1, 18),
(31, 2, 18),
(40, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Super_Admin'),
(2, 'Admin'),
(3, 'Menu'),
(16, 'Lembaga'),
(17, 'Tentang'),
(18, 'Data'),
(19, 'Surat_Keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super_Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `url` text NOT NULL,
  `icon` text NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `aktif`) VALUES
(1, 1, 'Dashboard', 'super_admin', 'fa fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'admin', 'fa fa-fw fa-user', 1),
(33, 18, 'Penduduk', 'admin/daftarPenduduk', 'fas fa-fw fa-table', 1),
(4, 3, 'Atur Menu', 'menu', 'fas fa-fw fa-folder', 1),
(34, 19, 'Verifikasi SK', 'super_admin/verifikasiSK', 'fas fa-fw fa-user-check', 1),
(6, 3, 'Atur Submenu', 'menu/subMenu', 'fas fa-fw fa-folder-open', 1),
(25, 1, 'Role', 'super_admin/role', 'fas fa-fw fa-user-tie', 1),
(29, 1, 'Registrasi', 'super_admin/daftarNewAdmin', 'fas fa-fw fa-user-plus', 1),
(30, 16, 'Pemerintah', 'super_admin/daftarAparatPemerintah', 'fas fa-fw fa-university', 1),
(7, 16, 'BPD', 'super_admin/daftarPengurusBPD', 'fas fa-fw fa-university', 1),
(8, 16, 'LPM', 'super_admin/daftarPengurusLPM', 'fas fa-fw fa-university', 1),
(9, 16, 'PKK', 'super_admin/daftarPengurusPKK', 'fas fa-fw fa-university', 1),
(10, 16, 'Karang Taruna', 'super_admin/daftarPengurusKT', 'fas fa-fw fa-university', 1),
(31, 17, 'Berita', 'super_admin/daftarBerita', 'far fa-fw fa-newspaper', 1),
(32, 17, 'Sejarah Kades', 'super_admin/daftarKades', 'fas fa-fw fa-history', 1),
(35, 17, 'Wilayah', 'super_admin/daftarWilayah', 'fa fa-fw fa-flag', 1),
(36, 17, 'Lahan', 'super_admin/lahan', 'fas fa-map fa-fw', 1),
(37, 17, 'Saspras', 'super_admin/daftarSaspras', 'fas fa-home fa-fw', 1),
(38, 17, 'APBDesa', 'super_admin/daftarAPBDesa', 'far fa-money-bill-alt fa fw', 1),
(39, 19, 'Managemen Surat', 'super_admin/daftarSK', 'fas fa-cogs fa-fw', 1),
(40, 1, 'Data Tamu', 'Super_Admin/daftarTamu', 'fas fa-fw fa-user-tie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `tgl_buat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_apbdesa`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_apbdesa`;
CREATE TABLE IF NOT EXISTS `view_apbdesa` (
`id_apbdesa` int(11)
,`pendapatan` int(11)
,`belanja` int(11)
,`pembiayaan` int(11)
,`kas` int(11)
,`tahun` varchar(4)
,`anggaran` varchar(1)
,`ppdb` int(11)
,`ppdp` int(11)
,`pmd` int(11)
,`pkd` int(11)
,`btt` int(11)
,`pasli` int(11)
,`transfer` int(11)
,`plain` int(11)
,`Rpendapatan` bigint(13)
,`Rbelanja` bigint(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE IF NOT EXISTS `wilayah` (
  `id_wilayah` int(11) NOT NULL AUTO_INCREMENT,
  `dusun` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `rt` varchar(5) NOT NULL,
  PRIMARY KEY (`id_wilayah`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `dusun`, `rw`, `rt`) VALUES
(1, '1', '001', '001'),
(2, '1', '001', '002'),
(3, '1', '002', '003'),
(4, '1', '002', '004'),
(5, '2', '003', '005'),
(6, '2', '003', '006'),
(7, '2', '004', '007'),
(8, '2', '004', '008'),
(9, '3', '005', '009'),
(10, '3', '005', '010'),
(11, '3', '006', '011'),
(12, '3', '006', '012'),
(13, '4', '007', '013'),
(14, '4', '007', '014'),
(15, '4', '008', '015'),
(16, '4', '008', '016');

-- --------------------------------------------------------

--
-- Structure for view `view_apbdesa`
--
DROP TABLE IF EXISTS `view_apbdesa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_apbdesa`  AS  select `apbdesa`.`id_apbdesa` AS `id_apbdesa`,`apbdesa`.`pendapatan` AS `pendapatan`,`apbdesa`.`belanja` AS `belanja`,`apbdesa`.`pembiayaan` AS `pembiayaan`,`apbdesa`.`kas` AS `kas`,`apbdesa`.`tahun` AS `tahun`,`apbdesa`.`anggaran` AS `anggaran`,`bapbdesa`.`ppdb` AS `ppdb`,`bapbdesa`.`ppdp` AS `ppdp`,`bapbdesa`.`pmd` AS `pmd`,`bapbdesa`.`pkd` AS `pkd`,`bapbdesa`.`btt` AS `btt`,`papbdesa`.`pasli` AS `pasli`,`papbdesa`.`transfer` AS `transfer`,`papbdesa`.`plain` AS `plain`,((`papbdesa`.`pasli` + `papbdesa`.`transfer`) + `papbdesa`.`plain`) AS `Rpendapatan`,((((`bapbdesa`.`ppdb` + `bapbdesa`.`ppdp`) + `bapbdesa`.`pmd`) + `bapbdesa`.`pkd`) + `bapbdesa`.`btt`) AS `Rbelanja` from ((`apbdesa` join `papbdesa` on((`apbdesa`.`id_apbdesa` = `papbdesa`.`kode_apbdesa`))) join `bapbdesa` on((`apbdesa`.`id_apbdesa` = `bapbdesa`.`kode_apbdesa`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
