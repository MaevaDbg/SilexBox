-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 10 Décembre 2014 à 14:14
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `testsilex`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_push` tinyint(1) DEFAULT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `excerpt`, `image`, `date_creation`, `date_publication`, `date_update`, `status`, `video`, `home_push`, `lang`, `slug`, `image_video`) VALUES
(1, 'Titre article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius iaculis ex, eget semper nisi congue et. Proin enim mi, efficitur at tellus sit amet, semper convallis neque. Quisque posuere ex mattis elit aliquam fermentum. Duis auctor lacus sed diam porta pharetra. Vivamus commodo felis in tortor egestas, ut sodales magna scelerisque. Quisque rhoncus, ligula eu auctor tempor, lectus massa bibendum sem, et congue mauris libero ut lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. In in laoreet urna. Vivamus pharetra finibus orci id fringilla. Duis scelerisque nisl neque, a lobortis dui consequat quis. Aenean blandit a ligula ac luctus.\r\n\r\nMaecenas id malesuada purus, vehicula vulputate ante. Donec facilisis ac sem porta tincidunt. Vivamus tincidunt ipsum eu augue fermentum luctus. Nunc bibendum arcu non neque condimentum, ut faucibus lacus accumsan. Aenean cursus purus nisi, elementum posuere mi laoreet ut. Cras commodo nunc in leo pellentesque, ac eleifend enim pulvinar. Aliquam erat volutpat. Maecenas consectetur erat non nibh aliquet, vel volutpat leo placerat. Donec laoreet lacus eros, quis cursus est tempor vel. Aliquam porttitor, tortor eu luctus auctor, libero tellus pretium quam, sed tincidunt purus elit sit amet lorem. Fusce tristique pulvinar consequat. Suspendisse pellentesque lorem nec diam dignissim, interdum congue nisl varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius iaculis ex, eget semper nisi congue et. Proin enim mi, efficitur at tellus sit amet, semper convallis neque.', 'cats-640x480-1.jpg', '2014-12-10 13:49:56', '2014-12-10 00:00:00', NULL, 2, NULL, 0, 'fr', 'titre-article', NULL),
(2, 'Article title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius iaculis ex, eget semper nisi congue et. Proin enim mi, efficitur at tellus sit amet, semper convallis neque. Quisque posuere ex mattis elit aliquam fermentum. Duis auctor lacus sed diam porta pharetra. Vivamus commodo felis in tortor egestas, ut sodales magna scelerisque. Quisque rhoncus, ligula eu auctor tempor, lectus massa bibendum sem, et congue mauris libero ut lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. In in laoreet urna. Vivamus pharetra finibus orci id fringilla. Duis scelerisque nisl neque, a lobortis dui consequat quis. Aenean blandit a ligula ac luctus.\r\n\r\nMaecenas id malesuada purus, vehicula vulputate ante. Donec facilisis ac sem porta tincidunt. Vivamus tincidunt ipsum eu augue fermentum luctus. Nunc bibendum arcu non neque condimentum, ut faucibus lacus accumsan. Aenean cursus purus nisi, elementum posuere mi laoreet ut. Cras commodo nunc in leo pellentesque, ac eleifend enim pulvinar. Aliquam erat volutpat. Maecenas consectetur erat non nibh aliquet, vel volutpat leo placerat. Donec laoreet lacus eros, quis cursus est tempor vel. Aliquam porttitor, tortor eu luctus auctor, libero tellus pretium quam, sed tincidunt purus elit sit amet lorem. Fusce tristique pulvinar consequat. Suspendisse pellentesque lorem nec diam dignissim, interdum congue nisl varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius iaculis ex, eget semper nisi congue et. Proin enim mi, efficitur at tellus sit amet, semper convallis neque.', 'cats-640x480-1.jpg', '2014-12-10 13:49:56', '2014-12-10 00:00:00', NULL, 2, NULL, 0, 'en', 'article-title', NULL),
(3, 'Article 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius iaculis ex, eget semper nisi congue et. Proin enim mi, efficitur at tellus sit amet, semper convallis neque. Quisque posuere ex mattis elit aliquam fermentum. Duis auctor lacus sed diam porta pharetra. Vivamus commodo felis in tortor egestas, ut sodales magna scelerisque. Quisque rhoncus, ligula eu auctor tempor, lectus massa bibendum sem, et congue mauris libero ut lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. In in laoreet urna. Vivamus pharetra finibus orci id fringilla. Duis scelerisque nisl neque, a lobortis dui consequat quis. Aenean blandit a ligula ac luctus.\r\n\r\nMaecenas id malesuada purus, vehicula vulputate ante. Donec facilisis ac sem porta tincidunt. Vivamus tincidunt ipsum eu augue fermentum luctus. Nunc bibendum arcu non neque condimentum, ut faucibus lacus accumsan. Aenean cursus purus nisi, elementum posuere mi laoreet ut. Cras commodo nunc in leo pellentesque, ac eleifend enim pulvinar. Aliquam erat volutpat. Maecenas consectetur erat non nibh aliquet, vel volutpat leo placerat. Donec laoreet lacus eros, quis cursus est tempor vel. Aliquam porttitor, tortor eu luctus auctor, libero tellus pretium quam, sed tincidunt purus elit sit amet lorem. Fusce tristique pulvinar consequat. Suspendisse pellentesque lorem nec diam dignissim, interdum congue nisl varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius iaculis ex, eget semper nisi congue et. Proin enim mi, efficitur at tellus sit amet, semper convallis neque.', 'cats-640x480-2.jpg', '2014-12-10 13:49:56', '2014-12-05 00:00:00', NULL, 2, NULL, 0, 'fr', 'article-2', NULL),
(4, 'Article mis en avant', 'Sed dignissim vel mauris in pretium. Proin neque ex, bibendum eu tellus sed, dapibus dictum ante. Aenean quis tristique mi. Ut rutrum metus id tempus dictum. Nulla luctus ante sit amet dolor pretium auctor. Duis vel elit nisi. Quisque porttitor enim vel massa euismod maximus. Donec neque ex, pretium ut sapien ac, laoreet volutpat enim. Nulla ut elementum mauris. Nulla facilisi. Proin at velit at nunc varius cursus. Nunc viverra semper nulla, eu lacinia augue efficitur ut.\r\n\r\nPraesent blandit tortor molestie turpis elementum, a efficitur purus venenatis. Proin ut ex id leo gravida scelerisque. Praesent vel arcu in risus sagittis molestie. Phasellus facilisis a eros ut posuere. Proin eleifend lacus consectetur lorem fermentum, in congue libero accumsan. Pellentesque sit amet augue congue, venenatis urna in, luctus turpis. Mauris interdum blandit libero ac facilisis. Phasellus ligula diam, eleifend eget ex et, volutpat suscipit quam. Morbi vitae metus suscipit ligula vestibulum imperdiet a quis mauris.', 'Sed dignissim vel mauris in pretium. Proin neque ex, bibendum eu tellus sed, dapibus dictum ante. Aenean quis tristique mi. Ut rutrum metus id tempus dictum.', 'cats-640x480-2.jpg', '2014-12-10 13:59:07', '2014-12-12 00:00:00', NULL, 2, NULL, 1, 'fr', 'article-mea', NULL),
(5, 'Article highlighted', 'Sed dignissim vel mauris in pretium. Proin neque ex, bibendum eu tellus sed, dapibus dictum ante. Aenean quis tristique mi. Ut rutrum metus id tempus dictum. Nulla luctus ante sit amet dolor pretium auctor. Duis vel elit nisi. Quisque porttitor enim vel massa euismod maximus. Donec neque ex, pretium ut sapien ac, laoreet volutpat enim. Nulla ut elementum mauris. Nulla facilisi. Proin at velit at nunc varius cursus. Nunc viverra semper nulla, eu lacinia augue efficitur ut.\r\n\r\nPraesent blandit tortor molestie turpis elementum, a efficitur purus venenatis. Proin ut ex id leo gravida scelerisque. Praesent vel arcu in risus sagittis molestie. Phasellus facilisis a eros ut posuere. Proin eleifend lacus consectetur lorem fermentum, in congue libero accumsan. Pellentesque sit amet augue congue, venenatis urna in, luctus turpis. Mauris interdum blandit libero ac facilisis. Phasellus ligula diam, eleifend eget ex et, volutpat suscipit quam. Morbi vitae metus suscipit ligula vestibulum imperdiet a quis mauris.', 'Sed dignissim vel mauris in pretium. Proin neque ex, bibendum eu tellus sed, dapibus dictum ante. Aenean quis tristique mi. Ut rutrum metus id tempus dictum.', 'cats-640x480-2.jpg', '2014-12-10 13:59:07', '2014-12-10 00:00:00', NULL, 2, NULL, 1, 'en', 'article-highlighted', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
