-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 02 fév. 2024 à 15:53
-- Version du serveur : 5.7.19
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `siteannonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id_annonce` int(10) UNSIGNED NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titre` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `prix_vente` double DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `id_etat` int(10) UNSIGNED NOT NULL,
  `id_utilisateur` int(10) UNSIGNED NOT NULL,
  `id_acheteur` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_annonce`, `date_creation`, `titre`, `description`, `prix_vente`, `date_validation`, `id_etat`, `id_utilisateur`, `id_acheteur`) VALUES
(1, '2024-01-02 17:25:32', 'Ordi portable', 'Ordinateur portable HP tres peu servi tres bon etat', 200, '2024-01-02 18:25:32', 3, 1, 2),
(2, '2024-12-20 12:25:33', 'Aspirateur', 'Aspirateur bon etat', 70, '2024-12-20 13:25:33', 3, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `actif` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(50) DEFAULT NULL,
  `perim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `actif`, `token`, `perim`) VALUES
(1, 'Bob', 'leponge@chaudmail.fr', '$2y$10$kRl6nJfrDR1SPSmBpkItbuxJdDDMihCPMyli0TpKrWWdPKGmia47e', 1, NULL, NULL),
(2, 'blabla', 'blabla@ret.com', '$2y$10$M.bft8PFSnkcBuC.lrAfuuX6G2wX0cNoZ/KlmoquC5KWg9ElFQg/2', 1, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `FK2` (`id_etat`),
  ADD KEY `FK3` (`id_utilisateur`),
  ADD KEY `fk_Annonces_Utilisateur1` (`id_acheteur`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_annonce` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
