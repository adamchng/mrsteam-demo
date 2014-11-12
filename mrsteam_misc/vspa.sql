-- MySQL dump 10.13  Distrib 5.5.21, for Linux (x86_64)
--
-- Host: localhost    Database: vspa
-- ------------------------------------------------------
-- Server version	5.5.21

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
-- Table structure for table `configurator`
--

DROP TABLE IF EXISTS `configurator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configurator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `picture` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configurator`
--

LOCK TABLES `configurator` WRITE;
/*!40000 ALTER TABLE `configurator` DISABLE KEYS */;
INSERT INTO `configurator` VALUES (1,'generator','Generator Selection Sizing','To get started, please select the size of your room in order to select the correct generator model for your spa.','images/products/generator1.png',1),(2,'control','Select Package OR Control','Select the controls for your spa. You can save money by selecting an existing package.','',1),(3,'spatherapy','Select Spa Package','Mr. Steam merges scent, light and sound with steam to create a total-body sensory experience.','',1),(4,'accessory','Accessories','Add customized light fixtures, essential oils and other accessories to your dream spa. ','',1),(5,'towelwarmer','Select Towel Warmer','Mr. Steam has designed the most efficient and innovative towel warmers that offer aromatherapy features in a wide range of sizes and finishes.','',1),(6,'review','','','',1),(7,'controlaccessory','Steam bath accessories a\'la carte','Select additional steam bath accessories.','',1),(8,'spaoil','Select AromaSteam Oils','Select your AromaSteam oils for use with the AromaSteam pump. ','',1),(9,'towelwarmeritem','Select your towel warmer','','',1),(10,'towelwarmeraccessory','Select towel warmer accessory','Add one or more accessories for your towel warmer selection.','',1),(11,'accessoryoil','Add Essential Oils','Add essential oils to your dream spa.','',1);
/*!40000 ALTER TABLE `configurator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control`
--

DROP TABLE IF EXISTS `control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `length` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control`
--

LOCK TABLES `control` WRITE;
/*!40000 ALTER TABLE `control` DISABLE KEYS */;
INSERT INTO `control` VALUES (1,'BUTLER Package 1 Round','','',NULL,NULL,NULL,NULL,1450,1,'2012-06-15 04:41:24'),(2,'BUTLER Package 2 Round','','',NULL,NULL,NULL,NULL,2000,1,'2012-06-15 04:41:42'),(3,'BUTLER Package 1 Square','','',NULL,NULL,NULL,NULL,1450,1,'2012-06-15 04:42:02'),(4,'BUTLER Package 2 Square','','',NULL,NULL,NULL,NULL,2000,1,'2012-06-15 04:42:13'),(5,'eTEMPO/Plus Control Round','','',NULL,NULL,NULL,NULL,800,1,'2012-06-15 04:43:03'),(6,'eTEMPO/Plus Control Square','','',NULL,NULL,NULL,NULL,800,1,'2012-06-15 04:43:19'),(7,'eTEMPO Control Round','','',NULL,NULL,NULL,NULL,450,1,'2012-06-15 04:45:29'),(8,'eTEMPO Control Square','','',NULL,NULL,NULL,NULL,450,1,'2012-06-15 04:45:42');
/*!40000 ALTER TABLE `control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control_finish`
--

DROP TABLE IF EXISTS `control_finish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `control_finish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `control_id` int(11) DEFAULT NULL,
  `finish_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `control_finish_FI_1` (`control_id`),
  KEY `control_finish_FI_2` (`finish_id`),
  CONSTRAINT `control_finish_FK_1` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`),
  CONSTRAINT `control_finish_FK_2` FOREIGN KEY (`finish_id`) REFERENCES `finish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control_finish`
--

LOCK TABLES `control_finish` WRITE;
/*!40000 ALTER TABLE `control_finish` DISABLE KEYS */;
/*!40000 ALTER TABLE `control_finish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control_package`
--

DROP TABLE IF EXISTS `control_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `control_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `length` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control_package`
--

LOCK TABLES `control_package` WRITE;
/*!40000 ALTER TABLE `control_package` DISABLE KEYS */;
INSERT INTO `control_package` VALUES (1,'BUTLER Package 1 Round','(1) eTEMPO/Plus Control, (1) AromaSteam Steamhead, (1) AutoFlush, (1) SteamGenie, (1) Drain Pan\r\n<p>\r\n<P><STRONG>Everything you need to ensure a great steambath along with significant savings:<BR></STRONG></P>\r\n<UL>\r\n<LI>Deluxe control made from brass construction \r\n<LI>Award winning flush mount aroma steamhead \r\n<LI>Autoflush- a must to lengthen system life-AUTOmatically flushes out the dirty water after   every use and brings in clean water without you doing anything \r\n<LI>Start your steamroom from anywhere in the home with  industry\'s first wireless Steam Genie \r\n<LI>Drip pan is designed to meet local codes<BR></LI></UL>','<P><STRONG>BUTLER PACKAGE 1</STRONG> <STRONG>ROUND:<BR></STRONG>Includes: </P>\r\n<UL>\r\n<LI>(1) eTEMPO/Plus® Control \r\n<UL>\r\n<LI>Available Finishes: Polished Chrome (PC), Polished Nickel (PN), Brushed Nickel (BN), Polished Gold (PG), Oil Rubbed Bronze (ORB), Polished Brass (PB), Brushed Bronze (BB), Antique Brass (AB), Satin Nickel (SN), Matte Black (MB) \r\n<LI>Programmable time and temperature \r\n<LI>on/off feature for ChromaSteam™ and AromaSteam \r\n<LI>Can store two preset time and temperature programs \r\n<LI>Digital Clock \r\n<LI>Compatible with all MS generators and Steam Genie™ control \r\n<LI>30 ft cable, optional 60ft available</LI></UL>\r\n<LI>AromaSteam™ Steamhead \r\n<UL>\r\n<LI>Brass construction \r\n<LI>No field assembly required \r\n<LI>Round style</LI></UL>\r\n<LI>AutoFlush® \r\n<UL>\r\n<LI>2 hour time delay after generator shut off</LI></UL>\r\n<LI>Steam Genie™ \r\n<UL>\r\n<LI>Functions with eTEMPO and eTEMPO/Plus Control \r\n<LI>Working range: 100 ft \r\n<LI>Waterproof actuator</LI></UL>\r\n<LI>Drip Pan \r\n<UL>\r\n<LI>3/4\" drain copper fitting</LI></UL></LI></UL>\r\n<P><SPAN style=\"FONT-FAMILY: \'Georgia\',\'serif\'; COLOR: #666666\"><FONT color=#000000>Ships in one box<BR>Length- 22.5\" Width- 10\" Height- 9\" Weight- 12lbs&nbsp;</FONT></SPAN></P><BR>\r\n<P><A name=4028731></A></P>',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:40:00'),(2,'BUTLER Package 2 Round','(1) eTEMPO/Plus Control, (1) SteamGenie, (2) AromaSteam Steamhead, (2) Auto Flush, (2) Drain Pan','',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:42:20'),(3,'BUTLER Package 1 Square','(1) eTEMPO/Plus Control, (1) AromaSteam Steamhead, (1) AutoFlush, (1) SteamGenie, (1) Drain Pan\r\n<P>\r\n<P><STRONG>Everything you need to ensure a great steambath along with significant savings:<BR></STRONG></P>\r\n<UL>\r\n<LI>Deluxe control made from brass construction \r\n<LI>Award winning flush mount aroma steamhead \r\n<LI>Autoflush- a must to lengthen system life-AUTOmatically flushes out the dirty water after   every use and brings in clean water without you doing anything \r\n<LI>Start your steamroom from anywhere in the home with  industry\'s first wireless Steam Genie \r\n<LI>Drip pan is designed to meet local codes<BR></LI></UL>','<BR>Includes:\r\n<UL>\r\n<LI><STRONG>(1) eTEMPO/Plus® Control </STRONG>\r\n<UL>\r\n<LI>Available Finishes: Polished Chrome (PC), Polished Nickel (PN), Brushed Nickel (BN), Polished Gold (PG), Oil Rubbed Bronze (ORB), Polished Brass (PB), Brushed Bronze (BB), Antique Brass (AB), Satin Nickel (SN), Matte Black (MB) \r\n<LI>Programmable time and temperature \r\n<LI>on/off feature for ChromaSteam™ and AromaSteam \r\n<LI>Can store two preset time and temperature programs \r\n<LI>Digital Clock \r\n<LI>Compatible with all MS generators and Steam Genie™ control \r\n<LI>30 ft cable, optional 60ft available</LI></UL>\r\n<LI><STRONG>(1) AromaSteam™ Steamhead </STRONG>\r\n<UL>\r\n<LI>Brass construction \r\n<LI>No field assembly required \r\n<LI>Square style</LI></UL>\r\n<LI><STRONG>(1) AutoFlush® </STRONG>\r\n<UL>\r\n<LI>2 hour time delay after generator shut off</LI></UL>\r\n<LI><STRONG>(1) Steam Genie™ </STRONG>\r\n<UL>\r\n<LI>Functions with eTEMPO and eTEMPO/Plus Control \r\n<LI>Working range: 100 ft \r\n<LI>Waterproof actuator</LI></UL>\r\n<LI><STRONG>(1) Drip Pan </STRONG>\r\n<UL>\r\n<LI>3/4\" drain copper fitting</LI></UL></LI></UL>\r\n<P><SPAN style=\"FONT-FAMILY: \'Georgia\',\'serif\'; COLOR: #666666\"><FONT color=#000000>Ships in one box<BR>Length- 22.5\" Width- 10\" Height- 9\" Weight- 12lbs ',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:43:00'),(4,'BUTLER Package 2 Square','(1) eTEMPO/Plus Control, (1) SteamGenie, (2) AromaSteam Steamhead, (2) Auto Flush, (2) Drain Pan','',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:43:00'),(5,'eTEMPO/Plus Control Round','<P>• Beautiful, Deluxe Surface-mounted In-shower Control<BR>• Matching AromaSteam™ steam head<BR>• Digital display, programmable time and temperature<BR>• Stores two preferred time and temperature settings<BR>• Integrated on/off keypad feature for AromaSteam™ & ChromaSteam®<BR>• Integrated with wireless Steam Genie™ control<BR>• Includes Digital Clock<BR>• Suitable for all MS Generators</P>','<STRONG>(1) eTEMPO/Plus® Control</STRONG> \r\n<UL>\r\n<LI>Available Finishes: Polished Chrome (PC), Polished Nickel (PN), Brushed Nickel (BN), Polished Gold (PG), Oil Rubbed Bronze (ORB), Polished Brass (PB), Brushed Bronze (BB), Antique Brass (AB), Satin Nickel (SN), Matte Black (MB) \r\n<LI>Programmable time and temperature \r\n<LI>on/off feature for ChromaSteam™ and AromaSteam \r\n<LI>Can store two preset time and temperature programs \r\n<LI>Digital Clock \r\n<LI>Compatible with all MS generators and Steam Genie™ control \r\n<LI>30 ft cable, optional 60ft available</LI></UL>\r\n<LI><STRONG>(1) AromaSteam™ Steamhead</STRONG> \r\n<UL>\r\n<LI>Brass construction \r\n<LI>No field assembly required \r\n<LI>Round style</LI></UL>\r\n<P>• Tube of Silicone Sealant<BR>• Owner’s Manual<BR><BR>NOTE: The eTempo/Plus is required operating equipment for generator models MS Super 1E - 6E</P>\r\n<P>Ships in one box:<BR>Length- 10\" Width- 6.25\" Height- 3.5\" Weight- 4lbs</P>',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:47:00'),(6,'eTEMPO/Plus Control Square','<span id=\"lblDescription\" style=\"color:#666666;font-family:Georgia;font-size:Small;font-weight:normal;\">• Beautiful, Deluxe Surface-mounted In-shower Control<BR>• Matching AromaSteam™ steam head<BR>• Digital display, programmable time and temperature<BR>• Stores two preferred time and temperature settings<BR>• Integrated on/off keypad feature for AromaSteam™ & ChromaSteam®<BR>• Integrated with wireless Steam Genie™ control<BR>• Includes Digital Clock<BR>• Suitable for all MS Generators</span>','<LI><STRONG>(1) eTEMPO/Plus® Control</STRONG> \r\n<UL>\r\n<LI>Available Finishes: Polished Chrome (PC), Polished Nickel (PN), Brushed Nickel (BN), Polished Gold (PG), Oil Rubbed Bronze (ORB), Polished Brass (PB), Brushed Bronze (BB), Antique Brass (AB), Satin Nickel (SN), Matte Black (MB) \r\n<LI>Programmable time and temperature \r\n<LI>on/off feature for ChromaSteam™ and AromaSteam \r\n<LI>Can store two preset time and temperature programs \r\n<LI>Digital Clock \r\n<LI>Compatible with all MS generators and Steam Genie™ control \r\n<LI>30 ft cable, optional 60ft available</LI></UL>\r\n<LI><STRONG>AromaSteam Steamhead</STRONG> \r\n<UL>\r\n<LI>Brass construction \r\n<LI>No field assembly required \r\n<LI>Square&nbsp;style</LI></UL>\r\n<P>• Tube of Silicone Sealant<BR>• Owner’s Manual<BR><BR>NOTE: The eTempo/Plus is required operating equipment for generator models MS Super 1E - 6E</P>\r\n<P>Ships in one box:<BR>Length- 10\" Width- 6.25\" Height- 3.5\" Weight- 4lbs</P>',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:48:00'),(7,'eTEMPO Control Round','eTempo Control not for use with models MS SUPER 1E-6E','',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:50:00'),(8,'eTEMPO Control Square','eTempo Control not for use with Models MS SUPER 1E-6E','',NULL,NULL,NULL,NULL,NULL,1,'2012-05-28 20:51:31');
/*!40000 ALTER TABLE `control_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control_package_control`
--

DROP TABLE IF EXISTS `control_package_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `control_package_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `control_package_id` int(11) DEFAULT NULL,
  `control_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `control_package_control_FI_1` (`control_package_id`),
  KEY `control_package_control_FI_2` (`control_id`),
  CONSTRAINT `control_package_control_FK_1` FOREIGN KEY (`control_package_id`) REFERENCES `control_package` (`id`),
  CONSTRAINT `control_package_control_FK_2` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control_package_control`
--

LOCK TABLES `control_package_control` WRITE;
/*!40000 ALTER TABLE `control_package_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `control_package_control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finish`
--

DROP TABLE IF EXISTS `finish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `code` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finish`
--

LOCK TABLES `finish` WRITE;
/*!40000 ALTER TABLE `finish` DISABLE KEYS */;
INSERT INTO `finish` VALUES (1,'Polished Chrome','PC',1,''),(2,'Polished Nickel','PN',1,''),(3,'Brushed Nickel','BN',1,''),(4,'Polished Gold','PG',1,''),(5,'Oil Rubbed Bronze','ORB',1,''),(6,'Polished Brass','PB',1,''),(7,'Brushed Bronze','BB',1,''),(8,'Antique Brass','AB',1,''),(9,'Satin Nickel','SN',1,''),(10,'Matte Black','MB',1,''),(11,'White','WH',0,''),(12,'Brushed Chrome','BC',0,''),(13,'Stainless Steel Polished','SSP',0,''),(14,'Stainless Steel Brushed','SSB',0,'');
/*!40000 ALTER TABLE `finish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generator`
--

DROP TABLE IF EXISTS `generator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(145) DEFAULT NULL,
  `description` text,
  `roomvolumemin` int(11) DEFAULT NULL,
  `roomvolumemax` int(11) DEFAULT NULL,
  `kw` varchar(5) DEFAULT NULL,
  `voltage` varchar(45) DEFAULT NULL,
  `amps` varchar(5) DEFAULT NULL,
  `wiresize` varchar(5) DEFAULT NULL,
  `length` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `depth` float DEFAULT NULL,
  `waterusagegallons` float DEFAULT NULL,
  `shippingweight` float DEFAULT NULL,
  `tech_notes` text,
  `picture` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generator`
--

LOCK TABLES `generator` WRITE;
/*!40000 ALTER TABLE `generator` DISABLE KEYS */;
INSERT INTO `generator` VALUES (1,'MS90E','Mr.Steam Standard Features\r\n• Stainless steel resevoir\r\n• Industrial, large diameter, serviceable heating element\r\n• Modular “snap-in” connections',1,100,'5','240','21','10',14.5,14.75,6.75,0.67,30,'Mr.Steam Standard Features\r\n• Stainless steel resevoir\r\n• Industrial, large diameter, serviceable heating element\r\n• Modular “snap-in” connections\r\n• Electronic water-level control system\r\n• Full-port drain valve.\r\n• Limited lifetime steam generator parts warranty\r\nSafety Features\r\n• UL recognized electronic controller system\r\n• Built-in, low-voltage 24-volt control\r\n• 60-minute electronic countdown with 75-minute limiting\r\nsafety back-up\r\n• ASME safety valve\r\n<p>\r\nRequired Plumbing\r\nWater Supply (3/8\" NPT) Steam Outlet (1/2\" NPT)\r\nSafety Valve (3/4\" NPT) Drain (1/2\" NPT)\r\nSteam Head (1/2\" NPT)\r\n<p>\r\n','images/products/gen_small.jpg',1450,1,'2012-05-26 05:48:00'),(2,'MS150E','	<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',101,150,'6','240','25','8',14.5,14.75,6.75,0.8,30,'\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_small.jpg',1750,1,'2012-05-26 05:49:00'),(3,'MS225E','		<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',151,225,'7.5','240','32','8',14.5,14.75,6.75,1,30,'	\r\n		\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_small.jpg',1850,1,'2012-05-26 05:50:00'),(4,'MS400E','		<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',226,360,'9','240','38','8',14.5,14.75,6.75,1.2,30,'\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_small.jpg',2050,1,'2012-05-26 05:51:00'),(5,'MSSUPER1E','	\r\n				<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',361,475,'10','240','42','8',17,18.5,7.875,1.4,40,'Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.','images/products/gen_large.jpg',2350,1,'2012-05-26 05:54:00'),(6,'MSSUPER2E','	<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',476,575,'12','240','50','6',17,18.5,7.875,1.6,40,'\r\n		\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_large.jpg',2550,1,'2012-05-26 05:55:00'),(7,'MSSUPER3E','	\r\n				<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',567,675,'15','240','63','4',17,18.5,7.875,2,40,'	\r\n		\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_large.jpg',2850,1,'2012-05-26 05:55:00'),(8,'MSSUPER4E','\r\n				\r\n				<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',676,875,'20','240','84','8',17,18.5,7.875,2.7,80,'\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_large_two.jpg',4800,1,'2012-05-26 05:57:00'),(9,'MSSUPER5E','	\r\n				<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',876,1075,'24','240','100','6',17,18.5,7.875,3.2,80,'\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_large_two.jpg',5200,1,'2012-05-26 05:58:00'),(10,'MSSUPER6E','<div class=\'title\'>MSSUPER6E</div>\r\n				\r\n				<div class=\'image-wrapper\'><img src=\'images/products/generator2.png\' alt=\'2 generators\'/></div>\r\n				<ul class=\'product-info\'>\r\n					<li>Lifetime Warranty</li>\r\n					<li>Built with 21st century microprocessor technology with LED diagnostics</li>\r\n					<li>Heating elements are constructed from same materials we use when building boilers for the US Navy and the CDC</li>\r\n					<li>Made out of recyclable stainless steel</li>\r\n					<li>Utilizes less than 2:7 gallons of water in a 20 minutes session</li>\r\n					<li>Can be installed up to 60 ft away</li>\r\n					<li>Easy to add plug and play aromatherapy and chromatherapy accessories even after its been installed</li>\r\n					<li>UL listed for peace of mind</li>\r\n				</ul>',1076,1275,'30','240','125','4',17,18.5,7.875,4,80,'<div class=\'title\'>MSSUPER6E</div>\r\n		\r\n				\r\n		\r\n				<div class=\'tech-left\'>\r\n                    <p>Two MSSUPER1 Generators that work in concert and are operated by using one eTempo/Plus control.</p>\r\n                </div><!-- .tech-left -->\r\n                \r\n                <div class=\'clear\'></div>\r\n                \r\n                   <div class=\'tech-left\'>\r\n                   	<span>(1) eTEMPO/Plus® Control</span>\r\n					<ul> \r\n						<li>Total Room Volume: 676 - 875</li>\r\n						<li>KW: 20</li>\r\n						<li>Voltage: 240/1PH</li>\r\n						<li>Amps: 84</li>\r\n						<li>Wire Size: 8</li>\r\n						<li>Dimensions**: 17\\\" L x 18 ½\\\" H x 7 7/8\\\" D x 2</li>\r\n						<li>Water Usage Gallons***: 2.7</li>\r\n						<li>Shipping Wt. (lbs.)****: 80</li>\r\n					</ul>			\r\n                   </div><!-- .tech-left -->\r\n                   \r\n                   <div class=\'tech-right\'>\r\n                    <ul> \r\n						<li>*Wire size (AWG) based on minimum 90°C rated THHN copper conductors.<br/>Refer to the National Electrical Code for other types of conductors.</li>\r\n						<li></li>\r\n                    	<li>**Dimensions are for generator only, without AutoFlush or plumbing features.</li>\r\n                    	<li>***Water usage based on 20 minutes of operation.\r\n                    	<li>****Shipping weight & pricing are for generator only, withou control or steamhead.</li>\r\n                    </ul>\r\n                </div>','images/products/gen_large_two.jpg',5800,1,'2012-05-26 06:00:00');
/*!40000 ALTER TABLE `generator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selection`
--

DROP TABLE IF EXISTS `selection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `sessionid` varchar(255) DEFAULT NULL,
  `generator_id` int(11) DEFAULT NULL,
  `control_package_id` int(11) DEFAULT NULL,
  `finish_id` int(11) DEFAULT NULL,
  `spa_package_id` int(11) DEFAULT NULL,
  `spa_oil_package_id` int(11) DEFAULT NULL,
  `towel_warmer_id` int(11) DEFAULT NULL,
  `towel_warmer_finish_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selection_FI_1` (`user_id`),
  KEY `selection_FI_2` (`generator_id`),
  KEY `selection_FI_3` (`control_package_id`),
  KEY `selection_FI_4` (`finish_id`),
  KEY `selection_FI_5` (`spa_package_id`),
  KEY `selection_FI_6` (`spa_oil_package_id`),
  KEY `selection_FI_7` (`towel_warmer_id`),
  KEY `selection_FI_8` (`towel_warmer_finish_id`),
  CONSTRAINT `selection_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `selection_FK_2` FOREIGN KEY (`generator_id`) REFERENCES `generator` (`id`),
  CONSTRAINT `selection_FK_3` FOREIGN KEY (`control_package_id`) REFERENCES `control_package` (`id`),
  CONSTRAINT `selection_FK_4` FOREIGN KEY (`finish_id`) REFERENCES `finish` (`id`),
  CONSTRAINT `selection_FK_5` FOREIGN KEY (`spa_package_id`) REFERENCES `spa_package` (`id`),
  CONSTRAINT `selection_FK_6` FOREIGN KEY (`spa_oil_package_id`) REFERENCES `spa_oil_package` (`id`),
  CONSTRAINT `selection_FK_7` FOREIGN KEY (`towel_warmer_id`) REFERENCES `towel_warmer` (`id`),
  CONSTRAINT `selection_FK_8` FOREIGN KEY (`towel_warmer_finish_id`) REFERENCES `towel_warmer_finish` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selection`
--

LOCK TABLES `selection` WRITE;
/*!40000 ALTER TABLE `selection` DISABLE KEYS */;
INSERT INTO `selection` VALUES (1,NULL,'0bgh1jsmfc4o4dgoko4otj0lj3',NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,'7sh0jg3ji5dfqog04ona2vptr6',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,'stvfgsimk0pitttjmc3fb9r3n2',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,'l5af5q3ltao025rctlf0enjvp6',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,'827958abqj6kpb82h67919lgj2',NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,'d6dou90stoub80tf2p0mpiocc7',NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,'m5o9ktiqbu2e9sslnnmam1s3p2',NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,'u42hqqkpifm7941ah8okrvj115',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,'dlql5l8jilkbs1j3rnhll87bb7',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,'lqt1o5a4lsmi1027c8hirif4v5',NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,'1o8liuoof8bec94s3keq0nvaj6',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,'p9tbfhbr3f3q3jnvv1pf6dc311',NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,NULL,'sbolgspvqgkgvptnqqerlij1s0',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,NULL,'3nbvkf8hhvoilde6h0di3ete20',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,'8ni8f7pd7nng696s2s05mrkmv4',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,NULL,'ph1900i9ovf6qkfvpc9rb5s2h3',NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,NULL,'f4p4uigjlcqa9teck7eg9r1sd2',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,NULL,'rtqt28k57kqto2ajv8ekpoec83',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,NULL,'bj3690gcg8raogrq53t1bkq0f6',NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,NULL,'796dn3aaripel7vm1glpas3ap4',NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,NULL,'a86uhcl531ml9bscejp09ikls3',NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,NULL,'2c4qr2gjo399sijuvj7epoq3u6',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,NULL,'m19md4p8o4l0a4ui25sp6qcg56',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,NULL,'9rm6pt0j317tu7b3ghpdoa8q85',NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,NULL,'bqr6uak35b2o52kivt1803ou87',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,NULL,'eqv0928j79cpvs2rv10hjmesf6',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `selection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selection_control`
--

DROP TABLE IF EXISTS `selection_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selection_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_id` int(11) DEFAULT NULL,
  `control_id` int(11) DEFAULT NULL,
  `finish_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selection_control_FI_1` (`selection_id`),
  KEY `selection_control_FI_2` (`control_id`),
  KEY `selection_control_FI_3` (`finish_id`),
  CONSTRAINT `selection_control_FK_1` FOREIGN KEY (`selection_id`) REFERENCES `selection` (`id`),
  CONSTRAINT `selection_control_FK_2` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`),
  CONSTRAINT `selection_control_FK_3` FOREIGN KEY (`finish_id`) REFERENCES `finish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selection_control`
--

LOCK TABLES `selection_control` WRITE;
/*!40000 ALTER TABLE `selection_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `selection_control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selection_spa_accessory`
--

DROP TABLE IF EXISTS `selection_spa_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selection_spa_accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_id` int(11) DEFAULT NULL,
  `spa_accessory_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selection_spa_accessory_FI_1` (`selection_id`),
  KEY `selection_spa_accessory_FI_2` (`spa_accessory_id`),
  CONSTRAINT `selection_spa_accessory_FK_1` FOREIGN KEY (`selection_id`) REFERENCES `selection` (`id`),
  CONSTRAINT `selection_spa_accessory_FK_2` FOREIGN KEY (`spa_accessory_id`) REFERENCES `spa_accessory` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selection_spa_accessory`
--

LOCK TABLES `selection_spa_accessory` WRITE;
/*!40000 ALTER TABLE `selection_spa_accessory` DISABLE KEYS */;
/*!40000 ALTER TABLE `selection_spa_accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selection_steam_bath_accessory`
--

DROP TABLE IF EXISTS `selection_steam_bath_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selection_steam_bath_accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_id` int(11) DEFAULT NULL,
  `steam_bath_accessory_id` int(11) DEFAULT NULL,
  `finish_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selection_steam_bath_accessory_FI_1` (`selection_id`),
  KEY `selection_steam_bath_accessory_FI_2` (`steam_bath_accessory_id`),
  KEY `selection_steam_bath_accessory_FI_3` (`finish_id`),
  CONSTRAINT `selection_steam_bath_accessory_FK_1` FOREIGN KEY (`selection_id`) REFERENCES `selection` (`id`),
  CONSTRAINT `selection_steam_bath_accessory_FK_2` FOREIGN KEY (`steam_bath_accessory_id`) REFERENCES `steam_bath_accessory` (`id`),
  CONSTRAINT `selection_steam_bath_accessory_FK_3` FOREIGN KEY (`finish_id`) REFERENCES `finish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selection_steam_bath_accessory`
--

LOCK TABLES `selection_steam_bath_accessory` WRITE;
/*!40000 ALTER TABLE `selection_steam_bath_accessory` DISABLE KEYS */;
/*!40000 ALTER TABLE `selection_steam_bath_accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spa_accessory`
--

DROP TABLE IF EXISTS `spa_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spa_accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `length` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spa_accessory`
--

LOCK TABLES `spa_accessory` WRITE;
/*!40000 ALTER TABLE `spa_accessory` DISABLE KEYS */;
INSERT INTO `spa_accessory` VALUES (1,'AromaSteam','','',NULL,NULL,NULL,NULL,1100,1,'2012-06-02 03:25:22'),(2,'ChromaSteam','ChromaSteam generates soothing light for your aromatherapy experience.','Special light is made of high quality LEDs giving out brilliant soothing colors for you spa enjoyment.',NULL,NULL,NULL,NULL,450,1,'2012-06-02 03:25:00'),(3,'Music Therapy Speakers','','',NULL,NULL,NULL,NULL,250,1,'2012-06-02 03:26:02'),(4,'Stealth Speakers','desc for stealth speakers','tech notes for stealth speakers',NULL,NULL,NULL,NULL,400,1,'2012-06-02 03:26:00'),(5,'Spa Package','','',NULL,NULL,NULL,NULL,1700,1,'2012-06-02 03:35:31'),(6,'Spa Stealth Package','','',NULL,NULL,NULL,NULL,1850,1,'2012-06-02 03:36:17');
/*!40000 ALTER TABLE `spa_accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spa_oil`
--

DROP TABLE IF EXISTS `spa_oil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spa_oil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spa_oil`
--

LOCK TABLES `spa_oil` WRITE;
/*!40000 ALTER TABLE `spa_oil` DISABLE KEYS */;
INSERT INTO `spa_oil` VALUES (1,'Eucalyptus','','',100,1,'2012-06-02 14:57:22'),(2,'Evergreen','','',100,1,'2012-06-02 14:57:35'),(3,'Mint','','',100,1,'2012-06-02 14:57:44'),(4,'Breathe','','',100,1,'2012-06-02 14:57:56'),(5,'Lavender','','',100,1,'2012-06-02 14:58:08'),(6,'5-Pack','One of each: Eucalyptus, Evergreen, Mint, Breathe, Lavender','The best deal',500,1,'2012-06-02 14:59:00'),(7,'Vitality','','',30,1,'2012-06-02 20:32:30'),(8,'Invigorate','','',30,1,'2012-06-02 20:32:44'),(9,'Awakening','','',30,1,'2012-06-02 20:32:55'),(10,'Harmony','','',30,1,'2012-06-02 20:33:05'),(11,'Celestial','','',30,1,'2012-06-02 20:33:28'),(12,'Mystic','','',30,1,'2012-06-02 20:33:35'),(13,'Nirvana','','',30,1,'2012-06-02 20:33:44'),(14,'7-Pack','','',150,1,'2012-06-02 20:33:56');
/*!40000 ALTER TABLE `spa_oil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spa_oil_package`
--

DROP TABLE IF EXISTS `spa_oil_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spa_oil_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spa_oil_package`
--

LOCK TABLES `spa_oil_package` WRITE;
/*!40000 ALTER TABLE `spa_oil_package` DISABLE KEYS */;
/*!40000 ALTER TABLE `spa_oil_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spa_oil_package_spa_oil`
--

DROP TABLE IF EXISTS `spa_oil_package_spa_oil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spa_oil_package_spa_oil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spa_oil_package_id` int(11) DEFAULT NULL,
  `spa_oil_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spa_oil_package_spa_oil_FI_1` (`spa_oil_package_id`),
  KEY `spa_oil_package_spa_oil_FI_2` (`spa_oil_id`),
  CONSTRAINT `spa_oil_package_spa_oil_FK_1` FOREIGN KEY (`spa_oil_package_id`) REFERENCES `spa_oil_package` (`id`),
  CONSTRAINT `spa_oil_package_spa_oil_FK_2` FOREIGN KEY (`spa_oil_id`) REFERENCES `spa_oil` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spa_oil_package_spa_oil`
--

LOCK TABLES `spa_oil_package_spa_oil` WRITE;
/*!40000 ALTER TABLE `spa_oil_package_spa_oil` DISABLE KEYS */;
/*!40000 ALTER TABLE `spa_oil_package_spa_oil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spa_package`
--

DROP TABLE IF EXISTS `spa_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spa_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `length` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spa_package`
--

LOCK TABLES `spa_package` WRITE;
/*!40000 ALTER TABLE `spa_package` DISABLE KEYS */;
INSERT INTO `spa_package` VALUES (1,'Spa Package','<ul>\r\n<li>AromaSteam</li>\r\n<li>ChromaSteam</li>\r\n<li>Music Therapy Speakers</li>\r\n</ul>','',NULL,NULL,NULL,NULL,1,'2012-06-02 03:28:06'),(2,'Spa Stealth Package','<ul>\r\n<li>AromaSteam</li>\r\n<li>ChromaSteam</li>\r\n<li>Stealth Speakers</li>\r\n</ul>','',NULL,NULL,NULL,NULL,1,'2012-06-02 03:28:49');
/*!40000 ALTER TABLE `spa_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spa_package_spa_accessory`
--

DROP TABLE IF EXISTS `spa_package_spa_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spa_package_spa_accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spa_package_id` int(11) DEFAULT NULL,
  `spa_accessory_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spa_package_spa_accessory_FI_1` (`spa_package_id`),
  KEY `spa_package_spa_accessory_FI_2` (`spa_accessory_id`),
  CONSTRAINT `spa_package_spa_accessory_FK_1` FOREIGN KEY (`spa_package_id`) REFERENCES `spa_package` (`id`),
  CONSTRAINT `spa_package_spa_accessory_FK_2` FOREIGN KEY (`spa_accessory_id`) REFERENCES `spa_accessory` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spa_package_spa_accessory`
--

LOCK TABLES `spa_package_spa_accessory` WRITE;
/*!40000 ALTER TABLE `spa_package_spa_accessory` DISABLE KEYS */;
/*!40000 ALTER TABLE `spa_package_spa_accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `steam_bath_accessory`
--

DROP TABLE IF EXISTS `steam_bath_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `steam_bath_accessory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `width` float DEFAULT NULL,
  `depth` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `diameter` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `steam_bath_accessory`
--

LOCK TABLES `steam_bath_accessory` WRITE;
/*!40000 ALTER TABLE `steam_bath_accessory` DISABLE KEYS */;
INSERT INTO `steam_bath_accessory` VALUES (1,'Drip Pan','Suitable for all Mr.Steam residential generators','3/4\" drain copper fitting.',9,25,1.5,NULL,110,1,'2012-06-01 22:38:10'),(2,'AutoFlush','Introduces fresh water before use and drains generator tank following use.','Makes it convenient to use',NULL,NULL,NULL,NULL,375,1,'2012-06-01 22:39:00'),(3,'Steam Genie','Start up your steamroom from anywhere in the home.','Uses a wireless transmitter.',NULL,NULL,NULL,NULL,350,1,'2012-06-01 22:45:00'),(4,'MS Light','','',NULL,NULL,4,8.5,575,1,'2012-06-02 15:46:29'),(5,'Wall Seat','Wall seat is installed so you can sit down in comfort and enjoy your aromatherapy experience.','Made from durable teak',19.75,13.25,1.25,NULL,475,1,'2012-06-02 15:47:00'),(6,'Valet Pack','Valet Package includes Robe Hook, Essential Oil and Digital Timer with Cover Plate.','The Valet Package for Series 200 towel warmers allows you to:\r\n<ul>\r\n<li>Preprogram and preheat your towel warmer.</li>\r\n<li>Have an uplifting aromatherapy experience</li>\r\n<li>Enjoy your warmed robe</li>\r\n</ul>',NULL,NULL,NULL,NULL,180,0,'2012-06-03 13:20:01'),(7,'Timer','Digital Timer & Designer Finish Plate.\r\n<p>\r\nFor a warmed towel, ready when you are.','',NULL,NULL,NULL,NULL,100,0,'2012-06-03 15:02:00'),(8,'Robe Hook','Ideal for hanging and gently warming a robe.','',NULL,NULL,NULL,NULL,35,0,'2012-06-03 15:04:04'),(9,'Single Towel Rack','For storing or draping facial or small towel.\r\n','Not heated. Extends 3\" from towel warmer front.',NULL,NULL,NULL,NULL,75,0,'2012-06-03 15:05:03'),(10,'Triple Towel Rack','Perfect for storing large, folded bath towel.','Not heated. Extends 8.5\" from towel warmer front.',NULL,NULL,NULL,NULL,130,0,'2012-06-03 15:05:54');
/*!40000 ALTER TABLE `steam_bath_accessory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `steam_bath_accessory_finish`
--

DROP TABLE IF EXISTS `steam_bath_accessory_finish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `steam_bath_accessory_finish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `steam_bath_accessory_id` int(11) DEFAULT NULL,
  `finish_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `steam_bath_accessory_finish_FI_1` (`steam_bath_accessory_id`),
  KEY `steam_bath_accessory_finish_FI_2` (`finish_id`),
  CONSTRAINT `steam_bath_accessory_finish_FK_1` FOREIGN KEY (`steam_bath_accessory_id`) REFERENCES `steam_bath_accessory` (`id`),
  CONSTRAINT `steam_bath_accessory_finish_FK_2` FOREIGN KEY (`finish_id`) REFERENCES `finish` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `steam_bath_accessory_finish`
--

LOCK TABLES `steam_bath_accessory_finish` WRITE;
/*!40000 ALTER TABLE `steam_bath_accessory_finish` DISABLE KEYS */;
/*!40000 ALTER TABLE `steam_bath_accessory_finish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `towel_warmer`
--

DROP TABLE IF EXISTS `towel_warmer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `towel_warmer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `towel_warmer_category_id` int(11) DEFAULT NULL,
  `model` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `height` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `depth` float DEFAULT NULL,
  `wattage` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `towel_warmer_FI_1` (`towel_warmer_category_id`),
  CONSTRAINT `towel_warmer_FK_1` FOREIGN KEY (`towel_warmer_category_id`) REFERENCES `towel_warmer_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `towel_warmer`
--

LOCK TABLES `towel_warmer` WRITE;
/*!40000 ALTER TABLE `towel_warmer` DISABLE KEYS */;
INSERT INTO `towel_warmer` VALUES (1,1,'W216','','',20,16,4.375,100,15,'images/products/w216.png',510,1,'2012-05-29 04:55:32'),(2,1,'W219','','',20,20,4.25,200,17,'images/products/w219.png',610,1,'2012-05-29 04:56:50'),(3,1,'W228','','',28,20,4.25,400,20,'images/products/w228.png',810,1,'2012-05-29 04:57:29'),(4,1,'W236','','',36,20,4.25,400,24,'images/products/w236.png',910,1,'2012-05-29 04:58:23'),(5,1,'W248','','',48,20,4.25,400,30,'images/products/w248.png',1010,1,'2012-05-29 04:59:12'),(6,2,'F328','','',34.5,20,11.75,98,10,'images/products/f328.png',890,1,'2012-05-29 05:00:35'),(7,2,'W328','','',31.5,20,4.75,98,10,'images/products/w328.png',890,1,'2012-05-29 05:01:00'),(8,2,'W336','','',39,20,4.75,133,14,'images/products/w336.png',990,1,'2012-05-29 05:02:54'),(9,2,'W348','','',49.25,20,4.75,168,18,'images/products/w348.png',1090,1,'2012-05-29 05:03:33'),(10,3,'W500','','',25,22.5,5,100,20,'images/products/w500.png',1000,1,'2012-05-29 05:04:43'),(11,3,'W542','','',26,23.75,5.25,150,25,'images/products/w542.png',1475,1,'2012-05-29 05:05:43'),(12,3,'H542','','Hydronic. 500 BTU/Hr.',28,21,5,NULL,25,'images/products/h542.png',950,1,'2012-05-29 05:06:56'),(13,3,'W634','','',27.5,19.5,7.25,200,25,'images/products/w634.png',2350,1,'2012-05-29 05:07:40');
/*!40000 ALTER TABLE `towel_warmer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `towel_warmer_category`
--

DROP TABLE IF EXISTS `towel_warmer_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `towel_warmer_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `series_name` varchar(145) DEFAULT NULL,
  `description` text,
  `tech_notes` text,
  `picture` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `towel_warmer_category`
--

LOCK TABLES `towel_warmer_category` WRITE;
/*!40000 ALTER TABLE `towel_warmer_category` DISABLE KEYS */;
INSERT INTO `towel_warmer_category` VALUES (1,'200','Towel Warmer Series 200+','','',1,'2012-05-29 04:50:58'),(2,'300','Towel Warmer Series 300+','','',1,'2012-05-29 04:51:15'),(3,'500','Towel Warmer 500+','','',1,'2012-05-29 04:51:45');
/*!40000 ALTER TABLE `towel_warmer_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `towel_warmer_finish`
--

DROP TABLE IF EXISTS `towel_warmer_finish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `towel_warmer_finish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `towel_warmer_id` int(11) DEFAULT NULL,
  `finish_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `towel_warmer_finish_FI_1` (`towel_warmer_id`),
  KEY `towel_warmer_finish_FI_2` (`finish_id`),
  CONSTRAINT `towel_warmer_finish_FK_1` FOREIGN KEY (`towel_warmer_id`) REFERENCES `towel_warmer` (`id`),
  CONSTRAINT `towel_warmer_finish_FK_2` FOREIGN KEY (`finish_id`) REFERENCES `finish` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `towel_warmer_finish`
--

LOCK TABLES `towel_warmer_finish` WRITE;
/*!40000 ALTER TABLE `towel_warmer_finish` DISABLE KEYS */;
INSERT INTO `towel_warmer_finish` VALUES (1,1,1,1,0),(2,1,11,1,80),(3,1,5,1,80),(4,2,1,1,0),(5,2,11,1,80),(6,2,5,1,80),(7,3,1,1,0),(8,3,11,1,80),(9,3,5,1,80),(10,4,1,1,0),(11,4,11,1,80),(12,4,5,1,80),(13,5,1,1,0),(14,5,11,1,80),(15,5,5,1,80),(16,6,13,1,0),(17,6,14,1,0),(18,7,13,1,0),(19,7,14,1,0),(20,8,13,1,0),(21,8,14,1,0),(22,9,13,1,0),(23,9,14,1,0),(24,10,1,1,0),(25,10,2,1,350),(26,10,3,1,350),(27,10,5,1,350),(28,11,1,1,0),(29,11,2,1,375),(30,11,3,1,375),(31,11,5,1,375),(32,12,1,1,0),(33,12,3,1,350),(34,13,1,1,0),(35,13,2,1,750),(36,13,3,1,750),(37,13,5,1,750);
/*!40000 ALTER TABLE `towel_warmer_finish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(145) DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Adam Chng','coder@shumai.com','9178889999','YTo1Njp7czo5OiJzZXNzaW9uaWQiO3M6MjY6Im40Y3JwdGI1ZWFnYWs3N2NjMzM5MnZrZzMwIjtzOjEyOiJjdXJyZW50X3BhZ2UiO3M6NjoicmV2aWV3IjtzOjY6InNpemluZyI7czo2OiJub3NpemUiO3M6OToibmV4dF9wYWdlIjtzOjY6InJldmlldyI7czo4OiJzdWJtaXRfeCI7czoyOiIyOCI7czo4OiJzdWJtaXRfeSI7czozOiIzOTMiO3M6MjoiaWQiO2k6NjtzOjE3OiJjb250cm9sX2J1dGxlcl9zcSI7czo3OiJjaGVja2VkIjtzOjEzOiJwcmljZV9jb250cm9sIjtzOjQ6IjE0NTAiO3M6NToicHJpY2UiO2k6NTc5NTtzOjEwOiJzcGFwYWNrYWdlIjtzOjk6ImJ1dGxlcl9zcSI7czoxODoic3BhdGhlcmFweV9ub3RoaW5nIjtzOjA6IiI7czoxODoic3BhdGhlcmFweV9zYXZpbmdzIjtzOjI2OiJTcGEgUGFja2FnZSAoc2F2ZSAkMTAwLjAwKSI7czoyMToic3BhdGhlcmFweV9hcm9tYXN0ZWFtIjtzOjA6IiI7czoyMjoic3BhdGhlcmFweV9jaHJvbWFzdGVhbSI7czowOiIiO3M6MzE6InNwYXRoZXJhcHlfbXVzaWN0aGVyYXB5c3BlYWtlcnMiO3M6MDoiIjtzOjI2OiJzcGF0aGVyYXB5X3N0ZWFsdGhzcGVha2VycyI7czowOiIiO3M6MjE6InNwYXRoZXJhcHlfc3BhcGFja2FnZSI7czo3OiJjaGVja2VkIjtzOjI4OiJzcGF0aGVyYXB5X3NwYXN0ZWFsdGhwYWNrYWdlIjtzOjA6IiI7czoyMDoic3BhdGhlcmFweV9hY2Nlc3NvcnkiO2E6MTp7aTo1O3M6MTE6IlNwYSBQYWNrYWdlIjt9czoyNjoic3BhdGhlcmFweV9hY2Nlc3NvcnlfcHJpY2UiO2E6MTp7aTo1O3M6NDoiMTcwMCI7fXM6MTc6InNwYXRoZXJhcHlfc3Bhb2lsIjthOjY6e2k6MTtzOjA6IiI7aToyO3M6MDoiIjtpOjM7czowOiIiO2k6NDtzOjA6IiI7aTo1O3M6MDoiIjtpOjY7czo2OiI1LVBhY2siO31zOjIzOiJzcGF0aGVyYXB5X3NwYW9pbF9wcmljZSI7YTo2OntpOjE7aTowO2k6MjtpOjA7aTozO2k6MDtpOjQ7aTowO2k6NTtpOjA7aTo2O3M6MzoiNTAwIjt9czoxNzoiYWNjZXNzb3J5X25vdGhpbmciO3M6MDoiIjtzOjE1OiJhY2Nlc3NvcnlfcHJpY2UiO2E6Mjp7aTo0O3M6MzoiNTc1IjtpOjU7czozOiI0NzUiO31zOjk6ImFjY2Vzc29yeSI7YToyOntpOjQ7czo4OiJNUyBMaWdodCI7aTo1O3M6OToiV2FsbCBTZWF0Ijt9czoxNjoiYWNjZXNzb3J5X2ZpbmlzaCI7YToyOntpOjQ7czoxNDoiQnJ1c2hlZCBDaHJvbWUiO2k6NTtzOjE1OiJQb2xpc2hlZCBDaHJvbWUiO31zOjIxOiJhY2Nlc3NvcnlfZmluaXNoX2NvZGUiO2E6Mjp7aTo0O3M6MjoiYmMiO2k6NTtzOjI6InBjIjt9czoxMzoiYWNjZXNzb3J5X29pbCI7YToxNDp7aToxO3M6MDoiIjtpOjI7czowOiIiO2k6MztzOjA6IiI7aTo0O3M6MDoiIjtpOjU7czowOiIiO2k6NztzOjA6IiI7aTo4O3M6MDoiIjtpOjk7czowOiIiO2k6MTA7czowOiIiO2k6MTE7czowOiIiO2k6MTI7czowOiIiO2k6MTM7czowOiIiO2k6NjtzOjY6IjUtUGFjayI7aToxNDtzOjY6IjctUGFjayI7fXM6MTk6ImFjY2Vzc29yeV9vaWxfcHJpY2UiO2E6MTQ6e2k6MTtpOjA7aToyO2k6MDtpOjM7aTowO2k6NDtpOjA7aTo1O2k6MDtpOjc7aTowO2k6ODtpOjA7aTo5O2k6MDtpOjEwO2k6MDtpOjExO2k6MDtpOjEyO2k6MDtpOjEzO2k6MDtpOjY7czozOiI1MDAiO2k6MTQ7czozOiIxNTAiO31zOjE2OiJ0b3dlbF93YXJtZXJfMjAwIjtzOjc6ImNoZWNrZWQiO3M6MTY6InRvd2VsX3dhcm1lcl8zMDAiO3M6MDoiIjtzOjE2OiJ0b3dlbF93YXJtZXJfNTAwIjtzOjA6IiI7czoxMToidG93ZWx3YXJtZXIiO2E6MTp7aTo1O3M6NDoiVzI0OCI7fXM6MTc6InRvd2Vsd2FybWVyX3ByaWNlIjthOjE6e2k6NTtpOjEwMTA7fXM6MTY6InRvd2Vsd2FybWVyX2l0ZW0iO3M6MToiNSI7czoyNDoidG93ZWx3YXJtZXJfcHJpY2VfZmluaXNoIjtpOjA7czoyMzoidG93ZWx3YXJtZXJfZmluaXNoX25hbWUiO3M6MTU6IlBvbGlzaGVkIENocm9tZSI7czoyMzoidG93ZWx3YXJtZXJfZmluaXNoX2NvZGUiO3M6MjoicGMiO3M6MTk6InRvd2Vsd2FybWVyY2F0ZWdvcnkiO3M6MzoiMjAwIjtzOjI4OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV9ub3RoaW5nIjtzOjc6ImNoZWNrZWQiO3M6MjY6InRvd2Vsd2FybWVyYWNjZXNzb3J5X3ZhbGV0IjtzOjc6ImNoZWNrZWQiO3M6MjE6InRvd2Vsd2FybWVyX2FjY2Vzc29yeSI7YTo0OntpOjY7czoxMDoiVmFsZXQgUGFjayI7aTo3O3M6MTM6IkRpZ2l0YWwgVGltZXIiO2k6ODtzOjk6IlJvYmUgSG9vayI7aToxMDtzOjE3OiJUcmlwbGUgVG93ZWwgUmFjayI7fXM6Mjc6InByaWNlX3Rvd2Vsd2FybWVyX2FjY2Vzc29yeSI7YTo0OntpOjY7czozOiIxODAiO2k6NztzOjM6IjEwMCI7aTo4O3M6MjoiMzUiO2k6MTA7czozOiIxMzAiO31zOjI2OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV90aW1lciI7czo3OiJjaGVja2VkIjtzOjI5OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV9yb2JlaG9vayI7czo3OiJjaGVja2VkIjtzOjMwOiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV90b3dlbHJhY2siO3M6MDoiIjtzOjM2OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV90cmlwbGV0b3dlbHJhY2siO3M6NzoiY2hlY2tlZCI7czo5OiJmcm9tX25hbWUiO3M6OToiQWRhbSBDaG5nIjtzOjEwOiJmcm9tX2VtYWlsIjtzOjE2OiJjb2RlckBzaHVtYWkuY29tIjtzOjEyOiJmcm9tX2FkZHJlc3MiO3M6Mjk6IjE3NS0yOSBXZXhmb3JkIFJvYWQsIEFwdCAjMTFHIjtzOjk6ImZyb21fY2l0eSI7czo5OiJSZWdvIFBhcmsiO3M6MTA6ImZyb21fc3RhdGUiO3M6MjoiTlkiO3M6ODoiZnJvbV96aXAiO3M6NToiMTkyODEiO3M6MTA6ImZyb21fcGhvbmUiO3M6MTA6IjkxNzg4ODk5OTkiO3M6OToiU2VuZEVtYWlsIjthOjE6e2k6MDtzOjE5OiJhZGFtX2NobmdAeWFob28uY29tIjt9fQ==',NULL),(2,'Adam Chng','codeX@shumai.com',NULL,'YTo1Njp7czo5OiJzZXNzaW9uaWQiO3M6MjY6Im40Y3JwdGI1ZWFnYWs3N2NjMzM5MnZrZzMwIjtzOjEyOiJjdXJyZW50X3BhZ2UiO3M6NjoicmV2aWV3IjtzOjY6InNpemluZyI7czo2OiJub3NpemUiO3M6OToibmV4dF9wYWdlIjtzOjY6InJldmlldyI7czo4OiJzdWJtaXRfeCI7czoyOiIyOCI7czo4OiJzdWJtaXRfeSI7czozOiIzOTMiO3M6MjoiaWQiO2k6NjtzOjE3OiJjb250cm9sX2J1dGxlcl9zcSI7czo3OiJjaGVja2VkIjtzOjEzOiJwcmljZV9jb250cm9sIjtzOjQ6IjE0NTAiO3M6NToicHJpY2UiO2k6NTc5NTtzOjEwOiJzcGFwYWNrYWdlIjtzOjk6ImJ1dGxlcl9zcSI7czoxODoic3BhdGhlcmFweV9ub3RoaW5nIjtzOjA6IiI7czoxODoic3BhdGhlcmFweV9zYXZpbmdzIjtzOjI2OiJTcGEgUGFja2FnZSAoc2F2ZSAkMTAwLjAwKSI7czoyMToic3BhdGhlcmFweV9hcm9tYXN0ZWFtIjtzOjA6IiI7czoyMjoic3BhdGhlcmFweV9jaHJvbWFzdGVhbSI7czowOiIiO3M6MzE6InNwYXRoZXJhcHlfbXVzaWN0aGVyYXB5c3BlYWtlcnMiO3M6MDoiIjtzOjI2OiJzcGF0aGVyYXB5X3N0ZWFsdGhzcGVha2VycyI7czowOiIiO3M6MjE6InNwYXRoZXJhcHlfc3BhcGFja2FnZSI7czo3OiJjaGVja2VkIjtzOjI4OiJzcGF0aGVyYXB5X3NwYXN0ZWFsdGhwYWNrYWdlIjtzOjA6IiI7czoyMDoic3BhdGhlcmFweV9hY2Nlc3NvcnkiO2E6MTp7aTo1O3M6MTE6IlNwYSBQYWNrYWdlIjt9czoyNjoic3BhdGhlcmFweV9hY2Nlc3NvcnlfcHJpY2UiO2E6MTp7aTo1O3M6NDoiMTcwMCI7fXM6MTc6InNwYXRoZXJhcHlfc3Bhb2lsIjthOjY6e2k6MTtzOjA6IiI7aToyO3M6MDoiIjtpOjM7czowOiIiO2k6NDtzOjA6IiI7aTo1O3M6MDoiIjtpOjY7czo2OiI1LVBhY2siO31zOjIzOiJzcGF0aGVyYXB5X3NwYW9pbF9wcmljZSI7YTo2OntpOjE7aTowO2k6MjtpOjA7aTozO2k6MDtpOjQ7aTowO2k6NTtpOjA7aTo2O3M6MzoiNTAwIjt9czoxNzoiYWNjZXNzb3J5X25vdGhpbmciO3M6MDoiIjtzOjE1OiJhY2Nlc3NvcnlfcHJpY2UiO2E6Mjp7aTo0O3M6MzoiNTc1IjtpOjU7czozOiI0NzUiO31zOjk6ImFjY2Vzc29yeSI7YToyOntpOjQ7czo4OiJNUyBMaWdodCI7aTo1O3M6OToiV2FsbCBTZWF0Ijt9czoxNjoiYWNjZXNzb3J5X2ZpbmlzaCI7YToyOntpOjQ7czoxNDoiQnJ1c2hlZCBDaHJvbWUiO2k6NTtzOjE1OiJQb2xpc2hlZCBDaHJvbWUiO31zOjIxOiJhY2Nlc3NvcnlfZmluaXNoX2NvZGUiO2E6Mjp7aTo0O3M6MjoiYmMiO2k6NTtzOjI6InBjIjt9czoxMzoiYWNjZXNzb3J5X29pbCI7YToxNDp7aToxO3M6MDoiIjtpOjI7czowOiIiO2k6MztzOjA6IiI7aTo0O3M6MDoiIjtpOjU7czowOiIiO2k6NztzOjA6IiI7aTo4O3M6MDoiIjtpOjk7czowOiIiO2k6MTA7czowOiIiO2k6MTE7czowOiIiO2k6MTI7czowOiIiO2k6MTM7czowOiIiO2k6NjtzOjY6IjUtUGFjayI7aToxNDtzOjY6IjctUGFjayI7fXM6MTk6ImFjY2Vzc29yeV9vaWxfcHJpY2UiO2E6MTQ6e2k6MTtpOjA7aToyO2k6MDtpOjM7aTowO2k6NDtpOjA7aTo1O2k6MDtpOjc7aTowO2k6ODtpOjA7aTo5O2k6MDtpOjEwO2k6MDtpOjExO2k6MDtpOjEyO2k6MDtpOjEzO2k6MDtpOjY7czozOiI1MDAiO2k6MTQ7czozOiIxNTAiO31zOjE2OiJ0b3dlbF93YXJtZXJfMjAwIjtzOjc6ImNoZWNrZWQiO3M6MTY6InRvd2VsX3dhcm1lcl8zMDAiO3M6MDoiIjtzOjE2OiJ0b3dlbF93YXJtZXJfNTAwIjtzOjA6IiI7czoxMToidG93ZWx3YXJtZXIiO2E6MTp7aTo1O3M6NDoiVzI0OCI7fXM6MTc6InRvd2Vsd2FybWVyX3ByaWNlIjthOjE6e2k6NTtpOjEwMTA7fXM6MTY6InRvd2Vsd2FybWVyX2l0ZW0iO3M6MToiNSI7czoyNDoidG93ZWx3YXJtZXJfcHJpY2VfZmluaXNoIjtpOjA7czoyMzoidG93ZWx3YXJtZXJfZmluaXNoX25hbWUiO3M6MTU6IlBvbGlzaGVkIENocm9tZSI7czoyMzoidG93ZWx3YXJtZXJfZmluaXNoX2NvZGUiO3M6MjoicGMiO3M6MTk6InRvd2Vsd2FybWVyY2F0ZWdvcnkiO3M6MzoiMjAwIjtzOjI4OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV9ub3RoaW5nIjtzOjc6ImNoZWNrZWQiO3M6MjY6InRvd2Vsd2FybWVyYWNjZXNzb3J5X3ZhbGV0IjtzOjc6ImNoZWNrZWQiO3M6MjE6InRvd2Vsd2FybWVyX2FjY2Vzc29yeSI7YTo0OntpOjY7czoxMDoiVmFsZXQgUGFjayI7aTo3O3M6MTM6IkRpZ2l0YWwgVGltZXIiO2k6ODtzOjk6IlJvYmUgSG9vayI7aToxMDtzOjE3OiJUcmlwbGUgVG93ZWwgUmFjayI7fXM6Mjc6InByaWNlX3Rvd2Vsd2FybWVyX2FjY2Vzc29yeSI7YTo0OntpOjY7czozOiIxODAiO2k6NztzOjM6IjEwMCI7aTo4O3M6MjoiMzUiO2k6MTA7czozOiIxMzAiO31zOjI2OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV90aW1lciI7czo3OiJjaGVja2VkIjtzOjI5OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV9yb2JlaG9vayI7czo3OiJjaGVja2VkIjtzOjMwOiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV90b3dlbHJhY2siO3M6MDoiIjtzOjM2OiJ0b3dlbHdhcm1lcmFjY2Vzc29yeV90cmlwbGV0b3dlbHJhY2siO3M6NzoiY2hlY2tlZCI7czo5OiJmcm9tX25hbWUiO3M6OToiQWRhbSBDaG5nIjtzOjEwOiJmcm9tX2VtYWlsIjtzOjE2OiJjb2RlWEBzaHVtYWkuY29tIjtzOjEyOiJmcm9tX2FkZHJlc3MiO3M6Mjk6IjE3NS0yOSBXZXhmb3JkIFJvYWQsIEFwdCAjMTFHIjtzOjk6ImZyb21fY2l0eSI7czo5OiJSZWdvIFBhcmsiO3M6MTA6ImZyb21fc3RhdGUiO3M6MjoiTlkiO3M6ODoiZnJvbV96aXAiO3M6NToiMTkyODEiO3M6MTA6ImZyb21fcGhvbmUiO3M6MTA6IjkxNzg4ODk5OTkiO3M6OToiU2VuZEVtYWlsIjthOjE6e2k6MDtzOjE5OiJhZGFtX2NobmdAeWFob28uY29tIjt9fQ==',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-18  4:29:15
