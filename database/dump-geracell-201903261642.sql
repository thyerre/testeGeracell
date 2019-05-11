-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: geracell
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.16.04.2

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text,
  `img` text,
  `bo_ativo` tinyint(1) DEFAULT '1',
  `sort_order` int(11) DEFAULT NULL,
  `cpf` text,
  `endereco` text,
  `telefone` text,
  `pessoa_referencia` text,
  `email` text,
  `dt_nascimento` text,
  `color` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Sem Cliente',NULL,1,NULL,'','','','','','',NULL,'2019-02-13 03:17:43','2019-02-13 03:16:50'),(6,'Thainara Neves da Silva','020242_20190212_papers.co-ar65-apple-macos-sierra-mountain-wwdc-official-25-wallpaper.jpg',1,NULL,'656894610019',NULL,'21952368444','Thyerre Rangel (Namorado)','thainaragatinha@hotmail.com','24/09/1998',NULL,'2019-02-12 04:02:42','2019-02-12 04:02:36'),(7,'Thyerre Rangel Morais da Silva','161530_20190212_apple-mac-icon-5.png',1,NULL,'068656397154','Rua m19 quadra 9A \nlote 08\nnúmero 16\nsetor: Novo Horizonte','99712544851','Iraci da Silva Ferreira','thyerre321@gmail.com','15/04/1997',NULL,'2019-02-14 03:04:04','2019-02-12 18:14:08'),(8,'Thyerre Rangel M Silva','180251_20190321_44495379_1016632185182567_7803583929016909824_n.jpg',1,NULL,'555236100115','Rua m 19 quadra nove a lote 20','064888532147','Thiago alencar','kleber107@gmail.com','04/02/1985',NULL,'2019-03-21 21:02:52','2019-02-13 03:05:04'),(9,'Carlos Alberto de Nobrega',NULL,1,NULL,'032225589674','Rua castro de sousa numero 14 setor novo Horizonte','062995874125','Taniá de Souza','Carlos@gmail.com','12/06/2014',NULL,'2019-02-13 03:17:43','2019-02-13 03:16:50'),(10,'Milena',NULL,1,NULL,'1234567891011',NULL,'(64)66666666','6633','fulano@gmail.com','651236',NULL,'2019-03-03 23:25:59','2019-03-03 23:25:59');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pagamento`
--

