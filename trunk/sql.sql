-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 17 2009 г., 02:08
-- Версия сервера: 5.0.77
-- Версия PHP: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- База данных: `adnets`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adwerts`
--

DROP TABLE IF EXISTS `adwerts`;
CREATE TABLE IF NOT EXISTS `adwerts` (
  `id` int(11) NOT NULL auto_increment,
  `owner_id` int(11) default '0',
  `email` varchar(100) default NULL,
  `icq` varchar(20) default NULL,
  `password` varchar(255) default NULL,
  `status` int(1) default '0',
  `wmr` varchar(50) default NULL,
  `regdate` datetime default NULL,
  `balance` decimal(10,2) default '0.00',
  `ref_id` int(11) default '0',
  `intop` varchar(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `adwerts`
--

INSERT INTO `adwerts` (`id`, `owner_id`, `email`, `icq`, `password`, `status`, `wmr`, `regdate`, `balance`, `ref_id`, `intop`) VALUES
(1, 0, '2freak@inbox.ru', '123456', '202cb962ac59075b964b07152d234b70', 1, 'R1234567890', '2009-08-23 14:34:49', 0.00, 1, ''),
(6, 1, 'for.Zotov@inbox.ru', '', '202cb962ac59075b964b07152d234b70', 1, 'R123', '2009-09-14 22:49:31', 0.00, 0, ''),
(7, 0, 'offseo@gmail.com', NULL, 'b8706e4abee2e21bcb3e85c30af0f45c', 1, 'R306690989026', '2009-11-04 22:53:10', 0.00, 0, 'Креведко');

-- --------------------------------------------------------

--
-- Структура таблицы `balance`
--

DROP TABLE IF EXISTS `balance`;
CREATE TABLE IF NOT EXISTS `balance` (
  `id` int(15) NOT NULL auto_increment,
  `adid` int(11) default '0',
  `sum` decimal(10,2) default '0.00',
  `wmr` varchar(50) default NULL,
  `status` int(1) default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `balance`
--

INSERT INTO `balance` (`id`, `adid`, `sum`, `wmr`, `status`, `date`) VALUES
(1, 7, 3000.00, NULL, -1, '2009-11-12 12:04:13'),
(2, 7, 10.00, NULL, -1, '2009-11-12 12:05:10');

-- --------------------------------------------------------

--
-- Структура таблицы `blocks`
--

DROP TABLE IF EXISTS `blocks`;
CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL auto_increment,
  `pl_id` int(11) default '0',
  `title` varchar(100) NOT NULL,
  `ad_id` int(11) default '0',
  `settings` text,
  PRIMARY KEY  (`id`),
  KEY `pl_id` (`pl_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `blocks`
--

INSERT INTO `blocks` (`id`, `pl_id`, `title`, `ad_id`, `settings`) VALUES
(1, 1, 'Блок', 1, 'a:24:{s:12:"block_titile";s:5:"Блок1";s:15:"hor_tiser_count";i:6;s:16:"vert_tiser_count";i:2;s:11:"tiser_width";i:100;s:17:"tiser_width_param";i:0;s:9:"field_fon";s:7:"#dbecf5";s:12:"tiser_border";s:5:"solid";s:9:"field_brd";s:7:"#ffffff";s:14:"field_colorfon";s:7:"#dbecf5";s:12:"block_border";s:1:"1";s:10:"block_line";s:5:"solid";s:10:"field_bbrd";s:7:"#ffffff";s:16:"block_text_align";s:10:"under_text";s:15:"block_text_size";s:3:"120";s:15:"block_font_size";i:12;s:16:"block_font_param";s:2:"px";s:10:"field_norm";s:7:"#063c51";s:21:"block_font_size_naved";i:12;s:22:"block_font_hover_param";s:2:"px";s:11:"field_naved";s:7:"#ffffff";s:15:"block_font_desc";i:12;s:27:"block_font_hover_param_deck";s:2:"px";s:10:"field_decr";s:7:"#063c51";s:9:"show_mine";i:1;}'),
(2, 2, '', 7, 'a:23:{s:12:"block_titile";s:6:"Блок 1";s:15:"hor_tiser_count";i:1;s:16:"vert_tiser_count";i:6;s:11:"tiser_width";i:100;s:17:"tiser_width_param";i:0;s:9:"field_fon";s:7:"#f0f0f0";s:12:"tiser_border";s:5:"solid";s:9:"field_brd";s:7:"#f0f0f0";s:14:"field_colorfon";s:7:"#f0f0f0";s:12:"block_border";s:1:"0";s:10:"block_line";s:5:"solid";s:10:"field_bbrd";s:7:"#f0f0f0";s:16:"block_text_align";s:10:"under_text";s:15:"block_text_size";s:3:"120";s:15:"block_font_size";i:10;s:16:"block_font_param";s:2:"px";s:10:"field_norm";s:7:"#f0f0f0";s:21:"block_font_size_naved";i:10;s:22:"block_font_hover_param";s:2:"px";s:11:"field_naved";s:7:"#f0f0f0";s:15:"block_font_desc";i:10;s:27:"block_font_hover_param_deck";s:2:"px";s:10:"field_decr";s:7:"#000000";}'),
(3, 3, '', 1, 'a:23:{s:12:"block_titile";s:3:"Ero";s:15:"hor_tiser_count";i:6;s:16:"vert_tiser_count";i:1;s:11:"tiser_width";i:100;s:17:"tiser_width_param";i:0;s:9:"field_fon";s:7:"#9a0477";s:12:"tiser_border";s:5:"solid";s:9:"field_brd";s:7:"#9a0477";s:14:"field_colorfon";s:7:"#9a0478";s:12:"block_border";s:1:"1";s:10:"block_line";s:6:"dashed";s:10:"field_bbrd";s:7:"#fff9b3";s:16:"block_text_align";s:10:"under_text";s:15:"block_text_size";s:3:"120";s:15:"block_font_size";i:12;s:16:"block_font_param";s:2:"px";s:10:"field_norm";s:7:"#fff9b3";s:21:"block_font_size_naved";i:12;s:22:"block_font_hover_param";s:2:"px";s:11:"field_naved";s:7:"#ec5613";s:15:"block_font_desc";i:12;s:27:"block_font_hover_param_deck";s:2:"px";s:10:"field_decr";s:7:"#fff9b3";}');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `price` decimal(10,2) default '0.00',
  `status` int(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `price`, `status`) VALUES
