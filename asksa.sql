-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: asksa
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `referent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomcomplet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresserue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codepostal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C7440455B03A8386` (`created_by_id`),
  KEY `IDX_C7440455DD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_C7440455B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_C7440455DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,NULL,NULL,'009RF','Tagnon & Fils','Jéricho','Personne Morale','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','tagnon-fils','2019-11-09 11:07:00',NULL),(2,NULL,NULL,'010RF','SONAGNON ET FILS','Midombo','Personne Morale','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','sonagnon-et-fils','2019-11-09 11:14:34',NULL),(3,NULL,NULL,'0011','BOCO & FILS','SACRE COEUR','Personne Physique','97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','boco-fils','2019-11-09 11:16:30',NULL),(4,NULL,NULL,'0012','MIKA & FILS','Ayélawadjè','Personne Morale','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','mika-fils','2019-11-09 11:17:56','2019-11-09 12:34:51'),(5,NULL,NULL,'014RF','BODJRENOU & FILS','Ayélawadjè','Personne Physique','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bodjrenou-fils','2019-11-09 11:19:25',NULL),(6,NULL,NULL,'015RF','BOCO & FILS','Ayélawadjè','Personne Morale','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','boco-fils-1','2019-11-09 11:20:09',NULL),(7,NULL,NULL,'0014','BOV & FILS','Ayélawadjè','Personne Physique','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bov-fils','2019-11-09 11:21:05',NULL),(8,NULL,NULL,'0017','BOC & FILS','Ayélawadjè','Personne Morale','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','boc-fils','2019-11-09 11:21:45',NULL),(9,NULL,NULL,'0018','MIKAS & FILS','Ayélawadjè','Personne Morale','97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','mikas-fils','2019-11-09 11:22:26',NULL),(10,NULL,NULL,'014REF','BODJRENOU & FILSS','Ayélawadjè','Personne Morale','97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bodjrenou-filss','2019-11-09 11:23:31',NULL),(11,NULL,NULL,'009RFS','Tagnon & Fils','Midombo','Personne Physique','97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','tagnon-fils-1','2019-11-09 11:24:20',NULL),(12,NULL,NULL,'0011S','BOCOS RENE','Jéricho','Personne Physique','97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','bocos-rene','2019-11-09 11:25:08',NULL),(13,NULL,NULL,'0056','GBEDINHESSI','Germai','Personne Physique','97678789','ABOMEY-CALAVI','01 BP 2343','germ@hotmail.com','gbedinhessi','2019-11-09 12:33:45',NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomcourt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresserue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codepostal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `nomcomplet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_369ECA32B03A8386` (`created_by_id`),
  KEY `IDX_369ECA32DD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_369ECA32B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_369ECA32DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20191105180022','2019-11-06 15:22:16'),('20191106104541','2019-11-06 15:22:30'),('20191106113135','2019-11-06 15:22:39'),('20191111140211','2019-11-11 14:02:30'),('20191111141951','2019-11-11 14:19:56');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_u` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC27B03A8386` (`created_by_id`),
  KEY `IDX_29A5EC27DD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_29A5EC27B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_29A5EC27DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,NULL,NULL,'001','HX5',4500,'4 litres','2019-11-11 15:20:04',NULL,'hx5'),(2,NULL,NULL,'002','HX7 (4)',7500,'10w-40','2019-11-11 15:22:03',NULL,'hx7-4');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-11 17:22:25
