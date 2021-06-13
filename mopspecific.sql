-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2021 a las 22:15:59
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mopspecific`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificacion`
--

CREATE TABLE `especificacion` (
  `id_especificacion` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `preparacionS` text NOT NULL,
  `configP` text NOT NULL,
  `relacionM` text NOT NULL,
  `presionA` text NOT NULL,
  `aplicacion` text NOT NULL,
  `tiempoV` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especificacion`
--

INSERT INTO `especificacion` (`id_especificacion`, `id_modelo`, `descripcion`, `preparacionS`, `configP`, `relacionM`, `presionA`, `aplicacion`, `tiempoV`) VALUES
(1, 1, 'Es un primario universal con excelente adherencia sobre \r\nlámina desnuda (pequeñas superficies) y superior adherencia de los \r\nacabados. Este fondo puede aplicarse después de la pasta resanadora, \r\nprimarios de superficie o acabados originales, para reparaciones de \r\npequeñas imperfecciones, piezas completas y reparación general. \r\nUtilizado bajo el sistema ALSA*PRIME-SHADOW se obtiene el mejor \r\nrendimiento del acabado al prevenir el rechupado y optimizar el poder \r\ncubriente, incrementando la productividad y reduciendo el consumo', '1. Limpie perfectamente la superficie con el fin de eliminar polvo, grasa, \r\naceites y silicones con detergente y agua y con ALSA*CLEAN 62-000; \r\ndespués lije con lija P320; enjuague y seque perfectamente.\r\n2. En las áreas donde se requiera trabajo de hojalatería elimine todos los \r\nrecubrimientos hasta dejar el metal desnudo; utilice lija de esmeril o si lo \r\nprefiere removedor ALSA*REM (62-201).\r\n3. Tratar el metal descubierto y las áreas oxidadas con acondicionador de \r\nmetales ALSA*NOX (65-007).\r\n4. Repare las imperfecciones mayores y/o abolladuras que tenga la \r\nlámina, utilizando la pasta resanadora ALSA*GRIP (63-700) o ALSA* \r\nRACING (63-200).', 'Convencional\r\nAlimentación por gravedad 1.4 mm - 1.6 mm (.055\" - .063\")\r\nHVLP\r\nAlimentación por gravedad 1.3 mm - 1.5 mm (.051\" - .06\")', 'Relación de mezcla 1:1.5 o 1:2 en volumen.\r\nUtilice una pala graduada para medidas exactas.\r\nMezcle: Una (1) parte de ALSA*PRIM\r\n 1.5 o 2 partes de Thiner Americano (90-001)', 'Convencional\r\nAlimentación por gravedad: 35 - 45 psi en la pistola\r\nHVLP\r\nAlimentación por gravedad: 8 - 10 psi en la boquilla de la pistola\r\n 25 - 30 psi en la pistola', 'Aplique 2 a 3 manos.', 'Oreo entre manos 5 - 10 minutos\r\nSecado al aire\r\nLijado en seco a 23°C: 60 minutos\r\nAcabado: 60 minutos.'),
(2, 2, 'Es un esmalte acrílico de alta calidad, de secado óptimo, \r\nexcelente resistencia a la intemperie, con colores firmes, cuya \r\ncomposición permite obtener un acabado acrílico de excelente \r\napariencia, nivelación y brillo, adecuado a sus necesidades de \r\nproductividad. Es un acabado acrílico modificado de dos componentes \r\npara reparaciones totales y de pequeñas imperfecciones', 'La superficie debe estar debidamente preparada, libre de polvo y grasa.\r\nEn el repintado asentar la superficie y limpiar con ALSA*CLEAN 62-000.\r\nCuando se aplique sobre acabado brillante, eliminar brillo con lija \r\n400/800, para acabado envejecido, sellar la superficie con primario \r\nuniversal', 'Convencional:\r\nAlimentación por gravedad 1.4 mm - 1.5 mm (.055” - .059”)\r\nHVLP:\r\nAlimentación por gravedad 1.3 mm - 1.5 mm (.055” - .063”)', 'Relación de mezcla 8:1:6 en volumen con Catalizador Universal y \r\nReductor Acrílico.\r\nUtilice una pala graduada para medidas exactas.\r\nMezcle: \r\n 8 (ocho) partes de ALSA*CAR\r\n 1 (una) parte de Catalizador Universal\r\n 6 (seis) partes de Reductor Acrílico', 'Presión de aire:\r\n Pistola Convencional: 35 - 45 psi en la pistola.\r\n Pistola HVLP: 30 psi máx', 'Aplicar de dos a tres manos, aplicar una mano adicional para acomodo \r\nde pigmentos metálicos si así se requiere', '6.0 horas a 23°C.\r\nNo requiere el uso adicional de acelerador de curado ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `marca`) VALUES
(1, 'Alsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `modelo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `id_marca`, `modelo`) VALUES
(1, 1, 'Prim'),
(2, 1, 'Car');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id_permissions` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id_permissions`, `type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `id_permissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `password`, `email`, `id_permissions`) VALUES
(2, 'Mario', '$2y$04$pOd4Zb6akBniuWJHA15TFudApw9ffPXqvq4hzA7IO5CEd1zBxzKe.', 'prueba3cx@pudxe.com', 2),
(3, 'Alberto', '$2y$04$ttILdWkmTH7R8J4meenyXu8bBxQwLO8EFm4d81i4km54VHgbhHfr.', 'prueba2@prueba.com', 1),
(5, 'Noemi', '$2y$04$wvRuflYhCMijUBoZxKG9n.tNQ.Eh/nYs2QQvLtJMYja4X3yjiEpJ.', 'prueba4@prueba.com', 1),
(6, 'Esmeralda', '$2y$04$ORQBGN1PeWb1xjwtIiHCQOXqEPQ8wI/TY/J9bNHoeOu6wE8nm9/u2', 'prueba6@prueba.com', 2),
(8, 'angel', '$2y$04$vqwVWrXMD6w54EtFg6B6LuB5ybG0jn09Q8yZwOWg91m8umKVRLv1.', 'angel@angel.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especificacion`
--
ALTER TABLE `especificacion`
  ADD PRIMARY KEY (`id_especificacion`),
  ADD KEY `id_modelo` (`id_modelo`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permissions`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_permissions` (`id_permissions`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especificacion`
--
ALTER TABLE `especificacion`
  MODIFY `id_especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permissions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especificacion`
--
ALTER TABLE `especificacion`
  ADD CONSTRAINT `especificacion_ibfk_1` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_permissions`) REFERENCES `permissions` (`id_permissions`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
