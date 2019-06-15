-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2019 at 04:55 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xi-spain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','partner') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'partner',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Xi-Spain', 'xi-spain@gmail.com', 'admin', NULL, '$2y$10$Jc1HxyyCT5LWT.hlOEvr7e9RK86tZwnTpmcnPwx.6vaXZ3p3lXccC', 'nu7ln2MtKz8r6pAAXSgo1XIsO4myZhWZObWTeprRbcvZdAHOusfz6c33IWJv', '2019-02-15 18:15:00', NULL),
(3, 'sushil', 'thapasushil6@gmail.com', 'partner', NULL, '$2y$10$Mrcw6BIvzJQpy7o0RybUhedNJtt3zuGM.KL3HYmplyQQOybxBekr.', 'Ub7xSb0YsZ7NMlBnaiLIOJMWL43YnIOJ8y2Qticrh6oD68CfMlLd2ra0R5VO', '2019-03-04 08:29:03', '2019-03-04 08:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `country`, `city`, `category`, `name`, `image`, `email`, `website`, `skype`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kathmandu', 8, 'Sushil Thapa', '5c7d1f2e6f78e655380.jpg', 'thapasushil6@gmail.com', 'sushil-thapa.com.np', '789878', '6546465', '2019-03-04 03:15:22', '2019-03-04 07:05:54'),
(2, 2, 'Kathmandu', 6, 'Jeevan Thapa', '5c7d18013e3ec75540.png', 'jeevan@gmail.com', 'aaaa.com.np', '76868686', '68686868', '2019-03-04 06:35:17', '2019-03-04 06:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name_en`, `name_sp`, `image`, `rank`, `status`, `created_at`, `updated_at`) VALUES
(6, 'WINE', 'VINOS', '5c6810349ef5f530780.png', 1, 1, '2019-02-16 07:44:24', '2019-02-16 07:50:47'),
(7, 'OLIVE OILS & VINEGARS', 'ACEITES DE OLIVA Y VINAGRES', '5c68105de5119682670.png', 2, 1, '2019-02-16 07:45:05', '2019-02-16 07:45:05'),
(8, 'BEERS', 'CERVEZAS', '5c7163e26420f663420.PNG', 3, 1, '2019-02-23 09:31:50', '2019-02-23 09:31:50'),
(9, 'MEAT PRODUCTS', 'PRODUCTOS DE CARNE', '5c71640ac7f4f469750.png', 4, 1, '2019-02-23 09:32:30', '2019-02-23 09:32:30'),
(10, 'FISH & SEA FOODS', 'ALIMENTOS DE PESCADO Y MAR', '5c716420c9dcd472650.png', 5, 1, '2019-02-23 09:32:52', '2019-02-23 09:32:52'),
(11, 'COFFEE, GRAINS & SPICES', 'CAFÉ, GRANOS Y ESPECIAS', '5c71643de1f84720630.png', 6, 1, '2019-02-23 09:33:21', '2019-02-23 09:33:21'),
(12, 'DAIRY PRODUCTS', 'PRODUCTOS LÁCTEOS', '5c7164598210e516300.png', 7, 1, '2019-02-23 09:33:49', '2019-02-23 09:33:49'),
(13, 'JUICES, SOFT DRINKS & WATER', 'ZUMOS, BEBIDAS Y AGUA', '5c7164706bb95656210.png', 8, 1, '2019-02-23 09:34:12', '2019-02-23 09:34:12'),
(14, 'BAKERY PRODUCTS', 'PRODUCTOS DE PANADERÍA', '5c71648727d54489690.png', 9, 1, '2019-02-23 09:34:35', '2019-02-23 09:34:35'),
(15, 'CANNED FOODS', 'COMIDAS ENLATADAS', '5c71649d2c906264210.jpg', 10, 1, '2019-02-23 09:34:57', '2019-02-23 09:34:57'),
(16, 'BABY FOOD', 'COMIDA PARA BEBÉ', '5c7164bfc5325181930.jpg', 11, 1, '2019-02-23 09:35:31', '2019-02-23 09:35:31'),
(17, 'ORGANIC', 'ORGÁNICO', '5c7164d0c5d8b389030.jpg', 12, 1, '2019-02-23 09:35:48', '2019-02-23 09:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `event` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `event`, `name`, `email`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'sushil thapa', 'thapasushil6@gmail.com', 15.00, NULL, NULL),
(2, 1, 'Jeevan Thapa', 'jeevan@gmail.com', 33.00, '2019-02-23 07:35:06', '2019-02-23 07:35:06'),
(3, 1, 'Jeevan Thapa', 'jeevan@gmail.com', 33.00, '2019-02-23 07:36:10', '2019-02-23 07:36:10');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, '123456', '2019-02-22 18:15:00', '2019-02-23 10:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_sp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `image`, `price`, `date`, `short_description_en`, `short_description_sp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Natural and Organic Products Europe (London - United Kingdom)', '5c715c00c682a646970.jpg', 250.00, '04/07/2019 - 04/09/2019', 'Natural & Organic Products Europe is Europe’s biggest trade show for natural & organic products making it the ‘must attend’ event for buyers of natural health and living products, natural and organic food & drink as well as natural beauty & personal care products. This event is subject to participation of 5 companies.', 'Natural & Organic Products Europe is Europe’s biggest trade show for natural & organic products making it the ‘must attend’ event for buyers of natural health and living products, natural and organic food & drink as well as natural beauty & personal care products. This event is subject to participation of 5 companies.', 1, '2019-02-17 11:23:24', '2019-02-23 09:28:36'),
(2, 'MISIÓN COMERCIAL A HO CHI MINH, (VIETNAM)', '5c7162551f0da809720.JPG', 250.00, '05/02/2019 - 05/04/2019', 'Xi-Spain organiza una misión comercial a Vietnam dirigida a las empresas del sector de alimentación y bebidas. Vietnam, con una población 90 millones de habitantes, representa en la actualidad uno de los mercados mas interesantes del continente asiático. Su producto interior bruto ha crecido con fuerza en los últimos años, a una media del 8% anual, durante los que se ha reducido la tasa de pobreza hasta el 12% de la población.', 'Xi-Spain organiza una misión comercial a Vietnam dirigida a las empresas del sector de alimentación y bebidas. Vietnam, con una población 90 millones de habitantes, representa en la actualidad uno de los mercados mas interesantes del continente asiático. Su producto interior bruto ha crecido con fuerza en los últimos años, a una media del 8% anual, durante los que se ha reducido la tasa de pobreza hasta el 12% de la población.', 1, '2019-02-23 09:25:13', '2019-02-23 09:28:25'),
(3, 'LONDON WINE FAIR 20 - 22 MAY 2019 OLYMPIA LONDON', '5c71628ef32cc979820.png', 150.00, '05/20/2019 - 05/22/2019', 'The 39th edition of London Wine Fair is coming to Olympia on 20-22 May 2019. Featuring over 14,000 wines from 32 countries, innovative tastings, critical masterclasses and a host of outstanding features, the show is an unmissable destination for anyone in the industry. (Price per wine)', 'The 39th edition of London Wine Fair is coming to Olympia on 20-22 May 2019. Featuring over 14,000 wines from 32 countries, innovative tastings, critical masterclasses and a host of outstanding features, the show is an unmissable destination for anyone in the industry. (Price per wine)', 1, '2019-02-23 09:26:10', '2019-02-23 09:26:10'),
(4, 'IFE China (Guangzhou) International Food Exhibition IFE CHINA (GUANGZHOU) INTERNATIONAL FOOD EXHIBITION', '5c7162cbb25dd172660.PNG', 395.00, '06/26/2019 - 06/28/2019', 'Entering its 19th edition, China (Guangzhou) International Food Exhibition and Import Food Exhibition (IFE China) will be held on 26-28 June 2019 in Guangzhou, the industrial base and import hub for food business in South China. IFE China is now the leading trade fair for food industry in South China. It is a must-attend platform for food professionals seeking to enter the South China market. This event is subject to the participation of 5 companies.', 'Entering its 19th edition, China (Guangzhou) International Food Exhibition and Import Food Exhibition (IFE China) will be held on 26-28 June 2019 in Guangzhou, the industrial base and import hub for food business in South China. IFE China is now the leading trade fair for food industry in South China. It is a must-attend platform for food professionals seeking to enter the South China market. This event is subject to the participation of 5 companies.', 1, '2019-02-23 09:27:11', '2019-02-23 09:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_en` text COLLATE utf8mb4_unicode_ci,
  `short_description_sp` text COLLATE utf8mb4_unicode_ci,
  `rank` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name_en`, `name_sp`, `image`, `short_description_en`, `short_description_sp`, `rank`, `status`, `created_at`, `updated_at`) VALUES
(1, 'IMPORT-EXPORT AGENCY', 'AGENCIA IMPORT-EXPORT', '5c6c9740b1235879320.jpg', 'Since 2004, we have been in the import export agency business with the mission of delivering best quality-price ratio food and beverages worldwide by establishing mutually beneficial cooperations.', 'Xi-Spain es una agencia de import-export dedicada a conectar productores con compradores internacionales. Especializados en aceites y vinos, también trabajamos otros productos tales como zumos, cervezas, conservas, congelados, cárnicos o productos orgánicos.', 1, 1, '2019-02-19 18:09:40', '2019-02-19 18:09:40'),
(2, 'INTERNATIONAL PROJECTS', 'REPRESENTACIÓN INTERNACIONAL', '5c70ee422e9c3453730.jpg', 'Xi-Spain has broad experience in different ad hoc internatinal food and beverage projects going from private label adaptations to products groupings for distributors or shops.', 'Realizamos transacciones en nombre de nuestros principales, generalmente productores del sector agroalimentario, representando los intereses de los mismos en mercados internacionales. <a href=\"#contact\" class=\"page-scroll\">Póngase en contacto</a> para ver como puede beneficiarse.', 2, 1, '2019-02-23 01:09:58', '2019-02-23 05:16:50'),
(3, 'MEET US', 'EXHIBICIONES Y MISIONES COMERCIALES', '5c70eea752c09876730.png', 'Xi-Spain participates in many of the first level international fairs with the aim of exhibiting our broad range of products. <a href=\"#event\" class=\"page-scroll\">Check our events</a> section.', 'Llevamos a cabo misiones comerciales y exhibiciones de diferentes productos abiertas a la participación de nuestros principales. Consulte nuestra <a href=\"#event\" class=\"page-scroll\">sección de eventos</a> para obtener más infomación al respecto o si desea participar en alguno de ellos.', 3, 1, '2019-02-23 01:11:39', '2019-02-23 05:18:55'),
(4, 'NUESTROS PARTNERS', 'NUESTROS PARTNERS', '5c70eecf711aa793930.png', 'Xi-Spain cuenta con una extensa red de partners en mas de 20 países con los que mantiene una estrecha colaboración para el desarrollo de actividades de busqueda de clientes y promoción de productos', 'Xi-Spain cuenta con una extensa red de partners en mas de 20 países con los que mantiene una estrecha colaboración para el desarrollo de actividades de busqueda de clientes y promoción de productos', 4, 1, '2019-02-23 01:12:19', '2019-02-23 01:12:19'),
(5, 'APOYO LOGÍSTICO', 'APOYO LOGÍSTICO', '5c70eeea63171849560.png', 'Ofrecemos apoyo logístico a través de partners locales en diferentes países con servicios como despacho de aduanas, almacenaje o distribución.', 'Ofrecemos apoyo logístico a través de partners locales en diferentes países con servicios como despacho de aduanas, almacenaje o distribución.', 5, 1, '2019-02-23 01:12:46', '2019-02-23 01:12:46'),
(6, 'PROYECTOS AD-HOC', 'PROYECTOS AD-HOC', '5c70ef1329337613550.jpg', 'Xi-Spain lleva a cabo proyectos a medida que van desde consolidaciones de productos para entrega a pequeños comercios internacionales hasta adaptaciones de marcas privadas.', 'Xi-Spain lleva a cabo proyectos a medida que van desde consolidaciones de productos para entrega a pequeños comercios internacionales hasta adaptaciones de marcas privadas.', 6, 1, '2019-02-23 01:13:27', '2019-02-23 01:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_01_000001_create_admins_table', 1),
(2, '2019_01_01_000002_create_users_table', 1),
(3, '2019_01_01_000003_create_password_resets_table', 1),
(4, '2019_01_01_000005_create_categorys_table', 1),
(5, '2019_01_01_134408_create_invitation_categorys_table', 1),
(6, '2019_01_03_052059_create_zones_table', 1),
(7, '2019_01_03_052159_create_areas_table', 1),
(8, '2019_01_04_143035_create_salones_table', 1),
(9, '2019_01_04_151951_create_invitations_table', 1),
(11, '2019_01_03_092159_create_homecategorys_table', 2),
(12, '2019_01_03_092159_create_party_services_table', 3),
(13, '2019_01_01_134408_create_vcard_images_table', 4),
(14, '2019_01_01_134408_create_vcard_image_categorys_table', 5),
(15, '2019_01_01_000005_create_products_table', 6),
(16, '2019_01_01_000005_create_checkouts_table', 7),
(17, '2019_01_01_000005_create_events_table', 7),
(18, '2019_01_01_000005_create_features_table', 8),
(19, '2019_01_01_000005_create_codes_table', 9),
(20, '2019_01_01_000005_create_agents_table', 10),
(21, '2019_03_14_072130_create_product_categorys_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_sp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` float NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `origin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description_sp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_sp`, `size`, `unit`, `price`, `origin`, `min_order`, `image`, `short_description_en`, `short_description_sp`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(12, 'VINOS', 'EXHIBICIONES Y MISIONES COMERCIALES', 11, 'ml', 22, 'kathmandu', 22, '5c8a19b4e51ae376320.png', '33', '33', 2, 0, '2019-03-14 02:19:28', '2019-04-13 06:11:58'),
(13, 'MEET US', 'sfd', 5, 'grs', 44, 'kathmandu', 44, '5c8e73b68749c165220.png', 'sdfsad sadsd sdffa ssadfsadf asfsdfsd sd &quote;lksdjf\" sdfsdfsdf \'dsf\' dsf', 'sdfsad sadsd sdffa ssadfsadf \"asfsdfsd\"  \'sd\'', 2, 1, '2019-03-17 10:35:06', '2019-04-08 05:55:25'),
(14, 'fsdfsdf', 'EXHIBICIONES Y MISIONES COMERCIALES', 5, 'ml', 22, 'kathmandu', 20, '5cb7566c1d09c11350.jpg', 'sssssss', 'wwwwwwwwwwwwwwwwww', 2, 1, '2019-04-17 10:53:04', '2019-04-17 10:54:18'),
(15, 'my test product', 'EXHIBICIONES Y MISIONES COMERCIALES', 22, 'grs', 22, '22', 3, '5cb756897e811663600.png', '33333333333333', '3333333333333333333', 2, 1, '2019-04-17 10:53:33', '2019-04-17 10:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_categorys`
--

CREATE TABLE `product_categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categorys`
--

INSERT INTO `product_categorys` (`id`, `category`, `product`, `created_at`, `updated_at`) VALUES
(38, 6, 13, '2019-04-13 06:11:07', '2019-04-13 06:11:07'),
(47, 6, 12, '2019-04-13 06:11:58', '2019-04-13 06:11:58'),
(48, 8, 12, '2019-04-13 06:11:58', '2019-04-13 06:11:58'),
(49, 9, 12, '2019-04-13 06:11:58', '2019-04-13 06:11:58'),
(50, 11, 12, '2019-04-13 06:11:58', '2019-04-13 06:11:58'),
(52, 7, 15, '2019-04-17 10:53:33', '2019-04-17 10:53:33'),
(53, 10, 15, '2019-04-17 10:53:33', '2019-04-17 10:53:33'),
(54, 7, 14, '2019-04-17 10:54:18', '2019-04-17 10:54:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agents_category_foreign` (`category`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_ibfk_1` (`event`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `product_categorys`
--
ALTER TABLE `product_categorys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categorys_category_foreign` (`category`),
  ADD KEY `product_categorys_product_foreign` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_categorys`
--
ALTER TABLE `product_categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_category_foreign` FOREIGN KEY (`category`) REFERENCES `categorys` (`id`);

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_ibfk_1` FOREIGN KEY (`event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categorys`
--
ALTER TABLE `product_categorys`
  ADD CONSTRAINT `product_categorys_category_foreign` FOREIGN KEY (`category`) REFERENCES `categorys` (`id`),
  ADD CONSTRAINT `product_categorys_product_foreign` FOREIGN KEY (`product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
