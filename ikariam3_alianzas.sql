-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: ikariam3
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alianzas`
--

DROP TABLE IF EXISTS `alianzas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alianzas` (
  `idalianza` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `server` varchar(45) NOT NULL,
  PRIMARY KEY (`idalianza`,`server`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alianzas`
--

LOCK TABLES `alianzas` WRITE;
/*!40000 ALTER TABLE `alianzas` DISABLE KEYS */;
INSERT INTO `alianzas` VALUES (1,'Monkeys of Kaos','Alpha'),(2,'-C4-','Kerberos'),(22,'TITANES','Kerberos'),(90,'KerberosKnights','Kerberos'),(101,'PIRATE KINGS','Kerberos'),(103,'Sir Dieciocho','Kerberos'),(113,'Hall Of Fail','Kerberos'),(116,'Cantera HERA','Kerberos'),(119,'-Arcangeles-z-','Kerberos'),(121,'Sñrs DemosReset','Kerberos'),(125,'Vatos Locos','Kerberos'),(128,'Tomahawk','Kerberos'),(132,'Blood Brothers','Kerberos'),(133,'HERA','Kerberos'),(134,'Reyes del cielo','Kerberos'),(140,'ORDEN DL DRAGON','Kerberos'),(143,'FAIRY TAIL','Kerberos'),(144,'The Killers','Kerberos'),(146,'Dark Avengers','Kerberos'),(152,'Apocalipsis','Kerberos'),(153,'Guardia Oscura','Kerberos'),(156,'DARK WARRIOR','Kerberos'),(159,'Let Me Alone','Kerberos'),(166,'Los Etcéteras','Kerberos'),(169,'Amor de Locos','Kerberos'),(180,'Elite Maligna','Kerberos'),(181,'Hijos del Mal','Kerberos'),(183,'TragonSiniestro','Kerberos'),(185,'MediaNoche','Kerberos'),(186,'ROMA - GRU','Kerberos'),(188,'Noche Oscura','Kerberos'),(195,'Schutzstaffel','Kerberos'),(198,'Chile','Kerberos'),(199,'Jaidefinichon','Kerberos'),(200,'CHL','Kerberos'),(201,'CRC','Kerberos'),(202,'Iquique','Kerberos'),(203,'No Molestar','Kerberos'),(206,'Murders','Kerberos'),(215,'Sigue a UNO','Kerberos'),(221,'KoKodriloZ','Kerberos'),(222,'KrewOfAssassins','Kerberos'),(224,'EDKillers','Kerberos'),(230,'The Dark Legion','Kerberos'),(239,'El Edén','Kerberos'),(251,'Spartans Elite','Kerberos'),(256,'Los12Apostoles','Kerberos'),(261,'Frateschi','Kerberos'),(275,'Husares d Mort','Kerberos'),(287,'Old leyendss','Kerberos'),(289,'ISP60 LOVE YOU','Kerberos'),(290,'CAN FAIRY TAIL','Kerberos'),(294,'Reinado Ikariam','Kerberos'),(298,'Hijos de Cronos','Kerberos'),(299,'JEFES y JEFES','Kerberos'),(301,'EXTREME CUALITY','Kerberos'),(302,'PNOvidio','Kerberos'),(306,'Los Perdidos','Kerberos'),(317,'SPQR','Kerberos'),(318,'Los Yakuzas','Kerberos'),(319,'Lobos de la osc','Kerberos'),(322,'DISOLUTOS','Kerberos'),(324,'Amigos de HoI','Kerberos'),(327,'Los Vikingos','Kerberos'),(336,'Blood Moon','Kerberos'),(337,'-Asesinos-','Kerberos'),(339,'Hassasins 3','Kerberos'),(342,'Ant Kingdom','Kerberos'),(346,'Olímpicos','Kerberos'),(347,'Kung Fu Panda','Kerberos'),(352,'Código de honor','Kerberos'),(353,'ORDEN','Kerberos'),(354,'INFRAWARRIORS','Kerberos'),(359,'Kung Fu Panda 2','Kerberos'),(364,'Alaghaesia','Kerberos'),(381,'DHC','Kerberos'),(382,'CHIVA HERMANOS','Kerberos'),(395,'GUARDIA CIVIL','Kerberos'),(403,'Arcadia','Kerberos'),(420,'pretorianos','Kerberos'),(422,'TNT','Kerberos'),(427,'KiLLeR BuNNieS','Kerberos'),(446,'HATCHI','Kerberos'),(457,'BEBE','Kerberos'),(462,'FLOTA DE MAR','Kerberos'),(463,'Friends','Kerberos'),(464,'ROMAG - Piratas','Kerberos'),(477,'BatallonDeTebas','Kerberos'),(480,'Duros','Kerberos'),(481,'Santa Xusta','Kerberos'),(486,'Monkeys0fKaos','Alpha'),(501,'Betianos Rules','Kerberos'),(506,'Imperio Griego','Kerberos'),(507,'Oasis','Kerberos'),(520,'HAKUNA MATATA','Kerberos'),(525,'SOLOS','Kerberos'),(531,'Las Wendy Sulca','Kerberos'),(540,'Shadow Garden','Kerberos'),(542,'Payro groso','Kerberos'),(552,'Game of Thrones','Kerberos'),(559,'BSK','Kerberos'),(564,'RNO','Kerberos'),(568,'CRECER EN PAZ','Kerberos'),(570,'NEW LEGACY','Kerberos'),(573,'soy pobre','Kerberos'),(583,'Aquelarre','Kerberos'),(588,'LOS CORSARIOS','Kerberos'),(590,'HOT','Kerberos'),(591,'CHIDOS','Kerberos'),(592,'H_M','Kerberos'),(594,'The Lone Wolf','Kerberos'),(595,'Seguidores','Kerberos'),(596,'BLEED','Kerberos'),(598,'Rapiña EDK','Kerberos'),(601,'tu y de lo mas','Kerberos'),(602,'Revolutions CO','Kerberos'),(605,'-TG-','Kerberos'),(607,'Guerreros X','Kerberos'),(610,'GOLD','Kerberos'),(613,'JOJO','Kerberos'),(615,'win war warior','Kerberos'),(616,'Resource thieve','Kerberos'),(617,'Amazonas','Kerberos'),(621,'Legión Guerrera','Kerberos'),(622,'LaGranTribuBaki','Kerberos'),(626,'GENERAL','Kerberos'),(627,'FsN','Kerberos'),(629,'OCA','Kerberos'),(631,'oRO mar','Kerberos'),(633,'Molusco Tacaño','Kerberos'),(634,'Gfez','Kerberos'),(635,'CarteLDSicarios','Kerberos'),(636,'MOSSAD','Kerberos'),(637,'compra - venta','Kerberos'),(639,'Honor y Gloria','Kerberos'),(641,'Todo suma','Kerberos'),(642,'LIGA DE DEL_265','Kerberos'),(643,'OTS','Kerberos'),(644,'old leyends','Kerberos'),(645,'SADMAN','Kerberos'),(646,'Empire_606','Kerberos'),(647,'maraja','Kerberos'),(648,'oro','Kerberos'),(649,'Hearts of Iron','Kerberos'),(650,'La Onda','Kerberos'),(651,'Antiguo Mundo R','Kerberos'),(652,'culones','Kerberos'),(653,'Gangsta Nation','Kerberos'),(654,'No Alianza','Kerberos'),(8136,'ImperioPLGA','Alpha'),(8571,'Mediterránea','Alpha'),(13980,'Leyendas','Alpha'),(15025,'Las Termitas','Alpha'),(16921,'LASOMBRANEGRA','Alpha'),(18786,'SARRACENOS','Alpha'),(26663,'NacionesUnidas','Alpha'),(28696,'El Clan','Alpha'),(29135,'DiosesGuerreros','Alpha'),(29186,'MILLENIUM','Alpha'),(29947,'Dragones DZeus','Alpha'),(30172,'FÉNIX','Alpha'),(30435,'Egeos Guardian','Alpha'),(30549,'ZASSKA','Alpha'),(30768,'COMA','Alpha'),(31098,'Brotherhood','Alpha'),(31116,'Bukaneros','Alpha'),(31161,'ExTroyanos','Alpha'),(31188,'GLADIADORES','Alpha'),(31199,'LOSTEMPLARIOS','Alpha'),(31201,'Templarios','Alpha'),(31207,'AMOS','Alpha'),(31208,'MASTER','Alpha'),(31215,'Rufian d Ikario','Alpha'),(31217,'Hyperion','Alpha'),(31219,'PretorianGuard','Alpha'),(31223,'El IMPERIO','Alpha'),(31241,'Jajay','Alpha'),(31254,'RufianesLatinos','Alpha'),(31258,'LOGIA LAUTARO','Alpha'),(31259,'LegionPompeyo','Alpha'),(31270,'AveFénix','Alpha'),(31276,'LonneyTunes','Alpha'),(31277,'PIRATAS','Alpha'),(31282,'RULZ','Alpha'),(31285,'AVALON FURAS','Alpha'),(31293,'Mercenarios','Alpha'),(31301,'Orden Friends','Alpha'),(31304,'xXScreAmOxX','Alpha'),(31372,'Pipo','Alpha'),(31446,'VADERBATIRONMAN','Alpha'),(31457,'Bastard Of Kaos','Alpha'),(31459,'CHUCHOS','Alpha'),(31516,'DEATH','Alpha'),(31549,'Fuego y Sangre','Alpha'),(31633,'Jodidos','Alpha'),(31643,'Casiterasos','Alpha'),(31659,'Destructores','Alpha'),(31678,'ROJO PANDEMONIO','Alpha');
/*!40000 ALTER TABLE `alianzas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-25  0:12:00
