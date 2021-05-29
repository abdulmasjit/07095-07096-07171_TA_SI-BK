-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Bulan Mei 2021 pada 05.26
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
  `status` varchar(1) DEFAULT NULL,
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
  `status` varchar(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `jenkel`, `no_hp`, `password`, `status`, `alamat`) VALUES
(1, '558899', 'Ahmad Maulana', 'L', '085334545054', 'e10adc3949ba59abbe56e057f20f883e', '1', 'Surabaya');

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
  `status` varchar(1) DEFAULT NULL,
  `id_walikelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `daya_tampung`, `status`, `id_walikelas`) VALUES
(1, '7 A', 30, '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_kategori`, `point`, `status`) VALUES
(1, 'membawa senjata tajam', 3, 10, '1'),
(2, 'berkelahi dilingkuangan sekolah', 5, 10, '1'),
(3, 'membawa buku dan kaset terlarang', 8, 25, '1'),
(4, 'merokok di kamar mandi sekolah', 2, 15, '1'),
(5, 'Tawuran antar sekolah', 5, 50, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran_siswa`
--

CREATE TABLE `pelanggaran_siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tgl_melanggar` date NOT NULL,
  `waktu_input` datetime NOT NULL,
  `tempat` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `nama_siswa` varchar(225) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` varchar(1) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenkel`, `alamat`, `no_hp`, `password`, `status`, `id_kelas`) VALUES
(1, '202101', 'Adira Sahara', 'P', 'Surabaya', '085334545054', 'e10adc3949ba59abbe56e057f20f883e', '1', 1);

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
  ADD KEY `fk_pelanggaran` (`id_pelanggaran`),
  ADD KEY `fk_guru` (`id_guru`);

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
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
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
