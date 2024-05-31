-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 31 2024 г., 17:14
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `CareWishPHP`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `name_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name_cat`) VALUES
(1, 'yeycosmetics'),
(2, 'lipscosmetics'),
(3, 'bodycosmetics'),
(4, 'facecosmetics');

-- --------------------------------------------------------

--
-- Структура таблицы `Goods`
--

CREATE TABLE `Goods` (
  `id` int(200) NOT NULL,
  `name_g` varchar(255) NOT NULL,
  `uni_code` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `category` int(2) NOT NULL,
  `img_g` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Goods`
--

INSERT INTO `Goods` (`id`, `name_g`, `uni_code`, `price`, `category`, `img_g`) VALUES
(2, 'SEVEN7EEN Подводка-фломастер для глаз Ultra-Black Jet, 1 мл', '1234567890', 201, 1, 'https://cosmeticshop.md/content/catalog/products/big/crs9pzcl.png'),
(3, 'Pierre Rene Тени для бровей Professional Brow, 3 x 1,3 г\r\n', '12345678643', 189, 1, 'https://cosmeticshop.md/content/catalog/products/variations/thumbs/kmf7tk4n7r.png'),
(4, 'Astra Тушь и подводка Duoversity, 3,5 мл x 3,5 мл\r\n', '46789087654', 265, 1, 'https://cosmeticshop.md/content/catalog/products/variations/thumbs/up1cip4kzl.png'),
(5, 'Stellary Устойчивая помада Black and White Collection, 3 г', '3456787976575', 195, 2, 'https://cosmeticshop.md/content/catalog/products/variations/thumbs/mmd_chyga3.png'),
(6, 'VS Масло-роллер для губ Amulette, 4 мл', '3455879865534', 145, 2, 'https://cosmeticshop.md/content/catalog/products/variations/thumbs/i4jsploa89.png'),
(7, 'Pierre Rene Карандаш для губ Lip Matic, 0,4 г', '7654332234444', 110, 2, 'https://cosmeticshop.md/content/catalog/products/variations/thumbs/1gjc7snjxu.png'),
(8, 'Stellary Бальзам для губ Black and White Collection, 7,5 г', '4567865434567', 115, 2, 'https://cosmeticshop.md/content/catalog/products/big/nirjyy52.png'),
(9, 'BV Крем для рук Pink Pepper, 75 мл', '67434343454675', 102, 3, 'https://cosmeticshop.md/content/catalog/products/big/d9e_4h90.png'),
(10, 'Babaria Крем для тела Vitamin C+, 400 мл', '45675434567890876', 134, 3, 'https://cosmeticshop.md/content/catalog/products/big/y8y5r2br.png'),
(11, 'BISOU Скраб для тела Clean and Moisture, 200 г', '34567865432', 149, 3, 'https://cosmeticshop.md/content/catalog/products/big/244gvpdv.png'),
(12, 'Pierre Rene Мерцающее масло для тела Body Oil Shimmering, 30 мл', '1233333345324', 280, 3, 'https://cosmeticshop.md/content/catalog/products/big/i3shs4pi.png'),
(13, 'Pierre Rene Компактные румяна Rouge Powder, 6 г', '76564534434353', 149, 4, 'https://cosmeticshop.md/content/catalog/products/variations/thumbs/zpv75c9ef9.png'),
(14, 'DH Прозрачная пудра фиксатор для лица Fix & Mat, 20 г', '23456786543567', 167, 4, 'https://cosmeticshop.md/content/catalog/products/big/vtvkojjx.jpg'),
(15, 'Pierre Rene Тональная основа Skin Balance, 30 мл', '3458989767767854', 239, 4, 'https://cosmeticshop.md/content/catalog/products/variations/thumbs/jd5tremmbd.png'),
(16, 'Stellary Набор консилеров для лица Concealer Pallete', '667854368975', 165, 4, 'https://cosmeticshop.md/content/catalog/products/big/tvcscx3r.jpg'),
(24, 'VS Палетка теней Archetype, 12 г', '456786545687', 289, 1, 'https://cosmeticshop.md/content/catalog/products/big/b57_td4d.png');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img_news` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `img_news`, `description`) VALUES
(1, 'Новый кушон Givenchy Prisme Libre Skin-Caring Glow Cushion 2024: первая информация', 'У Givenchy весной 2024 г. выйдет новый тональный кушон Prisme Libre Skin-Caring Glow Cushion SPF45/PA+++ (12 г), придающий коже свежесть и сияние. Популярная линия макияжа Prisme Libre была создана на основе идеи основателя бренда Юбера де Живанши о том, что тон кожи человека не может быть выражен одним цветом. Prisme Libre, которая началась с четырехцветной пудры для лица, создающей сияющую изнутри кожу, весной 2024 года будет дополнена новой тональной основой-кушоном Prisme Libre Skin-Caring Glow Cushion. Формула нового кушона похожа на сыворотку, содержащую 89% ингредиентов для ухода за кожей. Он увлажняет кожу каждый раз, когда вы его наносите, придавая эффект глянцевости и сияния изнутри. Он также поддерживает барьерную функцию кожи и создает здоровую среду, надежно блокируя ультрафиолетовые лучи благодаря SPF45/PA+++. Он водонепроницаем и устойчив к воде, поту и размазыванию, сохраняя кожу красивой в течение длительного времени. Симпатичная пуховка в форме сердечка легко прорабатывает уголки глаз и зону возле носа. Новый кушон Givenchy Prisme Libre Skin-Caring Glow Cushion 2024 выйдет в международную продажу с 1 марта 2024 г.', 'https://1beautynews.ru/wp-content/uploads/2023/12/Givenchy-2024-Prisme-Libre-Skin-Caring-Glow-Cushion-_p1-800x450.jpg', 'У Givenchy весной 2024 г. выйдет новый тональный кушон Prisme Libre Skin-Caring Glow Cushion SPF45/PA+++ (12 г), придающий коже свежесть и сияние. Популярная линия макияжа Prisme Libre была создана на основе идеи основателя бренда Юбера де Живанши о том, что тон кожи человека не может быть выражен одним цветом.'),
(2, 'Новый аромат Guerlain L\'Art et la Matière Iris Pallida Extrait 6', 'У Guerlain в рамках новой коллекции Guerlain L\'Art et la Matière Les Extraits Signature 2023 выходит новый аромат Iris Pallida Extrait 6. Он раскрывает ирис в его наиболее совершенном ольфакторном выражении от Guerlain, демонстрируя изнутри его истинную утонченность. Обогащенный драгоценным пудровым маслом ириса в максимальной концентрации 30%, он обволакивает своей мягкостью и звучит очень интенсивно.Парфюмеры Guerlain обогатили характерную пудровую ноту ириса нотами миндаля и мускуса. Эта пудровая мягкость окутывается бархатистыми кожаными нотами, напоминающими белую замшу, а в сердце усиливается кремовой текстурой сандалового дерева.Iris Pallida Extrait 6 входит в коллекцию экстрактов Les Extraits Signature, воплощающую квинтэссенцию ароматного шлейфа Guerlain. Эта коллекция отдает дань уважения алхимии культового знака Дома — Guerlinade, подчеркивая шесть ингредиентов и раскрывая золотой номер каждого из них.', 'https://1beautynews.ru/wp-content/uploads/2023/12/Guerlain-2023-LArt-et-la-Matiere-Iris-Pallida-Extrait-6-pic-post-800x450.jpg', 'У Guerlain в рамках новой коллекции Guerlain L\'Art et la Matière Les Extraits Signature 2023 выходит новый аромат Iris Pallida Extrait 6'),
(3, 'Новый аромат Tom Ford Vanilla Sex 2024', 'У Tom Ford Beauty в коллекции Private Blend выйдет новый аромат Vanilla Sex. Это глубокий, чувственный и пленительный аромат, сочетающий в себе ваниль и амбру, олицетворяет фирменную роскошь и чувственность бренда. Теплый и пряный гурманский аромат для тех, кто ценит в жизни лучшее.Сердцем Vanilla Sex является уникальная ванильная настойка из Индии — ингредиент, созданный специально для этого аромата. Он окутывает обладательницу вуалью мягкой чувственности. Эта ваниль — не просто ваниль, это многогранный драгоценный камень, раскрывающий слои первозданного гламура, согреваемый загадочной смесью таинственных цветочных нот и оттенком эссенции горького миндаля.\r\nVanilla Sex – это больше, чем аромат, это опыт. Его захватывающий характер и гламурный дизайн воплощают суть Тома Форда, где главную роль играют глубокие и яркие ноты ванили. Этот аромат является современной иконой чувственного удовольствия, предлагая незабываемые впечатления, которые далеко не невинны и перекликаются с историей бренда по созданию утонченных, провокационных ароматов.\r\nДизайн флакона Tom Ford Vanilla Sex является свидетельством приверженности бренда роскоши и эстетическому совершенству. Благодаря непрозрачному внутреннему лаку кремового цвета и внешнему слою медового оттенка, увенчанному пластиной карамельного оттенка, он представляет собой экстравагантную икону, идеально подходящую для украшения любого туалетного столика.\r\n\r\n', 'https://1beautynews.ru/wp-content/uploads/2023/12/Tom-Ford-2024-Vanilla-Sex-pic-post.jpg', 'У Tom Ford Beauty в коллекции Private Blend выйдет новый аромат Vanilla Sex. Это глубокий, чувственный и пленительный аромат, сочетающий в себе ваниль и амбру, олицетворяет фирменную роскошь и чувственность бренда. ');

