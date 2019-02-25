-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 24 2019 г., 22:36
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `super_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `id_img` int(11) DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `published_ip` varchar(50) NOT NULL,
  `count_view` int(11) DEFAULT NULL,
  `count_comments` int(11) DEFAULT NULL,
  `is_hide` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `text`, `date_created`, `id_img`, `id_category`, `id_author`, `published_ip`, `count_view`, `count_comments`, `is_hide`) VALUES
(1, 'asd', 'asdasdasdasd', '2019-02-19 22:58:02', 20, 1, 1, '127.0.0.1', 87, 8, NULL),
(2, 'Перый блог', 'текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст', '2019-02-19 23:01:05', 21, 2, 1, '127.0.0.1', 15, 3, NULL),
(3, 'второй', 'текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст', '2019-02-19 23:01:33', 22, 3, 1, '127.0.0.1', 6, 0, NULL),
(4, 'Сегодня был очень трудный день', 'Я проснулся. Умылся. Оделся. Поел. И пошёл на работу. Там я очень усердно работал. Настал обед. Я пошёл на обед. Я поел обед. Ты дочитал этот бред до конца.', '2019-02-20 19:56:13', 23, 2, 1, '127.0.0.1', 12, 1, NULL),
(5, 'Super blog title', 'Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает. Если ты видишь текст, значит это работает.', '2019-02-20 22:09:16', 24, 1, 1, '127.0.0.1', 1, 0, NULL),
(6, 'Blog user11 title', 'opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style opa gangam style', '2019-02-20 22:36:20', 25, 3, 10, '127.0.0.1', 15, 1, NULL),
(7, 'МИД Швеции вызвал посла России после инцидента с самолетами над Балтикой', '«МИД воспринимает эту ситуацию очень серьезно. Российский самолет действовал неуместно и непрофессионально, образом, угрожающим безопасности», — заявила телеканалу представитель МИД Швеции Диана Кудхаиб (Diana Qudhaib).\r\n\r\nРанее министерство обороны Швеции утверждало, что российский истребитель Су-27 якобы приблизился на 20 метров к шведскому самолету радиотехнической разведки над Балтийским морем.\r\n\r\nМинобороны РФ, в свою очередь, заявило, что истребитель ВКС РФ Су-27 был поднят в воздух над Балтийским морем в связи с обнаружением приближающейся к границе России воздушной цели. Отмечается, что экипаж российского истребителя приблизился на безопасное расстояние к воздушному объекту для визуальной идентификации и классифицировал его как самолет-разведчик «Гольфстрим» ВВС Швеции.', '2019-02-24 19:31:38', 27, 4, 1, '127.0.0.1', 11, 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `alias` varchar(150) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `alias`, `category_name`) VALUES
(1, 'auto', 'Авто'),
(2, 'it', 'IT'),
(3, 'sport', 'Спорт'),
(4, 'animals', 'Животные');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `ip` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `id_blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `text`, `ip`, `date_created`, `id_blog`) VALUES
(1, 10, 'привееееет', '127.0.0.1', '2019-02-21 21:22:48', 1),
(3, 10, 'ого! Вот это шедевр!', '127.0.0.1', '2019-02-21 21:27:10', 1),
(4, 1, 'опа опа', '127.0.0.1', '2019-02-21 22:12:33', 2),
(5, 1, 'Вот это да, крутой', '127.0.0.1', '2019-02-22 21:12:00', 2),
(6, 1, 'бла бла бла бла бла это фантастично', '127.0.0.1', '2019-02-22 21:12:19', 4),
(7, 1, 'ураааа!!!!!!!!! СКОРО ЛЕЕТО!', '127.0.0.1', '2019-02-22 21:12:56', 6),
(8, 10, 'Комментарий !!', '127.0.0.1', '2019-02-22 21:47:55', 1),
(9, 10, 'это Комментарий !!', '127.0.0.1', '2019-02-22 21:48:18', 1),
(10, 10, 'это Комментарий !! это Комментарий !! это Комментарий !!', '127.0.0.1', '2019-02-22 21:48:21', 1),
(11, 10, 'это Комментарий !! это Комментарий !!это Комментарий !!это Комментарий !!', '127.0.0.1', '2019-02-22 21:48:26', 1),
(12, 10, 'это Комментарий !!это Комментарий !!это Комментарий !!это Комментарий !!это Комментарий !!это Комментарий !!', '127.0.0.1', '2019-02-22 21:48:41', 1),
(13, 1, 'Автор хорошо пишет', '127.0.0.1', '2019-02-23 00:03:09', 2),
(14, 1, 'прикольно', '127.0.0.1', '2019-02-23 00:03:44', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path_img` varchar(255) NOT NULL,
  `date_upload` varchar(50) NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `path_img`, `date_upload`, `author_id`, `post_id`) VALUES
(3, '/1550604486737220_15487055697242_picture_logo.jpg', '2019-02-19 22:28:06', 1, NULL),
(4, '/155060452087133_1548870991109841_two.jpg', '2019-02-19 22:28:40', 1, NULL),
(5, '/1550605045355822_15487055697242_picture_logo.jpg', '2019-02-19 22:37:25', 1, NULL),
(6, '/1550605079352233_15487055697242_picture_logo.jpg', '2019-02-19 22:37:59', 1, NULL),
(7, '/1550605240497698_15487055697242_picture_logo.jpg', '2019-02-19 22:40:40', 1, NULL),
(8, '/1550605260924119_15487055697242_picture_logo.jpg', '2019-02-19 22:41:00', 1, NULL),
(9, '/1550605721830180_15487055697242_picture_logo.jpg', '2019-02-19 22:48:41', 1, NULL),
(10, '/1550605804902703_15487055697242_picture_logo.jpg', '2019-02-19 22:50:04', 1, NULL),
(11, '/1550605841942139_15487055697242_picture_logo.jpg', '2019-02-19 22:50:41', 1, NULL),
(12, '/155060587528383_15487055697242_picture_logo.jpg', '2019-02-19 22:51:15', 1, NULL),
(13, '/1550605882547122_15487055697242_picture_logo.jpg', '2019-02-19 22:51:22', 1, NULL),
(14, '/1550605895223833_15487055697242_picture_logo.jpg', '2019-02-19 22:51:35', 1, NULL),
(15, '/1550605961183499_15487055697242_picture_logo.jpg', '2019-02-19 22:52:41', 1, NULL),
(16, '/1550606002207182_15487055697242_picture_logo.jpg', '2019-02-19 22:53:22', 1, NULL),
(17, '/1550606014481014_15487055697242_picture_logo.jpg', '2019-02-19 22:53:34', 1, NULL),
(18, '/1550606181524373_15487055697242_picture_logo.jpg', '2019-02-19 22:56:21', 1, NULL),
(19, '/1550606211259569_15487055697242_picture_logo.jpg', '2019-02-19 22:56:51', 1, NULL),
(20, '/1550606282778777_15487055697242_picture_logo.jpg', '2019-02-19 22:58:02', 1, NULL),
(21, '/1550606465287386_15487055697242_picture_logo.jpg', '2019-02-19 23:01:05', 1, NULL),
(22, '/1550606493774416_two.jpg', '2019-02-19 23:01:33', 1, NULL),
(23, '/1550681773580675_Olivenkranz.png', '2019-02-20 19:56:13', 1, NULL),
(24, '/1550689756995874_two.jpg', '2019-02-20 22:09:16', 1, NULL),
(25, '/1550691380121056_validated_logo.jpg', '2019-02-20 22:36:20', 10, NULL),
(26, '/1551025509465888_22.jpg', '2019-02-24 19:25:09', 1, NULL),
(27, '/1551025898164275_22.jpg', '2019-02-24 19:31:38', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'karlords@mail.ru', '$2y$10$aeHjtt.oNfQ8CoLKlfyGpOqvr6MvoV8F5wMa7VxMMf5h/R9nRr6Za', 'admin', 0, 1, 1, 1, 1550226980, 1551034953, 0),
(2, 'some@example.ru', '$2y$10$7ckuQWrFqB0laYdD.Xw0iOFVZhFeQeuLsRhPtZn6OMj6gg0GzGRxy', 'user1', 0, 0, 1, 0, 1550227069, NULL, 0),
(3, 'some2@example.ru', '$2y$10$Li2HdXXtvIozXbG1Qb6lEOvtScS41dOK3QdvgUtoGfGBiJqjn2P32', 'user2', 0, 0, 1, 0, 1550227241, NULL, 0),
(4, 'some4@example.ru', '$2y$10$Sz3t6TqgovOI4SQ6/nVjXO9vKNcOlz30A91wBYwPkbVIihE8zly9W', 'user4', 0, 0, 1, 0, 1550227271, NULL, 0),
(5, 'some6@example.com', '$2y$10$EA9FLhrzXMj5befMpmeVkOZtLKAHSmAonxVBNlVYKoYqQOwlMWxBG', 'user5', 0, 0, 1, 0, 1550228943, NULL, 0),
(6, 'some7@example.com', '$2y$10$7pkOTWzrofIsWc.N94KYKObmAT2XfJhAr9pSdG3H9gyQlvcR1V0li', 'user7', 0, 0, 1, 0, 1550229021, NULL, 0),
(7, 'some8@example.com', '$2y$10$k27gID1.WwNCE31HzSkD4eHfJra/YY.KUJ4ZH1dNvwDfB/VeO1RQm', 'user8', 0, 1, 1, 0, 1550431323, 1550517403, 0),
(8, 'some9@example.com', '$2y$10$P/pNcK.WFR39UGMGP7uz2.Y3vpIFEXkDM5tEqpEMoJduBzk2FoCYa', 'user9', 0, 0, 1, 0, 1550431640, NULL, 0),
(9, 'some10@example.com', '$2y$10$pNrSpB6hpMUqyU5FAfQ5QeFycuu16CrGZWhiRFgLgwwlUG9Ais7Sa', 'user10', 0, 0, 1, 0, 1550434380, NULL, 0),
(10, 'user11@example.com', '$2y$10$NwtMUHdJyGhEwi.wnDUKXO9bNGvNA3QkedE4I8qj2fa6GvH0ICUce', 'user11', 0, 1, 1, 0, 1550517723, 1551026136, 0),
(11, 'user12@example.com', '$2y$10$cIl0fTav96SBS.al7eVrP.RjZwVdZTayfNbS98sKHjVO4cdwBdh22', 'user12', 0, 0, 1, 0, 1550518040, NULL, 0),
(12, 'user13@example.com', '$2y$10$xxKxclTq4GnQTJLg7cWa9.KeA1Bx3EIVDI/rTTlu.K31SylJCQUR6', 'user13', 0, 0, 1, 0, 1550518073, NULL, 0),
(13, 'user14@example.com', '$2y$10$nq8wzj1yuCqkpM2PWBDqx.QsBHxwj.l98xnd/dmtIheeek5JcGwyK', 'user14', 0, 0, 1, 0, 1550518126, NULL, 0),
(14, 'user15@example.com', '$2y$10$MrvATAK7Vb4RwUIwalXY7uYJsyXy6daYwcNLI6nlfstigoJCGwNl6', 'user15', 0, 1, 1, 0, 1551026327, 1551026354, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(6, 5, 'some6@example.com', 'GMIYXwN8yiT2FEuw', '$2y$10$Zpv5esb6e8LpDXV5e3GmHefLkhaHlLZFIiNx7Pvk5WNAsYkX18rJy', 1550315343),
(3, 2, 'some@example.ru', 'L_r0oAr2SxwVKYps', '$2y$10$EeG.jRYf0b1biu1faV5AOe9DRm6YU5UJHyT1xCH6eUTMb0Og3kIVO', 1550313469),
(4, 3, 'some2@example.ru', 'GZm1O7XV58oAmDKB', '$2y$10$Xnq8Mt26lVUrvTgpyUJ4tu5PH7W5deknM8OLkCuolUqTwaZ/Zou82', 1550313641),
(5, 4, 'some4@example.ru', '7wLVhTWaObBwTcrU', '$2y$10$e6ZO6YBSujmQji08gGudBeaJ4RVt0qsoolQ.KMKBzSMHtQ9vmdj8i', 1550313671),
(7, 6, 'some7@example.com', 'agxNdlonSN42y0Ne', '$2y$10$t/GsdiAIe79JZYCi3jUD0uzREGe7yM4tusICy9Fn7VEC/P1pFUIau', 1550315421),
(9, 8, 'some9@example.com', '_FdoVbK1F43-Xl5_', '$2y$10$fIaI.II.2aXJXmvgAVZ2rej8X6zGfxbC8wQxmYfhTLm94gV13vO/K', 1550518040),
(10, 9, 'some10@example.com', 'mULM9J3qTprJrzOR', '$2y$10$ISr97oatq.GOI2mjm7CY0Ovc5kvU9wehZgr2XStESNwYRWVy1Qgjm', 1550520780),
(12, 11, 'user12@example.com', 'MYgAFox1WbkQD5UE', '$2y$10$pnQIPTKGD1nA1xrzNSK/X.0/r.vlL9vlftswrjpkwUER.dFn1cGf2', 1550604440),
(13, 12, 'user13@example.com', 'vHaYLU_7K9R65Lg-', '$2y$10$HxCBQT8eZW9JbFZbROx2VedCe7rvG2F1QEITBkbjZtnhB4q7/RJem', 1550604473),
(14, 13, 'user14@example.com', 'CCTXmr5OrtGAtTWe', '$2y$10$3Gh/0xWh5H9YztUcd6Emrex7NMa.QyqNXQ8fu2QIZK4M94y/Q6KZS', 1550604526);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('HIJQJPUQ2qyyTt0Q7_AuZA0pXm27czJnqpJsoA5IFec', 49, 1551026347, 1551098347),
('sy6eH-7PCl70FyuQyo_P6SkhyJgGWhF725QL1j4Yo6M', 498.608, 1550515605, 1550688405),
('OMhkmdh1HUEdNPRi-Pe4279tbL5SQ-WMYf551VVvH8U', 18.1167, 1550515605, 1550551605),
('PZ3qJtO_NLbJfRIP-8b4ME4WA3xxc6n9nbCORSffyQ0', 4, 1551026329, 1551458329),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 70.902, 1551034953, 1551574953),
('NbF5Yfi6t4CYJ6chFjvrJkDrvjauiRUv4BxfBEjC0JA', 29, 1550517912, 1550589912),
('GOenabepLM1LLxUl5AKDokeWGcKjfAkWpsCVYi78IcE', 29, 1550517912, 1550589912),
('QQp4b9HzMS6dx_b1Q4-jRvPb_TBu123s6JetQy6C7ug', 29, 1551026347, 1551098347),
('VJyLtNGOtnUxzt5FnUBjEbkvjwfYlInrSCt1W2yJRUQ', 29, 1551026347, 1551098347);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
