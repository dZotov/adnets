-- phpMyAdmin SQL Dump
-- version 2.6.4-pl4
-- http://www.phpmyadmin.net
-- 
-- ����: localhost
-- ����� ��������: ��� 23 2009 �., 14:59
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
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `regdate` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `adwerts`
-- 

INSERT INTO `adwerts` (`id`, `email`, `password`, `status`, `regdate`) VALUES (1, '2freak@inbox.ru', 'e10adc3949ba59abbe56e057f20f883e', 1, '2009-08-23 14:34:49');

-- --------------------------------------------------------

-- 
-- ��������� ������� `sites`
-- 

DROP TABLE IF EXISTS `sites`;
CREATE TABLE `sites` (
  `id` int(11) NOT NULL auto_increment,
  `wid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- ���� ������ ������� `sites`
-- 

INSERT INTO `sites` (`id`, `wid`, `name`, `url`, `status`, `date`) VALUES (1, 1, 'google', 'google.com', 1, '2009-08-23 14:49:23');
