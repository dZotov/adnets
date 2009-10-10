-- phpMyAdmin SQL Dump
-- version 2.6.4-pl4
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ����� ��������: ��� 07 2009 �., 22:36
-- ������ �������: 5.0.18
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
  `owner_id` int(11) default '0',
  `email` varchar(100) default NULL,
  `icq` varchar(20) default NULL,
  `password` varchar(255) default NULL,
  `status` int(1) default '0',
  `wmr` varchar(50) default NULL,
  `regdate` datetime default NULL,
  `balance` decimal(10,2) default '0.00',
  `intop` varchar(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- ���� ������ ������� `adwerts`
-- 

INSERT INTO `adwerts` (`id`, `owner_id`, `email`, `icq`, `password`, `status`, `wmr`, `regdate`, `balance`, `intop`) VALUES (1, 0, '2freak@inbox.ru', '123456', '202cb962ac59075b964b07152d234b70', 1, 'R1234567890', '2009-08-23 14:34:49', '0.00', '');
INSERT INTO `adwerts` (`id`, `owner_id`, `email`, `icq`, `password`, `status`, `wmr`, `regdate`, `balance`, `intop`) VALUES (6, 1, 'for.Zotov@inbox.ru', '', '202cb962ac59075b964b07152d234b70', 1, 'R123', '2009-09-14 22:49:31', '0.00', '');

-- --------------------------------------------------------

-- 
-- ��������� ������� `balance`
-- 

DROP TABLE IF EXISTS `balance`;
CREATE TABLE `balance` (
  `id` int(15) NOT NULL auto_increment,
  `adid` int(11) default '0',
  `sum` decimal(10,2) default '0.00',
  `wmr` varchar(50) default NULL,
  `status` int(1) default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- ���� ������ ������� `balance`
-- 


-- --------------------------------------------------------

-- 
-- ��������� ������� `blocks`
-- 

DROP TABLE IF EXISTS `blocks`;
CREATE TABLE `blocks` (
  `id` int(11) NOT NULL auto_increment,
  `pl_id` int(11) default '0',
  `ad_id` int(11) default '0',
  `settings` text,
  PRIMARY KEY  (`id`),
  KEY `pl_id` (`pl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `blocks`
-- 

INSERT INTO `blocks` (`id`, `pl_id`, `ad_id`, `settings`) VALUES (1, 1, 1, 'a:23:{s:12:"block_titile";s:4:"����";s:15:"hor_tiser_count";i:3;s:16:"vert_tiser_count";i:4;s:11:"tiser_width";i:100;s:17:"tiser_width_param";i:0;s:9:"field_fon";s:7:"#bd49bd";s:12:"tiser_border";s:5:"solid";s:9:"field_brd";s:7:"#388ed9";s:14:"field_colorfon";s:7:"#f0f0f0";s:12:"block_border";s:1:"0";s:10:"block_line";s:5:"solid";s:10:"field_bbrd";s:7:"#f0f0f0";s:16:"block_text_align";s:10:"under_text";s:15:"block_text_size";s:2:"50";s:15:"block_font_size";i:10;s:16:"block_font_param";s:2:"px";s:10:"field_norm";s:7:"#f0f0f0";s:21:"block_font_size_naved";i:10;s:22:"block_font_hover_param";s:2:"px";s:11:"field_naved";s:7:"#f0f0f0";s:15:"block_font_desc";i:10;s:27:"block_font_hover_param_deck";s:2:"px";s:10:"field_decr";s:7:"#000000";}');

-- --------------------------------------------------------

-- 
-- ��������� ������� `category`
-- 

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `price` decimal(10,2) default '0.00',
  `status` int(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- 
-- ���� ������ ������� `category`
-- 

INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (1, '����/����', '0.26', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (2, '�����', '2.10', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (3, '������, �������', '2.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (4, '���������, ���������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (5, '����', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (6, '���, �����', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (7, '��������, ������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (8, '���������� ��� ���-����', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (9, '������������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (10, '�������, ���������������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (11, '���� � ��', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (12, '�������, ���������, ���� �� �����', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (13, '���������, �������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (14, '����, ������, �������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (15, '������������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (16, '�������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (17, '������� (��� ���)', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (18, '��������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (19, '���������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (20, '�������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (21, '���������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (22, '����, c�����', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (23, '����-����������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (24, '�����', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (25, '������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (26, '������', '0.00', 1);
INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (27, '�������', '0.00', 1);

-- --------------------------------------------------------

-- 
-- ��������� ������� `news`
-- 

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `preview` varchar(255) default NULL,
  `full` text,
  `type` int(1) default '0',
  `status` int(1) default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `status` (`status`)
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
  `adid` int(11) default '0',
  `wmr` varchar(50) default NULL,
  `sum` decimal(10,2) default '0.00',
  `status` int(1) default '1',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `adid` (`adid`)
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
  `adid` int(11) default '0',
  `title` varchar(100) NOT NULL,
  `url` varchar(100) default NULL,
  `status` int(11) default '-1',
  `category` int(11) default '0',
  `exclude` varchar(50) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `adid` (`adid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `playgrounds`
-- 

INSERT INTO `playgrounds` (`id`, `adid`, `title`, `url`, `status`, `category`, `exclude`, `date`) VALUES (1, 1, 'google.com', 'google.com', -1, 1, '1,10', '2009-09-13 14:21:52');

-- --------------------------------------------------------

-- 
-- ��������� ������� `sites`
-- 

DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `id` int(11) NOT NULL auto_increment,
  `wid` int(11) default '0',
  `name` varchar(100) default NULL,
  `url` varchar(100) default NULL,
  `status` int(1) default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `wid` (`wid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `sites`
-- 

INSERT INTO `sites` (`id`, `wid`, `name`, `url`, `status`, `date`) VALUES (1, 1, 'google', 'google.com', 1, '2009-08-23 14:49:23');

-- --------------------------------------------------------

-- 
-- ��������� ������� `top`
-- 

DROP TABLE IF EXISTS `top`;
CREATE TABLE `top` (
  `id` int(11) NOT NULL auto_increment,
  `ad_top_name` varchar(100) default NULL,
  `shows` int(11) default '0',
  `clicks` int(11) default '0',
  `ctr` int(11) default '0',
  `balance` decimal(10,2) default '0.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `top`
-- 

INSERT INTO `top` (`id`, `ad_top_name`, `shows`, `clicks`, `ctr`, `balance`) VALUES (1, 'Test', 123, 12312, 2, '123.00');

-- 
-- ��������� ������� `company`
-- 

-- 
-- ��������� ������� `company`
-- 

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL auto_increment,
  `adid` int(11) default '0',
  `title` varchar(255) character set cp1251 default NULL,
  `category` int(5) default '0',
  `status` int(1) default '0',
  `days` varchar(255) default NULL,
  `hours` varchar(255) default NULL,
  `day_limit` int(15) default '0',
  `limit` int(15) default '0',
  `maxrun` int(15) default '0',
  `price` decimal(10,2) default '0.00',
  `categories` varchar(255) default NULL,
  `exceptions` text,
  `no_ero` int(1) default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `adid` (`adid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='�������� �������������';
