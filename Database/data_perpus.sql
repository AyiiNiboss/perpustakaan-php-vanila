-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2021 pada 08.56
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `nomor_induk` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','','') NOT NULL,
  `kategori` enum('siswa','guru','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `nomor_induk`, `nama`, `jk`, `kategori`) VALUES
(1, '021180084', 'Fajri', 'Laki-laki', 'siswa'),
(4, '021180082', 'Dwi', 'Laki-laki', 'siswa'),
(5, '112', 'Samsudin', 'Laki-laki', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bookingbuku`
--

CREATE TABLE `tb_bookingbuku` (
  `id_booking` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kategori` enum('siswa','guru','','') NOT NULL,
  `tgl_booking` date NOT NULL,
  `jumlah_buku` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(250) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `th_terbit` varchar(5) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `jumlah_buku` int(5) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`, `isbn`, `jumlah_buku`, `tgl_input`) VALUES
(12, 'Tekanan Darah Tinggi', 'Dr. Anna Palmer', 'Erlangga', '2007', '978-979-015-340-0', 17, '2020-09-24'),
(14, 'Menyelenggarakan Rapat', 'Pocket Mentor', 'Erlangga', '2008', '978-979-015-783-5 ', 19, '2020-09-20'),
(15, 'Top 10 NewYork', 'Eyewitness Travel', 'Erlangga', '2008', '978-1465445537', 5, '2020-09-24'),
(16, 'Balanced Scorecard', 'Robert S. Kaplan', 'Erlangga', '2000', '979-688-071-7 ', 13, '2020-09-24'),
(17, 'Pajak Daerah dan Retribusi Daerah di Indonesia', 'Kurniawan, Panca Agus Purwanto ', 'Bayumedia Publishing', '2006', '978-979-3695-20-4 ', 9, '2021-09-24'),
(18, 'Manajemen Perusahaan Koperasi : Pokok-pokok Pikiran Mengenai manajemen dan kewirausahaan koperasi', 'Hendra', 'Erlangga', '2010', '978-979-075-947-3', 9, '2020-09-24'),
(19, 'Dosa yang Membinasakan 2 ', 'Nurdin, Ali', ' Erlangga', '2003', '979-98458-8-2 ', 8, '2021-09-24'),
(20, 'Agar Layar Tetap Terkembang : Upaya Menyelamatkan Umat', 'Hafidhuddin, Didin ', 'Gema Insani Press', '2006', '979-56-0216-0 ', 7, '2020-09-24'),
(21, 'Tentang Kejadian Manusia ', 'Yusuf D.Khaldy', 'Marjan', '1993', '-', 5, '2020-09-24'),
(22, 'TCP/IP : Buku Pintar Inte', 'Purbo, Onno W ', 'PT Elex Media Komputindo', '1999', '979-20-0759-8 ', 8, '2020-09-24'),
(23, 'Leadership A To Z : A Gui', 'OToole James', 'Erlangga', '2003', '9780787946586', 11, '2020-09-24'),
(24, 'Jack Welch :ikon perusahaan yang berhasil menciptakan perusahaan paling bernilai di dunia', 'Robert Heller', 'Erlangga', '2008', '978-979-033-248-5', 11, '2020-09-24'),
(25, 'Metode penelitian survai', 'Masri Singarimbun', 'LP3ES', '1989', '979-8015-479', 15, '2020-09-24'),
(26, 'The Starbucks Experience: 5 Prinsip untuk Mengubah Hal Biasa Menjadi Luar Biasa', 'Joseph A. Michelli', 'Esensi', '2007', '9789790152984', 10, '2020-09-24'),
(27, 'Sukses Berbisnis Ritel: B', 'Richard Hammond', 'Erlangga', '2007', '9797818195 ', 15, '2020-09-24'),
(28, 'The Toyota Way: 14 Prinsip Manajemen dari perusahaan manufaktur terhebat di dunia', 'Jeffrey K. Liker', 'Erlangga', '2006', '979-781-277-0', 15, '2020-09-24'),
(29, 'Key Management Ratios :Rasio-rasio Manajemen Penting Penggerak dan Pengendali Bisnis', 'Walsh, Ciaran', 'Erlangga', '2003', '9797410900', 16, '2020-09-24'),
(30, 'Public relations dalam praktik / editor', 'Anne GREGORY', 'Erlangga', '2004', '9797419088', 17, '2020-09-24'),
(31, '\"HEMP \" The Highly Effective Marketing Plan', 'PETER KNIGHT', 'Erlangga', '2005', '9789797818371', 20, '2020-09-24'),
(32, 'Fool-proof marketing', 'Robert W. Bly ', 'Erlangga', '2003', '979-741-008-0 ', 17, '2020-09-24'),
(33, 'How To Negotiate: Teknik Sukses Bernegosiasi', 'Ann Jackman', 'Erlangga', '2005', '9789797811518', 6, '2020-09-24'),
(34, 'Hubungan media yang efektif', 'Michael BLAND', 'Erlangga', '2001', '9796889765', 8, '2020-09-24'),
(35, 'team building kiat membangun tim handal', 'Robert B. maddux', 'Erlangga', '2001', '9789800000000', 9, '2020-09-24'),
(36, 'Brand Operation', 'Hermawan Kartajaya', 'Erlangga', '2008', '978-979-075-​262-7', 12, '2020-04-24'),
(37, 'Kebenaran tentang menyampaikan maksud anda', 'Lonnie pacelli ', 'Literata Lintas', '2008', '978-979-015-509-1', 22, '2020-09-24'),
(38, 'Leadpreneurship', 'A.B. Susanto', 'Erlangga', '2009', '978-979-033-522-6', 26, '2020-09-24'),
(39, 'Manifesto Fiqih Baru', 'AlBanna, Jamal ', 'Erlangga', '2008', '978-979-033-256-0 ', 17, '2020-04-23'),
(40, 'Instant Creativity', 'Brian Clegg, dan Paul Birch ', 'Erlangga', '2006', '9789790150850', 6, '2020-09-24'),
(41, 'Consumer insights via ethnography', 'Amalia E. Maulana', 'Erlangga', '2009', '978-979-033-823-4', 18, '2020-09-24'),
(42, 'Tabel Referensi Lengkap', 'Cessy Triani, Teguh Irianto', 'Erlangga', '2003', '65-01-065-9 ', 26, '2020-09-24'),
(43, 'LATERAL MARKETING', 'Kotler, Philip', 'Erlangga', '2006', '9797411192', 10, '2020-09-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kategori` enum('siswa','guru','','') NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_pinjam`, `nomor_induk`, `judul_buku`, `nama`, `kategori`, `tgl_pinjam`) VALUES
(12, '021180084', 'Tekanan Darah Tinggi', 'Fajri', 'siswa', '2021-08-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kategori` enum('siswa','guru','','') NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah_buku` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pengembalian`, `id_peminjam`, `nomor_induk`, `judul_buku`, `nama`, `kategori`, `tgl_kembali`, `jumlah_buku`) VALUES
(21, 23, '021180084', 'Tekanan Darah Tinggi', 'Fajri', 'siswa', '2021-08-16', '1'),
(22, 24, '021180084', 'Tekanan Darah Tinggi', 'Fajri', 'siswa', '2021-08-16', '1');

--
-- Trigger `tb_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `tambah_buku` AFTER INSERT ON `tb_pengembalian` FOR EACH ROW BEGIN
	UPDATE tb_buku SET jumlah_buku=jumlah_buku + NEW.jumlah_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('Administrator','Kepala Sekolah','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', 'Administrator'),
(5, 'kepala sekolah', 'kepalasekolah', '1', 'Kepala Sekolah'),
(6, 'Fajri', 'admin', '2', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_peminjam` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `judul_buku` varchar(500) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kategori` enum('siswa','guru','','') NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah_buku` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `asasd` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE tb_buku SET jumlah_buku=jumlah_buku - NEW.jumlah_buku;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bookingbuku`
--
ALTER TABLE `tb_bookingbuku`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_bookingbuku`
--
ALTER TABLE `tb_bookingbuku`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
