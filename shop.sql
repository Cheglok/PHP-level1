-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 22 2019 г., 07:25
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
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `name`, `description`, `picture`) VALUES
(1, 'AETHWY ROSE A LEE', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nА. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nСука<br>\r\nДата рождения:\r\n08 февраля 2019<br>\r\nОкрас:\r\nТигровый<br>', 'AETHWY_ROSE_A_LEE'),
(2, 'AETHWY RELYING ON YOU', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nА. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nСука<br>\r\nДата рождения:\r\n08 февраля 2019<br>\r\nОкрас:\r\nТрехцветный с тигровыми отметинами<br>', 'AETHWY_RELYING_ON_YOU'),
(3, 'AETHWY SOUL DEEP', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nН. Трофимова и А. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nКобель<br>\r\nДата рождения:\r\n17 мая 2019<br>\r\nОкрас:\r\nТрехцветный с тигровыми отметинами<br>', 'AETHWY_SOUL_DEEP'),
(4, 'AETHWY SUN KING', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nН. Трофимова и А. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nКобель<br>\r\nДата рождения:\r\n17 мая 2019<br>\r\nОкрас:\r\nМраморный<br>', 'AETHWY_SUN_KING');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `dogId` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `dogId`, `name`, `feedback`) VALUES
(1, 1, 'Mishka', 'Очень нравится необычныйокрас'),
(26, 2, 'Dasha', 'Not bad'),
(27, 3, 'Tanya', 'Nice design'),
(70, 1, 'Петр', 'Милый пёс. А прививки уже сделали?'),
(84, 3, 'test', 'test'),
(88, 4, 'катя', 'как дела'),
(90, 3, 'Хозяин', 'Большой вырастет'),
(91, 4, 'Станислав', 'Хочу забронировать'),
(92, 2, 'Эксперт', 'Точно возьмет первое место'),
(97, 1, 'Киса', 'Мяу');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;