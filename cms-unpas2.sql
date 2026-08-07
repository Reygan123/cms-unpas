-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table nama_database_pmb_anda.acces_departements
CREATE TABLE IF NOT EXISTS `acces_departements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned NOT NULL,
  `id_user` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acces_departements_id_departement_foreign` (`id_departement`),
  KEY `acces_departements_id_user_foreign` (`id_user`),
  CONSTRAINT `acces_departements_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`) ON DELETE CASCADE,
  CONSTRAINT `acces_departements_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.acces_departements: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.achievements
CREATE TABLE IF NOT EXISTS `achievements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `winner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achievements_id_departement_foreign` (`id_departement`),
  CONSTRAINT `achievements_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.achievements: ~7 rows (approximately)
REPLACE INTO `achievements` (`id`, `id_departement`, `title`, `name`, `winner_name`, `category`, `description`, `home`, `image`, `created_at`, `updated_at`) VALUES
	(1, 2, 'AGATE MFUN 2019', 'Third Winner', 'Bakhtiar, Rizky Ramadhan, Hadi Sutarma, Sulthan Ahmad Rasya, Zidan Zulfikar, Rizki Epsa Friansyah', 'nasional', '<p>AGATE MFUN 2019</p>', '1', 'achievements/BaLxWBVk1T9e4oyvrhHRRcCFjEntVPrqoV6iOliL.webp', '2026-06-02 01:16:05', '2026-06-02 01:53:05'),
	(2, 2, 'Juara 1 Lomba Karya Tulis Tentang Bandung', 'Juara 1 Lomba Karya Tulis Tentang Bandung', 'Nofari', 'regional', '<p>Juara 1 Lomba Karya Tulis Tentang Bandung</p>', '1', 'achievements/Fu1PiMTbuOVQUdLWSyIy1BlKivh40FZMtzBCB30a.jpg', '2026-06-02 01:17:50', '2026-06-02 01:52:56'),
	(3, 2, 'Finalist LO kreatif 2024', 'Finalist LO kreatif 2024', 'Handoko Supeno, Adam, Harish Arya Revano, Raden Indra Prawijaya, Muhammad Nadjrilillah', 'internasional', '<p>Finalist LO kreatif 2024</p>', '1', 'achievements/wc6ujZCdJcipkmTgpNXPiWtXaQnFotEuk2agQNhT.jpg', '2026-06-02 01:26:03', '2026-06-02 01:53:25'),
	(4, 1, 'Participant of SAKURA SCIENCE Exchange Program 2023', 'Participant of SAKURA SCIENCE Exchange Program 2023', 'Panji Andhika Habibie Feni', 'internasional', '<p>Participant of SAKURA SCIENCE Exchange Program 2023</p>', NULL, 'achievements/wPJrDazZhHIMLa9JiWhREOjxD2Ni9zQsnuNz7yUz.jpg', '2026-06-02 22:09:52', '2026-06-02 22:09:52'),
	(5, 1, 'Best Presentation Team – The 4th Sakura Science Alumni SDGs Workshops 2024', 'Best Presentation Team – The 4th Sakura Science Alumni SDGs Workshops 2024', 'Panji Andika Habibie Feni', 'internasional', '<p>Best Presentation Team &ndash; The 4th Sakura Science Alumni SDGs Workshops 2024</p>', NULL, 'achievements/0DXx9kMCHCWgXIhTSecMzUVtdltf6WFym0YqwG0I.jpg', '2026-06-02 22:11:57', '2026-06-02 22:11:57'),
	(6, 3, 'Top 10 Winners for their Business Plan and Presentation at the BINUS Business Plan Competition 2024', 'Top 10 Winners for their Business Plan and Presentation at the BINUS Business Plan Competition 2024', 'Ilham Moreno Wilan, Rifki Abi Rahayu, Fiska Oktaviyani,', 'regional', '<p>Top 10 Winners for their Business Plan and Presentation at the BINUS Business Plan Competition 2024</p>', NULL, 'achievements/MJsvso0J4eTjfBjrHIl2glzeun7eqszGoLGat8RK.jpg', '2026-06-03 01:10:08', '2026-06-03 01:15:31'),
	(7, 3, 'Juara 3 Pitching Competition', 'Brew Fusion', 'Brew Fusion', 'regional', '<p>Juara 3 Pitching Competition</p>', '1', 'achievements/QkYxdnEm6NqA7SvtQyceAgmZi7fXAyQurinNOfjB.png', '2026-06-03 01:13:24', '2026-06-03 01:15:43'),
	(8, 5, '2nd Winner of World Food Day National HICO Business Plan Competition', '2nd Winner of World Food Day National HICO Business Plan Competition', 'Nazla Nur Mauldy, Rahma Yulia Sudirman, Kemas Ramadhani Imannudin', 'nasional', '<p>2nd Winner of World Food Day National HICO Business Plan Competition</p>', '1', 'achievements/PfHIcs1dz2AtfTPSoLiB399mLW076H6aDfpOoSSF.png', '2026-06-03 02:56:09', '2026-06-03 02:56:09');

-- Dumping structure for table nama_database_pmb_anda.agendas
CREATE TABLE IF NOT EXISTS `agendas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.agendas: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.analytics
CREATE TABLE IF NOT EXISTS `analytics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `google` text COLLATE utf8mb4_unicode_ci,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `chat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.analytics: ~0 rows (approximately)
REPLACE INTO `analytics` (`id`, `google`, `meta`, `chat`, `created_at`, `updated_at`) VALUES
	(1, 'ini contoh google analytic', 'Deskripsi website kamu', 'Hallo Minpas, Saya mau info pendaftaran mahasiswa baru untuk tahun ini!', NULL, NULL);

-- Dumping structure for table nama_database_pmb_anda.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.cache: ~6 rows (approximately)
REPLACE INTO `cache` (`key`, `value`, `expiration`) VALUES
	('902e63a8f8b6742c85bc74baf1f46dee', 'i:2;', 1780640438),
	('902e63a8f8b6742c85bc74baf1f46dee:timer', 'i:1780640438;', 1780640438),
	('admin@gmail.com|127.0.0.1', 'i:1;', 1780375994),
	('admin@gmail.com|127.0.0.1:timer', 'i:1780375994;', 1780375994),
	('c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1780375994),
	('c525a5357e97fef8d3db25841c86da1a:timer', 'i:1780375994;', 1780375994);

-- Dumping structure for table nama_database_pmb_anda.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.cache_locks: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.categories: ~2 rows (approximately)
REPLACE INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'Artikel', 'images/categories/article.jpg', NULL, NULL),
	(2, 'Berita', 'images/categories/news.jpg', NULL, NULL);

-- Dumping structure for table nama_database_pmb_anda.data_values
CREATE TABLE IF NOT EXISTS `data_values` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.data_values: ~0 rows (approximately)
REPLACE INTO `data_values` (`id`, `title1`, `title2`, `title3`, `title4`, `data1`, `data2`, `data3`, `data4`, `value1`, `value2`, `value3`, `value4`, `created_at`, `updated_at`) VALUES
	(1, 'Mahasiswa', 'Lulusan', 'Program Studi', 'Prestasi', '9112', '9877436', '44', '2139', 'Some value 1', 'Some value 2', 'Some value 3', 'Some value 4', '2026-06-01 21:05:17', '2026-06-01 21:05:17');

