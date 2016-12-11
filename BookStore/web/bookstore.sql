-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-29 17:48:35
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_admin`
--

CREATE TABLE IF NOT EXISTS `bookstore_admin` (
  `account` varchar(255) COLLATE utf8_bin NOT NULL,
  `passwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `bookstore_admin`
--

INSERT INTO `bookstore_admin` (`account`, `passwd`, `name`) VALUES
('admin1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin1');

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_books`
--

CREATE TABLE IF NOT EXISTS `bookstore_books` (
  `bookId` int(11) NOT NULL AUTO_INCREMENT,
  `boaId` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `ifNbrecommend` int(11) NOT NULL DEFAULT '0',
  `ifNbrank` int(11) NOT NULL DEFAULT '0',
  `ifHbrecommend` int(11) NOT NULL DEFAULT '0',
  `ifHbrank` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `commentNum` int(11) NOT NULL DEFAULT '0' COMMENT '评论总数',
  `saleNum` int(11) NOT NULL DEFAULT '0' COMMENT '销售总数',
  `addTime` datetime NOT NULL,
  `paperId` int(11) NOT NULL,
  `packingId` int(11) NOT NULL,
  PRIMARY KEY (`bookId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bookstore_books`
--

INSERT INTO `bookstore_books` (`bookId`, `boaId`, `price`, `ifNbrecommend`, `ifNbrank`, `ifHbrecommend`, `ifHbrank`, `amount`, `commentNum`, `saleNum`, `addTime`, `paperId`, `packingId`) VALUES
(1, 1, 23.10, 1, 1, 1, 1, 1, 0, 0, '2016-08-16 14:33:30', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_book_all`
--

CREATE TABLE IF NOT EXISTS `bookstore_book_all` (
  `boaId` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bookInfo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `price1` double(8,2) NOT NULL,
  `price2` double(8,2) NOT NULL,
  `simimg` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '缩略图路径',
  `img` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '大图路径',
  `author` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pubTime` varchar(64) COLLATE utf8_bin NOT NULL,
  `totalPage` int(11) NOT NULL,
  `totalWord` int(11) NOT NULL,
  `pubNum` int(11) NOT NULL COMMENT '出版次数',
  `ISBN` int(13) NOT NULL COMMENT '国家准许发行证号',
  PRIMARY KEY (`boaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bookstore_book_all`
--

INSERT INTO `bookstore_book_all` (`boaId`, `bookName`, `bookInfo`, `price1`, `price2`, `simimg`, `img`, `author`, `publisher`, `pubTime`, `totalPage`, `totalWord`, `pubNum`, `ISBN`) VALUES
(1, '解忧杂货店', '解忧杂货店\r\n《白夜行》后东野圭吾备受欢迎作品：不是推理小说，却更扣人心弦 ', 39.50, 23.10, NULL, '1.jpg', '东野圭吾', '南海出版社', '2014年5月', 291, 218000, 1, 1234);

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_hotbook_rank`
--

CREATE TABLE IF NOT EXISTS `bookstore_hotbook_rank` (
  `hbrank_id` int(255) NOT NULL AUTO_INCREMENT,
  `book_id` int(255) NOT NULL,
  `hbrank_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `hbrank_a` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`hbrank_id`),
  UNIQUE KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bookstore_hotbook_rank`
--

INSERT INTO `bookstore_hotbook_rank` (`hbrank_id`, `book_id`, `hbrank_name`, `hbrank_a`) VALUES
(1, 1, '魔方', './Application/Home/View/books/01.html');

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_hotbook_recommend`
--

CREATE TABLE IF NOT EXISTS `bookstore_hotbook_recommend` (
  `hbrecommend_id` int(255) NOT NULL AUTO_INCREMENT,
  `book_id` int(255) NOT NULL,
  `hbrecommend_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `hbrecommend_price` varchar(255) COLLATE utf8_bin NOT NULL,
  `hbrecommend_img_src` varchar(255) COLLATE utf8_bin NOT NULL,
  `hbrecommend_a` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`hbrecommend_id`),
  UNIQUE KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bookstore_hotbook_recommend`
--

INSERT INTO `bookstore_hotbook_recommend` (`hbrecommend_id`, `book_id`, `hbrecommend_name`, `hbrecommend_price`, `hbrecommend_img_src`, `hbrecommend_a`) VALUES
(1, 1, '魔方', '23.00', '../../../Public/images/魔方.jpg', './Application/Home/View/books/01.html');

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_newbook_rank`
--

CREATE TABLE IF NOT EXISTS `bookstore_newbook_rank` (
  `nbrank_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `nbrank_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `nbrank_a` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`nbrank_id`),
  UNIQUE KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bookstore_newbook_rank`
--

INSERT INTO `bookstore_newbook_rank` (`nbrank_id`, `book_id`, `nbrank_name`, `nbrank_a`) VALUES
(1, 1, '魔方', './Application/Home/View/books/01.html'),
(2, 2, '儿童电子琴', './Application/Home/View/books/02.html');

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_newbook_recommend`
--

CREATE TABLE IF NOT EXISTS `bookstore_newbook_recommend` (
  `nbr_id` int(11) NOT NULL AUTO_INCREMENT,
  `bookId` int(11) NOT NULL,
  `nbrecommend_img_src` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`nbr_id`),
  UNIQUE KEY `book_id` (`bookId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bookstore_newbook_recommend`
--

INSERT INTO `bookstore_newbook_recommend` (`nbr_id`, `bookId`, `nbrecommend_img_src`) VALUES
(1, 1, '1.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_packing`
--

CREATE TABLE IF NOT EXISTS `bookstore_packing` (
  `packingId` int(11) NOT NULL AUTO_INCREMENT,
  `packingSort` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`packingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_paper`
--

CREATE TABLE IF NOT EXISTS `bookstore_paper` (
  `paperId` int(11) NOT NULL AUTO_INCREMENT,
  `paperName` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`paperId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bookstore_user`
--

CREATE TABLE IF NOT EXISTS `bookstore_user` (
  `account` varchar(255) COLLATE utf8_bin NOT NULL,
  `passwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `sex` varchar(255) COLLATE utf8_bin NOT NULL,
  `registeration_date` datetime NOT NULL,
  PRIMARY KEY (`account`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `bookstore_user`
--

INSERT INTO `bookstore_user` (`account`, `passwd`, `username`, `sex`, `registeration_date`) VALUES
('lyj1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '梁寓杰', '男', '2016-08-03 16:56:41'),
('lyj6', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '梁寓杰', '男', '2016-08-03 16:47:01'),
('lyj7', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '梁寓杰', '男', '2016-08-03 16:34:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
