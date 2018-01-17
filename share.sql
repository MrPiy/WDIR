-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 01 月 17 日 17:21
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `share`
--

-- --------------------------------------------------------

--
-- 表的结构 `share_count`
--

CREATE TABLE IF NOT EXISTS `share_count` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(128) NOT NULL,
  `ip` varchar(128) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `share_count`
--

INSERT INTO `share_count` (`cid`, `short`, `ip`, `time`) VALUES
(1, '212c09c6da74d1d7b47aeea2220a317acf4b23f10c1d2ac733df3a9762b57a6a', '127.0.0.1', 1516209157),
(2, '212c09c6da74d1d7b47aeea2220a317acf4b23f10c1d2ac733df3a9762b57a6a', '127.0.0.1', 1516209207),
(3, '212c09c6da74d1d7b47aeea2220a317acf4b23f10c1d2ac733df3a9762b57a6a', '127.0.0.1', 1516209242),
(4, '212c09c6da74d1d7b47aeea2220a317acf4b23f10c1d2ac733df3a9762b57a6a', '127.0.0.1', 1516209295),
(5, '212c09c6da74d1d7b47aeea2220a317acf4b23f10c1d2ac733df3a9762b57a6a', '127.0.0.1', 1516209298),
(6, '212c09c6da74d1d7b47aeea2220a317acf4b23f10c1d2ac733df3a9762b57a6a', '127.0.0.1', 1516209302);

-- --------------------------------------------------------

--
-- 表的结构 `share_share`
--

CREATE TABLE IF NOT EXISTS `share_share` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `short` varchar(128) NOT NULL,
  `type` int(11) NOT NULL COMMENT '默认文件[以后设置]',
  `file` text NOT NULL,
  `password` varchar(128) NOT NULL,
  `count` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `share_share`
--

INSERT INTO `share_share` (`sid`, `short`, `type`, `file`, `password`, `count`, `time`) VALUES
(1, '1d6994f1adae4b3672153fa68be2b1ec', 0, './a.png', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 1516206260),
(2, 'a3a74fdb29ec0e82c05a739468840228', 0, './a.png', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 1516206666),
(3, 'db6c4644f4d760d0280b3be1f7f6edd6', 0, './a.png', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 1516206680),
(4, 'f1de07a9a64d8120a92ca82fbc734d89', 0, './a.png', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 1516206691),
(5, 'c3d2b5f9fa93313fd2b3c8e49e66a11f', 0, './a.png', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 1516206702),
(25, 'f383bff606b6cca5be543740c6ab9916f08029d8d5682bbe6f59a6946a426760', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209298),
(7, 'f75d9f0b014d3dfad8b13dc81597ab28', 0, './a.png', '', 0, 1516206770),
(8, '83db6a7119b8dedffe78bdfed587834f', 0, './a.png', '', 0, 1516206848),
(9, '203c9ad28a955ac81bc9da463f9d7de3', 0, './a.png', '', 0, 1516206900),
(10, '1', 0, './a.png', '', 0, 1516206903),
(11, '55c25660ef8391454f0fbb34c58d4a0a', 0, './a.png', '', 0, 1516207030),
(12, 'e4e18292b9bfe7f04d2cfe567639570454d570705b66288113a77b561808ee5f', 0, './a.png', '', 0, 1516207113),
(13, '49cc8669d0ded515173c273ffdf36272ede85250769f46e4d267d7704a4b26ca', 0, './a.png', '', 0, 1516207117),
(14, 'f339b3937c6c389ab970d26b9dde17860206d327158988703aa0237f840082eb', 0, './a.png', '', 0, 1516207705),
(15, '4afe35baac83dff3c181c0592eb03edb6c91bbcbd5631b0b1f0b378a3bb88723', 0, './a.png', '', 0, 1516207725),
(16, '5b0a716a956f457d09bbb194ec71a8801891e5d7652a9bd74861ddae19b67f5d', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516208954),
(17, '212c09c6da74d1d7b47aeea2220a317acf4b23f10c1d2ac733df3a9762b57a6a', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 6, 1516209000),
(18, '320e6eab40baa50e9b51956e82c5c4d3f2dc94ef2555d3a0fac161bb88cd2241', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209094),
(19, '99a8953d1c2480609edc0b123095f04cbaf158be8f4cfd8df7d8c4cb97592fbd', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209110),
(20, '2f817fcdc8f198e89bb52f65cf1b20cb367f511bf18621dafc76d39227352375', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209142),
(21, 'ffbba6781dd912fba6388baaabfb6bec1762b5c68b8059fdf3515ea00fc82a3a', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209157),
(22, 'a91736ed870bc90e1ccb6491bccb13578fcfbb2f2095433199d2f21bc263c7a3', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209207),
(23, '7c232522bb5b02417f5b9198e3a04bb11a40fe4a19c7c22af1fb86cabe6096f0', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209242),
(24, 'fca41c84c2ceaa381d1bc493045e3db3d66ac376a24dd80ecc37e99f0a11c64a', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209295),
(26, 'e81fb472f01f014edf8e59505baafc80a094f49bb6bd1e8077143e10f8fbd511', 0, './a.png', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 1516209302);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
