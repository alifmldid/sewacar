-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2018 pada 15.03
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `rent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `ID_MOBIL` int(11) NOT NULL AUTO_INCREMENT,
  `NO_SERI` varchar(20) DEFAULT NULL,
  `MERK_MOBIL` varchar(100) DEFAULT NULL,
  `JENIS` varchar(20) DEFAULT NULL,
  `DESKRIPSI` text,
  `HARGA_SEWA` int(11) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT 'Tersedia',
  `FOTO_MOBIL` text,
  PRIMARY KEY (`ID_MOBIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`ID_MOBIL`, `NO_SERI`, `MERK_MOBIL`, `JENIS`, `DESKRIPSI`, `HARGA_SEWA`, `STATUS`, `FOTO_MOBIL`) VALUES
(1, 'N 526G BC', 'Toyota Yaris', 'SUV', 'Interior : Airbag, AC, tempat minum, radio, CD Player, USB.\r\nPerlengkapan : Alarm system, power door locks, power steering.', 650000, 'Disewa', 'Toyota_Yaris1.jpg'),
(2, 'N 9283 BB', 'Daihatsu Terios', 'SUV', 'Interior : Airbag, AC, tempat minum, radio, CD Player, USB\r\nPerlengkapan : Power windows, electric mirrors', 650000, 'Disewa', 'Daihatsu_Terios1.jpg'),
(3, 'N 8728 HH', 'Honda Mobilio', 'MPV', 'Interior : Airbag, AC, tempat minum, Radio, CD Player, USB\r\nPerlengkapan : Alarm system, power steering, power door locks, electric mirrors', 700000, 'Tersedia', 'Honda_Mobilio.jpg'),
(4, 'N 2391 PG', 'Toyota Vios', 'Sedan', 'AC, Airbag, CD Player, Alarm System, USB', 650000, 'Disewa', 'Toyota_Vios1.png'),
(5, 'N 2357 VF', 'Toyota Alphard', 'MPV', 'Interior : Airbag, AC, tempat minum, radio, CD Player, sitem navigasi, USB.\r\nPerlengkapan : Alarm system, electric mirrors, power door locks, sunroof, transaction control', 10000000, 'Disewa', 'Toyota_Alphard1.jpg'),
(6, 'N 8267 DG', 'Suzuki Swift', 'Hatchback', 'Interior : AC, CD Player, Radio\r\nPerlengkapan : Alarm system, power windows, electric mirrors', 450000, 'Tersedia', 'Suzuki_Swift1.jpg'),
(8, 'N 4627 FD', 'Toyota Fortuner', 'Hatchback', 'Interior : Airbag, AC, sistem navigasi, radio, tempat minum, CD Player, USB', 800000, 'Disewa', 'Toyota_Fortuner1.jpg'),
(9, 'N 6287 HG', 'Mercedez Benz C-Class', 'Sedan', 'Interior : Airbag, AC, sistem navigasi, tempat minum, radio, CD Player, USB\r\nPerlengkapan : Alarm system, power steering, anti-lock braking system, keyless entry, cruise control, power door locks, power windows, electric mirrors', 900000, 'Tersedia', 'Mercedes_Benz1.jpg'),
(10, 'N 2918 GG', 'Suzuki Ertiga', 'SUV', 'Interior : Airbag, AC, tempat minum, radio, CD Player, USB\r\nPerlengkapan : Alarm system, traction control, power steering, anti-lock braking system, keyless entry, engine immobilizer, power door locks, power windows, electric mirrors', 650000, 'Tersedia', 'Suzuki_Ertiga1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE IF NOT EXISTS `penyewa` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `NO_IDENTITAS` varchar(11) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ALAMAT` text,
  `JK` varchar(20) DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `NO_HP` varchar(20) DEFAULT NULL,
  `TMP_LAHIR` varchar(20) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `FOTO` text,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`ID_USER`, `NO_IDENTITAS`, `NAMA`, `ALAMAT`, `JK`, `AGAMA`, `NO_HP`, `TMP_LAHIR`, `TGL_LAHIR`, `EMAIL`, `FOTO`) VALUES
(7, '20867', 'Alif Akbar Rahmat Mauludi', 'Jl. Danau Dibaruh F1A / 10 Sawojajar, Malang', 'L', 'Islam', '085330177117', 'Probolinggo', '1999-06-24', 'alifmauludi24@gmail.com', 'IMG_20180113_0028.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `ID_PETUGAS` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_PETUGAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `USERNAME`, `PASSWORD`, `NAMA`, `ROLE`) VALUES
(1, 'Aji', '123', 'Herlambang Septiaji Basuseno', 'SuperAdmin'),
(2, 'Alif', '123', 'Alif Akbar Rahmat Mauludi', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `ID_PINJAM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PETUGAS` int(11) DEFAULT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `ID_MOBIL` int(11) DEFAULT NULL,
  `TANGGAL_PINJAM` date DEFAULT NULL,
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `TOTAL` decimal(50,0) NOT NULL,
  `DENDA` decimal(11,0) DEFAULT '0',
  `STATUS_PINJAM` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_PINJAM`),
  KEY `ID_PETUGAS` (`ID_PETUGAS`),
  KEY `ID_USER` (`ID_USER`),
  KEY `ID_MOBIL` (`ID_MOBIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`ID_PINJAM`, `ID_PETUGAS`, `ID_USER`, `ID_MOBIL`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`, `TOTAL`, `DENDA`, `STATUS_PINJAM`) VALUES
(4, 1, 7, 1, '2018-02-07', '2018-02-16', 5850000, 0, 'Belum Kembali');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `penyewa` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_ibfk_2` FOREIGN KEY (`ID_PETUGAS`) REFERENCES `petugas` (`ID_PETUGAS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_ibfk_3` FOREIGN KEY (`ID_MOBIL`) REFERENCES `mobil` (`ID_MOBIL`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
