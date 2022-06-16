-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 juin 2022 à 00:03
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mp` varchar(50) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `adresse` varchar(300) DEFAULT NULL,
  `telephone` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `email`, `mp`, `photo`, `adresse`, `telephone`) VALUES
(1, 'admin', 'admin@ecommerce.com', '21232f297a57a5a743894a0e4a801fc3', '', NULL, NULL),
(5, 'Skander Ben Salem', 'skander@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'cv.png', 'sfax', 28881661);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `createur` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `createur`, `date_creation`, `date_modification`) VALUES
(2, 'Smartphones', 'Cette categories representes les smartphones', NULL, NULL, NULL),
(13, 'PC', 'Les differents types de PC', 1, '2022-01-21', NULL),
(14, 'Souris', 'Les differents souris du PC', 1, '2022-01-21', '2022-01-21');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `produit` int(11) DEFAULT NULL,
  `panier` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `quantite`, `total`, `produit`, `panier`, `date_creation`, `date_modification`) VALUES
(13, 5, 500, 3, 13, '2022-01-31', '2022-01-31'),
(14, 10, 3000, 1, 13, '2022-01-31', '2022-01-31');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `id` int(11) NOT NULL,
  `visiteur` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `etat` varchar(50) DEFAULT 'en cours',
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paniers`
--

