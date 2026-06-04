-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: sistem_fhukum
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acces_departements`
--

DROP TABLE IF EXISTS `acces_departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acces_departements` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acces_departements`
--

LOCK TABLES `acces_departements` WRITE;
/*!40000 ALTER TABLE `acces_departements` DISABLE KEYS */;
/*!40000 ALTER TABLE `acces_departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `achievements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `winner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achievements_id_departement_foreign` (`id_departement`),
  CONSTRAINT `achievements_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievements`
--

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
INSERT INTO `achievements` VALUES (1,1,'IFC U-13 (International Cup 5 Negara Asia)','Juara 1','Virghie Farrel Pratama','internasional','<h2>Juara 1 IFC U-13 (International Cup 5 Negara Asia)</h2>','1','achievements/o3O2GV9woUbVuY5s0ANHkQaSSS9FXT4d95NOFdgp.jpg','2025-05-08 02:41:02','2025-05-09 03:27:02'),(2,1,'Juara Lomba Baca Puisi Tingkat Provinsi','Juara 1','RAICHAN RIZKI SEPTIAWAN','regional','<p>Juara Lomba Baca Puisi Tingkat Provinsi</p>','1','achievements/LDsT0AV63lk40OJa5KU0hv1TlagiVPEYlR99E3zM.jpg','2025-05-08 03:05:41','2025-05-09 03:36:04'),(3,1,'(PON) XXI Aceh-Sumut 2024 Cabang Olahraga Squash Nomor Beregu Campuran','Juara 2','Khansa Arya Nugraha','nasional','<p>Juara 2 (Medali Perak) Pekan Olahraga Nasional (PON) XXI Aceh-Sumut 2024 Cabang Olahraga Squash Nomor Beregu Campuran</p>','1','achievements/wMncQfPCZ4rDV0iyqM8KLw7xn0GSzBKDFwdigY30.jpg','2025-05-08 03:17:22','2025-05-09 03:34:14'),(4,1,'Speed Kick Junior Putri Tingkat Nasional INDONESIA TAEKWONDO LEAGUE 2022.','Juara 1','Dwidisa Reskianahaya Polingay','nasional','<p>Menjadi Juara 1 Speed Kick Junior Putri Pada Kejuaraan Tingkat Nasional INDONESIA TAEKWONDO LEAGUE 2022.</p>','1','achievements/WYBuZiiQKNUTqePXIG9A3xHAPpJQAdbzGpqRkqx2.jpg','2025-05-08 03:23:34','2025-05-09 03:39:41'),(5,1,'Kejurnas Junior 2021, Porprov Jawa Barat, Kejurnas U19 2023,  Kapolri Cup 2024','Juara 1','PAJAR PAMUNGKAS',NULL,'<p>Juara 1 Kejurnas Junior 2021, Juara 3 Porprov Jawa Barat, Juara 1 Kejurnas U19 2023, Juara 2 Kapolri Cup 2024</p>','1','achievements/fOmCAIcPsj7qpIMUmKJVxMDgewIk2HmqfrMBlLn7.jpg','2025-05-08 03:27:51','2025-05-09 03:44:48'),(6,1,'Jaipong Rampak Antar Universitas Se Jawa Barat 2023','Juara 2','Nasywa Adhwa Asyahra','regional','<p>Juara 2 Jaipong Tunggal Sejawa Barat 2021 Juara 2 Jaipong Rampak Antar Universitas Se Jawa Barat 2023</p>','1','achievements/DYixhp0oNkKhnb2o0rShF3HHx6qgZTEtYZpjcCXP.jpg','2025-05-08 03:29:06','2025-05-09 03:45:47');
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendas`
--

DROP TABLE IF EXISTS `agendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendas` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendas`
--

LOCK TABLES `agendas` WRITE;
/*!40000 ALTER TABLE `agendas` DISABLE KEYS */;
INSERT INTO `agendas` VALUES (1,'Inovasi Hukum dalam Menghadapi Era Digital','inovasi-hukum-dalam-menghadapi-era-digital','2025-05-19 12:00:00','2025-05-19 19:00:00','<p>Pesatnya perkembangan teknologi digital telah membawa perubahan signifikan dalam berbagai aspek kehidupan, termasuk ranah hukum. Profesi hukum, akademisi, dan praktisi dihadapkan pada tantangan baru sekaligus peluang inovatif yang menuntut adaptasi dan pemahaman yang mendalam terhadap dinamika hukum di era transformasi digital ini.</p>\r\n\r\n<p>Menyadari urgensi tersebut, seminar ini hadir sebagai platform strategis untuk mendalami dan mendiskusikan isu-isu hukum terkini yang paling relevan dengan era digital. Kami mengundang para pakar, akademisi terkemuka, praktisi berpengalaman, dan perwakilan dari otoritas terkait untuk berbagi pandangan dan wawasan mereka.</p>\r\n\r\n<p>Melalui sesi pidato utama yang menggugah pikiran, diskusi panel interaktif yang membahas studi kasus relevan (seperti perlindungan data pribadi), serta sesi paralel tematik yang spesifik (mencakup hukum kontrak elektronik dan regulasi fintech), peserta akan mendapatkan pemahaman komprehensif tentang kerangka hukum yang berkembang dan implikasinya.</p>\r\n\r\n<p>Seminar ini merupakan kesempatan berharga bagi mahasiswa, akademisi, praktisi hukum, serta masyarakat umum yang tertarik untuk memperdalam pengetahuan mereka, mendapatkan sudut pandang baru, dan berinteraksi langsung dengan para ahli di bidang hukum digital.</p>\r\n\r\n<p>Jangan lewatkan kesempatan untuk menjadi bagian dari diskusi penting ini. Seminar akan dilaksanakan pada <strong>Sabtu, 25 Mei 2025</strong>, bertempat di <strong>Auditorium Fakultas Hukum, Universitas </strong>Pasundan</p>','Fakultas Hukum','Auditorium Fakultas Hukum','https://youtu.be/opYg9QS3UXI?si=CiB0YVGf_Iejjepm','Link Register','08327312371','Seminar','agenda-image/ukn8TBBlXMo20nzCr6mlQDwGa47h83psl3j5Qs2d.jpg','2025-05-07 05:00:41','2025-05-09 04:04:12'),(2,'Diskusi Publik: Implementasi Keadilan Restoratif dalam Sistem Peradilan Pidana','diskusi-publik-implementasi-keadilan-restoratif-dalam-sistem-peradilan-pidana','2025-05-31 11:06:00','2025-05-31 14:06:00','<p>Fakultas Hukum <strong>Universitas Pasundan</strong> dengan senang hati mengundang Anda untuk mengikuti Diskusi Publik dengan tema <strong>&quot;Implementasi Keadilan Restoratif dalam Sistem Peradilan Pidana&quot;</strong>.</p>\r\n\r\n<p>Dalam upaya mewujudkan sistem peradilan pidana yang lebih humanis dan berkeadilan, konsep keadilan restoratif semakin mendapatkan perhatian. Pendekatan ini menawarkan solusi yang tidak hanya berfokus pada pembalasan, tetapi juga pada pemulihan kerugian korban, tanggung jawab pelaku, serta rekonsiliasi antara semua pihak yang terlibat dalam suatu tindak pidana, termasuk komunitas.</p>\r\n\r\n<p>Diskusi publik ini hadir sebagai platform untuk mendalami konsep, landasan yuridis, serta tantangan dan peluang dalam mengimplementasikan keadilan restoratif di berbagai tahapan sistem peradilan pidana di Indonesia. Kita akan mendapatkan wawasan mendalam dari <strong>Prof. Dr. Linda Susanti, S.H., M.Hum.</strong>, seorang pakar terkemuka di bidang Hukum Pidana, yang akan memaparkan materi utama. Sesi interaktif ini akan dipandu oleh moderator, <strong>Dr. Ahmad Fauzi, S.H., M.A.</strong>, seorang ahli Kriminologi.</p>\r\n\r\n<p>Acara ini sangat relevan bagi mahasiswa, akademisi, praktisi hukum, serta masyarakat umum yang tertarik pada pembaruan hukum pidana dan mencari pemahaman yang lebih komprehensif tentang peran keadilan restoratif. Jangan lewatkan kesempatan untuk berdiskusi langsung dengan narasumber dan para peserta lainnya.</p>\r\n\r\n<p>Bergabunglah bersama kami pada <strong>Selasa, 20 Mei 2025</strong>, pukul <strong>14:00 - 16:00 WIB</strong>, bertempat di <strong>Google Meet</strong></p>','Fakultas Hukum','Google Meet','https://youtu.be/opYg9QS3UXI?si=CiB0YVGf_Iejjepm','Link Register','08327312371','Webinar','agenda-image/9cLdXpRs6gvmhhALLuOFbr7c2OOWbCdZMWhoycfo.jpg','2025-05-09 04:10:12','2025-05-09 04:10:35'),(3,'Reformasi Sistem Ketatanegaraan Pasca Amandemen','reformasi-sistem-ketatanegaraan-pasca-amandemen','2025-05-20 11:14:00','2025-05-20 16:19:00','<p>Fakultas Hukum <strong>Universitas Pasundan</strong> mengundang sivitas akademika dan publik untuk hadir dalam acara <strong>Bedah Buku</strong> yang mengulas karya penting berjudul <strong>&quot;Reformasi Sistem Ketatanegaraan Pasca Amandemen&quot;</strong>.</p>\r\n\r\n<p>Buku ini menawarkan tinjauan mendalam dan gagasan segar mengenai dinamika serta tantangan dalam sistem ketatanegaraan Indonesia setelah berbagai amandemen UUD NRI 1945. Isu ini sangat relevan mengingat perdebatan yang terus berlangsung mengenai bentuk, fungsi, dan kinerja lembaga-lembaga negara kita dalam kerangka konstitusional saat ini.</p>\r\n\r\n<p>Acara Bedah Buku ini akan menampilkan diskusi interaktif antara penulis buku, <strong>Dr. Yudi Pranoto, S.H., M.H.</strong>, dengan pembedah buku, <strong>Prof. Siti Zubaidah, S.H., LL.M.</strong>, seorang pakar terkemuka di bidang Hukum Tata Negara. Diskusi akan dipandu oleh <strong>Dr. Rahmat Hidayat, S.H., M.Si.</strong>, dosen Fakultas Hukum Universitas Pasundan.</p>\r\n\r\n<p>Bedah buku ini menjadi forum ideal bagi para peserta untuk mendapatkan pemahaman komprehensif mengenai isi buku, mendengarkan berbagai perspektif (dari pembedah dan penulis), serta berpartisipasi dalam diskusi kritis tentang arah reformasi sistem ketatanegaraan kita di masa mendatang.</p>\r\n\r\n<p>Jangan lewatkan kesempatan berharga ini pada <strong>Jumat, 7 Juni 2025</strong>, pukul <strong>10:00 - 12:00 WIB</strong>, di <strong>Ruang Serbaguna Fakultas Hukum, Universitas Pasundan</strong>.</p>','Fakultas Hukum','Ruang Serbaguna Fakultas Hukum','https://youtu.be/opYg9QS3UXI?si=CiB0YVGf_Iejjepm','Link Register','08327312371','Seminar','agenda-image/53zEZTM8SRpT8fyDw1EstI50iDrkYePyhHLWfM59.jpg','2025-05-09 04:15:26','2025-05-09 04:15:26');
/*!40000 ALTER TABLE `agendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `analytics`
--

DROP TABLE IF EXISTS `analytics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analytics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `google` text COLLATE utf8mb4_unicode_ci,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `chat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analytics`
--

LOCK TABLES `analytics` WRITE;
/*!40000 ALTER TABLE `analytics` DISABLE KEYS */;
INSERT INTO `analytics` VALUES (1,'ini contoh google analytic','<p>Fakultas Hukum Universitas Pasundan (UNPAS) adalah pilihan tepat bagi Anda yang ingin meniti karier gemilang di dunia hukum. Dengan kurikulum berbasis kompetensi, pengajar profesional berpengalaman, serta akreditasi unggul, FH UNPAS berkomitmen mencetak lulusan yang tidak hanya cerdas secara akademis, tetapi juga siap bersaing di tingkat nasional maupun internasional. Didukung fasilitas modern dan jaringan alumni luas yang telah sukses di berbagai bidang hukum, UNPAS membuka jalan Anda menuju masa depan yang gemilang sebagai praktisi hukum, akademisi, maupun pemimpin bangsa.</p>','Hallo Minpas, Saya mau info pendaftaran mahasiswa baru untuk tahun ini!',NULL,'2025-05-10 02:19:04');
/*!40000 ALTER TABLE `analytics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('0c0134bf85c491cbba5f8ac866bdbda6','i:2;',1746759450),('0c0134bf85c491cbba5f8ac866bdbda6:timer','i:1746759450;',1746759450),('1c67a01e199890bcf22a612420a3e136','i:1;',1746609134),('1c67a01e199890bcf22a612420a3e136:timer','i:1746609134;',1746609134),('28cba9dd2054335f2f60962d48d10d8b','i:1;',1746841997),('28cba9dd2054335f2f60962d48d10d8b:timer','i:1746841997;',1746841997),('2b3a8bc3e269e4b1f207b3125318d581','i:1;',1746757056),('2b3a8bc3e269e4b1f207b3125318d581:timer','i:1746757056;',1746757056),('2ebb5f3da3bd7ed0f8cb713b7412e8d4','i:1;',1746758553),('2ebb5f3da3bd7ed0f8cb713b7412e8d4:timer','i:1746758553;',1746758553),('2f7cff0fb6c4de4e9202e0a5ebaec3fd','i:1;',1746765696),('2f7cff0fb6c4de4e9202e0a5ebaec3fd:timer','i:1746765696;',1746765696),('3d92139e606696a95935b60013606012','i:1;',1746594502),('3d92139e606696a95935b60013606012:timer','i:1746594502;',1746594502),('436359f1ab15120c08376ce57091218a','i:2;',1746618587),('436359f1ab15120c08376ce57091218a:timer','i:1746618587;',1746618587),('5b93e10155cbdf5f895a9b1252a24283','i:2;',1746669425),('5b93e10155cbdf5f895a9b1252a24283:timer','i:1746669425;',1746669425),('5c0efee26bd1fcfeefd3552823e2a24a','i:1;',1746681139),('5c0efee26bd1fcfeefd3552823e2a24a:timer','i:1746681139;',1746681139),('67ba9ac557d09f61be9e528a77971c72','i:1;',1746669640),('67ba9ac557d09f61be9e528a77971c72:timer','i:1746669640;',1746669640),('6f95eae2dfcc4dbafe96afbeddaaa15a','i:1;',1746757052),('6f95eae2dfcc4dbafe96afbeddaaa15a:timer','i:1746757052;',1746757052),('71bf069fca1df7b15f6084ea9b0a19c8','i:1;',1746765363),('71bf069fca1df7b15f6084ea9b0a19c8:timer','i:1746765363;',1746765363),('7cd0c57fa75ff68a132aaddaf3a59915','i:1;',1746841986),('7cd0c57fa75ff68a132aaddaf3a59915:timer','i:1746841986;',1746841986),('84bff7df9cbf227c014e637bcc42a88e','i:1;',1746756075),('84bff7df9cbf227c014e637bcc42a88e:timer','i:1746756075;',1746756075),('9b5bb5ea2a024f291d3fa88acce523d0','i:1;',1746681104),('9b5bb5ea2a024f291d3fa88acce523d0:timer','i:1746681104;',1746681104),('a64a44e223ba28fd5668dd11a6e058a5','i:1;',1746756087),('a64a44e223ba28fd5668dd11a6e058a5:timer','i:1746756087;',1746756087),('a9497f4938d4926526a635d0550bff9f','i:1;',1746696603),('a9497f4938d4926526a635d0550bff9f:timer','i:1746696603;',1746696603),('addc7c2d63a5ee2e9e4166254c6c017f','i:1;',1746754755),('addc7c2d63a5ee2e9e4166254c6c017f:timer','i:1746754755;',1746754755),('b237709364c3a6492b9dc4a2ae093a35','i:1;',1746760980),('b237709364c3a6492b9dc4a2ae093a35:timer','i:1746760980;',1746760980),('b2f0806ad9bd25035ce0b18ab00ebc16','i:1;',1746594549),('b2f0806ad9bd25035ce0b18ab00ebc16:timer','i:1746594549;',1746594549),('cd39474fc91f3a9fe865b09afe8ace0a','i:1;',1746754937),('cd39474fc91f3a9fe865b09afe8ace0a:timer','i:1746754937;',1746754937),('d6efa1e82442a51721343bf4264d9d20','i:1;',1746692315),('d6efa1e82442a51721343bf4264d9d20:timer','i:1746692315;',1746692315),('dbf7ac9e93fde0a169361c54c5acc63f','i:1;',1746609139),('dbf7ac9e93fde0a169361c54c5acc63f:timer','i:1746609139;',1746609139),('df2cff0d70c2542fd556e641eac2ef25','i:1;',1746774630),('df2cff0d70c2542fd556e641eac2ef25:timer','i:1746774630;',1746774630),('eb6d8eb0ed673c68028f45b6302e374a','i:1;',1746669633),('eb6d8eb0ed673c68028f45b6302e374a:timer','i:1746669633;',1746669633),('ec860e9dc575e4958e2eb513af6ac582','i:1;',1746692323),('ec860e9dc575e4958e2eb513af6ac582:timer','i:1746692323;',1746692323),('f4fad72622394d7cd3faaf9613a455fb','i:1;',1746594060),('f4fad72622394d7cd3faaf9613a455fb:timer','i:1746594060;',1746594060),('f57358a5125168d4d3f44d09fff84d66','i:1;',1746697868),('f57358a5125168d4d3f44d09fff84d66:timer','i:1746697868;',1746697868);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Artikel','images/categories/article.jpg',NULL,NULL),(2,'Berita','images/categories/news.jpg',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_values`
--

DROP TABLE IF EXISTS `data_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_values` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_values`
--

LOCK TABLES `data_values` WRITE;
/*!40000 ALTER TABLE `data_values` DISABLE KEYS */;
INSERT INTO `data_values` VALUES (1,'Mahasiswa','Lulusan','Program Studi','Prestasi','9112','9877436','44','2139','Some value 1','Some value 2','Some value 3','Some value 4','2025-05-07 04:59:28','2025-05-07 04:59:28');
/*!40000 ALTER TABLE `data_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departements` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departements`
--

LOCK TABLES `departements` WRITE;
/*!40000 ALTER TABLE `departements` DISABLE KEYS */;
INSERT INTO `departements` VALUES (1,'Ilmu Hukum','ilmu-hukum','Unggul','Ilmu Hukum UNPAS, Inspiring with Integrity','frpQD90KsBE','Ilmu Hukum','Ilmu Hukum','Ilmu Hukum','Ilmu Hukum','2168','24765','306','35','Tak Hanya Kuliah, Tapi Membangun Portofolio untuk Era Digital!','Tentang Kami','Apa Aja Sih yang Bakal Kamu Pelajari di Sini?','Prospek Karir','<div>\r\n<p>&nbsp;</p>\r\n\r\n<p>Guna menciptakan iklim yang kondusif dalam proses belajar mengajar, termasuk penciptaan budaya pendidikan yang sehat, serta kemampuan transfer kecerdasan yang utuh, sangat ditentukan oleh tata kelola (manajemen) yang terintegrasi, komunikasi yang efektif, dan manusiawi. Usaha demikian hanya mungkin dilakukan apabila seluruh komponen fakultas memiliki komitmen yang diarahkan untuk kemajuan lembaga, ditunjang dengan sarana prasarana sebagai basis penopangnya.</p>\r\n\r\n<p><strong>Pada awal tahun 2019, Fakultas Hukum melakukan perubahan kurikulum melalui rapat kerja fakultas dengan menghadirkan seluruh komponen mulai dari dosen, karyawan, mahasiswa, perwakilan mahasiswa, alumni dan stake holder, yang kemudian menghasilkan Kurikulum Perguruan Tinggi Tahun 2019. Pada tahun 2021 Fakultas Hukum UNPAS kembali melakukan perubahan kurikulum yang mengacu kepada Merdeka Belajar (MBKM).</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n</div>','<p>Program Studi Ilmu Hukum Universitas Pasundan (FH Unpas) telah menjadi pusat pendidikan hukum terkemuka sejak berdirinya Fakultas Hukum pada tahun 1960. Dengan <strong>akreditasi &quot;Unggul&quot; dari BAN-PT </strong>, kami terus mempertahankan standar pendidikan tinggi yang kompetitif, menggabungkan keahlian akademik dan praktik nyata untuk mempersiapkan generasi <em>game-changer </em>di dunia hukum. Kami berkomitmen untuk memberikan pendidikan hukum yang berkualitas, relevan, dan berorientasi pada praktik, dengan tetap menjunjung tinggi nilai-nilai luhur budaya Sunda.</p>\r\n\r\n<p><strong>Visi Prodi Ilmu Hukum</strong><br />\r\nUnggulan dalam kualitas dan terdepan dalam pengabdian Legal Preneur berlandaskan nilai kesundaan dan keislaman di tahun 2047.</p>','<ol>\r\n	<li>Kajian Hukum Islam dan Kearifan Lokal</li>\r\n	<li>Kajian Sistem Peradilan dan Kekuasaan Kehakiman</li>\r\n	<li>Kajian Hukum Kenegaraan</li>\r\n	<li>Kajian Hukum Gender dan Anak</li>\r\n	<li>Kajian Analisis Ekonomi dan Hukum</li>\r\n	<li>Kajian Hukum dan Masyarakat Internasional</li>\r\n</ol>','<ul>\r\n	<li>Calon Advokat</li>\r\n	<li>Calon Hakim</li>\r\n	<li>Calon Jaksa</li>\r\n	<li>Calon Notaris</li>\r\n	<li>Calon Mediator</li>\r\n	<li>Calon Legal Officer</li>\r\n	<li>Calon Analis dan Perancang Perundang-undangan</li>\r\n	<li>Calon Analis dan Perancang Kontrak</li>\r\n</ul>','departement-image/JdyQrbhRIf7CoRZbQtn39PxtQ7X3qjnLccEjQ4ow.jpg','departement-image/Nsym0TRtXE50LEpdl2sEj4wrB5fKriRQaB765ZHj.jpg','departement-image/FvhLfJhpq3ECaaReR4JxO3etxnjBpoKALXJZIhCy.jpg','departement-image/zxnXcToJqO7EE499JvXZoy5tkBIpcrkj3S8BJ82w.jpg','#aa2132','#4197cb','<p>Jl. Lengkong Besar No.68, Cikawao, Kec. Lengkong, Kota Bandung, Jawa Barat, Indonesia 40261</p>','https://g.co/kgs/Q4CqBa7','@hukumunpas','@hukumunpas','@hukumunpas','@hukumunpas','active','2025-05-07 05:01:26','2025-05-09 07:53:38');
/*!40000 ALTER TABLE `departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (2,1,'Ruang Kelas','Kelas Hybrid','<p><strong>Ruang kelas FH Unpas dilengkapi perangkat-perangkat multimedia yang mutakhir untuk menunjang&nbsp;</strong><strong>sistem pembelajaran kelas Hybrid (Blended Learning).</strong></p>\r\n\r\n<p><strong>Selain itu, untuk menunjang proses pembelajaran yang nyaman, ruang kelas Fakultas Hukum Unpas di desain secara modern, minimalis, dan juga dilengkapi perangkat multimedia yang mutakhir.</strong></p>','1','facilities/VaiUKqUxuMpXhYJA0zUxGkYP0gcGtvaWaPC3K3Kl.jpg','facilities/dha0dHxyPpveGc3SkNHw5nPDlQlcIqckJ1fKYgTr.jpg',NULL,NULL,NULL,NULL,'testing','2025-05-07 12:02:48','2025-05-08 07:11:40'),(3,1,'Perpustakaan Saleh Adiwinata','Perpustakaan Saleh Adiwinata','<p><strong>Perpustakaan FH Unpas yang diberi nama Saleh Adiwinata memiliki koleksi buku yang lengkap dan mempunyai desain yang cozy untuk para sivitas melakukan aktivitas disini. Sistem terintegrasi online juga disematkan pada perpustakaan ini yang memudahkan sivitas dalam melakukan kegiatan.</strong></p>','1','facilities/rf1LvXqrV2qpatVEcnEIyofCLSwf80Et1ZkjOKQq.jpg','facilities/fwOqDYvKYFRTQ0Ubyxft6avxJw8co25mEx2Azjt9.jpg','facilities/kINKu85B94v5zZ8gYZV8vdDkJ5ovBFqzho3matC9.jpg','facilities/KY4fmba6hyeP9ksK5Au0zef0VXyT2UeDHTEsChBl.jpg','facilities/0Iz6gTcXZ5aujwXIg7RqBLa1FhYLACLWMosj12jk.jpg',NULL,'testing','2025-05-07 12:21:52','2025-05-07 12:21:52'),(4,1,'Ruang Multi Talent','Ruang Multi Talent','<p><strong>Ada yang tertarik dengan sosial media? youtuber? musik? atau fitness? Jika kalian mempunyai ketertarikan ke salah satu dari hal tersebut, nampaknya ini ruang yang tepat untuk mengasah kemampuan kalian. Di ruang multi talent ini para sivitas bisa sharing mengenai sosial media, hingga memproduksi video untuk kebutuhan digital serta musik.</strong></p>\r\n\r\n<p><strong>Tidak hanya itu, disini juga ada sarana penunjang olah raga juga loh! Seperti treadmill, sepeda statis, dan lainnya.</strong></p>','1','facilities/lIGOddRmW6QkZc21wycIpYigMlXX3BqmuCpmIxzG.jpg','facilities/UGIDTiufsOdKWyzVR83KipHT3vI8GF1oltMI5Md0.jpg',NULL,NULL,NULL,NULL,'https://youtu.be/QeQIYEjlT-E','2025-05-07 12:23:48','2025-05-08 02:00:19'),(5,1,'Auditorium Graha Oesadi','Auditorium Graha Oesadi','<p><strong>Auditorium Graha Oesadi merupakan auditorium yang kerap digunakan sebagai tempat pelaksanaan event nasional ataupun internasional. Salah satu event internasional yang dilaksanakan di auditorium ini yaitu GAJE 10th Conference. Dilengkapi dengan teknologi dan sistem IT yang terbaik, auditorium ini juga kerap dipilih menjadi tempat pelaksanaan Online Conference.</strong></p>','1','facilities/VCI8AkXkfQAGl0JudSgpszNfo3ZyGY5QfyvgAVfY.jpg',NULL,NULL,NULL,NULL,NULL,'testing','2025-05-07 12:25:02','2025-05-07 12:25:02'),(6,1,'Aula Suradiredja','Aula Suradiredja','<p><strong>Dengan disematkannya teknologi serta media visual yang terbaik, Aula Suradiredja Kampus Lengkong Unpas ini menjadi salah satu tempat yang dapat memfasilitasi hampir seluruh kegiatan besar para sivitas di lingkungan Unpas.</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>','1','facilities/ji7BLoD7sz7AD8mVK9u4QJyJ2wYgkf9ZPu9v937u.jpg','facilities/7vclmXZvqmOSH05Uk71mkottO0439qqw9pUdGWoB.jpg',NULL,NULL,NULL,NULL,'https://youtu.be/EWKSR5gK1rI','2025-05-07 12:26:28','2025-05-07 12:26:28'),(7,1,'Laboratorium Hukum','Tentang Lab Hukum FH Unpas','<p><strong>Untuk mengasah kemahiran hukum mahsiswa, laboratorium hukum FH Unpas ditunjang dengan sarana &amp; prasarana yang mumpuni.</strong></p>\r\n\r\n<p><strong>Di Lab Hukum ini mahasiswa akan mendapatkan pelatihan praktikum hukum pidana, hukum acara perdata, litigasi, litigasi perdata, kontrak internasional, legal drafting.</strong></p>\r\n\r\n<p><strong>Dengan mempunyai kemahiran hukum, diharapkan mahasiswa akan memiliki kompetensi dalam menjadi jaksa, pengacara, hakim, auditor, dan spesialis legal drafting pemerintahan ataupun yang lainnya.</strong></p>','1','facilities/vmgV62AVQVaBa1bCZyqciY4gqKRxMZOLmV0Xkw3K.jpg','facilities/X8JzSb0TMomlI7x5okE3bPwB1CEI5wHTe8aRasMD.jpg','facilities/jCJGiepBniksg8Kh2W21eKMlkYEYoxsikjfymcT8.jpg','facilities/yFMMJjZtxpG7QQfjUkHt4uxuTf0ZTo6ppVkM8AIt.jpg',NULL,NULL,'testing','2025-05-07 12:28:10','2025-05-07 12:28:10'),(8,1,'Laboratorium Bahasa Inggis Hukum','Tentang Lab Bahasa Inggris FH Unpas','<p><strong>Laboratorium Bahasa Inggris FH UNPAS telah bekerjasama dengan CAMBRIDGE University dan juga memiliki sarana dan prasarana penunjang pembelajaran.&nbsp;</strong></p>\r\n\r\n<p><strong>Sertifikat TOEFL yang dikeluarkan oleh Lab Bahasa Inggris FH UNPAS ini sudah memenuhi standar yang dapat diterima oleh berbagai instansi dan juga lembaga pemerintahan.&nbsp;</strong></p>','1','facilities/aMrPclhWDDoNFs7fXa5HNJdZDiz9smbdhlwrIIjB.jpg','facilities/ISNg1yz2H9wx51vHoSrpwVbf8GL3u5s8Pqcgaup5.jpg',NULL,NULL,NULL,NULL,'testing','2025-05-07 12:29:41','2025-05-09 07:12:10'),(9,1,'Clinical Legal Education','Clinical Legal Education','<p><strong>CLE (Clinical Legal Education)</strong>&nbsp;Fakultas Hukum Unpas merupakan pionir berkembangnya pendidikan hukum interaktif di Indonesia yang berkonsentrasi pada kegiatan&nbsp;<em>Street Law</em>.&nbsp; Pada awal pembentukannya, CLE adalah program ekstrakurikuler yang menyiapkan mahasiswa untuk meningkatkan&nbsp;<em>soft skill</em>&nbsp;nya sehingga ketika lulus diharapkan menjadi mahasiswa yang berkualitas.&nbsp; Seiring dengan perkembangannya, Fakultas Hukum memutuskan untuk menjadikan CLE sebagai&nbsp;<strong>mata kuliah wajib</strong>&nbsp;bagi mahasiswa&nbsp;<strong>semester 7</strong>&nbsp;sejak tahun 2015.</p>\r\n\r\n<p>Ada 3 orang dosen yang bertindak sebagai&nbsp;<strong>supervisor</strong>&nbsp;yaitu :</p>\r\n\r\n<ol>\r\n	<li>Leni widi mulyani ,SH,MH.</li>\r\n	<li>Hesti septianita SH,MH.</li>\r\n	<li>Rosa Tedjabuwana SH,MH.</li>\r\n</ol>\r\n\r\n<p>Ketiganya memberikan bimbingan dan arahan kepada lebih dari&nbsp;<strong>250 mahasiswa</strong>&nbsp;yang terbagi dalam beberapa kelompok untuk dapat melakukan kegiatan&nbsp; pendidikan hukum bagi masyarakat dengan metode yang interaktif dan partisipatoris.</p>\r\n\r\n<p>CLE merupakan program yang secara internasional sudah diakui dan hanya di Fakultas Hukum Unpas saja program CLE dijadikan sebagai mata kuliah wajib.</p>\r\n\r\n<p>CLE Fakultas Hukum Unpas dalam program kerjanya&nbsp; menyiapkan mahasiswa untuk menjadi penyuluh-penyuluh hukum yang aktif, energik, dan interaktif. Target masyarakat yang dijadikan sebagai mitra dalam kegiatan ini adalah kaum miskin atau marjinal khususnya perempuan dan anak.</p>\r\n\r\n<p>Ketika mahasiswa sudah mendapatkan bekal yang cukup, mereka langsung terjun ke lapangan menyasar target yang akan dijadikan sebagai pembelajar dalam program mereka. Topik yang diberikan beragam tergantung pada kebutuhan masyarakat bisa hukum pidana, perdata atau tata negara. Namun yang paling disukai adalah ketika topik tertentu berhubungan dengan anak sekolah.</p>\r\n\r\n<p>Dalam melakukan kegiatan&nbsp;<em>Street Law</em>&nbsp;tak perlu harus dalam ruangan, di lapangan pun dapat dilakukan yang penting adalah para pembelajar mendapatkan ilmu mengenai hukum dari para mahasiswa ini.</p>\r\n\r\n<p>Kegiatan CLE dan masyarakat adalah kegiatan yang saling menguntungkan karena masyarakat dapat ilmu dengan gratis dan mahasiswa dapat menerapkan ilmunya.</p>','1','facilities/AE0nTJARmcvhaR3qN8NaowloUcCYAEcOl7sqrOtC.jpg','facilities/UQkIZBdVgu81kbLBijWOSRjNdQg82BKOenCruWTh.jpg','facilities/wAicUW01lG9elDanPoV7pJJ9Kp5EK3l4hKHAscAd.jpg',NULL,NULL,NULL,'testing','2025-05-07 12:31:53','2025-05-07 12:31:53');
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculties` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculties`
--

LOCK TABLES `faculties` WRITE;
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;
INSERT INTO `faculties` VALUES (1,'Fakultas Hukum','Unggul','Ilmu Hukum UNPAS, Inspiring with Integrity','@unpas',1,'@unpas','@unpas','@unpas','@unpas','1735','5719','8','100','Selamat Datang Di Fakultas Hukum Universitas Pasundan','Tentang Hukum Unpas','Sejarah,Visi,Misi,danPencapaianFakultasKami','Visi Misi Fakultas Hukum','<p>Guna menciptakan iklim yang kondusif dalam proses belajar mengajar, termasuk penciptaan budaya pendidikan yang sehat, serta kemampuan transfer kecerdasan yang utuh, sangat ditentukan oleh tata kelola (manajemen) yang terintegrasi, komunikasi yang efektif, dan manusiawi. Usaha demikian hanya mungkin dilakukan apabila seluruh komponen fakultas memiliki komitmen yang diarahkan untuk kemajuan lembaga, ditunjang dengan sarana prasarana sebagai basis penopangnya.</p>\r\n\r\n<p><strong>Pada awal tahun 2019, Fakultas Hukum melakukan perubahan kurikulum melalui rapat kerja fakultas dengan menghadirkan seluruh komponen mulai dari dosen, karyawan, mahasiswa, perwakilan mahasiswa, alumni dan stake holder, yang kemudian menghasilkan&nbsp;<strong>Kurikulum Perguruan Tinggi Tahun 2019</strong>. Pada tahun 2021 Fakultas Hukum UNPAS kembali melakukan perubahan kurikulum yang mengacu kepada&nbsp;<strong>Merdeka Belajar (MBKM).</strong></strong></p>','<p>Fakultas Hukum UNPAS, bagian dari Paguyuban Pasundan, mewujudkan masyarakat berbahagia yang diridhoi Allah SWT. Memadukan ilmu pengetahuan, teknologi, seni dan agama secara selaras, serasi dan seimbang. Bertujuan meningkatkan taraf hidup masyarakat Indonesia menuju Indonesia emas 2045.</p>','<p>Fakultas Hukum UNPAS didirikan 14 November 1960, berawal dari semangat kebangsaan Pagoejoeban Pasoendan (1913). Program Studi Ilmu Hukum telah meraih akreditasi &quot;A&quot; (Baik Sekali) sejak 1998 hingga 2020. Pada 28 November 2023, fakultas ini berhasil meraih peringkat akreditasi tertinggi &quot;Unggul&quot;. Selama perjalanannya, fakultas ini terus berkembang dari status &quot;TERDAFTAR&quot; hingga mencapai kejayaan akademis saat ini.</p>\r\n\r\n<p>&nbsp;</p>','<p>Visi: Menjadi lembaga yang unggul dalam kualitas dan terdepan dalam pengembangan Legal Preneur dilandasi nilai kesundaaan dan keislaman di tahun 2047.</p>\r\n\r\n<p>Misi:&nbsp;Pengembangan Tridarma Perguruan Tinggi dalam ilmu hukum berbasis nilai-nilai keislaman dan kesundaan.</p>','faculty-image/O4NWFn7Ep5hDu4bJd60Z9fSuc3WkiEdjS8vJPQcK.jpg','faculty-image/8Sehor3laf8wOzGF2bZqTApX5DXVx1LheV271Eil.jpg','departement-image/ztvbam5jtkvCY8gpW5ceRHrQS38JIK409hNzc2ER.jpg','faculty-image/7R0VD4QEOfPn5E9evZnOGyyy7jHp4fr3WzKW9meE.jpg','#aa2132','#4197cb','<p>Jl. Lengkong Besar No.68, Cikawao, Kec. Lengkong, Kota Bandung, Jawa Barat, Indonesia 40261</p>','testing','@unpas','@unpas','@unpas','@unpas','active','2025-05-07 05:21:10','2025-05-09 02:50:39');
/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categories`
--

DROP TABLE IF EXISTS `faq_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categories`
--

LOCK TABLES `faq_categories` WRITE;
/*!40000 ALTER TABLE `faq_categories` DISABLE KEYS */;
INSERT INTO `faq_categories` VALUES (1,'Pendaftaran','2025-05-08 09:55:26','2025-05-08 09:55:26'),(2,'Biaya','2025-05-08 09:55:35','2025-05-08 09:55:35'),(3,'Beasiswa','2025-05-08 09:55:44','2025-05-08 09:55:44');
/*!40000 ALTER TABLE `faq_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_category` bigint unsigned DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_id_category_foreign` (`id_category`),
  CONSTRAINT `faqs_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `faq_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,1,'Apa syarat pendaftaran?','<p>Syarat pendaftaran meliputi ijazah terakhir, transkrip nilai, dan dokumen identitas. Pastikan semua dokumen lengkap sebelum mengajukan pendaftaran. Informasi lebih lanjut dapat ditemukan di halaman pendaftaran.</p>','2025-05-08 09:56:10','2025-05-08 09:56:10'),(2,2,'Berapa biaya kuliah?','<p>Biaya kuliah bervariasi tergantung program studi yang dipilih. Rincian biaya dapat dilihat di halaman biaya kuliah. Kami juga menyediakan informasi tentang beasiswa yang tersedia.</p>','2025-05-08 09:56:27','2025-05-08 09:56:27'),(3,1,'Bagaimana cara mendaftar?','<p>Untuk mendaftar, kunjungi halaman pendaftaran di situs kami. Ikuti langkah-langkah yang tertera dan lengkapi formulir pendaftaran. Pastikan untuk mengunggah semua dokumen yang diperlukan.</p>','2025-05-08 09:56:43','2025-05-08 09:56:43'),(4,3,'Apa itu beasiswa?','<p>Beasiswa adalah bantuan finansial yang diberikan kepada mahasiswa untuk meringankan biaya pendidikan. Kami menawarkan berbagai jenis beasiswa berdasarkan prestasi akademik dan kebutuhan finansial. Informasi lebih lanjut dapat ditemukan di halaman beasiswa.</p>','2025-05-08 09:56:58','2025-05-08 09:56:58'),(5,1,'Kapan batas pendaftaran?','<p>Batas pendaftaran biasanya ditentukan setiap tahun akademik. Pastikan untuk memeriksa tanggal penting di situs kami. Kami juga mengingatkan calon mahasiswa melalui email dan media sosial.</p>','2025-05-08 09:57:14','2025-05-08 09:57:14');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identities`
--

DROP TABLE IF EXISTS `identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identities`
--

LOCK TABLES `identities` WRITE;
/*!40000 ALTER TABLE `identities` DISABLE KEYS */;
INSERT INTO `identities` VALUES (1,'Fakultas Hukum Unpas','<p>Fakultas Hukum Universitas Pasundan (UNPAS) adalah pilihan tepat bagi Anda yang ingin meniti karier gemilang di dunia hukum. Dengan kurikulum berbasis kompetensi, pengajar profesional berpengalaman, serta akreditasi unggul, FH UNPAS berkomitmen mencetak lulusan yang tidak hanya cerdas secara akademis, tetapi juga siap bersaing di tingkat nasional maupun internasional. Didukung fasilitas modern dan jaringan alumni luas yang telah sukses di berbagai bidang hukum, UNPAS membuka jalan Anda menuju masa depan yang gemilang sebagai praktisi hukum, akademisi, maupun pemimpin bangsa.</p>','<p>Jl. Lengkong Besar No.68, Cikawao, Kec. Lengkong, Kota Bandung, Jawa Barat, Indonesia 40261</p>','https://g.co/kgs/TWdqX6Y','(022) 4262226','hukum@unpas.ac.id','hukumunpas','hukumunpas','hukumunpas','hukumunpas','08.00 - 15.45','Senin - Sabtu','identity-image/v2WDey8WZ1alI28C8uV5VIiCmki51m7HgbSromJq.jpg','sideBanner-image/fhIWfOlOw8R3eDIzxhq7CMKYMK3SSJMkP4flPdM7.jpg','2025-05-10 01:54:31','2025-05-10 02:13:18');
/*!40000 ALTER TABLE `identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inovations`
--

DROP TABLE IF EXISTS `inovations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inovations` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inovations`
--

LOCK TABLES `inovations` WRITE;
/*!40000 ALTER TABLE `inovations` DISABLE KEYS */;
/*!40000 ALTER TABLE `inovations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurnals`
--

DROP TABLE IF EXISTS `jurnals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jurnals` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurnals`
--

LOCK TABLES `jurnals` WRITE;
/*!40000 ALTER TABLE `jurnals` DISABLE KEYS */;
INSERT INTO `jurnals` VALUES (1,1,1,'Pengembangan Karakter Social Justice Berbasis X Reality Dalam Meta-Ajar Hukum','Dr. Anthon F. Susanto, S.H.,M.Hum','pengembangan-karakter-social-justice-berbasis-x-reality-dalam-meta-ajar-hukum','<p>Pengembangan Karakter Social Justice Berbasis X Reality Dalam Meta-Ajar Hukum</p>','1','jurnal-images/UVS5XuUtz5BFKl0vwfUSiS5weLxAYNEvWdgX03up.jpg',NULL,NULL,'2025-05-08 08:39:42','2025-05-09 07:20:12'),(2,1,NULL,'Perlindungan Hukum Terhadap Hak Atas Kelangsungan Hidup Anak Dalam Perspektif Prinsip Keadilan','Dr. Utari Dewi Fatimah, S.H.,M.Hum','perlindungan-hukum-terhadap-hak-atas-kelangsungan-hidup-anak-dalam-perspektif-prinsip-keadilan','<p>Perlindungan Hukum Terhadap Hak Atas Kelangsungan Hidup Anak Dalam Perspektif Prinsip Keadilan</p>','1','jurnal-images/tpvHmTR2bc1aEfx7bVzYtuH8FQ0G6Oa1gzHA26S2.jpg',NULL,NULL,'2025-05-08 08:41:59','2025-05-09 07:26:26'),(3,1,NULL,'Formulasi Karakter Social Justice Dalam Pendidikan Hukum Yang Dapat Dikembangkan Melalui Pembelajaran Daring','Hesti Septianita, S.H.,M.H','formulasi-karakter-social-justice-dalam-pendidikan-hukum-yang-dapat-dikembangkan-melalui-pembelajaran-daring','<p>Formulasi Karakter Social Justice Dalam Pendidikan Hukum Yang Dapat Dikembangkan Melalui Pembelajaran Daring</p>','1','jurnal-images/tBi9Xb0NdVhDxHSiyDQGxalGI1E5J3ZdleF77mQn.jpg',NULL,NULL,'2025-05-08 08:44:32','2025-05-09 07:29:14');
/*!40000 ALTER TABLE `jurnals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kurikulums`
--

DROP TABLE IF EXISTS `kurikulums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kurikulums` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kurikulums`
--

LOCK TABLES `kurikulums` WRITE;
/*!40000 ALTER TABLE `kurikulums` DISABLE KEYS */;
INSERT INTO `kurikulums` VALUES (1,1,'Kajian Hukum Islam dan Kearifan Lokal','<p>Kajian Hukum Islam dan Kearifan Lokal membahas hubungan, interaksi, serta harmonisasi antara prinsip-prinsip hukum Islam dengan nilai-nilai adat, budaya, dan praktik lokal yang berkembang di masyarakat.</p>','kurikulums/b7OerrIiRbU5qmTWlHyxCZv2IbEQ8eW10ts1j4f2.png','kurikulums/1d0s1i5znqv3CFVVNdrZOOEuwNOSk8EzPDPSGAIV.svg','1','2025-05-08 09:24:03','2025-05-10 02:29:43'),(2,1,'Kajian Sistem Peradilan dan Kekuasaan Kehakiman','<p>Kajian mengenai sistem peradilan dan kekuasaan kehakiman merupakan salah satu aspek penting dalam studi hukum, karena berkaitan langsung dengan proses penegakan hukum dan keadilan di suatu negara.</p>','kurikulums/T1TzPAcHQ1KtCzkJgI8Wp2wbrhf8xhoLBxYtI23N.jpg','kurikulums/gY4QTeXEUQoyw3XqivbB6ztpMWDGHvWRHXuDsAqM.svg','1','2025-05-09 03:16:36','2025-05-09 08:37:06'),(3,1,'Kajian Hukum Kenegaraan','<p>Kajian Hukum Kenegaraan merupakan cabang ilmu hukum yang mempelajari aspek-aspek hukum yang mengatur struktur, fungsi, dan wewenang lembaga-lembaga negara, serta hubungan antara negara dengan warga negaranya.</p>','kurikulums/K2BCdreEC0MHAJ4EeMANqFrCwOZkwxJ93NORhhbD.jpg','kurikulums/Ai45zpdChFce877zDMbxZzoU5Ci1NmEyb2Rz8MAp.svg','1','2025-05-09 03:17:59','2025-05-09 08:41:05'),(4,1,'Kajian Hukum Gender dan Anak','<p><strong>Kajian Hukum Gender dan Anak</strong> merupakan cabang kajian dalam ilmu hukum yang menitikberatkan pada perlindungan, keadilan, dan kesetaraan hak bagi kelompok rentan, khususnya perempuan dan anak-anak, dalam berbagai aspek kehidupan hukum.</p>','kurikulums/54ApZUS9fJLIkeEuOPty33F9yfniz90bMixIRoQ0.jpg','kurikulums/OdzyKQBqzn1axkwkghUOiT8UjReRyjbgAPqsCqpS.svg','1','2025-05-09 03:18:46','2025-05-10 02:31:36'),(5,1,'Kajian Analisis Ekonomi dan Hukum','<p><strong>Kajian Analisis Ekonomi dan Hukum (Law and Economics)</strong> adalah pendekatan interdisipliner yang menggabungkan prinsip-prinsip ilmu ekonomi dengan analisis hukum untuk memahami bagaimana hukum memengaruhi perilaku ekonomi</p>','kurikulums/ZN5pIOlNqbC6HmytcfXlrfLNdoflFwg39MPTlY0V.jpg','kurikulums/6ho4Kxni2sWLJuUSAJzu8CcrdbyozgpeahgVD3I6.svg','1','2025-05-09 03:19:43','2025-05-10 02:30:43'),(6,1,'Kajian Hukum dan Masyarakat Internasional','<p><strong>Kajian Hukum dan Masyarakat Internasional</strong> merupakan bidang studi dalam ilmu hukum yang membahas hubungan antara negara-negara, organisasi internasional, dan aktor-aktor non-negara dalam konteks hukum yang mengatur tatanan global</p>','kurikulums/ss7IEQTNZEq781SbsvegEZIBGmy3XzdkXJzdPvzF.jpg','kurikulums/AHq2GHvt4UbtsrvsyJPYuTdFmiPw1iFamNYUBBIP.svg','1','2025-05-09 03:25:42','2025-05-09 08:27:47');
/*!40000 ALTER TABLE `kurikulums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legal_documents`
--

DROP TABLE IF EXISTS `legal_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `legal_documents` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legal_documents`
--

LOCK TABLES `legal_documents` WRITE;
/*!40000 ALTER TABLE `legal_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `legal_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_04_10_033055_create_profile_fakultas_table',1),(5,'2025_04_10_033249_create_departements_table',1),(6,'2025_04_10_033429_create_user_pics_table',1),(7,'2025_04_10_033520_create_analytics_table',1),(8,'2025_04_10_033605_create_sliders_table',1),(9,'2025_04_10_033651_create_side_baners_table',1),(10,'2025_04_10_033739_create_identities_table',1),(11,'2025_04_10_034209_create_partners_table',1),(12,'2025_04_10_034318_create_legal_documents_table',1),(13,'2025_04_10_034402_create_ourteams_table',1),(14,'2025_04_10_034432_create_usps_table',1),(15,'2025_04_10_034542_create_facilities_table',1),(16,'2025_04_10_034722_create_achievements_table',1),(17,'2025_04_10_034818_create_organizations_table',1),(18,'2025_04_10_035009_create_testimonials_table',1),(19,'2025_04_10_035112_create_inovations_table',1),(20,'2025_04_10_035152_create_supports_table',1),(21,'2025_04_10_035247_create_faq_categories_table',1),(22,'2025_04_10_035318_create_faqs_table',1),(23,'2025_04_11_031523_add_two_factor_columns_to_users_table',1),(24,'2025_04_21_015737_create_categories_table',1),(25,'2025_04_21_021324_create_posts_table',1),(26,'2025_04_23_015339_create_acces_departements_table',1),(27,'2025_04_26_133532_create_data_values_table',1),(28,'2025_04_28_033445_create_agendas_table',1),(29,'2025_04_28_034420_create_faculties_table',1),(30,'2025_04_28_042255_create_portofolios_table',1),(31,'2025_04_28_064315_create_personal_access_tokens_table',1),(32,'2025_04_30_031312_create_prospeks_table',1),(33,'2025_04_30_031705_create_kurikulums_table',1),(34,'2025_05_03_050740_create_jurnals_table',1),(35,'2025_05_05_024329_create_timelines_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizations` (
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,1,'Komisi Pemilihan Umum UNPAS (KPUM)','Organisasi','<h2>&nbsp;</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Komisi Pemilihan Umum UNPAS (KPUM)</p>\r\n\r\n<p>&nbsp;</p>','1','organisasis/zC38oMPIUJiSC29ODJ09eHZLnuG2wDX0nFbcktVw.webp','2025-05-08 03:37:49','2025-05-08 03:37:49'),(2,1,'PLT BEM','Organisasi','<p>BEM adalah organisasi mahasiswa intra kampus yang bertugas mewakili aspirasi mahasiswa kepada lembaga</p>','1','organisasis/EYG0uAZgdgxJxEVAwINbDRssWENBJvNdobdzeac3.webp','2025-05-08 03:39:17','2025-05-08 03:39:17'),(3,1,'PLT BPM','Organisasi','<h2>PLT BPM</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/95TfsZJ3Y1fsSQ96NEL9zOljwjjGcrJsFDk95XkL.jpg','2025-05-08 03:40:05','2025-05-08 03:40:05'),(4,1,'APMC 2025','Organisasi','<h2>APMC 2025</h2>','1','organisasis/XXN1a8ona6zMhAmOcDzuIAihAgT7iy9tRNJswMaf.webp','2025-05-08 03:41:09','2025-05-08 05:12:33'),(5,1,'BAPERA','Organisasi','<p>BAPERA</p>','1','organisasis/vlmmAU63WbkL9wIGj47BHz2LUqxP0cyx2hpDAtg5.webp','2025-05-08 03:42:34','2025-05-08 03:42:34'),(6,1,'Himpunan Mahasiswa Ilmu Komunikasi (HIMAKOM)','Organisasi','<h2>Himpunan Mahasiswa Ilmu Komunikasi (HIMAKOM)</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/ySuxxTmHRGnYyoRgWBbbGUck4mCNDjw7DbK1omuI.jpg','2025-05-08 04:48:34','2025-05-08 04:48:34'),(7,1,'Himpunan Mahasiswa HI','Organisasi','<h2>Himpunan Mahasiswa HI</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/gbT64vhw2YWFwbGgn4S26f2L2RFa6kGVcNxIsaUW.jpg','2025-05-08 04:59:27','2025-05-08 07:29:45'),(8,1,'Pasundan Diplomacy Community','Komunitas','<h2>Pasundan Diplomacy Community</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/cjWYb9i8aSOyRRxcH0aB6535alRJxCiZkPr3YG3G.jpg','2025-05-08 05:08:59','2025-05-08 05:08:59'),(9,1,'Pasundan Debate Club','Komunitas','<h2>Pasundan Debate Club</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/Iz77Dpn4SA93NAO0wqccmXUr2F3zZ6w10rMJQR9f.jpg','2025-05-08 06:56:15','2025-05-08 07:23:13'),(10,1,'Himpunan Ilmu Kesejahteraan Sosial','Organisasi','<h2>Himpunan Ilmu Kesejahteraan Sosial</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/JtuqoRLFpmD837OG4RbtFxm8HzJYVGVimevHB5g2.webp','2025-05-08 06:59:03','2025-05-08 06:59:03'),(11,1,'Himpunan Mahasiswa Program Studi Manajemen','Organisasi','<h2>Himpunan Mahasiswa Program Studi Manajemen</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/7HWbmN3XNK49skhyYUvxWyb10YvZHtfUp2h9bcIX.jpg','2025-05-08 07:33:07','2025-05-08 07:33:07'),(12,1,'Kegiatan Vodcast','Kegiatan','<h2>Kegiatan Vodcast</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/TVUewPAdy083lJPxcuHuMrFqCjgKi3pSW9NSk7OA.jpg','2025-05-08 07:40:04','2025-05-08 07:40:04'),(13,1,'Accountalk','Komunitas','<h2>Accountalk</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/rAKIs3UkVw7jlxuxv7xsjGkW6Wi7Jljq4fXEP1xV.jpg','2025-05-08 07:45:19','2025-05-08 07:45:19'),(14,1,'Kabari (Kegiatan Kajian Bareng)','Kegiatan','<h2>Kabari (Kegiatan Kajian Bareng)</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/DNMCZXgz28rTQIRd3vjv2aNA5CqnQOPeer5BukNm.jpg','2025-05-08 07:50:11','2025-05-08 07:50:11'),(15,1,'Worskhop Excel','Kegiatan','<h2>Worskhop Excel</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/DEn7pGmNh0rgIdoy4G7SyObJ50hAjzsM6PtEaJNA.jpg','2025-05-08 07:52:16','2025-05-08 07:52:16'),(16,1,'BASO (Bahas Soal)','Kegiatan','<h2>BASO (Bahas Soal)</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/ckOUJgT4iVNh1FF3mxiLosQgpFDmrYIusBky9s8W.jpg','2025-05-08 07:57:23','2025-05-08 07:57:23'),(17,1,'Gerakan Mengajar Desa','Komunitas','<h2>Gerakan Mengajar Desa</h2>\r\n\r\n<p>&nbsp;</p>','1','organisasis/gVOiEw07jbjJGrp3YvM2KWLFMSytPmaXiwXaoPhG.jpg','2025-05-08 08:21:55','2025-05-08 08:23:48');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ourteams`
--

DROP TABLE IF EXISTS `ourteams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ourteams` (
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ourteams`
--

LOCK TABLES `ourteams` WRITE;
/*!40000 ALTER TABLE `ourteams` DISABLE KEYS */;
INSERT INTO `ourteams` VALUES (1,1,'Prof. Dr. Anthon F Susanto, S.H., M.Hum.','Dekan Fakultas Hukum UNPAS','anthon@example.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/KbMPaVTxYgRKLAZDSfd0B47IfGQZKSoRasV2eh5N.png','1','2025-05-07 05:17:12','2025-05-08 08:15:36'),(2,1,'Abdy Yuhana','Dosen','admin@example.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/1EpMtH5OuhHxXcIuOujXhOmj9vkboYcgLDI9aGjM.png','1','2025-05-07 06:07:14','2025-05-07 06:07:14'),(3,1,'Anthon F. Susanto, S.H., M.Hum., Dr. Prof','Dosen','testing@gmail.com','081234567890','testing','testing','testing','testing','ourteam-image/oCq9NAeLVRa8pJjUA7Bx2I7nf6HdaTXRRny6uDyg.jpg','1','2025-05-08 09:25:12','2025-05-08 09:39:24'),(4,1,'Hj. Ummi Maskanah, S.H., M.Hum., Dr','Dosen','testing@gmail.com','081298765432','testing','testing','testing','testing','ourteam-image/hiKQw2pdSz2g2A2pLSMFNgd3Bo2TpzTupolx01ZL.jpg','1','2025-05-08 09:26:11','2025-05-08 09:26:11'),(5,1,'Hj. Rd. Dewi Asri Yustia, S.H., M.H., Dr.','Dosen','testing@gmail.com','082134567891','testing','testing','testing','testing','ourteam-image/Wngi89qBuUWqKMvRz3oO0H9QvTxe1PZ7awvSL5zH.jpg','1','2025-05-08 09:27:19','2025-05-08 09:27:19'),(6,1,'T. Subarsyah, S.H., S.Sos., Sp-1., M.M., Dr. Prof.','Dosen','testing@gmail.com','082298765431','testing','testing','testing','testing','ourteam-image/5I2XyX6iLkTxg8LGFuJSidxLpqGOpeao0eFJaLpa.jpg','1','2025-05-08 09:29:44','2025-05-08 09:29:44'),(7,1,'Wahyu Wiriadinata S.H., M.H., Dr.','Dosen','testing@gmail.com','081298765432','testing','testing','testing','testing','ourteam-image/MMZjjm0MGe9kbYaFje7PbnvzvKCsefWJXqzVNkXP.jpg','1','2025-05-08 09:30:34','2025-05-08 09:30:34'),(8,1,'Hj. Utari Dewi Fatimah, S.H., M.H., Dr.','Dosen','testing@gmail.com','082134567891','testing','testing','testing','testing','ourteam-image/PhTU1ub73NVRt38XblXXnj2hNxnKfU7C5obfqKro.jpg','1','2025-05-08 09:35:25','2025-05-08 09:35:25'),(9,1,'Siti Rodiah, S.H., M.H., Dr.','Dosen','testing@gmail.com','082134567891','testing','testing','testing','testing','ourteam-image/GN7WssgAnbrSl48frhcEGzSIdMOCkVgdNvpNHurv.jpg','1','2025-05-08 09:36:07','2025-05-08 09:36:07'),(10,1,'Taty Sugiarti, S.H., M.H., Dr.','Dosen','testing@gmail.com','082134567891','testing','testing','testing','testing','ourteam-image/QK3tmpDpRLJzyAF0RQ5gltRzRU0ZkOYRmpXhQfH0.jpg','1','2025-05-08 09:36:39','2025-05-08 09:36:39'),(11,1,'Saim Aksinuddin, S.H., M.H., Dr.','Dosen','testing@gmail.com','082134567891','testing','testing','testing','testing','ourteam-image/8RE9OcAehNhtKt54r6bC5MCxRcQDVxnybX6zZqWl.jpg','1','2025-05-08 09:37:08','2025-05-08 09:38:11'),(12,1,'Dedy Hernawan, S.H., M.Hum., Dr.','Dosen','testing@gmail.com','082134567891','testing','testing','testing','testing','ourteam-image/IZI0HBHntxQRh4sWSDgqRDGZMEmoyH97Z2A21CP2.jpg','1','2025-05-08 09:40:32','2025-05-08 09:40:32'),(13,1,'Hj. N. Ike Kusmiati, S.H., M.Hum., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/FVjajYceX2QDynPyeiHb4xeHOwUq4x5GACsDRwbd.jpg','1','2025-05-10 02:54:42','2025-05-10 02:54:42'),(14,1,'Yusep Mulyana, S.H., M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/cXmdHBqO2iXEePNGedj5zV92LkQQkNYjdajQdDgJ.jpg','1','2025-05-10 02:55:51','2025-05-10 02:55:51'),(15,1,'Berna Sudjana Ermaya S.H., M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/3SGaYrofd1qBK3Y7DvG2lmLlcNae5rnPWqdi8y7T.jpg','1','2025-05-10 02:56:57','2025-05-10 02:56:57'),(16,1,'Nurhasan, S.H., M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/GlKQP6BxLbhsbsYOL4HxUiOdEr9ZhwpCHxHSrPwg.jpg','1','2025-05-10 02:58:28','2025-05-10 02:58:28'),(17,1,'Rika Kurniasari Abdulgani, S.H., M.Hum., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/pDxLBGePRctJd4TSZbmxBBG2uS0t6pKZMiJ9IB4T.jpg','1','2025-05-10 03:04:51','2025-05-10 03:04:51'),(18,1,'Hj. Tuti Rastuti, S.H., M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/5MYzy1keBTPSoDTQxIgwHFbCt5QzUttTBH1FaQ4h.jpg','1','2025-05-10 03:05:40','2025-05-10 03:05:40'),(19,1,'H. Deden Sumantry, S.H., M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/tfLuapk92BczwPfxqbpPISAp5m1E1pglpOrgj53y.jpg','1','2025-05-10 03:06:25','2025-05-10 03:06:25'),(20,1,'Firdaus Arifin, S.H. M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/Wnocwu3xaSpquh06gg8M1C9M2NNzNYFMLha4cpzJ.jpg','1','2025-05-10 03:07:23','2025-05-10 03:07:23'),(21,1,'Hj. Irma Rachmawati S.H. M.H. Ph.D','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/T6ryzBEfrt9DBkr9yNPOa9CKKLPL3N2aeHY9SZHu.png','1','2025-05-10 03:08:21','2025-05-10 03:08:21'),(22,1,'Hj. Irma Rachmawati S.H. M.H. Ph.D','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/94lDvOXylB2AsR8alWWGKwdwAMBUhP0jFZj5tY6j.jpg','1','2025-05-10 03:10:11','2025-05-10 03:10:11'),(23,1,'Gialdah Tapiansari Batubara, S.H. M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/PQs30PIfjJJD5iRZnlLsrtG53t150zgyM4AW9Z0e.jpg','1','2025-05-10 03:10:57','2025-05-10 03:10:57'),(24,1,'Bunyamin, Drs., M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/JitYRJFgAPtd3dudom6jMXiN7gK40ElNHSoHKay6.jpg','1','2025-05-10 03:11:44','2025-05-10 03:11:44'),(25,1,'Hj. Nia Kania Winayanti, Dra., SH., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/GZxi9ITU34AO9nfcd8zIUtVFw5NyVzv0vPCP7Tn8.jpg','1','2025-05-10 03:12:39','2025-05-10 03:12:39'),(26,1,'Irwan Saleh Indrapradja, S.H., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/j1yalI8P9XiHKhLdUx0K9zYY6hy8pm2cu3i5TvNk.jpg','1','2025-05-10 03:13:32','2025-05-10 03:13:32'),(27,1,'Maman Budiman, S.H., M.H., Dr.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/n0QjLtiTMk9LnrSv1YIFGpXliXr6yquSyL8b4IjZ.jpg','1','2025-05-10 03:14:21','2025-05-10 03:14:21'),(28,1,'Haswar Widjanarto, S.S., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/zjbFwKS5Vfkll5ip3wzefRLtYZ2vTVN7d90mfz4r.jpg','1','2025-05-10 03:14:54','2025-05-10 03:14:54'),(29,1,'Ahmad Abdul Gani, Drs.,SH.,M.Ag.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/8k7uiczzYOIhachIcziPDdowqgVJovepr9tHxXRU.jpg','1','2025-05-10 03:15:35','2025-05-10 03:15:35'),(30,1,'Leni Widi Mulyani, S.H., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/xeHUt564CO6ibTBc3tM2iDbQFdFMcgWZSWYoUZ2S.jpg','1','2025-05-10 03:16:18','2025-05-10 03:16:18'),(31,1,'Gandhi Pharmacista, S.H. M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/xxo5huPP0lw5mtAs88DD3KG2VJ286i27F448tKdf.jpg','1','2025-05-10 03:17:06','2025-05-10 03:17:06'),(32,1,'Agus Mulyono, S.H. M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/VTSeQ2hsbWgickx8mAEUKaPgcJeR7JhGDMuJ5zZV.jpg','1','2025-05-10 03:46:11','2025-05-10 03:46:11'),(33,1,'Encep Ahmad Yani, Drs., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/YPvFMAXw8EBjAPQglatT2McjVZyYILoXmMeANuxg.jpg','1','2025-05-10 03:46:50','2025-05-10 03:46:50'),(34,1,'Dedy Mulyana, S.H., M.H.,','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/17ViBI6pzWCDYVxVLyb16xZzCxnOVDbQjzM1eSmj.jpg','1','2025-05-10 03:47:27','2025-05-10 03:47:27'),(35,1,'H. Yudi Prihartanto Soleh, S.H., M.Hum.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/YUWfAdPwlZDy8JPJXvz1smpvU8K7GrtmWnghe7It.jpg','1','2025-05-10 03:48:18','2025-05-10 03:48:18'),(36,1,'Fajar Ramadhan Kartabrata, S.H., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/rRUOrp8Y7CtcX167jNraU2FVTFyWTvDYn4SB7BSu.jpg','1','2025-05-10 03:49:59','2025-05-10 03:49:59'),(37,1,'Virly Vidiasti Sabijanto, S.H., M.Kn.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/Y3nll8Uw2MkThBN2mXgkVh6LH1oVKP4q2AhQI5Z1.jpg','1','2025-05-10 03:50:37','2025-05-10 03:50:37'),(38,1,'Rosa Tedjabuana, S.H., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/wsWtlVdhTabcmJ2AzzEGlqUeNZtXQ0pus7tGiKL8.jpg','1','2025-05-10 03:51:27','2025-05-10 03:51:27'),(39,1,'Sisca Ferawati Burhanuddin, S.H., M.Kn.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/wT8s4dzBXDmNJUKJfB65vIvSBy5zphxi13uaaBBP.jpg','1','2025-05-10 03:53:14','2025-05-10 03:53:14'),(40,1,'Hj. Saptosih Ismiati, S.H., M.H.','Dosen','unpas@gmail.com','0','unpas','unpas','@unpas','@unpas','ourteam-image/Vjc7VaQeQKXY5nj0XtYg86DYllm7T0WZ0M3vE4SO.jpg','1','2025-05-10 03:56:04','2025-05-10 03:56:04'),(42,1,'Ihsanul Ma’arif, S.H., M.H.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/ChbVq9X3PmomeTpHm0cm3HuVIjQh8utzpXsf2A85.jpg','1','2025-05-10 03:58:29','2025-05-10 03:58:29'),(43,1,'Rusli Subrata, S.H., M.H.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/xs1XmbmECmflG9b29DrD0mqVmVqO9EqwoQFrtqO5.jpg','1','2025-05-10 03:59:31','2025-05-10 03:59:31'),(44,1,'Moch. Miftah, Drs. M.H.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/zzVBwi9CPtaSLlrEIURkZL3R2KpUl0XOrqZwyPol.jpg','1','2025-05-10 04:01:18','2025-05-10 04:01:18'),(45,1,'Murshal Senjaya, S.H., M.H., Dr.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/CxlcDcUKGSLzA7lfzoK3mVK00CdxyexEOycLn4dQ.jpg','1','2025-05-10 04:01:57','2025-05-10 04:01:57'),(46,1,'Moch. Erick Ernawan Rahman, S.H., M.H.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/69YhvrtbIJ9Qs5lXaNt8ko0njPUigupQXMA2cUk8.jpg','1','2025-05-10 04:02:38','2025-05-10 04:02:38'),(47,1,'Willman Supondho Akbar, S.H., M.H.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/H1w2CvRgMkj4EUgBjH5NxPBahtrcQGJD0FRmsshX.jpg','1','2025-05-10 04:03:18','2025-05-10 04:03:18'),(48,1,'Faris Fachrizal Jodi, S.H., M.H.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/urbn5vDtqwd1PLOF9EdJI0186lJkLB98FM3cMOo4.jpg','1','2025-05-10 04:04:03','2025-05-10 04:04:03'),(49,1,'Mohammad Alvi Pratama, S.Fil., M.Phil.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/59txhu5cQMQmjQJtS0cnk1gyeLTwjHbElucAZUxq.jpg','1','2025-05-10 04:04:45','2025-05-10 04:04:45'),(50,1,'Zakki Abdillah Syam, S.H., M.H.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/ADSN0oTLheV0Vep0ZGgihk9RyxGVeCZJLnluXD1o.jpg','1','2025-05-10 04:05:27','2025-05-10 04:05:27'),(51,1,'H. Romli Atmasasmita, S.H., LL.M., Dr., Prof.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/X4rmeKHeUW4UehffZlE6N6Ml002rFAgAq5d3fr9V.jpg','1','2025-05-10 04:14:49','2025-05-10 04:14:49'),(52,1,'I Gde Pantja Astawa, S.H., M.H., Dr. Prof.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/qtggKzt5TKfzYmsRmtxzXj26S7jfrNvbyYq0zDTF.jpg','1','2025-05-10 04:15:24','2025-05-10 04:15:24'),(53,1,'H. Lili Rasjidi, S.H., S.Sos., LL.M., Dr., Prof.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/RIB3gYCVAXxn1yMqnOxRM2JBcZkCk64UxTlqlPXF.jpg','1','2025-05-10 04:16:08','2025-05-10 04:16:08'),(54,1,'H. Rukmana Amanwinata, S.H., M.H. Dr., Prof.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/HislX2GxyxycoPCvB6Ugaallpu5TAExDV94cUzLf.jpg','1','2025-05-10 04:16:42','2025-05-10 04:16:42'),(55,1,'H. Ali Anwar, M.Pd., Dr., Prof.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/vjYtLJcbNvpeRIMuENztoBDqPQYI6InIsE6H26W9.jpg','1','2025-05-10 04:17:13','2025-05-10 04:17:13'),(56,1,'Bambang Daru Nugroho, S.H., M.H, Dr.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/zwf84v1L6JyNDxlruJ7tkBnq8CFe6P2GoWF9XaSN.jpg','1','2025-05-10 04:17:50','2025-05-10 04:17:50'),(57,1,'Muhammad Kholid, S.H., M.H., Dr.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/CZ0dO0i7RS27iDQY6OwMeNGfmT3XkaMTNs82SA3c.jpg','1','2025-05-10 04:18:28','2025-05-10 04:18:28'),(58,1,'H. Tata Sukayat, M.Ag., Dr.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/YptjbWlIEacKrnHUgpMq0LyvaN0Cb5bbRI9zFnp5.jpg','1','2025-05-10 04:19:22','2025-05-10 04:19:22'),(59,1,'Ade Priangani, M.Si., Dr.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/bINQMwJlGjPycsCz1YHpFD6UCUWAl4uJXRFRnEQk.jpg','1','2025-05-10 04:19:52','2025-05-10 04:19:52'),(60,1,'Ririn Dwi Agustin., S.T., M.T., Dr.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/ItfCU53rCDi7IEw1lmjA449LapddHA7buQxwGr5U.jpg','1','2025-05-10 04:20:30','2025-05-10 04:20:30'),(61,1,'Eden Komaruddin, M.Si., Dr.','Dosen','unpas@gmail.com','62811960193','unpas','unpas','@unpas','@unpas','ourteam-image/NEm9cxLzi0H7yBd9eZR4Y3VLJFiAxMfAKR7j2oUT.jpg','1','2025-05-10 04:21:19','2025-05-10 04:21:19');
/*!40000 ALTER TABLE `ourteams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,1,'Panasastra University – Cambodia','Panasastra University – Cambodia','<p>Panasastra University &ndash; Cambodia</p>','<p>Panasastra University &ndash; Cambodia</p>','partner-image/dkjASu711xEeKWyPjz7zYhilffE7PyEtVxqLsk23.png','active','1','2025-05-07 05:54:17','2025-05-07 05:54:17'),(2,1,'Guizhon University – China','Guizhon University – China','<h2>Guizhon University &ndash; China</h2>','<h2>Guizhon University &ndash; China</h2>','partner-image/KlCkE9sGHIl5x6fXLrqfiSsYnYxciC6TFiayXuxB.png','active','1','2025-05-07 05:55:13','2025-05-07 05:55:13'),(3,1,'Yunan Normal University','Yunan Normal University','<h2>Yunan Normal University</h2>','<h2>Yunan Normal University</h2>','partner-image/BbOF4dJFnUuV8ToGSpbkbTFtnFuYCHLZzBqFZ9JO.png','active','1','2025-05-07 05:56:09','2025-05-07 05:56:09'),(4,1,'Hamamatsu University of Japan.','Hamamatsu University of Japan.','<h2>Hamamatsu University of Japan.</h2>','<h2>Hamamatsu University of Japan.</h2>','partner-image/EQrRgq25nyte1pTbqo1hzyjNyXHExmMy0Sp78sbT.png','active','1','2025-05-07 05:58:30','2025-05-07 05:58:30'),(5,1,'Shizouka University – Japan','Shizouka University – Japan','<h2>Shizouka University &ndash; Japan</h2>','<h2>Shizouka University &ndash; Japan</h2>','partner-image/zawE4cBUGRod13jRRMIgOIlqef5LnGw20FfaEyqY.png','active','1','2025-05-07 05:59:13','2025-05-07 05:59:13'),(6,1,'BAWASLU','Jawa Barat','<p>BAWASLU Jawa Barat</p>','<p>BAWASLU Jawa Barat</p>','partner-image/7NwQTTGjz2csecbHK5NnnneMzdx56g6vEG40gdLy.png','active','1','2025-05-08 02:00:21','2025-05-08 02:00:21'),(7,1,'KONGRES ADVOKAT','KONGRES ADVOKAT','<p>KONGRES ADVOKAT</p>','<p>KONGRES ADVOKAT</p>','partner-image/v2028JY55VKAHLOTgD6E5VAIZj5Fgx1uo2fe9LjW.png','active','1','2025-05-08 02:02:10','2025-05-08 02:02:10'),(8,1,'KOMISI KEJAKSAAN','KOMISI KEJAKSAAN','<p>KOMISI KEJAKSAAN&nbsp;</p>','<p>KOMISI KEJAKSAAN&nbsp;</p>','partner-image/xr8vgujGFJ4BfY1LxVneTkOC16I1z4H4veJG2D80.png','active','1','2025-05-08 02:03:32','2025-05-08 02:03:32'),(9,1,'KOMISI PEMILIHAN UMUM','KOMISI PEMILIHAN UMUM','<p>KOMISI PEMILIHAN UMUM</p>','<p>KOMISI PEMILIHAN UMUM</p>','partner-image/M8muS4Zn3Czd30kpjn1zlJHJJXnv0l1ibxQhTUTc.png','active','1','2025-05-08 02:04:47','2025-05-08 02:04:47'),(10,1,'KOMISI PENYIARAN INDONESIA DAERAH','KOMISI PENYIARAN INDONESIA DAERAH','<p>KOMISI PENYIARAN INDONESIA DAERAH</p>','<p>KOMISI PENYIARAN INDONESIA DAERAH</p>','partner-image/sbHXULBpisAyFOd1ujWlk8coFvT72yP6x6Q4WrLK.png','active','1','2025-05-08 02:06:18','2025-05-08 02:06:18'),(11,1,'KOMISI YUDISIAL REPUBLIK INDONESIA','KOMISI YUDISIAL REPUBLIK INDONESIA','<p>KOMISI YUDISIAL REPUBLIK INDONESIA</p>','<p>KOMISI YUDISIAL REPUBLIK INDONESIA</p>','partner-image/XtvWcajkqIBxEb436mTA9yRCg52eiekbtrkMaRLK.png','active','1','2025-05-08 02:07:25','2025-05-08 02:07:25'),(12,1,'PERMASYARAKATAN','PERMASYARAKATAN','<p>PERMASYARAKATAN</p>','<p>PERMASYARAKATAN</p>','partner-image/nSdoAa4ZXs9eDG8GAaAu3R8mF5ERZrFWKieYQ1Bm.png','active','1','2025-05-08 02:08:29','2025-05-08 02:08:29'),(13,1,'PENGADILAN TINGGI AGAMA BANDUNG','PENGADILAN TINGGI AGAMA BANDUNG','<p>PENGADILAN TINGGI AGAMA BANDUNG</p>','<p>PENGADILAN TINGGI AGAMA BANDUNG</p>','partner-image/KCYod5APSRWhixjsRVzQduA5j754uBZ2FpM0Vj8h.png','active','1','2025-05-08 02:09:33','2025-05-08 02:09:33'),(14,1,'KEMENKUNHAM','KEMENKUNHAM','<p>KEMENKUNHAM</p>','<p>KEMENKUNHAM</p>','partner-image/peIZOUj6A0LkvbeDeQevZqlSIZ0CYVY1eLDUbGBK.png','active','1','2025-05-08 02:10:32','2025-05-08 02:10:32'),(15,1,'HEYLAW','HEYLAW','<p>HEYLAW</p>','<p>HEYLAW</p>','partner-image/JXFLSnGsvcXXuYADVwY4JRfSHj80RNtdVUnhUnyI.png','active','1','2025-05-08 02:11:14','2025-05-08 02:11:14');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portofolios`
--

DROP TABLE IF EXISTS `portofolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portofolios` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portofolios`
--

LOCK TABLES `portofolios` WRITE;
/*!40000 ALTER TABLE `portofolios` DISABLE KEYS */;
INSERT INTO `portofolios` VALUES (1,1,'LegalBot – Asisten Hukum Digital untuk Mahasiswa dan Masyarakat','<p>LegalBot adalah inovasi teknologi berbasis chatbot yang dikembangkan oleh Fakultas Hukum untuk membantu mahasiswa dan masyarakat umum dalam mendapatkan informasi hukum secara cepat dan akurat.&nbsp;</p>','1','portofolio-images/mfNuIeORoa1eVID6wSzGc5nrJADcYyOpe0QR54VM.jpg',NULL,NULL,'testing','2025-05-09 02:18:47','2025-05-09 02:21:43'),(2,1,'e-Moot Court – Simulasi Sidang Virtual Interaktif','<p>e-Moot Court adalah platform simulasi sidang berbasis web yang dirancang untuk melatih keterampilan litigasi mahasiswa hukum. Inovasi ini memungkinkan mahasiswa melakukan praktik peradilan secara daring, mulai dari peran sebagai jaksa, pengacara, hingga hakim.</p>','1','portofolio-images/y8mksrhvMJYGS4845oQQfZ1T2QOpo13vTI9XljMr.jpg',NULL,NULL,'testing','2025-05-09 02:38:58','2025-05-09 02:38:58'),(3,1,'Lawpedia – Ensiklopedia Hukum Digital Berbasis Komunitas','<p>Lawpedia adalah platform ensiklopedia hukum digital yang dikembangkan oleh Fakultas Hukum dan diperbarui secara kolaboratif oleh dosen, mahasiswa, dan alumni.</p>','1','portofolio-images/q2217EFrJY0m3ZlvqT0aDeGnyBMIBWKcVPAFFpEN.jpg',NULL,NULL,'testing','2025-05-09 02:58:15','2025-05-09 02:58:15'),(4,1,'Klinik Hukum Online – Konsultasi Hukum Gratis bagi Masyarakat','<p>Klinik Hukum Online adalah layanan konsultasi hukum gratis yang diinisiasi oleh Fakultas Hukum untuk membantu masyarakat dalam menyelesaikan permasalahan hukum secara etis dan profesional.</p>','1','portofolio-images/JMywTL3zRfKV6Rx5xltZiNgNkzghRo2TjDvs7fOG.jpg',NULL,NULL,'testing','2025-05-09 03:01:31','2025-05-09 03:01:31');
/*!40000 ALTER TABLE `portofolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (3,1,'Prestasi Olahragamu Sangat Dihargai UNPAS! Masuk Kuliah Lewat Jalur Atlet (Tanpa Tes!) + Beasiswa Menunggumu!','prestasi-olahragamu-sangat-dihargai-unpas-masuk-kuliah-lewat-jalur-atlet-tanpa-tes-beasiswa-menunggumu','<p>UNPAS ngerti banget perjuangan kamu latihan pagi-sore, keringetan demi bawa pulang medali. UNPAS buka jalur penerimaan mahasiswa baru yang khusus banget buat para atlet berprestasi kayak kamu. Namanya&nbsp;<strong>Jalur Atlet Muda Berprestasi</strong>.</p>','<p>Halo para juara di bidang olahraga! Abis lulus SMA/SMK/MA/Pesantren atau yang sederajat, terus bingung mau lanjut kemana? Eits, kalau kamu punya prestasi segudang di bidang olahraga, mending merapat deh! Ada kabar super&nbsp;<em>ciamik</em>&nbsp;dari Universitas Pasundan (UNPAS) Bandung nih buat kamu!&nbsp;</p>\r\n\r\n<p>UNPAS ngerti banget perjuangan kamu latihan pagi-sore, keringetan demi bawa pulang medali. UNPAS buka jalur penerimaan mahasiswa baru yang khusus banget buat para atlet berprestasi kayak kamu. Namanya&nbsp;<strong>Jalur Atlet Muda Berprestasi</strong>. Kedengerannya aja udah keren, kan?&nbsp;</p>\r\n\r\n<p><strong>Jadi, Apa Sih Jalur Atlet Muda Berprestasi UNPAS Ini?&nbsp;</strong></p>\r\n\r\n<p>Gampangnya gini, ini tuh semacam&nbsp;<em>golden ticket</em>&nbsp;buat kamu yang punya prestasi olahraga, minimal tingkat daerah (provinsi), sampai level nasional bahkan internasional! UNPAS pengen ngasih apresiasi buat kerja keras kamu, sekaligus pengen banget punya lulusan yang nggak cuma pinter di kelas, tapi juga jago di lapangan dan bisa ikut majuin olahraga Indonesia. Keren, kan? Bisa ngampus sambil tetep jadi&nbsp;<em>star</em>&nbsp;di bidang kamu!</p>\r\n\r\n<p>Jalur ini dibuka untuk&nbsp;<strong>semua program studi</strong>&nbsp;di UNPAS,&nbsp;<em>tapi...</em>&nbsp;ada tapinya nih,&nbsp;<strong>kecuali untuk Fakultas Kedokteran</strong>&nbsp;ya. Jadi, kalau kamu ngincer jadi dokter, jalur ini belum bisa. Tapi buat prodi lain? Gasskeun!</p>\r\n\r\n<p><strong>Siapa Aja yang Bisa Masuk Lewat Jalur &#39;Sat Set Sat Set&#39; Ini?</strong></p>\r\n\r\n<p>Nah, biar bisa lolos lewat jalur prestasi ini, kamu harus punya&nbsp;<em>salah satu</em>&nbsp;dari prestasi keren berikut:</p>\r\n\r\n<ul>\r\n	<li><strong>Level Internasional:</strong>&nbsp;Pernah jadi&nbsp;<strong>Juara</strong>&nbsp;atau minimal jadi&nbsp;<strong>Perwakilan Resmi</strong>&nbsp;Indonesia di ajang olahraga internasional yang resmi ya (bukan lomba 17-an tingkat RT).</li>\r\n	<li><strong>Level Nasional:</strong>&nbsp;Pernah jadi&nbsp;<strong>Juara</strong>&nbsp;di kejuaraan tingkat nasional, contohnya kayak Pekan Olahraga Nasional (PON) atau Kejuaraan Nasional (Kejurnas) cabang olahraga kamu.</li>\r\n	<li><strong>Level Daerah (Provinsi):</strong>&nbsp;Pernah jadi&nbsp;<strong>Juara</strong>&nbsp;di event olahraga tingkat provinsi, misalnya Pekan Olahraga Provinsi (PORPROV) atau kejuaraan resmi lainnya di level provinsi.</li>\r\n</ul>\r\n\r\n<p>Minimal salah satu dari itu udah pernah kamu raih? Wah, lampu hijau nih buat kamu!</p>\r\n\r\n<p><strong>Keuntungan Jadi Anak UNPAS Lewat Jalur Atlet? Beuh, Mantap!</strong></p>\r\n\r\n<p>Oke, sekarang bagian paling bikin penasaran, untungnya apa aja sih? Siap-siap dengerin ya!</p>\r\n\r\n<ol>\r\n	<li><strong>Masuk Tanpa Tes Akademik!</strong>&nbsp;Ini nih yang paling&nbsp;<em>juicy</em>. Kamu bisa diterima jadi mahasiswa UNPAS lewat jalur ini&nbsp;<strong>TANPA PERLU IKUT TES AKADEMIK</strong>&nbsp;lagi! Asik banget kan? Energi kamu bisa fokus buat latihan atau nikmatin masa-masa awal jadi mahasiswa baru tanpa pusing mikirin soal ujian masuk. Bye-bye TPA, hello latihan!<br />\r\n	<br />\r\n	&nbsp;</li>\r\n	<li><strong>Dapet Beasiswa Potongan DPP!</strong>&nbsp;Selain masuknya lebih gampang, kamu juga bakal dapet&nbsp;<strong>potongan biaya DPP</strong>&nbsp;(Dana Pembangunan dan Pengembangan, alias uang pangkal gitu deh). Besarannya lumayan banget buat ngurangin beban biaya kuliah. Nih rinciannya berdasarkan prestasi kamu:<br />\r\n	&nbsp;\r\n	<ul>\r\n		<li><strong>Prestasi Internasional:</strong>\r\n		<ul>\r\n			<li>Juara I: Diskon DPP&nbsp;<strong>30%</strong>&nbsp;</li>\r\n			<li>Juara II: Diskon DPP&nbsp;<strong>25%</strong></li>\r\n			<li>Juara III: Diskon DPP&nbsp;<strong>20%</strong></li>\r\n		</ul>\r\n		</li>\r\n		<li><strong>Prestasi Nasional:</strong>\r\n		<ul>\r\n			<li>Juara I: Diskon DPP&nbsp;<strong>25%</strong></li>\r\n			<li>Juara II: Diskon DPP&nbsp;<strong>20%</strong></li>\r\n			<li>Juara III: Diskon DPP&nbsp;<strong>15%</strong></li>\r\n		</ul>\r\n		</li>\r\n		<li><strong>Prestasi Daerah (Provinsi):</strong>\r\n		<ul>\r\n			<li>Juara I: Diskon DPP&nbsp;<strong>20%</strong></li>\r\n			<li>Juara II: Diskon DPP&nbsp;<strong>15%</strong></li>\r\n			<li>Juara III: Diskon DPP&nbsp;<strong>10%</strong></li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lumayan banget kan potongannya? Bisa buat beli sepatu baru atau suplemen! Sekali lagi,&nbsp;<strong>INGAT YGY:</strong>&nbsp;Beasiswa ini berlaku untuk semua prodi,&nbsp;<strong>KECUALI Fakultas Kedokteran</strong>.<br />\r\n	<br />\r\n	&nbsp;</li>\r\n</ol>\r\n\r\n<p><strong>Dokumen Wajib Buat &#39;Flexing&#39; Prestasi Kamu.</strong></p>\r\n\r\n<p>Biar UNPAS percaya kamu emang atlet berprestasi, siapin dokumen-dokumen ini ya:</p>\r\n\r\n<ul>\r\n	<li><strong>Bukti Prestasi:</strong>&nbsp;Scan atau foto&nbsp;<strong>Sertifikat atau Piagam Penghargaan</strong>&nbsp;kamu yang nunjukin kamu juara atau perwakilan di ajang yang disebutin tadi.</li>\r\n	<li><strong>Surat Sakti:</strong>&nbsp;Minta&nbsp;<strong>Surat Rekomendasi</strong>&nbsp;dari organisasi olahraga resmi yang menaungi kamu. Bisa dari KONI, Federasi Olahraga (misal PBSI, PSSI, Perbasi, dll), atau Klub tempat kamu bernaung.</li>\r\n	<li><strong>Dokumen Sekolah:</strong>\r\n	<ul>\r\n		<li>Scan&nbsp;<strong>Ijazah</strong>&nbsp;dan&nbsp;<strong>Nilai Ijazah</strong>&nbsp;(kalau udah keluar).</li>\r\n		<li>Kalau ijazah belum ada? Tenang, bisa pakai&nbsp;<strong>Surat Keterangan Masih Kelas XII</strong>&nbsp;atau&nbsp;<strong>Surat Keterangan Lulus (SKL)</strong>&nbsp;dari sekolah kamu.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Gimana? Tertarik Jadi Mahasiswa Atlet di UNPAS?</strong></p>\r\n\r\n<p>Nah, itu dia info lengkap soal Jalur Atlet Muda Berprestasi di UNPAS. Keren banget kan kesempatannya? Buat kamu yang punya prestasi olahraga dan pengen lanjut kuliah tanpa ribet tes akademik plus dapet diskon biaya, ini bisa jadi pilihan yang pas banget!&nbsp;</p>\r\n\r\n<p>Medali dan piagam kamu itu bukan cuma pajangan, tapi bisa jadi kunci buat masa depan pendidikan kamu juga. Kalau kamu memenuhi syarat, jangan ragu buat cari info pendaftarannya di website resmi UNPAS dan pilih jalur kece ini ya!&nbsp;<em>Cusss!</em></p>\r\n\r\n<p><strong>Daftar Sekarang&nbsp;</strong>secara&nbsp;<strong>online&nbsp;</strong>melalui&nbsp;https://registrasi.unpas.ac.id/&nbsp;dan jangan lupa pilih jalur pendaftaran&nbsp;<strong>Jalur Atlet Muda Berprestasi</strong>. Informasi lengkap melalui jalur penerimaan mahasiswa baru di Universitas Pasundan dapat diakses melalui laman&nbsp;https://pmb.unpas.ac.id/jalur&nbsp;</p>','2025-05-02','post-image/72SAFR1jvNQgBSdiM2eEu2NZrPeRyURBFYBcH7z4.jpg','testing','active','2025-05-08 02:22:43','2025-05-08 02:22:43'),(4,1,'Kamu Hafidz Qur\'an? Ada Jalur Spesial & Beasiswa Keren Nih di UNPAS Bandung!','kamu-hafidz-quran-ada-jalur-spesial-beasiswa-keren-nih-di-unpas-bandung','<p>UNPAS punya jalur penerimaan mahasiswa baru yang&nbsp;<em>khusus</em>&nbsp;banget buat para Hafidz dan Hafidzah, namanya&nbsp;<strong>Jalur Hafidz Al-Qur&rsquo;an</strong>. Keren, kan?</p>','<p>Sobat UNPAS, buat kamu yang selain punya ijazah (SMA/SMK/MA/Sederajat) juga dikaruniai kemampuan menghafal Al-Qur&#39;an, ada kabar super bagus nih dari Universitas Pasundan (UNPAS) Bandung!</p>\r\n\r\n<p>UNPAS punya jalur penerimaan mahasiswa baru yang&nbsp;<em>khusus</em>&nbsp;banget buat para Hafidz dan Hafidzah, namanya&nbsp;<strong>Jalur Hafidz Al-Qur&rsquo;an</strong>. Keren, kan?</p>\r\n\r\n<p><strong>Apa Sih Jalur Hafidz UNPAS Itu?&nbsp;</strong></p>\r\n\r\n<p>Jadi gini, Jalur Hafidz ini adalah bentuk apresiasi dari UNPAS buat kamu yang udah berjuang menghafalkan ayat-ayat suci Al-Qur&#39;an. Sekaligus, ini cara UNPAS buat menggabungkan pendidikan tinggi yang berkualitas dengan nilai-nilai keislaman.</p>\r\n\r\n<p>Intinya, kalau kamu punya hafalan Al-Qur&#39;an&nbsp;<strong>minimal 5 juz</strong>, kamu bisa banget daftar lewat jalur prestasi ini. Ini kesempatan emas buat kamu!</p>\r\n\r\n<p><strong>Keuntungan Keren Abis Jalur Hafidz UNPAS!&nbsp;</strong></p>\r\n\r\n<p>Nah, ini bagian paling serunya. Kalau kamu lolos lewat jalur ini, kamu bakal dapet&nbsp;<em>benefit</em>&nbsp;yang kece banget:</p>\r\n\r\n<ol>\r\n	<li><strong>Beasiswa Potongan DPP:</strong>&nbsp;Kamu bisa dapet potongan Dana Pembangunan dan Pengembangan (DPP) yang lumayan banget, mulai dari 20% sampai&nbsp;<strong>GRATIS 100%</strong>! Besarannya tergantung jumlah hafalan kamu:\r\n\r\n	<ul>\r\n		<li>Hafal&nbsp;<strong>30 Juz</strong>: Beasiswa&nbsp;<strong>100%</strong>&nbsp;(Gratis DPP!)</li>\r\n		<li>Hafal&nbsp;<strong>sampai 20 Juz</strong>: Beasiswa&nbsp;<strong>75%</strong></li>\r\n		<li>Hafal&nbsp;<strong>sampai 10 Juz</strong>: Beasiswa&nbsp;<strong>50%</strong></li>\r\n		<li>Hafal&nbsp;<strong>sampai 5 Juz</strong>: Beasiswa&nbsp;<strong>25%</strong></li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>PENTING:</strong>&nbsp;Beasiswa potongan DPP ini berlaku untuk&nbsp;<strong>semua program studi</strong>&nbsp;di UNPAS,&nbsp;<em>kecuali</em>&nbsp;Fakultas Kedokteran ya.<br />\r\n	&nbsp;</li>\r\n	<li><strong>Prioritas Masuk Tanpa Tes Akademik:</strong>&nbsp;Lewat jalur ini, kamu dapat prioritas diterima sebagai mahasiswa baru UNPAS&nbsp;<strong>tanpa perlu ikut tes akademik</strong>&nbsp;lagi. Seleksinya fokus ke verifikasi hafalan kamu. Mantap banget, kan? Hemat waktu dan tenaga!&nbsp;</li>\r\n</ol>\r\n\r\n<p><strong>Syarat &amp; Ketentuan, Gampang Kok!&nbsp;</strong></p>\r\n\r\n<p>Biar lebih jelas, ini dia syarat dan ketentuan umum buat daftar Jalur Hafidz UNPAS:</p>\r\n\r\n<ul>\r\n	<li><strong>Wajib Hafal Minimal 5 Juz:</strong>&nbsp;Ini syarat utamanya.</li>\r\n	<li><strong>Terbuka untuk Semua Prodi:</strong>&nbsp;Jalur ini dibuka untuk&nbsp;<em>semua</em>&nbsp;program studi di UNPAS (tapi ingat,&nbsp;<em>beasiswa DPP</em>-nya ada pengecualian untuk Fakultas Kedokteran).</li>\r\n	<li><strong>Verifikasi Hafalan:</strong>&nbsp;Seleksi utamanya adalah verifikasi hafalan kamu. Bisa lewat cek dokumen atau tes hafalan langsung yang akan dilakukan oleh Lembaga Pengkajian dan Pengembangan Syiar Islam (LPPSI) UNPAS.</li>\r\n	<li><strong>Ada Kuota:</strong>&nbsp;Setiap tahun ada kuota jumlah mahasiswa yang diterima lewat jalur ini, yang ditetapin sama Rektor UNPAS.</li>\r\n	<li><strong>Seleksi Tambahan Jika Pendaftar Banyak:</strong>&nbsp;Kalau yang daftar dan memenuhi syarat lebih banyak dari kuota, UNPAS bisa jadi akan melakukan seleksi tambahan berdasarkan kompetensi lain.</li>\r\n</ul>\r\n\r\n<p><strong>Dokumen yang Perlu Disiapin&nbsp;</strong></p>\r\n\r\n<p>Untuk membuktikan hafalanmu, kamu perlu siapin&nbsp;<strong>salah satu</strong>&nbsp;dari dokumen berikut:</p>\r\n\r\n<ul>\r\n	<li>Scan/foto&nbsp;<strong>Sertifikat Hafidz Al-Qur&#39;an</strong>&nbsp;dari lembaga resmi atau pesantren.&nbsp;<strong>ATAU</strong></li>\r\n	<li>Scan/foto&nbsp;<strong>Surat Keterangan Hafalan</strong>&nbsp;dari sekolah, lembaga pendidikan Islam, atau ustadz/ustadzah pembimbing kamu.</li>\r\n</ul>\r\n\r\n<p>Selain bukti hafalan, siapin juga dokumen tambahan ini:</p>\r\n\r\n<ul>\r\n	<li>Scan&nbsp;<strong>Ijazah</strong>&nbsp;dan&nbsp;<strong>Nilai Ijazah</strong>&nbsp;(kalau udah keluar).</li>\r\n	<li>Kalau ijazah belum ada, bisa pakai:\r\n	<ul>\r\n		<li><strong>Surat Keterangan Masih Kelas XII</strong>&nbsp;(waktu kamu daftar mungkin belum lulus).</li>\r\n		<li><strong>Surat Keterangan Lulus (SKL)</strong>&nbsp;dari sekolah.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Informasi lengkap mengenai jalur Pendaftaran Mahasiswa Baru Universitas Pasundan Tahun 2025 dapat di akses melalui halaman&nbsp;</strong><strong>https://pmb.unpas.ac.id/jalur</strong><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Jadi, Tunggu Apa Lagi?</strong></p>\r\n\r\n<p>Gimana? Menarik banget kan tawaran dari UNPAS ini? Buat kamu para Hafidz/Hafidzah yang baru lulus dan pengen lanjut kuliah, ini adalah kesempatan emas yang sayang banget buat dilewatkan. Ini cara UNPAS menghargai perjuanganmu menghafal Al-Qur&#39;an sekaligus membuka pintu pendidikan tinggi yang berkualitas buat kamu.</p>\r\n\r\n<p><strong>Pendaftaran Dibuka Mulai 29 April 2025.</strong></p>\r\n\r\n<p>Ini dia cara daftarnya secara online:</p>\r\n\r\n<ul>\r\n	<li><strong>Buka Website Registrasi:</strong>&nbsp;Akses laman pendaftaran resmi UNPAS di&nbsp;<strong>https://registrasi.unpas.ac.id/</strong>&nbsp;pakai browser di HP atau komputer kamu. Kemudian pilih&nbsp;registrasi di sini.</li>\r\n	<li><strong>Buat Akun:</strong>&nbsp;Kamu perlu membuat akun pendaftaran terlebih dahulu menggunakan email aktif dan nomor HP. Setelah submit kamu perlu buka inbok email yang kamu daftarkan dan verifikasi pendaftaran. Ikuti langkah-langkah pembuatan akunnya, lalu login dengan akun yang sudah kamu buat.</li>\r\n	<li><strong>Isi Formulir Pendaftaran:</strong>&nbsp;Isi semua data yang diminta di formulir online dengan lengkap dan benar.</li>\r\n	<li><strong>Pilih Jalur Pendaftaran (PENTING!):</strong>&nbsp;Nah, ini bagian krusialnya. Saat diminta memilih jalur masuk atau jalur pendaftaran, pastikan kamu&nbsp;<strong>pilih opsi &quot;Jalur Beasiswa Hafidz Qur&#39;an&quot;</strong>. Jangan sampai salah pilih jalur lain ya!&nbsp;</li>\r\n	<li><strong>Upload Dokumen:</strong>&nbsp;Siapkan file scan dokumen-dokumen yang diperlukan dalam format digital (biasanya PDF atau JPG). Upload dokumen tersebut sesuai instruksi di formulir.</li>\r\n	<li><strong>Isi form pendaftaran sampai selesai.</strong></li>\r\n	<li><strong>Cek Konfirmasi:&nbsp;</strong>Setelah selesai mendaftar kamu akan mendapatkan informasi mengenai jadwal pelaksanaan tes hafalan Al Qur&rsquo;an kamu.</li>\r\n</ul>\r\n\r\n<p>Semoga berhasil ya pendaftarannya! Ini kesempatan bagus buat kamu. Sampai ketemu di UNPAS!</p>','2025-05-02','post-image/zM4CkD3rRFFMfunLC0mWvcqdsiQXwrjGpT66qWHU.jpg','testing','active','2025-05-08 02:24:20','2025-05-08 02:24:20'),(5,1,'Libur Akhir Sekolah Ngapain? Rebahan, Kegiatan Positif atau Mulai Menata Masa Depan.','libur-akhir-sekolah-ngapain-rebahan-kegiatan-positif-atau-mulai-menata-masa-depan','<p>Coba jujur. Begitu pintu gerbang sekolah nutup pas hari terakhir, pikiran pertama apa yang muncul? Selain &quot;YES, BEBAS!&quot;, mungkin langsung disusul sama...&nbsp;<strong>&quot;Oke, libur panjang nih. Ngapain ya?&quot;</strong></p>','<p><strong>Halo, Calon Mahasiswa Keren!</strong></p>\r\n\r\n<p>Coba jujur. Begitu pintu gerbang sekolah nutup pas hari terakhir, pikiran pertama apa yang muncul? Selain &quot;YES, BEBAS!&quot;, mungkin langsung disusul sama...&nbsp;<strong>&quot;Oke, libur panjang nih. Ngapain ya?&quot;</strong></p>\r\n\r\n<p>Pertanyaan simpel, tapi di era kita yang serba terkoneksi, rasanya pertanyaan itu kok ya jadi berat. Ada semacam tekanan nggak sih? Tekanan nggak langsung buat&nbsp;<em>ngelakuin sesuatu</em>&nbsp;yang kelihatan produktif, yang&nbsp;<em>worth</em>&nbsp;di-update di Story, atau paling nggak, tekanan biar nggak kelihatan&nbsp;<em>terlalu</em>&nbsp;gabut dibanding temen-temen yang tiba-tiba ikutan bootcamp, magang di start-up entah berantah, atau&nbsp;<em>healing</em>&nbsp;estetik di tempat yang Instagramable?</p>\r\n\r\n<p>Mari kita bedah bareng-bareng, kenapa sih pertanyaan &quot;Libur Ngapain?&quot; ini bisa jadi lumayan&nbsp;<em>tricky</em>, dan gimana kita bisa menghadapinya tanpa perlu pusing tujuh keliling atau malah&nbsp;<em>burnout</em>&nbsp;sebelum masuk kuliah.</p>\r\n\r\n<p><strong>Rebahan Itu Nggak Dosa, tapi Jangan Kebablasan Jadi Fosil</strong></p>\r\n\r\n<p>Oke, pertama-tama, mari kita sepakati:&nbsp;<strong>rebahan itu perlu</strong>. Tubuh dan otak kita habis ngebut belajar, nugas, organisasi, drama sekolah, dll. Wajar banget butuh&nbsp;<em>recharge</em>. Binge-watching serial sampai mata jereng? Main game sampai lupa waktu?&nbsp;<em>Scrolling</em>&nbsp;TikTok sampai jempol keriting? Sah-sah saja,&nbsp;<em>for a while</em>.</p>\r\n\r\n<p><em>Tapi,</em>&nbsp;ini dia poin argumentatifnya:&nbsp;<strong>kalau rebahan itu jadi satu-satunya agenda utama selama berhari-hari, berminggu-minggu... itu bukan lagi istirahat, itu namanya stagnasi.</strong>&nbsp;Kamu lagi&nbsp;<em>pause</em>&nbsp;hidup kamu, sementara dunia (dan teman-teman kamu) tetap berjalan.</p>\r\n\r\n<p>Ingat, bentar lagi kamu mau masuk dunia kuliah yang beda banget. Waktu luang bakal terasa lebih banyak&nbsp;<em>tapi</em>&nbsp;tanggung jawab mandiri juga jauh lebih besar. Kalau kamu nggak terbiasa mengelola waktu luang dari sekarang, kebayang kan kagetnya nanti di kampus? Kuliah bukan cuma soal duduk manis di kelas, tapi gimana kamu memanfaatkan waktu&nbsp;<em>di luar</em>&nbsp;kelas buat ngembangin diri. Nah, libur ini&nbsp;<em>persis</em>&nbsp;simulasi mini-nya.</p>\r\n\r\n<p><strong>Produktif Nggak Harus Selalu yang Berbayar atau Dapat Sertifikat</strong></p>\r\n\r\n<p>Ini nih biang kerok tekanan lainnya. Seolah-olah, liburan itu cuma dianggap &quot;berhasil&quot; kalau kamu pulang bawa sertifikat kursus A, pengalaman magang B, atau portofolio C. Padahal, produktivitas itu maknanya luas banget, gengs!</p>\r\n\r\n<p><strong>Produktif itu bisa jadi:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Belajar skill baru yang kamu suka,&nbsp;</strong><em><strong>bukan</strong></em><strong>&nbsp;karena disuruh atau demi nilai.</strong>&nbsp;Belajar main gitar dari YouTube, nyoba resep masakan baru, ngutak-ngatik software, edit video gratisan, belajar bahasa asing lewat aplikasi sambil gabut. Ini semua investasi buat diri kamu!</li>\r\n	<li><strong>Ngeksplor hobi lama atau baru.</strong>&nbsp;Baca buku (YES, buku non-pelajaran!), bikin komik digital, nulis cerpen/puisi (atau&nbsp;<em>thread</em>&nbsp;di Twitter/X yang viral?), olahraga yang konsisten, berkebun, modif motor/sepeda &ndash; apapun yang bikin kamu&nbsp;<em>happy</em>&nbsp;dan berkembang.</li>\r\n	<li><strong>Ngaplikasiin ilmu yang udah kamu punya.</strong>&nbsp;Mungkin kamu jago desain? Coba bikin project iseng buat portofolio. Jago matematika? Ajari adek atau keponakan. Jago ngomong? Ikut komunitas debat atau public speaking.</li>\r\n	<li><strong>Beres-beres kamar atau rumah.</strong>&nbsp;Jujur deh, ini&nbsp;<em>basic</em>&nbsp;tapi sering dilupakan. Lingkungan yang rapi bikin pikiran lebih jernih. Produktif kan?</li>\r\n	<li><strong>Ngembangin&nbsp;</strong><em><strong>soft skills</strong></em><strong>&nbsp;yang nggak diajarin di sekolah.</strong>&nbsp;Komunikasi sama orang baru, negosiasi (sama bokap nyokap biar dibeliin sesuatu misalnya haha), problem-solving (ketika wifi mati total), manajemen waktu (biar nggak numpuk di akhir libur).</li>\r\n</ul>\r\n\r\n<p>See? Produktif itu intinya&nbsp;<strong>melakukan sesuatu yang memberikan&nbsp;</strong><em><strong>nilai tambah</strong></em><strong>&nbsp;buat diri kamu, sekecil apapun itu.</strong>&nbsp;Nggak harus selalu yang bersertifikat atau menghasilkan uang kok (walaupun kalau bisa, kenapa nggak?).</p>\r\n\r\n<p><strong>Libur Adalah Waktu Emas Buat Mengenal Diri Sendiri</strong></p>\r\n\r\n<p>Kamu sebentar lagi mau masuk fase hidup yang lumayan krusial: kuliah. Di sini kamu dituntut buat lebih mandiri milih jalan hidup (jurusan, karir, pergaulan). Nah, gimana mau milih kalau kamu sendiri nggak kenal sama diri kamu?</p>\r\n\r\n<p>Libur panjang ini adalah kesempatan langka buat&nbsp;<strong>&quot;nge-date&quot; sama diri sendiri</strong>.</p>\r\n\r\n<ul>\r\n	<li><strong>Renungin:</strong>&nbsp;Apa sih yang bener-bener kita suka lakuin sampai lupa waktu? Pelajaran apa yang bikin kita penasaran lebih jauh? Kerja atau kegiatan sukarela apa yang bikin kita merasa berarti? Lingkungan seperti apa yang bikin kita nyaman dan bisa berkembang?</li>\r\n	<li><strong>Eksplor:</strong>&nbsp;Coba deh, sesuatu yang selama ini kamu pikir &quot;bukan gue banget&quot;. Ikut&nbsp;<em>workshop</em>&nbsp;singkat, datang ke pameran seni (meski kamu nggak ngerti), coba olahraga ekstrem, ngobrol sama orang-orang dari latar belakang beda. Siapa tahu kamu nemu&nbsp;<em>passion</em>&nbsp;tersembunyi.</li>\r\n	<li><strong>Evaluasi:</strong>&nbsp;Apa kelebihan kita? Kekurangan kita apa ya yang perlu diperbaiki sebelum kuliah? Kebiasaan apa yang positif dan perlu dipertahankan? Kebiasaan buruk apa yang perlu dibuang?</li>\r\n</ul>\r\n\r\n<p>Kalau mau lebih mendalam lagi kamu bisa tes dan konsultasi langsung dengan para pakar tentang potensi, minat, pengembangan karir melalui aplikasi pengembangan diri seperti jatidiri.app.</p>\r\n\r\n<p>Mengenal diri sendiri itu&nbsp;<em>produktif</em>&nbsp;banget lho, karena itu pondasi buat ngambil keputusan penting di masa depan. Daripada cuma&nbsp;<em>scroll</em>&nbsp;hidup orang lain di medsos, mending&nbsp;<em>explore</em>&nbsp;kedalaman diri sendiri. Jauh lebih seru dan bermanfaat!</p>\r\n\r\n<p><strong>Jangan Jadikan Medsos Patokan &#39;Kesuksesan&#39; Liburan Kamu</strong></p>\r\n\r\n<p>Ini yang paling penting di era Sosmed:&nbsp;<strong>berhenti membandingkan &quot;realita&quot; liburan kamu dengan &quot;highlight reel&quot; liburan orang lain di Instagram atau TikTok.</strong></p>\r\n\r\n<p>Apa yang kamu lihat di medsos seringkali cuma&nbsp;<em>permukaan</em>. Kamu lihat temen kamu&nbsp;<em>healing</em>&nbsp;di pantai? Kamu nggak lihat drama di baliknya, atau mungkin itu cuma buat konten aja. Kamu lihat temen kamu posting lagi belajar ini-itu? Kamu nggak tahu mungkin dia cuma bertahan 15 menit terus balik rebahan lagi.</p>\r\n\r\n<p>Setiap orang punya kebutuhan dan cara yang beda buat ngisi liburan. Mungkin ada yang&nbsp;<em>emang</em>&nbsp;butuh istirahat total karena udah&nbsp;<em>push limits</em>&nbsp;selama sekolah. Mungkin ada yang&nbsp;<em>emang</em>&nbsp;lagi semangat banget belajar skill baru.&nbsp;<em>It&#39;s okay.</em></p>\r\n\r\n<p>Fokus sama apa yang&nbsp;<strong>kamu butuhkan</strong>&nbsp;dan&nbsp;<strong>kamu inginkan</strong>&nbsp;dari libur ini, bukan apa yang kelihatan paling keren di mata orang lain (atau di mata algoritma medsos). Liburan kamu adalah tentang kamu, bukan tentang&nbsp;<em>follower count</em>&nbsp;atau&nbsp;<em>likes</em>&nbsp;di postingan liburan kamu.</p>\r\n\r\n<p><strong>Daftar Kuliah Buat Ngembangin Minat dan Potensi Kamu jadi Karir Menjanjikan.</strong></p>\r\n\r\n<p>Nah, ngomongin soal masa depan dan apa yang&nbsp;<em>benar-benar</em>&nbsp;kamu butuhin untuk pengembangan diri kamu, ada satu langkah konkret yang bisa kamu ambil&nbsp;<strong>sekarang juga</strong>, sambil nyantai atau sambil mikirin mau&nbsp;<em>explore</em>&nbsp;apa lagi di sisa liburan kamu. Langkah ini bukan cuma mengisi waktu luang, tapi investasi jangka panjang buat diri kamu:&nbsp;<strong>merencanakan masa depan kamu!</strong></p>\r\n\r\n<p>Kalau selama liburan ini kamu udah mulai kepikiran, &quot;Oke, gue suka nih sama bidang ini,&quot; atau &quot;Gue penasaran deh, kerja di industri itu kayak apa ya?&quot;, berarti sinyalnya udah jelas:&nbsp;<strong>saatnya nyari tempat yang tepat buat ngembangin minat dan bakat kamu jadi karir yang menjanjikan.</strong></p>\r\n\r\n<p>Ibaratnya, liburan itu pemanasan. Kuliah itu&nbsp;<em>main event</em>-nya! Dan milih kampus yang tepat itu kayak milih tim atau arena yang pas buat kamu berkembang maksimal. Satu kampus yang keren dan punya reputasi bagus yaitu Universitas Pasundan.</p>\r\n\r\n<p>Kenapa sih, di antara banyak pilihan,&nbsp;<strong>Universitas Pasundan (Unpas) Bandung</strong>&nbsp;bisa jadi jawaban untuk karir masa depan kamu? Nih, dengerin baik-baik:</p>\r\n\r\n<ol>\r\n	<li><strong>Akreditasi Unggul:</strong>&nbsp;Ini bukti nyata kalau Unpas itu&nbsp;<strong>nggak main-main soal kualitas</strong>. Pendidikan kamu diakui secara nasional, lulusan kamu punya daya saing tinggi. Ini pondasi paling penting,&nbsp;<em>guys</em>!</li>\r\n	<li><strong>Pilihan Program Studi (Prodi) yang Keren Abis &amp; Menjanjikan:</strong>&nbsp;Unpas punya segudang pilihan prodi, dari teknik paling modern, ekonomi kreatif, hukum yang ngejamin keadilan, sampe komunikasi yang kekinian banget. Apapun minat dan bakat unik kamu yang kamu temuin pas&nbsp;<em>explore</em>&nbsp;diri, kemungkinan besar wadahnya ada di Unpas.&nbsp;<strong>Kamu bisa nyalurin&nbsp;</strong><em><strong>passion</strong></em><strong>&nbsp;kamu jadi profesi yang&nbsp;</strong><em><strong>cuan</strong></em><strong>&nbsp;dan relevan di masa depan.</strong></li>\r\n	<li><strong>Jalur Masuk Anti-Ribet &amp; Banyak Kesempatan Emas:</strong>&nbsp;Khawatir soal proses pendaftaran yang muter-muter? Di Unpas ada&nbsp;<strong>12 Jalur Masuk!</strong>&nbsp;Bahkan ada jalur&nbsp;<strong>One Day Service (ODS)</strong>.&nbsp;<strong>Bayangin: Hari ini daftar, hari ini juga bisa langsung tahu hasilnya!</strong>&nbsp;Sat-set banget kan? Buat kamu yang&nbsp;<em>sat-set</em>, ini pas banget. Plus, buat kamu yang berprestasi atau butuh dukungan, ada&nbsp;<strong>jalur beasiswa sampai 100%!</strong>&nbsp;Kesempatan kuliah tanpa beban finansial ada di depan mata.</li>\r\n	<li><strong>Kuliah di Jantung Kota Bandung yang Asyik:</strong>&nbsp;Nggak cuma belajar di kelas, kuliah itu juga soal&nbsp;<em>experience</em>. Unpas ada di&nbsp;<strong>pusat kota Bandung</strong>. Artinya? Kamu nggak cuma dapet ilmu akademis, tapi juga bisa nyerap energi kreatif, budaya, dan&nbsp;<em>networking</em>&nbsp;dari kota paling&nbsp;<em>hype</em>&nbsp;se-Jawa Barat ini.&nbsp;<strong>Suasana kota yang mendukung dan kreatif ini bakal bikin pengalaman kuliah kamu makin berwarna dan nggak ngebosenin.</strong></li>\r\n	<li><strong>Jaringan Alumni Kuat, Jalan Mulus Setelah Lulus:</strong>&nbsp;Kuliah bukan cuma belajar, tapi juga membangun koneksi. Unpas punya&nbsp;<strong>jaringan alumni yang tersebar luas</strong>&nbsp;di berbagai bidang dan industri. Ini aset berharga banget!&nbsp;<strong>Bayangin, lulus nanti kamu udah punya &#39;keluarga&#39; yang siap bantu kamu melangkah ke dunia kerja atau wirausaha.</strong></li>\r\n	<li><strong>Dukungan Penuh Buat&nbsp;</strong><em><strong>Explore</strong></em><strong>&nbsp;Bakat Non-Akademis:</strong>&nbsp;Ingat poin kita soal&nbsp;<em>explore</em>&nbsp;diri dan hobi pas liburan? Di Unpas, itu nggak berhenti cuma di liburan! Ada&nbsp;<strong>berbagai Unit Kegiatan Mahasiswa (UKM) dan organisasi</strong>&nbsp;yang&nbsp;<em>asyik</em>&nbsp;banget buat nyalurin minat dan bakat kamu, dari seni, olahraga, ilmiah, sampe&nbsp;<em>community development</em>.&nbsp;<strong>Kuliah kamu nggak akan cuma soal buku dan tugas, tapi juga tempat kamu nemu&nbsp;</strong><em><strong>circle</strong></em><strong>&nbsp;positif dan ngembangin&nbsp;</strong><em><strong>skill</strong></em><strong>&nbsp;yang nggak diajarin di kurikulum.</strong></li>\r\n	<li><strong>Dosen Profesional, Kekinian, dan yang Terbaik:</strong>&nbsp;Kamu bakal belajar dari para ahli di bidangnya. Dosen-dosen Unpas itu&nbsp;<strong>profesional, punya pengalaman nyata, dan banyak yang &quot;kekinian&quot;</strong>&nbsp;alias nyambung sama perkembangan zaman. FYI aja nih, Unpas punya predikat&nbsp;<strong>Universitas dengan Profesor Terbanyak di Jawa Barat</strong>, lho! Artinya, kamu dibimbing langsung sama guru besar yang ilmunya udah nggak diragukan lagi.</li>\r\n</ol>\r\n\r\n<p>Libur ini kesempatan emas buat kamu ngambil ancang-ancang. Jangan cuma dihabisin buat&nbsp;<em>scroll</em>&nbsp;tanpa arah atau mikirin&nbsp;<em>goals</em>&nbsp;yang nggak jelas juntrungannya.&nbsp;<strong>Ambil langkah nyata buat masa depan kamu!</strong></p>\r\n\r\n<p><strong>Yuk Daftar Kuliah di Unpas Sekarang Juga!</strong></p>\r\n\r\n<p>🌐 Daftar sekarang melalui:&nbsp;https://registrasi.unpas.ac.id/&nbsp;<br />\r\n💬 Kunjungi&nbsp;https://pmb.unpas.ac.id/&nbsp;untuk informasi selengkapnya.</p>','2025-04-17','post-image/sPTLVxwdmNpirnDnF88cfm25eVEvxaGh1LMyCRD7.jpg','testing','active','2025-05-08 02:26:43','2025-05-08 02:26:43'),(6,1,'Telemedicine, Solusi atau Ancaman bagi Dokter Konvensional?','telemedicine-solusi-atau-ancaman-bagi-dokter-konvensional','<p><strong>Masa Depan Kedokteran di Era Digital, dan Peranmu di Dalamnya</strong></p>','<p><strong>Masa Depan Kedokteran di Era Digital, dan Peranmu di Dalamnya</strong></p>\r\n\r\n<p><br />\r\nBayangkan kamu sedang demam tinggi di tengah malam. Daripada ke klinik, kamu buka aplikasi, video call dokter, dapat resep, dan obat diantar ke rumah. Praktis, kan? Inilah realitas telemedicine, layanan kesehatan via gawai yang sedang booming. Tapi, apakah teknologi ini akan menggantikan peran dokter konvensional? Atau justru jadi sekutu mereka? Mari kita bedah!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Apa Itu Telemedicine?</strong></p>\r\n\r\n<p>Sederhananya,&nbsp;<em>telemedicine</em>&nbsp;adalah praktik kedokteran yang dilakukan secara jarak jauh, memanfaatkan teknologi informasi dan komunikasi. Ini bisa berupa konsultasi&nbsp;<em>online</em>, diagnosis jarak jauh, hingga pemantauan kondisi pasien dari jarak jauh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telemedicine sebagai Solusi: Aksesibilitas Tanpa Batas</strong></p>\r\n\r\n<ol>\r\n	<li>Jangkauan Luas, Hambatan Minim<br />\r\n	Di daerah terpencil atau saat pandemi, telemedicine jadi penyelamat. Dengan telemedicine, masyarakat pelosok bisa konsultasi tanpa menempuh 8 jam perjalanan.&nbsp;</li>\r\n	<li>Efisiensi Waktu dan Biaya<br />\r\n	Gen Z hate waiting. Mayoritas pasien yang mengakses aplikasi seperti HaloDoc merasa puas dengan layanan telemedicine karena tidak perlu mengantre dan juga biaya lebih terjangkau.</li>\r\n	<li>Respons Cepat dalam Kondisi Darurat</li>\r\n</ol>\r\n\r\n<p>Dalam situasi darurat,&nbsp;<em>telemedicine</em>&nbsp;bisa menjadi penyelamat dengan memberikan konsultasi dan arahan medis secara cepat. Misal kamu sedang sendiri di rumah kemudian tiba-tiba asma kambuh dan tidak ada yang bisa membawa kamu ke rumah sakit. Dengan telemedicine maka kamu bisa kontak dokter dan obat dikirimkan ke rumah kamu.</p>\r\n\r\n<ol>\r\n	<li>Pemantauan Kondisi Kronis</li>\r\n</ol>\r\n\r\n<p>Bagi pasien dengan kondisi kronis,&nbsp;<em>telemedicine</em>&nbsp;memungkinkan pemantauan kondisi mereka secara berkala tanpa harus sering datang ke rumah sakit.</p>\r\n\r\n<ol>\r\n	<li>Inovasi untuk Generasi Digital<br />\r\n	Fitur AI symptom checker atau monitor tekanan darah via smartwatch cocok dengan gaya hidup Gen Z yang serba instan.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Telemedicine sebagai Ancaman, Batasan yang Tak Bisa Diabaikan</strong></p>\r\n\r\n<ol>\r\n	<li>Diagnosis Tanpa Sentuhan Fisik = Risiko Kesalahan<br />\r\n	Dokter konvensional mengandalkan pemeriksaan fisik: mendengar detak jantung, meraba benjolan.&nbsp; Salah satu kelemahan utama&nbsp;<em>telemedicine</em>&nbsp;adalah keterbatasan dalam melakukan pemeriksaan fisik secara langsung. Ini bisa menghambat diagnosis yang akurat.</li>\r\n	<li>Hilangnya Human Touch<br />\r\n	Kedokteran bukan sekadar ilmu, tapi seni membangun empati. Pasien butuh tatap mata, tepukan di bahu, atau senyum penenang&mdash;hal yang tak bisa digantikan layar.</li>\r\n	<li>Ketakutan Dokter: &ldquo;Apakah Kami Akan Tergantikan?&rdquo;<br />\r\n	Sebagian dokter khawatir telemedicine mengurangi interaksi langsung, bahkan menggeser peran mereka. Padahal, teknologi hanyalah alat.</li>\r\n	<li>Masalah Keamanan Data: Data medis pasien adalah informasi yang sangat sensitif. Keamanan data dalam&nbsp;<em>telemedicine</em>&nbsp;menjadi perhatian utama untuk mencegah penyalahgunaan informasi.</li>\r\n	<li>Potensi Malpraktik: Tanpa interaksi tatap muka, potensi malpraktik bisa meningkat jika dokter tidak mendapatkan informasi yang cukup tentang kondisi pasien.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Jalan Tengah: Kolaborasi, Bukan Kompetisi</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Jawabannya bukan &ldquo;solusi&rdquo; atau &ldquo;ancaman&rdquo;, tapi sinergi. Telemedicine adalah alat bantu, bukan pengganti. Contohnya:</p>\r\n\r\n<ul>\r\n	<li>Dokter di kota bisa kolaborasi dengan dokter desa via konsultasi online.</li>\r\n	<li>Pasien kronis pantau tekanan darah dari rumah, lalu data dikirim ke dokter untuk evaluasi.</li>\r\n</ul>\r\n\r\n<p>Dokter masa depan harus melek teknologi (tech-savvy), tapi tetap menguasai dasar-dasar kedokteran: komunikasi empatik, diagnosis akurat, dan etika.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Mengapa Universitas Pasundan adalah Pilihanmu?</strong><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p>Universitas Pasundan: Mencetak Dokter Masa Depan yang Adaptif</p>\r\n\r\n<p>Buat kamu, yang tertarik dengan dunia kedokteran dan ingin menjadi dokter yang adaptif terhadap perkembangan teknologi, Universitas Pasundan (Unpas) adalah pilihan yang tepat! Program studi pendidikan dokter di Unpas tidak hanya memberikan pendidikan medis yang komprehensif, tetapi juga membekali mahasiswanya dengan pemahaman tentang teknologi kesehatan terkini.</p>\r\n\r\n<p>Dengan kurikulum yang terus diperbarui dan kerjasama dengan rumah sakit, Unpas siap mencetak dokter-dokter masa depan yang kompeten, beretika, dan mampu menjawab tantangan zaman.</p>\r\n\r\n<p><strong>Jadi Bagian dari Revolusi Kesehatan!</strong><br />\r\nMasa depan kedokteran ada di tanganmu. Di Universitas Pasundan, kamu akan dibentuk jadi dokter yang adaptif, manusiawi, dan inovatif. Jangan hanya jadi penonton&mdash;jadilah pelopor yang menggabungkan keahlian medis dengan teknologi untuk menyelamatkan lebih banyak nyawa!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Gimana caranya gabung?</strong></p>\r\n\r\n<ol>\r\n	<li>Kunjungi website&nbsp;pmb.unpas.ac.id&nbsp;atau langsung daftar melalui link&nbsp;https://registrasi.unpas.ac.id/&nbsp;</li>\r\n	<li>Pilih &ldquo;Program Studi Ilmu Kesejahteraan Sosial&rdquo; di menu pendaftaran.</li>\r\n	<li>Isi formulir &amp; upload persyaratan.</li>\r\n</ol>','2025-04-03','post-image/cqWPeshSC7x6bhZrtMpqZVHsGZZc3FxBmXWYEgiw.jpg','testing','active','2025-05-08 02:33:12','2025-05-08 02:33:12'),(7,1,'Cryptocurrency dan Tantangan Akuntansi Aset Digital: Sebuah Keniscayaan Adaptasi di Era Disrupsi Keuangan','cryptocurrency-dan-tantangan-akuntansi-aset-digital-sebuah-keniscayaan-adaptasi-di-era-disrupsi-keuangan','<p>Fenomena&nbsp;<em>cryptocurrency</em>&nbsp;telah mengubah lanskap keuangan global secara fundamental.</p>','<p>Fenomena&nbsp;<em>cryptocurrency</em>&nbsp;telah mengubah lanskap keuangan global secara fundamental. Lahir sebagai alternatif sistem keuangan tradisional yang terdesentralisasi, aset digital ini kini semakin diterima dan diadopsi oleh berbagai kalangan, mulai dari investor individu hingga korporasi besar. Namun, di tengah euforia inovasi ini, muncul tantangan signifikan bagi para profesional di bidang akuntansi. Sifat unik&nbsp;<em>cryptocurrency</em>&nbsp;yang volatil, tidak berwujud, dan beroperasi di luar regulasi konvensional menghadirkan kerumitan yang belum pernah dihadapi sebelumnya dalam praktik akuntansi aset digital. Artikel ini bertujuan untuk mengupas secara mendalam tantangan-tantangan tersebut dan mengargumentasikan perlunya adaptasi mendasar dalam prinsip dan praktik akuntansi untuk mengakomodasi era disrupsi keuangan ini.</p>\r\n\r\n<p><strong>Gelombang Adopsi Cryptocurrency: Sebuah Realitas yang Tak Terhindarkan</strong></p>\r\n\r\n<p>Dalam beberapa tahun terakhir, kita menyaksikan lonjakan minat dan investasi dalam&nbsp;<em>cryptocurrency</em>. Bitcoin, Ethereum, dan berbagai altcoin lainnya tidak lagi sekadar jargon teknologi, melainkan telah menjadi instrumen investasi yang menarik perhatian para profesional keuangan. Beberapa faktor yang mendorong adopsi ini antara lain potensi keuntungan yang tinggi, desentralisasi yang menawarkan otonomi lebih besar, serta inovasi teknologi&nbsp;<em>blockchain</em>&nbsp;yang mendasarinya. Perusahaan-perusahaan pun mulai melirik&nbsp;<em>cryptocurrency</em>&nbsp;sebagai alat pembayaran, investasi kas, atau bahkan bagian dari strategi diversifikasi aset mereka. Realitas ini menuntut para akuntan untuk tidak hanya memahami konsep dasar&nbsp;<em>cryptocurrency</em>, tetapi juga mampu memperlakukannya secara akuntabel dalam laporan keuangan.</p>\r\n\r\n<p><strong>Tantangan Krusial dalam Akuntansi Aset Digital</strong></p>\r\n\r\n<p>Sifat inheren&nbsp;<em>cryptocurrency</em>&nbsp;memunculkan serangkaian tantangan signifikan dalam penerapan prinsip-prinsip akuntansi yang berlaku umum. Beberapa tantangan krusial tersebut meliputi:</p>\r\n\r\n<ol>\r\n	<li><strong>Definisi dan Klasifikasi Aset yang Ambigu:</strong>&nbsp;Salah satu tantangan mendasar adalah bagaimana mendefinisikan dan mengklasifikasikan&nbsp;<em>cryptocurrency</em>&nbsp;dalam kerangka akuntansi. Apakah&nbsp;<em>cryptocurrency</em>&nbsp;termasuk dalam kategori kas dan setara kas, investasi, persediaan, atau aset tidak berwujud? Tidak adanya definisi yang jelas dan konsisten di berbagai standar akuntansi internasional (seperti IFRS dan US GAAP) menyebabkan inkonsistensi dalam praktik pelaporan. Misalnya, sebuah perusahaan yang memperlakukan&nbsp;<em>cryptocurrency</em>&nbsp;sebagai persediaan akan menggunakan metode penilaian yang berbeda dengan perusahaan yang mengklasifikasikannya sebagai investasi. Ambiguitas ini menyulitkan perbandingan laporan keuangan antar entitas dan berpotensi menyesatkan para pemangku kepentingan.<br />\r\n	<br />\r\n	&nbsp;</li>\r\n	<li><strong>Dilema Pengukuran dan Penilaian yang Volatil:</strong>&nbsp;Volatilitas harga&nbsp;<em>cryptocurrency</em>&nbsp;yang ekstrem menjadi tantangan utama dalam pengukuran dan penilaian. Prinsip biaya historis (historical cost) yang menjadi landasan banyak standar akuntansi terasa kurang relevan ketika nilai aset dapat berfluktuasi puluhan persen dalam hitungan jam. Penggunaan nilai wajar (fair value) sebagai alternatif juga menimbulkan kesulitan, terutama dalam menentukan sumber nilai wajar yang andal dan terverifikasi. Pasar&nbsp;<em>cryptocurrency</em>&nbsp;yang terdesentralisasi dan kurang teregulasi rentan terhadap manipulasi harga dan kurangnya likuiditas pada waktu-waktu tertentu. Hal ini membuat penentuan nilai wajar yang objektif dan akurat menjadi sangat sulit.<br />\r\n	<br />\r\n	&nbsp;</li>\r\n	<li><strong>Isu Pengakuan dan Penghentian Pengakuan (Recognition and Derecognition):</strong>&nbsp;Menentukan kapan suatu transaksi&nbsp;<em>cryptocurrency</em>&nbsp;harus diakui dan kapan pengakuannya harus dihentikan juga menjadi tantangan tersendiri. Transaksi&nbsp;<em>blockchain</em>&nbsp;bersifat permanen dan tidak dapat diubah setelah diverifikasi. Namun, dalam konteks akuntansi, kapan tepatnya transaksi pembelian atau penjualan&nbsp;<em>cryptocurrency</em>&nbsp;dianggap final dan harus dicatat dalam laporan keuangan? Bagaimana perlakuan akuntansi untuk transaksi yang melibatkan&nbsp;<em>fork</em>&nbsp;atau&nbsp;<em>airdrop</em>? Ketidakjelasan dalam hal ini dapat menyebabkan perbedaan interpretasi dan potensi kesalahan dalam pelaporan.<br />\r\n	<br />\r\n	&nbsp;</li>\r\n	<li><strong>Persyaratan Pengungkapan (Disclosure Requirements) yang Belum Memadai:</strong>&nbsp;Standar akuntansi saat ini belum secara spesifik mengatur informasi apa saja yang perlu diungkapkan terkait kepemilikan dan transaksi&nbsp;<em>cryptocurrency</em>. Padahal, mengingat risiko dan ketidakpastian yang melekat pada aset digital ini, pengungkapan yang transparan dan komprehensif sangat penting bagi para investor dan pemangku kepentingan lainnya. Informasi seperti kebijakan akuntansi yang digunakan, jumlah kepemilikan, keuntungan atau kerugian yang belum direalisasi, serta risiko-risiko signifikan yang terkait dengan&nbsp;<em>cryptocurrency</em>&nbsp;perlu diungkapkan secara jelas dalam catatan atas laporan keuangan.<br />\r\n	<br />\r\n	&nbsp;</li>\r\n	<li><strong>Ketidakpastian Regulasi yang Berdampak pada Akuntansi:</strong>&nbsp;Lanskap regulasi&nbsp;<em>cryptocurrency</em>&nbsp;masih terus berkembang dan berbeda-beda di setiap yurisdiksi. Ketidakpastian hukum ini secara langsung mempengaruhi praktik akuntansi. Bagaimana perlakuan akuntansi untuk pajak atas keuntungan&nbsp;<em>cryptocurrency</em>? Bagaimana implementasi aturan anti pencucian uang (AML) dan pendanaan terorisme (CFT) dalam konteks akuntansi aset digital? Perubahan regulasi yang tiba-tiba dapat memaksa perusahaan untuk mengubah kebijakan akuntansi mereka secara signifikan, menciptakan ketidakpastian dan biaya tambahan.<br />\r\n	<br />\r\n	&nbsp;</li>\r\n</ol>\r\n\r\n<p><strong>Urgensi Pengembangan Kerangka Akuntansi yang Adaptif</strong></p>\r\n\r\n<p>Tantangan-tantangan yang telah diuraikan di atas menggarisbawahi urgensi untuk mengembangkan kerangka akuntansi yang lebih adaptif dan relevan dengan karakteristik unik&nbsp;<em>cryptocurrency</em>. Mengandalkan prinsip-prinsip akuntansi tradisional yang dirancang untuk aset fisik dan sistem keuangan konvensional tidak lagi memadai. Beberapa langkah yang perlu dipertimbangkan antara lain:</p>\r\n\r\n<ul>\r\n	<li><strong>Penyusunan Standar Akuntansi Khusus untuk Aset Digital:</strong>&nbsp;Badan-badan penyusun standar akuntansi internasional perlu segera menyusun panduan atau standar akuntansi yang secara spesifik mengatur perlakuan akuntansi untuk&nbsp;<em>cryptocurrency</em>&nbsp;dan aset digital lainnya. Standar ini harus memberikan definisi yang jelas, panduan pengukuran dan penilaian yang sesuai dengan volatilitas pasar, serta persyaratan pengungkapan yang komprehensif.</li>\r\n	<li><strong>Pengembangan Interpretasi dan Praktik Terbaik:</strong>&nbsp;Sementara menunggu penyusunan standar yang komprehensif, perlu adanya pengembangan interpretasi dan praktik terbaik di kalangan profesional akuntansi. Organisasi profesi akuntansi dapat memainkan peran penting dalam menyusun panduan praktis dan memberikan pelatihan kepada para anggotanya mengenai akuntansi aset digital.</li>\r\n	<li><strong>Kolaborasi dengan Regulator dan Pemangku Kepentingan Lain:</strong>&nbsp;Pengembangan kerangka akuntansi yang efektif memerlukan kolaborasi yang erat antara para akuntan, regulator, ahli teknologi, dan pemangku kepentingan lainnya. Dialog dan pertukaran informasi yang konstruktif akan membantu menghasilkan solusi yang komprehensif dan dapat diimplementasikan.</li>\r\n	<li><strong>Peningkatan Kompetensi dan Pemahaman Profesional Akuntansi:</strong>&nbsp;Para profesional akuntansi perlu secara proaktif meningkatkan kompetensi dan pemahaman mereka mengenai teknologi&nbsp;<em>blockchain</em>,&nbsp;<em>cryptocurrency</em>, dan implikasinya terhadap praktik akuntansi. Pendidikan berkelanjutan dan sertifikasi khusus di bidang akuntansi aset digital akan menjadi semakin penting di masa depan.</li>\r\n</ul>\r\n\r\n<p><strong>Kesimpulan: Menyongsong Era Baru Akuntansi Keuangan</strong></p>\r\n\r\n<p>Kemunculan&nbsp;<em>cryptocurrency</em>&nbsp;dan aset digital lainnya merupakan disrupsi signifikan dalam lanskap keuangan global. Tantangan akuntansi yang ditimbulkannya tidak dapat diabaikan. Para profesional akuntansi, sebagai garda terdepan dalam menjaga integritas dan transparansi informasi keuangan, memiliki tanggung jawab untuk beradaptasi dengan perubahan ini. Pengembangan kerangka akuntansi yang relevan, peningkatan kompetensi, dan kolaborasi dengan berbagai pihak menjadi kunci untuk mengatasi tantangan-tantangan tersebut. Dengan menyongsong era baru akuntansi keuangan ini secara proaktif, kita dapat memastikan bahwa laporan keuangan tetap relevan, andal, dan memberikan informasi yang berguna bagi para pemangku kepentingan di tengah gelombang inovasi aset digital yang terus bergulir. Kegagalan untuk beradaptasi hanya akan memperlebar jurang antara praktik akuntansi dengan realitas ekonomi digital yang semakin kompleks.</p>\r\n\r\n<p>Apakah Anda seorang profesional yang menyadari betapa pesatnya perkembangan aset digital seperti&nbsp;<em>cryptocurrency</em>&nbsp;dan tantangan akuntansi yang menyertainya? Atau seorang pejabat yang ingin membekali diri dengan pemahaman mendalam tentang implikasi keuangan dari teknologi baru? Bahkan, jika Anda seorang&nbsp;<em>fresh graduate</em>&nbsp;S1 Akuntansi yang bersemangat untuk menjadi ahli di bidang yang sedang berkembang pesat ini, Program Magister Akuntansi (S2) Universitas Pasundan (UNPAS) Bandung adalah pilihan yang tepat untuk Anda!</p>\r\n\r\n<p>Seperti yang telah kita bahas dalam artikel sebelumnya, akuntansi aset digital menghadirkan tantangan unik yang membutuhkan keahlian khusus. Di era di mana&nbsp;<em>blockchain</em>,&nbsp;<em>cryptocurrency</em>, dan inovasi keuangan lainnya semakin mendominasi, memiliki pemahaman yang mendalam tentang akuntansi di bidang ini akan menjadi keunggulan kompetitif yang tak ternilai harganya.</p>\r\n\r\n<p><strong>Jangan Tunda Kesempatan Anda!</strong></p>\r\n\r\n<p>Era disrupsi keuangan menuntut para profesional akuntansi untuk terus belajar dan beradaptasi. Program Magister Akuntansi (S2) Universitas Pasundan (UNPAS) Bandung adalah mitra terpercaya Anda dalam meraih keunggulan di bidang ini.</p>\r\n\r\n<p><strong>Segera daftarkan diri Anda dan raih gelar Magister Akuntansi untuk masa depan karir yang gemilang!</strong></p>\r\n\r\n<p>🌐 Daftar sekarang melalui :&nbsp;https://registrasi.unpas.ac.id/&nbsp;<br />\r\n💬 Kunjungi&nbsp;https://pmb.unpas.ac.id/&nbsp;untuk informasi selengkapnya.</p>','2025-03-31','post-image/a8lKSuvEAskMnydPBpRyYAl9iXGLSnfDUuA5Noqp.jpg','testing','active','2025-05-08 02:35:00','2025-05-08 02:35:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_fakultas`
--

DROP TABLE IF EXISTS `profile_fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile_fakultas` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_fakultas`
--

LOCK TABLES `profile_fakultas` WRITE;
/*!40000 ALTER TABLE `profile_fakultas` DISABLE KEYS */;
INSERT INTO `profile_fakultas` VALUES (1,'Fakultas Teknik','Mewujudkan Insinyur Berkarakter','Visi','Menjadi fakultas teknik unggulan tingkat nasional.','Misi','Menyelenggarakan pendidikan, penelitian, dan pengabdian.','Tujuan','Membentuk lulusan yang berdaya saing global.','Nilai','Integritas, Profesionalisme, Inovasi.','image1.jpg','image2.jpg','image3.jpg','image4.jpg','10.000 Mahasiswa','50 Dosen','20 Program Studi','5 Gedung Kuliah','aktif','https://youtube.com/example',NULL,NULL);
/*!40000 ALTER TABLE `profile_fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prospeks`
--

DROP TABLE IF EXISTS `prospeks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prospeks` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prospeks`
--

LOCK TABLES `prospeks` WRITE;
/*!40000 ALTER TABLE `prospeks` DISABLE KEYS */;
INSERT INTO `prospeks` VALUES (3,1,'Calon Advokat','<ol>\r\n	<li>Advokat Litigasi (Litigation Lawyer)</li>\r\n	<li>Konsultan Hukum Bisnis</li>\r\n</ol>',NULL,'prospeks/Cr3ximu6oa8k04FYHhEdDrNAKy5E9zgc5jKZiI6A.svg','1','2025-05-09 03:40:38','2025-05-09 03:49:22'),(4,1,'Calon Hakim','<p>Hakim Peradilan Umum</p>\r\n\r\n<p>Hakim Peradilan Agama</p>',NULL,'prospeks/eeEgRbs9gJsf0ZHZWl1C8QH6ZNPj8ZnbZjjQ0L8d.svg','1','2025-05-09 03:47:21','2025-05-09 04:06:37'),(5,1,'Calon Jaksa','<p>Jaksa Penuntut Umum (JPU)</p>\r\n\r\n<p>Jaksa Intelijen</p>',NULL,'prospeks/hz2QGzaeIxEZ9aVR9fqU81pibH5LuScS3VWM6IJZ.svg','1','2025-05-09 04:08:34','2025-05-09 04:08:34'),(6,1,'Calon Notaris','<p>Pembuatan Akta Otentik</p>\r\n\r\n<p>Konsultan Hukum Keperdataan</p>',NULL,'prospeks/1Gw3WzOETY9lk2AAOytQbGmuk5KKMtVOzHRWdu60.svg','1','2025-05-09 04:10:25','2025-05-09 04:10:25'),(7,1,'Calon Mediator','<h4>Mediatori Sengketa Perdata</h4>\r\n\r\n<p>Mediator Bisnis dan Komersial</p>',NULL,'prospeks/MxVIIbLJdxpa8EFs9q1IP47BLc9kQVaVYQfHl8mV.svg','1','2025-05-09 04:12:28','2025-05-09 04:12:28'),(8,1,'Calon Legal Officer','<p>Legal Advisor (Penasihat Hukum Perusahaan)</p>\r\n\r\n<p>Corporate Governance</p>',NULL,'prospeks/e98qvgULQiW7dPI3qNIONHUKBLHBdu0IjucvQQqZ.svg','1','2025-05-09 04:14:34','2025-05-09 04:14:34'),(9,1,'Calon Analis dan Perancang Perundang-undangan','<p>Penyusunan Naskah Akademik dan RUU</p>\r\n\r\n<p>Legislative Drafting (Perancang Peraturan)</p>',NULL,'prospeks/hz8pfYSj42a5wxrjADX5ilnXjM9EFSJqEPnXtlZD.svg','1','2025-05-09 04:22:14','2025-05-09 04:22:14'),(10,1,'Calon Analis dan Perancang Kontrak','<p>Spesialisasi atau Ruang Lingkup Kerja</p>\r\n\r\n<p>Negosiator Kontrak</p>',NULL,'prospeks/gdS9j5qMzAwK7X0NUBtbJJtbRtaZIaOBO4aUVaVV.svg','1','2025-05-09 04:24:17','2025-05-09 04:24:17');
/*!40000 ALTER TABLE `prospeks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('kE0TOaegX240WQHePIjbDxBlNqHsXBTCBM35jxrJ',2,'172.70.142.49','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjRxVmhIeHhPd1ozYUZ6aFRPc1hVa01VWlB4dnJXeVh3R1lvTUV5ZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9wZW5kYWZ0YXJhbi5qYXRpZGlyaS5hcHAvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1746856592);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `side_baners`
--

DROP TABLE IF EXISTS `side_baners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `side_baners` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `side_baners`
--

LOCK TABLES `side_baners` WRITE;
/*!40000 ALTER TABLE `side_baners` DISABLE KEYS */;
INSERT INTO `side_baners` VALUES (1,1,'Fakultas Hukum Unpas','<p>Fakultas Hukum Unpas</p>','sideBanner-image/Kghsz3ErfTYbT0DLx8SoAdKV6nc2e6GOSfTloGH9.jpg','sideBanner-image/lJyKQZTMGEA8Xt6c4ojXOmuvgTk9m4TQTCL0Jw3O.jpg','testing','active','1','2025-05-08 08:48:02','2025-05-10 02:18:07');
/*!40000 ALTER TABLE `side_baners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,1,'Transforming Justice Through Legal Excellence','<p>Tempat lahirnya ahli hukum berkualitas yang menguasai teori dan mampu menciptakan perubahan nyata. Memadukan keunggulan akademis dengan integritas untuk melahirkan pemimpin hukum masa depan.</p>','slider-image/WMQ5fmtHLPO32HUiSZl9HBytoWEEwlk0q4Fx2NDv.jpg','slider-image/CjrDz0L4gEvcX6NmZpmBJKHuIhxzfec2wvjREpRX.jpg','CtVbj_Nd7Zs','active','1','2025-05-08 05:17:25','2025-05-09 02:16:57'),(3,1,'Legal Excellence, Transformative Justice','<p>Fakultas Hukum UNPAS: Tempat lahirnya ahli hukum berkualitas yang menguasai teori dan mampu menciptakan perubahan nyata.</p>','slider-image/6izQ4OWUs2Yw9r9RzSXKuD4nntfPbK9r5O9JS7Us.jpg',NULL,'https://www.youtube.com/@PGSDFKIPUnpas','active','1','2025-05-09 02:36:00','2025-05-09 02:36:00');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supports`
--

DROP TABLE IF EXISTS `supports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supports` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supports`
--

LOCK TABLES `supports` WRITE;
/*!40000 ALTER TABLE `supports` DISABLE KEYS */;
INSERT INTO `supports` VALUES (1,1,'JARINGAN ALUMNI UNIVERSITAS PASUNDAN','JARINGAN ALUMNI UNIVERSITAS PASUNDAN','JARINGAN ALUMNI UNIVERSITAS PASUNDAN','supports/rRXuw4TWtmfehNRwv1YdxKtEZQybdtPA7AaLDpa2.png','https://youtu.be/Es7vwL5XV2M','1','2025-05-10 02:24:28','2025-05-10 02:24:28');
/*!40000 ALTER TABLE `supports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,1,'Rizal Maulana Sani','Head of PPIC di Perusahaan Otomotif Manufaktur.','<p>Selama perjalanan saya, satu hal yang selalu saya pegang adalah prinsip value investing. Artinya, investasi terbesar yang dapat kalian lakukan adalah pada diri sendiri: dalam bentuk ilmu, pengalaman, dan karakter. Usaha yang kalian tanam hari ini, sekecil apa pun, akan menjadi fondasi kuat untuk kesuksesan di masa depan.</p>\r\n\r\n<p>Untuk membantu kalian menjadi individu yang lebih produktif dan efektif, saya sangat merekomendasikan buku &quot;The 7 Habits of Highly Effective People&quot; karya Stephen R. Covey. Buku ini mengajarkan cara membangun kebiasaan positif, mengelola waktu dengan bijak, dan berkolaborasi dengan orang lain secara efektif. Kebiasaan baik adalah kunci untuk membentuk masa depan yang lebih baik.</p>\r\n\r\n<p>Ingat, kesuksesan bukan hanya soal pencapaian, tapi juga tentang bagaimana kalian membangun kebiasaan positif yang akan membawa perubahan besar. Tetaplah optimis, konsisten, dan jadikan setiap tantangan sebagai peluang untuk tumbuh.</p>\r\n\r\n<p>Salam Hangat dan Semangat,</p>\r\n\r\n<p>Sani</p>','1','@unpas','testimonials/9IOKBpP60cU6Lx0koomtQxt5PmFdYeIfYhIqaXTW.png','2025-05-07 05:40:30','2025-05-07 05:40:30'),(2,1,'Salman M Rizki','Production Planning and Inventory Control at Pinehiil Arabia Food Ltd.','<p>Sebagai alumni Teknik Industri UNPAS merupakan sebuah pengalaman yang sangat berharga, dimana banyak nilai-nilai yang ditanamkan dari mahasiswa baru hingga menjadi sarjana. seperti yang dituangkan dalam motto UNPAS yaitu Pengkuh Agamana, Luhung Elmuna, Jembar Budayana</p>\r\n\r\n<p>&nbsp;</p>','1','@unpas','testimonials/csSEdUBqjnhfiD4uX0OeQpouMI17SdtDxmwiHrrM.jpg','2025-05-07 05:44:03','2025-05-07 05:44:03'),(3,1,'Ilham','Alumni Teknik Lingkungan Angkatan 2014','<p>Selama kuliah di UNPAS saya bertemu dengan dosen luar biasa yang selalu mendukung dan menginspirasi, materi akademiknya pun benar-benar relevan dan membantu saya mempersiapkan karir. Terima kasih UNPAS karena telah menjadi pondasi dalam perjalanan profesional saya</p>','1','@unpas','testimonials/6qysAXHLA81yMwR7dJbhQho3FxjwOkPzGYK1J05H.png','2025-05-07 05:45:08','2025-05-07 05:45:08'),(4,1,'Guruh Gunawan','ASN Kementerian PUPR','<p>&nbsp;</p>\r\n\r\n<p>Teknik Lingkungan memiliki fasilitas yang memadai, para dosen yang kompeten, dukungan alumni dan komunitas mahasiswa yang solid dan pengalaman yang berharga kuliah di Teknik Lingkungan UNPAS Bandung</p>\r\n\r\n<p>&nbsp;</p>','1','@unpas','testimonials/gX60pKRepIXfdxOfRi0A8JPbrMOMbcYP0WkXHS6t.png','2025-05-07 05:46:13','2025-05-07 05:46:13');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timelines`
--

DROP TABLE IF EXISTS `timelines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timelines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_departement` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `no_urut` int NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timelines_id_departement_foreign` (`id_departement`),
  CONSTRAINT `timelines_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timelines`
--

LOCK TABLES `timelines` WRITE;
/*!40000 ALTER TABLE `timelines` DISABLE KEYS */;
INSERT INTO `timelines` VALUES (1,1,'Pagoejoeban Pasoendan Berdiri','pagoejoeban-pasoendan-berdiri','<p>Pagoejoeban Pasoendan yang merupakan induk organisasi didirikan oleh generasi muda peserta didik Sunda di STOVIA (School Tot Opleiding voor Indlandsche Artsen) &ndash; Sekolah kedokteran zaman Belanda di Batavia (Jakarta).</p>','timeline-image/ie5PNMoO6LqBvi6yBAVAvGneYKzY9hLNfSdiTwLm.png','1913-07-20',1,'1','2025-05-08 09:37:32','2025-05-08 09:37:32'),(2,1,'Fakultas Hukum UNPAS Berdiri','fakultas-hukum-unpas-berdiri','<p>Yayasan Universitas Pasundan mendirikan Fakultas Hukum dan Pengetahuan Masyarakat serta Fakultas Sosial Politik berdasarkan Akta Notaris Mr. Tan Eng Kiam No. 4 tanggal 14 November 1960</p>','timeline-image/fYhBcJm598BdDxNX45gWtOXkmQh1lUd0Sj8CztcA.png','1960-11-14',2,'1','2025-05-08 09:39:34','2025-05-08 09:39:34'),(3,1,'Periodisasi Kepemimpinan','periodisasi-kepemimpinan','<p>Fakultas Hukum mula-mula dipimpin langsung oleh salah satu pengurus Yayasan Universitas Pasundan yakni Mr. Oesadi dengan dukungan para perintis Fakultas Hukum meliputi : R. Abas Soeriaatmadja, R. Sunarja, Prof. Dr. Mr. Moechtar Kusumaatmadja, LL.M., Prof. Mr. Usep Ranawidjaja, Prof. Harsojo, Prof. Ir. Anwas Ardiwilaga, Drs. Muchtar Affandi, Mr. Ruhimat, Ir. Suparwadi, Drs. Harun Affandi.</p>','timeline-image/WWClSVIzz8dYQcDRA6mjNkxZXkCJv5h7x4zhX23Q.png','1960-01-01',3,'1','2025-05-08 09:40:51','2025-05-08 09:40:51'),(4,1,'Status “TERDAFTAR”','status-terdaftar','<p>Fakultas Hukum UNPAS mendapatkan status &ldquo;TERDAFTAR&rdquo; setelah diteliti oleh Departemen Pendidikan dan Kebudayaan RI.</p>','timeline-image/r4kpW4hpVaeCt0ywxecIWQmMmU27NotcsJj1ZoVv.png','1962-09-11',4,'1','2025-05-08 09:41:40','2025-05-08 09:41:40'),(5,1,'Status “DIAKUI”','status-diakui','<p>Setelah dievaluasi dan diakreditasi kembali terhadap ijazah Sarjana Muda Hukum diberikan status &ldquo;DIAKUI&rdquo; dan diberikan penghargaan sama dengan Sarjana Muda Hukum dari Fakultas/Universitas Negeri sebagaimana tertuang dalam SK Menteri Perguruan Tinggi dan Ilmu Pengetahuan No. 27 Tahun 1964.</p>','timeline-image/4TY2qUhJj23SDY6VOv0tiEMujUgzTjtzdSpea9HO.png','1964-03-15',5,'1','2025-05-08 09:42:37','2025-05-08 09:42:37'),(6,1,'Periodisasi Kepemimpinan','periodisasi-kepemimpinan','<p>Fakultas Hukum dipimpin oleh Dekan dibantu oleh seorang Sekretaris Dekan. Pada periode kepemimpinan ini belum ada batasan yang tetap baik untuk Dekan maupun Sekretaris Dekan, sehingga seseorang dapat menjabat dalam waktu yang cukup lama.</p>','timeline-image/gRkvPc8tgrHvx73c8NCgD6qyjjV2mQ8sAreNnwUP.png','1972-01-01',6,'1','2025-05-08 09:43:30','2025-05-08 09:43:30'),(7,1,'Periodisasi Kepemimpinan','periodisasi-kepemimpinan','<p>Pada periode ini, Fakultas Hukum dipimpin oleh Dekan dibantu oleh tiga orang Pembantu Dekan. Pembantu Dekan I bertugas untuk membantu Dekan dalam bidang akademik, Pembantu Dekan II bertugas untuk membantu Dekan dalam bidang administrasi umum dan keuangan, dan Pembantu Dekan Dekan III bertugas untuk membantu Dekan dalam bidang kepeserta didikan dan alumni. Dekan dan Pembantu Dekan dipilih oleh Tenaga Pendidik. Masa periode kepemimpinan Dekan selama dua tahun dan dapat dipilih kembali dengan ketentuan tidak boleh menjabat tiga periode secara berturut-turut.</p>','timeline-image/lfAuhDv9uYaasgk8EjaAynahN8NsNFitMyS14VXW.png','1978-01-01',7,'1','2025-05-08 09:44:14','2025-05-08 09:44:14'),(8,1,'Status “TERDAFTAR”','status-terdaftar','<p>Melalui SK Mendikbud No. 024/O/1981 tanggal 22 Januari 1981 dan SK Mendikbud No. 0637/O/1984 tanggal 27 Desember 1984 diberikan status &ldquo;TERDAFTAR&rdquo; untuk Fakultas Hukum UNPAS Jurusan Hukum Keperdataan, Hukum Pidan dan Hukum Tata Negara.</p>','timeline-image/w7jWUM10xfwqjxSbWtAcd76EWQZ3cKTJx9oknJaE.png','1981-01-22',9,'1','2025-05-08 09:45:14','2025-05-08 09:45:14'),(9,1,'Periodisasi Kepemimpinan','periodisasi-kepemimpinan','<p>Pada periode ini Dekan dan Pembantu Dekan dipilih oleh Senat Fakultas Hukum Unpas, masa periode Dekan selama (dua) tahun.</p>','timeline-image/DQ9ajXWRyZFjHMJYImNEZMwFrBI6EJt7hKt53Ja8.png','1986-01-01',10,'1','2025-05-08 09:46:13','2025-05-08 09:46:13'),(10,1,'Status “DIAKUI”','status-diakui','<p>Melalui SK Mendikbud No. 0537/O/1986 tanggal 5 Agustus 1986 Fakultas Hukum UNPAS diberikan status &ldquo;DIAKUI&rdquo; untuk tingkat Strata Satu (S1) Jurusan Hukum Perdata, Hukum Pidana, dan Hukum Tata Negara.</p>','timeline-image/t7uPUbPr7RHl6D1PhUznfLQIwPSRj0fTOtgNQhrt.png',NULL,11,'1','2025-05-08 09:47:02','2025-05-08 09:47:02'),(11,1,'Status “DISAMAKAN”','status-disamakan','<p>Melalui SK Mendikbud No. 93/DIKTI/KEP/1992 tanggal 2 April 1992, Jurusan Hukum Keperdataan dan Pidana diberikan status Akreditasi &ldquo;DISAMAKAN&rdquo; dan dipertegas kembali dengan SK Dirjen DIKTI No. 150/DIKTI/KEP/1993 tanggal 20 April 1993 Jo SK Dirjen DIKTI No. 62/DIKTI/KEP/1994 tanggal 3 Februari 1993 tanpa melihat penjurusan dan hanya ada satu program studi yakni Program Studi Ilmu Hukum.</p>','timeline-image/56nO3LJJqK7AAOuiLufp7drehKKcrCvkhsoYY42J.png','1992-04-02',12,'1','2025-05-08 09:47:50','2025-05-08 09:47:50'),(12,1,'Akreditasi “A” – Baik Sekali','akreditasi-a-baik-sekali','<p>Khusus bagi Status Akreditasi Program Studi Ilmu Hukum di Fakultas Hukum UNPAS berdasarkan SK BAN-PT Depdikbud No. 001/BAN-PT/Ak-1/VIII/1998 tanggal 11 Agustus 1998 &ldquo;Terakreditasi dengan Peringkat A (Baik Sekali)&rdquo;</p>','timeline-image/eYBvxa5MqOQjXq8aMwF7Es8M5fgFCtqWtKHqyloJ.png','1998-08-11',13,'1','2025-05-08 09:48:38','2025-05-08 09:48:38'),(13,1,'Akreditasi “A” – Baik Sekali','akreditasi-a-baik-sekali','<p>Hingga saat ini peringkat akreditasi Program Studi Ilmu Hukum di Fakultas Hukum UNPAS tetap terakreditasi dengan Peringkat A (Baik Sekali) berdasarkan SK BAN-PT No. 451/SK/BAN-PT/Akred/S/XI/2014 tanggal 15 November 2014 yang berlaku selama 5 (lima) tahun.</p>','timeline-image/kNIuKxV3D9qx90hy9QTzhzNxXhndedT5SiLxvMnr.png','2014-11-15',14,'1','2025-05-08 09:49:20','2025-05-08 09:49:20'),(14,1,'Akreditasi “A” – Baik Sekali','akreditasi-a-baik-sekali','<p><strong>Pada 5 Mei 2020 Program Studi Ilmu Hukum di Fakultas Hukum UNPAS tetap terakreditasi dengan Peringkat A (Baik Sekali) berdasarkan SK BAN-PT No. 2781/SK/BAN-PT/AK-PPJ/S/V/2020 tanggal 05 Mei 2020 yang berlaku selama 5 (lima) tahun.</strong></p>','timeline-image/l7lTmFt61anLnZGL4hAIkgBQvRzq6byPodc8KJOO.png','2020-05-05',15,'1','2025-05-08 09:50:05','2025-05-08 09:50:05'),(15,1,'Akreditasi Unggul','akreditasi-unggul','<p><strong>Hingga saat ini peringkat akreditasi Program Studi Ilmu Hukum di Fakultas Hukum UNPAS terakreditasi dengan Peringkat Unggul berdasarkan Surat Keputusan Direktur Dewan Eksekutif BAN-PT No. 4912/SK/BAN-PT/Ak.KP/S/XI/2023 yang berlaku sejak tanggal 28 &ndash; November &ndash; 2023 sampai dengan 5 &ndash; Mei &ndash; 2025</strong></p>','timeline-image/gF7ZrYcmPVtbJOXQkH3WPOSMEB4pJ2BwJtmtD3sW.png','2023-11-28',16,'1','2025-05-08 09:51:00','2025-05-08 09:51:00');
/*!40000 ALTER TABLE `timelines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_pics`
--

DROP TABLE IF EXISTS `user_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_pics` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_pics`
--

LOCK TABLES `user_pics` WRITE;
/*!40000 ALTER TABLE `user_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Kemal Ramadhan','km.kemal03@gmail.com','08986004677','Super Admin','2025-05-07 04:59:29','$2y$12$gokP8WvXw8.BGOHnsHojZu683JDKDzuh.XQUNVuSeBAjL.0Un/Ntm',NULL,NULL,NULL,NULL,'2025-05-07 04:59:29','2025-05-07 04:59:29',NULL),(2,'Admin User','admin@example.com','08123456789','admin','2025-05-07 04:59:29','$2y$12$p/F.sn5Q7rGAg7IqfHe67umF/BlYPDX3IHAwP.sxff7oY6Nhf87Hu',NULL,NULL,NULL,NULL,'2025-05-07 04:59:29','2025-05-07 04:59:29',NULL),(3,'Regular User','user@example.com','08987654321','admin','2025-05-07 04:59:29','$2y$12$k5o55Mw1ZmcR2DrOxSgzIOJl3DSVutLnvp1vH9lNJws.22s1FL0ea',NULL,NULL,NULL,NULL,'2025-05-07 04:59:30','2025-05-07 04:59:30',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usps`
--

DROP TABLE IF EXISTS `usps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usps` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usps`
--

LOCK TABLES `usps` WRITE;
/*!40000 ALTER TABLE `usps` DISABLE KEYS */;
INSERT INTO `usps` VALUES (1,1,'Fasilitas Lengkap, Belajar Nyaman!','<p>Kampus kami dilengkapi fasilitas modern, termasuk laboratorium hukum, perpustakaan&nbsp;<em>cozy</em>, sarana kreativitas, dan ruang kelas buat mendukung kegiatan belajar dan penelitianmu.</p>','usps/aIBf44Q30Iyb1sqt7fO2OQ0lcBpObs4UdlgYknaz.svg','1','2025-05-08 07:17:54','2025-05-09 03:06:44'),(2,1,'Akreditasi Unggul: Jaminan Kualitas Pendidikan Hukum Terbaik','<p>Kuliah di kampus terakreditasi unggul, pasti bikin CV-mu makin bersinar! Ini bukti kualitas pendidikan di Program Studi Ilmu Hukum di Unpas yang diakui secara nasional.</p>','usps/X4YRBTye9I9QEq55qzJstoCBz0lacU9kepSjlB5L.svg','1','2025-05-08 07:18:14','2025-05-09 03:12:04'),(3,1,'Go Global! Program Pertukaran Pelajar dan Pembelajaran ke Mancanegara.','<p>Kesempatan emas buat kamu yang pengen merasakan pengalaman belajar di luar negeri. Program pertukaran pelajar dan pembelajaran ke mancanegara menanti!</p>','usps/Ocm2Ax2ApdH3xwkFqENW1rLI8pjrFYguZVB1szzV.svg','1','2025-05-08 07:18:31','2025-05-09 03:13:50'),(4,1,'Belajar Langsung dari Ahlinya Bersama Dosen & Guest Lecturer Dari Berbagai Negara','<p>Dosen berpengalaman, kamu bakal dibimbing oleh para ahli hukum dan praktisi yang udah malang melintang di dunia hukum. Kami juga menghadirkan Guest Lecturer dari dalam dan luar negeri.</p>','usps/z4yo5TQIribxM3QvuLso8fFZiqMjALC3cP0c1H1O.svg','1','2025-05-08 07:18:47','2025-05-09 03:18:42');
/*!40000 ALTER TABLE `usps` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-10  6:03:20
