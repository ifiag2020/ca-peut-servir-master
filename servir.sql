-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 02 sep. 2020 à 02:08
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `servir`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity_historiy`
--

CREATE TABLE `activity_historiy` (
  `id_activity_historiy` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `ref` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` int(255) NOT NULL,
  `position` int(11) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `catrgorie_produit`
--

CREATE TABLE `catrgorie_produit` (
  `id_categorie_produit` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `ref_commande` varchar(50) NOT NULL,
  `date_commande` date NOT NULL,
  `id_statuts_commande` int(11) NOT NULL,
  `montant_ht` decimal(20,6) NOT NULL,
  `montant_ttc` decimal(20,6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

CREATE TABLE `detail_commande` (
  `id_detail_commande` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte_commander` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `id_mouvement` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `date_mouvement` date NOT NULL,
  `nature` tinyint(1) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `price` decimal(20,6) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id_profile`, `libelle`, `dellete`, `date_add`, `date_upd`, `statuts`) VALUES
(1, 'admin', 0, '0000-00-00', '0000-00-00', 0),
(2, 'particulier ', 0, '0000-00-00', '0000-00-00', 0),
(3, 'professionnel', 0, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `profile_role`
--

CREATE TABLE `profile_role` (
  `id_profile_role` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `access` tinyint(1) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `statuts_commande`
--

CREATE TABLE `statuts_commande` (
  `id_statuts_commande` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `couleur` varchar(80) NOT NULL,
  `statuts_commande` varchar(255) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte_innitial` int(11) NOT NULL,
  `qte_actuel` int(11) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `nom_commerce` varchar(100) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity_historiy`
--
ALTER TABLE `activity_historiy`
  ADD PRIMARY KEY (`id_activity_historiy`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `catrgorie_produit`
--
ALTER TABLE `catrgorie_produit`
  ADD PRIMARY KEY (`id_categorie_produit`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_statuts_commande` (`id_statuts_commande`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD PRIMARY KEY (`id_detail_commande`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`id_mouvement`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Index pour la table `profile_role`
--
ALTER TABLE `profile_role`
  ADD PRIMARY KEY (`id_profile_role`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `statuts_commande`
--
ALTER TABLE `statuts_commande`
  ADD PRIMARY KEY (`id_statuts_commande`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_profile` (`id_profile`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activity_historiy`
--
ALTER TABLE `activity_historiy`
  MODIFY `id_activity_historiy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `catrgorie_produit`
--
ALTER TABLE `catrgorie_produit`
  MODIFY `id_categorie_produit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  MODIFY `id_detail_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mouvement`
--
ALTER TABLE `mouvement`
  MODIFY `id_mouvement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `profile_role`
--
ALTER TABLE `profile_role`
  MODIFY `id_profile_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statuts_commande`
--
ALTER TABLE `statuts_commande`
  MODIFY `id_statuts_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity_historiy`
--
ALTER TABLE `activity_historiy`
  ADD CONSTRAINT `activity_historiy_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `catrgorie_produit`
--
ALTER TABLE `catrgorie_produit`
  ADD CONSTRAINT `catrgorie_produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catrgorie_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_statuts_commande`) REFERENCES `statuts_commande` (`id_statuts_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `detail_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD CONSTRAINT `mouvement_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `profile_role`
--
ALTER TABLE `profile_role`
  ADD CONSTRAINT `profile_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_role_ibfk_2` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
