-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Okt 2017 pada 18.11
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_gbi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `baptisan`
--

CREATE TABLE `baptisan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_baptis` date DEFAULT NULL,
  `agama_sebelum` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `dibaptis` varchar(100) DEFAULT NULL,
  `nama_gkm` varchar(100) DEFAULT NULL,
  `telp_gkm` varchar(100) DEFAULT NULL,
  `nama_km` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `baptisan`
--

INSERT INTO `baptisan` (`id`, `user_id`, `tgl_baptis`, `agama_sebelum`, `pekerjaan`, `nama_ayah`, `nama_ibu`, `dibaptis`, `nama_gkm`, `telp_gkm`, `nama_km`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 'Islam', 'Pengangguran', 'Ayah asd', 'Ibu asd', 'Pendeta', 'Hendra', 'Hendra', 'Bedebah', 0, '2017-09-18 05:54:07', '2017-09-20 20:59:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberkatan_nikah`
--

CREATE TABLE `pemberkatan_nikah` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_p` varchar(100) DEFAULT NULL,
  `tempat_lahir_p` varchar(100) DEFAULT NULL,
  `tgl_lahir_p` date DEFAULT NULL,
  `alamat_p` varchar(100) DEFAULT NULL,
  `telp_p` varchar(12) DEFAULT NULL,
  `nama_ayah_p` varchar(100) DEFAULT NULL,
  `nama_ibu_p` varchar(100) DEFAULT NULL,
  `tgl_acara` date DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `oleh` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberkatan_nikah`
--

INSERT INTO `pemberkatan_nikah` (`id`, `user_id`, `nama_p`, `tempat_lahir_p`, `tgl_lahir_p`, `alamat_p`, `telp_p`, `nama_ayah_p`, `nama_ibu_p`, `tgl_acara`, `tempat`, `oleh`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'asd', 'asdhk', '2017-09-19', 'aqwe', '12312', 'sqwe', 'asasd', '2017-09-29', 'weqwe', 'asdasd', 2, '2017-09-19 05:18:15', '2017-09-20 21:08:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyerahan_anak`
--

CREATE TABLE `penyerahan_anak` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_anak` varchar(100) DEFAULT NULL,
  `anak_ke` int(1) DEFAULT NULL,
  `pendeta` varchar(100) DEFAULT NULL,
  `satelit` varchar(100) DEFAULT NULL,
  `tgl_penyerahan` date DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyerahan_anak`
--

INSERT INTO `penyerahan_anak` (`id`, `user_id`, `nama_anak`, `anak_ke`, `pendeta`, `satelit`, `tgl_penyerahan`, `img`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 'Anak Bedebah', 1, 'Test', 'Denpasar', '2017-10-01', '726f4d2246a1dc3e92d60c547e5b5b65.jpg', 2, '2017-09-19 01:46:08', '2017-09-19 06:24:00'),
(4, 4, 'Bedebah', 2, 'asdas', 'Denpasar', '2017-09-24', '2521bbc798304cc43c352856f9641f38.jpg', 1, '2017-09-20 01:36:03', '2017-10-18 07:17:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` int(1) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT '1',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `tempat_lahir`, `nama_ayah`, `nama_ibu`, `jenis_kelamin`, `tgl_lahir`, `isActive`, `img`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$4/AsX4Rh32KT1TL9jLh34O64YmHElSTa64GPLvw2j9kZKgu4bPU8C', '082247464746', 'Jalan Nangka', 'Denpasar', NULL, NULL, NULL, '1990-06-06', 1, 'baced32b8004c1864a1dbb1c7f03fcfa.jpg', 1, 'Prv6tnPR777DaXP8IgoFq3J23wSaZwFan9HWYSzpphWFXmCPp26Smm16j1iP', '2017-09-13 23:02:28', '2017-09-19 05:41:39'),
(2, 'Test', 'asd@mail.com', '$2y$10$6DrJF/zkDnbNsAT4dXW0zuYH2yKoH53pkC7BYyEUM2SpKmR.dTW.W', '048849847', 'Jalan Nangka', 'Denpasar', NULL, NULL, NULL, '2010-06-09', 1, NULL, 2, NULL, '2017-09-15 01:54:04', '2017-09-15 02:09:01'),
(3, 'test admin', 'admin2@mail.com', '$2y$10$nHPtThbp/Nxcjr6MfKmD9uPqtsv4dI.JB9K.uyFFbYD.XjajNy7bO', '0837464837', 'Jalan Nangka', 'Denpasar', NULL, NULL, NULL, '1990-06-14', 1, '947646207a54bc1d0039efbe76601b05.jpg', 1, 'K4dwFcpzGioZ5PSGt4gwdCC25xPLW43YO1XbmHiSC94pPa1TYnIEp7WVPVbi', '2017-09-16 07:13:10', '2017-09-16 07:43:44'),
(4, 'Member Baru', 'member@mail.com', '$2y$10$ZLvkWbdtQqdz8KfcCMPrVOXZquz68a56jCJ8LNHLhbYILhQwPm1jW', '086487637', 'Jalan Raya Kematian No.666', 'Denpasar', 'Ayah Awesome', 'Ibu Awesome', 1, '2010-06-09', 1, '10d19b9b9256bf74d4350ecbf49d6cac.jpg', 2, 'BaTLGDV3ZNsXXEjH5876ZFEjWvnG503tcXTBSMuWhlF21NBsKo1bEg7wBMPo', '2017-09-16 07:53:36', '2017-09-19 02:06:00'),
(7, 'I Made Hendra Wijaya', 'wijaya.imd@gmail.com', '$2y$10$9qw0Q7RpRVdHwth3YATssOz4kg7/AZVchXEk3Kv8ECjLYmBRlIF1m', '082247464196', 'Jalan Raya Pemogan No.18A', 'Tabanan', 'Ayah', 'Ibu', 1, '1994-08-06', 1, NULL, 2, NULL, '2017-09-20 08:47:21', '2017-09-20 08:47:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptisan`
--
ALTER TABLE `baptisan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberkatan_nikah`
--
ALTER TABLE `pemberkatan_nikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyerahan_anak`
--
ALTER TABLE `penyerahan_anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`(191));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptisan`
--
ALTER TABLE `baptisan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pemberkatan_nikah`
--
ALTER TABLE `pemberkatan_nikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penyerahan_anak`
--
ALTER TABLE `penyerahan_anak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
