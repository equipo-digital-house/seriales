-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: seriales_db
-- ------------------------------------------------------
-- Server version	8.0.16

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
-- Table structure for table `frequentquestions`
--

DROP TABLE IF EXISTS `frequentquestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `frequentquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frequentquestions`
--

LOCK TABLES `frequentquestions` WRITE;
/*!40000 ALTER TABLE `frequentquestions` DISABLE KEYS */;
INSERT INTO `frequentquestions` VALUES (1,'¿Qué es Seriales?','Seriales es un juego en línea de preguntas y respuestas sobre las series contemporáneas más influyentes. Podrás poner a prueba tu conocimiento sobre tus series favoritas y competir en línea con muchos otros fanáticos del mundo. ¡Esperamos que te diviertas!'),(2,'¿Como puedo jugar?','Para jugar, ve a \"Registrarme\" y completa los datos requeridos. Una vez hecho esto, recibirás un correo con un enlace para dar de alta tu usuario. Luego, podrás iniciar sesión y ¡listo! Ya estarás listo para jugar.'),(3,'Me registre y no me puedo loguear','Si realizaste tu registro, no olvides revisar su casilla de correo y hacer clic en el enlace que te llegará para dar de alta tu usuario. Luego, ya podrás iniciar sesión.'),(4,'¿Hay que pagar para jugar?','No, este juego es gratuito. Queremos que la diversión esté al alcance de todxs.'),(5,'¿Necesito instalar una aplicación complementaria?','No, no necesitas descargar ni instalar nada para jugar. Puedes acceder al juego desde cualquier pc, laptop o celular. Seriales no es una aplicación.'),(6,'¿Cómo se juega?','Cuando elijas comenzar el juego, deberás elegir una serie entre la lista de opciones disponibles o, si te sientes inspiradx, podrás jugar con todas las series al mismo tiempo. Cuando elijas una de las opciones, se disparará un grupo de preguntas que tendrán cuatro respuestas posibles cada una. Deberás elegir la que consideres correcta dentro de un tiempo límite de 15 segundos, que marcará un contador. Hay respuestas de tipo texto y respuestas de tipo imagen. Por cada pregunta de nivel 1 que respondas bien, recibirás un punto. Por las de nivel 2, dos puntos y por las de nivel 3, tres puntos. El juego tiene tres niveles de dificultad. A medida que avances respondiendo preguntas correctamente, este se incrementará. El puntaje acumulado se irá registrando y subirás posiciones en la tabla de jugadores.'),(7,'¿Puedo invitar a mis amigxs a jugar?','¡Claro que sí! Nos gusta la tele fuerte, la cerveza fría y lxs jugadorxs copados, copados, así que invitá a todxs lxs amigxs que quieras. :)');
/*!40000 ALTER TABLE `frequentquestions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-02 20:09:05
