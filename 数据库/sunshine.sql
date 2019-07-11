-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 04 月 20 日 15:36
-- 服务器版本: 5.5.62
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sunshine`
--
CREATE DATABASE IF NOT EXISTS `sunshine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sunshine`;

-- --------------------------------------------------------

--
-- 表的结构 `blog_admin`
--

CREATE TABLE IF NOT EXISTS `blog_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `username` varchar(65) NOT NULL COMMENT '管理员密码',
  `password` char(32) NOT NULL COMMENT '管理员用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `blog_admin`
--

INSERT INTO `blog_admin` (`id`, `username`, `password`) VALUES
(1, 'sunshine', '0571749e2ac330a7455809c6b0e7af90'),
(3, 'wxy', 'bdbc994d934c23096e02a768984d7b36'),
(4, 'flb', 'f6bd25c7523008386b3080a251572c6e');

-- --------------------------------------------------------

--
-- 表的结构 `blog_article`
--

CREATE TABLE IF NOT EXISTS `blog_article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `desc` varchar(255) NOT NULL COMMENT '文章描述',
  `pic` varchar(100) DEFAULT NULL COMMENT '文章图片',
  `content` text NOT NULL COMMENT '文章内容',
  `cateid` mediumint(9) NOT NULL COMMENT '文章所属栏目id',
  `time` int(12) NOT NULL COMMENT '发表时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `blog_article`
--

INSERT INTO `blog_article` (`id`, `title`, `desc`, `pic`, `content`, `cateid`, `time`) VALUES
(16, '6', '6', './Public/Uploads/2019-04-15/5cb40cd16270d.jpg', '&lt;p&gt;7&lt;/p&gt;', 9, 0),
(17, 'sunshine', 'sunshine', './Public/Uploads/2019-04-15/5cb42f3fa61a9.jpg', '&lt;p&gt;sunshine&lt;/p&gt;', 7, 0),
(18, 'aaaaaa', 'aaaaaa', '', '&lt;p&gt;aaaaaaaaaa&lt;/p&gt;', 5, 0),
(20, '33333', '333333333333', './Public/Uploads/2019-04-15/5cb440ab57ff8.jpg', '&lt;p&gt;3333333333333333333333333333333333333333333333&lt;/p&gt;', 5, 0),
(21, '888888888888', '8888888888888888', './Public/Uploads/2019-04-15/5cb440ca54094.jpg', '&lt;p&gt;888888888888888&lt;/p&gt;', 7, 0),
(22, 'hhg', 'hhg', './Public/Uploads/2019-04-15/5cb445216830b.jpg', '&lt;p&gt;hhg&lt;/p&gt;', 7, 1555318049),
(23, 'ffffff', 'fffffffff', './Public/Uploads/2019-04-15/5cb4460ccaefb.jpg', '&lt;p&gt;ffffffffff&lt;/p&gt;', 6, 0);

-- --------------------------------------------------------

--
-- 表的结构 `blog_cate`
--

CREATE TABLE IF NOT EXISTS `blog_cate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `catename` varchar(65) NOT NULL COMMENT '分类名称',
  `sort` mediumint(9) NOT NULL DEFAULT '20' COMMENT '分类排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `blog_cate`
--

INSERT INTO `blog_cate` (`id`, `catename`, `sort`) VALUES
(5, '长篇小说', 20),
(6, '88888', 20),
(7, '散文', 20),
(9, '短篇小说', 20),
(10, '作文', 20);

-- --------------------------------------------------------

--
-- 表的结构 `blog_link`
--

CREATE TABLE IF NOT EXISTS `blog_link` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `sort` int(11) NOT NULL DEFAULT '18' COMMENT '排序',
  `title` varchar(65) NOT NULL COMMENT '链接标题',
  `url` varchar(100) NOT NULL COMMENT '链接地址',
  `desc` varchar(255) NOT NULL COMMENT '链接描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `blog_link`
--

INSERT INTO `blog_link` (`id`, `sort`, `title`, `url`, `desc`) VALUES
(19, 18, '百度', 'http://baidu.com', '百度'),
(20, 2, '小米官网', 'http://www.mi.com', '小米商场'),
(21, 1, 'thinkphp官网', 'http://www.thinkphp.cn', 'thinkphp官网'),
(24, 18, '个人博客网', 'http://www.sunshine.com', '个人博客网'),
(25, 3, '333333333', '1111111', '1111111111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
