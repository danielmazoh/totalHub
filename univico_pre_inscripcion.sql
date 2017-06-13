-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-06-2017 a las 16:56:03
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `univico_pre_inscripcion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_certificados`
--

CREATE TABLE `ins_certificados` (
  `ct_codCertificado` int(5) NOT NULL,
  `ct_codPreinscripcion` int(5) NOT NULL,
  `ct_fechaCertificado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_preinscripcion`
--

CREATE TABLE `ins_preinscripcion` (
  `pr_codPreinscripcion` int(5) NOT NULL,
  `pr_codUsuario` varchar(12) NOT NULL,
  `pr_codPrograma` int(3) NOT NULL,
  `pr_fechaPreinscripcion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pr_asistencia` int(1) NOT NULL,
  `pr_aprobDocente` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_programa`
--

CREATE TABLE `ins_programa` (
  `pg_codigo` int(3) NOT NULL,
  `pg_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pg_codModalidad` int(1) NOT NULL,
  `pg_sede` int(1) NOT NULL,
  `pg_instructor` varchar(12) NOT NULL,
  `pg_fechaInicio` date NOT NULL,
  `pg_horaInicio` time NOT NULL,
  `pg_fechaFin` date NOT NULL,
  `pg_horaFin` time NOT NULL,
  `pg_estadoPrograma` int(1) NOT NULL,
  `pg_tipoPrograma` int(1) NOT NULL,
  `pg_tipoDuracion` int(1) NOT NULL,
  `pg_cantDuracion` int(4) NOT NULL,
  `pg_usuarioRegistra` varchar(12) NOT NULL,
  `pg_fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pg_usuarioModifica` varchar(12) NOT NULL,
  `pg_fechaModifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_usuarios`
--

CREATE TABLE `ins_usuarios` (
  `us_documento` varchar(12) NOT NULL,
  `us_tipoDocumento` int(1) NOT NULL,
  `us_nombres` varchar(50) NOT NULL,
  `us_apellidos` varchar(50) NOT NULL,
  `us_correoElectronico` varchar(70) NOT NULL,
  `us_telefono` varchar(10) NOT NULL,
  `us_tipoUsuario` int(1) NOT NULL,
  `us_estado` int(1) NOT NULL,
  `us_fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `us_fechaUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_usuariosXTipoUsuario`
--

CREATE TABLE `int_usuariosXTipoUsuario` (
  `uxt_codigo` int(4) NOT NULL,
  `uxt_codUsuario` int(1) NOT NULL,
  `uta_codTipoUsuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_estado`
--

CREATE TABLE `ma_estado` (
  `es_codEstado` int(1) NOT NULL,
  `es_nombreEstado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ma_estado`
--

INSERT INTO `ma_estado` (`es_codEstado`, `es_nombreEstado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_modalidad`
--

CREATE TABLE `ma_modalidad` (
  `md_codModalidad` int(1) NOT NULL,
  `md_nombreModalidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `md_estadoModalidad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ma_modalidad`
--

INSERT INTO `ma_modalidad` (`md_codModalidad`, `md_nombreModalidad`, `md_estadoModalidad`) VALUES
(152, 'Seminario', 2),
(153, 'Curso', 2),
(154, 'Clase', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_sedes`
--

CREATE TABLE `ma_sedes` (
  `sd_codSede` int(1) NOT NULL,
  `sd_nombreSede` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `sd_telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `sd_mail` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `sd_direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sd_representante` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `sd_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_tipoDocumento`
--

CREATE TABLE `ma_tipoDocumento` (
  `td_codTipoDocumento` int(1) NOT NULL,
  `td_nombreTipoDocumento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_tipoDuracion`
--

CREATE TABLE `ma_tipoDuracion` (
  `td_codTipoDuracion` int(1) NOT NULL,
  `td_nombreTipoDuracion` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_tipoPrograma`
--

CREATE TABLE `ma_tipoPrograma` (
  `sd_codTipoPrograma` int(1) NOT NULL,
  `sd_codNombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_tipoUsuario`
--

CREATE TABLE `ma_tipoUsuario` (
  `tu_codTipoUsuario` int(1) NOT NULL,
  `tu_nombreTipoUsuario` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ins_certificados`
--
ALTER TABLE `ins_certificados`
  ADD PRIMARY KEY (`ct_codCertificado`),
  ADD KEY `ct_codPreinscripcion` (`ct_codPreinscripcion`);

--
-- Indices de la tabla `ins_preinscripcion`
--
ALTER TABLE `ins_preinscripcion`
  ADD PRIMARY KEY (`pr_codPreinscripcion`),
  ADD KEY `pr_codUsuario` (`pr_codUsuario`),
  ADD KEY `pr_codPrograma` (`pr_codPrograma`);

--
-- Indices de la tabla `ins_programa`
--
ALTER TABLE `ins_programa`
  ADD PRIMARY KEY (`pg_codigo`),
  ADD KEY `pg_codModalidad` (`pg_codModalidad`),
  ADD KEY `pg_sede` (`pg_sede`),
  ADD KEY `pg_instructor` (`pg_instructor`),
  ADD KEY `pg_usuarioRegistra` (`pg_usuarioRegistra`),
  ADD KEY `pg_usuarioModifica` (`pg_usuarioModifica`),
  ADD KEY `pg_tipoDuracion` (`pg_tipoDuracion`);

--
-- Indices de la tabla `ins_usuarios`
--
ALTER TABLE `ins_usuarios`
  ADD PRIMARY KEY (`us_documento`),
  ADD UNIQUE KEY `us_correoElectronico` (`us_correoElectronico`),
  ADD KEY `us_tipoDocumento` (`us_tipoDocumento`),
  ADD KEY `us_tipoUsuario` (`us_tipoUsuario`),
  ADD KEY `us_estado` (`us_estado`);

--
-- Indices de la tabla `ma_estado`
--
ALTER TABLE `ma_estado`
  ADD PRIMARY KEY (`es_codEstado`);

--
-- Indices de la tabla `ma_modalidad`
--
ALTER TABLE `ma_modalidad`
  ADD PRIMARY KEY (`md_codModalidad`);

--
-- Indices de la tabla `ma_sedes`
--
ALTER TABLE `ma_sedes`
  ADD PRIMARY KEY (`sd_codSede`);

--
-- Indices de la tabla `ma_tipoDocumento`
--
ALTER TABLE `ma_tipoDocumento`
  ADD PRIMARY KEY (`td_codTipoDocumento`);

--
-- Indices de la tabla `ma_tipoDuracion`
--
ALTER TABLE `ma_tipoDuracion`
  ADD PRIMARY KEY (`td_codTipoDuracion`);

--
-- Indices de la tabla `ma_tipoPrograma`
--
ALTER TABLE `ma_tipoPrograma`
  ADD PRIMARY KEY (`sd_codTipoPrograma`);

--
-- Indices de la tabla `ma_tipoUsuario`
--
ALTER TABLE `ma_tipoUsuario`
  ADD PRIMARY KEY (`tu_codTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ma_modalidad`
--
ALTER TABLE `ma_modalidad`
  MODIFY `md_codModalidad` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT de la tabla `ma_sedes`
--
ALTER TABLE `ma_sedes`
  MODIFY `sd_codSede` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ins_certificados`
--
ALTER TABLE `ins_certificados`
  ADD CONSTRAINT `ins_certificados_ibfk_1` FOREIGN KEY (`ct_codPreinscripcion`) REFERENCES `ins_preinscripcion` (`pr_codPreinscripcion`);

--
-- Filtros para la tabla `ins_preinscripcion`
--
ALTER TABLE `ins_preinscripcion`
  ADD CONSTRAINT `ins_preinscripcion_ibfk_1` FOREIGN KEY (`pr_codUsuario`) REFERENCES `ins_usuarios` (`us_documento`),
  ADD CONSTRAINT `ins_preinscripcion_ibfk_2` FOREIGN KEY (`pr_codPrograma`) REFERENCES `ins_programa` (`pg_codigo`);

--
-- Filtros para la tabla `ins_programa`
--
ALTER TABLE `ins_programa`
  ADD CONSTRAINT `ins_programa_ibfk_3` FOREIGN KEY (`pg_instructor`) REFERENCES `ins_usuarios` (`us_documento`),
  ADD CONSTRAINT `ins_programa_ibfk_4` FOREIGN KEY (`pg_usuarioRegistra`) REFERENCES `ins_usuarios` (`us_documento`),
  ADD CONSTRAINT `ins_programa_ibfk_5` FOREIGN KEY (`pg_usuarioModifica`) REFERENCES `ins_usuarios` (`us_documento`),
  ADD CONSTRAINT `ins_programa_ibfk_6` FOREIGN KEY (`pg_tipoDuracion`) REFERENCES `univico_pre-inscripcion`.`ma_tipoDuracion` (`td_codTipoDuracion`),
  ADD CONSTRAINT `ins_programa_ibfk_7` FOREIGN KEY (`pg_codModalidad`) REFERENCES `ma_modalidad` (`md_codModalidad`),
  ADD CONSTRAINT `ins_programa_ibfk_8` FOREIGN KEY (`pg_sede`) REFERENCES `ma_sedes` (`sd_codSede`);

--
-- Filtros para la tabla `ins_usuarios`
--
ALTER TABLE `ins_usuarios`
  ADD CONSTRAINT `ins_usuarios_ibfk_1` FOREIGN KEY (`us_estado`) REFERENCES `ma_estado` (`es_codEstado`),
  ADD CONSTRAINT `ins_usuarios_ibfk_2` FOREIGN KEY (`us_tipoUsuario`) REFERENCES `univico_pre-inscripcion`.`ma_tipoUsuario` (`tu_codTipoUsuario`),
  ADD CONSTRAINT `ins_usuarios_ibfk_3` FOREIGN KEY (`us_tipoDocumento`) REFERENCES `univico_pre-inscripcion`.`ma_tipoDocumento` (`td_codTipoDocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
