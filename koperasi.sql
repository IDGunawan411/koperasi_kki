-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2020 pada 06.01
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `ID_Anggota` varchar(20) NOT NULL,
  `ID_Tabungan` varchar(20) NOT NULL,
  `ID_User` varchar(20) NOT NULL,
  `Nama_Anggota` varchar(100) NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Tempat_Lahir` varchar(20) NOT NULL,
  `Tanggal_Lahir` varchar(20) NOT NULL,
  `Pendidikan_Terakhir` varchar(20) NOT NULL,
  `Status_Perkawinan` varchar(20) NOT NULL,
  `Simpanan_Pokok` varchar(20) NOT NULL,
  `No_KTP` varchar(20) NOT NULL,
  `No_KK` varchar(20) NOT NULL,
  `No_Telp` varchar(20) NOT NULL,
  `No_Rek` varchar(20) NOT NULL,
  `Tanggal_Entri` varchar(20) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Status_Aktif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`ID_Anggota`, `ID_Tabungan`, `ID_User`, `Nama_Anggota`, `Jenis_Kelamin`, `Tempat_Lahir`, `Tanggal_Lahir`, `Pendidikan_Terakhir`, `Status_Perkawinan`, `Simpanan_Pokok`, `No_KTP`, `No_KK`, `No_Telp`, `No_Rek`, `Tanggal_Entri`, `Alamat`, `Status_Aktif`) VALUES
('KSA250001', 'KST200001', 'KSP200002', 'Bagas Widiyanto', 'Laki-Laki', 'Klaten', '2020-11-17', 'S1', 'Belum Menikah', '100000', '32010111099990009', '32010111099991111', '08965664652', '123123543534', '2020-11-17', 'Cibinong', 'Aktif'),
('KSA250002', 'KST200002', 'KSP200005', 'Gunawan Prasetyo', 'Laki-Laki', 'Sukoharjo', '11/24/2020 12:00 AM', 'D3', 'Belum Menikah', '100000', '180441180015', '180441180015', '082249495157', '1231958726', '2020-11-24', 'CIbinong', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `ID_Angsuran` varchar(20) NOT NULL,
  `ID_Pinjaman` varchar(20) NOT NULL,
  `Angsuran` varchar(20) NOT NULL,
  `Besar_Angsuran` varchar(20) NOT NULL,
  `Denda` varchar(20) NOT NULL,
  `Telat_Denda` varchar(20) NOT NULL,
  `ID_Anggota` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(20) NOT NULL,
  `Jatuh_Tempo` varchar(20) NOT NULL,
  `Status_Angsuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`ID_Angsuran`, `ID_Pinjaman`, `Angsuran`, `Besar_Angsuran`, `Denda`, `Telat_Denda`, `ID_Anggota`, `Tgl_Entri`, `Jatuh_Tempo`, `Status_Angsuran`) VALUES
('AS0001', 'P210001', 'AS KE-01', '51000', '', '', 'KSA250001', '', '2020-12-23', 'Belum Lunas'),
('AS0002', 'P210001', 'AS KE-02', '51000', '', '', 'KSA250001', '', '2021-01-23', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `ID_History` int(11) NOT NULL,
  `ID_Tabungan` varchar(255) NOT NULL,
  `Jenis_History` varchar(255) NOT NULL,
  `Jumlah_History` varchar(255) NOT NULL,
  `Saldo_Terakhir` varchar(255) NOT NULL,
  `Waktu_History` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`ID_History`, `ID_Tabungan`, `Jenis_History`, `Jumlah_History`, `Saldo_Terakhir`, `Waktu_History`) VALUES
