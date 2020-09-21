-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2020 at 06:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisataun_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wilayah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id`, `nama`, `foto`, `deskripsi`, `alamat`, `plus_code`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(1, 'Mills Knolls', '1.jpg', 'Laboriosam architecto tenetur veniam itaque beatae. Sequi neque aliquid ea vel quod. Est est architecto beatae. Ut accusantium qui sit eaque vel.', '16938 Gerlach Orchard', '9J95+Q2 Jambi Jambi City Jambi', 1, '2012-02-16 04:02:54', '2006-05-04 11:21:35'),
(2, 'Ricardo Court', '13.jpg', 'Et cumque laboriosam libero a nobis autem omnis aut. Vel iste rerum reprehenderit et ratione dignissimos eos et. Odio et aut et.', '77411 Katarina Port', '9J95+Q2 Jambi Jambi City Jambi', 1, '2013-06-04 20:07:29', '2017-02-20 02:55:23'),
(3, 'Bergnaum Extension', '1.jpg', 'Ex et quas vero vero praesentium facilis perspiciatis eaque. Maxime voluptatem et ipsa. Voluptatem molestias hic unde vero explicabo. Amet necessitatibus omnis in corrupti id consequatur rerum.', '5051 O\'Conner Course', '9J95+Q2 Jambi Jambi City Jambi', 1, '2017-01-17 15:09:00', '1982-12-10 10:21:42'),
(4, 'Quigley Stravenue', '14.jpg', 'Ducimus modi expedita fuga quae et voluptatem. Et deleniti tempora ex. Modi deleniti veritatis sunt non. Consectetur consequatur eligendi et.', '899 Auer Isle Apt. 516', '9J95+Q2 Jambi Jambi City Jambi', 1, '2010-03-05 08:12:37', '2000-04-12 17:44:14'),
(5, 'Stehr Springs', '11.jpg', 'Ex odit similique recusandae magni sit aperiam rerum. Voluptatem dignissimos qui necessitatibus ipsum quae. Et non qui ut facilis sint quo possimus occaecati. Sint autem eos maiores debitis tempore incidunt. Consequatur accusantium quo fugit non quos accusamus.', '78987 Larkin Ville Suite 924', '9J95+Q2 Jambi Jambi City Jambi', 1, '2009-09-15 07:57:52', '2012-04-30 14:15:23'),
(6, 'Brett Pike', '15.jpg', 'Nemo tempore laboriosam voluptatem ipsam perferendis in. Deleniti atque dicta adipisci in delectus. Ut doloribus non et.', '72692 Steuber Corner', '9J95+Q2 Jambi Jambi City Jambi', 1, '1999-10-15 07:42:43', '1994-09-06 01:03:32'),
(7, 'Maggio Freeway', '12.jpg', 'Harum voluptatem rerum at explicabo repellendus dolor. Ea itaque officia et sit id voluptate ut. Voluptas tenetur ratione illo tempora molestias nobis quis.', '9448 Runolfsson Courts Apt. 846', '9J95+Q2 Jambi Jambi City Jambi', 1, '1976-10-01 21:06:48', '2019-02-19 13:49:49'),
(8, 'Paucek Springs', '12.jpg', 'Dolore dolorem et numquam in quis veritatis. Qui adipisci blanditiis enim possimus. Quae recusandae facere facilis aut veniam et dolorem.', '7347 Leonor Parks Apt. 494', '9J95+Q2 Jambi Jambi City Jambi', 1, '2012-03-13 14:40:18', '1977-02-14 23:22:30'),
(9, 'Jack Inlet', '7.jpg', 'Laudantium molestiae cumque iste. Non dolorum sit ratione quae praesentium ut est saepe. Ratione cupiditate rerum aliquid perferendis repudiandae.', '06691 Brekke Fields Apt. 872', '9J95+Q2 Jambi Jambi City Jambi', 1, '1984-10-07 16:47:32', '1996-07-16 23:49:42'),
(10, 'Norbert Fall', '12.jpg', 'Eos aut delectus accusantium. Rerum enim qui quidem cupiditate aspernatur.', '43924 Farrell Mill Suite 688', '9J95+Q2 Jambi Jambi City Jambi', 1, '1996-10-23 07:01:37', '2000-06-09 03:57:53'),
(11, 'Collier Turnpike', '6.jpg', 'Vel dolores quibusdam tenetur voluptate aut at cum. Impedit mollitia labore sequi praesentium et quisquam. Aut excepturi possimus sapiente porro. Exercitationem atque et velit aspernatur.', '997 Cullen Village Apt. 028', '9J95+Q2 Jambi Jambi City Jambi', 1, '1999-09-13 04:49:59', '2001-11-22 16:47:56'),
(12, 'Cory Land', '13.jpg', 'Distinctio alias qui veniam voluptatem. Nihil incidunt debitis voluptatibus et omnis accusamus. Commodi ut porro quis assumenda qui quia. At qui perferendis impedit.', '063 Stella Views', '9J95+Q2 Jambi Jambi City Jambi', 1, '2003-02-06 21:52:09', '1997-10-11 18:48:15'),
(13, 'Steuber Cliffs', '2.jpg', 'Ea facere dolores odio delectus consequatur esse est. Ut veniam iusto officiis odit aspernatur voluptas aut. Quod eligendi rerum minus dolor repellat. Provident earum et molestias saepe nihil.', '8772 Orn Glen', '9J95+Q2 Jambi Jambi City Jambi', 1, '2009-04-17 03:11:44', '2004-09-06 06:53:38'),
(14, 'Ortiz Gardens', '3.jpg', 'Cupiditate voluptatem et voluptas praesentium amet. Excepturi incidunt qui non dicta quaerat et. Iure distinctio distinctio cumque.', '622 Sawayn Shoal', '9J95+Q2 Jambi Jambi City Jambi', 1, '1988-02-18 11:42:39', '1973-06-04 05:46:10'),
(15, 'Feil Ferry', '8.jpg', 'Totam illo earum vel quos. Repellat dolores laudantium occaecati aperiam voluptas. Tenetur provident ea magnam consequatur. Aperiam nihil eius dolores nihil doloribus magnam amet.', '7207 Zetta Terrace', '9J95+Q2 Jambi Jambi City Jambi', 1, '2010-03-17 20:15:26', '1972-08-29 07:49:31'),
(16, 'Schmidt Ramp', '6.jpg', 'Illum quia nam modi nisi blanditiis nulla. Asperiores ex sed ut. Laborum facilis aliquam ducimus facilis vel quo.', '5147 Emard Trafficway', '9J95+Q2 Jambi Jambi City Jambi', 1, '1990-06-11 09:52:15', '1989-08-20 17:12:55'),
(17, 'Lemke Walks', '6.jpg', 'Nesciunt reprehenderit et laboriosam dolores qui eum delectus. Consequatur quibusdam dicta voluptas dolor voluptatem doloribus. Aut dignissimos ratione sit quos aut. Hic saepe repudiandae soluta earum tempora.', '5371 Emmerich Stream', '9J95+Q2 Jambi Jambi City Jambi', 1, '2015-01-15 20:14:12', '1973-07-27 00:20:17'),
(18, 'Schuster Lane', '2.jpg', 'Voluptatem incidunt nihil tenetur doloremque. Consequatur ut suscipit et aliquam libero quas quis. Aspernatur animi est aliquam id voluptas ut nisi.', '5169 Liana Forest', '9J95+Q2 Jambi Jambi City Jambi', 1, '2018-08-25 19:41:04', '1973-12-19 10:11:07'),
(19, 'Keeling Roads', '11.jpg', 'Voluptas ipsum molestiae aut maiores quas. Architecto molestias molestias repellendus dolores consequatur. Architecto aut omnis sed.', '86189 Reilly Ferry', '9J95+Q2 Jambi Jambi City Jambi', 1, '1980-05-27 03:06:53', '2011-12-04 03:13:06'),
(20, 'Loyal Spur', '14.jpg', 'Id sequi sequi sint sit et incidunt quibusdam deserunt. Modi optio consequatur rerum.', '66515 O\'Reilly Green', '9J95+Q2 Jambi Jambi City Jambi', 1, '2015-05-17 17:49:00', '2010-12-23 06:56:18'),
(21, 'Lang Underpass', '14.jpg', 'Ad illo enim quasi optio qui voluptatem. Perspiciatis incidunt tempore eos eos officia omnis et. Facere eum quos distinctio quia hic voluptate corrupti. Non deleniti voluptas explicabo sint.', '1141 Diamond Village Apt. 075', '9J95+Q2 Jambi Jambi City Jambi', 1, '2015-10-28 00:01:52', '2008-04-22 16:01:00'),
(22, 'Kelvin Parks', '15.jpg', 'Nesciunt non debitis inventore ipsam cupiditate et voluptatem. Libero quae qui non excepturi quis expedita. Officiis quam est eaque eveniet alias. Necessitatibus cumque est atque et sit.', '74349 Delphine Turnpike', '9J95+Q2 Jambi Jambi City Jambi', 1, '1992-07-06 21:53:12', '2010-12-23 04:51:48'),
(23, 'Hanna Bypass', '15.jpg', 'Pariatur porro accusantium iusto dolorem ut voluptatem. Aliquam quibusdam optio vero. Delectus optio rem dolore debitis numquam voluptas cupiditate. Doloribus rerum dolores ut molestias ex doloribus. Id et labore accusamus eveniet ut.', '7766 Ernser Field Suite 026', '9J95+Q2 Jambi Jambi City Jambi', 1, '2015-11-28 15:23:48', '1977-05-29 04:25:53'),
(24, 'O\'Hara Cliff', '8.jpg', 'Et commodi consectetur eius veritatis itaque recusandae earum labore. Enim a expedita amet aut inventore cumque.', '155 Schneider Rest', '9J95+Q2 Jambi Jambi City Jambi', 2, '1973-09-23 17:07:37', '1981-03-18 23:03:59'),
(25, 'Jude Coves', '12.jpg', 'Quo et dolores non cum maiores dicta. Rerum quidem qui tenetur quam esse. Voluptas odio aperiam delectus est neque. Quidem omnis unde non.', '71103 Feeney Crescent Apt. 376', '9J95+Q2 Jambi Jambi City Jambi', 1, '1978-11-28 18:13:17', '2006-08-02 18:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_review`
--

