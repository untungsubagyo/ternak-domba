-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ternak-domba
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `domba`
--

DROP TABLE IF EXISTS `domba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domba` (
  `domba_id` int(11) NOT NULL AUTO_INCREMENT,
  `kandang_id` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `berat_saat_masuk` float NOT NULL,
  `harga_saat_masuk` bigint(20) NOT NULL,
  `tanggal_panen` date NOT NULL,
  `berat_saat_panen` float NOT NULL,
  `harga_saat_panen` bigint(20) NOT NULL,
  PRIMARY KEY (`domba_id`),
  KEY `kandang_id` (`kandang_id`),
  CONSTRAINT `domba_ibfk_1` FOREIGN KEY (`kandang_id`) REFERENCES `kandang` (`kandang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domba`
--

LOCK TABLES `domba` WRITE;
/*!40000 ALTER TABLE `domba` DISABLE KEYS */;
INSERT INTO `domba` VALUES (1,1,'2022-01-10',30.78,2000000,'2022-07-10',50.79,5000000);
/*!40000 ALTER TABLE `domba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hak_akses`
--

DROP TABLE IF EXISTS `hak_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hak_akses` (
  `hak_akses_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`hak_akses_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hak_akses`
--

LOCK TABLES `hak_akses` WRITE;
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kandang`
--

DROP TABLE IF EXISTS `kandang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kandang` (
  `kandang_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tanggal_bast` date NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `jumlah_kandang` int(11) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`kandang_id`),
  KEY `pengajuan_id` (`pengajuan_id`),
  CONSTRAINT `kandang_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_kandang` (`pengajuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kandang`
--

LOCK TABLES `kandang` WRITE;
/*!40000 ALTER TABLE `kandang` DISABLE KEYS */;
INSERT INTO `kandang` VALUES (1,'2022-07-11','2022-07-20','2022-07-21',3,2,20000000,'2022-07-09 20:52:04','2022-07-09 20:52:04');
/*!40000 ALTER TABLE `kandang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra` (
  `mitra_id` varchar(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `foto_sertifikat` varchar(100) NOT NULL,
  `foto_surat_keterangan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra`
--

LOCK TABLES `mitra` WRITE;
/*!40000 ALTER TABLE `mitra` DISABLE KEYS */;
INSERT INTO `mitra` VALUES ('001','ahmad','61243c7b9a4022cb3f8dc3106767ed12','Ahmad','Kebumen','1981-01-01','L','Jl. Ahmad Yani','08123456789','1657361989_1737870005819897.png','1657361993_1737870010081824.png','','',1,'2022-07-09 10:07:15','2022-07-09 10:07:15');
/*!40000 ALTER TABLE `mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pakan`
--

DROP TABLE IF EXISTS `pakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pakan` (
  `pakan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kandang_id` int(11) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jenis_pakan` varchar(200) NOT NULL,
  `jumlah_pakan` float NOT NULL,
  `jumlah_pakan_terkonsumsi` float NOT NULL,
  `sisa_pakan` float NOT NULL,
  `harga_pakan` bigint(20) NOT NULL,
  PRIMARY KEY (`pakan_id`),
  KEY `kandang_id` (`kandang_id`),
  CONSTRAINT `pakan_ibfk_1` FOREIGN KEY (`kandang_id`) REFERENCES `kandang` (`kandang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pakan`
--

LOCK TABLES `pakan` WRITE;
/*!40000 ALTER TABLE `pakan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pakan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_kandang`
--

DROP TABLE IF EXISTS `pengajuan_kandang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengajuan_kandang` (
  `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `mitra_id` varchar(10) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `alamat` text NOT NULL,
  `luas_lahan` float NOT NULL,
  `jumlah_pengajuan` smallint(6) NOT NULL,
  `jumlah_rekomendasi` smallint(6) NOT NULL,
  `bukti_ver_lahan` varchar(255) NOT NULL,
  `bukti_ver_mitra` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pengajuan_id`),
  KEY `mitra_id` (`mitra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_kandang`
--

LOCK TABLES `pengajuan_kandang` WRITE;
/*!40000 ALTER TABLE `pengajuan_kandang` DISABLE KEYS */;
INSERT INTO `pengajuan_kandang` VALUES (3,'001','2022-07-01','Karanggamblok 01/05, Pejagoan',120,3,2,'','',0,'2022-07-09 20:19:05','2022-07-09 20:19:05');
/*!40000 ALTER TABLE `pengajuan_kandang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_ci_sessions`
--

DROP TABLE IF EXISTS `web_ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_ci_sessions`
--

LOCK TABLES `web_ci_sessions` WRITE;
/*!40000 ALTER TABLE `web_ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `web_ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `web_user`
--

DROP TABLE IF EXISTS `web_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `web_user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(50) NOT NULL,
  `level_id` int(1) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_aktif` int(1) NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `user_logincount` int(5) NOT NULL,
  `user_theme` varchar(30) DEFAULT 'default',
  `session` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`),
  KEY `leveluser` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_user`
--

LOCK TABLES `web_user` WRITE;
/*!40000 ALTER TABLE `web_user` DISABLE KEYS */;
INSERT INTO `web_user` VALUES (1,'Staff Informasi',1,'admin','21232f297a57a5a743894a0e4a801fc3',1,'',1,'default',NULL,'2022-07-09 10:45:33');
/*!40000 ALTER TABLE `web_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-17  8:01:00
