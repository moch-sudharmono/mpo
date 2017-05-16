-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_mpo2017
CREATE DATABASE IF NOT EXISTS `db_mpo2017` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_mpo2017`;


-- Dumping structure for table db_mpo2017.tbl_auth_acl
DROP TABLE IF EXISTS `tbl_auth_acl`;
CREATE TABLE IF NOT EXISTS `tbl_auth_acl` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ai`),
  KEY `action_id` (`action_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_auth_acl_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `tbl_auth_acl_actions` (`action_id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_auth_acl_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_acl: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_auth_acl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_acl` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_acl_actions
DROP TABLE IF EXISTS `tbl_auth_acl_actions`;
CREATE TABLE IF NOT EXISTS `tbl_auth_acl_actions` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`action_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `tbl_auth_acl_actions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_auth_acl_categories` (`category_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_acl_actions: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_auth_acl_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_acl_actions` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_acl_categories
DROP TABLE IF EXISTS `tbl_auth_acl_categories`;
CREATE TABLE IF NOT EXISTS `tbl_auth_acl_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_code` (`category_code`),
  UNIQUE KEY `category_desc` (`category_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_acl_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_auth_acl_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_acl_categories` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_ci_sessions
DROP TABLE IF EXISTS `tbl_auth_ci_sessions`;
CREATE TABLE IF NOT EXISTS `tbl_auth_ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_ci_sessions: 0 rows
/*!40000 ALTER TABLE `tbl_auth_ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_ci_sessions` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_denied_access
DROP TABLE IF EXISTS `tbl_auth_denied_access`;
CREATE TABLE IF NOT EXISTS `tbl_auth_denied_access` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_denied_access: 0 rows
/*!40000 ALTER TABLE `tbl_auth_denied_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_denied_access` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_ips_on_hold
DROP TABLE IF EXISTS `tbl_auth_ips_on_hold`;
CREATE TABLE IF NOT EXISTS `tbl_auth_ips_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_ips_on_hold: 0 rows
/*!40000 ALTER TABLE `tbl_auth_ips_on_hold` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_ips_on_hold` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_login_errors
DROP TABLE IF EXISTS `tbl_auth_login_errors`;
CREATE TABLE IF NOT EXISTS `tbl_auth_login_errors` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_login_errors: 1 rows
/*!40000 ALTER TABLE `tbl_auth_login_errors` DISABLE KEYS */;
INSERT INTO `tbl_auth_login_errors` (`ai`, `username_or_email`, `ip_address`, `time`) VALUES
	(151, 'selamet', '::1', '2017-05-14 07:59:42');
/*!40000 ALTER TABLE `tbl_auth_login_errors` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_sessions
DROP TABLE IF EXISTS `tbl_auth_sessions`;
CREATE TABLE IF NOT EXISTS `tbl_auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_sessions: 3 rows
/*!40000 ALTER TABLE `tbl_auth_sessions` DISABLE KEYS */;
INSERT INTO `tbl_auth_sessions` (`id`, `user_id`, `login_time`, `modified_at`, `ip_address`, `user_agent`) VALUES
	('8q0omhhu9kd1bpn6qrs6e28besc4o2gq', 130542421, '2017-05-16 18:27:28', '2017-05-16 23:27:28', '::1', 'Chrome 58.0.3029.110 on Windows 10'),
	('mk521qimqf7krvk1349hjr72oj73lb80', 691189224, '2017-05-16 07:33:24', '2017-05-16 13:31:55', '::1', 'Chrome 58.0.3029.110 on Windows 10'),
	('6k981p6nikamc9de2aoiusop3p6q5dtb', 130542421, '2017-05-16 18:17:41', '2017-05-16 23:22:45', '::1', 'Chrome 58.0.3029.110 on Windows 10');
/*!40000 ALTER TABLE `tbl_auth_sessions` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_auth_username_or_email_on_hold
DROP TABLE IF EXISTS `tbl_auth_username_or_email_on_hold`;
CREATE TABLE IF NOT EXISTS `tbl_auth_username_or_email_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_auth_username_or_email_on_hold: 0 rows
/*!40000 ALTER TABLE `tbl_auth_username_or_email_on_hold` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_username_or_email_on_hold` ENABLE KEYS */;


-- Dumping structure for table db_mpo2017.tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(10) unsigned NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `auth_level` tinyint(3) unsigned NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_mpo2017.tbl_users: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `auth_level`, `banned`, `passwd`, `passwd_recovery_code`, `passwd_recovery_date`, `passwd_modified_at`, `last_login`, `created_at`, `modified_at`) VALUES
	(130542421, 'admin', 'admin@email.com', 9, '0', '$2y$11$4sZOOujc9Fk8O7VbJyTXF.RHpYizq3OTJ9KPCp.L4Lap5eSb6z9Iq', NULL, NULL, NULL, '2017-05-16 18:27:28', '2017-05-08 16:04:25', '2017-05-16 23:27:28');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;


-- Dumping structure for trigger db_mpo2017.trg_auth_ca_passwd_trigger
DROP TRIGGER IF EXISTS `trg_auth_ca_passwd_trigger`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_auth_ca_passwd_trigger` BEFORE UPDATE ON `tbl_users` FOR EACH ROW BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
        SET NEW.passwd_modified_at = NOW();
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
