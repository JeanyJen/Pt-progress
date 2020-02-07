-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2020 pada 10.47
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `nip_karyawan` varchar(15) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `bagian_karyawan` varchar(25) NOT NULL,
  `jabatan_karyawan` varchar(25) NOT NULL,
  `tgl_msk_karyawan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`nip_karyawan`, `nama_karyawan`, `bagian_karyawan`, `jabatan_karyawan`, `tgl_msk_karyawan`) VALUES
('N1911001', 'Mursalat', 'Marketing', 'Marketing', '2019-11-08'),
('N1911002', 'Jenny Januarini', 'Administrasi Marketing Se', 'Manager', '2019-02-01'),
('N1911003', 'Dwi Susanto ', 'MM', 'mm', '0000-00-00'),
('N1911004', 'sri endah', 'Marketing', 'Marketing', '0000-00-00'),
('N2001000', 'Lisnawati', 'Marketing ', 'Spv', '2012-01-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_klien`
--

CREATE TABLE `tabel_klien` (
  `id_klien` varchar(15) NOT NULL,
  `nama_klien` varchar(50) NOT NULL,
  `alamat_klien` varchar(100) NOT NULL,
  `tlp_klien` varchar(15) NOT NULL,
  `email_klien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_klien`
--

INSERT INTO `tabel_klien` (`id_klien`, `nama_klien`, `alamat_klien`, `tlp_klien`, `email_klien`) VALUES
('C20000', 'PT Novell Pharmaceutical Labs', 'Pos Pengumben ', '021-5578931', 'news.paper@novellpharm.com'),
('C20001', 'PT.Internita utama ', 'bintaro sektor.7, tangerang selatan ', '021-89247483', 'iu@dexagroup.com'),
('C20002', 'Aeon Credit Indonesia', 'Tower 2 lt.3a jakarta selatan ', '021 98765432', 'aeon.indonesia@cc.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_media`
--

CREATE TABLE `tabel_media` (
  `id_media` varchar(15) NOT NULL,
  `nama_media` varchar(50) NOT NULL,
  `alamat_media` varchar(200) NOT NULL,
  `tlp_media` varchar(15) NOT NULL,
  `email_media` varchar(50) NOT NULL,
  `nama_rekening_media` varchar(50) NOT NULL,
  `account_media` int(20) NOT NULL,
  `bank_media` varchar(20) NOT NULL,
  `cabang_media` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_media`
--

INSERT INTO `tabel_media` (`id_media`, `nama_media`, `alamat_media`, `tlp_media`, `email_media`, `nama_rekening_media`, `account_media`, `bank_media`, `cabang_media`) VALUES
('M20000', 'Bisnis Indonesia (PT. Jurnalindo Aksara Grafika)', 'Wisma Bisnis Indonesia Jalan K.H. Mas Mansyur Kav. 12A Karet Tengsin, Tanah Abang Jakarta Pusat', '(021) 57901023', 'helpdesk@bisnis,indonesia.com', 'Jurnalindo Aksara Grafika)', 2147483647, 'Bca ', 'KCP Jakarta Pusat'),
('M20001', 'PT. Fajar National Network', 'Jalan Kebayoran Lama, Pal 7. Nomor 17, Jakarta Selatan.', '', 'Fajar.co.id', '', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_so`
--

CREATE TABLE `tabel_so` (
  `no_so` varchar(50) NOT NULL,
  `id_klien` varchar(15) NOT NULL,
  `id_media` varchar(15) NOT NULL,
  `no_invoice_penj` varchar(20) NOT NULL,
  `nip_karyawan` varchar(15) NOT NULL,
  `kol` int(128) NOT NULL,
  `mmk` int(128) NOT NULL,
  `price` int(128) NOT NULL,
  `gross` int(128) DEFAULT NULL,
  `disc` int(128) NOT NULL,
  `nett` int(128) DEFAULT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_so`
--

INSERT INTO `tabel_so` (`no_so`, `id_klien`, `id_media`, `no_invoice_penj`, `nip_karyawan`, `kol`, `mmk`, `price`, `gross`, `disc`, `nett`, `status`) VALUES
('12', 'C20000', 'M20000', 'Inv/2002/007', 'marketing', 1, 200, 3000, 600000, 40, 360000, '0'),
('45', 'C20000', 'M20001', 'Inv/2002/007', 'manager', 1, 1, 40000, 40000, 10, 36000, '0'),
('678', 'C20002', 'M20000', 'Inv/2002/006', 'manager', 1, 1, 100000, 100000, 10, 90000, '0'),
('78', 'C20002', 'M20001', 'Inv/2002/006', 'manager', 1, 1, 1, 1, 0, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pembayaran`
--

CREATE TABLE `transaksi_pembayaran` (
  `no_invoice_pemb` varchar(20) NOT NULL,
  `id_media` varchar(6) NOT NULL,
  `id_klien` varchar(6) NOT NULL,
  `tanggal_inv_pemb` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `kol` int(128) NOT NULL,
  `mmk` int(128) NOT NULL,
  `price` int(128) NOT NULL,
  `terhutang` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_pembayaran`
--

INSERT INTO `transaksi_pembayaran` (`no_invoice_pemb`, `id_media`, `id_klien`, `tanggal_inv_pemb`, `kol`, `mmk`, `price`, `terhutang`) VALUES
('1', '', '', '2020-02-07 09:17:18.748072', 1, 1, 1, 0),
('12', '', '', '2020-02-07 09:05:11.948469', 1, 1, 2000, 0),
('13', '', '', '2020-02-07 09:07:37.520195', 1, 1, 1000, 0),
('15', '', '', '2020-02-07 09:11:43.988686', 1, 1, 20, 0),
('19', '', '', '2020-02-07 09:12:56.250202', 1, 1, 20, 0),
('77', '', '', '2020-02-07 09:21:58.107631', 7, 7, 5, 0),
('89', '', '', '2020-02-07 09:32:22.924217', 1, 1, 1, 1),
('9', '', '', '2020-02-07 09:31:25.176759', 9, 9, 9, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pemesanan`
--

CREATE TABLE `transaksi_pemesanan` (
  `no_invoice_penj` varchar(20) NOT NULL,
  `tgl_invoice_penj` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `id_klien` varchar(6) NOT NULL,
  `nip_karyawan` varchar(15) NOT NULL,
  `no_so` varchar(25) NOT NULL,
  `id_media` varchar(6) NOT NULL,
  `metode_pemb` char(2) NOT NULL,
  `uang_muka` int(128) NOT NULL,
  `sisa_bayar` int(128) NOT NULL,
  `bayar` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_pemesanan`
--

INSERT INTO `transaksi_pemesanan` (`no_invoice_penj`, `tgl_invoice_penj`, `id_klien`, `nip_karyawan`, `no_so`, `id_media`, `metode_pemb`, `uang_muka`, `sisa_bayar`, `bayar`) VALUES
('Inv/2002/000', '2020-02-03 14:40:19.773276', 'C20000', 'marketing', '0', 'M20000', '0', 0, 0, 0),
('Inv/2002/001', '2020-02-03 14:42:03.637078', 'C20000', 'marketing', '0', 'M20000', '1', 120000, 420000, 0),
('Inv/2002/002', '2020-02-03 14:48:22.336046', 'C20000', 'marketing', '0', 'M20000', '0', 0, 0, 0),
('Inv/2002/003', '2020-02-05 07:53:26.969549', 'C20000', 'marketing', '0', 'M20000', '0', 0, 0, 0),
('Inv/2002/004', '2020-02-05 07:53:41.394506', 'C20001', '', '0', '', '0', 0, 0, 0),
('Inv/2002/005', '2020-02-05 09:29:28.813661', 'C20000', 'marketing', '0', 'M20000', '0', 0, 0, 0),
('Inv/2002/006', '2020-02-07 09:36:38.782868', 'C20002', 'manager', '0', 'M20001', '0', 0, 0, 0),
('Inv/2002/007', '2020-02-07 09:37:05.960136', 'C20000', 'manager', '0', 'M20001', '1', 120000, 276000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'finance', '123', '4'),
(2, 'endah', '123', 'marketing'),
(3, 'manager', '123', 'manager'),
(4, 'jenny', '123', 'marketing');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`nip_karyawan`);

--
-- Indeks untuk tabel `tabel_klien`
--
ALTER TABLE `tabel_klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indeks untuk tabel `tabel_media`
--
ALTER TABLE `tabel_media`
  ADD PRIMARY KEY (`id_media`);

--
-- Indeks untuk tabel `tabel_so`
--
ALTER TABLE `tabel_so`
  ADD PRIMARY KEY (`no_so`) USING BTREE;

--
-- Indeks untuk tabel `transaksi_pembayaran`
--
ALTER TABLE `transaksi_pembayaran`
  ADD PRIMARY KEY (`no_invoice_pemb`);

--
-- Indeks untuk tabel `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  ADD PRIMARY KEY (`no_invoice_penj`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
