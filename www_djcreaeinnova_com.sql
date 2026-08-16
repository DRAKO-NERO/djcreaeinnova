-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2026 a las 08:05:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
SET SESSION sql_require_primary_key = OFF;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `www.djcreaeinnova.com`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo_i` text NOT NULL,
  `descripcion_i` text NOT NULL,
  `imagen_i` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `titulo_i`, `descripcion_i`, `imagen_i`, `created_at`, `updated_at`) VALUES
(3, 'gdsgsggew', '<p>fsdsdafasf<strong>safsafsafsafa<s>asfasfsafasf<em>asfsafsafsafassfasf</em></s></strong><em><strong>safsafasfsa</strong></em></p>', 'portadas_uploadsimg/aEOM12ce9DPDBxHMtuaayUl3P5o5lxnRnrMpZV34.png', '2026-07-22 01:04:10', '2026-07-22 01:04:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2026_07_18_081402_create_videos_table', 1),
(6, '2026_07_19_110209_create_imagenes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'oscar', 'osadsuza@gmail.com', NULL, '$2y$10$zxLxg62.4MCWysf3u3/eTOFby9/i6AdRwGu5pK.WKROBR6zUP5xxq', NULL, '2026-07-27 03:08:28', '2026-07-27 03:08:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo_v` text NOT NULL,
  `descripcion_v` text NOT NULL,
  `imagen_v` varchar(255) NOT NULL,
  `video_url_v` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `titulo_v`, `descripcion_v`, `imagen_v`, `video_url_v`, `created_at`, `updated_at`) VALUES
(2, 'Camarote escritorio', '<ul>\r\n	<li>\r\n	<p><strong>Optimizaci&oacute;n Vertical y Zonal:</strong> Una estructura arquitect&oacute;nica dise&ntilde;ada a medida que aprovecha la altura del espacio, creando dos niveles independientes que garantizan privacidad, confort y una circulaci&oacute;n fluida en la habitaci&oacute;n.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Iluminaci&oacute;n Ambiental Integrada:</strong> Incorporaci&oacute;n estrat&eacute;gica de luz LED perimetral c&aacute;lida en los nichos y cabeceros, generando un efecto flotante y una atm&oacute;sfera sumamente relajante y moderna.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Carpinter&iacute;a Funcional y Minimalista:</strong> L&iacute;neas limpias y acabados impecables que ocultan soluciones de almacenamiento inteligente, integrando repisas flotantes y accesos seguros que mantienen el orden visual.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Paleta de Texturas y Contraste:</strong> Una cuidada selecci&oacute;n de materiales que combinan la nobleza de la madera con tonos neutros mate, logrando un balance perfecto entre calidez hogare&ntilde;a y dise&ntilde;o vanguardista.</p>\r\n	</li>\r\n</ul>', 'portadas_uploads/7rFnctxc5Twi4qvCz2BKQr5Rr9m18j8fdX9M7iiO.jpg', '9lde839vstI', NULL, '2026-07-30 09:35:15'),
(7, 'Camarote 2 pisos', '<ul>\r\n	<li>\r\n	<p><strong>Estructura y Materiales:</strong> Fabricado &iacute;ntegramente en <strong>madera s&oacute;lida de alta densidad</strong> (o especificar el tipo de madera si aplica, ej. <em>pino, tornillo o roble</em>), garantizando una estabilidad superior, seguridad total y cero oscilaciones al subir o bajar.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Acabado y Pintura:</strong> Aplicaci&oacute;n de <strong>laca selladora y pintura poliuretana</strong> en tono mate (o satinado), con un acabado suave al tacto que protege la madera contra la humedad, rayones y facilita la limpieza diaria.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Capacidad y Distribuci&oacute;n:</strong> Cama de <strong>2 plazas completa en la parte inferior</strong> y plaza y media / 1 plaza en la superior (seg&uacute;n modelo), ideal para optimizar habitaciones compartidas, departamentos modernos o casas de campo.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Dise&ntilde;o Inteligente:</strong> Baranda de seguridad integrada en la litera superior con dise&ntilde;o minimalista y una escalera ergon&oacute;mica de pelda&ntilde;os anchos para un ascenso seguro y c&oacute;modo.</p>\r\n	</li>\r\n</ul>', 'portadas_uploads/qjIcSfJetgc2Ql3DZxlShJ6qJXvKUVQbztpt2b3M.jpg', 'qiErBNxmRfw', '2026-07-30 07:19:25', '2026-07-30 07:20:21'),
(8, 'Camarote walking closet', '<ul>\r\n	<li>\r\n	<p><strong>Estructura Integradora y Ergon&oacute;mica:</strong> Fabricada con l&iacute;neas limpias y una carpinter&iacute;a a medida que aprovecha la altura del techo, creando una presencia visual imponente pero ligera.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Aprovechamiento Vertical Inteligente:</strong> Distribuci&oacute;n en dos niveles que garantiza privacidad e independencia en cada litera, ideal para optimizar habitaciones compartidas o espacios compactos.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Iluminaci&oacute;n Perimetral C&aacute;lida:</strong> Incorpora sistemas de luz LED integrada de manera indirecta en los cabeceros y repisas, aportando una atm&oacute;sfera acogedora, moderna y sofisticada.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Soluciones de Almacenamiento Oculto:</strong> Zonas de guardado perfectamente mimetizadas en la estructura, como cajoneras inferiores o repisas flotantes laterales que funcionan como mesas de noche minimalistas.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Materiales y Texturas:</strong> Una paleta de tonos neutros combinada con madera natural o detalles en tonos mate, aportando textura, calidez visual y un toque contempor&aacute;neo muy en tendencia.</p>\r\n	</li>\r\n</ul>', 'portadas_uploads/bCgCCM2fCb8UYkEbOQcwOqlsGWgNW3yuMn5roPOe.jpg', 'dVOz6PcYw2I', '2026-07-30 09:24:53', '2026-07-30 09:24:53'),
(9, 'Camarote en L', '<ul>\r\n	<li>\r\n	<p><strong>Estructura Arquitect&oacute;nica a Medida:</strong> Una carpinter&iacute;a de l&iacute;neas depuradas y esbeltas que abraza la verticalidad de la habitaci&oacute;n, creando una presencia imponente pero visualmente ligera y ordenada.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Dise&ntilde;o Ergon&oacute;mico y Accesibilidad:</strong> Acceso fluido y seguro a los niveles superiores mediante una integraci&oacute;n impecable de elementos estructurales, priorizando siempre la comodidad y el uso diario.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Iluminaci&oacute;n Arquitect&oacute;nica e Indirecta:</strong> Cuidado dise&ntilde;o de luz con tiras LED c&aacute;lidas integradas en los nichos y repisas, que no solo aportan funcionalidad como luces de lectura, sino que generan un efecto flotante y una atm&oacute;sfera sumamente acogedora.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Soluciones de Almacenamiento Inteligente:</strong> Repisas flotantes estrat&eacute;gicamente ubicadas y espacios de apoyo integrados que funcionan como mesitas de noche minimalistas, manteniendo el orden visual sin sobrecargar el ambiente.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Paleta de Materiales y Calidez Textural:</strong> Una selecci&oacute;n de acabados que fusionan la nobleza de la madera con tonos neutros y modernos, aportando textura, profundidad y un aire contempor&aacute;neo sumamente sofisticado.</p>\r\n	</li>\r\n</ul>', 'portadas_uploads/K6voP96hcJa3FkfZXhl6DFqfUr5ygvUbCw8hBcLz.jpg', 'DdFupLF1OBI', '2026-07-30 10:23:44', '2026-07-30 10:23:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
