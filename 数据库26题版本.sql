-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        10.4.14-MariaDB - mariadb.org binary distribution
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 io 的数据库结构
CREATE DATABASE IF NOT EXISTS `io` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `io`;

-- 导出  表 io.groups 结构
CREATE TABLE IF NOT EXISTS `groups` (
  `name` text DEFAULT NULL,
  `passcode` text DEFAULT NULL,
  `answers` int(11) DEFAULT 1,
  `lockT` int(11) DEFAULT 0,
  `lockTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 正在导出表  io.groups 的数据：~2 rows (大约)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`name`, `passcode`, `answers`, `lockT`, `lockTime`) VALUES
	('master', 'mAs1Er', 3, 0, '2020-10-17 14:09:39');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- 导出  表 io.problems 结构
CREATE TABLE IF NOT EXISTS `problems` (
  `number` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `problem` longtext DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 正在导出表  io.problems 的数据：~11 rows (大约)
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` (`number`, `image`, `title`, `problem`, `answer`) VALUES
	(1, '', '', '', '0'),
	(2, '', '', '', '0'),
	(3, NULL, NULL, NULL, NULL),
	(4, NULL, NULL, NULL, NULL),
	(5, NULL, NULL, NULL, NULL),
	(6, NULL, NULL, NULL, NULL),
	(7, NULL, NULL, NULL, NULL),
	(8, NULL, NULL, NULL, NULL),
	(9, NULL, NULL, NULL, NULL),
	(10, NULL, NULL, NULL, NULL),
	(11, NULL, NULL, NULL, NULL),
	(12, NULL, NULL, NULL, NULL),
	(13, NULL, NULL, NULL, NULL),
	(14, NULL, NULL, NULL, NULL),
	(15, NULL, NULL, NULL, NULL),
	(16, NULL, NULL, NULL, NULL),
	(17, NULL, NULL, NULL, NULL),
	(18, NULL, NULL, NULL, NULL),
	(19, NULL, NULL, NULL, NULL),
	(20, NULL, NULL, NULL, NULL),
	(21, NULL, NULL, NULL, NULL),
	(22, NULL, NULL, NULL, NULL),
	(23, NULL, NULL, NULL, NULL),
	(24, NULL, NULL, NULL, NULL),
	(25, NULL, NULL, NULL, NULL),
	(26, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;

-- 导出  表 io.upload 结构
CREATE TABLE IF NOT EXISTS `upload` (
  `date` datetime DEFAULT NULL,
  `name` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `judge` int(11) DEFAULT NULL,
  `cheat` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 正在导出表  io.upload 的数据：~7 rows (大约)
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` (`date`, `name`, `content`, `judge`, `cheat`, `number`) VALUES
	('2020-10-16 19:09:49', 'master', '1234', 0, 0, 1),
	('2020-10-17 14:08:36', 'master', '0', 0, 0, 1),
	('2020-10-17 14:08:40', 'master', '0', 0, 0, 2),
	('2020-10-17 14:09:39', 'master', '0', 0, 0, 3),
	('2020-10-17 14:17:43', 'test3', '0', 0, 0, 1),
	('2020-10-17 14:22:56', 'test3', '0', 0, 0, 2),
	('2020-10-17 14:24:45', 'test3', '1', 0, 0, 3);
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
