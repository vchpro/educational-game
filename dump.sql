-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 25 2020 г., 10:13
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
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'number',
  `question` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a1` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a2` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `type`, `question`, `ans`, `a1`, `a2`) VALUES
(1, 'number', '2+2', '4', '', ''),
(2, 'number', '32+50', '82', '', ''),
(3, 'number', '24 * 2', '48', '', ''),
(4, 'number', '50 / 2', '25', '', ''),
(5, 'text', 'На какие числа делится 72? ', '8 и 9', '5 и 3', '2 и 7'),
(6, 'text', 'На какие числа делится 231?  ', '7 и 11', '2 и 3', '2 и 7'),
(7, 'text', 'Автомобиль двигается со скоростью 80 км/ч. Сколько километров он проедет за 3 часа? ', '240км', '27км ', '210км'),
(8, 'text', 'За 2 часа автомобиль проехал 96 км, а велосипедист за 6 часов проехал 72 км. Во сколько раз автомобиль двигался быстрее велосипедиста?', 'в 4 раза', 'в 3 раза', 'в 2 раза'),
(9, 'text', '654 грамма в тоннах', '0,000654', '0,00654', '0,654'),
(10, 'text', '7 миллиграмм в килограммах', '0,000007', '0,0007', '0,007'),
(11, 'text', '43 километра в сантиметрах', '430000', '0,043', '4300'),
(12, 'text', '63 дециметра в сантиметрах', '630', '0,63', '6300'),
(13, 'text', 'Мальчик прошел 15 км за 5 часов. Какая у него скорость?', '3 км/ч', '75 км/ч', '10 км/ч'),
(14, 'text', 'Скорость машины 30 км/ч. Какое растояние она проедет за 5 часов?', '150 км', '250 км', '80 км'),
(15, 'text', 'С какой скоростью нужно двигаться, чтобы пройти 350 км ровно за 5 часов?', '70 км/ч', '300 км/ч', '85 км/ч'),
(16, 'number', 'VI + X * VII', '76', '', ''),
(17, 'number', 'LX/XX - II ', '1', '', ''),
(18, 'number', 'XCI – LXXII * III + III', '60', '', ''),
(19, 'number', 'III*L – LIV*IX + L/X', '149', '', ''),
(20, 'number', 'VI * IV + IX*XI ', '123', '', ''),
(21, 'number', 'XCV – V*II – L*X/IV', '-40', '', ''),
(22, 'number', 'В треугольнике ABC AB=3 BC=4, а угол С = 60°. Найти угол A.', '30', '', ''),
(23, 'number', 'Найдите корень уравнения 5x+5=30', '5', '', ''),
(24, 'text', 'У мамы Юли было пять дочерей Карина, Аня, Таня, Яна. Как звали пятую дочь? ', 'Юля', 'Катя', 'Аня'),
(25, 'text', 'У Саши было пять дочерей Карина, Аня, Таня, Яна. Как звали пятую дочь? ', 'Катя', 'Саша', 'Яна'),
(26, 'text', 'Что ваши друзья и знакомые используют чаще чем вы, но это является вашей собственностью?', 'Имя', 'Вещи', 'Дружбу'),
(27, 'text', 'Что постоянно ходит, но при этом в большинстве случаев оставаясь на одном месте? ', 'часы', 'человек', 'дом'),
(28, 'number', 'У каждого из братьев есть определенное количество денег. У старшего на 25 процентов больше, чем у младшего. Сколько процентов денег должен отдать старший брат младшему, чтобы денег у них стало поровну?', '10', '', ''),
(29, 'number', 'В вашем шкафу для носков имеется : 4 белых носка, 8 черных, 3 коричневых и 5 серых. Какое минимальное количество носков надо вытащить из шкафа не глядя, чтобы быть уверенным, что вы получите хотя бы одну пару одинаковых носков?', '5', '', ''),
(30, 'text', 'Продолжите следующую последовательность букв:<br>С О Н Д Я Ф М ..', 'А', 'Ы', 'Л'),
(31, 'number', '<img src=\"img/tests/1.png\">', '6', '', ''),
(32, 'number', '<img src=\"img/tests/2.png\">', '0', '', ''),
(33, 'number', '<img src=\"img/tests/3.png\">', '10', '', ''),
(34, 'number', '<img src=\"img/tests/4.png\">', '-15', '', ''),
(35, 'number', '<img src=\"img/tests/5.png\">', '11', '', ''),
(36, 'number', '<img src=\"img/tests/6.png\">', '1', '', ''),
(37, 'number', '<img src=\"img/tests/7.png\">', '93', '', ''),
(38, 'number', '<img src=\"img/tests/8.png\">', '31', '', ''),
(39, 'number', '<img src=\"img/tests/9.png\">', '101', '', '');

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
  `ans` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `control` int(11) NOT NULL DEFAULT '0',
  `checkcontrol` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `points`, `math_level`, `logic_level`, `ans`, `control`, `checkcontrol`) VALUES
(4, 'mail.vchpro@yandex.ru', 'Влад', '$2y$10$0iF3h02o/U0nMTdM8dTpnuu4ZB5bzdmpxeSlO/PlXHwNAcOnvrJBO', 1100, 31, 7, '0', 0, 0),
(5, 'test@mail.ru', 'Тестер', '$2y$10$0iF3h02o/U0nMTdM8dTpnuu4ZB5bzdmpxeSlO/PlXHwNAcOnvrJBO', 130, 25, 2, '15 раз', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
