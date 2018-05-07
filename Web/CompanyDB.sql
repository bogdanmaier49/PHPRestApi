-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07 Mai 2018 la 12:43
-- Versiune server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CompanyDB`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `Employees`
--

CREATE TABLE `Employees` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Age` int(11) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `Employees`
--

INSERT INTO `Employees` (`ID`, `FirstName`, `LastName`, `Email`, `Password`, `Age`, `Role`, `Profile`) VALUES
(6, 'Bogdan', 'Maier', 'bogdanmaier49@gmail.com', '12345', 20, 'Admin', 0),
(7, 'Tudor', 'Trif', 'tudor@gmail.com', '123456', 21, 'Admin', 0),
(8, 'Tudor', 'Muresan', 'tudormuresan@gmail.com', '123456', 20, 'Dev', 0),
(9, 'Andrei', 'Pop', 'adnreipop@gmail.com', '123456', 26, 'Dev', 0),
(10, 'Dragos', 'Pop', 'dragospop@gmail.com', '123456', 33, 'Dev', 0),
(15, 'Bogdan', 'Maier', 'bogdanmaier492@gmail.com', '123456', 20, 'Dev', 0),
(19, 'Bogdan', 'Maier', 'bogdanmaier493@gmail.com', '123456', 20, 'Dev', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
