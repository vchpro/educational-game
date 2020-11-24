-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2020 г., 15:42
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a1` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a2` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `question`, `ans`, `a1`, `a2`) VALUES
(1, '100 + 30', '130', '', ''),
(2, '80 / 2', '40', '', ''),
(3, '35 + 9 / 3', '38', '', ''),
(4, '7 / 7 + 30', '31', '', ''),
(5, '35 : (5 + 2)', '5', '', ''),
(6, '101 - 12', '89', '', ''),
(7, '155 - 74 + 1', '82', '', ''),
(8, '77 + 33', '110', '', ''),
(9, '0 - 5 + 7', '2', '', ''),
(10, '(95 - 47) / 2', '24', '', ''),
(11, '(8 + 4) / 3', '4', '', ''),
(12, '12 - 5 + 55 / 5', '18', '', ''),
(13, 'Мальчик прошел 15 км за 5 часов. Какая у него скорость?', '3 км/ч', '75 км/ч', '10 км/ч'),
(14, 'Скорость машины 30 км/ч. Какое растояние она проедет за 5 часов?', '150 км', '250 км', '80 км'),
(15, 'С какой скоростью нужно двигаться, чтобы пройти 350 км ровно за 5 часов?', '70 км/ч', '300 км/ч', '85 км/ч');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `math_level` int(11) NOT NULL DEFAULT '0',
  `logic_level` int(11) NOT NULL DEFAULT '0',
  `ans` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `points`, `math_level`, `logic_level`, `ans`) VALUES
(4, 'mail.vchpro@yandex.ru', 'Влад', '$2y$10$0iF3h02o/U0nMTdM8dTpnuu4ZB5bzdmpxeSlO/PlXHwNAcOnvrJBO', 70, 15, 0, '70 км/ч');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
