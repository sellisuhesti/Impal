-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2019 pada 08.04
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `level` enum('Admin','Pemilik','Karyawan','User') NOT NULL,
  `saldo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nokamar` int(11) NOT NULL,
  `tipe_kamar` int(11) NOT NULL,
  `nama_checkin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `e_tiket`
--

CREATE TABLE `e_tiket` (
  `id_etiket` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `tgl_checkin` datetime NOT NULL,
  `tgl_pemesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `e_tiket`
--

INSERT INTO `e_tiket` (`id_etiket`, `id_hotel`, `id_pembayaran`, `nama_hotel`, `harga`, `tgl_checkin`, `tgl_pemesanan`) VALUES
(909090909, 1234567890, 1234567890, 'Novotel Bandung', 100000, '2019-09-21 00:00:00', '2019-09-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `rating` varchar(3) NOT NULL,
  `fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `id_pemilik`, `nama_hotel`, `alamat`, `kota`, `rating`, `fasilitas`) VALUES
(41029310, 41203921, 'Grand Sharon Hotel', 'Jl Mangga Besar Raya No.2, Jakarta Barat, DKI Jakarta', 'Jakarta Barat', '4.0', 'Swimming,Parking,24Jam,Restaurant'),
(412038019, 409281092, 'Novotel Makassar', 'Jl. Raya Makassar No.1, Makassar, Sulawesi Selatan', 'Makassar', '4.0', 'Parking,Swimming,24Jam,Elevator,Wifi'),
(510293012, 512093092, 'Amaris Hotel Jakarta', 'Jl. Ir. Hj.Juanda, jakarta Pusat, Jakarta', 'Jakarta Barat', '5.0', 'Parking,Swimming,24Jam,Elevator,Restaurant'),
(1245019210, 1512039201, 'RedTop Hotel', 'Jl. Pecenongan Raya, Jakarta Pusat, Jakarta', 'Jakarta Pusat', '4.5', 'Parking,Swimming,24Jam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `no_kamar` int(4) NOT NULL,
  `kelas_kamar` varchar(10) NOT NULL,
  `harga_kamar` int(10) NOT NULL,
  `status_kamar` enum('kosong','isi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_hotel`, `no_kamar`, `kelas_kamar`, `harga_kamar`, `status_kamar`) VALUES
