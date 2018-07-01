-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 04 2015 р., 19:59
-- Версія сервера: 5.5.27
-- Версія PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `name_page` varchar(255) NOT NULL,
  `descript_page` varchar(255) NOT NULL,
  `text_page` text NOT NULL,
  `menu` int(12) NOT NULL DEFAULT '0',
  `show` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id_user`, `name`, `pass`, `mail`) VALUES
(1, 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@test'),
(2, 'test2', 'e10adc3949ba59abbe56e057f20f883e', 'test@test'),
(3, 'test2555', '5b1b68a9abf4d2cd155c81a9225fd158', '555555'),
(4, 'test266666', 'ad5e04d63467f88063c4b12f7cebf2ba', 'fghdfhdfh'),
(5, 'test29999', 'fb15a22a63f26b4a2a63fff47be7f5a2', 'cvgcgcgc'),
(6, 'test2ssss', '837a502d6d0bb6e5c54b0204148eff40', 'test@test'),
(7, 'test2888888888888', '6cdf396173123eac91b9f42df504dc69', 'test@test'),
(8, 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'qwertyuiu'),
(9, 'usernew', 'fcea920f7412b5da7be0cf42b8c93759', 'test1@test1'),
(10, 'root', '827ccb0eea8a706c4c34a16891f84e7b', 'test@test111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
