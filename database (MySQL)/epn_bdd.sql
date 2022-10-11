-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 oct. 2022 à 00:34
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
  `id_categorie` int(50) NOT NULL,
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
  `id_departement` int(50) NOT NULL,
  `code_departement` varchar(20) NOT NULL,
  `nom_departement` char(50) DEFAULT NULL,
  `id_chef_departement` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(50) NOT NULL,
  `matricule` int(50) NOT NULL,
  `nom` char(100) DEFAULT NULL,
  `prenom` char(80) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `id_statut` int(50) DEFAULT NULL,
  `id_categorie` int(50) DEFAULT NULL,
  `d_contrat` date DEFAULT NULL,
  `id_grade` int(50) DEFAULT NULL,
  `avancement` date DEFAULT NULL,
  `f_contrat` date DEFAULT NULL,
  `d_retraite` date DEFAULT NULL,
  `id_departement` int(50) DEFAULT NULL,
  `id_etablissement` int(50) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_etablissement` int(50) NOT NULL,
  `code_etablissement` varchar(20) DEFAULT NULL,
  `nom_etablissement` varchar(50) NOT NULL,
  `type_etablissement` varchar(50) NOT NULL,
  `id_departement` int(50) NOT NULL,
  `id_chef_etablissement` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(50) NOT NULL,
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
-- Structure de la table `graphe_mois`
--

CREATE TABLE `graphe_mois` (
  `id_chart` int(11) NOT NULL,
  `code_departement` varchar(20) NOT NULL,
  `nombre_r` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(50) NOT NULL,
  `code_statut` varchar(20) NOT NULL,
  `nom_statut` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `code_statut`, `nom_statut`) VALUES
(15, 'ELD', 'Emplois Long Durée'),
(16, 'FONCT', 'Fonctionnaire'),
(17, 'EFA', 'Emplois Fonct Assimilé');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_ut` int(11) NOT NULL,
  `nom_ut` varchar(100) NOT NULL,
  `prenom_ut` varchar(80) NOT NULL,
  `image_ut` varchar(80) NOT NULL,
  `role_ut` varchar(10) NOT NULL,
  `departement_ut` varchar(20) NOT NULL,
  `username_ut` varchar(200) NOT NULL,
  `email_ut` varchar(100) NOT NULL,
  `password_ut` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_ut`, `nom_ut`, `prenom_ut`, `image_ut`, `role_ut`, `departement_ut`, `username_ut`, `email_ut`, `password_ut`) VALUES
(9, 'super', 'administrateur', 'img_20220719_102155.jpg', 'admin', '', 'admin', 'admin@gmail.com', 'admin'),

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
  ADD UNIQUE KEY `nom_statut` (`id_statut`,`id_categorie`,`id_grade`,`id_departement`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_departement` (`id_departement`),
  ADD KEY `id_etablissement` (`id_etablissement`),
  ADD KEY `id_grade` (`id_grade`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id_etablissement`),
  ADD UNIQUE KEY `code_etablissement` (`code_etablissement`),
  ADD KEY `id_departement` (`id_departement`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`),
  ADD UNIQUE KEY `code_grade` (`code_grade`);

--
-- Index pour la table `graphe_mois`
--
ALTER TABLE `graphe_mois`
  ADD PRIMARY KEY (`id_chart`),
  ADD KEY `code_departement` (`code_departement`);

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
  ADD PRIMARY KEY (`id_ut`),
  ADD UNIQUE KEY `Email` (`email_ut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id_etablissement` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `graphe_mois`
--
ALTER TABLE `graphe_mois`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id_statut` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_ut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id_etablissement`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id_grade`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`);

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `etablissement_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
