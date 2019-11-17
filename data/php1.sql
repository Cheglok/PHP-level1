-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 17 2019 г., 16:23
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
-- База данных: `php1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `session_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `goods_id`, `name`, `feedback`) VALUES
(1, 1, 'Mishka', 'Очень нравится необычныйокрас'),
(26, 2, 'Dasha', 'Not badd'),
(27, 3, 'Tanya', 'Nice design'),
(70, 1, 'Петр', 'Милый пёс. А прививки уже сделали?'),
(84, 3, 'test', 'test'),
(88, 4, 'катя', 'как дела'),
(90, 3, 'Хозяин', 'Большой вырастет'),
(91, 4, 'Станислав', 'Хочу забронировать'),
(92, 2, 'Эксперт', 'Точно возьмет первое место'),
(97, 1, 'Киса', 'Мяуee'),
(107, 2, 'Dasha', 'N'),
(111, 2, 'вася', 'мой первый коммент'),
(117, 15, '214356234', 'safa'),
(118, 15, '214356234', 'safa');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `image`, `price`) VALUES
(2, 'AETHWY RELYING ON YOU', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nА. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nСука<br>\r\nДата рождения:\r\n08 февраля 2019<br>\r\nОкрас:\r\nТрехцветный с тигровыми отметинами<br>', 'AETHWY_RELYING_ON_YOU.jpeg', 50),
(3, 'AETHWY SOUL DEEP', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nН. Трофимова и А. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nКобель<br>\r\nДата рождения:\r\n17 мая 2019<br>\r\nОкрас:\r\nТрехцветный с тигровыми отметинами<br>', 'AETHWY_SOUL_DEEP.jpeg', 100),
(4, 'AETHWY SUN KING', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nН. Трофимова и А. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nКобель<br>\r\nДата рождения:\r\n17 мая 2019<br>\r\nОкрас:\r\nМраморный<br>', 'AETHWY_SUN_KING.jpeg', 70),
(13, 'AETHWY ROSE A LEE', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nА. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nСука<br>\r\nДата рождения:\r\n08 февраля 2019<br>\r\nОкрас:\r\nТигровый<br>', 'AETHWY_ROSE_A_LEE.jpeg', 64),
(76, 'Dog', 'North laika', 'image5', 125),
(77, 'Ананас', 'Вкусный, спелый!', NULL, 125),
(82, 'AETHWY RELYING ON YOU', 'ladkja;wegj/sd', 'AETHWY_RELYING_ON_YOU.jpeg', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `tel`, `email`) VALUES
(1, 'duq1mr26fpbmongi3q1got15amjo92u1', '78945446123', 'Kopytovmikhail@yandex.ru'),
(2, 'duq1mr26fpbmongi3q1got15amjo92u1', '78945446123', 'Kopytovmikhail@yandex.ru'),
(3, 'duq1mr26fpbmongi3q1got15amjo92u1', 'asf', 'asdf'),
(4, 'duq1mr26fpbmongi3q1got15amjo92u1', 'asf', 'asf'),
(5, '15', '214356234', 'asddg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `hash` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`) VALUES
(24, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '1887021715dd1425ae5f742.42585933'),
(25, 'cheglok', '$2y$10$56LaJF2q1SNsZw2XR327PeUlou0mBLmkehMLLZu1KrkWmRMH3Stwe', '18195686305dd1402a497184.56523664');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
