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
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecommande` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_on` datetime NOT NULL,
  `etat` smallint(6) NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67D670C757F` (`fournisseur_id`),
  KEY `IDX_6EEAA67DB03A8386` (`created_by_id`),
  KEY `IDX_6EEAA67DDD7B2EBC` (`edited_by_id`),
  CONSTRAINT `FK_6EEAA67D670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`),
  CONSTRAINT `FK_6EEAA67DB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_6EEAA67DDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (1,1,1,NULL,'CD-00001','nouveau test','2020-01-09','RAS','2020-01-09 18:23:46',2,NULL,'nouveau-test'),(2,1,1,NULL,'CD-00002','TEST2','2020-01-09','Salut','2020-01-09 18:24:17',2,NULL,'test2');
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
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `capacite_id` int(11) DEFAULT NULL,
  `quantitecommandee` int(11) NOT NULL,
  `capacitebidon` int(11) DEFAULT NULL,
  `capacitecarton` int(11) DEFAULT NULL,
  `quantiteenstock` int(11) NOT NULL,
  `etat` smallint(6) NOT NULL,
  `sousreference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42D318BAF347EFB` (`produit_id`),
  KEY `IDX_42D318BA82EA2E54` (`commande_id`),
  KEY `IDX_42D318BAB03A8386` (`created_by_id`),
  KEY `IDX_42D318BADD7B2EBC` (`edited_by_id`),
  KEY `IDX_42D318BA7C79189D` (`capacite_id`),
  CONSTRAINT `FK_42D318BA7C79189D` FOREIGN KEY (`capacite_id`) REFERENCES `capacite` (`id`),
  CONSTRAINT `FK_42D318BA82EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  CONSTRAINT `FK_42D318BAB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_42D318BADD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_42D318BAF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commander`
--

LOCK TABLES `commander` WRITE;
/*!40000 ALTER TABLE `commander` DISABLE KEYS */;
INSERT INTO `commander` VALUES (1,3,1,1,NULL,2,50,1,5,10,1,'CD-00001/PD-00003-5B de 1L','cd-00001-pd-00003-5b-de-1l','2020-01-09 18:26:22',NULL),(2,3,1,1,NULL,3,40,4,5,40,1,'CD-00001/PD-00003-5B de 4L','cd-00001-pd-00003-5b-de-4l','2020-01-09 18:26:41',NULL),(3,2,1,1,NULL,2,25,1,5,25,1,'CD-00001/PD-00002-5B de 1L','cd-00001-pd-00002-5b-de-1l','2020-01-09 18:27:16',NULL),(4,2,2,1,NULL,3,120,4,5,100,1,'CD-00002/PD-00002-5B de 4L','cd-00002-pd-00002-5b-de-4l','2020-01-09 18:52:47',NULL),(5,1,2,1,NULL,2,70,1,5,70,1,'CD-00002/PD-00001-5B de 1L','cd-00002-pd-00001-5b-de-1l','2020-01-09 18:53:17',NULL);
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
  `commandeshow_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `capacite_id` int(11) DEFAULT NULL,
  `capacitecartonshow` int(11) NOT NULL,
  `capacitebidonshow` int(11) NOT NULL,
  `quantitecommandeshow` int(11) NOT NULL,
  `quantitestock` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_603333577C79189D` (`capacite_id`),
  KEY `IDX_60333357DD7B2EBC` (`edited_by_id`),
  KEY `IDX_60333357B03A8386` (`created_by_id`),
  KEY `IDX_603333572BA6E032` (`commandeshow_id`),
  KEY `IDX_60333357F347EFB` (`produit_id`),
  CONSTRAINT `FK_603333572BA6E032` FOREIGN KEY (`commandeshow_id`) REFERENCES `commandeshow` (`id`),
  CONSTRAINT `FK_603333577C79189D` FOREIGN KEY (`capacite_id`) REFERENCES `capacite` (`id`),
  CONSTRAINT `FK_60333357B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_60333357DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_60333357F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandershow`
--

LOCK TABLES `commandershow` WRITE;
/*!40000 ALTER TABLE `commandershow` DISABLE KEYS */;
INSERT INTO `commandershow` VALUES (1,NULL,1,1,3,2,5,1,20,20,'cs-00001-pd-00003-5b-de-1l',NULL,'2020-01-09 18:33:26','CS-00001/PD-00003-5B de 1L'),(2,NULL,1,1,2,3,5,4,10,10,'cs-00001-pd-00002-5b-de-4l',NULL,'2020-01-09 18:51:59','CS-00001/PD-00002-5B de 4L');
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
  `showroom_id` int(11) NOT NULL,
  `intituleshow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecomshow` date NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fournisseurshow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `credited_on` datetime DEFAULT NULL,
  `statut` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7835D7ABDD7B2EBC` (`edited_by_id`),
  KEY `IDX_7835D7ABB03A8386` (`created_by_id`),
  KEY `IDX_7835D7AB2243B88B` (`showroom_id`),
  CONSTRAINT `FK_7835D7AB2243B88B` FOREIGN KEY (`showroom_id`) REFERENCES `showroom` (`id`),
  CONSTRAINT `FK_7835D7ABB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_7835D7ABDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandeshow`
--

