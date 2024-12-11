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
-- Table structure for table `bancas`
--

DROP TABLE IF EXISTS `bancas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bancas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_contrato` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `banca_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancas`
--

LOCK TABLES `bancas` WRITE;
/*!40000 ALTER TABLE `bancas` DISABLE KEYS */;
INSERT INTO `bancas` VALUES (6,'Banca A','bancaA@example.com',11),(7,'Banca B','bancaB@example.com',12),(8,'Banca C','bancaC@example.com',13),(9,'Banca D','bancaD@example.com',14);
/*!40000 ALTER TABLE `bancas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contratos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `processo` enum('Impresso','Físico','Digital') not null,
  `encaminhamento` enum('Documentos Faltantes','Documentos Confirmados') NOT NULL,
  `area` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `media_final` int DEFAULT '0',
  `supervisor` varchar(255) NOT NULL,
  `s_cargo` varchar(255) NOT NULL,
  `s_telefone` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `observacao` text,
  `encerramento` tinyint(1) DEFAULT '0',
  `id_empresa` int NOT NULL,
  `id_estudante` int NOT NULL,
  `id_professor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_estudante` (`id_estudante`),
  KEY `id_professor` (`id_professor`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`id_estudante`) REFERENCES `estudantes` (`id`),
  CONSTRAINT `contratos_ibfk_3` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (11,'Impresso','Documentos Confirmados','Administração','2023-01-01','2023-12-31',85,'Supervisor A','Gerente','123456789','supervisorA@example.com',NULL,0,1,6,1),(12,'Físico','Documentos Faltantes','Engenharia','2023-02-01','2023-11-30',90,'Supervisor B','Coordenador','987654321','supervisorB@example.com',NULL,0,2,7,2),(13,'Digital','Documentos Confirmados','Saúde','2023-03-01','2023-10-31',75,'Supervisor C','Gerente','456789123','supervisorC@example.com',NULL,0,3,8,3),(14,'Impresso','Documentos Faltantes','Educação','2023-04-01','2023-09-30',80,'Supervisor D','Coordenador','321654987','supervisorD@example.com',NULL,0,4,9,4);
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `carga_horaria` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Curso A',40),(2,'Curso B',60),(3,'Curso C',80),(4,'Curso D',100),(5,'Curso E',120);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` enum('Termo de Compromisso','Plano de Atividades de Estágio','Ficha de Autoavaliação','Ficha de Avaliação da Empresa','Relatório final') NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_contrato` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contrato_id` (`id_contrato`),
  CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (9,'Termo de Compromisso','um',11),(10,'Plano de Atividades de Estágio','um',11),(11,'Ficha de Autoavaliação','um',11),(12,'Ficha de Avaliação da Empresa','um',11);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `representante` varchar(255) NOT NULL,
  `r_funcao` varchar(255) NOT NULL,
  `r_cpf` char(11) NOT NULL,
  `r_rg` char(9) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `convenio` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `razao_social` (`razao_social`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cnpj` (`cnpj`),
  UNIQUE KEY `r_cpf` (`r_cpf`),
  UNIQUE KEY `r_rg` (`r_rg`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'HOS','HOS sistemas LTDA.','hossistemas@gmail.com','12345678912','Representante A','Diretor','12345678901','123456789','Cidade A','Endereço A','123456789','Convênio A',NULL),(2,'Empresa B','Empresa B LTDA','empresaB@example.com','12345678000196','Representante B','Gerente','12345678902','123456790','Cidade B','Endereço B','987654321','Convênio B',NULL),(3,'Empresa C','Empresa C LTDA','empresaC@example.com','12345678000197','Representante C','Coordenador','12345678903','123456791','Cidade C','Endereço C','456789123','Convênio C',NULL),(4,'Empresa D','Empresa D LTDA','empresaD@example.com','12345678000198','Representante D','Diretor','12345678904','123456792','Cidade D','Endereço D','321654987','Convênio D',NULL),(5,'Empresa E','Empresa E LTDA','empresaE@example.com','12345678000199','Representante E','Gerente','12345678905','123456793','Cidade E','Endereço E','654321789','Convênio E',NULL);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudantes`
--

DROP TABLE IF EXISTS `estudantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudantes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matricula` char(12) NOT NULL,
  `matricula_ativa` tinyint(1) DEFAULT '0',
  `ano_curso` int NOT NULL,
  `cpf` char(11) NOT NULL,
  `rg` char(9) NOT NULL,
  `data_nasc` date NOT NULL,
  `res_nome` varchar(255) DEFAULT NULL,
  `res_email` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `id_curso` int NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `matricula` (`matricula`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `rg` (`rg`),
  UNIQUE KEY `telefone` (`telefone`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `estudantes_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudantes`
--

LOCK TABLES `estudantes` WRITE;
/*!40000 ALTER TABLE `estudantes` DISABLE KEYS */;
INSERT INTO `estudantes` VALUES (6,'estevan','estevan.zimermann@gmail.com','20230001',1,1,'12345678912','123456789','2000-01-01','Responsável A','resA@example.com','Cidade A','Endereço A','123456789',1,NULL),(7,'Estudante B','estudanteB@example.com','20230002',0,2,'12345678902','123456790','2000-02-01','Responsável B','resB@example.com','Cidade B','Endereço B','987654321',2,NULL),(8,'Estudante C','estudanteC@example.com','20230003',1,3,'12345678903','123456791','2000-03-01','Responsável C','resC@example.com','Cidade C','Endereço C','456789123',3,NULL),(9,'Estudante D','estudanteD@example.com','20230004',1,4,'12345678904','123456792','2000-04-01','Responsável D','resD@example.com','Cidade D','Endereço D','321654987',4,NULL),(10,'Estudante E','estudanteE@example.com','20230005',1,5,'12345678905','123456793','2000-05-01','Responsável E','resE@example.com','Cidade E','Endereço E','654321789',5,NULL);
/*!40000 ALTER TABLE `estudantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professores` (
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
  `foto` varchar(255) DEFAULT NULL,
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
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (1,'Luiz E','luizec2007@gmail.com','12345678','12345678912','123456789','Cidade A','Endereço A','123456789','professor',NULL),(2,'Professor B','professorB@example.com','23456789','12345678902','123456790','Cidade B','Endereço B','987654321','coordenador',NULL),(3,'Professor C','professorC@example.com','34567890','12345678903','123456791','Cidade C','Endereço C','456789123','professor',NULL),(4,'Professor D','professorD@example.com','45678901','12345678904','123456792','Cidade D','Endereço D','321654987','coordenador',NULL),(5,'Professor E','professorE@example.com','56789012','12345678905','123456793','Cidade E','Endereço E','654321789','professor',NULL);
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int DEFAULT '1',
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `login_2` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'secaoestagio@gmail.com','21232f297a57a5a743894a0e4a801fc3',4,'logo.png'),(2,'estevan.zimermann@gmail.com','faf5341a39919352a4f9bde4d6de5396',1,'estevan.png'),(3,'luizec2007@gmail.com','faf5341a39919352a4f9bde4d6de5396',2,'luiz.png'),(4,'hossistemas@gmail.com','faf5341a39919352a4f9bde4d6de5396',3,'hos.png');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-11  8:27:11
