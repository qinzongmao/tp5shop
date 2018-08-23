/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-09 20:25:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sh_attribute
-- ----------------------------
DROP TABLE IF EXISTS `sh_attribute`;
CREATE TABLE `sh_attribute` (
  `attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(4) DEFAULT NULL,
  `attr_name` varchar(30) DEFAULT '',
  `attr_type` tinyint(4) DEFAULT '0' COMMENT '0-唯一属性，1-单选属性',
  `attr_input_type` tinyint(4) DEFAULT '0' COMMENT '0-手工输入，1-列表选择',
  `attr_values` varchar(255) DEFAULT '',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_attribute
-- ----------------------------
INSERT INTO `sh_attribute` VALUES ('1', '1', '屏幕尺寸', '0', '0', '', '1533264959', '1533264959');
INSERT INTO `sh_attribute` VALUES ('2', '1', '前置像素', '0', '1', '500px|800px|1500px', '1533265012', '1533265012');
INSERT INTO `sh_attribute` VALUES ('3', '1', '内存', '1', '0', '', '1533265035', '1533265058');
INSERT INTO `sh_attribute` VALUES ('4', '1', '颜色', '1', '1', '黑色|土豪金|玫瑰金', '1533265084', '1533265084');
INSERT INTO `sh_attribute` VALUES ('5', '2', '出版社', '0', '1', '清华大学|传智博客|北京大学', '1533265155', '1533265155');

-- ----------------------------
-- Table structure for sh_auth
-- ----------------------------
DROP TABLE IF EXISTS `sh_auth`;
CREATE TABLE `sh_auth` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(40) DEFAULT '',
  `auth_c` varchar(40) DEFAULT '',
  `auth_a` varchar(40) DEFAULT '',
  `pid` int(11) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_auth
-- ----------------------------
INSERT INTO `sh_auth` VALUES ('1', '用户管理', '', '', '0', '0', '0');
INSERT INTO `sh_auth` VALUES ('2', '用户添加', 'user', 'add', '1', '0', '0');
INSERT INTO `sh_auth` VALUES ('3', '用户列表', 'user', 'index', '1', '0', '0');
INSERT INTO `sh_auth` VALUES ('4', '权限管理', '', '', '0', '1532856586', '1532856586');
INSERT INTO `sh_auth` VALUES ('5', '添加权限', 'auth', 'add', '4', '1532856640', '1533002327');
INSERT INTO `sh_auth` VALUES ('6', '权限列表', 'auth', 'index', '4', '1533007886', '1533007886');
INSERT INTO `sh_auth` VALUES ('7', '用户编辑', 'user', 'upd', '3', '1533007907', '1533007907');
INSERT INTO `sh_auth` VALUES ('8', '用户删除', 'user', 'del', '3', '1533007925', '1533007925');
INSERT INTO `sh_auth` VALUES ('9', '角色管理', '', '', '0', '1533085869', '1533085869');
INSERT INTO `sh_auth` VALUES ('10', '角色添加', 'role', 'add', '9', '1533085888', '1533085888');
INSERT INTO `sh_auth` VALUES ('11', '角色列表', 'role', 'index', '9', '1533085908', '1533085908');
INSERT INTO `sh_auth` VALUES ('12', '商品管理', '', '', '0', '1533258520', '1533258520');
INSERT INTO `sh_auth` VALUES ('13', '商品列表', 'goods', 'index', '12', '1533258542', '1533258542');
INSERT INTO `sh_auth` VALUES ('14', '添加商品', 'goods', 'add', '12', '1533258560', '1533258560');

-- ----------------------------
-- Table structure for sh_cart
-- ----------------------------
DROP TABLE IF EXISTS `sh_cart`;
CREATE TABLE `sh_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT '0',
  `goods_attr_ids` varchar(80) DEFAULT '',
  `goods_number` int(11) DEFAULT '0',
  `member_id` int(11) DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_cart
-- ----------------------------

-- ----------------------------
-- Table structure for sh_category
-- ----------------------------
DROP TABLE IF EXISTS `sh_category`;
CREATE TABLE `sh_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(40) DEFAULT '',
  `pid` smallint(6) DEFAULT '0',
  `is_show` tinyint(4) DEFAULT '1' COMMENT '1-显示 0-不显示',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_category
-- ----------------------------
INSERT INTO `sh_category` VALUES ('1', '国内手机', '0', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('2', '国外手机', '0', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('3', '小米', '1', '1', '0', '1533111656');
INSERT INTO `sh_category` VALUES ('4', '华为', '1', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('5', 'oppo', '1', '0', '0', '0');
INSERT INTO `sh_category` VALUES ('6', '金立', '1', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('7', '三星', '2', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('8', '苹果', '2', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('9', '索尼', '2', '0', '0', '0');
INSERT INTO `sh_category` VALUES ('10', '黑莓', '2', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('11', 'vivo', '1', '1', '1533109791', '1533109791');
INSERT INTO `sh_category` VALUES ('12', '摩托罗拉', '2', '1', '1533109833', '1533109833');
INSERT INTO `sh_category` VALUES ('13', '红米', '3', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('14', '大米', '3', '1', '0', '0');
INSERT INTO `sh_category` VALUES ('15', '锤子', '1', '1', '1533462566', '1533462566');

-- ----------------------------
-- Table structure for sh_goods
-- ----------------------------
DROP TABLE IF EXISTS `sh_goods`;
CREATE TABLE `sh_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(40) DEFAULT '',
  `goods_sn` varchar(150) DEFAULT '',
  `goods_price` decimal(10,2) DEFAULT NULL COMMENT 'decimal(10,2)',
  `goods_number` int(11) DEFAULT '0',
  `type_id` smallint(6) DEFAULT '0',
  `cat_id` smallint(6) DEFAULT '0',
  `goods_img` text,
  `goods_middle` text,
  `goods_thumb` text,
  `is_delete` tinyint(4) DEFAULT '0' COMMENT '是否在回站 0-不在回收站 1-在回收站',
  `is_sale` tinyint(4) DEFAULT '1' COMMENT '默认为1： 0-未上架 1-已上架',
  `is_new` tinyint(4) DEFAULT '1' COMMENT '默认为1： 0-不是新品 1-是新品',
  `is_best` tinyint(4) DEFAULT '1' COMMENT '默认为1： 0-不是推荐 1-是推荐',
  `is_hot` tinyint(4) DEFAULT '1' COMMENT '默认为1： 0-不是热卖 1-是热卖商品',
  `goods_desc` text,
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sh_goods
-- ----------------------------
INSERT INTO `sh_goods` VALUES ('3', '小米4', '1808030356325b640ab04a246', '4000.00', '484', '1', '3', '[\"20180803\\/59a65d395d11102b7c1e06132df920fe.jpg\",\"20180803\\/f244278fcf7a26f20d22e9b1188db4f0.jpg\",\"20180803\\/f50549b1f8dc39eb1dcae6a5ec926576.jpg\"]', '[\"20180803\\/middle_59a65d395d11102b7c1e06132df920fe.jpg\",\"20180803\\/middle_f244278fcf7a26f20d22e9b1188db4f0.jpg\",\"20180803\\/middle_f50549b1f8dc39eb1dcae6a5ec926576.jpg\"]', '[\"20180803\\/thumb_59a65d395d11102b7c1e06132df920fe.jpg\",\"20180803\\/thumb_f244278fcf7a26f20d22e9b1188db4f0.jpg\",\"20180803\\/thumb_f50549b1f8dc39eb1dcae6a5ec926576.jpg\"]', '0', '1', '1', '0', '1', '<ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>品牌</p></li><li><p>小米（MI）</p></li><li><p>型号</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>小米8</p></li><li><p>入网型号</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>以官网信息为准</p></li><li><p>上市年份</p></li><li><p>2018年</p></li><li><p>上市月份</p></li><li><p>5月</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">基本信息</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>机身颜色</p></li><li><p>黑色</p></li><li><p>机身长度（mm）</p></li><li><p>154.9</p></li><li><p>机身宽度（mm）</p></li><li><p>74.8</p></li><li><p>机身厚度（mm）</p></li><li><p>7.6</p></li><li><p>机身重量（g）</p></li><li><p>175</p></li><li><p>运营商标志或内容</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>无</p></li><li><p>机身材质分类</p></li><li><p>玻璃后盖</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">操作系统</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>操作系统</p></li><li><p>Android</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">主芯片</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>CPU品牌</p></li><li><p>骁龙（Snapdragon)</p></li><li><p>CPU频率</p></li><li><p>Adreno 630 图形处理器 最高主频 710MHz</p></li><li><p>CPU核数</p></li><li><p>八核</p></li><li><p>CPU型号</p></li><li><p>骁龙845（SDM845）</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">网络支持</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>双卡机类型</p></li><li><p>双卡双待单通</p></li><li><p>最大支持SIM卡数量</p></li><li><p>2个</p></li><li><p>SIM卡类型</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>Nano SIM</p></li><li><p>4G网络</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>4G：移动（TD-LTE)；4G：联通(FDD-LTE)；4G：电信(FDD-LTE)；4G：联通(TD-LTE)</p></li><li><p>3G/2G网络</p></li><li><p>3G：移动(TD-SCDMA)；3G：联通(WCDMA)；3G：电信(CDMA2000)；2G：移动（GSM）+联通(GSM)；2G：电信(CDMA)；2G：移动联通(GSM)+电信(CDMA)</p></li><li><p>副SIM卡类型</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>Nano SIM</p></li><li><p>副SIM卡4G网络</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>不支持主副卡同时使用电信卡</p></li><li><p>网络频率（2G/3G）</p></li><li><p>2G：GSM 850/900/1800/1900；2G：CDMA 800；3G：TD-SCDMA 1900/2000；3G：WCDMA 850/900/1900/2100；3G：CDMA2000；2G：GSM 900/1800；2G：GSM 900/1800/1900；3G：CDMA 800MHz 1X&amp;EVDO；3G：WCDMA：850/900/1700/1900/2100MHz</p></li><li><p>是否支持同时使用联通卡</p></li><li><p>不可同时上网，仅支持卡A上网，卡B通话。</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">存储</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>ROM</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>128GB</p></li><li><p>RAM</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>6GB</p></li><li><p>存储卡</p></li><li><p>不支持</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">屏幕</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>主屏幕尺寸（英寸）</p></li><li><p>6.21英寸</p></li><li><p>分辨率</p></li><li><p>其他</p></li><li><p>屏幕材质类型</p></li><li><p>其他</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">前置摄像头</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>前置摄像头</p></li><li><p>2000万像素</p></li><li><p>前摄光圈大小</p></li><li><p>其他</p></li><li><p>拍照特点</p></li><li><p>美颜；HDR</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">后置摄像头</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>摄像头数量</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>2个</p></li><li><p>后置摄像头</p></li><li><p>双1200万像素</p></li><li><p>拍照特点</p></li><li><p>美颜；连拍；全景</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">电池信息</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>电池容量（mAh）</p></li><li><p>3400mAh （typ）/ 3300mAh (min)</p></li><li><p>电池是否可拆卸</p></li><li><p><a href=\"https://item.jd.com/7652141.html#none\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><span class=\"Ptable-sprite-question\" style=\"margin: 0px 0px 0px 4px; padding: 0px; display: inline-block; width: 16px; height: 16px; vertical-align: -3px; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/sprite.png&quot;) no-repeat;\"></span></a></p></li><li><p>否</p></li><li><p>充电器</p></li><li><p>其他</p></li><li><p>快速充电</p></li><li><p>有线充电支持 QC 4.0+ 快充协议</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">数据接口</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>数据传输接口</p></li><li><p>蓝牙</p></li><li><p>NFC/NFC模式</p></li><li><p>支持卡模拟</p></li><li><p>耳机接口类型</p></li><li><p>Type-C</p></li><li><p>充电接口类型</p></li><li><p>Type-C</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">手机特性</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>指纹识别</p></li><li><p>支持</p></li><li><p>GPS</p></li><li><p>支持</p></li><li><p>电子罗盘</p></li><li><p>支持</p></li><li><p>霍尔感应器</p></li><li><p>支持</p></li><li><p>陀螺仪</p></li><li><p>支持</p></li><li><p>其他</p></li><li><p>距离感应；光线感应</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 110px; text-align: right;\">辅助功能</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>常用功能</p></li><li><p>录音；便签；超大字体</p></li></ul><h3 style=\"margin: 0px; padding: 0px; font-weight: 400; font-size: 12px; float: left; width: 130px; text-align: right;\">包装清单</h3><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 155px; padding: 0px 50px 0px 0px;\">手机主机*1、 保护套*1、电源适配器*1、USB Type-C 数据线*1、Type-C TO AUDIO 转接线*1、 插针*1 三包凭证 / 入门指南*1</p><h3 style=\"margin: 0px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 14px; line-height: normal; font-family: &quot;microsoft yahei&quot;;\">售后保障</h3><ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p><span class=\"goods\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/iconZP.png&quot;) no-repeat;\"></span>&nbsp;<strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">厂家服务</strong></p></li><li><p>本产品全国联保，享受三包服务，质保期为：一年质保<br/>如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！<br/>(注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，<a target=\"_blank\" href=\"http://www.mi.com/\" style=\"margin: 0px; padding: 0px; color: rgb(0, 90, 160); text-decoration-line: none;\">请点击这儿查询......</a><br/><br/>品牌官方网站：<a target=\"_blank\" href=\"http://www.mi.com/\" style=\"margin: 0px; padding: 0px; color: rgb(0, 90, 160); text-decoration-line: none;\">http://www.mi.com/</a><br/>售后服务电话：400-100-5678</p></li><li><p><span class=\"goods\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/iconZP.png&quot;) no-repeat;\"></span>&nbsp;<strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">京东承诺</strong></p></li><li><p>京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！<br/>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p></li><li><p><span class=\"goods\" style=\"margin: 0px; padding: 0px 10px 0px 0px; display: inline-block; width: 32px; height: 32px; line-height: 32px; vertical-align: bottom; background: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/iconZP.png&quot;) no-repeat;\"></span><strong style=\"margin: 0px; padding: 8px 0px 3px; display: inline-block;\">正品行货</strong></p></li><li><p>京东商城向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。</p></li></ul><p><br/></p>', '1533282992', '1533282992');
INSERT INTO `sh_goods` VALUES ('4', 'iphonex', '1808030503065b641a4a77a9d', '8999.00', '455', '1', '8', '[\"20180803\\/8b15ba1f970c4f85a139dcc9573459ad.jpg\",\"20180803\\/c88af9cee40832ccc0ccc0938549fe9a.jpg\",\"20180803\\/fd177c0f9aa4b5b77221e8920fafa154.jpg\"]', '[\"20180803\\/middle_8b15ba1f970c4f85a139dcc9573459ad.jpg\",\"20180803\\/middle_c88af9cee40832ccc0ccc0938549fe9a.jpg\",\"20180803\\/middle_fd177c0f9aa4b5b77221e8920fafa154.jpg\"]', '[\"20180803\\/thumb_8b15ba1f970c4f85a139dcc9573459ad.jpg\",\"20180803\\/thumb_c88af9cee40832ccc0ccc0938549fe9a.jpg\",\"20180803\\/thumb_fd177c0f9aa4b5b77221e8920fafa154.jpg\"]', '0', '1', '0', '1', '0', '<ul class=\"parameter1 p-parameter-list list-paddingleft-2\" style=\"list-style-type: none;\"><li><p title=\"2436×1125\" style=\"margin-top: 0px; margin-bottom: 4px; padding: 0px; text-overflow: ellipsis; overflow: hidden; width: 197px; line-height: 18px;\">分辨率：2436×1125</p></li><li><p><span class=\"i-camera\" style=\"margin: 2px 0px 0px -37px; padding: 0px; float: left; width: 33px; height: 33px; overflow: hidden; line-height: 1000px; background-repeat: no-repeat; background-position: 0px 0px; background-image: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/param2.png&quot;);\"></span></p><p title=\"1200万像素\" style=\"margin-top: 0px; margin-bottom: 4px; padding: 0px; text-overflow: ellipsis; overflow: hidden; width: 197px; line-height: 18px;\">后置摄像头：1200万像素</p><p title=\"700万像素\" style=\"margin-top: 0px; margin-bottom: 4px; padding: 0px; text-overflow: ellipsis; overflow: hidden; width: 197px; line-height: 18px;\">前置摄像头：700万像素</p></li><li><p><span class=\"i-cpu\" style=\"margin: 2px 0px 0px -37px; padding: 0px; float: left; width: 33px; height: 33px; overflow: hidden; line-height: 1000px; background-repeat: no-repeat; background-position: 0px 0px; background-image: url(&quot;//static.360buyimg.com/item/unite/1.0.52/components/default/detail/i/param3.png&quot;);\"></span></p><p title=\"其他\" style=\"margin-top: 0px; margin-bottom: 4px; padding: 0px; text-overflow: ellipsis; overflow: hidden; width: 197px; line-height: 18px;\">核&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数：其他</p><p title=\"以官网信息为准\" style=\"margin-top: 0px; margin-bottom: 4px; padding: 0px; text-overflow: ellipsis; overflow: hidden; width: 197px; line-height: 18px;\">频&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;率：以官网信息为准</p></li><li><p>品牌：&nbsp;<a href=\"https://list.jd.com/list.html?cat=9987,653,655&ev=exbrand_14026\" clstag=\"shangpin|keycount|product|pinpai_1\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(94, 105, 173); text-decoration-line: none;\">Apple</a></p></li><li><p>商品名称：AppleiPhone X</p></li><li><p>商品编号：5563195</p></li><li><p>商品毛重：435.00g</p></li><li><p>商品产地：中国大陆</p></li></ul><ul class=\"parameter2 p-parameter-list list-paddingleft-2\" style=\"list-style-type: none;\"></ul><p class=\"more-par\" style=\"margin-top: -5px; margin-bottom: 0px; padding: 0px 20px 0px 0px; text-align: right;\"><a href=\"https://item.jd.com/5563195.html#product-detail\" class=\"J-more-param\" style=\"margin: 0px; padding: 0px; color: rgb(0, 90, 160); text-decoration-line: none;\">更多参数<span class=\"txt-arr\">&gt;&gt;</span></a></p><p><a id=\"p-cat-insert\" target=\"_blank\" title=\"\" href=\"https://c-nfa.jd.com/adclick?keyStr=6PQwtwh0f06syGHwQVvRO2qQjwLJ5GHB8CWaVmO7akw8kRNUgm14u0WFAY6zp+eaNiAYfgtpim82Oa05ikX849FW37iiPWhKEPf1t7gIbsEws5636YZx/Josugfbju/q4fLWlvRBkxoM4QrINBB7LX4SXojCWBB+w5fLUxfdXBBJVJnO8ab3DMrVDKz/WcVfAkuOIdHLRtkW/q4CIdzM/gKe2acHG0Ajuj9L8JXxidE+hmSpgLz9xmR1xEiObDPEY2cXhMASnNvmSUyLnxgFsxMv49nQdfWafuMVCtVmz8qXOlcppL6VE6XAjxQTKJJ8WOo1bdnPYgppNB+nDWfC8A==&cv=2.0&url=https://sale.jd.com/act/vFKi2SsYCA.html\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img width=\"990\" alt=\"\" src=\"https://img10.360buyimg.com/da/jfs/t24283/204/1555017768/50183/21ecfd6f/5b62a5ceN048d5d1e.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle; width: 990px;\"/></a></p><ul class=\"force-img-place list-paddingleft-2\" style=\"list-style-type: none;\"><li><p><a href=\"https://sale.jd.com/act/bYqHpB2Iu7.html\" target=\"_blank\" name=\"超级大馆牌\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/cms/jfs/t22615/165/1512032591/24285/3082bf21/5b627fa6N4aee3069.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://sale.jd.com/act/0xzaney3lEqi5WAv.html\" target=\"_blank\" name=\"金机奖\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/cms/jfs/t23131/85/1527741343/22697/bd817ae2/5b627fa6Na487cae2.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://jdpa.jd.com/#/index/0\" target=\"_blank\" name=\"摄影金像奖\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/cms/jfs/t23362/191/1562885365/21230/9e0711f0/5b627fa6Nb5b36696.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://shouji.jd.com/\" target=\"_blank\" name=\"京东手机\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t23266/118/1574411026/20979/de302aa1/5b627fa6N0916ee3b.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://sale.jd.com/act/UgGR3AoT6n.html\" target=\"_blank\" name=\"手机配件\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img14.360buyimg.com/cms/jfs/t24334/166/1559695456/22698/db79a687/5b627fa6N2146e7b2.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://phone.jd.com/\" target=\"_blank\" name=\"手机好店\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img14.360buyimg.com/cms/jfs/t22762/63/1523288085/24033/9a27d5b/5b627fa6N1ef3d562.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://sale.jd.com/act/oMHT5c7gAznJ.html\" target=\"_blank\" name=\"游戏会场\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/cms/jfs/t24229/96/1530991366/26167/c4c0014b/5b627fa6N5f3bf157.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://sale.jd.com/act/Z4tiRv6NqO.html\" target=\"_blank\" name=\"京东网厅\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/cms/jfs/t24058/226/1505469276/19278/6f67727d/5b627fa6N3edfbbae.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li><li><p><a href=\"https://sale.jd.com/act/WX2fhkEvletpdM.html\" target=\"_blank\" name=\"新机首发\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); text-decoration-line: none;\"><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t22831/77/1527904482/22824/7ce344a4/5b627fa6N09b5e52d.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: middle;\"/></a></p></li></ul><p><br/></p>', '1533286986', '1533286986');
INSERT INTO `sh_goods` VALUES ('5', '金立', '1808050541165b66c63c6656d', '4566.00', '638', '1', '6', '[\"20180805\\/03ad762bc4aa80bb133e25d6c667e9e5.jpg\",\"20180805\\/7368d9f498889c5776a6d190e8286354.jpg\",\"20180805\\/fe3770673b8ea84af26ea632c6cd0ce6.jpg\"]', '[\"20180805\\/middle_03ad762bc4aa80bb133e25d6c667e9e5.jpg\",\"20180805\\/middle_7368d9f498889c5776a6d190e8286354.jpg\",\"20180805\\/middle_fe3770673b8ea84af26ea632c6cd0ce6.jpg\"]', '[\"20180805\\/thumb_03ad762bc4aa80bb133e25d6c667e9e5.jpg\",\"20180805\\/thumb_7368d9f498889c5776a6d190e8286354.jpg\",\"20180805\\/thumb_fe3770673b8ea84af26ea632c6cd0ce6.jpg\"]', '0', '1', '1', '1', '1', '<h1 label=\"标题居中\" style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">金立</h1><p>金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立金立</p>', '1533462076', '1533462076');
INSERT INTO `sh_goods` VALUES ('6', '华为p9', '1808050543445b66c6d0cdb1d', '8755.00', '649', '1', '4', '[\"20180805\\/b7a2ead18f0c834de1068ad36804831a.jpg\",\"20180805\\/49e1981e88a98ce4c5136ff0741cec35.jpg\",\"20180805\\/2fb4ee21dbbb29e91fb994e340682c9a.jpg\"]', '[\"20180805\\/middle_b7a2ead18f0c834de1068ad36804831a.jpg\",\"20180805\\/middle_49e1981e88a98ce4c5136ff0741cec35.jpg\",\"20180805\\/middle_2fb4ee21dbbb29e91fb994e340682c9a.jpg\"]', '[\"20180805\\/thumb_b7a2ead18f0c834de1068ad36804831a.jpg\",\"20180805\\/thumb_49e1981e88a98ce4c5136ff0741cec35.jpg\",\"20180805\\/thumb_2fb4ee21dbbb29e91fb994e340682c9a.jpg\"]', '0', '1', '1', '1', '1', '<h1 label=\"标题居中\" style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">华为p9</h1><p>华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9华为p9</p>', '1533462224', '1533462224');
INSERT INTO `sh_goods` VALUES ('7', '三星手机', '1808050546005b66c758287e1', '5800.00', '777', '1', '7', '[\"20180805\\/f8fa62c8146d725005d8627b765d7c0f.jpg\",\"20180805\\/1e30ea7597a88ab4403c7f7a0d0c314c.jpg\",\"20180805\\/0b7f4a6f32c12c7e3936f3e27a18365d.jpg\"]', '[\"20180805\\/middle_f8fa62c8146d725005d8627b765d7c0f.jpg\",\"20180805\\/middle_1e30ea7597a88ab4403c7f7a0d0c314c.jpg\",\"20180805\\/middle_0b7f4a6f32c12c7e3936f3e27a18365d.jpg\"]', '[\"20180805\\/thumb_f8fa62c8146d725005d8627b765d7c0f.jpg\",\"20180805\\/thumb_1e30ea7597a88ab4403c7f7a0d0c314c.jpg\",\"20180805\\/thumb_0b7f4a6f32c12c7e3936f3e27a18365d.jpg\"]', '0', '1', '1', '1', '1', '<h1 label=\"标题居中\" style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">三星手机</h1><p>三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机三星手机</p>', '1533462360', '1533462360');
INSERT INTO `sh_goods` VALUES ('8', 'oppo', '1808050548445b66c7fc97656', '5600.00', '560', '1', '5', '[\"20180805\\/21a3bce3098c8a97db0939da7002e5ab.jpg\",\"20180805\\/0e992c8325dca09074570060b04a6043.jpg\"]', '[\"20180805\\/middle_21a3bce3098c8a97db0939da7002e5ab.jpg\",\"20180805\\/middle_0e992c8325dca09074570060b04a6043.jpg\"]', '[\"20180805\\/thumb_21a3bce3098c8a97db0939da7002e5ab.jpg\",\"20180805\\/thumb_0e992c8325dca09074570060b04a6043.jpg\"]', '0', '1', '1', '1', '1', '<h1 label=\"标题居中\" style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">oppo手机</h1><p>oppooppooppooppooppooppooppooppooppooppooppooppooppooppooppooppooppooppooppo</p><h1 label=\"标题居中\" style=\"white-space: normal; font-size: 32px; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">oppo手机</h1><p><br/></p>', '1533462524', '1533462524');
INSERT INTO `sh_goods` VALUES ('9', '锤子手机', '1808050551355b66c8a7a8e96', '5566.00', '670', '1', '15', '[\"20180805\\/083da4517200a68ddc421b1ced2dac76.jpg\",\"20180805\\/86c8a2541db6c809cb91eab6087cb674.jpg\"]', '[\"20180805\\/middle_083da4517200a68ddc421b1ced2dac76.jpg\",\"20180805\\/middle_86c8a2541db6c809cb91eab6087cb674.jpg\"]', '[\"20180805\\/thumb_083da4517200a68ddc421b1ced2dac76.jpg\",\"20180805\\/thumb_86c8a2541db6c809cb91eab6087cb674.jpg\"]', '0', '1', '1', '1', '1', '<h1 label=\"标题居中\" style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">锤子手机</h1><p>锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机锤子手机</p>', '1533462695', '1533462695');

-- ----------------------------
-- Table structure for sh_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `sh_goods_attr`;
CREATE TABLE `sh_goods_attr` (
  `goods_attr_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL,
  `attr_id` smallint(5) unsigned NOT NULL,
  `attr_value` varchar(255) DEFAULT '',
  `attr_price` decimal(10,2) DEFAULT NULL,
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`goods_attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goods_attr
-- ----------------------------
INSERT INTO `sh_goods_attr` VALUES ('1', '1', '1', '5.5', null, '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('2', '1', '2', '1500px', null, '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('3', '1', '3', '16g', '1600.00', '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('4', '1', '3', '128g', '12800.00', '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('5', '1', '3', '256g', '25600.00', '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('6', '1', '4', '黑色', '300.00', '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('7', '1', '4', '土豪金', '400.00', '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('8', '1', '4', '玫瑰金', '500.00', '1533280693', '1533280693');
INSERT INTO `sh_goods_attr` VALUES ('9', '2', '1', '4.5', null, '1533280953', '1533280953');
INSERT INTO `sh_goods_attr` VALUES ('10', '2', '2', '800px', null, '1533280953', '1533280953');
INSERT INTO `sh_goods_attr` VALUES ('11', '2', '3', '4G', '400.00', '1533280953', '1533280953');
INSERT INTO `sh_goods_attr` VALUES ('12', '2', '3', '16G', '1600.00', '1533280953', '1533280953');
INSERT INTO `sh_goods_attr` VALUES ('13', '2', '4', '黑色', '500.00', '1533280953', '1533280953');
INSERT INTO `sh_goods_attr` VALUES ('14', '2', '4', '玫瑰金', '1000.00', '1533280953', '1533280953');
INSERT INTO `sh_goods_attr` VALUES ('15', '3', '1', '5.5', null, '1533282992', '1533282992');
INSERT INTO `sh_goods_attr` VALUES ('16', '3', '2', '1500px', null, '1533282992', '1533282992');
INSERT INTO `sh_goods_attr` VALUES ('17', '3', '3', '16G', '160.00', '1533282992', '1533282992');
INSERT INTO `sh_goods_attr` VALUES ('18', '3', '3', '32G', '320.00', '1533282992', '1533282992');
INSERT INTO `sh_goods_attr` VALUES ('19', '3', '4', '黑色', '100.00', '1533282992', '1533282992');
INSERT INTO `sh_goods_attr` VALUES ('20', '3', '4', '土豪金', '200.00', '1533282992', '1533282992');
INSERT INTO `sh_goods_attr` VALUES ('21', '3', '4', '玫瑰金', '300.00', '1533282992', '1533282992');
INSERT INTO `sh_goods_attr` VALUES ('22', '4', '1', '6寸', null, '1533286987', '1533286987');
INSERT INTO `sh_goods_attr` VALUES ('23', '4', '2', '1500px', null, '1533286987', '1533286987');
INSERT INTO `sh_goods_attr` VALUES ('24', '4', '3', '32G', '200.00', '1533286987', '1533286987');
INSERT INTO `sh_goods_attr` VALUES ('25', '4', '3', '256G', '400.00', '1533286987', '1533286987');
INSERT INTO `sh_goods_attr` VALUES ('26', '4', '4', '土豪金', '200.00', '1533286987', '1533286987');
INSERT INTO `sh_goods_attr` VALUES ('27', '4', '4', '玫瑰金', '300.00', '1533286987', '1533286987');
INSERT INTO `sh_goods_attr` VALUES ('28', '4', '4', '黑色', '100.00', '1533286987', '1533286987');
INSERT INTO `sh_goods_attr` VALUES ('29', '5', '1', '4.5寸', null, '1533462076', '1533462076');
INSERT INTO `sh_goods_attr` VALUES ('30', '5', '2', '800px', null, '1533462076', '1533462076');
INSERT INTO `sh_goods_attr` VALUES ('31', '5', '3', '16G', '160.00', '1533462076', '1533462076');
INSERT INTO `sh_goods_attr` VALUES ('32', '5', '3', '32G', '320.00', '1533462076', '1533462076');
INSERT INTO `sh_goods_attr` VALUES ('33', '5', '4', '黑色', '500.00', '1533462076', '1533462076');
INSERT INTO `sh_goods_attr` VALUES ('34', '5', '4', '土豪金', '600.00', '1533462076', '1533462076');
INSERT INTO `sh_goods_attr` VALUES ('35', '5', '4', '玫瑰金', '700.00', '1533462076', '1533462076');
INSERT INTO `sh_goods_attr` VALUES ('36', '6', '1', '5.5', null, '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('37', '6', '2', '800px', null, '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('38', '6', '3', '32G', '320.00', '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('39', '6', '3', '16g', '160.00', '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('40', '6', '3', '256G', '2560.00', '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('41', '6', '4', '黑色', '600.00', '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('42', '6', '4', '土豪金', '700.00', '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('43', '6', '4', '玫瑰金', '800.00', '1533462224', '1533462224');
INSERT INTO `sh_goods_attr` VALUES ('44', '7', '1', '6.0', null, '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('45', '7', '2', '1500px', null, '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('46', '7', '3', '16', '160.00', '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('47', '7', '3', '32', '320.00', '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('48', '7', '3', '256', '2560.00', '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('49', '7', '4', '黑色', '500.00', '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('50', '7', '4', '土豪金', '600.00', '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('51', '7', '4', '玫瑰金', '700.00', '1533462360', '1533462360');
INSERT INTO `sh_goods_attr` VALUES ('52', '8', '1', '6', null, '1533462524', '1533462524');
INSERT INTO `sh_goods_attr` VALUES ('53', '8', '2', '800px', null, '1533462524', '1533462524');
INSERT INTO `sh_goods_attr` VALUES ('54', '8', '3', '16', '160.00', '1533462524', '1533462524');
INSERT INTO `sh_goods_attr` VALUES ('55', '8', '3', '32', '320.00', '1533462524', '1533462524');
INSERT INTO `sh_goods_attr` VALUES ('56', '8', '3', '64', '640.00', '1533462524', '1533462524');
INSERT INTO `sh_goods_attr` VALUES ('57', '8', '4', '黑色', '500.00', '1533462524', '1533462524');
INSERT INTO `sh_goods_attr` VALUES ('58', '8', '4', '玫瑰金', '700.00', '1533462524', '1533462524');
INSERT INTO `sh_goods_attr` VALUES ('59', '9', '1', '5.0', null, '1533462695', '1533462695');
INSERT INTO `sh_goods_attr` VALUES ('60', '9', '2', '800px', null, '1533462695', '1533462695');
INSERT INTO `sh_goods_attr` VALUES ('61', '9', '3', '32', '320.00', '1533462695', '1533462695');
INSERT INTO `sh_goods_attr` VALUES ('62', '9', '3', '64', '640.00', '1533462695', '1533462695');
INSERT INTO `sh_goods_attr` VALUES ('63', '9', '4', '黑色', '200.00', '1533462695', '1533462695');
INSERT INTO `sh_goods_attr` VALUES ('64', '9', '4', '土豪金', '300.00', '1533462695', '1533462695');
INSERT INTO `sh_goods_attr` VALUES ('65', '9', '4', '玫瑰金', '400.00', '1533462695', '1533462695');

-- ----------------------------
-- Table structure for sh_member
-- ----------------------------
DROP TABLE IF EXISTS `sh_member`;
CREATE TABLE `sh_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT '',
  `password` char(32) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `phone` char(15) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT '' COMMENT '显示qq的昵称',
  `openid` varchar(50) DEFAULT '',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_member
-- ----------------------------
INSERT INTO `sh_member` VALUES ('1', 'dabai', 'a93118af41e72f37febaef24adcaa121', '1259481020@qq.com', '', '', '', '1533348387', '1533375062');
INSERT INTO `sh_member` VALUES ('2', 'xiaobai', 'dd5222dbcc3404270124b25f90ad5dda', 'fsdfgsdf@qq.com', '', '', '', '1533348717', '1533348717');
INSERT INTO `sh_member` VALUES ('3', 'zbai', 'dd5222dbcc3404270124b25f90ad5dda', '345345@qq.com', '', '', '', '1533365072', '1533365072');
INSERT INTO `sh_member` VALUES ('4', 'laobai', 'dd5222dbcc3404270124b25f90ad5dda', '24fdg3234@qq.com', '', '', '', '1533365494', '1533365494');
INSERT INTO `sh_member` VALUES ('6', '', '', '', null, '追赶的人儿', '830012DB9CDC67FA4063B70C4C04E70B', '1533525543', '1533525543');

-- ----------------------------
-- Table structure for sh_order
-- ----------------------------
DROP TABLE IF EXISTS `sh_order`;
CREATE TABLE `sh_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(80) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `address` varchar(80) DEFAULT '',
  `phone` char(15) DEFAULT NULL,
  `zcode` varchar(6) DEFAULT NULL COMMENT '邮编',
  `total_price` decimal(10,2) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `pay_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-未付款 ,1-已付款',
  `send_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT ' 0-未发货 ， 1-已发货 ，2-已收货 ,3-退货中 4-退货成功',
  `ali_order_id` varchar(255) NOT NULL DEFAULT '' COMMENT '支付成功支付宝返回的订单号',
  `company` varchar(255) DEFAULT '',
  `number` varchar(100) DEFAULT '',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_order
-- ----------------------------
INSERT INTO `sh_order` VALUES ('1', '18080904235515338030355b6bfa1b7f613', '小李', '广州珠吉路吉山幼儿园', '13567899988', '334455', '59575.00', '1', '0', '0', '', '', '', '1533803035', '1533803035');
INSERT INTO `sh_order` VALUES ('2', '18080904270515338032255b6bfad9d0e51', '小泡', '广州珠吉路吉山幼儿园55', '13411112222', '111555', '106425.00', '1', '1', '1', '2018080921001004420200876138', 'yuantong', '887671643851404196', '1533803225', '1533808027');
INSERT INTO `sh_order` VALUES ('3', '18080904353415338037345b6bfcd6e435f', '小妹', '广州珠吉路吉山幼儿园', '13788889999', '789789', '608600.00', '1', '1', '0', '2018080921001004420200876139', '', '', '1533803734', '1533803734');
INSERT INTO `sh_order` VALUES ('4', '18080905173615338062565b6c06b026134', '凤姐888', '广州珠吉路吉山幼儿园', '14566667777', '456456', '71060.00', '1', '1', '0', '2018080921001004420200875953', '', '', '1533806256', '1533806256');

-- ----------------------------
-- Table structure for sh_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `sh_order_goods`;
CREATE TABLE `sh_order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `goods_attr_ids` varchar(30) DEFAULT NULL,
  `goods_number` int(5) DEFAULT NULL,
  `goods_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_order_goods
-- ----------------------------
INSERT INTO `sh_order_goods` VALUES ('1', '18080904235515338030355b6bfa1b7f613', '6', '40,41', '5', '59575.00');
INSERT INTO `sh_order_goods` VALUES ('2', '18080904270515338032255b6bfad9d0e51', '6', '38,41', '11', '106425.00');
INSERT INTO `sh_order_goods` VALUES ('3', '18080904353415338037345b6bfcd6e435f', '9', '61,63', '100', '608600.00');
INSERT INTO `sh_order_goods` VALUES ('4', '18080905173615338062565b6c06b026134', '7', '46,49', '11', '71060.00');

-- ----------------------------
-- Table structure for sh_role
-- ----------------------------
DROP TABLE IF EXISTS `sh_role`;
CREATE TABLE `sh_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(40) DEFAULT '',
  `auth_ids_list` varchar(100) DEFAULT '',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_role
-- ----------------------------
INSERT INTO `sh_role` VALUES ('1', '超级管理员', '*', '0', '0');
INSERT INTO `sh_role` VALUES ('2', '用户管理员', '1,2,3,7', '1533019495', '1533023340');

-- ----------------------------
-- Table structure for sh_type
-- ----------------------------
DROP TABLE IF EXISTS `sh_type`;
CREATE TABLE `sh_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(40) DEFAULT '',
  `mark` text,
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_type
-- ----------------------------
INSERT INTO `sh_type` VALUES ('1', '手机类型', '手机类型手机类型手机类型手机类型......', '1533090273', '1533091319');
INSERT INTO `sh_type` VALUES ('2', '书', '书............................           ', '1533263384', '1533263384');

-- ----------------------------
-- Table structure for sh_user
-- ----------------------------
DROP TABLE IF EXISTS `sh_user`;
CREATE TABLE `sh_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT '',
  `password` char(32) DEFAULT '',
  `role_id` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_user
-- ----------------------------
INSERT INTO `sh_user` VALUES ('5', 'admin', 'dd5222dbcc3404270124b25f90ad5dda', '1', '1532851557', '1532851557');
INSERT INTO `sh_user` VALUES ('7', 'dabai', 'dd5222dbcc3404270124b25f90ad5dda', '2', '1533024563', '1533024563');
