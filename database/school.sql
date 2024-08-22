-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2024 at 12:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `nom`, `description`) VALUES
(1, '7ème', 'la première classe montante après son cursus primaire '),
(2, '8 ème', 'La deuxième classe après son cursus primaire, elle prépare l\'élève pour l\'examen de TENASOC'),
(3, '1 ère', 'Cette classe marque l\'initial de son choix d\'option.'),
(4, '2 ème', 'la deuxième années dans le choix de son option.'),
(5, '3 ème', 'La classe de préfinaliste, elle est caractérisée par des cours intenses pour mieux former l\'élève à sa dernière année.'),
(6, '4 ème', 'La classe finale, elle marque ainsi la fin du cursus humanitaire par le biais d\'obtention d\'un diplôme d\'examen d\'etat.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `suject` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `id_user`, `suject`, `content`) VALUES
(1, 1, 'inactif', 'l\'inactivité face à mes inscriptions'),
(2, 1, 'inactif', 'retard de suivie'),
(3, 1, 'manque de suivis', 'je ne resois pas des réponses satisfaisantes');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_eleve` int NOT NULL,
  `doc_path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `id_user`, `id_eleve`, `doc_path`) VALUES
(1, 1, 1, 'Bulletins\\motiv.docx'),
(2, 1, 2, 'Bulletins\\strat_CV_final[1].docx'),
(3, 1, 3, 'Bulletins\\DataSky_Monographie.pdf'),
(4, 1, 1, 'Bulletins\\strat_CV_final[1].docx'),
(5, 1, 3, 'Bulletins\\DataSky_Monographie.pdf'),
(6, 1, 0, 'Bulletins\\1722165242.pdf'),
(7, 1, 4, 'Bulletins\\page-word.com-page7.docx'),
(8, 1, 4, 'Bulletins\\patient.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `eleves`
--

CREATE TABLE `eleves` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `postnom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `lieu_nais` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_nais` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nationalite` varchar(50) NOT NULL DEFAULT 'congolaise',
  `responsable` varchar(15) NOT NULL,
  `ancienne_ecole` varchar(150) NOT NULL,
  `certificat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `adresse` text NOT NULL,
  `inscription` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_class` int NOT NULL,
  `id_option` int DEFAULT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `postnom`, `prenom`, `lieu_nais`, `date_nais`, `genre`, `nationalite`, `responsable`, `ancienne_ecole`, `certificat`, `tel`, `adresse`, `inscription`, `id_class`, `id_option`, `users_id`) VALUES
(1, 'paul_milambo', 'milambo', 'ian', 'Boènde', '2024-08-22', 'féminin', 'congolaise', 'père', 'Fides', '../certificats\\motiv.docx', '0894676466', 'Montngafula', 'Refuser', 6, 1, 1),
(2, 'paul_milambo', 'milambo', 'ian', 'Boènde', '2024-08-22', 'féminin', 'congolaise', 'père', 'Malengo', '../certificats\\motiv.docx', '0894676466', 'Montngafula', NULL, 5, 1, 1),
(3, 'paul_milambo', 'MUKANYA', 'JACKY', 'Boènde', '2024-08-23', 'masculin', 'rwandaise', 'père', 'Sonda', 'certificats\\motiv.docx', '0894676466', 'Montngafula', 'valider', 4, 2, 1),
(4, 'KANIKI', 'LEMBE', 'ISAAC', 'KINSHASA', '2024-08-14', 'masculin', 'congolaise', 'père', 'MWAMBA', 'certificats\\file.pdf', '0973153229', 'Kilossa 68, commune de kinshasa', 'Refuser', 3, 1, 1),
(8, 'Mambola', 'kalombo', 'JACKY', 'KINSHASA', '2010-01-26', 'féminin', 'rwandaise', 'mère', 'LOLONGA', 'certificats\\file (9).pdf', '0894896400', 'Montngafula', NULL, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `cin` varchar(150) NOT NULL,
  `adresse` text NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `comfpassword` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `nom`, `description`) VALUES
(1, 'Scientifique ', 'L\'option scientifique est une filière qui prépare les élèves à des études et des carrières dans les domaines des sciences et de la technologie. Cette filière inclut des matières telles que les mathématiques, la physique, la chimie, la biologie, et parfois l’informatique.\r\n\r\nLes élèves qui choisissent cette filière acquièrent des compétences analytiques et pratiques qui leur permettent de poursuivre des études supérieures dans des domaines comme l’ingénierie, la médecine, les sciences naturelles, et les technologies de l’information. Ils peuvent également entrer directement sur le marché du travail dans des rôles techniques ou scientifiques.'),
(2, 'Commerciale', 'La commerciale est une filière d’enseignement secondaire qui prépare les élèves à des carrières dans le domaine du commerce et de la gestion. Cette option inclut des matières telles que l’économie, la comptabilité, le marketing, la gestion des entreprises, et parfois des cours de droit commercial.\n\nLes élèves qui choisissent cette filière acquièrent des compétences pratiques et théoriques qui leur permettent de poursuivre des études supérieures dans des domaines connexes ou d’entrer directement sur le marché du travail dans des rôles administratifs, comptables, ou de gestion1.'),
(3, 'Littéraire', 'La littéraire est une filière qui se concentre sur l’étude des lettres, des langues, et des sciences humaines. Les matières principales incluent la littérature, la philosophie, l’histoire, la géographie, et souvent des langues étrangères comme l’anglais ou l’espagnol.\r\n\r\nLes élèves qui choisissent cette filière développent des compétences en analyse critique, en rédaction, et en communication. Ils sont bien préparés pour poursuivre des études supérieures dans des domaines tels que les lettres, les sciences humaines, le journalisme, le droit, et l’enseignement.'),
(4, 'Humanitaire', 'le cycle est l\'initiation au choix de votre futire option');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `statut` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`, `statut`) VALUES
(1, 'strategie', 'pmilambo@gmail.com', 'd827eb711dc0d40de2429833a9d9f349', 'admin'),
(2, 'henri', 'pmilambo52@gmail.com', 'd827eb711dc0d40de2429833a9d9f349', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_option` (`id_option`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `eleves_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `eleves_ibfk_2` FOREIGN KEY (`id_option`) REFERENCES `options` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
