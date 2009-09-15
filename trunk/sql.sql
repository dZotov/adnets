-- phpMyAdmin SQL Dump
-- version 2.6.4-pl4
-- http://www.phpmyadmin.net
-- 
-- Хост: localhost
-- Время создания: Сен 16 2009 г., 01:47
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Дамп данных таблицы `adwerts`
-- 

INSERT INTO `adwerts` (`id`, `owner_id`, `email`, `icq`, `password`, `status`, `wmr`, `regdate`, `balance`, `intop`) VALUES (1, 0, '2freak@inbox.ru', '123456', '202cb962ac59075b964b07152d234b70', 1, 'R1234567890', '2009-08-23 14:34:49', '0.00', ''),
(6, 1, 'for.Zotov@inbox.ru', '', '202cb962ac59075b964b07152d234b70', 1, 'R123', '2009-09-14 22:49:31', '0.00', '');

-- --------------------------------------------------------

-- 
-- Структура таблицы `blocks`
-- 

DROP TABLE IF EXISTS `blocks`;
CREATE TABLE `blocks` (
  `id` int(11) NOT NULL auto_increment,
  `pl_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `settings` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Дамп данных таблицы `blocks`
-- 

INSERT INTO `blocks` (`id`, `pl_id`, `ad_id`, `settings`) VALUES (1, 1, 1, 'a:2:{s:4:"size";s:7:"100x100";s:10:"size_tizer";s:3:"2x4";}');

-- --------------------------------------------------------

-- 
-- Структура таблицы `category`
-- 

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Дамп данных таблицы `category`
-- 

INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES (1, 'Порно', '0.26', 1),
(2, 'Знакомства', '2.10', 1),
(3, 'Игры', '2.00', 1);

-- --------------------------------------------------------

-- 
-- Структура таблицы `news`
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
-- Дамп данных таблицы `news`
-- 

INSERT INTO `news` (`id`, `title`, `preview`, `full`, `type`, `status`, `date`) VALUES (1, 'тест', 'тест тест тест тест ', 'тест тест тест тест тест тест тест тест ', 1, 1, '2009-08-24 01:58:33');

-- --------------------------------------------------------

-- 
-- Структура таблицы `payments`
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
-- Дамп данных таблицы `payments`
-- 

INSERT INTO `payments` (`id`, `adid`, `wmr`, `sum`, `status`, `date`) VALUES (1, 1, 'R123456789', '100.00', 1, '2009-09-13 15:38:14');

-- --------------------------------------------------------

-- 
-- Структура таблицы `playgrounds`
-- 

DROP TABLE IF EXISTS `playgrounds`;
CREATE TABLE `playgrounds` (
  `id` int(11) NOT NULL auto_increment,
  `adid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL default '-1',
  `category` int(11) NOT NULL,
  `exclude` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Дамп данных таблицы `playgrounds`
-- 

INSERT INTO `playgrounds` (`id`, `adid`, `title`, `url`, `status`, `category`, `exclude`, `date`) VALUES (1, 1, 'google.com', 'google.com', -1, 1, '', '2009-09-13 14:21:52');

-- --------------------------------------------------------

-- 
-- Структура таблицы `top`
-- 

DROP TABLE IF EXISTS `top`;
CREATE TABLE `top` (
  `id` int(11) NOT NULL auto_increment,
  `ad_top_name` varchar(100) NOT NULL,
  `shows` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `crt` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Дамп данных таблицы `top`
-- 

INSERT INTO `top` (`id`, `ad_top_name`, `shows`, `clicks`, `crt`, `balance`) VALUES (1, 'Test', 123, 12312, 2, '123.00');