(150, 41029310, 150, 'Reguler', 400000, 'kosong'),
(152, 41029310, 152, 'Star', 700000, 'kosong'),
(153, 41029310, 153, 'VIP', 900000, 'kosong'),
(200, 412038019, 200, 'Reguler', 1000000, 'kosong'),
(201, 412038019, 201, 'VIP', 1800000, 'kosong'),
(205, 412038019, 205, 'Star', 1400000, 'kosong'),
(207, 412038019, 207, 'Reguler', 1000000, 'kosong'),
(401, 510293012, 401, 'Reguler', 1100000, 'kosong'),
(402, 510293012, 402, 'Star', 1500000, 'kosong'),
(405, 510293012, 405, 'VIP', 2000000, 'kosong'),
(407, 510293012, 407, 'VIP', 2000000, 'kosong'),
(509, 1245019210, 509, 'Reguler', 500000, 'kosong'),
(510, 1245019210, 510, 'VIP', 800000, 'kosong'),
(511, 1245019210, 511, 'Star', 650000, 'kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota_tersedia`
--

CREATE TABLE `kota_tersedia` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota_tersedia`
--

INSERT INTO `kota_tersedia` (`id_kota`, `nama_kota`) VALUES
(1, 'Jakarta Pusat'),
(2, 'Jakarta Barat'),
(3, 'Makassar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kupon`
--

CREATE TABLE `kupon` (
  `id_kupon` int(11) NOT NULL,
  `kode_kupon` varchar(20) NOT NULL,
  `potongan` int(10) NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kupon`
--

INSERT INTO `kupon` (`id_kupon`, `kode_kupon`, `potongan`, `expired`) VALUES
(1, 'LIBURANASIK', 50000, '2019-11-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(11) NOT NULL,
  `id_pemesanan` varchar(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `batas_pembayaran` date NOT NULL,
  `batas_pembayaran_jam` time NOT NULL,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `total_bayar`, `batas_pembayaran`, `batas_pembayaran_jam`, `jenis_pembayaran`, `status_pembayaran`) VALUES
('1234560743', 'MHYBVQB45VA', 700219, '2019-11-24', '21:36:00', 'saldo', 'LUNAS'),
('1234567890', '1234567800', 1000000, '2019-09-22', '04:08:00', 'VA BNI', 'LUNAS'),
('2223330191', 'MHUUELZ34QZ', 700200, '2019-11-24', '18:59:00', 'bni', 'LUNAS'),
('2223333724', 'MHV87RRPJH9', 700344, '2019-11-21', '21:30:00', 'bni', 'LUNAS'),
('8006007970', 'MHLMNT3F6GB', 1400834, '2019-11-21', '21:16:00', '', 'LUNAS'),
('9998880732', 'MHLD4HRYQEA', 1800646, '2019-11-21', '21:21:00', '', 'LUNAS'),
('9998881463', 'MH1VWA3EUY1', 1400935, '2019-11-22', '18:51:00', 'bri', 'LUNAS'),
('9998883275', 'MHN2BQXHUHD', 1400935, '2019-11-22', '18:44:00', 'bri', 'LUNAS'),
('9998885982', 'MHRN5X31DYU', 400129, '2019-11-24', '18:59:00', 'bri', 'LUNAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_checkin` date NOT NULL,
  `tgl_checkout` date NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `jam_pemesanan` time NOT NULL,
  `j_kamar` int(10) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `status` enum('Belum Checkin','Checkin','Checkout','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_hotel`, `nama`, `tgl_checkin`, `tgl_checkout`, `tgl_pemesanan`, `jam_pemesanan`, `j_kamar`, `no_hp`, `status`) VALUES
('MH1VWA3EUY1', 412038019, 'Muhammad Rafii Danendra', '2019-11-22', '2019-11-23', '2019-11-22', '16:51:00', 1, 0, 'Belum Checkin'),
('MHLD4HRYQEA', 412038019, 'Muhammad Rafii Danendra', '2019-11-21', '2019-11-22', '2019-11-21', '19:21:00', 1, 0, 'Belum Checkin'),
('MHN2BQXHUHD', 412038019, 'Muhammad Rafii Danendra', '2019-11-22', '2019-11-23', '2019-11-22', '16:44:00', 1, 0, 'Belum Checkin'),
('MHRN5X31DYU', 41029310, 'Joko Anwar', '2019-11-25', '2019-11-26', '2019-11-24', '16:59:00', 1, 0, 'Belum Checkin'),
('MHUUELZ34QZ', 41029310, 'Muhammad Rafii Danendra', '2019-11-24', '2019-11-25', '2019-11-24', '16:59:00', 1, 0, 'Belum Checkin'),
('MHV87RRPJH9', 41029310, 'Muhammad Rafii Danendra', '2019-11-22', '2019-11-23', '2019-11-21', '19:30:00', 1, 0, 'Belum Checkin'),
('MHYBVQB45VA', 41029310, 'Muhammad Rafii Danendra', '2019-11-24', '2019-11-25', '2019-11-24', '21:36:00', 1, 0, 'Belum Checkin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `saldo` int(10) NOT NULL,
  `code` varchar(20) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `saldo`, `code`, `active`) VALUES
(12, '', 'ndevierte@gmail.com', 'iamnurhodelta', 0, 'wyUoPE3iArMs', 1),
(13, 'Muhammad Rafii Danendra', 'rafiidanendra8787@gmail.com', 'asdqwe123', 299781, 'EKORvAcH2By4', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `e_tiket`
--
ALTER TABLE `e_tiket`
  ADD PRIMARY KEY (`id_etiket`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kota_tersedia`
--
ALTER TABLE `kota_tersedia`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`id_kupon`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
