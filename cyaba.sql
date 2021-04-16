-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 15 avr. 2021 à 17:53
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cyaba`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`ID`, `username`, `password`) VALUES
(1, 'stabien', 'stabien'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `nom_cb` varchar(255) NOT NULL,
  `num_cb` varchar(16) NOT NULL,
  `expiration_cb` varchar(10) NOT NULL,
  `cvv_cb` varchar(3) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_user`, `adresse`, `ville`, `code_postal`, `telephone`, `nom_cb`, `num_cb`, `expiration_cb`, `cvv_cb`) VALUES
('Yz5bNkcBcyHhoNS', 12, '10 avenue de meudon', 'Paris ', '75000', '0612345678', 'Jean dupont', '1234567898765432', '01/02', '123'),
('aODgoJuH7QUIGqG', 12, '10 av de meudon', 'Paris', '75000', '0612345665', 'Jean dupont', '1234567898765432', '01/02', '123'),
('kqVwgEeI7uAbuVM', 12, '10 av meudon', 'Paris', '75000', '0760753274', 'Jean dupont', '0213198237981739', '01/02', '123'),
('agSg9KSCyq5R1X9', 12, '10 av meudon', 'Paris', '75000', '2348339289', 'Jean dupont', '0213198237981739', '01/02', '123'),
('hVgmVYDnTsE1kta', 12, 'iezfuhuihz', 'izefufhuiez', '75000', '0674328738', 'ZEIHEUHFZI', '8237489327539857', '01/20', '123'),
('FZ1Pl8pPdxvuuOr', 29, '10 avenue de meudon', 'paris', '75007', '0612345678', 'Jean Dupont', '1111222233334444', '09/21', '123');

-- --------------------------------------------------------

--
-- Structure de la table `commande_produits`
--

