-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-08-2011 a las 12:22:38
-- Versión del servidor: 5.1.54
-- Versión de PHP: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblos_g3`
--
CREATE DATABASE `biblos_g3` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `biblos_g3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `usuario_dni` int(8) unsigned zerofill NOT NULL,
  `fecha_hora_entrada` datetime NOT NULL,
  `fecha_hora_salida` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`fecha_hora_entrada`),
  KEY `fk_acceso_usuario1` (`usuario_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='control de accesos';

--
-- Volcar la base de datos para la tabla `acceso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_autor` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1_autor` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2_autor` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='autores' AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre_autor`, `apellido1_autor`, `apellido2_autor`) VALUES
(1, 'Ken', 'Follet', NULL),
(2, 'Miguel', 'de Cervantes', 'Saavedra'),
(3, 'Dante', 'Alighieri', NULL),
(4, 'Julio', 'Verne', NULL),
(5, 'Franz', 'Kafka', NULL),
(6, 'Isaac', 'Asimov', NULL),
(7, 'J.K.', 'Rowlig', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dewey`
--

CREATE TABLE IF NOT EXISTS `dewey` (
  `categoria_dewey` smallint(3) unsigned zerofill NOT NULL,
  `nombre_categoria_dewey` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`categoria_dewey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Clasificación decimal de Dewey\n';

--
-- Volcar la base de datos para la tabla `dewey`
--

INSERT INTO `dewey` (`categoria_dewey`, `nombre_categoria_dewey`) VALUES
(000, 'Obras Generales'),
(100, 'Filosofía'),
(200, 'Religión'),
(300, 'Ciencias Sociales'),
(400, 'Lingüística'),
(500, 'Ciencias Puras'),
(600, 'Ciencias Aplicadas'),
(700, 'Artes y Recreación'),
(800, 'Literatura'),
(900, 'Historia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_editorial` smallint(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre_editorial` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de editoriales' AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `nombre_editorial`) VALUES
(00001, 'Planeta'),
(00002, 'Anaya'),
(00003, 'Ramón Sopena editorial S.A.'),
(00004, 'Amazon'),
(00005, 'Fantasia'),
(00006, 'schocken books'),
(00007, 'salamandra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma_639_1`
--

CREATE TABLE IF NOT EXISTS `idioma_639_1` (
  `id_idioma_639_1` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `idioma_639_1` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_idioma_639_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de idiomas';

--
-- Volcar la base de datos para la tabla `idioma_639_1`
--

INSERT INTO `idioma_639_1` (`id_idioma_639_1`, `idioma_639_1`) VALUES
('en', 'inglés'),
('es', 'español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE IF NOT EXISTS `plantilla` (
  `id_plantilla` tinyint(3) unsigned NOT NULL,
  `nombre_plantilla` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_plantilla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Plantillas de hojas de estilo CSS';

--
-- Volcar la base de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id_plantilla`, `nombre_plantilla`) VALUES
(1, 'plantilla1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo_usuario` tinyint(3) unsigned NOT NULL,
  `tipo_usuario` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='tabla de tipo de usuarios';

--
-- Volcar la base de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(0, 'administrador'),
(1, 'lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE IF NOT EXISTS `titulo` (
  `dewey_categoria_dewey` smallint(3) unsigned zerofill NOT NULL,
  `id_apellido` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `id_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_titulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `isbn` bigint(10) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `fecha_adquisicion` datetime DEFAULT NULL,
  `sinopsis` text COLLATE latin1_spanish_ci,
  `num_paginas` smallint(5) unsigned DEFAULT NULL,
  `edicion` tinyint(3) unsigned NOT NULL,
  `editorial_id_editorial` smallint(5) unsigned zerofill NOT NULL,
  `idioma_639_1_id_idioma_639_1` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`dewey_categoria_dewey`,`id_apellido`,`id_titulo`),
  KEY `fk_ttitulo_dewey1` (`dewey_categoria_dewey`),
  KEY `fk_titulo_editorial1` (`editorial_id_editorial`),
  KEY `fk_titulo_idioma_639_11` (`idioma_639_1_id_idioma_639_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='titulo';

--
-- Volcar la base de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`dewey_categoria_dewey`, `id_apellido`, `id_titulo`, `nombre_titulo`, `isbn`, `fecha_publicacion`, `fecha_adquisicion`, `sinopsis`, `num_paginas`, `edicion`, `editorial_id_editorial`, `idioma_639_1_id_idioma_639_1`) VALUES
(000, 'ALI', 'THE', 'The divine comedy', 192835025, '0000-00-00', '2011-08-17 10:46:16', 'This story begins in a shadowed forest on Good Friday in the year of our Lord 1300. It proceeds on a journey that, in its intense re-creation of the depths and the heights of human experience, has become the key with which Western civilization has sought to unlock the mystery of its own identity', 259, 1, 00004, 'en'),
(000, 'DCE', 'ELI', 'El ingenioso hidalgo don Quijote de la Mancha', 8430304070, '0000-00-00', '2011-08-17 10:35:28', 'El Quijote narra la historia de un hidalgo manchego, de unos cincuenta años, que se vuelve loco por leer muchos libros de caballerías. El protagonista llega a creer que las narraciones caballerescas relatan sucesos reales, y decide salir de su aldea en busca de aventuras similares a las de sus héroes literarios con el objetivo de<<desfacer agravios, enderezar entuertos y proteger doncellas>>. En su mente, confunde la realidad y la literatura: así, la venta de un camino le parecerá un castillo; los molinos serán gigantes, y los rebaños se transformarán en ejércitos de conocidos caballeros.     ', NULL, 1, 00003, 'es'),
(100, 'KAF', 'THE', 'The Metamorphosis ', 140015728, '0000-00-00', '2011-08-17 11:01:41', NULL, 500, 2, 00006, 'en'),
(300, 'ASI', 'FUN', 'Fundación', 8422626985, '0000-00-00', '2011-08-17 11:10:23', 'Literatura inglesa. Novela. Siglo XX.', 158, 2, 00004, 'es'),
(700, 'ROW', 'HAC', 'Harry Potter y la camara secreta', 9788498382679, '0000-00-00', '2011-08-16 11:20:22', 'Segundo libro de la saga', 288, 1, 00007, 'es'),
(700, 'ROW', 'HAR', 'Harry Potter y la piedra filosofal', 9788498382662, '0000-00-00', '2011-08-15 11:16:52', 'Primer libro de la saga', 256, 1, 00007, 'es'),
(800, 'FOL', 'los', 'Los Pilares de la Tierra', NULL, NULL, NULL, NULL, NULL, 1, 00001, 'es'),
(800, 'VER', 'DEL', 'De la tierra a la luna ', 8476347804, '0000-00-00', '2011-08-17 10:56:34', 'Literatura francesa. Siglo XIX. Novelas de Aventura. Ciencia Ficción.', 221, 1, 00005, 'es'),
(800, 'VER', 'VEI', 'Veinte mil leguas de viaje submarin', 8476348630, '0000-00-00', '2011-08-17 10:53:22', 'Literatura francesa. Siglo XIX. Novelas de Aventura. Ciencia Ficción.', 221, 1, 00005, 'es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_has_autor`
--

CREATE TABLE IF NOT EXISTS `titulo_has_autor` (
  `titulo_dewey_categoria_dewey` smallint(3) unsigned zerofill NOT NULL,
  `titulo_id_apellido` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_id_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `autor_id_autor` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`titulo_dewey_categoria_dewey`,`titulo_id_apellido`,`titulo_id_titulo`,`autor_id_autor`),
  KEY `fk_titulo_has_autor_autor1` (`autor_id_autor`),
  KEY `fk_titulo_has_autor_titulo1` (`titulo_dewey_categoria_dewey`,`titulo_id_apellido`,`titulo_id_titulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `titulo_has_autor`
--

INSERT INTO `titulo_has_autor` (`titulo_dewey_categoria_dewey`, `titulo_id_apellido`, `titulo_id_titulo`, `autor_id_autor`) VALUES
(800, 'FOL', 'LOS', 1),
(000, 'DCE', 'ELI', 2),
(000, 'ALI', 'THE', 3),
(800, 'VER', 'DEL', 4),
(800, 'VER', 'VEI', 4),
(100, 'KAF', 'THE', 5),
(300, 'ASI', 'FUN', 6),
(700, 'ROW', 'HAC', 7),
(700, 'ROW', 'HAR', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `dni` int(8) unsigned zerofill NOT NULL,
  `clave` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_usuario` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1_usuario` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2_usuario` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(13) NOT NULL,
  `direccion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `plantilla_id_plantilla` tinyint(3) unsigned NOT NULL,
  `tipo_id_tipo_usuario` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `fk_usuario_plantilla1` (`plantilla_id_plantilla`),
  KEY `fk_usuario_tipo1` (`tipo_id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Tabla donde se guardan todos los usuarios, tanto lectores co';

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `clave`, `nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `email`, `telefono`, `direccion`, `plantilla_id_plantilla`, `tipo_id_tipo_usuario`) VALUES
(00000001, '1', 'lector1', 'lector1_apellido1', 'lector_apellido2', 'lector1_email', 1, 'lector1_direccion', 1, 1),
(00000002, '2', 'administrador1', 'administrador1_apellido1', NULL, 'administrador1_emal', 2, 'administrador1_direccion', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_titulo`
--

CREATE TABLE IF NOT EXISTS `usuario_has_titulo` (
  `usuario_dni` int(8) unsigned zerofill NOT NULL,
  `titulo_dewey_categoria_dewey` smallint(3) unsigned zerofill NOT NULL,
  `titulo_id_apellido` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_id_titulo` varchar(3) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_hora_prestamo` datetime NOT NULL,
  `fecha_hora_devolucion_propuesta` datetime NOT NULL,
  `fecha_hora_devolucion_efectiva` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_dni`,`titulo_dewey_categoria_dewey`,`titulo_id_apellido`,`titulo_id_titulo`),
  KEY `fk_usuario_has_titulo_titulo1` (`titulo_dewey_categoria_dewey`,`titulo_id_apellido`,`titulo_id_titulo`),
  KEY `fk_usuario_has_titulo_usuario1` (`usuario_dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcar la base de datos para la tabla `usuario_has_titulo`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_acceso_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD CONSTRAINT `fk_titulo_editorial1` FOREIGN KEY (`editorial_id_editorial`) REFERENCES `editorial` (`id_editorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_titulo_idioma_639_11` FOREIGN KEY (`idioma_639_1_id_idioma_639_1`) REFERENCES `idioma_639_1` (`id_idioma_639_1`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ttitulo_dewey1` FOREIGN KEY (`dewey_categoria_dewey`) REFERENCES `dewey` (`categoria_dewey`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `titulo_has_autor`
--
ALTER TABLE `titulo_has_autor`
  ADD CONSTRAINT `fk_titulo_has_autor_autor1` FOREIGN KEY (`autor_id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_titulo_has_autor_titulo1` FOREIGN KEY (`titulo_dewey_categoria_dewey`, `titulo_id_apellido`, `titulo_id_titulo`) REFERENCES `titulo` (`dewey_categoria_dewey`, `id_apellido`, `id_titulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_plantilla1` FOREIGN KEY (`plantilla_id_plantilla`) REFERENCES `plantilla` (`id_plantilla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo1` FOREIGN KEY (`tipo_id_tipo_usuario`) REFERENCES `tipo` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_titulo`
--
ALTER TABLE `usuario_has_titulo`
  ADD CONSTRAINT `fk_usuario_has_titulo_titulo1` FOREIGN KEY (`titulo_dewey_categoria_dewey`, `titulo_id_apellido`, `titulo_id_titulo`) REFERENCES `titulo` (`dewey_categoria_dewey`, `id_apellido`, `id_titulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_titulo_usuario1` FOREIGN KEY (`usuario_dni`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;
