-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 13, 2023 at 08:15 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bieren_winkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bieren`
--

CREATE TABLE `bieren` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(250) NOT NULL,
  `beschrijving` varchar(250) NOT NULL,
  `brouwerij_id` int(11) NOT NULL,
  `prijs` float NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bieren`
--

INSERT INTO `bieren` (`id`, `naam`, `beschrijving`, `brouwerij_id`, `prijs`, `stock`) VALUES
(1, 'Duvel', 'Lekker pittig, maar ook fruitig.', 1, 3.5, 3),
(2, 'Leffe Bruin', 'Lekker pittig, maar ook fruitig.', 2, 3.5, 10),
(3, 'Leffe Blond', 'Lekker pittig, maar ook fruitig.', 2, 3.5, 0),
(4, 'La Chouffe', 'Lekker pittig, maar ook fruitig.', 3, 3.5, 10),
(5, 'Mc Chouffe', 'Lekker pittig, maar ook fruitig.', 3, 3.5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `brouwerij`
--

CREATE TABLE `brouwerij` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brouwerij`
--

INSERT INTO `brouwerij` (`id`, `naam`) VALUES
(1, 'Moortgat'),
(2, 'Leffe'),
(3, 'Chouffe');

-- --------------------------------------------------------

--
-- Table structure for table `gemeentes`
--

CREATE TABLE `gemeentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `gemeente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gemeentes`
--

INSERT INTO `gemeentes` (`id`, `postcode`, `gemeente`) VALUES
(1, '3500', 'Hasselt'),
(2, '3580', 'Beringen'),
(3, '3550', 'Heusden-Zolder');

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `gemeente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`id`, `naam`, `email`, `adres`, `gemeente_id`) VALUES
(1, 'John Doe', 'johndoe@test.be', 'Straat Twee 30', 1),
(2, 'Jane Li', 'janeli@test.be', 'Straat Vier 52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bieren_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `totaal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bieren`
--
ALTER TABLE `bieren`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brouwerij`
--
ALTER TABLE `brouwerij`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gemeentes`
--
ALTER TABLE `gemeentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
