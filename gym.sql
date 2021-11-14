-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-11-2021 a las 20:05:25
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reeup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `acronym`, `slogan`, `address`, `email`, `phone`, `logo`, `reeup`, `web_site`, `created_at`, `updated_at`) VALUES
(1, 'Ginmacio 01', 'Gyn01', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi obcaecati voluptate tempora asperiores qui.', '1900 Pico Blvd, New York br Centernial, colorado', 'gym@admin.com', '52770145', 'logo.jpg', NULL, 'www.n1.com', '2021-10-26 17:24:46', '2021-10-26 22:56:59'),
(2, 'N2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `enabled` int(11) NOT NULL DEFAULT '1',
  `hiring_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `discharge_reason` text COLLATE utf8mb4_unicode_ci,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `township_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `ci`, `name`, `last_name`, `sex`, `age`, `cellphone`, `phone`, `email`, `address`, `member`, `enabled`, `hiring_date`, `discharge_date`, `discharge_reason`, `business_id`, `township_id`, `payment_type_id`, `created_at`, `updated_at`) VALUES
(1, '90071338787', 'Jane', 'Doe Fill', 'F', '25', '52471396', NULL, 'jane@df.com', NULL, 'si', 1, '2021-10-04', NULL, NULL, 1, 2305, 3, '2021-10-31 06:34:45', '2021-11-06 02:08:34'),
(2, 'E102562ER', 'Freddy', 'Hill Plomo', 'M', '39', '3555636', NULL, 'f@aam.com', NULL, 'si', 1, '2021-10-05', NULL, NULL, 1, 2306, 6, '2021-10-31 20:31:45', '2021-11-07 19:47:50'),
(3, '90010345896', 'Rafael', 'Villa Mango', 'M', '26', '85222666', NULL, 'manuel@am.com', NULL, 'no', 1, '2021-11-08', NULL, NULL, 1, NULL, 4, '2021-11-07 19:49:43', '2021-11-07 19:49:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_group`
--

CREATE TABLE `customer_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customer_group`
--

INSERT INTO `customer_group` (`id`, `customer_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, NULL),
(2, 2, 5, NULL, NULL),
(3, 3, 5, NULL, NULL),
(4, 1, 1, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT '1' COMMENT '1 activo 0 inactivo 2 licencia 3 vacaciones',
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observations` text COLLATE utf8mb4_unicode_ci,
  `hiring_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `discharge_reason` text COLLATE utf8mb4_unicode_ci,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `township_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `ci`, `name`, `last_name`, `enabled`, `cellphone`, `phone`, `email`, `address`, `observations`, `hiring_date`, `discharge_date`, `discharge_reason`, `type_id`, `business_id`, `township_id`, `created_at`, `updated_at`) VALUES
(1, '74100114789', 'Yelene', 'Lasas  Sally', 1, '123456', NULL, 'yenele@ha.com', NULL, NULL, '2021-10-25', NULL, NULL, 1, 1, 2304, NULL, '2021-11-07 23:13:07'),
(2, '12345678909', 'Luis', 'ALberto Saka', 1, NULL, NULL, NULL, NULL, NULL, '2021-10-26', NULL, NULL, 1, 1, 2309, NULL, '2021-11-07 23:28:06'),
(3, '84121206789', 'Magalis', 'Sauares Lllano', 1, '123456', NULL, 'maga@admin.com', NULL, NULL, '2021-10-12', NULL, NULL, 1, 1, 2312, '2021-10-27 19:49:59', '2021-11-07 23:13:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee_group`
--

CREATE TABLE `employee_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employee_group`
--

INSERT INTO `employee_group` (`id`, `employee_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 1, 3, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 3, 4, NULL, NULL),
(8, 2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee_types`
--

CREATE TABLE `employee_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employee_types`
--

INSERT INTO `employee_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Entrenador', '2021-10-26 20:01:39', '2021-10-27 00:03:34'),
(2, 'Limpieza', '2021-10-26 20:01:39', NULL),
(3, 'Recepcionista', '2021-10-26 20:01:39', NULL),
(4, 'Contable', '2021-10-26 20:01:39', NULL),
(5, 'Jardinero', '2021-10-26 23:34:15', '2021-10-26 23:34:15'),
(6, 'Asistente', '2021-10-26 23:34:46', '2021-10-26 23:34:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `frecuency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `group_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `start_date`, `start`, `end`, `frecuency`, `enabled`, `group_type_id`, `created_at`, `updated_at`) VALUES
(1, '2021-11-08', '09:00:00', '11:00:00', 'Martes,Jueves', '1', 1, '2021-11-06 01:53:58', '2021-11-06 08:48:56'),
(2, '2021-11-15', '13:00:00', '14:30:00', 'Martes,Jueves', '1', 1, NULL, '2021-11-07 23:27:12'),
(3, '2021-11-22', '15:00:00', '16:30:00', 'Martes,Miércoles,Viernes', '1', 1, '2021-11-06 07:03:36', '2021-11-07 23:27:25'),
(4, '2021-11-17', '11:00:00', '11:45:00', 'Lunes,Martes,Miércoles,Viernes', '1', 1, '2021-11-06 08:18:03', '2021-11-06 08:26:03'),
(5, '2021-11-25', '06:00:00', '07:00:00', 'Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo', '1', 1, '2021-11-07 08:27:54', '2021-11-07 23:23:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group_types`
--

CREATE TABLE `group_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enabled` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `group_types`
--

INSERT INTO `group_types` (`id`, `type`, `description`, `created_at`, `updated_at`, `enabled`) VALUES
(1, 'Zumba', 'Ejercicio cardiovascular va dirigida a todas aquellas personas que quieran mantener o bajar de peso de forma divertida al son de distintos ritmos, principalmente latinos, que ponen en funcionamiento todos los músculos del cuerpo.', '2021-11-06 04:54:33', NULL, 1),
(2, 'Aerobic', 'Ejercicio cardiovascular.', '2021-11-06 04:54:33', NULL, 1),
(3, 'Crossfit', 'Este sistema de entrenamiento, que algunos comparan a la dinámica que se sigue en el ejército, es uno de los más exigentes y de los que mayor gasto energético conlleva.', '2021-11-06 04:54:33', NULL, 1),
(4, 'Spinning', 'Ejercicio cardiovascular lleva al corazón a sus máximas pulsaciones a través del pedaleo siguiendo el ritmo de la música.', '2021-11-06 04:54:33', NULL, 1),
(5, 'Body pump', 'Es una clase coreografiada de musculación en la que en cada canción se trabaja un músculo.', '2021-11-06 04:54:33', NULL, 1),
(6, 'Body combat', 'Clase cardiovascular que busca acelerar el corazón mediante una combinación de movimientos de lucha y artes marciales.', '2021-11-06 04:54:33', NULL, 0),
(7, 'Aqua Gym ', ' Tipo de ejercicios que se realizan en el agua.', '2021-11-06 04:54:33', NULL, 0),
(8, 'Yoga', 'Ejercicio que se centran en la flexibilidad y la plasticidad de tu cuerpo.', '2021-11-06 04:54:33', NULL, 1),
(9, ' Tai-Chi', 'Ejercicio cardiovascular va dirigida a todas aquellas personas que quieran mantener o bajar de peso de forma divertida al son de distintos ritmos, principalmente latinos, que ponen en funcionamiento todos los músculos del cuerpo.', '2021-11-06 04:54:33', NULL, 0),
(10, 'GAP', 'ejercicio específico para tonificar y fortalecer las piernas, los gluteos y los abdominales.', '2021-11-06 05:30:34', '2021-11-06 05:42:23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_26_145943_create_businesses_table', 2),
(6, '2021_10_26_150025_create_owners_table', 2),
(7, '2021_10_26_150045_create_employee_types_table', 2),
(8, '2021_10_26_150046_create_provinces_table', 2),
(9, '2021_10_26_150047_create_townships_table', 2),
(10, '2021_10_26_150058_create_employees_table', 2),
(15, '2021_10_27_162842_create_group_types_table', 3),
(16, '2021_10_27_163058_create_groups_table', 3),
(17, '2021_10_27_170117_create_employee_group_table', 4),
(27, '2021_10_28_011228_create_payment_types_table', 5),
(28, '2021_10_28_011229_create_customers_table', 5),
(29, '2021_10_30_170036_create_payments_table', 5),
(30, '2021_10_31_195108_add_day_to_payment_types', 6),
(31, '2021_11_06_004915_add_enabled_to_group_type', 7),
(32, '2021_11_06_045720_create_customer_group_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `owners`
--

INSERT INTO `owners` (`id`, `full_name`, `phone`, `email`, `cellphone`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'Pablo Mendez Fizco', NULL, 'pablo@admin.com', '123', 1, '2021-10-26 20:21:21', '2021-11-07 22:45:49'),
(3, 'Fernando Peres Willm', NULL, 'am@sa.cp', '12345678999', 1, '2021-10-27 00:52:01', '2021-11-07 22:45:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mount` double NOT NULL,
  `pay_day` date NOT NULL,
  `pay_due` date NOT NULL,
  `pay_on_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pay_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mount` double(11,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `mount`, `description`, `created_at`, `updated_at`, `day`) VALUES
(1, 'Diario', 50.00, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '2021-10-31 06:30:36', NULL, 1),
(2, 'Semanal', 250.00, 'Voluptas ab molestias vitae amet beatae.', '2021-10-31 06:30:36', NULL, 7),
(3, 'Quincenal', 500.00, 'Eaque distinctio expedita aperiam harum ducimus veniam nihil.', '2021-10-31 06:30:36', NULL, 15),
(4, 'Mensual', 1000.00, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '2021-10-31 06:30:36', NULL, 30),
(5, 'Trimestral', 1500.00, NULL, '2021-10-31 23:12:09', '2021-10-31 23:12:09', 90),
(6, 'Semestral', 2000.50, NULL, '2021-10-31 23:12:27', '2021-10-31 23:17:52', 180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(21, 'PINAR DEL RÍO', '2021-03-24 23:15:57', NULL),
(22, 'ARTEMISA', '2021-03-24 23:15:57', NULL),
(23, 'LA HABANA', '2021-03-24 23:15:57', NULL),
(24, 'MAYABEQUE', '2021-03-24 23:15:57', NULL),
(25, 'MATANZAS', '2021-03-24 23:15:57', NULL),
(26, 'VILLA CLARA', '2021-03-24 23:15:57', NULL),
(27, 'CIENFUEGOS', '2021-03-24 23:15:57', NULL),
(28, 'SANCTI SPÍRITUS', '2021-03-24 23:15:57', NULL),
(29, 'CIEGO DE ÁVILA', '2021-03-24 23:15:57', NULL),
(30, 'CAMAGÜEY', '2021-03-24 23:15:57', NULL),
(31, 'LAS TUNAS', '2021-03-24 23:15:57', NULL),
(32, 'HOLGUÍN', '2021-03-24 23:15:57', NULL),
(33, 'GRANMA', '2021-03-24 23:15:57', NULL),
(34, 'SANTIAGO DE CUBA', '2021-03-24 23:15:57', NULL),
(35, 'GUANTÁNAMO', '2021-03-24 23:15:57', NULL),
(40, 'ISLA DE LA JUVENTUD', '2021-03-24 23:15:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `townships`
--

CREATE TABLE `townships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `townships`
--

INSERT INTO `townships` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(2101, 'SANDINO', 21, NULL, NULL),
(2102, 'MANTUA', 21, NULL, NULL),
(2103, 'MINAS DE MATAHAMBRE', 21, NULL, NULL),
(2104, 'VIÑALES', 21, NULL, NULL),
(2105, 'LA PALMA', 21, NULL, NULL),
(2106, 'LOS PALACIOS', 21, NULL, NULL),
(2107, 'CONSOLACIÓN DEL SUR', 21, NULL, NULL),
(2108, 'PINAR DEL RÍO', 21, NULL, NULL),
(2109, 'SAN LUIS', 21, NULL, NULL),
(2110, 'SAN JUAN Y MARTÍNEZ', 21, NULL, NULL),
(2111, 'GUANE', 21, NULL, NULL),
(2201, 'BAHÍA HONDA', 22, NULL, NULL),
(2202, 'MARIEL', 22, NULL, NULL),
(2203, 'GUANAJAY', 22, NULL, NULL),
(2204, 'CAIMITO', 22, NULL, NULL),
(2205, 'BAUTA', 22, NULL, NULL),
(2206, 'SAN ANTONIO DE LOS BAÑOS', 22, NULL, NULL),
(2207, 'GÜIRA DE MELENA', 22, NULL, NULL),
(2208, 'ALQUIZAR', 22, NULL, NULL),
(2209, 'ARTEMISA', 22, NULL, NULL),
(2210, 'CANDELARIA', 22, NULL, NULL),
(2211, 'SAN CRISTÓBAL', 22, NULL, NULL),
(2301, 'PLAYA', 23, NULL, NULL),
(2302, 'PLAZA DE LA REVOLUCIÓN', 23, NULL, NULL),
(2303, 'CENTRO HABANA', 23, NULL, NULL),
(2304, 'LA HABANA VIEJA', 23, NULL, NULL),
(2305, 'REGLA', 23, NULL, NULL),
(2306, 'LA HABANA DEL ESTE', 23, NULL, NULL),
(2307, 'GUANABACOA', 23, NULL, NULL),
(2308, 'SAN MIGUEL DEL PADRÓN', 23, NULL, NULL),
(2309, 'DIEZ DE OCTUBRE', 23, NULL, NULL),
(2310, 'CERRO', 23, NULL, NULL),
(2311, 'MARIANAO', 23, NULL, NULL),
(2312, 'LA LISA', 23, NULL, NULL),
(2313, 'BOYEROS', 23, NULL, NULL),
(2314, 'ARROYO NARANJO', 23, NULL, NULL),
(2315, 'COTORRO', 23, NULL, NULL),
(2401, 'BEJUCAL', 24, NULL, NULL),
(2402, 'SAN JOSÉ DE LAS LAJAS', 24, NULL, NULL),
(2403, 'JARUCO', 24, NULL, NULL),
(2404, 'SANTA CRUZ DEL NORTE', 24, NULL, NULL),
(2405, 'MADRUGA', 24, NULL, NULL),
(2406, 'NUEVA PAZ', 24, NULL, NULL),
(2407, 'SAN NICOLÁS', 24, NULL, NULL),
(2408, 'GÜINES', 24, NULL, NULL),
(2409, 'MELENA DEL SUR', 24, NULL, NULL),
(2410, 'BATABANÓ', 24, NULL, NULL),
(2411, 'QUIVICÁN', 24, NULL, NULL),
(2501, 'MATANZAS', 25, NULL, NULL),
(2502, 'CÁRDENAS', 25, NULL, NULL),
(2503, 'MARTÍ', 25, NULL, NULL),
(2504, 'COLON', 25, NULL, NULL),
(2505, 'PERICO', 25, NULL, NULL),
(2506, 'JOVELLANOS', 25, NULL, NULL),
(2507, 'PEDRO BETANCOURT', 25, NULL, NULL),
(2508, 'LIMONAR', 25, NULL, NULL),
(2509, 'UNIÓN DE REYES', 25, NULL, NULL),
(2510, 'CIÉNAGA DE ZAPATA', 25, NULL, NULL),
(2511, 'JAGÜEY GRANDE', 25, NULL, NULL),
(2512, 'CALIMETE', 25, NULL, NULL),
(2513, 'LOS ARABOS', 25, NULL, NULL),
(2601, 'CORRALILLO', 26, NULL, NULL),
(2602, 'QUEMADO DE GÜINES', 26, NULL, NULL),
(2603, 'SAGUA LA GRANDE', 26, NULL, NULL),
(2604, 'ENCRUCIJADA', 26, NULL, NULL),
(2605, 'CAMAJUANÍ', 26, NULL, NULL),
(2606, 'CAIBARIÉN', 26, NULL, NULL),
(2607, 'REMEDIOS', 26, NULL, NULL),
(2608, 'PLACETAS', 26, NULL, NULL),
(2609, 'SANTA CLARA', 26, NULL, NULL),
(2610, 'CIFUENTES', 26, NULL, NULL),
(2611, 'SANTO DOMINGO', 26, NULL, NULL),
(2612, 'RANCHUELO', 26, NULL, NULL),
(2613, 'MANICARAGUA', 26, NULL, NULL),
(2701, 'AGUADA DE PASAJEROS', 27, NULL, NULL),
(2702, 'RODAS', 27, NULL, NULL),
(2703, 'PALMIRA', 27, NULL, NULL),
(2704, 'LAJAS', 27, NULL, NULL),
(2705, 'CRUCES', 27, NULL, NULL),
(2706, 'CUMANAYAGUA', 27, NULL, NULL),
(2707, 'CIENFUEGOS', 27, NULL, NULL),
(2708, 'ABREUS', 27, NULL, NULL),
(2801, 'YAGUAJAY', 28, NULL, NULL),
(2802, 'JATIBONICO', 28, NULL, NULL),
(2803, 'TAGUASCO', 28, NULL, NULL),
(2804, 'CABAIGUÁN', 28, NULL, NULL),
(2805, 'FOMENTO', 28, NULL, NULL),
(2806, 'TRINIDAD', 28, NULL, NULL),
(2807, 'SANCTI SPÍRITUS', 28, NULL, NULL),
(2808, 'LA SIERPE', 28, NULL, NULL),
(2901, 'CHAMBAS', 29, NULL, NULL),
(2902, 'MORÓN', 29, NULL, NULL),
(2903, 'BOLIVIA', 29, NULL, NULL),
(2904, 'PRIMERO DE ENERO', 29, NULL, NULL),
(2905, 'CIRO REDONDO', 29, NULL, NULL),
(2906, 'FLORENCIA', 29, NULL, NULL),
(2907, 'MAJAGUA', 29, NULL, NULL),
(2908, 'CIEGO DE ÁVILA', 29, NULL, NULL),
(2909, 'VENEZUELA', 29, NULL, NULL),
(2910, 'BARAGUÁ', 29, NULL, NULL),
(3001, 'CARLOS MANUEL DE CÉSPEDES', 30, NULL, NULL),
(3002, 'ESMERALDA', 30, NULL, NULL),
(3003, 'SIERRA DE CUBITAS', 30, NULL, NULL),
(3004, 'MINAS', 30, NULL, NULL),
(3005, 'NUEVITAS', 30, NULL, NULL),
(3006, 'GUÁIMARO', 30, NULL, NULL),
(3007, 'SIBANICÚ', 30, NULL, NULL),
(3008, 'CAMAGÜEY', 30, NULL, NULL),
(3009, 'FLORIDA', 30, NULL, NULL),
(3010, 'VERTIENTES', 30, NULL, NULL),
(3011, 'JIMAGUAYÚ', 30, NULL, NULL),
(3012, 'NAJASA', 30, NULL, NULL),
(3013, 'SANTA CRUZ DEL SUR', 30, NULL, NULL),
(3101, 'MANATÍ', 31, NULL, NULL),
(3102, 'PUERTO PADRE', 31, NULL, NULL),
(3103, 'JESÚS MENÉNDEZ', 31, NULL, NULL),
(3104, 'MAJIBACOA', 31, NULL, NULL),
(3105, 'LAS TUNAS', 31, NULL, NULL),
(3106, 'JOBABO', 31, NULL, NULL),
(3107, 'COLOMBIA', 31, NULL, NULL),
(3108, 'AMANCIO', 31, NULL, NULL),
(3201, 'GIBARA', 32, NULL, NULL),
(3202, 'RAFAEL FREYRE', 32, NULL, NULL),
(3203, 'BANES', 32, NULL, NULL),
(3204, 'ANTILLA', 32, NULL, NULL),
(3205, 'BÁGUANOS', 32, NULL, NULL),
(3206, 'HOLGUÍN', 32, NULL, NULL),
(3207, 'CALIXTO GARCÍA', 32, NULL, NULL),
(3208, 'CACOCUM', 32, NULL, NULL),
(3209, 'URBANO NORIS', 32, NULL, NULL),
(3210, 'CUETO', 32, NULL, NULL),
(3211, 'MAYARÍ', 32, NULL, NULL),
(3212, 'FRANK PAÍS', 32, NULL, NULL),
(3213, 'SAGUA DE TÁNAMO', 32, NULL, NULL),
(3214, 'MOA', 32, NULL, NULL),
(3301, 'RIO CAUTO', 33, NULL, NULL),
(3302, 'CAUTO CRISTO', 33, NULL, NULL),
(3303, 'JIGUANÍ', 33, NULL, NULL),
(3304, 'BAYAMO', 33, NULL, NULL),
(3305, 'YARA', 33, NULL, NULL),
(3306, 'MANZANILLO', 33, NULL, NULL),
(3307, 'CAMPECHUELA', 33, NULL, NULL),
(3308, 'MEDIA LUNA', 33, NULL, NULL),
(3309, 'NIQUERO', 33, NULL, NULL),
(3310, 'PILÓN', 33, NULL, NULL),
(3311, 'BARTOLOMÉ MASO', 33, NULL, NULL),
(3312, 'BUEY ARRIBA', 33, NULL, NULL),
(3313, 'GUISA', 33, NULL, NULL),
(3401, 'CONTRAMAESTRE', 34, NULL, NULL),
(3402, 'MELLA', 34, NULL, NULL),
(3403, 'SAN LUIS', 34, NULL, NULL),
(3404, 'SEGUNDO FRENTE', 34, NULL, NULL),
(3405, 'SONGO - LA MAYA', 34, NULL, NULL),
(3406, 'SANTIAGO DE CUBA', 34, NULL, NULL),
(3407, 'PALMA SORIANO', 34, NULL, NULL),
(3408, 'TERCER FRENTE', 34, NULL, NULL),
(3409, 'GUAMA', 34, NULL, NULL),
(3501, 'EL SALVADOR', 35, NULL, NULL),
(3502, 'MANUEL TAMES', 35, NULL, NULL),
(3503, 'YATERAS', 35, NULL, NULL),
(3504, 'BARACOA', 35, NULL, NULL),
(3505, 'MAISÍ', 35, NULL, NULL),
(3506, 'IMIAS', 35, NULL, NULL),
(3507, 'SAN ANTONIO DEL SUR', 35, NULL, NULL),
(3508, 'CAIMANERA', 35, NULL, NULL),
(3509, 'GUANTÁNAMO', 35, NULL, NULL),
(3510, 'NICETO PÉREZ', 35, NULL, NULL),
(4001, 'ISLA DE LA JUVENTUD', 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin System', 'admin@admin.com', NULL, '$2y$10$BbSlrpZKGGxmdX2YTifAIOiN93dPNPjfHvQv7seRK/ahiQiQSrtly', NULL, '2021-10-24 08:27:28', '2021-10-24 08:27:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_ci_unique` (`ci`),
  ADD KEY `customers_business_id_foreign` (`business_id`),
  ADD KEY `customers_township_id_foreign` (`township_id`),
  ADD KEY `customers_payment_type_id_foreign` (`payment_type_id`);

--
-- Indices de la tabla `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_group_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_group_group_id_foreign` (`group_id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_ci_unique` (`ci`),
  ADD KEY `employees_type_id_foreign` (`type_id`),
  ADD KEY `employees_business_id_foreign` (`business_id`),
  ADD KEY `employees_township_id_foreign` (`township_id`);

--
-- Indices de la tabla `employee_group`
--
ALTER TABLE `employee_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_group_employee_id_foreign` (`employee_id`),
  ADD KEY `employee_group_group_id_foreign` (`group_id`);

--
-- Indices de la tabla `employee_types`
--
ALTER TABLE `employee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_group_type_id_foreign` (`group_type_id`);

--
-- Indices de la tabla `group_types`
--
ALTER TABLE `group_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_types_type_unique` (`type`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_full_name_unique` (`full_name`),
  ADD KEY `owners_business_id_foreign` (`business_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_name_unique` (`name`),
  ADD KEY `payments_customer_id_foreign` (`customer_id`),
  ADD KEY `payments_pay_type_id_foreign` (`pay_type_id`);

--
-- Indices de la tabla `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_types_name_unique` (`name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `townships_province_id_foreign` (`province_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `employee_group`
--
ALTER TABLE `employee_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `employee_types`
--
ALTER TABLE `employee_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `group_types`
--
ALTER TABLE `group_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `townships`
--
ALTER TABLE `townships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4002;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `customers_township_id_foreign` FOREIGN KEY (`township_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `customer_group`
--
ALTER TABLE `customer_group`
  ADD CONSTRAINT `customer_group_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_township_id_foreign` FOREIGN KEY (`township_id`) REFERENCES `townships` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `employee_types` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `employee_group`
--
ALTER TABLE `employee_group`
  ADD CONSTRAINT `employee_group_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_group_type_id_foreign` FOREIGN KEY (`group_type_id`) REFERENCES `group_types` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_pay_type_id_foreign` FOREIGN KEY (`pay_type_id`) REFERENCES `payment_types` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `townships`
--
ALTER TABLE `townships`
  ADD CONSTRAINT `townships_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
