-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 mai 2021 à 16:37
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiondeemploidutemps`
--

-- --------------------------------------------------------

--
-- Structure de la table `cour`
--

CREATE TABLE `cour` (
  `IdC` int(11) NOT NULL,
  `IdS` int(11) NOT NULL,
  `IdG` int(11) NOT NULL,
  `IdE` int(11) NOT NULL,
  `DateC` date NOT NULL,
  `DureC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cour`
--

INSERT INTO `cour` (`IdC`, `IdS`, `IdG`, `IdE`, `DateC`, `DureC`) VALUES
(4, 19, 5, 2, '2021-06-06', 8),
(11, 11, 7, 2, '2021-06-06', 8),
(12, 19, 7, 5, '2021-05-05', 8),
(13, 11, 4, 5, '2021-05-16', 8),
(14, 19, 7, 5, '2021-05-30', 10),
(15, 11, 5, 1, '2021-07-04', 8),
(16, 11, 4, 1, '2021-07-11', 10),
(18, 11, 7, 1, '2021-06-02', 8),
(20, 11, 5, 1, '2021-06-05', 14);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `IdE` int(11) NOT NULL,
  `NomE` varchar(20) NOT NULL,
  `PrenomE` varchar(20) NOT NULL,
  `EmailE` varchar(40) NOT NULL,
  `PasswordE` varchar(10) NOT NULL,
  `IdM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`IdE`, `NomE`, `PrenomE`, `EmailE`, `PasswordE`, `IdM`) VALUES
(1, 'ETTGHARSSI', 'hassane', 'hassane.ettgharssi@gmail.com', 'hassane123', 1),
(2, 'loubna', 'soussi', 'loubnasoussi1549@gmail.com', 'loubna123', 3),
(5, 'ayoub', 'cheraf', 'ayoub.cheraf@gmail.com', 'ayoub', 3),
(6, 'loubna', 'loubna', 'achraf@gmail.com', 'achraf', 3),
(7, 'hmad', 'hmad', 'hmad.hmad@gmail.com', 'hmad', 4);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `IdG` int(11) NOT NULL,
  `LibelleG` varchar(20) NOT NULL,
  `effectifG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`IdG`, `LibelleG`, `effectifG`) VALUES
(4, 'TRI214', 40),
(5, 'TDI212', 31),
(7, 'TDI', 10);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `IdM` int(11) NOT NULL,
  `LibelleM` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`IdM`, `LibelleM`) VALUES
(1, 'Math'),
(3, 'Francais'),
(4, 'Arabe'),
(5, 'philosophie'),
(7, 'physique');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `IdS` int(11) NOT NULL,
  `LibelleS` varchar(20) NOT NULL,
  `CapasiterS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`IdS`, `LibelleS`, `CapasiterS`) VALUES
(10, 'MH', 20),
(11, 'AL', 40),
(19, 'JS', 31),
(24, 'BR', 43);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IdUser` int(11) NOT NULL,
  `NomUser` varchar(20) NOT NULL,
  `PrenomUser` varchar(20) NOT NULL,
  `EmailUser` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `NomUser`, `PrenomUser`, `EmailUser`, `password`) VALUES
(1, 'ETTGHARSSI', 'Achraf', 'achraf.ettgharssi1997@gmail.com', 'achraf123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cour`
--
ALTER TABLE `cour`
  ADD PRIMARY KEY (`IdC`),
  ADD KEY `fk1` (`IdE`),
  ADD KEY `fk2` (`IdG`),
  ADD KEY `fk3` (`IdS`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`IdE`),
  ADD KEY `fk` (`IdM`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`IdG`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`IdM`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`IdS`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cour`
--
ALTER TABLE `cour`
  MODIFY `IdC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `IdE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `IdG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `IdM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `IdS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cour`
--
ALTER TABLE `cour`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`IdE`) REFERENCES `enseignant` (`IdE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`IdG`) REFERENCES `groupe` (`IdG`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`IdS`) REFERENCES `salle` (`IdS`);

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `fk` FOREIGN KEY (`IdM`) REFERENCES `matiere` (`IdM`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
