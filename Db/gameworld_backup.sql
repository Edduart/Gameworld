-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 05:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `usuario`, `correo`, `contraseña`, `telefono`) VALUES
(6, 'Pepe', 'Pepon', 'pepito43', '1234', '0424123'),
(7, 'admin', 'admin', 'dfdsfdf', 'admin', '123'),
(8, 'edgardo', 'edgardo', 'edgardo', '123', '4165454424'),
(9, 'edd', 'edd', 'edd', '123', '28937389'),
(10, 'jesus', 'Jesus', 'Jesus', '123', '3783673'),
(11, 'jesus', 'Jesus', 'Jesus', '123', '3783673'),
(12, 'jesus', 'Jesus', 'Jesus', '123', '3783673'),
(13, 'dbdbj', 'bhdvbhjd', 'ddgvghd', '123', 'dhdb'),
(14, 'dbdbj', 'bhdvbhjd', 'ddgvghd', '123', 'dhdb');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(15) NOT NULL,
  `ID_catergoria` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  `Image_URL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`ID_Producto`, `Nombre_Producto`, `ID_catergoria`, `Descripcion`, `Precio`, `Image_URL`) VALUES
(1, 'Steam Gift Card', 1, 'Gift Card para steam store.', 5, 'Resources/Productos/steam.jpeg'),
(2, 'Steam Gift Card', 2, 'Gift Card para steam store.', 10, 'Resources/Productos/steam.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
