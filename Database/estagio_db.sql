CREATE DATABASE  IF NOT EXISTS `estagio_db` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `estagio_db`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: estagio_db
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `processo` enum('','','') NOT NULL,
  `encaminhamento` tinyint(1) NOT NULL,
  `area` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `carga_horaria` int NOT NULL,
  `id_empresa` int NOT NULL,
  `id_estudante` int NOT NULL,
  `id_professor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_estudante` (`id_estudante`),
  KEY `id_professor` (`id_professor`),
  CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  CONSTRAINT `contrato_ibfk_2` FOREIGN KEY (`id_estudante`) REFERENCES `estudante` (`id`),
  CONSTRAINT `contrato_ibfk_3` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (1,'',1,'Desenvolvimento','2024-01-01','2024-06-30',120,1,1,1),(2,'',1,'Pesquisa','2024-02-01','2024-07-31',100,2,2,2),(3,'',0,'Estágio','2024-03-01','2024-08-31',80,3,3,3),(4,'',1,'Administração','2024-04-01','2024-09-30',140,4,4,4),(5,'',0,'Marketing','2024-05-01','2024-10-31',60,5,5,5);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `s_cargo` varchar(255) NOT NULL,
  `s_telefone` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `representante` varchar(255) NOT NULL,
  `r_funcao` varchar(255) NOT NULL,
  `r_cpf` char(11) NOT NULL,
  `r_rg` char(9) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `convenio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cnpj` (`cnpj`),
  UNIQUE KEY `s_telefone` (`s_telefone`),
  UNIQUE KEY `s_email` (`s_email`),
  UNIQUE KEY `r_cpf` (`r_cpf`),
  UNIQUE KEY `r_rg` (`r_rg`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Empresa A','contato@empresaa.com','12345678000195','João Silva','Gerente','1234-5678','supervisor@empresaa.com','Maria Oliveira','Representante','12345678901','123456789','São Paulo','Rua A, 123','9876-5432','Convênio A'),(2,'Empresa B','contato@empresab.com','23456789000196','Ana Souza','Coordenadora','2345-6789','supervisor@empresab.com','Carlos Pereira','Representante','23456789012','234567890','Rio de Janeiro','Rua B, 456','8765-4321','Convênio B'),(3,'Empresa C','contato@empresac.com','34567890000197','Pedro Santos','Diretor','3456-7890','supervisor@empresac.com','Fernanda Lima','Representante','34567890123','345678901','Belo Horizonte','Rua C, 789','7654-3210','Convênio C'),(4,'Empresa D','contato@empresad.com','45678901000198','Lucas Almeida','Gerente','4567-8901','supervisor@empresad.com','Juliana Costa','Representante','45678901234','456789012','Curitiba','Rua D, 101','6543-2109','Convênio D'),(5,'Empresa E','contato@empresae.com','56789012000199','Mariana Rocha','Coordenadora','5678-9012','supervisor@empresae.com','Roberto Martins','Representante','56789012345','567890123','Salvador','Rua E, 202','5432-1098','Convênio E');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudante`
--

DROP TABLE IF EXISTS `estudante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudante` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matricula` char(12) NOT NULL,
  `cpf` char(11) NOT NULL,
  `rg` char(9) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT (NULL),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `matricula` (`matricula`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `rg` (`rg`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudante`
--

LOCK TABLES `estudante` WRITE;
/*!40000 ALTER TABLE `estudante` DISABLE KEYS */;
INSERT INTO `estudante` VALUES (1,'Carlos Silva','carlos.silva@example.com','20230001','12345678901','123456789','São Paulo','Av. Paulista, 100','11987654321',NULL),(2,'Fernanda Lima','fernanda.lima@example.com','20230002','23456789012','234567890','Rio de Janeiro','Rua das Flores, 200','21987654321',NULL),(3,'Lucas Almeida','lucas.almeida@example.com','20230003','34567890123','345678901','Belo Horizonte','Rua das Pedras, 300','31987654321',NULL),(4,'Ana Souza','ana.souza@example.com','20230004','45678901234','456789012','Curitiba','Rua do Sol, 400','41987654321',NULL),(5,'Pedro Santos','pedro.santos@example.com','20230005','56789012345','567890123','Salvador','Rua da Lua, 500','51987654321',NULL);
/*!40000 ALTER TABLE `estudante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `siape` char(8) NOT NULL,
  `cpf` char(11) NOT NULL,
  `rg` char(9) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `funcao` enum('professor','coordenador') NOT NULL,
  `foto` varchar(255) DEFAULT (NULL),
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `siape` (`siape`),
  UNIQUE KEY `rg` (`rg`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Dr. João Mendes','joao.mendes@example.com','12345678','12345678901','123456789','São Paulo','Rua dos Educadores, 10','11987654321','professor',NULL),(2,'Profa. Ana Clara','ana.clara@example.com','23456789','23456789012','234567890','Rio de Janeiro','Av. dos Professores, 20','21987654321','coordenador',NULL),(3,'Dr. Lucas Martins','lucas.martins@example.com','34567890','34567890123','345678901','Belo Horizonte','Rua dos Mestres, 30','31987654321','professor',NULL),(4,'Profa. Fernanda Rocha','fernanda.rocha@example.com','45678901','45678901234','456789012','Curitiba','Av. das Ciências, 40','41987654321','coordenador',NULL),(5,'Dr. Pedro Souza','pedro.souza@example.com','56789012','56789012345','567890123','Salvador','Rua da Educação, 50','51987654321','professor',NULL);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(12) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int NOT NULL,
  `foto` varchar(255) DEFAULT (NULL),
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'carloss','senha123',1,NULL),(2,'fernandal','senha456',2,NULL),(3,'lucasal','senha789',1,NULL),(4,'anasouza','senha101',2,NULL),(5,'pedros','senha202',1,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-06 11:35:08