(1, 'Авто/мото', 0.26, 1),
(2, 'Афиша', 2.10, 1),
(3, 'Бизнес, финансы', 2.00, 1),
(4, 'Гороскопы, эзотерика', 0.00, 1),
(5, 'Дети', 0.00, 1),
(6, 'Дом, хобби', 0.00, 1),
(7, 'Здоровье, фитнес', 0.00, 1),
(8, 'Знакомства без эро-фото', 0.00, 1),
(9, 'Знаменитости', 0.00, 1),
(10, 'Карьера, трудоустройство', 0.00, 1),
(11, 'Кино и ТВ', 0.00, 1),
(12, 'Красота, косметика, уход за собой', 0.00, 1),
(13, 'Кулинария, рецепты', 0.00, 1),
(14, 'Мода, одежда, шоппинг', 0.00, 1),
(15, 'Недвижимость', 0.00, 1),
(16, 'Новости', 0.00, 1),
(17, 'Новости (без эро)', 0.00, 1),
(18, 'Общество', 0.00, 1),
(19, 'Отношения', 0.00, 1),
(20, 'Подарки', 0.00, 1),
(21, 'Программы', 0.00, 1),
(22, 'Секс, cтатьи', 0.00, 1),
(23, 'Секс-знакомства', 0.00, 1),
(24, 'Спорт', 0.00, 1),
(25, 'Товары', 0.00, 1),
(26, 'Туризм', 0.00, 1),
(27, 'Эротика', 0.00, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Компании рекламодателя' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `adid`, `title`, `category`, `status`, `days`, `hours`, `day_limit`, `limit`, `maxrun`, `price`, `categories`, `exceptions`, `no_ero`, `date`) VALUES
(1, 1, 'Компания', 27, 0, NULL, '[0]', 0, 0, 0, 0.00, '', '', NULL, '2009-10-12 01:20:23'),
(2, 1, 'Первая', 27, 0, '[1],[2],[3],[4],[5],[6],[7]', '[0],[1],[2],[3],[4],[5],[6],[7],[8],[9],[19],[20],[21],[22],[23]', 100, 300, 100, 0.30, '[22],[23],[27]', '', NULL, '2009-11-04 22:30:44'),
(3, 7, 'Date1', 23, 0, NULL, '[0]', 0, 0, 0, 0.00, '', '', NULL, '2009-11-04 23:20:36');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `preview` varchar(255) default NULL,
  `full` text,
  `type` int(1) default '0',
  `status` int(1) default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `preview`, `full`, `type`, `status`, `date`) VALUES
