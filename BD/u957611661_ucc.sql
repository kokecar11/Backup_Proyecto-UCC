-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-06-2019 a las 00:13:44
-- Versión del servidor: 10.2.23-MariaDB
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u957611661_ucc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `File_id1` int(11) NOT NULL,
  `File_names` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `File_doc` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Grupos_Gp_cod` varchar(12) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`File_id1`, `File_names`, `File_doc`, `Grupos_Gp_cod`) VALUES
(55, 'Primera entrega', '../files/GP5492996/Viernes 31 de mayo.docx', 'GP5492996');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_eventos`
--

CREATE TABLE `bitacora_eventos` (
  `Bit_codigo` int(11) NOT NULL,
  `Bit_title` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Bit_descripcion` mediumtext COLLATE utf8_spanish2_ci NOT NULL,
  `Bit_horainit` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Bit_horafinish` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Grupos_Gp_cod` varchar(12) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `bitacora_eventos`
--

INSERT INTO `bitacora_eventos` (`Bit_codigo`, `Bit_title`, `Bit_descripcion`, `Bit_horainit`, `Bit_horafinish`, `Grupos_Gp_cod`) VALUES
(33, 'PRIMERA ENTREGA', 'El estudiante realizara le primera entrega del documento para que el asesor de el aval', '2019-05-27 13:09:57', '2019-05-28 23:59:00', 'GP5492996');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `Acc_cod` int(12) NOT NULL,
  `Acc_account` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Acc_names` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Acc_lastnames` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Acc_email` varchar(70) CHARACTER SET utf8 NOT NULL,
  `Acc_pass` varchar(535) COLLATE utf8_spanish2_ci NOT NULL,
  `Acc_estado` tinyint(4) NOT NULL,
  `Acc_type` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Acc_photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`Acc_cod`, `Acc_account`, `Acc_names`, `Acc_lastnames`, `Acc_email`, `Acc_pass`, `Acc_estado`, `Acc_type`, `Acc_photo`) VALUES
(0, 'coordinador', 'Coordinador', 'Proyectos', 'coordinador@gmail.com', 'Zk1vWlNMUDQ2Zlk3UHU1dU1PamhaZz09', 1, 'Coordinador', NULL);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_final`
--

CREATE TABLE `documento_final` (
  `idDocumento_final` int(11) NOT NULL,
  `Documento_Topico` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `documento_final`
--

INSERT INTO `documento_final` (`idDocumento_final`, `Documento_Topico`) VALUES
(1, '¿El documento contiene las hojas preliminares'),
(2, '¿contiene estructura introduccion, generalida'),
(3, '¿El documento contiene la metodología y resul'),
(4, '¿incluye conclusiones, recomendaciones y bibl'),
(5, '¿está escrito en Arial 12, interlineado senci'),
(6, '¿ redacción  se encuentra en tercera persona?'),
(7, 'Numeracion del documento'),
(8, 'Glosario del documento'),
(9, 'Titulos del documento de primer nivel'),
(10, 'Titulos del documento de segundo nivel'),
(11, 'Titulos del documento de tercer nivel'),
(12, '¿Viñetas  homogéneas y nivel jerárquico adecu'),
(13, 'las tablas, figuras y cuadros'),
(14, 'Anexos y cistas'),
(15, 'Indices del documento'),
(16, 'Palabras claves del documento'),
(17, 'Referencias citadas'),
(18, 'Citas de fuentes primarias del documento'),
(19, 'Citas de fuentes electrónicas del documento'),
(20, 'Usa adecuadamente en el documento el Ibid y e'),
(21, 'Continuidad en tablas, cuadros, etc'),
(22, '¿No hay títulos sin numeración o viñetas?'),
(23, 'Subdivisiones y viñetas'),
(24, 'Figuras del documento en recuadro'),
(25, '¿Los anexos del documento están distinguidos?'),
(26, 'Referencias de autor repetido'),
(27, '¿Incluyen anexos para conformar único documen'),
(28, '¿Incluye manual de usuario?'),
(29, '¿Se dan los créditos adecuados? '),
(30, 'Cumple norma NTC 1486 Versión 6'),
(31, 'Resumen'),
(32, 'Introduccion'),
(33, 'Cumplimiento de Objetivos'),
(34, 'Conclusiones'),
(35, 'Resultados obtenidos del trabajo'),
(36, '¿Metodologia desarrollada conduce a los resul'),
(37, '¿Aplica competencias propias de ingeniero?'),
(38, 'Enuncian o recomiendan trabajos'),
(39, '¿Emplea un lenguaje académico correspondiente'),
(40, 'Bibliografia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `Semestre` int(3) DEFAULT NULL,
  `idEstudiante` int(3) NOT NULL,
  `Cuenta_Acc_cod1` int(12) NOT NULL,
  `Grupos_Gp_cod` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Estudiante_visto` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`Semestre`, `idEstudiante`, `Cuenta_Acc_cod1`, `Grupos_Gp_cod`, `Estudiante_visto`) VALUES
