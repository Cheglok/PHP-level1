-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2019 г., 19:23
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
  `session_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `amount` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `session_id`, `amount`) VALUES
(195, 2, 'v1hpo78e472l2eja6uokmhvp8ot9spk0', 1),
(198, 2, 'v1hpo78e472l2eja6uokmhvp8ot9spk0', NULL),
(203, 3, 'i3qplmk639bddtlcu5e6gkkvo7r2k654', NULL),
(205, 3, '017gc7ar1doevcs93hsan19evpfulpr4', NULL),
(206, 4, '017gc7ar1doevcs93hsan19evpfulpr4', NULL),
(207, 13, '017gc7ar1doevcs93hsan19evpfulpr4', NULL),
(208, 2, 'r5mrk0nqk2r28553ftmev1bbc013j82p', NULL),
(209, 3, 'r5mrk0nqk2r28553ftmev1bbc013j82p', NULL),
(210, 2, 'u4a650qdgaq2bb4jr79j1iq1982f9iab', NULL),
(211, 3, 'u4a650qdgaq2bb4jr79j1iq1982f9iab', NULL);

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
(13, 'AETHWY ROSE A LEE', 'Порода:\r\nВельш корги кардиган<br>\r\nСтрана происхождения:\r\nРоссия<br>\r\nЗаводчик:\r\nА. Хватов (Питомник Aethwy)<br>\r\nПол:\r\nСука<br>\r\nДата рождения:\r\n08 февраля 2019<br>\r\nОкрас:\r\nТигровый<br>', 'AETHWY_ROSE_A_LEE.jpeg', 64);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `tel`, `email`, `status`) VALUES
(27, 'i3qplmk639bddtlcu5e6gkkvo7r2k654', '333', '333', 'new'),
(28, '017gc7ar1doevcs93hsan19evpfulpr4', '78945446123', 'kopytovmikhail@yandex.ru', 'new'),
(29, 'u4a650qdgaq2bb4jr79j1iq1982f9iab', '3462346632', 'dog@love.com', 'sent');

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
(24, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '16594058595dff3686477061.52995134'),
(25, 'cheglok', '$2y$10$56LaJF2q1SNsZw2XR327PeUlou0mBLmkehMLLZu1KrkWmRMH3Stwe', '1629380615dff3bb7c7de62.12889640');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
