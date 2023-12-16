-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for militaryofficersmess
DROP DATABASE IF EXISTS `hms`;
CREATE DATABASE IF NOT EXISTS `hms` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `hms`;

-- Dumping structure for table militaryofficersmess.tbl_admin
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` bigint(20) unsigned NOT NULL,
  `admin_name` varchar(500) DEFAULT NULL,
  `admin_email` varchar(500) NOT NULL,
  `admin_contact` varchar(500) NOT NULL,
  `admin_password` varchar(500) NOT NULL,
  `admin_address` varchar(500) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table militaryofficersmess.tbl_admin: ~0 rows (approximately)
DELETE FROM `tbl_admin`;
INSERT INTO `tbl_admin` (`id`, `admin_name`, `admin_email`, `admin_contact`, `admin_password`, `admin_address`, `status`, `created`, `updated`) VALUES
	(1, 'Dake Company', 'admin@gmail.com', '9876543221', '$2y$12$lMp3Ej7KH/UrYzok9MYyKu6I4jKYk5GCtC29HcD/ZM1TnKM2Kc/Om', 'Pune', 1, '2022-04-23 09:06:40', '2023-08-22 10:50:30');

-- Dumping structure for table militaryofficersmess.tbl_logs
DROP TABLE IF EXISTS `tbl_logs`;
CREATE TABLE IF NOT EXISTS `tbl_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `of_id` int(11) DEFAULT NULL,
  `log_of` int(11) DEFAULT NULL,
  `action` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table militaryofficersmess.tbl_logs: ~9 rows (approximately)
DELETE FROM `tbl_logs`;
INSERT INTO `tbl_logs` (`id`, `of_id`, `log_of`, `action`, `status`, `created`, `updated`) VALUES
	(1, 1, 1, 'Admin ID 1 and name Dake Company added sub admin name Sukrut', 1, '2023-08-22 10:46:12', '2023-08-22 10:46:12'),
	(2, 1, 1, 'Admin ID 1 name Dake Company updated project details to project name Dake Company', 1, '2023-08-22 10:49:47', '2023-08-22 10:49:47'),
	(3, 1, 1, 'Admin ID 1 name Dake Company updated project details to project name Dake Company', 1, '2023-08-22 10:49:55', '2023-08-22 10:49:55'),
	(4, 1, 1, 'Admin ID 1 name Dake Company updated email / contact of admin name Dake Companyq', 1, '2023-08-22 10:50:23', '2023-08-22 10:50:23'),
	(5, 1, 1, 'Admin ID 1 name Dake Company updated email / contact of admin name Dake Company', 1, '2023-08-22 10:50:30', '2023-08-22 10:50:30'),
	(6, 1, 1, 'Admin ID 1 name Dake Company updated project details to project name Dake Company', 1, '2023-08-22 10:56:45', '2023-08-22 10:56:45'),
	(7, 1, 1, 'Admin ID 1 name Dake Company updated project details to project name Military Officers Mess', 1, '2023-09-26 12:47:44', '2023-09-26 12:47:44'),
	(8, 1, 1, 'Admin ID 1 name Dake Company updated project details to project name MILIT OFFICERS MESS', 1, '2023-09-26 15:55:32', '2023-09-26 15:55:32'),
	(9, 1, 1, 'Admin ID 1 name Dake Company updated project details to project name MILIT OFFICERS MESS', 1, '2023-09-26 15:55:38', '2023-09-26 15:55:38'),
	(10, NULL, 1, 'Admin ID  and name  added officer with name 0', 1, '2023-09-27 18:41:20', '2023-09-27 18:41:20'),
	(11, NULL, 1, 'Admin ID  and name  added officer with name 0', 1, '2023-09-27 18:41:20', '2023-09-27 18:41:20');

-- Dumping structure for table militaryofficersmess.tbl_master_settings
DROP TABLE IF EXISTS `tbl_master_settings`;
CREATE TABLE IF NOT EXISTS `tbl_master_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(500) DEFAULT NULL,
  `project_logo` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table militaryofficersmess.tbl_master_settings: ~0 rows (approximately)
DELETE FROM `tbl_master_settings`;
INSERT INTO `tbl_master_settings` (`id`, `project_name`, `project_logo`, `status`, `created`, `updated`) VALUES
	(1, 'MILIT OFFICERS MESS', '1695723938447.jpeg', 1, '2023-08-22 10:03:26', '2023-09-26 15:55:38');

-- Dumping structure for table militaryofficersmess.tbl_members
DROP TABLE IF EXISTS `tbl_members`;
CREATE TABLE IF NOT EXISTS `tbl_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `user_type` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `ic_no` varchar(50) DEFAULT NULL,
  `member_type` varchar(50) DEFAULT NULL,
  `messing` varchar(50) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `faculty` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `sub_course` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table militaryofficersmess.tbl_members: ~1 rows (approximately)
