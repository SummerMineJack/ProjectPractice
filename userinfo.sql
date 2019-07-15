/*
Navicat MySQL Data Transfer

Source Server         : UserInfo
Source Server Version : 50158
Source Host           : localhost:8809
Source Database       : userinfo

Target Server Type    : MYSQL
Target Server Version : 50158
File Encoding         : 65001

Date: 2019-07-15 15:04:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `useremail` varchar(50) COLLATE utf8_bin NOT NULL,
  `userpassword` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', 'huangjian1', 'hjzxzone@163.com', '123');
INSERT INTO `userinfo` VALUES ('2', '黄俭', 'hjzxzone@163.com', '635722c69e658e6ac2eba387e5699a0e');
INSERT INTO `userinfo` VALUES ('3', 'huangjian123', 'hjzxzone@163.com', 'nIQGdPQmTyBYqqYd');
INSERT INTO `userinfo` VALUES ('4', 'apple', '358289258@11.com', '123213');
INSERT INTO `userinfo` VALUES ('5', 'oragner', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('6', 'Liucy', '358289258@11.com', '123213');
INSERT INTO `userinfo` VALUES ('7', 'Liucys', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('8', 'bobs', '358289258@11.com', '123213');
INSERT INTO `userinfo` VALUES ('9', 'bob', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('10', 'clark', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('11', 'huang', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('12', 'jian', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('13', 'coco', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('14', 'lucy', 'dhaihusdiaji@.com', '123123');
INSERT INTO `userinfo` VALUES ('15', 'jack', 'dhaihusdiaji@.com', '123123');
