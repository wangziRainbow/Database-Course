-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2020-06-16 12:27:05
-- 服务器版本: 5.5.62-log
-- PHP 版本: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `project1`
--

-- --------------------------------------------------------

--
-- 表的结构 `termbase`
--

CREATE TABLE IF NOT EXISTS `termbase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ST` varchar(45) NOT NULL,
  `TT` varchar(45) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `uploadTime` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `termbase`
--

INSERT INTO `termbase` (`id`, `ST`, `TT`, `UserName`, `uploadTime`, `category`) VALUES
(1, '诗经', 'Shi Jing', 'Echo', '2020年6月15日', '非物质'),
(2, '长城', 'The Great Wall', 'Echo', '2020年6月15日', '物质'),
(3, '草书', 'Cursive Script', 'Echo', '2020年6月15日', '非物质'),
(4, '大学', 'Great Learning', 'Echo', '2020年6月15日', '非物质'),
(5, '鼎', 'Ding', 'Echo', '2020年6月15日', '物质'),
(6, '四书', 'Four Books', 'Echo', '2020年6月15日', '物质'),
(7, '节气', 'The Twenty-four Solar Terms', 'Echo', '2020年6月15日', '非物质');

-- --------------------------------------------------------

--
-- 表的结构 `translationmemory`
--

CREATE TABLE IF NOT EXISTS `translationmemory` (
  `id` int(11) NOT NULL,
  `ST` varchar(45) NOT NULL,
  `TT` varchar(45) NOT NULL,
  `uploadtime` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `authority` varchar(45) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`Name`, `password`, `Email`, `authority`) VALUES
('Echo', 'Echo123', 'Echo1417227257@163.com', 'administritor');

-- --------------------------------------------------------

--
-- 表的结构 `术语表`
--

CREATE TABLE IF NOT EXISTS `术语表` (
  `id` int(11) NOT NULL,
  `原文` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `译文` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `上传用户` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `上传日期` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `分类` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- 转存表中的数据 `术语表`
--

INSERT INTO `术语表` (`id`, `原文`, `译文`, `上传用户`, `上传日期`, `分类`) VALUES
(1, '诗经', 'Shi Jing', 'Echo', '2020年6月15日', '非物质'),
(2, '长城', 'The Great Wall', 'Echo', '2020年6月15日', '物质'),
(3, '草书', 'Cursive Script', 'Echo', '2020年6月15日', '非物质'),
(4, '大学', 'Great Learning', 'Echo', '2020年6月15日', '非物质'),
(5, '鼎', 'Ding', 'Echo', '2020年6月15日', '物质'),
(6, '四书', 'Four Books', 'Echo', '2020年6月15日', '物质');

-- --------------------------------------------------------

--
-- 表的结构 `用户表`
--

CREATE TABLE IF NOT EXISTS `用户表` (
  `用户名` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `密码` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `邮箱` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`邮箱`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- 转存表中的数据 `用户表`
--

INSERT INTO `用户表` (`用户名`, `密码`, `邮箱`) VALUES
('Echo', 'echo123', 'echo1417227257@163.com');

-- --------------------------------------------------------

--
-- 表的结构 `翻译记忆库`
--

CREATE TABLE IF NOT EXISTS `翻译记忆库` (
  `id` int(11) NOT NULL,
  `原文` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `译文` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `上传时间` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
