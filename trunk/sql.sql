-- phpMyAdmin SQL Dump
-- version 2.6.4-pl4
-- http://www.phpmyadmin.net
-- 
-- Хост: localhost
-- Время создания: Сен 11 2009 г., 19:54
-- Версия сервера: 5.0.16
-- Версия PHP: 5.1.1
-- 
-- БД: `adnets`
-- 

-- --------------------------------------------------------

-- 
-- Структура таблицы `adwerts`
-- 

DROP TABLE IF EXISTS `adwerts`;
CREATE TABLE IF NOT EXISTS `adwerts` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `wmr` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Дамп данных таблицы `adwerts`
-- 

INSERT INTO `adwerts` (`id`, `email`, `password`, `status`, `wmr`, `regdate`, `balance`) VALUES (1, '2freak@inbox.ru', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '2009-08-23 14:34:49', '0.00');

-- --------------------------------------------------------

-- 
-- Структура таблицы `news`
-- 

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
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
-- Дамп данных таблицы `news`
-- 

INSERT INTO `news` (`id`, `title`, `preview`, `full`, `type`, `status`, `date`) VALUES (1, 'тест', 'тест тест тест тест ', 'тест тест тест тест тест тест тест тест ', 1, 1, '2009-08-24 01:58:33');

-- --------------------------------------------------------

-- 
-- Структура таблицы `sites`
-- 

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL auto_increment,
  `wid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Дамп данных таблицы `sites`
-- 

INSERT INTO `sites` (`id`, `wid`, `name`, `url`, `status`, `date`) VALUES (1, 1, 'google', 'google.com', 1, '2009-08-23 14:49:23');
