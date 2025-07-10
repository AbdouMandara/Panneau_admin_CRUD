-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 juil. 2025 à 15:24
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_des_utilisateurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` bigint NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`(250))
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`user_id`, `user_email`, `user_name`, `user_password`) VALUES
(1, 'abdou@gmail.com', 'Abdou', '$2y$10$M4rLztG8siOo066dl1xYY.uhuH4vnEp6wM0D/l0jSx4AonGnYkhO.'),
(2, 'tonton@gmail.com', 'tonton merlin', '$2y$10$XpxdHuXZyc5tLy0tgQo4XehJsV26ezL99Oahq.IqVp5Vi8GA1dEKO'),
(3, 'papa@gmail.com', 'papa', '$2y$10$OQwI97cuEQSq0Awo.046Zu1JrlqtlhRiOM1OL/fFYX82GfrWOPQbe'),
(4, 'test@gmail.com', 'koro', '$2y$10$zmm2E541JCdaqYV6ADAF4.cLPx.qTNtNJeOM3UXLHQnaLedhYjYJq'),
(5, 'abdoumandara@gmail.com', 'abdou', '$2y$10$MaT5blFktp1BCtIOx/.qNuSeD8kT1u3r1jSqVeN3.sD68.aEXc3cC'),
(6, 'lulu@gmail.com', 'lulu', '$2y$10$LOmptbIoLAf2pMxet0aHQOG4DxSCypIBm0DAJg5rUyUvtC0hNCAr2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom_user`, `email`) VALUES
(12, 'papa', 'papa@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
