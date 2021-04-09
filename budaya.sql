-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2021 pada 15.29
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `baju_adat`
--

CREATE TABLE `baju_adat` (
  `id_bajuadat` int(11) NOT NULL,
  `nama_bajuadat` varchar(100) NOT NULL,
  `desc_bajuadat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `provinsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan_daerah`
--

CREATE TABLE `makanan_daerah` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `foto_makanan` varchar(50) NOT NULL,
  `desc_makanan` text NOT NULL,
  `provinsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makanan_daerah`
--

INSERT INTO `makanan_daerah` (`id_makanan`, `nama_makanan`, `foto_makanan`, `desc_makanan`, `provinsi_id`) VALUES
(1, 'fasdf', '8be160916d31446b3a0ca11a7553c6ac.jpg', 'asdfasd', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsi_id` int(50) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL,
  `foto_provinsi` varchar(255) NOT NULL,
  `desk_provinsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`provinsi_id`, `nama_provinsi`, `foto_provinsi`, `desk_provinsi`) VALUES
(1, 'sumatra barat', '70b819707223ba352ce0c069b73ffbd4.jpg', 'sumatra barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarian`
--

CREATE TABLE `tarian` (
  `tarian_id` int(50) NOT NULL,
  `provinsi_id` int(50) NOT NULL,
  `nama_tarian` varchar(255) NOT NULL,
  `foto_tarian` varchar(255) NOT NULL,
  `desk_tarian` text NOT NULL,
  `video_tarian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baju_adat`
--
ALTER TABLE `baju_adat`
  ADD PRIMARY KEY (`id_bajuadat`),
  ADD KEY `id_provinsi` (`provinsi_id`);

--
-- Indeks untuk tabel `makanan_daerah`
--
ALTER TABLE `makanan_daerah`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indeks untuk tabel `tarian`
--
ALTER TABLE `tarian`
  ADD PRIMARY KEY (`tarian_id`),
  ADD KEY `provinsi_id` (`provinsi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `baju_adat`
--
ALTER TABLE `baju_adat`
  MODIFY `id_bajuadat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `makanan_daerah`
--
ALTER TABLE `makanan_daerah`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `provinsi_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tarian`
--
ALTER TABLE `tarian`
  MODIFY `tarian_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `baju_adat`
--
ALTER TABLE `baju_adat`
  ADD CONSTRAINT `baju_adat_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `makanan_daerah`
--
ALTER TABLE `makanan_daerah`
  ADD CONSTRAINT `makanan_daerah_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tarian`
--
ALTER TABLE `tarian`
  ADD CONSTRAINT `tarian_ibfk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`provinsi_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
