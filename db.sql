-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 25 2023 г., 21:47
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `modebyru_d4e`
--

-- --------------------------------------------------------

--
-- Структура таблицы `base`
--

CREATE TABLE `base` (
  `id` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `turn` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `base`
--

INSERT INTO `base` (`id`, `deposit`, `turn`, `title`) VALUES
(1, 1700, 'null', 'real'),
(2, 35831, 'GLOBAL', 'DEPOSIT'),
(3, 0, 'MINUS', 'All minus in day'),
(4, 1000, 'PLUS', 'All plus in day');

-- --------------------------------------------------------

--
-- Структура таблицы `cat_product`
--

CREATE TABLE `cat_product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mod` varchar(11) NOT NULL,
  `ballance` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `lname`, `phone`, `login`, `password`, `mod`, `ballance`, `num`) VALUES
(1, 'Adil', 'Just', '87776948567', 'Adil', '@dil2020', '1', 5, 123456),
(12, 'User', 'New', '87771279904', 'lopglop', 'admin', '1', 0, 224536);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `category`, `color`, `email`, `number`) VALUES
(5, 'Adil', 'JCS Developer', '#460174', 'adil19032004@gmail.com', '77771279904');

-- --------------------------------------------------------

--
-- Структура таблицы `dc_hist`
--

CREATE TABLE `dc_hist` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `sum` int(11) NOT NULL,
  `from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dc_hist`
--

INSERT INTO `dc_hist` (`id`, `date`, `user`, `type`, `sum`, `from`) VALUES
(5, '2022-11-09 11:06', 1, 'plus', 900, 'PlayStation 5'),
(6, '2022-11-09 11:06', 1, 'plus', 500, 'PlayStation 5 (+Бонус)'),
(7, '2022-11-09 11:06', 1, 'plus', 5000, 'PlayStation 5'),
(8, '2022-11-09 11:23', 1, 'plus', 600, 'PlayStation 5'),
(9, '2022-11-09 12:32', 1, 'plus', 2000, 'PlayStation 5'),
(10, '2022-11-09 12:32', 1, 'plus', 900, 'PlayStation 5 (+Бонус)'),
(11, '', 1, 'minus', 1000, 'PlayStation 5'),
(12, '2022-11-09 14:48', 1, 'minus', 1000, 'PlayStation 5'),
(13, '2022-11-09 14:49', 1, 'minus', 1000, 'PlayStation 5'),
(14, '2022-11-09 14:49', 1, 'minus', 1000, 'PlayStation 5'),
(15, '2022-11-09 14:50', 1, 'minus', 1000, 'PlayStation 5'),
(16, '2022-11-09 14:51', 1, 'minus', 1000, 'PlayStation 5'),
(17, '2022-11-09 14:51', 1, 'minus', 1000, 'PlayStation 5'),
(18, '2022-11-09 14:52', 1, 'minus', 1000, 'PlayStation 5'),
(19, '2022-11-09 14:53', 1, 'minus', 1000, 'PlayStation 5'),
(20, '2022-11-09 14:53', 1, 'minus', 1000, 'PlayStation 5'),
(21, '2022-11-09 14:53', 1, 'minus', 1000, 'PlayStation 5'),
(22, '2022-11-09 14:53', 1, 'minus', 1000, 'PlayStation 5'),
(23, '2022-11-09 15:02', 1, 'minus', 1000, 'PlayStation 5'),
(24, '2022-11-10 02:39', 1, 'plus', 1000, 'PlayStation 5'),
(25, '', 0, 'minus', 1000, 'PlayStation 5, 1 час'),
(26, '2022-11-10 02:59', 1, 'minus', 100, 'PlayStation 5');

-- --------------------------------------------------------

--
-- Структура таблицы `depop`
--

