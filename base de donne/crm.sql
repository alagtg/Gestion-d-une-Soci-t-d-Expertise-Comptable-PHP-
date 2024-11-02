-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 24 Juin 2011 à 20:42
-- Version du serveur: 5.1.33
-- Version de PHP: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `crm`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `etat` varchar(20) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `rappel` date NOT NULL,
  `activite` int(11) NOT NULL,
  `rapport` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `agenda`
--


-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `id_avoir` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(11) NOT NULL,
  `bon_commande` int(11) NOT NULL,
  `bon_livraison` int(11) NOT NULL,
  `date_avoir` date NOT NULL,
  `total_ht` float NOT NULL,
  `total_tva` float NOT NULL,
  `prix_totale` float NOT NULL,
  `remis` int(11) NOT NULL,
  `reste` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL,
  PRIMARY KEY (`id_avoir`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `avoir`
--

INSERT INTO `avoir` (`id_avoir`, `reference`, `bon_commande`, `bon_livraison`, `date_avoir`, `total_ht`, `total_tva`, `prix_totale`, `remis`, `reste`, `id_compte`) VALUES
(21, 223, 1229, 12, '2011-05-31', 2000, 2e+009, 2e+009, 10000, 12, 5),
(23, 12, 22222, 2222, '2011-06-15', 2.22222e+006, 2.22222e+007, 22, 33, 23, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cadeau`
--

CREATE TABLE IF NOT EXISTS `cadeau` (
  `id_cadeau` int(11) NOT NULL AUTO_INCREMENT,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix_point` int(11) NOT NULL,
  PRIMARY KEY (`id_cadeau`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cadeau`
--

INSERT INTO `cadeau` (`id_cadeau`, `min`, `max`, `nom`, `prix_point`) VALUES
(1, 500, 999, 'lavage', 5),
(2, 1000, 1999, 'piece de recharge', 5),
(3, 2000, 2999, 'vidange', 5);

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `messages` text COLLATE utf8_unicode_ci NOT NULL,
  `dateheure` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`id`, `name`, `messages`, `dateheure`) VALUES
(7, 'ROOT', 'ccccccccc', '2011-06-15 15:06:23');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `compte` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `date_validite` varchar(30) NOT NULL,
  `fax` int(11) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `image` varchar(150) NOT NULL,
  `bonus` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_dernier_modif` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `id_relation` int(11) NOT NULL,
  PRIMARY KEY (`id_compte`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `compte`, `adresse`, `telephone`, `mobile`, `date_validite`, `fax`, `mail`, `code`, `image`, `bonus`, `date_creation`, `date_dernier_modif`, `id_utilisateur`, `id_pays`, `ville`, `id_relation`) VALUES
(1, 'admincompte', '                          adminville \r\n				  \r\n			', 94032000, 1234958, '210', 2147483647, 'admin@yahoo.fr', '1234', 'chrome.png', 444164, '2011-05-29', '2011-06-22', 75, 17, 'djerba', 1),
(6, 'mercedes', '            midoun djerba prés de chich5an    \r\n		', 77777777, 22222222, '255', 4189, 'MERCEDES@gmail.com', '12345', 'mercedes.jpg', 0, '2011-06-11', '2011-06-24', 75, 17, 'djerba', 1),
(80, 'volkswagen', '  Sedghienne  \r\n				', 75644111, 22111000, '255', 4180, 'volkswagen@gmail.com', '12345678', 'volsvagen.jpg', 0, '2011-06-24', '2011-06-24', 75, 17, 'djerba', 1),
(79, 'peugeot', 'Houmet souk', 75655111, 22111111, '255', 4180, 'peugeot@gmail.com', '1234567', 'peugeut.jpg', 0, '2011-06-24', '2011-06-24', 75, 17, 'djerba', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(30) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `skype` varchar(60) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `civilite`, `nom`, `prenom`, `titre`, `telephone`, `mobile`, `fax`, `mail`, `skype`, `id_utilisateur`, `id_compte`) VALUES
(16, 'MR', 'simple', 'manager', 'mljmljm', '1234567890', 8966666, 2147483647, 'admin@yahoo.fr', 'simple', 75, 5),
(17, 'MR', 'simple', 'super manager', 'mljmljm', '22195627', 8966666, 2147483647, 'admin@yahoo.fr', 'kairallah', 75, 5),
(19, 'MR', 'Goldannonce', 'ben salah', 'Grande villa a houmet souk djerba', '5555555', 1234958, 2147483647, 'djerbien31@gmail.com', 'DDDDDD', 75, 6);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `id_devis` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(11) NOT NULL,
  `date_devis` date NOT NULL,
  `prix` float NOT NULL,
  `id_compte` int(11) NOT NULL,
  PRIMARY KEY (`id_devis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id_devis`, `reference`, `date_devis`, `prix`, `id_compte`) VALUES
(17, 223, '2011-06-01', 2e+009, 5),
(18, 223, '2011-06-08', 10000, 5),
(19, 12, '2011-06-15', 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `activite_lier` varchar(40) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id_document`, `nom`, `type`, `activite_lier`, `id_utilisateur`) VALUES
(2, 'VW_Golf_262_1920.jpg', 'C:/wamp/www//FORME/document/data/', '', 3),
(3, 'VW_Golf-W12_356_1920x1200.jpg', 'C:/wamp/www//FORME/document/data/', '', 3),
(4, 'JoomFish-Documentation-Francaise.pdf', 'C:/wamp/www//FORME/document/data/', '', 3),
(5, 'artifacts.xml', 'C:/wamp/www//FORME/document/data/', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  PRIMARY KEY (`id_entreprise`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom`, `logo`, `adresse`) VALUES
(1, 'mkg concept', 'lolgoo-removebg-preview_ccexpress.png', 'route midoun-houmet souk     ');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(11) NOT NULL,
  `bon_commande` int(11) NOT NULL,
  `bon_livraison` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `total_ht` float NOT NULL,
  `total_tva` float NOT NULL,
  `timbre` float NOT NULL,
  `prix_totale` float NOT NULL,
  `nbp` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id_facture`, `reference`, `bon_commande`, `bon_livraison`, `date_facture`, `total_ht`, `total_tva`, `timbre`, `prix_totale`, `nbp`, `id_compte`) VALUES
(7, 223, 1229, 12, '2011-06-09', 2000, 200, 20, 20, 0, 5),
(8, 12, 22222, 2222, '2011-06-16', 2.22222e+006, 2.22222e+007, 2222, 2222, 0, 1),
(9, 123, 1000, 1000, '2011-06-07', 1000, 1000, 1000, 1000, 0, 1),
(10, 1234, 1000, 1000, '2011-06-07', 1000, 1000, 1000, 1000, 0, 1),
(11, 12, 22222, 2222, '2011-06-15', 2.22222e+006, 2.22222e+007, 22, 2222, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fact_prod`
--

CREATE TABLE IF NOT EXISTS `fact_prod` (
  `id_facture` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id_facture`,`ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fact_prod`
--


-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id_historique` int(11) NOT NULL AUTO_INCREMENT,
  `id_compte` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `cadeau` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`id_historique`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `historique`
--

INSERT INTO `historique` (`id_historique`, `id_compte`, `bonus`, `cadeau`, `date`) VALUES
(1, 1, 500, 'lavage', '25/05/2011 13:31:31'),
(2, 1, 1000, 'piece de recharge', '25/05/2011 13:31:31'),
(7, 1, 2000, 'vidange', '11/06/2011 16:12:12'),
(4, 1, 500, 'lavage', '25/05/2011 13:45:45'),
(5, 1, 500, 'lavage', '26/05/2011 01:35:35'),
(6, 1, 2000, 'vidange', '02/06/2011 14:51:51'),
(8, 1, 2000, 'vidange', '15/06/2011 15:03:03'),
(9, 1, 1000, 'piece de recharge', '15/06/2011 15:41:41'),
(10, 1, 2000, 'vidange', '15/06/2011 15:42:42');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_avoir`
--

CREATE TABLE IF NOT EXISTS `ligne_avoir` (
  `id_avoir` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id_avoir`,`ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligne_avoir`
--

INSERT INTO `ligne_avoir` (`id_avoir`, `ref`, `qte`) VALUES
(21, 5, 7),
(23, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_devis`
--

CREATE TABLE IF NOT EXISTS `ligne_devis` (
  `id_devis` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id_devis`,`ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligne_devis`
--

INSERT INTO `ligne_devis` (`id_devis`, `ref`, `qte`) VALUES
(17, 0, 0),
(18, 5, 2),
(19, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_facture`
--

CREATE TABLE IF NOT EXISTS `ligne_facture` (
  `id_facture` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id_facture`,`ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ligne_facture`
--

INSERT INTO `ligne_facture` (`id_facture`, `ref`, `qte`) VALUES
(7, 5, 5),
(7, 6, 4),
(8, 6, 3),
(8, 5, 5),
(9, 5, 3),
(10, 5, 2),
(10, 6, 3),
(11, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `opportunite`
--

CREATE TABLE IF NOT EXISTS `opportunite` (
  `id_opportunite` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(30) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `ca_global` float(8,3) NOT NULL,
  `id_compte` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `convertir` varchar(20) NOT NULL,
  PRIMARY KEY (`id_opportunite`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `opportunite`
--

INSERT INTO `opportunite` (`id_opportunite`, `description`, `etat`, `debut`, `fin`, `ca_global`, `id_compte`, `id_utilisateur`, `convertir`) VALUES
(17, 'oooooooooooooooo', 'Gagn&eacute;e', '2011-05-30', '2011-05-31', 100000.000, 5, 75, 'V'),
(18, ' ouizuozoizu', 'Ouverte', '2011-05-30', '2011-05-31', 100000.000, 5, 75, 'F');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom`) VALUES
(17, 'tunisie'),
(19, 'Mali');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(100) NOT NULL,
  `prix` float(8,3) NOT NULL,
  `bonnus` int(11) NOT NULL,
  PRIMARY KEY (`ref`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`ref`, `nom_produit`, `prix`, `bonnus`) VALUES
(5, 'BMW', 100000.000, 40),
(7, 'Hummer', 12345.000, 10000);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `etat` varchar(20) NOT NULL,
  `debut` date NOT NULL,
  `echeance` date NOT NULL,
  `creer` int(11) NOT NULL,
  `realiser` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL,
  `ca_global` float(8,3) NOT NULL,
  PRIMARY KEY (`id_projet`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom`, `description`, `etat`, `debut`, `echeance`, `creer`, `realiser`, `id_compte`, `ca_global`) VALUES
(18, 'hjfjhfjh', 'oooooooooooooooo', 'Planifi&eacute;', '2011-05-30', '2011-05-31', 75, 76, 5, 100000.000);

-- --------------------------------------------------------

--
-- Structure de la table `relation_compte`
--

CREATE TABLE IF NOT EXISTS `relation_compte` (
  `id_relation` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_relation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `relation_compte`
--

INSERT INTO `relation_compte` (`id_relation`, `nom`) VALUES
(1, 'client'),
(2, 'prospects'),
(3, 'fornisseur');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE IF NOT EXISTS `tache` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `etat` varchar(20) NOT NULL,
  `debut` date NOT NULL,
  `echeance` date NOT NULL,
  `priorite` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `id_compte` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `creer` int(11) NOT NULL,
  `realiser` int(11) NOT NULL,
  PRIMARY KEY (`id_tache`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id_tache`, `etat`, `debut`, `echeance`, `priorite`, `description`, `id_compte`, `id_projet`, `creer`, `realiser`) VALUES
(20, 'En cours', '2011-05-29', '2011-05-30', 'Normale', ' creation de nimporte qoi ', 1, 18, 75, 77);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `skype` varchar(20) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `activation` varchar(60) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_dernier_modif` datetime NOT NULL,
  `duree_session` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `password`, `type`, `nom`, `prenom`, `adresse`, `telephone`, `mail`, `skype`, `id_pays`, `ville`, `activation`, `etat`, `date_creation`, `date_dernier_modif`, `duree_session`) VALUES
(77, 'simple', '8dbdda48fb8748d6746f1965824e966a', 'Simple Manager', 'simple', 'manager', ' sjerba', 21345678, 'simple@yahoo.fr', 'simple', 17, 'nifza', 'V', 'F', '2011-05-29 20:25:33', '2011-05-29 20:25:33', 3600),
(75, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Super Manager', 'je suis ', 'super manager', '   djerba', 123456789, 'admin@yahoo.fr', 'admin', 17, 'admin', 'V', 'V', '2011-05-29 15:01:56', '2011-05-29 20:07:49', 3600),
(76, 'root', 'b4b8daf4b8ea9d39568719e1e320076f', 'Manager', 'root', 'ROOT', ' admin', 21345678, 'root@yahoo.fr', 'rooot1', 17, 'root', 'V', 'F', '2011-05-29 20:23:36', '2011-05-29 20:23:36', 3600);
