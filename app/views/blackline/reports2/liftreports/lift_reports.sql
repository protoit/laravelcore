/*
Navicat MySQL Data Transfer

Source Server         : Proff Security - Prod
Source Server Version : 50531
Source Host           : proffsecurity.no:3306
Source Database       : proffwqr_protopersonal

Target Server Type    : MYSQL
Target Server Version : 50531
File Encoding         : 65001

Date: 2013-06-26 16:37:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lift_reports`
-- ----------------------------
DROP TABLE IF EXISTS `lift_reports`;
CREATE TABLE `lift_reports` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tjenestenr` int(10) DEFAULT NULL,
  `shiftjournal_id` int(255) DEFAULT NULL,
  `object_name` int(40) DEFAULT NULL,
  `object_address` varchar(30) DEFAULT NULL,
  `object_zip` int(6) DEFAULT NULL,
  `object_city` varchar(8) DEFAULT NULL,
  `location_name` varchar(30) DEFAULT NULL,
  `floor` int(12) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `warning_time` time DEFAULT NULL,
  `warning_method` varchar(30) DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `arrival_status` varchar(30) DEFAULT NULL,
  `depart_time` time DEFAULT NULL,
  `depart_status` varchar(30) DEFAULT NULL,
  `action_description` text CHARACTER SET latin1,
  `cause_description` text CHARACTER SET latin1,
  `other_comments` text CHARACTER SET latin1,
  `person_lift` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `person_lift_qty` int(5) DEFAULT NULL,
  `contact_feedback` enum('Yes','No') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lift_reports
-- ----------------------------
