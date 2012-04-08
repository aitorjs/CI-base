-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Zerbitzaria: localhost
-- Sortzeko denbora: 2012-04-09, 00:12:46
-- Zerbitzariaren bertsioa: 5.1.61
-- PHP Bertsioa: 5.3.5-1ubuntu7.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datu-basea: `codeigniter`
--

-- --------------------------------------------------------

--
-- Taularen egitura taula honentzat:  `blogak`
--

CREATE TABLE IF NOT EXISTS `blogak` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `erabiltzailea_id` int(8) NOT NULL,
  `izenburua` varchar(255) NOT NULL,
  `edukia` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Taula honen datuak irauli `blogak`
--

INSERT INTO `blogak` (`id`, `erabiltzailea_id`, `izenburua`, `edukia`) VALUES
(1, 1, 'auzolan taldeak non nahi!', 'auzolan taldeak non nahi!auzolan taldeak non nahi! auzolan taldeak non nahi!'),
(2, 1, 'gureak egin du! ', 'gureak egin du! gureak egin du! gureak egin du! gureak egin du! gureak egin du! gureak egin du! gureak egin du! '),
(3, 2, 'mola mola ! ', 'mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! mola mola ! '),
(4, 2, 'gora gu! ', 'gora gu! gora gu! gora gu! gora gu! gora gu! gora gu! ');

-- --------------------------------------------------------

--
-- Taularen egitura taula honentzat:  `blogak_etiketak`
--

CREATE TABLE IF NOT EXISTS `blogak_etiketak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bloga_id` int(11) NOT NULL,
  `etiketa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Taula honen datuak irauli `blogak_etiketak`
--

INSERT INTO `blogak_etiketak` (`id`, `bloga_id`, `etiketa_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 2, 4),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Taularen egitura taula honentzat:  `erabiltzaileak`
--

