-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: localhost    Database: seriales_db
-- ------------------------------------------------------
-- Server version	5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correctAnswer` int(11) NOT NULL COMMENT 'si es verdadero=1\nsi es falso=0',
  `image` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `questions_id` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_answers_questions1_idx` (`questions_id`),
  CONSTRAINT `fk_answers_questions1` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'Respuesta1',0,'img/img_answers/imgid1.jpeg',1,NULL,NULL),(2,'Respuesta2',2,'img/img_answers/imgid2.jpeg',1,NULL,NULL),(3,'Respuesta3',0,'img/img_answers/imgid3.jpeg',1,NULL,NULL),(4,'Respuesta4',0,'img/img_answers/imgid4.jpeg',1,NULL,NULL),(5,'Arya aprovecha la oportunidad al encontrarlo dormido en una tienda de campaña y le corta la mano derecha con su espada Aguja.',0,NULL,2,NULL,NULL),(6,'Katelyn Stark le manda a cortar la mano por haber empujado a su hijo Brann por una ventana desde una torre alta en King\'s Landing, luego de que este lo encontrara a Jamie y a su hermana Cersei teniendo sexo.',0,NULL,2,NULL,NULL),(7,'La guerrera Brienne of Tarth le corta la mano mientras Jamie intentaba abusar sexualmente de ella.',0,NULL,2,NULL,NULL),(8,'Un mercenario llamado Locke, que trabaja para la casa Bolton se la corta mientras lo tiene prisionero.',4,NULL,2,NULL,NULL),(9,'respuesta1',0,'img/img_answers/imganswers9.jpg',3,NULL,NULL),(10,'respuesta2',0,'img/img_answers/imganswers10.png',3,NULL,NULL),(11,'respuesta3',0,'img/img_answers/imganswers11.jpg',3,NULL,NULL),(12,'respuesta4',4,'img/img_answers/imganswers12.jpg',3,NULL,NULL),(13,'Delincuentes, bastardos y primogénitos de las casas más importantes.',0,NULL,4,NULL,NULL),(14,'Delincuentes, eunucos y enanos.',0,NULL,4,NULL,NULL),(15,'Delincuentes, pobres y bastardos.',3,NULL,4,NULL,NULL),(16,'Delincuentes y los primogénitos de las casas más importantes.',0,NULL,4,NULL,NULL),(17,'Sansa Stark lo apuñala con una espada.',0,NULL,5,NULL,NULL),(18,'Sansa Stark lo deja a merced de unos perros hambrientos.',2,NULL,5,NULL,NULL),(19,'Drogon lo quema vivo.',0,NULL,5,NULL,NULL),(20,'Arya Stark lo degüella.',0,NULL,5,NULL,NULL),(21,'Tras perder un enfrentamiento contra Euron Greyjoy, el antes invencible caballero decide exiliarse en las Ciudades Libres para mejorar su entrenamiento.',0,NULL,6,NULL,NULL),(22,'Robert Baratheon lo descubre tratando de vender un hombre como esclavo y, para evitar la muerte y la Guardia de la Noche, Mormont se exilia en Winterfell.',0,NULL,6,NULL,NULL),(23,'Ned Stark lo descubre tratando de vender un hombre como esclavo y, para evitar la muerte y la Guardia de la Noche, Mormont se exilia en las Ciudades Libres.',3,NULL,6,NULL,NULL),(24,'Tras confesarle su amor a Daenerys Targaryen, Daenerys lo rechaza y él no puede lidiar con la humillación, por eso decide exiliarse a las Ciudades Libres.',0,NULL,6,NULL,NULL),(25,'Que le corten el cabello tras perder en una batalla.',1,NULL,7,NULL,NULL),(26,'Envejecer y ya no poder montar a caballo.',0,NULL,7,NULL,NULL),(27,'No ser bueno para disparar flechas con arcos.',0,NULL,7,NULL,NULL),(28,'Que un compañero le robe la esposa y se acueste con ella.',0,NULL,7,NULL,NULL),(29,'Syrio Forel',0,NULL,8,NULL,NULL),(30,'Oberyn Martell',0,NULL,8,NULL,NULL),(31,'Viserys Targaryen',0,NULL,8,NULL,NULL),(32,'Illyrio Mopatis',4,NULL,8,NULL,NULL),(33,'respuesta1',0,'img/img_answers/imganswers33.jpg',9,NULL,NULL),(34,'respuesta2',2,'img/img_answers/imganswers34.jpg',9,NULL,NULL),(35,'respuesta3',0,'img/img_answers/imganswers35.jpg',9,NULL,NULL),(36,'respuesta4',0,'img/img_answers/imganswers36.jpg',9,NULL,NULL),(37,'respuesta1',0,'img/img_answers/imganswers37.png',10,NULL,NULL),(38,'respuesta2',0,'img/img_answers/imganswers38.jpg',10,NULL,NULL),(39,'respuesta3',3,'img/img_answers/imganswers39.jpg',10,NULL,NULL),(40,'respuesta4',0,'img/img_answers/imganswers40.jpg',10,NULL,NULL),(41,'Le corta la punta de un dedo del pie.',1,NULL,11,NULL,NULL),(42,'Le rompe un diente.',0,NULL,11,NULL,NULL),(43,'Le arranca una uña del un dedo del pie.',0,NULL,11,NULL,NULL),(44,'Le corta parte de la oreja.',0,NULL,11,NULL,NULL),(45,'Full House',0,NULL,12,NULL,NULL),(46,'La niñera',0,NULL,12,NULL,NULL),(47,'The X-Files',0,NULL,12,NULL,NULL),(48,'Mad About You',4,NULL,12,NULL,NULL),(49,'respuesta1',0,'img/img_answers/imganswers49.png',13,NULL,NULL),(50,'respuesta2',2,'img/img_answers/imganswers50.jpg',13,NULL,NULL),(51,'respuesta3',0,'img/img_answers/imganswers51.jpg',13,NULL,NULL),(52,'respuesta4',0,'img/img_answers/imganswers52.jpg',13,NULL,NULL),(53,'En un banco',1,NULL,14,NULL,NULL),(54,'En el metro',0,NULL,14,NULL,NULL),(55,'En un restorán',0,NULL,14,NULL,NULL),(56,'En un baño público',0,NULL,14,NULL,NULL),(57,'Rachel Green',0,NULL,15,NULL,NULL),(58,'Monica Geller',0,NULL,15,NULL,NULL),(59,'Phoebe Buffay',3,NULL,15,NULL,NULL),(60,'Joey Tribbiani',0,NULL,15,NULL,NULL),(61,'respuesta1',0,'img/img_answers/imganswers61.png',16,NULL,NULL),(62,'respuesta2',2,'img/img_answers/imganswers62.png',16,NULL,NULL),(63,'repuesta3',0,'img/img_answers/imganswers63.jpg',16,NULL,NULL),(64,'respuesta4',0,'img/img_answers/imganswers64.jpg',16,NULL,NULL),(65,'Erica, Jack y Chandler',0,NULL,17,NULL,NULL),(66,'Frank Jr. Jr., Chandler y Emma',0,NULL,17,NULL,NULL),(67,'Ben, Emma y Mike',0,NULL,17,NULL,NULL),(68,'Frank Jr. Jr., Leslie y Chandler',4,NULL,17,NULL,NULL),(69,'Rachel Green',0,NULL,18,NULL,NULL),(70,'Gunther',0,NULL,18,NULL,NULL),(71,'El tipo feo y desnudo',3,NULL,18,NULL,NULL),(72,'La abuela de Phoebe Buffay',0,NULL,18,NULL,NULL),(73,'Suzanne Warren',1,NULL,19,NULL,NULL),(74,'Tiffany Doggett',0,NULL,19,NULL,NULL),(75,'Marisol Gonzales',0,NULL,19,NULL,NULL),(76,'Poussey Washington',0,NULL,19,NULL,NULL),(77,'Porque mató a Larry Bloom, su esposo, una semana antes de su boda.',0,NULL,20,NULL,NULL),(78,'Porque era la líder de una red de venta ilegal de ropa interior sucia.',0,NULL,20,NULL,NULL),(79,'Porque la sorprendieron llevando un maletín con dinero narco a Bélgica.',3,NULL,20,NULL,NULL),(80,'Porque mató a Alex Vause, su exnovia, ya que esta la obligaba a traficar dinero narco.',0,NULL,20,NULL,NULL),(81,'Peluquero',0,NULL,21,NULL,NULL),(82,'Bombero',2,NULL,21,NULL,NULL),(83,'Profesor de matemática',0,NULL,21,NULL,NULL),(84,'Policía',0,NULL,21,NULL,NULL),(85,'Porque intentó matar a un médico que se rehusó a operarla para hacerse el cambio de sexo.',0,NULL,22,NULL,NULL),(86,'Porque ayudó a una amiga a entrar a los Estados Unidos de manera ilegal.',0,NULL,22,NULL,NULL),(87,'Porque mató a su padre, que abusaba de ella cuando era un niño.',0,NULL,22,NULL,NULL),(88,'Porque robaba tarjetas de crédito para pagarse las operaciones de cambio de sexo.',4,NULL,22,NULL,NULL),(89,'Nicky Nichols',0,NULL,23,NULL,NULL),(90,'Poussey Washington',2,NULL,23,NULL,NULL),(91,'Lorna Morello',0,NULL,23,NULL,NULL),(92,'Dayanara Díaz',0,NULL,23,NULL,NULL),(93,'Para hacer el papeleo.',0,NULL,24,NULL,NULL),(94,'Para revisar la lista de criminales.',0,NULL,24,NULL,NULL),(95,'Para tomar café y reflexionar.',3,NULL,24,NULL,NULL),(96,'Para comer donas y conversar con los colegas.',0,NULL,24,NULL,NULL),(97,'Hawkings',1,NULL,25,NULL,NULL),(98,'Phantom City',0,NULL,25,NULL,NULL),(99,'Port Newcastle',0,NULL,25,NULL,NULL),(100,'Hawton Town',0,NULL,25,NULL,NULL),(101,'Porque fue la onceava criatura de su tipo que secuestró el grupo de científicos del laboratorio.',0,NULL,26,NULL,NULL),(102,'Porque, cuando los científicos la secuestraron, no hacía más que repetir \"once\"\" todo el tiempo.\"',0,NULL,26,NULL,NULL),(103,'Por un tatuaje que tiene en el brazo.',3,NULL,26,NULL,NULL),(104,'El doctor Martin Brenner la bautizó así porque estimó que ella tenía once años cuando la conoció.',0,NULL,26,NULL,NULL),(105,'Jack Shephard y Kate Austen, en la primera temporada.',0,NULL,27,NULL,NULL),(106,'Sayid Jarrah y John Locke, en la segunda temporada.',0,NULL,27,NULL,NULL),(107,'Hugo Reyes y Charlie Pace, en la primera temporada.',0,NULL,27,NULL,NULL),(108,'John Locke y Boone Carlyle, en la primera temporada.',4,NULL,27,NULL,NULL),(109,'Shannon Carlyle',1,NULL,28,NULL,NULL),(110,'Boone Carlyle',0,NULL,28,NULL,NULL),(111,'Charlie Pace',0,NULL,28,NULL,NULL),(112,'Ana Lucía Cortez',0,NULL,28,NULL,NULL),(113,'58',0,NULL,29,NULL,NULL),(114,'71',2,NULL,29,NULL,NULL),(115,'102',0,NULL,29,NULL,NULL),(116,'20',0,NULL,29,NULL,NULL),(117,'\"Benjamin les tendió una trampa\"\".\"',0,NULL,30,NULL,NULL),(118,'\"Desmond no es quién dice ser\"\".\"',0,NULL,30,NULL,NULL),(119,'\"Este no es el barco de Penny\"\".\"',3,NULL,30,NULL,NULL),(120,'\"El bebé de Claire es la causa del accidente\"\".\"',0,NULL,30,NULL,NULL),(121,'Backstreet Boys',1,NULL,31,NULL,NULL),(122,'N\'sync',0,NULL,31,NULL,NULL),(123,'Stephen Hawking',0,NULL,31,NULL,NULL),(124,'Kid Rock',0,NULL,31,NULL,NULL),(125,'Descubren que tenía secuestrado a Poochie, un perro estrella entre los chicos, que le hace competencia con su programa.',0,NULL,32,NULL,NULL),(126,'El Gordo Tony lo acusa de ser el jefe de una red de tráfico de leche de rata.',0,NULL,32,NULL,NULL),(127,'Un payaso enmascarado muy parecido a él asalta el minisúper de Apu y Homero lo acusa confundiéndolo con el verdadero Krusty.',3,NULL,32,NULL,NULL),(128,'Lo sorprenden vendiéndoles una bebida muy sospechosa a unos muchachos.',0,NULL,32,NULL,NULL),(129,'respuesta1',0,'img/img_answers/imganswers129.png',33,NULL,NULL),(130,'respuesta2',0,'img/img_answers/imganswers130.png',33,NULL,NULL),(131,'respuesta3',0,'img/img_answers/imganswers131.png',33,NULL,NULL),(132,'respuesta4',4,'img/img_answers/imganswers132.png',33,NULL,NULL),(133,'Nahasamasapeemapetilon',0,NULL,34,NULL,NULL),(134,'Nahasapeemapetilon',2,NULL,34,NULL,NULL),(135,'Apu',0,NULL,34,NULL,NULL),(136,'Nahasapemaepelon',0,NULL,34,NULL,NULL),(137,'El departamento de Edna Krabappel',1,NULL,35,NULL,NULL),(138,'La casa del profesor Skinner',0,NULL,35,NULL,NULL),(139,'La mansión Ziff',0,NULL,35,NULL,NULL),(140,'El departamento de soltero de Kirk Van Houten',0,NULL,35,NULL,NULL),(141,'In-A-Gadda-Da-Vida, de Iron Butterfly',1,NULL,36,NULL,NULL),(142,'Blaze of Glory, de Jon Bon Jovi',0,NULL,36,NULL,NULL),(143,'Thunderstruck, de AC/DC',0,NULL,36,NULL,NULL),(144,'Man in The Box, de Alice in Chains',0,NULL,36,NULL,NULL),(145,'My Sharona, de The Knack',0,NULL,37,NULL,NULL),(146,'Can\'t help falling in love, de Elvis Presley',0,NULL,37,NULL,NULL),(147,'Close to you, de The Carpenters',3,NULL,37,NULL,NULL),(148,'Something, de The Beatles',0,NULL,37,NULL,NULL),(149,'Metallica',0,NULL,38,NULL,NULL),(150,'The White Stripes',2,NULL,38,NULL,NULL),(151,'Korn',0,NULL,38,NULL,NULL),(152,'Aerosmith',0,NULL,38,NULL,NULL),(153,'Los Peces del Infierno',0,NULL,39,NULL,NULL),(154,'Los Borbotones',0,NULL,39,NULL,NULL),(155,'Los Satanes del Infieno',3,NULL,39,NULL,NULL),(156,'Los Magios',0,NULL,39,NULL,NULL),(157,'Una muestra de sangre',1,NULL,40,NULL,NULL),(158,'Una muestra de saliva',0,NULL,40,NULL,NULL),(159,'Un diente',0,NULL,40,NULL,NULL),(160,'Un mechón de pelos',0,NULL,40,NULL,NULL),(161,'El Fisgón Morbosón',0,NULL,41,NULL,NULL),(162,'El Asesino del Camión de Hielo',0,NULL,41,NULL,NULL),(163,'El Carnicero de la Bahía',0,NULL,41,NULL,NULL),(164,'El Carnicero de Bay Harbor',4,NULL,41,NULL,NULL),(165,'El Código Vogel',0,NULL,42,NULL,NULL),(166,'El Código de Harry',2,NULL,42,NULL,NULL),(167,'El Código de la Muerte',0,NULL,42,NULL,NULL),(168,'El Código Morgan',0,NULL,42,NULL,NULL),(169,'Brian Moser',0,NULL,43,NULL,NULL),(170,'James Doakes',0,NULL,43,NULL,NULL),(171,'Alex Timmons',3,NULL,43,NULL,NULL),(172,'Miguel Prado',0,NULL,43,NULL,NULL),(173,'respuesta1',0,'img/img_answers/imganswers173.jpg',44,NULL,NULL),(174,'respuesta2',0,'img/img_answers/imganswers174.png',44,NULL,NULL),(175,'respuesta3',3,'img/img_answers/imganswers175.jpg',44,NULL,NULL),(176,'respuesta4',0,'img/img_answers/imganswers176.png',44,NULL,NULL),(177,'Colombia',0,NULL,45,NULL,NULL),(178,'Argentina',2,NULL,45,NULL,NULL),(179,'Chile',0,NULL,45,NULL,NULL),(180,'Ecuador',0,NULL,45,NULL,NULL),(181,'5',1,NULL,46,NULL,NULL),(182,'2',0,NULL,46,NULL,NULL),(183,'10',0,NULL,46,NULL,NULL),(184,'7',0,NULL,46,NULL,NULL),(185,'respuesta1',1,'img/img_answers/imganswers185.png',47,NULL,NULL),(186,'respuesta2',0,'img/img_answers/imganswers186.jpg',47,NULL,NULL),(187,'respuesta3',0,'img/img_answers/imganswers187.png',47,NULL,NULL),(188,'respuesta4',0,'img/img_answers/imganswers188.jpg',47,NULL,NULL),(189,'Afeitarse',0,NULL,48,NULL,NULL),(190,'Freír huevos',0,NULL,48,NULL,NULL),(191,'Matar un mosquito',0,NULL,48,NULL,NULL),(192,'Mirar por la ventana',4,NULL,48,NULL,NULL),(193,'respuesta1',0,'img/img_answers/imganswers193.jpg',49,NULL,NULL),(194,'respuesta2',0,'img/img_answers/imganswers194.jpg',49,NULL,NULL),(195,'respuesta3',3,'img/img_answers/imganswers196.jpg',49,NULL,NULL),(196,'respuesta4',0,'img/img_answers/imganswers195.jpg',49,NULL,NULL),(197,'Jesse Pinkman es exalumno de Walter White.',1,NULL,50,NULL,NULL),(198,'Jesse Pinkman era amigo del hijo de Walter White, Walter White Jr.',0,NULL,50,NULL,NULL),(199,'Walter White y Jesse Pinkman son amantes.',0,NULL,50,NULL,NULL),(200,'Walter White es tío de Jesse Pinkman.',0,NULL,50,NULL,NULL),(201,'Con el matón de Gus Fring, Mike Ehrmantraut.',0,NULL,51,NULL,NULL),(202,'Con su jefe, Ted Beneke.',2,NULL,51,NULL,NULL),(203,'Con el abogado Saul Goodman.',0,NULL,51,NULL,NULL),(204,'Con su cuñado, Hank Schrader.',0,NULL,51,NULL,NULL),(205,'Lydia Rodarte-Quayle',0,NULL,52,NULL,NULL),(206,'Jane Margolis',0,NULL,52,NULL,NULL),(207,'Gretchen Schwartz',3,NULL,52,NULL,NULL),(208,'Marie Schrader',0,NULL,52,NULL,NULL),(209,'De pulmón',1,NULL,53,NULL,NULL),(210,'De estómago',0,NULL,53,NULL,NULL),(211,'De piel',0,NULL,53,NULL,NULL),(212,'De próstata',0,NULL,53,NULL,NULL),(213,'Cinco',0,NULL,54,NULL,NULL),(214,'Ocho',0,NULL,54,NULL,NULL),(215,'Once',0,NULL,54,NULL,NULL),(216,'Doce',4,NULL,54,NULL,NULL),(217,'Matemático',0,NULL,55,NULL,NULL),(218,'Astrofísico',2,NULL,55,NULL,NULL),(219,'Microbiólogo',0,NULL,55,NULL,NULL),(220,'Físico nuclear',0,NULL,55,NULL,NULL),(221,'En la segunda temporada',0,NULL,56,NULL,NULL),(222,'En la primera temporada',0,NULL,56,NULL,NULL),(223,'En la tercera temporada',3,NULL,56,NULL,NULL),(224,'En la sexta temporada',0,NULL,56,NULL,NULL),(225,'Camarera',1,NULL,57,NULL,NULL),(226,'Vendedora de cosméticos',0,NULL,57,NULL,NULL),(227,'Masajista',0,NULL,57,NULL,NULL),(228,'Cantante',0,NULL,57,NULL,NULL),(229,'A los 20 años',0,NULL,58,NULL,NULL),(230,'A los 24 años',2,NULL,58,NULL,NULL),(231,'A los 30 años',0,NULL,58,NULL,NULL),(232,'A los 25 años',0,NULL,58,NULL,NULL),(233,'En el Instituto Científico de California',0,NULL,59,NULL,NULL),(234,'En la Universidad de California',0,NULL,59,NULL,NULL),(235,'En el Instituto de Tecnología de California',3,NULL,59,NULL,NULL),(236,'En la Universidad de Harvard',0,NULL,59,NULL,NULL),(237,'Howard Wolowitz',1,NULL,60,NULL,NULL),(238,'Penny Hofstadter',0,NULL,60,NULL,NULL),(239,'Rajesh Koothrappali',0,NULL,60,NULL,NULL),(240,'Sheldon Cooper',0,NULL,60,NULL,NULL),(241,'180',0,NULL,61,NULL,NULL),(242,'204',0,NULL,61,NULL,NULL),(243,'154',0,NULL,61,NULL,NULL),(244,'187',4,NULL,61,NULL,NULL),(245,'Batman',0,NULL,62,NULL,NULL),(246,'Flash',2,NULL,62,NULL,NULL),(247,'Hulk',0,NULL,62,NULL,NULL),(248,'Superman',0,NULL,62,NULL,NULL),(249,'Médica',0,NULL,63,NULL,NULL),(250,'Congresista',0,NULL,63,NULL,NULL),(251,'Corredora inmobiliaria',3,NULL,63,NULL,NULL),(252,'Vendedora de automóviles',0,NULL,63,NULL,NULL),(253,'19 de febrero de 2015',1,NULL,64,NULL,NULL),(254,'30 de septiembre de 2011',0,NULL,64,NULL,NULL),(255,'9 de febrero de 2015',0,NULL,64,NULL,NULL),(256,'4 de marzo de 2000',0,NULL,64,NULL,NULL),(257,'Maggie',0,NULL,65,NULL,NULL),(258,'Felippa',0,NULL,65,NULL,NULL),(259,'Andrea',0,NULL,65,NULL,NULL),(260,'Rose',4,NULL,65,NULL,NULL),(261,'Malibú',1,NULL,66,NULL,NULL),(262,'Los Angeles',0,NULL,66,NULL,NULL),(263,'Miami',0,NULL,66,NULL,NULL),(264,'Nueva York',0,NULL,66,NULL,NULL),(265,'respuesta1',0,'img/img_answers/imganswers265.jpg',67,NULL,NULL),(266,'respuesta2',0,'img/img_answers/imganswers266.jpg',67,NULL,NULL),(267,'respuesta3',3,'img/img_answers/imganswers267.jpg',67,NULL,NULL),(268,'respuesta4',0,'img/img_answers/imganswers268.jpg',67,NULL,NULL),(269,'Manejaba una cadena de consesionarias de autos.',0,NULL,68,NULL,NULL),(270,'Componía jingles publicitarios.',2,NULL,68,NULL,NULL),(271,'Era un famoso actor porno.',0,NULL,68,NULL,NULL),(272,'Manejaba una importante funeraria.',0,NULL,68,NULL,NULL),(273,'Crazy, de Aerosmith',0,NULL,69,NULL,NULL),(274,'Nothing else matters, de Metallica',0,NULL,69,NULL,NULL),(275,'Highway star, de Deep Purple',0,NULL,69,NULL,NULL),(276,'Smoke on the water, de Deep Purple',4,NULL,69,NULL,NULL),(277,'Era astronauta.',0,NULL,70,NULL,NULL),(278,'Era quiropráctico.',0,NULL,70,NULL,NULL),(279,'Era doctor.',3,NULL,70,NULL,NULL),(280,'Era dueño de una funeraria.',0,NULL,70,NULL,NULL),(281,'respuesta1',1,'img/img_answers/imganswers281.jpg',71,NULL,NULL),(282,'respuesta2',0,'img/img_answers/imganswers282.jpg',71,NULL,NULL),(283,'respuesta3',0,'img/img_answers/imganswers283.jpg',71,NULL,NULL),(284,'respuesta4',0,'img/img_answers/imganswers284.png',71,NULL,NULL),(285,'respuesta1',0,'img/img_answers/imganswers285.jpg',72,NULL,NULL),(286,'respuesta2',0,'img/img_answers/imganswers286.jpg',72,NULL,NULL),(287,'respuesta3',3,'img/img_answers/imganswers287.jpg',72,NULL,NULL),(288,'respuesta4',0,'img/img_answers/imganswers288.jpg',72,NULL,NULL),(289,'Francis Underwood',0,NULL,74,NULL,NULL),(290,'Leann Harvey',0,NULL,74,NULL,NULL),(291,'Jackie Sharp',0,NULL,74,NULL,NULL),(292,'Rachel Posner',4,NULL,74,NULL,NULL),(293,'Ranjit Singh',1,NULL,75,NULL,NULL),(294,'Carl MacLaren',0,NULL,75,NULL,NULL),(295,'Kevin Venkataraghavan',0,NULL,75,NULL,NULL),(296,'Barney Stinson',0,NULL,75,NULL,NULL),(297,'George',0,NULL,76,NULL,NULL),(298,'Jerry',0,NULL,76,NULL,NULL),(299,'Cosmo',3,NULL,76,NULL,NULL),(300,'Frank',0,NULL,76,NULL,NULL),(301,'Mc Flurry',0,NULL,77,NULL,NULL),(302,'Mc Dreamy',2,NULL,77,NULL,NULL),(303,'Mr. Right',0,NULL,77,NULL,NULL),(304,'Mc Hottie',0,NULL,77,NULL,NULL),(305,'Gyda',1,NULL,78,NULL,NULL),(306,'Lagertha',0,NULL,78,NULL,NULL),(307,'Judith',0,NULL,78,NULL,NULL),(308,'Aslaug',0,NULL,78,NULL,NULL),(309,'Granja Carlson',0,NULL,79,NULL,NULL),(310,'Granja Dixon',0,NULL,79,NULL,NULL),(311,'Granja Jones',0,NULL,79,NULL,NULL),(312,'Granja Greene',4,NULL,79,NULL,NULL),(313,'Lo hirieron un grupo de bandidos durante una persecusión por la carretera.',1,NULL,80,NULL,NULL),(314,'En una discusión con su amigo y colega Shane por el amor de Lori, a Rick se le escapa un tiro. Shane se asusta y le termina disparando.',0,NULL,80,NULL,NULL),(315,'Lo hirió un científico que huía con documentación confidencial que explicaba el origen de la propagación de la enfermedad que volvía zombies a las personas.',0,NULL,80,NULL,NULL),(316,'Intenta evitar un asalto a una familia y uno de los delincuentes lo hiere de gravedad.',0,NULL,80,NULL,NULL),(317,'respuesta1',0,'img/img_answers/imganswers317.png',81,NULL,NULL),(318,'respuesta2',0,'img/img_answers/imganswers318.png',81,NULL,NULL),(319,'respuesta3',3,'img/img_answers/imganswers319.jpg',81,NULL,NULL),(320,'respuesta4',0,'img/img_answers/imganswers320.jpg',81,NULL,NULL),(321,'respuesta1',0,'img/img_answers/imganswers321.jpg',82,NULL,NULL),(322,'respuesta2',2,'img/img_answers/imganswers322.jpg',82,NULL,NULL),(323,'respuesta3',0,'img/img_answers/imganswers323.jpg',82,NULL,NULL),(324,'respuesta4',0,'img/img_answers/imganswers324.jpg',82,NULL,NULL),(325,'¿Quién era el presidente antes del apocalipsis? ¿Cómo sobreviviste hasta ahora? ¿Qué música te gusta?',0,NULL,83,NULL,NULL),(326,'¿A cuántos caminantes mataste? ¿Cómo sobreviviste hasta ahora? ¿Por qué?',0,NULL,83,NULL,NULL),(327,'¿A cuántos caminantes mataste? ¿A cuántas personas mataste? ¿Por qué?',3,NULL,83,NULL,NULL),(328,'¿A cuántos caminantes mataste? ¿A cuántas personas mataste? ¿Sabes dónde conseguir comida?',0,NULL,83,NULL,NULL),(329,'3',0,NULL,84,NULL,NULL),(330,'6',2,NULL,84,NULL,NULL),(331,'7',0,NULL,84,NULL,NULL),(332,'8',0,NULL,84,NULL,NULL),(333,'respuesta1',0,'img/img_answers/imganswers333.png',85,NULL,NULL),(334,'respuesta2',0,'img/img_answers/imganswers334.jpg',85,NULL,NULL),(335,'respuesta3',3,'img/img_answers/imganswers335.jpg',85,NULL,NULL),(336,'respuesta4',0,'img/img_answers/imganswers336.jpg',85,NULL,NULL),(337,'Aparece un grupo llamado los Susurradores, que se disfraza con piel de caminante.',1,NULL,86,NULL,NULL),(338,'Una peligrosa mujer llamada Betty, que lidera un grupo de miles de caminantes.',0,NULL,86,NULL,NULL),(339,'Jesus y su grupo se pone en contra de Rick y los suyos y los amenaza con acabar con ellos.',0,NULL,86,NULL,NULL),(340,'Negan y los Salvadores aprovechan la clemencia de Rick Grimes y lo ataca por sorpresa.',0,NULL,86,NULL,NULL),(341,'Les decía a sus feligreses que el apocalipsis era el castigo de Dios por tanta degeneración.',0,NULL,87,NULL,NULL),(342,'Les robaba la comida a sus feligreses.',0,NULL,87,NULL,NULL),(343,'Cerró la iglesia y no dejó que sus feligreses entraran a refugiarse mientras los atacaba una horda de caminantes.',3,NULL,87,NULL,NULL),(344,'Mató de un disparo a varios de sus feligreses, que se habían convertido y querían comérselo.',0,NULL,87,NULL,NULL),(345,'Negan le da una golpiza en la cabeza y, por ese motivo, pierde el ojo.',0,NULL,88,NULL,NULL),(346,'Michonne apuñala a un chico llamado Ron y a este se le escapa un tiro mientras caía al piso, que impacta de lleno en el ojo de Carl.',2,NULL,88,NULL,NULL),(347,'Uno de los seguidores de Negan le dispara una flecha en el ojo.',0,NULL,88,NULL,NULL),(348,'Carl está limpiando su arma y se le escapa un tiro, que le da de lleno en el ojo.',0,NULL,88,NULL,NULL),(349,'Lily y Frank Buffay',0,NULL,89,NULL,NULL),(350,'Ross y Rachel Green',0,NULL,89,NULL,NULL),(351,'Jenny y Charles Montagne',0,NULL,89,NULL,NULL),(352,'Julianna y Clive Bixby',4,NULL,89,NULL,NULL),(353,'Nueva York',0,NULL,90,NULL,NULL),(354,'Miami',0,NULL,90,NULL,NULL),(355,'Los Angeles',3,NULL,90,NULL,NULL),(356,'California',0,NULL,90,NULL,NULL),(357,'Gloria y Manny',0,NULL,91,NULL,NULL),(358,'Mitchel y Cameron',0,NULL,91,NULL,NULL),(359,'Luke y Lily',0,NULL,91,NULL,NULL),(360,'Claire y Mitchell',4,NULL,91,NULL,NULL);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frequentquestions`
--

DROP TABLE IF EXISTS `frequentquestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `frequentquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci,
  `answer` text COLLATE utf8_unicode_ci,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frequentquestions`
