-- MySQL dump 10.13  Distrib 5.5.40, for Win32 (x86)
--
-- Host: localhost    Database: imgcms
-- ------------------------------------------------------
-- Server version	5.5.40

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(96) DEFAULT NULL,
  `password` varchar(108) DEFAULT NULL,
  `mobile` varchar(33) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `login_ip` varchar(45) DEFAULT NULL,
  `login_count` mediumint(8) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','',1451957002,'127.0.0.1',44,'',1,NULL),(2,'123456','e10adc3949ba59abbe56e057f20f883e','',1451355968,'127.0.0.1',5,'',0,1451266356),(3,'22222','e10adc3949ba59abbe56e057f20f883e','',1451289808,'127.0.0.1',1,'',1,1451283148),(4,'boss888','e10adc3949ba59abbe56e057f20f883e','',1451356474,'127.0.0.1',5,'',1,1451289789),(5,'987654','6c44e5cd17f0019c64b042e4a745412a',NULL,1451356086,'127.0.0.1',1,NULL,1,1451356055);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(10) DEFAULT NULL,
  `areaname` varchar(150) DEFAULT NULL,
  `parentid` int(10) DEFAULT NULL,
  `shortname` varchar(150) DEFAULT NULL,
  `areacode` int(6) DEFAULT NULL,
  `zipcode` int(10) DEFAULT NULL,
  `pinyin` varchar(300) DEFAULT NULL,
  `lng` varchar(60) DEFAULT NULL,
  `lat` varchar(60) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `position` varchar(765) DEFAULT NULL,
  `sort` tinyint(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (110000,'北京',0,'北京',NULL,NULL,NULL,'116.405289','39.904987',1,'tr_0',1),(110100,'北京市',110000,'北京',NULL,NULL,NULL,'116.405289','39.904987',2,'tr_0 tr_110000',1);
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_group`
--

DROP TABLE IF EXISTS `auth_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_group` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `title` text,
  `status` tinyint(1) DEFAULT '1',
  `rules` char(240) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_group`
--

LOCK TABLES `auth_group` WRITE;
/*!40000 ALTER TABLE `auth_group` DISABLE KEYS */;
INSERT INTO `auth_group` VALUES (1,'版主组',1,'3,8,10,9,4,13,14,15'),(2,'页面排版员',1,'1,11,12,2,16'),(4,'超级管理员',1,'1,11,12,3,8,10,9,4,13,14,15,2,16,5,17,6,7'),(3,'图片审核员',1,'4,13'),(5,'qqq',1,'1,11,12,3,8,10,9,4,13,14,15,2,16,5,17,6,7'),(6,'cccc',1,'1,11,12,3,8,10,9,4,13,14,15,2,16,5,17,6,7');
/*!40000 ALTER TABLE `auth_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_group_access`
--

DROP TABLE IF EXISTS `auth_group_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) DEFAULT NULL,
  `group_id` mediumint(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_group_access`
--

LOCK TABLES `auth_group_access` WRITE;
/*!40000 ALTER TABLE `auth_group_access` DISABLE KEYS */;
INSERT INTO `auth_group_access` VALUES (1,2),(2,3),(3,2),(4,4),(5,2);
/*!40000 ALTER TABLE `auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `id` int(8) NOT NULL DEFAULT '0',
  `name` varchar(240) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `condition` char(32) DEFAULT NULL,
  `pid` smallint(5) DEFAULT NULL,
  `sort` smallint(5) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
INSERT INTO `auth_rule` VALUES (1,'classify/list','分类管理',1,1,'',0,100,1439436928),(3,'user/index','会员管理',1,1,'',0,100,1439449093),(4,'Goods/Goods_list','图片管理',1,1,'',0,100,1439449093),(2,'Page/list_class','单页管理',1,1,'',0,100,NULL),(5,'Recharge/change','充值管理',1,1,'',0,100,NULL),(6,'Web/list','服务管理',1,1,'',0,100,NULL),(7,'Order/index','订单管理',1,1,'',0,100,NULL),(8,'user/adduser','新增会员',1,1,NULL,3,100,NULL),(10,'user/del_list','会员回收站',1,1,NULL,3,100,NULL),(9,'user/user_list','会员列表',1,1,NULL,3,100,NULL),(11,'Classify/classify','分类权限',1,1,'',1,100,NULL),(12,'Classify/add','添加分类',1,1,'',1,100,NULL),(13,'Goods/pic_list','图片列表',1,1,'',4,100,1439449093),(14,'Goods/Add_pic','新增图片',1,1,'',4,100,1439449093),(15,'Goods/del_pic','图片回收站',1,1,'',4,100,1439449093),(16,'Page/Power','单页管理',1,1,'',2,100,NULL),(17,'Recharge/change','充值记录列表',1,1,'',5,100,NULL);
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_log`
--

DROP TABLE IF EXISTS `img_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL COMMENT '关联用户id',
  `time` varchar(255) NOT NULL COMMENT '记录时间',
  `money` varchar(255) NOT NULL COMMENT '金额',
  `status` tinyint(1) NOT NULL COMMENT '状态：0充值，1提现',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='点数记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_log`
--

LOCK TABLES `img_log` WRITE;
/*!40000 ALTER TABLE `img_log` DISABLE KEYS */;
INSERT INTO `img_log` VALUES (1,'1','2015-6-18','+11111111',0),(2,'1','1970-8-1','-11111111',1);
/*!40000 ALTER TABLE `img_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_love`
--

DROP TABLE IF EXISTS `img_love`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` varchar(255) NOT NULL COMMENT '关联商品id',
  `uid` varchar(255) NOT NULL COMMENT '关联用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收藏表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_love`
--

LOCK TABLES `img_love` WRITE;
/*!40000 ALTER TABLE `img_love` DISABLE KEYS */;
/*!40000 ALTER TABLE `img_love` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_order`
--

DROP TABLE IF EXISTS `img_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` varchar(255) NOT NULL COMMENT '关联商品id',
  `uid` varchar(255) NOT NULL COMMENT '关联用户id',
  `order` varchar(255) NOT NULL COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_order`
--

LOCK TABLES `img_order` WRITE;
/*!40000 ALTER TABLE `img_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `img_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_page`
--

DROP TABLE IF EXISTS `img_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `power` text NOT NULL COMMENT '版权',
  `poxy` text NOT NULL COMMENT '代理',
  `reg` text NOT NULL COMMENT '版权注册公示',
  `about` text NOT NULL COMMENT '关于我们',
  `call` text NOT NULL COMMENT '联系我们',
  `is_use` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否使用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='单页表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_page`
--

LOCK TABLES `img_page` WRITE;
/*!40000 ALTER TABLE `img_page` DISABLE KEYS */;
INSERT INTO `img_page` VALUES (1,'范德萨发放','发放','阿发','撒发','阿发按时',0),(2,'范德萨发放大大大','发放大大大','阿发大','撒发发sa','阿发按时 按时',0),(3,'1135464','497979','6464','4646','7979',0),(4,'底部版权','这是代理','版权注册公司','关与我','联系我们',0),(5,'test','test','test','test','test',1);
/*!40000 ALTER TABLE `img_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_phopto`
--

DROP TABLE IF EXISTS `img_phopto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_phopto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '关联用户id',
  `type` tinyint(1) NOT NULL COMMENT '类型 ：全授权模式（0），买断模式（1）',
  `img_title` varchar(255) NOT NULL COMMENT '图片标题',
  `img_key_words` varchar(255) NOT NULL COMMENT '图片关键字',
  `img_classify` varchar(255) NOT NULL COMMENT '图片分类',
  `img_path` varchar(255) NOT NULL COMMENT '上传路径',
  `img_price` varchar(255) NOT NULL COMMENT '图片价格',
  `img_s_img` varchar(255) NOT NULL COMMENT '缩略图',
  `img_content` text NOT NULL COMMENT '图片描述',
  `status` tinyint(1) NOT NULL COMMENT '状态：0待认证，1已认证，2回收站',
  `file_time` int(11) NOT NULL COMMENT '图片上传时间',
  `is_del` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否在回收站',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='图片详细信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_phopto`
--

LOCK TABLES `img_phopto` WRITE;
/*!40000 ALTER TABLE `img_phopto` DISABLE KEYS */;
INSERT INTO `img_phopto` VALUES (12,2,0,'wef','22','7','1451443663.jpg','500','s_1451443663.jpg','wfewf',2,1451443663,0),(11,2,1,'aaa','rwr','6','1451443605.jpg','200','s_1451443605.jpg','gds',2,1451443606,0),(10,2,0,'嘿嘿111','你懂得21231','7','1451442739.jpg','255','s_1451442739.jpg','123456',1,1451442740,0),(9,1,1,'123456','4456654','7','1451380615.jpg','200','s_1451380615.jpg','88',1,1451380615,1);
/*!40000 ALTER TABLE `img_phopto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_phopto_classify`
--

DROP TABLE IF EXISTS `img_phopto_classify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_phopto_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类的名字',
  `sort` int(11) NOT NULL COMMENT '父类',
  `pid` int(11) NOT NULL COMMENT '父类id',
  `is_delete` tinyint(1) NOT NULL COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='图片分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_phopto_classify`
--

LOCK TABLES `img_phopto_classify` WRITE;
/*!40000 ALTER TABLE `img_phopto_classify` DISABLE KEYS */;
INSERT INTO `img_phopto_classify` VALUES (4,'清纯可人',5,2,0),(2,'美女',1,0,0),(3,'汽车',2,0,0),(5,'宝马',5,3,0),(6,'性感火辣',5,2,0),(7,'奥迪',5,3,0),(11,'15454646',0,3,0),(10,'御姐',0,2,0),(12,'小小',0,3,0),(13,'男人',0,0,0),(14,'项目名称',0,13,0);
/*!40000 ALTER TABLE `img_phopto_classify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_user`
--

DROP TABLE IF EXISTS `img_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL COMMENT '类型 ：个人，机构',
  `username` varchar(96) NOT NULL COMMENT '用户名',
  `password` varchar(108) NOT NULL COMMENT '密码',
  `sns_num` varchar(255) NOT NULL DEFAULT '0',
  `sns_img` varchar(255) NOT NULL COMMENT '身份证正面图',
  `sns_other_img` varchar(255) NOT NULL COMMENT '身份证反面图',
  `work_img` varchar(255) NOT NULL COMMENT '营业执照图',
  `team_img` varchar(255) NOT NULL COMMENT '组织机构图',
  `mobile` varchar(255) NOT NULL DEFAULT '0',
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(45) NOT NULL,
  `login_count` mediumint(8) NOT NULL,
  `email` varchar(120) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '管理员审核用户信息状态：0待认证，1已认证',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户登录状态：0待认证，1已认证',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_user`
--

LOCK TABLES `img_user` WRITE;
/*!40000 ALTER TABLE `img_user` DISABLE KEYS */;
INSERT INTO `img_user` VALUES (1,1,'a7','c4ca4238a0b923820dcc509a6f75849b','400000194012055871','2.jpg','2.jpg','','','1111',0,'',0,'466934322@qq.com',1,0,0),(2,0,'a78','28c8edde3d61a0411511d3b1866f0636','42062119940121571x','2.jpg','2.jpg','','','13027939221',0,'',0,'454554',1,0,0),(3,0,'a786','40f5888b67c748df7efba008e7c2f9d2','42062119940121571s','2.jpg','2.jpg','','','13027939221',0,'',0,'339@qq.com',2,0,0),(4,1,'a7867','bc554ecf2b33458ff1f152433cd4c813','136','2.jpg','2.jpg','','','55',0,'',0,'',1,1,0),(5,1,'a78676','e8059811450b854a7b77cc653761282d','137','2.jpg','2.jpg','','','',0,'',0,'',1,0,0),(6,1,'a786765','81d2017f9a08a6bb9e1cd4ffe7dcd902','','2.jpg','2.jpg','','','',0,'',0,'',1,1,0);
/*!40000 ALTER TABLE `img_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_user_money`
--

DROP TABLE IF EXISTS `img_user_money`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_user_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL COMMENT '关联用户id',
  `money` varchar(255) NOT NULL COMMENT '用户金钱',
  `name` varchar(255) NOT NULL COMMENT '用户姓名',
  `bank_name` varchar(255) NOT NULL COMMENT '银行名字',
  `bank_num` varchar(255) NOT NULL COMMENT '银行卡号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户账号';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_user_money`
--

LOCK TABLES `img_user_money` WRITE;
/*!40000 ALTER TABLE `img_user_money` DISABLE KEYS */;
INSERT INTO `img_user_money` VALUES (1,'1','50000','沈','','123456789789456'),(2,'2','3000','大神','','123456789746'),(3,'1','50000','沈','','123456789789456'),(4,'2','3000','大神','','123456789746'),(5,'1','50000','沈','','123456789789456'),(6,'2','3000','大神','','123456789746');
/*!40000 ALTER TABLE `img_user_money` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-07  9:47:33
