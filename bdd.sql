-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 sep. 2022 à 20:43
-- Version du serveur : 10.5.16-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u701780604_scmbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `cemail` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `partenaire` tinyint(1) NOT NULL,
  `structure` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `firstco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`cemail`, `password`, `cid`, `admin`, `partenaire`, `structure`, `isActive`, `firstco`) VALUES
;

-- --------------------------------------------------------

--
-- Structure de la table `paramin`
--

CREATE TABLE `paramin` (
  `partenaire` int(11) NOT NULL,
  `members_read` tinyint(1) NOT NULL,
  `members_write` tinyint(1) NOT NULL,
  `members_payement_schedule_read` tinyint(1) NOT NULL,
  `members_products_read` tinyint(1) NOT NULL,
  `members_schedules_red` tinyint(1) NOT NULL,
  `members_add` tinyint(1) NOT NULL,
  `payement_schedules_need` tinyint(1) NOT NULL,
  `payement_schedules_write` tinyint(1) NOT NULL,
  `members_statistics_read` tinyint(1) NOT NULL,
  `payement_day_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paramin`
--

INSERT INTO `paramin` (`partenaire`, `members_read`, `members_write`, `members_payement_schedule_read`, `members_products_read`, `members_schedules_red`, `members_add`, `payement_schedules_need`, `payement_schedules_write`, `members_statistics_read`, `payement_day_read`) VALUES
;

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(11) NOT NULL,
  `pemail` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `padresse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptelephone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `pemail`, `padresse`, `ptelephone`) VALUES
;

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partenaire` int(11) NOT NULL,
  `members_read` tinyint(1) NOT NULL,
  `members_write` tinyint(1) NOT NULL,
  `members_payement_schedule_read` tinyint(1) NOT NULL,
  `members_products_read` tinyint(1) NOT NULL,
  `members_schedules_red` tinyint(1) NOT NULL,
  `members_add` tinyint(1) NOT NULL,
  `payement_schedules_need` tinyint(1) NOT NULL,
  `payement_schedules_write` tinyint(1) NOT NULL,
  `members_statistics_read` tinyint(1) NOT NULL,
  `payement_day_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `structure`
--

INSERT INTO `structure` (`id`, `email`, `adresse`, `telephone`, `image`, `partenaire`, `members_read`, `members_write`, `members_payement_schedule_read`, `members_products_read`, `members_schedules_red`, `members_add`, `payement_schedules_need`, `payement_schedules_write`, `members_statistics_read`, `payement_day_read`) VALUES
;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `email` (`cemail`);

--
-- Index pour la table `paramin`
--
ALTER TABLE `paramin`
  ADD PRIMARY KEY (`partenaire`),
  ADD UNIQUE KEY `partenaire` (`partenaire`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
