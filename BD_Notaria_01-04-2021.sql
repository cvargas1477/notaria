-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2021 a las 23:25:03
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notaria`
--
CREATE DATABASE IF NOT EXISTS `notaria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `notaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finalizarpago`
--

CREATE TABLE `finalizarpago` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2014_10_11_122424_create_permission_tables', 1),
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2020_05_15_01_create_servicios_table', 1),
(14, '2020_05_15_02_create_ventas_table', 1),
(15, '2020_05_15_03_create_ventascabecera_table', 1),
(16, '2020_05_16_032045_create_finalizarpago_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(1, 'App\\UsuarioMantenimiento', 74),
(2, 'App\\User', 4),
(3, 'App\\User', 3),
(3, 'App\\User', 7),
(3, 'App\\User', 8),
(3, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 11),
(3, 'App\\User', 12),
(3, 'App\\User', 13),
(3, 'App\\User', 14),
(3, 'App\\User', 15),
(3, 'App\\User', 16),
(3, 'App\\User', 17),
(3, 'App\\User', 18),
(3, 'App\\User', 19),
(3, 'App\\User', 20),
(3, 'App\\User', 21),
(3, 'App\\User', 22),
(3, 'App\\User', 23),
(3, 'App\\User', 24),
(3, 'App\\User', 25),
(3, 'App\\User', 26),
(3, 'App\\User', 27),
(3, 'App\\User', 28),
(3, 'App\\User', 29),
(3, 'App\\User', 30),
(3, 'App\\User', 31),
(3, 'App\\User', 32),
(3, 'App\\User', 33),
(3, 'App\\User', 34),
(3, 'App\\User', 35),
(3, 'App\\User', 36),
(3, 'App\\User', 37),
(3, 'App\\User', 38),
(3, 'App\\User', 39),
(3, 'App\\UsuarioMantenimiento', 68),
(3, 'App\\UsuarioMantenimiento', 69),
(3, 'App\\UsuarioMantenimiento', 70),
(3, 'App\\UsuarioMantenimiento', 72),
(3, 'App\\UsuarioMantenimiento', 73),
(4, 'App\\User', 5),
(5, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('cvargas1477@gmail.com', '$2y$10$8oaJKo3f8XxYPLkGu0f6luX0vOzxw1Yf8CguHkGyA.G1H/XRwI0gW', '2021-04-01 21:03:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create service', 'web', NULL, NULL),
(2, 'save service', 'web', NULL, NULL),
(3, 'edit service', 'web', NULL, NULL),
(4, 'can delete service', 'web', NULL, NULL),
(5, 'update service', 'web', NULL, NULL),
(6, 'can register service', 'web', NULL, NULL),
(7, 'can delete post', 'web', NULL, NULL),
(8, 'pay service', 'web', NULL, NULL),
(9, 'register user', 'web', NULL, NULL),
(10, 'disable user', 'web', NULL, NULL),
(11, 'edit all user', 'web', NULL, NULL),
(12, 'report', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(2, 'mezoncajero', 'web', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(3, 'mezon', 'web', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(4, 'cajero', 'web', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(5, 'super-admin', 'web', '2021-01-23 22:01:05', '2021-01-23 22:01:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(4, 1),
(5, 1),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(12, 2),
(12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_servicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre_servicio`, `valor`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 'HIPOTECARIO', '985784', '1', '2021-01-26 02:32:02', '2021-01-26 02:32:02');

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
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `enabled`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@notaria.com', '2021-01-23 22:01:05', '$2y$10$ux.Mgr1QN6Dc1ZQr36dTp.nC35d.syYX8mIGefT.mdipQBFtyc/oe', 1, 'hdF0uCHts83fvoMvaiqbMRrhEhOxjMtJbJUTpEGW2EVlhDXXJpxBzu5VMls3', '2021-01-23 22:01:05', '2021-04-01 21:08:37'),
(2, 'Cristian', 'cristian@notaria.com', '2021-01-23 22:01:05', '$2y$10$jy61fJuLM.uhaB6hw4aFseTcxLeJtagMqd6BCcjstN2YXStojDp2S', 1, 'dfLUGF92ox', '2021-01-23 22:01:05', '2021-03-24 16:20:07'),
(3, 'Mezon', 'mezon@notaria.com', '2021-01-23 22:01:05', '$2y$10$vJllSDaUcs8YH7Cwj8hPUu1d85U4GXzti/U4XgtDjmPivR1CiyAZ6', 1, 'MjoXKQLWIfICOXGkO8OzhEtdDNSD6lekclo7UXQnTNMAqqmEPYqwPYRETNr4', '2021-01-23 22:01:05', '2021-04-01 21:16:35'),
(4, 'Mezon_Cajero', 'mezon_cajero@notaria.com', '2021-01-23 22:01:05', '$2y$10$vMWwWmB5vspQujmBNMB.JO4YGSP6t0zRjyDPABugbNPQfEM3NbEkC', 1, '6JLd1AfgpTUU5nvi9gpYv9eLXK4crMB1hpAeRrX2f53I8ZALWIF9WTTwZckf', '2021-01-23 22:01:05', '2021-04-01 21:17:38'),
(5, 'Cajero', 'cajero@notaria.com', '2021-01-23 22:01:05', '$2y$10$ic241TDC14yccmdmYvZ7susFp7sPz2lz3hIoIBu4hGS35lb9e.5p.', 1, 'jwuEfUIGaqTpqzRqsVxcScRthZ0h56vW1AkA2B4hbbKlGS0RLYQL7Tk9n3Qh', '2021-01-23 22:01:05', '2021-04-01 21:18:00'),
(6, 'Super Admin Zen', 'super.admin@notaria.com', '2021-01-23 22:01:05', '$2y$10$t1P80zO94.2CoaG96d9VhuAprfMQVtJ3tNtLLJoN6fbvsOMXR86hC', 1, 'Xj70W99slVbB7wcFAj2GNhNU4gvqOCL9zC7AfHKEzwrE0XxTZ8MddvENgXaA', '2021-01-23 22:01:05', '2021-04-01 21:14:18'),
(7, 'Brooks Reynolds', 'flossie46@example.net', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'JipoyLxghz', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(8, 'Eugene Reilly', 'upton.stephen@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '29VI9ebNaG', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(9, 'Sonia Waters I', 'karolann.hane@example.net', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'bzk16ucCup', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(10, 'Miss Virginie Schowalter MD', 'zpagac@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'tZn6siixta', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(11, 'Theodora Stokes', 'jeanette64@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'W4pScRc8d6', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(12, 'Keanu Dickens DDS', 'veum.wayne@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '85zTNGa5oK', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(13, 'Dr. Oceane Blanda Jr.', 'toy.melyssa@example.net', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'yjnBfHYpj7', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(14, 'Miss Name Smitham Sr.', 'juanita.marks@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '3OqUuPIYhP', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(15, 'Guy Anderson', 'ikessler@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'HWjAtyScp0', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(16, 'Brennon Pfannerstill', 'fisher.destinee@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'iPYVYhurDh', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(17, 'Maeve Skiles', 'qlueilwitz@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'oj3ktf0AKh', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(18, 'Mr. Enos Sipes III', 'madisyn.jakubowski@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'TwDXgybrmk', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(19, 'Miss Bianka Dicki', 'annie.koch@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'QjgHcXF99r', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(20, 'Dr. Dorris Barton', 'thiel.eino@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '02B2RSjMsf', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(21, 'Prof. Marcella Heller', 'maia.dach@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '5f7SsHlY7H', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(22, 'Jade McGlynn', 'wyman.coralie@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '6edxRUmeVN', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(23, 'Yesenia Kovacek', 'marcelle56@example.net', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'Y7kcvhkzRJ', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(24, 'Ella Monahan', 'howard77@example.net', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'agW5W6bHUd', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(25, 'Miss Vena Brown', 'lisandro.corwin@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'oUawY9DKa7', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(26, 'Violette Schuppe', 'yblanda@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'eLx8NWNqBu', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(27, 'Kurt Trantow', 'dhoeger@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '1lxdKRiPgW', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(28, 'Alana Hodkiewicz', 'mwillms@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '6XmiWG8KR4', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(29, 'Obie Abernathy', 'howell.zachery@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'EuFqtr8qLV', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(30, 'Vella Nienow DVM', 'torey48@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'DXhXJ83iEi', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(31, 'Ava Zemlak-----', 'pruebaeditar@notaria.com', '2021-01-23 22:01:05', '$2y$10$FQDTwoyj7ZJYBhhQWHlsXuC7mgmC09pPAdzcwhqGJWxwAI8TKWsYm', 0, 'Oce944F757', '2021-01-23 22:01:05', '2021-01-24 19:42:15'),
(32, 'Deven', 'cary.steuber@example.net', '2021-01-23 22:01:05', '$2y$10$SxNGxeXmbw8auhG19LxeC.4TZnzDHyjaHb9wA9.QhNeBUUQrOeKUO', 0, 'NagC33E2wY', '2021-01-23 22:01:05', '2021-01-24 19:42:52'),
(33, 'Prof. Diana Altenwerth III', 'bonnie82@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'a97cnG5rgw', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(34, 'Prof. Darby McCullough I', 'dedric.schaden@example.com', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'BQg0tU5Zr6', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(35, 'Brycen Tillman', 'oswald.lakin@example.net', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'PHmNDiEHYp', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(36, 'Thad Hegmann', 'burdette.kerluke@example.org', '2021-01-23 22:01:05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'Ygi7YdUgjs', '2021-01-23 22:01:05', '2021-01-23 22:01:05'),
(64, 'juan1', 'juan1@notaria.com', NULL, '$2y$10$m6orBx.eJZH.TR006moah.pLOn5f0CPLImzYmEgBuIfLOMTU51ZDK', 1, NULL, '2021-01-24 16:42:24', '2021-01-24 16:42:24'),
(65, 'juan2', 'juan2@notaria.com', NULL, '$2y$10$PGYiLSy.GTgoRc/I.XfFUOoOBVwOtfr75HciRTAtvH.Vqy798VRxW', 1, NULL, '2021-01-24 16:44:25', '2021-01-24 16:44:25'),
(66, 'juan3', 'juan3@notaria.com', NULL, '$2y$10$0scF5EYMVDooajjzEkLyJOOW1cPFzBpCB0U40bxy2JbaPYtv9qEU.', 1, NULL, '2021-01-24 19:23:06', '2021-01-24 19:23:06'),
(67, 'juan5', 'juan5@notaria.com', NULL, '$2y$10$d3MBomd5rRPtj48ZBWY3TuH68Wh2o/Wb1lLE9oY3WyAku9tjLZnPy', 1, NULL, '2021-01-24 19:31:25', '2021-01-24 19:31:25'),
(68, 'juan6', 'juan6@notaria.com', NULL, '$2y$10$Qz4IWrncJmsnI49vQ0.S6OFT3g8geMzj69677vxpHQQGf7X.zFWMS', 1, NULL, '2021-01-24 19:36:56', '2021-01-24 19:36:56'),
(69, 'juan7', 'juan7@notaria.com', NULL, '$2y$10$/2We8Qi7x4ORBKFC8gb2uOLJxBZqxAj4p/Db07k5CheRA4KvJZq2C', 0, NULL, '2021-01-24 19:38:31', '2021-01-24 19:44:46'),
(70, 'juan8', 'juan8@notaria.com', NULL, '$2y$10$TZImK9gBB3q0V1xc8K2jIOL/Mzcm9xA.SSrVKC58iM.WhZ1420vPG', 1, NULL, '2021-01-24 19:45:16', '2021-01-24 19:45:16'),
(72, 'juan9', 'juan9@notaria.com', NULL, '$2y$10$Hb7e.ap4BBUVDFMrh91k7uUM0Tm7d9EUw8WM.G27nfe8Qyqysw7Tu', 1, NULL, '2021-01-24 19:51:33', '2021-01-24 19:51:33'),
(73, 'juan10', 'juan10@notaria.com', NULL, '$2y$10$VOnGNMluetCmXI6oNrcCP.L2LiVgFJh6avjQ1uYVUhzW.99E5sS1W', 1, NULL, '2021-01-25 00:52:19', '2021-01-25 00:52:19'),
(74, 'juan11', 'juan11@notaria.com', NULL, '$2y$10$YlD3GRYwiepaXnv01Eo83upvdtadz6LWQhx6gRkwIa3YVMoWCmt1C', 0, NULL, '2021-01-25 00:55:34', '2021-01-26 02:52:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rut_venta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_servicio` bigint(20) UNSIGNED NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventascabecera`
--

CREATE TABLE `ventascabecera` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` decimal(10,0) DEFAULT NULL,
  `ano` decimal(10,0) DEFAULT NULL,
  `numero_orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `rut_venta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `numero_boleta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `finalizarpago`
--
ALTER TABLE `finalizarpago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_id_servicio_foreign` (`id_servicio`);

--
-- Indices de la tabla `ventascabecera`
--
ALTER TABLE `ventascabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventascabecera_id_usuario_foreign` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `finalizarpago`
--
ALTER TABLE `finalizarpago`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventascabecera`
--
ALTER TABLE `ventascabecera`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_id_servicio_foreign` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `ventascabecera`
--
ALTER TABLE `ventascabecera`
  ADD CONSTRAINT `ventascabecera_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
