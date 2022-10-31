-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2022 pada 15.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sib_arkatama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `status` enum('New','On Progress','Finish') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tasks`
--

INSERT INTO `tasks` (`id`, `category_id`, `title`, `description`, `start_date`, `finish_date`, `status`) VALUES
(3, 1, 'Harry Potter and Sorcerer’s Stone', 'Semuanya berawal dari film ini. Harry Potter adalah anak biasa yang tinggal bersama paman dan bibinya setelah orang tuanya dibunuh Voldemort. Namun Harry diperlakukan semena-mena oleh bibi dan pamannya. Sampai akhirnya Harry mulai bersekolah di Hogwarts, sekolahnya para penyihir.\r\n\r\n', '2012-01-04', '2012-11-02', 'Finish'),
(4, 1, 'Harry Potter and The Chamber of Secrets', 'Setelah melewati musim panas yang menyebalkan, Harry Potter tidak sabar untuk kembali ke Hogwarts. Namun, tiba-tiba muncul makhluk aneh bernama Dobby. Dia melarang Harry untuk kembali ke Hogwarts karena akan ada bahaya yang mengancam keselamatan Harry.', '2013-03-01', '2013-12-28', 'Finish'),
(12, 1, '\'Harry Potter and the Prisoner of Azkabani\'', '\'dikisahkan seorang tahanan bernama Sirius Black berhasil kabur dari Azkaban dan berniat membunuh Harry.\'', '2004-03-02', '2008-10-10', 'Finish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_categories`
--

CREATE TABLE `task_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `task_categories`
--

INSERT INTO `task_categories` (`id`, `name`) VALUES
(1, 'harry potter'),
(2, 'percy jakson '),
(5, 'Usmar Ismail'),
(7, 'Arbi Hanafi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `task_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