DELETE FROM `tbl_members`;
INSERT INTO `tbl_members` (`id`, `name`, `user_type`, `email`, `contact`, `ic_no`, `member_type`, `messing`, `rank`, `faculty`, `course`, `sub_course`, `status`, `created`, `updated`) VALUES
	(1, 'Sukrut', '1', 'sukrut@gmail.com', '9236487245', 'IC465454', 'Staff', 'Living Out', 'Captain', 'Army', 'B.Sc(Computer)', 'Army', 1, '2023-09-26 15:32:41', '2023-09-26 16:45:26');

-- Dumping structure for table militaryofficersmess.tbl_monthlymessdetails
DROP TABLE IF EXISTS `tbl_monthlymessdetails`;
CREATE TABLE IF NOT EXISTS `tbl_monthlymessdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `course` varchar(500) DEFAULT NULL,
  `ic_code` varchar(500) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `bill_of_month` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `mess_subscription` varchar(50) DEFAULT NULL,
  `sports` varchar(50) DEFAULT NULL,
  `bar` varchar(50) DEFAULT NULL,
  `mess_maintainance` varchar(50) DEFAULT NULL,
  `officers_institute` varchar(500) DEFAULT NULL,
  `party_bar` varchar(500) DEFAULT NULL,
  `mess_service` varchar(500) DEFAULT NULL,
  `ladies_club` varchar(50) DEFAULT NULL,
  `room_bearer` varchar(50) DEFAULT NULL,
  `daily_messing` varchar(50) DEFAULT NULL,
  `officers_cafeteria` varchar(50) DEFAULT NULL,
  `linen` varchar(50) DEFAULT NULL,
  `extra_messing` varchar(50) DEFAULT NULL,
  `srf_fund` varchar(50) DEFAULT NULL,
  `cleaning_gear` varchar(50) DEFAULT NULL,
  `party_messsing` varchar(500) DEFAULT NULL,
  `entert_ainment` varchar(500) DEFAULT NULL,
  `room_rent` varchar(500) DEFAULT NULL,
  `garden` varchar(50) DEFAULT NULL,
  `library` varchar(50) DEFAULT NULL,
  `breakage` varchar(50) DEFAULT NULL,
  `sarang` varchar(50) DEFAULT NULL,
  `hospitality_fund` varchar(500) DEFAULT NULL,
  `emp_contingency` varchar(500) DEFAULT NULL,
  `social_wellbeing` varchar(500) DEFAULT NULL,
  `memento` varchar(50) DEFAULT NULL,
  `security_deposit` varchar(50) DEFAULT NULL,
  `refund` varchar(50) DEFAULT NULL,
  `penalty` varchar(50) DEFAULT NULL,
  `arrears` varchar(50) DEFAULT NULL,
  `qm_packing` varchar(50) DEFAULT NULL,
  `no_of_days` varchar(50) DEFAULT NULL,
  `garbage_collection` varchar(50) DEFAULT NULL,
  `barber_recovery` varchar(50) DEFAULT NULL,
  `credit_debit` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table militaryofficersmess.tbl_monthlymessdetails: ~1 rows (approximately)
DELETE FROM `tbl_monthlymessdetails`;
INSERT INTO `tbl_monthlymessdetails` (`id`, `member_id`, `course`, `ic_code`, `rank`, `bill_of_month`, `date`, `mess_subscription`, `sports`, `bar`, `mess_maintainance`, `officers_institute`, `party_bar`, `mess_service`, `ladies_club`, `room_bearer`, `daily_messing`, `officers_cafeteria`, `linen`, `extra_messing`, `srf_fund`, `cleaning_gear`, `party_messsing`, `entert_ainment`, `room_rent`, `garden`, `library`, `breakage`, `sarang`, `hospitality_fund`, `emp_contingency`, `social_wellbeing`, `memento`, `security_deposit`, `refund`, `penalty`, `arrears`, `qm_packing`, `no_of_days`, `garbage_collection`, `barber_recovery`, `credit_debit`, `total`, `status`, `created`, `updated`, `type`) VALUES
	(37, 1, 'B.Sc(Computer)', 'IC-0001', 'Captain', 'JAN', '2023-09-01', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1000', 1, '2023-09-28 11:37:38', '2023-09-28 11:37:38', 1),
	(39, 1, 'B.Sc(Computer)', 'IC-0002', 'Captain', 'july', '2023-09-28', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '68', 1, '2023-09-28 14:25:40', '2023-09-28 14:25:40', 1);

-- Dumping structure for table militaryofficersmess.tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table militaryofficersmess.tbl_users: ~0 rows (approximately)
DELETE FROM `tbl_users`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
