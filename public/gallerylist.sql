-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 15 2019 г., 09:28
-- Версия сервера: 8.0.15
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-level1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallerylist`
--

CREATE TABLE `gallerylist` (
  `id` int(11) NOT NULL,
  `fileName` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `fileSize` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `likes` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallerylist`
--

INSERT INTO `gallerylist` (`id`, `fileName`, `fileSize`, `likes`) VALUES
(1, '01.jpg', '111456 байт', 9),
(2, '02.jpg', '70076 байт', 2),
(3, '03.jpg', '70215 байт', 1),
(4, '04.jpg', '61733 байт', 0),
(5, '05.jpg', '160617 байт', 1),
(6, '06.jpg', '89871 байт', 2),
(7, '07.jpg', '99418 байт', 0),
(8, '08.jpg', '103775 байт', 0),
(9, '09.jpg', '81022 байт', 0),
(10, '10.jpg', '97127 байт', 0),
(11, '11.jpg', '98579 байт', 0),
(12, '12.jpg', '139286 байт', 0),
(13, '13.jpg', '113016 байт', 0),
(14, '14.jpg', '151814 байт', 0),
(15, '15.jpg', '112488 байт', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallerylist`
--
ALTER TABLE `gallerylist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallerylist`
--
ALTER TABLE `gallerylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
