-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 15 Mai 2019 à 09:03
-- Version du serveur :  5.7.26-0ubuntu0.16.04.1
-- Version de PHP :  7.0.33-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smoothiesShop`
--

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `Id` smallint(6) NOT NULL,
  `Id_user` smallint(6) NOT NULL,
  `Id_product` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `Id` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photos` varchar(100) NOT NULL,
  `ingredients` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`Id`, `name`, `photos`, `ingredients`) VALUES
(1, 'Pink Pleasure', 'img/pink_pleasure.jpg', '100 gr de framboise, 1 pomme, 2cl de citron vert'),
(2, 'Grey Pleasure', 'img/grey_pleasure.jpg', '100 gr framboises, 20 gr de myrtille'),
(3, 'Strawberry Passion', 'img/strawberry_passion.jpg', '100 gr de fraise, 1 pomme, 1 banane, 4 glaçons'),
(4, 'Green Oxydant', 'img/green_oxydant.jpg', '200 gr épinards, 2 kiwis'),
(5, 'Bubble Gum', 'img/bubble_gum.jpg', '10 fraises tagadas, 100 gr de sucre, 100 gr de fraises'),
(6, 'Orange Gourmandise', 'img/orange_gourmandise.jpg', '2 oranges, 1 citron, 1 pomme'),
(7, 'Pink Lips', 'img/smooth.jpg', '100 gr de fraises, 10 fraises tagada, 100 gr de pastèque'),
(8, 'Grey Fit', 'img/grey_pleasure.jpg', '100 gr de framboises, 1 pomme, 2cl de citron vert, 20 gr de glaçons, 20 gr de myrtilles'),
(9, 'Strawberry Love', 'img/strawberry_passion.jpg', '200 gr de fraises, 100 gr de melon'),
(10, 'Green Passion', 'img/green_oxydant.jpg', '2 kiwis, 1 concombre, 1 feuille de vigne'),
(11, 'Bubble trouble', 'img/bubble_gum.jpg', '100 gr de fraises, 100 gr de framboises, 25 gr de cerises, 1 banane, 1 orange'),
(12, 'Orange Sanguinolante', 'img/orange_gourmandise.jpg', '2 oranges sanguines, 1 banane, 2 clémentines, 25 gr de betteraves');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `Id` smallint(6) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`Id`, `pseudo`, `mail`, `password`) VALUES
(1, 'Dynozo', 'dynozo@gmail.com', '$2y$11$4396be979c84af742189eurtAxYRMolGM8RFxzws4kLyLRs3p9gEq'),
(2, 'Boris', 'boris@test.fr', '$2y$11$e38fc180d3a087441a943O61N7Y3EbBX0Ma7yP6OfL0kk2rPttjGO'),
(3, 'gars autre', 'legars@gmail.com', '$2y$11$3d812bf310763a40da129ubRFNfoIA9WK10fINmB2naP0Rg9VIJf.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_user` (`Id_user`),
  ADD KEY `Id_product` (`Id_product`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`Id_product`) REFERENCES `product` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
