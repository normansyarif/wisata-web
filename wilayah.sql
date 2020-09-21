-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2020 at 05:18 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narasi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `deskripsi`, `foto`, `latlang`, `narasi`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Lekuk Lima Pupuh Tumbi Lempur', 'Lekuk Lima Pupuh Tumbi Lempur', 'rb_1595055358.jpg', '-1.7280247125067454,101.346646361053', 'No', 'https://www.youtube.com/embed/iVN1csJ3F8k', NULL, '2020-08-15 07:10:21'),
(10, 'Rawabento', 'Rawabento merupakan destinasi unik yang ditemukan di daerah rawa tertinggi di Asia Tenggara. Dipenuhi oleh habitat-habitat burung langka, kerbau liar, vegetasi rawa  dan lainnya yang menakjubkan. Dari tempat ini bisa dinikmati ketinggian gunung Kerinci yang senantiasa mengalami perubahan sesuai dengan keaktifan gunung tersebut. Disaat gunung kerinci aktif, dia mengeluarkan lava yang merubah puncak gunung berwarna coklat. Karena keindahannya, banyak pengunjung baik pengunjung domestik maupun luar  yang berkemah di destinasi. Destinasi ini terintegrasi juga dengan produk pertanian yang super seperti kopi barokah, dan kentang yang berkualitas.', 'rb_1595055358.jpg', '-1.7280247125067454,101.346646361053', 'Rawabento merupakan destinasi unik yang ditemukan di daerah rawa tertinggi di Asia Tenggara. Dipenuhi oleh habitat-habitat burung langka, kerbau liar, vegetasi rawa  dan lainnya yang menakjubkan. Dari tempat ini bisa dinikmati ketinggian gunung Kerinci yang senantiasa mengalami perubahan sesuai dengan keaktifan gunung tersebut. Disaat gunung kerinci aktif, dia mengeluarkan lava yang merubah puncak gunung berwarna coklat. Karena keindahannya, banyak pengunjung baik pengunjung domestik maupun luar  yang berkemah di destinasi. Destinasi ini terintegrasi juga dengan produk pertanian yang super seperti kopi barokah, dan kentang yang berkualitas.', 'https://www.youtube.com/embed/iVN1csJ3F8k', '2020-07-18 06:55:59', '2020-07-18 06:55:59'),
(11, 'Destinasi Danau & Agrowisata', 'Jangkat  menjadi salah lokus budaya Melayu Tua di Jambi, destinasi bersejarah menyimpan  perdaban tua. Destinasi yang dihiasi oleh  alam pegunungan yang indah, danau yang menawan dan potensi hortikultura yang kaya menawarkan suasana pegunungan yang damai.', '2019-06-24_1597477069.jpg', '-2.555621, 101.822308', 'Jangkat  menjadi salah lokus budaya Melayu Tua di Jambi, destinasi bersejarah menyimpan  perdaban tua. Destinasi yang dihiasi oleh  alam pegunungan yang indah, danau yang menawan dan potensi hortikultura yang kaya menawarkan suasana pegunungan yang damai.', 'https://www.youtube.com/embed/EXhOwhpj8nM', '2020-08-15 07:37:49', '2020-08-15 07:37:49'),
(12, 'Wisata Sejarah Perdagangan Jambi', 'Deskripsi', 'images.jpeg-4_1598241608.jpg', '0,0', 'Deskripsi', 'https://www.youtube.com/embed/VQcxNDklZzk', '2020-08-24 04:00:08', '2020-08-24 04:00:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
