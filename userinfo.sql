/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50158
Source Host           : localhost:3306
Source Database       : userinfo

Target Server Type    : MYSQL
Target Server Version : 50158
File Encoding         : 65001

Date: 2019-05-12 18:02:18
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', 'huangjian1', 'hjzxzone@163.com', '123');
INSERT INTO `userinfo` VALUES ('2', 'root', 'hjzxzone@163.com', '635722c69e658e6ac2eba387e5699a0e');
INSERT INTO `userinfo` VALUES ('3', 'huangjian123', 'hjzxzone@163.com', 'nIQGdPQmTyBYqqYd');
INSERT INTO `userinfo` VALUES ('4', 'qweqwe', '358289258@qq.com', '123456');