-- Dumping structure for table nama_database_pmb_anda.departements
CREATE TABLE IF NOT EXISTS `departements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akreditasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description1` text COLLATE utf8mb4_unicode_ci,
  `description2` text COLLATE utf8mb4_unicode_ci,
  `description3` text COLLATE utf8mb4_unicode_ci,
  `description4` text COLLATE utf8mb4_unicode_ci,
  `image1` text COLLATE utf8mb4_unicode_ci,
  `image2` text COLLATE utf8mb4_unicode_ci,
  `image3` text COLLATE utf8mb4_unicode_ci,
  `image4` text COLLATE utf8mb4_unicode_ci,
  `color1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `link1` text COLLATE utf8mb4_unicode_ci,
  `link2` text COLLATE utf8mb4_unicode_ci,
  `link3` text COLLATE utf8mb4_unicode_ci,
  `link4` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.departements: ~5 rows (approximately)
REPLACE INTO `departements` (`id`, `name`, `slug`, `akreditasi`, `tagline`, `yt_id`, `instagram`, `tiktok`, `youtube`, `facebook`, `statistik1`, `statistik2`, `statistik3`, `statistik4`, `title1`, `title2`, `title3`, `title4`, `description1`, `description2`, `description3`, `description4`, `image1`, `image2`, `image3`, `image4`, `color1`, `color2`, `address`, `map`, `link1`, `link2`, `link3`, `link4`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Teknik Lingkungan', 'teknik-lingkungan', 'Unggul', 'Sustainable Environmental Engineering and Management', 'ggSnw3MSfIE', '-', '-', '-', '-', '238', '699', '40', '24', 'Jadi Pelopor Solusi Lingkungan Masa Depan bersama Teknik Lingkungan UNPAS - Sustainable Environmental Engineering and Management', 'Menjadi Pemimpin Inovasi Lingkungan Berbasis Islam dan Sunda', 'Kenapa Harus Teknik Lingkungan UNPAS?', 'Perubahan Iklim Tak Menunggu Saatnya Kamu Ambil Peran!', '<p><strong>Saatnya Membentuk Masa Depan Lingkungan yang Lebih Baik!</strong><br />\r\nTeknik Lingkungan UNPAS adalah tempatmu menggabungkan sains, teknologi, dan kearifan lokal untuk menciptakan inovasi berkelanjutan. Dengan kurikulum mutakhir dan pendekatan berbasis komunitas, kami mencetak ahli lingkungan yang siap menjawab tantangan dunia nyata.</p>', '<p>Program Studi Teknik Lingkungan UNPAS telah terakreditasi <em>Unggul</em> dan berkomitmen mencetak lulusan yang siap menghadapi tantangan global dengan pendekatan teknologi cerdas, keberlanjutan, dan pemberdayaan masyarakat.</p>\r\n\r\n<p>Visi : Menjadi Penyelenggara Pendidikan Teknik Lingkungan yang Mendapatkan Pengakuan Internasional dengan Dijiwai Oleh Nilai Islam dan Sunda di tahun 2037</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Misi:</p>\r\n\r\n<ol>\r\n	<li style="list-style-type:decimal">1.Menyelenggarakan pendidikan tinggi teknik lingkungan yang unggul dan diakui nasional berakreditasi unggul dan internasional, dengan nyantri , nyunda, nyakola, inovatif.</li>\r\n	<li style="list-style-type:decimal">2.Melaksanakan penelitian yang berkualitas internasional yang mampu memberikan kebaruan dalam pengembangan keilmuan rumpun ilmu Teknik Lingkungan.</li>\r\n	<li style="list-style-type:decimal">3.Menghasilkan lulusan sarjana Teknik Lingkungan yang bersaing secara skala nasional dan internasional, dengan pembekalan keahlian, ketrampilan yang tersertifikasi.</li>\r\n	<li style="list-style-type:decimal">4.Menghasilkan karya riset bidang Teknik Lingkungan yang mampu memberikan kontribusi kepada masyarakat, pemerintah, swasta secara nasional maupun internasional.\r\n	<ol>\r\n		<li style="list-style-type:decimal">5.Membangun brand image yang kuat sebagai lembaga professional Pendidikan Teknik Lingkungan dan menjadi kebanggaan masyarakat.</li>\r\n	</ol>\r\n	</li>\r\n</ol>', '<p>1.<strong>Akreditasi Unggul &amp; Reputasi Terpercaya</strong><br />\r\nProgram Studi Teknik Lingkungan dengan rekognisi nasional dan internasional.</p>\r\n\r\n<p>2.<strong>Kurikulum Berbasis OBE, KKNI, dan MBKM</strong><br />\r\nDidesain untuk menjawab kebutuhan industri, pemerintahan, dan masyarakat global.</p>\r\n\r\n<p>3.<strong>Fokus pada Solusi Nyata &amp; Inovatif</strong><br />\r\nIoT, Infrastruktur Cerdas, dan pendekatan komunitas sebagai strategi utama pembelajaran.</p>\r\n\r\n<p>4. J<strong>aringan Luas &amp; Kolaborasi Industri</strong><br />\r\nPeluang riset, magang, dan inovasi bersama institusi ternama.</p>\r\n\r\n<p>5.<strong>Nilai Budaya Lokal yang Kuat</strong><br />\r\nMenggabungkan nilai Islam dan Sunda dalam setiap proses pembelajaran dan kontribusi nyata.</p>\r\n\r\n<p>6.<strong>Prestasi &amp; Publikasi Meningkat</strong><br />\r\nLebih dari 40 publikasi dan puluhan pengakuan internasional dan nasional dalam 3 tahun terakhir.</p>', '<p>Dunia sedang krisis lingkungan. Jadilah bagian dari solusi, bukan hanya penonton. Teknik Lingkungan UNPAS menyiapkanmu menjadi pemimpin perubahan yang berkelanjutan.</p>', 'departement-image/NFeBHDpIuSfuJqieIT4i1g8r1MtPIhukbggbXhbF.webp', 'departement-image/IjbT9xn5OBGNTJTnIn4HjxfYFFeWAELLoA5GP1V6.webp', 'departement-image/0znXm28hRLvXmbiEYwg76VSbfdeIurJnDox0gIdb.webp', 'departement-image/mxflyZnNMCEFyGxsIchckQZCabcZwphtCz89Gj80.webp', '#43cb5e', '#1ca079', '<p>-</p>', '-', '-', '-', '-', '-', 'active', '2026-06-01 23:53:25', '2026-06-02 23:37:29'),
	(2, 'Teknik Informatika', 'teknik-informatika', 'B', 'Coding the Future, Shaping the World', 'wabbzqUHH4c', '-', '-', '-', '-', '-', '2224', '-', '-', 'Coding the Future, Shaping the World — Saatnya Bangun Masa Depan Digitalmu di Teknik Informatika!', 'Menjadi Pusat Inovasi Teknologi Berbasis Nilai Budaya dan Technopreneurship', 'Kenapa Harus Teknik Informatika UNPAS?', 'Era Digital Berlangsung Cepat — Kamu Mau Jadi Inovator atau Tertinggal?', '<p><strong>Gabung dan Jadi Pencipta Solusi Teknologi Masa Depan!</strong><br />\r\nTeknik Informatika UNPAS hadir sebagai tempat bertemunya kearifan lokal dan inovasi global. Di sini kamu akan belajar coding, kecerdasan buatan, keamanan siber, pengembangan aplikasi, dan technopreneurship semua yang kamu butuhkan untuk bersaing dan berinovasi di era digital.</p>', '<p>Program Studi Teknik Informatika terus berkembang menuju standar tertinggi nasional dan menghasilkan solusi teknologi berbasis technopreneurship dengan karakter keislaman dan kesundaan.</p>\r\n\r\n<p>Visi&nbsp;</p>\r\n\r\n<p>Menjadi penyelenggara pendidikan tinggi teknik informatika yang unggul di bidang komputing, dengan mengedepankan kemampuan technopreneurship serta memiliki jati diri keislaman dan kesundaan di tahun 2037</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Misi</p>\r\n\r\n<p>1) Menyelenggarakan proses pendidikan berbasis kompetensi kanggo merangan bodo jeung kokoro, pengkuh agamana, dan jembar budayana, guna menghasilkan ahli informatika, berjiwa teknoprener dengan wawasan dan kemampuan akademik serta teknis yang diperlukan untuk membangun solusi informatika.</p>\r\n\r\n<p>2) Menyelenggarakan kegiatan penelitian keinformatikaan untuk mengembangkan, menggali, menghasilkan, dan memperkaya keilmuan dan teknologi bidang keinformatikaan yang dipublikasikan di tingkat nasional dan internasional, guna diterapkan di masyarakat secara berkelanjutan.</p>\r\n\r\n<p>3) Menyelenggarakan kegiatan untuk menghasilkan technopreneurship dengan karya terapan informatika yang berkontribusi pada masyarakat dan bangsa.</p>\r\n\r\n<p>Tujuan</p>\r\n\r\n<p>1) Menghasilkan lulusan yang memiliki informatika, berjiwa technopreneur dengan wawasan dan kemampuan akademik serta teknis yang diperlukan untuk membangun solusi informatika.</p>\r\n\r\n<p>2) Menghasilkan hasil penelitian keilmuan dan teknologi bidang keinformatikaan yang dipublikasikan di tingkat nasional dan internasional, guna diterapkan di masyarakat secara berkelanjutan.</p>\r\n\r\n<p>3) Menghasilkan technopreneur dengan karya terapan informatika yang berkontribusi pada masyarakat dan bangsa.</p>', '<p>1. <strong>Kurikulum Technopreneurship</strong><br />\r\nKombinasi coding, bisnis digital, dan inovasi teknologi.</p>\r\n\r\n<p>2. <strong>Kolaborasi Akademik &amp; Industri</strong><br />\r\nMagang, riset kolaboratif, dan networking dengan industri top.</p>\r\n\r\n<p><strong>3. Teknologi Masa Depan</strong><br />\r\nBelajar AI, cybersecurity, big data, dan digital development.</p>\r\n\r\n<p>4. <strong>Dosen Praktisi Profesional</strong><br />\r\nLangsung dibimbing oleh pakar industri dan akademisi.</p>\r\n\r\n<p>5. <strong>Nilai Budaya yang Kuat</strong><br />\r\nMenggabungkan nilai-nilai keislaman dan kesundaan dalam inovasi teknologi.</p>', '<p>Teknologi berkembang pesat dan dunia butuh lebih banyak pencipta, bukan sekadar pengguna. Sekaranglah waktunya menjadi bagian dari revolusi digital bersama Teknik Informatika UNPAS!</p>', 'departement-image/d1MSbphDO3h27TdtjWSwCrA7btSbows8OYlYDigw.webp', 'departement-image/iXFDbUFa8brRF1u8501OvXbxQx0ucc2CRBdvZPDA.webp', 'departement-image/3Ua6cxuudlBwkyF3vY2JZuOfat0xAYrD4UTp8orE.webp', 'departement-image/LG7JHpaYhDL1f8HUCc2PRa2DeWXZqtYlfhLql9MX.webp', '#4197cb', '#4197cb', '<p>-</p>', '-', '-', '-', '-', '-', 'active', '2026-06-02 00:09:50', '2026-06-02 00:12:01'),
	(3, 'Teknik Industri', 'teknik-industri', 'Unggul', 'Kembali ke KAMPUS (Kolaborasi Akademik, Mahasiswa, Pengajar, dan Alumni Unpas) Menjadikan TI Semakin Lebih Baik', '5uc1OsJ6fGI', '-', '-', '-', '-', '748', '7303', '7', '3', 'Teknik Industri: Inovasi dan Efisiensi untuk Masa Depan Industri!', 'Membangun Insinyur Industri yang Adaptif, Inovatif, dan Berdaya Saing Global', 'Kenapa Harus Memilih Teknik Industri?', 'Bersiaplah Menjadi Ahli Teknik Industri yang Inovatif!', '<p>Siapkan Diri Menjadi Ahli Teknik Industri yang Mampu Mewujudkan Solusi Cerdas dan Efektif!</p>', '<p>Program Studi Teknik Industri telah terakreditasi &quot;Unggul&quot; dengan pendekatan berbasis Outcome-Based Education (OBE) yang mencetak lulusan siap bersaing di pasar kerja global.</p>\r\n\r\n<p>Visi</p>\r\n\r\n<p>Menjadi Penyelenggara Pendidikan Tinggi Teknik Industri yang inovatif dan unggul serta berbudaya kewirausahaan dalam perancangan, pengoperasian dan perbaikan sistem industri pada tahun 2037</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Misi</p>\r\n\r\n<p>Misi Program Studi Teknik Industri Universitas Pasundan adalah sebagai berikut:</p>\r\n\r\n<p>1. Melaksanakan pendidikan, penelitian, dan pengabdian kepada masyarakat (Tridharma Perguruan Tinggi) yang unggul dalam bidang perancangan, pengoperasian, dan perbaikan sistem industri.</p>\r\n\r\n<p>2. Menyelenggarakan penelitian untuk mengembangkan ilmu dan teknologi dalam bidang Teknik Industri;</p>\r\n\r\n<p>3. Ikut berperan aktif dalam pengabdian kepada masyarakat dengan menyebarluaskan aplikasi Teknik Industri untuk mendorong dan membantu perkembangan industri kecil, menengah dan besar;</p>\r\n\r\n<p>4. Aktif berkontribusi dalam berbagai forum akademik, baik di tingkat nasional maupun internasional;</p>\r\n\r\n<p>5. Bekerjasama dalam bidang pendidikan, penelitian dan pengabdian kepada masyarakat dengan institusi dalam dan luar negeri</p>', '<p>1) Akreditasi &ldquo;Unggul&rdquo;<br />\r\nJaminan standar pendidikan berkualitas dan diakui secara nasional serta internasional.</p>\r\n\r\n<p>2) Jaringan Alumni yang Luas<br />\r\nLebih dari 7.000 lulusan sukses berkarier di berbagai sektor industri.</p>\r\n\r\n<p>3) Kurikulum Berbasis Industri<br />\r\nDidesain untuk membekali mahasiswa dengan keterampilan yang sesuai dengan tuntutan pasar kerja.</p>\r\n\r\n<p>4) Kolaborasi dengan Perusahaan dan Akademisi<br />\r\nMemperluas wawasan serta memberikan akses ke peluang kerja sama dengan industri global.</p>\r\n\r\n<p>5) Dosen Berpengalaman dan Praktisi<br />\r\nDibimbing langsung oleh para ahli yang memiliki pengalaman nyata di dunia industri dan akademik.</p>', '<p>Dunia industri terus berkembang, dan Anda butuh keahlian serta wawasan yang tepat untuk bersaing. Teknik Industri membuka jalan bagi Anda untuk menjadi profesional yang siap menghadapi tantangan industri masa depan!</p>', 'departement-image/72kDm0T4kvzrsGzci7sa4GnAYt7iv1JooVGtR1BQ.webp', 'departement-image/YQRNOwODvufjy1fLd71y6t1fanpIrRMCfX2u8joU.webp', 'departement-image/OuwPnXGt6pzeZeGFsbC2hW8C1XetjxyqMnmdCHSK.webp', 'departement-image/b2XJoXFtmwgG3PUBtebrTNIpJueTdgYr48Gihy35.webp', '#4197cb', '#4197cb', '<p>-</p>', '-', '-', '-', '-', '-', 'active', '2026-06-02 00:16:06', '2026-06-02 00:18:18'),
	(4, 'Teknik Mesin', 'teknik-mesin', 'Unggul BAN-PT', '#mesinunpas', '-', '-', '-', '-', '-', '500', '2500', '-', '50', 'Teknik Mesin UNPAS: Rancang Inovasi, Kendalikan Teknologi, dan Kuasai Masa Depan!', 'Menuju Komunitas Akademik Internasional Berlandaskan Nilai Luhur', 'Kenapa Harus Memilih Teknik Mesin UNPAS?', 'Dunia Otomatisasi Terus Maju, Pastikan Kamu Berada di Garis Depan!', '<p>Siapkan Dirimu Menjadi Insinyur Profesional Berstandar Internasional yang Siap Mengubah Dunia!</p>', '<p>Mencetak lulusan yang tidak hanya unggul di bidang akademik, tetapi juga adaptif dan memiliki daya saing global berakar pada nilai budaya.&nbsp;</p>\r\n\r\n<p><strong>Visi</strong> Menjadi Penyelenggara Pendidikan Tinggi Teknik Mesin Sepuluh Besar Nasional Menuju Komunitas Akademik Peringkat Internasional yang mengusung nilai kesundaan dan keislaman.</p>\r\n\r\n<p><strong>Misi</strong></p>\r\n\r\n<ol>\r\n	<li style="list-style-type:decimal">Menyelenggarakan pendidikan Teknik Mesin berkualitas tinggi untuk menghasilkan lulusan yang kompeten, kompetitif, serta menjunjung tinggi nilai kesundaan dan keislaman.</li>\r\n	<li style="list-style-type:decimal">Mengembangkan penelitian kreatif, aplikatif, dan berstandar internasional di bidang rekayasa mekanikal untuk memajukan IPTEK.</li>\r\n	<li style="list-style-type:decimal">Melaksanakan pengabdian kepada masyarakat berbasis teknologi tepat guna demi memberikan solusi nyata atas kebutuhan industri dan komunitas.</li>\r\n	<li style="list-style-type:decimal">Membangun kemitraan strategis di tingkat nasional maupun internasional guna memperluas jaringan riset, sertifikasi, dan peluang karier mahasiswa</li>\r\n</ol>', '<p>Kenapa Harus Memilih Teknik Mesin UNPAS?</p>\r\n\r\n<ol>\r\n	<li style="list-style-type:decimal"><strong>Akreditasi &quot;Unggul&quot; dari BAN-PT</strong> Jaminan kualitas pendidikan dengan standar tertinggi yang diakui secara nasional untuk mendukung masa depan kariermu.</li>\r\n	<li style="list-style-type:decimal"><strong>Kurikulum Global Diakui IIW</strong> Satu-satunya keunggulan di mana kurikulum kita telah direkognisi oleh <em>The International Institute of Welding</em> (IIW), memberikanmu keunggulan kompetitif di bidang pengelasan dan manufaktur global.</li>\r\n	<li style="list-style-type:decimal"><strong>Sertifikasi Internasional Solidworks (CSWA/CSWP/CSWPA)</strong> Kamu tidak hanya belajar teori, tapi juga langsung dibekali keahlian CAD/CAE dalam desain sistem mekanikal yang tersertifikasi resmi oleh Solidworks berskala internasional.</li>\r\n	<li style="list-style-type:decimal"><strong>Komunitas Mahasiswa Berprestasi</strong> Bergabunglah dengan lingkungan yang kompetitif! Teknik Mesin UNPAS bangga memiliki lebih dari 50 prestasi di tingkat nasional hingga internasional yang diraih lewat berbagai kegiatan kemahasiswaan.</li>\r\n</ol>\r\n\r\n<p><strong>Jaringan Lulusan yang Solid</strong> Menjadi bagian dari keluarga besar dengan lebih dari 2.500 lulusan yang telah sukses berkarier di berbagai sektor industri strategis.</p>', '<p>Industri global membutuhkan ahli rekayasa mesin yang memiliki sertifikasi resmi dan diakui secara internasional. Bersama Teknik Mesin UNPAS, kamu tidak hanya sekadar kuliah, tapi dibentuk menjadi inovator siap pakai yang dicari oleh industri masa depan. Ambil langkah pertamamu sekarang!</p>', 'departement-image/mG7gpQm7W9AOQ7pspUPjpSBL9JbJ7xrYssjSZ0bx.webp', 'departement-image/e8YXDY3sTap7B28uCidtzPL3YgsOQ561r47QReiW.webp', 'departement-image/7jvJ7zPnL3ZzLLGkQ8P021k2blXwC9rS9D37RYWc.webp', 'departement-image/BffoNUHhq8JAPcjJ73GSOAItBYXtY4j41O2V3LeL.webp', '#4197cb', '#4197cb', '<p>-</p>', '-', '-', '-', '-', '-', 'active', '2026-06-03 01:25:10', '2026-06-03 01:30:55'),
	(5, 'Teknologi Pangan', 'teknologi-pangan', 'Unggul', 'HANDAL, SMART, TERKEMUKA', '-', '-', '-', '-', '-', '666', '-', '-', '4', 'Pelopor Inovasi Pangan, Sehatkan Bangsa, dan Kuasai Industri Global!', 'Mengembangkan Inovasi Pangan Berkelanjutan dengan Karakter Luhur', 'Kenapa Harus Memilih Teknologi Pangan Unpas?', 'Kebutuhan Pangan Dunia Terus Berubah, Jadilah Solusi di Garis Depan!', '<p>Bergabunglah Bersama Program Studi Teknologi Pangan Tertua di Indonesia yang Siap Mencetak Ahli Pangan Masa Depan!</p>', '<p>Menjadi pusat keunggulan teknologi pangan yang diakui dunia dengan tetap menjunjung tinggi identitas budaya dan nilai spiritual.&nbsp;</p>\r\n\r\n<p><strong>Visi</strong> Menjadi Program Studi Teknologi Pangan Yang Unggul Dalam Pengembangan Ilmu Dan Teknologi Pangan Dengan Kekhasan Nilai Islam Dan Sunda Serta Mendapatkan Pengakuan Internasional Pada Tahun 2037.</p>\r\n\r\n<p><strong>Misi</strong></p>\r\n\r\n<ol>\r\n	<li style="list-style-type:decimal">Menyelenggarakan pendidikan tinggi di bidang teknologi pangan yang berkualitas dan diakui secara nasional serta internasional dengan menerapkan nilai-nilai nyantri, nyunda, nyakola, dan inovatif.</li>\r\n	<li style="list-style-type:decimal">Melaksanakan penelitian yang berkualitas Nasional maupun internasional dalam pengembangan ilmu dan teknologi pangan yang berkelanjutan dan bermanfaat bagi ketahanan pangan nasional.</li>\r\n	<li style="list-style-type:decimal">Menyelenggarakan pengabdian kepada masyarakat di bidang teknologi pangan untuk meningkatkan martabat manusia.</li>\r\n	<li style="list-style-type:decimal">Menghasilkan lulusan sarjana teknologi pangan yang memiliki daya saing tinggi secara nasional dan internasional, dengan pembekalan keahlian dan keterampilan yang tersertifikasi.</li>\r\n	<li style="list-style-type:decimal">Mengembangkan kemitraan strategis dengan Pemerintahan dan Lembaga Penelitian, Masyarakat, Akademisi, Dunia Usaha dan Industri Pangan, serta media di dalam dan luar negeri untuk penguatan program studi.</li>\r\n</ol>', '<ul>\r\n	<li style="list-style-type:disc">Pelopor &amp; Tertua di Indonesia Berdiri sejak tahun 1961, kami memiliki pengalaman matang dalam dunia pendidikan pangan. Menjaga tradisi mutu dengan Akreditasi A sejak 1996 hingga meraih predikat &quot;Unggul&quot; dari BAN-PT.</li>\r\n	<li style="list-style-type:disc">Standar Mutu Internasional &amp; Lab Terakreditasi Proses belajarmu dijamin oleh manajemen standar ISO 9001:2015 serta didukung penuh oleh Laboratorium yang telah Terakreditasi ISO 17025&mdash;memastikan praktik analisismu setara dengan standar industri nyata.</li>\r\n	<li style="list-style-type:disc">Kurikulum Berkarakter &amp; Inovatif Kamu akan dibentuk menjadi sarjana yang tidak hanya cerdas (<em>nyakola</em>) dan inovatif, tetapi juga memiliki integritas moral yang kuat melalui pendekatan nilai <em>nyantri</em> dan <em>nyunda</em>.</li>\r\n	<li style="list-style-type:disc">Lulusan Bersertifikasi &amp; Siap Kerja Setiap mahasiswa dibekali dengan keahlian khusus dan sertifikasi profesi, membuat jalanmu berkarier di industri pangan nasional maupun internasional terbuka sangat lebar.</li>\r\n	<li style="list-style-type:disc">Kultur Akademik Berprestasi Lingkungan belajar yang suportif mendorong mahasiswa untuk terus aktif berinovasi, terbukti dengan berbagai capaian prestasi yang membanggakan di bidang teknologi pangan.</li>\r\n</ul>', '<p>Tantangan ketahanan pangan dan kebutuhan akan produk makanan yang sehat serta aman kini semakin krusial. Bersama Teknologi Pangan UNPAS, kamu tidak hanya sekadar belajar teori, tapi ditempa menjadi inovator pangan yang dicari oleh industri global. Jangan lewatkan kesempatanmu untuk belajar dari yang terbaik!</p>', 'departement-image/fG6rOTXq4u8OzwyUgNWnHMQWlo5ESRx8Fiqvh7Ez.webp', 'departement-image/7hLGAnWh6ETJ7ocY5Opzp4gJm51rU3GtTjX1Qnrh.webp', 'departement-image/rVk9CIEc3gN7zLC3knydcOfPuLoqTmMpwloSnnIR.webp', 'departement-image/fIUCKoBE8QQQe5jenq6HCloEeoSPZmsYKpNijCJO.webp', '#4197cb', '#4197cb', '<p>-</p>', '-', '-', '-', '-', '-', 'active', '2026-06-03 02:34:05', '2026-06-03 02:36:49');

-- Dumping structure for table nama_database_pmb_anda.facilities
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facilities_id_departement_foreign` (`id_departement`),
  CONSTRAINT `facilities_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.facilities: ~4 rows (approximately)
REPLACE INTO `facilities` (`id`, `id_departement`, `title`, `subtitle`, `description`, `home`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `yt`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Laboratium Mekanika Fluida', 'Laboratium Mekanika Fluida', '<p>Laboratium Mekanika Fluida</p>', '1', 'facilities/iWeFImOdmfLGORFDnbi8FeuEeKPTfqcyVjVWra9k.webp', 'facilities/E7IPn4hQQTvCRqrCm3wafiwRINQ5hCg50FhQiaMt.webp', 'facilities/uS2bwmgY6kwgTu9sQ118iAAqNGHp3G4ehHqYMNmW.webp', 'facilities/DMLAbrjRtTM6hDzbdNC5kWGBJY83LhxepcFywKcS.webp', 'facilities/wsB8IiXuu65D8qNn8tbBncgIuhJRJLkVTeMG9t5N.webp', 'facilities/vW50UMvJwQQKZ1SSkMCNTGfOOdtFGsX4p5HkHQQl.webp', NULL, '2026-06-02 01:02:43', '2026-06-02 01:02:43'),
	(2, 1, 'Alat Jar', 'Alat Jar', '<p>Alat Jar</p>', '1', 'facilities/wLsismD2xDJZ9OdXEYYh64IiT4UDDUab8TA1xEQO.webp', 'facilities/UwOBo3E7lPBzE2bVMNqhmLwyML3av7Id3NurQQuj.webp', 'facilities/rQhVd6Ew1W2svokUsuG9dpxjree5CyjFQ20Etkg4.webp', 'facilities/QvZShvQpTViFEfDYdNS5yR2xdMJtACJ9r5qSgIgN.webp', 'facilities/SmThDhzVF3l3qSMoaDu47ighlASGazQyEC94zb20.webp', 'facilities/wXBYL2h7drUlK8knefITZTE6yBaXSMTLmnOMd8B2.webp', NULL, '2026-06-02 01:04:13', '2026-06-02 01:54:31'),
	(3, 1, 'Laboratorium Digital', 'Laboratorium Digital', '<p>Laboratorium Digital</p>', '1', 'facilities/KdU70XwhQ23FiaCmvhQ5FoUJ37M6GMJXtNl6FZCx.webp', 'facilities/ukwgg4pI8OfkiO1HUBCM530441hhDf7DZMAMaSku.webp', 'facilities/xm8xKG5dlzdPYtFItWAjqFqmaH7Fr5rXGG7f6RrB.webp', 'facilities/DwLMeO0T6gTYU7r7stDbW4EvtV4N8uSncMKQb1bp.webp', 'facilities/gICOdrfNvVDYLG4uc57XaXAalTRN3nEDfBMLI65t.webp', 'facilities/LuJ6kKrAoHhl3SSVmU61SnlpR3OvkMHIc3R0iVRW.webp', NULL, '2026-06-02 01:05:20', '2026-06-02 01:54:41'),
	(4, 1, 'Praktikum Mikrobiologi Lingkungan', 'Praktikum Mikrobiologi Lingkungan', '<p>Praktikum Mikrobiologi Lingkungan</p>', '1', 'facilities/oJ60hcorhl7eOYSjSYnzBqMqjcDzYRWIs745LtwU.webp', 'facilities/zL3BemKRmdIw7Ld7VBBO0gRsnfsn5Rq8JXX4KGR5.webp', 'facilities/onlczSAIB4MA2Tv438Mxu3xI41qzGYgsdxjcGUpY.webp', 'facilities/B94srJZ2T0uDd1DOmoNENfWZeaeZkEwM6ryYraNL.webp', 'facilities/WL70jEZ4cI6m1LZyXyHLnnd3TF0eb7WVgzyRgSNB.webp', 'facilities/bYaQDO9MhrvD3hyhAb9Bjywih1GveqIJ7awtKdLx.webp', NULL, '2026-06-02 01:06:20', '2026-06-02 01:54:49');

-- Dumping structure for table nama_database_pmb_anda.faculties
CREATE TABLE IF NOT EXISTS `faculties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akreditasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_team` bigint unsigned DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistik4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description1` text COLLATE utf8mb4_unicode_ci,
  `description2` text COLLATE utf8mb4_unicode_ci,
  `description3` text COLLATE utf8mb4_unicode_ci,
  `description4` text COLLATE utf8mb4_unicode_ci,
  `image1` text COLLATE utf8mb4_unicode_ci,
  `image2` text COLLATE utf8mb4_unicode_ci,
  `image3` text COLLATE utf8mb4_unicode_ci,
  `image4` text COLLATE utf8mb4_unicode_ci,
  `color1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `link1` text COLLATE utf8mb4_unicode_ci,
  `link2` text COLLATE utf8mb4_unicode_ci,
  `link3` text COLLATE utf8mb4_unicode_ci,
  `link4` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faculties_id_team_foreign` (`id_team`),
  CONSTRAINT `faculties_id_team_foreign` FOREIGN KEY (`id_team`) REFERENCES `ourteams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.faculties: ~0 rows (approximately)
REPLACE INTO `faculties` (`id`, `name`, `akreditasi`, `tagline`, `yt_id`, `id_team`, `instagram`, `tiktok`, `youtube`, `facebook`, `statistik1`, `statistik2`, `statistik3`, `statistik4`, `title1`, `title2`, `title3`, `title4`, `description1`, `description2`, `description3`, `description4`, `image1`, `image2`, `image3`, `image4`, `color1`, `color2`, `address`, `map`, `link1`, `link2`, `link3`, `link4`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Fakultas Teknik', 'Unggul', 'Sustainable Environmental Engineering and Management', 'wabbzqUHH4c&t=1s', NULL, '-', '-', '-', '-', '238', '699', '40', '34', 'Fakultas Teknik', 'Mencetak Inovator Masa Depan: Siap Kerja, Berdaya Saing Tinggi, Mampu Berdikari.', 'Kenapa Harus Teknik UNPAS?', 'Perubahan Iklim Tak Menunggu Saatnya Kamu Ambil Peran!', '<p>Assalamu&rsquo;alaikum Warahmatullaahi Wabarokatuh.</p>\r\n\r\n<p>Selamat datang di Official Website Fakultas Teknik Unpas, sebuah lembaga yang berdedikasi untuk membina para inovator dan pemimpin masa depan dengan landasan nilai-nilai Keislaman dan Kebudayaan Sunda. Dalam perjalanan kami menuju tahun 2037, kami berkomitmen untuk menjadi Entrepreneurial University yang tidak hanya unggul dalam teknologi dan inovasi, tetapi juga kuat dalam jati diri dan nilai.</p>\r\n\r\n<p>Kami percaya bahwa teknik dan teknologi adalah kunci untuk memecahkan banyak tantangan global saat ini. Namun, tanpa disertai dengan nilai dan etika, kemajuan tersebut tidak akan berkelanjutan.&nbsp;</p>\r\n\r\n<p>Dalam perjalanan menuju visi besar ini, kami mengajak seluruh mahasiswa, dosen, dan staf untuk berkolaborasi, berinovasi, dan berkontribusi.&nbsp;Terima kasih telah memilih Fakultas Teknik sebagai tempat untuk tumbuh, belajar, dan berkembang. Bersama, kita akan mencapai mimpi besar ini.</p>\r\n\r\n<p>Salam hangat,</p>\r\n\r\n<p>Prof. Dr. Ir. Yusman Taufik, MP</p>\r\n\r\n<p>Wassalamu&rsquo;alaikum Warahmatullaahi Wabarokatuh.&nbsp;</p>', '<p>Selamat datang di Fakultas Teknik Universitas Pasundan, rumah bagi para calon inovator, kreator, dan technopreneur masa depan. Di era transformasi digital yang bergerak cepat, kami tidak hanya memberikan teori di dalam kelas, melainkan pengalaman belajar yang utuh, <em>fun</em>, dan berorientasi penuh pada industri.</p>\r\n\r\n<p>Menuju visi besar sebagai <em>Entrepreneurial University</em>, FT UNPAS menggabungkan keunggulan teknologi, fasilitas laboratorium yang lengkap, dan kurikulum inovatif yang dirancang khusus agar Anda siap kerja bahkan sebelum wisuda. Bersama dosen-dosen kompeten dan jaringan alumni yang tersebar luas, kami siap menemani langkah Anda menaklukkan tantangan global dan membangun karir impian Anda.</p>', '<p>Berbekal pengalaman puluhan tahun sejak didirikan, Fakultas Teknik Universitas Pasundan (FT UNPAS) secara konsisten mendidik mahasiswa lewat 6 Program Studi strategis yang mayoritas telah meraih <strong>Akreditasi Unggul/A</strong> (BAN-PT) serta pengakuan internasional. Berlandaskan visi menjadi <em>Entrepreneurial University</em> yang menjunjung tinggi nilai Keislaman dan budaya Sunda (<em>Pengkuh Agamana, Luhung Elmuna, Jembar Budayana</em>), kami menjalankan misi pendidikan berbasis riset dan fasilitas laboratorium modern yang selaras dengan kebutuhan pasar. Hasilnya terbukti nyata melalui pencapaian impresif: ribuan alumni berhasil terserap di berbagai industri multinasional dan instansi pemerintahan, dengan mayoritas lulusan mendapatkan pekerjaan pertama mereka kurang dari 6 bulan setelah kelulusan.</p>', '<p>Dunia sedang krisis lingkungan. Jadilah bagian dari solusi, bukan hanya penonton. Teknik Lingkungan UNPAS menyiapkanmu menjadi pemimpin perubahan yang berkelanjutan.</p>', 'faculty-image/viWRALYmjbVeKfOmJdnhzRdSfOpAUjXatmKQyq7t.webp', 'faculty-image/OedoIfbNTFCeByI69RKQLbIZl6FFC0spDxLUb0CV.webp', 'departement-image/Yngqa3brUPXAIGEUroAFlmGKKx1hA3LcuOQ4B1FN.webp', 'faculty-image/bH0enuU07GfreMvEMSEyClqR33krklvGvQetG7Yf.webp', '#e27c00', '#4197cb', '<h2>Visi Fakultas Teknik UNPAS</h2>\r\n\r\n<p><strong>Menjadi Penyelenggara Pendidikan Teknik yang Mendapatkan Pengakuan Internasional dengan Dijiwai Oleh Nilai Islam dan Sunda di tahun 2037</strong></p>\r\n\r\n<h2>Misi Fakultas Teknik UNPAS</h2>\r\n\r\n<ul>\r\n	<li>Menyelenggarakan pendidikan tinggi teknik yang unggul secara nasional dan mendapatkan akreditasi internasional serta dengan atmosfer akademik merdeka belajar, nyantri, nyunda, nyakola.</li>\r\n	<li>Melaksanakan penelitian yang berkualitas internasional yang mampu memberikan kebaruan dalam pengembangan keilmuan rumpun ilmu keteknikan berorientasi pada studi kasus problem dan peluang di tatar Pasundan.</li>\r\n	<li>Menyelenggarakan pengabdian kepada masyarakat berdasarkan hasil penelitian yang tepat guna dan dalam rangka meningkatkan martabat manusia dan peradaban dunia.</li>\r\n	<li>Menjaga, memelihara, dan mengembangkan nilai Sunda dan Islam yang diintegrasikan ke dalam proses pendidikan, penelitian, dan pengabdian pada masyarakat sebagai brand image pendidikan tinggi yang profesional dan nyunda sehingga menjadi ujung tombak dan kebanggaan masyarakat.</li>\r\n	<li>Menjalankan layanan tridarma dan tata kelola fakultas berbasis teknologi informasi yang optimal dan efektif.</li>\r\n	<li>Membangun spirit inovasi dan kewirausahaan di bidang rekayasa Teknik.</li>\r\n</ul>', '-', '-', '-', '-', '-', 'active', '2026-06-01 23:42:44', '2026-06-04 23:53:48');

-- Dumping structure for table nama_database_pmb_anda.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_category` bigint unsigned DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_id_category_foreign` (`id_category`),
  CONSTRAINT `faqs_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `faq_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.faqs: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.faq_categories
CREATE TABLE IF NOT EXISTS `faq_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.faq_categories: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.identities
CREATE TABLE IF NOT EXISTS `identities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.identities: ~0 rows (approximately)
REPLACE INTO `identities` (`id`, `title`, `meta`, `adress`, `link_map`, `phone`, `email`, `fb`, `ig`, `tiktok`, `yt`, `time_service`, `day_service`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
	(1, 'Fakultas Teknik - Universitas Pasundan', '<p>Fakultas Teknik - Universitas Pasundan</p>', '<p>Jl. Dr. Setiabudi No.193, Gegerkalong, Kec. Sukasari, Kota Bandung, Jawa Barat 40153</p>', 'https://share.google/hGvG8w9QUd55XUduG', '090909090909', 'unpas@ac.id', '-', '-', '-', '-', '-', '-', 'identity-image/1kvfgeTDQFUdFL9BfFepFDQRLoV7dhIvt7pwykNJ.webp', 'identity-image/ZbUFlRXETVLRvdiGb540TSFyLcYXvVj5qlO7qV76.webp', '2026-06-01 23:39:45', '2026-06-03 03:06:40');

-- Dumping structure for table nama_database_pmb_anda.inovations
CREATE TABLE IF NOT EXISTS `inovations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inovator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inovations_id_departement_foreign` (`id_departement`),
  CONSTRAINT `inovations_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.inovations: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.jobs: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.job_batches: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.jurnals
