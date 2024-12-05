-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2024 a las 20:21:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `repositorio_c116`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(75) NOT NULL,
  `tipo` varchar(75) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `actualizacion` varchar(75) NOT NULL,
  `archivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `usuario`, `tipo`, `estado`, `actualizacion`, `archivo`) VALUES
(792, 'leo', 'Acta de nacimiento', 'cargado', '2024-11-06 13:03:42', '../../uploads/leo/Acta de nacimiento/MAR 15    REGULAR-AND-IRREGULAR-VERBS.pdf'),
(793, 'leo', 'Acuse credencial -trabajador', 'cargado', '2024-11-06 13:06:16', '../../uploads/leo/Acuse credencial -trabajador/REGULAR-AND-IRREGULAR-VERBS.pdf'),
(794, 'leo', 'Acuse de la declaración patrimonial', 'vacio', 'nulo', 'nulo'),
(795, 'leo', 'Carta de consentimiento', 'vacio', 'nulo', 'nulo'),
(796, 'leo', 'Cartilla servicio militar', 'vacio', 'nulo', 'nulo'),
(797, 'leo', 'Cedula incorporación al forte', 'vacio', 'nulo', 'nulo'),
(798, 'leo', 'Certificado examen medico', 'vacio', 'nulo', 'nulo'),
(799, 'leo', 'Compactación o conversión de plazas', 'vacio', 'nulo', 'nulo'),
(800, 'leo', 'Compatibilidad empleo', 'vacio', 'nulo', 'nulo'),
(801, 'leo', 'Constancia de no inhabilitación', 'vacio', 'nulo', 'nulo'),
(802, 'leo', 'Constancia nombramiento', 'vacio', 'nulo', 'nulo'),
(803, 'leo', 'Creditos escalafornarios anuales', 'vacio', 'nulo', 'nulo'),
(804, 'leo', 'Curp', 'vacio', 'nulo', 'nulo'),
(805, 'leo', 'Curriculum', 'vacio', 'nulo', 'nulo'),
(806, 'leo', 'Designación de beneficiarios', 'vacio', 'nulo', 'nulo'),
(807, 'leo', 'Designación de beneficiarios retiro sar o forte', 'vacio', 'nulo', 'nulo'),
(808, 'leo', 'Dictamenes escalafonarios', 'vacio', 'nulo', 'nulo'),
(809, 'leo', 'documento', 'vacio', 'nulo', 'nulo'),
(810, 'leo', 'Estimulos y premios otorgados', 'vacio', 'nulo', 'nulo'),
(811, 'leo', 'Hoja formato único de servicios isste', 'vacio', 'nulo', 'nulo'),
(812, 'leo', 'Licencias con y sin goce de sueldos', 'vacio', 'nulo', 'nulo'),
(813, 'leo', 'Nacionalidad extranjera autorización', 'vacio', 'nulo', 'nulo'),
(814, 'leo', 'Notas buenas y malas por desempeño', 'vacio', 'nulo', 'nulo'),
(815, 'leo', 'Oficio cambios adscripción', 'vacio', 'nulo', 'nulo'),
(816, 'leo', 'Oficio de modificación al nombre', 'vacio', 'nulo', 'nulo'),
(817, 'leo', 'Registro de personal federal', 'vacio', 'nulo', 'nulo'),
(818, 'leo', 'Rfc', 'vacio', 'nulo', 'nulo'),
(819, 'leo', 'Solicitud de empleo', 'vacio', 'nulo', 'nulo'),
(820, 'leo', 'Solicitudes de servicio o prestaciones del trabajador', 'vacio', 'nulo', 'nulo'),
(821, 'leo', 'Titulo o cedula profesional', 'vacio', 'nulo', 'nulo'),
(822, 'raul', 'Acta de nacimiento', 'cargado', '2024-11-06 13:06:57', '../../uploads/raul/Acta de nacimiento/REGULAR-AND-IRREGULAR-VERBS.pdf'),
(823, 'raul', 'Acuse credencial -trabajador', 'vacio', 'nulo', 'nulo'),
(824, 'raul', 'Acuse de la declaración patrimonial', 'vacio', 'nulo', 'nulo'),
(825, 'raul', 'Carta de consentimiento', 'vacio', 'nulo', 'nulo'),
(826, 'raul', 'Cartilla servicio militar', 'vacio', 'nulo', 'nulo'),
(827, 'raul', 'Cedula incorporación al forte', 'vacio', 'nulo', 'nulo'),
(828, 'raul', 'Certificado examen medico', 'vacio', 'nulo', 'nulo'),
(829, 'raul', 'Compactación o conversión de plazas', 'vacio', 'nulo', 'nulo'),
(830, 'raul', 'Compatibilidad empleo', 'vacio', 'nulo', 'nulo'),
(831, 'raul', 'Constancia de no inhabilitación', 'vacio', 'nulo', 'nulo'),
(832, 'raul', 'Constancia nombramiento', 'vacio', 'nulo', 'nulo'),
(833, 'raul', 'Creditos escalafornarios anuales', 'vacio', 'nulo', 'nulo'),
(834, 'raul', 'Curp', 'vacio', 'nulo', 'nulo'),
(835, 'raul', 'Curriculum', 'vacio', 'nulo', 'nulo'),
(836, 'raul', 'Designación de beneficiarios', 'vacio', 'nulo', 'nulo'),
(837, 'raul', 'Designación de beneficiarios retiro sar o forte', 'vacio', 'nulo', 'nulo'),
(838, 'raul', 'Dictamenes escalafonarios', 'vacio', 'nulo', 'nulo'),
(839, 'raul', 'documento', 'vacio', 'nulo', 'nulo'),
(840, 'raul', 'Estimulos y premios otorgados', 'vacio', 'nulo', 'nulo'),
(841, 'raul', 'Hoja formato único de servicios isste', 'vacio', 'nulo', 'nulo'),
(842, 'raul', 'Licencias con y sin goce de sueldos', 'vacio', 'nulo', 'nulo'),
(843, 'raul', 'Nacionalidad extranjera autorización', 'vacio', 'nulo', 'nulo'),
(844, 'raul', 'Notas buenas y malas por desempeño', 'vacio', 'nulo', 'nulo'),
(845, 'raul', 'Oficio cambios adscripción', 'vacio', 'nulo', 'nulo'),
(846, 'raul', 'Oficio de modificación al nombre', 'vacio', 'nulo', 'nulo'),
(847, 'raul', 'Registro de personal federal', 'vacio', 'nulo', 'nulo'),
(848, 'raul', 'Rfc', 'vacio', 'nulo', 'nulo'),
(849, 'raul', 'Solicitud de empleo', 'vacio', 'nulo', 'nulo'),
(850, 'raul', 'Solicitudes de servicio o prestaciones del trabajador', 'vacio', 'nulo', 'nulo'),
(851, 'raul', 'Titulo o cedula profesional', 'vacio', 'nulo', 'nulo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id`, `tipo`, `descripcion`) VALUES
(9, 'Acta de nacimiento', 'Documento oficial que acredita el nacimiento de una persona'),
(10, 'Acuse credencial -trabajador', 'Comprobante de recepción de la credencial del trabajador'),
(11, 'Acuse de la declaración patrimonial', 'Comprobante de presentación de la declaración patrimonial'),
(12, 'Carta de consentimiento', 'Documento que expresa el consentimiento formal'),
(13, 'Cartilla servicio militar', 'Documento que certifica el cumplimiento del servicio militar'),
(14, 'Cedula incorporación al forte', 'Documento de incorporación al sistema FORTE'),
(15, 'Certificado examen medico', 'Documento que acredita la realización de un examen médico'),
(16, 'Compactación o conversión de plazas', 'Registro de compactación o conversión de plazas laborales'),
(17, 'Compatibilidad empleo', 'Documento que certifica la compatibilidad de empleos'),
(18, 'Constancia de no inhabilitación', 'Documento que acredita la no inhabilitación para el servicio público'),
(19, 'Constancia nombramiento', 'Documento que acredita el nombramiento en un cargo'),
(20, 'Creditos escalafornarios anuales', 'Documento sobre los créditos escalafonarios obtenidos anualmente'),
(21, 'Curp', 'Clave Única de Registro de Población'),
(22, 'Curriculum', 'Documento que detalla la experiencia laboral y académica'),
(23, 'Designación de beneficiarios', 'Documento de designación de beneficiarios'),
(24, 'Designación de beneficiarios retiro sar o forte', 'Designación de beneficiarios para el retiro SAR o FORTE'),
(25, 'Dictamenes escalafonarios', 'Documento de dictamen escalafonario'),
(26, 'Estimulos y premios otorgados', 'Registro de estímulos y premios obtenidos'),
(27, 'Hoja formato único de servicios isste', 'Formato único de servicios del ISSSTE'),
(28, 'Licencias con y sin goce de sueldos', 'Documentación sobre licencias con o sin goce de sueldo'),
(29, 'Nacionalidad extranjera autorización', 'Autorización para la nacionalidad extranjera'),
(30, 'Notas buenas y malas por desempeño', 'Registro de notas por desempeño laboral'),
(31, 'Oficio cambios adscripción', 'Documento sobre cambios de adscripción laboral'),
(32, 'Oficio de modificación al nombre', 'Documento que modifica el nombre en registros oficiales'),
(33, 'Registro de personal federal', 'Registro de personal federal activo'),
(34, 'Rfc', 'Registro Federal de Contribuyentes'),
(35, 'Solicitud de empleo', 'Formulario de solicitud de empleo'),
(36, 'Solicitudes de servicio o prestaciones del trabajador', 'Solicitudes de servicios o prestaciones laborales'),
(37, 'Titulo o cedula profesional', 'Título o cédula profesional que acredita estudios académicos'),
(40, 'documento', 'documento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contraseña`, `id_rol`) VALUES
(69, 'leo', 'leo', '12345', 1),
(70, 'raul', 'raul', '12345', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=852;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
