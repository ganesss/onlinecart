CREATE DATABASE  IF NOT EXISTS `onlinecart` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `onlinecart`;
-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: onlinecart
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.18.04.1

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
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `sessionid` varchar(100) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_details`
--

LOCK TABLES `customer_details` WRITE;
/*!40000 ALTER TABLE `customer_details` DISABLE KEYS */;
INSERT INTO `customer_details` VALUES (1,'Ganesh Kumar','ganeshkumar.t@apaengineering.com','9043828245','E3 A block\nAtulya Apartment','2021-04-29'),(2,'Ganesh Kumar','ganeshkumart07@gmail.com','9043828245','E3 A block\nAtulya Apartment','2021-04-29'),(3,'Ganesh Kumar','ganeshkumart07@gmail.com','9043828245','E3 A block, Atulya Apartment','2021-04-29');
/*!40000 ALTER TABLE `customer_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sessionid` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `totalPrice` varchar(45) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,'20210429E4C5','ganeshkumar.t@apaengineering.com','b3vvsk0cav6iia37o4an9cve0pd6ir4i','9043828245','Placed','215000',1,'E3 A block\nAtulya Apartment'),(2,'202104291F5F','ganeshkumar.t@apaengineering.com','f1bltb5d47fhn1jmudrqoct8vckj6tb7','9043828245','Placed','117000',1,'E3 A block\nAtulya Apartment'),(3,'20210429172D','ganeshkumar.t@apaengineering.com','ajiguu4fablamcn2ba6l5miiuagg5vd9','9043828245','Placed','62000',1,'E3 A block\nAtulya Apartment'),(4,'202104295208','ganeshkumar.t@apaengineering.com','3v5836ne9dq8heclvj54c0k1fj29qicl','9043828245','Placed','229500',1,'E3 A block\nAtulya Apartment'),(5,'2021042945D6','ganeshkumar.t@apaengineering.com','6opmo09uedmuik6v75pnuivks6ocrje6','9043828245','Placed','24500',1,'E3 A block\nAtulya Apartment'),(6,'202104290967','ganeshkumar.t@apaengineering.com','h6msbd7mn0kjakp4842fvplghct1nte0','9043828245','Placed','6000',1,'E3 A block\nAtulya Apartment'),(7,'2021042971A9','ganeshkumar.t@apaengineering.com','mcv0lanktrkv0eufoek2tp12hbtvpstf','9043828245','Placed','68000',1,'E3 A block\nAtulya Apartment'),(8,'202104290C88','ganeshkumart07@gmail.com','f92vjias1as4nl2ai8kqckeu319qb053','9043828245','Placed','152000',2,'E3 A block\nAtulya Apartment'),(9,'202104294082','ganeshkumart07@gmail.com','lfhnlpk2l7t4u1uicfnl4626o47rdvjc','9043828245','Placed','71000',3,'E3 A block, Atulya Apartment');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `sessionid` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `order_number` varchar(100) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'b3vvsk0cav6iia37o4an9cve0pd6ir4i',1,'20210429E4C5',1,100000,'2021-04-29'),(2,'b3vvsk0cav6iia37o4an9cve0pd6ir4i',1,'20210429E4C5',2,5000,'2021-04-29'),(3,'b3vvsk0cav6iia37o4an9cve0pd6ir4i',1,'20210429E4C5',5,50000,'2021-04-29'),(4,'b3vvsk0cav6iia37o4an9cve0pd6ir4i',1,'20210429E4C5',6,60000,'2021-04-29'),(5,'f1bltb5d47fhn1jmudrqoct8vckj6tb7',1,'202104291F5F',2,5000,'2021-04-29'),(6,'f1bltb5d47fhn1jmudrqoct8vckj6tb7',1,'202104291F5F',3,2000,'2021-04-29'),(7,'f1bltb5d47fhn1jmudrqoct8vckj6tb7',1,'202104291F5F',5,50000,'2021-04-29'),(8,'f1bltb5d47fhn1jmudrqoct8vckj6tb7',1,'202104291F5F',6,60000,'2021-04-29'),(9,'ajiguu4fablamcn2ba6l5miiuagg5vd9',1,'20210429172D',2,5000,'2021-04-29'),(10,'ajiguu4fablamcn2ba6l5miiuagg5vd9',1,'20210429172D',3,2000,'2021-04-29'),(11,'ajiguu4fablamcn2ba6l5miiuagg5vd9',1,'20210429172D',2,5000,'2021-04-29'),(12,'ajiguu4fablamcn2ba6l5miiuagg5vd9',1,'20210429172D',5,50000,'2021-04-29'),(13,'3v5836ne9dq8heclvj54c0k1fj29qicl',1,'202104295208',2,5000,'2021-04-29'),(14,'3v5836ne9dq8heclvj54c0k1fj29qicl',1,'202104295208',1,100000,'2021-04-29'),(15,'3v5836ne9dq8heclvj54c0k1fj29qicl',1,'202104295208',6,60000,'2021-04-29'),(16,'3v5836ne9dq8heclvj54c0k1fj29qicl',1,'202104295208',5,50000,'2021-04-29'),(17,'3v5836ne9dq8heclvj54c0k1fj29qicl',1,'202104295208',4,6000,'2021-04-29'),(18,'3v5836ne9dq8heclvj54c0k1fj29qicl',1,'202104295208',8,500,'2021-04-29'),(19,'3v5836ne9dq8heclvj54c0k1fj29qicl',1,'202104295208',7,8000,'2021-04-29'),(20,'6opmo09uedmuik6v75pnuivks6ocrje6',1,'2021042945D6',2,5000,'2021-04-29'),(21,'6opmo09uedmuik6v75pnuivks6ocrje6',1,'2021042945D6',4,6000,'2021-04-29'),(22,'6opmo09uedmuik6v75pnuivks6ocrje6',1,'2021042945D6',4,6000,'2021-04-29'),(23,'6opmo09uedmuik6v75pnuivks6ocrje6',1,'2021042945D6',3,2000,'2021-04-29'),(24,'6opmo09uedmuik6v75pnuivks6ocrje6',1,'2021042945D6',2,5000,'2021-04-29'),(25,'6opmo09uedmuik6v75pnuivks6ocrje6',1,'2021042945D6',8,500,'2021-04-29'),(26,'h6msbd7mn0kjakp4842fvplghct1nte0',1,'202104290967',4,6000,'2021-04-29'),(27,'mcv0lanktrkv0eufoek2tp12hbtvpstf',1,'2021042971A9',3,2000,'2021-04-29'),(28,'mcv0lanktrkv0eufoek2tp12hbtvpstf',1,'2021042971A9',4,6000,'2021-04-29'),(29,'mcv0lanktrkv0eufoek2tp12hbtvpstf',1,'2021042971A9',6,60000,'2021-04-29'),(30,'f92vjias1as4nl2ai8kqckeu319qb053',2,'202104290C88',1,100000,'2021-04-29'),(31,'f92vjias1as4nl2ai8kqckeu319qb053',2,'202104290C88',3,2000,'2021-04-29'),(32,'f92vjias1as4nl2ai8kqckeu319qb053',2,'202104290C88',5,50000,'2021-04-29'),(33,'lfhnlpk2l7t4u1uicfnl4626o47rdvjc',3,'202104294082',2,5000,'2021-04-29'),(34,'lfhnlpk2l7t4u1uicfnl4626o47rdvjc',3,'202104294082',6,60000,'2021-04-29'),(35,'lfhnlpk2l7t4u1uicfnl4626o47rdvjc',3,'202104294082',4,6000,'2021-04-29');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `short_description` varchar(100) DEFAULT NULL,
  `long_description` text,
  `product_image` varchar(200) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
INSERT INTO `product_details` VALUES (1,'Iphone With Wireless Device','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon.','gadget-1-300x300.jpg',100000,'inactive','2021-04-29','2021-04-29'),(2,'Brown Leather Panerai Watch','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon.','watch-2-300x300.jpg',5000,'active','2021-04-28',NULL),(3,'High Quality Black Headphone','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon.','gadget-2-300x300.jpg',2000,'active','2021-04-28',NULL),(4,'Men Watch For Gift','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon.','watch-1-300x300.jpg',6000,'active','2021-04-28',NULL),(5,'Diamond Coated Girls Ring','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon.','rings-300x300.jpg',50000,'active','2021-04-28',NULL),(6,'Heart Shape Watch Bracelets','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon.','watch-3-300x300.jpg',60000,'active','2021-04-28',NULL),(7,'Summer Dress For Girls','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon.\n\nMuffin cake dragée chupa chups sweet icing gummi bears liquorice. Soufflé topping toffee jelly beans chocolate cake. Liquorice caramels brownie bonbon. Sweet roll donut oat cake pie. Apple pie oat cake cheesecake lollipop muffin. Sweet brownie tootsie roll chocolate bar chocolate cake. Dessert topping candy cake lemon drops brownie cookie. Powder candy jelly-o. Gummies chocolate bar jujubes.','jeans-300x300.jpg',8000,'active','2021-04-28',NULL),(8,'Pink Check Flat Shoes','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muff','Cupcake ipsum dolor sit amet cheesecake sesame snaps danish. Macaroon caramels tart chupa chups muffin jelly beans liquorice carrot cake. Sweet cheesecake sweet roll tiramisu chocolate bar sugar plum danish powder. Candy ice cream liquorice. Oat cake sweet sweet chocolate bar halvah lollipop caramels candy. Lollipop tiramisu soufflé jelly beans donut bonbon brownie. Toffee caramels sweet. Candy candy canes halvah lollipop.\n\nCarrot cake sweet roll biscuit halvah wafer brownie gummi bears. Donut cupcake carrot cake. Chocolate dragée sweet. Icing marshmallow danish fruitcake dragée halvah pastry candy canes caramels. Gummies soufflé sesame snaps gummies jujubes gingerbread gummi bears. Sweet gummi bears cupcake bonbon muffin. Powder cake candy gummies sugar plum wafer oat cake biscuit cheesecake. Bonbon danish chupa chups pastry macaroon','shoes-3-300x300.jpg',500,'active','2021-04-29',NULL);
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'onlinecart'
--

--
-- Dumping routines for database 'onlinecart'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-29 16:44:05