(1, 'тест', 'тест тест тест тест ', 'тест тест тест тест тест тест тест тест ', 1, 1, '2009-08-24 01:58:33');

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL auto_increment,
  `adid` int(11) default '0',
  `wmr` varchar(50) default NULL,
  `sum` decimal(10,2) default '0.00',
  `status` int(1) default '1',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `adid` (`adid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `adid`, `wmr`, `sum`, `status`, `date`) VALUES
(1, 1, 'R123456789', 100.00, 1, '2009-09-13 15:38:14');

-- --------------------------------------------------------

--
-- Структура таблицы `playgrounds`
--

DROP TABLE IF EXISTS `playgrounds`;
CREATE TABLE IF NOT EXISTS `playgrounds` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `playgrounds`
--

INSERT INTO `playgrounds` (`id`, `adid`, `title`, `url`, `status`, `category`, `exclude`, `date`) VALUES
(1, 1, 'teenages.org', 'teenages.org', 1, 27, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20', '2009-09-13 14:21:52'),
(2, 7, 'eropornstars.info', 'eropornstars.info', -1, 27, '', NULL),
(3, 1, 'erocuteteens.com', 'erocuteteens.com', 1, 27, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `refstat`
--

DROP TABLE IF EXISTS `refstat`;
CREATE TABLE IF NOT EXISTS `refstat` (
  `id` int(11) NOT NULL auto_increment,
  `adid` int(11) NOT NULL,
  `amount` decimal(10,4) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `refstat`
--

INSERT INTO `refstat` (`id`, `adid`, `amount`, `date`) VALUES
(2, 1, 0.0000, '2009-11-17');

-- --------------------------------------------------------

--
-- Структура таблицы `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL auto_increment,
  `wid` int(11) default '0',
  `name` varchar(100) default NULL,
  `url` varchar(100) default NULL,
  `status` int(1) default '0',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `wid` (`wid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `sites`
--

INSERT INTO `sites` (`id`, `wid`, `name`, `url`, `status`, `date`) VALUES
(1, 1, 'google', 'google.com', 1, '2009-08-23 14:49:23');

-- --------------------------------------------------------

--
-- Структура таблицы `stat_blocks`
--

DROP TABLE IF EXISTS `stat_blocks`;
CREATE TABLE IF NOT EXISTS `stat_blocks` (
  `id` int(11) NOT NULL auto_increment,
  `block_id` int(11) NOT NULL,
  `pl_id` int(11) NOT NULL,
  `ad_id` int(11) default NULL,
  `ref` varchar(100) collate cp1251_general_cs NOT NULL,
  `shows` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `stat_blocks`
--

INSERT INTO `stat_blocks` (`id`, `block_id`, `pl_id`, `ad_id`, `ref`, `shows`, `clicks`, `date`) VALUES
(1, 1, 0, NULL, '', 6, 0, '2009-10-14'),
(2, 1, 1, NULL, '', 2, 6, '2009-10-14'),
(3, 0, 1, NULL, '', 1, 0, '2009-10-15'),
(4, 1, 1, 1, '', 9, 1, '2009-10-15'),
(5, 0, 1, NULL, 'http://localhost:88/seo/adnets/playgrounds.php', 1, 0, '2009-10-27'),
(6, 0, 1, NULL, 'http://localhost:88/seo/adnets/playgrounds.php', 8, 0, '2009-10-30'),
(7, 0, 0, NULL, '', 1, 0, '2009-10-30'),
(8, 1, 1, NULL, '', 76, 0, '2009-10-30'),
(9, 1, 1, 1, '', 56, 1, '2009-11-04'),
(10, 1, 1, 1, '', 1766, 21, '2009-11-05'),
(11, 0, 0, 0, '', 3, 0, '2009-11-05'),
(12, 1, 1, 1, 'http://adnets.ru/playgrounds.php', 37, 0, '2009-11-06'),
(13, 1, 1, 1, 'http://localhost:88/seo/adnets/blocks.php?id=1&sid=1', 2, 0, '2009-11-09'),
(14, 1, 1, 1, 'http://adnets.ru/blocks.php?id=1&sid=1', 6, 0, '2009-11-10'),
(15, 3, 3, 1, 'http://adnets.ru/blocks.php?id=3&sid=3', 171, 0, '2009-11-10'),
(16, 0, 0, 0, '', 1, 0, '2009-11-10'),
(17, 3, 3, 1, '', 19, 5, '2009-11-11'),
(18, 1, 1, 1, '', 2908, 142, '2009-11-11'),
(19, 0, 0, 0, '', 1, 1, '2009-11-11'),
(20, 1, 1, 1, 'http://telki.name/?d=start', 5766, 314, '2009-11-12'),
(21, 3, 3, 1, 'http://adnets.ru/blocks.php?id=3&sid=3', 2, 0, '2009-11-12'),
(22, 1, 1, 1, 'http://goldteens.org/?d=p', 1008, 34, '2009-11-13'),
(23, 0, 0, 0, '', 2, 0, '2009-11-13'),
(24, 1, 1, 1, 'http://www.kiskipiski.com/', 573, 18, '2009-11-14'),
(25, 1, 1, 1, 'http://bobr.tv/', 2536, 113, '2009-11-15'),
(26, 0, 0, 0, '', 1, 0, '2009-11-15'),
(27, 1, 1, 1, 'http://www.ruclicks.com/in/wnc77ijl', 6756, 339, '2009-11-16'),
(28, 0, 0, 0, '', 3, 0, '2009-11-16'),
(29, 1, 1, 1, 'http://bobr.tv/', 425, 41, '2009-11-17');

-- --------------------------------------------------------

--
-- Структура таблицы `stat_teaser`
--

DROP TABLE IF EXISTS `stat_teaser`;
CREATE TABLE IF NOT EXISTS `stat_teaser` (
  `id` int(11) NOT NULL auto_increment,
  `teaser_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `shows` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `amsrc` decimal(10,2) default NULL,
  `amdst` decimal(10,2) default NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs AUTO_INCREMENT=167 ;

--
-- Дамп данных таблицы `stat_teaser`
--

INSERT INTO `stat_teaser` (`id`, `teaser_id`, `block_id`, `ad_id`, `shows`, `clicks`, `amsrc`, `amdst`, `date`) VALUES
(5, 2, 1, 1, 3, 0, NULL, NULL, '2009-10-15'),
(4, 1, 1, 1, 3, 1, NULL, NULL, '2009-10-15'),
(3, 1, 1, 1, 0, 4, NULL, NULL, '2009-10-14'),
(6, 1, 1, 1, 76, 0, NULL, NULL, '2009-10-30'),
(7, 2, 1, 1, 49, 0, NULL, NULL, '2009-11-04'),
(8, 3, 1, 1, 49, 0, NULL, NULL, '2009-11-04'),
(9, 4, 1, 1, 49, 0, NULL, NULL, '2009-11-04'),
(10, 5, 1, 1, 49, 0, NULL, NULL, '2009-11-04'),
(11, 6, 1, 1, 49, 0, NULL, NULL, '2009-11-04'),
(12, 7, 1, 1, 49, 1, 0.36, 0.10, '2009-11-04'),
(13, 8, 1, 1, 49, 0, NULL, NULL, '2009-11-04'),
(14, 9, 1, 7, 33, 0, NULL, NULL, '2009-11-04'),
(15, 10, 1, 7, 34, 0, NULL, NULL, '2009-11-04'),
(16, 2, 1, 1, 1766, 1, 0.36, 0.10, '2009-11-05'),
(17, 3, 1, 1, 1766, 3, 1.08, 0.30, '2009-11-05'),
(18, 4, 1, 1, 1766, 1, 0.36, 0.10, '2009-11-05'),
(19, 5, 1, 1, 1766, 1, 0.36, 0.10, '2009-11-05'),
(20, 6, 1, 1, 1766, 2, 0.72, 0.20, '2009-11-05'),
(21, 7, 1, 1, 1766, 5, 1.80, 0.50, '2009-11-05'),
(22, 8, 1, 1, 1766, 1, 0.36, 0.10, '2009-11-05'),
(23, 17, 1, 1, 1480, 3, 1.08, 0.30, '2009-11-05'),
(24, 16, 1, 1, 1480, 1, 0.36, 0.10, '2009-11-05'),
(25, 15, 1, 1, 1480, 1, 0.36, 0.10, '2009-11-05'),
(26, 18, 1, 1, 1480, 2, 0.72, 0.20, '2009-11-05'),
(27, 19, 1, 1, 47, 0, NULL, NULL, '2009-11-05'),
(28, 2, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(29, 18, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(30, 17, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(31, 16, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(32, 15, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(33, 8, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(34, 7, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(35, 6, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(36, 5, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(37, 4, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(38, 3, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(39, 19, 1, 1, 37, 0, NULL, NULL, '2009-11-06'),
(40, 2, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(41, 18, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(42, 17, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(43, 16, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(44, 15, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(45, 8, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(46, 7, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(47, 6, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(48, 5, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(49, 4, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(50, 3, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(51, 19, 1, 1, 2, 0, NULL, NULL, '2009-11-09'),
(52, 2, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(53, 18, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(54, 17, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(55, 16, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(56, 15, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(57, 8, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(58, 7, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(59, 6, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(60, 5, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(61, 4, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(62, 3, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(63, 19, 1, 1, 6, 0, NULL, NULL, '2009-11-10'),
(64, 2, 3, 1, 171, 0, NULL, NULL, '2009-11-10'),
(65, 18, 3, 1, 170, 0, NULL, NULL, '2009-11-10'),
(66, 17, 3, 1, 170, 0, NULL, NULL, '2009-11-10'),
(67, 16, 3, 1, 170, 0, NULL, NULL, '2009-11-10'),
(68, 15, 3, 1, 170, 0, NULL, NULL, '2009-11-10'),
(69, 8, 3, 1, 170, 0, NULL, NULL, '2009-11-10'),
(70, 2, 3, 1, 19, 1, 0.36, 0.10, '2009-11-11'),
(71, 18, 3, 1, 19, 0, NULL, NULL, '2009-11-11'),
(72, 17, 3, 1, 19, 4, 1.44, 0.40, '2009-11-11'),
(73, 16, 3, 1, 19, 0, NULL, NULL, '2009-11-11'),
(74, 15, 3, 1, 19, 0, NULL, NULL, '2009-11-11'),
(75, 8, 3, 1, 19, 0, NULL, NULL, '2009-11-11'),
(76, 2, 1, 1, 2909, 5, 1.80, 0.50, '2009-11-11'),
(77, 18, 1, 1, 2909, 10, 3.60, 1.00, '2009-11-11'),
(78, 17, 1, 1, 2909, 26, 9.36, 2.60, '2009-11-11'),
(79, 16, 1, 1, 2909, 23, 8.28, 2.30, '2009-11-11'),
(80, 15, 1, 1, 2909, 23, 8.28, 2.30, '2009-11-11'),
(81, 8, 1, 1, 2909, 14, 5.04, 1.40, '2009-11-11'),
(82, 7, 1, 1, 2909, 23, 8.28, 2.30, '2009-11-11'),
(83, 6, 1, 1, 2909, 2, 0.72, 0.20, '2009-11-11'),
(84, 5, 1, 1, 2909, 2, 0.72, 0.20, '2009-11-11'),
(85, 4, 1, 1, 2909, 4, 1.44, 0.40, '2009-11-11'),
(86, 3, 1, 1, 2909, 1, 0.36, 0.10, '2009-11-11'),
(87, 19, 1, 1, 2909, 9, 3.24, 0.90, '2009-11-11'),
(88, 2, 1, 1, 5276, 7, 2.52, 0.70, '2009-11-12'),
(89, 18, 1, 1, 5745, 10, 3.60, 1.00, '2009-11-12'),
(90, 17, 1, 1, 5745, 56, 20.16, 5.60, '2009-11-12'),
(91, 16, 1, 1, 5745, 20, 7.20, 2.00, '2009-11-12'),
(92, 15, 1, 1, 5745, 45, 16.20, 4.50, '2009-11-12'),
(93, 8, 1, 1, 5745, 25, 9.00, 2.50, '2009-11-12'),
(94, 7, 1, 1, 5745, 66, 23.76, 6.60, '2009-11-12'),
(95, 6, 1, 1, 5648, 3, 1.08, 0.30, '2009-11-12'),
(96, 5, 1, 1, 5745, 11, 3.96, 1.10, '2009-11-12'),
(97, 4, 1, 1, 5745, 2, 0.72, 0.20, '2009-11-12'),
(98, 3, 1, 1, 1115, 1, 0.36, 0.10, '2009-11-12'),
(99, 19, 1, 1, 5745, 9, 3.24, 0.90, '2009-11-12'),
(100, 2, 3, 1, 2, 0, NULL, NULL, '2009-11-12'),
(101, 18, 3, 1, 2, 0, NULL, NULL, '2009-11-12'),
(102, 17, 3, 1, 2, 0, NULL, NULL, '2009-11-12'),
(103, 16, 3, 1, 2, 0, NULL, NULL, '2009-11-12'),
(104, 15, 3, 1, 2, 0, NULL, NULL, '2009-11-12'),
(105, 8, 3, 1, 2, 0, NULL, NULL, '2009-11-12'),
(106, 20, 1, 1, 5099, 59, 21.24, 5.90, '2009-11-12'),
(107, 20, 1, 1, 1008, 8, 2.88, 0.80, '2009-11-13'),
(108, 15, 1, 1, 1008, 7, 2.52, 0.70, '2009-11-13'),
(109, 7, 1, 1, 1008, 2, 0.72, 0.20, '2009-11-13'),
(110, 17, 1, 1, 1008, 4, 1.44, 0.40, '2009-11-13'),
(111, 8, 1, 1, 1008, 1, 0.36, 0.10, '2009-11-13'),
(112, 16, 1, 1, 1008, 7, 2.52, 0.70, '2009-11-13'),
(113, 6, 1, 1, 1008, 0, NULL, NULL, '2009-11-13'),
(114, 2, 1, 1, 1008, 0, NULL, NULL, '2009-11-13'),
(115, 19, 1, 1, 1008, 0, NULL, NULL, '2009-11-13'),
(116, 18, 1, 1, 1008, 2, 0.72, 0.20, '2009-11-13'),
(117, 5, 1, 1, 1008, 2, 0.72, 0.20, '2009-11-13'),
(118, 4, 1, 1, 1008, 1, 0.36, 0.10, '2009-11-13'),
(119, 20, 1, 1, 573, 5, 1.80, 0.50, '2009-11-14'),
(120, 15, 1, 1, 573, 2, 0.72, 0.20, '2009-11-14'),
(121, 7, 1, 1, 573, 0, NULL, NULL, '2009-11-14'),
(122, 17, 1, 1, 573, 6, 2.16, 0.60, '2009-11-14'),
(123, 8, 1, 1, 573, 2, 0.72, 0.20, '2009-11-14'),
(124, 16, 1, 1, 573, 0, NULL, NULL, '2009-11-14'),
(125, 6, 1, 1, 573, 2, 0.72, 0.20, '2009-11-14'),
(126, 2, 1, 1, 573, 1, 0.36, 0.10, '2009-11-14'),
(127, 19, 1, 1, 573, 0, NULL, NULL, '2009-11-14'),
(128, 18, 1, 1, 573, 0, NULL, NULL, '2009-11-14'),
(129, 5, 1, 1, 573, 0, NULL, NULL, '2009-11-14'),
(130, 4, 1, 1, 573, 0, NULL, NULL, '2009-11-14'),
(131, 20, 1, 1, 2536, 23, 8.28, 2.30, '2009-11-15'),
(132, 15, 1, 1, 2536, 14, 5.04, 1.40, '2009-11-15'),
(133, 7, 1, 1, 2536, 28, 10.08, 2.80, '2009-11-15'),
(134, 17, 1, 1, 2536, 14, 5.04, 1.40, '2009-11-15'),
(135, 8, 1, 1, 2536, 9, 3.24, 0.90, '2009-11-15'),
(136, 16, 1, 1, 2536, 16, 5.76, 1.60, '2009-11-15'),
(137, 6, 1, 1, 2536, 0, NULL, NULL, '2009-11-15'),
(138, 2, 1, 1, 2536, 1, 0.36, 0.10, '2009-11-15'),
(139, 19, 1, 1, 2536, 3, 1.08, 0.30, '2009-11-15'),
(140, 18, 1, 1, 2536, 3, 1.08, 0.30, '2009-11-15'),
(141, 5, 1, 1, 2536, 1, 0.36, 0.10, '2009-11-15'),
(142, 4, 1, 1, 2536, 1, 0.36, 0.10, '2009-11-15'),
(143, 20, 1, 1, 6756, 53, 19.08, 5.30, '2009-11-16'),
(144, 15, 1, 1, 6755, 29, 10.44, 2.90, '2009-11-16'),
(145, 7, 1, 1, 6756, 79, 28.44, 7.90, '2009-11-16'),
(146, 17, 1, 1, 6756, 65, 23.40, 6.50, '2009-11-16'),
(147, 8, 1, 1, 6755, 52, 18.72, 5.20, '2009-11-16'),
(148, 16, 1, 1, 6756, 20, 7.20, 2.00, '2009-11-16'),
(149, 6, 1, 1, 6756, 1, 0.36, 0.10, '2009-11-16'),
(150, 2, 1, 1, 6755, 9, 3.24, 0.90, '2009-11-16'),
(151, 19, 1, 1, 6756, 16, 5.76, 1.60, '2009-11-16'),
(152, 18, 1, 1, 6756, 12, 4.32, 1.20, '2009-11-16'),
(153, 5, 1, 1, 6755, 2, 0.72, 0.20, '2009-11-16'),
(154, 4, 1, 1, 6756, 1, 0.36, 0.10, '2009-11-16'),
(155, 20, 1, 1, 425, 5, 1.80, 0.50, '2009-11-17'),
(156, 15, 1, 1, 425, 4, 1.44, 0.40, '2009-11-17'),
(157, 7, 1, 1, 425, 9, 3.24, 0.90, '2009-11-17'),
(158, 17, 1, 1, 425, 4, 1.44, 0.40, '2009-11-17'),
(159, 8, 1, 1, 425, 5, 1.80, 0.50, '2009-11-17'),
(160, 16, 1, 1, 425, 10, 3.60, 1.00, '2009-11-17'),
(161, 6, 1, 1, 425, 1, 0.36, 0.10, '2009-11-17'),
(162, 2, 1, 1, 425, 0, NULL, NULL, '2009-11-17'),
(163, 19, 1, 1, 425, 0, NULL, NULL, '2009-11-17'),
(164, 18, 1, 1, 425, 1, 0.36, 0.10, '2009-11-17'),
(165, 5, 1, 1, 425, 0, NULL, NULL, '2009-11-17'),
(166, 4, 1, 1, 425, 1, 0.36, 0.10, '2009-11-17');

-- --------------------------------------------------------

--
-- Структура таблицы `teaser`
--

DROP TABLE IF EXISTS `teaser`;
CREATE TABLE IF NOT EXISTS `teaser` (
  `id` int(15) NOT NULL auto_increment,
  `adid` int(15) default '0',
  `company_id` int(15) default '0',
  `category` int(11) default '0',
  `title` varchar(255) character set cp1251 default NULL,
  `desc` varchar(255) character set cp1251 default NULL,
  `url` varchar(255) default NULL,
  `price` decimal(10,2) default '0.00',
  `type` int(1) default '0',
  `size` int(10) default '0',
  `ext` varchar(4) default NULL,
  `status` int(1) default '0',
  `ctr` decimal(10,2) default '0.00',
  `date` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `adid` (`adid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Тизеры' AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `teaser`
--

INSERT INTO `teaser` (`id`, `adid`, `company_id`, `category`, `title`, `desc`, `url`, `price`, `type`, `size`, `ext`, `status`, `ctr`, `date`) VALUES
(1, 1, 1, 3, 'test test test', 'testtesttesttesttesttesttesttest', 'http://ya.ru', 0.00, 0, 0, 'gif', 1, 0.00, '2009-10-30 15:01:57'),
(2, 1, 2, 23, 'Однотрахники в твоем городе', 'Однотрахники в твоем городе', 'http://tds.xfreepics.ru/go.php?sid=6', 0.30, NULL, 23553, 'gif', 1, 0.15, '2009-11-04 22:44:49'),
(3, 1, 2, 23, 'Хотим познакомиться для траха', 'Хотим познакомиться для траха', 'http://tds.xfreepics.ru/go.php?sid=6', 0.30, NULL, 13509, 'gif', 1, 0.09, '2009-11-04 22:47:05'),
(4, 1, 2, 23, 'Я уже теку! Позвони мне', 'Я уже теку! Позвони мне', 'http://tds.xfreepics.ru/go.php?sid=6', 0.30, NULL, 3035, 'jpg', 1, 0.09, '2009-11-04 22:46:46'),
(5, 1, 2, 23, 'Хочешь меня? Просто позвони', 'Хочешь меня? Просто позвони', 'http://tds.xfreepics.ru/go.php?sid=6', 0.30, NULL, 18505, 'gif', 1, 0.09, '2009-11-04 22:48:56'),
(6, 1, 2, 25, 'Удовлетвори сразу трех', 'Удовлетвори сразу трех', 'http://www2.rutabletki.com/index.php?wm_id=414&sub_id=1&site_id=1171&promo_id=1', 0.10, NULL, 9566, 'gif', 1, 0.20, '2009-11-12 00:10:53'),
(7, 1, 2, 27, 'Отдери по жесткому', 'Отдери по жесткому', 'http://tds.xfreepics.ru/go.php?sid=1', 0.10, NULL, 73648, 'gif', 1, 0.81, '2009-11-04 22:53:47'),
(8, 1, 2, 27, 'Рвут попку', 'Рвут попку', 'http://tds.xfreepics.ru/go.php?sid=1', 0.10, NULL, 238789, 'gif', 1, 0.45, '2009-11-04 22:55:04'),
(9, 7, 3, 23, 'Хочу cекса без заморочек!', 'Хочу cекса без заморочек!', 'http://sexkrug.com', 1.00, NULL, 13509, 'gif', -1, 0.00, '2009-11-04 23:51:09'),
(10, 7, 3, 27, 'Онлайн на сайте секс-знакомств.', 'Онлайн на сайте секс-знакомств.', 'http://sexkrug.com', 1.00, NULL, 19460, 'gif', -1, 0.00, '2009-11-04 23:51:27'),
(11, 7, 3, 27, 'Познакомлюсь для секса!', 'Познакомлюсь для секса!', 'http://sexkrug.com', 1.00, NULL, 5133, 'gif', -1, 0.00, '2009-11-04 23:51:20'),
(12, 7, 3, 27, 'Одноночники.РУ - Ищешь с кем потрахаться? Тут 300000 девченок для траха!', 'Одноночники.РУ - Ищешь с кем потрахаться? Тут 300000 девченок для траха!', 'http://sexkrug.com', 1.00, NULL, 3035, 'gif', -1, 0.00, '2009-11-04 23:52:06'),
(13, 7, 3, 27, 'Алина. 18 лет. Жду парней для перепиха. Люблю секс в душе. Пишите мне!', 'Алина. 18 лет. Жду парней для перепиха. Люблю секс в душе. Пишите мне!', 'http://sexkrug.com', 1.00, NULL, 16316, 'gif', -1, 0.00, '2009-11-04 23:52:30'),
(14, 7, 3, 27, 'Xочется реального СЕКСА? Тебе СЮДА! Новый сайт СЕКС-ЗНАКОМСТВ!', 'Xочется реального СЕКСА? Тебе СЮДА! Новый сайт СЕКС-ЗНАКОМСТВ!', 'http://sexkrug.com', 1.00, NULL, 19192, 'gif', -1, 0.00, '2009-11-04 23:52:54'),
(15, 1, 2, 27, 'Жестко отсадомировали', 'Жестко отсадомировали', '	http://tds.xfreepics.ru/go.php?sid=1', 0.10, NULL, 280904, 'gif', 1, 0.90, '2009-11-05 01:37:46'),
(16, 1, 2, 27, 'Звездный трах', 'Звездный трах', 'http://russianxxxtv.com/?wid=311&subid=311', 0.10, NULL, 57444, 'gif', 1, 0.27, '2009-11-05 01:46:12'),
(17, 1, 2, 27, 'Выебем школьниц', 'Выебем школьниц', 'http://tds.xfreepics.ru/go.php?sid=1', 0.10, NULL, 93653, 'gif', 1, 0.72, '2009-11-05 01:48:16'),
(18, 1, 2, 23, 'Альбина,19 лет. Трахнемся сегодня?', 'Альбина,19 лет. Трахнемся сегодня?', 'http://tds.xfreepics.ru/go.php?sid=6', 0.30, NULL, 18505, 'gif', 1, 0.09, '2009-11-05 01:49:42'),
(19, 1, 2, 23, 'Хочу просто трахаться!', 'Хочу просто трахаться!', '', 0.30, NULL, 19192, 'gif', 1, 0.09, '2009-11-05 12:50:42'),
(20, 1, 2, 27, 'Только исполнилось 18', '18-летней малолеточке разрабатывают рот по самые гланды', 'http://bqporn.com/?p_aid=227', 0.28, NULL, 360054, 'gif', 1, 1.08, '2009-11-12 01:19:56');

-- --------------------------------------------------------

--
-- Структура таблицы `tmp_stat`
--

DROP TABLE IF EXISTS `tmp_stat`;
CREATE TABLE IF NOT EXISTS `tmp_stat` (
  `id` int(11) NOT NULL auto_increment,
  `ip` varchar(100) collate cp1251_general_cs NOT NULL,
  `teaser_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `uniq` int(11) NOT NULL,
  `raw` int(11) NOT NULL,
  `referer` varchar(100) collate cp1251_general_cs NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tmp_stat`
--

INSERT INTO `tmp_stat` (`id`, `ip`, `teaser_id`, `ad_id`, `uniq`, `raw`, `referer`, `date`) VALUES
(1, '94.198.54.66', 17, 1, 1, 1, 'Noref', '2009-11-17'),
(2, '94.198.54.66', 15, 1, 0, 3, 'Noref', '2009-11-17'),
(3, '94.198.54.66', 7, 1, 1, 1, 'Noref', '2009-11-17');

-- --------------------------------------------------------

--
-- Структура таблицы `top`
--

DROP TABLE IF EXISTS `top`;
CREATE TABLE IF NOT EXISTS `top` (
  `id` int(11) NOT NULL auto_increment,
  `ad_top_name` varchar(100) default NULL,
  `shows` int(11) default '0',
  `clicks` int(11) default '0',
  `ctr` int(11) default '0',
  `balance` decimal(10,2) default '0.00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `top`
--

INSERT INTO `top` (`id`, `ad_top_name`, `shows`, `clicks`, `ctr`, `balance`) VALUES
(1, 'Test', 123, 12312, 2, 123.00);
