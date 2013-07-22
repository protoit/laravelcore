/*
Navicat MySQL Data Transfer

Source Server         : Proff Security - Prod
Source Server Version : 50531
Source Host           : proffsecurity.no:3306
Source Database       : proffwqr_protopersonal

Target Server Type    : MYSQL
Target Server Version : 50531
File Encoding         : 65001

Date: 2013-06-27 15:31:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `service_reports`
-- ----------------------------
DROP TABLE IF EXISTS `service_reports`;
CREATE TABLE `service_reports` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `shiftjournal_id` int(255) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `company_address` varchar(80) DEFAULT NULL,
  `company_zipcode` varchar(10) DEFAULT NULL,
  `company_city` varchar(12) DEFAULT NULL,
  `object` varchar(80) NOT NULL,
  `attachment_qty` varchar(80) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `approvedby` varchar(30) DEFAULT NULL,
  `approveddate` datetime DEFAULT NULL,
  `status` enum('new','approved','approval','deleted') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_reports
-- ----------------------------
