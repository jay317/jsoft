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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_cat_0317` */

/*Table structure for table `icw_clients_0317` */

DROP TABLE IF EXISTS `icw_clients_0317`;

CREATE TABLE `icw_clients_0317` (
  `icw_clientId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_clientName0317` varchar(50) NOT NULL,
  `icw_clientMobile0317` varchar(50) NOT NULL,
  `icw_clientEmail0317` varchar(50) NOT NULL,
  `icw_clientBtitle0317` varchar(100) NOT NULL,
  `icw_clientGrn0317` varchar(100) NOT NULL,
  `icw_clientAddr10317` varchar(100) NOT NULL,
  `icw_clientAddr20317` varchar(100) NOT NULL,
  `icw_clientCity0317` varchar(50) NOT NULL,
  `icw_clientState0317` varchar(50) NOT NULL,
  `icw_clientZipCode0317` int(11) NOT NULL,
  `icw_clientCountry0317` varchar(50) NOT NULL,
  `icw_clientImg0317` varchar(50) NOT NULL,
  `icw_clientDate0317` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `icw_isa0317` tinyint(2) NOT NULL,
  PRIMARY KEY (`icw_clientId0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_clients_0317` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_img_0317` */

/*Table structure for table `icw_invoice_0317` */

DROP TABLE IF EXISTS `icw_invoice_0317`;

