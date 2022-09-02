-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-09-2022 a las 23:16:14
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticket-manager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220831172449', '2022-08-31 17:24:56', 59),
('DoctrineMigrations\\Version20220831224713', '2022-08-31 22:47:23', 74),
('DoctrineMigrations\\Version20220831224835', '2022-08-31 22:48:39', 16),
('DoctrineMigrations\\Version20220831225050', '2022-08-31 22:50:58', 176),
('DoctrineMigrations\\Version20220831225225', '2022-08-31 22:52:31', 48),
('DoctrineMigrations\\Version20220831225425', '2022-08-31 22:54:32', 151),
('DoctrineMigrations\\Version20220901013814', '2022-09-01 01:38:21', 119),
('DoctrineMigrations\\Version20220901014148', '2022-09-01 01:41:55', 165),
('DoctrineMigrations\\Version20220901014449', '2022-09-01 01:45:05', 78),
('DoctrineMigrations\\Version20220901014755', '2022-09-01 01:48:05', 163),
('DoctrineMigrations\\Version20220901015025', '2022-09-01 01:50:32', 166);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `facturador_id` int(11) DEFAULT NULL,
  `valor_a_cancelar` double DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `ticket_id`, `facturador_id`, `valor_a_cancelar`, `fecha`) VALUES
(1, 1, 3, 20, '2022-09-01'),
(2, 5, 3, 60, '2022-08-01'),
(3, 2, 3, 40, '2021-09-01'),
(4, 3, 3, 50, '2022-04-01'),
(5, 4, 3, 1000, '2022-09-07'),
(6, 6, 3, 10, '2022-09-04'),
(7, 7, 3, 40, '2021-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `id` int(11) NOT NULL,
  `tipo_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_por_hora` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`id`, `tipo_trabajo`, `valor_por_hora`) VALUES
(1, 'servicio tecnico', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `tecnico_id` int(11) DEFAULT NULL,
  `problema` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `solucion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `estado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `cliente_id`, `tecnico_id`, `problema`, `solucion`, `horas`, `estado`) VALUES
(1, 1, 2, 'problema 1', 'solucion 1', 2, 'F'),
(2, 1, 2, 'problema 2', 'solucion 2', 4, 'F'),
(3, 1, 2, 'problema 3', 'solucion 3', 5, 'F'),
(4, 4, 2, 'problema 1', 'solución 5', 100, 'F'),
(5, 4, 2, 'problema 2', 'solucion 4', 6, 'F'),
(6, 1, 2, 'No hay Internet.', 'Resetear router.', 1, 'I'),
(7, 7, 8, 'No tengo Internet.', 'Resetear Router', 4, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'cliente@xyz.com', '[\"ROLE_CLIENTE\",\"ROLE_USER\"]', '$2y$13$RCsKigo/AL3L9NcWUrBSh.E8Fh8fisUbK/Lu8FYxHoikzu95gdUrS'),
(2, 'tecnico@xyz.com', '[\"ROLE_TECNICO\",\"ROLE_USER\"]', '$2y$13$.GfrsSphpMHFxddlcoFETebWcOdfQukUoW6AdPOZaNVbtdC.DMWi.'),
(3, 'facturador@xyz.com', '[\"ROLE_FACTURADOR\",\"ROLE_USER\"]', '$2y$13$WpITXTLFeoygdIDLQ9HigeF4xdxI4X5tMDovHWwrTtnP3bkSMCdLi'),
(4, 'cliente2@xyz.com', '[\"ROLE_CLIENTE\",\"ROLE_USER\"]', '$2y$13$OKCqDUp5cKQcPcqyM/YrweGLFFAHeORt3KtqtqoMyQXsD9CgLxI8y'),
(5, 'gerente@xyz.com', '[\"ROLE_GERENTE\",\"ROLE_USER\"]', '$2y$13$EEMmjBzeZ6Wa5aiIm9X1lurSgX187Jaa/8aMlLmkd/6gtOm8vcm7.'),
(6, 'gerente2@xyz.com', '[\"ROLE_GERENTE\",\"ROLE_USER\"]', '$2y$13$iC9yxQnfvvDUgskBZWukkuoePp9AOkJQqKSfoPMS6BUURJoX2E5Ua'),
(7, 'cliente3@xyz.com', '[\"ROLE_CLIENTE\",\"ROLE_USER\"]', '$2y$13$C3PYjHKtlnFyQ3jUQEclJuQIuN92QadgWnpOH6edD84Xj7ehHHxIq'),
(8, 'tecnico2@xyz.com', '[\"ROLE_TECNICO\",\"ROLE_USER\"]', '$2y$13$4Hpc5ySl6IzwH8cOgDXxAOv4yvJi7QFwAZUyoUW90aqOEXIxAy5Rm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F9EBA009700047D2` (`ticket_id`),
  ADD KEY `IDX_F9EBA0098DB0387E` (`facturador_id`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_97A0ADA3DE734E51` (`cliente_id`),
  ADD KEY `IDX_97A0ADA3841DB1E7` (`tecnico_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FK_F9EBA009700047D2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `FK_F9EBA0098DB0387E` FOREIGN KEY (`facturador_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `FK_97A0ADA3841DB1E7` FOREIGN KEY (`tecnico_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_97A0ADA3DE734E51` FOREIGN KEY (`cliente_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
