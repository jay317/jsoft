/*
SQLyog Community Edition- MySQL GUI v5.20
Host - 5.5.52-MariaDB : Database - iconpos_microelevetors
*********************************************************************
Server version : 5.5.52-MariaDB
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `iconpos_microelevetors`;

USE `iconpos_microelevetors`;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

/*Table structure for table `icw_barcodemap_0317` */

DROP TABLE IF EXISTS `icw_barcodemap_0317`;

CREATE TABLE `icw_barcodemap_0317` (
  `icw_barcodeMapId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_productId0317` int(11) DEFAULT NULL,
  `icw_productbarcode0317` varchar(50) DEFAULT NULL,
  `icw_userId0317` int(11) DEFAULT NULL,
  `icw_date0317` datetime DEFAULT NULL,
  PRIMARY KEY (`icw_barcodeMapId0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_cat_0317` */

insert  into `icw_cat_0317`(`icw_ci0317`,`icw_cn0318`,`icw_cd0319`,`icw_isa0320`,`icw_fk_shop_id0317`) values (14,'Collapsiable Lift','',1,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `icw_clients_0317` */

insert  into `icw_clients_0317`(`icw_clientId0317`,`icw_clientName0317`,`icw_clientMobile0317`,`icw_clientEmail0317`,`icw_clientBtitle0317`,`icw_clientGrn0317`,`icw_clientAddr10317`,`icw_clientAddr20317`,`icw_clientCity0317`,`icw_clientState0317`,`icw_clientZipCode0317`,`icw_clientCountry0317`,`icw_clientImg0317`,`icw_clientDate0317`,`icw_isa0317`) values (10,'sandya','9154828288','sandyarani 564@gmail.com','micro elevetors','','HNK WARANGAL','wgl','','',0,'',NULL,'2017-10-13 16:09:06',1),(11,'surender','','','','','','','','',0,'',NULL,'2017-10-28 12:51:57',1),(12,'surender','9849984271','','internet','','parkal','warangal.rural','ts','',0,'',NULL,'2017-10-28 12:53:14',1),(13,'Samrat Thatipelli','9700947326','','Self Empolyee','','Pinnavari street,Warangal','Pinnavari Street,Warangal','Warangal','Telangana',506002,'India','','2017-12-02 19:55:35',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_img_0317` */

insert  into `icw_img_0317`(`icw_imgid0317`,`icw_pid0317`,`icw_imgname0317`) values (37,20,''),(38,21,''),(40,23,''),(41,24,'');

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
  `icw_taxType0317` varchar(20) NOT NULL,
  `icw_invoDate0317` date NOT NULL,
  `icw_customerMob0317` varchar(50) NOT NULL,
  `icw_invoStatus0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_invoId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `icw_invoice_0317` */

insert  into `icw_invoice_0317`(`icw_invoId0317`,`icw_clientId0317`,`icw_shopId0317`,`icw_userId0317`,`icw_invoiceNo_0317`,`icw_noOfItems0317`,`icw_totalAmt0317`,`icw_totalTax0317`,`icw_amtWithTax0317`,`icw_paidAmount0317`,`icw_balanceAmt0317`,`icw_paymentMode0317`,`icw_transactionId0317`,`icw_taxType0317`,`icw_invoDate0317`,`icw_customerMob0317`,`icw_invoStatus0317`) values (31,0,18,1,1,1,4000,1120,5120,780,4340,'cash','','1','2017-10-13','',1),(32,0,0,1,2,0,0,0,0,0,0,'','','','2017-10-13','',1),(33,0,18,1,3,2,50000,14000,64000,0,0,'no','','1','2017-10-13','',1),(34,0,18,1,4,1,250,0,250,0,0,'no','','1','2017-10-14','',1),(35,0,18,1,5,1,25,0,25,0,0,'no','','1','2017-10-14','',1),(36,0,18,1,6,1,60000,16800,76800,0,0,'no','','1','2017-10-17','',1),(37,0,0,1,7,0,0,0,0,0,0,'','','','2017-10-17','',1),(38,0,0,1,8,0,0,0,0,0,0,'','','','2017-10-17','',1),(39,0,0,1,9,0,0,0,0,0,0,'','','','2017-10-17','',1),(40,0,0,1,10,0,0,0,0,0,0,'','','','2017-10-17','',1),(41,0,18,1,11,1,200,56,256,0,0,'no','','1','2017-10-17','',1),(42,0,0,1,12,0,0,0,0,0,0,'','','','2017-10-17','',1),(43,0,0,1,13,0,0,0,0,0,0,'','','','2017-10-17','',1),(44,0,0,1,14,0,0,0,0,0,0,'','','','2017-10-17','',1),(45,0,18,1,15,1,10000,0,10000,0,0,'no','','1','2017-10-28','',1),(46,0,18,1,16,1,5000,0,5000,0,0,'no','','1','2017-10-28','',1),(47,0,18,1,17,1,5000,0,5000,0,0,'no','','1','2017-10-28','',1),(48,0,18,1,18,1,0,0,0,0,0,'no','','2','2017-10-28','',1),(49,0,18,1,19,1,20,0,20,0,0,'no','','2','2017-10-28','',1),(50,0,18,1,20,1,0,0,0,0,0,'cash','','2','2017-10-28','',1),(51,0,18,1,21,2,0,0,0,0,0,'no','','2','2017-10-28','',1),(52,10,18,1,22,3,20000,5600,25600,0,0,'no','','2','2017-10-28','',1),(53,0,18,1,23,1,41525.5,0,41525.5,0,0,'no','','1','2017-12-02','',1),(54,0,18,1,24,1,41525.5,0,41525.5,0,0,'no','','1','2017-12-02','',1),(55,13,18,1,25,4,50000,9000,59000,0,0,'no','','1','2017-12-03','',1),(56,0,18,1,26,1,11000,1980,12980,11000,1980,'cash','','1','2017-12-11','',1),(57,10,18,1,27,1,20000,3600,23600,0,0,'no','','1','2017-12-11','',1);

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
  PRIMARY KEY (`icw_invoice_proId_0317`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Data for the table `icw_invoice_prodetails_0317` */

insert  into `icw_invoice_prodetails_0317`(`icw_invoice_proId_0317`,`icw_client_Id0317`,`icw_invoiceNo_0317`,`icw_invoice_productId_0317`,`icw_invoice_proname0317`,`icw_invoice_qty0317`,`icw_invoice_sellingPrice0317`,`icw_invoice_itemTotal0317`,`icw_invoice_proDate0317`) values (52,0,1,19,'door mat',1,4000,4000,'2017-10-13'),(53,0,2,19,'door mat',1,4000,4000,'2017-10-13'),(54,0,3,20,'Door freams',1,20000,20000,'2017-10-13'),(55,0,4,0,'cake',10,25,250,'2017-10-14'),(56,0,5,0,'',1,25,25,'2017-10-14'),(57,0,6,20,'Door freams',3,20000,60000,'2017-10-17'),(58,0,7,20,'Door freams',3,20000,60000,'2017-10-17'),(59,0,8,20,'Door freams',3,20000,60000,'2017-10-17'),(60,0,9,20,'Door freams',3,20000,60000,'2017-10-17'),(61,0,10,20,'Door freams',3,20000,60000,'2017-10-17'),(62,0,11,20,'tube',5,40,200,'2017-10-17'),(63,0,12,20,'tube',5,40,200,'2017-10-17'),(64,0,13,20,'tube',5,40,200,'2017-10-17'),(65,0,14,20,'tube',5,40,200,'2017-10-17'),(66,0,15,20,'Door freams',2,5000,10000,'2017-10-28'),(67,0,16,0,'computer',2,2500,5000,'2017-10-28'),(68,0,17,0,'computer',2,2500,5000,'2017-10-28'),(69,0,18,0,'salt 1kg',1,0,0,'2017-10-28'),(70,0,19,0,'1234',0,20,0,'2017-10-28'),(71,0,20,0,'1234',0,20,0,'2017-10-28'),(72,0,21,0,'1234',0,20,0,'2017-10-28'),(73,10,22,0,'1234',0,20,0,'2017-10-28'),(74,0,23,0,'Sigma Controller System',1,41526,41526,'2017-12-02'),(75,0,24,0,'Sigma Controller System',1,41526,41526,'2017-12-02'),(76,13,25,0,'',1,0,0,'2017-12-03'),(77,0,26,24,'Door fream',1,11000,11000,'2017-12-11'),(78,10,27,20,'Door freams',1,20000,20000,'2017-12-11');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_invoice_taxdetails_0317` */

insert  into `icw_invoice_taxdetails_0317`(`icw_invoTaxDtId0317`,`icw_client_Id0317`,`icw_invoiceNo_0317`,`icw_client_taxSum0317`,`icw_client_taxDetail0317`,`icw_client_InvoDate0317`) values (6,0,18,12461.8,'GST 18%','2017-10-09');

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
  `icw_opt_date0317` datetime DEFAULT NULL,
  `icw_opt_orderNo_0317` int(11) DEFAULT NULL,
  `icw_shopId0317` int(11) DEFAULT NULL,
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
  `icw_pd0317` text NOT NULL,
  `icw_prs0317` float NOT NULL,
  `icw_ptax0317` int(11) NOT NULL,
  `icw_pisa0317` tinyint(2) NOT NULL,
  PRIMARY KEY (`icw_pi0317`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_pro_0317` */

insert  into `icw_pro_0317`(`icw_pi0317`,`icw_cid0317`,`icw_scid0317`,`icw_pn0317`,`icw_pcod0317`,`icw_pbcod0317`,`icw_pd0317`,`icw_prs0317`,`icw_ptax0317`,`icw_pisa0317`) values (20,14,7,'Door freams','','','',20000,26,1),(21,14,8,'Cabin','','','',30000,26,1),(23,14,7,'Door fream','','','lift door fream',11200,26,1),(24,14,7,'Door fream','11','222','sssss',11000,26,1);

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
  PRIMARY KEY (`icw_shopId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_shop_0317` */

insert  into `icw_shop_0317`(`icw_shopId0317`,`icw_shop_type0317`,`icw_shop_name0317`,`icw_shop_mobile0317`,`icw_shop_phone0317`,`icw_shop_gstin0317`,`icw_shop_hsn0317`,`icw_shop_Address0317`,`icw_shop_TermCondition0317`,`icw_shop_bLogo_0317`,`icw_shop_tax0317`,`icw_shop_printer0317`) values (18,0,'MICRO SHARON ELEVATORS','9100990382','9100990388','36BZKPD7498B1Z5','','																																				Micro Sharon Elevetors\r\nKarimnagar,opp:Chamist Bhavan, Near court	Telangana	                                                                                                                                            ','<p>Goods Ones Sold Will not be Taken Back</p>\r\n','pro-08big.jpg',2,0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_stock_0317` */

/*Table structure for table `icw_stockmap_0317` */

DROP TABLE IF EXISTS `icw_stockmap_0317`;

CREATE TABLE `icw_stockmap_0317` (
  `icw_stockMapId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_stock_productId0317` int(11) NOT NULL,
  `icw_stock_productQty0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_stockMapId0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_stockmap_0317` */

/*Table structure for table `icw_subcat_0317` */

DROP TABLE IF EXISTS `icw_subcat_0317`;

CREATE TABLE `icw_subcat_0317` (
  `icw_sci0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_fk_ci0317` int(11) NOT NULL,
  `icw_scn0318` varchar(100) NOT NULL,
  `icw_scd0319` text NOT NULL,
  `icw_isa0320` tinyint(2) NOT NULL,
  PRIMARY KEY (`icw_sci0317`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `icw_subcat_0317` */

insert  into `icw_subcat_0317`(`icw_sci0317`,`icw_fk_ci0317`,`icw_scn0318`,`icw_scd0319`,`icw_isa0320`) values (6,13,'door freams',' ',1),(7,14,'Door Freams ',' ',1),(8,14,'cabin',' ',1),(9,14,'5HP shorp Motor',' ',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `icw_supplier_0317` */

insert  into `icw_supplier_0317`(`icw_supplier_id0317`,`icw_supplier_name0317`,`icw_supplier_mobile0317`,`icw_supplier_email0317`,`icw_supplier_companyName0317`,`icw_supplier_companyAddr0317`,`icw_supplier_isactive0317`,`icw_supplier_Date0317`) values (1,'vinayaka super market','8885191185','deardulam@gmail.com','vinayaka super market','<p>adfadfdfafd</p>\r\n',1,'0000-00-00 00:00:00');

/*Table structure for table `icw_tax_0317` */

DROP TABLE IF EXISTS `icw_tax_0317`;

CREATE TABLE `icw_tax_0317` (
  `icw_id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_taxName0317` varchar(100) NOT NULL,
  `icw_taxNote0317` text NOT NULL,
  `icw_taxStatus0317` tinyint(4) NOT NULL,
  PRIMARY KEY (`icw_id0317`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `icw_tax_0317` */

insert  into `icw_tax_0317`(`icw_id0317`,`icw_taxName0317`,`icw_taxNote0317`,`icw_taxStatus0317`) values (26,'CSGST','   ',1),(29,'SGST','   ',1),(30,'GST',' Commodity Tax',1);

/*Table structure for table `icw_taxmap_0317` */

DROP TABLE IF EXISTS `icw_taxmap_0317`;

CREATE TABLE `icw_taxmap_0317` (
  `icw_taxMapId_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_taxId0317` int(11) NOT NULL,
  `icw_subTaxName0317` varchar(200) NOT NULL,
  `icw_subTaxPercent0317` float NOT NULL,
  PRIMARY KEY (`icw_taxMapId_0317`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `icw_taxmap_0317` */

insert  into `icw_taxmap_0317`(`icw_taxMapId_0317`,`icw_taxId0317`,`icw_subTaxName0317`,`icw_subTaxPercent0317`) values (77,29,'SGST',9),(78,30,'cgst',9),(79,30,'sgst',9),(80,26,'CGST',9),(81,26,'SGST',9);

/*Table structure for table `icw_users_0317` */

DROP TABLE IF EXISTS `icw_users_0317`;

CREATE TABLE `icw_users_0317` (
  `icw_userId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_userFname0317` varchar(50) NOT NULL,
  `icw_userName0317` varchar(50) NOT NULL,
  `icw_userPwd0317` varchar(50) NOT NULL,
  `icw_userType0317` varchar(20) NOT NULL,
  `icw_user_is_active0317` tinyint(2) NOT NULL,
  `icw_userImg0317` varchar(100) NOT NULL,
  `icw_userDate0317` datetime NOT NULL,
  `icw_fk_shop_id0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_userId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_users_0317` */

insert  into `icw_users_0317`(`icw_userId0317`,`icw_userFname0317`,`icw_userName0317`,`icw_userPwd0317`,`icw_userType0317`,`icw_user_is_active0317`,`icw_userImg0317`,`icw_userDate0317`,`icw_fk_shop_id0317`) values (1,'admin123','admin2@gmail.com','0192023a7bbd73250516f069df18b500','admin',1,'Desert.jpg','0000-00-00 00:00:00',18);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