CREATE TABLE `icw_invoice_0317` (
  `icw_invoId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_clientId0317` int(11) NOT NULL,
  `icw_shopId0317` int(11) NOT NULL,
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
  `icw_invoStatus0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_invoId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `icw_invoice_0317` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `icw_invoice_prodetails_0317` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_invoice_taxdetails_0317` */

/*Table structure for table `icw_pro_0317` */

DROP TABLE IF EXISTS `icw_pro_0317`;

CREATE TABLE `icw_pro_0317` (
  `icw_pi0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_cid0317` int(11) NOT NULL,
  `icw_pn0317` varchar(100) NOT NULL,
  `icw_pcod0317` varchar(50) NOT NULL,
  `icw_pbcod0317` varchar(50) NOT NULL,
  `icw_pd0317` text NOT NULL,
  `icw_prs0317` float NOT NULL,
  `icw_ptax0317` int(11) NOT NULL,
  `icw_pisa0317` tinyint(2) NOT NULL,
  PRIMARY KEY (`icw_pi0317`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_pro_0317` */

/*Table structure for table `icw_shop_0317` */

DROP TABLE IF EXISTS `icw_shop_0317`;

CREATE TABLE `icw_shop_0317` (
  `icw_shopId0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_shop_name0317` varchar(100) NOT NULL,
  `icw_shop_mobile0317` varchar(10) NOT NULL,
  `icw_shop_phone0317` varchar(10) NOT NULL,
  `icw_shop_gstin0317` varchar(50) NOT NULL,
  `icw_shop_hsn0317` varchar(50) NOT NULL,
  `icw_shop_Address0317` text NOT NULL,
  `icw_shop_TermCondition0317` text NOT NULL,
  `icw_shop_bLogo_0317` varchar(100) NOT NULL,
  PRIMARY KEY (`icw_shopId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_shop_0317` */

insert  into `icw_shop_0317`(`icw_shopId0317`,`icw_shop_name0317`,`icw_shop_mobile0317`,`icw_shop_phone0317`,`icw_shop_gstin0317`,`icw_shop_hsn0317`,`icw_shop_Address0317`,`icw_shop_TermCondition0317`,`icw_shop_bLogo_0317`) values (13,'admin shop2','45679999','23556','gstn999','hsn2345666','<p><strong>Address- </strong>Cyber Tower, plot-no. 235</p>\r\n\r\n<p>Hyderabad-500038</p>\r\n\r\n<p>AP</p>\r\n','<p>follow terms and conditions</p>\r\n','Penguins.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `icw_supplier_0317` */

/*Table structure for table `icw_tax_0317` */

DROP TABLE IF EXISTS `icw_tax_0317`;

CREATE TABLE `icw_tax_0317` (
  `icw_id0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_taxName0317` varchar(100) NOT NULL,
  `icw_taxNote0317` text NOT NULL,
  `icw_taxStatus0317` tinyint(4) NOT NULL,
  PRIMARY KEY (`icw_id0317`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `icw_tax_0317` */

insert  into `icw_tax_0317`(`icw_id0317`,`icw_taxName0317`,`icw_taxNote0317`,`icw_taxStatus0317`) values (16,'GST 18%',' this is state and central tax',1),(17,'IGST 10%',' ',1),(18,'GST 4%','  ',1),(19,'itcgst','  hgdssssj',1);

/*Table structure for table `icw_taxmap_0317` */

DROP TABLE IF EXISTS `icw_taxmap_0317`;

CREATE TABLE `icw_taxmap_0317` (
  `icw_taxMapId_0317` int(11) NOT NULL AUTO_INCREMENT,
  `icw_taxId0317` int(11) NOT NULL,
  `icw_subTaxName0317` varchar(200) NOT NULL,
  `icw_subTaxPercent0317` float NOT NULL,
  PRIMARY KEY (`icw_taxMapId_0317`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `icw_taxmap_0317` */

insert  into `icw_taxmap_0317`(`icw_taxMapId_0317`,`icw_taxId0317`,`icw_subTaxName0317`,`icw_subTaxPercent0317`) values (32,16,'CGST',9),(33,16,'SGST',9),(34,17,'IGST',10),(37,18,'SGST',2),(38,18,'CGST',2),(40,19,'rtcs',10);

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
  `icw_userDate0317` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icw_fk_shop_id0317` int(11) NOT NULL,
  PRIMARY KEY (`icw_userId0317`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `icw_users_0317` */

insert  into `icw_users_0317`(`icw_userId0317`,`icw_userFname0317`,`icw_userName0317`,`icw_userPwd0317`,`icw_userType0317`,`icw_user_is_active0317`,`icw_userImg0317`,`icw_userDate0317`,`icw_fk_shop_id0317`) values (1,'admin123','admin2@gmail.com','0192023a7bbd73250516f069df18b500','admin',1,'Desert.jpg','0000-00-00 00:00:00',13),(5,'jay maurya','jay317maurya@gmail.com','f0e7d0d17cff891edbc9cdf92dcd9297','user',1,'','0000-00-00 00:00:00',0),(7,'ram kumar','ramku@gmail.com','6a557ed1005dddd940595b8fc6ed47b2','user',0,'','0000-00-00 00:00:00',0),(8,'siddu singh','siddu@123gmail.com','b3b0ca8bbeddd31bf60d4ba45bb12e5f','user',1,'','0000-00-00 00:00:00',0),(9,'rihan khan','rihan@gmail.com','2f5f8938885e551c5ba575acc8c7eac4','user',1,'Lighthouse.jpg','2017-08-28 18:37:53',0),(10,'ghgfh','fdgfdgfdg','152d3d8eab8540b7b55f0d0d57a79f79','admin',1,'','2017-08-29 11:28:56',0),(11,'ajay','ajay','81dc9bdb52d04dc20036dbd8313ed055','admin',1,'','2017-08-29 11:29:43',0),(12,'tiya','tiya@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','user',1,'','2017-08-29 17:52:04',0),(14,'mintoo singh','mintoosingh@gmail.com','92cd4102aa5d298a09ea71e6141e2da7','user',1,'','2017-09-01 11:49:21',0),(15,'tipu sultan','tipu@gmail.com','6cb0ba18b4c2a1f72a97e91b955026c1','user',1,'','2017-09-01 11:55:05',0),(16,'shasi kant','sasi@gmail.com','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-01 12:07:52',0),(17,'abc','abc@gmail.com','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-01 12:20:39',0),(18,'sita','sita@gmail.com','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-01 12:31:18',0),(19,'siya singh','siya@gmail.com','c4ce712d9bc37736d8d82448db5a3015','user',1,'Penguins.jpg','2017-09-01 13:09:42',0),(20,'sruti','sruti','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-01 13:17:45',0),(21,'tinu','tinu','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-01 13:33:56',0),(22,'gita','gsfgsdf','5d16a37ccdb6e5549cc382954d66d3a8','user',1,'','2017-09-01 13:58:21',0),(23,'nihal','nihal123@gmail.com','e10adc3949ba59abbe56e057f20f883e','user',0,'','2017-09-04 10:28:14',0),(24,'sara khan','sara@gmail.com','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-15 14:06:56',13),(25,'ritesh','ritesh@gmail.com','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-15 18:21:08',13),(26,'sinu','sinu@gmail.com','ce69fc8e9545e7ec9a29705848791976','user',1,'','2017-09-15 18:55:53',13),(27,'tusar','tusar@gmail,com','e10adc3949ba59abbe56e057f20f883e','user',1,'','2017-09-15 18:58:35',13);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
