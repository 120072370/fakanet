/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50554
Source Host           : localhost:3306
Source Database       : ceshi

Target Server Type    : MYSQL
Target Server Version : 50554
File Encoding         : 65001

Date: 2018-12-05 10:42:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wqfaka_accessprovider
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_accessprovider`;
CREATE TABLE `wqfaka_accessprovider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `accessID` varchar(50) NOT NULL DEFAULT '',
  `accessKey` varchar(120) NOT NULL DEFAULT '',
  `accessType` varchar(10) NOT NULL DEFAULT '',
  `accessName` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_accessprovider
-- ----------------------------
INSERT INTO `wqfaka_accessprovider` VALUES ('29', '', 'wxd37bbe5fb7e928bf', '源码修改', 'qqcode', '微信公众支付');
INSERT INTO `wqfaka_accessprovider` VALUES ('16', 'zhifubao@126.com', 'ID', 'test', 'alipay', '支付宝接口');
INSERT INTO `wqfaka_accessprovider` VALUES ('17', '', '财付通ID', '财付通密钥', 'tenpay', '财付通');
INSERT INTO `wqfaka_accessprovider` VALUES ('22', '手机支付宝邮箱', '手机支付宝ID', '手机支付宝密钥', 'altwap', '手机支付宝');
INSERT INTO `wqfaka_accessprovider` VALUES ('24', '', '你的ID', '你的密钥', 'yc88', '永纯支付二维码（www.yc88.net）');
INSERT INTO `wqfaka_accessprovider` VALUES ('30', '', 'wxd37bbe5fb7e928bf', '源码修改', 'weixin', '微信支付扫码');
INSERT INTO `wqfaka_accessprovider` VALUES ('31', 'test@126.com', 'qq', 'qq', 'altwap', '支付宝wap');
INSERT INTO `wqfaka_accessprovider` VALUES ('34', 'lh121013', '71143', '84de5e48759f4029876b6f96d79ad9d9', 'mqpay', '免签约即时到帐');
INSERT INTO `wqfaka_accessprovider` VALUES ('33', 'qq@qq.com', 'qq', 'qq', 'qqpay', 'QQ钱包');
INSERT INTO `wqfaka_accessprovider` VALUES ('35', 'xxx', '111', '2222', 'mqwxpay', '免签约即时到帐微信支付');

-- ----------------------------
-- Table structure for wqfaka_adinfo
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_adinfo`;
CREATE TABLE `wqfaka_adinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adname` varchar(100) DEFAULT NULL,
  `adimage` varchar(300) DEFAULT NULL,
  `adtype` int(11) DEFAULT NULL,
  `adstatus` int(11) DEFAULT '0',
  `adsort` int(11) DEFAULT '1',
  `addtime` datetime DEFAULT NULL,
  `adpostion` int(11) DEFAULT NULL,
  `adlink` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_adinfo
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_admin
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_admin`;
CREATE TABLE `wqfaka_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `utype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 administrator 2 users',
  `username` varchar(20) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `is_safe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `userkey` varchar(32) NOT NULL DEFAULT '',
  `is_verifyip` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `verifyip` varchar(200) NOT NULL DEFAULT '',
  `adminlimit` varchar(500) NOT NULL DEFAULT '',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_admin
-- ----------------------------
INSERT INTO `wqfaka_admin` VALUES ('1', '1', 'admin', '0c909a141f1f2c0a1cb602b0b2d7d050', '0', '5d41dc4c58c86142839e0cb78e82c4b2', '0', '', 'users|userinfo|tg_users|userlogs|orders|ordersforuser|ordersforchannel|ordersforhour|usermoney|payments|accessprovider|channels|newsclass|news|adminpwd|adminlist|message|set|index|report|goods|tg_goods|tg_orders', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for wqfaka_adminlogs
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_adminlogs`;
CREATE TABLE `wqfaka_adminlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `logip` varchar(15) NOT NULL DEFAULT '',
  `logtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_adminlogs
-- ----------------------------
INSERT INTO `wqfaka_adminlogs` VALUES ('189', '1', '', '2018-07-15 16:15:11');
INSERT INTO `wqfaka_adminlogs` VALUES ('190', '1', '', '2018-08-30 21:11:50');
INSERT INTO `wqfaka_adminlogs` VALUES ('191', '1', '', '2018-09-01 11:47:09');
INSERT INTO `wqfaka_adminlogs` VALUES ('192', '1', '', '2018-09-02 22:34:11');
INSERT INTO `wqfaka_adminlogs` VALUES ('193', '1', '', '2018-09-03 07:53:51');
INSERT INTO `wqfaka_adminlogs` VALUES ('194', '1', '', '2018-09-04 10:41:59');
INSERT INTO `wqfaka_adminlogs` VALUES ('195', '1', '', '2018-09-26 13:57:14');

-- ----------------------------
-- Table structure for wqfaka_auths
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_auths`;
CREATE TABLE `wqfaka_auths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(225) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wqfaka_auths
-- ----------------------------
INSERT INTO `wqfaka_auths` VALUES ('1', '/uploads/images/auth/yongchun188-20170215113712.png', '-1', '5', '身份证扫描件', null);
INSERT INTO `wqfaka_auths` VALUES ('2', '/uploads/images/auth/yongchun188-20170215113727.png', '-1', '5', '协议扫描件(一)', null);
INSERT INTO `wqfaka_auths` VALUES ('3', '/uploads/images/auth/yongchun188-20170215113735.png', '-1', '5', '协议扫描件(二)', null);
INSERT INTO `wqfaka_auths` VALUES ('4', '/uploads/images/auth/yongchun188-20170215113740.png', '-1', '5', '协议扫描件(三)', null);
INSERT INTO `wqfaka_auths` VALUES ('5', '/uploads/images/auth/yongchun188-20170215113744.png', '-1', '5', '协议扫描件(四)', null);

