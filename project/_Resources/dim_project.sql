/*
 Navicat MySQL Data Transfer

 Source Server         : 127.0.0.1-3306
 Source Server Type    : MySQL
 Source Server Version : 50534
 Source Host           : 127.0.0.1:3306
 Source Schema         : dim_project

 Target Server Type    : MySQL
 Target Server Version : 50534
 File Encoding         : 65001

 Date: 06/09/2019 10:53:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for content
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `detail` text,
  `imagesPath` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of content
-- ----------------------------
BEGIN;
INSERT INTO `content` VALUES (2, 'content 1', '<p>2</p>\r\n', '3d-wide-wallpaper-1280x800-004.jpg', 1, '0000-00-00', '0000-00-00');
INSERT INTO `content` VALUES (3, '22', '', '4943.jpg', 1, '0000-00-00', '0000-00-00');
INSERT INTO `content` VALUES (4, '23', '', '5337.jpg', 1, '0000-00-00', '0000-00-00');
COMMIT;

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `imagesPath` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slide
-- ----------------------------
BEGIN;
INSERT INTO `slide` VALUES (1, '1', '3524.jpg', 1);
INSERT INTO `slide` VALUES (3, '2', '4943.jpg', 1);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'u', 'u');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
