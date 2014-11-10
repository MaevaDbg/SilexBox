-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 09 Novembre 2014 à 18:54
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
  `excerpt` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_push` tinyint(1) DEFAULT NULL,
  `home_push_order` int(11) DEFAULT NULL,
  `lang` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CD8737FA989D9B62` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `excerpt`, `image`, `content`, `date_creation`, `date_publication`, `date_update`, `status`, `video`, `home_push`, `home_push_order`, `lang`, `slug`) VALUES
(1, 'Titre fr', 'Chapeau', 'image.jpg', 'contenu', '2014-11-07 10:42:30', '2014-11-09 00:00:00', NULL, 1, 'video', 0, NULL, 'fr', 'titre-fr'),
(3, 'Title en', 'Chapeau', 'image.jpg', '<p>my content</p>\r\n<a href="google.com">Link</a>', '2014-11-09 10:33:50', '2014-11-09 00:00:00', NULL, 1, NULL, 0, NULL, 'en', 'title-en'),
(4, 'Titre preprod fr', 'Chapeau', 'image.jpg', 'Contenu', '2014-11-09 10:35:46', '2014-11-09 00:00:00', NULL, 1, NULL, 0, NULL, 'fr', 'titre-preprod-fr'),
(5, 'Title preprod en', 'chapeau', 'image.jpg', 'content', '2014-11-09 10:36:27', '2014-11-09 00:00:00', NULL, 1, NULL, 0, NULL, 'en', 'title-preprod-en'),
(6, 'Titre prod fr', 'chapeau', NULL, 'Contenu', '2014-11-09 10:37:07', '2014-11-09 00:00:00', NULL, 2, NULL, 1, NULL, 'fr', 'titre-prod-fr'),
(7, 'Titre prod en', 'chapeau', 'image.jpg', 'content', '2014-11-09 10:37:47', '2014-11-09 00:00:00', NULL, 2, NULL, 1, NULL, 'en', 'titre-pro-en'),
(10, 'Mon titre', 'chapeau', 'image.jpg', 'contenu', '2014-11-09 15:45:34', '2014-11-09 00:00:00', NULL, 1, NULL, 0, NULL, 'fr', 'titre-fr-2'),
(11, 'David Bowie is : câ€™est parti !', 'Hier avait lieu le vernissage de lâ€™exposition David Bowie is : dÃ©couvrez les premiÃ¨res images en exclusivitÃ©', 'cats-640x480-1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris elit mi, commodo sit amet nulla a, malesuada gravida nulla. Nullam scelerisque dui sed tellus condimentum, a dignissim sapien viverra. Vestibulum a commodo augue. Nulla malesuada cursus imperdiet. Cras venenatis, dolor sed gravida lacinia, mi ipsum sollicitudin nunc, ut iaculis mauris augue ac ante. Nulla facilisi. Fusce et interdum massa. Morbi quis luctus dolor. Nulla auctor lorem magna, eu convallis tortor posuere vitae. Phasellus leo eros, sagittis vitae sapien quis, sagittis posuere ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nSuspendisse bibendum arcu et tincidunt interdum. In vehicula neque erat, eu imperdiet diam condimentum id. Vivamus id urna aliquet, pretium libero non, tempus justo. Cras lorem lorem, faucibus nec dolor in, semper condimentum augue. Aenean fermentum eget mauris non imperdiet. Curabitur imperdiet vel ante nec rutrum. Vestibulum non luctus odio. Cras tincidunt condimentum tortor ac pulvinar. Maecenas ornare elementum placerat. Fusce metus magna, molestie nec lorem at, tempus convallis elit. Donec neque nunc, bibendum ut nunc vitae, dignissim blandit est. Donec vel convallis odio. Proin viverra quis sapien sed consequat. Pellentesque ullamcorper consectetur finibus. Morbi dignissim porttitor porttitor.', '2014-11-09 17:24:47', '2014-11-09 00:00:00', NULL, 2, NULL, 1, NULL, 'fr', 'david-bowie-is-c-est-parti'),
(12, 'Lâ€™accrochage de lâ€™exposition', 'Lâ€™accrochage de lâ€™exposition a commencÃ© ! DÃ©couvrez les premiers costumes et les premiÃ¨res images de la Galerie dâ€™exposition de la Philharmonie de Paris.', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris elit mi, commodo sit amet nulla a, malesuada gravida nulla. Nullam scelerisque dui sed tellus condimentum, a dignissim sapien viverra. Vestibulum a commodo augue. Nulla malesuada cursus imperdiet. Cras venenatis, dolor sed gravida lacinia, mi ipsum sollicitudin nunc, ut iaculis mauris augue ac ante. Nulla facilisi. Fusce et interdum massa. Morbi quis luctus dolor. Nulla auctor lorem magna, eu convallis tortor posuere vitae. Phasellus leo eros, sagittis vitae sapien quis, sagittis posuere ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nSuspendisse bibendum arcu et tincidunt interdum. In vehicula neque erat, eu imperdiet diam condimentum id. Vivamus id urna aliquet, pretium libero non, tempus justo. Cras lorem lorem, faucibus nec dolor in, semper condimentum augue. Aenean fermentum eget mauris non imperdiet. Curabitur imperdiet vel ante nec rutrum. Vestibulum non luctus odio. Cras tincidunt condimentum tortor ac pulvinar. Maecenas ornare elementum placerat. Fusce metus magna, molestie nec lorem at, tempus convallis elit. Donec neque nunc, bibendum ut nunc vitae, dignissim blandit est. Donec vel convallis odio. Proin viverra quis sapien sed consequat. Pellentesque ullamcorper consectetur finibus. Morbi dignissim porttitor porttitor.', '2014-11-09 17:47:24', '2014-11-04 00:00:00', NULL, 2, 'video-accrochage', 1, NULL, 'fr', 'accrochage-exposition'),
(13, 'Ouverture de la prÃ©vente des billets !', 'Depuis 11h, la prÃ©vente des billets est ouverte !\r\nRendez-vous sur la page billetterie pour rÃ©server.', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris elit mi, commodo sit amet nulla a, malesuada gravida nulla. Nullam scelerisque dui sed tellus condimentum, a dignissim sapien viverra. Vestibulum a commodo augue. Nulla malesuada cursus imperdiet. Cras venenatis, dolor sed gravida lacinia, mi ipsum sollicitudin nunc, ut iaculis mauris augue ac ante. Nulla facilisi. Fusce et interdum massa. Morbi quis luctus dolor. Nulla auctor lorem magna, eu convallis tortor posuere vitae. Phasellus leo eros, sagittis vitae sapien quis, sagittis posuere ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nSuspendisse bibendum arcu et tincidunt interdum. In vehicula neque erat, eu imperdiet diam condimentum id. Vivamus id urna aliquet, pretium libero non, tempus justo. Cras lorem lorem, faucibus nec dolor in, semper condimentum augue. Aenean fermentum eget mauris non imperdiet. Curabitur imperdiet vel ante nec rutrum. Vestibulum non luctus odio. Cras tincidunt condimentum tortor ac pulvinar. Maecenas ornare elementum placerat. Fusce metus magna, molestie nec lorem at, tempus convallis elit. Donec neque nunc, bibendum ut nunc vitae, dignissim blandit est. Donec vel convallis odio. Proin viverra quis sapien sed consequat. Pellentesque ullamcorper consectetur finibus. Morbi dignissim porttitor porttitor.', '2014-11-09 17:49:30', '2014-11-01 00:00:00', NULL, 2, NULL, 1, NULL, 'fr', 'ouverture-prevente-des-billets');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
