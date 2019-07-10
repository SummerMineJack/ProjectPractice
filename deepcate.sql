/*
Navicat MySQL Data Transfer

Source Server         : UserInfo
Source Server Version : 50158
Source Host           : localhost:8809
Source Database       : userinfo

Target Server Type    : MYSQL
Target Server Version : 50158
File Encoding         : 65001

Date: 2019-07-10 17:26:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `deepcate`
-- ----------------------------
DROP TABLE IF EXISTS `deepcate`;
CREATE TABLE `deepcate` (
  `id` int(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `catename` varchar(255) NOT NULL,
  `cateorder` int(11) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of deepcate
-- ----------------------------
INSERT INTO `deepcate` VALUES ('1', '0', '新闻', '0', '0');
INSERT INTO `deepcate` VALUES ('2', '0', '图片', '0', '0');
INSERT INTO `deepcate` VALUES ('3', '1', '国内新闻', '0', '0');
INSERT INTO `deepcate` VALUES ('4', '1', '国际新闻', '0', '0');
INSERT INTO `deepcate` VALUES ('5', '3', '北京新闻', '0', '0');
INSERT INTO `deepcate` VALUES ('6', '4', '美国新闻', '0', '0');
INSERT INTO `deepcate` VALUES ('7', '2', '美女图片', '0', '0');
INSERT INTO `deepcate` VALUES ('8', '2', '风景图片', '0', '0');
INSERT INTO `deepcate` VALUES ('9', '7', '日韩明星', '0', '0');
INSERT INTO `deepcate` VALUES ('10', '9', '日本AV', '0', '0');
