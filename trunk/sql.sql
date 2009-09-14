-- phpMyAdmin SQL Dump
-- version 2.6.4-pl4
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ����� ��������: ��� 13 2009 �., 17:36
-- ������ �������: 5.0.16
-- ������ PHP: 5.1.1
-- 
-- ��: `adnets`
-- 

-- --------------------------------------------------------

-- 
-- ��������� ������� `adwerts`
-- 

DROP TABLE IF EXISTS `adwerts`;
CREATE TABLE `adwerts` (
  `id` int(11) NOT NULL auto_increment,
  `owner_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `icq` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `wmr` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `intop` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- ���� ������ ������� `adwerts`
-- 

INSERT INTO `adwerts` (`id`, `owner_id`, `email`, `icq`, `password`, `status`, `wmr`, `regdate`, `balance`, `intop`) VALUES (1, 0, '2freak@inbox.ru', '123456', '202cb962ac59075b964b07152d234b70', 1, 'R1234567890', '2009-08-23 14:34:49', '0.00', '');

-- --------------------------------------------------------

-- 
-- ��������� ������� `category`
-- 

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `category`
-- 

INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (1, '�����', '0.26', 1);

-- --------------------------------------------------------

-- 
-- ��������� ������� `news`
-- 

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `full` text NOT NULL,
  `type` int(11) NOT NULL,
  `status` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `news`
-- 

INSERT INTO `news` (`id`, `title`, `preview`, `full`, `type`, `status`, `date`) VALUES (1, '����', '���� ���� ���� ���� ', '���� ���� ���� ���� ���� ���� ���� ���� ', 1, 1, '2009-08-24 01:58:33');

-- --------------------------------------------------------

-- 
-- ��������� ������� `payments`
-- 

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL auto_increment,
  `adid` int(11) NOT NULL,
  `wmr` varchar(50) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `payments`
-- 

INSERT INTO `payments` (`id`, `adid`, `wmr`, `sum`, `status`, `date`) VALUES (1, 1, 'R123456789', '100.00', 1, '2009-09-13 15:38:14');

-- --------------------------------------------------------

-- 
-- ��������� ������� `playgrounds`
-- 

DROP TABLE IF EXISTS `playgrounds`;
CREATE TABLE `playgrounds` (
  `id` int(11) NOT NULL auto_increment,
  `adid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL default '-1',
  `category` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `playgrounds`
-- 

INSERT INTO `playgrounds` (`id`, `adid`, `title`, `url`, `status`, `category`, `date`) VALUES (1, 1, 'google.com', 'google.com', -1, '', '2009-09-13 14:21:52');
