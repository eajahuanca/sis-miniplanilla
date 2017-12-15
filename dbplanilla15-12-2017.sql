-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2017 a las 19:43:25
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbplanilla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aguinaldos`
--

CREATE TABLE `aguinaldos` (
  `id` int(10) UNSIGNED NOT NULL,
  `agui_tipo_empleado` enum('PERMANENTE','EVENTUAL') COLLATE utf8_unicode_ci NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `agui_meses` int(11) NOT NULL,
  `agui_gestion` int(11) NOT NULL,
  `agui_sueldo` decimal(18,2) NOT NULL DEFAULT '0.00',
  `agui_bono` decimal(18,2) NOT NULL DEFAULT '0.00',
  `agui_produccion` decimal(18,2) NOT NULL DEFAULT '0.00',
  `agui_subsidio` decimal(18,2) NOT NULL DEFAULT '0.00',
  `aqui_extraordinario` decimal(18,2) NOT NULL DEFAULT '0.00',
  `agui_otrobono` decimal(18,2) NOT NULL DEFAULT '0.00',
  `agui_totalganado` decimal(18,2) NOT NULL DEFAULT '0.00',
  `agui_totalliquido` decimal(18,2) NOT NULL DEFAULT '0.00',
  `agui_firma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agui_estado` tinyint(1) NOT NULL DEFAULT '1',
  `user_registra` int(10) UNSIGNED NOT NULL,
  `user_actualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre Especifico del area en el que se trabaja',
  `ar_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `ar_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `ar_nombre`, `ar_descripcion`, `ar_estado`, `created_at`, `updated_at`) VALUES
