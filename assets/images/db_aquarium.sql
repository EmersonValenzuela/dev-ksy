-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2023 a las 02:22:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_aquarium`
--
CREATE DATABASE IF NOT EXISTS `db_aquarium` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_aquarium`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_species`
--

DROP TABLE IF EXISTS `tbl_species`;
CREATE TABLE `tbl_species` (
  `id_specie` int(11) NOT NULL,
  `common_specie` varchar(50) NOT NULL,
  `scientific_specie` varchar(60) NOT NULL,
  `type_water` varchar(10) NOT NULL,
  `amount_fish` int(11) NOT NULL,
  `date_admission` varchar(30) NOT NULL,
  `reason_admission` varchar(100) NOT NULL,
  `date_exit` varchar(30) NOT NULL,
  `reason_exit` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_pass` varchar(12) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `user_photo` varchar(30) NOT NULL,
  `id_empoyee` varchar(20) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_pass`, `id_rol`, `user_mail`, `user_photo`, `id_empoyee`, `id_status`) VALUES
(1, 'EMERSON', 'valenzuela', 1, 'valenestradam1@gmail.com', '123456789', '12345678', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_species`
--
ALTER TABLE `tbl_species`
  ADD PRIMARY KEY (`id_specie`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_species`
--
ALTER TABLE `tbl_species`
  MODIFY `id_specie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
