/*
Navicat MySQL Data Transfer

Source Server         : Proff Security - Prod
Source Server Version : 50531
Source Host           : proffsecurity.no:3306
Source Database       : proffwqr_protopersonal

Target Server Type    : MYSQL
Target Server Version : 50531
File Encoding         : 65001

Date: 2013-06-27 12:37:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `announce_reports`
-- ----------------------------
DROP TABLE IF EXISTS `announce_reports`;
CREATE TABLE `announce_reports` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tjenestenr` int(15) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `shiftjournal_id` int(255) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `organization_id` varchar(12) DEFAULT NULL,
  `company_phone` int(12) DEFAULT NULL,
  `company_address` varchar(100) DEFAULT NULL,
  `company_zipcode` int(6) DEFAULT NULL,
  `company_city` varchar(10) DEFAULT NULL,
  `announce_name` varchar(100) DEFAULT NULL,
  `announce_birth` int(13) DEFAULT NULL,
  `announce_address` varchar(100) DEFAULT NULL,
  `announce_zipcode` int(6) DEFAULT NULL,
  `announce_city` varchar(10) DEFAULT NULL,
  `announce_phone` int(12) DEFAULT NULL,
  `announce_ident` varchar(50) DEFAULT NULL,
  `announce_description` varchar(255) DEFAULT NULL,
  `parent_name` varchar(100) DEFAULT NULL,
  `parent_address` varchar(100) DEFAULT NULL,
  `parent_zipcode` int(6) DEFAULT NULL,
  `parent_city` varchar(10) DEFAULT NULL,
  `parent_phone` int(12) DEFAULT NULL,
  `action_where` varchar(50) DEFAULT NULL,
  `action_datetime` datetime DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL,
  `type_other` varchar(20) DEFAULT NULL,
  `announce_item` text,
  `announce_item_value` int(10) DEFAULT NULL,
  `announce_item_sum` int(30) DEFAULT NULL,
  `announce_item_status` varchar(10) DEFAULT NULL,
  `announce_item_status_other` varchar(20) DEFAULT NULL,
  `announce_item_action_other` varchar(20) DEFAULT NULL,
  `announce_item_action` varchar(30) DEFAULT NULL,
  `witness_name` varchar(100) DEFAULT NULL,
  `witness_address` varchar(50) DEFAULT NULL,
  `witness_zipcode` int(6) DEFAULT NULL,
  `witness_city` varchar(10) DEFAULT NULL,
  `witness_phone` int(12) DEFAULT NULL,
  `short_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of announce_reports
-- ----------------------------