LOCK TABLES `commandeshow` WRITE;
/*!40000 ALTER TABLE `commandeshow` DISABLE KEYS */;
INSERT INTO `commandeshow` VALUES (1,NULL,1,2,'AZERTYUOP','2020-01-09','CS-00001','Ambroise TOZO','azertyuop',NULL,'2020-01-09 18:32:42',1);
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
INSERT INTO `migration_versions` VALUES ('20191105180022','2019-11-06 15:22:16'),('20191106104541','2019-11-06 15:22:30'),('20191106113135','2019-11-06 15:22:39'),('20191111140211','2019-11-11 14:02:30'),('20191111141951','2019-11-11 14:19:56'),('20191112190758','2019-11-13 07:51:54'),('20191113054631','2019-11-13 07:51:54'),('20191113075535','2019-11-13 07:56:07'),('20191113180506','2019-11-13 18:07:53'),('20191115183941','2019-11-15 18:41:05'),('20191116113917','2019-11-16 11:40:38'),('20191116124456','2019-11-16 12:45:51'),('20191116143807','2019-11-16 14:38:27'),('20191119212641','2019-11-19 21:28:48'),('20191124161251','2019-11-24 16:14:06'),('20191124164734','2019-11-24 16:48:19'),('20191124164804','2019-11-24 16:48:20'),('20191127211606','2019-11-27 21:17:27'),('20191127212757','2019-11-27 21:28:42'),('20191128004546','2019-11-28 00:51:31'),('20191128013255','2019-11-28 08:05:19'),('20191128080802','2019-11-28 08:08:46'),('20191201175428','2019-12-01 17:55:11'),('20191207205117','2019-12-07 20:52:33'),('20191207215905','2019-12-07 22:14:27'),('20191208151751','2019-12-08 15:18:16'),('20191210214000','2019-12-10 21:49:42'),('20191210214716','2019-12-10 21:49:43'),('20191211213604','2019-12-11 21:37:03'),('20191213095703','2019-12-13 09:58:32'),('20191214172903','2019-12-14 17:29:46'),('20191228115549','2019-12-28 11:56:02'),('20191228201200','2019-12-28 20:14:41'),('20200102144938','2020-01-02 14:54:10'),('20200102172356','2020-01-02 17:28:26'),('20200102173013','2020-01-02 17:30:20'),('20200107114607','2020-01-07 11:47:03'),('20200108102458','2020-01-08 10:29:27'),('20200108110320','2020-01-08 11:07:59'),('20200108113442','2020-01-08 11:34:58'),('20200109093328','2020-01-09 09:45:08'),('20200109184057','2020-01-09 18:41:15'),('20200109224528','2020-01-09 22:46:25'),('20200109230103','2020-01-09 23:01:28'),('20200110010548','2020-01-10 01:06:26');
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
INSERT INTO `produit` VALUES (1,NULL,1,'PD-00001','HX5',4500,'4 litres','2019-11-11 15:20:04','2020-01-02 16:04:14','hx5','lubrifiant',0,20,NULL),(2,NULL,1,'PD-00002','HX7 (4)',7500,'10w-40','2019-11-11 15:22:03','2020-01-02 16:04:38','hx7-4','lubrifiant',0,0,NULL),(3,1,1,'PD-00003','HX8 5w-30',7500,NULL,'2019-12-14 18:00:11','2020-01-02 16:05:00','hx8-5w-30','lubrifiant',7700,50,NULL);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit_capacite`
--

DROP TABLE IF EXISTS `produit_capacite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit_capacite` (
  `produit_id` int(11) NOT NULL,
  `capacite_id` int(11) NOT NULL,
  PRIMARY KEY (`produit_id`,`capacite_id`),
  KEY `IDX_88F6DF28F347EFB` (`produit_id`),
  KEY `IDX_88F6DF287C79189D` (`capacite_id`),
  CONSTRAINT `FK_88F6DF287C79189D` FOREIGN KEY (`capacite_id`) REFERENCES `capacite` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_88F6DF28F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit_capacite`
--

LOCK TABLES `produit_capacite` WRITE;
/*!40000 ALTER TABLE `produit_capacite` DISABLE KEYS */;
INSERT INTO `produit_capacite` VALUES (1,2),(1,3),(2,1),(2,3),(2,4),(3,2),(3,3);
/*!40000 ALTER TABLE `produit_capacite` ENABLE KEYS */;
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
  `capacite_id` int(11) DEFAULT NULL,
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
  KEY `IDX_73C1B5917C79189D` (`capacite_id`),
  CONSTRAINT `FK_73C1B5914409F943` FOREIGN KEY (`commandershow_id`) REFERENCES `commandershow` (`id`),
  CONSTRAINT `FK_73C1B5917C79189D` FOREIGN KEY (`capacite_id`) REFERENCES `capacite` (`id`),
  CONSTRAINT `FK_73C1B591B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_73C1B591DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockshowroom`
--

