-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Mei 2018 pada 07.24
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(8) DEFAULT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'user', 'user', 'user123'),
(2, 'admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galery`
--

CREATE TABLE `tb_galery` (
  `id_galery` int(3) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `sts_post` enum('Y','T') DEFAULT NULL,
  `tgl_post` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galery`
--

INSERT INTO `tb_galery` (`id_galery`, `keterangan`, `gambar`, `sts_post`, `tgl_post`) VALUES
(1, 'gereja', 'IMG-20171201-WA0001.jpeg', 'Y', '2018-05-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `pim_ibadah` varchar(20) NOT NULL,
  `id_rayon` int(11) DEFAULT NULL,
  `tem_ibadah` varchar(50) NOT NULL,
  `tgl_ibadah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jemaat`
--

CREATE TABLE `tb_jemaat` (
  `id_jemaat` int(11) NOT NULL,
  `KK` varchar(50) NOT NULL,
  `mejelis` enum('YA','TIDAK') DEFAULT NULL,
  `id_KK` int(11) DEFAULT NULL,
  `nama_jemaat` varchar(50) NOT NULL,
  `JK` enum('L','P') DEFAULT NULL,
  `Tem_Lahir` varchar(25) NOT NULL,
  `Tgl_Lahir` date DEFAULT NULL,
  `Pendidikan` varchar(25) DEFAULT NULL,
  `Pekerjaan` char(25) DEFAULT NULL,
  `id_rayon` int(11) DEFAULT NULL,
  `Status` enum('HIDUP','MENINGGAL') DEFAULT NULL,
  `sts_nikah` enum('Menikah','Belum Menikah') DEFAULT NULL,
  `sts_sidi` enum('Sidi','Belum Sidi') DEFAULT NULL,
  `sts_baptis` enum('Baptis','Belum Baptis') DEFAULT NULL,
  `alamat_jemaat` varchar(50) DEFAULT NULL,
  `no_hp` text NOT NULL,
  `Keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jemaat`
--

INSERT INTO `tb_jemaat` (`id_jemaat`, `KK`, `mejelis`, `id_KK`, `nama_jemaat`, `JK`, `Tem_Lahir`, `Tgl_Lahir`, `Pendidikan`, `Pekerjaan`, `id_rayon`, `Status`, `sts_nikah`, `sts_sidi`, `sts_baptis`, `alamat_jemaat`, `no_hp`, `Keterangan`) VALUES
(1, 'SUAMI', 'YA', 1, 'test', 'L', 'kupang', '2018-05-01', 'S1', 'PNS', 1, 'HIDUP', 'Menikah', 'Sidi', 'Baptis', 'OEBUFU', '0', 'TEST');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kepalai`
--

CREATE TABLE `tb_kepalai` (
  `id_KK` int(11) NOT NULL,
  `id_jemaat` int(11) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kepalai`
--

INSERT INTO `tb_kepalai` (`id_KK`, `id_jemaat`, `keterangan`) VALUES
(1, 1, 'SUKSES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelayanan`
--

CREATE TABLE `tb_pelayanan` (
  `id_majelis` int(11) NOT NULL,
  `id_jemaat` int(11) DEFAULT NULL,
  `Pengurus_gereja` varchar(50) DEFAULT NULL,
  `Pengurus_rayon` enum('KETUA KOORDINATOR RAYON','ANGGOTA KOORDINATOR RAYON') DEFAULT NULL,
  `Jabatan` enum('PENDETA','PENATUA','DIAKEN','PENGAJAR') DEFAULT NULL,
  `Periode` varchar(9) DEFAULT NULL,
  `Keterangan` text,
  `sts_aktif` enum('aktif','tidak aktif') NOT NULL,
  `tgl_aktif` text NOT NULL,
  `tgl_vakum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id_peng` int(11) NOT NULL,
  `judul_peng` varchar(50) NOT NULL,
  `isi_peng` text,
  `tgl_peng` date DEFAULT NULL,
  `sts_peng` enum('Y','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id_peng`, `judul_peng`, `isi_peng`, `tgl_peng`, `sts_peng`) VALUES
(1, 'kerja bakti', 'erhyvrtrftgfdccjfiguyhgf', '2018-05-03', 'Y'),
(2, 'gotong royong', 'frthvyuvtrdvrttfghnvgfdgjbhvtrfjhgff', '2018-05-01', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rayon`
--

CREATE TABLE `tb_rayon` (
  `id_rayon` int(11) NOT NULL,
  `nama_rayon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rayon`
--

INSERT INTO `tb_rayon` (`id_rayon`, `nama_rayon`) VALUES
(1, 'Rayon 1'),
(2, 'Rayon 2'),
(3, 'Rayon 3'),
(4, 'Rayon 4'),
(5, 'Rayon 5'),
(6, 'Rayon 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_renungan`
--

CREATE TABLE `tb_renungan` (
  `id_renungan` int(11) NOT NULL,
  `jns_renungan` varchar(30) NOT NULL,
  `jdl_renungan` varchar(30) NOT NULL,
  `tgl_post` date DEFAULT NULL,
  `sts_renungan` enum('Y','T') DEFAULT NULL,
  `isi_renungan` text,
  `id_admin` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_renungan`
--

INSERT INTO `tb_renungan` (`id_renungan`, `jns_renungan`, `jdl_renungan`, `tgl_post`, `sts_renungan`, `isi_renungan`, `id_admin`) VALUES
(1, 'kebaktian', 'musuh', '2018-05-03', 'Y', 'jhferjewfrgbfdfvfegrgf', 1),
(2, 'Harian', 'sgthr', '2018-05-02', 'Y', 'kdferhhvtrtfvtrh', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_galery`
--
ALTER TABLE `tb_galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_rayon` (`id_rayon`);

--
-- Indexes for table `tb_jemaat`
--
ALTER TABLE `tb_jemaat`
  ADD PRIMARY KEY (`id_jemaat`),
  ADD KEY `id_KK` (`id_KK`),
  ADD KEY `id_rayon` (`id_rayon`);

--
-- Indexes for table `tb_kepalai`
--
ALTER TABLE `tb_kepalai`
  ADD PRIMARY KEY (`id_KK`),
  ADD KEY `id_jemaat` (`id_jemaat`);

--
-- Indexes for table `tb_pelayanan`
--
ALTER TABLE `tb_pelayanan`
  ADD PRIMARY KEY (`id_majelis`),
  ADD KEY `id_jemaat` (`id_jemaat`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id_peng`);

--
-- Indexes for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Indexes for table `tb_renungan`
--
ALTER TABLE `tb_renungan`
  ADD PRIMARY KEY (`id_renungan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_rayon`) REFERENCES `tb_rayon` (`id_rayon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_renungan`
--
ALTER TABLE `tb_renungan`
  ADD CONSTRAINT `tb_renungan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
