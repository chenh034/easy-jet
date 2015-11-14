/*
SQLyog v10.2 
MySQL - 5.6.17 : Database - blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `blog`;

/*Table structure for table `com_active` */

DROP TABLE IF EXISTS `com_active`;

CREATE TABLE `com_active` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(155) NOT NULL DEFAULT '' COMMENT '标题',
  `time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `content` text COMMENT '动态内容',
  `info` varchar(155) NOT NULL DEFAULT '' COMMENT '摘要',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `com_active` */

insert  into `com_active`(`aid`,`title`,`time`,`thumb`,`content`,`info`) values (1,'动态1',1443954386,'img_1443954386.jpg','<p>撒的发撒的发</p><p><br/></p><p><br/></p><p><br/></p><p>防守打法</p><p><br/></p><p>&nbsp;水电费</p><p><br/></p><p>反倒是</p><p>故事发生dfsdgsd好的就看上的</p><p><br/></p><p>水电费是的 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 快乐圣诞节福利时肯定会回事了肯定接发士大夫</p><p>阿斯蒂芬觉得是开了房间klsdjfhkjaHKLDFJSAL &nbsp;</p><p>&nbsp;SDF KLSJFD L&nbsp;</p>','是的发生大SD发生的'),(2,'动态2',1443954505,'img_1443954505.jpg','<p>啥的方式的</p><p>的</p><p>的</p><p>&nbsp;d规范通天塔</p><p><br/></p><p>gfgsdfsd &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 实得分十多个士大夫</p><p>发送到发送到 &nbsp;</p><p><img src=\"/easy-jet/jet/assets/admin/org/ueditor/php/upload/20151004/14439545022005.png\" title=\"detail1.png\"/></p>','是的发生的故事的发生的士大夫的十分感动');

/*Table structure for table `com_admin` */

DROP TABLE IF EXISTS `com_admin`;

CREATE TABLE `com_admin` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `com_admin` */

insert  into `com_admin`(`uid`,`username`,`password`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `com_category` */

DROP TABLE IF EXISTS `com_category`;

CREATE TABLE `com_category` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL DEFAULT '' COMMENT '类别名称',
  `thumb` varchar(20) DEFAULT NULL COMMENT '图片路径',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `com_category` */

insert  into `com_category`(`cid`,`cname`,`thumb`) values (1,'DOD大字符喷码机','img_1443955150.png'),(2,'小字符喷码机','img_1443955160.png'),(3,'激光喷码机','img_1443955199.png'),(6,'喷码耗材和色带','img_1443955925.png');

/*Table structure for table `com_depic` */

DROP TABLE IF EXISTS `com_depic`;

CREATE TABLE `com_depic` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `img_src` varchar(50) DEFAULT NULL COMMENT '图片存放位置',
  `pid` int(12) DEFAULT NULL COMMENT '产品id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `com_depic` */

insert  into `com_depic`(`id`,`img_src`,`pid`) values (1,'20151004/14439648613739.png',1),(2,'20151004/14439648723564.png',1),(3,'20151004/14439649299231.png',1),(4,'20151004/14439669965311.jpg',2),(5,'20151004/14439669976068.jpg',2),(6,'20151004/14439669997190.jpg',2),(7,'20151004/14439670006222.jpg',2),(8,'20151004/14439670072952.jpg',2),(9,'20151004/14439671043805.jpg',1),(10,'20151004/14439671135380.jpg',1),(11,'20151004/14439671136901.jpg',1),(12,'20151004/1443967357443.jpg',1),(13,'20151004/14439674395558.jpg',3),(14,'20151004/14439674412823.jpg',3),(15,'20151004/14439674426395.jpg',3),(16,'20151004/14439674433096.jpg',3),(17,'20151004/14439674433946.jpg',3),(18,'20151004/14439675802124.jpg',4),(19,'20151004/14439675825532.jpg',4),(20,'20151004/14439675838154.jpg',4),(21,'20151004/14439675843078.jpg',4),(22,'20151004/14439675864706.jpg',4),(23,'20151004/14439676377680.jpg',5),(24,'20151004/14439676373952.jpg',5),(25,'20151004/14439676372474.jpg',5),(26,'20151004/14439677209345.jpg',6),(27,'20151004/14439677316814.jpg',6),(28,'20151004/14439677317740.jpg',6),(29,'20151004/14439678547938.jpg',8),(30,'20151004/14439678693533.jpg',8),(31,'20151004/144396787084.jpg',8),(32,'20151004/14439678716443.jpg',8),(33,'20151004/14439680315037.jpg',7),(34,'20151004/14439680337883.jpg',7),(35,'20151004/14439680332290.jpg',7),(36,'20151004/14439680332501.jpg',7),(37,'20151004/14439680338522.jpg',7);

/*Table structure for table `com_intro` */

DROP TABLE IF EXISTS `com_intro`;

CREATE TABLE `com_intro` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `introduce` text COMMENT '公司介绍',
  `is_show` tinyint(2) DEFAULT NULL COMMENT '是否显示',
  `addtime` int(20) DEFAULT NULL COMMENT '添加时间',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `com_intro` */

insert  into `com_intro`(`id`,`introduce`,`is_show`,`addtime`,`title`) values (2,'<p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">公司发展历程</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2004年易达亚洲有限公司在香港成立，并致力于为客户提供高性能、高性价比的标识设备产品。同年进入中国市场，并在广州经济技术开发区成立易达（广州）包装设备有限公司，设立中国工厂。2012年12月，易达成为珐玛珈（广州）包装设备有限公司的全资子公司。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2006年第一台EC-JET小字符喷码机在中国交付使用，同年3月首次参加SINO-PACK(国际机械包装展)。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2007年第一台EC-JET微字符喷码机和第一台EC-JET颜料墨小字符喷码机在中国交付使用。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2009年研发生产全球首台双色防伪小字符喷码机，第1000台喷码机在中国交付使用&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2010年成功参加印度尼西亚ALL-PACK展览会。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2010年喷码机年销量突破1000台。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2011年研发生产全球首台可独立工作的双喷头喷码机以及双喷嘴喷码机。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2011年研发生产全球首台可独立工作的双喷头喷码机以及双喷嘴喷码机，同年参加德国INTERPACK展览会，并参与起草《小字符喷码机》国家标准。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2012年研发生产激光机喷码机，并参加德国ACHEMA展览会。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2013年研发生产DOD大字符喷码机。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">2014年投产高解析系列产品。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">公司品牌及产品</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">广州易达包装设备有限公司专注于标识设备的研发和制造。&nbsp;“EC-JET”产品系列包括小字符喷码机、大字符喷码机、激光喷码机、热转移打印机及相关工业打印耗材，广泛应用于医药、食品、化妆品等各行各业。<br/>&nbsp; &nbsp; 易码独特设计的蛤形外观，美观大方；多达四行喷印技术，更能满足客户如：生产日期、批号、有效期等高需求。<br/>&nbsp; &nbsp; 易达的成功源自于坚持不懈的为客户提高生产力，易码相信：易码的产品能够助您展开赢利新局面。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">公司资质和影响</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">作为中国喷码标识行业的领先企业，广州易达包装设备有限公司以第一起草人的身份主导制定《连续式喷码机-执行号：GB/T29017-2012》国家标准。&nbsp;公司是国家认定的高新技术产业，并获得国家首批创新基金奖，拥有多项专利技术和科研成果。成功发明全球首台双色防伪小字符喷码机，开创了喷码机技术的革新性应用。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">质量保证与服务体系</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">易码喷码标识产品通过CE认证，符合FDA、ROSH等要求。我们服务体系完善，积极倡导360度的服务理念，以7/24（7天24小时）为标准向客户提供完整的售前咨询、安装调试、培训指导、电话回访、网络支持、现场服务。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">营销和服务网络&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">易码以广州为核心，依托国内30多个城市为基点构建完善的营销和服务网络；我们积极拓展海外市场，营销服务合作伙伴遍及20多个国家，以此为全球客户提供高品质的综合服务。数以万计的“EC-JET”产品为各行各业广泛应用。我们的客户包括P&amp;G,LG,SAMSUNG,格力，新希望，舒适，北京同仁堂等知名企业。</p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; white-space: normal; padding: 0px; border: 0px; color: rgb(102, 102, 102); font-size: 14px; line-height: 25px; font-family: arial; text-indent: 2em; background-color: rgb(239, 239, 239);\">未来的展望<br/>&nbsp;&nbsp;&nbsp; 易码作为全球标识设备行业的领先企业，积极整合资源，持续拓宽产品系列，加速企业发展，公司将一如既往，秉承“改变源自创新”的经营理念，继续为业界提供高性价比的标识设备，成为标识设备行业的领导者。</p><p><br/></p>',1,1443953647,'介绍1'),(4,'<p>实得分十多个实得分在现场啥的方式的</p><p><br/></p><p><br/></p><p>sdfsd</p><p>f啥的方式的</p><p>十多个史蒂夫</p><p>十多个撒的发撒的发</p><p>sdfsdfsd5</p><p>54156456</p><p>541321</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>515634156</p><p><br/></p><p>5456</p><p><br/></p>',0,1443954000,'介绍三'),(5,'<p>付款方法看妇科妇科</p><p><br/></p><p>事登记方式看到了就分手快乐的副驾驶的离开</p><p>是的复合接口是大富豪</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>1111111111111111111~~~~</p><p>~~~~~~~~~~</p><p>~~~~~~~~~~~</p><p>~~~~~~~~~~~~~~~~~</p>',0,1443969651,'介绍四');

/*Table structure for table `com_product` */

DROP TABLE IF EXISTS `com_product`;

CREATE TABLE `com_product` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '' COMMENT '产品名称',
  `info` varchar(100) DEFAULT '' COMMENT '产品简介',
  `content` text COMMENT '产品详细信息',
  `cid` int(12) DEFAULT NULL COMMENT '所属类别id',
  `thumb` varchar(20) DEFAULT '' COMMENT '标题图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `com_product` */

insert  into `com_product`(`id`,`name`,`info`,`content`,`cid`,`thumb`) values (1,'酷冷至尊','轻轻轻轻去去去去去去去去去去去去去去啥的方式的','<p>我大三的凤飞飞</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>1111</p><p><br/></p><p>2222</p><p><br/></p><p>333</p><p>3354</p><p><br/></p><p>85684</p><p>879</p>',1,'img_1443964895.png'),(2,'凯酷104','凯酷104/87','<p>性价比高。 凱华机械轴。</p><p>手感良好。。<img src=\"http://localhost/easy-jet/jet/assets/admin/org/ueditor/php/upload/20151004/14439670391995.jpg\" title=\"003120464.jpg\"/></p>',1,'img_1443967045.jpg'),(3,'达尔优机械师','达尔优机械师。。 ','<p>机械感强。</p><p><br/></p><p><br/></p><p>。</p><p>。</p><p>。</p><p>。！！！！</p><p>！！！</p><p>！！1111111111111111111</p><p>11</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>123‘</p><p>、</p><p>。、 &nbsp; &nbsp; &nbsp; 似懂非懂</p>',3,'img_1443967489.jpg'),(4,'樱桃G80','樱桃原厂。','<p>德国原厂，。。。。。</p><p>。。。</p><p>。。</p><p>~~~~~~~~~~~~~~</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>~！！~@~！@~！#~！#@#￥！@</p><p>~！#~！@# 的服务而</p>',6,'img_1443967591.jpg'),(5,'flico','大F，。。。','<p>圣手大F。</p><p>flico</p><p>FFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>~~~~~~~~~~~~~~~~</p><p>~~~~~~~~~~~~</p><p>！@@@@@@@@@@@@@@@@@</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>%%%%%%……￥</p><p>的冯、他他他</p>',1,'img_1443967674.jpg'),(6,'雷蛇黑寡妇','黑寡妇 、 2337','<p>是的发生快乐的价格</p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>十分的价格加上@#@#@#@#@#@#@#@#@#@#@#@#￥@#￥</p><p>@#%@#%@#￥@#￥@#</p><p><br/></p><p>胜多负少</p>',2,'img_1443967745.jpg'),(7,'罗技','逻辑逻辑罗  罗技。','<p><br/></p><p><br/></p><p><br/></p><p>34324</p><p>435</p><p>#########</p><p>%%%%%%%%%%%%%</p><p>55555555555</p><p>&amp;&amp;&amp;&amp;&amp;&amp;&amp;&amp;&amp;*……&amp;*</p><p>~！@~！</p><p><br/></p><p><br/></p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 实得分十多个实得分</p>',3,'img_1443967802.jpg'),(8,'魔力鸭2108s','鸭子2sssssss','<p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;噼噼啪啪</p><p>发撒的发撒的发啥的方式的发票是发票收到发票是的发生的频繁is到票</p><p><br/></p><p>&nbsp;s的风格十多个史蒂夫sdfsdg&#39;s安抚</p><p>撒的发撒的发家里是看得见法拉盛看得见fsdf是的干啥d</p>',6,'img_1443967887.jpg');

/*Table structure for table `com_scroll` */

DROP TABLE IF EXISTS `com_scroll`;

CREATE TABLE `com_scroll` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '轮播图链接到的地址',
  `img_src` varchar(255) NOT NULL DEFAULT '' COMMENT '图片存放位置',
  `info` text COMMENT '简介',
  `is_show` int(2) DEFAULT NULL COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `com_scroll` */

insert  into `com_scroll`(`id`,`url`,`img_src`,`info`,`is_show`) values (2,'www.baidu.com','img_1443954060.jpg','www.baidu.com',1),(3,'www.baidu.com','img_1443954082.jpg','www.baidu.comwww.baidu.comwww.baidu.com',1),(4,'www.baidu.com','img_1443969737.jpg','kljlkadsjfsdlkf ',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
