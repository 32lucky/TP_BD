-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 08:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'ahmed', 'ahmed2004', 'ahmed07092004@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bonlivraison`
--

CREATE TABLE `bonlivraison` (
  `num_demande` int(11) NOT NULL,
  `code_fournisseur` int(11) NOT NULL,
  `vise_par` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonreception`
--

CREATE TABLE `bonreception` (
  `num_demande` int(11) NOT NULL,
  `matricule_chauffeur` int(11) DEFAULT NULL,
  `num_immatriculation` varchar(20) DEFAULT NULL,
  `code_client` int(11) DEFAULT NULL,
  `code_marchandise` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `camion`
--

CREATE TABLE `camion` (
  `num_immatriculation` varchar(20) NOT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `capacite_charge` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chauffeurlivreur`
--

CREATE TABLE `chauffeurlivreur` (
  `matricule_chauffeur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_table`
--

CREATE TABLE `client_table` (
  `code_client` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_table`
--

INSERT INTO `client_table` (`code_client`, `name`, `address`, `phone_number`, `Email`, `Password`) VALUES
(2, 'czxc', 'DASJDASIDN', '2138130', 'AHMED@Gasd.COM', 'ASDOJADOIAS'),
(3, 'zayrix ', 'jelfa', '0148120983192', 'jelfa@gmail.com', 'asdpojasjd'),
(5, 'asdasdas', 'sadasd', '123123', 'ahmed07092004@gmail.com', 'ahmed2004'),
(6, 'massmi', 'adoajsd', '1231', 'ahmed07092004@gmail.com', 'ahmed2004'),
(7, 'yami', 'asdlajhd', '2131', 'yami@gmail.com', 'yami');

-- --------------------------------------------------------

--
-- Table structure for table `demandelivraison`
--

CREATE TABLE `demandelivraison` (
  `num_demande` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `code_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enlevementlivraison`
--

CREATE TABLE `enlevementlivraison` (
  `num_demande` int(11) NOT NULL,
  `code_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `adresse`, `telephone`, `Password`) VALUES
(11, 'sadasd', 'asdasd', '123123', ''),
(12, 'asda', 'asdasd', 'asdasd', ''),
(13, 'rqwdqwd', 'qwdqwdqw', '12312', 'asdasd'),
(14, 'asdasd', 'dss', 'ds', 'asdasd'),
(15, 'yami', 'aslkdja', '21037128', 'yami');

-- --------------------------------------------------------

--
-- Table structure for table `livraison`
--

CREATE TABLE `livraison` (
  `num_demande` int(11) NOT NULL,
  `matricule_chauffeur` int(11) DEFAULT NULL,
  `num_immatriculation` varchar(20) DEFAULT NULL,
  `matricule_manutentionnaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manutentionnaire`
--

CREATE TABLE `manutentionnaire` (
  `matricule_manutentionnaire` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marchandise`
--

CREATE TABLE `marchandise` (
  `code_marchandise` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marchandise`
--

INSERT INTO `marchandise` (`code_marchandise`, `label`, `price`) VALUES
(1, 'sadasd', 212),
(2, 'sad', 2112),
(4, 'asdkjasdlj', 232323);

-- --------------------------------------------------------

--
-- Table structure for table `marchandisefournisseur`
--

CREATE TABLE `marchandisefournisseur` (
  `code_marchandise` int(11) NOT NULL,
  `code_fournisseur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD PRIMARY KEY (`num_demande`,`code_fournisseur`),
  ADD KEY `code_fournisseur` (`code_fournisseur`),
  ADD KEY `vise_par` (`vise_par`);

--
-- Indexes for table `bonreception`
--
ALTER TABLE `bonreception`
  ADD PRIMARY KEY (`num_demande`),
  ADD KEY `matricule_chauffeur` (`matricule_chauffeur`),
  ADD KEY `num_immatriculation` (`num_immatriculation`),
  ADD KEY `code_client` (`code_client`),
  ADD KEY `code_marchandise` (`code_marchandise`);

--
-- Indexes for table `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`num_immatriculation`);

--
-- Indexes for table `chauffeurlivreur`
--
ALTER TABLE `chauffeurlivreur`
  ADD PRIMARY KEY (`matricule_chauffeur`);

--
-- Indexes for table `client_table`
--
ALTER TABLE `client_table`
  ADD PRIMARY KEY (`code_client`);

--
-- Indexes for table `demandelivraison`
--
ALTER TABLE `demandelivraison`
  ADD PRIMARY KEY (`num_demande`),
  ADD KEY `code_client` (`code_client`);

--
-- Indexes for table `enlevementlivraison`
--
ALTER TABLE `enlevementlivraison`
  ADD PRIMARY KEY (`num_demande`,`code_fournisseur`),
  ADD KEY `code_fournisseur` (`code_fournisseur`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`num_demande`),
  ADD KEY `matricule_chauffeur` (`matricule_chauffeur`),
  ADD KEY `num_immatriculation` (`num_immatriculation`),
  ADD KEY `matricule_manutentionnaire` (`matricule_manutentionnaire`);

--
-- Indexes for table `manutentionnaire`
--
ALTER TABLE `manutentionnaire`
  ADD PRIMARY KEY (`matricule_manutentionnaire`);

--
-- Indexes for table `marchandise`
--
ALTER TABLE `marchandise`
  ADD PRIMARY KEY (`code_marchandise`);

--
-- Indexes for table `marchandisefournisseur`
--
ALTER TABLE `marchandisefournisseur`
  ADD PRIMARY KEY (`code_marchandise`,`code_fournisseur`),
  ADD KEY `code_fournisseur` (`code_fournisseur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  MODIFY `num_demande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonreception`
--
ALTER TABLE `bonreception`
  MODIFY `num_demande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chauffeurlivreur`
--
ALTER TABLE `chauffeurlivreur`
  MODIFY `matricule_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client_table`
--
ALTER TABLE `client_table`
  MODIFY `code_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `demandelivraison`
--
ALTER TABLE `demandelivraison`
  MODIFY `num_demande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `manutentionnaire`
--
ALTER TABLE `manutentionnaire`
  MODIFY `matricule_manutentionnaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marchandise`
--
ALTER TABLE `marchandise`
  MODIFY `code_marchandise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD CONSTRAINT `bonlivraison_ibfk_1` FOREIGN KEY (`num_demande`) REFERENCES `demandelivraison` (`num_demande`),
  ADD CONSTRAINT `bonlivraison_ibfk_2` FOREIGN KEY (`code_fournisseur`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `bonlivraison_ibfk_3` FOREIGN KEY (`vise_par`) REFERENCES `chauffeurlivreur` (`matricule_chauffeur`);

--
-- Constraints for table `bonreception`
--
ALTER TABLE `bonreception`
  ADD CONSTRAINT `bonreception_ibfk_1` FOREIGN KEY (`num_demande`) REFERENCES `demandelivraison` (`num_demande`),
  ADD CONSTRAINT `bonreception_ibfk_2` FOREIGN KEY (`matricule_chauffeur`) REFERENCES `chauffeurlivreur` (`matricule_chauffeur`),
  ADD CONSTRAINT `bonreception_ibfk_3` FOREIGN KEY (`num_immatriculation`) REFERENCES `camion` (`num_immatriculation`),
  ADD CONSTRAINT `bonreception_ibfk_4` FOREIGN KEY (`code_client`) REFERENCES `client_table` (`code_client`),
  ADD CONSTRAINT `bonreception_ibfk_5` FOREIGN KEY (`code_marchandise`) REFERENCES `marchandise` (`code_marchandise`);

--
-- Constraints for table `demandelivraison`
--
ALTER TABLE `demandelivraison`
  ADD CONSTRAINT `demandelivraison_ibfk_1` FOREIGN KEY (`code_client`) REFERENCES `client_table` (`code_client`);

--
-- Constraints for table `enlevementlivraison`
--
ALTER TABLE `enlevementlivraison`
  ADD CONSTRAINT `enlevementlivraison_ibfk_1` FOREIGN KEY (`num_demande`) REFERENCES `demandelivraison` (`num_demande`),
  ADD CONSTRAINT `enlevementlivraison_ibfk_2` FOREIGN KEY (`code_fournisseur`) REFERENCES `fournisseurs` (`id`);

--
-- Constraints for table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`num_demande`) REFERENCES `demandelivraison` (`num_demande`),
  ADD CONSTRAINT `livraison_ibfk_2` FOREIGN KEY (`matricule_chauffeur`) REFERENCES `chauffeurlivreur` (`matricule_chauffeur`),
  ADD CONSTRAINT `livraison_ibfk_3` FOREIGN KEY (`num_immatriculation`) REFERENCES `camion` (`num_immatriculation`),
  ADD CONSTRAINT `livraison_ibfk_4` FOREIGN KEY (`matricule_manutentionnaire`) REFERENCES `manutentionnaire` (`matricule_manutentionnaire`);

--
-- Constraints for table `marchandisefournisseur`
--
ALTER TABLE `marchandisefournisseur`
  ADD CONSTRAINT `marchandisefournisseur_ibfk_1` FOREIGN KEY (`code_marchandise`) REFERENCES `marchandise` (`code_marchandise`),
  ADD CONSTRAINT `marchandisefournisseur_ibfk_2` FOREIGN KEY (`code_fournisseur`) REFERENCES `fournisseurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