CREATE TABLE IF NOT EXISTS `erabiltzaileak` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '2',
  `izena` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pasahitza` varchar(40) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Taula honen datuak irauli `erabiltzaileak`
--

INSERT INTO `erabiltzaileak` (`id`, `group_id`, `izena`, `email`, `pasahitza`, `created`, `updated`, `deleted`) VALUES
(1, 2, 'manolo', 'manolo@manolo.com', '12cdb9b24211557ef1802bf5a875fd2c', '2012-04-02 00:00:00', NULL, NULL),
(2, 2, 'ana', 'ana@ana.com', '276b6c4692e78d4799c12ada515bc3e4', '2012-04-02 00:00:00', NULL, NULL),
(3, 2, 'maia', 'maia@maia.com', 'cb6caa35194aee95fffa72f737c4fabb', '2012-04-02 17:10:31', NULL, NULL),
(4, 2, 'pedro2', 'pedro@pedro.com', '03394ef217a538daa940ba978089a6fd', '2012-04-02 17:10:56', '2012-04-02 20:40:49', NULL),
(5, 2, 'maria', 'maria@maria.com', '49518a5bba04f0d047a86e56218d966a', '0000-00-00 00:00:00', NULL, NULL),
(15, 2, 'beria', 'beria@beria.com', '4641b26cc13c6c8259aad9ba6918fbcc', '2012-04-02 21:26:50', NULL, NULL),
(9, 2, 'paca', 'paca@paca.com', '1d8c141e84fef367fb131fa12099b17b', '2012-04-02 19:13:11', '2012-04-02 22:12:38', NULL),
(10, 2, 'admin', 'admin@admin.com', 'f6fdffe48c908deb0f4c3bd36c032e72', '2012-04-02 19:37:04', NULL, NULL),
(11, 0, 'admin', 'admin@admin2.com', 'f6fdffe48c908deb0f4c3bd36c032e72', '2012-04-02 19:38:53', NULL, NULL),
(12, 2, 'root', 'root@root.com', 'b4b8daf4b8ea9d39568719e1e320076f', '2012-04-02 19:39:47', NULL, NULL),
(13, 1, 'root', 'root@roo.om', 'b4b8daf4b8ea9d39568719e1e320076f', '2012-04-02 19:40:17', NULL, NULL),
(14, 2, 'pedro2', 'pedro@pedro.com', '', NULL, '2012-04-02 20:39:05', NULL),
(16, 2, 'asdas', 'jhjh@jjj.com', '8098d3a5f7adeccbfef2407fa1b4f8f4', '2012-04-02 21:27:35', NULL, NULL),
(17, 2, 'sasdasdasd', 'asdasd@adasd.com', '65aad0f563267f0894012c7b7d65a0fc', '2012-04-02 21:29:39', NULL, NULL),
(18, 2, 'sdasdsa', 'root@asdasd.com', '6b5b945060e68b27e8d3b5b58af425aa', '2012-04-02 21:37:03', NULL, NULL),
(19, 2, 'sasads', 'root@asdad.com', '6a20de3d592411def8d094a9d500bf43', '2012-04-02 21:39:02', NULL, NULL),
(20, 2, 'sadsadsad', 'root@asdasd.com', '96a907f340da6ac52e6c721565a4129b', '2012-04-02 21:39:38', NULL, NULL),
(21, 2, 'kjkjhkhkjh', 'root@khjkh.com', '1ecf6705e81d93cb2caad03f6a1eb39b', '2012-04-02 21:44:36', NULL, NULL),
(22, 2, 'sadsadas', 'root@asdasd.com', 'b951787f7695bfec0f1ae088ea8d6ad9', '2012-04-02 21:45:50', NULL, NULL),
(23, 2, 'saasdsadsa', 'root@asdasd.com', '96a907f340da6ac52e6c721565a4129b', '2012-04-02 21:46:45', NULL, NULL),
(24, 2, 'asdsadsa', 'root@adasds.com', '6b5b945060e68b27e8d3b5b58af425aa', '2012-04-02 21:47:06', NULL, NULL),
(25, 2, 'sasds', 'root@asdasd.com', '6b5b945060e68b27e8d3b5b58af425aa', '2012-04-02 21:47:26', '2012-04-06 22:28:14', NULL),
(26, 2, 'dadasdsad', 'root@asdad.com', '76f8025a5658d97b3c5684ae46de2d5b', '2012-04-02 21:48:09', NULL, NULL),
(27, 2, 'sasadasd', 'root@asdasd.com', '051997ac8362d62e6e0954258f96888e', '2012-04-02 21:49:55', NULL, NULL),
(28, 2, 'asasdsads', 'root@asdasd.com', '20b8f09ceea09dbab9bd7bd344bbdf76', '2012-04-02 21:50:45', NULL, NULL),
(29, 2, 'sasadsad', 'root@asdasd.com', 'f81d34c85ae7a80a9e423d44e8f1d89d', '2012-04-02 21:55:55', NULL, NULL),
(30, 2, 'sasdsadsad', 'root@asasd.com', 'b4eba580c6acb3ba4dce53a7b9c268f2', '2012-04-02 21:57:05', NULL, NULL),
(31, 2, 'asdasdsa', 'root@asads.com', '3f725567db2cb320d55636e6c1cbdfe5', '2012-04-02 22:11:12', NULL, NULL),
(32, 2, 'erabiltzaile', 'erabiltzailea@erabiltzailea.com', '2123583aa05eba331442dd8d5ff7b940', '2012-04-06 21:46:34', '2012-04-06 22:26:29', NULL);

-- --------------------------------------------------------

--
-- Taularen egitura taula honentzat:  `etiketak`
--

CREATE TABLE IF NOT EXISTS `etiketak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `izena` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Taula honen datuak irauli `etiketak`
--

INSERT INTO `etiketak` (`id`, `izena`) VALUES
(1, 'ekonomia'),
(2, 'elikadura subiranotasuna'),
(3, 'desazkundea'),
(4, 'agroekologia');

-- --------------------------------------------------------

--
-- Taularen egitura taula honentzat:  `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `createad` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Taula honen datuak irauli `groups`
--

INSERT INTO `groups` (`id`, `name`, `active`, `createad`, `updated`, `deleted`) VALUES
(1, 'admin', 1, '2012-04-02 17:04:33', NULL, NULL),
(2, 'erabiltzailea', 1, '2012-04-02 17:04:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Taularen egitura taula honentzat:  `groups_permissions`
--

CREATE TABLE IF NOT EXISTS `groups_permissions` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `group_id` int(8) NOT NULL,
  `permission_id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Taula honen datuak irauli `groups_permissions`
--

INSERT INTO `groups_permissions` (`id`, `group_id`, `permission_id`) VALUES
(1, 2, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Taularen egitura taula honentzat:  `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Taula honen datuak irauli `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `url`, `active`, `created`, `updated`, `deleted`) VALUES
(1, 'index erabiltzaileak', 'erabiltzailea/', 1, '2012-04-07 00:00:00', NULL, NULL),
(2, 'add erabiltzailea', 'erabiltzailea/add', 1, '2012-04-07 00:00:00', NULL, NULL),
(3, 'Update erabiltzaileak', 'erabiltzailea/update', 1, '2012-04-07 00:00:00', NULL, NULL),
(4, 'Delete erabiltzaileak', 'erabiltzailea/delete', 1, '2012-04-07 00:00:00', NULL, NULL);