(7, 22, 625726, 'GP0926453', NULL),
(6, 25, 67000123, 'GP3580144', NULL),
(10, 28, 625727, NULL, NULL),
(9, 29, 625784, NULL, NULL),
(8, 31, 625752, NULL, NULL),
(7, 32, 539407, NULL, NULL),
(7, 33, 625783, NULL, NULL),
(7, 34, 5394032, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos`
--

CREATE TABLE `formatos` (
  `idFormatos` int(11) NOT NULL,
  `Grupos_Gp_cod` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Recomendacion_formato` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `formatos`
--

INSERT INTO `formatos` (`idFormatos`, `Grupos_Gp_cod`, `Recomendacion_formato`) VALUES
(2623, 'GP5492996', NULL),
(3259, 'GP3580144', NULL),
(4389, 'GP0926453', NULL),
(5974, 'GP0976056', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato_evaluacion`
--

CREATE TABLE `formato_evaluacion` (
  `idFormato_Anteproyecto` int(3) NOT NULL,
  `idFormatos` int(11) NOT NULL,
  `cumple_formato` tinyint(4) DEFAULT NULL,
  `recomendacion_formato` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `formato_evaluacion`
--

INSERT INTO `formato_evaluacion` (`idFormato_Anteproyecto`, `idFormatos`, `cumple_formato`, `recomendacion_formato`) VALUES
(1, 2623, 1, ''),
(1, 3259, 0, 'Jajaja oli'),
(1, 4389, 1, 'Jajaja1'),
(1, 5974, NULL, NULL),
(2, 2623, 1, ''),
(2, 3259, 0, 'asdas'),
(2, 4389, 1, 'Koke'),
(2, 5974, NULL, NULL),
(3, 2623, 1, ''),
(3, 3259, 0, 'asdasd'),
(3, 4389, 1, ''),
(3, 5974, NULL, NULL),
(4, 2623, 1, ''),
(4, 3259, 1, 'asdasdas'),
(4, 4389, 1, ''),
(4, 5974, NULL, NULL),
(5, 2623, 1, ''),
(5, 3259, 1, 'asdasdas'),
(5, 4389, 1, ''),
(5, 5974, NULL, NULL),
(6, 2623, 0, ''),
(6, 3259, 1, 'dsdsdawee12'),
(6, 4389, 1, ''),
(6, 5974, NULL, NULL),
(7, 2623, 1, ''),
(7, 3259, 0, 'asdada'),
(7, 4389, 1, ''),
(7, 5974, NULL, NULL),
(8, 2623, 1, ''),
(8, 3259, 1, 'asdasd'),
(8, 4389, 1, ''),
(8, 5974, NULL, NULL),
(9, 2623, 1, ''),
(9, 3259, 1, 'asdasda'),
(9, 4389, 1, ''),
(9, 5974, NULL, NULL),
(10, 2623, 1, ''),
(10, 3259, 1, 'asdada'),
(10, 4389, 1, ''),
(10, 5974, NULL, NULL),
(11, 2623, 1, ''),
(11, 3259, 1, 'adsada'),
(11, 4389, 1, ''),
(11, 5974, NULL, NULL),
(12, 2623, 1, ''),
(12, 3259, 1, 'asda'),
(12, 4389, 1, ''),
(12, 5974, NULL, NULL),
(13, 2623, 1, ''),
(13, 3259, 1, 'asdasa'),
(13, 4389, 1, ''),
(13, 5974, NULL, NULL),
(14, 2623, 1, ''),
(14, 3259, 1, 'asdad'),
(14, 4389, 1, ''),
(14, 5974, NULL, NULL),
(15, 2623, 0, ''),
(15, 3259, 1, 'asdasd'),
(15, 4389, 1, ''),
(15, 5974, NULL, NULL),
(16, 2623, 0, ''),
(16, 3259, 1, 'asdada'),
(16, 4389, 1, ''),
(16, 5974, NULL, NULL),
(17, 2623, 1, ''),
(17, 3259, 1, 'asdas'),
(17, 4389, 1, ''),
(17, 5974, NULL, NULL),
(18, 2623, 1, ''),
(18, 3259, 0, 'adsd'),
(18, 4389, 1, 'OHli'),
(18, 5974, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato_final`
--

CREATE TABLE `formato_final` (
  `idFormatos` int(11) NOT NULL,
  `idDocumento_final` int(11) NOT NULL,
  `Cumple_formato` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Recomendacion_final` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato_sesiones`
--

CREATE TABLE `formato_sesiones` (
  `idFormato_sesiones` int(11) NOT NULL,
  `Verificacion_sesion` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Tema_sesion` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Anexos_sesion` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Compromiso_sesion` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Reunion_numero` int(1) DEFAULT NULL,
  `Fecha_sesion` date DEFAULT NULL,
  `Formatos_idFormatos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato_sustentacion`
--

CREATE TABLE `formato_sustentacion` (
  `Formatos_idFormatos` int(11) NOT NULL,
  `Sustentacion_grado` int(2) NOT NULL,
  `Cumple_formato` tinyint(4) DEFAULT NULL,
  `Recomendacion_sustentacion` mediumtext COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Fotmato_Anteproyecto`
--

CREATE TABLE `Fotmato_Anteproyecto` (
  `idFormato_Anteproyecto` int(3) NOT NULL,
  `Formato_topico` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Fotmato_Anteproyecto`
--

INSERT INTO `Fotmato_Anteproyecto` (`idFormato_Anteproyecto`, `Formato_topico`) VALUES
(1, 'Generalidad'),
(2, 'Introduccion'),
(3, 'Justificacion'),
(4, 'Argumentacion'),
(5, 'Planteamiento '),
(6, 'Objetivo general'),
(7, 'Objetivos especificos'),
(8, 'Coherencia'),
(9, 'Alcance y limitaciones'),
(10, 'Marco conceptual'),
(11, 'Marco teorico'),
(12, 'Estado del arte'),
(13, 'Impacto'),
(14, 'Aplicacion/area'),
(15, 'Metodologia'),
(16, 'Presupuesto'),
(17, 'Productos a entregar'),
(18, 'Bibliografia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `Gp_cod` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Gp_title` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Gp_type` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Gp_estado` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha_ini` timestamp NULL DEFAULT NULL,
  `Fecha_fin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`Gp_cod`, `Gp_title`, `Gp_type`, `Gp_estado`, `Fecha_ini`, `Fecha_fin`) VALUES
('GP0926453', 'Grupo de Andres', 'Ante-Proyecto', '1', NULL, NULL),
('GP0976056', 'prueba', 'Ante-Proyecto', '1', NULL, NULL),
('GP3580144', 'la pruebota', 'Ante-Proyecto', '1', NULL, NULL),
('GP5492996', 'Ruido en imágenes', 'Ante-Proyecto', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idNota` int(11) NOT NULL,
  `Nota` int(2) NOT NULL,
  `Nota_letra` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Formatos_idFormatos` int(11) NOT NULL,
  `Formato_nota` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plagio`
--

CREATE TABLE `plagio` (
  `idPlagio` int(11) NOT NULL,
  `Apartado_plagio` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `Fuente_plagio` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `Argumentacion_plagio` tinytext COLLATE utf8_spanish2_ci NOT NULL,
  `idFormatos` int(11) NOT NULL,
  `Documento_final_idDocumento_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(3) NOT NULL,
  `Cuenta_Acc_cod` int(12) NOT NULL,
  `Grupos_Gp_cod` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Profesor_califica` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `Cuenta_Acc_cod`, `Grupos_Gp_cod`, `Profesor_califica`) VALUES
(63, 1018505077, NULL, NULL),
(71, 1018505077, 'GP0926453', 0),
(72, 1018505077, 'GP3580144', 0),
(73, 19356688, NULL, NULL),
(74, 38141201, NULL, NULL),
(75, 79319763, NULL, NULL),
(77, 753196, NULL, NULL),
(78, 456321, NULL, NULL),
(81, 123, NULL, NULL),
(82, 123456, NULL, NULL),
(83, 123789, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustentacion_grado`
--

CREATE TABLE `sustentacion_grado` (
  `idSustentacion_grado` int(2) NOT NULL,
  `Item_sustentacion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sustentacion_grado`
--

INSERT INTO `sustentacion_grado` (`idSustentacion_grado`, `Item_sustentacion`) VALUES
(1, '¿Demuestra en la solución propuesta?'),
(2, '¿conocimientos, metodologías o procesos Cient'),
(3, '¿análisis de resultados claro?'),
(4, '¿Resultados presentados dan solución al probl'),
(5, '¿Las conclusiones son adecuadas a los resulta'),
(6, '¿Se reconocen limitaciones?'),
(7, '¿La presentación realizada es clara y pertine'),
(8, '¿Las preguntas fueron contestadas?'),
(9, '¿El diseño y presentación del poster fue adec'),
(10, '¿se han aplicado competencias propias de un i'),
(11, 'Recomienda para presentar eventos externos/in'),
(12, 'Recomienda para publicación en Biblioteca (re'),
(13, 'Recomienda para publicación en revistas u otr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`File_id1`);

--
-- Indices de la tabla `bitacora_eventos`
--
ALTER TABLE `bitacora_eventos`
  ADD PRIMARY KEY (`Bit_codigo`),
  ADD KEY `fk_Bitacora_Eventos_Grupos1_idx` (`Grupos_Gp_cod`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Acc_cod`);

--
-- Indices de la tabla `documento_final`
--
ALTER TABLE `documento_final`
  ADD PRIMARY KEY (`idDocumento_final`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `fk_Estudiante_Cuenta1_idx` (`Cuenta_Acc_cod1`),
  ADD KEY `fk_Estudiante_Grupos1_idx` (`Grupos_Gp_cod`);

--
-- Indices de la tabla `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`idFormatos`),
  ADD KEY `fk_Formatos_Grupos1_idx` (`Grupos_Gp_cod`);

--
-- Indices de la tabla `formato_evaluacion`
--
ALTER TABLE `formato_evaluacion`
  ADD PRIMARY KEY (`idFormato_Anteproyecto`,`idFormatos`),
  ADD KEY `idFormato_Anteproyecto` (`idFormato_Anteproyecto`,`idFormatos`),
  ADD KEY `idFormatos` (`idFormatos`);

--
-- Indices de la tabla `formato_final`
--
ALTER TABLE `formato_final`
  ADD PRIMARY KEY (`idFormatos`,`idDocumento_final`),
  ADD KEY `fk_Formatos_has_Documento_final_Documento_final1_idx` (`idDocumento_final`),
  ADD KEY `fk_Formatos_has_Documento_final_Formatos1_idx` (`idFormatos`);

--
-- Indices de la tabla `formato_sesiones`
--
ALTER TABLE `formato_sesiones`
  ADD PRIMARY KEY (`idFormato_sesiones`),
  ADD KEY `fk_Formato_sesiones_Formatos1_idx` (`Formatos_idFormatos`);

--
-- Indices de la tabla `formato_sustentacion`
--
ALTER TABLE `formato_sustentacion`
  ADD PRIMARY KEY (`Formatos_idFormatos`,`Sustentacion_grado`),
  ADD KEY `fk_Formatos_has_Sustentacion_grado_Sustentacion_grado1_idx` (`Sustentacion_grado`),
  ADD KEY `fk_Formatos_has_Sustentacion_grado_Formatos1_idx` (`Formatos_idFormatos`);

--
-- Indices de la tabla `Fotmato_Anteproyecto`
--
ALTER TABLE `Fotmato_Anteproyecto`
  ADD PRIMARY KEY (`idFormato_Anteproyecto`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`Gp_cod`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idNota`),
  ADD KEY `fk_Nota_Formatos1_idx` (`Formatos_idFormatos`);

--
-- Indices de la tabla `plagio`
--
ALTER TABLE `plagio`
  ADD PRIMARY KEY (`idPlagio`),
  ADD KEY `fk_Plagio_Formatos1_idx` (`idFormatos`),
  ADD KEY `fk_Plagio_Documento_final1_idx` (`Documento_final_idDocumento_final`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`),
  ADD KEY `fk_Profesor_Grupos1_idx` (`Grupos_Gp_cod`),
  ADD KEY `fk_Profesor_Cuenta1_idx` (`Cuenta_Acc_cod`);

--
-- Indices de la tabla `sustentacion_grado`
--
ALTER TABLE `sustentacion_grado`
  ADD PRIMARY KEY (`idSustentacion_grado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `File_id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `bitacora_eventos`
--
ALTER TABLE `bitacora_eventos`
  MODIFY `Bit_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `formatos`
--
ALTER TABLE `formatos`
  MODIFY `idFormatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9031;

--
-- AUTO_INCREMENT de la tabla `Fotmato_Anteproyecto`
--
ALTER TABLE `Fotmato_Anteproyecto`
  MODIFY `idFormato_Anteproyecto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idNota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora_eventos`
--
ALTER TABLE `bitacora_eventos`
  ADD CONSTRAINT `fk_Bitacora_Eventos_Grupos1` FOREIGN KEY (`Grupos_Gp_cod`) REFERENCES `grupos` (`Gp_cod`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_Estudiante_Cuenta1` FOREIGN KEY (`Cuenta_Acc_cod1`) REFERENCES `cuenta` (`Acc_cod`),
  ADD CONSTRAINT `fk_Estudiante_Grupos1` FOREIGN KEY (`Grupos_Gp_cod`) REFERENCES `grupos` (`Gp_cod`);

--
-- Filtros para la tabla `formatos`
--
ALTER TABLE `formatos`
  ADD CONSTRAINT `fk_Formatos_Grupos1` FOREIGN KEY (`Grupos_Gp_cod`) REFERENCES `grupos` (`Gp_cod`);

--
-- Filtros para la tabla `formato_evaluacion`
--
ALTER TABLE `formato_evaluacion`
  ADD CONSTRAINT `formato_evaluacion_ibfk_1` FOREIGN KEY (`idFormatos`) REFERENCES `formatos` (`idFormatos`),
  ADD CONSTRAINT `formato_evaluacion_ibfk_2` FOREIGN KEY (`idFormato_Anteproyecto`) REFERENCES `Fotmato_Anteproyecto` (`idFormato_Anteproyecto`);

--
-- Filtros para la tabla `formato_final`
--
ALTER TABLE `formato_final`
  ADD CONSTRAINT `fk_Formatos_has_Documento_final_Documento_final1` FOREIGN KEY (`idDocumento_final`) REFERENCES `documento_final` (`idDocumento_final`),
  ADD CONSTRAINT `fk_Formatos_has_Documento_final_Formatos1` FOREIGN KEY (`idFormatos`) REFERENCES `formatos` (`idFormatos`);

--
-- Filtros para la tabla `formato_sesiones`
--
ALTER TABLE `formato_sesiones`
  ADD CONSTRAINT `fk_Formato_sesiones_Formatos1` FOREIGN KEY (`Formatos_idFormatos`) REFERENCES `formatos` (`idFormatos`);

--
-- Filtros para la tabla `formato_sustentacion`
--
ALTER TABLE `formato_sustentacion`
  ADD CONSTRAINT `fk_Formatos_has_Sustentacion_grado_Formatos1` FOREIGN KEY (`Formatos_idFormatos`) REFERENCES `formatos` (`idFormatos`),
  ADD CONSTRAINT `fk_Formatos_has_Sustentacion_grado_Sustentacion_grado1` FOREIGN KEY (`Sustentacion_grado`) REFERENCES `sustentacion_grado` (`idSustentacion_grado`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_Nota_Formatos1` FOREIGN KEY (`Formatos_idFormatos`) REFERENCES `formatos` (`idFormatos`);

--
-- Filtros para la tabla `plagio`
--
ALTER TABLE `plagio`
  ADD CONSTRAINT `fk_Plagio_Documento_final1` FOREIGN KEY (`Documento_final_idDocumento_final`) REFERENCES `documento_final` (`idDocumento_final`),
  ADD CONSTRAINT `fk_Plagio_Formatos1` FOREIGN KEY (`idFormatos`) REFERENCES `formatos` (`idFormatos`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_Profesor_Cuenta1` FOREIGN KEY (`Cuenta_Acc_cod`) REFERENCES `cuenta` (`Acc_cod`),
  ADD CONSTRAINT `fk_Profesor_Grupos1` FOREIGN KEY (`Grupos_Gp_cod`) REFERENCES `grupos` (`Gp_cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