-- --------------------------------------------------------

--
-- Структура таблицы `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `name` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `mess` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `offer`
--

INSERT INTO `offer` (`id`, `name`, `tel`, `mess`) VALUES
(1, 'qwqdw', 111111, 'awda'),
(2, 'йуцу', 34333, 'фцвф'),
(3, '333у', 4444444, 'аукауа'),
(4, 'Ivan', 78312918, 'Privet'),
(5, '12e3', 345, 'sdaswdwa'),
(6, '1', 11, '1'),
(7, '2', 2, '2'),
(8, '3', 3, '3'),
(9, '111111', 111111, '111111');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `id_product` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `id_product`) VALUES
(70, 5, 7),
(75, 1, 2),
(76, 1, 3),
(77, 1, 2),
(78, 1, 5),
(79, 1, 2),
(80, 1, 2),
(81, 1, 2),
(82, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`) VALUES
(1, 'Тотошкаaaaa', 'ivan.sergheev@iis.utm.md', '1', 'admin'),
(3, 'Лев33333', 'karldfild@mail.ru', '123', 'user'),
(4, 'KARLDFILD', '333@re.re', '1', 'user'),
(5, 'Alina', 'ivan.sergheev@an.utm.md', '1234567', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Goods`
--
ALTER TABLE `Goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Goods`
--
ALTER TABLE `Goods`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Goods`
--
ALTER TABLE `Goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `Goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