-- ----------------------------
-- Table structure for wqfaka_buylist
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_buylist`;
CREATE TABLE `wqfaka_buylist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` varchar(20) NOT NULL,
  `goodid` int(10) unsigned NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `memberid` int(10) NOT NULL DEFAULT '0',
  `price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `cbprice` decimal(7,2) NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `is_receive` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 no 1 yes',
  `contact` varchar(30) NOT NULL DEFAULT '',
  `channelid` int(10) unsigned NOT NULL,
  `addtime` datetime DEFAULT NULL,
  `is_email` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 open 1 close',
  `is_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未付 1成功 2部分',
  `returnmsg` varchar(100) NOT NULL DEFAULT '',
  `couponcode` varchar(16) NOT NULL DEFAULT '',
  `fromip` varchar(20) NOT NULL DEFAULT '',
  `is_coupon_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_discount_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `coupon` decimal(7,2) NOT NULL DEFAULT '0.00',
  `is_ship` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_api` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_api_return` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `api_return_msg` varchar(50) NOT NULL DEFAULT '',
  `api_username` varchar(100) NOT NULL DEFAULT '',
  `pwdforsearch` varchar(20) NOT NULL DEFAULT '',
  `updatetime` datetime DEFAULT NULL,
  `from` int(11) NOT NULL,
  `fromid` int(11) DEFAULT '0',
  `tghyfc` decimal(10,2) unsigned DEFAULT NULL COMMENT '推广会员分成',
  `ptfc` decimal(10,2) unsigned zerofill DEFAULT NULL COMMENT '平台分成',
  PRIMARY KEY (`id`),
  KEY `orderid` (`orderid`),
  KEY `goodid` (`goodid`),
  KEY `userid` (`userid`),
  KEY `is_receive` (`is_receive`),
  KEY `contact` (`contact`),
  KEY `channelid` (`channelid`),
  KEY `is_state` (`is_state`),
  KEY `is_status` (`is_status`),
  KEY `fromip` (`fromip`),
  KEY `memberid` (`memberid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=156277 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_buylist
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_channellist
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_channellist`;
CREATE TABLE `wqfaka_channellist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channelname` varchar(50) NOT NULL DEFAULT '',
  `accessType` varchar(10) NOT NULL DEFAULT '',
  `gateway` varchar(10) NOT NULL DEFAULT '',
  `price` decimal(6,4) NOT NULL DEFAULT '0.0000',
  `platformPrice` decimal(6,4) NOT NULL DEFAULT '0.0000',
  `sortid` int(10) unsigned NOT NULL DEFAULT '0',
  `payid` int(10) unsigned NOT NULL,
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_channellist
-- ----------------------------
INSERT INTO `wqfaka_channellist` VALUES ('19', '支付宝', 'alipay', 'alipay', '0.9700', '0.0300', '1', '25', '1', 'kuaijie');
INSERT INTO `wqfaka_channellist` VALUES ('34', '微信扫码支付', 'weixin', 'WEIXIN', '0.9700', '0.0300', '1', '27', '1', '');
INSERT INTO `wqfaka_channellist` VALUES ('35', '支付宝wap', 'altwap', 'ALIWAP', '0.9700', '0.0300', '1', '28', '1', '');
INSERT INTO `wqfaka_channellist` VALUES ('38', 'QQ钱包', 'qqpay', 'QQCODE', '0.9700', '0.0300', '2', '30', '1', '');
INSERT INTO `wqfaka_channellist` VALUES ('33', '微信支付', 'qqcode', 'WXAPP', '0.9700', '0.0300', '1', '29', '1', '');
INSERT INTO `wqfaka_channellist` VALUES ('39', '免签支付宝支付', 'mqpay', 'MQPAY', '0.9700', '0.0300', '1', '201', '0', '');
INSERT INTO `wqfaka_channellist` VALUES ('40', '免签微信支付', 'mqwxpay', 'MQWXPAY', '0.9700', '0.0300', '1', '202', '0', '');

-- ----------------------------
-- Table structure for wqfaka_complaints
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_complaints`;
CREATE TABLE `wqfaka_complaints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `memberid` int(11) NOT NULL DEFAULT '0',
  `orderid` varchar(16) NOT NULL,
  `reason` varchar(50) NOT NULL DEFAULT '',
  `contact` varchar(50) NOT NULL DEFAULT '',
  `remark` text,
  `result` text,
  `url` varchar(100) NOT NULL DEFAULT '',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `ip` varchar(20) NOT NULL DEFAULT '',
  `goodsorderid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`memberid`)
) ENGINE=MyISAM AUTO_INCREMENT=1099 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_complaints
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_config
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_config`;
CREATE TABLE `wqfaka_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(90) NOT NULL DEFAULT '',
  `siteurl` varchar(50) NOT NULL DEFAULT '',
  `keyword` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `template` varchar(100) NOT NULL DEFAULT '',
  `qq` varchar(12) NOT NULL DEFAULT '',
  `tel` varchar(12) NOT NULL DEFAULT '',
  `reguser` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `regmember` tinyint(1) NOT NULL DEFAULT '0',
  `userstate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `copyright` varchar(100) NOT NULL DEFAULT '',
  `tongji` varchar(100) NOT NULL DEFAULT '',
  `smtp` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `authkey` varchar(50) NOT NULL DEFAULT '',
  `sitetitle` varchar(90) NOT NULL DEFAULT '',
  `theme` varchar(20) NOT NULL DEFAULT '',
  `themeforbuy` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `servicemail` varchar(50) NOT NULL DEFAULT '',
  `icp` varchar(20) NOT NULL DEFAULT '',
  `takecash` decimal(7,2) NOT NULL DEFAULT '100.00',
  `sitestate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `msgtip` varchar(400) NOT NULL DEFAULT '',
  `takecash_f` smallint(5) unsigned NOT NULL DEFAULT '0',
  `takecash_t` smallint(5) unsigned NOT NULL DEFAULT '0',
  `takecash_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `takecash_msgtip` varchar(100) NOT NULL DEFAULT '',
  `go_page_theme` varchar(20) NOT NULL DEFAULT '',
  `buy_page_popup` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `filter_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `filter_dangerwords` text,
  `filter_safewords` text,
  `takecash_times` smallint(5) unsigned NOT NULL DEFAULT '2',
  `takecash_times_msg` varchar(400) NOT NULL DEFAULT '',
  `cache_syn_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `cache_syn_ip` varchar(400) NOT NULL DEFAULT '',
  `fee` decimal(9,2) NOT NULL DEFAULT '0.00',
  `fee_top` decimal(9,2) NOT NULL DEFAULT '0.00',
  `search_tips` varchar(500) NOT NULL DEFAULT '',
  `shouxufeilv` tinyint(4) NOT NULL DEFAULT '0' COMMENT '手续费率',
  `freemin` int(11) NOT NULL DEFAULT '0' COMMENT '满多少免手续费',
  `xianlu` text NOT NULL COMMENT '多线路域名',
  `weixin` varchar(255) NOT NULL COMMENT '微信二维码',
  `domainnot` text NOT NULL COMMENT '保留二级域名',
  `smsprice` decimal(10,2) NOT NULL COMMENT '短信价格',
  `wx_appid` varchar(255) NOT NULL,
  `wx_mchid` varchar(255) NOT NULL,
  `wx_key` varchar(255) NOT NULL,
  `wx_appsecret` varchar(255) NOT NULL,
  `wx_notice_order` varchar(255) NOT NULL,
  `wx_notice_money` varchar(255) NOT NULL,
  `wx_menu1` varchar(255) NOT NULL,
  `wx_menu11` varchar(500) NOT NULL,
  `wx_menu12` varchar(500) NOT NULL,
  `wx_menu13` varchar(500) NOT NULL,
  `wx_menu14` varchar(500) NOT NULL,
  `wx_menu15` varchar(500) NOT NULL,
  `wx_menu2` varchar(255) NOT NULL,
  `wx_menu21` varchar(500) NOT NULL,
  `wx_menu22` varchar(500) NOT NULL,
  `wx_menu23` varchar(500) NOT NULL,
  `wx_menu24` varchar(500) NOT NULL,
  `wx_menu25` varchar(500) NOT NULL,
  `wx_menu3` varchar(255) NOT NULL,
  `wx_menu31` varchar(500) NOT NULL,
  `wx_menu32` varchar(500) NOT NULL,
  `wx_menu33` varchar(500) NOT NULL,
  `wx_menu34` varchar(500) NOT NULL,
  `wx_menu35` varchar(255) NOT NULL,
  `wx_menu1_url` varchar(255) NOT NULL,
  `wx_menu11_url` varchar(500) NOT NULL,
  `wx_menu12_url` varchar(500) NOT NULL,
  `wx_menu13_url` varchar(500) NOT NULL,
  `wx_menu14_url` varchar(500) NOT NULL,
  `wx_menu15_url` varchar(500) NOT NULL,
  `wx_menu2_url` varchar(255) NOT NULL,
  `wx_menu21_url` varchar(500) NOT NULL,
  `wx_menu22_url` varchar(500) NOT NULL,
  `wx_menu23_url` varchar(500) NOT NULL,
  `wx_menu24_url` varchar(500) NOT NULL,
  `wx_menu25_url` varchar(500) NOT NULL,
  `wx_menu3_url` varchar(255) NOT NULL,
  `wx_menu31_url` varchar(500) NOT NULL,
  `wx_menu32_url` varchar(500) NOT NULL,
  `wx_menu33_url` varchar(500) NOT NULL,
  `wx_menu34_url` varchar(500) NOT NULL,
  `wx_menu35_url` varchar(255) NOT NULL,
  `zhuyuming` text NOT NULL COMMENT '主域名',
  `shoukayuming` text NOT NULL COMMENT '售卡域名',
  `zuidishouxufei` decimal(10,0) NOT NULL COMMENT '最低手续费',
  `minganci` text NOT NULL COMMENT '敏感词',
  `wxpay_host` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=319 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_config
-- ----------------------------
INSERT INTO `wqfaka_config` VALUES ('1', '自动发卡平台', 'localhost', '自动发卡网，自动发卡平台，取卡网，微信结算，微信发卡', '自动发卡平台提供:自动发卡,专业为企业软件和个人软件，游戏软件卡密等提供多途径、安全、方便、简单的自动发卡和结算服务,支持微信提现自动到账，日结算。免手续费。', 'a_weiqi', '', '400-4851-126', '0', '0', '0', '', '', 'smtp.exmail.qq.com', '', 'admin123', '专业为企业软件和个人软件.游戏卡密等提供多途径、安全、方便、API接入业务、自动发卡、卡类寄售、卡类兑换、自动销售卡密', 'skyblue', 'orange', 'QQ:', 'admin', '', '20.00', '0', '平台维护中', '6', '20', '0', '周日不结算，统一周一21点之前全部到帐！', 'default', '0', '1', '色情|赌博|做爱', '*', '1', '当日商户申请提现次数最多为1次！', '0', '', '0.00', '0.00', '如对购买的卡密有任何异议，请立刻联系我们客服处理只处理当天购买的卡密问题！当天购买的卡密必须当天解决！', '7', '50', '', '/upload/7d70b87de6afb8047571749911c03191.php', 'www|vip1|vip2|vip3|vip4|vip5|vip6|vip7|vip8|vip9|888|666|pay|pai|aaa|bbb|123|app', '0.00', '', '', '', '', 'EvzN19psxnGN13mlrGziiglXfENXHBRMpG85LYZWltc', 'Z0q1s1sJHs6CC2W383lZqkhoEgE8F49U0y0RTxhXmio', '商家助手', '商家订单', '商家连接', '换购价值', '商家收益', '通道管理', '商品管理', '添加分类', '添加商品', '商品列表', '库存卡密', '添加卡密', '商户中心', '会员中心', '申请提现', '安全设置', '平台公告', '信息修改', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'localhost:7254', 'localhost:7254', '1', '色情|赌博|做爱', 'localhost:7254');

-- ----------------------------
-- Table structure for wqfaka_emailcode
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_emailcode`;
CREATE TABLE `wqfaka_emailcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `key` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_emailcode
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_goodcate
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_goodcate`;
CREATE TABLE `wqfaka_goodcate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `catename` varchar(100) NOT NULL,
  `sortid` int(10) unsigned NOT NULL DEFAULT '0',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sitename` varchar(50) NOT NULL DEFAULT '',
  `siteurl` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(12) NOT NULL DEFAULT '',
  `is_link_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkid` varchar(16) NOT NULL,
  `theme` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3373 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_goodcate
-- ----------------------------
INSERT INTO `wqfaka_goodcate` VALUES ('3371', '2217', '测试分类2', '100', '0', '', '', '', '0', 'E01294568B01D361', '');

-- ----------------------------
-- Table structure for wqfaka_goodcoupon
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_goodcoupon`;
CREATE TABLE `wqfaka_goodcoupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `cateid` int(10) unsigned NOT NULL DEFAULT '0',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  `valid` int(10) unsigned NOT NULL DEFAULT '1',
  `coupon` int(10) unsigned NOT NULL DEFAULT '0',
  `ctype` int(10) unsigned NOT NULL DEFAULT '1',
  `remark` varchar(100) NOT NULL DEFAULT '',
  `couponcode` varchar(16) NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3997 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_goodcoupon
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_gooddiscount
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_gooddiscount`;
CREATE TABLE `wqfaka_gooddiscount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodid` int(10) unsigned NOT NULL,
  `dis_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `dis_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7833 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_gooddiscount
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_goodlist
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_goodlist`;
CREATE TABLE `wqfaka_goodlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `cateid` int(10) unsigned NOT NULL,
  `goodname` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cbprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sortid` int(10) unsigned NOT NULL DEFAULT '0',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `remark` text NOT NULL,
  `invent_report` int(10) unsigned NOT NULL DEFAULT '0',
  `is_display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_paytype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_invent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_discount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_coupon` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sitename` varchar(50) NOT NULL DEFAULT '',
  `siteurl` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(12) NOT NULL DEFAULT '',
  `is_link_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `linkid` varchar(16) NOT NULL,
  `theme` varchar(20) NOT NULL DEFAULT '',
  `is_send_mail` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_display_remark` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_contact_limit` tinyint(1) unsigned NOT NULL DEFAULT '99',
  `is_api` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `api_return_url` varchar(100) NOT NULL DEFAULT '',
  `is_message` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_email` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_pwdforsearch` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `limit_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `min_quantity` int(11) NOT NULL DEFAULT '1',
  `is_join_main_link` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_send_sms` tinyint(4) NOT NULL COMMENT '是否发送短信',
  `is_tg` tinyint(1) unsigned NOT NULL COMMENT '是否推广',
  `mima` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `ptfc` decimal(10,2) unsigned NOT NULL COMMENT '平台分成',
  `tghyfc` decimal(10,2) unsigned NOT NULL COMMENT '推广会员分成',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `cateid` (`cateid`),
  KEY `is_state` (`is_state`)
) ENGINE=MyISAM AUTO_INCREMENT=4886 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_goodlist
-- ----------------------------
INSERT INTO `wqfaka_goodlist` VALUES ('4881', '2217', '3371', '测试商品——勿下单', '0.01', '0.00', '100', '1', '测试一下吧', '0', '0', '0', '0', '0', '0', '', '', '', '0', 'FInf', '', '0', '1', '99', '0', '', '0', '0', '0', '0', '1', '0', '0', '0', '', '0.00', '0.00');

-- ----------------------------
-- Table structure for wqfaka_goods
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_goods`;
CREATE TABLE `wqfaka_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `goodid` int(10) unsigned NOT NULL,
  `cardnum` varchar(255) NOT NULL DEFAULT '',
  `cardpwd` varchar(255) NOT NULL DEFAULT '',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  `orderid` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `goodid` (`goodid`),
  KEY `is_state` (`is_state`),
  KEY `orderid` (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=956473 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_goods
-- ----------------------------
INSERT INTO `wqfaka_goods` VALUES ('956461', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956462', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956463', '2217', '4881', '123123123123123123123123123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956464', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956465', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956466', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956467', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956468', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956469', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956470', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956471', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');
INSERT INTO `wqfaka_goods` VALUES ('956472', '2217', '4881', '123123123123', '', '0', '2018-08-30 22:39:43', null, '');

-- ----------------------------
-- Table structure for wqfaka_members
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_members`;
CREATE TABLE `wqfaka_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `qq` varchar(12) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_members
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_message
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_message`;
CREATE TABLE `wqfaka_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` int(10) unsigned NOT NULL,
  `to_user` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `is_receiver` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_sender` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7287 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_message
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_message_mem
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_message_mem`;
CREATE TABLE `wqfaka_message_mem` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` int(10) unsigned NOT NULL,
  `to_user` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `is_receiver` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_sender` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_message_mem
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_news
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_news`;
CREATE TABLE `wqfaka_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `is_bold` varchar(10) NOT NULL DEFAULT '',
  `is_color` varchar(10) NOT NULL DEFAULT '',
  `is_popup` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_display_home` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_news
-- ----------------------------
INSERT INTO `wqfaka_news` VALUES ('14', '3', '禁止上架销售的产品', '以下产品禁止上架销售<br />\r\n1、秒赞<br />\r\n2、代挂XX、XX刷人气<br />\r\n3、腾讯业务会员、钻、图标等<br />\r\n4、云盘类<br />\r\n5、教程类<br />\r\n6、影视类账号(爱奇艺、优酷土豆、好莱坞等)<br />\r\n7、淘宝、支付宝类账号<br />\r\n9、盗号软件<br />\r\n10、夺宝类(抽奖、挖矿、一元云购等）<br />\r\n11、手机、短信轰炸软件<br />\r\n12、免流、手机流量<br />\r\n13、唯品会相关产品<br />\r\n14、各类考试资料<br />\r\n15、第3方密码查询网站<br />\r\n16、他人身份证信息<br />\r\n17、套现，自己为自己充值(严查)<br />\r\n未完待续<br />\r\n一经发现，账户封停，资金不结算。<br />', '', '000000', '0', '2017-03-28 15:03:59', '0', '0', '1');
INSERT INTO `wqfaka_news` VALUES ('15', '3', '禁止涉赌、欺诈、钓鱼、赌博、洗钱等接入!', '为保障正规用户的利益,再次警告那些涉赌，涉黄，欺诈，钓鱼，洗钱的用户.<br />\r\n夸大事实服务类商品、虚假商品、虚假卡密寄售都将直接锁定不做解释.<br />\r\n棋牌游戏类，没有文网文批文的一律禁止接入，明知故犯的锁定账号并不结款.<br />\r\n以上行为不仅加重系统售后工作量,更严重的是助长了一些不法分子的增长.<br />\r\n为了长远发展和良性的经营环境,一经发现,永久停止使用,请珍惜您的账号.<br />\r\n请各位用户做好售后，相互理解，大吉大利，严查欺诈钓鱼赌博，请自重<br />', '', '000000', '0', '2017-03-28 15:05:14', '0', '0', '1');
INSERT INTO `wqfaka_news` VALUES ('17', '3', '严禁销售云.盘商品通知单！', '<span style=\"color:#CC33E5;\">近期，平台蜂拥一批销售云盘商品（百度云、360云盘、腾讯微盘等）的商家！</span><br />\r\n<span style=\"color:#CC33E5;\">在此严正声明：平台严禁销售云盘商品，请销售此类商品的商家立即下架！</span><br />\r\n<span style=\"color:#CC33E5;\">以本公告为期（2018-03-28），如有发现再次销售云盘商品的商家将直接冻结帐号、IP，</span><br />\r\n<span style=\"color:#CC33E5;\">终身不可入驻本平台，请知悉！</span><br />\r\n<div>\r\n	<br />\r\n</div>', '', '000000', '0', '2017-03-28 15:05:57', '0', '0', '1');
INSERT INTO `wqfaka_news` VALUES ('18', '1', '禁止上架销售的产品', '<p>\r\n	<strong><span style=\"color:#E53333;\">以下产品禁止上架销售</span></strong> \r\n</p>\r\n1、秒赞<br />\r\n2、代挂XX、XX刷人气<br />\r\n3、腾讯业务会员、钻、图标等<br />\r\n4、云盘类<br />\r\n5、教程类<br />\r\n6、影视类账号(爱奇艺、优酷土豆、好莱坞等)<br />\r\n7、淘宝、支付宝类账号<br />\r\n9、盗号软件<br />\r\n10、夺宝类(抽奖、挖矿、一元云购等）<br />\r\n11、手机、短信轰炸软件<br />\r\n12、免流、手机流量<br />\r\n13、唯品会相关产品<br />\r\n14、各类考试资料<br />\r\n15、第3方密码查询网站<br />\r\n16、他人身份证信息<br />\r\n17、套现，自己为自己充值(严查)<br />\r\n未完待续<br />\r\n一经发现，账户封停，资金不结算。<br />', 'bold', 'ff0000', '1', '2017-03-28 15:09:18', '0', '0', '1');

-- ----------------------------
-- Table structure for wqfaka_newsclass
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_newsclass`;
CREATE TABLE `wqfaka_newsclass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_newsclass
-- ----------------------------
INSERT INTO `wqfaka_newsclass` VALUES ('1', '平台公告');
INSERT INTO `wqfaka_newsclass` VALUES ('8', '其他分类');
INSERT INTO `wqfaka_newsclass` VALUES ('3', '行业新闻');
INSERT INTO `wqfaka_newsclass` VALUES ('4', '通知公告');
INSERT INTO `wqfaka_newsclass` VALUES ('5', '商户小提示');
INSERT INTO `wqfaka_newsclass` VALUES ('9', '首页公告');
INSERT INTO `wqfaka_newsclass` VALUES ('10', '公告');

-- ----------------------------
-- Table structure for wqfaka_orderlist
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_orderlist`;
CREATE TABLE `wqfaka_orderlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` varchar(50) NOT NULL DEFAULT '',
  `payorderid` varchar(50) NOT NULL DEFAULT '',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `realmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `price` decimal(10,4) unsigned NOT NULL DEFAULT '1.0000',
  `platformPrice` decimal(10,4) unsigned NOT NULL DEFAULT '1.0000',
  `rates` varchar(50) NOT NULL DEFAULT '',
  `cardnum` varchar(200) NOT NULL DEFAULT '',
  `cardpwd` varchar(200) NOT NULL DEFAULT '',
  `channelid` int(10) unsigned NOT NULL DEFAULT '0',
  `addtime` varchar(100) NOT NULL DEFAULT '',
  `returnmsg` varchar(100) NOT NULL DEFAULT '',
  `is_api` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_pay` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `orderid` (`orderid`),
  KEY `payorderid` (`payorderid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_orderlist
-- ----------------------------
INSERT INTO `wqfaka_orderlist` VALUES ('1', '3DF73ED54FB90C9A', '20180830224402494612', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-30 22:44:02', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('2', '7E29EBE802CBA784', '20180830224627996966', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-30 22:46:27', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('3', 'A572E14B5A075188', '20180830224821822978', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-30 22:48:21', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('4', 'E857469CE363A46F', '20180830232410221065', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-30 23:24:10', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('5', 'FCDCA9187291040F', '20180831001639952893', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '33', '2018-08-31 00:16:39', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('6', 'FF83CED30854ACC0', '20180831002522850338', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '33', '2018-08-31 00:25:22', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('7', '580C49F8EAD6B019', '20180831002827854799', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 00:28:27', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('8', '2504439A1BC2D706', '20180831003104496951', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 00:31:04', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('9', 'C4D9BE7383CBFE1C', '20180831103503209815', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 10:35:03', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('10', 'D2D9D0B7629541B0', '20180831103819471335', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 10:38:19', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('11', 'B5E76C7680C88270', '20180831103908419390', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 10:39:08', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('12', 'B125A0286DD83376', '20180831104037595330', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 10:40:37', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('13', 'E9986FD790091145', '20180831104043224088', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 10:40:43', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('14', '9B2A44ED85492026', '20180831104241634951', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 10:42:41', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('15', '007D90852E85F6CC', '20180831104411461451', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 10:44:11', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('16', '2D2FB7BE4B4515DF', '20180831223205585985', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 22:32:05', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('17', '21FC1836324FE79D', '20180831223454889550', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 22:34:54', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('18', 'C738478F920866A1', '20180831223723281045', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 22:37:23', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('19', '8DED80FE8EDE7FEC', '20180831224001237227', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 22:40:01', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('20', '7564BF2DD2BE2A7E', '20180831225613192993', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-08-31 22:56:13', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('21', '3DDE8F33A73064C2', '20180901150823559026', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-01 15:08:23', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('22', '0377C15429D1C49E', '20180901151058911274', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-01 15:10:58', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('23', '4256771CD1925A00', '20180901151203690775', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-01 15:12:03', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('24', 'AEDFB302C6B4AC36', '20180901151218364321', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-01 15:12:18', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('25', '60738ED79E6726F8', '20180901151226260164', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-01 15:12:26', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('26', '561AADC5B13DEE8E', '20180901151444877106', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-01 15:14:44', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('27', 'F1AC3CE3A7AA5332', '20180901151456447574', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-01 15:14:56', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('28', '5D62209D8AA5C1BE', '20180902004327909353', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-02 00:43:27', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('29', '778794D35AF026F8', '20180902004449144466', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-02 00:44:49', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('30', '7366295DEC8BBB7F', '20180902004453738473', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-02 00:44:53', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('31', '68336C1EFBEC5135', '20180903011755166020', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 01:17:55', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('32', '679921CF48617850', '20180903011825211551', '0.50', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 01:18:25', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('33', 'C9DEEF5B5CAA4CCF', '20180903011842115624', '0.50', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-03 01:18:42', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('34', 'E44BFE4988072E38', '20180903011858563339', '1.00', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-03 01:18:58', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('35', '3612E83A4AA3D8DF', '20180903012350268245', '0.60', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 01:23:50', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('36', '92E04C3178E04C78', '20180903012355327010', '0.60', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-03 01:23:55', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('37', 'DF99E0F2EBBF6291', '20180903012422589653', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 01:24:22', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('38', '61FD5745CFE51552', '20180903012432112009', '0.50', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 01:24:32', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('39', 'B1A69403A32BAB91', '20180903012503147626', '0.60', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 01:25:03', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('40', '607D85627A6C01F6', '20180903012745631025', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-03 01:27:45', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('41', '8D6CC869F71C662D', '20180903075832266241', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '38', '2018-09-03 07:58:32', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('42', '0A23436AE446CD10', '20180903082702764570', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 08:27:02', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('43', 'EF433ED8D424237F', '20180903084826456007', '0.40', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 08:48:26', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('44', '10A0CE8B3AD9B4D5', '20180903084949308593', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 08:49:49', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('45', 'B0D1BA4BA26117BD', '20180903084956657471', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-03 08:49:56', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('46', '604FC97E3292AE6C', '20180903085025598178', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-03 08:50:25', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('47', '6C226DC21A504FE9', '20180903100556605569', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 10:05:56', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('48', 'BF97BE824FD6722A', '20180903100749391387', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 10:07:49', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('49', '995EB044DC9450AC', '20180903101710357594', '0.30', '0.00', '1.0000', '1.0000', '100', '', '', '34', '2018-09-03 10:17:10', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('50', 'EF635C25F4641C77', '20180904104259326669', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '19', '2018-09-04 10:42:59', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('51', 'AAF71023B02981FE', '20180904105101258856', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 10:51:01', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('52', '4FF235C8378CAEB6', '20180904213952486264', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:39:52', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('53', 'FA80BBED855DDC77', '20180904214051792383', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:40:51', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('54', 'EA3C08EB2713835A', '20180904214119777635', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:41:19', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('55', 'F6445CEC7DF12E13', '20180904214329925141', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:43:29', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('56', '7F6C8CD969BBBBC1', '20180904214457504736', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:44:57', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('57', 'EBE6A012477B6733', '20180904214532982487', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:45:32', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('58', '080553F40CF30617', '20180904214635289739', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:46:35', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('59', '66A780739108A6AE', '20180904214801981142', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:48:01', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('60', '2F99D6D98D1F3402', '20180904214847289545', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:48:47', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('61', 'E3931F2182608077', '20180904215106323623', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:51:06', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('62', '642B9FDF248E9DF8', '20180904215533669611', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:55:33', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('63', 'C603D713FCB45A0D', '20180904215831203903', '0.10', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 21:58:31', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('64', '5E909D8CAC1CDA0A', '20180904220508875049', '0.01', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 22:05:08', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('65', '1C9864DA64939533', '20180904224449521433', '0.02', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 22:44:49', '', '0', '0', '0', '0');
INSERT INTO `wqfaka_orderlist` VALUES ('66', '115120D17EB3AEB3', '20180904230204737914', '0.01', '0.00', '1.0000', '1.0000', '100', '', '', '39', '2018-09-04 23:02:04', '', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for wqfaka_pay
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_pay`;
CREATE TABLE `wqfaka_pay` (
  `payid` int(10) unsigned NOT NULL,
  `payname` varchar(30) NOT NULL DEFAULT '',
  `paytype` varchar(10) NOT NULL DEFAULT '',
  `payprice` varchar(100) NOT NULL DEFAULT '',
  `paylength` varchar(20) NOT NULL DEFAULT '',
  `imgurl` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_pay
-- ----------------------------
INSERT INTO `wqfaka_pay` VALUES ('1', '盛大充值卡', 'shengda', '5|10|15|20|25|30|35|45|50|100|200|300|350|1000', '0|0', 'SNDACARD.jpg');
INSERT INTO `wqfaka_pay` VALUES ('2', 'QQ充值卡', 'qqb', '5|10|15|30|60|100', '9|12', 'QQ.jpg');
INSERT INTO `wqfaka_pay` VALUES ('3', '神州行充值卡', 'szx', '10|15|20|30|50|100|300|500', '0|0', 'SZX.jpg');
INSERT INTO `wqfaka_pay` VALUES ('4', '征途充值卡', 'zhengtu', '10|15|20|25|30|50|60|100|300|468', '16|8', 'ZHENGTU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('5', '搜狐充值卡', 'sohu', '5|10|15|30|40|100', '20|12', 'SOHU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('6', '久游一卡通', 'jiuyou', '5|10|15|20|25|30|50|100', '13|10', 'JIUYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('7', '骏网一卡通', 'junwang', '5|6|10|15|30|50|100', '0|0', 'JUNNET.jpg');
INSERT INTO `wqfaka_pay` VALUES ('8', '联通充值卡', 'liantong', '20|30|50|100|300|500', '15|19', 'UNICOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('9', '完美一卡通', 'wanmei', '15|30|50|100', '10|15', 'WANMEI.jpg');
INSERT INTO `wqfaka_pay` VALUES ('10', '网易一卡通', 'wangyi', '5|10|15|20|30|50', '13|9', 'NETEASE.jpg');
INSERT INTO `wqfaka_pay` VALUES ('11', '电信充值卡', 'dianxin', '50|100|200', '19|18', 'TELECOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('12', '神州行充值地方卡', 'szx2', '10|15|20|30|50|100|300|500', '0|0', 'SZX.jpg');
INSERT INTO `wqfaka_pay` VALUES ('13', '易宝一卡通', 'yeebao', '2|5|10|15|20|25|30', '0|0', 'YEEBAO.jpg');
INSERT INTO `wqfaka_pay` VALUES ('14', '纵游一卡通', 'zongyou', '10|15|30|50|100', '15|15', 'ZONGYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('15', '天下一卡通', 'tianxia', '5|6|10|15|30|50|100', '15|8', 'TIANXIA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('16', '天宏一卡通', 'tianhong', '10|15|30|50|100', '0|0', 'TIANHONG.jpg');
INSERT INTO `wqfaka_pay` VALUES ('17', '光宇一卡通', 'guangyu', '15|30|50|100', '0|0', 'GUANGYU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('18', '热血充值卡', 'rexue', '5|10|35|100|350|1000', '0|0', 'REXUE.jpg');
INSERT INTO `wqfaka_pay` VALUES ('19', '5173充值卡', '5173', '30|60|120|360', '0|0', '5173.jpg');
INSERT INTO `wqfaka_pay` VALUES ('20', '魔兽充值卡', 'moshou', '10|15|20|30|50|100|300|500', '0|0', 'MOSHOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('21', '联华ok卡', 'lianhua', '15|30|50|100', '0|0', 'LIANHUA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('22', '金山一卡通', 'jinshan', '15|30|50|100', '0|0', 'JINSHAN.jpg');
INSERT INTO `wqfaka_pay` VALUES ('23', '51支付卡', 'zfk', '10|30|50|100|200|210', '0|0', 'ebao.jpg');
INSERT INTO `wqfaka_pay` VALUES ('24', '网上银行充值', 'bank', '0', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('25', '支付宝', 'alipay', '0', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('26', '财付通', 'tenpay', '0', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('30', 'QQ钱包', 'QQCODE', '', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('31', '天下一卡通专项', 'txzx', '10|20|30|40|50|60|70|80|90|100', '0|0', 'TIANXIA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('32', '天宏一卡通', 'th', '5|10|15|30|50|100', '0|0', 'TIANHONG.jpg');
INSERT INTO `wqfaka_pay` VALUES ('33', '天下一卡通通用', 'tx', '10|20|30|40|50|60|70|80|90|100', '0|0', 'TIANXIA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('34', '光宇一卡通', 'gy', '5|10|20|30|50|100', '0|0', 'GUANGYU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('35', '中国电信充值付费卡', 'dx', '10|20|30|50|100|200|300|500', '0|0', 'TELECOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('36', '神州行(地方)充值卡', 'cd', '10|20|30|50|100|300', '0|0', 'SZX.jpg');
INSERT INTO `wqfaka_pay` VALUES ('37', 'QQ卡', 'qq', '5|10|15|20|30|60|100|200', '0|0', 'QQ.jpg');
INSERT INTO `wqfaka_pay` VALUES ('38', '完美一卡通', 'wm', '15|30|50|100', '0|0', 'WANMEI.jpg');
INSERT INTO `wqfaka_pay` VALUES ('39', '久游一卡通', 'jy', '5|10|15|20|25|30|50|100', '0|0', 'JIUYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('40', '征途一卡通', 'zt', '5|10|15|20|25|30|60|100|500|1000', '0|0', 'ZHENGTU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('41', '盛大一卡通', 'sd', '1|2|3|4|5|9|10|15|25|30|35|45|50|100|350|1000', '0|0', 'SNDACARD.jpg');
INSERT INTO `wqfaka_pay` VALUES ('42', '网易一卡通', 'wy', '10|15|20|30|50', '0|0', 'NETEASE.jpg');
INSERT INTO `wqfaka_pay` VALUES ('43', '搜狐一卡通', 'sh', '5|15|30|40|100', '0|0', 'SOHU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('44', '骏网一卡通', 'jw', '4|5|6|10|15|20|30|50|100|200|500|1000', '0|0', 'JUNNET.jpg');
INSERT INTO `wqfaka_pay` VALUES ('45', '联通全国充值卡', 'cc', '20|30|50|100|300|500', '0|0', 'UNICOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('46', '神州行全国卡', 'cm', '10|20|30|50|100|200|300|500', '0|0', 'SZX.jpg');
INSERT INTO `wqfaka_pay` VALUES ('101', '骏网一卡通', 'jw', '5|6|10|15|30|50|100', '0|0', 'JUNNET.jpg');
INSERT INTO `wqfaka_pay` VALUES ('102', '盛大充值卡', 'sd', '5|10|15|20|25|30|35|45|50|100|200|300|350|1000', '0|0', 'SNDACARD.jpg');
INSERT INTO `wqfaka_pay` VALUES ('103', '神州行充值卡', 'szx', '10|15|20|30|50|100|300|500', '0|0', 'SZX.jpg');
INSERT INTO `wqfaka_pay` VALUES ('104', '征途充值卡', 'zt', '10|15|20|25|30|50|60|100|300|468', '16|8', 'ZHENGTU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('105', 'QQ充值卡', 'qq', '5|10|15|30|60|100', '9|12', 'QQ.jpg');
INSERT INTO `wqfaka_pay` VALUES ('106', '联通充值卡', 'UNICOM', '20|30|50|100|300|500', '0|0', 'UNICOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('107', '久游一卡通', 'jy', '5|10|15|20|25|30|50|100', '13|10', 'JIUYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('108', '易宝一卡通', 'yb', '2|5|10|15|20|25|30', '0|0', 'YEEBAO.jpg');
INSERT INTO `wqfaka_pay` VALUES ('109', '网易一卡通', 'wy', '5|10|15|20|30|50', '13|9', 'NETEASE.jpg');
INSERT INTO `wqfaka_pay` VALUES ('110', '完美一卡通', 'wm', '15|30|50|100', '10|15', 'WANMEI.jpg');
INSERT INTO `wqfaka_pay` VALUES ('111', '搜狐充值卡', 'sh', '5|10|15|30|40|100', '20|12', 'SOHU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('112', '电信充值卡', 'TELECOM', '50|100|200', '19|18', 'TELECOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('113', '纵游一卡通', 'zy', '10|15|30|50|100', '15|15', 'ZONGYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('114', '天下一卡通', 'tx', '5|6|10|15|30|50|100', '15|8', 'TIANXIA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('115', '天宏一卡通', 'th', '10|15|30|50|100', '0|0', 'TIANHONG.jpg');
INSERT INTO `wqfaka_pay` VALUES ('116', '网上银行', 'bank', '10|15|30|50|100', '0|0', 'ZONGYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('117', '支付通', 'alipay', '5|6|10|15|30|50|100', '15|8', 'TIANXIA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('118', '财付通', 'tenpay', '10|15|30|50|100', '0|0', 'TIANHONG.jpg');
INSERT INTO `wqfaka_pay` VALUES ('121', '骏网一卡通', 'JUNNET', '5|6|10|15|30|50|100', '0|0', 'JUNNET.jpg');
INSERT INTO `wqfaka_pay` VALUES ('122', '盛大充值卡', 'SNDACARD', '5|10|15|20|25|30|35|45|50|100|200|300|350|1000', '0|0', 'SNDACARD.jpg');
INSERT INTO `wqfaka_pay` VALUES ('123', '神州行充值卡', 'szx', '10|15|20|30|50|100|300|500', '0|0', 'SZX.jpg');
INSERT INTO `wqfaka_pay` VALUES ('124', '征途充值卡', 'ZHENGTU', '10|15|20|25|30|50|60|100|300|468', '16|8', 'ZHENGTU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('125', 'QQ充值卡', 'QQCARD', '5|10|15|30|60|100', '9|12', 'QQ.jpg');
INSERT INTO `wqfaka_pay` VALUES ('126', '联通充值卡', 'UNICOM', '20|30|50|100|300|500', '0|0', 'UNICOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('127', '久游一卡通', 'JIUYOU', '5|10|15|20|25|30|50|100', '13|10', 'JIUYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('128', '易宝一卡通', 'yb', '2|5|10|15|20|25|30', '0|0', 'YEEBAO.jpg');
INSERT INTO `wqfaka_pay` VALUES ('129', '网易一卡通', 'NETEASE', '5|10|15|20|30|50', '13|9', 'NETEASE.jpg');
INSERT INTO `wqfaka_pay` VALUES ('130', '完美一卡通', 'WANMEI', '15|30|50|100', '10|15', 'WANMEI.jpg');
INSERT INTO `wqfaka_pay` VALUES ('131', '搜狐充值卡', 'SOHU', '5|10|15|30|40|100', '20|12', 'SOHU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('132', '电信充值卡', 'TELECOM', '50|100|200', '19|18', 'TELECOM.jpg');
INSERT INTO `wqfaka_pay` VALUES ('133', '纵游一卡通', 'ZONGYOU', '10|15|30|50|100', '15|15', 'ZONGYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('134', '天下一卡通', 'TIANXIA', '5|6|10|15|30|50|100', '15|8', 'TIANXIA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('135', '天宏一卡通', 'TIANHONG', '10|15|30|50|100', '0|0', 'TIANHONG.jpg');
INSERT INTO `wqfaka_pay` VALUES ('136', '光宇一卡通', 'GUANGYU', '10', '0|0', 'TIANHONG.jpg');
INSERT INTO `wqfaka_pay` VALUES ('137', '网上银行', 'bank', '10|15|30|50|100', '0|0', 'ZONGYOU.jpg');
INSERT INTO `wqfaka_pay` VALUES ('138', '支付通', 'alipay', '5|6|10|15|30|50|100', '15|8', 'TIANXIA.jpg');
INSERT INTO `wqfaka_pay` VALUES ('139', '财付通', 'tenpay', '10|15|30|50|100', '0|0', 'TIANHONG.jpg');
INSERT INTO `wqfaka_pay` VALUES ('27', '微信扫码', 'weixin', '', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('28', '手机支付宝', 'ALIWAP', '', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('29', '微信公众支付', 'WXAPP', '', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('30', 'QQ钱包', 'qqpay', '', '0|0', 'QQCODE.gif');
INSERT INTO `wqfaka_pay` VALUES ('201', '免签支付宝支付', 'MQPAY', '', '0|0', '');
INSERT INTO `wqfaka_pay` VALUES ('202', '免签微信支付', 'MQWXPAY', '', '0|0', '');

-- ----------------------------
-- Table structure for wqfaka_paylist
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_paylist`;
CREATE TABLE `wqfaka_paylist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payid` int(10) unsigned NOT NULL,
  `gateway` varchar(10) NOT NULL DEFAULT '',
  `accessType` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `payid` (`payid`),
  KEY `accessType` (`accessType`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_paylist
-- ----------------------------
INSERT INTO `wqfaka_paylist` VALUES ('1', '1', 'SNDACARD', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('2', '2', 'QQCARD', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('3', '3', 'SZX', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('4', '4', 'ZHENGTU', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('5', '5', 'SOHU', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('6', '6', 'JIUYOU', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('7', '7', 'JUNNET', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('8', '8', 'UNICOM', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('9', '9', 'WANMEI', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('10', '10', 'NETEASE', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('11', '11', 'TELECOM', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('12', '13', 'YPCARD', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('13', '14', 'ZONGYOU', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('14', '15', 'TIANXIA', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('15', '16', 'TIANHONG', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('16', '24', 'BANK', 'ebao');
INSERT INTO `wqfaka_paylist` VALUES ('17', '25', 'alipay', 'alipay');
INSERT INTO `wqfaka_paylist` VALUES ('18', '26', 'tenpay', 'tenpay');
INSERT INTO `wqfaka_paylist` VALUES ('51', '31', 'txzx', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('52', '32', 'th', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('53', '33', 'tx', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('54', '34', 'gy', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('55', '35', 'dx', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('56', '36', 'cd', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('57', '37', 'qq', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('58', '38', 'wm', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('59', '39', 'jy', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('60', '40', 'zt', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('61', '41', 'sd', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('62', '42', 'wy', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('63', '43', 'sh', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('64', '44', 'jw', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('65', '45', 'cc', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('66', '46', 'cm', '70ka');
INSERT INTO `wqfaka_paylist` VALUES ('103', '24', 'BANK', 'huichao');
INSERT INTO `wqfaka_paylist` VALUES ('104', '25', 'alipay', 'shuang');
INSERT INTO `wqfaka_paylist` VALUES ('111', '121', 'JUNNET', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('112', '122', 'SNDACARD', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('113', '123', 'szx', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('114', '124', 'ZHENGTU', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('115', '125', 'QQCARD', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('116', '126', 'UNICOM', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('117', '127', 'JIUYOU', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('118', '128', 'yb', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('119', '129', 'NETEASE', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('120', '130', 'WANMEI', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('121', '131', 'SOHU', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('122', '132', 'TELECOM', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('123', '133', 'ZONGYOU', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('124', '134', 'TIANXIA', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('125', '135', 'TIANHONG', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('126', '136', 'GUANGYU', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('127', '24', 'bank', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('128', '25', 'ALQR', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('129', '26', 'tenpay', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('130', '27', 'WEIXIN', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('133', '30', 'QQCODE', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('131', '28', 'ALIWAP', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('189', '27', 'WEIXIN', 'weixin');
INSERT INTO `wqfaka_paylist` VALUES ('134', '24', 'bank', 'ips');
INSERT INTO `wqfaka_paylist` VALUES ('136', '1', 'SNDACARD', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('137', '2', 'QQCARD', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('138', '3', 'SAZ', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('139', '4', 'ZHENGTU', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('140', '5', 'SOHU', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('141', '6', 'JIUYOU', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('142', '7', 'JUNNET', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('143', '8', 'UNICOM', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('144', '9', 'WANMEI', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('145', '10', 'NETEASE', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('146', '11', 'TELECOM', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('147', '14', 'ZONGYOU', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('148', '15', 'TIANXIA', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('149', '16', 'TIANHONG', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('150', '17', 'GUANGYU', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('151', '25', 'ALIPAY', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('152', '140', 'WEIXINPAY', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('153', '24', 'BANK', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('154', '26', 'TENPAY', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('156', '29', 'WXWAP', 'lcardy');
INSERT INTO `wqfaka_paylist` VALUES ('158', '28', 'ALIWAP', 'altwap');
INSERT INTO `wqfaka_paylist` VALUES ('132', '29', 'WXAPP', 'a8tg');
INSERT INTO `wqfaka_paylist` VALUES ('159', '25', 'ALIPAY', 'yc88');
INSERT INTO `wqfaka_paylist` VALUES ('160', '30', 'QQCODE', 'qqpay');
INSERT INTO `wqfaka_paylist` VALUES ('162', '29', 'WXAPP', 'qqcode');
INSERT INTO `wqfaka_paylist` VALUES ('191', '201', 'MQPAY', 'mqpay');
INSERT INTO `wqfaka_paylist` VALUES ('192', '202', 'MQWXPAY', 'mqwxpay');

-- ----------------------------
-- Table structure for wqfaka_payments
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_payments`;
CREATE TABLE `wqfaka_payments` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(12) unsigned NOT NULL DEFAULT '0',
  `pid` varchar(200) NOT NULL DEFAULT '0',
  `money` varchar(200) NOT NULL DEFAULT '0',
  `fee` varchar(200) NOT NULL DEFAULT '',
  `remark` text NOT NULL,
  `addtime` varchar(200) NOT NULL DEFAULT '',
  `updatetime` varchar(200) NOT NULL DEFAULT '',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_payments
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_phonecode
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_phonecode`;
CREATE TABLE `wqfaka_phonecode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_phonecode
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_products
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_products`;
CREATE TABLE `wqfaka_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `links` varchar(128) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(128) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_products
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_pwcard
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_pwcard`;
CREATE TABLE `wqfaka_pwcard` (
  `ck` varchar(5) NOT NULL DEFAULT '',
  `cv` smallint(5) unsigned NOT NULL,
  `sn` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_pwcard
-- ----------------------------
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '743', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '590', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '779', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '533', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '422', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '701', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '188', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '739', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '755', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '936', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '637', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '238', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '254', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '516', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '850', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '680', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '989', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '544', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '340', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '887', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '433', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '214', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '113', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '733', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '650', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '437', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '899', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '700', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '735', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '961', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '194', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '511', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '120', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '924', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '627', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '704', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '278', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '607', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '310', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '634', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '915', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '819', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '193', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '375', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '691', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '392', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '889', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '906', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '363', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '816', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '582', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '148', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '391', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '494', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '688', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '853', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '788', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '232', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '276', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '886', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '677', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '663', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '328', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '825', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '810', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '611', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '640', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '309', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '235', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '495', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '539', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '955', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '256', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '885', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '627', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '789', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '558', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '289', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '519', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '688', '4561949771');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '854', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '728', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '886', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '495', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '903', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '371', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '666', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '899', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '235', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '511', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '227', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '199', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '204', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '942', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '777', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '652', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '246', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '494', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '458', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '981', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '890', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '718', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '961', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '941', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '547', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '325', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '459', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '130', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '507', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '113', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '100', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '227', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '623', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '733', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '473', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '407', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '102', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '412', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '890', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '499', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '297', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '205', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '396', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '778', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '510', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '489', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '757', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '311', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U1', '799', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U2', '760', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U3', '425', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U4', '770', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U5', '108', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U6', '854', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U7', '441', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('U8', '541', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '102', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '354', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '471', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '424', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '334', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '602', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '538', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '359', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '522', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '681', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '138', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '375', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '964', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '776', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '410', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '502', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '673', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '696', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '155', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '233', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '451', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '647', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '351', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '375', '6823125906');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '261', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '826', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '726', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '455', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '684', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '988', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '754', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '623', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '367', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '364', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '481', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '572', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '712', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '579', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '493', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '631', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '344', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '179', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '745', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '207', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '967', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '122', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '400', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '643', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '706', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '914', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '238', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '349', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '729', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '414', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '359', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '461', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '981', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '881', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '738', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '127', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '931', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '107', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '958', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '584', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '966', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '394', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '376', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '717', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '522', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '322', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '444', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '555', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '297', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '368', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '549', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '821', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '138', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '825', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '785', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '563', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T1', '828', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T2', '577', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T3', '333', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T4', '802', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T5', '490', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T6', '373', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T7', '347', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('T8', '915', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '121', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '276', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '925', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '188', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '864', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '311', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '183', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '268', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '355', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '289', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '280', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '232', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '430', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '644', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '536', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '720', '5631313203');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '198', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '520', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '324', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '528', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '237', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '381', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '982', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '897', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '901', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '882', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '979', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '963', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '361', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '459', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '518', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '534', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '187', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '848', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '683', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '439', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '505', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '603', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '489', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '239', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '660', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '836', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '487', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '577', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '396', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '468', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '913', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '283', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '529', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '157', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '830', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '436', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '805', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '293', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '634', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '978', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '241', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '531', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '889', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '289', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '330', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '645', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '766', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '432', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '213', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '270', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '727', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '554', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '392', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '933', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '156', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '967', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T1', '491', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T2', '720', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T3', '862', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T4', '392', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T5', '443', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T6', '287', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T7', '859', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('T8', '792', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U1', '508', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U2', '670', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U3', '152', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U4', '468', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U5', '489', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U6', '791', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U7', '226', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('U8', '653', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '767', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '319', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '981', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '874', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '119', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '487', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '196', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '226', '8936303021');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '833', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '992', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '634', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '703', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '492', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '763', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '817', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '946', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '454', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '398', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '350', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '713', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '711', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '777', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '791', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '291', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '371', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '620', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '284', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '291', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '331', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '297', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '688', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '162', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '197', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '368', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '830', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '560', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '750', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '613', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '871', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '257', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '262', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '375', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '938', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '347', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '469', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '574', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '146', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '112', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '601', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '118', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '728', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '925', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '665', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '566', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '912', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '746', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '506', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '963', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '174', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '971', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '520', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '313', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '474', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '124', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '446', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '411', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '147', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '626', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '325', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '383', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '917', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '432', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '941', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '869', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '425', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '284', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '636', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '206', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '645', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '162', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '208', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '520', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '959', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '378', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '198', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '711', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '882', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '708', '7759428112');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '732', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '567', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '621', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '185', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '375', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '425', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '756', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '727', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '141', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '420', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '569', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '777', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '395', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '938', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '297', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '364', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '175', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '733', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '340', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '663', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '970', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '547', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '392', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '873', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '893', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '452', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '340', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '576', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '323', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '597', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '832', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '399', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '921', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '223', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '943', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '569', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '184', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '143', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '747', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '976', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '374', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '848', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '815', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '527', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '653', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '533', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '145', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '323', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '277', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '503', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '760', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '334', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '584', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '661', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '658', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '395', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T1', '309', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T2', '624', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T3', '472', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T4', '613', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T5', '785', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T6', '882', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T7', '104', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('T8', '301', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '250', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '645', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '806', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '423', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '121', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '282', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '663', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '580', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '652', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '508', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '756', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '913', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '741', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '821', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '960', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '845', '6601038459');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '211', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '424', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '762', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '625', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '923', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '465', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '703', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '648', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '334', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '462', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '713', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '335', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '257', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '329', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '752', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '257', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '792', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '170', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '641', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '108', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '434', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '526', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '328', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '275', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '468', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '552', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '971', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '961', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '517', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '230', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '222', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '680', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '470', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '552', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '769', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '907', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '141', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '609', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '309', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '713', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '182', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '800', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '906', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '755', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '122', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '301', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '520', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '457', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '628', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '717', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '140', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '563', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '479', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '447', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '130', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '275', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T1', '748', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T2', '686', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T3', '307', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T4', '269', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T5', '366', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T6', '397', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T7', '757', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('T8', '815', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '989', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '282', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '827', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '870', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '819', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '271', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '473', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '879', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '708', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '669', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '522', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '769', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '410', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '481', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '626', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '346', '7199601306');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '770', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '604', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '847', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '159', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '231', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '348', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '166', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '765', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '272', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '185', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '366', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '446', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '336', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '137', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '492', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '695', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '497', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '275', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '793', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '727', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '973', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '501', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '339', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '234', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '729', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '351', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '897', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '478', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '156', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '963', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '651', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '722', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '650', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '161', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '551', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '925', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '671', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '789', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '552', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '515', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '906', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '725', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '431', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '555', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '125', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '947', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '472', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '910', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '637', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '946', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '466', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '650', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '454', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '778', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '439', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '479', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '962', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '642', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '661', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '129', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '897', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '178', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '727', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '319', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '942', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '980', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '679', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '403', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '531', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '995', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '365', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '416', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '386', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '532', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '882', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '443', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '465', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '435', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '719', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '614', '2338837488');
INSERT INTO `wqfaka_pwcard` VALUES ('B1', '952', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('B2', '732', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('B3', '477', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('B4', '525', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('B5', '775', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('B6', '959', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('B7', '710', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('B8', '681', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '463', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '481', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '231', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '224', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '690', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '286', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '988', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '637', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '696', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '136', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '907', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '756', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '475', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '210', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '321', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '112', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '296', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '846', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '620', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '382', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '526', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '500', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '119', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '809', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '632', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '640', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '660', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '101', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '341', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '585', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '231', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '684', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '942', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '913', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '433', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '824', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '690', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '244', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '466', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '172', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '327', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '422', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '166', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '667', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '943', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '411', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '877', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '438', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '319', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '203', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '571', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '451', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '567', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '494', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '811', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '832', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '804', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '489', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '374', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '316', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '282', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '306', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '315', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '961', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '109', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '449', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '706', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '952', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '181', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '304', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '312', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '171', '5118196494');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '486', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '767', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '961', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '173', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '283', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '482', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '354', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '792', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '772', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '238', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '502', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '939', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '261', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '496', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '820', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '408', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '279', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '663', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '551', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '537', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '977', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '859', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '769', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '551', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '491', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '785', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '688', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '195', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '665', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '218', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '798', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '796', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '376', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '706', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '585', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '966', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '440', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '396', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '653', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '690', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '456', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '479', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '618', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '109', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '769', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '763', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '789', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '454', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '688', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '172', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '789', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '622', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '764', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '381', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '453', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '457', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '253', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '485', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '653', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '643', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '270', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '706', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '369', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '344', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T1', '162', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T2', '341', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T3', '272', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T4', '516', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T5', '289', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T6', '757', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T7', '141', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('T8', '530', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '576', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '429', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '367', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '513', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '793', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '938', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '269', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '661', '8932851935');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '818', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '100', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '177', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '968', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '790', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '112', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '925', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '956', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '169', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '216', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '863', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '171', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '709', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '232', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '134', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '725', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '602', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '550', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '520', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '545', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '278', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '587', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '301', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '378', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '408', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '844', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '773', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '973', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '568', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '282', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '746', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '372', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '276', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '962', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '736', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '785', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '981', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '851', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '355', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '780', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '805', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '251', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '741', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '265', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '414', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '951', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '912', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '285', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '130', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '157', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '784', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '824', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '345', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '607', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '654', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '229', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '665', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '210', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '876', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '336', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '830', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '631', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '529', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '235', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '651', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '863', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '613', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '735', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '206', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '792', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '669', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '680', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '224', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '605', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '655', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '871', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '318', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '355', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '579', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '340', '3344699506');
INSERT INTO `wqfaka_pwcard` VALUES ('B1', '586', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('B2', '955', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('B3', '969', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('B4', '858', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('B5', '970', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('B6', '329', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('B7', '236', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('B8', '510', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '310', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '367', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '996', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '549', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '897', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '498', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '924', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '728', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '404', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '250', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '829', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '874', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '228', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '449', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '737', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '166', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '115', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '557', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '319', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '457', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '465', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '861', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '106', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '938', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '885', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '629', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '365', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '735', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '181', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '949', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '360', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '328', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U1', '750', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U2', '672', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U3', '279', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U4', '378', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U5', '965', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U6', '455', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U7', '463', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('U8', '569', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '118', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '655', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '201', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '625', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '417', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '844', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '625', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '733', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '892', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '210', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '491', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '823', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '112', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '314', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '160', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '429', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '770', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '455', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '770', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '392', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '629', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '626', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '419', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '924', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '700', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '517', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '437', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '894', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '735', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '532', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '182', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '962', '6718706451');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '803', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '222', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '707', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '955', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '862', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '368', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '191', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '974', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '779', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '123', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '504', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '692', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '584', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '135', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '656', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '661', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '920', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '139', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '494', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '146', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '833', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '311', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '795', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '542', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '700', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '697', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '147', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '458', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '423', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '433', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '549', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '627', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '580', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '724', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '841', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '316', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '240', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '689', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '725', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '691', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '943', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '848', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '768', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '418', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '657', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '664', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '442', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '742', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U1', '692', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U2', '401', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U3', '315', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U4', '843', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U5', '412', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U6', '914', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U7', '533', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('U8', '696', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '905', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '844', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '802', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '339', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '552', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '131', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '321', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '176', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '965', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '297', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '178', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '221', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '832', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '542', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '344', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '211', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '636', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '786', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '988', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '283', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '285', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '806', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '252', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '559', '6481961925');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '370', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '286', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '631', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '779', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '958', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '895', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '283', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '409', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B1', '859', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B2', '485', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B3', '447', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B4', '984', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B5', '511', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B6', '735', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B7', '149', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('B8', '896', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '805', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '431', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '916', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '559', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '340', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '207', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '308', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '355', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '347', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '478', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '489', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '211', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '225', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '562', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '620', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '951', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '343', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '272', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '753', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '812', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '460', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '275', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '397', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '765', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '524', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '710', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '549', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '328', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '284', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '653', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '452', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '221', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '899', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '614', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '566', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '746', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '464', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '769', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '328', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '531', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '131', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '708', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '387', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '733', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '160', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '595', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '573', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '447', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '770', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '521', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '605', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '990', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '630', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '659', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '186', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '331', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '649', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '788', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '996', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '728', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '515', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '905', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '924', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '936', '8795462297');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '213', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '914', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '955', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '929', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '476', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '980', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '828', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '373', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B1', '803', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B2', '287', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B3', '660', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B4', '978', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B5', '635', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B6', '796', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B7', '456', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('B8', '779', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '470', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '574', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '596', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '968', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '977', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '611', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '367', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '966', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '816', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '224', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '165', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '464', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '505', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '421', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '542', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '163', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '331', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '828', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '699', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '546', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '535', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '600', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '401', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '299', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '770', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '599', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '728', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '921', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '774', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '156', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '422', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '241', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '137', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '113', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '354', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '284', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '918', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '952', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '272', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '492', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '186', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '513', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '343', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '857', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '549', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '797', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '660', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '359', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '530', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '475', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '426', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '879', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '960', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '585', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '785', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '172', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '964', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '935', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '410', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '264', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '780', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '309', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '416', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '476', '3152952668');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '813', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '329', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '799', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '571', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '749', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '256', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '174', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '858', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '781', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '980', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '358', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '413', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '103', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '660', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '289', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '102', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '801', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '116', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '104', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '278', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '890', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '451', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '732', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '298', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '815', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '727', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '621', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '360', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '305', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '345', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '867', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '631', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '649', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '412', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '772', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '277', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '970', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '640', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '518', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '365', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '888', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '459', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '175', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '643', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '835', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '901', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '927', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '474', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '713', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '625', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '446', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '241', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '757', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '647', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '879', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '869', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '804', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '339', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '701', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '514', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '923', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '162', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '584', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '445', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '501', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '910', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '827', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '267', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '549', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '507', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '725', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '837', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '928', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '654', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '800', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '382', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '836', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '956', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '269', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '397', '7689686111');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '765', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '794', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '607', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '472', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '108', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '820', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '248', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '962', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '202', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '950', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '399', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '742', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '890', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '229', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '561', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '152', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '569', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '247', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '683', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '954', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '393', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '287', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '518', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '719', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '507', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '196', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '135', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '856', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '370', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '869', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '376', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '409', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '393', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '805', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '701', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '386', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '748', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '239', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '402', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '668', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '871', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '498', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '645', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '755', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '916', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '196', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '713', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '796', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '590', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '198', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '299', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '672', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '215', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '989', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '341', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '758', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '355', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '767', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '733', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '349', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '349', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '391', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '907', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '970', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '193', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '118', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '733', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '657', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '707', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '539', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '508', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '833', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '130', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '778', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '198', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '150', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '991', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '931', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '312', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '541', '6851516591');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '978', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '794', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '268', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '478', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '215', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '754', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '498', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '306', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '247', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '719', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '989', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '459', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '950', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '401', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '542', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '376', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '735', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '426', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '258', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '873', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '562', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '750', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '301', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '909', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '240', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '631', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '995', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '262', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '420', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '409', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '298', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '483', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '749', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '399', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '831', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '550', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '409', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '752', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '520', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '318', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '493', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '273', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '730', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '972', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '944', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '779', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '537', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '281', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '519', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '560', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '226', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '665', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '595', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '635', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '652', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '862', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '575', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '180', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '871', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '922', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '127', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '290', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '453', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '304', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '502', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '581', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '799', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '807', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '355', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '582', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '180', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '406', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '844', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '316', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '198', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '534', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '104', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '329', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '409', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '277', '6093903117');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '117', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '587', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '871', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '936', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '254', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '113', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '472', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '122', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '543', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '556', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '773', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '162', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '801', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '726', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '201', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '951', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '973', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '554', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '129', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '714', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '673', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '764', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '121', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '512', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '642', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '430', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '424', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '445', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '284', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '869', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '745', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '760', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '317', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '504', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '938', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '788', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '217', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '842', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '719', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '812', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '384', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '998', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '462', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '700', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '497', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '927', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '171', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '398', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '405', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '672', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '485', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '619', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '420', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '508', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '126', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '723', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T1', '132', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T2', '978', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T3', '830', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T4', '228', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T5', '755', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T6', '513', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T7', '679', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('T8', '939', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '186', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '423', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '370', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '838', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '203', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '542', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '638', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '132', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '596', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '746', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '987', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '680', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '520', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '592', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '417', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '321', '9245923656');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '590', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '842', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '448', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '840', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '681', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '826', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '889', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '258', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B1', '765', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B2', '293', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B3', '243', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B4', '184', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B5', '862', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B6', '871', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B7', '722', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('B8', '154', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '488', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '192', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '635', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '572', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '303', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '112', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '453', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '363', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '263', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '220', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '783', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '923', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '485', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '311', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '479', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '640', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '690', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '799', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '893', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '719', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '851', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '455', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '188', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '282', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '701', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '247', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '830', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '577', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '711', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '949', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '673', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '775', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '426', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '613', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '645', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '674', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '350', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '273', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '368', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '904', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '561', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '558', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '307', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '639', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '464', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '300', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '686', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '524', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '953', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '508', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '456', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '908', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '792', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '481', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '975', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '398', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '189', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '264', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '562', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '136', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '670', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '684', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '789', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '789', '6801708275');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '675', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '766', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '591', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '644', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '184', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '868', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '761', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '629', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '187', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '280', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '985', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '908', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '329', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '741', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '785', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '827', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '272', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '700', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '350', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '195', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '837', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '125', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '137', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '575', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '676', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '680', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '940', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '700', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '692', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '696', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '614', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '109', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '900', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '177', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '321', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '329', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '137', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '907', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '286', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '610', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '427', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '657', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '632', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '939', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '288', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '767', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '784', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '339', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '415', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '929', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '402', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '477', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '603', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '414', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '749', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '786', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '550', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '281', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '434', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '533', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '516', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '617', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '650', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '328', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U1', '960', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U2', '835', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U3', '347', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U4', '511', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U5', '739', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U6', '684', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U7', '952', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('U8', '608', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '196', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '106', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '182', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '906', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '616', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '979', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '859', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '417', '7729092533');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '267', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '694', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '865', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '365', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '864', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '314', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '349', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '959', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '817', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '409', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '886', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '203', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '434', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '763', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '569', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '253', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '797', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '215', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '659', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '824', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '812', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '236', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '840', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '939', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '635', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '152', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '591', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '330', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '707', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '159', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '616', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '660', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '474', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '777', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '544', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '829', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '417', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '460', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '353', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '921', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '681', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '740', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '817', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '977', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '816', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '800', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '527', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '134', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '219', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '765', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '998', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '324', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '207', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '108', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '311', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '271', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q1', '982', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q2', '547', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q3', '280', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q4', '174', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q5', '742', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q6', '740', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q7', '426', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('Q8', '130', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '992', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '258', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '131', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '961', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '998', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '134', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '244', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '419', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '758', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '369', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '336', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '632', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '816', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '596', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '856', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '847', '4236296556');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '907', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '111', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '508', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '232', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '444', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '235', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '687', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '584', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '792', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '733', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '684', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '264', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '214', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '271', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '288', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '388', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '640', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '163', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '806', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '657', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '666', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '280', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '781', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '601', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '474', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '613', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '892', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '294', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '250', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '726', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '735', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '229', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '223', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '643', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '335', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '491', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '120', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '817', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '797', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '712', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '737', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '207', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '747', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '969', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '935', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '917', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '967', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '591', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '866', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '424', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '369', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '433', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '217', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '560', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '234', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '200', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '502', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '750', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '736', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '862', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '173', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '190', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '381', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '159', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V1', '582', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V2', '770', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V3', '408', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V4', '217', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V5', '778', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V6', '304', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V7', '443', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('V8', '891', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '952', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '299', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '971', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '556', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '626', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '709', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '734', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '444', '9379834933');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '768', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '554', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '548', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '650', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '712', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '733', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '177', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '672', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '303', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '319', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '829', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '820', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '651', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '792', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '296', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '574', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '894', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '741', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '830', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '472', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '491', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '822', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '231', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '149', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L1', '271', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L2', '702', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L3', '687', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L4', '743', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L5', '268', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L6', '273', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L7', '273', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('L8', '800', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '880', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '798', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '906', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '430', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '853', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '248', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '369', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '136', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '463', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '998', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '396', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '983', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '667', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '762', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '232', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '620', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '307', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '204', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '463', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '817', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '154', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '822', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '924', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '341', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '544', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '439', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '378', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '529', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '522', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '406', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '693', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '982', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '527', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '335', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '688', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '132', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '343', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '770', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '379', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '616', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z1', '654', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z2', '438', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z3', '810', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z4', '902', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z5', '812', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z6', '352', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z7', '382', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('Z8', '105', '2494646786');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '697', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '771', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '789', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '383', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '212', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '981', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '190', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '598', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E1', '684', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E2', '814', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E3', '250', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E4', '851', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E5', '421', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E6', '133', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E7', '355', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('E8', '181', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '365', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '581', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '624', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '670', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '914', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '383', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '484', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '570', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G1', '156', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G2', '194', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G3', '151', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G4', '329', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G5', '199', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G6', '882', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G7', '200', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('G8', '853', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '802', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '697', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '256', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '776', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '469', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '639', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '117', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '872', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J1', '441', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J2', '267', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J3', '727', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J4', '780', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J5', '221', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J6', '861', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J7', '215', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('J8', '671', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '782', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '885', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '410', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '248', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '491', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '654', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '149', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '489', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '792', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '264', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '711', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '518', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '397', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '481', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '554', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '437', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U1', '403', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U2', '544', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U3', '219', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U4', '696', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U5', '904', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U6', '792', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U7', '871', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('U8', '718', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X1', '718', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X2', '451', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X3', '231', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X4', '875', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X5', '584', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X6', '311', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X7', '882', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('X8', '625', '5224275434');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '860', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '510', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '478', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '888', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '747', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '359', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '640', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '244', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '851', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '749', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '934', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '501', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '805', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '707', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '123', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '266', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '737', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '746', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '741', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '880', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '855', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '605', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '224', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '730', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '165', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '524', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '248', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '652', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '626', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '568', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '322', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '750', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N1', '152', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N2', '158', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N3', '654', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N4', '941', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N5', '555', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N6', '438', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N7', '116', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('N8', '838', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O1', '332', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O2', '832', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O3', '840', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O4', '498', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O5', '218', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O6', '505', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O7', '782', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('O8', '335', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P1', '367', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P2', '613', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P3', '155', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P4', '832', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P5', '923', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P6', '928', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P7', '396', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('P8', '352', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '117', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '233', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '862', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '666', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '760', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '380', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '710', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '528', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T1', '376', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T2', '886', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T3', '358', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T4', '390', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T5', '121', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T6', '194', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T7', '100', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('T8', '394', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '569', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '333', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '145', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '340', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '574', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '533', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '572', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '856', '5186645146');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '633', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '861', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '866', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '365', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '832', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '557', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '803', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '166', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '825', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '507', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '535', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '521', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '827', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '834', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '538', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '602', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '171', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '853', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '578', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '344', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '914', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '970', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '859', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '707', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H1', '404', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H2', '783', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H3', '198', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H4', '260', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H5', '308', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H6', '927', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H7', '940', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('H8', '370', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I1', '603', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I2', '504', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I3', '140', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I4', '235', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I5', '625', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I6', '341', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I7', '150', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('I8', '366', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '908', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '302', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '132', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '239', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '870', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '927', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '724', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '627', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R1', '501', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R2', '298', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R3', '496', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R4', '831', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R5', '205', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R6', '906', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R7', '207', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('R8', '428', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S1', '647', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S2', '335', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S3', '716', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S4', '246', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S5', '366', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S6', '330', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S7', '647', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('S8', '486', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '193', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '858', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '365', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '606', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '549', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '235', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '363', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '674', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '641', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '325', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '608', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '731', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '959', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '994', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '669', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '540', '9093055484');
INSERT INTO `wqfaka_pwcard` VALUES ('A1', '150', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('A2', '214', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('A3', '698', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('A4', '454', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('A5', '895', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('A6', '780', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('A7', '543', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('A8', '629', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B1', '799', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B2', '203', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B3', '895', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B4', '328', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B5', '596', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B6', '647', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B7', '620', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('B8', '809', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C1', '698', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C2', '457', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C3', '974', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C4', '891', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C5', '942', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C6', '903', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C7', '767', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('C8', '322', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D1', '490', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D2', '722', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D3', '265', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D4', '344', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D5', '754', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D6', '516', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D7', '687', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('D8', '355', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F1', '217', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F2', '858', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F3', '122', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F4', '828', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F5', '192', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F6', '857', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F7', '625', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('F8', '582', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K1', '523', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K2', '839', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K3', '312', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K4', '361', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K5', '652', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K6', '591', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K7', '515', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('K8', '828', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M1', '358', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M2', '425', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M3', '918', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M4', '626', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M5', '291', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M6', '120', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M7', '136', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('M8', '596', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U1', '210', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U2', '284', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U3', '751', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U4', '933', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U5', '453', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U6', '298', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U7', '280', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('U8', '951', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W1', '934', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W2', '989', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W3', '376', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W4', '836', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W5', '511', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W6', '796', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W7', '442', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('W8', '674', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y1', '905', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y2', '765', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y3', '758', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y4', '615', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y5', '925', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y6', '844', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y7', '210', '5208791592');
INSERT INTO `wqfaka_pwcard` VALUES ('Y8', '172', '5208791592');

-- ----------------------------
-- Table structure for wqfaka_rates
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_rates`;
CREATE TABLE `wqfaka_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `channelid` int(10) unsigned NOT NULL,
  `rate` decimal(8,2) NOT NULL DEFAULT '0.00',
  `cateid` int(10) unsigned NOT NULL DEFAULT '0',
  `goodid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `channelid` (`channelid`),
  KEY `cateid` (`cateid`),
  KEY `goodid` (`goodid`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_rates
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_searchlist
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_searchlist`;
CREATE TABLE `wqfaka_searchlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` varchar(20) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=684379 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_searchlist
-- ----------------------------
INSERT INTO `wqfaka_searchlist` VALUES ('684377', '76640DD8BFD04061', '1528801590');

-- ----------------------------
-- Table structure for wqfaka_selllist
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_selllist`;
CREATE TABLE `wqfaka_selllist` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` varchar(200) NOT NULL DEFAULT '0',
  `cardid` varchar(200) NOT NULL DEFAULT '0',
  `addtime` varchar(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `orderid` (`orderid`),
  KEY `cardid` (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_selllist
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_tg_products
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_tg_products`;
CREATE TABLE `wqfaka_tg_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `fencheng1` int(11) NOT NULL COMMENT '会员分成',
  `fencheng2` int(11) NOT NULL COMMENT '平台分成',
  `ctime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_tg_products
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_userinfo`;
CREATE TABLE `wqfaka_userinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `ptype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 bank 2 alipay 3 tenpay',
  `realname` varchar(10) NOT NULL DEFAULT '',
  `bank` varchar(30) NOT NULL DEFAULT '',
  `card` varchar(20) NOT NULL DEFAULT '',
  `addr` varchar(50) NOT NULL DEFAULT '',
  `alipay` varchar(50) NOT NULL DEFAULT '',
  `tenpay` varchar(50) NOT NULL DEFAULT '',
  `safekey` varchar(32) NOT NULL DEFAULT '',
  `question` varchar(50) NOT NULL DEFAULT '',
  `answer` varchar(50) NOT NULL DEFAULT '',
  `is_login` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_safe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `idcard` varchar(19) NOT NULL DEFAULT '',
  `sn` bigint(20) unsigned NOT NULL DEFAULT '0',
  `is_pwcard` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pwCardCol` varchar(20) NOT NULL DEFAULT '',
  `is_apply_settlement` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `wx_openid` varchar(30) DEFAULT NULL,
  `wx_nickname` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2349 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_userinfo
-- ----------------------------
INSERT INTO `wqfaka_userinfo` VALUES ('2348', '2217', '2', 'Jia Xiao', '', '', '', '2222221233', '', '', '', '', '0', '0', '130731198906180095', '0', '0', '', '1', '', '');

-- ----------------------------
-- Table structure for wqfaka_userlogs
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_userlogs`;
CREATE TABLE `wqfaka_userlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `logip` varchar(15) NOT NULL DEFAULT '',
  `logtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=45676 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_userlogs
-- ----------------------------

-- ----------------------------
-- Table structure for wqfaka_usermoney
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_usermoney`;
CREATE TABLE `wqfaka_usermoney` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `unpaid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `freeze` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sortForUnpaid` decimal(9,2) NOT NULL DEFAULT '0.00',
  `sortForIncome` decimal(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2350 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_usermoney
-- ----------------------------
INSERT INTO `wqfaka_usermoney` VALUES ('2349', '2217', '0.00', '0.00', '0.00', '0.00', '0.00');

-- ----------------------------
-- Table structure for wqfaka_userprice
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_userprice`;
CREATE TABLE `wqfaka_userprice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `channelid` int(10) unsigned NOT NULL,
  `price` decimal(6,4) NOT NULL DEFAULT '0.0000',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sortid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `channelid` (`channelid`)
) ENGINE=MyISAM AUTO_INCREMENT=14265 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_userprice
-- ----------------------------
INSERT INTO `wqfaka_userprice` VALUES ('14258', '2217', '38', '0.9700', '0', '0');
INSERT INTO `wqfaka_userprice` VALUES ('14259', '2217', '19', '0.9700', '0', '0');
INSERT INTO `wqfaka_userprice` VALUES ('14260', '2217', '34', '0.9700', '0', '0');
INSERT INTO `wqfaka_userprice` VALUES ('14261', '2217', '35', '0.9700', '0', '0');
INSERT INTO `wqfaka_userprice` VALUES ('14262', '2217', '33', '0.9700', '0', '0');
INSERT INTO `wqfaka_userprice` VALUES ('14263', '2217', '39', '0.9700', '0', '0');
INSERT INTO `wqfaka_userprice` VALUES ('14264', '2217', '40', '0.9700', '0', '0');

-- ----------------------------
-- Table structure for wqfaka_users
-- ----------------------------
DROP TABLE IF EXISTS `wqfaka_users`;
CREATE TABLE `wqfaka_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `utype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 administrator 2 users',
  `username` varchar(20) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `userkey` varchar(16) NOT NULL DEFAULT '',
  `verifycode` varchar(32) NOT NULL DEFAULT '',
  `tel` varchar(12) NOT NULL DEFAULT '',
  `qq` varchar(12) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `sitename` varchar(50) NOT NULL DEFAULT '',
  `siteurl` varchar(50) NOT NULL DEFAULT '',
  `is_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_getgood` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_invent` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_paytype` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `statistics` varchar(100) NOT NULL DEFAULT '',
  `is_contact_limit` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `template` varchar(20) NOT NULL DEFAULT '',
  `addtime` datetime NOT NULL,
  `is_link_state` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_user_popup` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `idcard` varchar(19) NOT NULL DEFAULT '',
  `theme` varchar(20) NOT NULL DEFAULT '',
  `is_apply_settlement` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ctype` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `go_page_theme` varchar(20) NOT NULL DEFAULT '',
  `is_api` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `api_key` varchar(32) NOT NULL DEFAULT '',
  `app_state` varchar(32) NOT NULL DEFAULT '',
  `is_search_tips` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `app_uid` varchar(30) NOT NULL DEFAULT '',
  `superman` int(10) unsigned NOT NULL DEFAULT '0',
  `is_auth` int(11) NOT NULL DEFAULT '0',
  `domain` varchar(225) NOT NULL DEFAULT '',
  `tel_check` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 未认证，1已认证',
  `utime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `istg` smallint(6) NOT NULL DEFAULT '0',
  `openid_wx` varchar(100) NOT NULL DEFAULT '',
  `is_notfiy` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否发送微信消息',
  `siteintr` varchar(3000) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2218 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wqfaka_users
-- ----------------------------
INSERT INTO `wqfaka_users` VALUES ('2217', '2', 'test123', '2062d3063db5979067c14a3a38a5458c', 'ZOBSO4', '', '15810221783', '222222', 'xiaogangqq@163.com', '哈哈哈', '', '0', '1', '1', '1', '', '0', '', '2018-06-26 14:39:39', '0', '0', '', 'skyblue', '0', '1', 'default', '0', '', '', '0', '', '0', '0', '', '0', '0', '0', '', '0', '', '50');
