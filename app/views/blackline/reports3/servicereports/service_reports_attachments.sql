/*
Navicat MySQL Data Transfer

Source Server         : Proff Security - Prod
Source Server Version : 50531
Source Host           : proffsecurity.no:3306
Source Database       : proffwqr_protopersonal

Target Server Type    : MYSQL
Target Server Version : 50531
File Encoding         : 65001

Date: 2013-06-27 15:31:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `service_reports_attachments`
-- ----------------------------
DROP TABLE IF EXISTS `service_reports_attachments`;
CREATE TABLE `service_reports_attachments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `attachment_url` varchar(255) DEFAULT NULL,
  `service_id` int(255) DEFAULT NULL,
  `service_id_linked_reports` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_reports_attachments
-- ----------------------------
