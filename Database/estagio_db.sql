CREATE DATABASE  IF NOT EXISTS `estagio_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `estagio_db`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: estagio_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `banca`
--

DROP TABLE IF EXISTS `banca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `banca_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banca`
--

LOCK TABLES `banca` WRITE;
/*!40000 ALTER TABLE `banca` DISABLE KEYS */;
/*!40000 ALTER TABLE `banca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `processo` enum('Impresso','Físico','Digital') NOT NULL,
  `encaminhamento` enum('Documentos Faltantes','Documentos Confirmados') NOT NULL,
  `area` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `media_final` int(11) DEFAULT 0,
  `supervisor` varchar(255) NOT NULL,
  `s_cargo` varchar(255) NOT NULL,
  `s_telefone` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `observacao` text DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_estudante` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_estudante` (`id_estudante`),
  KEY `id_professor` (`id_professor`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`),
  CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`id_estudante`) REFERENCES `estudantes` (`id`),
  CONSTRAINT `contratos_ibfk_3` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (11,'Impresso','Documentos Confirmados','Desenvolvimento de Software','2023-01-10','2023-06-10',300,85,'','','','','Contrato de estágio para desenvolvimento de software.',6,6,6),(12,'Digital','Documentos Faltantes','Marketing Digital','2023-02-15','2023-07-15',240,90,'','','','','Estágio em marketing digital com foco em redes sociais.',7,7,7),(13,'Físico','Documentos Confirmados','Engenharia','2023-03-01','2023-08-01',360,88,'','','','','Estágio em engenharia civil, acompanhamento de obras.',8,8,8),(14,'Impresso','Documentos Faltantes','Administração','2023-04-05','2023-09-05',180,92,'','','','','Estágio em administração de empresas, apoio em gestão.',9,9,9),(15,'Digital','Documentos Confirmados','Recursos Humanos','2023-05-10','2023-10-10',200,87,'','','','','Estágio em recursos humanos, recrutamento e seleção.',10,10,10);
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('Termo de Compromisso','Plano de Atividades de Estágio','Ficha de Autoavaliação','Ficha de Avaliação da Empresa','Relatório final') DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contrato_id` (`contrato_id`),
  CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cnpj` (`cnpj`),
  UNIQUE KEY `r_cpf` (`r_cpf`),
  UNIQUE KEY `r_rg` (`r_rg`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (6,'Empresa A','contato@empresaA.com','12345678000195','Maria Souza','Diretora','12345678901','MG123456','São Paulo','Rua A, 123','1134567890','Convênio X'),(7,'Empresa B','contato@empresaB.com','98765432000196','Carlos Oliveira','Gerente','10987654321','MG654321','Rio de Janeiro','Rua B, 456','2134567890','Convênio Y'),(8,'Empresa C','contato@empresaC.com','12312313000197','Fernanda Lima','Coordenadora','19876543210','MG789012','Belo Horizonte','Rua C, 789','3134567890','Convênio Z'),(9,'Empresa D','contato@empresaD.com','32132132000198','Roberto Santos','Diretor','98765432109','MG345678','Salvador','Rua D, 101','4134567890','Convênio W'),(10,'Empresa E','contato@empresaE.com','45645645000199','Julio Mendes','Coordenador','87654321098','MG234567','Curitiba','Rua E, 202','5134567890','Convênio V');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudantes`
--

DROP TABLE IF EXISTS `estudantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matricula` char(12) NOT NULL,
  `matricula_ativa` tinyint(1) DEFAULT 0,
  `cpf` char(11) NOT NULL,
  `rg` char(9) NOT NULL,
  `data_nasc` date NOT NULL,
  `res_nome` varchar(255) DEFAULT NULL,
  `res_email` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `matricula` (`matricula`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `rg` (`rg`),
  UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudantes`
--

LOCK TABLES `estudantes` WRITE;
/*!40000 ALTER TABLE `estudantes` DISABLE KEYS */;
INSERT INTO `estudantes` VALUES (6,'Carlos Almeida','carlos.almeida@email.com','20210001',1,'12345678901','MG1234567','2000-01-15','Ana Almeida','ana.almeida@email.com','São Paulo','Av. Paulista, 1000','11987654321',NULL),(7,'Fernanda Lima','fernanda.lima@email.com','20210002',1,'23456789012','MG2345678','1999-02-20','José Lima','jose.lima@email.com','Rio de Janeiro','Rua da Praia, 200','21987654321',NULL),(8,'Roberto Santos','roberto.santos@email.com','20210003',1,'34567890123','MG3456789','1998-03-25','Maria Santos','maria.santos@email.com','Belo Horizonte','Rua das Flores, 300','31987654321',NULL),(9,'Juliana Costa','juliana.costa@email.com','20210004',1,'45678901234','MG4567890','2001-04-30','Paulo Costa','paulo.costa@email.com','Salvador','Rua das Árvores, 400','41987654321',NULL),(10,'Lucas Rocha','lucas.rocha@email.com','20210005',1,'56789012345','MG5678901','2002-05-05','Mariana Rocha','mariana.rocha@email.com','Curitiba','Rua do Sol, 500','51987654321',NULL);
/*!40000 ALTER TABLE `estudantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (6,'Dr. André Martins','andre.martins@universidade.com','12345678','12345678901','MG1234567','São Paulo','Rua dos Professores, 50','11987654322','professor',NULL),(7,'Profa. Beatriz Souza','beatriz.souza@universidade.com','23456789','23456789012','MG2345678','Rio de Janeiro','Av. dos Educadores, 150','21987654323','professor',NULL),(8,'Prof. Carlos Silva','carlos.silva@universidade.com','34567890','34567890123','MG3456789','Belo Horizonte','Rua do Saber, 250','31987654324','coordenador',NULL),(9,'Profa. Daniela Lima','daniela.lima@universidade.com','45678901','45678901234','MG4567890','Salvador','Av. da Educação, 350','41987654325','professor',NULL),(10,'Prof. Eduardo Ferreira','eduardo.ferreira@universidade.com','56789012','56789012345','MG5678901','Curitiba','Rua da Inovação, 450','51987654326','coordenador',NULL);
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(12) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` int(11) DEFAULT 1,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','senha123',1,NULL),(2,'professor1','senha456',2,NULL),(3,'estudante1','senha789',3,NULL),(4,'coordenador1','senha000',2,NULL),(5,'usuario1','senha111',3,NULL);
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

-- Dump completed on 2024-11-19  8:07:00
