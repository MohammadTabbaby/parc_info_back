-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 03:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parc_informatique`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `titre`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nous Prenons Soin De Votre Vie Saine', 'abouts\\May2022\\Zd2itUt3v4TInWYzWyHu.jpg', 'Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Iure Ducimus, Quod Ex Cupiditate Ullam In Assumenda Maiores Et Culpa Odit Tempora Ipsam Qui, Quisquam Quis Facere Iste Fuga, Minus Nesciunt.\r\n\r\n\r\nLorem Ipsum Dolor, Sit Amet Consectetur Adipisicing Elit. Natus Vero Ipsam Laborum Porro Voluptates Voluptatibus A Nihil Temporibus Deserunt Vel?', '2022-04-30 21:10:56', '2022-05-20 23:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `bonde_commandes`
--

CREATE TABLE `bonde_commandes` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonde_commandes`
--

INSERT INTO `bonde_commandes` (`id`, `reference`, `date`, `id_fournisseur`, `created_at`, `updated_at`) VALUES
(24, 'BC1', '2022-06-13', 5, '2022-06-13 20:07:11', '2022-06-13 20:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `bonde_livraisons`
--

CREATE TABLE `bonde_livraisons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `fournisseur` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonde_livraisons`
--

INSERT INTO `bonde_livraisons` (`id`, `reference`, `date`, `fournisseur`, `created_at`, `updated_at`) VALUES
(22, 'BL35619567', '2022-06-24', 5, '2022-06-09 18:12:49', '2022-06-09 18:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`, `created_at`, `updated_at`) VALUES
(8, 'Ecran', '2022-06-09 17:26:46', '2022-06-09 17:26:46'),
(9, 'Unité Centrale', '2022-06-09 17:27:05', '2022-06-09 17:27:05'),
(10, 'Scanner', '2022-06-09 17:27:15', '2022-06-09 17:27:15'),
(11, 'Imprimante', '2022-06-09 17:27:59', '2022-06-09 17:27:59'),
(12, 'Barrette Mémoire', '2022-06-09 17:32:00', '2022-06-09 17:32:49'),
(13, 'Carte Graphique', '2022-06-09 17:33:10', '2022-06-09 17:33:10'),
(14, 'Carte Son', '2022-06-09 17:33:17', '2022-06-09 17:33:17'),
(15, 'Carte Réseau', '2022-06-09 17:33:45', '2022-06-09 17:33:45'),
(16, 'Carte Mère', '2022-06-09 17:34:00', '2022-06-09 17:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_telephone` int(11) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE `dashboards` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 9),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'voyager::seeders.data_rows.roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 12),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 15),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 10),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(57, 7, 'date_achat', 'date', 'Date Achat', 0, 1, 1, 1, 1, 1, '{}', 7),
(58, 7, 'date_affectation', 'date', 'Date Affectation', 0, 1, 1, 1, 1, 1, '{}', 10),
(60, 7, 'cout_initiale', 'text', 'cout achat', 0, 1, 1, 1, 1, 1, '{}', 9),
(63, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 11),
(64, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(65, 7, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 14),
(75, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(76, 12, 'nom_modele', 'text', 'Nom Modele', 0, 1, 1, 1, 1, 1, '{}', 2),
(78, 12, 'fiche_technique', 'file', 'Fiche Technique', 0, 1, 1, 1, 1, 1, '{}', 4),
(79, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(80, 13, 'nom_service', 'text', 'Nom Service', 0, 1, 1, 1, 1, 1, '{}', 2),
(81, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 3),
(82, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(88, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(89, 15, 'nom_categorie', 'text', 'Nom Categorie', 0, 1, 1, 1, 1, 1, '{}', 2),
(90, 15, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(91, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(92, 7, 'equipement_belongsto_category_relationship', 'relationship', 'categories', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"id_categorie\",\"key\":\"id\",\"label\":\"nom_categorie\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(96, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(97, 16, 'date_reparation', 'date', 'Date Reparation', 0, 1, 1, 1, 1, 1, '{}', 2),
(98, 16, 'cout_reparation', 'number', 'Cout Reparation', 0, 1, 1, 1, 1, 1, '{}', 3),
(99, 16, 'date_fin_reparation', 'date', 'Date Fin Reparation', 0, 1, 1, 1, 1, 1, '{}', 4),
(100, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(101, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(109, 21, 'date_reparation', 'date', 'Date Reparation', 0, 1, 1, 1, 1, 1, '{}', 5),
(110, 21, 'cout_reparation', 'text', 'Cout Reparation', 0, 1, 1, 1, 1, 1, '{}', 6),
(112, 21, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 8),
(113, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(114, 22, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(115, 22, 'nom_fourniseur', 'text', 'Nom Fourniseur', 0, 1, 1, 1, 1, 1, '{}', 2),
(116, 22, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(117, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(120, 7, 'id_categorie', 'text', 'Id Categorie', 0, 1, 1, 1, 1, 1, '{}', 20),
(121, 7, 'equipement_belongsto_modele_relationship', 'relationship', 'modeles', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Modele\",\"table\":\"modeles\",\"type\":\"belongsTo\",\"column\":\"id_modele\",\"key\":\"id\",\"label\":\"nom_modele\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(122, 7, 'id_modele', 'text', 'Id Modele', 0, 1, 1, 1, 1, 1, '{}', 21),
(123, 7, 'equipement_belongsto_service_relationship', 'relationship', 'services', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Service\",\"table\":\"services\",\"type\":\"belongsTo\",\"column\":\"id_service\",\"key\":\"nom_service\",\"label\":\"nom_service\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(124, 7, 'id_service', 'text', 'Id Service', 0, 1, 1, 1, 1, 1, '{}', 18),
(127, 7, 'reference', 'text', 'Reference', 0, 1, 1, 1, 1, 1, '{}', 2),
(128, 21, 'reparations_interne_belongsto_equipement_relationship', 'relationship', 'equipements', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Equipement\",\"table\":\"equipements\",\"type\":\"belongsTo\",\"column\":\"id_equipement\",\"key\":\"id\",\"label\":\"reference\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(129, 21, 'id_equipement', 'text', 'Id Equipement', 0, 1, 1, 1, 1, 1, '{}', 10),
(134, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(135, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(136, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(138, 21, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(139, 1, 'user_belongsto_service_relationship', 'relationship', 'services', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\service\",\"table\":\"services\",\"type\":\"belongsTo\",\"column\":\"id_service\",\"key\":\"id\",\"label\":\"nom_service\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(140, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 7),
(141, 1, 'id_service', 'text', 'Id Service', 0, 1, 1, 1, 1, 1, '{}', 14),
(142, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(144, 23, 'created_at', 'timestamp', 'Date', 0, 1, 1, 1, 1, 1, '{}', 5),
(145, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(147, 23, 'fiche_sorty_belongstomany_equipement_relationship', 'relationship', 'equipements', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\ReparationsExterne\",\"table\":\"reparations_externes\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"id_equipement\",\"pivot_table\":\"equipement_fiche_sorties\",\"pivot\":\"1\",\"taggable\":\"0\"}', 2),
(148, 21, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 4),
(149, 21, 'reparations_interne_belongstomany_piece_de_rechange_relationship', 'relationship', 'piece_de_rechanges', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\PieceDeRechange\",\"table\":\"piece_de_rechanges\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"reference\",\"pivot_table\":\"reparation_interne_piece_de_rechanges\",\"pivot\":\"1\",\"taggable\":\"0\"}', 3),
(150, 24, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(151, 24, 'reference', 'text', 'Reference', 0, 1, 1, 1, 1, 1, '{}', 2),
(152, 24, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(153, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(156, 23, 'fiche_sorty_belongsto_fournisseur_relationship', 'relationship', 'fournisseurs', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Fournisseur\",\"table\":\"fournisseurs\",\"type\":\"belongsTo\",\"column\":\"id_fournisseur\",\"key\":\"id\",\"label\":\"nom_fourniseur\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(157, 23, 'id_fournisseur', 'text', 'Id Fournisseur', 0, 1, 1, 1, 1, 1, '{}', 6),
(195, 31, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(196, 31, 'reference', 'text', 'Reference', 0, 1, 1, 1, 1, 1, '{}', 2),
(197, 31, 'date', 'date', 'Date', 0, 1, 1, 1, 1, 1, '{}', 3),
(198, 31, 'id_fournisseur', 'text', 'Id Fournisseur', 0, 1, 1, 1, 1, 1, '{}', 5),
(200, 31, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(201, 31, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(202, 31, 'bonde_commande_belongsto_fournisseur_relationship', 'relationship', 'fournisseurs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Fournisseur\",\"table\":\"fournisseurs\",\"type\":\"belongsTo\",\"column\":\"id_fournisseur\",\"key\":\"id\",\"label\":\"nom_fourniseur\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(204, 32, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(205, 32, 'id_reparation_externe', 'text', 'Id Reparation Externe', 0, 1, 1, 1, 1, 1, '{}', 6),
(206, 32, 'cout', 'number', 'Cout', 0, 1, 1, 1, 1, 1, '{}', 4),
(207, 32, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
(208, 32, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(209, 32, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(210, 32, 'equipement_bondecommande_belongsto_reparations_externe_relationship', 'relationship', 'equipement', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\ReparationsExterne\",\"table\":\"reparations_externes\",\"type\":\"belongsTo\",\"column\":\"id_reparation_externe\",\"key\":\"id\",\"label\":\"id_equipement\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(211, 34, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(212, 34, 'reference', 'text', 'Reference', 0, 1, 1, 1, 1, 1, '{}', 2),
(213, 34, 'date', 'date', 'Date', 0, 1, 1, 1, 1, 1, '{}', 4),
(214, 34, 'fournisseur', 'text', 'Fournisseur', 0, 1, 1, 1, 1, 1, '{}', 5),
(216, 34, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(217, 34, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(218, 34, 'bonde_livraison_belongsto_fournisseur_relationship', 'relationship', 'fournisseurs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Fournisseur\",\"table\":\"fournisseurs\",\"type\":\"belongsTo\",\"column\":\"fournisseur\",\"key\":\"id\",\"label\":\"nom_fourniseur\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(219, 32, 'reference_BC', 'text', 'Reference BC', 0, 1, 1, 1, 1, 1, '{}', 8),
(220, 32, 'equipement_bondecommande_belongsto_bonde_commande_relationship', 'relationship', 'Ref_bonde_commandes', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\BondeCommande\",\"table\":\"bonde_commandes\",\"type\":\"belongsTo\",\"column\":\"reference_BC\",\"key\":\"reference\",\"label\":\"reference\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(222, 24, 'piece_de_rechange_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"categories\",\"key\":\"id\",\"label\":\"nom_categorie\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(223, 24, 'piece_de_rechange_belongsto_modele_relationship', 'relationship', 'modeles', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Modele\",\"table\":\"modeles\",\"type\":\"belongsTo\",\"column\":\"modeles\",\"key\":\"id\",\"label\":\"nom_modele\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(225, 24, 'categories', 'text', 'Categories', 0, 1, 1, 1, 1, 1, '{}', 8),
(226, 24, 'modeles', 'text', 'Modeles', 0, 1, 1, 1, 1, 1, '{}', 9),
(239, 36, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(241, 36, 'ref_bl', 'text', 'Ref BL', 0, 1, 1, 1, 1, 1, '{}', 5),
(242, 36, 'cout', 'text', 'Cout', 0, 1, 1, 1, 1, 1, '{}', 6),
(243, 36, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 8),
(244, 36, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 10),
(245, 36, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(246, 36, 'detail_bon_de_livraison_belongsto_equipement_bondecommande_relationship', 'relationship', 'equipement', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\ReparationsExterne\",\"table\":\"reparations_externes\",\"type\":\"belongsTo\",\"column\":\"equipement\",\"key\":\"id\",\"label\":\"id_equipement\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(247, 36, 'equipement', 'text', 'Equipement', 0, 1, 1, 1, 1, 1, '{}', 4),
(248, 36, 'detail_bon_de_livraison_belongsto_bonde_livraison_relationship', 'relationship', 'Ref_bonde_livraisons', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\BondeLivraison\",\"table\":\"bonde_livraisons\",\"type\":\"belongsTo\",\"column\":\"ref_bl\",\"key\":\"reference\",\"label\":\"reference\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(249, 37, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(250, 37, 'reference', 'text', 'Reference', 0, 1, 1, 1, 1, 1, '{}', 2),
(251, 37, 'fournisseur', 'text', 'Fournisseur', 0, 1, 1, 1, 1, 1, '{}', 4),
(252, 37, 'date', 'date', 'Date', 0, 1, 1, 1, 1, 1, '{}', 5),
(254, 37, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 8),
(255, 37, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(256, 37, 'facture_belongsto_fournisseur_relationship', 'relationship', 'fournisseurs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Fournisseur\",\"table\":\"fournisseurs\",\"type\":\"belongsTo\",\"column\":\"fournisseur\",\"key\":\"id\",\"label\":\"nom_fourniseur\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(260, 24, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 11),
(261, 39, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(262, 39, 'panne', 'text', 'Panne', 0, 1, 1, 1, 1, 1, '{\"\":\"\",\"options\":{\"\":\"\",\"SoftWare\":\"SoftWare\",\"HardWare\":\"HardWare\",\"Reseaux\":\"R\\u00e9seaux\"}}', 3),
(263, 39, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(264, 39, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(265, 39, 'description', 'text', 'Description', 0, 0, 0, 0, 0, 0, '{}', 7),
(266, 37, 'file', 'file', 'File', 0, 1, 1, 1, 1, 1, '{}', 6),
(269, 40, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(270, 40, 'reference', 'text', 'Equipment', 0, 1, 1, 1, 1, 1, '{}', 4),
(271, 40, 'panne', 'text', 'Panne', 0, 1, 1, 1, 1, 1, '{}', 7),
(272, 40, 'prix_HT', 'text', 'Prix HT', 0, 1, 1, 1, 1, 1, '{}', 8),
(274, 40, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 10),
(275, 40, 'reference_facture', 'text', 'Reference Facture', 0, 1, 1, 1, 1, 1, '{}', 5),
(276, 40, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 11),
(277, 40, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(278, 40, 'detail_facture_belongsto_bonde_livraison_relationship', 'relationship', 'equipments', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\ReparationsExterne\",\"table\":\"reparations_externes\",\"type\":\"belongsTo\",\"column\":\"reference\",\"key\":\"id_equipement\",\"label\":\"id_equipement\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(279, 40, 'detail_facture_belongsto_panne_relationship', 'relationship', 'pannes', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Panne\",\"table\":\"pannes\",\"type\":\"belongsTo\",\"column\":\"panne\",\"key\":\"panne\",\"label\":\"panne\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(280, 40, 'detail_facture_belongsto_facture_relationship', 'relationship', 'factures', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Facture\",\"table\":\"factures\",\"type\":\"belongsTo\",\"column\":\"reference_facture\",\"key\":\"reference\",\"label\":\"reference\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(281, 41, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(282, 41, 'reference', 'text', 'Reference', 0, 1, 1, 1, 1, 1, '{}', 2),
(283, 41, 'date', 'date', 'Date', 0, 1, 1, 1, 1, 1, '{}', 4),
(284, 41, 'id_fournisseur', 'text', 'Id Fournisseur', 0, 1, 1, 1, 1, 1, '{}', 5),
(285, 41, 'file', 'file', 'File', 0, 1, 1, 1, 1, 1, '{}', 6),
(286, 41, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(287, 41, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(288, 41, 'cout_devis', 'number', 'Cout Devis', 0, 1, 1, 1, 1, 1, '{}', 9),
(289, 41, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 10),
(290, 41, 'devi_belongsto_fournisseur_relationship', 'relationship', 'fournisseurs', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Fournisseur\",\"table\":\"fournisseurs\",\"type\":\"belongsTo\",\"column\":\"id_fournisseur\",\"key\":\"id\",\"label\":\"nom_fourniseur\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(300, 40, 'tva', 'select_dropdown', 'Tva', 0, 1, 1, 1, 1, 1, '{\"\":\"\",\"options\":{\"0\":\"0\",\"0.7\":\"0.7\",\"0.13\":\"0.13\",\"0.19\":\"0.19\"}}', 9),
(303, 24, 'fournisseur', 'text', 'Fournisseur', 0, 1, 1, 1, 1, 1, '{}', 7),
(304, 24, 'piece_de_rechange_belongsto_fournisseur_relationship', 'relationship', 'fournisseurs', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Fournisseur\",\"table\":\"fournisseurs\",\"type\":\"belongsTo\",\"column\":\"fournisseur\",\"key\":\"id\",\"label\":\"nom_fourniseur\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(307, 41, 'devi_belongstomany_reparations_externe_relationship', 'relationship', 'equipments', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\ReparationsExterne\",\"table\":\"reparations_externes\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"id_equipement\",\"pivot_table\":\"equipement_devis\",\"pivot\":\"1\",\"taggable\":\"0\"}', 3),
(309, 43, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(310, 43, 'services', 'text', 'Services', 0, 1, 1, 1, 1, 1, '{}', 3),
(313, 43, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(314, 43, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(316, 43, 'inventaire_belongsto_equipement_relationship', 'relationship', 'services', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Equipement\",\"table\":\"equipements\",\"type\":\"belongsTo\",\"column\":\"services\",\"key\":\"id_service\",\"label\":\"id_service\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(317, 7, 'date_premier_utilisation', 'date', 'Mise en service', 0, 1, 1, 1, 1, 1, '{}', 16),
(334, 48, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(335, 48, 'equipement', 'text', 'Equipement', 0, 1, 1, 0, 0, 0, '{}', 6),
(336, 48, 'service', 'text', 'Service', 0, 1, 1, 0, 0, 0, '{}', 5),
(337, 48, 'user', 'text', 'User', 0, 1, 1, 0, 0, 0, '{}', 7),
(339, 48, 'created_at', 'timestamp', 'Date Récalamation', 0, 1, 1, 0, 0, 0, '{}', 8),
(340, 48, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(341, 48, 'description', 'text_area', 'Description', 0, 1, 1, 0, 0, 0, '{}', 11),
(349, 48, 'reclamation_belongsto_service_relationship', 'relationship', 'services', 1, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\service\",\"table\":\"services\",\"type\":\"belongsTo\",\"column\":\"service\",\"key\":\"id\",\"label\":\"nom_service\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(350, 48, 'reclamation_belongsto_equipement_relationship', 'relationship', 'equipements', 1, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\Equipement\",\"table\":\"equipements\",\"type\":\"belongsTo\",\"column\":\"equipement\",\"key\":\"id\",\"label\":\"reference\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(351, 48, 'reclamation_belongsto_user_relationship', 'relationship', 'users', 1, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(352, 7, 'equipement_belongstomany_user_relationship', 'relationship', 'Post/Agent', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"post_agent\",\"key\":\"email\",\"label\":\"email\",\"pivot_table\":\"user_equipements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(354, 7, 'post_agent', 'text', 'Post Agent', 0, 1, 1, 1, 1, 1, '{}', 15),
(355, 36, 'detail_bon_de_livraison_belongsto_panne_relationship', 'relationship', 'pannes', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Panne\",\"table\":\"pannes\",\"type\":\"belongsTo\",\"column\":\"panne\",\"key\":\"panne\",\"label\":\"panne\",\"pivot_table\":\"bonde_commandes\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(356, 36, 'panne', 'text', 'Panne', 0, 1, 1, 1, 1, 1, '{}', 9),
(357, 50, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(358, 50, 'titre', 'text', 'Titre', 0, 1, 1, 1, 1, 1, '{}', 2),
(359, 50, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 3),
(361, 50, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 5),
(362, 50, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(363, 51, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(364, 51, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(365, 51, 'num_telephone', 'number', 'Num Telephone', 0, 1, 1, 1, 1, 1, '{}', 3),
(366, 51, 'email', 'text', 'Email', 0, 1, 1, 1, 1, 1, '{}', 4),
(367, 51, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
(368, 51, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(369, 51, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(370, 52, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(371, 52, 'service', 'text', 'Service', 0, 1, 1, 0, 0, 0, '{}', 5),
(372, 52, 'user', 'text', 'User', 0, 1, 1, 0, 0, 0, '{}', 6),
(373, 52, 'categorie', 'text', 'Categorie', 0, 1, 1, 0, 0, 0, '{}', 7),
(374, 52, 'description', 'text_area', 'Description', 0, 1, 1, 0, 0, 0, '{}', 8),
(375, 52, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 9),
(376, 52, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(377, 52, 'intervention', 'text', 'Intervention', 1, 1, 1, 1, 1, 1, '{\"default\":\"En Attente\"}', 11),
(378, 52, 'demande_achat_belongsto_service_relationship', 'relationship', 'services', 0, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\service\",\"table\":\"services\",\"type\":\"belongsTo\",\"column\":\"service\",\"key\":\"id\",\"label\":\"nom_service\",\"pivot_table\":\"abouts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(379, 52, 'demande_achat_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"categorie\",\"key\":\"id\",\"label\":\"nom_categorie\",\"pivot_table\":\"abouts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(380, 52, 'demande_achat_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"abouts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(381, 12, 'marque', 'text', 'Marque', 0, 1, 1, 1, 1, 1, '{}', 3),
(384, 39, 'id_categorie', 'text', 'Id Categorie', 0, 1, 1, 1, 1, 1, '{}', 8),
(385, 39, 'panne_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"id_categorie\",\"key\":\"id\",\"label\":\"nom_categorie\",\"pivot_table\":\"abouts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(392, 39, 'type_panne', 'text', 'Type Panne', 0, 1, 1, 1, 1, 1, '{}', 4),
(393, 54, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(395, 54, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 4),
(396, 54, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(397, 48, 'interventions', 'select_dropdown', 'Interventions', 0, 1, 1, 1, 1, 1, '{\"default\":\"En Attente\",\"options\":{\"\":\"\",\"SoftWare\":\"SoftWare\",\"Hardware_sur_place\":\"Hardware_sur_place\",\"HardWare_Atelier_Informatique\":\"HardWare_Atelier_Informatique\",\"HardWare_Externe\":\"HardWare_Externe\",\"Mise_en_reforme\":\"Mise_en_reforme\"}}', 8),
(398, 48, 'etat', 'select_dropdown', 'Etat', 0, 1, 1, 1, 1, 1, '{\"default\":\"En Attente\",\"options\":{\"En cours\":\"En cours\",\"Termin\\u00e9\":\"Termin\\u00e9\"}}', 9),
(399, 55, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(400, 55, 'date_de_demande', 'date', 'Date De Demande', 0, 1, 1, 1, 1, 1, '{}', 4),
(401, 55, 'date_reparation', 'date', 'Date Reparation', 0, 1, 1, 1, 1, 1, '{}', 5),
(402, 55, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 7),
(403, 55, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(404, 55, 'id_equipement', 'text', 'Id Equipement', 0, 1, 1, 1, 1, 1, '{}', 9),
(405, 55, 'Description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 10),
(406, 55, 'etat', 'select_dropdown', 'Etat (%)', 0, 1, 1, 1, 1, 1, '{\"\":\"\",\"options\":{\"0\":\"0\",\"25\":\"25\",\"50\":\"50\",\"75\":\"75\",\"100\":\"100\"}}', 6),
(409, 55, 'reparations_externe_belongsto_equipement_relationship', 'relationship', 'equipements', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Equipement\",\"table\":\"equipements\",\"type\":\"belongsTo\",\"column\":\"id_equipement\",\"key\":\"reference\",\"label\":\"reference\",\"pivot_table\":\"abouts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(410, 54, 'Champ', 'text', 'Champ', 0, 1, 1, 1, 1, 1, '{}', 2),
(411, 54, 'Value', 'text', 'Value', 0, 1, 1, 1, 1, 1, '{}', 3),
(412, 7, 'etat', 'select_dropdown', 'Etat', 0, 1, 1, 1, 1, 1, '{\"default\":\"Fonctionel\",\"options\":{\"Fonctionel\":\"Fonctionel\",\"En Cours de R\\u00e9paration\":\"En Cours de R\\u00e9paration\",\"Reforme\":\"Reforme\"}}', 13),
(413, 7, 'equipement_belongsto_fournisseur_relationship', 'relationship', 'fournisseurs', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Fournisseur\",\"table\":\"fournisseurs\",\"type\":\"belongsTo\",\"column\":\"id_fournisseur\",\"key\":\"nom_fourniseur\",\"label\":\"nom_fourniseur\",\"pivot_table\":\"abouts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(414, 7, 'garentie', 'text', 'Garentie', 0, 1, 1, 1, 1, 1, '{}', 17),
(415, 7, 'id_fournisseur', 'text', 'Id Fournisseur', 0, 1, 1, 1, 1, 1, '{}', 19),
(416, 55, 'reparer', 'checkbox', 'Reparer', 0, 1, 1, 1, 1, 1, '{\"on\":\"reparation en cours\",\"off\":\"reparation termin\\u00e9\"}', 9),
(417, 21, 'reparer', 'checkbox', 'Reparer', 0, 1, 1, 1, 1, 1, '{\"on\":\"reparation en cours\",\"off\":\"reparation termin\\u00e9\"}', 8),
(418, 56, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(419, 57, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(420, 57, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(421, 57, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(422, 57, 'nom_service', 'text', 'Nom Service', 0, 1, 1, 1, 1, 1, '{}', 4),
(423, 57, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 5),
(424, 50, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 4),
(425, 58, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(426, 58, 'equipement', 'text', 'Equipement', 0, 0, 0, 0, 0, 0, '{}', 3),
(427, 58, 'etat', 'select_dropdown', 'Etat', 0, 1, 1, 1, 1, 1, '{\"default\":\"Disponible\",\"options\":{\"Disponible\":\"Disponible\",\"Vente \\u00e0 l\'ench\\u00e8re\":\"Vente \\u00e0 l\'ench\\u00e8re\"}}', 4),
(428, 58, 'date', 'date', 'Date de vente a l\'enchère', 0, 1, 1, 1, 1, 1, '{}', 5),
(429, 58, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 6),
(430, 58, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(431, 58, 'reform_belongsto_equipement_relationship', 'relationship', 'equipements', 0, 1, 1, 0, 0, 1, '{\"model\":\"App\\\\Equipement\",\"table\":\"equipements\",\"type\":\"belongsTo\",\"column\":\"equipement\",\"key\":\"id\",\"label\":\"reference\",\"pivot_table\":\"abouts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(433, 13, 'type', 'select_dropdown', 'Type', 0, 1, 1, 1, 1, 1, '{\"options\":{\"Hospitalier\":\"Hospitalier\",\"non-Hospitalier\":\"non-Hospitalier\"}}', 5),
(434, 13, 'number', 'number', 'Number', 0, 1, 1, 1, 1, 1, '{}', 6);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-03-01 20:53:22', '2022-03-13 10:48:33'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-03-01 20:53:22', '2022-03-05 13:38:55'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-03-01 20:53:22', '2022-03-01 20:53:22'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-03-01 20:53:30', '2022-03-01 20:53:30'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-03-01 20:53:32', '2022-03-01 20:53:32'),
(7, 'equipements', 'equipements', 'Gestion Equipement', 'Equipements', NULL, 'App\\Equipement', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-01 21:21:00', '2022-06-13 20:17:37'),
(12, 'modeles', 'modeles', 'Modele', 'Modeles', NULL, 'App\\Modele', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-02 11:06:24', '2022-05-08 19:17:50'),
(13, 'services', 'services', 'Service', 'Services', NULL, 'App\\Service', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-02 20:53:03', '2022-06-13 20:01:03'),
(15, 'categories', 'categories', 'Category', 'Categories', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-02 21:18:42', '2022-03-05 20:06:42'),
(16, 'equipements_internes', 'equipements-internes', 'Equipements Interne', 'Equipements Internes', NULL, 'App\\EquipementsInterne', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-03-05 13:14:59', '2022-03-05 13:14:59'),
(21, 'reparations_internes', 'reparations-internes', 'Reparations Interne', 'Reparations Internes', NULL, 'App\\ReparationsInterne', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-05 13:20:52', '2022-06-13 19:58:43'),
(22, 'fournisseurs', 'fournisseurs', 'Fournisseur', 'Fournisseurs', NULL, 'App\\Fournisseur', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-05 13:25:36', '2022-03-05 20:09:28'),
(23, 'fiche_sorties', 'fiche-sorties', 'Fiche Sorty', 'Fiche Sorties', NULL, 'App\\FicheSorty', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-17 18:42:44', '2022-06-10 17:49:03'),
(24, 'piece_de_rechanges', 'piece-de-rechanges', 'Piece De Rechange', 'Piece De Rechanges', NULL, 'App\\PieceDeRechange', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-17 20:45:16', '2022-04-13 14:13:57'),
(26, 'bonde_livraison', 'bonde-livraison', 'Bonde Livraison', 'Bonde Livraisons', NULL, 'App\\BondeLivraison', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-03-20 17:49:52', '2022-03-20 17:49:52'),
(31, 'bonde_commandes', 'bonde-commandes', 'Bon de Commande', 'Bon de Commandes', NULL, 'App\\BondeCommande', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-25 13:47:41', '2022-04-10 19:31:10'),
(32, 'equipement_bondecommandes', 'equipement-bondecommandes', 'Détails Bon de commande', 'Détails Bon de commande', NULL, 'App\\EquipementBondecommande', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-28 18:55:24', '2022-06-09 09:02:38'),
(34, 'bonde_livraisons', 'bonde-livraisons', 'Bon de Livraison', 'Bon de Livraisons', NULL, 'App\\BondeLivraison', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-28 19:46:52', '2022-04-10 21:11:29'),
(36, 'detail_bon_de_livraisons', 'detail-bon-de-livraisons', 'Detail Reparation', 'Detail Reparations', NULL, 'App\\DetailBonDeLivraison', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-07 13:09:59', '2022-05-08 19:52:15'),
(37, 'factures', 'factures', 'Facture', 'Factures', NULL, 'App\\Facture', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-07 21:00:15', '2022-05-14 10:19:52'),
(38, 'panne', 'panne', 'Panne', 'Pannes', NULL, 'App\\Panne', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-08 22:04:49', '2022-04-08 22:04:49'),
(39, 'pannes', 'pannes', 'Panne', 'Pannes', NULL, 'App\\Panne', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-08 22:06:11', '2022-05-14 10:47:41'),
(40, 'detail_factures', 'detail-factures', 'Detail Facture', 'Detail Factures', NULL, 'App\\DetailFacture', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-11 15:32:19', '2022-06-10 16:52:35'),
(41, 'devis', 'devis', 'Devi', 'Devis', NULL, 'App\\Devi', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-11 23:33:36', '2022-04-14 00:12:29'),
(43, 'inventaires', 'inventaires', 'Inventaire', 'Inventaires', NULL, 'App\\Inventaire', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-15 23:32:28', '2022-04-18 14:54:33'),
(45, 'type_intervention', 'type-intervention', 'Type Intervention', 'Type Interventions', NULL, 'App\\TypeIntervention', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-19 21:54:47', '2022-04-19 21:54:47'),
(48, 'reclamations', 'reclamations', 'Reclamation', 'Reclamations', NULL, 'App\\Reclamation', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-19 22:26:40', '2022-06-21 18:59:46'),
(50, 'abouts', 'abouts', 'About', 'Abouts', NULL, 'App\\About', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-30 21:09:06', '2022-05-21 00:06:37'),
(51, 'contacts', 'contacts', 'Contact', 'Contacts', NULL, 'App\\Contact', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-30 21:32:09', '2022-04-30 21:32:59'),
(52, 'demande_achats', 'demande-achats', 'Besoin', 'Besoins', NULL, 'App\\DemandeAchat', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-05-06 11:00:33', '2022-06-21 19:12:28'),
(54, 'parametre_applications', 'parametre-applications', 'Parametre Application', 'Parametre Applications', NULL, 'App\\ParametreApplication', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-05-09 10:14:55', '2022-05-10 14:30:10'),
(55, 'reparations_externes', 'reparations-externes', 'Reparations Externe', 'Reparations Externes', NULL, 'App\\ReparationsExterne', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-05-10 13:55:36', '2022-06-13 19:57:42'),
(56, 'dashboards', 'dashboards', 'Dashboard', 'Dashboards', NULL, 'App\\Dashboard', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-05-19 20:17:56', '2022-05-19 20:20:12'),
(57, 'myservices', 'myservices', 'myservice', 'Myservices', NULL, 'App\\Myservice', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-05-20 23:40:14', '2022-05-20 23:40:14'),
(58, 'reforms', 'reforms', 'Reform', 'Reforms', NULL, 'App\\Reform', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-06-01 21:40:30', '2022-06-02 12:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `demande_achats`
--

CREATE TABLE `demande_achats` (
  `id` int(10) UNSIGNED NOT NULL,
  `service` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `intervention` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demande_achats`
--

INSERT INTO `demande_achats` (`id`, `service`, `user`, `categorie`, `description`, `created_at`, `updated_at`, `intervention`) VALUES
(7, 6, 6, 11, 'i need impremante', '2022-06-12 13:42:38', '2022-06-12 13:42:38', 'En Attente'),
(8, 4, 7, 11, 'besoin d\'une imprimante', '2022-06-13 09:32:07', '2022-06-21 18:56:29', 'Terminé'),
(9, 7, 6, 9, 'ngfjh', '2022-06-21 18:56:59', '2022-06-21 18:56:59', 'En Attente'),
(10, 4, 7, 8, 'bbbb', '2022-06-21 19:00:31', '2022-06-21 19:00:31', 'En Attente'),
(11, 7, 6, 11, 'nfnngvbv', '2022-06-21 19:04:19', '2022-06-21 19:04:46', 'En cours'),
(12, 7, 6, 9, 'ss', '2022-06-21 19:06:49', '2022-06-21 19:06:49', 'En Attente'),
(13, 7, 6, 12, 'hgfhg', '2022-06-21 19:09:51', '2022-06-21 19:12:52', 'terminé');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bon_de_livraisons`
--

CREATE TABLE `detail_bon_de_livraisons` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipement` int(11) DEFAULT NULL,
  `ref_bl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `panne` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_bon_de_livraisons`
--

INSERT INTO `detail_bon_de_livraisons` (`id`, `equipement`, `ref_bl`, `cout`, `description`, `created_at`, `updated_at`, `panne`) VALUES
(6, 22, 'BL35619567', 30, 'Remplacement boite d\'alimentation', '2022-06-09 18:15:20', '2022-06-09 18:21:36', 'Remplacement boite d\'alimentation'),
(7, 24, 'BL35619567', 1500, NULL, '2022-06-13 20:46:41', '2022-06-13 20:46:41', 'Remplacement boite d\'alimentation');

-- --------------------------------------------------------

--
-- Table structure for table `detail_factures`
--

CREATE TABLE `detail_factures` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panne` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_HT` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_facture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tva` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_factures`
--

INSERT INTO `detail_factures` (`id`, `reference`, `panne`, `prix_HT`, `description`, `reference_facture`, `created_at`, `updated_at`, `tva`) VALUES
(6, 'ML62DS54QN', 'Remplacement boite d\'alimentation', 30, 'Remplacement boite d\'alimentation', 'FACT68910463', '2022-06-09 18:19:32', '2022-06-10 16:53:34', 0.19),
(7, 'SK236KKLM', 'Remplacement boite d\'alimentation', 200, NULL, 'fact1', '2022-06-21 18:49:03', '2022-06-21 18:49:03', 0.13);

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cout_devis` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devis`
--

INSERT INTO `devis` (`id`, `reference`, `date`, `id_fournisseur`, `file`, `created_at`, `updated_at`, `cout_devis`, `description`) VALUES
(11, 'OU36TD56', '2022-06-12', 5, '[{\"download_link\":\"devis\\\\June2022\\\\9JhW8DlUHvbSl7gMDMrj.pdf\",\"original_name\":\"DevisOU36TD56.pdf\"}]', '2022-06-09 18:08:38', '2022-06-09 18:17:26', 30, 'Remplacement Bloc d\'alimentation');

-- --------------------------------------------------------

--
-- Table structure for table `equipements`
--

CREATE TABLE `equipements` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_achat` date DEFAULT NULL,
  `date_affectation` date DEFAULT NULL,
  `cout_initiale` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_modele` int(11) DEFAULT NULL,
  `id_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_premier_utilisation` date DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Fonctionel',
  `post_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garentie` int(11) DEFAULT NULL,
  `id_fournisseur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipements`
--

INSERT INTO `equipements` (`id`, `date_achat`, `date_affectation`, `cout_initiale`, `created_at`, `updated_at`, `deleted_at`, `id_categorie`, `id_modele`, `id_service`, `reference`, `date_premier_utilisation`, `etat`, `post_agent`, `garentie`, `id_fournisseur`) VALUES
(19, '2021-09-02', '2022-06-09', 90, '2022-06-09 17:44:26', '2022-06-13 20:40:55', NULL, 8, 9, 'Service de pédiatrie', 'AQWE65788', '2022-06-09', 'Fonctionel', 'chaima.nasr@gmail.com', 1, 'Al Arabia Informatique'),
(20, '2021-10-08', '2022-06-09', 650, '2022-06-09 17:46:08', '2022-06-09 17:46:08', NULL, 9, 8, 'Service de pédiatrie', 'AGKZL545392', '2022-06-09', 'Fonctionel', 'chaima.nasr@gmail.com', 2, 'Al Arabia Informatique'),
(21, '2022-06-09', '2022-06-10', 120, '2022-06-09 17:47:15', '2022-06-09 17:56:59', NULL, 10, 9, 'Service de cardiologie', 'HW65493CK', '2022-06-09', 'Fonctionel', 'tech@tech.com', 3, 'SOCIETE DIGITAL TECHNOLOGY OF HAFIAN'),
(22, '2020-09-09', '2021-02-17', 90, '2022-06-09 17:50:43', '2022-06-13 19:50:49', NULL, 8, 10, 'Service de cardiologie', 'BH62DS54QJ', '2021-02-17', 'Fonctionel', 'tech@tech.com', 3, 'SOCIETE DIGITAL TECHNOLOGY OF HAFIAN'),
(23, '2022-01-01', '2022-01-07', 600, '2022-06-09 17:52:53', '2022-06-11 18:32:47', NULL, 9, 8, 'Service de cardiologie', 'ML62DS54QN', '2022-01-07', 'Fonctionel', 'tech@tech.com', 2, 'Al Arabia Informatique'),
(24, '2020-06-09', '2021-06-06', 65, '2022-06-09 18:28:40', '2022-06-13 19:50:35', NULL, 8, 8, 'Service de pharmacie', 'EVBM6843276', '2020-06-09', 'Reforme', 'tech@tech.com', 1, 'Al Arabia Informatique'),
(25, '2022-04-01', '2022-06-13', 2500, '2022-06-13 09:56:24', '2022-06-13 14:49:26', NULL, 11, 10, 'Service de cardiologie', 'CN7ANET1QY', '2022-06-14', 'Fonctionel', 'chaima.nasr@gmail.com', 5, 'SOCIETE DIGITAL TECHNOLOGY OF HAFIAN'),
(26, '2022-06-01', '2022-06-13', 2500, '2022-06-13 20:20:36', '2022-06-13 20:20:36', NULL, 11, 10, 'Service de cardiologie', 'L2MP836CK', '2022-06-14', 'Fonctionel', 'chaima.nasr@gmail.com', 5, 'Al Arabia Informatique'),
(27, '2022-06-01', '2022-06-03', 500, '2022-06-17 12:52:26', '2022-06-17 12:52:26', NULL, 8, 14, 'Service de pédiatrie', 'ALM23LK54', '2022-06-04', 'Fonctionel', 'chaima.nasr@gmail.com', 5, 'Al Arabia Informatique'),
(28, '2022-06-01', '2022-06-21', 1200, '2022-06-21 18:38:49', '2022-06-21 18:50:05', NULL, 11, 12, 'Service de pédiatrie', 'SK236KKLM', '2022-06-22', 'Reforme', 'tech@tech.com', 5, 'SOCIETE DIGITAL TECHNOLOGY OF HAFIAN'),
(29, '2022-06-24', '2022-06-24', 2500, '2022-06-24 10:07:10', '2022-06-24 10:07:10', NULL, 11, 9, 'Service ORL', 'def123', '2022-06-24', 'Fonctionel', 'tech@tech.com', 5, 'Al Arabia Informatique');

-- --------------------------------------------------------

--
-- Table structure for table `equipement_bondecommandes`
--

CREATE TABLE `equipement_bondecommandes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_reparation_externe` int(11) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference_BC` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipement_bondecommandes`
--

INSERT INTO `equipement_bondecommandes` (`id`, `id_reparation_externe`, `cout`, `description`, `created_at`, `updated_at`, `reference_BC`) VALUES
(14, 24, 1500, 'bons de commande', '2022-06-13 20:07:48', '2022-06-13 20:07:48', 'BC1'),
(15, 22, 300, 'bons de commande 1', '2022-06-13 20:08:14', '2022-06-13 20:08:14', 'BC1');

-- --------------------------------------------------------

--
-- Table structure for table `equipement_devis`
--

CREATE TABLE `equipement_devis` (
  `id` int(10) UNSIGNED NOT NULL,
  `reparations_externe_id` int(11) DEFAULT NULL,
  `devi_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipement_devis`
--

INSERT INTO `equipement_devis` (`id`, `reparations_externe_id`, `devi_id`, `created_at`, `updated_at`) VALUES
(17, 22, 11, NULL, NULL),
(18, 25, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipement_fiche_sorties`
--

CREATE TABLE `equipement_fiche_sorties` (
  `id` int(10) UNSIGNED NOT NULL,
  `reparations_externe_id` int(11) DEFAULT NULL,
  `fiche_sorty_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipement_fiche_sorties`
--

INSERT INTO `equipement_fiche_sorties` (`id`, `reparations_externe_id`, `fiche_sorty_id`, `created_at`, `updated_at`) VALUES
(13, 22, 6, NULL, NULL),
(15, 22, 8, NULL, NULL),
(16, 22, 9, NULL, NULL),
(17, 22, 10, NULL, NULL),
(18, 22, 11, NULL, NULL),
(19, 22, 12, NULL, NULL),
(20, 22, 13, NULL, NULL),
(21, 22, 14, NULL, NULL),
(22, 23, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fournisseur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`id`, `reference`, `fournisseur`, `date`, `created_at`, `updated_at`, `file`) VALUES
(15, 'FACT68910463', '5', '2022-06-24', '2022-06-09 18:16:21', '2022-06-09 18:16:59', '[{\"download_link\":\"factures\\\\June2022\\\\dNxQD5gRMY7HxyzU00YH.pdf\",\"original_name\":\"FACT68910463.pdf\"}]'),
(16, 'fact1', '6', '2022-07-06', '2022-06-21 18:48:35', '2022-06-21 18:48:35', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fiche_sorties`
--

CREATE TABLE `fiche_sorties` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_fournisseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fiche_sorties`
--

INSERT INTO `fiche_sorties` (`id`, `created_at`, `updated_at`, `id_fournisseur`) VALUES
(13, '2022-06-14 18:47:00', '2022-06-10 17:51:08', 6),
(14, '2022-06-12 16:09:00', '2022-06-12 15:09:12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_fourniseur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom_fourniseur`, `created_at`, `updated_at`) VALUES
(5, 'Al Arabia Informatique', '2022-06-09 17:30:52', '2022-06-09 17:30:52'),
(6, 'SOCIETE DIGITAL TECHNOLOGY OF HAFIAN', '2022-06-09 17:32:03', '2022-06-09 17:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-03-01 20:53:24', '2022-03-01 20:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, 61, 2, '2022-03-01 20:53:24', '2022-05-09 13:45:55', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, 61, 1, '2022-03-01 20:53:24', '2022-05-09 13:45:51', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 13, '2022-03-01 20:53:24', '2022-06-12 13:44:30', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2022-03-01 20:53:24', '2022-03-02 18:44:15', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2022-03-01 20:53:24', '2022-03-02 18:44:15', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2022-03-01 20:53:24', '2022-03-02 18:44:15', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2022-03-01 20:53:24', '2022-03-02 18:44:15', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 9, '2022-03-01 20:53:24', '2022-06-12 13:44:29', 'voyager.settings.index', NULL),
(14, 1, 'Equipements', '', '_self', 'voyager-hammer', '#000000', 60, 1, '2022-03-01 21:21:00', '2022-05-09 10:25:19', 'voyager.equipements.index', 'null'),
(19, 1, 'Modeles', '', '_self', 'voyager-pie-chart', '#000000', 60, 2, '2022-03-02 11:06:24', '2022-05-19 22:00:19', 'voyager.modeles.index', 'null'),
(20, 1, 'Services', '', '_self', 'voyager-receipt', '#000000', 60, 4, '2022-03-02 20:53:05', '2022-05-19 22:00:19', 'voyager.services.index', 'null'),
(22, 1, 'Categories', '', '_self', 'voyager-treasure-open', '#000000', 60, 3, '2022-03-02 21:18:42', '2022-05-19 22:00:19', 'voyager.categories.index', 'null'),
(25, 1, 'Reparations Internes', '', '_self', 'voyager-backpack', '#000000', 38, 1, '2022-03-05 13:20:53', '2022-05-09 10:26:37', 'voyager.reparations-internes.index', 'null'),
(26, 1, 'Fournisseurs', '', '_self', 'voyager-people', '#000000', 60, 6, '2022-03-05 13:25:36', '2022-05-19 22:00:19', 'voyager.fournisseurs.index', 'null'),
(27, 1, 'Bon De Sorties', '', '_blank', 'voyager-documentation', '#000000', 38, 11, '2022-03-17 18:42:44', '2022-05-19 22:00:14', 'voyager.fiche-sorties.index', 'null'),
(28, 1, 'Piece De Rechanges', '', '_self', 'voyager-tools', '#000000', 60, 5, '2022-03-17 20:45:16', '2022-05-19 22:00:19', 'voyager.piece-de-rechanges.index', 'null'),
(35, 1, 'Bon de Commandes', '', '_self', 'voyager-book', '#000000', 38, 4, '2022-03-25 13:47:41', '2022-05-19 22:00:14', 'voyager.bonde-commandes.index', 'null'),
(36, 1, 'Details Bon de commandes', '', '_self', 'voyager-receipt', '#000000', 38, 5, '2022-03-28 18:55:24', '2022-05-19 22:00:14', 'voyager.equipement-bondecommandes.index', 'null'),
(37, 1, 'Bon de Livraisons', '', '_self', 'voyager-move', '#000000', 38, 6, '2022-03-28 19:46:53', '2022-05-19 22:00:14', 'voyager.bonde-livraisons.index', 'null'),
(38, 1, 'Gestion Reparations', '', '_self', 'voyager-paw', '#000000', NULL, 3, '2022-03-29 11:11:42', '2022-06-12 13:44:28', NULL, ''),
(40, 1, 'Detail Reparation', '', '_self', 'voyager-receipt', '#000000', 38, 7, '2022-04-07 13:10:00', '2022-05-19 22:00:14', 'voyager.detail-bon-de-livraisons.index', 'null'),
(41, 1, 'Factures', '', '_self', 'voyager-file-text', '#000000', 38, 8, '2022-04-07 21:00:16', '2022-05-19 22:00:14', 'voyager.factures.index', 'null'),
(43, 1, 'Pannes', '', '_self', 'voyager-tools', '#000000', 38, 10, '2022-04-08 22:06:12', '2022-05-19 22:00:14', 'voyager.pannes.index', 'null'),
(44, 1, 'Detail Factures', '', '_self', 'voyager-receipt', '#000000', 38, 9, '2022-04-11 15:32:19', '2022-05-19 22:00:14', 'voyager.detail-factures.index', 'null'),
(46, 1, 'Devis', '', '_self', 'voyager-file-text', '#000000', 38, 3, '2022-04-11 23:33:37', '2022-05-10 14:13:22', 'voyager.devis.index', 'null'),
(48, 1, 'Inventaires', '', '_self', NULL, NULL, NULL, 10, '2022-04-15 23:32:29', '2022-06-12 13:44:29', 'voyager.inventaires.index', NULL),
(50, 1, 'Type Interventions', '', '_self', NULL, NULL, NULL, 11, '2022-04-19 21:54:47', '2022-06-12 13:44:29', 'voyager.type-intervention.index', NULL),
(53, 1, 'Reclamations', '', '_self', 'voyager-megaphone', '#000000', NULL, 6, '2022-04-19 22:26:40', '2022-06-12 13:44:28', 'voyager.reclamations.index', 'null'),
(55, 1, 'Abouts', '', '_self', 'voyager-documentation', '#000000', 66, 1, '2022-04-30 21:09:07', '2022-06-10 18:05:24', 'voyager.abouts.index', 'null'),
(56, 1, 'Contacts', '', '_self', 'voyager-chat', '#000000', 66, 2, '2022-04-30 21:32:09', '2022-06-10 18:05:30', 'voyager.contacts.index', 'null'),
(57, 1, 'Besoins', '', '_self', 'voyager-basket', '#000000', NULL, 7, '2022-05-06 11:00:34', '2022-06-12 13:44:28', 'voyager.demande-achats.index', 'null'),
(59, 1, 'Parametre Applications', '', '_self', 'voyager-lightbulb', '#000000', NULL, 8, '2022-05-09 10:14:56', '2022-06-12 13:44:28', 'voyager.parametre-applications.index', 'null'),
(60, 1, 'Gestion Equipments', '', '_self', 'voyager-hammer', '#000000', NULL, 2, '2022-05-09 10:24:41', '2022-06-12 13:44:28', NULL, ''),
(61, 1, 'Gestion Users', '', '_self', 'voyager-people', '#000000', NULL, 4, '2022-05-09 13:45:16', '2022-06-12 13:44:28', NULL, ''),
(62, 1, 'Reparations Externes', '', '_self', 'voyager-truck', '#000000', 38, 2, '2022-05-10 13:55:37', '2022-05-10 14:13:22', 'voyager.reparations-externes.index', 'null'),
(63, 1, 'Dashboard', '', '_self', 'voyager-dashboard', '#000000', NULL, 1, '2022-05-19 20:17:57', '2022-06-10 18:05:23', 'voyager.dashboards.index', 'null'),
(64, 1, 'Myservices', '', '_self', 'voyager-company', '#000000', 66, 3, '2022-05-20 23:40:15', '2022-06-10 18:05:33', 'voyager.myservices.index', 'null'),
(65, 1, 'Reforms', '', '_self', 'voyager-backpack', '#000000', NULL, 5, '2022-06-01 21:40:31', '2022-06-12 13:44:28', 'voyager.reforms.index', 'null'),
(66, 1, 'React', '', '_self', 'voyager-receipt', '#000000', NULL, 12, '2022-06-10 18:05:13', '2022-06-12 13:44:29', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2016_01_01_000000_create_pages_table', 2),
(25, '2016_01_01_000000_create_posts_table', 2),
(26, '2016_02_15_204651_create_categories_table', 2),
(27, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(28, '2016_11_22_110000_create_history_tables', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

CREATE TABLE `modeles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_modele` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiche_technique` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`id`, `nom_modele`, `marque`, `fiche_technique`, `created_at`, `updated_at`) VALUES
(8, 'A-Open', 'Intel', '[]', '2022-06-09 17:24:00', '2022-06-09 17:25:08'),
(9, '575G', 'Dell', '[]', '2022-06-09 17:25:00', '2022-06-09 17:25:57'),
(10, 'CK-189', 'Hp', '[]', '2022-06-13 14:48:00', '2022-06-13 14:49:01'),
(11, 'E15ASP', 'DELL', '[]', '2022-06-17 11:56:12', '2022-06-17 11:56:12'),
(12, 'XSSD200', 'HP', '[]', '2022-06-17 11:56:36', '2022-06-17 11:56:36'),
(13, 'XSSD123', 'ASUS', '[]', '2022-06-17 12:29:21', '2022-06-17 12:29:21'),
(14, 'E15KLM26', 'DELL', '[]', '2022-06-17 12:29:54', '2022-06-17 12:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `model_histories`
--

CREATE TABLE `model_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_histories`
--

INSERT INTO `model_histories` (`id`, `model_type`, `model_id`, `user_id`, `user_type`, `message`, `meta`, `performed_at`) VALUES
(39, 'App\\Equipement', 21, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2022-06-09\",\"new\":\"2022-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2022-06-09\",\"new\":\"2022-06-10T00:00:00.000000Z\"},{\"key\":\"id_service\",\"old\":\"Service de p\\u00e9diatrie\",\"new\":\"Service de cardiologie\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2022-06-09\",\"new\":\"2022-06-09T00:00:00.000000Z\"},{\"key\":\"post_agent\",\"old\":\"chaima.nasr@gmail.com\",\"new\":\"tech@tech.com\"}]', '2022-06-09 17:56:59'),
(41, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2020-06-15\",\"new\":\"2020-06-15T00:00:00.000000Z\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"}]', '2022-06-09 18:29:20'),
(42, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2020-06-15\",\"new\":\"2020-06-30T00:00:00.000000Z\"},{\"key\":\"id_service\",\"old\":\"Service de pharmacie\",\"new\":\"Service de radiologie\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"post_agent\",\"old\":\"admin@admin.com\",\"new\":\"chaima.nasr@gmail.com\"}]', '2022-06-09 18:29:46'),
(43, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2020-06-30\",\"new\":\"2021-01-22T00:00:00.000000Z\"},{\"key\":\"id_service\",\"old\":\"Service de radiologie\",\"new\":\"Service de m\\u00e9decine Dentaire\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"post_agent\",\"old\":\"chaima.nasr@gmail.com\",\"new\":\"tech@tech.com\"}]', '2022-06-09 18:30:12'),
(44, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2021-01-22\",\"new\":\"2021-06-06T00:00:00.000000Z\"},{\"key\":\"id_service\",\"old\":\"Service de m\\u00e9decine Dentaire\",\"new\":\"Service de pharmacie\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"post_agent\",\"old\":\"tech@tech.com\",\"new\":\"admin@admin.com\"}]', '2022-06-09 18:30:47'),
(45, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2021-06-06\",\"new\":\"2021-06-06T00:00:00.000000Z\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"etat\",\"old\":\"Fonctionel\",\"new\":\"Reforme\"}]', '2022-06-09 18:31:00'),
(46, 'App\\Equipement', 23, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2022-01-01\",\"new\":\"2022-01-01T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2022-01-07\",\"new\":\"2022-01-07T00:00:00.000000Z\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2022-01-07\",\"new\":\"2022-01-07T00:00:00.000000Z\"}]', '2022-06-11 18:32:47'),
(47, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2021-06-06\",\"new\":\"2021-06-06T00:00:00.000000Z\"},{\"key\":\"id_modele\",\"old\":6,\"new\":\"7\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"}]', '2022-06-13 09:44:54'),
(48, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2021-06-06\",\"new\":\"2021-06-06T00:00:00.000000Z\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"post_agent\",\"old\":\"admin@admin.com\",\"new\":\"tech@tech.com\"}]', '2022-06-13 09:47:13'),
(50, 'App\\Equipement', 25, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2022-04-01\",\"new\":\"2022-04-01T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2022-06-13\",\"new\":\"2022-06-13T00:00:00.000000Z\"},{\"key\":\"id_modele\",\"old\":7,\"new\":\"10\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2022-06-14\",\"new\":\"2022-06-14T00:00:00.000000Z\"}]', '2022-06-13 14:49:25'),
(51, 'App\\Equipement', 24, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2021-06-06\",\"new\":\"2021-06-06T00:00:00.000000Z\"},{\"key\":\"id_modele\",\"old\":7,\"new\":\"8\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2020-06-09\",\"new\":\"2020-06-09T00:00:00.000000Z\"}]', '2022-06-13 19:50:35'),
(52, 'App\\Equipement', 22, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2020-09-09\",\"new\":\"2020-09-09T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2021-02-17\",\"new\":\"2021-02-17T00:00:00.000000Z\"},{\"key\":\"id_modele\",\"old\":7,\"new\":\"10\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2021-02-17\",\"new\":\"2021-02-17T00:00:00.000000Z\"}]', '2022-06-13 19:50:49'),
(54, 'App\\Equipement', 19, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2021-09-02\",\"new\":\"2021-09-02T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2022-06-09\",\"new\":\"2022-06-09T00:00:00.000000Z\"},{\"key\":\"id_modele\",\"old\":7,\"new\":\"9\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2022-06-09\",\"new\":\"2022-06-09T00:00:00.000000Z\"}]', '2022-06-13 20:40:55'),
(57, 'App\\Equipement', 28, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2022-06-01\",\"new\":\"2022-06-01T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2022-06-20\",\"new\":\"2022-06-20T00:00:00.000000Z\"},{\"key\":\"date_premier_utilisation\",\"old\":null,\"new\":\"2022-06-22T00:00:00.000000Z\"}]', '2022-06-21 18:39:29'),
(58, 'App\\Equipement', 28, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2022-06-01\",\"new\":\"2022-06-01T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2022-06-20\",\"new\":\"2022-06-21T00:00:00.000000Z\"},{\"key\":\"id_service\",\"old\":\"Service de cardiologie\",\"new\":\"Service de p\\u00e9diatrie\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2022-06-22\",\"new\":\"2022-06-22T00:00:00.000000Z\"},{\"key\":\"post_agent\",\"old\":\"chaima.nasr@gmail.com\",\"new\":\"tech@tech.com\"}]', '2022-06-21 18:40:41'),
(59, 'App\\Equipement', 28, 1, 'App\\User', 'Updating Equipement ', '[{\"key\":\"date_achat\",\"old\":\"2022-06-01\",\"new\":\"2022-06-01T00:00:00.000000Z\"},{\"key\":\"date_affectation\",\"old\":\"2022-06-21\",\"new\":\"2022-06-21T00:00:00.000000Z\"},{\"key\":\"date_premier_utilisation\",\"old\":\"2022-06-22\",\"new\":\"2022-06-22T00:00:00.000000Z\"},{\"key\":\"etat\",\"old\":\"Fonctionel\",\"new\":\"Reforme\"}]', '2022-06-21 18:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `myservices`
--

CREATE TABLE `myservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `myservices`
--

INSERT INTO `myservices` (`id`, `created_at`, `updated_at`, `nom_service`, `image`) VALUES
(1, '2022-05-20 23:46:30', '2022-05-20 23:46:30', 'Consultations Externes', 'myservices\\May2022\\oeIjOAXHAlxrBkFoPnJV.jpg'),
(2, '2022-05-20 23:47:15', '2022-05-20 23:47:15', 'Service D’Urgence', 'myservices\\May2022\\BBkkwI0cYZlfhbKa6rcP.png'),
(3, '2022-05-20 23:47:48', '2022-05-20 23:47:48', 'Réanimation', 'myservices\\May2022\\yu9jmrrtPSaU1ltPN3CU.webp'),
(4, '2022-05-20 23:48:37', '2022-05-20 23:48:37', 'Services Hospitaliers', 'myservices\\May2022\\VvOmPAJPyYJKjW9yS7Lu.jpg'),
(5, '2022-05-20 23:49:07', '2022-05-20 23:49:07', 'Laboratoires', 'myservices\\May2022\\nxCAuP3fhT7csnYsO57d.jpg'),
(6, '2022-05-20 23:49:37', '2022-05-20 23:49:37', 'Service De Radiologie', 'myservices\\May2022\\u2cNafv7MobFzVgQroUi.jpg'),
(7, '2022-05-20 23:50:12', '2022-05-20 23:50:12', 'Service De Pharmacie', 'myservices\\May2022\\7pcdObSLV33nQXxPu1TJ.jpg'),
(8, '2022-05-20 23:50:44', '2022-05-20 23:50:44', 'Service De Med Légale', 'myservices\\May2022\\7BTKvUUEtpOVCAKokMAP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pannes`
--

CREATE TABLE `pannes` (
  `id` int(10) UNSIGNED NOT NULL,
  `panne` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_panne` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pannes`
--

INSERT INTO `pannes` (`id`, `panne`, `created_at`, `updated_at`, `description`, `id_categorie`, `type_panne`) VALUES
(5, 'Remplacement boite d\'alimentation', '2022-06-09 18:21:14', '2022-06-09 18:21:14', NULL, '9', 'Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `parametre_applications`
--

CREATE TABLE `parametre_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `Champ` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parametre_applications`
--

INSERT INTO `parametre_applications` (`id`, `Champ`, `created_at`, `updated_at`, `Value`) VALUES
(3, 'Nombres_Annee', '2022-06-09 17:55:37', '2022-06-24 10:20:18', '3');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(2, 'browse_bread', NULL, '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(3, 'browse_database', NULL, '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(4, 'browse_media', NULL, '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(5, 'browse_compass', NULL, '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(6, 'browse_menus', 'menus', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(7, 'read_menus', 'menus', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(8, 'edit_menus', 'menus', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(9, 'add_menus', 'menus', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(10, 'delete_menus', 'menus', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(11, 'browse_roles', 'roles', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(12, 'read_roles', 'roles', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(13, 'edit_roles', 'roles', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(14, 'add_roles', 'roles', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(15, 'delete_roles', 'roles', '2022-03-01 20:53:25', '2022-03-01 20:53:25'),
(16, 'browse_users', 'users', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(17, 'read_users', 'users', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(18, 'edit_users', 'users', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(19, 'add_users', 'users', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(20, 'delete_users', 'users', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(21, 'browse_settings', 'settings', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(22, 'read_settings', 'settings', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(23, 'edit_settings', 'settings', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(24, 'add_settings', 'settings', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(25, 'delete_settings', 'settings', '2022-03-01 20:53:26', '2022-03-01 20:53:26'),
(31, 'browse_posts', 'posts', '2022-03-01 20:53:31', '2022-03-01 20:53:31'),
(32, 'read_posts', 'posts', '2022-03-01 20:53:31', '2022-03-01 20:53:31'),
(33, 'edit_posts', 'posts', '2022-03-01 20:53:31', '2022-03-01 20:53:31'),
(34, 'add_posts', 'posts', '2022-03-01 20:53:31', '2022-03-01 20:53:31'),
(35, 'delete_posts', 'posts', '2022-03-01 20:53:31', '2022-03-01 20:53:31'),
(36, 'browse_pages', 'pages', '2022-03-01 20:53:32', '2022-03-01 20:53:32'),
(37, 'read_pages', 'pages', '2022-03-01 20:53:32', '2022-03-01 20:53:32'),
(38, 'edit_pages', 'pages', '2022-03-01 20:53:32', '2022-03-01 20:53:32'),
(39, 'add_pages', 'pages', '2022-03-01 20:53:32', '2022-03-01 20:53:32'),
(40, 'delete_pages', 'pages', '2022-03-01 20:53:32', '2022-03-01 20:53:32'),
(41, 'browse_equipements', 'equipements', '2022-03-01 21:21:00', '2022-03-01 21:21:00'),
(42, 'read_equipements', 'equipements', '2022-03-01 21:21:00', '2022-03-01 21:21:00'),
(43, 'edit_equipements', 'equipements', '2022-03-01 21:21:00', '2022-03-01 21:21:00'),
(44, 'add_equipements', 'equipements', '2022-03-01 21:21:00', '2022-03-01 21:21:00'),
(45, 'delete_equipements', 'equipements', '2022-03-01 21:21:00', '2022-03-01 21:21:00'),
(66, 'browse_modeles', 'modeles', '2022-03-02 11:06:24', '2022-03-02 11:06:24'),
(67, 'read_modeles', 'modeles', '2022-03-02 11:06:24', '2022-03-02 11:06:24'),
(68, 'edit_modeles', 'modeles', '2022-03-02 11:06:24', '2022-03-02 11:06:24'),
(69, 'add_modeles', 'modeles', '2022-03-02 11:06:24', '2022-03-02 11:06:24'),
(70, 'delete_modeles', 'modeles', '2022-03-02 11:06:24', '2022-03-02 11:06:24'),
(71, 'browse_services', 'services', '2022-03-02 20:53:04', '2022-03-02 20:53:04'),
(72, 'read_services', 'services', '2022-03-02 20:53:04', '2022-03-02 20:53:04'),
(73, 'edit_services', 'services', '2022-03-02 20:53:04', '2022-03-02 20:53:04'),
(74, 'add_services', 'services', '2022-03-02 20:53:04', '2022-03-02 20:53:04'),
(75, 'delete_services', 'services', '2022-03-02 20:53:04', '2022-03-02 20:53:04'),
(81, 'browse_categories', 'categories', '2022-03-02 21:18:42', '2022-03-02 21:18:42'),
(82, 'read_categories', 'categories', '2022-03-02 21:18:42', '2022-03-02 21:18:42'),
(83, 'edit_categories', 'categories', '2022-03-02 21:18:42', '2022-03-02 21:18:42'),
(84, 'add_categories', 'categories', '2022-03-02 21:18:42', '2022-03-02 21:18:42'),
(85, 'delete_categories', 'categories', '2022-03-02 21:18:42', '2022-03-02 21:18:42'),
(86, 'browse_equipements_internes', 'equipements_internes', '2022-03-05 13:14:59', '2022-03-05 13:14:59'),
(87, 'read_equipements_internes', 'equipements_internes', '2022-03-05 13:14:59', '2022-03-05 13:14:59'),
(88, 'edit_equipements_internes', 'equipements_internes', '2022-03-05 13:14:59', '2022-03-05 13:14:59'),
(89, 'add_equipements_internes', 'equipements_internes', '2022-03-05 13:14:59', '2022-03-05 13:14:59'),
(90, 'delete_equipements_internes', 'equipements_internes', '2022-03-05 13:14:59', '2022-03-05 13:14:59'),
(96, 'browse_reparations_internes', 'reparations_internes', '2022-03-05 13:20:53', '2022-03-05 13:20:53'),
(97, 'read_reparations_internes', 'reparations_internes', '2022-03-05 13:20:53', '2022-03-05 13:20:53'),
(98, 'edit_reparations_internes', 'reparations_internes', '2022-03-05 13:20:53', '2022-03-05 13:20:53'),
(99, 'add_reparations_internes', 'reparations_internes', '2022-03-05 13:20:53', '2022-03-05 13:20:53'),
(100, 'delete_reparations_internes', 'reparations_internes', '2022-03-05 13:20:53', '2022-03-05 13:20:53'),
(101, 'browse_fournisseurs', 'fournisseurs', '2022-03-05 13:25:36', '2022-03-05 13:25:36'),
(102, 'read_fournisseurs', 'fournisseurs', '2022-03-05 13:25:36', '2022-03-05 13:25:36'),
(103, 'edit_fournisseurs', 'fournisseurs', '2022-03-05 13:25:36', '2022-03-05 13:25:36'),
(104, 'add_fournisseurs', 'fournisseurs', '2022-03-05 13:25:36', '2022-03-05 13:25:36'),
(105, 'delete_fournisseurs', 'fournisseurs', '2022-03-05 13:25:36', '2022-03-05 13:25:36'),
(106, 'browse_fiche_sorties', 'fiche_sorties', '2022-03-17 18:42:44', '2022-03-17 18:42:44'),
(107, 'read_fiche_sorties', 'fiche_sorties', '2022-03-17 18:42:44', '2022-03-17 18:42:44'),
(108, 'edit_fiche_sorties', 'fiche_sorties', '2022-03-17 18:42:44', '2022-03-17 18:42:44'),
(109, 'add_fiche_sorties', 'fiche_sorties', '2022-03-17 18:42:44', '2022-03-17 18:42:44'),
(110, 'delete_fiche_sorties', 'fiche_sorties', '2022-03-17 18:42:44', '2022-03-17 18:42:44'),
(111, 'browse_piece_de_rechanges', 'piece_de_rechanges', '2022-03-17 20:45:16', '2022-03-17 20:45:16'),
(112, 'read_piece_de_rechanges', 'piece_de_rechanges', '2022-03-17 20:45:16', '2022-03-17 20:45:16'),
(113, 'edit_piece_de_rechanges', 'piece_de_rechanges', '2022-03-17 20:45:16', '2022-03-17 20:45:16'),
(114, 'add_piece_de_rechanges', 'piece_de_rechanges', '2022-03-17 20:45:16', '2022-03-17 20:45:16'),
(115, 'delete_piece_de_rechanges', 'piece_de_rechanges', '2022-03-17 20:45:16', '2022-03-17 20:45:16'),
(121, 'browse_bonde_livraison', 'bonde_livraison', '2022-03-20 17:49:52', '2022-03-20 17:49:52'),
(122, 'read_bonde_livraison', 'bonde_livraison', '2022-03-20 17:49:52', '2022-03-20 17:49:52'),
(123, 'edit_bonde_livraison', 'bonde_livraison', '2022-03-20 17:49:52', '2022-03-20 17:49:52'),
(124, 'add_bonde_livraison', 'bonde_livraison', '2022-03-20 17:49:52', '2022-03-20 17:49:52'),
(125, 'delete_bonde_livraison', 'bonde_livraison', '2022-03-20 17:49:52', '2022-03-20 17:49:52'),
(146, 'browse_bonde_commandes', 'bonde_commandes', '2022-03-25 13:47:41', '2022-03-25 13:47:41'),
(147, 'read_bonde_commandes', 'bonde_commandes', '2022-03-25 13:47:41', '2022-03-25 13:47:41'),
(148, 'edit_bonde_commandes', 'bonde_commandes', '2022-03-25 13:47:41', '2022-03-25 13:47:41'),
(149, 'add_bonde_commandes', 'bonde_commandes', '2022-03-25 13:47:41', '2022-03-25 13:47:41'),
(150, 'delete_bonde_commandes', 'bonde_commandes', '2022-03-25 13:47:41', '2022-03-25 13:47:41'),
(151, 'browse_equipement_bondecommandes', 'equipement_bondecommandes', '2022-03-28 18:55:24', '2022-03-28 18:55:24'),
(152, 'read_equipement_bondecommandes', 'equipement_bondecommandes', '2022-03-28 18:55:24', '2022-03-28 18:55:24'),
(153, 'edit_equipement_bondecommandes', 'equipement_bondecommandes', '2022-03-28 18:55:24', '2022-03-28 18:55:24'),
(154, 'add_equipement_bondecommandes', 'equipement_bondecommandes', '2022-03-28 18:55:24', '2022-03-28 18:55:24'),
(155, 'delete_equipement_bondecommandes', 'equipement_bondecommandes', '2022-03-28 18:55:24', '2022-03-28 18:55:24'),
(156, 'browse_bonde_livraisons', 'bonde_livraisons', '2022-03-28 19:46:52', '2022-03-28 19:46:52'),
(157, 'read_bonde_livraisons', 'bonde_livraisons', '2022-03-28 19:46:52', '2022-03-28 19:46:52'),
(158, 'edit_bonde_livraisons', 'bonde_livraisons', '2022-03-28 19:46:52', '2022-03-28 19:46:52'),
(159, 'add_bonde_livraisons', 'bonde_livraisons', '2022-03-28 19:46:52', '2022-03-28 19:46:52'),
(160, 'delete_bonde_livraisons', 'bonde_livraisons', '2022-03-28 19:46:52', '2022-03-28 19:46:52'),
(166, 'browse_detail_bon_de_livraisons', 'detail_bon_de_livraisons', '2022-04-07 13:10:00', '2022-04-07 13:10:00'),
(167, 'read_detail_bon_de_livraisons', 'detail_bon_de_livraisons', '2022-04-07 13:10:00', '2022-04-07 13:10:00'),
(168, 'edit_detail_bon_de_livraisons', 'detail_bon_de_livraisons', '2022-04-07 13:10:00', '2022-04-07 13:10:00'),
(169, 'add_detail_bon_de_livraisons', 'detail_bon_de_livraisons', '2022-04-07 13:10:00', '2022-04-07 13:10:00'),
(170, 'delete_detail_bon_de_livraisons', 'detail_bon_de_livraisons', '2022-04-07 13:10:00', '2022-04-07 13:10:00'),
(171, 'browse_factures', 'factures', '2022-04-07 21:00:15', '2022-04-07 21:00:15'),
(172, 'read_factures', 'factures', '2022-04-07 21:00:15', '2022-04-07 21:00:15'),
(173, 'edit_factures', 'factures', '2022-04-07 21:00:15', '2022-04-07 21:00:15'),
(174, 'add_factures', 'factures', '2022-04-07 21:00:15', '2022-04-07 21:00:15'),
(175, 'delete_factures', 'factures', '2022-04-07 21:00:15', '2022-04-07 21:00:15'),
(176, 'browse_panne', 'panne', '2022-04-08 22:04:49', '2022-04-08 22:04:49'),
(177, 'read_panne', 'panne', '2022-04-08 22:04:49', '2022-04-08 22:04:49'),
(178, 'edit_panne', 'panne', '2022-04-08 22:04:49', '2022-04-08 22:04:49'),
(179, 'add_panne', 'panne', '2022-04-08 22:04:49', '2022-04-08 22:04:49'),
(180, 'delete_panne', 'panne', '2022-04-08 22:04:49', '2022-04-08 22:04:49'),
(181, 'browse_pannes', 'pannes', '2022-04-08 22:06:11', '2022-04-08 22:06:11'),
(182, 'read_pannes', 'pannes', '2022-04-08 22:06:11', '2022-04-08 22:06:11'),
(183, 'edit_pannes', 'pannes', '2022-04-08 22:06:11', '2022-04-08 22:06:11'),
(184, 'add_pannes', 'pannes', '2022-04-08 22:06:11', '2022-04-08 22:06:11'),
(185, 'delete_pannes', 'pannes', '2022-04-08 22:06:11', '2022-04-08 22:06:11'),
(186, 'browse_detail_factures', 'detail_factures', '2022-04-11 15:32:19', '2022-04-11 15:32:19'),
(187, 'read_detail_factures', 'detail_factures', '2022-04-11 15:32:19', '2022-04-11 15:32:19'),
(188, 'edit_detail_factures', 'detail_factures', '2022-04-11 15:32:19', '2022-04-11 15:32:19'),
(189, 'add_detail_factures', 'detail_factures', '2022-04-11 15:32:19', '2022-04-11 15:32:19'),
(190, 'delete_detail_factures', 'detail_factures', '2022-04-11 15:32:19', '2022-04-11 15:32:19'),
(191, 'browse_devis', 'devis', '2022-04-11 23:33:37', '2022-04-11 23:33:37'),
(192, 'read_devis', 'devis', '2022-04-11 23:33:37', '2022-04-11 23:33:37'),
(193, 'edit_devis', 'devis', '2022-04-11 23:33:37', '2022-04-11 23:33:37'),
(194, 'add_devis', 'devis', '2022-04-11 23:33:37', '2022-04-11 23:33:37'),
(195, 'delete_devis', 'devis', '2022-04-11 23:33:37', '2022-04-11 23:33:37'),
(201, 'browse_inventaires', 'inventaires', '2022-04-15 23:32:28', '2022-04-15 23:32:28'),
(202, 'read_inventaires', 'inventaires', '2022-04-15 23:32:28', '2022-04-15 23:32:28'),
(203, 'edit_inventaires', 'inventaires', '2022-04-15 23:32:29', '2022-04-15 23:32:29'),
(204, 'add_inventaires', 'inventaires', '2022-04-15 23:32:29', '2022-04-15 23:32:29'),
(205, 'delete_inventaires', 'inventaires', '2022-04-15 23:32:29', '2022-04-15 23:32:29'),
(211, 'browse_type_intervention', 'type_intervention', '2022-04-19 21:54:47', '2022-04-19 21:54:47'),
(212, 'read_type_intervention', 'type_intervention', '2022-04-19 21:54:47', '2022-04-19 21:54:47'),
(213, 'edit_type_intervention', 'type_intervention', '2022-04-19 21:54:47', '2022-04-19 21:54:47'),
(214, 'add_type_intervention', 'type_intervention', '2022-04-19 21:54:47', '2022-04-19 21:54:47'),
(215, 'delete_type_intervention', 'type_intervention', '2022-04-19 21:54:47', '2022-04-19 21:54:47'),
(226, 'browse_reclamations', 'reclamations', '2022-04-19 22:26:40', '2022-04-19 22:26:40'),
(227, 'read_reclamations', 'reclamations', '2022-04-19 22:26:40', '2022-04-19 22:26:40'),
(228, 'edit_reclamations', 'reclamations', '2022-04-19 22:26:40', '2022-04-19 22:26:40'),
(229, 'add_reclamations', 'reclamations', '2022-04-19 22:26:40', '2022-04-19 22:26:40'),
(230, 'delete_reclamations', 'reclamations', '2022-04-19 22:26:40', '2022-04-19 22:26:40'),
(236, 'browse_abouts', 'abouts', '2022-04-30 21:09:06', '2022-04-30 21:09:06'),
(237, 'read_abouts', 'abouts', '2022-04-30 21:09:06', '2022-04-30 21:09:06'),
(238, 'edit_abouts', 'abouts', '2022-04-30 21:09:06', '2022-04-30 21:09:06'),
(239, 'add_abouts', 'abouts', '2022-04-30 21:09:06', '2022-04-30 21:09:06'),
(240, 'delete_abouts', 'abouts', '2022-04-30 21:09:06', '2022-04-30 21:09:06'),
(241, 'browse_contacts', 'contacts', '2022-04-30 21:32:09', '2022-04-30 21:32:09'),
(242, 'read_contacts', 'contacts', '2022-04-30 21:32:09', '2022-04-30 21:32:09'),
(243, 'edit_contacts', 'contacts', '2022-04-30 21:32:09', '2022-04-30 21:32:09'),
(244, 'add_contacts', 'contacts', '2022-04-30 21:32:09', '2022-04-30 21:32:09'),
(245, 'delete_contacts', 'contacts', '2022-04-30 21:32:09', '2022-04-30 21:32:09'),
(246, 'browse_demande_achats', 'demande_achats', '2022-05-06 11:00:33', '2022-05-06 11:00:33'),
(247, 'read_demande_achats', 'demande_achats', '2022-05-06 11:00:33', '2022-05-06 11:00:33'),
(248, 'edit_demande_achats', 'demande_achats', '2022-05-06 11:00:33', '2022-05-06 11:00:33'),
(249, 'add_demande_achats', 'demande_achats', '2022-05-06 11:00:33', '2022-05-06 11:00:33'),
(250, 'delete_demande_achats', 'demande_achats', '2022-05-06 11:00:33', '2022-05-06 11:00:33'),
(256, 'browse_parametre_applications', 'parametre_applications', '2022-05-09 10:14:56', '2022-05-09 10:14:56'),
(257, 'read_parametre_applications', 'parametre_applications', '2022-05-09 10:14:56', '2022-05-09 10:14:56'),
(258, 'edit_parametre_applications', 'parametre_applications', '2022-05-09 10:14:56', '2022-05-09 10:14:56'),
(259, 'add_parametre_applications', 'parametre_applications', '2022-05-09 10:14:56', '2022-05-09 10:14:56'),
(260, 'delete_parametre_applications', 'parametre_applications', '2022-05-09 10:14:56', '2022-05-09 10:14:56'),
(261, 'browse_reparations_externes', 'reparations_externes', '2022-05-10 13:55:37', '2022-05-10 13:55:37'),
(262, 'read_reparations_externes', 'reparations_externes', '2022-05-10 13:55:37', '2022-05-10 13:55:37'),
(263, 'edit_reparations_externes', 'reparations_externes', '2022-05-10 13:55:37', '2022-05-10 13:55:37'),
(264, 'add_reparations_externes', 'reparations_externes', '2022-05-10 13:55:37', '2022-05-10 13:55:37'),
(265, 'delete_reparations_externes', 'reparations_externes', '2022-05-10 13:55:37', '2022-05-10 13:55:37'),
(266, 'browse_dashboards', 'dashboards', '2022-05-19 20:17:56', '2022-05-19 20:17:56'),
(267, 'read_dashboards', 'dashboards', '2022-05-19 20:17:56', '2022-05-19 20:17:56'),
(268, 'edit_dashboards', 'dashboards', '2022-05-19 20:17:56', '2022-05-19 20:17:56'),
(269, 'add_dashboards', 'dashboards', '2022-05-19 20:17:56', '2022-05-19 20:17:56'),
(270, 'delete_dashboards', 'dashboards', '2022-05-19 20:17:56', '2022-05-19 20:17:56'),
(271, 'browse_myservices', 'myservices', '2022-05-20 23:40:15', '2022-05-20 23:40:15'),
(272, 'read_myservices', 'myservices', '2022-05-20 23:40:15', '2022-05-20 23:40:15'),
(273, 'edit_myservices', 'myservices', '2022-05-20 23:40:15', '2022-05-20 23:40:15'),
(274, 'add_myservices', 'myservices', '2022-05-20 23:40:15', '2022-05-20 23:40:15'),
(275, 'delete_myservices', 'myservices', '2022-05-20 23:40:15', '2022-05-20 23:40:15'),
(276, 'browse_reforms', 'reforms', '2022-06-01 21:40:31', '2022-06-01 21:40:31'),
(277, 'read_reforms', 'reforms', '2022-06-01 21:40:31', '2022-06-01 21:40:31'),
(278, 'edit_reforms', 'reforms', '2022-06-01 21:40:31', '2022-06-01 21:40:31'),
(279, 'add_reforms', 'reforms', '2022-06-01 21:40:31', '2022-06-01 21:40:31'),
(280, 'delete_reforms', 'reforms', '2022-06-01 21:40:31', '2022-06-01 21:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 7),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(71, 4),
(71, 6),
(71, 8),
(71, 9),
(72, 1),
(72, 4),
(72, 6),
(72, 8),
(72, 9),
(73, 1),
(73, 4),
(73, 6),
(73, 8),
(73, 9),
(74, 1),
(74, 4),
(74, 6),
(74, 8),
(74, 9),
(75, 1),
(75, 4),
(75, 6),
(75, 8),
(75, 9),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(226, 1),
(226, 2),
(226, 4),
(226, 6),
(226, 7),
(226, 8),
(226, 9),
(227, 1),
(227, 2),
(227, 4),
(227, 6),
(227, 7),
(227, 8),
(227, 9),
(228, 1),
(228, 4),
(228, 6),
(228, 7),
(228, 8),
(228, 9),
(229, 1),
(229, 4),
(229, 6),
(229, 7),
(229, 8),
(229, 9),
(230, 4),
(230, 6),
(230, 7),
(230, 8),
(230, 9),
(236, 1),
(237, 1),
(238, 1),
(241, 1),
(242, 1),
(245, 1),
(246, 1),
(246, 2),
(247, 1),
(247, 2),
(248, 1),
(249, 1),
(256, 1),
(257, 1),
(258, 1),
(259, 1),
(260, 1),
(261, 1),
(262, 1),
(263, 1),
(264, 1),
(265, 1),
(266, 1),
(266, 2),
(267, 1),
(267, 2),
(268, 1),
(268, 2),
(269, 1),
(269, 2),
(270, 1),
(270, 2),
(271, 1),
(272, 1),
(273, 1),
(274, 1),
(275, 1),
(276, 1),
(277, 1),
(278, 1),
(280, 1);

-- --------------------------------------------------------

--
-- Table structure for table `piece_de_rechanges`
--

CREATE TABLE `piece_de_rechanges` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categories` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modeles` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fournisseur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `piece_de_rechanges`
--

INSERT INTO `piece_de_rechanges` (`id`, `reference`, `created_at`, `updated_at`, `categories`, `modeles`, `fournisseur`, `description`) VALUES
(20, 'DL5ZM686', '2022-06-09 17:37:15', '2022-06-13 19:52:22', '14', '10', '6', 'CARTE SON TNB USB 5.1'),
(21, 'LM98NQ335', '2022-06-09 17:38:41', '2022-06-13 19:52:13', '12', '10', '5', 'Barrette Mémoire 4Go DDR4 2666 MHz'),
(22, '68SD570K3', '2022-06-09 17:41:39', '2022-06-13 19:51:59', '15', '8', '6', 'Carte reseau Gigabit D-LINK DGE-528T PCI');

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

CREATE TABLE `reclamations` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipement` int(11) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interventions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'En Attente',
  `etat` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT 'En Attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reclamations`
--

INSERT INTO `reclamations` (`id`, `equipement`, `service`, `user`, `created_at`, `updated_at`, `description`, `interventions`, `etat`) VALUES
(21, 19, 6, 6, '2022-06-12 13:40:42', '2022-06-12 13:43:44', 'probleme de fonctionnement', 'Hardware_sur_place', 'Terminé'),
(22, 20, 6, 6, '2022-06-12 14:19:38', '2022-06-21 18:52:00', 'hello', 'HardWare_Externe', 'Terminé'),
(23, 21, 7, 6, '2022-06-24 10:13:04', '2022-06-24 10:16:16', 'panne', 'SoftWare', 'Terminé');

-- --------------------------------------------------------

--
-- Table structure for table `reforms`
--

CREATE TABLE `reforms` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipement` int(11) DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Disponible',
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reforms`
--

INSERT INTO `reforms` (`id`, `equipement`, `etat`, `date`, `created_at`, `updated_at`) VALUES
(6, 24, 'Disponible', NULL, '2022-06-09 18:31:00', '2022-06-09 18:31:00'),
(7, 28, 'Vente à l\'enchère', '2022-06-21', '2022-06-21 18:50:04', '2022-06-21 18:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `reparations_externes`
--

CREATE TABLE `reparations_externes` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_de_demande` date DEFAULT NULL,
  `date_reparation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_equipement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `reparer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reparations_externes`
--

INSERT INTO `reparations_externes` (`id`, `date_de_demande`, `date_reparation`, `created_at`, `updated_at`, `id_equipement`, `Description`, `etat`, `reparer`) VALUES
(22, '2022-06-09', '2022-06-24', '2022-06-09 18:04:49', '2022-06-09 18:18:24', 'ML62DS54QN', 'Bloc d\'alimentation défectueux', 100, 0),
(24, '2022-06-13', '2022-06-27', '2022-06-13 20:03:14', '2022-06-13 20:03:14', 'AQWE65788', 'en cours', 25, 1),
(25, '2022-06-30', '2022-07-08', '2022-06-21 18:44:04', '2022-06-21 18:47:27', 'SK236KKLM', 'Bourage papier', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reparations_internes`
--

CREATE TABLE `reparations_internes` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_reparation` date DEFAULT NULL,
  `cout_reparation` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_equipement` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reparer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reparations_internes`
--

INSERT INTO `reparations_internes` (`id`, `date_reparation`, `cout_reparation`, `created_at`, `updated_at`, `id_equipement`, `description`, `reparer`) VALUES
(10, '2022-01-03', 0, '2022-06-09 18:01:10', '2022-06-09 18:01:10', 23, 'Augmentation de la mémoire RAM', 0),
(11, '2022-06-13', 30, '2022-06-10 18:08:29', '2022-06-13 19:53:50', 21, 'reparation sur place probleme de resclage', 0),
(12, '2022-06-24', 30, '2022-06-21 18:42:29', '2022-06-21 18:42:29', 28, 'probleme', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reparation_interne_piece_de_rechanges`
--

CREATE TABLE `reparation_interne_piece_de_rechanges` (
  `id` int(10) UNSIGNED NOT NULL,
  `reparations_interne_id` int(11) DEFAULT NULL,
  `piece_de_rechange_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reparation_interne_piece_de_rechanges`
--

INSERT INTO `reparation_interne_piece_de_rechanges` (`id`, `reparations_interne_id`, `piece_de_rechange_id`, `created_at`, `updated_at`) VALUES
(5, 10, 21, NULL, NULL),
(6, 11, 20, NULL, NULL),
(7, 12, 21, NULL, NULL),
(8, 12, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-03-01 20:53:24', '2022-03-01 20:53:24'),
(2, 'Directeur Generale', 'Directeur generale', '2022-03-01 20:53:24', '2022-04-24 21:02:29'),
(4, 'Responsable', 'Directeur', '2022-04-24 21:04:00', '2022-04-24 21:04:00'),
(6, 'Responsable sous directeur', 'sous directeur', '2022-04-24 21:05:15', '2022-04-24 21:05:15'),
(7, 'Responsable chef service', 'chef service', '2022-04-24 21:06:22', '2022-04-24 21:06:22'),
(8, 'Responsable ou chef unité', 'chef unité', '2022-04-24 21:07:19', '2022-06-13 15:48:29'),
(9, 'Surveillant general', 'Surveillant general', '2022-04-24 21:08:15', '2022-04-24 21:08:15'),
(10, 'Secretaire', 'Secretaire', '2022-04-24 21:08:46', '2022-04-24 21:08:46'),
(11, 'chef service', 'chef service', '2022-04-24 21:09:13', '2022-04-24 21:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `nom_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`nom_service`, `created_at`, `updated_at`, `id`, `type`, `number`) VALUES
('Service d\'endocrinologie, de diabète et de médecine interne', '2022-04-15 21:49:00', '2022-05-19 19:41:43', 3, NULL, NULL),
('Service de chirurgie générale', '2022-04-15 21:50:27', '2022-04-15 21:50:27', 4, NULL, NULL),
('Service de Néonatologie', '2022-04-15 21:50:50', '2022-04-15 21:50:50', 5, NULL, NULL),
('Service de pédiatrie', '2022-04-15 21:51:03', '2022-04-15 21:51:03', 6, NULL, NULL),
('Service de cardiologie', '2022-04-15 21:51:16', '2022-04-15 21:51:16', 7, NULL, NULL),
('Service de rhumatologie', '2022-04-15 21:51:34', '2022-04-15 21:51:34', 8, NULL, NULL),
('Service de réanimation medicale', '2022-04-15 21:51:47', '2022-04-15 21:51:47', 9, NULL, NULL),
('Service d\'anesthésie et de réanimation', '2022-04-15 21:52:02', '2022-04-15 21:52:02', 10, NULL, NULL),
('Service de gynécologie et d\'obstétrique', '2022-04-15 21:52:17', '2022-04-15 21:52:17', 11, NULL, NULL),
('Service ORL', '2022-04-15 21:52:36', '2022-04-15 21:52:36', 12, NULL, NULL),
('Service d\'Orthopédie', '2022-04-15 21:52:53', '2022-04-15 21:52:53', 13, NULL, NULL),
('Service de Psychiatrie', '2022-04-15 21:53:06', '2022-04-15 21:53:06', 14, NULL, NULL),
('Service de Pneumologie', '2022-04-15 21:53:19', '2022-04-15 21:53:19', 15, NULL, NULL),
('Service d\'hémodialyse', '2022-04-15 21:55:24', '2022-04-15 21:55:24', 16, NULL, NULL),
('Service d\'Ophtalmologie', '2022-04-15 22:04:50', '2022-04-15 22:04:50', 17, NULL, NULL),
('Service d\'urologie', '2022-04-15 22:05:00', '2022-04-15 22:05:00', 18, NULL, NULL),
('Service de médecine d\'urgence', '2022-04-15 22:05:11', '2022-04-15 22:05:11', 19, NULL, NULL),
('Service de médecine du travail et des maladies professionnelles', '2022-04-15 22:05:21', '2022-04-15 22:05:21', 20, NULL, NULL),
('Service de médecine physique et de réadaptation au travail', '2022-04-15 22:05:33', '2022-04-15 22:05:33', 21, NULL, NULL),
('Service de médecine légale', '2022-04-15 22:05:47', '2022-04-15 22:05:47', 22, NULL, NULL),
('Service de neurologie', '2022-04-15 22:06:00', '2022-04-15 22:06:00', 23, NULL, NULL),
('Service de maxillo-facial', '2022-04-15 22:06:21', '2022-04-15 22:06:21', 24, NULL, NULL),
('Service de biologie médicale (Laboratoire)', '2022-04-15 22:06:34', '2022-04-15 22:06:34', 25, NULL, NULL),
('Service de bactériologie (microbiologie)', '2022-04-15 22:06:45', '2022-04-15 22:06:45', 26, NULL, NULL),
('Service de pharmacie', '2022-04-15 22:06:56', '2022-04-15 22:06:56', 27, NULL, NULL),
('Service de consultations externes', '2022-04-15 22:07:22', '2022-04-15 22:07:22', 29, NULL, NULL),
('Service de médecine Dentaire', '2022-04-15 22:07:35', '2022-04-15 22:07:35', 30, NULL, NULL),
('Service de médecine communautaire et préventive', '2022-04-15 22:07:47', '2022-04-15 22:07:47', 31, NULL, NULL),
('Service de radiologie', '2022-06-11 18:30:59', '2022-06-13 20:05:19', 32, 'Hospitalier', 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Parc Informatique', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\May2022\\jNS6a9C141haEAck4vjj.jpg', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\May2022\\R5A438o0JF5Bch1BUeVf.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Parc Informatique', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Espace Admin', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', 'settings\\March2022\\UDTwSZowC9hT2ak97huw.png', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\March2022\\KZ4JCN544Ch03HdC1X6M.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-03-01 20:53:33', '2022-03-01 20:53:33'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-03-01 20:53:34', '2022-03-01 20:53:34'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-03-01 20:53:34', '2022-03-01 20:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `type_pannes`
--

CREATE TABLE `type_pannes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_panne` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cat_panne` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `id_service`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users\\March2022\\ygWqK6x3FXex1DPrWfFB.jpg', NULL, '$2y$10$7rzY0r1CPMp0Edzv9uwmRug00VLT/yn5QufvH55/VTRLSsROaYtGS', 'IMPxrxhiogiKMoop4s2rzdMzWRC1FbJXmikkgjuknUwL2yPN5pA0hHikEAqU', '{\"locale\":\"en\"}', '2022-03-01 20:53:30', '2022-05-27 19:57:58', 1),
(6, 2, 'Chaima Nasr', 'chaima.nasr@gmail.com', 'users\\March2022\\c0KRVuhApOkBo0rNwk6J.jpg', NULL, '$2y$10$aW2ry6IomwQT2rLybB.X0u2TzBJWTxet5T2asMknZnJI.HHR8VCy6', NULL, '{\"locale\":\"en\"}', '2022-03-06 19:08:19', '2022-06-13 12:21:07', 7),
(7, 2, 'technicien1', 'tech@tech.com', 'users/default.png', NULL, '$2y$10$M4ueRywIElltN5dAy1rV8e4mxercvKH64yknqF/mWGP5OI/T537ye', NULL, '{\"locale\":\"en\"}', '2022-03-17 19:18:07', '2022-06-12 13:38:20', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_equipements`
--

CREATE TABLE `user_equipements` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipement_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(7, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonde_commandes`
--
ALTER TABLE `bonde_commandes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bonde_commandes_reference_unique` (`reference`);

--
-- Indexes for table `bonde_livraisons`
--
ALTER TABLE `bonde_livraisons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bonde_livraisons_reference_unique` (`reference`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `demande_achats`
--
ALTER TABLE `demande_achats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bon_de_livraisons`
--
ALTER TABLE `detail_bon_de_livraisons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_factures`
--
ALTER TABLE `detail_factures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devis_ref_devis_unique` (`reference`);

--
-- Indexes for table `equipements`
--
ALTER TABLE `equipements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipement_bondecommandes`
--
ALTER TABLE `equipement_bondecommandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipement_devis`
--
ALTER TABLE `equipement_devis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipement_fiche_sorties`
--
ALTER TABLE `equipement_fiche_sorties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `factures_reference_unique` (`reference`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiche_sorties`
--
ALTER TABLE `fiche_sorties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_histories`
--
ALTER TABLE `model_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_histories_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `myservices`
--
ALTER TABLE `myservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pannes`
--
ALTER TABLE `pannes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parametre_applications`
--
ALTER TABLE `parametre_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `piece_de_rechanges`
--
ALTER TABLE `piece_de_rechanges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `piece_de_rechanges_reference_unique` (`reference`);

--
-- Indexes for table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reforms`
--
ALTER TABLE `reforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reparations_externes`
--
ALTER TABLE `reparations_externes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reparations_internes`
--
ALTER TABLE `reparations_internes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reparation_interne_piece_de_rechanges`
--
ALTER TABLE `reparation_interne_piece_de_rechanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `type_pannes`
--
ALTER TABLE `type_pannes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_equipements`
--
ALTER TABLE `user_equipements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bonde_commandes`
--
ALTER TABLE `bonde_commandes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bonde_livraisons`
--
ALTER TABLE `bonde_livraisons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `demande_achats`
--
ALTER TABLE `demande_achats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_bon_de_livraisons`
--
ALTER TABLE `detail_bon_de_livraisons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_factures`
--
ALTER TABLE `detail_factures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `equipements`
--
ALTER TABLE `equipements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `equipement_bondecommandes`
--
ALTER TABLE `equipement_bondecommandes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `equipement_devis`
--
ALTER TABLE `equipement_devis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `equipement_fiche_sorties`
--
ALTER TABLE `equipement_fiche_sorties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fiche_sorties`
--
ALTER TABLE `fiche_sorties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `model_histories`
--
ALTER TABLE `model_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `myservices`
--
ALTER TABLE `myservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pannes`
--
ALTER TABLE `pannes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parametre_applications`
--
ALTER TABLE `parametre_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `piece_de_rechanges`
--
ALTER TABLE `piece_de_rechanges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reforms`
--
ALTER TABLE `reforms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reparations_externes`
--
ALTER TABLE `reparations_externes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reparations_internes`
--
ALTER TABLE `reparations_internes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reparation_interne_piece_de_rechanges`
--
ALTER TABLE `reparation_interne_piece_de_rechanges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `type_pannes`
--
ALTER TABLE `type_pannes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_equipements`
--
ALTER TABLE `user_equipements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
