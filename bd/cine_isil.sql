-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 11-02-2026 a las 20:32:34
-- Versión del servidor: 8.0.44
-- Versión de PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine_isil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calificacion` int NOT NULL,
  `premios` int NOT NULL,
  `fechaCreacion` date NOT NULL,
  `duracion` int NOT NULL,
  `genero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `titulo`, `calificacion`, `premios`, `fechaCreacion`, `duracion`, `genero`, `imagen`) VALUES
(1, 'Alien: Covenant', 40, 0, '2017-05-19', 122, 'Ciencia ficción, Terror, Thriller', 'https://lumiere-a.akamaihd.net/v1/images/image_f9126949.jpeg'),
(2, 'Titanic', 80, 4, '1998-01-23', 194, 'Romance, Aventura', 'https://pics.filmaffinity.com/Titanic-321994924-large.jpg'),
(3, 'Intensamente 2', 90, 10, '2024-06-14', 96, 'Animación, Aventura, Infantil', 'https://lumiere-a.akamaihd.net/v1/images/1_intensamente_2_payoff_banner_pre_1_aa3d9114.png'),
(4, 'Duna: parte dos', 8, 2, '2021-10-22', 166, 'Ciencia ficción, Acción', 'https://m.media-amazon.com/images/M/MV5BNzBiMTQ0YjMtZDRhMC00ZDU4LTk3MDMtNWQxOGMwMjQzYjc4XkEyXkFqcGc@._V1_.jpg'),
(5, 'Avatar: El sentido del agua', 75, 1, '2022-12-16', 192, 'Ciencia ficcion, Fantasía', 'https://es.web.img3.acsta.net/pictures/22/11/02/15/37/0544148.jpg'),
(6, 'El Origen', 85, 13, '2010-07-28', 148, 'Acción, Aventura, Ciencia ficción', 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_FMjpg_UX1000_.jpg'),
(7, 'The Matrix', 87, 9, '1999-03-31', 136, 'Acción, Ciencia ficción', 'https://m.media-amazon.com/images/M/MV5BN2NmN2VhMTQtMDNiOS00NDlhLTliMjgtODE2ZTY0ODQyNDRhXkEyXkFqcGc@._V1_.jpg'),
(8, 'Parásitos', 85, 4, '2019-05-30', 132, 'Suspenso, Comedia', 'https://m.media-amazon.com/images/M/MV5BYjk1Y2U4MjQtY2ZiNS00OWQyLWI3MmYtZWUwNmRjYWRiNWNhXkEyXkFqcGc@._V1_.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