INSERT INTO `paniers` (`id`, `visiteur`, `total`, `etat`, `date_creation`, `date_modification`) VALUES
(13, 13, 3500, 'en cours', '2022-01-31', '2022-01-31');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `prix` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `createur` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `image`, `categorie`, `createur`, `date_creation`, `date_modification`) VALUES
(17, 'Smartphone Infinix Hot 12 4go 64go', 'Ecran: 6.82 pouces IPS LCD, 90Hz\r\n', 619, 'smart1.jpg', 2, 5, '2022-06-14', '2022-06-14'),
(18, 'Smartphone Oppo Reno7', 'Ecran: 6.43 pouces\r\nProcesseur: Snapdragonâ„¢ 680', 1499, 'smat2.jpg', 2, 5, '2022-06-14', NULL),
(19, 'Smartphone IKU A6 2022', 'Ecran: 5.5 pouces\r\nMÃ©moire RAM: 1go', 269, 'smat3.jpg', 2, 5, '2022-06-14', NULL),
(20, 'Smartphone Tecno Spark 8P', 'Ecran: 6.6\" IPS LCD\r\nProcesseur: Mediatek MT6769V Helio G85 (12 nm)', 689, 'smart3.jpg', 2, 5, '2022-06-14', NULL),
(21, 'Smartphone Vivo V23 5G', 'Ecran: 6.41 pouces AMOLED\r\nMÃ©moire RAM: 8go', 1999, 'smart5.jpg', 2, 5, '2022-06-14', NULL),
(22, 'Samsung Galaxy A03 4go 128go', 'Ecran: 6.5 pouces \r\nMÃ©moire RAM: 4go', 659, 'smart6.jpg', 2, 5, '2022-06-14', NULL),
(23, 'PC PORTABLE ASUS CHROMEBOOK', 'Ã‰cran : 11.6\" HD - Antireflet\r\nMÃ©moire RAM: 4 Go LPDDR4', 589, 'pc1.jpg', 13, 5, '2022-06-14', NULL),
(24, 'PC PORTABLE LENOVO IDEAPAD', 'Ecran 11.6\" HD (1920x1080)\r\nDisque Dur:128 Go SSD', 659, 'pc2.jpg', 13, 5, '2022-06-14', NULL),
(25, 'PC PORTABLE HP 15', 'Ecran 15.6\" HD - Processeur: Intel Core i3-1115G4', 1504, 'pc3.jpg', 13, 5, '2022-06-15', NULL),
(26, 'PC PORTABLE LENOVO V15 I5 10GÃ‰N', 'Ecran 15.6\" FHD (1920x1080) \r\nDisque Dur: 1 To 5400 tr/min 2,5\"', 1794, 'pc4.jpg', 13, 5, '2022-06-15', NULL),
(27, 'PC PORTABLE HP 15 I5 11GÃ‰N', 'Ã‰cran: 15.6\" HD - Processeur: Intel Core i5-1135G7', 1934, 'pc5.jpg', 13, 5, '2022-06-15', NULL),
(28, 'PC PORTABLE ACER ASPIRE 5 I5 11GÃ‰N', 'Ã‰cran 15.6\" FULL HD IPS - Processeur:  Intel Core i5-1135G7', 1959, 'pc6.jpg', 13, 5, '2022-06-15', NULL),
(29, 'SOURIS OPTIQUE USB NGS TICK', 'Souris Optique USB NGS TICK - Couleur Rouge & Noir ', 12.5, 'sou1.jpg', 14, 5, '2022-06-15', '2022-06-15'),
(30, 'SOURIS FILAIRE GAMING', 'Souris filaire Havit HV-MS1003 RGB', 12.9, 'sou2.jpg', 14, 5, '2022-06-15', NULL),
(31, 'SOURIS GAMING XTRIKE ', 'Souris Gaming USB Xtrike Me GM-215 ', 22.5, 'sou3.jpg', 14, 5, '2022-06-15', NULL),
(32, 'SOURIS GAMER WHITE SHARK', 'Souris Gamer White Shark GARETH GM-5009 - Interface USB 2.0 ', 29, 'sou4.jpg', 14, 5, '2022-06-15', NULL),
(33, 'SOURIS GAMER USB EWEADN T03', 'Souris Gamer USB EWEADN T03 - Connexion USB - 6', 29, 'sou5.jpg', 14, 5, '2022-06-15', NULL),
(34, 'SOURIS GAMING FANTECH X7 BLAST', 'Souris Gaming Hp rÃ©troÃ©clairÃ©e X220 - Type: Filaire - mÃ©tallique ', 29.9, 'sou6.jpg', 14, 5, '2022-06-15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `produit` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `createur` int(11) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `produit`, `quantite`, `createur`, `date_creation`, `date_modification`) VALUES
(1, 16, 50, 1, '2022-01-28', '2022-01-28'),
(2, 17, 500, 5, '2022-06-14', NULL),
(3, 18, 300, 5, '2022-06-14', NULL),
(4, 19, 700, 5, '2022-06-14', NULL),
(5, 20, 400, 5, '2022-06-14', NULL),
(6, 21, 600, 5, '2022-06-14', NULL),
(7, 22, 750, 5, '2022-06-14', NULL),
(8, 23, 100, 5, '2022-06-14', NULL),
(9, 24, 400, 5, '2022-06-14', NULL),
(10, 25, 500, 5, '2022-06-15', NULL),
(11, 26, 900, 5, '2022-06-15', NULL),
(12, 27, 300, 5, '2022-06-15', NULL),
(13, 28, 650, 5, '2022-06-15', NULL),
(14, 29, 200, 5, '2022-06-15', NULL),
(15, 30, 300, 5, '2022-06-15', NULL),
(16, 31, 250, 5, '2022-06-15', NULL),
(17, 32, 400, 5, '2022-06-15', NULL),
(18, 33, 350, 5, '2022-06-15', NULL),
(19, 34, 550, 5, '2022-06-15', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mp` varchar(255) DEFAULT NULL,
  `etat` int(11) DEFAULT '0',
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  `telephone` varchar(12) NOT NULL DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(2555) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nom`, `prenom`, `mp`, `etat`, `date_creation`, `date_modification`, `telephone`, `email`, `photo`, `adresse`) VALUES
(18, 'skander', 'ben salem', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, NULL, '28881661', 'skanderbensalem29@gmail.com', 'cv.png', 'sfax');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
