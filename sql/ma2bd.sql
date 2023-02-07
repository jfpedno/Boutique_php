-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 nov. 2022 à 04:49
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ma2bd`
--
CREATE DATABASE IF NOT EXISTS `ma2bd` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `ma2bd`;

-- --------------------------------------------------------

--
-- Structure de la table `librairie`
--

DROP TABLE IF EXISTS `librairie`;
CREATE TABLE IF NOT EXISTS `librairie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(50) CHARACTER SET utf16 DEFAULT NULL,
  `annee` int(4) DEFAULT NULL,
  `auteur` varchar(50) CHARACTER SET utf16 DEFAULT NULL,
  `annee_edition` int(4) DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf16 DEFAULT NULL,
  `edition` varchar(50) CHARACTER SET utf16 DEFAULT NULL,
  `format` varchar(50) CHARACTER SET utf16 DEFAULT NULL,
  `illustration` varchar(100) CHARACTER SET utf16 DEFAULT NULL,
  `image` varchar(250) CHARACTER SET utf16 DEFAULT NULL,
  `periodicite` varchar(50) CHARACTER SET utf16 DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `redacteur_chef` varchar(50) CHARACTER SET utf16 DEFAULT NULL,
  `titre` varchar(100) CHARACTER SET utf16 DEFAULT NULL,
  `numero` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `librairie`
--

INSERT IGNORE INTO `librairie` (`id`, `produit`, `annee`, `auteur`, `annee_edition`, `code`, `edition`, `format`, `illustration`, `image`, `periodicite`, `prix`, `redacteur_chef`, `titre`, `numero`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'essai', NULL, 'Arnold Toynbee', 1994, 'essai_arnold_toynbee_1', 'Payot et Rivages', 'Livre de poche', NULL, 'livres-images/la_grande_aventure_de_l_humanite', NULL, 30, NULL, 'La grande aventure de l\'humanite', NULL),
(3, 'bande_dessinee', NULL, 'Jim Davis', 2022, 'bande_dessinees_garfield_1', 'Presse aventure', '8 1/2 X 11', 'Jim Davis', 'livres-images/garfield_poids_lourd_30', NULL, 20, NULL, 'Poids lourd #30', NULL),
(5, 'bande_dessinee', NULL, 'Rene Goscinny', 2022, 'bande_dessinees_asterix_1', 'Les editions de luxe', '8 1/2 X 11', 'Albert Uderzo', 'livres-images/asterix_asterix_le_gaulois', NULL, 15, NULL, 'Asterix le Gaulois', NULL),
(8, 'essai', NULL, 'Henri Laborit', 1976, 'essai_henri_laborit_1', 'Robert Lafont', 'Livre de poche', NULL, 'livres-images/eloge_de_la_fuite', NULL, 20, NULL, 'Eloge de la fuite', NULL),
(9, 'jeunesse', NULL, 'Elise Gravel', 2016, 'jeunesse_elise_gravel_1', 'Courte Echelle', '8 1/2 X 11', 'Elise Gravel', 'livres-images/une_patate_a_velo', NULL, 15, NULL, 'Une patate a velo', NULL),
(10, 'jeunesse', NULL, 'Claudia Larochelle', 2016, 'jeunesse_claudia_larochelle_1', 'Editions de la bagnole', '8 1/2 X 11', 'Maria Chiodi', 'livres-images/la_doudou_qui_ne_sentait_pas_bon', NULL, 18, NULL, 'La doudou qui ne sentait pas bon', NULL),
(11, 'revue', 2001, NULL, NULL, 'the_wire_2001_1', NULL, 'Papier glace', NULL, 'livres-images/the_wire_no_1_2022', 'Mensuel', 12, 'Tony Herrington', 'The wire', 'Numero 1'),
(12, 'revue', 2022, NULL, NULL, 'modern_drummer_2022_1', NULL, 'Papier glace', NULL, 'livres-images/modern_drummer', 'Mensuel', 15, 'David Frangioni', 'Modern drummer', 'Numero 1'),
(13, 'roman', NULL, 'Amelie Nothomb', 1999, 'roman_amelie_nothomb_1', 'Albin michel', 'Livre de poche', NULL, 'livres-images/stupeur_et_tremblements', NULL, 10, NULL, 'Stupeur et tremblements', NULL),
(14, 'roman', NULL, 'Hermann Hesse ', 2008, 'roman_hermann_hesse_1', 'Le livre de poche', 'Livre de poche', NULL, 'livres-images/le_loup_des_steppes', NULL, 10, NULL, 'Le loup des steppes', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf16 NOT NULL,
  `password` varchar(50) CHARACTER SET utf16 NOT NULL,
  `date_inscription` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT IGNORE INTO `utilisateurs` (`id`, `username`, `password`, `date_inscription`) VALUES
(1, 'jfpedno', '03966Pedz', '2022-10-22 08:55:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