CREATE TABLE IF NOT EXISTS `jurnals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `id_team` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jurnals_id_departement_foreign` (`id_departement`),
  KEY `jurnals_id_team_foreign` (`id_team`),
  CONSTRAINT `jurnals_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`),
  CONSTRAINT `jurnals_id_team_foreign` FOREIGN KEY (`id_team`) REFERENCES `ourteams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.jurnals: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.kurikulums
CREATE TABLE IF NOT EXISTS `kurikulums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kurikulums_id_departement_foreign` (`id_departement`),
  CONSTRAINT `kurikulums_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.kurikulums: ~4 rows (approximately)
REPLACE INTO `kurikulums` (`id`, `id_departement`, `title`, `description`, `image`, `icon`, `home`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Berbasis OBE (Outcome Based Education) & KKNI', '<p>Kurikulum yang dirancang fokus pada capaian pembelajaran dan kompetensi nyata lulusan agar langsung siap bersaing di tingkat nasional maupun internasional.</p>', 'kurikulums/5VKzLQMIz53Pp1hGHhZQrI7RGoZSFtPgHCDGWCUk.webp', 'kurikulums/kURyE29ZN2HEcqNUleWWj8dHZIy8CdQrGX26GngY.webp', '1', '2026-06-02 00:42:32', '2026-06-02 00:42:32'),
	(2, 1, 'Implementasi Merdeka Belajar Kampus Merdeka (MBKM)', '<p>Memberikan fleksibilitas bagi mahasiswa untuk belajar di luar kampus melalui program magang industri, proyek kemanusiaan, hingga riset kolaboratif.</p>', 'kurikulums/lUscXU4eTVMB2EQhQs8tRDCsBQTXK8xJGJa5xz9I.webp', 'kurikulums/AbJl1xyz7KiJXBXLHMHVB76jk5khqq8Vffdofkpd.webp', '1', '2026-06-02 00:43:01', '2026-06-02 00:43:01'),
	(3, 1, 'Integrasi Teknologi IoT (Internet of Things)', '<p>Kurikulum adaptif yang didukung pembelajaran berbasis IoT untuk menciptakan solusi pemantauan dan pengelolaan lingkungan yang cerdas serta modern.</p>', 'kurikulums/RgIQGhEIq9YafczxCS4QvnI7DSJHfIXLdV3db5xt.webp', 'kurikulums/PhdNov7skmSRK7HvtkKxcQJ3AtzjtHYOi7X5YgeQ.webp', NULL, '2026-06-02 00:43:25', '2026-06-02 00:43:25'),
	(4, 1, 'Selaras dengan Kebutuhan Industri (DUDI)', '<p>Materi perkuliahan yang terus diperbarui (menuju Kurikulum 2025) guna menjawab tantangan terkini di Dunia Usaha dan Dunia Industri.</p>', 'kurikulums/UhOe75o64QbmrZ1heUkVaSD976qVh7DsKyAsdFFF.webp', 'kurikulums/pNM8rfojVem6Q0DUOgrPanlgmr0ci8mP6wcdal0h.webp', NULL, '2026-06-02 00:43:52', '2026-06-02 00:43:52'),
	(5, 3, 'Berbasis Outcome Based Education (OBE)', '<p>Kurikulum modern yang berorientasi pada hasil capaian pembelajaran untuk memastikan setiap lulusan memiliki kompetensi nyata yang siap bersaing di pasar kerja global.</p>', 'kurikulums/hriP6m6zB67PbYqhLazidtiNJxMnsFQDPsxAwnzy.webp', 'kurikulums/jIjRvhK0vFEg0OfirqYWZ5usxzgwEoE4bEF2bORz.webp', NULL, '2026-06-02 00:45:50', '2026-06-02 00:45:50');

-- Dumping structure for table nama_database_pmb_anda.legal_documents
CREATE TABLE IF NOT EXISTS `legal_documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `legal_documents_id_departement_foreign` (`id_departement`),
  CONSTRAINT `legal_documents_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.legal_documents: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.migrations: ~0 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_04_10_033055_create_profile_fakultas_table', 1),
	(5, '2025_04_10_033249_create_departements_table', 1),
	(6, '2025_04_10_033429_create_user_pics_table', 1),
	(7, '2025_04_10_033520_create_analytics_table', 1),
	(8, '2025_04_10_033605_create_sliders_table', 1),
	(9, '2025_04_10_033651_create_side_baners_table', 1),
	(10, '2025_04_10_033739_create_identities_table', 1),
	(11, '2025_04_10_034209_create_partners_table', 1),
	(12, '2025_04_10_034318_create_legal_documents_table', 1),
	(13, '2025_04_10_034402_create_ourteams_table', 1),
	(14, '2025_04_10_034432_create_usps_table', 1),
	(15, '2025_04_10_034542_create_facilities_table', 1),
	(16, '2025_04_10_034722_create_achievements_table', 1),
	(17, '2025_04_10_034818_create_organizations_table', 1),
	(18, '2025_04_10_035009_create_testimonials_table', 1),
	(19, '2025_04_10_035112_create_inovations_table', 1),
	(20, '2025_04_10_035152_create_supports_table', 1),
	(21, '2025_04_10_035247_create_faq_categories_table', 1),
	(22, '2025_04_10_035318_create_faqs_table', 1),
	(23, '2025_04_11_031523_add_two_factor_columns_to_users_table', 1),
	(24, '2025_04_21_015737_create_categories_table', 1),
	(25, '2025_04_21_021324_create_posts_table', 1),
	(26, '2025_04_23_015339_create_acces_departements_table', 1),
	(27, '2025_04_26_133532_create_data_values_table', 1),
	(28, '2025_04_28_033445_create_agendas_table', 1),
	(29, '2025_04_28_034420_create_faculties_table', 1),
	(30, '2025_04_28_042255_create_portofolios_table', 1),
	(31, '2025_04_28_064315_create_personal_access_tokens_table', 1),
	(32, '2025_04_30_031312_create_prospeks_table', 1),
	(33, '2025_04_30_031705_create_kurikulums_table', 1),
	(34, '2025_05_03_050740_create_jurnals_table', 1),
	(35, '2025_05_05_024329_create_timelines_table', 1);

-- Dumping structure for table nama_database_pmb_anda.organizations
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organizations_id_departement_foreign` (`id_departement`),
  CONSTRAINT `organizations_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.organizations: ~9 rows (approximately)
REPLACE INTO `organizations` (`id`, `id_departement`, `name`, `category`, `description`, `home`, `image`, `created_at`, `updated_at`) VALUES
	(1, 3, 'KUNTI', 'Komunitas', '<p>KUNTI</p>', '1', 'organisasis/0VVEKH7UEJevAhZAxLQu98qiLyWBLfyW2YhANTlU.webp', '2026-06-02 01:31:33', '2026-06-02 01:54:04'),
	(2, 1, 'Himpunan Mahasiswa Teknik Lingkungan (HMTL) Universitas Pasundan.', 'Organisasi', '<p>Himpunan Mahasiswa Teknik Lingkungan (HMTL) Universitas Pasundan.</p>', '1', 'organisasis/mjNUbK7vOkxJZe2mIxgyrRyZTPbHNt7zgHTBPQ1i.webp', '2026-06-02 23:40:58', '2026-06-02 23:40:58'),
	(3, 3, 'Academic Care', 'Kegiatan', '<p>Academic Care</p>', '1', 'organisasis/Lp02f6M0X6p3C3LZCFD9El1aEAfqnXVaAQvQxtwW.jpg', '2026-06-03 01:54:54', '2026-06-03 01:54:54'),
	(4, 3, 'HMTI Seni', 'Organisasi', '<p>HMTI Seni</p>', NULL, 'organisasis/9KfhPJGjq6yJy7HWer2XJbEz01cU6hSoQCKbicgR.webp', '2026-06-03 01:59:21', '2026-06-03 01:59:35'),
	(5, 3, 'Industrial Engineering Graduation Ceremony', 'Kegiatan', '<p>Industrial Engineering Graduation Ceremony</p>', '1', 'organisasis/2uFY0MdkwNPsmfIw08vY1A0NkdrmBmuilwZW3GDe.webp', '2026-06-03 02:00:52', '2026-06-03 02:00:52'),
	(6, 3, 'Kajian Akbar', 'Kegiatan', '<p>Kajian Akbar</p>', '1', 'organisasis/D7QzXRXphYCdvAVV962PvxYs3kjG4muPHCEpn2la.webp', '2026-06-03 02:02:20', '2026-06-03 02:02:20'),
	(7, 3, 'LDKO 1', 'Kegiatan', '<p>LDKO 1</p>', NULL, 'organisasis/56Gw8Je3Uavm1rXlFKW3R28Z7ej3UseNJ6sE2kcA.webp', '2026-06-03 02:03:43', '2026-06-03 02:03:43'),
	(8, 5, 'LDKO', 'Kegiatan', '<p>Kaderisasi LDKO</p>', NULL, 'organisasis/vwosaRWiukJ3b6MGJfhUxSnCGZDe8g5RKm8symus.png', '2026-06-03 03:03:19', '2026-06-03 03:03:19'),
	(9, 5, 'DIES NATALIS', 'Organisasi', '<p>DIES NATALIS</p>', '1', 'organisasis/q8b2LaH8hYrfajM7mBNi3PeM5byG46NgI5fOl9rR.png', '2026-06-03 03:04:37', '2026-06-03 03:04:37'),
	(10, 5, 'Program Kerja Negeri Seribu Pangan (WFD)', 'Kegiatan', '<p>Program Kerja Negeri Seribu Pangan (WFD)</p>', '1', 'organisasis/UuwJqtiY80FGnBzpB0VqMafqQPZdqDJdCqF3fYbV.png', '2026-06-03 03:06:20', '2026-06-03 03:06:20');

-- Dumping structure for table nama_database_pmb_anda.ourteams
CREATE TABLE IF NOT EXISTS `ourteams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ourteams_id_departement_foreign` (`id_departement`),
  CONSTRAINT `ourteams_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.ourteams: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.partners
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `partners_id_departement_foreign` (`id_departement`),
  CONSTRAINT `partners_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.partners: ~8 rows (approximately)
REPLACE INTO `partners` (`id`, `id_departement`, `name`, `url`, `description`, `detail`, `image`, `status`, `home`, `created_at`, `updated_at`) VALUES
	(1, 1, 'ARRAFI', 'https://www.arrafibandung.com/', '<p>Arrafi yayasan pendidikan kewiraswastaan</p>', '<p>Arrafi yayasan pendidikan kewiraswastaan</p>', 'partner-image/igBYitlfnbjdrQk3GgUb9lW4WpXbOQK9CmOJeqqe.webp', 'active', '1', '2026-06-03 00:22:29', '2026-06-03 03:19:02'),
	(2, 1, 'The University of Kitakyushu', 'https://www.kitakyu-u.ac.jp/lang-en/', '<h2>The University of Kitakyushu</h2>', '<h2>The University of Kitakyushu</h2>', 'partner-image/MHMl0swf9tY7hj9m0QUjJJ9x3nQnXbaaxYRrtRgm.png', 'active', '1', '2026-06-03 00:24:13', '2026-06-03 00:24:13'),
	(3, 1, 'ITENAS', 'https://www.itenas.ac.id/', '<p>ITENAS</p>', '<p>ITENAS</p>', 'partner-image/msG7OMz5oIsHotsWHFi3eELFvZYwGNNET6TIygs7.png', 'active', '1', '2026-06-03 00:30:42', '2026-06-03 00:30:42'),
	(4, 1, 'Universitas Trisakti', 'https://trisakti.ac.id/', '<p>Universitas Trisakti</p>', '<p>Universitas Trisakti</p>', 'partner-image/VYSeuBvbDzWMgUaJ6Ba5W8bJoPHbwcOshph3fpnd.webp', 'active', '1', '2026-06-03 00:34:37', '2026-06-03 00:35:33'),
	(5, 1, 'PT. TRIATAMA TIRTA MANDIRI', '-', '<p>PT. TRIATAMA TIRTA MANDIRI</p>', '<p>PT. TRIATAMA TIRTA MANDIRI</p>', 'partner-image/lzrfgaX3dxHMhwyUdZIxz3svmGjCwHqJYeNu7XJj.webp', 'active', '1', '2026-06-03 00:38:39', '2026-06-03 03:19:32'),
	(6, 2, 'Kampus Merdeka', '-', '<p>Kampus Merdeka</p>', '<p>Kampus Merdeka</p>', 'partner-image/lOgB3YsloYr09KLZEERCcKJlIeGIPXs5nnumSxQR.webp', 'active', '1', '2026-06-03 03:14:58', '2026-06-03 03:14:58'),
	(7, 2, 'Google Education For Partner', '-', '<p>Google Education For Partner</p>', '<p>Google Education For Partner</p>', 'partner-image/S2fjIyxItGgjhKtarc5lXpGT2jfqmJfFLppWHlBp.png', 'active', '1', '2026-06-03 03:15:59', '2026-06-03 03:15:59'),
	(8, 2, 'AWS Educate', '-', '<p>AWS Educate</p>', '<p>AWS Educate</p>', 'partner-image/5TJkPapdWlOJKIC849vpDDHHlJiWV1zAB2JPKPIH.webp', 'active', '1', '2026-06-03 03:16:58', '2026-06-03 03:16:58'),
	(9, 2, 'Github Student Developer Pack', '-', '<p>Github Student Developer Pack</p>', '<p>Github Student Developer Pack</p>', 'partner-image/XCjvugSW9hYzuf0u8bprYEfcaA9vDXmk2CGu7owk.webp', 'active', '1', '2026-06-03 03:18:10', '2026-06-03 03:18:10');

-- Dumping structure for table nama_database_pmb_anda.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.portofolios
CREATE TABLE IF NOT EXISTS `portofolios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portofolios_id_departement_foreign` (`id_departement`),
  CONSTRAINT `portofolios_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.portofolios: ~2 rows (approximately)
REPLACE INTO `portofolios` (`id`, `id_departement`, `title`, `description`, `home`, `image1`, `image2`, `image3`, `yt`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Buku Manajemen Dalam Revolusi', '<p>Buku Manajemen Dalam Revolusi</p>', NULL, 'portofolio-images/VRXp4t9mPzuBvhVUBUCbUOogpOTIoMGjm9pfMfhB.png', 'portofolio-images/tpThRLpmeXeEYUZnQFuxsxwdBNuq0jVrmfgQXdoF.png', 'portofolio-images/u2N8i74ig8d0x2C7DNX2Vk8Q2aM66SIn8N91quTH.png', '-', '2026-06-03 01:18:42', '2026-06-03 01:18:42'),
	(2, 1, 'Pengantar Teknik Industri', '<p>Pengantar Teknik Industri</p>', '1', 'portofolio-images/56rcsbrNbvz3kSLSwq9F1kUN86ujwgoavA7DVp13.png', 'portofolio-images/qvnQMf9YTYu6FeV65JqEcAlHh1dmGIjc5WCRD9Bl.png', 'portofolio-images/ggD851EmtwS6vxFQSz9MReNjSyH14l3oYhGLZ7FZ.png', '-', '2026-06-03 01:19:46', '2026-06-03 01:19:46');

-- Dumping structure for table nama_database_pmb_anda.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_category` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_id_category_foreign` (`id_category`),
  CONSTRAINT `posts_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.posts: ~2 rows (approximately)
REPLACE INTO `posts` (`id`, `id_category`, `title`, `slug`, `resume`, `content`, `publish`, `image`, `yt`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Cara Menggunakan Laravel', NULL, 'Panduan singkat cara menggunakan Laravel.', '<p>Laravel adalah framework PHP yang sangat powerful...</p>', '2023-10-21', 'images/posts/post1.jpg', 'https://www.youtube.com/watch?v=video1', 'active', '2026-06-01 21:05:18', '2026-06-01 21:05:18'),
	(2, 2, 'Tips Belajar Quill Editor', NULL, 'Cara integrasi Quill Editor di Laravel.', '<p>Quill adalah rich text editor yang ringan dan mudah digunakan...</p>', '2023-10-21', 'images/posts/post2.jpg', 'https://www.youtube.com/watch?v=video2', 'active', '2026-06-01 21:05:18', '2026-06-01 21:05:18');

-- Dumping structure for table nama_database_pmb_anda.profile_fakultas
CREATE TABLE IF NOT EXISTS `profile_fakultas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statistik1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statistik2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statistik3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statistik4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.profile_fakultas: ~0 rows (approximately)
REPLACE INTO `profile_fakultas` (`id`, `name`, `tagline`, `title1`, `description1`, `title2`, `description2`, `title3`, `description3`, `title4`, `description4`, `image1`, `image2`, `image3`, `image4`, `statistik1`, `statistik2`, `statistik3`, `statistik4`, `status`, `yt`, `created_at`, `updated_at`) VALUES
	(1, 'Fakultas Teknik', 'Mewujudkan Insinyur Berkarakter', 'Visi', 'Menjadi fakultas teknik unggulan tingkat nasional.', 'Misi', 'Menyelenggarakan pendidikan, penelitian, dan pengabdian.', 'Tujuan', 'Membentuk lulusan yang berdaya saing global.', 'Nilai', 'Integritas, Profesionalisme, Inovasi.', 'image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', '10.000 Mahasiswa', '50 Dosen', '20 Program Studi', '5 Gedung Kuliah', 'aktif', 'https://youtube.com/example', NULL, NULL);

-- Dumping structure for table nama_database_pmb_anda.prospeks
CREATE TABLE IF NOT EXISTS `prospeks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prospeks_id_departement_foreign` (`id_departement`),
  CONSTRAINT `prospeks_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.prospeks: ~18 rows (approximately)
REPLACE INTO `prospeks` (`id`, `id_departement`, `title`, `description`, `image`, `icon`, `home`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Pengembang Perangkat Lunak & Aplikasi', '<p>Menjadi ahli dalam merancang, membangun, dan mengembangkan aplikasi mobile serta perangkat lunak inovatif yang siap menjawab kebutuhan industri global.</p>', 'prospeks/oyaCXD95B1etUtIidQuoWgVQkpI7Z7TfZyLN5ygB.webp', 'prospeks/vOKXzVHWOnFHOV5vByQmLWu2o6ZfGEvcGIAySPpJ.webp', '1', '2026-06-02 00:25:15', '2026-06-02 00:25:15'),
	(2, 2, 'Keamanan & Infrastruktur IT', '<p>Bertanggung jawab dalam merancang infrastruktur jaringan yang kokoh serta menjaga keamanan siber (<em>cybersecurity</em>) dan integritas data dari berbagai ancaman digital.</p>', 'prospeks/dPiqRnDAe44ErqAVRf4X3OPeXJ9rGzTQWTKumaWe.webp', 'prospeks/ulHGuA8vFkJHJyNBQWfvRGoRfazhjKigWQvdqLrB.webp', '1', '2026-06-02 00:26:33', '2026-06-02 00:26:33'),
	(3, 2, 'Data & Kecerdasan Buatan', '<p>Berfokus pada pengolahan <em>big data</em> dan pengembangan teknologi masa depan berbasis AI (<em>Artificial Intelligence</em>) untuk menghasilkan solusi komputasi yang cerdas.</p>', 'prospeks/2l20WrU4TmkwxS5NRNgOOjhaANYkpwWxxfFqiRKX.webp', 'prospeks/4ycyVlqR6plDUPZjfh5cEQGo1jlSuuzaqFvcB5uk.webp', NULL, '2026-06-02 00:27:43', '2026-06-02 00:27:43'),
	(4, 2, 'Game Development', '<p>Menggabungkan kreativitas dan kemampuan <em>coding</em> untuk merancang serta mengembangkan ekosistem <em>game</em> digital yang interaktif dan kompetitif.</p>', 'prospeks/cI0UKf9Vqw3YYJ45qbV4BKIPr7in5kWrtUQUvPhL.webp', 'prospeks/09UUzKMU44ggtNaGrYzhQp27wvrf83tvsIxomFfb.webp', NULL, '2026-06-02 00:28:15', '2026-06-02 00:28:15'),
	(5, 2, 'Teknologi Web & Digital', '<p>Menjadi profesional dalam membangun platform web modern, mengoptimalkan performa digital, serta mengintegrasikan solusi <em>technopreneurship</em> di era digital yang dinamis.</p>', 'prospeks/tbHuPeba9f4gi2QdjKFfYXJYNcWpvrjLEjud3ICV.webp', 'prospeks/NBSroi9NepCdplvlm0MYySWXnHoy6MACpo1bpB3o.webp', '1', '2026-06-02 00:28:45', '2026-06-02 00:29:25'),
	(6, 1, '𝐈𝐧𝐝𝐮𝐬𝐭𝐫𝐢 & 𝐌𝐚𝐧𝐮𝐟𝐚𝐤𝐭𝐮𝐫', '<p>Menjadi tenaga ahli (<em>Environmental Engineer</em> &amp; <em>HSE Officer</em>) yang merancang strategi industri hijau, mengelola limbah B3, serta mengoptimalkan efisiensi energi dan ekonomi sirkular demi keberlanjutan bisnis.</p>', 'prospeks/JYp8a7V2zk5DMeIQLTSLBtJ3vcGmH2yx2bDXKFrS.webp', 'prospeks/xldySLYsGZFYLasdDCgUx9g4LZigcCxIhaWXLFLW.webp', NULL, '2026-06-02 00:31:48', '2026-06-02 00:31:48'),
	(7, 1, 'Pemerintahan & Kebijakan Publik', '<p>Berperan sebagai pengambil kebijakan, auditor lingkungan, serta perencana kota cerdas (<em>Smart City</em>) dan infrastruktur hijau untuk mendukung transisi menuju energi terbarukan.</p>', 'prospeks/QFmif7Pw5tawH23bw1APPmgkKbDuQ0znQbOQPyUr.webp', 'prospeks/nPo7o8o9teXpfyEqkF8VIXaz2cEZpfNkgUWeJvlP.webp', NULL, '2026-06-02 00:32:14', '2026-06-02 00:32:14'),
	(8, 1, 'Konsultan & Engineering Services', '<p>Menjadi konsultan profesional yang menyusun analisis risiko iklim, penilaian daur hidup produk (<em>Life Cycle Assessment</em>), serta mendampingi perusahaan dalam menerapkan standar ESG global.</p>', 'prospeks/fhMnfJqae0hB3UweuvhPLeJR83mp6aYeJrvvoCZ9.webp', 'prospeks/fjESYx4oiKx1QgbPEmNJLm1Cv2VqCANPJsb4W3Qn.webp', NULL, '2026-06-02 00:32:42', '2026-06-02 00:32:42'),
	(9, 1, 'Akademisi, Riset, & Inovasi', '<p>Berkontribusi sebagai peneliti dan dosen dalam mengembangkan sains lingkungan, mulai dari manajemen sumber daya air, kualitas udara, hingga riset genomik lingkungan yang mutakhir.</p>', 'prospeks/f2GTcjPnOhtAitWHWPbVXWnNLtLxqhtag8YxuWpB.webp', 'prospeks/2yXnmCEQKOsNMOz7NfaXFrPSc4Dv9oS3bmoGYgAN.webp', NULL, '2026-06-02 00:33:10', '2026-06-02 00:33:10'),
	(10, 1, 'NGO, LSM, & Organisasi Internasional', '<p>Bergerak sebagai motor penggerak masyarakat dan spesialis perubahan iklim dalam program konservasi keanekaragaman hayati, edukasi lingkungan, serta pembangunan pertanian berkelanjutan.</p>', 'prospeks/t5gMRh2BHz3ecfENjT4FiO6qzpp4qrLeWqgY0PPE.webp', 'prospeks/OzADz4Zd4h4jeDW49B4enTs5gDgl2EkVyXgqotGD.webp', NULL, '2026-06-02 00:33:37', '2026-06-02 00:33:37'),
	(11, 1, 'Wirausaha & Startup', '<p>Menjadi <em>green technopreneur</em> dengan mendirikan <em>startup</em> teknologi hijau, mengelola bisnis daur ulang inovatif, hingga menjadi pelaku pasar dalam perdagangan kredit karbon (<em>carbon credit</em>).</p>', 'prospeks/xKxfrFslrJ1tN8LuRnkBTvkjn3hKvsZtDUnmnjpv.webp', 'prospeks/2qoDfYKE5PE0W32fe31ZOUO2LiP5u6yg1ufQENa9.webp', NULL, '2026-06-02 00:34:01', '2026-06-02 00:34:01'),
	(12, 3, 'Profesional & Pemimpin Industri', '<p>Menjadi manajer operasional, perancang sistem, atau supervisor di sektor manufaktur dan jasa untuk mengoptimalkan produksi dan rantai pasok.</p>', 'prospeks/rJByn5wQEflnkuAWtdApWOieDDMXG6GS8i30hH5r.webp', 'prospeks/slFALZR2wVHu2nqyhlDwq3oKL9AYZR2igxiz1tDx.webp', NULL, '2026-06-02 00:36:37', '2026-06-02 00:36:37'),
	(13, 3, 'Konsultan Rekayasa Sistem', '<p>Menjadi penasihat ahli dalam menganalisis studi kelayakan, merencanakan tata letak pabrik, dan meningkatkan efisiensi sistem industri.</p>', 'prospeks/7ejm90m4lyNcIXIHtRxx2jNKW8agYz9K1Gf16WDI.webp', 'prospeks/oF4s9zY48rZ8jA6o3Cyi02HgEg1ILoGMqUKvbWac.webp', NULL, '2026-06-02 00:37:06', '2026-06-02 00:37:06'),
	(14, 3, 'Akademisi & Peneliti', '<p>Berkontribusi sebagai dosen atau peneliti mandiri dalam mengembangkan inovasi sains, teknologi, dan rekayasa sistem industri terkini.</p>', 'prospeks/JYl8uCoUyb86EwaBALJLdDVpO8WlpgulmVLwRFst.webp', 'prospeks/Xlh0MOl3Fg36LJWPjaHvchIfgrQ9laW7M5IqG3MW.webp', NULL, '2026-06-02 00:37:47', '2026-06-02 00:37:47'),
	(15, 3, 'Industrial Entrepreneur', '<p>Membangun dan memimpin bisnis mandiri dengan menerapkan prinsip efisiensi dan manajemen sistem industri berbasis teknologi.</p>', 'prospeks/R4YqI9X4jwvOmdsPDfkP4rExvPcxmqiGvpiz8oAL.webp', 'prospeks/0xgQ7usoXIw8dLQWKk8oBfEXS7N4svHWVhc7Slmd.webp', NULL, '2026-06-02 00:38:55', '2026-06-02 00:38:55'),
	(16, 5, 'Food Industry Manager', '<p>Menguasai tata kelola sistem produksi dan pengendalian standar mutu pangan dari hulu hingga hilir. Lulusan siap menempati posisi strategis seperti Manajer, QA/QC, hingga R&amp;D di industri pangan nasional maupun internasional.</p>', 'prospeks/rzPjfQFj8YwTPVE0Rys7DvwHv9dtoF6SSA7E5UIP.webp', 'prospeks/neYoqOvmao5Bx15c5MAt3vmFiC7j2TcrJ5X29gnX.webp', NULL, '2026-06-03 02:42:58', '2026-06-03 02:42:58'),
	(17, 5, 'Food Industry Entrepreneur', '<p>Memiliki kompetensi mendirikan, mengoperasikan, dan mengelola bisnis pangan secara inovatif dan kreatif. Fokus pada penciptaan produk pangan berkualitas tinggi yang memiliki nilai jual kuat di pasar.</p>', 'prospeks/2yO3M23NYvZBR9j69coZqJmNVxvsGRHHHXRA1yuc.webp', 'prospeks/4AMRJVy8MNgf6z8O9r5BS3gA9TrvIw6JSXTCQIwa.webp', '1', '2026-06-03 02:43:30', '2026-06-03 02:43:30'),
	(18, 5, 'Academician & Consultant', '<p>Menguasai konsep teoritis sains pangan mendalam untuk kebutuhan riset, pendidikan, dan pengabdian masyarakat. Siap menjadi peneliti, dosen, atau konsultan strategis bagi pelaku industri pangan global.</p>', 'prospeks/udAv2TNGeDIrl7ItOoPgsUcR8JuQUITKLohmX6er.webp', 'prospeks/oq8MRGDpfu1HPgdGfey01f9z5ZsimW08rBb8uRi6.webp', NULL, '2026-06-03 02:44:06', '2026-06-03 02:44:06'),
	(19, 5, 'Government Policy Maker', '<p>Siap mengabdi sebagai aparatur sipil negara yang kompeten dalam merumuskan dan menjalankan kebijakan ketahanan pangan. Cocok untuk karier strategis di instansi pemerintahan seperti BPOM dan Dinas Ketahanan Pangan.</p>', 'prospeks/I2Ruziiv2lsUSOBKlO0RKvZYcwkHpM7SiBw1duL8.webp', 'prospeks/oBgIBG7aTWFIEQXvxDHJtisdHT3CBrumhaR5FnK1.webp', NULL, '2026-06-03 02:44:28', '2026-06-03 02:44:42');

-- Dumping structure for table nama_database_pmb_anda.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.sessions: ~1 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('PGtPn7E84GVCTMnSLgY3oQccBpnbg8R4PkP9dRaU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZlVveWVKWnFVcUVvY1hDdHZTcWNWQm9MNXdWd25zd204MDU3WHBGMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9mYWN1bHR5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1780642429);

-- Dumping structure for table nama_database_pmb_anda.side_baners
CREATE TABLE IF NOT EXISTS `side_baners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `side_baners_id_departement_foreign` (`id_departement`),
  CONSTRAINT `side_baners_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.side_baners: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_id_departement_foreign` (`id_departement`),
  CONSTRAINT `sliders_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.sliders: ~0 rows (approximately)
REPLACE INTO `sliders` (`id`, `id_departement`, `title`, `description`, `image1`, `image2`, `yt`, `status`, `home`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Fakultas Teknik', '<p>Fakultas Teknik</p>', 'slider-image/ajyv2IqpD19c97bd4SuM3qpGYdlCBIWDfCxVb0bR.webp', 'slider-image/glPNBzEWC2XqNBDFePrm2dwzdZKeHxYcOOm0bME3.webp', '-', 'active', '1', '2026-06-04 23:20:57', '2026-06-04 23:20:57');

-- Dumping structure for table nama_database_pmb_anda.supports
CREATE TABLE IF NOT EXISTS `supports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supports_id_departement_foreign` (`id_departement`),
  CONSTRAINT `supports_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.supports: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.testimonials
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonials_id_departement_foreign` (`id_departement`),
  CONSTRAINT `testimonials_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.testimonials: ~4 rows (approximately)
REPLACE INTO `testimonials` (`id`, `id_departement`, `name`, `title`, `description`, `home`, `yt`, `image`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Sani', 'Dari Ketua HMTI hingga Jadi Head of PPIC: Berinvestasi pada Diri Sendiri', '<p>Halo adik-adik Teknik Industri UNPAS! Menjadi alumni dan mantan Ketua HMTI 2018/2019 yang lulus <em>cumlaude</em> dalam 4 tahun merupakan kebanggaan besar bagi saya. Saat ini, saya berkarir sebagai Head of PPIC di perusahaan manufaktur otomotif sekaligus menjalani <em>side hustle</em> sebagai System Engineer di industri peternakan. Kunci menghadapi dinamika ini adalah prinsip <em>value investing</em>, yaitu berinvestasi pada diri sendiri lewat ilmu, pengalaman, dan karakter. Untuk itu, saya sangat merekomendasikan buku <em>&quot;The 7 Habits of Highly Effective People&quot;</em> guna membantu kalian membangun kebiasaan positif demi masa depan. Tetaplah optimis, konsisten, dan jadikan setiap tantangan sebagai peluang untuk terus tumbuh!</p>', '1', '-', 'testimonials/STiNQTICoYCecnIJTFlrLlwHHsULFzoRUxyFPkNP.png', '2026-06-02 01:59:22', '2026-06-02 01:59:22'),
	(2, 1, 'Salman M Rizki', 'Membawa Nilai Tradisi ke Industri Global bersama UNPAS', '<p>Menjadi alumni Teknik Industri Universitas Pasundan Angkatan 2018 memberikan saya pengalaman berharga yang berakar kuat pada motto <em>Pengkuh Agamana, Luhung Elmuna, Jembar Budayana</em>. Saat ini, saya berkarir di bidang <em>Production Planning and Inventory Control</em> di Pinehill Arabia Food Ltd. Melalui motto tersebut, saya belajar untuk selalu melibatkan Tuhan dalam bertindak, tetap rendah hati seiring bertambahnya ilmu, serta bersikap terbuka terhadap keberagaman budaya di era globalisasi. Nilai-nilai ini menjadi pedoman hidup yang membentuk kami menjadi insan yang tidak hanya unggul secara profesional, tetapi juga matang dalam hal moral, spiritual, dan sosial. Terima kasih untuk seluruh civitas akademik Teknik Industri UNPAS atas kebaikan dan ilmu yang telah diberikan.</p>', '1', '-', 'testimonials/XqIqBkRdljvV0wqtr7Gd3MiVZJv54QUy1f5DU2I5.png', '2026-06-02 02:01:57', '2026-06-02 02:01:57'),
	(3, 1, 'Gunawan', 'Alumni Teknik Lingkungan', '<p>Fasilitas kampus di Teknik Lingkungan Unpas Bandung sangat memadai dan para dosennya pun kompeten. Selain itu, dukungan alumni serta komunitas mahasiswanya juga sangat solid. Kuliah di sini benar-benar menjadi pengalaman yang sangat berharga bagi saya.</p>', '1', '-', 'testimonials/jInoDOVTWl5LRqo55PWM7Lo6qCinvFtdzRu3KtQt.webp', '2026-06-03 00:06:33', '2026-06-03 00:06:33'),
	(4, 1, 'Giyani', 'Mahasiswa Teknik Lingkungan', '<p>Menjadi mahasiswi Teknik Lingkungan Universitas Pasundan membuat saya sangat bangga karena dapat langsung berkontribusi memecahkan berbagai masalah lingkungan. Pembelajaran yang saya dapatkan di sini memadukan ilmu pengetahuan dan teknologi, sehingga dapat langsung diaplikasikan untuk mencari solusi yang nyata. Di prodi ini, kita diajar untuk menjaga, menanggulangi masalah, sekaligus melestarikan bumi kita. Semoga Teknik Lingkungan Unpas ke depannya dapat terus menjadi program studi yang diminati dan semakin lebih baik lagi.</p>', '1', '-', 'testimonials/6Q9fZBP60SuGtW9Dbihb0SNO5ltZxGFn89PGpdAV.webp', '2026-06-03 00:15:10', '2026-06-03 00:16:11');

-- Dumping structure for table nama_database_pmb_anda.timelines
CREATE TABLE IF NOT EXISTS `timelines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `no_urut` int NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timelines_id_departement_foreign` (`id_departement`),
  CONSTRAINT `timelines_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.timelines: ~4 rows (approximately)
REPLACE INTO `timelines` (`id`, `id_departement`, `title`, `slug`, `description`, `image`, `date`, `no_urut`, `home`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Peletakan Batu Pertama', 'peletakan-batu-pertama', '<p>Fakultas Teknik resmi didirikan pertama kali dengan nama <strong>Fakultas Teknologi</strong>.</p>', 'timeline-image/gzkFPLgLjXAZOKINBCk1H9WaczHHUw3P1YSD9Mj0.webp', '1961-01-01', 1, '1', '2026-06-04 23:49:04', '2026-06-04 23:49:04'),
	(2, 2, 'Peresmian Status Hukum', 'peresmian-status-hukum', '<p>Fakultas resmi menetapkan status <strong>&quot;TERDAFTAR&quot;</strong> yang dikukuhkan melalui Surat Keputusan Departemen Perguruan Tinggi dan Ilmu Pengetahuan Republik Indonesia No. 11/B-SNT/P/1962 (tertanggal 10 Januari 1963) melalui Kepala Perguruan Tinggi Swasta.</p>', 'timeline-image/LZ3TBmuXzVzJMotbQ2INjYkXCmb7zij8HEvJ3x4C.webp', '1962-09-11', 2, '1', '2026-06-04 23:50:00', '2026-06-04 23:50:00'),
	(3, 1, 'Estafet Kepemimpinan Kedua', 'estafet-kepemimpinan-kedua', '<p>Pergantian pimpinan fakultas. <strong>Ir. Suparwadi</strong> resmi naik menggantikan Prof. Dr. Moestopo untuk memimpin Fakultas Teknik sebagai Dekan Kedua.</p>', 'timeline-image/e5SHkiUrjQ6HnrndvdeNNs039X6WLEPbRZWfGdAp.webp', '1963-01-01', 3, '1', '2026-06-04 23:50:55', '2026-06-04 23:50:55'),
	(4, 2, 'Estafet Kepemimpinan Ketiga', 'estafet-kepemimpinan-ketiga', '<p>Kepemimpinan fakultas berlanjut. <strong>Ir. Harry Zuhary Sabirin (Alm.)</strong> resmi diangkat menjadi Dekan Ketiga.</p>', 'timeline-image/aoCEtXxUXTT1ISBGqMrRLY4ZHOvCq7fL9wk3nR0I.webp', '1967-01-01', 4, '1', '2026-06-04 23:52:32', '2026-06-04 23:52:32');

-- Dumping structure for table nama_database_pmb_anda.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `two_factor_code` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.users: ~3 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `two_factor_code`) VALUES
	(1, 'Kemal Ramadhan', 'km.kemal03@gmail.com', '08986004677', 'Super Admin', '2026-06-01 21:05:17', '$2y$12$2h3mKfyBw0LEhh76zZZmpu.nKZo/hh8QSo3WXWGzGaYKAq6WKLZIO', NULL, NULL, NULL, NULL, '2026-06-01 21:05:17', '2026-06-01 21:05:17', NULL),
	(2, 'Admin User', 'rickybackup2121@gmail.com', '08123456789', 'admin', '2026-06-01 21:05:17', '$2y$12$xkAiwrGM/sWeN6hGJPy6y.IYfmTmkKA.CdiKJqRsxqi1FrpoiyiBC', NULL, NULL, NULL, NULL, '2026-06-01 21:05:18', '2026-06-01 21:05:18', NULL),
	(3, 'Regular User', 'user@example.com', '08987654321', 'admin', '2026-06-01 21:05:18', '$2y$12$owz3dFeD.YJdGn9SJxmhR.vXsc.JX6rmEJXGpVpTR03LtmdZVd/IK', NULL, NULL, NULL, NULL, '2026-06-01 21:05:18', '2026-06-01 21:05:18', NULL);

-- Dumping structure for table nama_database_pmb_anda.user_pics
CREATE TABLE IF NOT EXISTS `user_pics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `id_user` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_pics_id_departement_foreign` (`id_departement`),
  KEY `user_pics_id_user_foreign` (`id_user`),
  CONSTRAINT `user_pics_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`),
  CONSTRAINT `user_pics_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.user_pics: ~0 rows (approximately)

-- Dumping structure for table nama_database_pmb_anda.usps
CREATE TABLE IF NOT EXISTS `usps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usps_id_departement_foreign` (`id_departement`),
  CONSTRAINT `usps_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table nama_database_pmb_anda.usps: ~9 rows (approximately)
REPLACE INTO `usps` (`id`, `id_departement`, `title`, `description`, `image`, `home`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Smart Environmental Infrastructure,', '<p>Smart Environmental Infrastructure,</p>', 'usps/2pCbUGWjZeCdbbZteH3933sOxdaAGFuMqbkv3a2D.webp', NULL, '2026-06-02 00:19:14', '2026-06-02 00:19:14'),
	(2, 1, 'Suistanable Environmental Engineering and Management,', '<p>Suistanable Environmental Engineering and Management,</p>', 'usps/i3zjUlf7NX1A0vTVgrnQST7VhqoDZKtmlZDWUZ6s.webp', NULL, '2026-06-02 00:19:31', '2026-06-02 00:19:31'),
	(3, 1, 'Community Based Strategy', '<p>Community Based Strategy</p>', 'usps/a1zcnyWBS7GEwvw9OpqZl5F7ZK9nV13bXp0UVhIj.webp', NULL, '2026-06-02 00:19:49', '2026-06-02 00:19:49'),
	(6, 2, 'Sinergi Budaya & Inovasi', '<p>Teknik Informatika Berbasis Kearifan Lokal &amp; Inovasi Global</p>', 'usps/oP59G2z6CP4E4QkhGpHwphdWH7Fip3VaUrFBH9Gi.webp', '1', '2026-06-03 02:16:32', '2026-06-03 03:07:25'),
	(7, 2, 'Lulusan Siap Kerja', '<p>Praktik dan Industri Selaras: Lulusan Siap Kerja &amp; Berwirausaha</p>', 'usps/ccQOr62ew52ynlf1IJVoukUCAQxYx91hyJu562Pz.webp', '1', '2026-06-03 02:17:05', '2026-06-03 02:17:05'),
	(8, 5, 'Pionir Pendidikan Pangan', '<p>Merupakan Program Studi Teknologi Pangan tertua di Indonesia yang berdiri sejak tahun 1961 di bawah naungan Fakultas Teknik, Universitas Pasundan.</p>', 'usps/x3HsF64HyePzrAwlaCJ1TxRisTmJkVFQnaJMyT3Q.webp', '1', '2026-06-03 02:37:51', '2026-06-03 02:39:17'),
	(9, 5, 'Akreditasi Unggul & Konsisten', '<p>Memiliki rekam jejak prestasi yang solid dengan raihan Akreditasi A sejak tahun 1996, dan kini telah resmi memperoleh predikat Akreditasi UNGGUL dari BAN-PT pada tahun 2024.</p>', 'usps/9B0ErOZIlPbQxlDoLPlGfC75PKlO2n2PrCqO13zq.webp', '1', '2026-06-03 02:38:13', '2026-06-03 02:39:26'),
	(10, 5, 'Standar Manajemen Internasional', '<p>Menjamin mutu ekosistem pendidikan dan tata kelola organisasi yang optimal melalui kepemilikan sertifikasi ISO 9001:2015.</p>', 'usps/Tv40NxUONyyfHxFcwSRv3JcQEWQqPnwaURZ1IYJQ.webp', '1', '2026-06-03 02:38:36', '2026-06-03 02:39:35'),
	(11, 5, 'Fasilitas Pengujian Standar Global', '<p>Menunjang kegiatan riset, praktikum, dan inovasi mahasiswanya dengan fasilitas Laboratorium yang telah resmi Terakreditasi ISO/IEC 17025.</p>', 'usps/ymZvIYDbTleJY0Hl2vJ40tihfNLlgDMFB5KWTRlL.webp', '1', '2026-06-03 02:39:00', '2026-06-03 02:39:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
