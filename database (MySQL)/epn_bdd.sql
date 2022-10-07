-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 août 2022 à 10:16
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `epn_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `code_categorie` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `code_categorie`) VALUES
(1, 'CAT I'),
(4, 'CAT II'),
(5, 'CAT III'),
(6, 'CAT IV'),
(7, 'CAT V'),
(8, 'CAT VI'),
(9, 'CAT VII'),
(10, 'CAT VIII');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL,
  `code_departement` varchar(20) NOT NULL,
  `nom_departement` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `code_departement`, `nom_departement`) VALUES
(1, 'CCI', 'CCI(version long)'),
(2, 'CDA', 'CDA(version long)'),
(3, 'CEDP', 'CEDP(Version Long)');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `matricule` int(10) NOT NULL,
  `nom` char(50) DEFAULT NULL,
  `prenom` char(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `code_statut` char(20) DEFAULT NULL,
  `code_categorie` char(20) DEFAULT NULL,
  `d_contrat` date DEFAULT NULL,
  `code_grade` char(20) DEFAULT NULL,
  `avancement` date DEFAULT NULL,
  `f_contrat` date DEFAULT NULL,
  `d_retraite` date DEFAULT NULL,
  `code_departement` char(20) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id_employee`, `matricule`, `nom`, `prenom`, `date_naissance`, `code_statut`, `code_categorie`, `d_contrat`, `code_grade`, `avancement`, `f_contrat`, `d_retraite`, `code_departement`, `image`, `telephone`, `email`, `adresse`, `genre`) VALUES
(20, 5409, 'TOVONIAIN', 'Schorio Ignace', '2002-11-04', 'EFA', 'CAT I', '2022-06-20', '2C2E', '2024-06-20', '2024-06-19', '2062-11-03', 'CEDP', 'avatar-12.jpg', '0345687490', 'schorioignace@gmail.com', 'Lot 378 Plle 134 Morafeno', 'Homme'),
(47, 4378, 'Rasolomanana', 'Richard Arnaud', '1985-05-07', 'EFA', 'CAT II', '2004-03-19', '2C1E', '2006-03-19', '2006-03-18', '2045-05-06', 'CDA', 'avatar-09.jpg', '0343696754', 'Rich_arnaud@gmail.com', 'Betamanga', 'Homme'),
(48, 4390, 'Rasoarivelo', 'Caren', '1997-07-14', 'EFA', 'CAT V', '2017-09-06', '2C2E', '2019-09-06', '2019-09-05', '2022-08-13', 'CDA', '29789997_1851125244921860_8184722219433170078_n.jpg', '0327859467', 'ras_caren@gmail.com', 'Mahavoky', 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `code_grade` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id_grade`, `code_grade`) VALUES
(7, '1C1E'),
(1, '2C1E'),
(3, '2C2E');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(11) NOT NULL,
  `code_statut` varchar(20) NOT NULL,
  `nom_statut` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `code_statut`, `nom_statut`) VALUES
(15, 'ELD', 'ELD (version long)'),
(16, 'FONCT', 'Fonctionnaire'),
(17, 'EFA', 'EFA (version long)');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `UserName`, `Email`, `Password`) VALUES
(9, 'admin', 'admin@gmail.com', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `code_categorie` (`code_categorie`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`),
  ADD UNIQUE KEY `code_departement` (`code_departement`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD UNIQUE KEY `nom_statut` (`code_statut`,`code_categorie`,`code_grade`,`code_departement`),
  ADD KEY `code_grade` (`code_grade`),
  ADD KEY `code_categorie` (`code_categorie`),
  ADD KEY `code_departement` (`code_departement`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`),
  ADD UNIQUE KEY `code_grade` (`code_grade`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`),
  ADD UNIQUE KEY `code_statut` (`code_statut`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id_statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`code_grade`) REFERENCES `grade` (`code_grade`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`code_categorie`) REFERENCES `categorie` (`code_categorie`),
  ADD CONSTRAINT `employee_ibfk_6` FOREIGN KEY (`code_departement`) REFERENCES `departement` (`code_departement`),
  ADD CONSTRAINT `employee_ibfk_7` FOREIGN KEY (`code_statut`) REFERENCES `statut` (`code_statut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