DROP TABLE IF EXISTS `forma_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forma_pagamento` (
  `id_formapagamento` int(11) NOT NULL AUTO_INCREMENT,
  `ds_formapagamento` text,
  `abreviatura` text,
  `bo_ativo` tinyint(1) DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_formapagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pagamento`
--

LOCK TABLES `forma_pagamento` WRITE;
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
INSERT INTO `forma_pagamento` VALUES (1,'AVISTA','AVISTA',1,NULL,'2019-03-24 18:35:14'),(2,'CARTÃO DE CREDITO','CRED',1,NULL,'2019-03-24 18:35:14'),(3,'CARTÃO DE DEBITO','DEB',1,NULL,'2019-03-24 18:35:14'),(4,'NOTA','NOTA',1,NULL,'2019-03-24 18:35:14');
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasia` text,
  `cnpj` text,
  `bo_ativo` tinyint(1) DEFAULT '1',
  `telefone` text,
  `ins_est` text,
  `observacao` text,
  `nome_contato` text,
  `razao_social` text,
  `endereco` text,
  `pais` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Xiaomi Tech','3362514447820001',1,'06488857154','1124511245',NULL,'Carlos','9965871100145','Cidade do mexico','Mexico','2019-02-20 21:57:44','2019-02-20 18:27:07'),(2,'Anex LTDA','65552147552211',1,'9958472211','112540366658','teste','thyerre Rangel','Anex developer','rua m 30 quadra 9A','Brasil','2019-02-20 22:16:04','2019-02-20 21:57:26');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcela`
--

DROP TABLE IF EXISTS `parcela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcela` (
  `id_parcela` int(11) NOT NULL AUTO_INCREMENT,
  `id_saida` int(11) NOT NULL,
  `bo_ativo` tinyint(1) DEFAULT '1',
  `tipo_parcela` varchar(45) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_parcela`),
  KEY `fk_parcela_saida1` (`id_saida`),
  CONSTRAINT `fk_parcela_saida1` FOREIGN KEY (`id_saida`) REFERENCES `saida` (`id_saida`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcela`
--

LOCK TABLES `parcela` WRITE;
/*!40000 ALTER TABLE `parcela` DISABLE KEYS */;
INSERT INTO `parcela` VALUES (15,35,1,'CRED','2019-03-25 15:22:42','2019-03-25 15:22:42'),(16,36,1,'AVISTA','2019-03-25 17:06:25','2019-03-25 17:06:25'),(17,37,1,'NOTA','2019-03-25 17:47:41','2019-03-25 17:47:41'),(18,38,1,'AVISTA','2019-03-25 21:00:10','2019-03-25 21:00:10'),(19,39,1,'NOTA','2019-03-25 21:06:39','2019-03-25 21:06:39');
/*!40000 ALTER TABLE `parcela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcela_entrada`
--

DROP TABLE IF EXISTS `parcela_entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcela_entrada` (
  `id_parcelaentrada` int(11) NOT NULL AUTO_INCREMENT,
  `vl_entrada` decimal(10,2) DEFAULT '0.00',
  `id_parcela` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_parcelaentrada`),
  KEY `fk_parcela_entrada_parcela1` (`id_parcela`),
  CONSTRAINT `fk_parcela_entrada_parcela1` FOREIGN KEY (`id_parcela`) REFERENCES `parcela` (`id_parcela`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcela_entrada`
--

LOCK TABLES `parcela_entrada` WRITE;
/*!40000 ALTER TABLE `parcela_entrada` DISABLE KEYS */;
/*!40000 ALTER TABLE `parcela_entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcela_pagamento`
--

DROP TABLE IF EXISTS `parcela_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcela_pagamento` (
  `id_parcelapagamento` int(11) NOT NULL AUTO_INCREMENT,
  `vl_parcela` decimal(10,2) DEFAULT NULL,
  `porcento_juros` decimal(10,2) DEFAULT NULL,
  `bo_ativo` tinyint(1) DEFAULT '1',
  `bo_pago` tinyint(1) DEFAULT '0',
  `dt_vencimento` date DEFAULT NULL,
  `dt_pagamento` date DEFAULT NULL,
  `id_parcela` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_parcelapagamento`),
  KEY `fk_parcela_pagamento_parcela1` (`id_parcela`),
  CONSTRAINT `fk_parcela_pagamento_parcela1` FOREIGN KEY (`id_parcela`) REFERENCES `parcela` (`id_parcela`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcela_pagamento`
--

LOCK TABLES `parcela_pagamento` WRITE;
/*!40000 ALTER TABLE `parcela_pagamento` DISABLE KEYS */;
INSERT INTO `parcela_pagamento` VALUES (7,112.50,0.00,1,0,'2019-04-24',NULL,15,'2019-03-25 15:22:42','2019-03-25 15:22:42'),(8,112.50,0.00,1,0,'2019-05-25',NULL,15,'2019-03-25 15:22:42','2019-03-25 15:22:42'),(9,112.50,0.00,1,0,'2019-06-25',NULL,15,'2019-03-25 15:22:42','2019-03-25 15:22:42'),(10,112.50,0.00,1,0,'2019-07-26',NULL,15,'2019-03-25 15:22:42','2019-03-25 15:22:42'),(11,1210.00,0.00,1,1,'2019-03-25','2019-03-25',16,'2019-03-25 17:06:25','2019-03-25 17:06:25'),(12,2000.00,0.00,1,0,'2019-04-24',NULL,17,'2019-03-25 17:47:41','2019-03-25 17:47:41'),(13,2000.00,0.00,1,0,'2019-05-25',NULL,17,'2019-03-25 17:47:41','2019-03-25 17:47:41'),(14,490.00,0.00,1,1,'2019-03-25','2019-03-25',18,'2019-03-25 21:00:10','2019-03-25 21:00:10'),(15,882.50,0.00,1,0,'2019-04-24',NULL,19,'2019-03-25 21:06:39','2019-03-25 21:06:39'),(16,882.50,0.00,1,0,'2019-05-25',NULL,19,'2019-03-25 21:06:39','2019-03-25 21:06:39'),(17,882.50,0.00,1,0,'2019-06-25',NULL,19,'2019-03-25 21:06:39','2019-03-25 21:06:39'),(18,882.50,0.00,1,0,'2019-07-26',NULL,19,'2019-03-25 21:06:39','2019-03-25 21:06:39');
/*!40000 ALTER TABLE `parcela_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ds_produto` text,
  `img` text,
  `bo_ativo` tinyint(1) DEFAULT '1',
  `sort_order` int(11) DEFAULT NULL,
  `nu_referencia` text,
  `observacao` text,
  `fabricante` text,
  `vl_venda` decimal(8,2) DEFAULT NULL,
  `vl_custo` decimal(8,2) DEFAULT NULL,
  `dt_lancamento` text,
  `cores` text,
  `color` text,
  `fornecedor` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'xiaomi M2 play','225317_20190213_papers.co-ar65-apple-macos-sierra-mountain-wwdc-official-25-wallpaper.jpg',1,NULL,'1255400','atualizado para a venda\ntexto para a observação','xiaomi',1210.00,1222.00,'12/05/2018','preto,verde,amarelo',NULL,'xiaomi sic','2019-02-14 00:54:17','2019-02-14 00:07:18'),(2,'Galaxy S9sung plus','023900_20190214_papers.co-ar65-apple-macos-sierra-mountain-wwdc-official-25-wallpaper.jpg',1,NULL,'022147',NULL,'samsung',4000.00,3550.00,NULL,'preto,verde,amarelo',NULL,'samsung','2019-02-14 04:39:01','2019-02-14 04:39:01'),(3,'Lg k11+','162120_20190305_papers.co-ar65-apple-macos-sierra-mountain-wwdc-official-25-wallpaper.jpg',1,NULL,'5519',NULL,'lg',210.00,55.00,NULL,'Preto',NULL,'fortcell','2019-03-05 19:21:20','2019-03-03 23:22:26'),(4,'Pelicula de vidro S9+','145147_20190325_pelicula.jpg',1,NULL,'255417','Pelicula de vidro para galaxy s9 plus','S2 peliculas',30.00,25.00,NULL,'transparente',NULL,NULL,'2019-03-25 17:51:47','2019-03-25 17:51:47');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saida`
--

DROP TABLE IF EXISTS `saida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saida` (
  `id_saida` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `bo_ativo` tinyint(1) DEFAULT '1',
  `observacao` text,
  `dt_saida` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_saida`),
  KEY `fk_cliente_saida` (`id_cliente`),
  KEY `fk_usuario_cliente` (`id_usuario`),
  CONSTRAINT `fk_cliente_saida` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `fk_usuario_cliente` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saida`
--

LOCK TABLES `saida` WRITE;
/*!40000 ALTER TABLE `saida` DISABLE KEYS */;
INSERT INTO `saida` VALUES (35,8,1,0,NULL,'2019-03-25 12:22:42','2019-03-25 17:09:52','2019-03-25 15:22:42'),(36,9,1,1,NULL,'2019-03-25 14:06:25','2019-03-25 17:06:25','2019-03-25 17:06:25'),(37,10,1,1,NULL,'2019-03-25 14:47:41','2019-03-25 17:47:41','2019-03-25 17:47:41'),(38,8,1,1,NULL,'2019-03-25 18:00:09','2019-03-25 21:00:09','2019-03-25 21:00:09'),(39,7,1,1,NULL,'2019-03-25 18:06:39','2019-03-25 21:06:39','2019-03-25 21:06:39');
/*!40000 ALTER TABLE `saida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saida_despesa`
--

DROP TABLE IF EXISTS `saida_despesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saida_despesa` (
  `id_saidadespesa` int(11) NOT NULL AUTO_INCREMENT,
  `ds_despesa` text NOT NULL,
  `vl_despesa` decimal(10,2) DEFAULT '0.00',
  `qt_despesa` int(11) DEFAULT '1',
  `id_pessoaresponsavel` int(11) NOT NULL,
  `id_saida` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_saidadespesa`),
  KEY `fk_saida_despesa_saida1` (`id_saida`),
  CONSTRAINT `fk_saida_despesa_saida1` FOREIGN KEY (`id_saida`) REFERENCES `saida` (`id_saida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saida_despesa`
--

LOCK TABLES `saida_despesa` WRITE;
/*!40000 ALTER TABLE `saida_despesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `saida_despesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saida_produto`
--

DROP TABLE IF EXISTS `saida_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saida_produto` (
  `id_saidaproduto` int(11) NOT NULL AUTO_INCREMENT,
  `vl_produto` decimal(10,2) DEFAULT '0.00',
  `qt_produto` int(11) DEFAULT '1',
  `vl_desconto` decimal(10,2) DEFAULT '0.00',
  `id_saida` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_saidaproduto`),
  KEY `fk_saida_produto_saida` (`id_saida`),
  KEY `fk_saida_produto_produto` (`id_produto`),
  CONSTRAINT `fk_saida_produto_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `fk_saida_produto_saida` FOREIGN KEY (`id_saida`) REFERENCES `saida` (`id_saida`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saida_produto`
--

LOCK TABLES `saida_produto` WRITE;
/*!40000 ALTER TABLE `saida_produto` DISABLE KEYS */;
INSERT INTO `saida_produto` VALUES (17,210.00,1,0.00,35,3,'2019-03-25 15:22:42','2019-03-25 15:22:42'),(18,1210.00,1,210.00,36,1,'2019-03-25 17:06:25','2019-03-25 17:06:25'),(19,4000.00,1,0.00,37,2,'2019-03-25 17:47:41','2019-03-25 17:47:41'),(20,210.00,1,10.00,38,3,'2019-03-25 21:00:10','2019-03-25 21:00:10'),(21,30.00,1,10.00,38,4,'2019-03-25 21:00:10','2019-03-25 21:00:10'),(22,30.00,1,0.00,39,4,'2019-03-25 21:06:39','2019-03-25 21:06:39'),(23,4000.00,1,500.00,39,2,'2019-03-25 21:06:39','2019-03-25 21:06:39');
/*!40000 ALTER TABLE `saida_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saida_servico`
--

DROP TABLE IF EXISTS `saida_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saida_servico` (
  `id_saidaservico` int(11) NOT NULL AUTO_INCREMENT,
  `ds_servico` varchar(60) DEFAULT NULL,
  `vl_desconto` decimal(10,2) DEFAULT '0.00',
  `vl_servico` decimal(10,2) DEFAULT '0.00',
  `qt_servico` int(11) DEFAULT '1',
  `id_saida` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_entrega` date DEFAULT NULL,
  PRIMARY KEY (`id_saidaservico`),
  KEY `fk_saida_servico_saida1` (`id_saida`),
  CONSTRAINT `fk_saida_servico_saida1` FOREIGN KEY (`id_saida`) REFERENCES `saida` (`id_saida`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saida_servico`
--

LOCK TABLES `saida_servico` WRITE;
/*!40000 ALTER TABLE `saida_servico` DISABLE KEYS */;
INSERT INTO `saida_servico` VALUES (13,'serveço teste',0.00,120.00,1,35,'2019-03-25 15:22:42','2019-03-25 15:22:42',NULL),(14,'serveço teste',0.00,120.00,1,35,'2019-03-25 15:22:42','2019-03-25 15:22:42',NULL),(15,'concertar tela do J7 prime',0.00,250.00,1,38,'2019-03-25 21:00:10','2019-03-25 21:00:10',NULL);
/*!40000 ALTER TABLE `saida_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `endereco` text,
  `color` text,
  `bo_ativo` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','$2y$10$/FcHGfUYBv9AwQbXL5gRyOekGqOjhfycuUm7eekx4tdOb8XbBuAgC',NULL,NULL,1,NULL,'2019-02-11 21:51:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'geracell'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-26 16:42:08