--

LOCK TABLES `frequentquestions` WRITE;
/*!40000 ALTER TABLE `frequentquestions` DISABLE KEYS */;
INSERT INTO `frequentquestions` VALUES (1,'¿Qué es Seriales?','Seriales es un juego en línea de preguntas y respuestas sobre las series contemporáneas más influyentes. Podrás poner a prueba tu conocimiento sobre tus series favoritas y competir en línea con muchos otros fanáticos del mundo. ¡Esperamos que te diviertas!',NULL,NULL),(2,'¿Como puedo jugar?','Para jugar, ve a \"Registrarme\" y completa los datos requeridos. Una vez hecho esto, recibirás un correo con un enlace para dar de alta tu usuario. Luego, podrás iniciar sesión y ¡listo! Ya estarás listo para jugar.',NULL,NULL),(3,'Me registre y no me puedo loguear','Si realizaste tu registro, no olvides revisar su casilla de correo y hacer clic en el enlace que te llegará para dar de alta tu usuario. Luego, ya podrás iniciar sesión.',NULL,NULL),(4,'¿Hay que pagar para jugar?','No, este juego es gratuito. Queremos que la diversión esté al alcance de todxs.',NULL,NULL),(5,'¿Necesito instalar una aplicación complementaria?','No, no necesitas descargar ni instalar nada para jugar. Puedes acceder al juego desde cualquier pc, laptop o celular. Seriales no es una aplicación.',NULL,NULL),(6,'¿Cómo se juega?','Cuando elijas comenzar el juego, deberás elegir una serie entre la lista de opciones disponibles o, si te sientes inspiradx, podrás jugar con todas las series al mismo tiempo. Cuando elijas una de las opciones, se disparará un grupo de preguntas que tendrán cuatro respuestas posibles cada una. Deberás elegir la que consideres correcta dentro de un tiempo límite de 15 segundos, que marcará un contador. Hay respuestas de tipo texto y respuestas de tipo imagen. Por cada pregunta de nivel 1 que respondas bien, recibirás un punto. Por las de nivel 2, dos puntos y por las de nivel 3, tres puntos. El juego tiene tres niveles de dificultad. A medida que avances respondiendo preguntas correctamente, este se incrementará. El puntaje acumulado se irá registrando y subirás posiciones en la tabla de jugadores.',NULL,NULL),(7,'¿Puedo invitar a mis amigxs a jugar?','¡Claro que sí! Nos gusta la tele fuerte, la cerveza fría y lxs jugadorxs copados, copados, así que invitá a todxs lxs amigxs que quieras. :)',NULL,NULL);
/*!40000 ALTER TABLE `frequentquestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `games` (
  `users_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL COMMENT 'Queda registrado la pregunta que se le hizo al usuario',
  `answer_user` int(11) DEFAULT NULL COMMENT 'Se ingresa lo que el usuario respondio',
  `date` date DEFAULT NULL COMMENT 'se ingresa la fecha en que se jugo',
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`users_id`,`questions_id`),
  KEY `fk_users_has_series_users1_idx` (`users_id`),
  KEY `fk_games_questions1_idx` (`questions_id`),
  CONSTRAINT `fk_games_questions1` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`),
  CONSTRAINT `fk_users_has_series_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'Básico',1,2,NULL,NULL),(2,'Intermedio',2,3,NULL,NULL),(3,'Avanzado',3,4,NULL,NULL),(4,'Start',4,5,NULL,NULL);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci,
  `series_id` int(11) NOT NULL,
  `levels_id` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_questions_series1_idx` (`series_id`),
  KEY `fk_questions_level1` (`levels_id`),
  CONSTRAINT `fk_questions_levels1` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`),
  CONSTRAINT `fk_questions_series1` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'¿Cuál de las siguientes imágenes pertenece a la Batalla de los Bastardos?',18,2,NULL,NULL,NULL),(2,'¿Cómo pierde la mano derecha Jamie Lannister?',18,1,NULL,NULL,NULL),(3,'¿Cuál de las siguientes mujeres es la esposa de Lord Roose Bolton?',18,3,NULL,NULL,NULL),(4,'¿Quiénes se unen a la Guardia de la Noche?',18,1,NULL,NULL,NULL),(5,'¿Cómo muere Ramsay Bolton?',18,1,NULL,NULL,NULL),(6,'¿Por qué se exilia Sir Jorah Mormont?',18,1,NULL,NULL,NULL),(7,'¿Qué acto era considerado deshonroso para los Dothraki?',18,1,NULL,NULL,NULL),(8,'¿Quién organiza la boda entre Daenerys Targaryen y Khal Drogo?',18,1,NULL,NULL,NULL),(9,'¿Cuál de las siguientes imágenes muestra a Syrio Forel?',18,1,NULL,NULL,NULL),(10,'¿Cuál de los siguientes personajes salió con Rachel durante la secundaria y luego tiene una cita Monica en la temporada 2?',1,2,NULL,NULL,NULL),(11,'¿Qué herida le causa Monica Geller a Chandler Bing cuando eran adolescentes?',1,1,NULL,NULL,NULL),(12,'¿En qué otra serie aparece Ursula Buffay, la hermana gemela de Phoebe?',1,2,NULL,NULL,NULL),(13,'¿Cuál de lxs amigxs quiere aprender a tocar la guitarra?',1,1,NULL,NULL,NULL),(14,'¿En que lugar público Chandler Bing se quedó encerrado con la modelo Jill Goodacre?',1,2,NULL,NULL,NULL),(15,'¿Cuál es el mayor de lxs amigxs?',1,3,NULL,NULL,NULL),(16,'¿Cuál de estxs actorxs nunca apareció en Friends?',1,3,NULL,NULL,NULL),(17,'¿Cómo se llaman los trillizos que Phoebe Buffay tuvo para su hermano Frank Buffay Jr.?',1,1,NULL,NULL,NULL),(18,'¿Quién vivía antes en el departamento que alquila Ross Geller tras separarse de Emily Waltham?',1,1,NULL,NULL,NULL),(19,'¿Cuál es el verdadero nombre de la interna apodada \"Crazy Eyes\"\"?\"',2,1,NULL,NULL,NULL),(20,'¿Por qué envían a la cárcel a la protagonista, Piper Chapman?',2,1,NULL,NULL,NULL),(21,'¿Cuál era la profesión de Sophia Burset antes de cambiarse de género?',2,1,NULL,NULL,NULL),(22,'¿Por qué razón Sophia Burset terminó en la cárcel?',2,1,NULL,NULL,NULL),(23,'¿Cuál de las internas muere a manos de un guardia tras un levantamiento en el centro penitenciario?',2,1,NULL,NULL,NULL),(24,'¿Para qué sirven las mañanas según el jefe Jim Hopper?',3,1,NULL,NULL,NULL),(25,'¿Cómo se llama la ciudad ficticia donde transcurren los hechos?',3,1,NULL,NULL,NULL),(26,'¿Por qué razón Once (Eleven) se llama así? ',3,1,NULL,NULL,NULL),(27,'¿En qué temporada y qué personajes descubre la escotilla escondida?',4,1,NULL,NULL,NULL),(28,'¿Qué personaje muere primero?',4,1,NULL,NULL,NULL),(29,'¿Cuántos sobrevivientes hay luego de la caída del vuelo 815?',4,1,NULL,NULL,NULL),(30,'¿Cuál es el mensaje final de Charlie Pace?',4,1,NULL,NULL,NULL),(31,'¿Qué celebridad todavía no aparecio en Los Simpson?',5,1,NULL,NULL,NULL),(32,'¿Por qué va a la cárcel el payaso Krusty en la primera temporada?',5,1,NULL,NULL,NULL),(33,'¿Cuál de los siguientes personajes es Todd Flanders?',5,2,NULL,NULL,NULL),(34,'¿Cuál es el apellido de la siguiente familia?',5,1,'img/img_questions/imgid34.png',NULL,NULL),(35,'¿Qué casa es esta?',5,1,'img/img_questions/imgid35.png',NULL,NULL),(36,'En el episodio Bart vende su alma, ¿qué canción de rock incluye en el cancionero de la iglesia sin que nadie se dé cuenta?',5,1,NULL,NULL,NULL),(37,'¿Cómo se llama la canción que simboliza el amor que une a Homero y Marge?',5,1,NULL,NULL,NULL),(38,'¿Con qué banda se cruza Bart en la temporada 18 luego de que el psicólogo le recomendara aprender a tocar la batería?',5,1,NULL,NULL,NULL),(39,'¿Cómo se llama la banda de motoqueros a la que se une Homero en el episodio Llévate a mi esposa?',5,1,NULL,NULL,NULL),(40,'¿Qué trofeo se guardaba el protagonista de cada una de sus víctimas?',6,1,NULL,NULL,NULL),(41,'¿Qué nombre le da la prensa al asesino serial que azota Miami y que nadie sabe que es Dexter?',6,1,NULL,NULL,NULL),(42,'¿Cómo se llamaba la serie de reglas para asesinar que sigue Dexter, que pretendían canalizar su sed de sangre?',6,1,NULL,NULL,NULL),(43,'¿Cómo se llamaba la víctima que lleva a Dexter a empezar a tomar trofeos de las personas que asesinaba?',6,1,NULL,NULL,NULL),(44,'¿Quién murió primero en la serie?',6,2,NULL,NULL,NULL),(45,'¿A qué país deseaba mudarse Dexter con Hannah y su hijo Harrison?',6,1,NULL,NULL,NULL),(46,'¿Cuántas parejas tuvo Dexter durante la serie?',6,1,NULL,NULL,NULL),(47,'¿Cuál de estos personajes no pertenecía al equipo de científicos y policías con el que trabajaba Dexter?',6,1,NULL,NULL,NULL),(48,'¿Qué acción no realiza Dexter durante los créditos iniciales de la serie?',6,1,NULL,NULL,NULL),(49,'¿Cuál de las siguientes imágenes no muestra a un criminal asesinado por Dexter?',6,1,NULL,NULL,NULL),(50,'¿Qué relación unía a los personajes Walter White y Jesse Pinkman antes de que se asociaran para cocinar cristal azul?',7,1,NULL,NULL,NULL),(51,'¿Con quién tiene un romance extramatrimonial la protagonista Skyler White? ',7,1,NULL,NULL,NULL),(52,'¿Cómo se llama la antigua compañera de química de Walter White y actual cofundadora de Gray Matter Technologies, con quien tuvo un relación amorosa en el pasado?',7,1,NULL,NULL,NULL),(53,'¿Qué tipo de cáncer contrae Walter White?',7,1,NULL,NULL,NULL),(54,'¿Cuántas temporadas duró la serie?',8,1,NULL,NULL,NULL),(55,'¿Cuál es la profesión de Rajesh Koothrappali?',8,1,NULL,NULL,NULL),(56,'¿En qué temporada aparece la la neurobióloga Amy Farrah Fowler en la Serie?',8,1,NULL,NULL,NULL),(57,'¿A qué se dedica Penny Hofstadter en las primeras temporadas?',8,1,NULL,NULL,NULL),(58,'¿A qué edad obtiene su doctorado en fisica experimental Leonard Hofstadter?',8,1,NULL,NULL,NULL),(59,'¿Dónde trabajan los amigos y científicos de la serie?',8,1,NULL,NULL,NULL),(60,'¿Qué personaje entabla una relación amorosa con Bernadette Rostenkowski?',8,1,NULL,NULL,NULL),(61,'¿Cuál es el coefiente intelectual de Sheldon Cooper?',8,1,NULL,NULL,NULL),(62,'¿Cuál es el superhéroe favorito de Sheldon Cooper?',8,1,NULL,NULL,NULL),(63,'¿A qué se decica la madre de Charlie y Alan Harper?',9,1,NULL,NULL,NULL),(64,'¿Cuándo se estrenó el último episodio de la serie?',9,1,NULL,NULL,NULL),(65,'¿Cómo se llamaba la vecina de los Harper que estaba enamorada de Charlie?',9,1,NULL,NULL,NULL),(66,'¿En qué ciudad de los Estados Unidos ocurren los hechos de la serie?',9,1,NULL,NULL,NULL),(67,'¿Qué actor reemplazó a Charlie Sheen luego de que este decidiera abandonar la serie?',9,1,NULL,NULL,NULL),(68,'¿Cómo amasó su fortuna Charlie Harper?',9,1,NULL,NULL,NULL),(69,'¿Qué reef de guitarra tocan Jake y su amigo Chun Pu en el episodio 20 de la primera temporada?',9,1,NULL,NULL,NULL),(70,'¿A qué se dedicaba Herb Melnick, el actual esposo de Judith Harper?',9,1,NULL,NULL,NULL),(71,'¿En qué otra serie contemporánea hizo un cameo Conchata Ferrell, quien interpretaba a Berta?',9,3,NULL,NULL,NULL),(72,'¿Cuál de estas estrellas nunca participó como actor invitado en la serie?',9,2,NULL,NULL,NULL),(74,'¿Quién ataca a Doug Stamper en el bosque?',11,1,NULL,NULL,NULL),(75,'¿Cómo se llama el conductor de limusinas?',12,1,NULL,NULL,NULL),(76,'¿Cuál es el primer nombre de Kramer?',13,1,NULL,NULL,NULL),(77,'¿Cuál es el apodo de Derek Shepherd?',14,1,NULL,NULL,NULL),(78,'¿Cómo se llama la única hija de Ragnar Lothbrok?',15,1,NULL,NULL,NULL),(79,'¿Cómo se llamaba la granja en la que se refugian los personajes durante la segunda temporada?',16,1,NULL,NULL,NULL),(80,'¿En qué situación había recibido un disparo el sheriff Rick Grimes antes del apocalipsis zombie, que lo mandó al hospital en el inicio de la temporada?',16,3,NULL,NULL,NULL),(81,'¿Cuál de estos personajes muere primero en la serie?',16,1,NULL,NULL,NULL),(82,'¿Cuál de las siguientes locaciones no pertenece a la serie?',16,1,NULL,NULL,NULL),(83,'¿Cuáles eran las tres preguntas que los protagonistas les hacían a las personas que querían unirse a su grupo?',16,1,NULL,NULL,NULL),(84,'¿En qué temporada aparece por primera vez el peor villano de la serie, Negan?',16,2,NULL,NULL,NULL),(85,'¿A quién de los siguientes personajes mata primero Negan?',16,1,NULL,NULL,NULL),(86,'¿Con qué amenaza se encuentra el grupo de sobrevivientes en la temporada 9?',16,1,NULL,NULL,NULL),(87,'¿Cuál es la acción del pasado que lo atormenta al padre Gabriel Stokes?',16,1,NULL,NULL,NULL),(88,'¿En qué circunstancias Carl Grimes pierde un ojo?',16,1,NULL,NULL,NULL),(89,'¿Cuáles son los apodos para el día de los enamorados de Claire y Phil?',17,1,NULL,NULL,NULL),(90,'¿En que lugar se desarrolla la serie?',17,1,NULL,NULL,NULL),(91,'¿Cuales son los hijos de Jay?',17,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
INSERT INTO `series` VALUES (1,'Friends','img/series/logo_friends.png',NULL,NULL),(2,'Orange Is The New Black ','img/series/logo_orangeisthenewblack.png',NULL,NULL),(3,'Stranger Things','img/series/logo_strangerthings.jpg',NULL,NULL),(4,'Lost','img/series/logo_lost.jpg',NULL,NULL),(5,'Los Simpson','img/series/logo_thesimpsons.png',NULL,NULL),(6,'Dexter','img/series/logo_dexter.jpg',NULL,NULL),(7,'Breaking Bad','img/series/logo_breakingbad.png',NULL,NULL),(8,'The Big BangTheory','img/series/logo_thebigbangtheory.png',NULL,NULL),(9,'Two And A Half Men','img/series/logo_twoandahalfmen.png',NULL,NULL),(11,'House Of Cards','img/series/logo_houseofcards.png',NULL,NULL),(12,'How I Met Your Mother','img/series/logo_howimetyourmother.png',NULL,NULL),(13,'Seinfeld','img/series/logo_seinfeld.png',NULL,NULL),(14,'Grey\'s Anatomy','img/series/logo_greysanatomy.png',NULL,NULL),(15,'Vikings','img/series/logo_vikings.png',NULL,NULL),(16,'The Walking Dead','img/series/logo_thewalkingdead.png',NULL,NULL),(17,'Modern Family','img/series/logo_modernfamily.png',NULL,NULL),(18,'The Game of Thrones','img/series/logo_got.png',NULL,NULL);
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access` int(11) NOT NULL COMMENT 'Permisos de accesos\n0=basico\n1=administrador\n',
  `level` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Romina','romina@seriales.com','$2y$10$YDoB0cZF30MZKXOGSeT90OgbeLk/f6oAchEGq13aFYUNL0Z3tVouK','5d41105c94a61.png',9,1,NULL,NULL),(12,'Aldana','aldana@seriales.com','$2y$10$xb5kOk5lgsxbvS87JQFdouf5KAADKOF212O/faF.O8YNFjjl4vSDe','misterX.jpg',9,1,NULL,NULL),(13,'Cynthia','cynthia@seriales.com','$2y$10$EY/nXdh1qIV8Yii3jmzyOeNyOz2CaOHqYt03jMJfoxF1Xj3yDIOk.','misterX.jpg',9,1,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-04 18:34:52