CREATE TABLE `depop` (
  `id` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `comment` mediumtext NOT NULL,
  `personal` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `depop`
--

INSERT INTO `depop` (`id`, `sum`, `date`, `title`, `comment`, `personal`, `type`) VALUES
(49, 1000, '2022-10-31 22:31:58', 'тест', 'тест', '7', 'plus'),
(51, 100, '2022-11-01 07:47', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(52, 0, '2022-11-01 07:49', 'PS5', 'PS 0 час, 3 минут ', '7', 'plus'),
(53, 0, '2022-11-01 07:49', 'PS5', 'PS 0 час, 3 минут ', '7', 'plus'),
(54, 500, '2022-11-01 07:49', 'PS5', 'PS 0 час, 3 минут ', '7', 'plus'),
(55, 100, '2022-11-01 07:50', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(56, 0, '2022-11-01 07:50', 'PS5', 'PS 0 минут ', '7', 'plus'),
(57, 1000, '2022-11-01 20:43', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(58, 6040, '2022-11-02 01:45', 'PS5', 'PS 302 минут ', '7', 'plus'),
(59, 500, '2022-11-02 01:46', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(60, 20, '2022-11-02 01:47', 'PS5', 'PS 1 минут ', '7', 'plus'),
(61, 50, '2022-11-02 01:47', 'PS5', 'PS 1 минут ', '7', 'plus'),
(62, 2000, '2022-11-02 01:47', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(63, 500, '2022-11-02 01:48', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(64, 500, '2022-11-02 01:49', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(65, 690, '2022-11-02 09:20', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(66, 1000, '2022-11-02 09:21', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(67, 1000, '2022-11-02 09:22:36', 'PS5', 'PS 60 минут ', '7', 'plus'),
(68, 1000, '2022-11-02 09:23:18', 'PS5', 'PS 60 минут ', '7', 'plus'),
(69, 1000, '2022-11-02 09:23', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(70, 1000, '2022-11-02 09:24:11', 'PS5', 'PS 60 минут ', '7', 'plus'),
(71, 1000, '2022-11-02 09:25', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(72, 500, '2022-11-02 09:25:21', 'PS5', 'PS 60 минут ', '7', 'plus'),
(73, 500, '2022-11-02 09:26', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(74, 500, '2022-11-02 09:27:01', 'PS5', 'PS 60 минут ', '7', 'plus'),
(75, 1000, '2022-11-02 09:27', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(76, 500, '2022-11-02 09:28:54', 'PS5', 'PS 10 минут ', '7', 'plus'),
(77, 500, '2022-11-02 09:30:14', 'PS5', 'PS 10 минут ', '7', 'plus'),
(78, 1000, '2022-11-02 09:31:16', 'PS5', 'PS 60 минут ', '7', 'plus'),
(79, 1000, '2022-11-02 09:31', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(80, 2000, '2022-11-02 09:31:58', 'PS5', 'PS 60 минут ', '7', 'plus'),
(81, 1000, '2022-11-02 09:33', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(82, 500, '2022-11-02 09:33:45', 'PS5', 'PS 120 минут ', '7', 'plus'),
(83, 100, '2022-11-02 21:11', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(84, 500, '2022-11-02 21:33', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(85, 0, '2022-11-02 21:34', 'PS5', 'PS 0 минут ', '7', 'plus'),
(86, 1000, '2022-11-02 21:38', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(87, 1000, '2022-11-02 21:39:10', 'PS5', 'PS 60 минут ', '7', 'plus'),
(88, 200, '2022-11-02 21:39', 'PS5', 'PS 2 час, 0 минут ', '7', 'plus'),
(89, 800, '2022-11-02 21:39', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(90, 200, '2022-11-05 10:49', 'PS5', 'PS 0 час, 2 минут ', '7', 'plus'),
(91, 0, '2022-11-05 11:04', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(92, 0, '2022-11-05 11:04', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(93, 0, '2022-11-05 11:05', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(94, 1000, '2022-11-05 11:16', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(95, 100, '2022-11-05 11:17', 'PS5', 'PS 0 час, 2 минут ', '7', 'plus'),
(96, 0, '2022-11-05 11:17', 'PS5', 'PS 0 час, 30 минут ', '7', 'plus'),
(97, 0, '2022-11-05 11:19', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(98, 0, '2022-11-05 11:20', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(99, 0, '2022-11-05 11:22', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(100, 0, '2022-11-05 11:24', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(101, 0, '2022-11-05 11:24', 'PS5', 'PS 0 час, 2 минут ', '7', 'plus'),
(102, 0, '2022-11-05 11:24', 'PS5', 'PS 0 час, 30 минут ', '7', 'plus'),
(103, 0, '2022-11-05 11:25', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(104, 100, '2022-11-08 01:49', 'PS5', 'PS 0 час, 10 минут ', '7', 'plus'),
(105, 200, '2022-11-08 01:49', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(106, 1, '2022-11-08 01:49', 'PS5', 'PS 0 час, 50 минут ', '7', 'plus'),
(107, 0, '2022-11-08 02:02', 'PS5', 'PS 13 минут ', '7', 'plus'),
(108, 0, '2022-11-08 02:02', 'PS5', 'PS 0 час, 10 минут ', '7', 'plus'),
(109, 10, '2022-11-08 02:02', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(110, 0, '2022-11-08 02:03', 'PS5', 'PS 0 минут ', '7', 'plus'),
(111, 500, '2022-11-08 02:04', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(112, 200, '2022-11-08 02:09', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(113, 0, '2022-11-08 02:10', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(114, 0, '2022-11-08 02:11', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(115, 0, '2022-11-08 02:12', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(116, 0, '2022-11-08 02:13', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(117, 0, '2022-11-08 02:15', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(118, 500, '2022-11-08 02:30', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(119, 100, '2022-11-08 02:32', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(120, 0, '2022-11-08 02:34', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(121, 0, '2022-11-08 02:35', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(122, 0, '2022-11-08 02:39', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(123, 0, '2022-11-08 02:42', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(124, 0, '2022-11-08 02:43', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(125, 0, '2022-11-08 02:44', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(126, 0, '2022-11-08 02:50', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(127, 0, '2022-11-08 02:52', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(128, 0, '2022-11-08 02:53', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(129, 20, '2022-11-08 02:55', 'PS5', 'PS 1 минут ', '7', 'plus'),
(130, 0, '2022-11-08 02:55', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(131, 0, '2022-11-08 02:57', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(132, 0, '2022-11-08 22:54', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(133, 0, '2022-11-08 22:57', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(134, 0, '2022-11-08 22:58', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(135, 0, '2022-11-08 23:14', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(136, 0, '2022-11-08 23:15', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(137, 0, '2022-11-08 23:15', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(138, 0, '2022-11-08 23:15', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(139, 0, '2022-11-08 23:15', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(140, 0, '2022-11-08 23:15', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(141, 0, '2022-11-08 23:15', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(142, 0, '2022-11-08 23:16', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(143, 0, '2022-11-08 23:16', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(144, 0, '2022-11-08 23:16', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(145, 0, '2022-11-08 23:16', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(146, 100, '2022-11-08 23:16', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(147, 0, '2022-11-08 23:17', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(148, 0, '2022-11-08 23:17', 'PS5', 'PS 1 час, 0 минут ', '7', 'plus'),
(149, 0, '2022-11-08 23:17', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(150, 0, '2022-11-08 23:17', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(151, 500, '2022-11-08 23:24', 'PS5', 'PS 0 час, 1 минут ', '7', 'plus'),
(152, 1000, '2022-11-08 23:24', 'PS5', 'PS 0 час, 2 минут ', '7', 'plus'),
(153, 140, '2022-11-08 23:30', 'PS5', 'PS 7 минут ', '7', 'plus'),
(154, 60, '2022-11-08 23:34', 'PS5', 'PS 3 минут ', '7', 'plus'),
(155, 2000, '2022-11-09 12:32:43', 'DClient', 'Пополнение акаунта Adil', '1', 'plus'),
(178, 0, '2022-11-09 15:02:35', 'С акаунта DClient', 'Оплата 1000, с баланса (Adil)', 'Just Kassa', 'plus'),
(179, 0, '2022-11-10 01:59', 'PS5', 'PS 1 час, 0 минут ', '1', 'plus'),
(180, 1000, '2022-11-10 02:39:41', 'DClient', 'Пополнение акаунта Adil', '1', 'plus'),
(181, 0, '2022-11-10 02:39:54', 'С акаунта DClient', 'Оплата 1000, с баланса ()', 'Just Kassa', 'plus'),
(182, 0, '2022-11-10 02:59:27', 'С акаунта DClient', 'Оплата 100, с баланса (Adil)', 'Just Kassa', 'plus'),
(183, 1000, '2022-11-18 14:02:59', 'Закуп', 'Закуп Cola 5 шт', '1', 'minus'),
(184, 1000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(185, 1500, '2022-30-01 20:43', 'PS5', 'PS 1.3 час', '7', 'plus'),
(186, 2000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(187, 3000, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(188, 3000, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(189, 2000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(190, 4000, '2022-30-01 20:43', 'PS5', 'PS 4 час', '7', 'plus'),
(191, 2000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(192, 3500, '2022-30-01 20:43', 'PS5', 'PS 2.7 час', '7', 'plus'),
(193, 3500, '2022-30-01 20:43', 'PS5', 'PS 2.7 час', '7', 'plus'),
(194, 2500, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(195, 4000, '2022-30-01 20:43', 'PS5', 'PS 4 час', '7', 'plus'),
(196, 2000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(197, 1500, '2022-30-01 20:43', 'PS5', 'PS 1.3 час', '7', 'plus'),
(198, 1000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(199, 2500, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(200, 1000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(201, 1000, '2022-30-01 20:43', 'PS5', 'PS 1 час', '7', 'plus'),
(202, 2500, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(203, 3000, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(204, 2500, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(205, 4000, '2022-30-01 20:43', 'PS5', 'PS 4 час', '7', 'plus'),
(206, 1500, '2022-30-01 20:43', 'PS5', 'PS 1.3 час', '7', 'plus'),
(207, 4000, '2022-30-01 20:43', 'PS5', 'PS 4 час', '7', 'plus'),
(208, 2500, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus'),
(209, 4000, '2022-30-01 20:43', 'PS5', 'PS 4 час', '7', 'plus'),
(210, 4000, '2022-30-01 20:43', 'PS5', 'PS 4 час', '7', 'plus'),
(211, 2500, '2022-30-01 20:43', 'PS5', 'PS 2.5 час', '7', 'plus');

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `personal` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `operation` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `personal`, `date`, `operation`, `type`) VALUES
(171, '7', '2022-11-18', 'Drink', 'Add category'),
(172, '7', '2022-11-18', 'Cola', 'Add product'),
(173, '1', '2022-11-18', 'Cola,5,', 'Update product'),
(174, '7', '2023-01-18', 'Электрот', 'Add category'),
(175, '7', '2023-01-18', 'Узи', 'Add product');

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `mod` int(3) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `personals`
--

CREATE TABLE `personals` (
  `id` int(11) NOT NULL,
  `session` int(10) NOT NULL,
  `key` varchar(50) NOT NULL,
  `ptype` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `bday` varchar(50) NOT NULL,
  `balance` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personals`
--

INSERT INTO `personals` (`id`, `session`, `key`, `ptype`, `number`, `email`, `name`, `lname`, `bday`, `balance`, `img`) VALUES
(1, 4658, 'ps5', 'kassa', '8', 'example@gmail.com', 'Just', 'Kassa', '19.03.2004', 0, 'user.png'),
(7, 46852, 'admin', 'admin', '87473964402', 'example@gmail.com', 'Kaisar', '', '14.01.98', 0, 'admin.png');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sum` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `buy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `sum`, `price`, `cat`, `buy`) VALUES
(50, 'Cola', 3, 350, '12', 200),
(51, 'Узи', 0, 3500, '13', 300);

-- --------------------------------------------------------

--
-- Структура таблицы `rents`
--

CREATE TABLE `rents` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stime` datetime NOT NULL,
  `etime` datetime NOT NULL,
  `sum` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rents`
--

INSERT INTO `rents` (`id`, `name`, `stime`, `etime`, `sum`, `type`, `stat`) VALUES
(1, 'PS-1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'null', 0),
(2, 'PS-2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'null', 0),
(3, 'PS-3 VIP', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'null', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sell_hist`
--

CREATE TABLE `sell_hist` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `personal` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sell_hist`
--

INSERT INTO `sell_hist` (`id`, `date`, `personal`, `product`, `amount`, `price`) VALUES
(211, '2022-11-18 14:03:20', '1', '', 0, 0),
(212, '2022-11-18 14:03:20', '1', 'Cola', 2, 700),
(213, '2022-11-18 14:03:20', '1', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `personal` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `plus` int(11) NOT NULL,
  `minus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cat_product`
--
ALTER TABLE `cat_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dc_hist`
--
ALTER TABLE `dc_hist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `depop`
--
ALTER TABLE `depop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sell_hist`
--
ALTER TABLE `sell_hist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `base`
--
ALTER TABLE `base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cat_product`
--
ALTER TABLE `cat_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `dc_hist`
--
ALTER TABLE `dc_hist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `depop`
--
ALTER TABLE `depop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `personals`
--
ALTER TABLE `personals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `rents`
--
ALTER TABLE `rents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sell_hist`
--
ALTER TABLE `sell_hist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT для таблицы `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
