-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 24 2019 г., 09:49
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd_olga-myagkova`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `coment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `text`, `coment`) VALUES
(0, 'Включает в себя два занятия длительностью 4-5 часов. Стоимость индивидуального занятия 4000₽, стоимость занятия в группе 3500₽. Вся косметика и кисти предоставляются школой.', 'Макияж для себя'),
(1, 'Программа включает в себя 10 занятий длительностью 4 часа. Есть утренние и вечерние группы. Стоимость курса в группе 20000₽, стоимость индивидуальной программы 26500₽', 'Базовый курс по макияжу');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `question` text NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `date`, `name`, `mail`, `question`, `admin`) VALUES
(19, '12/24/2018 16:15', 'Людмила', 'LudaMalinina@mail.ru', 'Какой у Вас опыт работы с невестами?', 1),
(20, '12/24/2018 16:16', 'Оля', 'Ole4kaaa@list.ru ', 'Даете ли вы скидку на первое посещение?', 1),
(21, '12/24/2018 10:18', 'Александр', 'meelnik@gmail.com', 'Когда будут акции?', 1),
(22, '12/24/2018 10:40', 'Дашулька', 'Djdj@yo.ru', 'How match?', 1),
(23, '1/20/2019 18:03', 'Томара', 'm.a.palcev@mail.ru', 'Каким шампунем лучше мыть голову?', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `date_request` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `select_request` text NOT NULL,
  `date` text NOT NULL,
  `comment` text NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `date_request`, `name`, `phone`, `mail`, `select_request`, `date`, `comment`, `admin`) VALUES
(7, '12/24/2018 10:07', 'Ольга ', '89106346242', 'olgamyagkova89@mail.ru', 'Прическа и макияж', '12/26/2018', '12:00 на фотосессию ', 1),
(9, '12/24/2018 10:16', 'Александр', '89143692796', 'meelnik@gmail.com', 'Стрижка', '12/25/2018', 'Мужская стрижка', 1),
(10, '12/24/2018 16:21', 'Женя', '2706908', 'EvgMas@mail.ru', 'Стрижка', '12/25/2018', '', 1),
(11, '12/24/2018 16:21', 'Людмила', '9825080444', 'gamp@gmail.ru', 'Стрижка', '01/21/2019', 'Консультация', 1),
(12, '12/24/2018 10:39', 'Дашулька', '+3807863789', 'Whdj@yo.ru', 'Стрижка', '12/25/2018', '', 1),
(13, '1/18/2019 14:37', 'Елена', '9105080787', 'horoshkova@gmail.com', 'Окрашивание', '01/18/2019', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `services_category`
--

CREATE TABLE `services_category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services_category`
--

INSERT INTO `services_category` (`id`, `name`) VALUES
(1, 'услуги стилиста'),
(2, 'парикмахерские услуги');

-- --------------------------------------------------------

--
-- Структура таблицы `services_price`
--

CREATE TABLE `services_price` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services_price`
--

INSERT INTO `services_price` (`id`, `name`, `price`, `category`) VALUES
(1, 'Свадебный или выпускной образ', '6000', 1),
(2, 'Вечерний образ', '5000', 1),
(3, 'Образ для фотосессии', '3000', 1),
(4, 'Свадебная или выпускная прическа', '3500', 1),
(5, 'Вечерняя прическа', '3000', 1),
(6, 'Экспресс прическа, локоны', '2000', 1),
(7, 'Свадебный или выпускной макияж', '3500', 1),
(8, 'Вечерняя прическа', '3000', 1),
(9, 'Экспресс макияж', '2000', 1),
(10, 'Стрижка', '400-800', 2),
(11, 'Окрашивание в 1 тон, тонирование', '1800-3500', 2),
(12, 'Мелирование', '2000-4000', 2),
(13, 'Сложные окрашивания', '3500-8000', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '37cf8e36ca1c4a5715555bf0d3162fae');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services_category`
--
ALTER TABLE `services_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services_price`
--
ALTER TABLE `services_price`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `services_category`
--
ALTER TABLE `services_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `services_price`
--
ALTER TABLE `services_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
