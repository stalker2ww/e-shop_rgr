-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 07 2022 р., 00:38
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `e_shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Customers`
--

CREATE TABLE `Customers` (
  `customer_id` int NOT NULL,
  `full_name` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `Customers`
--

INSERT INTO `Customers` (`customer_id`, `full_name`, `phone_number`) VALUES
(1, 'Микола Михайлович Абабатов', 380974235413),
(2, 'Олександр Артемович Ніконов', 380639573211),
(4, 'Діма Дмитрійов Гаус', 380692884321),
(7, 'Богдан Васильович Миронов', 380332156591),
(8, 'Євгеній Максимович Нігільський', 380945674486),
(9, 'ФОП Роман', 380632544522),
(10, 'Антоніна Вікторівна Омежка', 380722154599),
(11, 'Олександр Абаба Даниленко', 380986542032),
(12, 'Петро Петрович Нікольський', 380954863368),
(14, 'ПрАТ Мальборо', 602537);

-- --------------------------------------------------------

--
-- Структура таблиці `Goods`
--

CREATE TABLE `Goods` (
  `goods_id` int NOT NULL,
  `goods_name` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `Goods`
--

INSERT INTO `Goods` (`goods_id`, `goods_name`, `price`, `quantity`) VALUES
(9, 'MSI RTX4080', 80000, 2),
(10, 'Asus RTX 3060 Ti', 21000, 8),
(11, 'Arctic MX-2', 133, 122),
(12, 'Kingston KC2000 1TB', 5300, 7),
(13, 'Arctic MX-4', 899, 3),
(14, 'MSI Armor GTX 1060 6GB', 6600, 15);

-- --------------------------------------------------------

--
-- Структура таблиці `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int NOT NULL,
  `goods_id` int NOT NULL,
  `order_date` date NOT NULL,
  `quantity` int NOT NULL,
  `order_cost` int NOT NULL,
  `comment` char(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `Orders`
--

INSERT INTO `Orders` (`order_id`, `goods_id`, `order_date`, `quantity`, `order_cost`, `comment`) VALUES
(32, 10, '2022-06-03', 4, 84000, ''),
(333, 9, '2022-12-13', 3, 222900, 'Потрібні в  стані'),
(334, 9, '2021-06-16', 3, 33333, 'Гарніше запакуйте'),
(335, 12, '2022-05-30', 2, 10600, '');

-- --------------------------------------------------------

--
-- Структура таблиці `Reviews`
--

CREATE TABLE `Reviews` (
  `review_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `goods_id` int NOT NULL,
  `mark` int NOT NULL,
  `review_text` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `Reviews`
--

INSERT INTO `Reviews` (`review_id`, `customer_id`, `goods_id`, `mark`, `review_text`) VALUES
(6, 4, 10, 4, 'Наче норм але так собі, все ж стало краще'),
(8, 12, 10, 4, 'Nzuyt dct yf ekmnhf[!!!'),
(9, 7, 9, 5, 'Жере мама не горюй, але робить класно');

-- --------------------------------------------------------

--
-- Структура таблиці `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int NOT NULL,
  `full_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `level` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `usertbl`
--

INSERT INTO `usertbl` (`id`, `full_name`, `email`, `username`, `password`, `level`) VALUES
(2, 'ФОП Роман', 'usertest@ukr.net', 'user', 'userpassword', NULL),
(3, 'admin', 'admintest@ukr.net', 'admin', 'adminpassword', 'admin'),
(4, 'Artom', 'artomdotkom@ukram.net', 'artemida', 'artimida228', NULL),
(5, 'Жабка Абабка', 'amogus@gmail.com', 'Jabka', 'Jabka228', NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Індекси таблиці `Goods`
--
ALTER TABLE `Goods`
  ADD PRIMARY KEY (`goods_id`);

--
-- Індекси таблиці `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_2` (`goods_id`);

--
-- Індекси таблиці `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviews_ibfk_2` (`customer_id`),
  ADD KEY `reviews_ibfk_3` (`goods_id`);

--
-- Індекси таблиці `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `Customers`
--
ALTER TABLE `Customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `Goods`
--
ALTER TABLE `Goods`
  MODIFY `goods_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT для таблиці `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `Goods` (`goods_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `Goods` (`goods_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Обмеження зовнішнього ключа таблиці `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`customer_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `Customers` (`customer_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`goods_id`) REFERENCES `Goods` (`goods_id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
