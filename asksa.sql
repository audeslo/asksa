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
-- Table structure for table `capacite`
--

DROP TABLE IF EXISTS `capacite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `capacitecarton` int(11) NOT NULL,
  `capacitebidon` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A1E9ED3BB03A8386` (`created_by_id`),
  KEY `IDX_A1E9ED3BDD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_A1E9ED3BB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_A1E9ED3BDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacite`
--

LOCK TABLES `capacite` WRITE;
/*!40000 ALTER TABLE `capacite` DISABLE KEYS */;
INSERT INTO `capacite` VALUES (1,2,NULL,'5B de 3L','5 bidons de 2 par carton',NULL,'5-bidons-de-2-par-carton','2019-12-28 21:08:09',NULL,5,3),(2,2,NULL,'5B de 1L','5 bidons de 1L par carton',NULL,'5-bidons-de-1l-par-carton','2019-12-28 21:10:25',NULL,5,1),(3,2,NULL,'5B de 4L','5 bidons de 4 par carton',NULL,'5-bidons-de-4-par-carton','2019-12-28 21:10:49',NULL,5,4),(4,2,NULL,'10B de 1L','10 bidons de 1L par carton',NULL,'10-bidons-de-1l-par-carton','2019-12-28 21:11:19',NULL,10,1);
/*!40000 ALTER TABLE `capacite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_497DD634B03A8386` (`created_by_id`),
  KEY `IDX_497DD634DD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_497DD634B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_497DD634DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,1,NULL,'Semi-grossite','des','grossite','2019-11-13 19:06:45',NULL);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

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
  `referent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresserue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codepostal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `civilite` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telfixe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personnecontact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `numerocompte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `society` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifiant1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifiant2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` longblob,
  PRIMARY KEY (`id`),
  KEY `IDX_C7440455B03A8386` (`created_by_id`),
  KEY `IDX_C7440455DD7B2EBC` (`edited_by_id`),
  KEY `IDX_C7440455BCF5E72D` (`categorie_id`),
  CONSTRAINT `FK_C7440455B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_C7440455BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_C7440455DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,NULL,NULL,'009RF','Jéricho',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','tagnon-fils','2019-11-09 11:07:00',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','ABC SARL','354566',NULL),(2,NULL,NULL,'010RF','Midombo',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','sonagnon-et-fils','2019-11-09 11:14:34',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','ABBE SA','4555675',NULL),(3,NULL,NULL,'0011','SACRE COEUR',1,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','boco-fils','2019-11-09 11:16:30',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','ASSA','Clement',NULL),(4,NULL,NULL,'0012','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','mika-fils','2019-11-09 11:17:56','2019-11-09 12:34:51','','',NULL,'','',1,NULL,NULL,NULL,'','SOBECIK','45678',NULL),(5,NULL,NULL,'014RF','Ayélawadjè',1,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bodjrenou-fils','2019-11-09 11:19:25',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','AGOSSOU','Rachelle',NULL),(6,NULL,NULL,'015RF','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','boco-fils-1','2019-11-09 11:20:09',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','CONTEX BENIN','9876R567',NULL),(7,NULL,NULL,'0014','Ayélawadjè',1,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bov-fils','2019-11-09 11:21:05',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','AZONHISSOU','Emmanuel',NULL),(8,NULL,NULL,'0017','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','boc-fils','2019-11-09 11:21:45',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','DANA SA','456789',NULL),(9,NULL,NULL,'0018','Ayélawadjè',0,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','mikas-fils','2019-11-09 11:22:26',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','DONGAKO','345678765',NULL),(10,NULL,NULL,'014REF','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bodjrenou-filss','2019-11-09 11:23:31',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','GKS SARL','3456789',NULL),(11,NULL,NULL,'009RFS','Midombo',1,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','tagnon-fils-1','2019-11-09 11:24:20',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'',NULL,NULL,NULL),(12,NULL,NULL,'0011S','Jéricho',1,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','bocos-rene','2019-11-09 11:25:08',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'',NULL,NULL,NULL),(13,NULL,NULL,'0056','Germai',1,'97678789','ABOMEY-CALAVI','01 BP 2343','germ@hotmail.com','gbedinhessi','2019-11-09 12:33:45',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'',NULL,NULL,NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fournisseur_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecommande` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67D670C757F` (`fournisseur_id`),
  KEY `IDX_6EEAA67DB03A8386` (`created_by_id`),
  KEY `IDX_6EEAA67DDD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_6EEAA67D670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`),
  CONSTRAINT `FK_6EEAA67DB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_6EEAA67DDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (1,1,NULL,NULL,'commande pressé','2019-11-16','Salut','2019-11-16 12:35:09',NULL,'commande-presse','CD-00001',2),(2,1,NULL,NULL,'Commande de bob','2019-11-16','RAS','2019-11-16 15:08:32',NULL,'commande-de-bob',NULL,0),(3,1,NULL,NULL,'Commande test reference','2019-11-16','RAS','2019-11-16 15:27:16',NULL,'commande-test-reference',NULL,0),(4,1,NULL,NULL,'Commande test reference 22','2019-11-16','reg','2019-11-16 15:38:35',NULL,'commande-test-reference-22','CD-00003',0);
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commander`
--

DROP TABLE IF EXISTS `commander`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commander` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `quantitecommandee` int(11) NOT NULL,
  `capacitecarton` int(11) NOT NULL,
  `sousreference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacitebidon` int(11) NOT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `quantiteenstock` int(11) NOT NULL,
  `etat` smallint(6) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42D318BAF347EFB` (`produit_id`),
  KEY `IDX_42D318BA82EA2E54` (`commande_id`),
  KEY `IDX_42D318BAB03A8386` (`created_by_id`),
  KEY `IDX_42D318BADD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_42D318BA82EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  CONSTRAINT `FK_42D318BAB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_42D318BADD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_42D318BAF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commander`
--

LOCK TABLES `commander` WRITE;
/*!40000 ALTER TABLE `commander` DISABLE KEYS */;
INSERT INTO `commander` VALUES (2,2,1,200,5,'CD-00001/PD-00002-5B-4L',4,NULL,NULL,160,2,'cd-00001-pd-00002-5b-4l','2019-11-16 15:03:16',NULL),(3,1,1,120,5,'CD-00001/001-5B-2L',2,NULL,NULL,70,2,'cd-00001-001-5b-2l','2019-11-16 15:05:00',NULL);
/*!40000 ALTER TABLE `commander` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commandershow`
--

DROP TABLE IF EXISTS `commandershow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commandershow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edited_by_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `commandeshow_id` int(11) DEFAULT NULL,
  `capacitecartonshow` int(11) NOT NULL,
  `capacitebidonshow` int(11) NOT NULL,
  `quantitecommandeshow` int(11) NOT NULL,
  `quantitestock` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_60333357DD7B2EBC` (`edited_by_id`),
  KEY `IDX_60333357B03A8386` (`created_by_id`),
  KEY `IDX_60333357F347EFB` (`produit_id`),
  KEY `IDX_603333572BA6E032` (`commandeshow_id`),
  CONSTRAINT `FK_603333572BA6E032` FOREIGN KEY (`commandeshow_id`) REFERENCES `commandeshow` (`id`),
  CONSTRAINT `FK_60333357B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_60333357DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_60333357F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandershow`
--

LOCK TABLES `commandershow` WRITE;
/*!40000 ALTER TABLE `commandershow` DISABLE KEYS */;
INSERT INTO `commandershow` VALUES (1,NULL,NULL,1,1,5,2,12,12,'cs-00001-pd-00001-5c-4b',NULL,'2019-11-27 21:32:59','CS-00001/PD-00001-5C-4B'),(2,NULL,NULL,2,1,5,4,30,30,'cs-00001-pd-00002-4c-2b',NULL,'2019-11-27 21:36:42','CS-00001/PD-00002-4C-2B'),(3,NULL,1,2,2,5,1,12,12,'cs-00002-pd-00002-5c-1b',NULL,'2019-12-14 15:56:57','CS-00002/PD-00002-5C-1B'),(4,NULL,1,1,2,5,1,15,15,'cs-00002-pd-00001-5c-1b',NULL,'2019-12-14 15:57:39','CS-00002/PD-00001-5C-1B'),(5,NULL,1,1,3,5,2,8,8,'cs-00003-pd-00001-5c-2b',NULL,'2019-12-14 16:14:22','CS-00003/PD-00001-5C-2B'),(6,NULL,1,1,4,5,2,4,4,'cs-00004-pd-00001-5c-2b',NULL,'2019-12-14 16:18:34','CS-00004/PD-00001-5C-2B'),(7,NULL,1,1,5,5,2,5,5,'cs-00005-pd-00001-5c-2b',NULL,'2019-12-14 16:34:59','CS-00005/PD-00001-5C-2B'),(8,NULL,1,1,6,5,2,1,1,'cs-00006-pd-00001-5c-2b',NULL,'2019-12-14 16:39:07','CS-00006/PD-00001-5C-2B'),(9,NULL,1,2,6,5,4,10,10,'cs-00006-pd-00002-5c-4b',NULL,'2019-12-14 16:40:21','CS-00006/PD-00002-5C-4B');
/*!40000 ALTER TABLE `commandershow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commandeshow`
--

DROP TABLE IF EXISTS `commandeshow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commandeshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edited_by_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `intituleshow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecomshow` date NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fournisseurshow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `credited_on` datetime DEFAULT NULL,
  `showroom_id` int(11) NOT NULL,
  `statut` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7835D7ABDD7B2EBC` (`edited_by_id`),
  KEY `IDX_7835D7ABB03A8386` (`created_by_id`),
  KEY `IDX_7835D7AB2243B88B` (`showroom_id`),
  CONSTRAINT `FK_7835D7AB2243B88B` FOREIGN KEY (`showroom_id`) REFERENCES `showroom` (`id`),
  CONSTRAINT `FK_7835D7ABB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_7835D7ABDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandeshow`
--

LOCK TABLES `commandeshow` WRITE;
/*!40000 ALTER TABLE `commandeshow` DISABLE KEYS */;
INSERT INTO `commandeshow` VALUES (1,NULL,NULL,'listge prods','2019-11-24','CS-00001','Roland','listge-prods',NULL,NULL,1,1),(2,NULL,1,'azertyuiop','2019-12-14','CS-00002','Gildas','azertyuiop',NULL,'2019-12-14 15:55:56',1,0),(3,NULL,1,'test','2019-12-14','CS-00003','Gildas','test',NULL,'2019-12-14 16:12:22',3,1),(4,NULL,1,'voir','2019-12-14','CS-00004','Gildas','voir',NULL,'2019-12-14 16:17:57',2,1),(5,NULL,1,'PCZKC?ZDCIO','2019-12-14','CS-00005','Jean','pczkc-zdcio',NULL,'2019-12-14 16:34:03',3,1),(6,NULL,1,'vue','2019-12-14','CS-00006','Roland','vue',NULL,'2019-12-14 16:38:21',2,1);
/*!40000 ALTER TABLE `commandeshow` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` VALUES (1,'GKS et Fils','Sikecodji','Cotonou','Bénin','09',NULL,NULL,NULL,'Global Kanul Shop','AMANDJI Emile',NULL,NULL,'global-kanul-shop','2019-11-16 12:32:39',NULL);
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
INSERT INTO `migration_versions` VALUES ('20191105180022','2019-11-06 15:22:16'),('20191106104541','2019-11-06 15:22:30'),('20191106113135','2019-11-06 15:22:39'),('20191111140211','2019-11-11 14:02:30'),('20191111141951','2019-11-11 14:19:56'),('20191112190758','2019-11-13 07:51:54'),('20191113054631','2019-11-13 07:51:54'),('20191113075535','2019-11-13 07:56:07'),('20191113180506','2019-11-13 18:07:53'),('20191115183941','2019-11-15 18:41:05'),('20191116113917','2019-11-16 11:40:38'),('20191116124456','2019-11-16 12:45:51'),('20191116143807','2019-11-16 14:38:27'),('20191119212641','2019-11-19 21:28:48'),('20191124161251','2019-11-24 16:14:06'),('20191124164734','2019-11-24 16:48:19'),('20191124164804','2019-11-24 16:48:20'),('20191127211606','2019-11-27 21:17:27'),('20191127212757','2019-11-27 21:28:42'),('20191128004546','2019-11-28 00:51:31'),('20191128013255','2019-11-28 08:05:19'),('20191128080802','2019-11-28 08:08:46'),('20191201175428','2019-12-01 17:55:11'),('20191207205117','2019-12-07 20:52:33'),('20191207215905','2019-12-07 22:14:27'),('20191208151751','2019-12-08 15:18:16'),('20191210214000','2019-12-10 21:49:42'),('20191210214716','2019-12-10 21:49:43'),('20191211213604','2019-12-11 21:37:03'),('20191213095703','2019-12-13 09:58:32'),('20191214172903','2019-12-14 17:29:46'),('20191228115549','2019-12-28 11:56:02'),('20191228201200','2019-12-28 20:14:41');
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
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_u` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categprod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixventeconseiller` int(11) NOT NULL,
  `stockalerte` int(11) NOT NULL,
  `img` longblob,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC27B03A8386` (`created_by_id`),
  KEY `IDX_29A5EC27DD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_29A5EC27B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_29A5EC27DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,NULL,NULL,'PD-00001','HX5',4500,'4 litres','2019-11-11 15:20:04',NULL,'hx5','',0,0,NULL),(2,NULL,NULL,'PD-00002','HX7 (4)',7500,'10w-40','2019-11-11 15:22:03',NULL,'hx7-4','',0,0,NULL),(3,1,NULL,'PD-00003','HX8 5w-30',7500,NULL,'2019-12-14 18:00:11',NULL,'hx8-5w-30','lubrifiant',7700,50,NULL);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `showroom`
--

DROP TABLE IF EXISTS `showroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `showroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edited_by_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomshow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quartier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1E2F444FDD7B2EBC` (`edited_by_id`),
  KEY `IDX_1E2F444FB03A8386` (`created_by_id`),
  CONSTRAINT `FK_1E2F444FB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_1E2F444FDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `showroom`
--

LOCK TABLES `showroom` WRITE;
/*!40000 ALTER TABLE `showroom` DISABLE KEYS */;
INSERT INTO `showroom` VALUES (1,1,NULL,'SR-00001','OLUWA TOBI','Agbodjedo','97 76 78 87','Roland ASSOGBE','98 87 77 89','rassog@yahoo.fr','oluwa-tobi','2019-12-11 22:19:40','2019-11-19 22:15:20'),(2,1,1,'SR-00002','SONAGNON','YENAWA','97 78 87 76','ATCHOU Alvodis','98 67 76 66','adel@hotmail.com','sonagnon','2019-12-11 22:21:08','2019-12-11 21:37:46'),(3,NULL,1,'SR-00003','ETS VIGNON','AVOTROU','98 88 88 77 65','ZINSOU Gildas','67 77 87 65 05','gilz@yahoo.fr','ets-vignon',NULL,'2019-12-11 22:08:46');
/*!40000 ALTER TABLE `showroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stockshowroom`
--

DROP TABLE IF EXISTS `stockshowroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockshowroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commandershow_id` int(11) NOT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `referencecarton` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencebidon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ouvert` tinyint(1) NOT NULL,
  `vendu` tinyint(1) NOT NULL,
  `prixdevente` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `sync` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_73C1B5914409F943` (`commandershow_id`),
  KEY `IDX_73C1B591B03A8386` (`created_by_id`),
  KEY `IDX_73C1B591DD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_73C1B5914409F943` FOREIGN KEY (`commandershow_id`) REFERENCES `commandershow` (`id`),
  CONSTRAINT `FK_73C1B591B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_73C1B591DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=411 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockshowroom`
--

LOCK TABLES `stockshowroom` WRITE;
/*!40000 ALTER TABLE `stockshowroom` DISABLE KEYS */;
INSERT INTO `stockshowroom` VALUES (1,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/1','CS-00001/PD-00001-5C-4B/1-1',0,0,0,'cs-00001-pd-00001-5c-4b-1-cs-00001-pd-00001-5c-4b-1-1','2019-11-28 10:00:59',NULL,0),(2,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/1','CS-00001/PD-00001-5C-4B/1-2',0,0,0,'cs-00001-pd-00001-5c-4b-1-cs-00001-pd-00001-5c-4b-1-2','2019-11-28 10:01:01',NULL,0),(3,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/1','CS-00001/PD-00001-5C-4B/1-3',0,0,0,'cs-00001-pd-00001-5c-4b-1-cs-00001-pd-00001-5c-4b-1-3','2019-11-28 10:01:01',NULL,0),(4,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/1','CS-00001/PD-00001-5C-4B/1-4',0,0,0,'cs-00001-pd-00001-5c-4b-1-cs-00001-pd-00001-5c-4b-1-4','2019-11-28 10:01:01',NULL,0),(5,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/1','CS-00001/PD-00001-5C-4B/1-5',0,0,0,'cs-00001-pd-00001-5c-4b-1-cs-00001-pd-00001-5c-4b-1-5','2019-11-28 10:01:01',NULL,0),(6,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/2','CS-00001/PD-00001-5C-4B/2-1',0,0,0,'cs-00001-pd-00001-5c-4b-2-cs-00001-pd-00001-5c-4b-2-1','2019-11-28 10:01:01',NULL,0),(7,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/2','CS-00001/PD-00001-5C-4B/2-2',0,0,0,'cs-00001-pd-00001-5c-4b-2-cs-00001-pd-00001-5c-4b-2-2','2019-11-28 10:01:01',NULL,0),(8,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/2','CS-00001/PD-00001-5C-4B/2-3',0,0,0,'cs-00001-pd-00001-5c-4b-2-cs-00001-pd-00001-5c-4b-2-3','2019-11-28 10:01:01',NULL,0),(9,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/2','CS-00001/PD-00001-5C-4B/2-4',0,0,0,'cs-00001-pd-00001-5c-4b-2-cs-00001-pd-00001-5c-4b-2-4','2019-11-28 10:01:01',NULL,0),(10,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/2','CS-00001/PD-00001-5C-4B/2-5',0,0,0,'cs-00001-pd-00001-5c-4b-2-cs-00001-pd-00001-5c-4b-2-5','2019-11-28 10:01:01',NULL,0),(11,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/3','CS-00001/PD-00001-5C-4B/3-1',0,0,0,'cs-00001-pd-00001-5c-4b-3-cs-00001-pd-00001-5c-4b-3-1','2019-11-28 10:01:01',NULL,0),(12,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/3','CS-00001/PD-00001-5C-4B/3-2',0,0,0,'cs-00001-pd-00001-5c-4b-3-cs-00001-pd-00001-5c-4b-3-2','2019-11-28 10:01:01',NULL,0),(13,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/3','CS-00001/PD-00001-5C-4B/3-3',0,0,0,'cs-00001-pd-00001-5c-4b-3-cs-00001-pd-00001-5c-4b-3-3','2019-11-28 10:01:02',NULL,0),(14,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/3','CS-00001/PD-00001-5C-4B/3-4',0,0,0,'cs-00001-pd-00001-5c-4b-3-cs-00001-pd-00001-5c-4b-3-4','2019-11-28 10:01:02',NULL,0),(15,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/3','CS-00001/PD-00001-5C-4B/3-5',0,0,0,'cs-00001-pd-00001-5c-4b-3-cs-00001-pd-00001-5c-4b-3-5','2019-11-28 10:01:02',NULL,0),(16,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/4','CS-00001/PD-00001-5C-4B/4-1',0,0,0,'cs-00001-pd-00001-5c-4b-4-cs-00001-pd-00001-5c-4b-4-1','2019-11-28 10:01:02',NULL,0),(17,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/4','CS-00001/PD-00001-5C-4B/4-2',0,0,0,'cs-00001-pd-00001-5c-4b-4-cs-00001-pd-00001-5c-4b-4-2','2019-11-28 10:01:02',NULL,0),(18,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/4','CS-00001/PD-00001-5C-4B/4-3',0,0,0,'cs-00001-pd-00001-5c-4b-4-cs-00001-pd-00001-5c-4b-4-3','2019-11-28 10:01:02',NULL,0),(19,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/4','CS-00001/PD-00001-5C-4B/4-4',0,0,0,'cs-00001-pd-00001-5c-4b-4-cs-00001-pd-00001-5c-4b-4-4','2019-11-28 10:01:02',NULL,0),(20,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/4','CS-00001/PD-00001-5C-4B/4-5',0,0,0,'cs-00001-pd-00001-5c-4b-4-cs-00001-pd-00001-5c-4b-4-5','2019-11-28 10:01:02',NULL,0),(21,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/5','CS-00001/PD-00001-5C-4B/5-1',0,0,0,'cs-00001-pd-00001-5c-4b-5-cs-00001-pd-00001-5c-4b-5-1','2019-11-28 10:01:02',NULL,0),(22,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/5','CS-00001/PD-00001-5C-4B/5-2',0,0,0,'cs-00001-pd-00001-5c-4b-5-cs-00001-pd-00001-5c-4b-5-2','2019-11-28 10:01:02',NULL,0),(23,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/5','CS-00001/PD-00001-5C-4B/5-3',0,0,0,'cs-00001-pd-00001-5c-4b-5-cs-00001-pd-00001-5c-4b-5-3','2019-11-28 10:01:02',NULL,0),(24,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/5','CS-00001/PD-00001-5C-4B/5-4',0,0,0,'cs-00001-pd-00001-5c-4b-5-cs-00001-pd-00001-5c-4b-5-4','2019-11-28 10:01:02',NULL,0),(25,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/5','CS-00001/PD-00001-5C-4B/5-5',0,0,0,'cs-00001-pd-00001-5c-4b-5-cs-00001-pd-00001-5c-4b-5-5','2019-11-28 10:01:02',NULL,0),(26,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/6','CS-00001/PD-00001-5C-4B/6-1',0,0,0,'cs-00001-pd-00001-5c-4b-6-cs-00001-pd-00001-5c-4b-6-1','2019-11-28 10:01:02',NULL,0),(27,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/6','CS-00001/PD-00001-5C-4B/6-2',0,0,0,'cs-00001-pd-00001-5c-4b-6-cs-00001-pd-00001-5c-4b-6-2','2019-11-28 10:01:02',NULL,0),(28,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/6','CS-00001/PD-00001-5C-4B/6-3',0,0,0,'cs-00001-pd-00001-5c-4b-6-cs-00001-pd-00001-5c-4b-6-3','2019-11-28 10:01:02',NULL,0),(29,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/6','CS-00001/PD-00001-5C-4B/6-4',0,0,0,'cs-00001-pd-00001-5c-4b-6-cs-00001-pd-00001-5c-4b-6-4','2019-11-28 10:01:02',NULL,0),(30,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/6','CS-00001/PD-00001-5C-4B/6-5',0,0,0,'cs-00001-pd-00001-5c-4b-6-cs-00001-pd-00001-5c-4b-6-5','2019-11-28 10:01:02',NULL,0),(31,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/7','CS-00001/PD-00001-5C-4B/7-1',0,0,0,'cs-00001-pd-00001-5c-4b-7-cs-00001-pd-00001-5c-4b-7-1','2019-11-28 10:01:03',NULL,0),(32,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/7','CS-00001/PD-00001-5C-4B/7-2',0,0,0,'cs-00001-pd-00001-5c-4b-7-cs-00001-pd-00001-5c-4b-7-2','2019-11-28 10:01:03',NULL,0),(33,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/7','CS-00001/PD-00001-5C-4B/7-3',0,0,0,'cs-00001-pd-00001-5c-4b-7-cs-00001-pd-00001-5c-4b-7-3','2019-11-28 10:01:03',NULL,0),(34,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/7','CS-00001/PD-00001-5C-4B/7-4',0,0,0,'cs-00001-pd-00001-5c-4b-7-cs-00001-pd-00001-5c-4b-7-4','2019-11-28 10:01:03',NULL,0),(35,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/7','CS-00001/PD-00001-5C-4B/7-5',0,0,0,'cs-00001-pd-00001-5c-4b-7-cs-00001-pd-00001-5c-4b-7-5','2019-11-28 10:01:03',NULL,0),(36,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/8','CS-00001/PD-00001-5C-4B/8-1',0,0,0,'cs-00001-pd-00001-5c-4b-8-cs-00001-pd-00001-5c-4b-8-1','2019-11-28 10:01:03',NULL,0),(37,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/8','CS-00001/PD-00001-5C-4B/8-2',0,0,0,'cs-00001-pd-00001-5c-4b-8-cs-00001-pd-00001-5c-4b-8-2','2019-11-28 10:01:03',NULL,0),(38,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/8','CS-00001/PD-00001-5C-4B/8-3',0,0,0,'cs-00001-pd-00001-5c-4b-8-cs-00001-pd-00001-5c-4b-8-3','2019-11-28 10:01:03',NULL,0),(39,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/8','CS-00001/PD-00001-5C-4B/8-4',0,0,0,'cs-00001-pd-00001-5c-4b-8-cs-00001-pd-00001-5c-4b-8-4','2019-11-28 10:01:03',NULL,0),(40,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/8','CS-00001/PD-00001-5C-4B/8-5',0,0,0,'cs-00001-pd-00001-5c-4b-8-cs-00001-pd-00001-5c-4b-8-5','2019-11-28 10:01:03',NULL,0),(41,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/9','CS-00001/PD-00001-5C-4B/9-1',0,0,0,'cs-00001-pd-00001-5c-4b-9-cs-00001-pd-00001-5c-4b-9-1','2019-11-28 10:01:03',NULL,0),(42,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/9','CS-00001/PD-00001-5C-4B/9-2',0,0,0,'cs-00001-pd-00001-5c-4b-9-cs-00001-pd-00001-5c-4b-9-2','2019-11-28 10:01:03',NULL,0),(43,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/9','CS-00001/PD-00001-5C-4B/9-3',0,0,0,'cs-00001-pd-00001-5c-4b-9-cs-00001-pd-00001-5c-4b-9-3','2019-11-28 10:01:03',NULL,0),(44,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/9','CS-00001/PD-00001-5C-4B/9-4',0,0,0,'cs-00001-pd-00001-5c-4b-9-cs-00001-pd-00001-5c-4b-9-4','2019-11-28 10:01:03',NULL,0),(45,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/9','CS-00001/PD-00001-5C-4B/9-5',0,0,0,'cs-00001-pd-00001-5c-4b-9-cs-00001-pd-00001-5c-4b-9-5','2019-11-28 10:01:03',NULL,0),(46,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/10','CS-00001/PD-00001-5C-4B/10-1',0,0,0,'cs-00001-pd-00001-5c-4b-10-cs-00001-pd-00001-5c-4b-10-1','2019-11-28 10:01:03',NULL,0),(47,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/10','CS-00001/PD-00001-5C-4B/10-2',0,0,0,'cs-00001-pd-00001-5c-4b-10-cs-00001-pd-00001-5c-4b-10-2','2019-11-28 10:01:03',NULL,0),(48,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/10','CS-00001/PD-00001-5C-4B/10-3',0,0,0,'cs-00001-pd-00001-5c-4b-10-cs-00001-pd-00001-5c-4b-10-3','2019-11-28 10:01:03',NULL,0),(49,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/10','CS-00001/PD-00001-5C-4B/10-4',0,0,0,'cs-00001-pd-00001-5c-4b-10-cs-00001-pd-00001-5c-4b-10-4','2019-11-28 10:01:03',NULL,0),(50,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/10','CS-00001/PD-00001-5C-4B/10-5',0,0,0,'cs-00001-pd-00001-5c-4b-10-cs-00001-pd-00001-5c-4b-10-5','2019-11-28 10:01:03',NULL,0),(51,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/11','CS-00001/PD-00001-5C-4B/11-1',0,0,0,'cs-00001-pd-00001-5c-4b-11-cs-00001-pd-00001-5c-4b-11-1','2019-11-28 10:01:03',NULL,0),(52,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/11','CS-00001/PD-00001-5C-4B/11-2',0,0,0,'cs-00001-pd-00001-5c-4b-11-cs-00001-pd-00001-5c-4b-11-2','2019-11-28 10:01:03',NULL,0),(53,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/11','CS-00001/PD-00001-5C-4B/11-3',0,0,0,'cs-00001-pd-00001-5c-4b-11-cs-00001-pd-00001-5c-4b-11-3','2019-11-28 10:01:03',NULL,0),(54,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/11','CS-00001/PD-00001-5C-4B/11-4',0,0,0,'cs-00001-pd-00001-5c-4b-11-cs-00001-pd-00001-5c-4b-11-4','2019-11-28 10:01:03',NULL,0),(55,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/11','CS-00001/PD-00001-5C-4B/11-5',0,0,0,'cs-00001-pd-00001-5c-4b-11-cs-00001-pd-00001-5c-4b-11-5','2019-11-28 10:01:04',NULL,0),(56,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/12','CS-00001/PD-00001-5C-4B/12-1',0,0,0,'cs-00001-pd-00001-5c-4b-12-cs-00001-pd-00001-5c-4b-12-1','2019-11-28 10:01:04',NULL,0),(57,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/12','CS-00001/PD-00001-5C-4B/12-2',0,0,0,'cs-00001-pd-00001-5c-4b-12-cs-00001-pd-00001-5c-4b-12-2','2019-11-28 10:01:04',NULL,0),(58,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/12','CS-00001/PD-00001-5C-4B/12-3',0,0,0,'cs-00001-pd-00001-5c-4b-12-cs-00001-pd-00001-5c-4b-12-3','2019-11-28 10:01:04',NULL,0),(59,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/12','CS-00001/PD-00001-5C-4B/12-4',0,0,0,'cs-00001-pd-00001-5c-4b-12-cs-00001-pd-00001-5c-4b-12-4','2019-11-28 10:01:04',NULL,0),(60,1,NULL,NULL,'CS-00001/PD-00001-5C-4B/12','CS-00001/PD-00001-5C-4B/12-5',0,0,0,'cs-00001-pd-00001-5c-4b-12-cs-00001-pd-00001-5c-4b-12-5','2019-11-28 10:01:04',NULL,0),(61,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/1','CS-00001/PD-00002-4C-2B/1-1',0,0,0,'cs-00001-pd-00002-4c-2b-1-cs-00001-pd-00002-4c-2b-1-1','2019-11-28 10:01:04',NULL,0),(62,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/1','CS-00001/PD-00002-4C-2B/1-2',0,0,0,'cs-00001-pd-00002-4c-2b-1-cs-00001-pd-00002-4c-2b-1-2','2019-11-28 10:01:04',NULL,0),(63,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/1','CS-00001/PD-00002-4C-2B/1-3',0,0,0,'cs-00001-pd-00002-4c-2b-1-cs-00001-pd-00002-4c-2b-1-3','2019-11-28 10:01:04',NULL,0),(64,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/1','CS-00001/PD-00002-4C-2B/1-4',0,0,0,'cs-00001-pd-00002-4c-2b-1-cs-00001-pd-00002-4c-2b-1-4','2019-11-28 10:01:04',NULL,0),(65,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/1','CS-00001/PD-00002-4C-2B/1-5',0,0,0,'cs-00001-pd-00002-4c-2b-1-cs-00001-pd-00002-4c-2b-1-5','2019-11-28 10:01:04',NULL,0),(66,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/2','CS-00001/PD-00002-4C-2B/2-1',0,0,0,'cs-00001-pd-00002-4c-2b-2-cs-00001-pd-00002-4c-2b-2-1','2019-11-28 10:01:04',NULL,0),(67,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/2','CS-00001/PD-00002-4C-2B/2-2',0,0,0,'cs-00001-pd-00002-4c-2b-2-cs-00001-pd-00002-4c-2b-2-2','2019-11-28 10:01:04',NULL,0),(68,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/2','CS-00001/PD-00002-4C-2B/2-3',0,0,0,'cs-00001-pd-00002-4c-2b-2-cs-00001-pd-00002-4c-2b-2-3','2019-11-28 10:01:04',NULL,0),(69,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/2','CS-00001/PD-00002-4C-2B/2-4',0,0,0,'cs-00001-pd-00002-4c-2b-2-cs-00001-pd-00002-4c-2b-2-4','2019-11-28 10:01:04',NULL,0),(70,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/2','CS-00001/PD-00002-4C-2B/2-5',0,0,0,'cs-00001-pd-00002-4c-2b-2-cs-00001-pd-00002-4c-2b-2-5','2019-11-28 10:01:04',NULL,0),(71,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/3','CS-00001/PD-00002-4C-2B/3-1',0,0,0,'cs-00001-pd-00002-4c-2b-3-cs-00001-pd-00002-4c-2b-3-1','2019-11-28 10:01:04',NULL,0),(72,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/3','CS-00001/PD-00002-4C-2B/3-2',0,0,0,'cs-00001-pd-00002-4c-2b-3-cs-00001-pd-00002-4c-2b-3-2','2019-11-28 10:01:05',NULL,0),(73,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/3','CS-00001/PD-00002-4C-2B/3-3',0,0,0,'cs-00001-pd-00002-4c-2b-3-cs-00001-pd-00002-4c-2b-3-3','2019-11-28 10:01:05',NULL,0),(74,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/3','CS-00001/PD-00002-4C-2B/3-4',0,0,0,'cs-00001-pd-00002-4c-2b-3-cs-00001-pd-00002-4c-2b-3-4','2019-11-28 10:01:05',NULL,0),(75,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/3','CS-00001/PD-00002-4C-2B/3-5',0,0,0,'cs-00001-pd-00002-4c-2b-3-cs-00001-pd-00002-4c-2b-3-5','2019-11-28 10:01:05',NULL,0),(76,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/4','CS-00001/PD-00002-4C-2B/4-1',0,0,0,'cs-00001-pd-00002-4c-2b-4-cs-00001-pd-00002-4c-2b-4-1','2019-11-28 10:01:05',NULL,0),(77,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/4','CS-00001/PD-00002-4C-2B/4-2',0,0,0,'cs-00001-pd-00002-4c-2b-4-cs-00001-pd-00002-4c-2b-4-2','2019-11-28 10:01:05',NULL,0),(78,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/4','CS-00001/PD-00002-4C-2B/4-3',0,0,0,'cs-00001-pd-00002-4c-2b-4-cs-00001-pd-00002-4c-2b-4-3','2019-11-28 10:01:05',NULL,0),(79,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/4','CS-00001/PD-00002-4C-2B/4-4',0,0,0,'cs-00001-pd-00002-4c-2b-4-cs-00001-pd-00002-4c-2b-4-4','2019-11-28 10:01:05',NULL,0),(80,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/4','CS-00001/PD-00002-4C-2B/4-5',0,0,0,'cs-00001-pd-00002-4c-2b-4-cs-00001-pd-00002-4c-2b-4-5','2019-11-28 10:01:05',NULL,0),(81,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/5','CS-00001/PD-00002-4C-2B/5-1',0,0,0,'cs-00001-pd-00002-4c-2b-5-cs-00001-pd-00002-4c-2b-5-1','2019-11-28 10:01:05',NULL,0),(82,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/5','CS-00001/PD-00002-4C-2B/5-2',0,0,0,'cs-00001-pd-00002-4c-2b-5-cs-00001-pd-00002-4c-2b-5-2','2019-11-28 10:01:05',NULL,0),(83,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/5','CS-00001/PD-00002-4C-2B/5-3',0,0,0,'cs-00001-pd-00002-4c-2b-5-cs-00001-pd-00002-4c-2b-5-3','2019-11-28 10:01:05',NULL,0),(84,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/5','CS-00001/PD-00002-4C-2B/5-4',0,0,0,'cs-00001-pd-00002-4c-2b-5-cs-00001-pd-00002-4c-2b-5-4','2019-11-28 10:01:05',NULL,0),(85,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/5','CS-00001/PD-00002-4C-2B/5-5',0,0,0,'cs-00001-pd-00002-4c-2b-5-cs-00001-pd-00002-4c-2b-5-5','2019-11-28 10:01:05',NULL,0),(86,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/6','CS-00001/PD-00002-4C-2B/6-1',0,0,0,'cs-00001-pd-00002-4c-2b-6-cs-00001-pd-00002-4c-2b-6-1','2019-11-28 10:01:05',NULL,0),(87,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/6','CS-00001/PD-00002-4C-2B/6-2',0,0,0,'cs-00001-pd-00002-4c-2b-6-cs-00001-pd-00002-4c-2b-6-2','2019-11-28 10:01:05',NULL,0),(88,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/6','CS-00001/PD-00002-4C-2B/6-3',0,0,0,'cs-00001-pd-00002-4c-2b-6-cs-00001-pd-00002-4c-2b-6-3','2019-11-28 10:01:05',NULL,0),(89,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/6','CS-00001/PD-00002-4C-2B/6-4',0,0,0,'cs-00001-pd-00002-4c-2b-6-cs-00001-pd-00002-4c-2b-6-4','2019-11-28 10:01:05',NULL,0),(90,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/6','CS-00001/PD-00002-4C-2B/6-5',0,0,0,'cs-00001-pd-00002-4c-2b-6-cs-00001-pd-00002-4c-2b-6-5','2019-11-28 10:01:05',NULL,0),(91,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/7','CS-00001/PD-00002-4C-2B/7-1',0,0,0,'cs-00001-pd-00002-4c-2b-7-cs-00001-pd-00002-4c-2b-7-1','2019-11-28 10:01:06',NULL,0),(92,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/7','CS-00001/PD-00002-4C-2B/7-2',0,0,0,'cs-00001-pd-00002-4c-2b-7-cs-00001-pd-00002-4c-2b-7-2','2019-11-28 10:01:06',NULL,0),(93,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/7','CS-00001/PD-00002-4C-2B/7-3',0,0,0,'cs-00001-pd-00002-4c-2b-7-cs-00001-pd-00002-4c-2b-7-3','2019-11-28 10:01:06',NULL,0),(94,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/7','CS-00001/PD-00002-4C-2B/7-4',0,0,0,'cs-00001-pd-00002-4c-2b-7-cs-00001-pd-00002-4c-2b-7-4','2019-11-28 10:01:06',NULL,0),(95,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/7','CS-00001/PD-00002-4C-2B/7-5',0,0,0,'cs-00001-pd-00002-4c-2b-7-cs-00001-pd-00002-4c-2b-7-5','2019-11-28 10:01:06',NULL,0),(96,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/8','CS-00001/PD-00002-4C-2B/8-1',0,0,0,'cs-00001-pd-00002-4c-2b-8-cs-00001-pd-00002-4c-2b-8-1','2019-11-28 10:01:06',NULL,0),(97,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/8','CS-00001/PD-00002-4C-2B/8-2',0,0,0,'cs-00001-pd-00002-4c-2b-8-cs-00001-pd-00002-4c-2b-8-2','2019-11-28 10:01:06',NULL,0),(98,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/8','CS-00001/PD-00002-4C-2B/8-3',0,0,0,'cs-00001-pd-00002-4c-2b-8-cs-00001-pd-00002-4c-2b-8-3','2019-11-28 10:01:06',NULL,0),(99,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/8','CS-00001/PD-00002-4C-2B/8-4',0,0,0,'cs-00001-pd-00002-4c-2b-8-cs-00001-pd-00002-4c-2b-8-4','2019-11-28 10:01:06',NULL,0),(100,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/8','CS-00001/PD-00002-4C-2B/8-5',0,0,0,'cs-00001-pd-00002-4c-2b-8-cs-00001-pd-00002-4c-2b-8-5','2019-11-28 10:01:06',NULL,0),(101,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/9','CS-00001/PD-00002-4C-2B/9-1',0,0,0,'cs-00001-pd-00002-4c-2b-9-cs-00001-pd-00002-4c-2b-9-1','2019-11-28 10:01:06',NULL,0),(102,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/9','CS-00001/PD-00002-4C-2B/9-2',0,0,0,'cs-00001-pd-00002-4c-2b-9-cs-00001-pd-00002-4c-2b-9-2','2019-11-28 10:01:06',NULL,0),(103,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/9','CS-00001/PD-00002-4C-2B/9-3',0,0,0,'cs-00001-pd-00002-4c-2b-9-cs-00001-pd-00002-4c-2b-9-3','2019-11-28 10:01:06',NULL,0),(104,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/9','CS-00001/PD-00002-4C-2B/9-4',0,0,0,'cs-00001-pd-00002-4c-2b-9-cs-00001-pd-00002-4c-2b-9-4','2019-11-28 10:01:06',NULL,0),(105,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/9','CS-00001/PD-00002-4C-2B/9-5',0,0,0,'cs-00001-pd-00002-4c-2b-9-cs-00001-pd-00002-4c-2b-9-5','2019-11-28 10:01:06',NULL,0),(106,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/10','CS-00001/PD-00002-4C-2B/10-1',0,0,0,'cs-00001-pd-00002-4c-2b-10-cs-00001-pd-00002-4c-2b-10-1','2019-11-28 10:01:06',NULL,0),(107,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/10','CS-00001/PD-00002-4C-2B/10-2',0,0,0,'cs-00001-pd-00002-4c-2b-10-cs-00001-pd-00002-4c-2b-10-2','2019-11-28 10:01:07',NULL,0),(108,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/10','CS-00001/PD-00002-4C-2B/10-3',0,0,0,'cs-00001-pd-00002-4c-2b-10-cs-00001-pd-00002-4c-2b-10-3','2019-11-28 10:01:07',NULL,0),(109,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/10','CS-00001/PD-00002-4C-2B/10-4',0,0,0,'cs-00001-pd-00002-4c-2b-10-cs-00001-pd-00002-4c-2b-10-4','2019-11-28 10:01:07',NULL,0),(110,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/10','CS-00001/PD-00002-4C-2B/10-5',0,0,0,'cs-00001-pd-00002-4c-2b-10-cs-00001-pd-00002-4c-2b-10-5','2019-11-28 10:01:07',NULL,0),(111,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/11','CS-00001/PD-00002-4C-2B/11-1',0,0,0,'cs-00001-pd-00002-4c-2b-11-cs-00001-pd-00002-4c-2b-11-1','2019-11-28 10:01:07',NULL,0),(112,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/11','CS-00001/PD-00002-4C-2B/11-2',0,0,0,'cs-00001-pd-00002-4c-2b-11-cs-00001-pd-00002-4c-2b-11-2','2019-11-28 10:01:07',NULL,0),(113,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/11','CS-00001/PD-00002-4C-2B/11-3',0,0,0,'cs-00001-pd-00002-4c-2b-11-cs-00001-pd-00002-4c-2b-11-3','2019-11-28 10:01:07',NULL,0),(114,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/11','CS-00001/PD-00002-4C-2B/11-4',0,0,0,'cs-00001-pd-00002-4c-2b-11-cs-00001-pd-00002-4c-2b-11-4','2019-11-28 10:01:07',NULL,0),(115,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/11','CS-00001/PD-00002-4C-2B/11-5',0,0,0,'cs-00001-pd-00002-4c-2b-11-cs-00001-pd-00002-4c-2b-11-5','2019-11-28 10:01:07',NULL,0),(116,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/12','CS-00001/PD-00002-4C-2B/12-1',0,0,0,'cs-00001-pd-00002-4c-2b-12-cs-00001-pd-00002-4c-2b-12-1','2019-11-28 10:01:07',NULL,0),(117,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/12','CS-00001/PD-00002-4C-2B/12-2',0,0,0,'cs-00001-pd-00002-4c-2b-12-cs-00001-pd-00002-4c-2b-12-2','2019-11-28 10:01:07',NULL,0),(118,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/12','CS-00001/PD-00002-4C-2B/12-3',0,0,0,'cs-00001-pd-00002-4c-2b-12-cs-00001-pd-00002-4c-2b-12-3','2019-11-28 10:01:07',NULL,0),(119,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/12','CS-00001/PD-00002-4C-2B/12-4',0,0,0,'cs-00001-pd-00002-4c-2b-12-cs-00001-pd-00002-4c-2b-12-4','2019-11-28 10:01:07',NULL,0),(120,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/12','CS-00001/PD-00002-4C-2B/12-5',0,0,0,'cs-00001-pd-00002-4c-2b-12-cs-00001-pd-00002-4c-2b-12-5','2019-11-28 10:01:07',NULL,0),(121,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/13','CS-00001/PD-00002-4C-2B/13-1',0,0,0,'cs-00001-pd-00002-4c-2b-13-cs-00001-pd-00002-4c-2b-13-1','2019-11-28 10:01:07',NULL,0),(122,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/13','CS-00001/PD-00002-4C-2B/13-2',0,0,0,'cs-00001-pd-00002-4c-2b-13-cs-00001-pd-00002-4c-2b-13-2','2019-11-28 10:01:07',NULL,0),(123,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/13','CS-00001/PD-00002-4C-2B/13-3',0,0,0,'cs-00001-pd-00002-4c-2b-13-cs-00001-pd-00002-4c-2b-13-3','2019-11-28 10:01:07',NULL,0),(124,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/13','CS-00001/PD-00002-4C-2B/13-4',0,0,0,'cs-00001-pd-00002-4c-2b-13-cs-00001-pd-00002-4c-2b-13-4','2019-11-28 10:01:07',NULL,0),(125,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/13','CS-00001/PD-00002-4C-2B/13-5',0,0,0,'cs-00001-pd-00002-4c-2b-13-cs-00001-pd-00002-4c-2b-13-5','2019-11-28 10:01:07',NULL,0),(126,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/14','CS-00001/PD-00002-4C-2B/14-1',0,0,0,'cs-00001-pd-00002-4c-2b-14-cs-00001-pd-00002-4c-2b-14-1','2019-11-28 10:01:08',NULL,0),(127,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/14','CS-00001/PD-00002-4C-2B/14-2',0,0,0,'cs-00001-pd-00002-4c-2b-14-cs-00001-pd-00002-4c-2b-14-2','2019-11-28 10:01:08',NULL,0),(128,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/14','CS-00001/PD-00002-4C-2B/14-3',0,0,0,'cs-00001-pd-00002-4c-2b-14-cs-00001-pd-00002-4c-2b-14-3','2019-11-28 10:01:08',NULL,0),(129,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/14','CS-00001/PD-00002-4C-2B/14-4',0,0,0,'cs-00001-pd-00002-4c-2b-14-cs-00001-pd-00002-4c-2b-14-4','2019-11-28 10:01:08',NULL,0),(130,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/14','CS-00001/PD-00002-4C-2B/14-5',0,0,0,'cs-00001-pd-00002-4c-2b-14-cs-00001-pd-00002-4c-2b-14-5','2019-11-28 10:01:08',NULL,0),(131,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/15','CS-00001/PD-00002-4C-2B/15-1',0,0,0,'cs-00001-pd-00002-4c-2b-15-cs-00001-pd-00002-4c-2b-15-1','2019-11-28 10:01:08',NULL,0),(132,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/15','CS-00001/PD-00002-4C-2B/15-2',0,0,0,'cs-00001-pd-00002-4c-2b-15-cs-00001-pd-00002-4c-2b-15-2','2019-11-28 10:01:08',NULL,0),(133,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/15','CS-00001/PD-00002-4C-2B/15-3',0,0,0,'cs-00001-pd-00002-4c-2b-15-cs-00001-pd-00002-4c-2b-15-3','2019-11-28 10:01:08',NULL,0),(134,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/15','CS-00001/PD-00002-4C-2B/15-4',0,0,0,'cs-00001-pd-00002-4c-2b-15-cs-00001-pd-00002-4c-2b-15-4','2019-11-28 10:01:08',NULL,0),(135,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/15','CS-00001/PD-00002-4C-2B/15-5',0,0,0,'cs-00001-pd-00002-4c-2b-15-cs-00001-pd-00002-4c-2b-15-5','2019-11-28 10:01:08',NULL,0),(136,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/16','CS-00001/PD-00002-4C-2B/16-1',0,0,0,'cs-00001-pd-00002-4c-2b-16-cs-00001-pd-00002-4c-2b-16-1','2019-11-28 10:01:08',NULL,0),(137,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/16','CS-00001/PD-00002-4C-2B/16-2',0,0,0,'cs-00001-pd-00002-4c-2b-16-cs-00001-pd-00002-4c-2b-16-2','2019-11-28 10:01:08',NULL,0),(138,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/16','CS-00001/PD-00002-4C-2B/16-3',0,0,0,'cs-00001-pd-00002-4c-2b-16-cs-00001-pd-00002-4c-2b-16-3','2019-11-28 10:01:08',NULL,0),(139,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/16','CS-00001/PD-00002-4C-2B/16-4',0,0,0,'cs-00001-pd-00002-4c-2b-16-cs-00001-pd-00002-4c-2b-16-4','2019-11-28 10:01:08',NULL,0),(140,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/16','CS-00001/PD-00002-4C-2B/16-5',0,0,0,'cs-00001-pd-00002-4c-2b-16-cs-00001-pd-00002-4c-2b-16-5','2019-11-28 10:01:08',NULL,0),(141,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/17','CS-00001/PD-00002-4C-2B/17-1',0,0,0,'cs-00001-pd-00002-4c-2b-17-cs-00001-pd-00002-4c-2b-17-1','2019-11-28 10:01:08',NULL,0),(142,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/17','CS-00001/PD-00002-4C-2B/17-2',0,0,0,'cs-00001-pd-00002-4c-2b-17-cs-00001-pd-00002-4c-2b-17-2','2019-11-28 10:01:08',NULL,0),(143,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/17','CS-00001/PD-00002-4C-2B/17-3',0,0,0,'cs-00001-pd-00002-4c-2b-17-cs-00001-pd-00002-4c-2b-17-3','2019-11-28 10:01:08',NULL,0),(144,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/17','CS-00001/PD-00002-4C-2B/17-4',0,0,0,'cs-00001-pd-00002-4c-2b-17-cs-00001-pd-00002-4c-2b-17-4','2019-11-28 10:01:09',NULL,0),(145,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/17','CS-00001/PD-00002-4C-2B/17-5',0,0,0,'cs-00001-pd-00002-4c-2b-17-cs-00001-pd-00002-4c-2b-17-5','2019-11-28 10:01:09',NULL,0),(146,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/18','CS-00001/PD-00002-4C-2B/18-1',0,0,0,'cs-00001-pd-00002-4c-2b-18-cs-00001-pd-00002-4c-2b-18-1','2019-11-28 10:01:09',NULL,0),(147,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/18','CS-00001/PD-00002-4C-2B/18-2',0,0,0,'cs-00001-pd-00002-4c-2b-18-cs-00001-pd-00002-4c-2b-18-2','2019-11-28 10:01:09',NULL,0),(148,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/18','CS-00001/PD-00002-4C-2B/18-3',0,0,0,'cs-00001-pd-00002-4c-2b-18-cs-00001-pd-00002-4c-2b-18-3','2019-11-28 10:01:09',NULL,0),(149,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/18','CS-00001/PD-00002-4C-2B/18-4',0,0,0,'cs-00001-pd-00002-4c-2b-18-cs-00001-pd-00002-4c-2b-18-4','2019-11-28 10:01:09',NULL,0),(150,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/18','CS-00001/PD-00002-4C-2B/18-5',0,0,0,'cs-00001-pd-00002-4c-2b-18-cs-00001-pd-00002-4c-2b-18-5','2019-11-28 10:01:09',NULL,0),(151,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/19','CS-00001/PD-00002-4C-2B/19-1',0,0,0,'cs-00001-pd-00002-4c-2b-19-cs-00001-pd-00002-4c-2b-19-1','2019-11-28 10:01:09',NULL,0),(152,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/19','CS-00001/PD-00002-4C-2B/19-2',0,0,0,'cs-00001-pd-00002-4c-2b-19-cs-00001-pd-00002-4c-2b-19-2','2019-11-28 10:01:09',NULL,0),(153,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/19','CS-00001/PD-00002-4C-2B/19-3',0,0,0,'cs-00001-pd-00002-4c-2b-19-cs-00001-pd-00002-4c-2b-19-3','2019-11-28 10:01:09',NULL,0),(154,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/19','CS-00001/PD-00002-4C-2B/19-4',0,0,0,'cs-00001-pd-00002-4c-2b-19-cs-00001-pd-00002-4c-2b-19-4','2019-11-28 10:01:09',NULL,0),(155,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/19','CS-00001/PD-00002-4C-2B/19-5',0,0,0,'cs-00001-pd-00002-4c-2b-19-cs-00001-pd-00002-4c-2b-19-5','2019-11-28 10:01:09',NULL,0),(156,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/20','CS-00001/PD-00002-4C-2B/20-1',0,0,0,'cs-00001-pd-00002-4c-2b-20-cs-00001-pd-00002-4c-2b-20-1','2019-11-28 10:01:09',NULL,0),(157,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/20','CS-00001/PD-00002-4C-2B/20-2',0,0,0,'cs-00001-pd-00002-4c-2b-20-cs-00001-pd-00002-4c-2b-20-2','2019-11-28 10:01:09',NULL,0),(158,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/20','CS-00001/PD-00002-4C-2B/20-3',0,0,0,'cs-00001-pd-00002-4c-2b-20-cs-00001-pd-00002-4c-2b-20-3','2019-11-28 10:01:09',NULL,0),(159,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/20','CS-00001/PD-00002-4C-2B/20-4',0,0,0,'cs-00001-pd-00002-4c-2b-20-cs-00001-pd-00002-4c-2b-20-4','2019-11-28 10:01:09',NULL,0),(160,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/20','CS-00001/PD-00002-4C-2B/20-5',0,0,0,'cs-00001-pd-00002-4c-2b-20-cs-00001-pd-00002-4c-2b-20-5','2019-11-28 10:01:09',NULL,0),(161,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/21','CS-00001/PD-00002-4C-2B/21-1',0,0,0,'cs-00001-pd-00002-4c-2b-21-cs-00001-pd-00002-4c-2b-21-1','2019-11-28 10:01:10',NULL,0),(162,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/21','CS-00001/PD-00002-4C-2B/21-2',0,0,0,'cs-00001-pd-00002-4c-2b-21-cs-00001-pd-00002-4c-2b-21-2','2019-11-28 10:01:10',NULL,0),(163,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/21','CS-00001/PD-00002-4C-2B/21-3',0,0,0,'cs-00001-pd-00002-4c-2b-21-cs-00001-pd-00002-4c-2b-21-3','2019-11-28 10:01:10',NULL,0),(164,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/21','CS-00001/PD-00002-4C-2B/21-4',0,0,0,'cs-00001-pd-00002-4c-2b-21-cs-00001-pd-00002-4c-2b-21-4','2019-11-28 10:01:10',NULL,0),(165,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/21','CS-00001/PD-00002-4C-2B/21-5',0,0,0,'cs-00001-pd-00002-4c-2b-21-cs-00001-pd-00002-4c-2b-21-5','2019-11-28 10:01:10',NULL,0),(166,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/22','CS-00001/PD-00002-4C-2B/22-1',0,0,0,'cs-00001-pd-00002-4c-2b-22-cs-00001-pd-00002-4c-2b-22-1','2019-11-28 10:01:10',NULL,0),(167,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/22','CS-00001/PD-00002-4C-2B/22-2',0,0,0,'cs-00001-pd-00002-4c-2b-22-cs-00001-pd-00002-4c-2b-22-2','2019-11-28 10:01:10',NULL,0),(168,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/22','CS-00001/PD-00002-4C-2B/22-3',0,0,0,'cs-00001-pd-00002-4c-2b-22-cs-00001-pd-00002-4c-2b-22-3','2019-11-28 10:01:10',NULL,0),(169,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/22','CS-00001/PD-00002-4C-2B/22-4',0,0,0,'cs-00001-pd-00002-4c-2b-22-cs-00001-pd-00002-4c-2b-22-4','2019-11-28 10:01:10',NULL,0),(170,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/22','CS-00001/PD-00002-4C-2B/22-5',0,0,0,'cs-00001-pd-00002-4c-2b-22-cs-00001-pd-00002-4c-2b-22-5','2019-11-28 10:01:10',NULL,0),(171,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/23','CS-00001/PD-00002-4C-2B/23-1',0,0,0,'cs-00001-pd-00002-4c-2b-23-cs-00001-pd-00002-4c-2b-23-1','2019-11-28 10:01:10',NULL,0),(172,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/23','CS-00001/PD-00002-4C-2B/23-2',0,0,0,'cs-00001-pd-00002-4c-2b-23-cs-00001-pd-00002-4c-2b-23-2','2019-11-28 10:01:10',NULL,0),(173,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/23','CS-00001/PD-00002-4C-2B/23-3',0,0,0,'cs-00001-pd-00002-4c-2b-23-cs-00001-pd-00002-4c-2b-23-3','2019-11-28 10:01:10',NULL,0),(174,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/23','CS-00001/PD-00002-4C-2B/23-4',0,0,0,'cs-00001-pd-00002-4c-2b-23-cs-00001-pd-00002-4c-2b-23-4','2019-11-28 10:01:10',NULL,0),(175,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/23','CS-00001/PD-00002-4C-2B/23-5',0,0,0,'cs-00001-pd-00002-4c-2b-23-cs-00001-pd-00002-4c-2b-23-5','2019-11-28 10:01:10',NULL,0),(176,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/24','CS-00001/PD-00002-4C-2B/24-1',0,0,0,'cs-00001-pd-00002-4c-2b-24-cs-00001-pd-00002-4c-2b-24-1','2019-11-28 10:01:10',NULL,0),(177,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/24','CS-00001/PD-00002-4C-2B/24-2',0,0,0,'cs-00001-pd-00002-4c-2b-24-cs-00001-pd-00002-4c-2b-24-2','2019-11-28 10:01:10',NULL,0),(178,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/24','CS-00001/PD-00002-4C-2B/24-3',0,0,0,'cs-00001-pd-00002-4c-2b-24-cs-00001-pd-00002-4c-2b-24-3','2019-11-28 10:01:11',NULL,0),(179,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/24','CS-00001/PD-00002-4C-2B/24-4',0,0,0,'cs-00001-pd-00002-4c-2b-24-cs-00001-pd-00002-4c-2b-24-4','2019-11-28 10:01:11',NULL,0),(180,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/24','CS-00001/PD-00002-4C-2B/24-5',0,0,0,'cs-00001-pd-00002-4c-2b-24-cs-00001-pd-00002-4c-2b-24-5','2019-11-28 10:01:11',NULL,0),(181,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/25','CS-00001/PD-00002-4C-2B/25-1',0,0,0,'cs-00001-pd-00002-4c-2b-25-cs-00001-pd-00002-4c-2b-25-1','2019-11-28 10:01:11',NULL,0),(182,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/25','CS-00001/PD-00002-4C-2B/25-2',0,0,0,'cs-00001-pd-00002-4c-2b-25-cs-00001-pd-00002-4c-2b-25-2','2019-11-28 10:01:11',NULL,0),(183,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/25','CS-00001/PD-00002-4C-2B/25-3',0,0,0,'cs-00001-pd-00002-4c-2b-25-cs-00001-pd-00002-4c-2b-25-3','2019-11-28 10:01:11',NULL,0),(184,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/25','CS-00001/PD-00002-4C-2B/25-4',0,0,0,'cs-00001-pd-00002-4c-2b-25-cs-00001-pd-00002-4c-2b-25-4','2019-11-28 10:01:11',NULL,0),(185,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/25','CS-00001/PD-00002-4C-2B/25-5',0,0,0,'cs-00001-pd-00002-4c-2b-25-cs-00001-pd-00002-4c-2b-25-5','2019-11-28 10:01:11',NULL,0),(186,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/26','CS-00001/PD-00002-4C-2B/26-1',0,0,0,'cs-00001-pd-00002-4c-2b-26-cs-00001-pd-00002-4c-2b-26-1','2019-11-28 10:01:11',NULL,0),(187,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/26','CS-00001/PD-00002-4C-2B/26-2',0,0,0,'cs-00001-pd-00002-4c-2b-26-cs-00001-pd-00002-4c-2b-26-2','2019-11-28 10:01:11',NULL,0),(188,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/26','CS-00001/PD-00002-4C-2B/26-3',0,0,0,'cs-00001-pd-00002-4c-2b-26-cs-00001-pd-00002-4c-2b-26-3','2019-11-28 10:01:11',NULL,0),(189,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/26','CS-00001/PD-00002-4C-2B/26-4',0,0,0,'cs-00001-pd-00002-4c-2b-26-cs-00001-pd-00002-4c-2b-26-4','2019-11-28 10:01:11',NULL,0),(190,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/26','CS-00001/PD-00002-4C-2B/26-5',0,0,0,'cs-00001-pd-00002-4c-2b-26-cs-00001-pd-00002-4c-2b-26-5','2019-11-28 10:01:11',NULL,0),(191,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/27','CS-00001/PD-00002-4C-2B/27-1',0,0,0,'cs-00001-pd-00002-4c-2b-27-cs-00001-pd-00002-4c-2b-27-1','2019-11-28 10:01:11',NULL,0),(192,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/27','CS-00001/PD-00002-4C-2B/27-2',0,0,0,'cs-00001-pd-00002-4c-2b-27-cs-00001-pd-00002-4c-2b-27-2','2019-11-28 10:01:12',NULL,0),(193,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/27','CS-00001/PD-00002-4C-2B/27-3',0,0,0,'cs-00001-pd-00002-4c-2b-27-cs-00001-pd-00002-4c-2b-27-3','2019-11-28 10:01:12',NULL,0),(194,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/27','CS-00001/PD-00002-4C-2B/27-4',0,0,0,'cs-00001-pd-00002-4c-2b-27-cs-00001-pd-00002-4c-2b-27-4','2019-11-28 10:01:12',NULL,0),(195,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/27','CS-00001/PD-00002-4C-2B/27-5',0,0,0,'cs-00001-pd-00002-4c-2b-27-cs-00001-pd-00002-4c-2b-27-5','2019-11-28 10:01:12',NULL,0),(196,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/28','CS-00001/PD-00002-4C-2B/28-1',0,0,0,'cs-00001-pd-00002-4c-2b-28-cs-00001-pd-00002-4c-2b-28-1','2019-11-28 10:01:12',NULL,0),(197,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/28','CS-00001/PD-00002-4C-2B/28-2',0,0,0,'cs-00001-pd-00002-4c-2b-28-cs-00001-pd-00002-4c-2b-28-2','2019-11-28 10:01:12',NULL,0),(198,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/28','CS-00001/PD-00002-4C-2B/28-3',0,0,0,'cs-00001-pd-00002-4c-2b-28-cs-00001-pd-00002-4c-2b-28-3','2019-11-28 10:01:12',NULL,0),(199,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/28','CS-00001/PD-00002-4C-2B/28-4',0,0,0,'cs-00001-pd-00002-4c-2b-28-cs-00001-pd-00002-4c-2b-28-4','2019-11-28 10:01:12',NULL,0),(200,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/28','CS-00001/PD-00002-4C-2B/28-5',0,0,0,'cs-00001-pd-00002-4c-2b-28-cs-00001-pd-00002-4c-2b-28-5','2019-11-28 10:01:12',NULL,0),(201,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/29','CS-00001/PD-00002-4C-2B/29-1',0,0,0,'cs-00001-pd-00002-4c-2b-29-cs-00001-pd-00002-4c-2b-29-1','2019-11-28 10:01:12',NULL,0),(202,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/29','CS-00001/PD-00002-4C-2B/29-2',0,0,0,'cs-00001-pd-00002-4c-2b-29-cs-00001-pd-00002-4c-2b-29-2','2019-11-28 10:01:12',NULL,0),(203,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/29','CS-00001/PD-00002-4C-2B/29-3',0,0,0,'cs-00001-pd-00002-4c-2b-29-cs-00001-pd-00002-4c-2b-29-3','2019-11-28 10:01:12',NULL,0),(204,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/29','CS-00001/PD-00002-4C-2B/29-4',0,0,0,'cs-00001-pd-00002-4c-2b-29-cs-00001-pd-00002-4c-2b-29-4','2019-11-28 10:01:12',NULL,0),(205,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/29','CS-00001/PD-00002-4C-2B/29-5',0,0,0,'cs-00001-pd-00002-4c-2b-29-cs-00001-pd-00002-4c-2b-29-5','2019-11-28 10:01:12',NULL,0),(206,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/30','CS-00001/PD-00002-4C-2B/30-1',0,0,0,'cs-00001-pd-00002-4c-2b-30-cs-00001-pd-00002-4c-2b-30-1','2019-11-28 10:01:12',NULL,0),(207,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/30','CS-00001/PD-00002-4C-2B/30-2',0,0,0,'cs-00001-pd-00002-4c-2b-30-cs-00001-pd-00002-4c-2b-30-2','2019-11-28 10:01:13',NULL,0),(208,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/30','CS-00001/PD-00002-4C-2B/30-3',0,0,0,'cs-00001-pd-00002-4c-2b-30-cs-00001-pd-00002-4c-2b-30-3','2019-11-28 10:01:13',NULL,0),(209,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/30','CS-00001/PD-00002-4C-2B/30-4',0,0,0,'cs-00001-pd-00002-4c-2b-30-cs-00001-pd-00002-4c-2b-30-4','2019-11-28 10:01:13',NULL,0),(210,2,NULL,NULL,'CS-00001/PD-00002-4C-2B/30','CS-00001/PD-00002-4C-2B/30-5',0,0,0,'cs-00001-pd-00002-4c-2b-30-cs-00001-pd-00002-4c-2b-30-5','2019-11-28 10:01:13',NULL,0),(211,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-1',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-1','2019-12-14 16:15:59',NULL,0),(212,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-2',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-2','2019-12-14 16:15:59',NULL,0),(213,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-3',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-3','2019-12-14 16:15:59',NULL,0),(214,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-4',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-4','2019-12-14 16:15:59',NULL,0),(215,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-5',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-5','2019-12-14 16:15:59',NULL,0),(216,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-1',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-1','2019-12-14 16:15:59',NULL,0),(217,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-2',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-2','2019-12-14 16:16:00',NULL,0),(218,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-3',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-3','2019-12-14 16:16:00',NULL,0),(219,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-4',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-4','2019-12-14 16:16:00',NULL,0),(220,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-5',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-5','2019-12-14 16:16:00',NULL,0),(221,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-1',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-1','2019-12-14 16:16:00',NULL,0),(222,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-2',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-2','2019-12-14 16:16:00',NULL,0),(223,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-3',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-3','2019-12-14 16:16:00',NULL,0),(224,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-4',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-4','2019-12-14 16:16:00',NULL,0),(225,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-5',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-5','2019-12-14 16:16:00',NULL,0),(226,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-1',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-1','2019-12-14 16:16:00',NULL,0),(227,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-2',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-2','2019-12-14 16:16:00',NULL,0),(228,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-3',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-3','2019-12-14 16:16:00',NULL,0),(229,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-4',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-4','2019-12-14 16:16:00',NULL,0),(230,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-5',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-5','2019-12-14 16:16:00',NULL,0),(231,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-1',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-1','2019-12-14 16:16:00',NULL,0),(232,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-2',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-2','2019-12-14 16:16:00',NULL,0),(233,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-3',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-3','2019-12-14 16:16:00',NULL,0),(234,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-4',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-4','2019-12-14 16:16:00',NULL,0),(235,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-5',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-5','2019-12-14 16:16:00',NULL,0),(236,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-1',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-1','2019-12-14 16:16:00',NULL,0),(237,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-2',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-2','2019-12-14 16:16:00',NULL,0),(238,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-3',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-3','2019-12-14 16:16:00',NULL,0),(239,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-4',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-4','2019-12-14 16:16:00',NULL,0),(240,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-5',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-5','2019-12-14 16:16:01',NULL,0),(241,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-1',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-1','2019-12-14 16:16:01',NULL,0),(242,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-2',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-2','2019-12-14 16:16:01',NULL,0),(243,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-3',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-3','2019-12-14 16:16:01',NULL,0),(244,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-4',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-4','2019-12-14 16:16:01',NULL,0),(245,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-5',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-5','2019-12-14 16:16:01',NULL,0),(246,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-1',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-1','2019-12-14 16:16:01',NULL,0),(247,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-2',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-2','2019-12-14 16:16:01',NULL,0),(248,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-3',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-3','2019-12-14 16:16:01',NULL,0),(249,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-4',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-4','2019-12-14 16:16:01',NULL,0),(250,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-5',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-5','2019-12-14 16:16:01',NULL,0),(251,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-1',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-1-1','2019-12-14 16:16:14',NULL,0),(252,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-2',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-2-1','2019-12-14 16:16:14',NULL,0),(253,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-3',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-3-1','2019-12-14 16:16:14',NULL,0),(254,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-4',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-4-1','2019-12-14 16:16:14',NULL,0),(255,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/1','CS-00003/PD-00001-5C-2B/1-5',0,0,0,'cs-00003-pd-00001-5c-2b-1-cs-00003-pd-00001-5c-2b-1-5-1','2019-12-14 16:16:14',NULL,0),(256,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-1',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-1-1','2019-12-14 16:16:15',NULL,0),(257,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-2',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-2-1','2019-12-14 16:16:15',NULL,0),(258,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-3',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-3-1','2019-12-14 16:16:15',NULL,0),(259,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-4',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-4-1','2019-12-14 16:16:15',NULL,0),(260,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/2','CS-00003/PD-00001-5C-2B/2-5',0,0,0,'cs-00003-pd-00001-5c-2b-2-cs-00003-pd-00001-5c-2b-2-5-1','2019-12-14 16:16:15',NULL,0),(261,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-1',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-1-1','2019-12-14 16:16:15',NULL,0),(262,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-2',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-2-1','2019-12-14 16:16:15',NULL,0),(263,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-3',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-3-1','2019-12-14 16:16:15',NULL,0),(264,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-4',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-4-1','2019-12-14 16:16:15',NULL,0),(265,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/3','CS-00003/PD-00001-5C-2B/3-5',0,0,0,'cs-00003-pd-00001-5c-2b-3-cs-00003-pd-00001-5c-2b-3-5-1','2019-12-14 16:16:15',NULL,0),(266,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-1',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-1-1','2019-12-14 16:16:15',NULL,0),(267,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-2',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-2-1','2019-12-14 16:16:15',NULL,0),(268,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-3',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-3-1','2019-12-14 16:16:15',NULL,0),(269,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-4',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-4-1','2019-12-14 16:16:15',NULL,0),(270,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/4','CS-00003/PD-00001-5C-2B/4-5',0,0,0,'cs-00003-pd-00001-5c-2b-4-cs-00003-pd-00001-5c-2b-4-5-1','2019-12-14 16:16:15',NULL,0),(271,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-1',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-1-1','2019-12-14 16:16:15',NULL,0),(272,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-2',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-2-1','2019-12-14 16:16:15',NULL,0),(273,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-3',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-3-1','2019-12-14 16:16:15',NULL,0),(274,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-4',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-4-1','2019-12-14 16:16:16',NULL,0),(275,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/5','CS-00003/PD-00001-5C-2B/5-5',0,0,0,'cs-00003-pd-00001-5c-2b-5-cs-00003-pd-00001-5c-2b-5-5-1','2019-12-14 16:16:16',NULL,0),(276,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-1',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-1-1','2019-12-14 16:16:16',NULL,0),(277,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-2',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-2-1','2019-12-14 16:16:16',NULL,0),(278,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-3',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-3-1','2019-12-14 16:16:16',NULL,0),(279,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-4',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-4-1','2019-12-14 16:16:16',NULL,0),(280,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/6','CS-00003/PD-00001-5C-2B/6-5',0,0,0,'cs-00003-pd-00001-5c-2b-6-cs-00003-pd-00001-5c-2b-6-5-1','2019-12-14 16:16:16',NULL,0),(281,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-1',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-1-1','2019-12-14 16:16:16',NULL,0),(282,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-2',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-2-1','2019-12-14 16:16:16',NULL,0),(283,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-3',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-3-1','2019-12-14 16:16:16',NULL,0),(284,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-4',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-4-1','2019-12-14 16:16:16',NULL,0),(285,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/7','CS-00003/PD-00001-5C-2B/7-5',0,0,0,'cs-00003-pd-00001-5c-2b-7-cs-00003-pd-00001-5c-2b-7-5-1','2019-12-14 16:16:16',NULL,0),(286,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-1',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-1-1','2019-12-14 16:16:16',NULL,0),(287,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-2',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-2-1','2019-12-14 16:16:16',NULL,0),(288,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-3',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-3-1','2019-12-14 16:16:16',NULL,0),(289,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-4',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-4-1','2019-12-14 16:16:16',NULL,0),(290,5,NULL,NULL,'CS-00003/PD-00001-5C-2B/8','CS-00003/PD-00001-5C-2B/8-5',0,0,0,'cs-00003-pd-00001-5c-2b-8-cs-00003-pd-00001-5c-2b-8-5-1','2019-12-14 16:16:16',NULL,0),(291,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-1',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-1','2019-12-14 16:18:43',NULL,0),(292,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-2',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-2','2019-12-14 16:18:44',NULL,0),(293,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-3',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-3','2019-12-14 16:18:44',NULL,0),(294,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-4',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-4','2019-12-14 16:18:44',NULL,0),(295,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-5',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-5','2019-12-14 16:18:44',NULL,0),(296,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-1',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-1','2019-12-14 16:18:44',NULL,0),(297,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-2',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-2','2019-12-14 16:18:44',NULL,0),(298,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-3',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-3','2019-12-14 16:18:44',NULL,0),(299,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-4',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-4','2019-12-14 16:18:44',NULL,0),(300,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-5',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-5','2019-12-14 16:18:44',NULL,0),(301,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-1',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-1','2019-12-14 16:18:44',NULL,0),(302,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-2',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-2','2019-12-14 16:18:44',NULL,0),(303,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-3',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-3','2019-12-14 16:18:44',NULL,0),(304,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-4',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-4','2019-12-14 16:18:44',NULL,0),(305,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-5',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-5','2019-12-14 16:18:44',NULL,0),(306,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-1',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-1','2019-12-14 16:18:44',NULL,0),(307,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-2',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-2','2019-12-14 16:18:44',NULL,0),(308,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-3',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-3','2019-12-14 16:18:45',NULL,0),(309,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-4',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-4','2019-12-14 16:18:45',NULL,0),(310,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-5',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-5','2019-12-14 16:18:45',NULL,0),(311,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-1',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-1-1','2019-12-14 16:19:11',NULL,0),(312,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-2',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-2-1','2019-12-14 16:19:12',NULL,0),(313,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-3',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-3-1','2019-12-14 16:19:12',NULL,0),(314,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-4',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-4-1','2019-12-14 16:19:12',NULL,0),(315,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/1','CS-00004/PD-00001-5C-2B/1-5',0,0,0,'cs-00004-pd-00001-5c-2b-1-cs-00004-pd-00001-5c-2b-1-5-1','2019-12-14 16:19:12',NULL,0),(316,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-1',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-1-1','2019-12-14 16:19:12',NULL,0),(317,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-2',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-2-1','2019-12-14 16:19:12',NULL,0),(318,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-3',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-3-1','2019-12-14 16:19:12',NULL,0),(319,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-4',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-4-1','2019-12-14 16:19:12',NULL,0),(320,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/2','CS-00004/PD-00001-5C-2B/2-5',0,0,0,'cs-00004-pd-00001-5c-2b-2-cs-00004-pd-00001-5c-2b-2-5-1','2019-12-14 16:19:12',NULL,0),(321,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-1',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-1-1','2019-12-14 16:19:12',NULL,0),(322,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-2',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-2-1','2019-12-14 16:19:12',NULL,0),(323,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-3',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-3-1','2019-12-14 16:19:12',NULL,0),(324,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-4',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-4-1','2019-12-14 16:19:12',NULL,0),(325,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/3','CS-00004/PD-00001-5C-2B/3-5',0,0,0,'cs-00004-pd-00001-5c-2b-3-cs-00004-pd-00001-5c-2b-3-5-1','2019-12-14 16:19:12',NULL,0),(326,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-1',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-1-1','2019-12-14 16:19:12',NULL,0),(327,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-2',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-2-1','2019-12-14 16:19:12',NULL,0),(328,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-3',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-3-1','2019-12-14 16:19:12',NULL,0),(329,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-4',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-4-1','2019-12-14 16:19:12',NULL,0),(330,6,NULL,NULL,'CS-00004/PD-00001-5C-2B/4','CS-00004/PD-00001-5C-2B/4-5',0,0,0,'cs-00004-pd-00001-5c-2b-4-cs-00004-pd-00001-5c-2b-4-5-1','2019-12-14 16:19:12',NULL,0),(331,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/1','CS-00005/PD-00001-5C-2B/1-1',0,0,0,'cs-00005-pd-00001-5c-2b-1-cs-00005-pd-00001-5c-2b-1-1','2019-12-14 16:35:07',NULL,0),(332,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/1','CS-00005/PD-00001-5C-2B/1-2',0,0,0,'cs-00005-pd-00001-5c-2b-1-cs-00005-pd-00001-5c-2b-1-2','2019-12-14 16:35:07',NULL,0),(333,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/1','CS-00005/PD-00001-5C-2B/1-3',0,0,0,'cs-00005-pd-00001-5c-2b-1-cs-00005-pd-00001-5c-2b-1-3','2019-12-14 16:35:07',NULL,0),(334,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/1','CS-00005/PD-00001-5C-2B/1-4',0,0,0,'cs-00005-pd-00001-5c-2b-1-cs-00005-pd-00001-5c-2b-1-4','2019-12-14 16:35:07',NULL,0),(335,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/1','CS-00005/PD-00001-5C-2B/1-5',0,0,0,'cs-00005-pd-00001-5c-2b-1-cs-00005-pd-00001-5c-2b-1-5','2019-12-14 16:35:07',NULL,0),(336,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/2','CS-00005/PD-00001-5C-2B/2-1',0,0,0,'cs-00005-pd-00001-5c-2b-2-cs-00005-pd-00001-5c-2b-2-1','2019-12-14 16:35:07',NULL,0),(337,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/2','CS-00005/PD-00001-5C-2B/2-2',0,0,0,'cs-00005-pd-00001-5c-2b-2-cs-00005-pd-00001-5c-2b-2-2','2019-12-14 16:35:07',NULL,0),(338,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/2','CS-00005/PD-00001-5C-2B/2-3',0,0,0,'cs-00005-pd-00001-5c-2b-2-cs-00005-pd-00001-5c-2b-2-3','2019-12-14 16:35:07',NULL,0),(339,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/2','CS-00005/PD-00001-5C-2B/2-4',0,0,0,'cs-00005-pd-00001-5c-2b-2-cs-00005-pd-00001-5c-2b-2-4','2019-12-14 16:35:07',NULL,0),(340,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/2','CS-00005/PD-00001-5C-2B/2-5',0,0,0,'cs-00005-pd-00001-5c-2b-2-cs-00005-pd-00001-5c-2b-2-5','2019-12-14 16:35:07',NULL,0),(341,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/3','CS-00005/PD-00001-5C-2B/3-1',0,0,0,'cs-00005-pd-00001-5c-2b-3-cs-00005-pd-00001-5c-2b-3-1','2019-12-14 16:35:07',NULL,0),(342,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/3','CS-00005/PD-00001-5C-2B/3-2',0,0,0,'cs-00005-pd-00001-5c-2b-3-cs-00005-pd-00001-5c-2b-3-2','2019-12-14 16:35:07',NULL,0),(343,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/3','CS-00005/PD-00001-5C-2B/3-3',0,0,0,'cs-00005-pd-00001-5c-2b-3-cs-00005-pd-00001-5c-2b-3-3','2019-12-14 16:35:07',NULL,0),(344,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/3','CS-00005/PD-00001-5C-2B/3-4',0,0,0,'cs-00005-pd-00001-5c-2b-3-cs-00005-pd-00001-5c-2b-3-4','2019-12-14 16:35:07',NULL,0),(345,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/3','CS-00005/PD-00001-5C-2B/3-5',0,0,0,'cs-00005-pd-00001-5c-2b-3-cs-00005-pd-00001-5c-2b-3-5','2019-12-14 16:35:08',NULL,0),(346,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/4','CS-00005/PD-00001-5C-2B/4-1',0,0,0,'cs-00005-pd-00001-5c-2b-4-cs-00005-pd-00001-5c-2b-4-1','2019-12-14 16:35:08',NULL,0),(347,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/4','CS-00005/PD-00001-5C-2B/4-2',0,0,0,'cs-00005-pd-00001-5c-2b-4-cs-00005-pd-00001-5c-2b-4-2','2019-12-14 16:35:08',NULL,0),(348,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/4','CS-00005/PD-00001-5C-2B/4-3',0,0,0,'cs-00005-pd-00001-5c-2b-4-cs-00005-pd-00001-5c-2b-4-3','2019-12-14 16:35:08',NULL,0),(349,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/4','CS-00005/PD-00001-5C-2B/4-4',0,0,0,'cs-00005-pd-00001-5c-2b-4-cs-00005-pd-00001-5c-2b-4-4','2019-12-14 16:35:08',NULL,0),(350,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/4','CS-00005/PD-00001-5C-2B/4-5',0,0,0,'cs-00005-pd-00001-5c-2b-4-cs-00005-pd-00001-5c-2b-4-5','2019-12-14 16:35:08',NULL,0),(351,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/5','CS-00005/PD-00001-5C-2B/5-1',0,0,0,'cs-00005-pd-00001-5c-2b-5-cs-00005-pd-00001-5c-2b-5-1','2019-12-14 16:35:08',NULL,0),(352,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/5','CS-00005/PD-00001-5C-2B/5-2',0,0,0,'cs-00005-pd-00001-5c-2b-5-cs-00005-pd-00001-5c-2b-5-2','2019-12-14 16:35:08',NULL,0),(353,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/5','CS-00005/PD-00001-5C-2B/5-3',0,0,0,'cs-00005-pd-00001-5c-2b-5-cs-00005-pd-00001-5c-2b-5-3','2019-12-14 16:35:08',NULL,0),(354,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/5','CS-00005/PD-00001-5C-2B/5-4',0,0,0,'cs-00005-pd-00001-5c-2b-5-cs-00005-pd-00001-5c-2b-5-4','2019-12-14 16:35:08',NULL,0),(355,7,NULL,NULL,'CS-00005/PD-00001-5C-2B/5','CS-00005/PD-00001-5C-2B/5-5',0,0,0,'cs-00005-pd-00001-5c-2b-5-cs-00005-pd-00001-5c-2b-5-5','2019-12-14 16:35:08',NULL,0),(356,8,NULL,NULL,'CS-00006/PD-00001-5C-2B/1','CS-00006/PD-00001-5C-2B/1-1',0,0,0,'cs-00006-pd-00001-5c-2b-1-cs-00006-pd-00001-5c-2b-1-1','2019-12-14 16:40:32',NULL,0),(357,8,NULL,NULL,'CS-00006/PD-00001-5C-2B/1','CS-00006/PD-00001-5C-2B/1-2',0,0,0,'cs-00006-pd-00001-5c-2b-1-cs-00006-pd-00001-5c-2b-1-2','2019-12-14 16:40:32',NULL,0),(358,8,NULL,NULL,'CS-00006/PD-00001-5C-2B/1','CS-00006/PD-00001-5C-2B/1-3',0,0,0,'cs-00006-pd-00001-5c-2b-1-cs-00006-pd-00001-5c-2b-1-3','2019-12-14 16:40:32',NULL,0),(359,8,NULL,NULL,'CS-00006/PD-00001-5C-2B/1','CS-00006/PD-00001-5C-2B/1-4',0,0,0,'cs-00006-pd-00001-5c-2b-1-cs-00006-pd-00001-5c-2b-1-4','2019-12-14 16:40:32',NULL,0),(360,8,NULL,NULL,'CS-00006/PD-00001-5C-2B/1','CS-00006/PD-00001-5C-2B/1-5',0,0,0,'cs-00006-pd-00001-5c-2b-1-cs-00006-pd-00001-5c-2b-1-5','2019-12-14 16:40:32',NULL,0),(361,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/1','CS-00006/PD-00002-5C-4B/1-1',0,0,0,'cs-00006-pd-00002-5c-4b-1-cs-00006-pd-00002-5c-4b-1-1','2019-12-14 16:40:32',NULL,0),(362,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/1','CS-00006/PD-00002-5C-4B/1-2',0,0,0,'cs-00006-pd-00002-5c-4b-1-cs-00006-pd-00002-5c-4b-1-2','2019-12-14 16:40:32',NULL,0),(363,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/1','CS-00006/PD-00002-5C-4B/1-3',0,0,0,'cs-00006-pd-00002-5c-4b-1-cs-00006-pd-00002-5c-4b-1-3','2019-12-14 16:40:32',NULL,0),(364,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/1','CS-00006/PD-00002-5C-4B/1-4',0,0,0,'cs-00006-pd-00002-5c-4b-1-cs-00006-pd-00002-5c-4b-1-4','2019-12-14 16:40:32',NULL,0),(365,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/1','CS-00006/PD-00002-5C-4B/1-5',0,0,0,'cs-00006-pd-00002-5c-4b-1-cs-00006-pd-00002-5c-4b-1-5','2019-12-14 16:40:32',NULL,0),(366,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/2','CS-00006/PD-00002-5C-4B/2-1',0,0,0,'cs-00006-pd-00002-5c-4b-2-cs-00006-pd-00002-5c-4b-2-1','2019-12-14 16:40:32',NULL,0),(367,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/2','CS-00006/PD-00002-5C-4B/2-2',0,0,0,'cs-00006-pd-00002-5c-4b-2-cs-00006-pd-00002-5c-4b-2-2','2019-12-14 16:40:32',NULL,0),(368,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/2','CS-00006/PD-00002-5C-4B/2-3',0,0,0,'cs-00006-pd-00002-5c-4b-2-cs-00006-pd-00002-5c-4b-2-3','2019-12-14 16:40:32',NULL,0),(369,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/2','CS-00006/PD-00002-5C-4B/2-4',0,0,0,'cs-00006-pd-00002-5c-4b-2-cs-00006-pd-00002-5c-4b-2-4','2019-12-14 16:40:32',NULL,0),(370,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/2','CS-00006/PD-00002-5C-4B/2-5',0,0,0,'cs-00006-pd-00002-5c-4b-2-cs-00006-pd-00002-5c-4b-2-5','2019-12-14 16:40:32',NULL,0),(371,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/3','CS-00006/PD-00002-5C-4B/3-1',0,0,0,'cs-00006-pd-00002-5c-4b-3-cs-00006-pd-00002-5c-4b-3-1','2019-12-14 16:40:32',NULL,0),(372,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/3','CS-00006/PD-00002-5C-4B/3-2',0,0,0,'cs-00006-pd-00002-5c-4b-3-cs-00006-pd-00002-5c-4b-3-2','2019-12-14 16:40:32',NULL,0),(373,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/3','CS-00006/PD-00002-5C-4B/3-3',0,0,0,'cs-00006-pd-00002-5c-4b-3-cs-00006-pd-00002-5c-4b-3-3','2019-12-14 16:40:32',NULL,0),(374,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/3','CS-00006/PD-00002-5C-4B/3-4',0,0,0,'cs-00006-pd-00002-5c-4b-3-cs-00006-pd-00002-5c-4b-3-4','2019-12-14 16:40:32',NULL,0),(375,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/3','CS-00006/PD-00002-5C-4B/3-5',0,0,0,'cs-00006-pd-00002-5c-4b-3-cs-00006-pd-00002-5c-4b-3-5','2019-12-14 16:40:32',NULL,0),(376,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/4','CS-00006/PD-00002-5C-4B/4-1',0,0,0,'cs-00006-pd-00002-5c-4b-4-cs-00006-pd-00002-5c-4b-4-1','2019-12-14 16:40:32',NULL,0),(377,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/4','CS-00006/PD-00002-5C-4B/4-2',0,0,0,'cs-00006-pd-00002-5c-4b-4-cs-00006-pd-00002-5c-4b-4-2','2019-12-14 16:40:32',NULL,0),(378,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/4','CS-00006/PD-00002-5C-4B/4-3',0,0,0,'cs-00006-pd-00002-5c-4b-4-cs-00006-pd-00002-5c-4b-4-3','2019-12-14 16:40:32',NULL,0),(379,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/4','CS-00006/PD-00002-5C-4B/4-4',0,0,0,'cs-00006-pd-00002-5c-4b-4-cs-00006-pd-00002-5c-4b-4-4','2019-12-14 16:40:32',NULL,0),(380,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/4','CS-00006/PD-00002-5C-4B/4-5',0,0,0,'cs-00006-pd-00002-5c-4b-4-cs-00006-pd-00002-5c-4b-4-5','2019-12-14 16:40:32',NULL,0),(381,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/5','CS-00006/PD-00002-5C-4B/5-1',0,0,0,'cs-00006-pd-00002-5c-4b-5-cs-00006-pd-00002-5c-4b-5-1','2019-12-14 16:40:33',NULL,0),(382,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/5','CS-00006/PD-00002-5C-4B/5-2',0,0,0,'cs-00006-pd-00002-5c-4b-5-cs-00006-pd-00002-5c-4b-5-2','2019-12-14 16:40:33',NULL,0),(383,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/5','CS-00006/PD-00002-5C-4B/5-3',0,0,0,'cs-00006-pd-00002-5c-4b-5-cs-00006-pd-00002-5c-4b-5-3','2019-12-14 16:40:33',NULL,0),(384,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/5','CS-00006/PD-00002-5C-4B/5-4',0,0,0,'cs-00006-pd-00002-5c-4b-5-cs-00006-pd-00002-5c-4b-5-4','2019-12-14 16:40:33',NULL,0),(385,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/5','CS-00006/PD-00002-5C-4B/5-5',0,0,0,'cs-00006-pd-00002-5c-4b-5-cs-00006-pd-00002-5c-4b-5-5','2019-12-14 16:40:33',NULL,0),(386,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/6','CS-00006/PD-00002-5C-4B/6-1',0,0,0,'cs-00006-pd-00002-5c-4b-6-cs-00006-pd-00002-5c-4b-6-1','2019-12-14 16:40:33',NULL,0),(387,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/6','CS-00006/PD-00002-5C-4B/6-2',0,0,0,'cs-00006-pd-00002-5c-4b-6-cs-00006-pd-00002-5c-4b-6-2','2019-12-14 16:40:33',NULL,0),(388,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/6','CS-00006/PD-00002-5C-4B/6-3',0,0,0,'cs-00006-pd-00002-5c-4b-6-cs-00006-pd-00002-5c-4b-6-3','2019-12-14 16:40:33',NULL,0),(389,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/6','CS-00006/PD-00002-5C-4B/6-4',0,0,0,'cs-00006-pd-00002-5c-4b-6-cs-00006-pd-00002-5c-4b-6-4','2019-12-14 16:40:33',NULL,0),(390,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/6','CS-00006/PD-00002-5C-4B/6-5',0,0,0,'cs-00006-pd-00002-5c-4b-6-cs-00006-pd-00002-5c-4b-6-5','2019-12-14 16:40:33',NULL,0),(391,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/7','CS-00006/PD-00002-5C-4B/7-1',0,0,0,'cs-00006-pd-00002-5c-4b-7-cs-00006-pd-00002-5c-4b-7-1','2019-12-14 16:40:33',NULL,0),(392,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/7','CS-00006/PD-00002-5C-4B/7-2',0,0,0,'cs-00006-pd-00002-5c-4b-7-cs-00006-pd-00002-5c-4b-7-2','2019-12-14 16:40:33',NULL,0),(393,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/7','CS-00006/PD-00002-5C-4B/7-3',0,0,0,'cs-00006-pd-00002-5c-4b-7-cs-00006-pd-00002-5c-4b-7-3','2019-12-14 16:40:33',NULL,0),(394,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/7','CS-00006/PD-00002-5C-4B/7-4',0,0,0,'cs-00006-pd-00002-5c-4b-7-cs-00006-pd-00002-5c-4b-7-4','2019-12-14 16:40:33',NULL,0),(395,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/7','CS-00006/PD-00002-5C-4B/7-5',0,0,0,'cs-00006-pd-00002-5c-4b-7-cs-00006-pd-00002-5c-4b-7-5','2019-12-14 16:40:33',NULL,0),(396,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/8','CS-00006/PD-00002-5C-4B/8-1',0,0,0,'cs-00006-pd-00002-5c-4b-8-cs-00006-pd-00002-5c-4b-8-1','2019-12-14 16:40:33',NULL,0),(397,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/8','CS-00006/PD-00002-5C-4B/8-2',0,0,0,'cs-00006-pd-00002-5c-4b-8-cs-00006-pd-00002-5c-4b-8-2','2019-12-14 16:40:33',NULL,0),(398,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/8','CS-00006/PD-00002-5C-4B/8-3',0,0,0,'cs-00006-pd-00002-5c-4b-8-cs-00006-pd-00002-5c-4b-8-3','2019-12-14 16:40:33',NULL,0),(399,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/8','CS-00006/PD-00002-5C-4B/8-4',0,0,0,'cs-00006-pd-00002-5c-4b-8-cs-00006-pd-00002-5c-4b-8-4','2019-12-14 16:40:33',NULL,0),(400,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/8','CS-00006/PD-00002-5C-4B/8-5',0,0,0,'cs-00006-pd-00002-5c-4b-8-cs-00006-pd-00002-5c-4b-8-5','2019-12-14 16:40:33',NULL,0),(401,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/9','CS-00006/PD-00002-5C-4B/9-1',0,0,0,'cs-00006-pd-00002-5c-4b-9-cs-00006-pd-00002-5c-4b-9-1','2019-12-14 16:40:33',NULL,0),(402,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/9','CS-00006/PD-00002-5C-4B/9-2',0,0,0,'cs-00006-pd-00002-5c-4b-9-cs-00006-pd-00002-5c-4b-9-2','2019-12-14 16:40:33',NULL,0),(403,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/9','CS-00006/PD-00002-5C-4B/9-3',0,0,0,'cs-00006-pd-00002-5c-4b-9-cs-00006-pd-00002-5c-4b-9-3','2019-12-14 16:40:33',NULL,0),(404,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/9','CS-00006/PD-00002-5C-4B/9-4',0,0,0,'cs-00006-pd-00002-5c-4b-9-cs-00006-pd-00002-5c-4b-9-4','2019-12-14 16:40:33',NULL,0),(405,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/9','CS-00006/PD-00002-5C-4B/9-5',0,0,0,'cs-00006-pd-00002-5c-4b-9-cs-00006-pd-00002-5c-4b-9-5','2019-12-14 16:40:33',NULL,0),(406,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/10','CS-00006/PD-00002-5C-4B/10-1',0,0,0,'cs-00006-pd-00002-5c-4b-10-cs-00006-pd-00002-5c-4b-10-1','2019-12-14 16:40:33',NULL,0),(407,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/10','CS-00006/PD-00002-5C-4B/10-2',0,0,0,'cs-00006-pd-00002-5c-4b-10-cs-00006-pd-00002-5c-4b-10-2','2019-12-14 16:40:33',NULL,0),(408,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/10','CS-00006/PD-00002-5C-4B/10-3',0,0,0,'cs-00006-pd-00002-5c-4b-10-cs-00006-pd-00002-5c-4b-10-3','2019-12-14 16:40:34',NULL,0),(409,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/10','CS-00006/PD-00002-5C-4B/10-4',0,0,0,'cs-00006-pd-00002-5c-4b-10-cs-00006-pd-00002-5c-4b-10-4','2019-12-14 16:40:34',NULL,0),(410,9,NULL,NULL,'CS-00006/PD-00002-5C-4B/10','CS-00006/PD-00002-5C-4B/10-5',0,0,0,'cs-00006-pd-00002-5c-4b-10-cs-00006-pd-00002-5c-4b-10-5','2019-12-14 16:40:34',NULL,0);
/*!40000 ALTER TABLE `stockshowroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifcategorieclt`
--

DROP TABLE IF EXISTS `tarifcategorieclt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarifcategorieclt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `bornesupperieur` int(11) DEFAULT NULL,
  `observation` longtext COLLATE utf8mb4_unicode_ci,
  `borneinferieure` int(11) DEFAULT NULL,
  `litre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E1ACC357BCF5E72D` (`categorie_id`),
  KEY `IDX_E1ACC357F347EFB` (`produit_id`),
  KEY `IDX_E1ACC357B03A8386` (`created_by_id`),
  KEY `IDX_E1ACC357DD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_E1ACC357B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_E1ACC357BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_E1ACC357DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_E1ACC357F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifcategorieclt`
--

LOCK TABLES `tarifcategorieclt` WRITE;
/*!40000 ALTER TABLE `tarifcategorieclt` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifcategorieclt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `sexe` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plain_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `groups` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `roles` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `showroom_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D649B03A8386` (`created_by_id`),
  KEY `IDX_8D93D649DD7B2EBC` (`edited_by_id`),
  KEY `IDX_8D93D6492243B88B` (`showroom_id`),
  CONSTRAINT `FK_8D93D6492243B88B` FOREIGN KEY (`showroom_id`) REFERENCES `showroom` (`id`),
  CONSTRAINT `FK_8D93D649B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_8D93D649DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Audrey','Audrey',NULL,'audrey-audrey',NULL,NULL,'M','audrey',NULL,'audeslo@live.fr',NULL,NULL,NULL,'$2y$13$wpTtN13nSBTv1uThOtsRVONsVI1JD1Gy99FDhYvk5fgHiMiTER302',NULL,NULL,NULL,NULL,'a:0:{}','a:2:{i:0;s:9:\"ROLE_USER\";i:1;s:10:\"ROLE_ADMIN\";}','2019-08-27 13:09:54',NULL,NULL),(2,'daniel','daniel',NULL,'daniel-daniel',1,NULL,'M','daniel',NULL,'daniel@yahoo.fr',NULL,NULL,NULL,'$2y$13$hD3KC2.qom4m275kE7eSXefdpfrhAVteZNgVFCmaUB9jZsScIftUO',NULL,NULL,NULL,NULL,'a:0:{}','a:1:{i:0;s:9:\"ROLE_USER\";}','2019-12-11 22:22:30',NULL,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vente_stock`
--

DROP TABLE IF EXISTS `vente_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vente_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venteshowroom_id` int(11) NOT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `contenant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `bidon` int(11) NOT NULL,
  `carton` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F275B29D5CBB404` (`venteshowroom_id`),
  KEY `IDX_5F275B29F347EFB` (`produit_id`),
  KEY `IDX_5F275B29B03A8386` (`created_by_id`),
  CONSTRAINT `FK_5F275B29B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_5F275B29D5CBB404` FOREIGN KEY (`venteshowroom_id`) REFERENCES `venteshowroom` (`id`),
  CONSTRAINT `FK_5F275B29F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vente_stock`
--

LOCK TABLES `vente_stock` WRITE;
/*!40000 ALTER TABLE `vente_stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `vente_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venteshowroom`
--

DROP TABLE IF EXISTS `venteshowroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venteshowroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edited_by_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `produit_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datevente` date NOT NULL,
  `quantitecarton` int(11) NOT NULL,
  `capacitebidon` int(11) NOT NULL,
  `quantiteachete` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `payer` smallint(6) DEFAULT NULL,
  `grosdetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modereglement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_356D39D2DD7B2EBC` (`edited_by_id`),
  KEY `IDX_356D39D2B03A8386` (`created_by_id`),
  KEY `IDX_356D39D2F347EFB` (`produit_id`),
  KEY `IDX_356D39D219EB6921` (`client_id`),
  CONSTRAINT `FK_356D39D219EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_356D39D2B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_356D39D2DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_356D39D2F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venteshowroom`
--

LOCK TABLES `venteshowroom` WRITE;
/*!40000 ALTER TABLE `venteshowroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `venteshowroom` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-30 16:21:48