CREATE TABLE `destinasi_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_destinasi` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` bigint(20) NOT NULL,
  `end` bigint(20) NOT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wilayah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama`, `foto`, `lokasi`, `plus_code`, `start`, `end`, `deskripsi`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(1, 'Heaney-Morar', '7.jpg', '6680 DuBuque Circles Suite 169', '9J95+Q2 Jambi Jambi City Jambi', 1591119869, 1595528988, 'Nisi blanditiis adipisci hic accusamus. Molestiae nobis ipsum ad hic eligendi eveniet eum.', 1, '1991-07-20 23:35:17', '2003-01-02 05:29:25'),
(2, 'Schumm-Cummerata', '8.jpg', '91805 Brown Expressway Apt. 644', '9J95+Q2 Jambi Jambi City Jambi', 1600889072, 1591194837, 'Asperiores quasi provident unde earum aliquam sed. Dolorum voluptas itaque quam ullam odit officiis. Esse neque rem eum ex beatae. Tenetur iusto distinctio qui similique aut in eum.', 1, '1991-09-27 14:14:04', '1970-11-17 19:22:58'),
(3, 'VonRueden, Bechtelar and Gutkowski', '1.jpg', '74482 Murray Route Suite 754', '9J95+Q2 Jambi Jambi City Jambi', 1593184851, 1603047101, 'Quibusdam qui voluptatum magni harum. Sed rem deserunt sapiente vel dicta consectetur. Ut temporibus quos quos enim optio necessitatibus. At et illo ut consequatur magnam et.', 1, '2001-12-09 07:21:22', '2015-05-30 12:00:05'),
(4, 'D\'Amore, Wilderman and Kiehn', '2.jpg', '4422 Willms Pass', '9J95+Q2 Jambi Jambi City Jambi', 1592237548, 1593410570, 'Eum maxime nobis adipisci facere earum. Inventore iure quo alias voluptatum alias. Et neque eveniet voluptate eligendi qui atque.', 1, '1995-10-10 20:41:28', '1992-12-08 09:23:51'),
(5, 'Turner-Herzog', '9.jpg', '897 Durgan Orchard Suite 150', '9J95+Q2 Jambi Jambi City Jambi', 1604529649, 1599943903, 'Earum ab ipsa ex omnis similique. Doloribus quae quos est ut tempore quos. Iste minus odit et incidunt voluptatem molestiae nobis ut. Iste perspiciatis autem doloribus atque illum.', 1, '1971-10-02 00:49:42', '1977-03-28 18:52:11'),
(6, 'Ankunding LLC', '9.jpg', '1601 Kip Glen', '9J95+Q2 Jambi Jambi City Jambi', 1597912115, 1591959950, 'Sequi a aliquam molestiae. Minima fuga corporis et nulla animi. Et consectetur dolore cumque qui eos at natus. Voluptatum rerum sapiente nobis perferendis magni veritatis qui.', 1, '1989-01-20 05:49:30', '2017-10-30 20:47:31'),
(7, 'Osinski-Wolff', '9.jpg', '9012 Howell Streets', '9J95+Q2 Jambi Jambi City Jambi', 1605137008, 1587059098, 'Maxime eligendi sed voluptatem tempora impedit. Non sapiente sed ab atque explicabo corporis ut. Error molestiae sit fuga aliquid.', 1, '2020-04-06 21:29:53', '1994-10-07 11:24:37'),
(8, 'Gleason PLC', '8.jpg', '38470 Will Dale', '9J95+Q2 Jambi Jambi City Jambi', 1597177643, 1591251605, 'Sint est aut facilis vel dolorem sunt aut. Nihil necessitatibus unde dolorem id. Provident atque repellendus deleniti voluptatem. Sapiente et excepturi deleniti reiciendis voluptas sit.', 1, '1999-02-01 22:32:15', '2003-04-27 22:00:00'),
(9, 'Bruen PLC', '8.jpg', '672 Otho Pine', '9J95+Q2 Jambi Jambi City Jambi', 1601618483, 1587247421, 'Impedit a velit ea commodi odio laboriosam eius. Eaque consequatur rerum voluptatem adipisci. Quisquam eius ad delectus. Aut et doloremque doloribus aut quis quisquam consequatur et. Voluptas doloribus assumenda maxime architecto quia et.', 1, '1984-09-27 13:21:35', '1992-12-14 19:45:22'),
(10, 'Ferry-Reilly', '3.jpg', '8552 Schuppe Mission', '9J95+Q2 Jambi Jambi City Jambi', 1600811687, 1607791816, 'Illum quae iure commodi. Excepturi repellat omnis numquam qui. Sint placeat itaque esse consectetur. Minus repudiandae vel labore expedita modi.', 1, '2016-09-13 04:04:15', '1982-03-09 12:24:31'),
(11, 'Bechtelar-Feeney', '2.jpg', '52939 Kerluke Loaf', '9J95+Q2 Jambi Jambi City Jambi', 1596844089, 1593502544, 'Culpa officia fugiat ex. Dolorum iste delectus iusto molestiae dolorem consequatur in sed. Nesciunt accusantium eaque tenetur et ipsum at officia qui. Quia cupiditate repellat incidunt laudantium atque omnis eos.', 1, '2013-07-17 12:07:25', '2009-04-02 05:44:52'),
(12, 'Reinger, Collier and Bahringer', '4.jpg', '3263 Arely Crossroad Apt. 824', '9J95+Q2 Jambi Jambi City Jambi', 1588498359, 1595843549, 'Adipisci dolorem nobis dolorem ut voluptas aut. Occaecati quidem repudiandae exercitationem rem. Quisquam dicta cupiditate consequatur est et deserunt. Aut non blanditiis eum ea aut neque consequatur.', 1, '2019-10-30 18:54:52', '1980-05-29 14:36:19'),
(13, 'Armstrong-Barton', '6.jpg', '250 Frederik Tunnel', '9J95+Q2 Jambi Jambi City Jambi', 1592504811, 1606340150, 'Expedita iste id ut aut ullam molestiae. Architecto culpa voluptatem quo sequi est dolores commodi. Nobis officiis animi et voluptates.', 1, '1977-12-21 16:53:20', '2014-11-24 11:50:15'),
(14, 'Mertz, Nienow and Wyman', '6.jpg', '04568 Ethelyn Roads', '9J95+Q2 Jambi Jambi City Jambi', 1590552098, 1601521707, 'Et consectetur deserunt explicabo rem qui soluta. Aut molestiae culpa et a ex error maiores. Esse non consequuntur libero. Nisi quisquam dolorem nisi pariatur aut aut.', 1, '1986-03-09 16:14:28', '2005-06-23 13:45:14'),
(15, 'Christiansen Group', '4.jpg', '74286 Halvorson River', '9J95+Q2 Jambi Jambi City Jambi', 1591059815, 1594900675, 'Rerum exercitationem quod temporibus quaerat. Amet laborum omnis dolore et blanditiis. Excepturi quasi quia quia aut qui. Quod minima aut at libero in cumque. Quibusdam qui et velit occaecati veritatis.', 1, '2015-11-28 17:18:44', '2013-01-17 00:15:34'),
(16, 'Maggio, Abbott and Rutherford', '5.jpg', '8303 Molly Harbors', '9J95+Q2 Jambi Jambi City Jambi', 1595982138, 1603682432, 'Explicabo deleniti quo vel. Blanditiis ut qui excepturi. Qui perspiciatis fuga consequatur tempore tempore adipisci eius esse. Laudantium deleniti maiores ipsa.', 1, '1989-01-07 17:34:04', '2009-07-15 05:53:17'),
(17, 'Ryan, Strosin and Bednar', '3.jpg', '17582 Conn Street Apt. 523', '9J95+Q2 Jambi Jambi City Jambi', 1590936912, 1607579969, 'Odit voluptatum reprehenderit est. Id officia aut hic eum. Facilis ducimus est placeat dolorem soluta. Perferendis architecto unde error quo minima voluptatibus voluptas ipsam.', 1, '1999-04-16 05:33:20', '1972-02-29 00:05:47'),
(18, 'Torp Group', '2.jpg', '866 Goodwin Brooks', '9J95+Q2 Jambi Jambi City Jambi', 1598101463, 1596143285, 'Necessitatibus vel qui ab fugit mollitia. Recusandae ex maxime qui non hic consectetur. Et provident eos incidunt voluptatibus.', 1, '2015-02-03 18:15:16', '1974-12-15 02:39:20'),
(19, 'Gerlach-Ernser', '8.jpg', '20073 Larson Cliff Apt. 579', '9J95+Q2 Jambi Jambi City Jambi', 1590364244, 1590456961, 'Assumenda totam tempora cum sunt quidem. Reprehenderit velit esse hic voluptatem cupiditate omnis. Ipsum minus architecto quis aut quia et sunt.', 1, '2014-07-15 08:21:30', '2001-05-15 07:52:07'),
(20, 'Fay, Wolf and Christiansen', '2.jpg', '9700 Celine Harbor', '9J95+Q2 Jambi Jambi City Jambi', 1600658618, 1588174307, 'Id esse placeat eveniet facere nulla repellendus sed dolorem. Asperiores earum sit molestias omnis nobis rerum sunt placeat. Et consequatur consequatur occaecati repellat blanditiis iure.', 1, '1979-01-26 01:26:07', '1992-07-31 21:46:12'),
(21, 'Bayer-Leffler', '1.jpg', '2561 Wehner Locks Apt. 480', '9J95+Q2 Jambi Jambi City Jambi', 1600007444, 1598789784, 'Voluptatibus corrupti eius temporibus soluta dolorem facere. Tempore accusamus iusto at totam sint voluptatem. Aspernatur architecto eligendi et culpa ut rerum est.', 1, '2000-12-28 05:25:00', '1980-05-05 07:39:44'),
(22, 'Halvorson LLC', '1.jpg', '4539 Olga Viaduct', '9J95+Q2 Jambi Jambi City Jambi', 1598699751, 1606042811, 'Dolorum aut mollitia voluptatem enim. Fugit quae numquam labore placeat sit. Est laborum vel error omnis ut officiis fuga. Illo error laudantium ea porro.', 1, '2008-10-10 14:09:25', '1994-10-11 04:37:13'),
(23, 'Boyer, Kunze and Raynor', '9.jpg', '3576 Lillian Hollow Suite 043', '9J95+Q2 Jambi Jambi City Jambi', 1602848660, 1600001500, 'Voluptatem ad debitis sit dicta. Laudantium earum sit optio non. Eveniet voluptates laboriosam et sit. Aut delectus aspernatur ut libero totam qui. Et labore ipsum doloremque eaque.', 1, '2000-01-04 12:41:42', '1999-05-19 23:13:56'),
(24, 'McDermott Group', '7.jpg', '863 Alf Route', '9J95+Q2 Jambi Jambi City Jambi', 1597149077, 1602672852, 'Aperiam aut excepturi impedit excepturi modi est sapiente ducimus. Alias rem soluta rem. Quidem ut quis distinctio ducimus aliquid delectus. Consequatur excepturi fuga a.', 1, '2017-08-26 15:50:42', '1991-03-11 12:14:29'),
(25, 'Hegmann, Roob and Cormier', '6.jpg', '57374 Skylar Cove Apt. 090', '9J95+Q2 Jambi Jambi City Jambi', 1587920818, 1596417819, 'Porro deleniti voluptatibus nulla et molestias eum unde. Omnis exercitationem ut reiciendis in omnis. Eos magni error earum aut quasi amet commodi exercitationem.', 1, '2006-03-28 17:09:11', '1992-10-01 12:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `homestay`
--

CREATE TABLE `homestay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamar_tersedia` int(11) NOT NULL,
  `fasilitas` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kisaran_harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_tolak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pemilik` bigint(20) NOT NULL,
  `id_wilayah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homestay`
--

INSERT INTO `homestay` (`id`, `nama`, `foto`, `kamar_tersedia`, `fasilitas`, `kisaran_harga`, `alamat`, `plus_code`, `status`, `alasan_tolak`, `id_pemilik`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(55, 'Miller, Sanford and Altenwerth', '7.jpg', 20, 'Voluptatem alias esse iure quae. Id hic ipsam exercitationem reprehenderit consequatur voluptates.', 'Rp. 100.000 - Rp. 500.000', '78572 Loyal Meadows', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2015-11-09 22:19:33', '1972-05-22 04:05:51'),
(56, 'Stokes Ltd', '7.jpg', 20, 'Eum placeat illum aspernatur sint. Incidunt quaerat vel eum. Eos consequatur libero cum. Ut qui commodi vel voluptas dolorem explicabo.', 'Rp. 100.000 - Rp. 500.000', '6544 Predovic Keys', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1989-09-30 20:49:14', '2002-02-09 15:59:35'),
(57, 'Kirlin, Romaguera and Satterfield', '14.jpg', 20, 'Temporibus atque eum pariatur eos repellat voluptatem atque facilis. Eum et voluptas asperiores sit iure. At vitae id sit ut amet soluta labore.', 'Rp. 100.000 - Rp. 500.000', '408 Koss Pike Suite 970', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2001-11-29 01:58:36', '1998-10-07 12:47:12'),
(58, 'Ankunding, Reynolds and Skiles', '5.jpg', 20, 'Numquam est reiciendis repellendus voluptas quia quia odio. Animi quae ab autem cum assumenda est. Consequatur id accusantium eligendi rerum quia quos nesciunt. Vero delectus quis ratione tempora. Dolorem qui dolorem eveniet est ullam modi quaerat.', 'Rp. 100.000 - Rp. 500.000', '35929 Trystan Light Suite 010', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1993-04-17 02:18:49', '1992-11-14 04:13:35'),
(59, 'Kuhic, Ledner and Shields', '4.jpg', 20, 'Rerum sit et mollitia a qui. Officia rem asperiores maxime ipsa ratione fugiat labore. Ratione eum culpa pariatur sunt.', 'Rp. 100.000 - Rp. 500.000', '214 April Passage', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1978-12-02 10:27:39', '1997-06-15 06:28:23'),
(60, 'Leannon-Leannon', '10.jpg', 20, 'Totam consequatur voluptatem modi ipsa molestiae. Vel et aut qui libero corporis. Eos quos ex eius aperiam facilis adipisci consectetur. Libero eligendi ut illum.', 'Rp. 100.000 - Rp. 500.000', '2124 Margret Court', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1983-01-12 17:20:45', '2004-11-16 23:44:41'),
(61, 'Connelly-Medhurst', '1.jpg', 20, 'Ipsam ipsa enim quisquam excepturi ducimus quia non itaque. Omnis quam dolores temporibus recusandae. Omnis voluptatem sint sunt quidem et magni. Repellendus explicabo ducimus eius tenetur pariatur quo iusto.', 'Rp. 100.000 - Rp. 500.000', '7643 Osinski Mountains Apt. 152', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1970-10-31 10:36:30', '2013-08-05 16:48:25'),
(62, 'Tremblay, Fritsch and Gutmann', '2.jpg', 20, 'Quibusdam quo sit ratione et. Sint quis totam voluptatem incidunt odit atque rerum.', 'Rp. 100.000 - Rp. 500.000', '4905 Wiegand Street', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1987-10-02 09:37:32', '2011-06-16 13:20:15'),
(63, 'Kunze-Runte', '7.jpg', 20, 'Reiciendis recusandae commodi repellat repellat eaque accusamus tempore magnam. Esse atque veniam unde adipisci mollitia est aliquam. Fugiat quo repellendus sint officiis reprehenderit aut.', 'Rp. 100.000 - Rp. 500.000', '31985 Borer Estate', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1984-02-17 07:22:48', '2014-03-06 19:02:45'),
(64, 'Reinger Ltd', '3.jpg', 20, 'Ut nisi excepturi cum sit a ipsum deleniti. Ut dolore corporis sunt. Nesciunt similique expedita cupiditate et iste.', 'Rp. 100.000 - Rp. 500.000', '40303 Kuhn Ridges', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2002-03-02 19:22:12', '2004-12-02 11:45:31'),
(65, 'Wolff Group', '3.jpg', 20, 'Rerum ipsa consequuntur quia tempora. Itaque itaque laboriosam minus ea aut. Nobis sit minima ut non minus. Voluptatem dolores sit laboriosam excepturi odit.', 'Rp. 100.000 - Rp. 500.000', '939 Gregg Via', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2019-04-15 00:39:06', '1978-11-25 00:54:37'),
(66, 'Graham-Boyer', '10.jpg', 20, 'Nihil beatae consequatur consequatur similique ex. Nam laborum sunt et. Et saepe quis quidem adipisci eveniet omnis. Alias minus unde qui et atque repellendus. Quae et possimus rem ut et.', 'Rp. 100.000 - Rp. 500.000', '28882 Schmitt Isle Suite 587', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1977-06-30 21:56:27', '2002-02-08 03:31:11'),
(67, 'Johnston-Gutmann', '13.jpg', 20, 'Id quia nulla et sint. Tempora aut beatae qui est neque fugiat tenetur. Et aut nostrum in magni culpa eum eveniet. Quas in voluptatum odit quam accusantium nam vel error.', 'Rp. 100.000 - Rp. 500.000', '5324 Eliza Manors Suite 114', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1980-10-05 17:07:26', '2019-06-06 10:02:03'),
(68, 'Ryan Inc', '9.jpg', 20, 'Facere molestias error sint tenetur qui. Optio natus sequi impedit sit debitis et. Suscipit tempora voluptatibus molestiae nemo aut explicabo. Veniam ut ut corporis qui omnis ullam corrupti.', 'Rp. 100.000 - Rp. 500.000', '28030 Nora Points', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2006-03-06 01:33:09', '2014-03-30 22:34:39'),
(69, 'Hirthe, Lind and Jacobson', '13.jpg', 20, 'Et molestias quo sint facere qui totam. Sed nesciunt sit aliquid et quis iure. Sit est est sed cum.', 'Rp. 100.000 - Rp. 500.000', '5813 Treutel Drive', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2014-04-08 08:51:44', '2014-01-27 01:50:05'),
(70, 'Buckridge, DuBuque and Gerhold', '12.jpg', 20, 'Dolorem at at modi quisquam aperiam. Unde praesentium tempora sit et aliquid nam. Amet tenetur facere sit pariatur.', 'Rp. 100.000 - Rp. 500.000', '69563 Fahey Circles Apt. 341', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2003-11-16 15:56:50', '2017-07-15 18:04:02'),
(71, 'Stiedemann Inc', '10.jpg', 20, 'Tenetur ut voluptatum nostrum sed quo. Expedita aut sunt eligendi et vel. Nulla aliquid nihil et fugit nemo dolores.', 'Rp. 100.000 - Rp. 500.000', '58289 Camryn Locks', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1977-09-07 13:12:25', '2010-11-17 20:51:43'),
(72, 'Collins-Krajcik', '11.jpg', 20, 'Quod ducimus ea sequi debitis. Corrupti est iure assumenda ratione. Accusantium molestias eum voluptates deleniti modi iure unde quis.', 'Rp. 100.000 - Rp. 500.000', '707 Gia Ways', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1985-08-15 06:12:35', '1996-07-08 13:09:45'),
(73, 'Luettgen, Crona and Bahringer', '9.jpg', 20, 'Eos odit magni voluptas ullam ad. Sint numquam eius placeat dolor culpa facilis. Illum aut in cum ullam. Reiciendis omnis et fugiat.', 'Rp. 100.000 - Rp. 500.000', '555 Kuhlman Forges', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2014-09-17 15:06:49', '1989-10-10 13:46:26'),
(74, 'Lakin, Dach and Strosin', '2.jpg', 20, 'Voluptates nostrum fugit ducimus dolores aut dolorem sed provident. Voluptates velit numquam vitae aliquam. Sed dolor molestiae et quod ipsum sed voluptatem.', 'Rp. 100.000 - Rp. 500.000', '105 Rebeca Radial', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1972-11-17 16:01:16', '2015-05-29 12:48:02'),
(75, 'Zulauf-Shields', '11.jpg', 20, 'Deserunt quos impedit delectus magnam dolorum incidunt tempora. Quia in sit ratione vel in nesciunt voluptas.', 'Rp. 100.000 - Rp. 500.000', '723 Theodora Meadow', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1983-04-19 12:21:37', '1994-02-28 21:56:30'),
(76, 'Pacocha-Rowe', '12.jpg', 20, 'Inventore voluptas ullam sint sunt ad mollitia. Adipisci error dolorem animi accusamus. Facere molestias sint nobis autem pariatur voluptate delectus. Tempore neque ratione adipisci qui quos pariatur enim.', 'Rp. 100.000 - Rp. 500.000', '67934 Schultz Club Suite 922', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '2009-10-22 05:11:05', '1994-12-05 11:38:56'),
(77, 'Hoppe-Cummerata', '8.jpg', 20, 'Eum et quia sunt est ipsa ut. Corporis quibusdam qui saepe. Qui nostrum et ipsa cum inventore. Eaque sit amet facilis quia expedita vero magni maxime.', 'Rp. 100.000 - Rp. 500.000', '0289 Lebsack Square', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1996-04-07 05:20:51', '2015-08-14 08:55:04'),
(78, 'Kessler-Funk', '8.jpg', 20, 'Quasi totam quisquam id. Est laboriosam ut repudiandae. Quis occaecati id temporibus vitae.', 'Rp. 100.000 - Rp. 500.000', '5436 Rocio Forest', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1973-04-27 03:40:48', '1991-05-30 13:30:00'),
(79, 'Halvorson and Sons', '4.jpg', 20, 'Quo sit sed consequuntur aut perferendis. Ea ullam sed dignissimos facere omnis quia. Eius similique in et ad repellat.', 'Rp. 100.000 - Rp. 500.000', '2183 Waino Knolls', '9J95+Q2 Jambi Jambi City Jambi', 'approved', NULL, 2, 1, '1988-05-17 23:30:31', '1976-07-07 06:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `homestay_review`
--

CREATE TABLE `homestay_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_homestay` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_seni`
--

CREATE TABLE `kelompok_seni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kesenian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_tolak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pemilik` bigint(20) NOT NULL,
  `id_wilayah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_seni`
--

INSERT INTO `kelompok_seni` (`id`, `nama`, `foto`, `jenis_kesenian`, `alamat`, `plus_code`, `deskripsi`, `status`, `alasan_tolak`, `id_pemilik`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(52, 'Stanton, Kulas and Kozey', '7.jpg', 'Musik', '385 Dach Knolls', '9J95+Q2 Jambi Jambi City Jambi', 'Et quibusdam beatae occaecati recusandae est consequatur. Quasi ab voluptatum eligendi incidunt. Sit ut et hic ratione.', 'approved', NULL, 4, 1, '1989-08-29 14:40:01', '2006-11-22 18:47:05'),
(53, 'Rolfson, Gibson and Collier', '14.jpg', 'Drama', '52351 Borer Oval', '9J95+Q2 Jambi Jambi City Jambi', 'Ducimus rerum quia aliquid fugiat et harum asperiores. Qui excepturi laudantium illo amet quo quia minima. Eum a facere sed voluptatem assumenda sunt occaecati.', 'approved', NULL, 4, 1, '1995-06-21 05:27:00', '2014-12-05 21:50:25'),
(54, 'Lebsack LLC', '2.jpg', 'Drama', '8118 Wilmer Tunnel Apt. 551', '9J95+Q2 Jambi Jambi City Jambi', 'Sapiente a in quae quod sit quas consequatur. Nihil odit est aspernatur eum voluptatibus earum. Qui non voluptas aut eos deleniti aspernatur molestiae. Natus exercitationem officia vero corporis harum non. Consequuntur in aut laboriosam officiis totam.', 'approved', NULL, 4, 1, '2002-11-06 07:25:30', '1987-11-29 09:19:33'),
(55, 'Mayer PLC', '4.jpg', 'Musik', '43418 Shields Flat Suite 242', '9J95+Q2 Jambi Jambi City Jambi', 'Sit et nesciunt cumque eum. Neque qui voluptas ipsum molestias est expedita labore laborum. Qui ea sit et et omnis.', 'approved', NULL, 4, 1, '2002-12-19 23:56:35', '1979-02-04 10:14:29'),
(56, 'Kuhn, Spencer and Spinka', '14.jpg', 'Tari', '27895 Hahn Stravenue', '9J95+Q2 Jambi Jambi City Jambi', 'Sit unde repudiandae perspiciatis et enim ea ab. Soluta molestias deleniti distinctio officiis. Et porro voluptatem sunt vel doloremque est quae accusantium.', 'approved', NULL, 4, 1, '2012-10-19 22:10:40', '2007-01-31 10:33:49'),
(57, 'Blick-Wyman', '8.jpg', 'Drama', '625 Elijah Burgs', '9J95+Q2 Jambi Jambi City Jambi', 'Ipsam porro praesentium qui voluptas eum amet blanditiis. Saepe nihil debitis porro non vitae inventore sapiente. Odio sit ea suscipit aut amet consequuntur.', 'approved', NULL, 4, 1, '1985-05-09 00:31:10', '2007-03-16 10:10:47'),
(58, 'Kuhic Inc', '4.jpg', 'Musik', '544 Bertha Village Suite 681', '9J95+Q2 Jambi Jambi City Jambi', 'Error libero eos quos repudiandae aut minus ea qui. Repellat voluptas qui non laborum totam ad. Dolorem ut adipisci pariatur omnis deserunt dolores. Nulla voluptatem nesciunt modi tempore sed neque sit consequatur.', 'approved', NULL, 4, 1, '1978-12-10 13:10:41', '2017-07-27 12:47:23'),
(59, 'Lind-Morissette', '13.jpg', 'Musik', '416 Elwin Coves', '9J95+Q2 Jambi Jambi City Jambi', 'Laboriosam aut non impedit voluptatem ab. A reprehenderit placeat qui cupiditate. Similique et sit aut culpa aliquam commodi placeat.', 'approved', NULL, 4, 1, '2006-07-16 13:31:37', '2004-07-03 14:01:44'),
(60, 'Hane-Zulauf', '13.jpg', 'Musik', '6944 Pouros Mills', '9J95+Q2 Jambi Jambi City Jambi', 'Quis enim modi ad quas fuga incidunt. Dolor harum nihil dolorem dolore rerum iusto voluptatem. Voluptatibus exercitationem ut pariatur illum ea consequuntur.', 'approved', NULL, 4, 1, '2002-09-22 09:53:58', '1990-09-05 12:35:19'),
(61, 'Heidenreich-Graham', '1.jpg', 'Tari', '829 Paucek Lodge Apt. 630', '9J95+Q2 Jambi Jambi City Jambi', 'Maxime veniam nihil unde qui ut consectetur minima. Ad rerum repudiandae consequatur aut ut praesentium. Dignissimos quia est est blanditiis.', 'approved', NULL, 4, 1, '2001-09-02 15:12:49', '2002-10-06 16:31:50'),
(62, 'Jaskolski LLC', '8.jpg', 'Tari', '3623 Breitenberg Mount Apt. 055', '9J95+Q2 Jambi Jambi City Jambi', 'Aut nemo quaerat animi autem ipsam dolorem quasi. Ipsa dolor soluta asperiores sequi neque. Quae voluptas et eos. Reiciendis tenetur doloremque nesciunt voluptatum ea.', 'approved', NULL, 4, 1, '1979-05-25 22:43:25', '1982-12-13 09:32:15'),
(63, 'Muller-Heathcote', '1.jpg', 'Tari', '30672 Bogisich Harbors', '9J95+Q2 Jambi Jambi City Jambi', 'Enim sed atque consectetur eum. Repellendus incidunt ratione error quia. Eligendi consequuntur quia vitae qui ea qui voluptas voluptatem. Quae quibusdam velit vero quo facilis officia autem sit.', 'approved', NULL, 4, 1, '1978-01-06 20:17:52', '1989-09-22 22:48:56'),
(64, 'Gutmann LLC', '9.jpg', 'Drama', '89219 Zemlak Islands Apt. 020', '9J95+Q2 Jambi Jambi City Jambi', 'Corrupti voluptas optio sed recusandae dignissimos. Similique ut sapiente dolor ad voluptatem qui. Nihil blanditiis corporis est non. Sequi et voluptatibus et id qui.', 'approved', NULL, 4, 1, '2004-01-06 03:57:32', '1977-03-07 04:04:58'),
(65, 'Schimmel LLC', '15.jpg', 'Tari', '1417 Barton Club Apt. 323', '9J95+Q2 Jambi Jambi City Jambi', 'Quos perferendis accusamus dicta. Quae optio sint reprehenderit in id est.', 'approved', NULL, 4, 1, '1970-03-25 06:39:12', '1985-03-07 13:39:35'),
(66, 'Bradtke and Sons', '13.jpg', 'Musik', '008 Noel Light', '9J95+Q2 Jambi Jambi City Jambi', 'Voluptatem autem fugiat distinctio nihil qui doloremque eligendi corrupti. Magni aut praesentium totam et aut quam enim. Nobis quasi aut officiis sed aut molestiae.', 'approved', NULL, 4, 1, '1982-10-25 20:41:35', '2000-08-30 18:31:21'),
(67, 'Carter Group', '3.jpg', 'Musik', '58622 Norberto Overpass Apt. 764', '9J95+Q2 Jambi Jambi City Jambi', 'Rerum molestias ullam officia quia omnis ipsum. Pariatur blanditiis sed rerum odio optio nesciunt corrupti. Veniam qui eveniet ullam fugit.', 'approved', NULL, 4, 1, '2010-11-16 18:08:36', '2002-04-13 05:23:26'),
(68, 'McGlynn-Waters', '9.jpg', 'Drama', '0974 Kiarra Corner Suite 316', '9J95+Q2 Jambi Jambi City Jambi', 'Consectetur tempore reprehenderit dolorum voluptate. Ex necessitatibus mollitia excepturi ut voluptatem architecto. Ullam molestiae ut nesciunt laboriosam. Rerum consectetur velit dignissimos voluptatibus error.', 'approved', NULL, 4, 1, '1981-10-26 20:45:19', '1975-06-07 20:02:54'),
(69, 'Bosco, Dach and Barrows', '12.jpg', 'Tari', '166 Connelly Center Apt. 863', '9J95+Q2 Jambi Jambi City Jambi', 'Nobis et voluptatem architecto et. Consequuntur temporibus soluta dolores et voluptatibus debitis. Nostrum consequatur nobis commodi quisquam.', 'approved', NULL, 4, 1, '2013-08-15 08:19:39', '2014-07-05 18:36:28'),
(70, 'Waters-Wiegand', '1.jpg', 'Drama', '615 Feil Circle Suite 930', '9J95+Q2 Jambi Jambi City Jambi', 'Ut ducimus et aperiam eius quia praesentium nam. Est molestiae quibusdam autem vel sunt eum. Quia voluptatem illo fugiat quidem. Repellendus enim totam velit qui et dolorum. Ducimus minus dolores mollitia voluptas quisquam distinctio.', 'approved', NULL, 4, 1, '1997-10-08 18:11:50', '2012-07-02 08:23:26'),
(71, 'Rolfson, Koss and Hauck', '1.jpg', 'Tari', '48721 Dessie Passage Apt. 611', '9J95+Q2 Jambi Jambi City Jambi', 'Cum deleniti autem pariatur adipisci omnis similique et numquam. Perspiciatis id vel autem quia dignissimos. Et fuga aut quasi dolore est.', 'approved', NULL, 4, 1, '1993-04-14 10:07:06', '1984-04-18 20:13:14'),
(72, 'Franecki LLC', '12.jpg', 'Drama', '5963 Camren Ridge', '9J95+Q2 Jambi Jambi City Jambi', 'Nihil quod blanditiis est. Quae esse inventore enim et et alias recusandae eius. Ipsum accusantium atque illo aut consequatur quo.', 'approved', NULL, 4, 1, '2000-03-31 01:47:02', '2015-09-11 12:08:43'),
(73, 'Heller-Gerhold', '6.jpg', 'Tari', '74436 Gibson Rapids', '9J95+Q2 Jambi Jambi City Jambi', 'Totam et optio aliquam et veniam magni repudiandae. Quibusdam provident ab sed animi. Ratione dolor ratione corrupti provident blanditiis. Vero ea numquam dolore similique nesciunt fuga.', 'approved', NULL, 4, 1, '2005-04-11 08:17:47', '1979-03-30 19:45:50'),
(74, 'Ratke, Reichel and Fadel', '2.jpg', 'Drama', '82721 McCullough Summit', '9J95+Q2 Jambi Jambi City Jambi', 'Sequi fugiat velit qui occaecati labore. A cum dolorem sapiente et quo. Dignissimos unde vitae et temporibus veritatis vitae architecto a.', 'approved', NULL, 4, 1, '2003-09-19 15:56:05', '1987-08-02 17:16:02'),
(75, 'Walsh, Oberbrunner and Abernathy', '14.jpg', 'Drama', '27279 Strosin Light', '9J95+Q2 Jambi Jambi City Jambi', 'Nihil accusamus reiciendis nisi assumenda fuga. Nesciunt id nam quia est eveniet aut. Quia culpa ut amet enim iste omnis. Praesentium qui sunt dolores architecto voluptatibus dolorum sed.', 'approved', NULL, 4, 1, '1991-12-07 18:27:23', '2003-05-06 16:04:03'),
(76, 'DuBuque, Herzog and Simonis', '6.jpg', 'Drama', '263 Funk Curve Apt. 961', '9J95+Q2 Jambi Jambi City Jambi', 'Facere eaque sed corrupti in possimus voluptatum. Ratione omnis laboriosam vel aspernatur nulla eum laborum. Ut dolor aspernatur error et quos.', 'approved', NULL, 4, 1, '2004-05-07 02:02:46', '2001-10-15 06:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_seni_review`
--

CREATE TABLE `kelompok_seni_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_seni` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_07_015938_create_wilayah_table', 1),
(4, '2020_04_07_020114_create_kelompok_seni_table', 1),
(5, '2020_04_07_020133_create_homestay_table', 1),
(6, '2020_04_07_020143_create_tour_guide_table', 1),
(7, '2020_04_07_020153_create_souvenir_table', 1),
(8, '2020_04_07_020205_create_destinasi_table', 1),
(9, '2020_04_07_022123_add_more_data_to_user_table', 2),
(10, '2020_04_09_084345_create_event_table', 3),
(11, '2020_04_10_032746_create_slider_table', 4),
(12, '2020_04_11_062923_create_pesan_table', 5),
(13, '2020_04_11_062948_create_destinasi_review_table', 5),
(14, '2020_04_11_062955_create_homestay_review_table', 5),
(15, '2020_04_11_063012_create_kelompok_seni_review_table', 5),
(16, '2020_04_11_063036_create_souvenir_review_table', 5),
(17, '2020_04_11_063050_create_tour_guide_review_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `foto`, `title`, `subtitle`, `warna`, `created_at`, `updated_at`) VALUES
(3, '1586492081.jpg', 'KERINCI', 'Kata-kata tentang Kerinci atau Apalah Gitu', '#ffffff', '2020-04-09 07:05:32', '2020-04-09 07:14:41'),
(4, '1586492390.jpg', 'KOTA JAMBI', 'Kata-kata tentang Kota Jambi atau Apalah Gitu', '#ffffff', '2020-04-09 07:17:48', '2020-04-09 07:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `souvenir`
--

CREATE TABLE `souvenir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plus_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_tolak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pemilik` bigint(20) NOT NULL,
  `id_wilayah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `souvenir`
--

INSERT INTO `souvenir` (`id`, `nama`, `harga`, `foto`, `alamat`, `plus_code`, `deskripsi`, `status`, `alasan_tolak`, `id_pemilik`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(53, 'Marvin, Rowe and McCullough', 'Rp. 15.000', '11.jpg', '099 McLaughlin Radial', '9J95+Q2 Jambi Jambi City Jambi', 'Molestias dolores modi autem fuga magnam possimus. Quia et quaerat sit. Porro aut incidunt est eum. Eos quod tenetur modi voluptatibus amet fuga dolor. Accusantium omnis sed tempora cumque iusto voluptatum optio.', 'approved', NULL, 0, 0, '1982-05-02 21:09:48', '1983-10-18 02:21:49'),
(54, 'Ryan, Cremin and Effertz', 'Rp. 15.000', '15.jpg', '778 Virginia Oval Apt. 251', '9J95+Q2 Jambi Jambi City Jambi', 'Nesciunt ut omnis esse magni. Veniam officiis officia consequatur assumenda sit rerum. Dolor sapiente magni molestiae sit quis accusantium. Earum repudiandae sint totam non tempora.', 'approved', NULL, 0, 0, '1986-04-16 00:36:01', '1985-10-06 17:20:28'),
(55, 'Stamm, Kozey and Gerhold', 'Rp. 15.000', '14.jpg', '517 Klein Stream', '9J95+Q2 Jambi Jambi City Jambi', 'Dolor autem optio magnam sit consequatur libero. Labore nulla fugit architecto qui sunt sunt aliquam cupiditate. Laborum illum et voluptatem voluptates fugiat quas sint. Itaque ut aut quas dicta.', 'approved', NULL, 0, 0, '1970-04-01 00:52:27', '1989-10-25 21:45:25'),
(56, 'Hagenes, Abernathy and Marvin', 'Rp. 15.000', '1.jpg', '803 Lockman View Suite 646', '9J95+Q2 Jambi Jambi City Jambi', 'Harum voluptatem quo alias ullam non. Eius voluptatem sit ea et necessitatibus labore laboriosam veniam. Quidem illum vitae unde id.', 'approved', NULL, 0, 0, '1995-07-22 11:42:34', '1970-09-17 20:04:38'),
(57, 'Gulgowski, Zieme and Fritsch', 'Rp. 15.000', '14.jpg', '925 Weissnat Light', '9J95+Q2 Jambi Jambi City Jambi', 'Quis repudiandae et doloremque aperiam voluptatibus ipsum. Dignissimos dicta tempora et adipisci labore vero voluptatem corrupti. Inventore iusto non accusantium corporis perspiciatis vel. At nihil reiciendis modi alias ut magnam.', 'approved', NULL, 0, 0, '2014-09-29 10:38:19', '2005-11-13 12:24:24'),
(58, 'Jacobson Inc', 'Rp. 15.000', '8.jpg', '279 Lynch Inlet', '9J95+Q2 Jambi Jambi City Jambi', 'Omnis unde ratione sapiente optio quis natus beatae non. Omnis et error temporibus sint repellat in distinctio. Aut esse ut dolor.', 'approved', NULL, 0, 0, '1982-11-04 07:10:46', '2000-07-18 21:57:41'),
(59, 'Mosciski-Shanahan', 'Rp. 15.000', '6.jpg', '58643 Krajcik Land', '9J95+Q2 Jambi Jambi City Jambi', 'Adipisci repudiandae similique et sequi dolor nihil dicta temporibus. Similique inventore excepturi sint inventore at eos et.', 'approved', NULL, 0, 0, '1987-04-23 23:02:09', '1986-09-21 19:22:54'),
(60, 'Nienow and Sons', 'Rp. 15.000', '5.jpg', '73873 Gladyce Forges', '9J95+Q2 Jambi Jambi City Jambi', 'Consequatur nesciunt corporis qui quos non. Et non sunt similique quibusdam id et quibusdam nihil. Voluptatem animi rem occaecati quo voluptates.', 'approved', NULL, 0, 0, '2002-11-13 04:59:49', '1985-12-29 07:59:38'),
(61, 'Cruickshank, Walsh and Farrell', 'Rp. 15.000', '3.jpg', '7580 Wilbert Ford Suite 970', '9J95+Q2 Jambi Jambi City Jambi', 'Debitis sunt possimus eum. Odio laudantium voluptates quia rerum animi. Expedita rem voluptatum voluptas.', 'approved', NULL, 0, 0, '1994-08-04 09:45:32', '1985-01-18 19:42:03'),
(62, 'O\'Connell Inc', 'Rp. 15.000', '9.jpg', '45435 Schneider Station', '9J95+Q2 Jambi Jambi City Jambi', 'Dolore est repellendus eum unde. Odio pariatur dolorem officia quia non cumque corporis. Reprehenderit fugit illo qui quas et autem.', 'approved', NULL, 0, 0, '2016-07-23 01:26:43', '2004-12-17 05:18:16'),
(63, 'Stroman, Lindgren and Connelly', 'Rp. 15.000', '11.jpg', '240 Jayson Terrace', '9J95+Q2 Jambi Jambi City Jambi', 'Molestiae quidem eaque quod vel voluptate. Neque molestiae doloribus ullam iste consequuntur. Quidem ut nemo maiores aliquam architecto. Qui dolorem voluptatem est sit ducimus porro aut aliquid.', 'approved', NULL, 0, 0, '2005-05-23 02:41:28', '1986-12-08 08:56:21'),
(64, 'Konopelski-Feeney', 'Rp. 15.000', '12.jpg', '54822 O\'Connell Plain Suite 245', '9J95+Q2 Jambi Jambi City Jambi', 'Soluta est consequuntur eius non. Nemo officiis blanditiis harum assumenda quo optio sequi enim. Ullam beatae sit eum quia quae beatae similique. Inventore animi exercitationem sit asperiores.', 'approved', NULL, 0, 0, '1973-07-07 19:56:32', '1996-05-17 17:57:48'),
(65, 'Roob-Klocko', 'Rp. 15.000', '9.jpg', '564 Trey Gardens Suite 939', '9J95+Q2 Jambi Jambi City Jambi', 'Voluptas cumque quaerat voluptas id facilis omnis eius. Necessitatibus porro iure nobis cupiditate dolorum aliquid. Nihil dolorem minus at eum. Voluptatum maiores et occaecati quae in temporibus. Repudiandae quibusdam culpa praesentium itaque.', 'approved', NULL, 0, 0, '1976-07-26 04:38:23', '1981-10-12 16:28:19'),
(66, 'Gerlach LLC', 'Rp. 15.000', '8.jpg', '9250 Barrows Underpass', '9J95+Q2 Jambi Jambi City Jambi', 'Non saepe quos id eos ut. Et autem et sed hic autem ut iusto. Provident aliquam impedit non deleniti harum.', 'approved', NULL, 0, 0, '2015-03-17 09:54:19', '2019-12-17 18:35:39'),
(67, 'Bergstrom-Sipes', 'Rp. 15.000', '14.jpg', '31232 Von Points Suite 971', '9J95+Q2 Jambi Jambi City Jambi', 'Odit consequatur et dolor ad. Repellat voluptas sunt aut repellendus et. Et qui beatae repellendus minus. Voluptas ratione atque numquam optio maiores.', 'approved', NULL, 0, 0, '2013-09-29 01:06:20', '1979-11-03 05:35:25'),
(68, 'Barton-Crist', 'Rp. 15.000', '14.jpg', '43217 Parker Expressway', '9J95+Q2 Jambi Jambi City Jambi', 'Non consectetur illo et. Quibusdam quas quo odio aut labore modi ullam. Perferendis quos odit est. Est consequatur ducimus quia libero sequi quibusdam nemo.', 'approved', NULL, 0, 0, '1973-04-14 02:10:45', '2005-06-07 00:08:33'),
(69, 'Eichmann Group', 'Rp. 15.000', '2.jpg', '66850 Spinka Forest', '9J95+Q2 Jambi Jambi City Jambi', 'Exercitationem ut veniam aliquam sunt. Sit et et aut. Vel eos sunt id sunt non. Occaecati eum rerum voluptatem at quam doloremque voluptatem ad.', 'approved', NULL, 0, 0, '1997-08-03 16:10:32', '2001-04-03 02:36:51'),
(70, 'Doyle PLC', 'Rp. 15.000', '4.jpg', '96454 Ike Viaduct', '9J95+Q2 Jambi Jambi City Jambi', 'Eum assumenda quasi et praesentium suscipit rerum voluptates. Quam beatae architecto dolores quas nihil. Omnis minima quia aut animi. Sed error voluptas odit ratione debitis.', 'approved', NULL, 0, 0, '2019-07-17 08:12:52', '1970-11-26 05:48:07'),
(71, 'Waters-Miller', 'Rp. 15.000', '2.jpg', '306 Cayla Crossing Suite 069', '9J95+Q2 Jambi Jambi City Jambi', 'Facere veniam et accusamus voluptatem. Quia voluptatum soluta hic et quia nihil aut. Corporis consequatur mollitia alias. Ex voluptate nostrum animi tenetur.', 'approved', NULL, 0, 0, '2004-04-28 07:03:08', '1995-10-25 21:48:50'),
(72, 'Ruecker-Weissnat', 'Rp. 15.000', '12.jpg', '24133 Maggio Key Suite 285', '9J95+Q2 Jambi Jambi City Jambi', 'Aut enim laborum animi eius dolorem corrupti itaque. Dolorum dolor facilis laudantium eius et ipsum ut ut. Ratione fugiat ab consequatur eos quidem deleniti quia molestiae.', 'approved', NULL, 0, 0, '2007-09-19 21:15:11', '1984-08-11 22:12:30'),
(73, 'Lang, Marvin and Stamm', 'Rp. 15.000', '15.jpg', '42422 Julie Isle', '9J95+Q2 Jambi Jambi City Jambi', 'Omnis recusandae fugiat voluptate ut. Sit magni quas occaecati consectetur nesciunt rerum autem. Eius consequatur in molestiae sed dolorem est.', 'approved', NULL, 0, 0, '2004-06-03 06:50:33', '1977-08-26 22:17:50'),
(74, 'Hills, Baumbach and Effertz', 'Rp. 15.000', '8.jpg', '23341 Avis Trace Suite 793', '9J95+Q2 Jambi Jambi City Jambi', 'Debitis delectus sit reiciendis cumque alias temporibus nihil sit. Sequi deleniti inventore cumque qui vero corrupti. Non rerum harum reiciendis deserunt.', 'approved', NULL, 0, 0, '1995-02-07 06:33:53', '2008-08-16 21:31:16'),
(75, 'Leffler, Becker and Nicolas', 'Rp. 15.000', '7.jpg', '0248 Trudie Harbor', '9J95+Q2 Jambi Jambi City Jambi', 'Tempore eaque debitis doloremque aut. Ut est similique voluptas expedita in adipisci. Consequatur voluptatibus saepe ad placeat laudantium non nostrum cum.', 'approved', NULL, 0, 0, '1975-01-05 07:51:29', '2011-01-31 07:13:53'),
(76, 'Renner-Wuckert', 'Rp. 15.000', '13.jpg', '79287 Arch Alley', '9J95+Q2 Jambi Jambi City Jambi', 'Incidunt consequatur quia aut et ea consequatur sit. Et quas dolores aut assumenda ea placeat molestiae. Qui quis harum nihil laborum quidem qui provident. Dicta voluptatem unde quam porro.', 'approved', NULL, 0, 0, '2009-05-27 12:47:27', '1976-10-02 02:31:31'),
(77, 'Fahey Group', 'Rp. 15.000', '7.jpg', '95390 Patience Manor Apt. 911', '9J95+Q2 Jambi Jambi City Jambi', 'Animi saepe reiciendis distinctio earum veritatis quam. Eligendi dolores quia sunt cupiditate et ducimus rerum. Sit assumenda ex consectetur minus tempore quo aspernatur. Perferendis dignissimos illo maiores autem architecto.', 'approved', NULL, 0, 0, '2002-08-11 07:29:43', '1983-07-15 13:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `souvenir_review`
--

CREATE TABLE `souvenir_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_souvenir` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide`
--

CREATE TABLE `tour_guide` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tarif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_tolak` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pemilik` bigint(20) NOT NULL,
  `id_wilayah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`id`, `tarif`, `deskripsi`, `status`, `alasan_tolak`, `id_pemilik`, `id_wilayah`, `created_at`, `updated_at`) VALUES
(2, 'Rp. 200.000', 'Fasih bahasa inggris', 'pending', NULL, 5, 1, '2020-04-15 20:45:38', '2020-04-15 20:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide_review`
--

CREATE TABLE `tour_guide_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_guide` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `plus_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_usaha` enum('admin','guide','art','homestay','souvenir') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `foto`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `hp`, `wa`, `alamat`, `id_wilayah`, `plus_code`, `jenis_usaha`) VALUES
(1, 'Mr. Admin', '1.jpg', 'wisata@unja.ac.id', '2020-04-12 10:00:00', '$2y$10$dNOuo8mFrVRLRr3LdC4Qx.XqgzxTHp5AzMkW1L235L8EZESGhNUh2', NULL, '2020-04-06 05:44:26', '2020-04-12 16:11:47', '877777', '8999999', 'Jl. Penerangan', 2, 'plus', 'admin'),
(2, 'Mr. Homestay', '2.jpg', 'homestay@gmail.com', '2020-04-10 10:00:00', '$2y$10$PItyJGa/ogkpJgO9mgQ.uO5IrltO..HtXtUCzdGQUSouSSycezz6O', NULL, '2020-04-09 14:51:37', '2020-04-09 15:41:55', '89531632191', '89531632191', 'Jl. Penerangan Jambi', 2, '9G6X+CC Jambi, Jambi City, Jambi', 'homestay'),
(3, 'Mr. Souvenir', '3.jpg', 'souvenir@gmail.com', '2020-03-31 10:00:00', '$2y$10$OKMwdhGV4rcHVemdalA/eep.fDypdt/AUV8yqsHykP7C0BDHSji0G', NULL, '2020-04-09 17:49:10', '2020-04-09 17:50:35', '83333333333', '83333333333', 'Jl. Souvenir Souvenir', 1, '9GFW+VR Jambi, Jambi City, Jambi', 'souvenir'),
(4, 'Mr. Seni', '4.jpg', 'art@gmail.com', '2020-04-07 10:00:00', '$2y$10$0TUlJ3q/olEudUuM9J2Ph.dMt8HBRoMyZBynyG6GIOp8M70Uo3Kmm', NULL, '2020-04-09 18:32:12', '2020-04-09 18:33:02', '839393939', '839393939', 'Jl. Seni Sekali', 1, '9HG7+QV Jambi, Jambi City, Jambi', 'art'),
(5, 'Mr. Guide', '5.jpg', 'guide@gmail.com', '2020-04-07 10:00:00', '$2y$10$Bh/2P7VXpk4X83OpvFQ.4uG/bgX4WqmFwx2DnojbxX5qyt2ZAJCv2', NULL, '2020-04-09 18:45:42', '2020-04-09 18:46:09', '8888888888', '8888888888', 'Jl. Guide Guide', 1, '9HG7+QV Jambi, Jambi City, Jambi', 'guide');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latlang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama`, `deskripsi`, `foto`, `latlang`, `created_at`, `updated_at`) VALUES
(1, 'Kota Jambi', 'lorem ipsum dolor sit amet', 'tempat-wisata-di-jambi-terbaru_1587008944.jpg', '-1.357204, 102.352604', '1988-06-12 22:37:22', '2020-04-15 20:49:04'),
(2, 'Merangin', 'lorem ipsum dolor sit amet', 'kj-gambar-20171112_0KM223_1587008963.jpg', '-1.721866, 102.601330', '1989-11-07 22:12:39', '2020-04-15 20:49:23'),
(3, 'Kerinci', 'lorem ipsum dolor sit amet', 'wisata-kerinci-9-Tempat-Wisata_1587008933.jpg', '-2.055307, 101.887197', '2019-09-21 11:51:07', '2020-04-15 20:48:53'),
(4, 'Bungo', 'lorem ipsum dolor sit amet', 'Tempat-Wisata-di-Muara-Bungo-01_1587008925.jpg', '-1.943531, 102.999772', '1976-05-02 14:44:05', '2020-04-15 20:48:45'),
(6, 'Muaro Jambi', 'lorem ipsum dolor sit amet', 'candi-muaro-jambi-diharapkan-menjadi-wisata-internasional-bzvEjfBLi2_1587009133.jpg', '-1.286144, 101.995995', '1970-03-04 22:31:43', '2020-04-15 20:52:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinasi_review`
--
ALTER TABLE `destinasi_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestay`
--
ALTER TABLE `homestay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestay_review`
--
ALTER TABLE `homestay_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_seni`
--
ALTER TABLE `kelompok_seni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_seni_review`
--
ALTER TABLE `kelompok_seni_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `souvenir`
--
ALTER TABLE `souvenir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `souvenir_review`
--
ALTER TABLE `souvenir_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_guide_review`
--
ALTER TABLE `tour_guide_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `destinasi_review`
--
ALTER TABLE `destinasi_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `homestay`
--
ALTER TABLE `homestay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `homestay_review`
--
ALTER TABLE `homestay_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelompok_seni`
--
ALTER TABLE `kelompok_seni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `kelompok_seni_review`
--
ALTER TABLE `kelompok_seni_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `souvenir`
--
ALTER TABLE `souvenir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `souvenir_review`
--
ALTER TABLE `souvenir_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tour_guide_review`
--
ALTER TABLE `tour_guide_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