(77, 'KST200001', 'Simpanan Pokok', '100000', '100000', '2020-11-17'),
(78, 'KST200002', 'Simpanan Pokok', '100000', '100000', '2020-11-17'),
(79, 'KST200003', 'Simpanan Pokok', '100000', '100000', '2020-10-17'),
(81, 'KST200001', 'Simpanan Sukarela', '1000000000000', '1000000100000', '2020-11-17'),
(82, 'KST200002', 'Simpanan Wajib', '100000000', '100100000', '2020-11-17'),
(83, 'KST200003', 'Simpanan Pokok', '100000', '100000', '2020-11-17'),
(84, 'KST200001', 'Simpanan Wajib', '100000', '1000000180000', '2020-11-19'),
(85, 'KST200001', 'Simpanan Wajib', '99977', '299977', '2020-11-20'),
(86, 'KST200001', 'Simpanan Sukarela', '100000', '400000', '2020-11-20'),
(87, 'KST200001', 'Simpanan Sukarela', '100000', '400000', '2020-11-20'),
(88, 'KST200001', 'Simpanan Sukarela', '100000', '400000', '2020-11-20'),
(89, 'KST200002', 'Simpanan Pokok', '100000', '100000', '2020-11-24'),
(90, 'KST200002', 'Simpanan Wajib', '100000', '200000', '2020-11-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pinjaman`
--

CREATE TABLE `jenis_pinjaman` (
  `ID_Jenis_Pinjaman` varchar(20) NOT NULL,
  `Nama_Pinjaman` varchar(100) NOT NULL,
  `Max_Pinjaman` varchar(20) NOT NULL,
  `Bunga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pinjaman`
--

INSERT INTO `jenis_pinjaman` (`ID_Jenis_Pinjaman`, `Nama_Pinjaman`, `Max_Pinjaman`, `Bunga`) VALUES
('JP001', 'Pinjaman Kesehatan', '200000', '1'),
('JS290001', 'Pinjaman Haji', '10000000', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `ID_Jenis_Simpanan` varchar(20) NOT NULL,
  `Nama_Simpanan` varchar(100) NOT NULL,
  `Besar_Simpanan` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`ID_Jenis_Simpanan`, `Nama_Simpanan`, `Besar_Simpanan`, `Tgl_Entri`) VALUES
('JS001', 'Simpanan Wajib', '10000', '2020-10-10'),
('JS002', 'Simpanan Sukarela', '0', '2020-10-10'),
('JS290001', 'Sitaman', '10000000', '2020-11-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `ID_Konfigurasi` int(11) NOT NULL,
  `Nama_Konfigurasi` varchar(50) NOT NULL,
  `Isi_Konfigurasi` longtext NOT NULL,
  `Jenis_Konfigurasi` varchar(50) NOT NULL,
  `Tanggal_Ubah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`ID_Konfigurasi`, `Nama_Konfigurasi`, `Isi_Konfigurasi`, `Jenis_Konfigurasi`, `Tanggal_Ubah`) VALUES
(1, 'Simpanan Wajib', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum mollitia amet cum rerum vitae ad officia molestias! Aliquam necessitatibus asperiores aspernatur mollitia quas nihil animi provident, dolore, harum alias omnis.', 'Simpanan', '12-11-2020'),
(2, 'Simpanan Sukarela', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet distinctio excepturi eos quia illum nobis pariatur minima neque autem aliquid, architecto optio dolore fugiat quam at cumque nam similique hic.', 'Simpanan', '12-11-2020'),
(3, 'Pinjaman Rumah Tangga', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet distinctio excepturi eos quia illum nobis pariatur minima neque autem aliquid, architecto optio dolore fugiat quam at cumque nam similique hic.', 'Pinjaman', '12-11-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan`
--

CREATE TABLE `penarikan` (
  `ID_Penarikan` varchar(20) NOT NULL,
  `ID_Tabungan` varchar(20) NOT NULL,
  `Besar_Penarikan` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(20) NOT NULL,
  `Status_Penarikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penarikan`
--

INSERT INTO `penarikan` (`ID_Penarikan`, `ID_Tabungan`, `Besar_Penarikan`, `Tgl_Entri`, `Status_Penarikan`) VALUES
('P190001', 'KST200001', '20000', '2020-11-24', 'Menunggu'),
('P190002', 'KST200001', '50000', '2020-11-24', 'Menunggu'),
('P190003', 'KST200002', '50000', '2020-11-24', 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `ID_Pinjaman` varchar(20) NOT NULL,
  `ID_Anggota` varchar(20) NOT NULL,
  `Nama_Pinjaman` varchar(50) NOT NULL,
  `Besar_Pinjaman` varchar(20) NOT NULL,
  `Besar_Angsuran` varchar(20) NOT NULL,
  `Lama_Angsuran` varchar(20) NOT NULL,
  `Bunga` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(20) NOT NULL,
  `Tgl_Konfirmasi` varchar(20) NOT NULL,
  `Jatuh_Tempo` varchar(20) NOT NULL,
  `Status_Pinjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`ID_Pinjaman`, `ID_Anggota`, `Nama_Pinjaman`, `Besar_Pinjaman`, `Besar_Angsuran`, `Lama_Angsuran`, `Bunga`, `Tgl_Entri`, `Tgl_Konfirmasi`, `Jatuh_Tempo`, `Status_Pinjaman`) VALUES
('P210001', 'KSA250001', 'Pinjaman Kesehatan', '100000', '51000', '2', '1', '2020-11-23', '', '2020-11-23', 'Konfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan`
--

CREATE TABLE `simpanan` (
  `ID_Simpanan` varchar(20) NOT NULL,
  `ID_Tabungan` varchar(20) NOT NULL,
  `Jenis_Simpanan` varchar(20) NOT NULL,
  `Tanggal_Transaksi` varchar(20) NOT NULL,
  `Saldo_Simpanan` varchar(20) NOT NULL,
  `Status_Simpanan` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `simpanan`
--

INSERT INTO `simpanan` (`ID_Simpanan`, `ID_Tabungan`, `Jenis_Simpanan`, `Tanggal_Transaksi`, `Saldo_Simpanan`, `Status_Simpanan`, `gambar`) VALUES
('KSS290002', 'KST200001', 'Simpanan Wajib', '2020-11-19', '100000', 'Menunggu', '5fb693ed23048.png'),
('KSS290003', 'KST200001', 'Simpanan Wajib', '2020-11-20', '100000', 'Menunggu', '5fb724b9bc9c3.png'),
('KSS290004', 'KST200001', 'Simpanan Sukarela', '2020-11-20', '100000', 'Menunggu', '5fb72f3347e8a.png'),
('KSS290005', 'KST200002', 'Simpanan Wajib', '2020-11-24', '100000', 'Menunggu', '5fbcbe629462a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `ID_Tabungan` varchar(20) NOT NULL,
  `ID_Anggota` varchar(20) NOT NULL,
  `Tgl_Mulai` varchar(20) NOT NULL,
  `Besar_Tabungan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`ID_Tabungan`, `ID_Anggota`, `Tgl_Mulai`, `Besar_Tabungan`) VALUES
('KST200001', 'KSA250001', '2020-11-17', '100000'),
('KST200002', 'KSA250002', '2020-11-17', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_User` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_User`, `Username`, `Password`, `Nama_Lengkap`, `Email`, `Level`) VALUES
('KSP200001', 'admin123', '123', 'admin', 'admin@gmail.com', 'Petugas'),
('KSP200002', 'bagas', '123', 'Bagas Widiyanto', 'bagaswidiyanto1@gmail.com', 'Anggota'),
('KSP200003', '123', '123', 'SI anjing', 'hendrix@gamfa', 'Anggota'),
('KSP200004', '1234', '1234', 'Bagas Widiyantosdadasdasd', 'chandra', 'Anggota'),
('KSP200005', 'gunawan', '123', 'Gunawan Prasetyo', 'gunawanprasetyo313@gmail.com', 'Anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_Anggota`);

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`ID_Angsuran`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID_History`);

--
-- Indeks untuk tabel `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  ADD PRIMARY KEY (`ID_Jenis_Pinjaman`);

--
-- Indeks untuk tabel `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`ID_Jenis_Simpanan`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`ID_Konfigurasi`);

--
-- Indeks untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`ID_Penarikan`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`ID_Pinjaman`);

--
-- Indeks untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`ID_Simpanan`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`ID_Tabungan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `ID_History` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `ID_Konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
