/*
Navicat MySQL Data Transfer

Source Server         : UserInfo
Source Server Version : 50158
Source Host           : localhost:8809
Source Database       : userinfo

Target Server Type    : MYSQL
Target Server Version : 50158
File Encoding         : 65001

Date: 2019-07-15 15:04:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(100) COLLATE utf8_bin NOT NULL,
  `session_data` varchar(100) COLLATE utf8_bin NOT NULL,
  `session_exprise` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('app1a9is86lre8h8b5d1sdckd6', 'username|s:9:\"huangjian\";age|i:24;email|s:16:\"hjzxzone@613.com\";', '1557390719');