(1, 'Contabilidad', '<p>Departamento de Contabilidad de la Empresa</p>\r\n', 1, '2017-04-24 14:44:14', '2017-04-24 14:44:14'),
(2, ' Ventas', '<p>Departamento de Ventas de las Empresas.</p>\r\n', 1, '2017-04-24 15:28:34', '2017-04-24 15:31:19'),
(3, 'Importacion', '<p>Departamento de Improtacion de las Empresas.</p>\r\n', 1, '2017-04-24 15:32:03', '2017-04-24 15:32:03'),
(4, 'Almacen', '<p>Departamento de Almacanes de las empresas.</p>\r\n', 1, '2017-04-24 15:32:38', '2017-04-24 15:32:38'),
(5, 'Administracion', '<p>Area de Administracion de las Empresas.</p>\r\n', 1, '2017-04-24 15:53:28', '2017-05-25 15:56:37'),
(6, 'Sistemas y Soporte  ', '<p>Sistemas y soporte tecnico</p>\r\n', 1, '2017-05-26 20:36:46', '2017-05-26 20:36:46'),
(7, 'Area de Limpieza', '<p>Limpieza de la Oficina cada fin de semana</p>\r\n', 1, '2017-06-01 18:32:08', '2017-06-01 18:32:27'),
(8, 'Mantenimiento', '<p>Reparacion y Mantenimiento de Shopping Cobija</p>\r\n', 1, '2017-12-01 18:14:58', '2017-12-01 18:14:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_empresa`
--

CREATE TABLE `asignar_empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asignar_empresa`
--

INSERT INTO `asignar_empresa` (`id`, `id_empresa`, `id_empleado`, `estado`, `created_at`, `updated_at`) VALUES
(6, 1, 5, 1, '2017-05-26 19:40:01', '2017-05-26 19:40:01'),
(7, 1, 1, 1, '2017-05-26 19:40:14', '2017-05-29 14:00:25'),
(8, 1, 3, 1, '2017-05-26 19:40:46', '2017-05-26 19:40:46'),
(9, 1, 4, 1, '2017-05-26 19:40:56', '2017-05-26 19:40:56'),
(10, 1, 2, 1, '2017-05-26 19:41:08', '2017-05-26 19:41:08'),
(11, 1, 6, 1, '2017-05-26 19:41:25', '2017-05-26 19:41:25'),
(12, 1, 22, 1, '2017-05-26 19:41:59', '2017-05-26 19:41:59'),
(13, 4, 7, 1, '2017-05-29 14:59:49', '2017-05-29 14:59:49'),
(14, 3, 15, 1, '2017-05-29 15:00:07', '2017-05-29 15:00:07'),
(15, 4, 8, 1, '2017-05-29 15:01:36', '2017-05-29 15:01:36'),
(16, 4, 9, 1, '2017-05-29 15:01:55', '2017-05-29 15:01:55'),
(17, 4, 10, 1, '2017-05-29 15:02:12', '2017-05-29 15:02:12'),
(18, 4, 11, 1, '2017-05-29 15:02:24', '2017-05-29 15:02:24'),
(19, 4, 12, 1, '2017-05-29 15:02:36', '2017-05-29 15:02:36'),
(20, 4, 13, 1, '2017-05-29 15:02:46', '2017-05-29 15:02:46'),
(21, 4, 14, 1, '2017-05-29 15:02:58', '2017-05-29 15:02:58'),
(22, 3, 16, 1, '2017-05-29 15:04:21', '2017-05-29 15:04:21'),
(23, 3, 17, 1, '2017-05-29 15:04:34', '2017-05-29 15:04:34'),
(24, 3, 18, 1, '2017-05-29 15:04:47', '2017-05-29 15:04:47'),
(25, 3, 19, 1, '2017-05-29 15:04:59', '2017-05-29 15:04:59'),
(26, 3, 20, 1, '2017-05-29 15:05:17', '2017-05-29 15:05:17'),
(27, 1, 24, 1, '2017-06-01 18:22:47', '2017-06-06 16:16:53'),
(28, 3, 29, 1, '2017-06-01 18:26:25', '2017-06-06 18:01:50'),
(29, 1, 28, 1, '2017-06-01 18:26:41', '2017-06-01 18:26:41'),
(30, 1, 26, 1, '2017-06-01 18:26:59', '2017-06-01 18:26:59'),
(31, 1, 25, 1, '2017-06-01 18:27:12', '2017-06-01 18:27:12'),
(32, 1, 23, 1, '2017-06-01 18:27:33', '2017-06-01 18:27:33'),
(33, 1, 30, 1, '2017-06-01 18:40:41', '2017-06-01 18:40:41'),
(34, 1, 31, 1, '2017-06-01 20:11:16', '2017-06-01 20:11:16'),
(35, 3, 27, 1, '2017-06-02 19:43:01', '2017-06-02 19:43:01'),
(36, 1, 32, 1, '2017-06-13 18:40:35', '2017-06-13 18:40:35'),
(37, 1, 35, 1, '2017-07-21 15:17:59', '2017-07-21 15:17:59'),
(38, 1, 34, 1, '2017-07-21 15:18:40', '2017-07-21 15:18:40'),
(39, 1, 33, 1, '2017-07-21 15:19:01', '2017-07-21 15:19:01'),
(40, 1, 36, 1, '2017-07-21 15:24:38', '2017-07-21 15:24:38'),
(41, 1, 37, 1, '2017-07-25 13:47:07', '2017-07-25 13:47:07'),
(42, 1, 38, 1, '2017-10-04 19:41:05', '2017-10-04 19:41:05'),
(43, 1, 39, 1, '2017-10-19 13:51:58', '2017-10-19 13:51:58'),
(44, 1, 40, 1, '2017-11-01 19:53:29', '2017-11-01 19:53:29'),
(45, 1, 41, 1, '2017-12-04 14:14:21', '2017-12-04 14:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barcos`
--

CREATE TABLE `barcos` (
  `id` int(10) UNSIGNED NOT NULL,
  `bar_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bar_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `barcos`
--

INSERT INTO `barcos` (`id`, `bar_nombre`, `bar_estado`, `created_at`, `updated_at`) VALUES
(1, 'MSC RAPALLO', 1, '2017-06-12 22:22:46', '2017-06-12 22:22:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `car_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `car_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `car_nombre`, `car_descripcion`, `car_estado`, `created_at`, `updated_at`) VALUES
(1, 'Chofer', '<p>Chofer de las Tres empresas Zaire LTDA, ZABIM SRL y BORDER SHOPS SRL.</p>\r\n', 1, '2017-04-24 13:48:45', '2017-04-24 14:07:30'),
(2, 'Portero', '<p>Cuidado de Oficinas y Edificio Zaire.</p>\n\n<p>&nbsp;</p>\n', 1, '2017-04-24 14:16:01', '2017-04-24 14:17:04'),
(3, 'Departamento de Pagos', '<p>Encargada de regIstros contables ZABIM SRL</p>\r\n', 1, '2017-04-24 14:22:06', '2017-04-24 15:07:55'),
(4, 'Departamento de Ventas', '<p>Encargada de registros contables BBS SRL</p>\r\n', 1, '2017-04-24 14:25:01', '2017-04-24 15:29:54'),
(5, 'Gerente General', '<p>Due&ntilde;o(a), Socio(a) y Representante Legal</p>\r\n', 1, '2017-04-24 14:26:10', '2017-04-24 14:41:47'),
(6, 'Vendedor(a)', '<p>Encargado (a) de Ventas y Cobranzas al credito y al contado de las empresas.</p>\r\n', 1, '2017-04-24 14:26:55', '2017-04-24 15:27:43'),
(10, 'Mensajero', '<p>Envio y recepcion de documentos de las empresas.</p>\r\n', 1, '2017-04-24 14:51:05', '2017-04-24 14:51:05'),
(11, 'Almacenero', '<p>Carguio, descarguio y almacenaje de mercaderias en almacenes de las empresas.</p>\r\n', 1, '2017-04-24 14:55:45', '2017-04-24 15:22:23'),
(12, 'Auxiliar Contable', '<p>Encargada de registros contables con y sin factura.</p>\r\n', 1, '2017-04-24 15:03:53', '2017-04-24 15:21:09'),
(13, 'Auxiliar de Ventas', '<p>Control de inventarios, Facturacion y registros contables de las empresas.</p>\r\n', 1, '2017-04-24 15:05:11', '2017-04-24 15:11:41'),
(14, 'Gerente Administrativo', '<p>Representante Legal BBS SRL y encargado de la administracion de las empresas.</p>\r\n', 1, '2017-04-24 15:06:14', '2017-04-24 15:06:14'),
(15, 'Auxiliar de Oficina', '<p>Custodio de Documentos legales de las empresas y apoyo en facturacion.</p>\r\n', 1, '2017-04-24 15:13:24', '2017-04-24 15:13:24'),
(16, 'Gerente de Importaciones', '<p>Encargada de Logistica y Certificaciones Previas en importaciones de las empresas.</p>\r\n', 1, '2017-04-24 15:15:25', '2017-04-24 15:15:52'),
(17, 'Auxiliar Logistica', '<p>Apoyo en logistica y certificaciones previas en el departametno de importaciones de las empresas.</p>\r\n', 1, '2017-04-24 15:17:55', '2017-05-25 15:48:41'),
(18, 'Encargado de Sistemas', '<p>Encargado de desarrollo tecnologico y soporte tecnico</p>\r\n', 1, '2017-05-26 20:38:24', '2017-05-26 20:38:24'),
(19, 'Encargada de Limpieza', '<p>Encargada de la limpieza de la oficina cada fin de semana</p>\r\n', 1, '2017-06-01 18:33:41', '2017-06-01 18:33:41'),
(20, 'Pasante Logistica', '<p>Cargo del personal eventual que realiza pasantias en la empresa</p>\r\n', 1, '2017-06-01 18:42:57', '2017-06-01 18:42:57'),
(21, 'Técnico de Mantenimiento', '<p>Personal encargado de la reparacion y mantenimiento de Shopping Cobija</p>\r\n', 1, '2017-12-01 18:17:58', '2017-12-01 18:17:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(10) UNSIGNED NOT NULL,
  `em_nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_paterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_materno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_especial` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_cedula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `em_expedido` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `em_nacimiento` date NOT NULL,
  `em_genero` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `em_nacionalidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_departamento` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `em_ciudad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_zona` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_calle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `em_numero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `em_telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `em_celular` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `em_fotografia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `em_fecha_ingeso` date NOT NULL,
  `em_sueldo_basico` decimal(18,2) NOT NULL,
  `id_cargo` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `em_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `em_bono` decimal(8,2) NOT NULL DEFAULT '0.00',
  `em_observaciones` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `em_nombre`, `em_paterno`, `em_materno`, `em_especial`, `em_cedula`, `em_expedido`, `em_nacimiento`, `em_genero`, `em_nacionalidad`, `em_departamento`, `em_ciudad`, `em_zona`, `em_calle`, `em_numero`, `em_telefono`, `em_celular`, `em_fotografia`, `em_fecha_ingeso`, `em_sueldo_basico`, `id_cargo`, `id_area`, `em_estado`, `created_at`, `updated_at`, `em_bono`, `em_observaciones`) VALUES
(1, 'Francisco', 'Mamani', 'Soldado', '', '2456407', 'LP', '1964-09-15', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Candelaria', 'Acumbaya', '1025', '', '67001388', 'storage/usuario/varon.png', '2011-02-01', '2395.40', 1, 4, 1, '2017-04-24 15:46:46', '2017-06-29 18:35:22', '660.00', ''),
(2, 'Mario', 'Huanca', 'Gironda', '', '2032704', 'LP', '1954-02-01', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'El Alto', 'R. Rada', '4035', '', '67004134', 'storage/usuario/varon.png', '2012-02-01', '2130.51', 2, 5, 1, '2017-04-24 15:52:58', '2017-06-29 18:36:00', '660.00', ''),
(3, 'Rosmery', 'Monasterios', 'Chipana', '', '7056645', 'LP', '1988-06-02', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Calama', 'Hemanos Garcia Lanza', '2074', '', '70661290', 'storage/usuario/2017525-104755.png', '2012-10-11', '3200.00', 3, 1, 1, '2017-04-24 16:06:05', '2017-11-01 15:04:56', '660.00', ''),
(4, 'Rosmery', 'Cadena', 'Quispe', '', '7065888', 'LP', '1991-04-17', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Nueva Asuncion', 'Capillo', '2594', '', '79651627', 'storage/usuario/mujer.png', '2013-04-04', '3700.00', 4, 1, 1, '2017-04-24 16:09:04', '2017-07-03 17:09:18', '300.00', ''),
(5, 'Regina Nancy ', 'Huanca', '', 'de Zabala', '2355997', 'LP', '1960-09-07', 'Femenino', 'Boliviana', 'La Paz', 'La Paz', 'Callamapaya', 'Baltazar Alquiza', '1132', '', '72035977', 'storage/usuario/mujer.png', '2015-01-01', '4500.00', 5, 5, 1, '2017-04-24 17:03:50', '2017-06-01 17:46:13', '300.00', ''),
(6, 'Mery Mauricia', 'Marin', 'Quisbert', '', '3458929', 'LP', '1969-09-22', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', '12 de Octubre', 'Raul Salmon', '72', '0', '72001552', 'storage/usuario/mujer.png', '2017-03-01', '2000.00', 6, 2, 1, '2017-04-24 17:09:15', '2017-06-01 17:36:54', '0.00', ''),
(7, 'Boris Richard', 'Zabala', 'Huanca', '', '4775179', 'LP', '1962-04-03', 'Masculino', 'Boliviana', 'Santa Cruz', 'Santa Cruz', 'Central', 'Potosi', '764', '', '72035980', 'storage/usuario/varon.png', '2014-04-01', '4500.00', 14, 5, 1, '2017-04-24 17:12:05', '2017-10-02 19:22:19', '300.00', ''),
(8, 'Marco Antonio', 'Condori', 'Challco', '', '8387153', 'LP', '1992-01-24', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Alto Lima', 'Huarina', '12', '', '67004121', 'storage/usuario/varon.png', '2014-04-01', '2133.00', 10, 5, 1, '2017-04-24 17:17:26', '2017-06-29 18:33:36', '300.00', ''),
(9, 'Richard Rafael', 'Quispe ', 'Rodriguez', '', '6833831', 'LP', '1986-03-20', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Urb. Franz Tamayo', '3 de Mayo', '1614', '', '76560925', 'storage/usuario/varon.png', '2014-10-01', '2340.00', 11, 4, 1, '2017-04-24 17:21:23', '2017-07-03 17:32:37', '300.00', ''),
(10, 'Noemy Gabriela', 'Jimenez', 'Apaza', '', '6947932', 'LP', '1988-09-30', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Pasankeri', '14 de Junio', '618', '0', '70540690', 'storage/usuario/mujer.png', '2015-07-01', '2850.00', 12, 1, 1, '2017-04-24 17:25:42', '2017-07-21 16:04:57', '300.00', ''),
(11, 'Carla Jenny', 'Soliz', 'Fernandez', '', '9218370', 'LP', '1990-06-08', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Villa Exaltacion', 'Siete', '12', '0', '71551055', 'storage/usuario/mujer.png', '2016-07-01', '2100.00', 13, 2, 1, '2017-04-24 17:29:12', '2017-07-03 17:09:48', '0.00', ''),
(12, 'Alberto', 'Quispe ', 'Flores', '', '9255092', 'LP', '1970-05-08', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Franz Tamayo', 'Emilio Villanueva', 'S/N', '0', '68090513', 'storage/usuario/varon.png', '2017-01-03', '2000.00', 11, 4, 1, '2017-04-24 17:31:56', '2017-06-02 19:34:56', '0.00', ''),
(13, 'Iver Ivan', 'Perez', 'Honorio', '', '6807994', 'LP', '1987-08-16', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Villa Aroma Kenko', 'D    ', '134', '0', '67004063', 'storage/usuario/varon.png', '2017-03-01', '6000.00', 5, 5, 1, '2017-04-24 17:44:49', '2017-10-02 19:21:53', '0.00', ''),
(14, 'Nestor Miguel', 'Luna ', 'Quispe', '', '3816331', 'CBBA', '1974-05-08', 'Masculino', 'Boliviana', 'La Paz', 'La Paz', 'Villa El Carmen', 'Ramiro Castillo', '1252', '0', '67001385', 'storage/usuario/varon.png', '2017-03-01', '2000.00', 6, 2, 1, '2017-04-24 18:40:51', '2017-06-02 19:35:26', '0.00', ''),
(15, 'Walter', 'Zabala', 'Coaquira', '', '2091142', 'LP', '1958-04-06', 'Masculino', 'Boliviana', 'La Paz', 'La Paz', '14 de Septiembre', 'Uyustus', '85', '', '68213739', 'storage/usuario/varon.png', '2015-01-01', '4500.00', 5, 5, 1, '2017-04-24 18:45:53', '2017-06-02 19:36:05', '300.00', ''),
(16, 'Claudia Maria', 'Quispe', 'Loza', '', '6952152', 'LP', '1991-06-28', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Villa Exaltacion', 'Siete', '26', '', '7203578', 'storage/usuario/mujer.png', '2015-01-01', '2918.00', 13, 2, 1, '2017-04-24 18:52:57', '2017-06-29 18:36:30', '300.00', ''),
(17, 'Jose', 'Poma', 'Quenta', '', '4935036', 'LP', '1970-12-05', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Señor de Lagunas 21 de Septiembre', 'New York', '5685', '', '67001382', 'storage/usuario/varon.png', '2015-03-02', '3030.40', 11, 4, 1, '2017-04-24 19:18:45', '2017-07-04 16:02:21', '300.00', '<p>Se incremento desde Junio 2017 de Bs. 2830.4 a Bs. 3030.40</p>\r\n'),
(18, 'Mercedes Amparo', 'Gutierrez', 'Alvarez', '', '6758910', 'LP', '1980-07-08', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Ciudad Satelite', 'Plan 321 C/A ', '61', '', '67001381', 'storage/usuario/mujer.png', '2015-03-02', '2140.00', 15, 5, 1, '2017-04-24 19:21:41', '2017-06-02 19:40:57', '300.00', ''),
(19, 'Marco Antonio Flavio', 'Clavel', 'Alcoba', '', '3455758', 'LP', '1969-02-18', 'Masculino', 'Boliviana', 'La Paz', 'La Paz', 'Miraflores', 'Pasaje Nanagua', '1824', '', '67000394', 'storage/usuario/varon.png', '2015-05-01', '2000.00', 6, 2, 1, '2017-04-24 19:29:50', '2017-06-02 19:41:22', '300.00', ''),
(20, 'Gloria Giovanna', 'Machaca', 'Quispe', '', '6065698', 'LP', '1987-05-29', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', '16 de Julio', 'Victor Gutierrez', '3053', '0', '67001379', 'storage/usuario/mujer.png', '2017-03-01', '5500.00', 16, 3, 1, '2017-04-24 19:30:04', '2017-04-24 19:30:04', '0.00', ''),
(22, 'Nirvana Winny', 'Condori', 'Limachi', '', '7067538', 'LP', '1996-02-29', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'V. Tejada Rectangular', 'Civica', '604', '', '79501145', 'storage/usuario/mujer.png', '2017-05-02', '2000.00', 12, 1, 1, '2017-05-25 20:20:30', '2017-06-01 18:10:40', '0.00', ''),
(23, 'Edwin', 'Ajahuanca', 'Callisaya', '', '6042218', 'LP', '1985-02-02', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'San Luis Tasa', 'Hernando de Maghales', '1514', '', '61156909', 'storage/usuario/2017529-94910.png', '2017-03-15', '3210.00', 18, 6, 1, '2017-05-25 22:07:51', '2017-06-13 18:33:32', '0.00', '<p>Por disposiciones del DS 3161 del 01/05/2017 se incrementa el 7% al salario de Bs. 3,000.-</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(24, 'Pablo', 'Segales', 'Conde', '', '11541319', 'LP', '1998-03-21', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Los Angenes', 'Ecuador', '4154', '', '0', '', '2017-05-02', '2000.00', 11, 4, 1, '2017-05-29 15:21:00', '2017-06-06 12:54:43', '0.00', ''),
(25, 'Jose Luis', 'Flores', 'Flores', '', '9148960', 'LP', '1994-09-06', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Cruz del Sur', 'Guerra del Pasifico', '2695', '', '0', '', '2017-02-13', '2000.00', 11, 4, 0, '2017-05-29 15:23:59', '2017-12-01 16:04:48', '0.00', '<p>Se retiro l 12/08/2017</p>\r\n'),
(26, 'Joel Cristaldo', 'Mamani', 'Cussy', '', '9109177', 'LP', '1993-06-27', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Nuevos Horizontes', 'Huayna Potosi', '20', '', '71206887', '', '2017-02-13', '2000.00', 17, 3, 0, '2017-05-29 15:46:45', '2017-07-21 14:17:22', '0.00', '<p>Se retiro el 30/06/2017</p>\r\n'),
(27, 'Genoveva Lidia', 'Chipana', 'Quispe', '', '5996811', 'LP', '1977-10-11', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', '922 Mcal. Santa Cruz-Viacha', 'Illampu', '706', '', '67347054', '', '2017-05-02', '2000.00', 6, 2, 1, '2017-05-29 15:49:37', '2017-06-06 12:54:33', '0.00', ''),
(28, 'Wilma Hortencia', 'Huari', 'Antiñapa', '', '7081740', 'LP', '1992-05-04', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Mariscal Sucre', 'Demetrio Canelas', '1524', '', '71551102', '', '2017-10-01', '2000.00', 6, 2, 1, '2017-05-29 15:56:10', '2017-11-03 20:18:08', '0.00', ''),
(29, 'Franco Fusi', 'Cruz', 'Ticona', '', '6908780', 'LP', '1994-12-02', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Villa Natividad', 'Santa Rosa', 'S/N', '', '0', '', '2017-05-02', '2068.00', 11, 4, 1, '2017-05-29 18:17:09', '2017-06-29 18:32:35', '0.00', ''),
(30, 'Eulogia ', 'Sandi', 'Saigua', '', '5496048', 'CH', '1980-02-16', 'Femenino', 'Boliviana', 'La Paz', 'Chuquisaca', 'Res. en Yurubamba', 'Res. en Yurubamba', 'S/N', '', '70618277', '', '2017-06-01', '1656.00', 19, 7, 1, '2017-06-01 18:40:23', '2017-06-01 18:40:23', '0.00', ''),
(31, 'Edwin Ronald', 'Quispe', 'Ramirez', '', '8367235', 'LP', '1985-02-02', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Villa Dolores F', 'Calle A', '52', '', '75274309', '', '2017-03-07', '345.00', 20, 3, 0, '2017-06-01 18:52:35', '2017-06-30 13:19:10', '0.00', ''),
(32, 'Ruben Aldair', 'Tito', 'Cruz', '', '7451222', 'OR', '1994-07-28', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Amig Chaco', 'Av. Bolivia ', '111', '', '78864148', '', '2017-06-01', '2000.00', 17, 3, 1, '2017-06-13 18:39:40', '2017-06-13 18:39:40', '0.00', ''),
(33, 'Fernando Emilio', 'Maldonado', 'Gutierrez', '', '9205326', 'LP', '1998-07-21', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Santiago II', 'Calle 2', '1130', '2826270', '73725340', '', '2017-07-10', '2000.00', 11, 4, 0, '2017-07-18 13:52:36', '2017-12-01 17:02:00', '0.00', ''),
(34, 'Sixto', 'Quispe', 'Condori', '', '6785253', 'LP', '1982-08-06', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Mercurio', 'Belgica', '2113', '2826270', '69807469', '', '2017-07-18', '1700.00', 11, 4, 1, '2017-07-21 14:12:13', '2017-10-04 19:42:04', '0.00', '<p>Ingreso a Trabajar el 18/-07-2017</p>\r\n'),
(35, 'Yhovana', 'Ramirez', 'Gomez', '', '9133478', 'LP', '1997-02-23', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Cosmos', 'Puchini', '1035', '76752133', '76752133', '', '2017-07-03', '2000.00', 17, 3, 1, '2017-07-21 14:16:39', '2017-07-21 14:16:39', '0.00', '<p>Ingreso en fecha 03-07-2017</p>\r\n'),
(36, 'Rosa Ysela', 'Machaca', 'Cortez', '', '9948559', 'LP', '1995-02-19', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Bautista Saavedra', 'Av. Luis Rodriguez Pardo', '4965', '76238683', '76238683', '', '2017-07-03', '2000.00', 12, 1, 1, '2017-07-21 15:21:39', '2017-07-21 15:24:27', '0.00', '<p>Ingreso el 03-07-2017</p>\r\n'),
(37, 'Adelayda', 'Choque', 'Laura', '', '11093463', 'LP', '1996-04-13', 'Femenino', 'Boliviana', 'La Paz', 'El Alto', 'Villa Calama', 'Calle 3', '2335', '0', '75808324', '', '2017-07-24', '2000.00', 17, 3, 1, '2017-07-25 13:45:52', '2017-08-03 14:02:45', '0.00', '<p>Ingreso a trabajar el 24/07/2017</p>\r\n'),
(38, 'Adhemar Antonio', 'Torrico', 'Gutierrez', '', '12451372', 'LP', '1999-12-05', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', '16 de Julio', 'Eulert Dorado', '543', '2826270', '22826270', '', '2017-09-01', '1500.00', 11, 4, 0, '2017-10-04 19:26:23', '2017-12-01 16:04:29', '0.00', ''),
(39, 'Julio Cesar', 'Ramos', 'Alanoca', '', '13086790', 'LP', '1996-08-24', 'Masculino', 'Boliviana', 'La Paz', 'El Alto', 'Tilata', 'Coro Coro', '3640', '2826270', '75243854', '', '2017-10-18', '1500.00', 11, 4, 0, '2017-10-19 13:49:31', '2017-11-01 19:51:40', '0.00', ''),
(40, 'Roxana', 'Poma', 'Espejo', '', '4900296', 'LP', '1983-06-28', 'Femenino', 'Boliviana', 'La Paz', 'La Paz ', 'Villa Fatima', 'Las Americas', '507', '2826270', '73002565', '', '2017-10-24', '2000.00', 1, 4, 1, '2017-11-01 14:44:05', '2017-11-01 19:53:17', '0.00', ''),
(41, 'Genaro', 'Colque', 'Ciprian', '', '5648123', 'CH', '1980-07-17', 'Masculino', 'Boliviana', 'La Paz', 'Cobija', 'Central', 'Av. Teniente Coronel ', '53', '74436268', '0', '', '2017-11-01', '2500.00', 21, 8, 1, '2017-12-01 18:05:29', '2017-12-04 14:24:58', '0.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `emp_nit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emp_empleador` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_caja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_representante` int(10) UNSIGNED NOT NULL,
  `emp_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `emp_nombre`, `emp_nit`, `emp_empleador`, `emp_caja`, `id_representante`, `emp_imagen`, `emp_estado`, `created_at`, `updated_at`) VALUES
(1, 'ZABIM S.R.L', '179692028', '179692028-02', '01-601-00131', 5, 'storage/empresa/2017424-171746.jpeg', 1, '2017-04-24 21:17:46', '2017-04-24 21:17:46'),
(3, 'ZAIRE LTDA.', '1017793028', '1017793028-02', '01-601-00153', 15, 'storage/empresa/2017425-192132.jpg', 1, '2017-04-25 23:21:32', '2017-06-05 13:47:19'),
(4, 'BOLIVIAN BORDER SHOPS S.R.L.', '178386020', '178386020-02', '01-602-0185', 7, 'storage/empresa/2017426-92844.jpg', 1, '2017-04-26 13:28:44', '2017-06-05 13:46:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_tipoevento` int(10) UNSIGNED NOT NULL,
  `id_userregistra` int(10) UNSIGNED NOT NULL,
  `id_useractualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `fecha`, `lugar`, `descripcion`, `id_usuario`, `id_tipoevento`, `id_userregistra`, `id_useractualiza`, `created_at`, `updated_at`, `estado`) VALUES
(1, '2017-06-16 10:30:00', 'La Paz, Calle Mexico Zona San Pedro', 'Reunion con la Empresa Black Shield, para determinar las especificaciones tecnicas de la Central Telefonica y Internos', 5, 1, 5, 5, '2017-06-12 21:50:47', '2017-06-12 22:29:13', 1),
(2, '2017-06-13 09:05:00', 'el alto aduana interior', 'Recoger boleta original de la empresa ZAIRE LTDA.', 10, 3, 10, 10, '2017-06-12 22:10:20', '2017-06-12 22:10:20', 1),
(3, '2017-06-12 15:10:00', 'el alto almacen carretera viacha', 'ingreso a almacen despacho KTB 0617 2P.', 10, 4, 10, 10, '2017-06-12 22:36:05', '2017-06-12 22:36:05', 1),
(4, '2017-06-13 15:15:00', 'El Alto, cruce Villa Adela', 'cobro de cheques para los despachos KTG0817 Y KT917, BANCO UNION', 10, 5, 10, 10, '2017-06-13 18:13:50', '2017-06-13 20:45:13', 1),
(5, '2017-06-13 08:30:00', 'El Alto, oficina central', 'Registro de Informes de vendedores, creación de nuevos proveedores', 6, 6, 6, 6, '2017-06-13 20:07:46', '2017-06-13 20:07:46', 1),
(6, '2017-11-01 08:00:00', 'Descanso laboral', 'Descanso laboral por ser feriado nacional', 5, 1, 5, 5, '2017-10-31 20:44:45', '2017-10-31 20:44:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizaciones`
--

CREATE TABLE `localizaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `loc_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loc_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `localizaciones`
--

INSERT INTO `localizaciones` (`id`, `loc_nombre`, `loc_estado`, `created_at`, `updated_at`) VALUES
(1, 'Arica- Chile', 1, '2017-06-12 22:22:20', '2017-06-12 22:22:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_04_13_235635_create_cargo_table', 1),
('2017_04_14_000106_create_area_table', 1),
('2017_04_14_000509_create_empresa_table', 1),
('2017_04_14_003147_create_empleado_table', 1),
('2017_04_21_141011_create_relation_users_empleado', 1),
('2017_04_21_142137_create_relation_empresa_empleado', 1),
('2017_04_23_221301_create_asignar_empresa_table', 1),
('2017_04_28_221210_create_salario_minimo_table', 2),
('2017_04_28_224041_create_pago_table', 2),
('2017_05_08_191012_create_events_table', 3),
('2017_05_25_193635_add_bono_observaciones_column', 4),
('2017_05_27_150023_create_tipoeventos_table', 5),
('2017_05_27_151721_create_eventos_table', 5),
('2017_05_31_233431_create_movimientos_table', 6),
('2017_05_31_233534_create_localizaciones_table', 6),
('2017_05_31_233612_create_barcos_table', 6),
('2017_05_31_233655_create_rastreos_table', 6),
('2017_06_12_164539_add_column_nombrecompleto_users', 7),
('2017_12_13_120909_create_aguinaldos_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `mov_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mov_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `mov_nombre`, `mov_estado`, `created_at`, `updated_at`) VALUES
(1, 'Entregado a consignatario ', 1, '2017-06-12 22:21:44', '2017-06-12 22:21:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(10) UNSIGNED NOT NULL,
  `pag_tipo_empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `pag_dias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pag_mes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pag_gestion` int(11) NOT NULL,
  `pag_sueldo` decimal(18,2) NOT NULL,
  `pag_bono_antiguedad` decimal(18,2) NOT NULL,
  `pag_cantidad` decimal(18,2) NOT NULL,
  `pag_pagado` decimal(18,2) NOT NULL,
  `pag_produccion` decimal(18,2) NOT NULL,
  `pag_dominical` decimal(18,2) NOT NULL,
  `pag_otrobono` decimal(18,2) NOT NULL,
  `pag_total_ganado` decimal(18,2) NOT NULL,
  `pag_afp` decimal(18,2) NOT NULL,
  `pag_aporte` decimal(18,2) NOT NULL,
  `pag_iva` decimal(18,2) NOT NULL,
  `pag_anticipos` decimal(18,2) NOT NULL,
  `pag_total_descuento` decimal(18,2) NOT NULL,
  `pag_total_liquido` decimal(18,2) NOT NULL,
  `pag_firma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pag_estado` tinyint(1) NOT NULL DEFAULT '1',
  `user_registra` int(10) UNSIGNED NOT NULL,
  `user_actualiza` int(10) UNSIGNED NOT NULL,
  `id_salariominimo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `pag_tipo_empleado`, `id_empleado`, `pag_dias`, `pag_mes`, `pag_gestion`, `pag_sueldo`, `pag_bono_antiguedad`, `pag_cantidad`, `pag_pagado`, `pag_produccion`, `pag_dominical`, `pag_otrobono`, `pag_total_ganado`, `pag_afp`, `pag_aporte`, `pag_iva`, `pag_anticipos`, `pag_total_descuento`, `pag_total_liquido`, `pag_firma`, `pag_estado`, `user_registra`, `user_actualiza`, `id_salariominimo`, `created_at`, `updated_at`) VALUES
(5, 'PERMANENTE', 1, '30', 'Abril', 2017, '2051.78', '595.65', '0.00', '0.00', '0.00', '0.00', '0.00', '2647.43', '336.49', '0.00', '0.00', '0.00', '336.49', '2310.94', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-05-26 19:52:29', '2017-05-26 20:05:03'),
(6, 'PERMANENTE', 2, '30', 'Abril', 2017, '1897.67', '595.65', '0.00', '0.00', '0.00', '0.00', '0.00', '2493.32', '316.90', '0.00', '0.00', '0.00', '316.90', '2176.42', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-05-26 20:03:14', '2017-05-26 20:06:13'),
(7, 'PERMANENTE', 3, '30', 'Abril', 2017, '2438.00', '270.75', '0.00', '0.00', '0.00', '0.00', '0.00', '2708.75', '344.28', '0.00', '0.00', '0.00', '344.28', '2364.47', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-05-26 20:18:45', '2017-05-26 20:18:45'),
(8, 'PERMANENTE', 4, '30', 'Abril', 2017, '2950.00', '270.75', '0.00', '0.00', '0.00', '0.00', '0.00', '3220.75', '409.36', '0.00', '0.00', '0.00', '409.36', '2811.39', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-05-26 20:20:09', '2017-05-26 20:20:09'),
(9, 'PERMANENTE', 5, '30', 'Abril', 2017, '4500.00', '270.75', '0.00', '0.00', '0.00', '0.00', '0.00', '4770.75', '606.36', '0.00', '0.00', '0.00', '606.36', '4164.39', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-05-26 20:22:34', '2017-05-26 20:22:34'),
(10, 'PERMANENTE', 6, '30', 'Abril', 2017, '1805.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1805.00', '229.42', '0.00', '0.00', '0.00', '229.42', '1575.58', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-05-26 20:23:04', '2017-05-29 14:07:05'),
(11, 'PERMANENTE', 15, '30', 'Mayo', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-05-29 15:08:09', '2017-06-05 13:54:29'),
(12, 'PERMANENTE', 7, '30', 'Mayo', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 0, 3, 3, 1, '2017-05-29 15:08:27', '2017-06-02 19:38:17'),
(13, 'PERMANENTE', 8, '30', 'Mayo', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2300.00', '292.33', '0.00', '0.00', '0.00', '292.33', '2007.67', 'PAPELETA DE PAGO', 0, 3, 3, 1, '2017-05-29 15:18:10', '2017-06-02 19:38:09'),
(14, 'PERMANENTE', 1, '30', 'Mayo', 2017, '2195.40', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2855.40', '362.92', '0.00', '0.00', '0.00', '362.92', '2492.48', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-06-01 17:41:40', '2017-06-01 17:41:40'),
(15, 'PERMANENTE', 2, '30', 'Mayo', 2017, '2030.51', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2690.51', '341.96', '0.00', '0.00', '0.00', '341.96', '2348.55', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-06-01 17:42:22', '2017-06-01 17:42:22'),
(16, 'PERMANENTE', 3, '30', 'Mayo', 2017, '2608.66', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2908.66', '369.69', '0.00', '0.00', '0.00', '369.69', '2538.97', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-06-01 17:43:32', '2017-06-01 17:43:32'),
(17, 'PERMANENTE', 4, '30', 'Mayo', 2017, '3156.50', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3456.50', '439.32', '0.00', '0.00', '0.00', '439.32', '3017.18', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-06-01 17:45:43', '2017-06-01 17:45:43'),
(18, 'PERMANENTE', 5, '30', 'Mayo', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-06-01 17:46:42', '2017-06-01 17:46:42'),
(19, 'PERMANENTE', 6, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-06-01 17:47:04', '2017-06-01 17:47:04'),
(20, 'PERMANENTE', 22, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 1, 1, 1, '2017-06-01 17:47:21', '2017-06-01 17:47:21'),
(21, 'PERMANENTE', 24, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '33.33', '287.53', '1712.47', 'PAPELETA DE PAGO', 1, 1, 4, 1, '2017-06-01 18:24:00', '2017-06-05 13:54:12'),
(22, 'EVENTUAL', 30, '30', 'Mayo', 2017, '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '', 1, 1, 4, 1, '2017-06-01 19:37:29', '2017-07-03 18:37:35'),
(23, 'EVENTUAL', 25, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '266.67', '266.67', '1733.33', '', 1, 1, 1, 1, '2017-06-01 19:54:43', '2017-06-01 19:54:43'),
(24, 'PERMANENTE', 29, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 1, 4, 1, '2017-06-01 20:09:16', '2017-06-06 18:11:32'),
(25, 'EVENTUAL', 28, '30', 'Mayo', 2017, '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '', 1, 1, 1, 1, '2017-06-01 20:09:41', '2017-06-01 20:09:41'),
(26, 'EVENTUAL', 31, '23', 'Mayo', 2017, '345.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '345.00', '0.00', '0.00', '0.00', '0.00', '0.00', '345.00', '', 1, 1, 1, 1, '2017-06-01 20:12:17', '2017-06-01 20:12:17'),
(27, 'EVENTUAL', 23, '30', 'Mayo', 2017, '3000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3000.00', '', 1, 1, 1, 1, '2017-06-01 20:21:52', '2017-06-01 20:21:52'),
(28, 'EVENTUAL', 26, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 1, 1, 1, '2017-06-01 20:24:17', '2017-06-01 20:24:17'),
(29, 'PERMANENTE', 19, '30', 'Mayo', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2300.00', '292.33', '0.00', '0.00', '0.00', '292.33', '2007.67', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-06-02 19:44:28', '2017-06-05 13:53:44'),
(30, 'PERMANENTE', 14, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:44:54', '2017-06-02 19:44:54'),
(31, 'PERMANENTE', 13, '30', 'Mayo', 2017, '6000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6000.00', '762.60', '0.00', '0.00', '0.00', '762.60', '5237.40', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:45:14', '2017-06-02 19:45:14'),
(32, 'PERMANENTE', 12, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:45:44', '2017-06-02 19:45:44'),
(33, 'PERMANENTE', 11, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:46:03', '2017-06-02 19:46:03'),
(34, 'PERMANENTE', 16, '30', 'Mayo', 2017, '2568.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2868.00', '364.52', '0.00', '0.00', '0.00', '364.52', '2503.48', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-06-02 19:46:22', '2017-06-05 13:53:19'),
(35, 'PERMANENTE', 10, '30', 'Mayo', 2017, '2268.40', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2268.40', '288.31', '0.00', '0.00', '0.00', '288.31', '1980.09', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:47:06', '2017-06-02 20:39:47'),
(36, 'PERMANENTE', 17, '30', 'Mayo', 2017, '2830.40', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3130.40', '397.87', '0.00', '0.00', '0.00', '397.87', '2732.53', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-06-02 19:47:10', '2017-06-05 13:52:58'),
(37, 'PERMANENTE', 9, '30', 'Mayo', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '0.00', '310.12', '2129.88', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:47:34', '2017-06-02 19:47:34'),
(38, 'PERMANENTE', 18, '30', 'Mayo', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '81.33', '391.45', '2048.55', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-06-02 19:47:57', '2017-06-05 13:52:44'),
(39, 'PERMANENTE', 20, '30', 'Mayo', 2017, '5500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5500.00', '699.05', '0.00', '0.00', '0.00', '699.05', '4800.95', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-06-02 19:50:06', '2017-06-05 13:52:28'),
(40, 'PERMANENTE', 27, '30', 'Mayo', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-06-02 19:52:15', '2017-06-05 13:51:52'),
(41, 'PERMANENTE', 8, '30', 'Mayo', 2017, '2033.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2333.00', '296.52', '0.00', '0.00', '0.00', '296.52', '2036.48', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:52:34', '2017-06-02 19:52:34'),
(42, 'PERMANENTE', 7, '30', 'Mayo', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 3, 3, 1, '2017-06-02 19:52:58', '2017-06-02 19:52:58'),
(43, 'EVENTUAL', 30, '30', 'Junio', 2017, '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '', 1, 4, 4, 1, '2017-07-03 18:37:59', '2017-07-03 18:37:59'),
(44, 'EVENTUAL', 28, '30', 'Junio', 2017, '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '', 1, 4, 4, 1, '2017-07-03 18:39:40', '2017-07-03 18:39:40'),
(45, 'EVENTUAL', 26, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-07-03 18:40:20', '2017-07-03 18:40:20'),
(46, 'EVENTUAL', 25, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '133.33', '133.33', '1866.67', '', 1, 4, 4, 1, '2017-07-03 18:43:14', '2017-07-04 12:53:05'),
(47, 'EVENTUAL', 32, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-07-03 18:47:39', '2017-07-03 18:47:39'),
(48, 'EVENTUAL', 23, '30', 'Junio', 2017, '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '', 1, 4, 4, 1, '2017-07-03 18:59:37', '2017-07-04 12:51:59'),
(49, 'PERMANENTE', 1, '30', 'Junio', 2017, '2395.40', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3055.40', '388.34', '0.00', '0.00', '0.00', '388.34', '2667.06', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:53:35', '2017-07-04 13:53:35'),
(50, 'PERMANENTE', 2, '30', 'Junio', 2017, '2130.51', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2790.51', '354.67', '0.00', '0.00', '0.00', '354.67', '2435.84', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:54:46', '2017-07-04 13:54:46'),
(51, 'PERMANENTE', 3, '30', 'Junio', 2017, '3200.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3500.00', '444.85', '0.00', '0.00', '0.00', '444.85', '3055.15', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:55:25', '2017-07-04 13:55:25'),
(52, 'PERMANENTE', 4, '30', 'Junio', 2017, '3700.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4000.00', '508.40', '0.00', '0.00', '0.00', '508.40', '3491.60', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:56:46', '2017-07-04 13:56:46'),
(53, 'PERMANENTE', 5, '30', 'Junio', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:57:12', '2017-07-04 13:57:12'),
(54, 'PERMANENTE', 6, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:57:43', '2017-07-04 13:57:43'),
(55, 'PERMANENTE', 22, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:58:05', '2017-07-04 13:58:05'),
(56, 'PERMANENTE', 24, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 13:58:53', '2017-07-04 13:58:53'),
(57, 'PERMANENTE', 15, '30', 'Junio', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:00:41', '2017-07-04 14:00:41'),
(58, 'PERMANENTE', 16, '30', 'Junio', 2017, '2918.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3218.00', '409.01', '0.00', '0.00', '0.00', '409.01', '2808.99', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:01:37', '2017-07-04 14:01:37'),
(59, 'PERMANENTE', 17, '30', 'Junio', 2017, '3030.40', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3330.40', '423.29', '0.00', '0.00', '0.00', '423.29', '2907.11', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:03:48', '2017-07-04 14:03:48'),
(60, 'PERMANENTE', 18, '30', 'Junio', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '0.00', '310.12', '2129.88', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:05:29', '2017-07-04 14:05:29'),
(61, 'PERMANENTE', 19, '30', 'Junio', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2300.00', '292.33', '0.00', '0.00', '0.00', '292.33', '2007.67', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:07:13', '2017-07-04 14:07:13'),
(62, 'PERMANENTE', 20, '30', 'Junio', 2017, '5500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5500.00', '699.05', '0.00', '0.00', '0.00', '699.05', '4800.95', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:07:56', '2017-07-04 14:07:56'),
(63, 'PERMANENTE', 29, '30', 'Junio', 2017, '2068.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2068.00', '262.84', '0.00', '0.00', '68.93', '331.77', '1736.23', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:16:36', '2017-07-04 14:18:02'),
(64, 'PERMANENTE', 27, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:18:45', '2017-07-04 14:18:45'),
(65, 'PERMANENTE', 7, '30', 'Junio', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:21:57', '2017-07-04 14:21:57'),
(66, 'PERMANENTE', 8, '30', 'Junio', 2017, '2133.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2433.00', '309.23', '0.00', '0.00', '0.00', '309.23', '2123.77', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:22:52', '2017-07-04 14:22:52'),
(67, 'PERMANENTE', 9, '30', 'Junio', 2017, '2340.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2640.00', '335.54', '0.00', '0.00', '0.00', '335.54', '2304.46', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:23:32', '2017-07-04 14:23:32'),
(68, 'PERMANENTE', 10, '30', 'Junio', 2017, '2850.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2850.00', '362.24', '0.00', '0.00', '0.00', '362.24', '2487.77', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:23:52', '2017-07-04 14:23:52'),
(69, 'PERMANENTE', 11, '30', 'Junio', 2017, '2100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '266.91', '0.00', '0.00', '0.00', '266.91', '1833.09', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:24:23', '2017-07-04 14:24:23'),
(70, 'PERMANENTE', 12, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:24:47', '2017-07-04 14:24:47'),
(71, 'PERMANENTE', 13, '30', 'Junio', 2017, '6000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6000.00', '762.60', '0.00', '0.00', '0.00', '762.60', '5237.40', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:25:06', '2017-07-04 14:25:06'),
(72, 'PERMANENTE', 14, '30', 'Junio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-04 14:25:21', '2017-07-04 14:25:21'),
(73, 'PERMANENTE', 4, '30', 'Julio', 2017, '3700.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4000.00', '508.40', '0.00', '0.00', '133.33', '641.73', '3358.27', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 14:18:59', '2017-08-03 13:21:07'),
(74, 'PERMANENTE', 22, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 14:19:43', '2017-07-21 14:19:43'),
(75, 'EVENTUAL', 25, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '266.67', '266.67', '1733.33', '', 1, 4, 4, 1, '2017-07-21 14:19:59', '2017-08-02 18:23:25'),
(76, 'PERMANENTE', 5, '30', 'Julio', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 14:20:41', '2017-07-21 14:20:41'),
(77, 'PERMANENTE', 1, '30', 'Julio', 2017, '2395.40', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3055.40', '388.34', '0.00', '0.00', '0.00', '388.34', '2667.06', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:09:13', '2017-07-21 15:09:13'),
(78, 'PERMANENTE', 2, '30', 'Julio', 2017, '2130.51', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2790.51', '354.67', '0.00', '0.00', '0.00', '354.67', '2435.84', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:09:42', '2017-07-21 15:09:42'),
(79, 'PERMANENTE', 3, '30', 'Julio', 2017, '3200.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3500.00', '444.85', '0.00', '0.00', '0.00', '444.85', '3055.15', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:10:27', '2017-07-21 15:10:27'),
(80, 'PERMANENTE', 6, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:11:32', '2017-07-21 15:11:32'),
(81, 'PERMANENTE', 24, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:12:31', '2017-07-21 15:12:31'),
(82, 'EVENTUAL', 28, '30', 'Julio', 2017, '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '', 1, 4, 4, 1, '2017-07-21 15:13:12', '2017-07-21 15:13:12'),
(83, 'EVENTUAL', 23, '30', 'Julio', 2017, '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '', 1, 4, 4, 1, '2017-07-21 15:13:59', '2017-07-21 15:13:59'),
(84, 'EVENTUAL', 30, '30', 'Julio', 2017, '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '', 1, 4, 4, 1, '2017-07-21 15:14:23', '2017-07-21 15:14:23'),
(85, 'EVENTUAL', 32, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-07-21 15:14:42', '2017-07-21 15:14:42'),
(86, 'EVENTUAL', 35, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-07-21 15:25:44', '2017-07-21 15:25:44'),
(87, 'EVENTUAL', 36, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '66.67', '66.67', '1933.33', '', 1, 4, 4, 1, '2017-07-21 15:26:26', '2017-08-02 18:25:13'),
(88, 'EVENTUAL', 33, '22', 'Julio', 2017, '1466.67', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1466.67', '0.00', '0.00', '0.00', '0.00', '0.00', '1466.67', '', 1, 4, 4, 1, '2017-07-21 15:30:40', '2017-07-21 15:35:39'),
(89, 'EVENTUAL', 34, '14', 'Julio', 2017, '700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '700.00', '', 1, 4, 4, 1, '2017-07-21 15:33:32', '2017-07-21 15:35:44'),
(90, 'PERMANENTE', 15, '30', 'Julio', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:55:17', '2017-07-21 15:55:17'),
(91, 'PERMANENTE', 16, '30', 'Julio', 2017, '2918.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3218.00', '409.01', '0.00', '0.00', '0.00', '409.01', '2808.99', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:56:14', '2017-07-21 15:56:14'),
(92, 'PERMANENTE', 17, '30', 'Julio', 2017, '3030.40', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3330.40', '423.29', '0.00', '0.00', '0.00', '423.29', '2907.11', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:56:47', '2017-07-21 15:56:47'),
(93, 'PERMANENTE', 18, '30', 'Julio', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '81.33', '391.45', '2048.55', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:57:14', '2017-08-02 18:27:04'),
(94, 'PERMANENTE', 19, '30', 'Julio', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2300.00', '292.33', '0.00', '0.00', '0.00', '292.33', '2007.67', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:57:37', '2017-07-21 15:57:37'),
(95, 'PERMANENTE', 20, '30', 'Julio', 2017, '5500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5500.00', '699.05', '0.00', '0.00', '183.33', '882.38', '4617.62', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:58:01', '2017-08-02 18:28:06'),
(96, 'PERMANENTE', 29, '30', 'Julio', 2017, '2068.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2068.00', '262.84', '0.00', '0.00', '68.93', '331.77', '1736.23', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 15:59:31', '2017-08-02 18:29:04'),
(97, 'PERMANENTE', 27, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:00:00', '2017-07-21 16:00:00'),
(98, 'PERMANENTE', 7, '30', 'Julio', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:00:33', '2017-07-21 16:00:33'),
(99, 'PERMANENTE', 8, '30', 'Julio', 2017, '2133.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2433.00', '309.23', '0.00', '0.00', '0.00', '309.23', '2123.77', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:00:58', '2017-07-21 16:00:58'),
(100, 'PERMANENTE', 9, '30', 'Julio', 2017, '2340.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2640.00', '335.54', '0.00', '0.00', '0.00', '335.54', '2304.46', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:02:55', '2017-07-21 16:02:55'),
(101, 'PERMANENTE', 10, '30', 'Julio', 2017, '2850.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3150.00', '400.37', '0.00', '0.00', '0.00', '400.37', '2749.64', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:03:14', '2017-07-21 16:05:23'),
(102, 'PERMANENTE', 11, '30', 'Julio', 2017, '2100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '266.91', '0.00', '0.00', '0.00', '266.91', '1833.09', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:06:18', '2017-07-21 16:06:18'),
(103, 'PERMANENTE', 12, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:07:00', '2017-07-21 16:07:00'),
(104, 'PERMANENTE', 13, '30', 'Julio', 2017, '6000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6000.00', '762.60', '0.00', '0.00', '0.00', '762.60', '5237.40', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:07:17', '2017-07-21 16:07:17'),
(105, 'PERMANENTE', 14, '30', 'Julio', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-07-21 16:07:46', '2017-07-21 16:07:46'),
(106, 'EVENTUAL', 37, '8', 'Julio', 2017, '533.33', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '533.33', '0.00', '0.00', '0.00', '0.00', '0.00', '533.33', '', 1, 4, 4, 1, '2017-07-25 13:58:13', '2017-07-25 13:58:13'),
(107, 'PERMANENTE', 15, '30', 'Agosto', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:13:45', '2017-09-01 14:13:45'),
(108, 'PERMANENTE', 16, '30', 'Agosto', 2017, '2918.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3218.00', '409.01', '0.00', '0.00', '0.00', '409.01', '2808.99', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:14:34', '2017-09-01 14:14:34'),
(109, 'PERMANENTE', 17, '30', 'Agosto', 2017, '3030.40', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3330.40', '423.29', '0.00', '0.00', '0.00', '423.29', '2907.11', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:14:52', '2017-09-01 14:14:52'),
(110, 'PERMANENTE', 18, '30', 'Agosto', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '0.00', '310.12', '2129.88', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:15:13', '2017-09-01 14:15:13'),
(111, 'PERMANENTE', 19, '30', 'Agosto', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2300.00', '292.33', '0.00', '0.00', '0.00', '292.33', '2007.67', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:16:16', '2017-09-01 14:16:16'),
(112, 'PERMANENTE', 20, '30', 'Agosto', 2017, '5500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5500.00', '699.05', '0.00', '0.00', '0.00', '699.05', '4800.95', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:16:31', '2017-09-01 14:16:31'),
(113, 'PERMANENTE', 29, '30', 'Agosto', 2017, '2068.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2068.00', '262.84', '0.00', '0.00', '0.00', '262.84', '1805.16', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:16:49', '2017-09-01 14:16:49'),
(114, 'PERMANENTE', 27, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:17:24', '2017-09-01 14:17:24'),
(115, 'PERMANENTE', 1, '30', 'Agosto', 2017, '2395.40', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3055.40', '388.34', '0.00', '0.00', '0.00', '388.34', '2667.06', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:27:50', '2017-09-01 14:27:50'),
(116, 'PERMANENTE', 2, '30', 'Agosto', 2017, '2130.51', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2790.51', '354.67', '0.00', '0.00', '0.00', '354.67', '2435.84', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:28:13', '2017-09-01 14:28:13'),
(117, 'PERMANENTE', 3, '30', 'Agosto', 2017, '3200.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3500.00', '444.85', '0.00', '0.00', '0.00', '444.85', '3055.15', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:42:55', '2017-09-01 14:42:55'),
(118, 'PERMANENTE', 4, '30', 'Agosto', 2017, '3700.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4000.00', '508.40', '0.00', '0.00', '0.00', '508.40', '3491.60', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:43:09', '2017-09-01 14:43:09'),
(119, 'PERMANENTE', 5, '30', 'Agosto', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:43:26', '2017-09-01 14:43:26'),
(120, 'PERMANENTE', 6, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:43:45', '2017-09-01 14:43:45'),
(121, 'PERMANENTE', 22, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:44:00', '2017-09-01 14:44:00'),
(122, 'PERMANENTE', 24, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 14:44:21', '2017-09-01 14:44:21'),
(123, 'EVENTUAL', 28, '30', 'Agosto', 2017, '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '', 1, 4, 4, 1, '2017-09-01 15:09:00', '2017-09-01 15:15:16'),
(124, 'EVENTUAL', 25, '12', 'Agosto', 2017, '800.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '800.00', '0.00', '0.00', '0.00', '66.67', '66.67', '733.33', '', 1, 4, 4, 1, '2017-09-01 15:13:17', '2017-09-04 14:10:05'),
(125, 'EVENTUAL', 23, '30', 'Agosto', 2017, '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '', 1, 4, 4, 1, '2017-09-01 15:13:39', '2017-09-01 15:15:55'),
(126, 'EVENTUAL', 32, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-09-01 15:13:51', '2017-09-01 15:16:13'),
(127, 'EVENTUAL', 30, '30', 'Agosto', 2017, '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '', 1, 4, 4, 1, '2017-09-01 15:14:06', '2017-09-01 15:16:39'),
(128, 'EVENTUAL', 36, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-09-01 15:14:51', '2017-09-04 15:53:29'),
(129, 'EVENTUAL', 35, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-09-01 15:17:20', '2017-09-01 15:17:20'),
(130, 'EVENTUAL', 33, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-09-01 15:17:41', '2017-09-01 15:17:41'),
(131, 'EVENTUAL', 34, '30', 'Agosto', 2017, '1500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1500.00', '', 1, 4, 4, 1, '2017-09-01 15:18:00', '2017-09-01 15:18:00'),
(132, 'EVENTUAL', 37, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-09-01 15:18:19', '2017-09-01 15:18:19'),
(133, 'PERMANENTE', 7, '30', 'Agosto', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:24:57', '2017-09-01 15:24:57'),
(134, 'PERMANENTE', 8, '30', 'Agosto', 2017, '2133.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2433.00', '309.23', '0.00', '0.00', '0.00', '309.23', '2123.77', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:25:09', '2017-09-01 15:25:09'),
(135, 'PERMANENTE', 9, '30', 'Agosto', 2017, '2340.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2640.00', '335.54', '0.00', '0.00', '0.00', '335.54', '2304.46', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:25:24', '2017-09-01 15:25:24'),
(136, 'PERMANENTE', 10, '30', 'Agosto', 2017, '2850.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3150.00', '400.37', '0.00', '0.00', '0.00', '400.37', '2749.64', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:25:47', '2017-09-01 15:25:47'),
(137, 'PERMANENTE', 11, '30', 'Agosto', 2017, '2100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '266.91', '0.00', '0.00', '0.00', '266.91', '1833.09', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:26:01', '2017-09-01 15:26:01'),
(138, 'PERMANENTE', 12, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:26:14', '2017-09-01 15:26:14'),
(139, 'PERMANENTE', 13, '30', 'Agosto', 2017, '6000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6000.00', '762.60', '0.00', '0.00', '0.00', '762.60', '5237.40', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:26:26', '2017-09-01 15:26:26'),
(140, 'PERMANENTE', 14, '30', 'Agosto', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-09-01 15:26:38', '2017-09-01 15:26:38'),
(141, 'PERMANENTE', 15, '30', 'Septiembre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:07:53', '2017-10-04 18:07:53'),
(142, 'PERMANENTE', 16, '30', 'Septiembre', 2017, '2918.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3218.00', '409.01', '0.00', '0.00', '0.00', '409.01', '2808.99', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:08:09', '2017-10-04 18:08:09'),
(143, 'PERMANENTE', 17, '30', 'Septiembre', 2017, '3030.40', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3330.40', '423.29', '0.00', '0.00', '0.00', '423.29', '2907.11', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:08:47', '2017-10-04 18:08:47'),
(144, 'PERMANENTE', 18, '30', 'Septiembre', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '0.00', '310.12', '2129.88', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:24:35', '2017-10-04 18:24:35'),
(145, 'PERMANENTE', 19, '30', 'Septiembre', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2300.00', '292.33', '0.00', '0.00', '0.00', '292.33', '2007.67', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:24:50', '2017-10-04 18:24:50'),
(146, 'PERMANENTE', 20, '30', 'Septiembre', 2017, '5500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5500.00', '699.05', '0.00', '0.00', '0.00', '699.05', '4800.95', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:25:03', '2017-10-04 18:25:03'),
(147, 'PERMANENTE', 29, '30', 'Septiembre', 2017, '2068.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2068.00', '262.84', '0.00', '0.00', '0.00', '262.84', '1805.16', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:42:24', '2017-10-04 18:42:24'),
(148, 'PERMANENTE', 27, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 18:42:37', '2017-10-04 18:42:37'),
(149, 'PERMANENTE', 1, '30', 'Septiembre', 2017, '2395.40', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3055.40', '388.34', '0.00', '0.00', '0.00', '388.34', '2667.06', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:15:46', '2017-10-04 19:15:46'),
(150, 'PERMANENTE', 2, '30', 'Septiembre', 2017, '2130.51', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2790.51', '354.67', '0.00', '0.00', '0.00', '354.67', '2435.84', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:16:00', '2017-10-04 19:16:00'),
(151, 'PERMANENTE', 3, '30', 'Septiembre', 2017, '3200.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3500.00', '444.85', '0.00', '0.00', '0.00', '444.85', '3055.15', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:16:29', '2017-10-04 19:16:29'),
(152, 'PERMANENTE', 4, '30', 'Septiembre', 2017, '3700.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4000.00', '508.40', '0.00', '0.00', '0.00', '508.40', '3491.60', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:16:47', '2017-10-04 19:16:47'),
(153, 'PERMANENTE', 5, '30', 'Septiembre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:17:03', '2017-10-04 19:17:26'),
(154, 'PERMANENTE', 24, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:17:41', '2017-10-04 19:17:41'),
(155, 'PERMANENTE', 22, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:17:53', '2017-10-04 19:17:53'),
(156, 'PERMANENTE', 6, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:18:47', '2017-10-04 19:18:47'),
(157, 'EVENTUAL', 28, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-10-04 19:28:11', '2017-10-06 13:24:59'),
(158, 'EVENTUAL', 23, '30', 'Septiembre', 2017, '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '', 1, 4, 4, 1, '2017-10-04 19:28:37', '2017-10-04 19:28:37'),
(159, 'EVENTUAL', 30, '30', 'Septiembre', 2017, '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '', 1, 4, 4, 1, '2017-10-04 19:28:49', '2017-10-04 19:28:49'),
(160, 'EVENTUAL', 32, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-10-04 19:29:01', '2017-10-04 19:30:16'),
(161, 'EVENTUAL', 35, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-10-04 19:29:10', '2017-10-04 19:30:55'),
(162, 'EVENTUAL', 36, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '66.67', '66.67', '1933.33', '', 1, 4, 4, 1, '2017-10-04 19:29:42', '2017-10-04 19:31:11'),
(163, 'EVENTUAL', 33, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-10-04 19:31:32', '2017-10-04 19:31:32'),
(164, 'EVENTUAL', 34, '30', 'Septiembre', 2017, '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '', 1, 4, 4, 1, '2017-10-04 19:31:53', '2017-10-04 19:42:33'),
(165, 'EVENTUAL', 37, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-10-04 19:41:25', '2017-10-04 19:41:25'),
(166, 'EVENTUAL', 38, '30', 'Septiembre', 2017, '1500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1500.00', '0.00', '0.00', '0.00', '100.00', '100.00', '1400.00', '', 1, 4, 4, 1, '2017-10-04 19:41:44', '2017-10-05 19:06:55'),
(167, 'PERMANENTE', 7, '30', 'Septiembre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:45:27', '2017-10-04 19:45:27'),
(168, 'PERMANENTE', 8, '30', 'Septiembre', 2017, '2133.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2433.00', '309.23', '0.00', '0.00', '0.00', '309.23', '2123.77', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:45:40', '2017-10-04 19:45:40'),
(169, 'PERMANENTE', 9, '30', 'Septiembre', 2017, '2340.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2640.00', '335.54', '0.00', '0.00', '0.00', '335.54', '2304.46', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:46:01', '2017-10-04 19:46:01'),
(170, 'PERMANENTE', 10, '30', 'Septiembre', 2017, '2850.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3150.00', '400.37', '0.00', '0.00', '0.00', '400.37', '2749.64', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:46:34', '2017-10-04 19:46:34'),
(171, 'PERMANENTE', 11, '30', 'Septiembre', 2017, '2100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '266.91', '0.00', '0.00', '0.00', '266.91', '1833.09', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:46:52', '2017-10-04 19:46:52'),
(172, 'PERMANENTE', 12, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:47:08', '2017-10-04 19:47:08'),
(173, 'PERMANENTE', 13, '30', 'Septiembre', 2017, '6000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6000.00', '762.60', '0.00', '0.00', '0.00', '762.60', '5237.40', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:49:19', '2017-10-04 19:49:19'),
(174, 'PERMANENTE', 14, '30', 'Septiembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-10-04 19:49:34', '2017-10-04 19:49:34'),
(175, 'PERMANENTE', 15, '30', 'Octubre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:34:26', '2017-11-01 14:34:26'),
(176, 'PERMANENTE', 16, '30', 'Octubre', 2017, '2918.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3218.00', '409.01', '0.00', '0.00', '0.00', '409.01', '2808.99', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:34:42', '2017-11-01 14:34:42'),
(177, 'PERMANENTE', 17, '30', 'Octubre', 2017, '3030.40', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3330.40', '423.29', '0.00', '0.00', '0.00', '423.29', '2907.11', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:34:55', '2017-11-01 14:34:55'),
(178, 'PERMANENTE', 18, '30', 'Octubre', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '0.00', '310.12', '2129.88', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:35:13', '2017-11-01 14:35:13'),
(179, 'PERMANENTE', 19, '30', 'Octubre', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2300.00', '292.33', '0.00', '0.00', '0.00', '292.33', '2007.67', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:35:26', '2017-11-01 14:35:26'),
(180, 'PERMANENTE', 20, '30', 'Octubre', 2017, '5500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '5500.00', '699.05', '0.00', '0.00', '0.00', '699.05', '4800.95', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:35:37', '2017-11-01 14:35:37'),
(181, 'PERMANENTE', 29, '30', 'Octubre', 2017, '2068.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2068.00', '262.84', '0.00', '0.00', '0.00', '262.84', '1805.16', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:35:50', '2017-11-01 14:35:50'),
(182, 'PERMANENTE', 27, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 14:36:04', '2017-11-01 14:36:04'),
(183, 'PERMANENTE', 1, '30', 'Octubre', 2017, '2395.40', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3055.40', '388.34', '0.00', '0.00', '0.00', '388.34', '2667.06', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 15:09:30', '2017-11-01 15:09:30'),
(184, 'PERMANENTE', 2, '30', 'Octubre', 2017, '2130.51', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2790.51', '354.67', '0.00', '0.00', '0.00', '354.67', '2435.84', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 15:26:49', '2017-11-01 15:26:49'),
(185, 'PERMANENTE', 3, '30', 'Octubre', 2017, '3200.00', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3860.00', '490.61', '0.00', '0.00', '0.00', '490.61', '3369.39', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 15:27:05', '2017-11-01 15:27:05'),
(186, 'PERMANENTE', 4, '30', 'Octubre', 2017, '3700.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4000.00', '508.40', '0.00', '0.00', '0.00', '508.40', '3491.60', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 15:27:26', '2017-11-01 15:27:26'),
(187, 'PERMANENTE', 5, '30', 'Octubre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 15:27:43', '2017-11-01 15:27:43'),
(188, 'PERMANENTE', 6, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 15:28:40', '2017-11-01 15:28:40'),
(189, 'PERMANENTE', 24, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 19:25:06', '2017-11-01 19:25:38'),
(190, 'PERMANENTE', 22, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 19:25:20', '2017-11-01 19:25:20'),
(191, 'PERMANENTE', 28, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 19:25:59', '2017-11-01 19:25:59'),
(192, 'EVENTUAL', 23, '30', 'Octubre', 2017, '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '', 1, 4, 4, 1, '2017-11-01 19:45:23', '2017-11-01 19:45:23'),
(193, 'EVENTUAL', 32, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-11-01 19:45:45', '2017-11-01 19:45:45'),
(194, 'EVENTUAL', 30, '30', 'Octubre', 2017, '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '', 1, 4, 4, 1, '2017-11-01 19:46:00', '2017-11-01 19:46:00'),
(195, 'EVENTUAL', 36, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-11-01 19:46:24', '2017-11-01 19:46:37'),
(196, 'EVENTUAL', 35, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-11-01 19:46:50', '2017-11-01 19:47:32'),
(197, 'EVENTUAL', 33, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-11-01 19:47:15', '2017-11-01 19:47:15'),
(198, 'EVENTUAL', 34, '30', 'Octubre', 2017, '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '', 1, 4, 4, 1, '2017-11-01 19:47:53', '2017-11-01 19:47:53'),
(199, 'EVENTUAL', 37, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-11-01 19:48:20', '2017-11-01 19:48:20'),
(200, 'EVENTUAL', 38, '6', 'Octubre', 2017, '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '300.00', '0.00', '0.00', '0.00', '100.00', '100.00', '200.00', '', 1, 4, 4, 1, '2017-11-01 19:49:55', '2017-11-01 19:50:25'),
(201, 'EVENTUAL', 40, '8', 'Octubre', 2017, '533.33', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '533.33', '0.00', '0.00', '0.00', '0.00', '0.00', '533.33', '', 1, 4, 4, 1, '2017-11-01 19:54:28', '2017-11-01 19:54:28'),
(202, 'PERMANENTE', 7, '30', 'Octubre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:29:31', '2017-11-01 20:29:31'),
(203, 'PERMANENTE', 8, '30', 'Octubre', 2017, '2133.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2433.00', '309.23', '0.00', '0.00', '0.00', '309.23', '2123.77', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:29:53', '2017-11-01 20:29:53'),
(204, 'PERMANENTE', 9, '30', 'Octubre', 2017, '2340.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2640.00', '335.54', '0.00', '0.00', '0.00', '335.54', '2304.46', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:30:12', '2017-11-01 20:30:12'),
(205, 'PERMANENTE', 10, '30', 'Octubre', 2017, '2850.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3150.00', '400.37', '0.00', '0.00', '0.00', '400.37', '2749.64', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:30:24', '2017-11-01 20:30:24'),
(206, 'PERMANENTE', 11, '30', 'Octubre', 2017, '2100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2100.00', '266.91', '0.00', '0.00', '0.00', '266.91', '1833.09', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:30:34', '2017-11-01 20:30:34'),
(207, 'PERMANENTE', 12, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:30:48', '2017-11-01 20:30:48'),
(208, 'PERMANENTE', 13, '30', 'Octubre', 2017, '6000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6000.00', '762.60', '0.00', '0.00', '0.00', '762.60', '5237.40', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:30:58', '2017-11-01 20:30:58');
INSERT INTO `pago` (`id`, `pag_tipo_empleado`, `id_empleado`, `pag_dias`, `pag_mes`, `pag_gestion`, `pag_sueldo`, `pag_bono_antiguedad`, `pag_cantidad`, `pag_pagado`, `pag_produccion`, `pag_dominical`, `pag_otrobono`, `pag_total_ganado`, `pag_afp`, `pag_aporte`, `pag_iva`, `pag_anticipos`, `pag_total_descuento`, `pag_total_liquido`, `pag_firma`, `pag_estado`, `user_registra`, `user_actualiza`, `id_salariominimo`, `created_at`, `updated_at`) VALUES
(209, 'PERMANENTE', 14, '30', 'Octubre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-11-01 20:31:10', '2017-11-01 20:31:10'),
(210, 'PERMANENTE', 15, '30', 'Noviembre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:23:07', '2017-12-01 18:23:07'),
(211, 'PERMANENTE', 16, '30', 'Noviembre', 2017, '2918.00', '300.00', '0.00', '0.00', '0.00', '0.00', '597.04', '3815.04', '484.89', '0.00', '0.00', '0.00', '484.89', '3330.15', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:24:05', '2017-12-01 18:24:05'),
(212, 'PERMANENTE', 17, '30', 'Noviembre', 2017, '3030.40', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3330.40', '423.29', '0.00', '0.00', '0.00', '423.29', '2907.11', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:25:37', '2017-12-01 18:25:37'),
(213, 'PERMANENTE', 18, '30', 'Noviembre', 2017, '2140.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2440.00', '310.12', '0.00', '0.00', '0.00', '310.12', '2129.88', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:26:10', '2017-12-01 18:26:10'),
(214, 'PERMANENTE', 19, '30', 'Noviembre', 2017, '2000.00', '300.00', '0.00', '0.00', '0.00', '0.00', '3697.50', '5997.50', '762.28', '0.00', '0.00', '0.00', '762.28', '5235.22', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:26:49', '2017-12-01 18:26:49'),
(215, 'PERMANENTE', 20, '30', 'Noviembre', 2017, '5500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3520.25', '9020.25', '1146.47', '0.00', '0.00', '0.00', '1146.47', '7873.78', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:28:47', '2017-12-01 20:19:17'),
(216, 'PERMANENTE', 29, '30', 'Noviembre', 2017, '2068.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2068.00', '262.84', '0.00', '0.00', '0.00', '262.84', '1805.16', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:29:41', '2017-12-04 13:50:29'),
(217, 'PERMANENTE', 27, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:29:57', '2017-12-01 18:29:57'),
(218, 'PERMANENTE', 1, '30', 'Noviembre', 2017, '2395.40', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3055.40', '388.34', '0.00', '0.00', '0.00', '388.34', '2667.06', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:35:01', '2017-12-01 18:35:01'),
(219, 'PERMANENTE', 2, '30', 'Noviembre', 2017, '2130.51', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2790.51', '354.67', '0.00', '0.00', '0.00', '354.67', '2435.84', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:35:24', '2017-12-01 18:35:24'),
(220, 'PERMANENTE', 3, '30', 'Noviembre', 2017, '3200.00', '660.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3860.00', '490.61', '0.00', '0.00', '0.00', '490.61', '3369.39', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:35:38', '2017-12-01 18:35:38'),
(221, 'PERMANENTE', 4, '30', 'Noviembre', 2017, '3700.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4000.00', '508.40', '0.00', '0.00', '0.00', '508.40', '3491.60', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:35:51', '2017-12-01 18:35:51'),
(222, 'PERMANENTE', 5, '30', 'Noviembre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:36:04', '2017-12-01 18:36:04'),
(223, 'PERMANENTE', 6, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2602.50', '4602.50', '584.98', '0.00', '0.00', '0.00', '584.98', '4017.52', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:36:55', '2017-12-01 18:36:55'),
(224, 'PERMANENTE', 24, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:37:10', '2017-12-01 18:37:10'),
(225, 'PERMANENTE', 22, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:37:53', '2017-12-01 18:38:53'),
(226, 'PERMANENTE', 28, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:38:12', '2017-12-01 18:38:12'),
(227, 'PERMANENTE', 7, '30', 'Noviembre', 2017, '4500.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4800.00', '610.08', '0.00', '0.00', '0.00', '610.08', '4189.92', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:43:47', '2017-12-01 18:43:47'),
(228, 'PERMANENTE', 8, '30', 'Noviembre', 2017, '2133.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2433.00', '309.23', '0.00', '0.00', '0.00', '309.23', '2123.77', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:44:09', '2017-12-01 18:44:09'),
(229, 'PERMANENTE', 9, '30', 'Noviembre', 2017, '2340.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2640.00', '335.54', '0.00', '0.00', '0.00', '335.54', '2304.46', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:44:22', '2017-12-01 18:44:22'),
(230, 'PERMANENTE', 10, '30', 'Noviembre', 2017, '2850.00', '300.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3150.00', '400.37', '0.00', '0.00', '0.00', '400.37', '2749.64', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:44:33', '2017-12-01 18:44:33'),
(231, 'PERMANENTE', 11, '30', 'Noviembre', 2017, '2100.00', '0.00', '0.00', '0.00', '0.00', '0.00', '400.00', '2500.00', '317.75', '0.00', '0.00', '0.00', '317.75', '2182.25', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:44:45', '2017-12-01 18:45:03'),
(232, 'PERMANENTE', 12, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '254.20', '0.00', '0.00', '0.00', '254.20', '1745.80', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:45:17', '2017-12-01 18:45:17'),
(233, 'PERMANENTE', 14, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2324.50', '4324.50', '549.64', '0.00', '0.00', '0.00', '549.64', '3774.86', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:45:56', '2017-12-01 18:45:56'),
(234, 'PERMANENTE', 13, '30', 'Noviembre', 2017, '6000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '6000.00', '762.60', '0.00', '0.00', '0.00', '762.60', '5237.40', 'PAPELETA DE PAGO', 1, 4, 4, 1, '2017-12-01 18:46:08', '2017-12-01 18:46:08'),
(235, 'EVENTUAL', 23, '30', 'Noviembre', 2017, '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '0.00', '0.00', '0.00', '0.00', '0.00', '3210.00', '', 1, 4, 4, 1, '2017-12-04 14:11:26', '2017-12-04 14:11:26'),
(236, 'EVENTUAL', 32, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-12-04 14:11:39', '2017-12-04 14:11:39'),
(237, 'EVENTUAL', 30, '30', 'Noviembre', 2017, '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1656.00', '', 1, 4, 4, 1, '2017-12-04 14:11:55', '2017-12-04 14:11:55'),
(238, 'EVENTUAL', 36, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-12-04 14:12:07', '2017-12-04 14:12:07'),
(239, 'EVENTUAL', 35, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-12-04 14:12:22', '2017-12-04 14:12:22'),
(240, 'EVENTUAL', 34, '30', 'Noviembre', 2017, '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1700.00', '', 1, 4, 4, 1, '2017-12-04 14:12:42', '2017-12-04 14:12:42'),
(241, 'EVENTUAL', 37, '30', 'Noviembre', 2017, '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2000.00', '', 1, 4, 4, 1, '2017-12-04 14:12:54', '2017-12-04 14:12:54'),
(242, 'EVENTUAL', 41, '30', 'Noviembre', 2017, '2500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2500.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2500.00', '', 1, 4, 4, 1, '2017-12-04 14:14:34', '2017-12-04 14:14:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rastreos`
--

CREATE TABLE `rastreos` (
  `id` int(10) UNSIGNED NOT NULL,
  `res_sigla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `res_fecha` datetime NOT NULL,
  `id_movimiento` int(10) UNSIGNED NOT NULL,
  `res_movimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_localizacion` int(10) UNSIGNED NOT NULL,
  `res_localizacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_barco` int(10) UNSIGNED NOT NULL,
  `res_barco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `res_numviaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_registra` int(10) UNSIGNED NOT NULL,
  `user_actualiza` int(10) UNSIGNED NOT NULL,
  `res_estado` tinyint(1) NOT NULL DEFAULT '1',
  `res_observaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rastreos`
--

INSERT INTO `rastreos` (`id`, `res_sigla`, `res_fecha`, `id_movimiento`, `res_movimiento`, `id_localizacion`, `res_localizacion`, `id_barco`, `res_barco`, `res_numviaje`, `user_registra`, `user_actualiza`, `res_estado`, `res_observaciones`, `created_at`, `updated_at`) VALUES
(1, 'CMAU1468557', '2017-06-12 09:20:00', 1, 'Entregado a consignatario ', 1, 'Arica- Chile', 1, 'MSC RAPALLO', '177AEE', 10, 10, 0, '<p>El transportista cargo en fecha 11/06/2017.</p>\r\n', '2017-06-12 22:23:51', '2017-06-12 22:23:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salario_minimo`
--

CREATE TABLE `salario_minimo` (
  `id` int(10) UNSIGNED NOT NULL,
  `sm_salario` decimal(18,2) NOT NULL,
  `sm_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sm_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `salario_minimo`
--

INSERT INTO `salario_minimo` (`id`, `sm_salario`, `sm_descripcion`, `sm_estado`, `created_at`, `updated_at`) VALUES
(1, '2000.00', 'Incremento salarial del 10.8% al salario minimo (1805.00) y 7% a superiores', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoeventos`
--

CREATE TABLE `tipoeventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `te_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `te_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `te_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipoeventos`
--

INSERT INTO `tipoeventos` (`id`, `te_nombre`, `te_color`, `te_estado`, `created_at`, `updated_at`) VALUES
(1, 'Reunion', '#e02143', 1, '2017-06-12 21:48:08', '2017-06-12 21:48:08'),
(3, 'Recojo de Boletas de garantia', '#43d652', 1, '2017-06-12 22:09:36', '2017-06-12 22:09:36'),
(4, 'Ingreso de Mercaderia', '#723535', 1, '2017-06-12 22:34:51', '2017-06-12 22:34:51'),
(5, 'Cobro de Cheques', '#9d38cc', 1, '2017-06-13 18:12:53', '2017-06-13 18:12:53'),
(6, 'Trabajo en Oficina', '#e68e0a', 1, '2017-06-13 20:06:19', '2017-06-13 20:06:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `usuario_fotografia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_estado` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_empleado`, `usuario_fotografia`, `email`, `usuario_cuenta`, `password`, `usuario_tipo`, `usuario_estado`, `remember_token`, `created_at`, `updated_at`, `usuario_nombre`) VALUES
(1, 3, 'storage/usuario/2017525-104755.png', 'rosmery.monasterios@zaire.com.bo', 'rosmery.monasterios', '$2y$10$GGSAAKqInlak4hpB3Ez6Pew5RUycbz/AyvWnpTGspakcjxyPBOC/m', 'Adminzabim', 0, 'b7jMotNEArdIscJFCVqgC27jkW5852ksXDWdhtjygAW5fKuCahlsBoyrs3Q4', NULL, '2017-06-06 18:34:25', 'Rosmery Monsterios Chipana'),
(2, 7, 'storage/usuario/varon.png', 'boris@zaire.com.bo', 'boris.zabala', '$2y$10$RwiwuoFnnIglY8iV6foBFudMPFZK7adUpGwwuoAXDu4H.ToI/lMAO', 'Admin', 1, 'CCi8Q1nTGNeYKQpYVHTSjmlf9gFBHVyS2omqDzT5svkcDRIGVQ2Lt3auKsdf', '2017-05-25 14:51:37', '2017-05-29 13:49:59', 'Boris Richard Zabala Huanca'),
(3, 4, 'storage/usuario/mujer.png', 'rosmery.cadena@zaire.com.bo', 'rosmery.cadena', '$2y$10$9p7mvMH7Tsa9SmD0G9T3OuejCUVoS4UBwuLIPVbWdb002ktHC3wam', 'Admincontabilidad', 1, 'YCgLQqBmO4VH5ZFte2sOjI2Ew2veB1hrn5HHaZHbkf8X3b7yHZqo78WLSbxP', '2017-05-29 13:45:01', '2017-05-29 19:50:06', 'Rosmery Cadena Quispe'),
(4, 10, 'storage/usuario/mujer.png', 'noemy.jimenez@zaire.com.bo', 'noemy.jimenez', '$2y$10$mDlnqX9kPVXdvotap.Ootum79taKmvGcCo6nxohP95vE/2u3zoftm', 'Admincontabilidad', 1, 'oXjEfzn0Dn8lUvpwsnn2aoRe4Haf5hUJcTxy0smBEHmBPRyDfy4yejX753a6', '2017-05-29 13:46:05', '2017-12-14 17:46:43', 'Noemy Gabriela Jimenez Apaza'),
(5, 23, 'storage/usuario/2017529-94910.png', 'sistemas@zaire.com.bo', 'edwin.ajahuanca', '$2y$10$73x.leBbX0etyaX9FSyQFOkW8niO47zfn1jDtcDGyxSbFnpQKTFZe', 'Admin', 1, 'o3ZATQRBlCeLkQQEDAIpKFZZYbVIcr131vimYTAFY0f0xXvONCyPALei1uV9', '2017-05-29 13:46:53', '2017-12-15 18:20:53', 'Edwin Ajahuanca Callisaya'),
(6, 16, 'storage/usuario/mujer.png', 'claudia.quispe@zaire.com.bo', 'claudia.quispe', '$2y$10$uCztx2nM9BJx20yLSRzI9O/MbQzo/Xcab0S/lgFpdxYvrex04C/B6', 'Adminventas', 1, 'AXIcar5sSm5YxAhFxVV06GDXr1csFwwoIr7dAR1MCq8RxI3WuHBxSWJpIgn6', '2017-06-12 21:11:34', '2017-06-13 20:27:15', 'Claudia Maria Quispe Loza'),
(7, 13, 'storage/usuario/varon.png', 'iver.perez@zaire.com.bo', 'iver.perez', '$2y$10$606nZiHdY5Xr3g3xq.rbRu4.N.I1NaPlrxB1n.hTTdi4Zv1m8nMRe', 'Admincontrol', 1, NULL, '2017-06-12 21:15:23', '2017-06-12 21:15:23', 'Iver Ivan Perez Honorio'),
(8, 27, 'storage/usuario/mujer.png', 'genoveva.chipana@zaire.com.bo', 'genoveva.chipana', '$2y$10$Urs6KrJgxyoGEtr91MOgWOpJl01S5zGIHYU1L0juzd.pHdAzAQ30u', 'Adminventas', 1, NULL, '2017-06-12 21:16:19', '2017-06-12 21:16:19', 'Genoveva Lidia Chipana Quispe'),
(9, 6, 'storage/usuario/mujer.png', 'mery.marin@zaire.com.bo', 'mery.marin', '$2y$10$KIMkrAgmMtwzEWcA.PhHJ.RO4SnjXjD59gRIGpod7.OMSm3Mgz5Qq', 'Adminventas', 1, NULL, '2017-06-12 21:22:06', '2017-06-12 21:22:06', 'Mery Mauricia Marin Quisbert'),
(10, 20, 'storage/usuario/mujer.png', 'gloria.machaca@zaire.com.bo', 'gloria.machaca', '$2y$10$UsAEk7.F08IeSG31ZMe8yetJrN7O.tsltwWjuO8VRpFozwVl12iz6', 'Adminimportaciones', 1, 'FAS388ZTXk8DbwFspIeg5un1mZIKBx1qx8ep8Sby25VNNlv7QEbqOCtIJzYU', '2017-06-12 22:06:16', '2017-06-13 21:49:17', 'Gloria Giovanna Machaca Quispe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aguinaldos`
--
ALTER TABLE `aguinaldos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aguinaldos_id_empleado_foreign` (`id_empleado`),
  ADD KEY `aguinaldos_user_registra_foreign` (`user_registra`),
  ADD KEY `aguinaldos_user_actualiza_foreign` (`user_actualiza`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `area_ar_nombre_unique` (`ar_nombre`);

--
-- Indices de la tabla `asignar_empresa`
--
ALTER TABLE `asignar_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignar_empresa_id_empresa_foreign` (`id_empresa`),
  ADD KEY `asignar_empresa_id_empleado_foreign` (`id_empleado`);

--
-- Indices de la tabla `barcos`
--
ALTER TABLE `barcos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcos_bar_nombre_unique` (`bar_nombre`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cargo_car_nombre_unique` (`car_nombre`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empleado_em_cedula_unique` (`em_cedula`),
  ADD KEY `empleado_id_cargo_foreign` (`id_cargo`),
  ADD KEY `empleado_id_area_foreign` (`id_area`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empresa_emp_nombre_unique` (`emp_nombre`),
  ADD UNIQUE KEY `empresa_emp_nit_unique` (`emp_nit`),
  ADD UNIQUE KEY `empresa_emp_empleador_unique` (`emp_empleador`),
  ADD UNIQUE KEY `empresa_emp_caja_unique` (`emp_caja`),
  ADD KEY `empresa_id_representante_foreign` (`id_representante`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `eventos_id_userregistra_foreign` (`id_userregistra`),
  ADD KEY `eventos_id_useractualiza_foreign` (`id_useractualiza`),
  ADD KEY `eventos_id_tipoevento_foreign` (`id_tipoevento`);

--
-- Indices de la tabla `localizaciones`
--
ALTER TABLE `localizaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `localizaciones_loc_nombre_unique` (`loc_nombre`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movimientos_mov_nombre_unique` (`mov_nombre`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pago_id_empleado_foreign` (`id_empleado`),
  ADD KEY `pago_user_registra_foreign` (`user_registra`),
  ADD KEY `pago_user_actualiza_foreign` (`user_actualiza`),
  ADD KEY `pago_id_salariominimo_foreign` (`id_salariominimo`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `rastreos`
--
ALTER TABLE `rastreos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rastreos_id_movimiento_foreign` (`id_movimiento`),
  ADD KEY `rastreos_id_localizacion_foreign` (`id_localizacion`),
  ADD KEY `rastreos_id_barco_foreign` (`id_barco`),
  ADD KEY `rastreos_user_registra_foreign` (`user_registra`),
  ADD KEY `rastreos_user_actualiza_foreign` (`user_actualiza`);

--
-- Indices de la tabla `salario_minimo`
--
ALTER TABLE `salario_minimo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salario_minimo_sm_salario_unique` (`sm_salario`);

--
-- Indices de la tabla `tipoeventos`
--
ALTER TABLE `tipoeventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_usuario_cuenta_unique` (`usuario_cuenta`),
  ADD KEY `users_id_empleado_foreign` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aguinaldos`
--
ALTER TABLE `aguinaldos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `asignar_empresa`
--
ALTER TABLE `asignar_empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `barcos`
--
ALTER TABLE `barcos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `localizaciones`
--
ALTER TABLE `localizaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT de la tabla `rastreos`
--
ALTER TABLE `rastreos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `salario_minimo`
--
ALTER TABLE `salario_minimo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipoeventos`
--
ALTER TABLE `tipoeventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aguinaldos`
--
ALTER TABLE `aguinaldos`
  ADD CONSTRAINT `aguinaldos_id_empleado_foreign` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `aguinaldos_user_actualiza_foreign` FOREIGN KEY (`user_actualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `aguinaldos_user_registra_foreign` FOREIGN KEY (`user_registra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `asignar_empresa`
--
ALTER TABLE `asignar_empresa`
  ADD CONSTRAINT `asignar_empresa_id_empleado_foreign` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `asignar_empresa_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `empleado_id_cargo_foreign` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_id_representante_foreign` FOREIGN KEY (`id_representante`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_id_tipoevento_foreign` FOREIGN KEY (`id_tipoevento`) REFERENCES `tipoeventos` (`id`),
  ADD CONSTRAINT `eventos_id_useractualiza_foreign` FOREIGN KEY (`id_useractualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `eventos_id_userregistra_foreign` FOREIGN KEY (`id_userregistra`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `eventos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_id_empleado_foreign` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `pago_id_salariominimo_foreign` FOREIGN KEY (`id_salariominimo`) REFERENCES `salario_minimo` (`id`),
  ADD CONSTRAINT `pago_user_actualiza_foreign` FOREIGN KEY (`user_actualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pago_user_registra_foreign` FOREIGN KEY (`user_registra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `rastreos`
--
ALTER TABLE `rastreos`
  ADD CONSTRAINT `rastreos_id_barco_foreign` FOREIGN KEY (`id_barco`) REFERENCES `barcos` (`id`),
  ADD CONSTRAINT `rastreos_id_localizacion_foreign` FOREIGN KEY (`id_localizacion`) REFERENCES `localizaciones` (`id`),
  ADD CONSTRAINT `rastreos_id_movimiento_foreign` FOREIGN KEY (`id_movimiento`) REFERENCES `movimientos` (`id`),
  ADD CONSTRAINT `rastreos_user_actualiza_foreign` FOREIGN KEY (`user_actualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rastreos_user_registra_foreign` FOREIGN KEY (`user_registra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_empleado_foreign` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
