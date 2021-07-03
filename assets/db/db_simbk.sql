-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Jul 2021 pada 15.53
-- Versi server: 10.5.9-MariaDB-log
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simbk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1',
  `alamat` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `jenkel` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `no_hp`, `status`, `alamat`, `username`, `password`, `jenkel`) VALUES
(1, 'Muhammad Alkautsar', '085334545054', '1', 'Surabaya', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(225) DEFAULT NULL,
  `jenkel` varchar(1) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1',
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `jenkel`, `no_hp`, `password`, `status`, `alamat`) VALUES
(1, '558899', 'Ahmad Maulana', 'L', '085334545054', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Surabaya'),
(2, '443355', 'Bariq Qusoyyi', 'L', '085334545058', '123456', '1', 'Surabaya'),
(3, '227716', 'Dwi Susilowati', 'P', '085334545123', '123456', '1', 'Bojonegoro'),
(4, '778814', 'Vintya Yuni', 'L', '085334545987', '123456', '1', 'Malang'),
(5, '998817', 'Ahmad Syamsudin', 'L', '085667151678', '123456', '1', 'Trenggalek'),
(6, '778899', 'Dwi Cahyono', 'L', '085334545054', '123456', '1', 'Jl. Brigjend Katamso No.06, Ngeni, Kepuhkiriman, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'ketertiban'),
(2, 'rokok'),
(3, 'senjata'),
(4, 'obat atau minuman terlarang'),
(5, 'perkelahian'),
(6, 'keterlambatan'),
(7, 'kehadiran'),
(8, 'membawa buku dan kaset terlarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `daya_tampung` int(11) DEFAULT NULL,
  `id_walikelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `daya_tampung`, `id_walikelas`) VALUES
(1, '10 IPA A', 30, 1),
(2, '10 IPA B', 30, 3),
(3, '10 IPA C', 30, 4),
(4, '11 IPA A', 30, 5),
(5, '11 IPA B', 30, 2),
(11, '11 IPA C', 30, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_kategori`, `point`) VALUES
(1, 'membawa senjata tajam', 3, 10),
(2, 'berkelahi dilingkuangan sekolah', 5, 10),
(3, 'membawa buku dan kaset terlarang', 8, 25),
(4, 'merokok di kamar dalam sekolah', 2, 15),
(5, 'Tawuran antar sekolah', 5, 50),
(6, 'Sering terlambat masuk kelas', 6, 5),
(7, 'Bolos sekolah', 7, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran_siswa`
--

CREATE TABLE `pelanggaran_siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL,
  `tgl_melanggar` date DEFAULT NULL,
  `waktu_input` datetime DEFAULT NULL,
  `tempat` varchar(225) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggaran_siswa`
--

INSERT INTO `pelanggaran_siswa` (`id`, `id_siswa`, `id_pelanggaran`, `tgl_melanggar`, `waktu_input`, `tempat`, `keterangan`) VALUES
(1, 5, 7, '2021-06-05', '2021-06-05 05:59:29', 'Sekolah', '-'),
(2, 4, 5, '2021-06-06', '2021-06-06 06:00:42', 'Depan Sekolah STM', 'Tawuran dengan anak STM'),
(3, 4, 2, '2021-06-09', '2021-06-09 06:02:34', 'Dibelakang sekolah', 'Berkelahi dengan kakak kelas'),
(4, 1, 1, '2021-06-09', '2021-06-09 06:03:40', 'Dikelas', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(12) DEFAULT NULL,
  `nama_siswa` varchar(225) DEFAULT NULL,
  `jenkel` varchar(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1',
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenkel`, `alamat`, `no_hp`, `password`, `status`, `id_kelas`) VALUES
(1, '20210401', 'Adira Sahara', 'P', 'Surabaya', '085334545054', 'e10adc3949ba59abbe56e057f20f883e', '1', 1),
(2, '20190801', 'Annisa Najwa ', 'P', 'Gunung Anyar, Surabaya', '081355688200', '123456', '1', 2),
(3, '20210901', 'Masjit Subekti', 'L', 'Surabaya', '081355688201', '123456', '1', 1),
(4, '20180415', 'Aswar Annas', 'L', 'Malang', '085334545632', '123456', '1', 1),
(5, '20160201', 'Syifa Viranda', 'P', 'Jakarta', '081355688441', '123456', '1', 2),
(11, '20210120', 'Dian Indah Kemala', 'P', 'Kabupaten Kediri', '085334545054', '123456', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas_FK` (`id_walikelas`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_siswa` (`id_siswa`),
  ADD KEY `fk_pelanggaran` (`id_pelanggaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `siswa_FK` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_FK` FOREIGN KEY (`id_walikelas`) REFERENCES `guru` (`id_guru`);

--
-- Ketidakleluasaan untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `kategori_fk` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD CONSTRAINT `fk_pelanggaran` FOREIGN KEY (`id_pelanggaran`) REFERENCES `pelanggaran` (`id_pelanggaran`),
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_FK` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
