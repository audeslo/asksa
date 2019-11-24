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
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `categorie` VALUES (1,NULL,NULL,'Semi-grossite','des','grossite','2019-11-13 19:06:45',NULL);
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
INSERT INTO `client` VALUES (1,NULL,NULL,'009RF','Jéricho',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','tagnon-fils','2019-11-09 11:07:00',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','ABC SARL','354566'),(2,NULL,NULL,'010RF','Midombo',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','sonagnon-et-fils','2019-11-09 11:14:34',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','ABBE SA','4555675'),(3,NULL,NULL,'0011','SACRE COEUR',1,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','boco-fils','2019-11-09 11:16:30',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','ASSA','Clément'),(4,NULL,NULL,'0012','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','mika-fils','2019-11-09 11:17:56','2019-11-09 12:34:51','','',NULL,'','',1,NULL,NULL,NULL,'','SOBECIK','45678'),(5,NULL,NULL,'014RF','Ayélawadjè',1,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bodjrenou-fils','2019-11-09 11:19:25',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','AGOSSOU','Rachelle'),(6,NULL,NULL,'015RF','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','boco-fils-1','2019-11-09 11:20:09',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','CONTEX BENIN','9876R567'),(7,NULL,NULL,'0014','Ayélawadjè',1,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bov-fils','2019-11-09 11:21:05',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','AZONHISSOU','Emmanuel'),(8,NULL,NULL,'0017','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','boc-fils','2019-11-09 11:21:45',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','DANA SA','456789'),(9,NULL,NULL,'0018','Ayélawadjè',0,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','mikas-fils','2019-11-09 11:22:26',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','DONGAKO','345678765'),(10,NULL,NULL,'014REF','Ayélawadjè',0,'97678789','Cotonou','01 BP 2343','tagnon@yahoo.fr','bodjrenou-filss','2019-11-09 11:23:31',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'','GKS SARL','3456789'),(11,NULL,NULL,'009RFS','Midombo',1,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','tagnon-fils-1','2019-11-09 11:24:20',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'',NULL,NULL),(12,NULL,NULL,'0011S','Jéricho',1,'97678789','SAVALOU','01 BP 2343','tagnon@yahoo.fr','bocos-rene','2019-11-09 11:25:08',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'',NULL,NULL),(13,NULL,NULL,'0056','Germai',1,'97678789','ABOMEY-CALAVI','01 BP 2343','germ@hotmail.com','gbedinhessi','2019-11-09 12:33:45',NULL,'','',NULL,'','',1,NULL,NULL,NULL,'',NULL,NULL);
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
INSERT INTO `commande` VALUES (1,1,NULL,NULL,'commande pressé','2019-11-16','Salut','2019-11-16 12:35:09',NULL,'commande-presse','CD-00001'),(2,1,NULL,NULL,'Commande de bob','2019-11-16','RAS','2019-11-16 15:08:32',NULL,'commande-de-bob',NULL),(3,1,NULL,NULL,'Commande test reference','2019-11-16','RAS','2019-11-16 15:27:16',NULL,'commande-test-reference',NULL),(4,1,NULL,NULL,'Commande test reference 22','2019-11-16','reg','2019-11-16 15:38:35',NULL,'commande-test-reference-22','CD-00003');
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
INSERT INTO `commander` VALUES (2,2,1,200,5,'CD-00001/PD-00002-5B-4L',4,NULL,NULL,200,1,'cd-00001-pd-00002-5b-4l','2019-11-16 15:03:16',NULL),(3,1,1,120,5,'CD-00001/001-5B-2L',2,NULL,NULL,120,1,'cd-00001-001-5b-2l','2019-11-16 15:05:00',NULL);
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
  `etat` smallint(6) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_60333357DD7B2EBC` (`edited_by_id`),
  KEY `IDX_60333357B03A8386` (`created_by_id`),
  KEY `IDX_60333357F347EFB` (`produit_id`),
  KEY `IDX_603333572BA6E032` (`commandeshow_id`),
  CONSTRAINT `FK_603333572BA6E032` FOREIGN KEY (`commandeshow_id`) REFERENCES `commandeshow` (`id`),
  CONSTRAINT `FK_60333357B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_60333357DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_60333357F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commandershow`
--

LOCK TABLES `commandershow` WRITE;
/*!40000 ALTER TABLE `commandershow` DISABLE KEYS */;
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
INSERT INTO `commandeshow` VALUES (1,NULL,NULL,'listge prods','2019-11-24','CS-00001','Roland','listge-prods',NULL,NULL,1);
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
INSERT INTO `migration_versions` VALUES ('20191105180022','2019-11-06 15:22:16'),('20191106104541','2019-11-06 15:22:30'),('20191106113135','2019-11-06 15:22:39'),('20191111140211','2019-11-11 14:02:30'),('20191111141951','2019-11-11 14:19:56'),('20191112190758','2019-11-13 07:51:54'),('20191113054631','2019-11-13 07:51:54'),('20191113075535','2019-11-13 07:56:07'),('20191113180506','2019-11-13 18:07:53'),('20191115183941','2019-11-15 18:41:05'),('20191116113917','2019-11-16 11:40:38'),('20191116124456','2019-11-16 12:45:51'),('20191116143807','2019-11-16 14:38:27'),('20191119212641','2019-11-19 21:28:48'),('20191124161251','2019-11-24 16:14:06'),('20191124164734','2019-11-24 16:48:19'),('20191124164804','2019-11-24 16:48:20');
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
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prixventeconseiller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stockalerte` int(11) NOT NULL,
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
INSERT INTO `produit` VALUES (1,NULL,NULL,'001','HX5',4500,'4 litres','2019-11-11 15:20:04',NULL,'hx5','','','',0),(2,NULL,NULL,'PD-00002','HX7 (4)',7500,'10w-40','2019-11-11 15:22:03',NULL,'hx7-4','','','',0);
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
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1E2F444FDD7B2EBC` (`edited_by_id`),
  KEY `IDX_1E2F444FB03A8386` (`created_by_id`),
  CONSTRAINT `FK_1E2F444FB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_1E2F444FDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `showroom`
--

LOCK TABLES `showroom` WRITE;
/*!40000 ALTER TABLE `showroom` DISABLE KEYS */;
INSERT INTO `showroom` VALUES (1,NULL,NULL,'SR-00001','OLUWA TOBI','Agbodjedo','97 76 78 87','Roland ASSOGBE','98 87 77 89','rassog@yahoo.fr','oluwa-tobi',NULL,'2019-11-19 22:15:20');
/*!40000 ALTER TABLE `showroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sortie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by_id` int(11) DEFAULT NULL,
  `edited_by_id` int(11) DEFAULT NULL,
  `produit_id` int(11) NOT NULL,
  `vente_id` int(11) NOT NULL,
  `quantitecarton` int(11) NOT NULL,
  `capacitebidon` int(11) NOT NULL,
  `quantiteachete` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime NOT NULL,
  `created_on` datetime NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3C3FD3F2B03A8386` (`created_by_id`),
  KEY `IDX_3C3FD3F2DD7B2EBC` (`edited_by_id`),
  KEY `IDX_3C3FD3F2F347EFB` (`produit_id`),
  KEY `IDX_3C3FD3F27DC7170A` (`vente_id`),
  CONSTRAINT `FK_3C3FD3F27DC7170A` FOREIGN KEY (`vente_id`) REFERENCES `vente` (`id`),
  CONSTRAINT `FK_3C3FD3F2B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_3C3FD3F2DD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_3C3FD3F2F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sortie`
--

LOCK TABLES `sortie` WRITE;
/*!40000 ALTER TABLE `sortie` DISABLE KEYS */;
/*!40000 ALTER TABLE `sortie` ENABLE KEYS */;
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
  `montant` int(11) DEFAULT NULL,
  `bornesupperieur` int(11) DEFAULT NULL,
  `observation` longtext COLLATE utf8mb4_unicode_ci,
  `borneinferieure` int(11) DEFAULT NULL,
  `litre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E1ACC357BCF5E72D` (`categorie_id`),
  KEY `IDX_E1ACC357F347EFB` (`produit_id`),
  CONSTRAINT `FK_E1ACC357BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_E1ACC357F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifcategorieclt`
--

LOCK TABLES `tarifcategorieclt` WRITE;
/*!40000 ALTER TABLE `tarifcategorieclt` DISABLE KEYS */;
INSERT INTO `tarifcategorieclt` VALUES (1,1,2,12500,20,'RAZ',0,'5'),(2,1,2,1500,20,NULL,10,'5');
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
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdpconfirm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

--
-- Table structure for table `vente`
--

DROP TABLE IF EXISTS `vente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `edited_by_id` int(11) NOT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datevente` date NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edited_on` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_888A2A4C19EB6921` (`client_id`),
  KEY `IDX_888A2A4CDD7B2EBC` (`edited_by_id`),
  KEY `IDX_888A2A4CB03A8386` (`created_by_id`),
  CONSTRAINT `FK_888A2A4C19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_888A2A4CB03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_888A2A4CDD7B2EBC` FOREIGN KEY (`edited_by_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vente`
--

LOCK TABLES `vente` WRITE;
/*!40000 ALTER TABLE `vente` DISABLE KEYS */;
/*!40000 ALTER TABLE `vente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-24 18:57:17