DROP TABLE IF EXISTS `commande_produits`;
CREATE TABLE IF NOT EXISTS `commande_produits` (
  `id_commande` varchar(255) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande_produits`
--

INSERT INTO `commande_produits` (`id_commande`, `id_produit`) VALUES
('Yz5bNkcBcyHhoNS', 60),
('aODgoJuH7QUIGqG', 60),
('agSg9KSCyq5R1X9', 12),
('kqVwgEeI7uAbuVM', 12),
('hVgmVYDnTsE1kta', 60),
('FZ1Pl8pPdxvuuOr', 60),
('FZ1Pl8pPdxvuuOr', 4),
('FZ1Pl8pPdxvuuOr', 35),
('FZ1Pl8pPdxvuuOr', 60);

-- --------------------------------------------------------

--
-- Structure de la table `depot_produits`
--

DROP TABLE IF EXISTS `depot_produits`;
CREATE TABLE IF NOT EXISTS `depot_produits` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `rayon` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `attribut` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `images_2` varchar(255) NOT NULL,
  `images_3` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `depot_produits`
--

INSERT INTO `depot_produits` (`ID`, `nom`, `prix`, `rayon`, `categorie`, `attribut`, `marque`, `images`, `images_2`, `images_3`) VALUES
(5, 'Canon EOS 2000D', '449.95', 'Audiovisuel', 'Photo', 'Reflex', 'Canon', 'css/images/av_photo_reflex_canon_1.jpg', 'css/images/av_photo_reflex_canon_2.jpg', 'css/images/av_photo_objectif_canon_1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_produit`, `id`) VALUES
(28, 60, 41),
(28, 60, 40);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prix` float(11,2) NOT NULL,
  `rayon` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `attribut` varchar(100) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `promo` int(11) DEFAULT '0',
  `images` varchar(300) NOT NULL,
  `images_2` varchar(50) NOT NULL,
  `images_3` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `rayon`, `categorie`, `attribut`, `marque`, `promo`, `images`, `images_2`, `images_3`) VALUES
(1, 'Canon EOS 2000D', 449.95, 'Audiovisuel', 'Photo', 'Reflex', 'Canon', 0, 'css/images/av_photo_reflex_canon_1.jpg', 'css/images/av_photo_reflex_canon_2.jpg', 'css/images/av_photo_objectif_canon_1.jpg'),
(2, 'Canon EOS 250D ', 549.95, 'Audiovisuel', 'Photo', 'Reflex', 'Canon', 0, 'css/images/av_photo_reflex_canon_2.jpg', '', ''),
(3, 'Nikon D500', 1749.95, 'Audiovisuel', 'Photo', 'Reflex', 'Nikon', 0, 'css/images/av_photo_reflex_nikon_1.jpg', '', ''),
(4, 'Nikon D780', 2599.95, 'Audiovisuel', 'Photo', 'Reflex', 'Nikon', 0, 'css/images/av_photo_reflex_nikon_2.jpg', '', ''),
(7, 'Canon IXUS 185', 99.95, 'Audiovisuel', 'Photo', 'Compact', 'Canon', 0, 'css/images/av_photo_compact_canon_1.jpg', '', ''),
(5, 'Pentax K-1 Mark II', 1999.95, 'Audiovisuel', 'Photo', 'Reflex', 'Pentak', 0, 'css/images/av_photo_reflex_Pentax_1.jpg', '', ''),
(8, 'Canon IXUS 285 HS ', 199.95, 'Audiovisuel', 'Photo', 'Compact', 'Canon', 0, 'css/images/av_photo_compact_canon_2.jpg', '', ''),
(9, 'Nikon Coolpix A1000 ', 349.95, 'Audiovisuel', 'Photo', 'Compact', 'Nikon', 0, 'css/images/av_photo_compact_nikon_1.jpg', '', ''),
(10, 'Sony Cyber-shot DSC-HX400V', 379.95, 'Audiovisuel', 'Photo', 'Compact', 'Sony', 0, 'css/images/av_photo_compact_sony_1.jpg', '', ''),
(11, 'Sony Cyber-shot DSC-W830', 79.95, 'Audiovisuel', 'Photo', 'Compact', 'Sony', 0, 'css/images/av_photo_compact_sony_2.jpg', '', ''),
(12, 'Canon EF 100 mm f/2,8L IS USM', 899.95, 'Audiovisuel', 'Photo', 'Objectif', 'Canon', 0, 'css/images/av_photo_objectif_canon_1.jpg', '', ''),
(13, 'Canon EF-M 55-200 mm f/4.5-6.3 IS STM', 299.95, 'Audiovisuel', 'Photo', 'Objectif', 'Canon', 0, 'css/images/av_photo_objectif_canon_2.jpg', '', ''),
(14, 'Panasonic Lumix H-ES045E', 699.95, 'Audiovisuel', 'Photo', 'Objectif', 'Panasonic', 0, 'css/images/av_photo_objectif_panasonic_1.jpg', '', ''),
(15, 'Nikon AF-S NIKKOR 50 mm f/1.8G', 229.95, 'Audiovisuel', 'Photo', 'Objectif', 'Nikon', 0, 'css/images/av_photo_objectif_nikon_1.jpg', '', ''),
(16, 'Nikon NIKKOR Z 14-30 mm f/4 S', 1349.95, 'Audiovisuel', 'Photo', 'Objectif', 'Nikon', 0, 'css/images/av_photo_objectif_nikon_2.jpg', '', ''),
(17, 'Blackmagic Design Pocket Cinema Camera 4K', 1499.95, 'Audiovisuel', 'Camera', 'Camescope', 'Blackmagic', 0, 'css/images/av_camera_camescope_blackmagic_1.jpg', '', ''),
(18, 'Canon LEGRIA HF R806', 239.95, 'Audiovisuel', 'Camera', 'Camescope', 'Canon', 0, 'css/images/av_camera_camescope_canon_1.jpg', '', ''),
(19, 'JVC GY-HM180E', 1599.95, 'Audiovisuel', 'Camera', 'Camescope', 'JVC', 0, 'css/images/av_camera_camescope_jvc_1.jpg', '', ''),
(20, 'Panasonic HC-VX1EF Noir', 699.95, 'Audiovisuel', 'Camera', 'Camescope', 'Panasonic', 0, 'css/images/av_camera_camescope_panasonic_1.jpg', '', ''),
(21, 'Sony HDR-CX240E Noir', 179.95, 'Audiovisuel', 'Camera', 'Camescope', 'Sony', 0, 'css/images/av_camera_camescope_sony_1.jpg', '', ''),
(22, 'AEE Caméra Action cam Lyfe Silver', 89.95, 'Audiovisuel', 'Camera', 'Camera sportive', 'AEE', 0, 'css/images/av_camera_sport_aee_1.jpg', '', ''),
(23, 'Cellys Caméra de sport gyroscopique 360°', 79.95, 'Audiovisuel', 'Camera', 'Camera sportive', 'Cellys', 0, 'css/images/av_camera_sport_cellys_1.jpg', '', ''),
(24, 'GoPro HERO7 Silver', 219.95, 'Audiovisuel', 'Camera', 'Camera sportive', 'GoPro', 0, 'css/images/av_camera_sport_gopro_1.jpg', '', ''),
(25, 'NEDIS Caméra sport Ultra HD 4K Wi-Fi', 99.95, 'Audiovisuel', 'Camera', 'Camera sportive', 'Nedis', 0, 'css/images/av_camera_sport_nedis_1.jpg', '', ''),
(26, 'B&W Formation Bass', 1099.95, 'Audiovisuel', 'Enceinte', 'Enceinte portable', 'B&W', 0, 'css/images/av_enceinte_portable_bw_1.jpg', '', ''),
(27, 'JBL 104-BT Noir', 199.95, 'Audiovisuel', 'Enceinte', 'Enceinte portable', 'JBL', 0, 'css/images/av_enceinte_portable_jbl_1.jpg', '', ''),
(28, 'Pioneer DJ DM-40BT Noir', 199.95, 'Audiovisuel', 'Enceinte', 'Enceinte portable', 'Pioneer', 0, 'css/images/av_enceinte_portable_pioneer_1.jpg', '', ''),
(29, 'B&W 607 Blanc', 649.95, 'Audiovisuel', 'Enceinte', 'Enceinte Hifi', 'B&W', 0, 'css/images/av_enceinte_hifi_bw_1.jpg', '', ''),
(30, 'JBL 308P MkII', 129.95, 'Audiovisuel', 'Enceinte', 'Enceinte Hifi', 'JBL', 0, 'css/images/av_enceinte_hifi_jbl_1.jpg', '', ''),
(31, 'Cabasse Antigua MT22 Noyer', 239.95, 'Audiovisuel', 'Enceinte', 'Enceinte Hifi', 'Cabasse', 0, 'css/images/av_enceinte_hifi_cabasse_1.jpg', '', ''),
(32, 'Yamaha NS-SW100 Noir', 199.95, 'Audiovisuel', 'Enceinte', 'Enceinte Hifi', 'Yamaha', 0, 'css/images/av_enceinte_hifi_yamaha_1.jpg', '', ''),
(33, 'Pioneer DJ S-DJ60X', 259.95, 'Audiovisuel', 'Enceinte', 'Enceinte Hifi', 'Pioneer', 0, 'css/images/av_enceinte_hifi_pioneer_1.jpg', '', ''),
(34, 'HP 255 G7', 399.95, 'Informatique', 'Ordinateur', 'Ordinateur portable', 'HP', 0, 'css/images/info_ordinateur_portable_hp_1.jpg', '', ''),
(35, 'ASUS P1504JA-EJ123R', 999.95, 'Informatique', 'Ordinateur', 'Ordinateur portable', 'Asus', 0, 'css/images/info_ordinateur_portable_asus_1.jpg', '', ''),
(36, 'Alienware M15', 1999.95, 'Informatique', 'Ordinateur', 'Ordinateur portable', 'Alienware', 0, 'css/images/info_ordinateur_portable_alienware_1.jpg', '', ''),
(37, 'Lenovo ThinkPad E15', 1129.95, 'Informatique', 'Ordinateur', 'Ordinateur portable', 'Lenovo', 0, 'css/images/info_ordinateur_portable_lenovo_1.jpg', '', ''),
(38, 'LDLC PC Bazooka', 1049.95, 'Informatique', 'Ordinateur', 'Ordinateur fixe', 'LDLC', 0, 'css/images/info_ordinateur_fixe_ldlc_1.jpg', '', ''),
(39, 'ASUS D340MF', 619.95, 'Informatique', 'Ordinateur', 'Ordinateur fixe', 'Asus', 0, 'css/images/info_ordinateur_fixe_asus_1.jpg', '', ''),
(40, 'Lenovo ThinkCentre', 549.95, 'Informatique', 'Ordinateur', 'Ordinateur fixe', 'Lenovo', 0, 'css/images/info_ordinateur_fixe_lenovo_1.jpg', '', ''),
(41, 'MSI Infinite', 1799.95, 'Informatique', 'Ordinateur', 'Ordinateur fixe', 'MSI', 0, 'css/images/info_ordinateur_fixe_msi_1.jpg', '', ''),
(42, 'LG 19\" LED - 19M38A-B', 79.95, 'Informatique', 'Périphérique', 'Ecran ', 'LG', 0, 'css/images/info_peripherique_ecran_lg_1.jpg', '', ''),
(43, 'HP 21.5\" LED - 22f', 129.95, 'Informatique', 'Périphérique', 'Ecran ', 'HP', 0, 'css/images/info_peripherique_ecran_hp_1.jpg', '', ''),
(44, 'Acer 15.6\" LED - PM161', 179.95, 'Informatique', 'Périphérique', 'Ecran ', 'Acer', 0, 'css/images/info_peripherique_ecran_acer_1.jpg', '', ''),
(45, 'Brother DCP-J1100DW', 329.95, 'Informatique', 'Périphérique', 'Imprimante', 'Brother', 0, 'css/images/info_peripherique_imprimante_brother_1.jpg', '', ''),
(46, 'HP Color LaserJet Pro MFP', 399.95, 'Informatique', 'Périphérique', 'Imprimante', 'HP', 0, 'css/images/info_peripherique_imprimante_hp_1.jpg', '', ''),
(47, 'Canon MAXIFY MB5155', 189.95, 'Informatique', 'Périphérique', 'Imprimante', 'Canon', 0, 'css/images/info_peripherique_imprimante_canon_1.jpg', '', ''),
(48, 'LDLC SSD Externe 2.5\" USB 3.0 240 Go', 59.95, 'Informatique', 'Périphérique', 'Disque dur externe', 'LDLC', 0, 'css/images/info_peripherique_ddext_ldlc_1.jpg', '', ''),
(49, 'Toshiba Canvio Advance 2 To Noir', 89.95, 'Informatique', 'Périphérique', 'Disque dur externe', 'Toshiba', 0, 'css/images/info_peripherique_ddext_toshiba_1.jpg', '', ''),
(50, 'Samsung Portable SSD T7 Touch 1 To', 249.95, 'Informatique', 'Périphérique', 'Disque dur externe', 'Samsung', 0, 'css/images/info_peripherique_ddext_samsung_1.jpg', '', ''),
(51, 'ASRock 760GM-HDV', 54.95, 'Informatique', 'Pièce', 'Carte mère', 'ASRock', 0, 'css/images/info_pièce_mère_asrock_1.jpg', '', ''),
(52, 'ASUS B250 MINING EXPERT', 164.95, 'Informatique', 'Pièce', 'Carte mère', 'Asus', 0, 'css/images/info_pièce_mère_asus_1.jpg', '', ''),
(53, 'MSI B360 GAMING PLUS', 129.95, 'Informatique', 'Pièce', 'Carte mère', 'MSI', 0, 'css/images/info_pièce_mère_msi_1.jpg', '', ''),
(54, 'AMD Radeon HD 6450 1 GB', 39.95, 'Informatique', 'Pièce', 'Carte graphique', 'AMD', 0, 'css/images/info_pièce_graphique_amd_1.jpg', '', ''),
(55, 'ASRock Phantom Gaming D Radeon', 199.95, 'Informatique', 'Pièce', 'Carte graphique', 'ASRock', 0, 'css/images/info_pièce_graphique_asrock_1.jpg', '', ''),
(56, 'ASUS GeForce GT 1030 2 Go', 99.95, 'Informatique', 'Pièce', 'Carte graphique', 'Asus', 0, 'css/images/info_pièce_graphique_asus_1.jpg', '', ''),
(57, 'AMD Athlon 220GE (3.4 GHz)', 69.95, 'Informatique', 'Pièce', 'Processeur', 'AMD', 0, 'css/images/info_pièce_processeur_amd_1.jpg', '', ''),
(58, 'Intel Celeron B820 (1.7 GHz)', 59.95, 'Informatique', 'Pièce', 'Processeur', 'Intel', 0, 'css/images/info_pièce_processeur_intel_1.jpg', '', ''),
(59, 'Lenovo ThinkSystem SR630', 899.95, 'Informatique', 'Pièce', 'Processeur', 'Lenovo', 0, 'css/images/info_pièce_processeur_lenovo_1.jpg', '', ''),
(60, 'Apple HomePod Gris Sidéral', 349.95, 'Objets connectes', 'Maison', 'Enceinte connectée', 'Apple', 0, 'css/images/oc_maison_enceinte_apple_1.jpg', '', ''),
(61, 'Bose Home Speaker 300 ', 249.95, 'Objets connectes', 'Maison', 'Enceinte connectée', 'Bose', 0, 'css/images/oc_maison_enceinte_bose_1.jpg', '', ''),
(62, 'Google Home', 99.95, 'Objets connectes', 'Maison', 'Enceinte connectée', 'Google', 0, 'css/images/oc_maison_enceinte_google_1.jpg', '', ''),
(63, 'Amaryllo Atom', 89.95, 'Objets connectes', 'Maison', 'Caméra de surveillance', 'Amaryllo', 0, 'css/images/oc_maison_camera_amaryllo_1.jpg', '', ''),
(64, 'D-Link Mydlink DCS-2800LH', 179.95, 'Objets connectes', 'Maison', 'Caméra de surveillance', 'D-Link', 0, 'css/images/oc_maison_camera_dlink_1.jpg', '', ''),
(65, 'Philips Hue Play ', 59.95, 'Objets connectes', 'Maison', 'Lampe connectée', 'Philips', 0, 'css/images/oc_maison_lampe_philips_1.jpg', '', ''),
(66, 'Philips Hue White Tuar', 69.95, 'Objets connectes', 'Maison', 'Lampe connectée', 'Philips', 0, 'css/images/oc_maison_lampe_philips_2.jpg', '', ''),
(67, 'Philips Hue White Turaco', 69.95, 'Objets connectes', 'Maison', 'Lampe connectée', 'Philips', 0, 'css/images/oc_maison_lampe_philips_3.jpg', '', ''),
(70, 'Honor MagicWatch 2 (42 mm / Noir)', 179.95, 'Objets connectes', 'Sport', 'Montre connectée', 'Honor', 0, 'css/images/oc_sport_montre_honor_1.jpg', '', ''),
(69, 'Apple Watch Series 3 GPS ', 649.95, 'Objets connectes', 'Sport', 'Montre connectée', 'Apple', 0, 'css/images/oc_sport_montre_apple_1.jpg', '', ''),
(71, 'Puma HR', 279.95, 'Objets connectes', 'Sport', 'Montre connectée', 'Puma', 0, 'css/images/oc_sport_montre_puma_1.jpg', '', ''),
(72, 'Cellys Drone HAPPYVIEW', 99.95, 'Objets connectes', 'Sport', 'Drone', 'Cellys', 0, 'css/images/oc_sport_drone_cellys_1.jpg', '', ''),
(73, 'DJI Mavic Mini', 399.95, 'Objets connectes', 'Sport', 'Drone', 'DJI', 0, 'css/images/oc_sport_drone_dji_1.jpg', '', ''),
(74, 'Parrot ANAFI', 699.95, 'Objets connectes', 'Sport', 'Drone', 'Parrot', 0, 'css/images/oc_sport_drone_parrot_1.jpg', '', ''),
(75, 'BEEPER CROSS FX1000', 599.95, 'Objets connectes', 'Sport', 'Trottinette', 'Beeper', 0, 'css/images/oc_sport_trottinette_beeper_1.jpg', '', ''),
(76, 'Xiaomi Mi Electric Scooter', 499.95, 'Objets connectes', 'Sport', 'Trottinette', 'Xiaomi', 0, 'css/images/oc_sport_trottinette_xiaomi_1.jpg', '', ''),
(77, 'Segway Ninebot KickScooter', 499.95, 'Objets connectes', 'Sport', 'Trottinette', 'Segway', 0, 'css/images/oc_sport_trottinette_segway_1.jpg', '', ''),
(80, 'Canon EOS 2000D', 449.95, 'Audiovisuel', 'Photo', 'Reflex', 'Canon', 0, 'css/images/av_photo_reflex_canon_1.jpg', 'css/images/av_photo_reflex_canon_2.jpg', 'css/images/av_photo_objectif_canon_1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Mot_de_passe` varchar(50) NOT NULL,
  `Nom_utilisateur` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `Nom`, `Prenom`, `Mail`, `Mot_de_passe`, `Nom_utilisateur`) VALUES
(1, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(10, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(11, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(12, 'iuhuihuihusefr', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabien'),
(13, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(14, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(15, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(16, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(17, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(18, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(19, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(20, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(21, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(22, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(23, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(24, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(25, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(26, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(27, 'Piedallu', 'Bastien', 'bastien.piedallu@sfr.fr', 'stabien', 'Stabieniuhi'),
(28, 'Piedallu', 'Bastien', 'bastien.piedallu@test.fr', 'Stabien26', 'Stabien2000'),
(29, 'Piedallu', 'Bastien', 'bastien.piedallu@piedallu.fr', 'Stabien', 'Stabien2300');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
