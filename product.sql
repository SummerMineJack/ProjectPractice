/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50158
Source Host           : localhost:3306
Source Database       : userinfo

Target Server Type    : MYSQL
Target Server Version : 50158
File Encoding         : 65001

Date: 2019-05-12 18:02:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `productPrice` varchar(100) NOT NULL,
  `productTip` varchar(100) NOT NULL,
  `productImg` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '商品1', '￥100.00', '商品1的介绍', '商品图片');
INSERT INTO `product` VALUES ('2', '商品2', '￥200.00', '商品2的介绍', '商品图片');
INSERT INTO `product` VALUES ('3', '商品3', '￥300.00', '商品3的介绍', '商品图片');
INSERT INTO `product` VALUES ('4', '商品4', '￥400.00', '商品4的介绍', '商品图片');
INSERT INTO `product` VALUES ('5', '商品5', '￥500.00', '商品5的介绍', '商品图片');
INSERT INTO `product` VALUES ('6', '商品6', '￥600.00', '商品6的介绍', '商品图片');
INSERT INTO `product` VALUES ('7', '商品7', '￥700.00', '商品7的介绍', '商品图片');
INSERT INTO `product` VALUES ('8', '商品8', '￥800.00', '商品8的介绍', '商品图片');
INSERT INTO `product` VALUES ('9', '商品9', '￥900.00', '商品9的介绍', '商品图片');
INSERT INTO `product` VALUES ('10', '商品10', '￥1000.00', '商品10的介绍', '商品图片');
INSERT INTO `product` VALUES ('11', '商品11', '￥1100.00', '商品10的介绍', '商品图片');
INSERT INTO `product` VALUES ('12', '商品12', '￥1200.00', '商品12的介绍', '商品图片');
INSERT INTO `product` VALUES ('13', '商品11', '￥1100.00', '商品12的介绍', '商品图片');
INSERT INTO `product` VALUES ('14', '', '', '', '');
INSERT INTO `product` VALUES ('15', '商品11', '￥1100.00', '商品12的介绍', '商品图片');
INSERT INTO `product` VALUES ('16', '', '', '', '');
INSERT INTO `product` VALUES ('17', '', '', '', '');
INSERT INTO `product` VALUES ('18', '', '', '', '');
INSERT INTO `product` VALUES ('19', '', '', '', '');
INSERT INTO `product` VALUES ('20', '', '', '', '');
INSERT INTO `product` VALUES ('21', '', '', '', '');
INSERT INTO `product` VALUES ('22', '商品11', '￥1100.00', '商品12的介绍', '商品图片');
INSERT INTO `product` VALUES ('23', '', '', '', '');
INSERT INTO `product` VALUES ('24', '商品11', '￥1100.00', '商品12的介绍', '商品图片');
INSERT INTO `product` VALUES ('25', '', '', '', '');
INSERT INTO `product` VALUES ('26', '商品10', '￥1000.00', '商品10的介绍', '商品图片');
INSERT INTO `product` VALUES ('27', '', '', '', '');
INSERT INTO `product` VALUES ('28', '', '', '', '');
INSERT INTO `product` VALUES ('29', '', '', '', '');
INSERT INTO `product` VALUES ('30', '', '', '', '');