LOCK TABLES `stockshowroom` WRITE;
/*!40000 ALTER TABLE `stockshowroom` DISABLE KEYS */;
INSERT INTO `stockshowroom` VALUES (1,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/1','CS-00001/PD-00003-5B de 1L/1-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-1-cs-00001-pd-00003-5b-de-1l-1-1','2020-01-09 19:41:42',NULL,0),(2,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/1','CS-00001/PD-00003-5B de 1L/1-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-1-cs-00001-pd-00003-5b-de-1l-1-2','2020-01-09 19:41:42',NULL,0),(3,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/1','CS-00001/PD-00003-5B de 1L/1-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-1-cs-00001-pd-00003-5b-de-1l-1-3','2020-01-09 19:41:42',NULL,0),(4,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/1','CS-00001/PD-00003-5B de 1L/1-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-1-cs-00001-pd-00003-5b-de-1l-1-4','2020-01-09 19:41:43',NULL,0),(5,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/1','CS-00001/PD-00003-5B de 1L/1-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-1-cs-00001-pd-00003-5b-de-1l-1-5','2020-01-09 19:41:43',NULL,0),(6,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/2','CS-00001/PD-00003-5B de 1L/2-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-2-cs-00001-pd-00003-5b-de-1l-2-1','2020-01-09 19:41:43',NULL,0),(7,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/2','CS-00001/PD-00003-5B de 1L/2-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-2-cs-00001-pd-00003-5b-de-1l-2-2','2020-01-09 19:41:43',NULL,0),(8,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/2','CS-00001/PD-00003-5B de 1L/2-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-2-cs-00001-pd-00003-5b-de-1l-2-3','2020-01-09 19:41:43',NULL,0),(9,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/2','CS-00001/PD-00003-5B de 1L/2-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-2-cs-00001-pd-00003-5b-de-1l-2-4','2020-01-09 19:41:43',NULL,0),(10,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/2','CS-00001/PD-00003-5B de 1L/2-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-2-cs-00001-pd-00003-5b-de-1l-2-5','2020-01-09 19:41:43',NULL,0),(11,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/3','CS-00001/PD-00003-5B de 1L/3-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-3-cs-00001-pd-00003-5b-de-1l-3-1','2020-01-09 19:41:43',NULL,0),(12,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/3','CS-00001/PD-00003-5B de 1L/3-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-3-cs-00001-pd-00003-5b-de-1l-3-2','2020-01-09 19:41:43',NULL,0),(13,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/3','CS-00001/PD-00003-5B de 1L/3-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-3-cs-00001-pd-00003-5b-de-1l-3-3','2020-01-09 19:41:43',NULL,0),(14,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/3','CS-00001/PD-00003-5B de 1L/3-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-3-cs-00001-pd-00003-5b-de-1l-3-4','2020-01-09 19:41:43',NULL,0),(15,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/3','CS-00001/PD-00003-5B de 1L/3-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-3-cs-00001-pd-00003-5b-de-1l-3-5','2020-01-09 19:41:43',NULL,0),(16,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/4','CS-00001/PD-00003-5B de 1L/4-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-4-cs-00001-pd-00003-5b-de-1l-4-1','2020-01-09 19:41:43',NULL,0),(17,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/4','CS-00001/PD-00003-5B de 1L/4-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-4-cs-00001-pd-00003-5b-de-1l-4-2','2020-01-09 19:41:43',NULL,0),(18,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/4','CS-00001/PD-00003-5B de 1L/4-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-4-cs-00001-pd-00003-5b-de-1l-4-3','2020-01-09 19:41:43',NULL,0),(19,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/4','CS-00001/PD-00003-5B de 1L/4-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-4-cs-00001-pd-00003-5b-de-1l-4-4','2020-01-09 19:41:43',NULL,0),(20,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/4','CS-00001/PD-00003-5B de 1L/4-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-4-cs-00001-pd-00003-5b-de-1l-4-5','2020-01-09 19:41:43',NULL,0),(21,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/5','CS-00001/PD-00003-5B de 1L/5-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-5-cs-00001-pd-00003-5b-de-1l-5-1','2020-01-09 19:41:43',NULL,0),(22,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/5','CS-00001/PD-00003-5B de 1L/5-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-5-cs-00001-pd-00003-5b-de-1l-5-2','2020-01-09 19:41:43',NULL,0),(23,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/5','CS-00001/PD-00003-5B de 1L/5-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-5-cs-00001-pd-00003-5b-de-1l-5-3','2020-01-09 19:41:43',NULL,0),(24,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/5','CS-00001/PD-00003-5B de 1L/5-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-5-cs-00001-pd-00003-5b-de-1l-5-4','2020-01-09 19:41:43',NULL,0),(25,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/5','CS-00001/PD-00003-5B de 1L/5-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-5-cs-00001-pd-00003-5b-de-1l-5-5','2020-01-09 19:41:43',NULL,0),(26,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/6','CS-00001/PD-00003-5B de 1L/6-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-6-cs-00001-pd-00003-5b-de-1l-6-1','2020-01-09 19:41:43',NULL,0),(27,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/6','CS-00001/PD-00003-5B de 1L/6-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-6-cs-00001-pd-00003-5b-de-1l-6-2','2020-01-09 19:41:43',NULL,0),(28,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/6','CS-00001/PD-00003-5B de 1L/6-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-6-cs-00001-pd-00003-5b-de-1l-6-3','2020-01-09 19:41:43',NULL,0),(29,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/6','CS-00001/PD-00003-5B de 1L/6-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-6-cs-00001-pd-00003-5b-de-1l-6-4','2020-01-09 19:41:43',NULL,0),(30,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/6','CS-00001/PD-00003-5B de 1L/6-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-6-cs-00001-pd-00003-5b-de-1l-6-5','2020-01-09 19:41:43',NULL,0),(31,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/7','CS-00001/PD-00003-5B de 1L/7-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-7-cs-00001-pd-00003-5b-de-1l-7-1','2020-01-09 19:41:43',NULL,0),(32,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/7','CS-00001/PD-00003-5B de 1L/7-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-7-cs-00001-pd-00003-5b-de-1l-7-2','2020-01-09 19:41:43',NULL,0),(33,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/7','CS-00001/PD-00003-5B de 1L/7-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-7-cs-00001-pd-00003-5b-de-1l-7-3','2020-01-09 19:41:43',NULL,0),(34,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/7','CS-00001/PD-00003-5B de 1L/7-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-7-cs-00001-pd-00003-5b-de-1l-7-4','2020-01-09 19:41:44',NULL,0),(35,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/7','CS-00001/PD-00003-5B de 1L/7-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-7-cs-00001-pd-00003-5b-de-1l-7-5','2020-01-09 19:41:44',NULL,0),(36,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/8','CS-00001/PD-00003-5B de 1L/8-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-8-cs-00001-pd-00003-5b-de-1l-8-1','2020-01-09 19:41:44',NULL,0),(37,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/8','CS-00001/PD-00003-5B de 1L/8-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-8-cs-00001-pd-00003-5b-de-1l-8-2','2020-01-09 19:41:44',NULL,0),(38,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/8','CS-00001/PD-00003-5B de 1L/8-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-8-cs-00001-pd-00003-5b-de-1l-8-3','2020-01-09 19:41:44',NULL,0),(39,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/8','CS-00001/PD-00003-5B de 1L/8-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-8-cs-00001-pd-00003-5b-de-1l-8-4','2020-01-09 19:41:44',NULL,0),(40,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/8','CS-00001/PD-00003-5B de 1L/8-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-8-cs-00001-pd-00003-5b-de-1l-8-5','2020-01-09 19:41:44',NULL,0),(41,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/9','CS-00001/PD-00003-5B de 1L/9-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-9-cs-00001-pd-00003-5b-de-1l-9-1','2020-01-09 19:41:44',NULL,0),(42,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/9','CS-00001/PD-00003-5B de 1L/9-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-9-cs-00001-pd-00003-5b-de-1l-9-2','2020-01-09 19:41:44',NULL,0),(43,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/9','CS-00001/PD-00003-5B de 1L/9-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-9-cs-00001-pd-00003-5b-de-1l-9-3','2020-01-09 19:41:44',NULL,0),(44,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/9','CS-00001/PD-00003-5B de 1L/9-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-9-cs-00001-pd-00003-5b-de-1l-9-4','2020-01-09 19:41:44',NULL,0),(45,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/9','CS-00001/PD-00003-5B de 1L/9-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-9-cs-00001-pd-00003-5b-de-1l-9-5','2020-01-09 19:41:44',NULL,0),(46,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/10','CS-00001/PD-00003-5B de 1L/10-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-10-cs-00001-pd-00003-5b-de-1l-10-1','2020-01-09 19:41:44',NULL,0),(47,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/10','CS-00001/PD-00003-5B de 1L/10-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-10-cs-00001-pd-00003-5b-de-1l-10-2','2020-01-09 19:41:44',NULL,0),(48,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/10','CS-00001/PD-00003-5B de 1L/10-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-10-cs-00001-pd-00003-5b-de-1l-10-3','2020-01-09 19:41:44',NULL,0),(49,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/10','CS-00001/PD-00003-5B de 1L/10-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-10-cs-00001-pd-00003-5b-de-1l-10-4','2020-01-09 19:41:44',NULL,0),(50,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/10','CS-00001/PD-00003-5B de 1L/10-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-10-cs-00001-pd-00003-5b-de-1l-10-5','2020-01-09 19:41:44',NULL,0),(51,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/11','CS-00001/PD-00003-5B de 1L/11-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-11-cs-00001-pd-00003-5b-de-1l-11-1','2020-01-09 19:41:44',NULL,0),(52,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/11','CS-00001/PD-00003-5B de 1L/11-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-11-cs-00001-pd-00003-5b-de-1l-11-2','2020-01-09 19:41:44',NULL,0),(53,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/11','CS-00001/PD-00003-5B de 1L/11-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-11-cs-00001-pd-00003-5b-de-1l-11-3','2020-01-09 19:41:44',NULL,0),(54,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/11','CS-00001/PD-00003-5B de 1L/11-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-11-cs-00001-pd-00003-5b-de-1l-11-4','2020-01-09 19:41:44',NULL,0),(55,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/11','CS-00001/PD-00003-5B de 1L/11-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-11-cs-00001-pd-00003-5b-de-1l-11-5','2020-01-09 19:41:44',NULL,0),(56,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/12','CS-00001/PD-00003-5B de 1L/12-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-12-cs-00001-pd-00003-5b-de-1l-12-1','2020-01-09 19:41:44',NULL,0),(57,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/12','CS-00001/PD-00003-5B de 1L/12-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-12-cs-00001-pd-00003-5b-de-1l-12-2','2020-01-09 19:41:44',NULL,0),(58,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/12','CS-00001/PD-00003-5B de 1L/12-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-12-cs-00001-pd-00003-5b-de-1l-12-3','2020-01-09 19:41:44',NULL,0),(59,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/12','CS-00001/PD-00003-5B de 1L/12-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-12-cs-00001-pd-00003-5b-de-1l-12-4','2020-01-09 19:41:44',NULL,0),(60,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/12','CS-00001/PD-00003-5B de 1L/12-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-12-cs-00001-pd-00003-5b-de-1l-12-5','2020-01-09 19:41:44',NULL,0),(61,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/13','CS-00001/PD-00003-5B de 1L/13-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-13-cs-00001-pd-00003-5b-de-1l-13-1','2020-01-09 19:41:44',NULL,0),(62,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/13','CS-00001/PD-00003-5B de 1L/13-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-13-cs-00001-pd-00003-5b-de-1l-13-2','2020-01-09 19:41:44',NULL,0),(63,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/13','CS-00001/PD-00003-5B de 1L/13-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-13-cs-00001-pd-00003-5b-de-1l-13-3','2020-01-09 19:41:44',NULL,0),(64,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/13','CS-00001/PD-00003-5B de 1L/13-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-13-cs-00001-pd-00003-5b-de-1l-13-4','2020-01-09 19:41:44',NULL,0),(65,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/13','CS-00001/PD-00003-5B de 1L/13-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-13-cs-00001-pd-00003-5b-de-1l-13-5','2020-01-09 19:41:44',NULL,0),(66,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/14','CS-00001/PD-00003-5B de 1L/14-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-14-cs-00001-pd-00003-5b-de-1l-14-1','2020-01-09 19:41:44',NULL,0),(67,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/14','CS-00001/PD-00003-5B de 1L/14-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-14-cs-00001-pd-00003-5b-de-1l-14-2','2020-01-09 19:41:44',NULL,0),(68,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/14','CS-00001/PD-00003-5B de 1L/14-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-14-cs-00001-pd-00003-5b-de-1l-14-3','2020-01-09 19:41:45',NULL,0),(69,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/14','CS-00001/PD-00003-5B de 1L/14-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-14-cs-00001-pd-00003-5b-de-1l-14-4','2020-01-09 19:41:45',NULL,0),(70,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/14','CS-00001/PD-00003-5B de 1L/14-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-14-cs-00001-pd-00003-5b-de-1l-14-5','2020-01-09 19:41:45',NULL,0),(71,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/15','CS-00001/PD-00003-5B de 1L/15-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-15-cs-00001-pd-00003-5b-de-1l-15-1','2020-01-09 19:41:45',NULL,0),(72,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/15','CS-00001/PD-00003-5B de 1L/15-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-15-cs-00001-pd-00003-5b-de-1l-15-2','2020-01-09 19:41:45',NULL,0),(73,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/15','CS-00001/PD-00003-5B de 1L/15-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-15-cs-00001-pd-00003-5b-de-1l-15-3','2020-01-09 19:41:45',NULL,0),(74,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/15','CS-00001/PD-00003-5B de 1L/15-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-15-cs-00001-pd-00003-5b-de-1l-15-4','2020-01-09 19:41:45',NULL,0),(75,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/15','CS-00001/PD-00003-5B de 1L/15-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-15-cs-00001-pd-00003-5b-de-1l-15-5','2020-01-09 19:41:45',NULL,0),(76,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/16','CS-00001/PD-00003-5B de 1L/16-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-16-cs-00001-pd-00003-5b-de-1l-16-1','2020-01-09 19:41:45',NULL,0),(77,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/16','CS-00001/PD-00003-5B de 1L/16-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-16-cs-00001-pd-00003-5b-de-1l-16-2','2020-01-09 19:41:45',NULL,0),(78,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/16','CS-00001/PD-00003-5B de 1L/16-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-16-cs-00001-pd-00003-5b-de-1l-16-3','2020-01-09 19:41:45',NULL,0),(79,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/16','CS-00001/PD-00003-5B de 1L/16-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-16-cs-00001-pd-00003-5b-de-1l-16-4','2020-01-09 19:41:45',NULL,0),(80,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/16','CS-00001/PD-00003-5B de 1L/16-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-16-cs-00001-pd-00003-5b-de-1l-16-5','2020-01-09 19:41:45',NULL,0),(81,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/17','CS-00001/PD-00003-5B de 1L/17-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-17-cs-00001-pd-00003-5b-de-1l-17-1','2020-01-09 19:41:45',NULL,0),(82,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/17','CS-00001/PD-00003-5B de 1L/17-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-17-cs-00001-pd-00003-5b-de-1l-17-2','2020-01-09 19:41:45',NULL,0),(83,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/17','CS-00001/PD-00003-5B de 1L/17-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-17-cs-00001-pd-00003-5b-de-1l-17-3','2020-01-09 19:41:45',NULL,0),(84,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/17','CS-00001/PD-00003-5B de 1L/17-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-17-cs-00001-pd-00003-5b-de-1l-17-4','2020-01-09 19:41:45',NULL,0),(85,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/17','CS-00001/PD-00003-5B de 1L/17-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-17-cs-00001-pd-00003-5b-de-1l-17-5','2020-01-09 19:41:45',NULL,0),(86,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/18','CS-00001/PD-00003-5B de 1L/18-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-18-cs-00001-pd-00003-5b-de-1l-18-1','2020-01-09 19:41:45',NULL,0),(87,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/18','CS-00001/PD-00003-5B de 1L/18-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-18-cs-00001-pd-00003-5b-de-1l-18-2','2020-01-09 19:41:45',NULL,0),(88,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/18','CS-00001/PD-00003-5B de 1L/18-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-18-cs-00001-pd-00003-5b-de-1l-18-3','2020-01-09 19:41:45',NULL,0),(89,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/18','CS-00001/PD-00003-5B de 1L/18-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-18-cs-00001-pd-00003-5b-de-1l-18-4','2020-01-09 19:41:45',NULL,0),(90,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/18','CS-00001/PD-00003-5B de 1L/18-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-18-cs-00001-pd-00003-5b-de-1l-18-5','2020-01-09 19:41:45',NULL,0),(91,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/19','CS-00001/PD-00003-5B de 1L/19-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-19-cs-00001-pd-00003-5b-de-1l-19-1','2020-01-09 19:41:45',NULL,0),(92,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/19','CS-00001/PD-00003-5B de 1L/19-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-19-cs-00001-pd-00003-5b-de-1l-19-2','2020-01-09 19:41:45',NULL,0),(93,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/19','CS-00001/PD-00003-5B de 1L/19-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-19-cs-00001-pd-00003-5b-de-1l-19-3','2020-01-09 19:41:46',NULL,0),(94,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/19','CS-00001/PD-00003-5B de 1L/19-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-19-cs-00001-pd-00003-5b-de-1l-19-4','2020-01-09 19:41:46',NULL,0),(95,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/19','CS-00001/PD-00003-5B de 1L/19-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-19-cs-00001-pd-00003-5b-de-1l-19-5','2020-01-09 19:41:46',NULL,0),(96,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/20','CS-00001/PD-00003-5B de 1L/20-1',0,0,0,'cs-00001-pd-00003-5b-de-1l-20-cs-00001-pd-00003-5b-de-1l-20-1','2020-01-09 19:41:46',NULL,0),(97,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/20','CS-00001/PD-00003-5B de 1L/20-2',0,0,0,'cs-00001-pd-00003-5b-de-1l-20-cs-00001-pd-00003-5b-de-1l-20-2','2020-01-09 19:41:46',NULL,0),(98,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/20','CS-00001/PD-00003-5B de 1L/20-3',0,0,0,'cs-00001-pd-00003-5b-de-1l-20-cs-00001-pd-00003-5b-de-1l-20-3','2020-01-09 19:41:46',NULL,0),(99,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/20','CS-00001/PD-00003-5B de 1L/20-4',0,0,0,'cs-00001-pd-00003-5b-de-1l-20-cs-00001-pd-00003-5b-de-1l-20-4','2020-01-09 19:41:46',NULL,0),(100,1,NULL,NULL,2,'CS-00001/PD-00003-5B de 1L/20','CS-00001/PD-00003-5B de 1L/20-5',0,0,0,'cs-00001-pd-00003-5b-de-1l-20-cs-00001-pd-00003-5b-de-1l-20-5','2020-01-09 19:41:46',NULL,0),(101,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/1','CS-00001/PD-00002-5B de 4L/1-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-1-cs-00001-pd-00002-5b-de-4l-1-1','2020-01-09 19:41:46',NULL,0),(102,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/1','CS-00001/PD-00002-5B de 4L/1-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-1-cs-00001-pd-00002-5b-de-4l-1-2','2020-01-09 19:41:46',NULL,0),(103,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/1','CS-00001/PD-00002-5B de 4L/1-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-1-cs-00001-pd-00002-5b-de-4l-1-3','2020-01-09 19:41:46',NULL,0),(104,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/1','CS-00001/PD-00002-5B de 4L/1-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-1-cs-00001-pd-00002-5b-de-4l-1-4','2020-01-09 19:41:46',NULL,0),(105,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/1','CS-00001/PD-00002-5B de 4L/1-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-1-cs-00001-pd-00002-5b-de-4l-1-5','2020-01-09 19:41:46',NULL,0),(106,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/2','CS-00001/PD-00002-5B de 4L/2-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-2-cs-00001-pd-00002-5b-de-4l-2-1','2020-01-09 19:41:46',NULL,0),(107,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/2','CS-00001/PD-00002-5B de 4L/2-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-2-cs-00001-pd-00002-5b-de-4l-2-2','2020-01-09 19:41:46',NULL,0),(108,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/2','CS-00001/PD-00002-5B de 4L/2-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-2-cs-00001-pd-00002-5b-de-4l-2-3','2020-01-09 19:41:46',NULL,0),(109,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/2','CS-00001/PD-00002-5B de 4L/2-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-2-cs-00001-pd-00002-5b-de-4l-2-4','2020-01-09 19:41:46',NULL,0),(110,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/2','CS-00001/PD-00002-5B de 4L/2-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-2-cs-00001-pd-00002-5b-de-4l-2-5','2020-01-09 19:41:46',NULL,0),(111,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/3','CS-00001/PD-00002-5B de 4L/3-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-3-cs-00001-pd-00002-5b-de-4l-3-1','2020-01-09 19:41:46',NULL,0),(112,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/3','CS-00001/PD-00002-5B de 4L/3-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-3-cs-00001-pd-00002-5b-de-4l-3-2','2020-01-09 19:41:46',NULL,0),(113,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/3','CS-00001/PD-00002-5B de 4L/3-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-3-cs-00001-pd-00002-5b-de-4l-3-3','2020-01-09 19:41:46',NULL,0),(114,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/3','CS-00001/PD-00002-5B de 4L/3-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-3-cs-00001-pd-00002-5b-de-4l-3-4','2020-01-09 19:41:46',NULL,0),(115,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/3','CS-00001/PD-00002-5B de 4L/3-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-3-cs-00001-pd-00002-5b-de-4l-3-5','2020-01-09 19:41:46',NULL,0),(116,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/4','CS-00001/PD-00002-5B de 4L/4-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-4-cs-00001-pd-00002-5b-de-4l-4-1','2020-01-09 19:41:46',NULL,0),(117,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/4','CS-00001/PD-00002-5B de 4L/4-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-4-cs-00001-pd-00002-5b-de-4l-4-2','2020-01-09 19:41:46',NULL,0),(118,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/4','CS-00001/PD-00002-5B de 4L/4-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-4-cs-00001-pd-00002-5b-de-4l-4-3','2020-01-09 19:41:46',NULL,0),(119,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/4','CS-00001/PD-00002-5B de 4L/4-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-4-cs-00001-pd-00002-5b-de-4l-4-4','2020-01-09 19:41:46',NULL,0),(120,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/4','CS-00001/PD-00002-5B de 4L/4-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-4-cs-00001-pd-00002-5b-de-4l-4-5','2020-01-09 19:41:46',NULL,0),(121,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/5','CS-00001/PD-00002-5B de 4L/5-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-5-cs-00001-pd-00002-5b-de-4l-5-1','2020-01-09 19:41:46',NULL,0),(122,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/5','CS-00001/PD-00002-5B de 4L/5-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-5-cs-00001-pd-00002-5b-de-4l-5-2','2020-01-09 19:41:46',NULL,0),(123,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/5','CS-00001/PD-00002-5B de 4L/5-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-5-cs-00001-pd-00002-5b-de-4l-5-3','2020-01-09 19:41:46',NULL,0),(124,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/5','CS-00001/PD-00002-5B de 4L/5-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-5-cs-00001-pd-00002-5b-de-4l-5-4','2020-01-09 19:41:46',NULL,0),(125,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/5','CS-00001/PD-00002-5B de 4L/5-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-5-cs-00001-pd-00002-5b-de-4l-5-5','2020-01-09 19:41:46',NULL,0),(126,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/6','CS-00001/PD-00002-5B de 4L/6-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-6-cs-00001-pd-00002-5b-de-4l-6-1','2020-01-09 19:41:46',NULL,0),(127,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/6','CS-00001/PD-00002-5B de 4L/6-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-6-cs-00001-pd-00002-5b-de-4l-6-2','2020-01-09 19:41:46',NULL,0),(128,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/6','CS-00001/PD-00002-5B de 4L/6-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-6-cs-00001-pd-00002-5b-de-4l-6-3','2020-01-09 19:41:46',NULL,0),(129,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/6','CS-00001/PD-00002-5B de 4L/6-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-6-cs-00001-pd-00002-5b-de-4l-6-4','2020-01-09 19:41:47',NULL,0),(130,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/6','CS-00001/PD-00002-5B de 4L/6-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-6-cs-00001-pd-00002-5b-de-4l-6-5','2020-01-09 19:41:47',NULL,0),(131,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/7','CS-00001/PD-00002-5B de 4L/7-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-7-cs-00001-pd-00002-5b-de-4l-7-1','2020-01-09 19:41:47',NULL,0),(132,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/7','CS-00001/PD-00002-5B de 4L/7-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-7-cs-00001-pd-00002-5b-de-4l-7-2','2020-01-09 19:41:47',NULL,0),(133,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/7','CS-00001/PD-00002-5B de 4L/7-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-7-cs-00001-pd-00002-5b-de-4l-7-3','2020-01-09 19:41:47',NULL,0),(134,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/7','CS-00001/PD-00002-5B de 4L/7-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-7-cs-00001-pd-00002-5b-de-4l-7-4','2020-01-09 19:41:47',NULL,0),(135,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/7','CS-00001/PD-00002-5B de 4L/7-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-7-cs-00001-pd-00002-5b-de-4l-7-5','2020-01-09 19:41:47',NULL,0),(136,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/8','CS-00001/PD-00002-5B de 4L/8-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-8-cs-00001-pd-00002-5b-de-4l-8-1','2020-01-09 19:41:47',NULL,0),(137,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/8','CS-00001/PD-00002-5B de 4L/8-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-8-cs-00001-pd-00002-5b-de-4l-8-2','2020-01-09 19:41:47',NULL,0),(138,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/8','CS-00001/PD-00002-5B de 4L/8-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-8-cs-00001-pd-00002-5b-de-4l-8-3','2020-01-09 19:41:47',NULL,0),(139,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/8','CS-00001/PD-00002-5B de 4L/8-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-8-cs-00001-pd-00002-5b-de-4l-8-4','2020-01-09 19:41:47',NULL,0),(140,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/8','CS-00001/PD-00002-5B de 4L/8-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-8-cs-00001-pd-00002-5b-de-4l-8-5','2020-01-09 19:41:47',NULL,0),(141,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/9','CS-00001/PD-00002-5B de 4L/9-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-9-cs-00001-pd-00002-5b-de-4l-9-1','2020-01-09 19:41:47',NULL,0),(142,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/9','CS-00001/PD-00002-5B de 4L/9-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-9-cs-00001-pd-00002-5b-de-4l-9-2','2020-01-09 19:41:47',NULL,0),(143,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/9','CS-00001/PD-00002-5B de 4L/9-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-9-cs-00001-pd-00002-5b-de-4l-9-3','2020-01-09 19:41:47',NULL,0),(144,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/9','CS-00001/PD-00002-5B de 4L/9-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-9-cs-00001-pd-00002-5b-de-4l-9-4','2020-01-09 19:41:47',NULL,0),(145,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/9','CS-00001/PD-00002-5B de 4L/9-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-9-cs-00001-pd-00002-5b-de-4l-9-5','2020-01-09 19:41:47',NULL,0),(146,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/10','CS-00001/PD-00002-5B de 4L/10-1',0,0,0,'cs-00001-pd-00002-5b-de-4l-10-cs-00001-pd-00002-5b-de-4l-10-1','2020-01-09 19:41:47',NULL,0),(147,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/10','CS-00001/PD-00002-5B de 4L/10-2',0,0,0,'cs-00001-pd-00002-5b-de-4l-10-cs-00001-pd-00002-5b-de-4l-10-2','2020-01-09 19:41:47',NULL,0),(148,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/10','CS-00001/PD-00002-5B de 4L/10-3',0,0,0,'cs-00001-pd-00002-5b-de-4l-10-cs-00001-pd-00002-5b-de-4l-10-3','2020-01-09 19:41:47',NULL,0),(149,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/10','CS-00001/PD-00002-5B de 4L/10-4',0,0,0,'cs-00001-pd-00002-5b-de-4l-10-cs-00001-pd-00002-5b-de-4l-10-4','2020-01-09 19:41:47',NULL,0),(150,2,NULL,NULL,3,'CS-00001/PD-00002-5B de 4L/10','CS-00001/PD-00002-5B de 4L/10-5',0,0,0,'cs-00001-pd-00002-5b-de-4l-10-cs-00001-pd-00002-5b-de-4l-10-5','2020-01-09 19:41:47',NULL,0);
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
  `created_on` datetime NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `capacite_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E1ACC357BCF5E72D` (`categorie_id`),
  KEY `IDX_E1ACC357F347EFB` (`produit_id`),
  KEY `IDX_E1ACC357B03A8386` (`created_by_id`),
  KEY `IDX_E1ACC357DD7B2EBC` (`edited_by_id`),
  KEY `IDX_E1ACC3577C79189D` (`capacite_id`),
  CONSTRAINT `FK_E1ACC3577C79189D` FOREIGN KEY (`capacite_id`) REFERENCES `capacite` (`id`),
  CONSTRAINT `FK_E1ACC357B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_E1ACC357BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_E1ACC357DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_E1ACC357F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifcategorieclt`
