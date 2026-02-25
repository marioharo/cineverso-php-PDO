-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 25-02-2026 a las 01:40:19
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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perfil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `password`, `perfil`) VALUES
(2, 'mario', 'haro', 'marioharo@gmail.com', '$2y$10$5PGEKxZWWn0Zaj7rA.Y9QeUXZNG38uyR5FIE9c4pwKPqN0H09PPVK', 1),
(3, 'lizeth', 'jimenez', 'lizeth@gmail.com', '$2y$10$W.QH4vY.YMY5xhBhxLhnI.MUu6z3v3sDc7xGxen/gwu9htVyAV3Yi', 1),
(4, 'maricela', 'agreda', 'maricela@gmail.com', '$2y$10$kw7aEMghm7ojnxg98sHrZuL3fAHiZUrRawdM9jL8j0kfeoeMu9.ZG', 2),
(5, 'isabel', 'sanchez', 'isabel@gmail.com', '$2y$10$8EKg2i9Ai/b1.o3HnmHDT.G1bhcbJ.Z8CNYmp8RT7WHtE1YERImDO', 2),
(6, 'mario', 'salirrosas', 'mario2@gmail.com', '$2y$10$6f3mL82ATL5eEytVpmetVuWCQQvKQ6I96bJrypgeTPT3UjCGoY/4K', 2),
(7, 'lucas', 'lanthier', 'lucas@gmail.com', '$2y$10$kEluBHJZg2DgZAcURyNL8.lEDqK1/Ip2VX9nfJYuVDNOKg2Yw1vlG', 1),
(8, 'juan', 'benitez', 'juan@gmail.com', '$2y$10$Y6hDXhmJ6JOA8a2RgieJ.uZ/pS8AYtble8iyYaSvUEMzGdxWPcJym', 1),
(9, 'nicolas', 'fuenzalida', 'nicolas@gmail.com', '$2y$10$1niy2g/ySKOfwuKlIq5qieFsBz6RT4FbbqktAdMt//EkvrXG.9YBe', 2),
(10, 'vanessa', 'valdez', 'vanessa@gmail.com', '$2y$10$ruZeoCrk6PDUC0Y2O6FuqOk5cviQJOsmYm92Zu2MzzdFC4WU8H7FG', 2),
(11, 'carlos', 'hinostrosa', 'carlos@gmail.com', '$2y$10$sHwxiLzksdvEZJP7CYtvkeutElQPSfhGj.IdoHOl7cx0CbdkvODNW', 2),
(12, 'daniel', 'cañas', 'daniel@gmail.com', '$2y$10$ctb86CCn28aF7AoxGkXKIehdjOy8ILXoc6wgF3FdixZuEzA2PS836', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
