-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 06, 2019 at 12:30 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Souchoteque`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brevet_soleau`
--

CREATE TABLE `brevet_soleau` (
  `titre` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `scan` varchar(255) NOT NULL COMMENT 'fichier',
  `numero` int(11) NOT NULL,
  `inpi` varchar(255) NOT NULL COMMENT 'fichier',
  `activite` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `capacite_production`
--

CREATE TABLE `capacite_production` (
  `type` enum('PHA','EPS','Autre') NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL COMMENT 'fichier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `capacite_production`
--

INSERT INTO `capacite_production` (`type`, `nom`, `ref`, `fichier`) VALUES
('PHA', 'capa1', '432', 'capa1.pdf'),
('EPS', 'capa2', '432', 'capa2.pdf'),
('Autre', 'capa3', '432', 'capa3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `caracterisation`
--

CREATE TABLE `caracterisation` (
  `ref` varchar(255) NOT NULL,
  `type` enum('PHA','EPS') NOT NULL,
  `poids_moleculaire` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `caracterisation_oses`
--

CREATE TABLE `caracterisation_oses` (
  `oses` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `type` enum('PHA','EPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `criblage`
--

CREATE TABLE `criblage` (
  `nom` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `conditions` varchar(255) NOT NULL COMMENT 'fichier',
  `rapport` varchar(255) NOT NULL COMMENT 'fichier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `criblage`
--

INSERT INTO `criblage` (`nom`, `ref`, `conditions`, `rapport`) VALUES
('criblage 1', '432', 'criblage_1_conditions.pdf', 'criblage_1_rapport.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `texte` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL COMMENT 'fichier',
  `ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exclusivite`
--

CREATE TABLE `exclusivite` (
  `id` int(11) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `ref` varchar(255) NOT NULL,
  `activite` varchar(255) NOT NULL,
  `partenaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fichier_caracterisation`
--

CREATE TABLE `fichier_caracterisation` (
  `nom` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL COMMENT 'fichier',
  `ref` varchar(255) NOT NULL,
  `type` enum('EPS','PHA') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `home`
-- (See below for the actual view)
--
CREATE TABLE `home` (
`ref` varchar(255)
,`identification` bigint(21)
,`EPS` bigint(21)
,`PHA` bigint(21)
,`Autre` bigint(21)
,`pasteur` bigint(21)
,`brevet` bigint(21)
,`publication` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `identification`
--

CREATE TABLE `identification` (
  `type` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `sequence` varchar(255) NOT NULL COMMENT 'fichier',
  `arbre` varchar(255) NOT NULL COMMENT 'fichier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `objectivation`
--

CREATE TABLE `objectivation` (
  `nom` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `protocole` varchar(255) NOT NULL COMMENT 'fichier',
  `resultat` varchar(255) NOT NULL COMMENT 'fichier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `objectivation`
--

INSERT INTO `objectivation` (`nom`, `ref`, `protocole`, `resultat`) VALUES
('obj 1', '432', 'obj_1_protocole.pdf', 'obj_1_resultat.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `oses`
--

CREATE TABLE `oses` (
  `nom` varchar(255) NOT NULL,
  `type` enum('acide','neutre','amine') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partenaire`
--

CREATE TABLE `partenaire` (
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partenaire`
--

INSERT INTO `partenaire` (`nom`) VALUES
('L\'Oréal');

-- --------------------------------------------------------

--
-- Table structure for table `pasteur`
--

CREATE TABLE `pasteur` (
  `titre` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `date_depot` date NOT NULL,
  `numero` int(11) NOT NULL,
  `dossier_depot` varchar(255) NOT NULL COMMENT 'fichier',
  `scan_validation` varchar(255) NOT NULL COMMENT 'fichier',
  `photo_cryotube` varchar(255) NOT NULL COMMENT 'fichier',
  `stock` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasteur`
--

INSERT INTO `pasteur` (`titre`, `ref`, `date_depot`, `numero`, `dossier_depot`, `scan_validation`, `photo_cryotube`, `stock`) VALUES
('brevet 1', '432', '2018-10-17', 1234567, 'brevet_1_dossier_depot.pdf', 'brevet_1_validation.pdf', 'brevet_1_photo.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `photo_souche`
--

CREATE TABLE `photo_souche` (
  `description` varchar(255) DEFAULT NULL,
  `ref` varchar(255) NOT NULL,
  `fichier` varchar(255) NOT NULL COMMENT 'fichier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `protocole` varchar(255) NOT NULL COMMENT 'fichier',
  `rapport` varchar(255) DEFAULT NULL COMMENT 'fichier',
  `projet` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `texte` varchar(255) NOT NULL COMMENT 'fichier',
  `activite` varchar(255) NOT NULL,
  `partenaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `nom` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `fichier` varchar(255) NOT NULL COMMENT 'fichier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`nom`, `ref`, `date`, `fichier`) VALUES
('La colonisation en mileu aqueu', '432', '2018-12-10', 'colonisation_en_milieu_aqueu.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `souche`
--

CREATE TABLE `souche` (
  `ref` varchar(255) NOT NULL,
  `origine` varchar(255) NOT NULL,
  `stock` int(11) UNSIGNED NOT NULL,
  `annee_collecte` year(4) NOT NULL,
  `annee_creation` year(4) DEFAULT NULL,
  `description` varchar(255) NOT NULL COMMENT 'fichier',
  `texte_hcb` varchar(255) DEFAULT NULL COMMENT 'fichier',
  `validation_hcb` varchar(255) DEFAULT NULL COMMENT 'fichier',
  `schema_plasmique` varchar(255) DEFAULT NULL COMMENT 'fichier',
  `acrediation` int(11) NOT NULL DEFAULT '0',
  `desactive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `souche`
--

INSERT INTO `souche` (`ref`, `origine`, `stock`, `annee_collecte`, `annee_creation`, `description`, `texte_hcb`, `validation_hcb`, `schema_plasmique`, `acrediation`, `desactive`) VALUES
('432', 'Pointe des espagnols', 2, 2015, NULL, '432/description.docx', NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `souche_projet`
--

CREATE TABLE `souche_projet` (
  `ref` varchar(255) NOT NULL,
  `projet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `home`
--
DROP TABLE IF EXISTS `home`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `souchoteque`.`home`  AS  (select `S`.`ref` AS `ref`,(select count(0) from `souchoteque`.`identification` `I` where (`I`.`ref` = `S`.`ref`)) AS `identification`,(select count(0) from `souchoteque`.`capacite_production` `I` where ((`I`.`ref` = `S`.`ref`) and (`I`.`type` = 'EPS'))) AS `EPS`,(select count(0) from `souchoteque`.`capacite_production` `I` where ((`I`.`ref` = `S`.`ref`) and (`I`.`type` = 'PHA'))) AS `PHA`,(select count(0) from `souchoteque`.`capacite_production` `I` where ((`I`.`ref` = `S`.`ref`) and (`I`.`type` = 'Autre'))) AS `Autre`,(select count(0) from `souchoteque`.`pasteur` `I` where (`I`.`ref` = `S`.`ref`)) AS `pasteur`,(select count(0) from `souchoteque`.`brevet_soleau` `I` where (`I`.`ref` = `S`.`ref`)) AS `brevet`,(select count(0) from `souchoteque`.`publication` `I` where (`I`.`ref` = `S`.`ref`)) AS `publication` from `souchoteque`.`souche` `S`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`nom`);

--
-- Indexes for table `brevet_soleau`
--
ALTER TABLE `brevet_soleau`
  ADD PRIMARY KEY (`titre`,`ref`) USING BTREE,
  ADD KEY `ref` (`ref`),
  ADD KEY `activite` (`activite`);

--
-- Indexes for table `capacite_production`
--
ALTER TABLE `capacite_production`
  ADD PRIMARY KEY (`ref`,`nom`,`type`);

--
-- Indexes for table `caracterisation`
--
ALTER TABLE `caracterisation`
  ADD PRIMARY KEY (`ref`,`type`);

--
-- Indexes for table `caracterisation_oses`
--
ALTER TABLE `caracterisation_oses`
  ADD PRIMARY KEY (`oses`,`ref`,`type`),
  ADD KEY `ref` (`ref`,`type`);

--
-- Indexes for table `criblage`
--
ALTER TABLE `criblage`
  ADD PRIMARY KEY (`nom`,`ref`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`texte`,`ref`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `exclusivite`
--
ALTER TABLE `exclusivite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activite` (`activite`),
  ADD KEY `partenaire` (`partenaire`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `fichier_caracterisation`
--
ALTER TABLE `fichier_caracterisation`
  ADD PRIMARY KEY (`type`,`nom`,`ref`),
  ADD KEY `ref` (`ref`,`type`);

--
-- Indexes for table `identification`
--
ALTER TABLE `identification`
  ADD PRIMARY KEY (`type`,`ref`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `objectivation`
--
ALTER TABLE `objectivation`
  ADD PRIMARY KEY (`nom`,`ref`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `oses`
--
ALTER TABLE `oses`
  ADD PRIMARY KEY (`nom`);

--
-- Indexes for table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`nom`);

--
-- Indexes for table `pasteur`
--
ALTER TABLE `pasteur`
  ADD PRIMARY KEY (`ref`,`titre`);

--
-- Indexes for table `photo_souche`
--
ALTER TABLE `photo_souche`
  ADD PRIMARY KEY (`fichier`,`ref`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`nom`),
  ADD KEY `projet` (`projet`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`nom`) USING BTREE,
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `activite` (`activite`),
  ADD KEY `partenaire` (`partenaire`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`nom`,`ref`),
  ADD KEY `ref` (`ref`);

--
-- Indexes for table `souche`
--
ALTER TABLE `souche`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `souche_projet`
--
ALTER TABLE `souche_projet`
  ADD PRIMARY KEY (`ref`,`projet`),
  ADD KEY `projet` (`projet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exclusivite`
--
ALTER TABLE `exclusivite`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brevet_soleau`
--
ALTER TABLE `brevet_soleau`
  ADD CONSTRAINT `brevet_soleau_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`),
  ADD CONSTRAINT `brevet_soleau_ibfk_2` FOREIGN KEY (`activite`) REFERENCES `activite` (`nom`);

--
-- Constraints for table `capacite_production`
--
ALTER TABLE `capacite_production`
  ADD CONSTRAINT `capacite_production_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `caracterisation`
--
ALTER TABLE `caracterisation`
  ADD CONSTRAINT `caracterisation_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `caracterisation_oses`
--
ALTER TABLE `caracterisation_oses`
  ADD CONSTRAINT `caracterisation_oses_ibfk_1` FOREIGN KEY (`oses`) REFERENCES `oses` (`nom`),
  ADD CONSTRAINT `caracterisation_oses_ibfk_2` FOREIGN KEY (`ref`,`type`) REFERENCES `caracterisation` (`ref`, `type`);

--
-- Constraints for table `criblage`
--
ALTER TABLE `criblage`
  ADD CONSTRAINT `criblage_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `exclusivite`
--
ALTER TABLE `exclusivite`
  ADD CONSTRAINT `exclusivite_ibfk_1` FOREIGN KEY (`activite`) REFERENCES `activite` (`nom`),
  ADD CONSTRAINT `exclusivite_ibfk_2` FOREIGN KEY (`partenaire`) REFERENCES `partenaire` (`nom`),
  ADD CONSTRAINT `exclusivite_ibfk_3` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `fichier_caracterisation`
--
ALTER TABLE `fichier_caracterisation`
  ADD CONSTRAINT `fichier_caracterisation_ibfk_1` FOREIGN KEY (`ref`,`type`) REFERENCES `caracterisation` (`ref`, `type`);

--
-- Constraints for table `identification`
--
ALTER TABLE `identification`
  ADD CONSTRAINT `identification_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `objectivation`
--
ALTER TABLE `objectivation`
  ADD CONSTRAINT `objectivation_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `pasteur`
--
ALTER TABLE `pasteur`
  ADD CONSTRAINT `pasteur_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `photo_souche`
--
ALTER TABLE `photo_souche`
  ADD CONSTRAINT `photo_souche_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `production_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projet` (`nom`),
  ADD CONSTRAINT `production_ibfk_2` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`activite`) REFERENCES `activite` (`nom`),
  ADD CONSTRAINT `projet_ibfk_2` FOREIGN KEY (`partenaire`) REFERENCES `partenaire` (`nom`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);

--
-- Constraints for table `souche_projet`
--
ALTER TABLE `souche_projet`
  ADD CONSTRAINT `souche_projet_ibfk_1` FOREIGN KEY (`projet`) REFERENCES `projet` (`nom`),
  ADD CONSTRAINT `souche_projet_ibfk_2` FOREIGN KEY (`ref`) REFERENCES `souche` (`ref`);
