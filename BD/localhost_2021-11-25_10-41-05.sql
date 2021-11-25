-- Auto Backup for MySQL Professional Edition 4.1
--
-- Host: localhost
--
-- MySQL Server Version: 5.5.5-10.4.21-MariaDB
--
-- 2021-11-25 10:41:05
--
-- ------------------------------------------------------

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
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `project` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `project`;
DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'hola@admin.com','1234abcd..');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES ('5f88b43712884','5f88b43714dbe'),('5f88b43761aa1','5f88b437621f3'),('60b1bfcdd5b6b','60b1bfcdeb924'),('60b1bfce33684','60b1bfce3cccd'),('60b1c1744c7a8','60b1c174a76b3'),('60b1c174eedb3','60b1c17504545'),('60b1c17545a31','60b1c1754c56f'),('60b43bb543107','60b43bb56e2fd'),('60b43bb5a3478','60b43bb5af3f7'),('60b43bb608839','60b43bb61ffa3');
INSERT INTO `answer` VALUES ('60b43bb641d71','60b43bb648e0f'),('60b43bb67c6cf','60b43bb685d89'),('60b43bb6ad6b1','60b43bb6b6f36');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES ('5f87ca01c593b','Usuario','configuroweb@gmail.com','problemas con la pregunta 3','no estoy de acuerdo con la pregunta 3, no me parece una opción exacta, sería mejor una pregunta abierta.','2020-10-15','06:03:13am');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES ('oralia.suarez@up.ac.pa','60b1c134568da',15,3,3,0,'2021-05-29 04:33:36'),('oralia.suarez@up.ac.pa','60b1be6dcaf49',2,2,2,0,'2021-05-29 04:55:52'),('suyitza@mail.com','60b43adbd1d85',25,6,5,1,'2021-05-31 01:31:40');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES ('5f88b43712884','p','5f88b43714dba'),('5f88b43712884','print','5f88b43714dbe'),('5f88b43712884','echo','5f88b43714dbf'),('5f88b43712884','console.log','5f88b43714dc0'),('5f88b43761aa1','#','5f88b437621f3'),('5f88b43761aa1','*','5f88b437621f8'),('5f88b43761aa1','//','5f88b437621fa'),('5f88b43761aa1','--','5f88b437621fb'),('60b1bfcdd5b6b','10','60b1bfcdeb924'),('60b1bfcdd5b6b','9','60b1bfcdeb92c');
INSERT INTO `options` VALUES ('60b1bfcdd5b6b','8','60b1bfcdeb92d'),('60b1bfcdd5b6b','11','60b1bfcdeb92e'),('60b1bfce33684','6 M','60b1bfce3ccc4'),('60b1bfce33684','5 M','60b1bfce3cccb'),('60b1bfce33684','4 M','60b1bfce3cccd'),('60b1bfce33684','2 M','60b1bfce3ccce'),('60b1c1744c7a8','2','60b1c174a76b3'),('60b1c1744c7a8','5','60b1c174a76b8'),('60b1c1744c7a8','8','60b1c174a76b9'),('60b1c1744c7a8','10','60b1c174a76ba');
INSERT INTO `options` VALUES ('60b1c174eedb3','1','60b1c1750453d'),('60b1c174eedb3','15','60b1c17504543'),('60b1c174eedb3','2','60b1c17504544'),('60b1c174eedb3','4','60b1c17504545'),('60b1c17545a31','9','60b1c1754c569'),('60b1c17545a31','6','60b1c1754c56f'),('60b1c17545a31','4','60b1c1754c570'),('60b1c17545a31','1','60b1c1754c571'),('60b43bb543107','e','60b43bb56e2f1'),('60b43bb543107','i','60b43bb56e2fa');
INSERT INTO `options` VALUES ('60b43bb543107','u','60b43bb56e2fb'),('60b43bb543107','a','60b43bb56e2fd'),('60b43bb5a3478','e','60b43bb5af3f7'),('60b43bb5a3478','i','60b43bb5af405'),('60b43bb5a3478','u','60b43bb5af407'),('60b43bb5a3478','o','60b43bb5af409'),('60b43bb608839','a','60b43bb61ff9a'),('60b43bb608839','i','60b43bb61ffa3'),('60b43bb608839','o','60b43bb61ffa5'),('60b43bb608839','u','60b43bb61ffa6');
INSERT INTO `options` VALUES ('60b43bb641d71','a','60b43bb648e03'),('60b43bb641d71','i','60b43bb648e0d'),('60b43bb641d71','o','60b43bb648e0f'),('60b43bb641d71','u','60b43bb648e10'),('60b43bb67c6cf','u','60b43bb685d89'),('60b43bb67c6cf','i','60b43bb685d92'),('60b43bb67c6cf','o','60b43bb685d94'),('60b43bb67c6cf','a','60b43bb685d95'),('60b43bb6ad6b1','a','60b43bb6b6f36'),('60b43bb6ad6b1','a','60b43bb6b6f3f');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `prof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof` (
  `prof_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `prof` WRITE;
/*!40000 ALTER TABLE `prof` DISABLE KEYS */;
INSERT INTO `prof` VALUES (1393,'maximo@mail.com','123.abc.');
/*!40000 ALTER TABLE `prof` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES ('5f88b3cd0a5d9','5f88b43712884','Para mostrar texto en la consola usamos el comando',4,1),('5f88b3cd0a5d9','5f88b43761aa1','¿Qué símbolo se utiliza para comentar una línea de código?',4,2),('60b1be6dcaf49','60b1bfcdd5b6b','Cuantas provincias tiene panamá',4,1),('60b1be6dcaf49','60b1bfce33684','Cuanta población hay actualmente',4,2),('60b1c134568da','60b1c1744c7a8','1 + 1',4,1),('60b1c134568da','60b1c174eedb3','2 + 2',4,2),('60b1c134568da','60b1c17545a31','3 + 3',4,3),('60b43adbd1d85','60b43bb543107','Cual es la primer vocal',4,1),('60b43adbd1d85','60b43bb5a3478','Cual es la segunda vocal',4,2),('60b43adbd1d85','60b43bb608839','Cual es la tercera Vocal',4,3);
INSERT INTO `questions` VALUES ('60b43adbd1d85','60b43bb641d71','Cual es la cuarta vocal',4,4),('60b43adbd1d85','60b43bb67c6cf','Cual es la quinta vocal',4,5),('60b43adbd1d85','60b43bb6ad6b1','sfdsfkjsdfkjds',4,6);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES ('5f88b3cd0a5d9','Python Básico',1,1,2,5,'Examen básico de Python','#pythontest','2020-10-16 02:24:50'),('60b1be6dcaf49','Historia De Panam??',1,0,2,2,'Esto es una prueba','#hsitoria','2021-05-29 04:09:17'),('60b1c134568da','Matematicas Para Noob',5,0,3,3,'matebruticas','#matematicas','2021-05-29 04:21:08'),('60b43adbd1d85','Examen De Espa??ol ',5,0,6,2,'Este es un examen de español','#Español','2021-05-31 01:24:43');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `rank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `rank` WRITE;
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;
INSERT INTO `rank` VALUES ('operador@cweb.com',1,'2020-10-15 09:25:31'),('oralia.suarez@up.ac.pa',17,'2021-05-29 04:55:53'),('suyitza@mail.com',25,'2021-05-31 01:31:40');
/*!40000 ALTER TABLE `rank` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Operador','M','operador','operador@cweb.com',3122344523,'4b67deeb9aba04a5b54632ad19934f26'),('Oralia Suarez','F','Universidad de Panamá','oralia.suarez@up.ac.pa',0,'3028879ab8d5c87dc023049fa5bb5c1a'),('Suyitza Castillo','M','Golden Lion','suyitza@mail.com',66655544,'3aac3ec89835b5d0a457a45fccd03e52'),('Usuario','M','usuario','usuario@cweb.com',3102451327,'4b67deeb9aba04a5b54632ad19934f26');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
-- Backing up events for database 'project'
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
