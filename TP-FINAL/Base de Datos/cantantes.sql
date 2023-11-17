-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 20:50:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cantantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id_cancion` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `compositor` varchar(255) NOT NULL,
  `año_publicacion` year(4) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id_cancion`, `titulo`, `compositor`, `año_publicacion`, `genero`, `duracion`) VALUES
(1, 'La flauta mágica', 'Wolfgang Amadeus Mozart', '0000', 'Ópera', 70),
(2, 'Sinfonía n.º 5', 'Ludwig van Beethoven', '0000', 'Sinfonía', 30),
(3, 'Noctámbulos', 'Frédéric Chopin', '0000', 'Nocturnal', 5),
(4, 'Cuarteto de cuerda n.º 15', 'Johannes Brahms', '0000', 'Cuarteto de cuerda', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantantes`
--

CREATE TABLE `cantantes` (
  `id_cantante` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cantantes`
--

INSERT INTO `cantantes` (`id_cantante`, `nombre`, `fecha_nacimiento`, `nacionalidad`) VALUES
(1, 'Wolfgang Amadeus Mozart', '1756-01-27', 'Austria'),
(2, 'Ludwig van Beethoven', '1827-03-26', 'Alemania'),
(3, 'Frédéric Chopin', '1810-03-01', 'Polonia'),
(4, 'Johannes Brahms', '1833-05-03', 'Alemania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantantes_canciones`
--

CREATE TABLE `cantantes_canciones` (
  `id_cantante` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cantantes_canciones`
--

INSERT INTO `cantantes_canciones` (`id_cantante`, `id_cancion`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id_cancion`);

--
-- Indices de la tabla `cantantes`
--
ALTER TABLE `cantantes`
  ADD PRIMARY KEY (`id_cantante`);

--
-- Indices de la tabla `cantantes_canciones`
--
ALTER TABLE `cantantes_canciones`
  ADD PRIMARY KEY (`id_cantante`,`id_cancion`),
  ADD KEY `id_cancion` (`id_cancion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cantantes`
--
ALTER TABLE `cantantes`
  MODIFY `id_cantante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cantantes_canciones`
--
ALTER TABLE `cantantes_canciones`
  ADD CONSTRAINT `cantantes_canciones_ibfk_1` FOREIGN KEY (`id_cantante`) REFERENCES `cantantes` (`id_cantante`),
  ADD CONSTRAINT `cantantes_canciones_ibfk_2` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id_cancion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
