-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2017 a las 11:42:56
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
`id_alumno` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `dni`, `nombre`, `apellido`, `edad`) VALUES
(1, '895875D', 'David', 'Cortes', 19),
(2, '9023723D', 'Camilo', 'Torres', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_cursos`
--

CREATE TABLE IF NOT EXISTS `alumnos_cursos` (
`id` int(11) NOT NULL,
  `fk_alumno` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alumnos_cursos`
--

INSERT INTO `alumnos_cursos` (`id`, `fk_alumno`, `fk_curso`) VALUES
(1, 1, 4),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
`id_curso` int(11) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fk_profesor` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `curso`, `descripcion`, `fk_profesor`) VALUES
(4, 'DAW', 'desarrollo de aplicaciones web', 1),
(5, 'DAM', 'desarrollo de aplicaciones multiplataforma', 2),
(20, 'ADE', 'administraciÃ³n de empresas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
`id_pago` int(11) NOT NULL,
  `num_pago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fk_alumno` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `num_pago`, `fecha`, `descripcion`, `fk_alumno`) VALUES
(1, 125655, '2017-03-07', 'Pago año curso', 1),
(2, 2356457, '2017-03-02', 'Pago año DAM', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_cursos`
--

CREATE TABLE IF NOT EXISTS `pagos_cursos` (
`id` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL,
  `fk_pago` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pagos_cursos`
--

INSERT INTO `pagos_cursos` (`id`, `fk_curso`, `fk_pago`) VALUES
(1, 4, 1),
(2, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
`id_profesor` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `dni`, `nombre`, `apellido`, `edad`) VALUES
(1, '5665343D', 'Jorge', 'Cruz', 35),
(2, '342399D', 'Carla', 'camargo', 36),
(5, '983434d', 'Juan', 'Aquilez', 44),
(6, '772823X', 'laura', 'torres', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`) VALUES
(1, 'juan david', 'cristancho', 'juanda02031992@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(2, 'juan', 'crist', 'juanda@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(3, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
 ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `alumnos_cursos`
--
ALTER TABLE `alumnos_cursos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `fk_curso` (`fk_curso`), ADD UNIQUE KEY `FK_alumno` (`fk_alumno`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
 ADD PRIMARY KEY (`id_curso`), ADD KEY `i_fk_profesor` (`fk_profesor`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`id_pago`), ADD UNIQUE KEY `id_alumno` (`fk_alumno`);

--
-- Indices de la tabla `pagos_cursos`
--
ALTER TABLE `pagos_cursos`
 ADD PRIMARY KEY (`id`), ADD KEY `i_fk_curso` (`fk_curso`), ADD KEY `i_fk_pago` (`fk_pago`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
 ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `alumnos_cursos`
--
ALTER TABLE `alumnos_cursos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pagos_cursos`
--
ALTER TABLE `pagos_cursos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_cursos`
--
ALTER TABLE `alumnos_cursos`
ADD CONSTRAINT `fk_alumnos` FOREIGN KEY (`fk_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cursos` FOREIGN KEY (`fk_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`fk_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`fk_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos_cursos`
--
ALTER TABLE `pagos_cursos`
ADD CONSTRAINT `pagos_cursos_ibfk_1` FOREIGN KEY (`fk_pago`) REFERENCES `pagos` (`id_pago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `pagos_cursos_ibfk_2` FOREIGN KEY (`fk_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