--

LOCK TABLES `tarifcategorieclt` WRITE;
/*!40000 ALTER TABLE `tarifcategorieclt` DISABLE KEYS */;
INSERT INTO `tarifcategorieclt` VALUES (1,1,3,1,NULL,2400,10,NULL,0,'2020-01-08 12:17:44',NULL,2,'2400'),(2,1,2,1,NULL,7500,15,NULL,0,'2020-01-08 19:10:56',NULL,1,'0-15'),(3,1,3,1,NULL,2350,30,NULL,11,'2020-01-08 19:11:45',NULL,2,'11-30'),(4,1,3,3,NULL,2300,100,NULL,31,'2020-01-10 00:31:52',NULL,2,'31-100'),(5,1,2,3,NULL,7300,50,NULL,16,'2020-01-10 00:47:30',NULL,3,'16-50'),(6,1,2,3,NULL,7500,15,NULL,0,'2020-01-10 00:50:30',NULL,3,'0-15-1');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Audrey','Audrey',NULL,'audrey-audrey',NULL,NULL,'M','audrey',NULL,'audeslo@live.fr',NULL,NULL,NULL,'$2y$13$wpTtN13nSBTv1uThOtsRVONsVI1JD1Gy99FDhYvk5fgHiMiTER302',NULL,NULL,NULL,NULL,'a:0:{}','a:2:{i:0;s:9:\"ROLE_USER\";i:1;s:10:\"ROLE_ADMIN\";}','2019-08-27 13:09:54',NULL,NULL),(2,'daniel','daniel',NULL,'daniel-daniel',1,1,'M','daniel',NULL,'daniel@yahoo.fr',NULL,NULL,NULL,'$argon2i$v=19$m=65536,t=4,p=1$VW03WE5Ha3lsd0RrNUFCTA$MFzpopYSEP8bHD7J81E9oyJUpkDDToAIb8ew+HVqU1U',NULL,NULL,NULL,NULL,'a:0:{}','a:1:{i:0;s:9:\"ROLE_USER\";}','2019-12-11 22:22:30','2019-12-30 19:37:38',2),(3,'boris','boris',NULL,'boris-boris',1,NULL,'M','boris',NULL,'boris@yahoo.fr',NULL,NULL,NULL,'$argon2i$v=19$m=65536,t=4,p=1$d3JiYy42S2poeHd0ODlyNw$NgFNk53gcbZuJjt+2TqxNSMx7SeWDAGSt8oZcj21/Qk',NULL,NULL,NULL,NULL,'a:0:{}','a:1:{i:0;s:9:\"ROLE_USER\";}','2020-01-07 17:26:28',NULL,2);
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
  `contenant` tinyint(1) NOT NULL,
  `quantite` int(11) NOT NULL,
  `bidon` int(11) DEFAULT NULL,
  `carton` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `capacite_id` int(11) DEFAULT NULL,
  `prixvente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F275B29D5CBB404` (`venteshowroom_id`),
  KEY `IDX_5F275B29F347EFB` (`produit_id`),
  KEY `IDX_5F275B29B03A8386` (`created_by_id`),
  KEY `IDX_5F275B297C79189D` (`capacite_id`),
  CONSTRAINT `FK_5F275B297C79189D` FOREIGN KEY (`capacite_id`) REFERENCES `capacite` (`id`),
  CONSTRAINT `FK_5F275B29B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_5F275B29D5CBB404` FOREIGN KEY (`venteshowroom_id`) REFERENCES `venteshowroom` (`id`),
  CONSTRAINT `FK_5F275B29F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vente_stock`
--

LOCK TABLES `vente_stock` WRITE;
/*!40000 ALTER TABLE `vente_stock` DISABLE KEYS */;
INSERT INTO `vente_stock` VALUES (3,7,2,3,1,5,NULL,NULL,'2020-01-09 23:16:50',2,0),(4,7,3,3,1,25,NULL,NULL,'2020-01-10 01:06:38',2,2350),(5,7,3,3,1,25,NULL,NULL,'2020-01-10 01:08:02',2,2350),(6,7,2,3,0,3,NULL,NULL,'2020-01-10 01:08:40',3,7500),(7,7,2,3,0,3,NULL,NULL,'2020-01-10 01:12:08',3,7500);
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
  KEY `IDX_356D39D219EB6921` (`client_id`),
  CONSTRAINT `FK_356D39D219EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_356D39D2B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_356D39D2DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venteshowroom`
--

LOCK TABLES `venteshowroom` WRITE;
/*!40000 ALTER TABLE `venteshowroom` DISABLE KEYS */;
INSERT INTO `venteshowroom` VALUES (7,NULL,3,1,'BL-00007','2020-01-09',5,3,3,'2020-01-09-23-16','2020-01-10 01:08:40','2020-01-09 23:16:50',NULL,'0','2');
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

-- Dump completed on 2020-01-10  2:28:18
