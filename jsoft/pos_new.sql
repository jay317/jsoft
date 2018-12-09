/*
SQLyog Community Edition- MySQL GUI v5.20
Host - 5.5.5-10.1.21-MariaDB : Database - billing_software
*********************************************************************
Server version : 5.5.5-10.1.21-MariaDB
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `billing_software`;

USE `billing_software`;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

/*Table structure for table `icw_barcodemap_0317` */

DROP TABLE IF EXISTS `icw_barcodemap_0317`;

CREATE TABLE `icw_barcodemap_0317` (
  `icw_barcodeMapId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_productId0317` int(11) NOT NULL,
  `icw_productbarcode0317` varchar(50) NOT NULL,
  `icw_userId0317` int(11) NOT NULL,
  `icw_date0317` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`icw_barcodeMapId0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_barcodemap_0317` */

/*Table structure for table `icw_cat_0317` */

DROP TABLE IF EXISTS `icw_cat_0317`;

CREATE TABLE `icw_cat_0317` (
  `icw_ci0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_cn0318` varchar(100) NOT NULL,
  `icw_cd0319` text NOT NULL,
  `icw_isa0320` tinyint(2) NOT NULL,
  `icw_fk_shop_id0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_ci0317`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_cat_0317` */

insert  into `icw_cat_0317`(`icw_ci0317`,`icw_cn0318`,`icw_cd0319`,`icw_isa0320`,`icw_fk_shop_id0317`) values (1,'mobile','',1,0),(2,'laptop','',1,0),(3,'charger','',1,0);

/*Table structure for table `icw_clients_0317` */

DROP TABLE IF EXISTS `icw_clients_0317`;

CREATE TABLE `icw_clients_0317` (
  `icw_clientId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_clientName0317` varchar(50) DEFAULT NULL,
  `icw_clientMobile0317` varchar(50) DEFAULT NULL,
  `icw_clientEmail0317` varchar(50) DEFAULT NULL,
  `icw_clientBtitle0317` varchar(100) DEFAULT NULL,
  `icw_clientGrn0317` varchar(100) DEFAULT NULL,
  `icw_clientAddr10317` varchar(100) DEFAULT NULL,
  `icw_clientAddr20317` varchar(100) DEFAULT NULL,
  `icw_clientCity0317` varchar(50) DEFAULT NULL,
  `icw_clientState0317` varchar(50) DEFAULT NULL,
  `icw_clientZipCode0317` int(11) DEFAULT NULL,
  `icw_clientCountry0317` varchar(50) DEFAULT NULL,
  `icw_clientImg0317` varchar(50) DEFAULT NULL,
  `icw_clientDate0317` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `icw_isa0317` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`icw_clientId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_clients_0317` */

insert  into `icw_clients_0317`(`icw_clientId0317`,`icw_clientName0317`,`icw_clientMobile0317`,`icw_clientEmail0317`,`icw_clientBtitle0317`,`icw_clientGrn0317`,`icw_clientAddr10317`,`icw_clientAddr20317`,`icw_clientCity0317`,`icw_clientState0317`,`icw_clientZipCode0317`,`icw_clientCountry0317`,`icw_clientImg0317`,`icw_clientDate0317`,`icw_isa0317`) values (1,'rajiv khanna','9867898877','','rahishop','112237687767','paharganj sector-4','delhi west','delhi','delhi',7898,'',NULL,'2017-12-08 15:30:09',1);

/*Table structure for table `icw_countries` */

DROP TABLE IF EXISTS `icw_countries`;

CREATE TABLE `icw_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `icw_countries` */

insert  into `icw_countries`(`id`,`country_code`,`country_name`) values (1,'IN','India');

/*Table structure for table `icw_img_0317` */

DROP TABLE IF EXISTS `icw_img_0317`;

CREATE TABLE `icw_img_0317` (
  `icw_imgid0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_pid0317` int(11) NOT NULL,
  `icw_imgname0317` varchar(200) NOT NULL,
  PRIMARY KEY (`icw_imgid0317`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_img_0317` */

insert  into `icw_img_0317`(`icw_imgid0317`,`icw_pid0317`,`icw_imgname0317`) values (1,1,''),(2,2,''),(3,3,''),(4,4,''),(5,5,''),(6,6,''),(7,7,''),(10,8,'');

/*Table structure for table `icw_invoice_0317` */

DROP TABLE IF EXISTS `icw_invoice_0317`;

CREATE TABLE `icw_invoice_0317` (
  `icw_invoId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_clientId0317` int(11) NOT NULL,
  `icw_shopId0317` int(11) NOT NULL,
  `icw_userId0317` int(11) NOT NULL,
  `icw_invoiceNo_0317` int(11) NOT NULL,
  `icw_noOfItems0317` int(11) NOT NULL,
  `icw_totalAmt0317` float NOT NULL,
  `icw_totalTax0317` float NOT NULL,
  `icw_amtWithTax0317` float NOT NULL,
  `icw_paidAmount0317` float NOT NULL,
  `icw_balanceAmt0317` float NOT NULL,
  `icw_paymentMode0317` varchar(20) NOT NULL,
  `icw_transactionId0317` varchar(50) NOT NULL,
  `icw_chequeBnk0317` varchar(100) NOT NULL,
  `icw_chequeNo0317` varchar(50) NOT NULL,
  `icw_taxType0317` varchar(20) NOT NULL,
  `icw_invoDate0317` date NOT NULL,
  `icw_customerMob0317` varchar(50) NOT NULL,
  `icw_invoStatus0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_invoId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_invoice_0317` */

insert  into `icw_invoice_0317`(`icw_invoId0317`,`icw_clientId0317`,`icw_shopId0317`,`icw_userId0317`,`icw_invoiceNo_0317`,`icw_noOfItems0317`,`icw_totalAmt0317`,`icw_totalTax0317`,`icw_amtWithTax0317`,`icw_paidAmount0317`,`icw_balanceAmt0317`,`icw_paymentMode0317`,`icw_transactionId0317`,`icw_chequeBnk0317`,`icw_chequeNo0317`,`icw_taxType0317`,`icw_invoDate0317`,`icw_customerMob0317`,`icw_invoStatus0317`) values (16,0,17,1,1,2,26200,3668,29868,5670,24198,'cash','','','','1','2017-12-07','',1),(17,0,17,1,2,6,29900,3742.5,33642.5,2300,31342.5,'cash','','','','1','2017-12-07','',1),(18,0,17,1,3,3,5350,387.5,5737.5,4000,1737.5,'cash','','','','1','2017-12-08','',1),(19,0,17,1,4,2,3200,160,3360,2344,1016,'cash','','','','1','2017-12-08','',1),(20,0,17,1,5,3,6700,455,7155,4567,2588,'cash','','','','1','2017-12-08','',1),(21,0,17,1,6,4,30550,3775,34325,5000,29325,'cash','','','','1','2017-12-08','',1),(22,0,17,1,7,2,3500,175,3675,1235,2440,'cash','','','','1','2017-12-08','',1),(23,0,17,1,8,4,30250,3880,34130,2600,31530,'cash','','','','1','2017-12-08','',1),(24,0,17,1,9,3,3350,469,3819,0,0,'no','','','','1','2017-12-08','',1),(25,1,17,1,10,2,1550,217,1767,400,1367,'cash','','','','1','2017-12-08','',1),(26,0,17,1,11,1,1500,210,1710,1710,0,'cheque','','sbi','123422311123','1','2017-12-08','',1),(27,0,17,1,12,2,3500,140,3640,200,3440,'cash','','','','1','2017-12-09','',1),(28,0,17,1,13,2,3500,140,3640,2344,1296,'cash','','','','1','2017-12-11','',1),(29,0,17,1,14,2,1250,175,1425,1234,191,'cash','','','','1','2017-12-11','',1),(30,0,17,1,15,2,3500,490,3990,12,3978,'cash','','','','1','2017-12-11','',1),(31,0,17,1,16,2,1350,189,1539,244,1295,'cheque','','abc','12322211111','1','2017-12-11','',1),(32,0,17,1,17,4,37000,4160,41160,23322,17838,'cash','','','','1','2017-12-11','',1),(33,0,17,1,18,1,3000,120,3120,2300,820,'cash','','','','1','2017-12-11','',1),(34,0,17,1,19,4,6850,342.5,7192.5,2300,4892.5,'cash','','','','1','2017-12-11','',1),(35,0,17,1,20,5,35500,4115,39615,12432,27183,'cheque','','tds','12111211','2','2017-12-11','',1),(36,0,17,1,21,1,1500,120,1620,1620,0,'cash','','','','2','2017-12-11','',1),(37,0,17,1,22,2,1250,100,1350,1232,118,'cash','','','','2','2017-12-11','',1),(38,0,17,1,23,2,5000,400,5400,3000,2400,'cash','','','','2','2017-12-11','',1),(39,0,17,1,24,2,3500,280,3780,2544,1236,'cheque','','icici','121111677','2','2017-12-11','',1),(40,0,17,1,25,2,3500,280,3780,1000,2780,'cash','','','','2','2017-12-11','',1),(41,0,17,1,26,2,3500,280,3780,123,3657,'cheque','','icici','678999','2','2017-12-11','',1),(42,0,17,1,27,1,3000,240,3240,0,0,'no','','','','2','2017-12-11','',1),(43,0,17,1,28,2,5500,770,6270,3452,2818,'cheque','','kotak','111234422','1','2017-12-12','',1);

/*Table structure for table `icw_invoice_prodetails_0317` */

DROP TABLE IF EXISTS `icw_invoice_prodetails_0317`;

CREATE TABLE `icw_invoice_prodetails_0317` (
  `icw_invoice_proId_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_client_Id0317` int(11) NOT NULL,
  `icw_invoiceNo_0317` int(11) NOT NULL,
  `icw_invoice_productId_0317` int(11) NOT NULL,
  `icw_invoice_proname0317` varchar(100) NOT NULL,
  `icw_invoice_qty0317` int(11) NOT NULL,
  `icw_invoice_sellingPrice0317` int(11) NOT NULL,
  `icw_invoice_itemTotal0317` int(11) NOT NULL,
  `icw_invoice_proDate0317` date NOT NULL,
  `icw_invoice_proHsn0317` varchar(50) NOT NULL,
  PRIMARY KEY (`icw_invoice_proId_0317`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_invoice_prodetails_0317` */

insert  into `icw_invoice_prodetails_0317`(`icw_invoice_proId_0317`,`icw_client_Id0317`,`icw_invoiceNo_0317`,`icw_invoice_productId_0317`,`icw_invoice_proname0317`,`icw_invoice_qty0317`,`icw_invoice_sellingPrice0317`,`icw_invoice_itemTotal0317`,`icw_invoice_proDate0317`,`icw_invoice_proHsn0317`) values (33,0,1,5,'iphone X',1,25000,25000,'2017-12-07',''),(34,0,1,4,'lenevo charger',1,1200,1200,'2017-12-07',''),(35,0,2,1,'win7',1,1500,1500,'2017-12-07',''),(36,0,2,2,'ubuntu',1,2000,2000,'2017-12-07',''),(37,0,2,4,'lenevo charger',1,1200,1200,'2017-12-07',''),(38,0,2,3,'micromax a9 charger',1,150,150,'2017-12-07',''),(39,0,2,6,'micro',1,50,50,'2017-12-07',''),(40,0,2,5,'iphone X',1,25000,25000,'2017-12-07',''),(41,0,3,4,'lenevo charger',1,1200,1200,'2017-12-08',''),(42,0,3,3,'micromax a9 charger',1,150,150,'2017-12-08',''),(43,0,3,7,'lava',1,4000,4000,'2017-12-08',''),(44,0,4,2,'ubuntu',1,2000,2000,'2017-12-08',''),(45,0,4,4,'lenevo charger',1,1200,1200,'2017-12-08',''),(46,0,5,4,'lenevo charger',1,1200,1200,'2017-12-08',''),(47,0,5,1,'win7',1,1500,1500,'2017-12-08',''),(48,0,5,7,'lava',1,4000,4000,'2017-12-08',''),(49,0,6,2,'ubuntu',2,2000,4000,'2017-12-08',''),(50,0,6,1,'win7',1,1500,1500,'2017-12-08',''),(51,0,6,6,'micro',1,50,50,'2017-12-08',''),(52,0,6,5,'iphone X',1,25000,25000,'2017-12-08',''),(53,0,7,2,'ubuntu',1,2000,2000,'2017-12-08',''),(54,0,7,1,'win7',1,1500,1500,'2017-12-08',''),(55,0,8,5,'iphone X',1,25000,25000,'2017-12-08',''),(56,0,8,4,'lenevo charger',1,1200,1200,'2017-12-08',''),(57,0,8,6,'micro',1,50,50,'2017-12-08',''),(58,0,8,7,'lava',1,4000,4000,'2017-12-08',''),(59,0,9,2,'ubuntu',1,2000,2000,'2017-12-08',''),(60,0,9,4,'lenevo charger',1,1200,1200,'2017-12-08',''),(61,0,9,3,'micromax a9 charger',1,150,150,'2017-12-08',''),(62,1,10,1,'win7',1,1500,1500,'2017-12-08',''),(63,1,10,6,'micro',1,50,50,'2017-12-08',''),(64,0,11,1,'win7',1,1500,1500,'2017-12-08',''),(65,0,12,1,'win7',1,1500,1500,'2017-12-09',''),(66,0,12,2,'ubuntu',1,2000,2000,'2017-12-09',''),(67,0,13,1,'win7',1,1500,1500,'2017-12-11',''),(68,0,13,2,'ubuntu',1,2000,2000,'2017-12-11',''),(69,0,14,4,'lenevo charger',1,1200,1200,'2017-12-11',''),(70,0,14,6,'micro',1,50,50,'2017-12-11',''),(71,0,15,1,'win7',1,1500,1500,'2017-12-11',''),(72,0,15,2,'ubuntu',1,2000,2000,'2017-12-11',''),(73,0,16,4,'lenevo charger',1,1200,1200,'2017-12-11',''),(74,0,16,3,'micromax a9 charger',1,150,150,'2017-12-11',''),(75,0,17,2,'ubuntu',1,2000,2000,'2017-12-11',''),(76,0,17,8,'mi m234',2,3000,6000,'2017-12-11',''),(77,0,17,5,'iphone X',1,25000,25000,'2017-12-11',''),(78,0,17,7,'lava',1,4000,4000,'2017-12-11',''),(79,0,18,8,'mi m234',1,3000,3000,'2017-12-11','1200001212'),(80,0,19,2,'ubuntu',2,2000,4000,'2017-12-11',''),(81,0,19,1,'win7',1,1500,1500,'2017-12-11',''),(82,0,19,3,'micromax a9 charger',1,150,150,'2017-12-11',''),(83,0,19,4,'lenevo charger',1,1200,1200,'2017-12-11',''),(84,0,20,2,'ubuntu',1,2000,2000,'2017-12-11',''),(85,0,20,1,'win7',1,1500,1500,'2017-12-11',''),(86,0,20,8,'mi m234',1,3000,3000,'2017-12-11','1200001212'),(87,0,20,5,'iphone X',1,25000,25000,'2017-12-11',''),(88,0,20,7,'lava',1,4000,4000,'2017-12-11',''),(89,0,21,1,'win7',1,1500,1500,'2017-12-11',''),(90,0,22,4,'lenevo charger',1,1200,1200,'2017-12-11',''),(91,0,22,6,'micro',1,50,50,'2017-12-11',''),(92,0,23,1,'win7',2,1500,3000,'2017-12-11',''),(93,0,23,2,'ubuntu',1,2000,2000,'2017-12-11',''),(94,0,24,1,'win7',1,1500,1500,'2017-12-11',''),(95,0,24,2,'ubuntu',1,2000,2000,'2017-12-11',''),(96,0,25,2,'ubuntu',1,2000,2000,'2017-12-11',''),(97,0,25,1,'win7',1,1500,1500,'2017-12-11',''),(98,0,26,1,'win7',1,1500,1500,'2017-12-11',''),(99,0,26,2,'ubuntu',1,2000,2000,'2017-12-11',''),(100,0,27,1,'win7',2,1500,3000,'2017-12-11',''),(101,0,28,1,'win7',1,1500,1500,'2017-12-12',''),(102,0,28,2,'ubuntu',2,2000,4000,'2017-12-12','');

/*Table structure for table `icw_invoice_taxdetails_0317` */

DROP TABLE IF EXISTS `icw_invoice_taxdetails_0317`;

CREATE TABLE `icw_invoice_taxdetails_0317` (
  `icw_invoTaxDtId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_client_Id0317` int(11) NOT NULL,
  `icw_invoiceNo_0317` int(11) NOT NULL,
  `icw_client_taxSum0317` float NOT NULL,
  `icw_client_taxDetail0317` varchar(200) NOT NULL,
  `icw_client_InvoDate0317` date NOT NULL,
  PRIMARY KEY (`icw_invoTaxDtId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_invoice_taxdetails_0317` */

insert  into `icw_invoice_taxdetails_0317`(`icw_invoTaxDtId0317`,`icw_client_Id0317`,`icw_invoiceNo_0317`,`icw_client_taxSum0317`,`icw_client_taxDetail0317`,`icw_client_InvoDate0317`) values (14,0,1,3668,'24','2017-12-07'),(15,0,2,242.5,'22','2017-12-07'),(16,0,2,3500,'24','2017-12-07'),(17,0,3,67.5,'22','2017-12-08'),(18,0,3,320,'25','2017-12-08'),(19,0,4,160,'22','2017-12-08'),(20,0,5,135,'22','2017-12-08'),(21,0,5,320,'25','2017-12-08'),(22,0,6,275,'22','2017-12-08'),(23,0,6,3500,'24','2017-12-08'),(24,0,7,175,'22','2017-12-08'),(25,0,8,3500,'24','2017-12-08'),(26,0,8,60,'22','2017-12-08'),(27,0,8,320,'25','2017-12-08'),(28,0,9,469,'24','2017-12-08'),(29,1,10,217,'24','2017-12-08'),(30,0,11,210,'24','2017-12-08'),(31,0,12,140,'23','2017-12-09'),(32,0,13,140,'23','2017-12-11'),(33,0,14,175,'24','2017-12-11'),(34,0,15,490,'24','2017-12-11'),(35,0,16,189,'24','2017-12-11'),(36,0,17,100,'22','2017-12-11'),(37,0,17,240,'23','2017-12-11'),(38,0,17,3500,'24','2017-12-11'),(39,0,17,320,'25','2017-12-11'),(40,0,18,120,'23','2017-12-11'),(41,0,19,342.5,'22','2017-12-11'),(42,0,20,175,'22','2017-12-11'),(43,0,20,120,'23','2017-12-11'),(44,0,20,3500,'24','2017-12-11'),(45,0,20,320,'25','2017-12-11'),(46,0,21,120,'25','2017-12-11'),(47,0,22,100,'25','2017-12-11'),(48,0,23,400,'25','2017-12-11'),(49,0,24,280,'25','2017-12-11'),(50,0,25,280,'25','2017-12-11'),(51,0,26,280,'25','2017-12-11'),(52,0,27,240,'25','2017-12-11'),(53,0,28,770,'24','2017-12-12');

/*Table structure for table `icw_opt_order_0317` */

DROP TABLE IF EXISTS `icw_opt_order_0317`;

CREATE TABLE `icw_opt_order_0317` (
  `icw_opt_Id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_opt_cName0317` varchar(100) DEFAULT NULL,
  `icw_opt_cMobile0317` varchar(50) DEFAULT NULL,
  `icw_opt_frame0317` varchar(100) DEFAULT NULL,
  `icw_opt_lense0317` varchar(100) DEFAULT NULL,
  `icw_opt_totalAmt0317` int(11) DEFAULT NULL,
  `icw_opt_advance0317` int(11) DEFAULT NULL,
  `icw_opt_balance0317` int(11) DEFAULT NULL,
  `icw_opt_date0317` date DEFAULT NULL,
  `icw_opt_orderNo_0317` int(11) DEFAULT NULL,
  `icw_shopId0317` int(11) DEFAULT NULL,
  `icw_opt_dispatch0317` smallint(1) DEFAULT NULL,
  `icw_rdSph0317` float DEFAULT NULL,
  `icw_rdCyl0317` float DEFAULT NULL,
  `icw_rdAxis0317` float DEFAULT NULL,
  `icw_rnSph0317` float DEFAULT NULL,
  `icw_rnCyl0317` float DEFAULT NULL,
  `icw_rnAxis0317` float DEFAULT NULL,
  `icw_ldSph0317` float DEFAULT NULL,
  `icw_ldCyl0317` float DEFAULT NULL,
  `icw_ldAxis0317` float DEFAULT NULL,
  `icw_lnSph0317` float DEFAULT NULL,
  `icw_lnCyl0317` float DEFAULT NULL,
  `icw_lnAxis0317` float DEFAULT NULL,
  PRIMARY KEY (`icw_opt_Id0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_opt_order_0317` */

/*Table structure for table `icw_pro_0317` */

DROP TABLE IF EXISTS `icw_pro_0317`;

CREATE TABLE `icw_pro_0317` (
  `icw_pi0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_cid0317` int(11) NOT NULL,
  `icw_scid0317` int(11) NOT NULL,
  `icw_pn0317` varchar(100) NOT NULL,
  `icw_pcod0317` varchar(50) NOT NULL,
  `icw_pbcod0317` varchar(50) NOT NULL,
  `icw_phsn0317` varchar(50) NOT NULL,
  `icw_pd0317` text NOT NULL,
  `icw_prs0317` float NOT NULL,
  `icw_ptax0317` int(11) NOT NULL,
  `icw_pisa0317` tinyint(2) NOT NULL,
  PRIMARY KEY (`icw_pi0317`),
  KEY `icw_cid0317` (`icw_cid0317`),
  KEY `icw_scid0317` (`icw_scid0317`),
  CONSTRAINT `icw_pro_0317_ibfk_1` FOREIGN KEY (`icw_cid0317`) REFERENCES `icw_cat_0317` (`icw_ci0317`) ON UPDATE CASCADE,
  CONSTRAINT `icw_pro_0317_ibfk_2` FOREIGN KEY (`icw_scid0317`) REFERENCES `icw_subcat_0317` (`icw_sci0317`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_pro_0317` */

insert  into `icw_pro_0317`(`icw_pi0317`,`icw_cid0317`,`icw_scid0317`,`icw_pn0317`,`icw_pcod0317`,`icw_pbcod0317`,`icw_phsn0317`,`icw_pd0317`,`icw_prs0317`,`icw_ptax0317`,`icw_pisa0317`) values (1,2,3,'win7','win7-12345','64565633','','',1500,22,1),(2,2,4,'ubuntu','ub346643','12333222','','',2000,22,1),(3,3,6,'micromax a9 charger','123322 mmc','234545','','',150,22,1),(4,3,7,'lenevo charger','lc23455','111234566','','',1200,22,1),(5,1,1,'iphone X','ix2333','1566633','','',25000,24,1),(6,3,6,'micro','','','','',50,0,1),(7,1,2,'lava','hdjgh','146','','',4000,25,1),(8,1,2,'mi m234','1222111123','5667355552322211','1200001212','',3000,23,1);

/*Table structure for table `icw_restra_invo_0317` */

DROP TABLE IF EXISTS `icw_restra_invo_0317`;

CREATE TABLE `icw_restra_invo_0317` (
  `icw_restra_orderId_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_restra_orderNo_0317` int(11) NOT NULL,
  `icw_restra_tblNo0317` varchar(11) NOT NULL,
  `icw_restra_orderType0317` varchar(20) NOT NULL,
  `icw_restra_servNo0317` int(11) NOT NULL,
  `icw_restra_item0317` varchar(2000) NOT NULL,
  `icw_restra_total0317` float NOT NULL,
  `icw_restra_totalTax0317` float NOT NULL,
  `icw_restra_grandTotal0317` float NOT NULL,
  `icw_restra_ordDate_0317` date NOT NULL,
  PRIMARY KEY (`icw_restra_orderId_0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_restra_invo_0317` */

/*Table structure for table `icw_restra_order_0317` */

DROP TABLE IF EXISTS `icw_restra_order_0317`;

CREATE TABLE `icw_restra_order_0317` (
  `icw_restra_orderId_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_restra_orderNo_0317` int(11) NOT NULL,
  `icw_restra_orderType0317` varchar(20) NOT NULL,
  `icw_restra_tblNo0317` varchar(11) NOT NULL,
  `icw_restra_servNo0317` int(11) NOT NULL,
  `icw_restra_item0317` varchar(200) NOT NULL,
  `icw_restra_qty0317` int(11) NOT NULL,
  `icw_restra_price0317` float NOT NULL,
  `icw_restra_total0317` float NOT NULL,
  `icw_restra_ordStatus_0317` smallint(1) NOT NULL,
  PRIMARY KEY (`icw_restra_orderId_0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_restra_order_0317` */

/*Table structure for table `icw_restra_servitor_0317` */

DROP TABLE IF EXISTS `icw_restra_servitor_0317`;

CREATE TABLE `icw_restra_servitor_0317` (
  `icw_restra_id_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_restra_serNo_0317` int(11) NOT NULL,
  `icw_restra_serName_0317` varchar(100) NOT NULL,
  `icw_restra_img_0317` varchar(200) NOT NULL,
  PRIMARY KEY (`icw_restra_id_0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_restra_servitor_0317` */

/*Table structure for table `icw_restra_table_0317` */

DROP TABLE IF EXISTS `icw_restra_table_0317`;

CREATE TABLE `icw_restra_table_0317` (
  `icw_restra_id_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_restra_tblNo_0317` int(11) NOT NULL,
  `icw_restra_seats_0317` int(11) NOT NULL,
  `icw_restra_img_0317` varchar(200) NOT NULL,
  PRIMARY KEY (`icw_restra_id_0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_restra_table_0317` */

/*Table structure for table `icw_shop_0317` */

DROP TABLE IF EXISTS `icw_shop_0317`;

CREATE TABLE `icw_shop_0317` (
  `icw_shopId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_shop_type0317` smallint(1) NOT NULL,
  `icw_shop_name0317` varchar(100) NOT NULL,
  `icw_shop_mobile0317` varchar(10) NOT NULL,
  `icw_shop_phone0317` varchar(10) NOT NULL,
  `icw_shop_gstin0317` varchar(50) NOT NULL,
  `icw_shop_hsn0317` varchar(50) NOT NULL,
  `icw_shop_Address0317` text NOT NULL,
  `icw_shop_TermCondition0317` text NOT NULL,
  `icw_shop_bLogo_0317` varchar(100) NOT NULL,
  `icw_shop_tax0317` smallint(1) DEFAULT NULL,
  `icw_shop_printer0317` smallint(1) NOT NULL,
  `icw_shop_sms0317` text NOT NULL,
  PRIMARY KEY (`icw_shopId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_shop_0317` */

insert  into `icw_shop_0317`(`icw_shopId0317`,`icw_shop_type0317`,`icw_shop_name0317`,`icw_shop_mobile0317`,`icw_shop_phone0317`,`icw_shop_gstin0317`,`icw_shop_hsn0317`,`icw_shop_Address0317`,`icw_shop_TermCondition0317`,`icw_shop_bLogo_0317`,`icw_shop_tax0317`,`icw_shop_printer0317`,`icw_shop_sms0317`) values (17,1,'admin shop','8115605346','343435','sdf2344','1','<p>hyderabad ap</p>\r\n','<p>fhdfbsdfjh</p>\r\n','logo.png',1,1,'http://sms.zestwings.com/smpp.sms/?username=8106153153&password=8106153153&to=(#mobilenumbers)&text=(#message)&from=$\r\n								');

/*Table structure for table `icw_sms_audit_log_0317` */

DROP TABLE IF EXISTS `icw_sms_audit_log_0317`;

CREATE TABLE `icw_sms_audit_log_0317` (
  `icw_sms_auditId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_sms_mob0317` varchar(20) NOT NULL,
  `icw_sms_temp0317` int(11) NOT NULL,
  `icw_sms_status0317` smallint(1) NOT NULL,
  `icw_sms_dateTime0317` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`icw_sms_auditId0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_sms_audit_log_0317` */

/*Table structure for table `icw_sms_template_0317` */

DROP TABLE IF EXISTS `icw_sms_template_0317`;

CREATE TABLE `icw_sms_template_0317` (
  `icw_sms_id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_sms_tmpltId0317` int(11) NOT NULL,
  `icw_sms_cus0317` text NOT NULL,
  `icw_sms_techni0317` text NOT NULL,
  `icw_sms_emailSub0317` text NOT NULL,
  `icw_sms_emailMsg0317` text NOT NULL,
  `icw_sms_stuts0317` smallint(1) NOT NULL,
  PRIMARY KEY (`icw_sms_id0317`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_sms_template_0317` */

/*Table structure for table `icw_stock_0317` */

DROP TABLE IF EXISTS `icw_stock_0317`;

CREATE TABLE `icw_stock_0317` (
  `icw_stockId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_stock_productId0317` int(11) NOT NULL,
  `icw_stock_productQty0317` int(11) NOT NULL,
  `icw_stock_supplierId0317` int(11) NOT NULL,
  `icw_stock_description0317` text NOT NULL,
  `icw_stock_date0317` date NOT NULL,
  PRIMARY KEY (`icw_stockId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `icw_stock_0317` */

/*Table structure for table `icw_stockmap_0317` */

DROP TABLE IF EXISTS `icw_stockmap_0317`;

CREATE TABLE `icw_stockmap_0317` (
  `icw_stockMapId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_stock_productId0317` int(11) NOT NULL,
  `icw_stock_productQty0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_stockMapId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `icw_stockmap_0317` */

/*Table structure for table `icw_subcat_0317` */

DROP TABLE IF EXISTS `icw_subcat_0317`;

CREATE TABLE `icw_subcat_0317` (
  `icw_sci0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_fk_ci0317` int(11) NOT NULL,
  `icw_scn0318` varchar(100) NOT NULL,
  `icw_scd0319` text NOT NULL,
  `icw_isa0320` tinyint(2) NOT NULL,
  PRIMARY KEY (`icw_sci0317`),
  KEY `icw_fk_ci0317` (`icw_fk_ci0317`),
  CONSTRAINT `icw_subcat_0317_ibfk_1` FOREIGN KEY (`icw_fk_ci0317`) REFERENCES `icw_cat_0317` (`icw_ci0317`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `icw_subcat_0317` */

insert  into `icw_subcat_0317`(`icw_sci0317`,`icw_fk_ci0317`,`icw_scn0318`,`icw_scd0319`,`icw_isa0320`) values (1,1,'iphone',' all iphone',1),(2,1,'android',' all',1),(3,2,'windows',' ',1),(4,2,'linux',' ',1),(5,2,'mac',' ',1),(6,3,'mobile charger',' ',1),(7,3,'laptop charger',' ',1);

/*Table structure for table `icw_supplier_0317` */

DROP TABLE IF EXISTS `icw_supplier_0317`;

CREATE TABLE `icw_supplier_0317` (
  `icw_supplier_id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_supplier_name0317` varchar(100) NOT NULL,
  `icw_supplier_mobile0317` varchar(20) NOT NULL,
  `icw_supplier_email0317` varchar(50) NOT NULL,
  `icw_supplier_companyName0317` varchar(100) NOT NULL,
  `icw_supplier_companyAddr0317` varchar(100) NOT NULL,
  `icw_supplier_isactive0317` tinyint(2) NOT NULL,
  `icw_supplier_Date0317` datetime NOT NULL,
  PRIMARY KEY (`icw_supplier_id0317`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `icw_supplier_0317` */

/*Table structure for table `icw_tailor_order_0317` */

DROP TABLE IF EXISTS `icw_tailor_order_0317`;

CREATE TABLE `icw_tailor_order_0317` (
  `icw_tai_id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_shopId0317` int(11) DEFAULT NULL,
  `icw_tai_cName0317` varchar(100) DEFAULT NULL,
  `icw_tai_cMobile0317` varchar(20) DEFAULT NULL,
  `icw_tai_totalAmt0317` float DEFAULT NULL,
  `icw_tai_advance0317` float DEFAULT NULL,
  `icw_tai_balance0317` float DEFAULT NULL,
  `icw_tai_orderNo_0317` int(11) DEFAULT NULL,
  `icw_tai_dispatch0317` smallint(1) NOT NULL,
  `icw_tai_type_0317` varchar(20) NOT NULL,
  `icw_tai_qty_0317` int(10) NOT NULL,
  `icw_tai_length_0317` float DEFAULT NULL,
  `icw_tai_fork_0317` float DEFAULT NULL,
  `icw_tai_waist_0317` float DEFAULT NULL,
  `icw_tai_thighs_0317` float DEFAULT NULL,
  `icw_tai_hip_0317` float DEFAULT NULL,
  `icw_tai_knee_0317` float DEFAULT NULL,
  `icw_tai_bottom_0317` float DEFAULT NULL,
  `icw_tai_shoulder_0317` float DEFAULT NULL,
  `icw_tai_chest_0317` float DEFAULT NULL,
  `icw_tai_stomach_0317` float DEFAULT NULL,
  `icw_tai_hLength_0317` float DEFAULT NULL,
  `icw_tai_front_0317` float DEFAULT NULL,
  `icw_tai_collor_0317` float DEFAULT NULL,
  `icw_tai_back_0317` float DEFAULT NULL,
  `icw_tai_date0317` date NOT NULL,
  PRIMARY KEY (`icw_tai_id0317`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_tailor_order_0317` */

/*Table structure for table `icw_tax_0317` */

DROP TABLE IF EXISTS `icw_tax_0317`;

CREATE TABLE `icw_tax_0317` (
  `icw_id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_taxName0317` varchar(100) NOT NULL,
  `icw_taxNote0317` text NOT NULL,
  `icw_taxStatus0317` tinyint(4) NOT NULL,
  PRIMARY KEY (`icw_id0317`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `icw_tax_0317` */

insert  into `icw_tax_0317`(`icw_id0317`,`icw_taxName0317`,`icw_taxNote0317`,`icw_taxStatus0317`) values (22,'GST 5%','      standard tax',1),(23,'GST 4%',' ',1),(24,'GST 14%',' ',1),(25,'GST 8%',' ',1);

/*Table structure for table `icw_taxmap_0317` */

DROP TABLE IF EXISTS `icw_taxmap_0317`;

CREATE TABLE `icw_taxmap_0317` (
  `icw_taxMapId_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_taxId0317` int(11) NOT NULL,
  `icw_subTaxName0317` varchar(200) NOT NULL,
  `icw_subTaxPercent0317` float NOT NULL,
  PRIMARY KEY (`icw_taxMapId_0317`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `icw_taxmap_0317` */

insert  into `icw_taxmap_0317`(`icw_taxMapId_0317`,`icw_taxId0317`,`icw_subTaxName0317`,`icw_subTaxPercent0317`) values (58,23,'IGST',1.5),(59,23,'CGST',2.5),(60,24,'IGST',6),(61,24,'CGST',8),(62,25,'CGST',3),(63,25,'IGST',5),(64,22,'IGST',2.5),(65,22,'CGST',2.5);

/*Table structure for table `icw_templates_0317` */

DROP TABLE IF EXISTS `icw_templates_0317`;

CREATE TABLE `icw_templates_0317` (
  `icw_id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_template_id0317` int(11) DEFAULT NULL,
  `icw_template_name0317` text,
  `icw_sms_tmplt0317` text,
  `icw_email_sub0317` text,
  `icw_email_tmplt0317` text,
  `icw_template_type0317` smallint(1) DEFAULT NULL,
  `icw_template_status0317` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`icw_id0317`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `icw_templates_0317` */

insert  into `icw_templates_0317`(`icw_id0317`,`icw_template_id0317`,`icw_template_name0317`,`icw_sms_tmplt0317`,`icw_email_sub0317`,`icw_email_tmplt0317`,`icw_template_type0317`,`icw_template_status0317`) values (3,1,'sms','client sms','client info mail','get this mail',1,1);

/*Table structure for table `icw_users_0317` */

DROP TABLE IF EXISTS `icw_users_0317`;

CREATE TABLE `icw_users_0317` (
  `icw_userId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_userFname0317` varchar(50) NOT NULL,
  `icw_userMobile0317` varchar(20) NOT NULL,
  `icw_userEmail0317` varchar(50) NOT NULL,
  `icw_userName0317` varchar(50) NOT NULL,
  `icw_userPwd0317` varchar(50) NOT NULL,
  `icw_userType0317` varchar(20) NOT NULL,
  `icw_user_is_active0317` tinyint(2) NOT NULL,
  `icw_userImg0317` varchar(100) NOT NULL,
  `icw_userDate0317` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icw_fk_shop_id0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_userId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_users_0317` */

insert  into `icw_users_0317`(`icw_userId0317`,`icw_userFname0317`,`icw_userMobile0317`,`icw_userEmail0317`,`icw_userName0317`,`icw_userPwd0317`,`icw_userType0317`,`icw_user_is_active0317`,`icw_userImg0317`,`icw_userDate0317`,`icw_fk_shop_id0317`) values (1,'admin123','','','admin2@gmail.com','a66abb5684c45962d887564f08346e8d','admin',1,'Desert.jpg','0000-00-00 00:00:00',17),(30,'jay kumar','76758432','jay@gmail.com','jaymaurya@gmail.com','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-10-26 18:20:58',17);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
