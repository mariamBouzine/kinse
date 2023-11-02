-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 nov. 2023 à 15:58
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kinse_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Full_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_ID` bigint(20) UNSIGNED NOT NULL,
  `Patient_ID` bigint(20) UNSIGNED NOT NULL,
  `Appointment_DateTime` datetime NOT NULL,
  `Payment_Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Course_Expiry` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `Full_Name`, `email`, `phone`, `offer_ID`, `Patient_ID`, `Appointment_DateTime`, `Payment_Status`, `Course_Expiry`, `created_at`, `updated_at`) VALUES
(2, 'alex Bouzine', 'alex@gmail.com', '0658952112', 1, 1, '2023-11-02 11:17:21', NULL, NULL, NULL, NULL),
(4, 'ggg', 'ggg@gmail.com', '023658123', 1, 1, '2023-11-02 12:46:15', NULL, NULL, NULL, NULL),
(5, 'Dandiel Poppy', 'Poppy@gmail.com', '0625312563', 1, 2, '2023-11-03 10:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `appointmentscoach`
--

CREATE TABLE `appointmentscoach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appointmentscoach`
--

INSERT INTO `appointmentscoach` (`id`, `coach_id`, `appointment_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 18, 2, '2023-11-02 12:59:46', '2023-11-02 12:59:46', NULL),
(8, 21, 2, '2023-11-02 13:08:52', '2023-11-02 13:08:52', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2023_10_23_104515_create_service_table', 1),
(13, '2023_10_25_082547_create_offer_table', 4),
(14, '2023_10_25_082547_create_offers_table', 5),
(15, '2023_10_25_093237_create_offers_table', 6),
(16, '2023_10_25_094852_create_offers_table', 7),
(17, '2023_10_26_102320_create_offers_table', 8),
(19, '2014_10_12_000000_create_users_table', 9),
(20, '2014_10_12_100000_create_password_resets_table', 9),
(21, '2019_08_19_000000_create_failed_jobs_table', 9),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 9),
(23, '2023_10_23_110630_create_services_table', 9),
(24, '2023_10_24_120857_create_staff_table', 9),
(25, '2023_10_26_104202_create_offers_table', 9),
(26, '2023_10_27_113106_create_appointments_table', 10),
(27, '2023_10_30_085822_create_patients_table', 11),
(28, '2023_10_31_130320_create_staff_table', 12),
(29, '2023_10_30_085822_create_patients_table c', 13),
(30, '2023_10_31_144956_create_patients_table', 14),
(31, '2023_11_01_104235_create_appointments_coach_table', 15),
(32, '2023_11_01_115949_create_staff_table', 16),
(33, '2023_11_02_082316_create_offers_table', 17),
(34, '2023_10_27_113106_create_appointments_tablec', 18),
(35, '2023_11_02_094753_create_appointments_table', 19),
(36, '2023_11_02_104746_create_appointments_coach_table', 20),
(38, '2023_11_02_113220_create_appointmentscoach_table', 21);

-- --------------------------------------------------------

--
-- Structure de la table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `Class_Type` enum('Online','Clinic','Home') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Class_Schedule` time NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Duration_Type` enum('Monthly','Daily','Yearly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offers`
--

INSERT INTO `offers` (`id`, `Name`, `service_id`, `staff_id`, `Class_Type`, `Class_Schedule`, `Cost`, `Description`, `Duration_Type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Physiotherapynn', 2, 19, 'Home', '00:40:00', '800.00', 'Tendinitis or tenosynovitis is a band tissue that is responsiblenn', 'Monthly', '2023-11-02 09:13:26', '2023-11-02 13:19:50', NULL),
(2, 'Physiotherapy for Tendinitis', 2, 19, 'Online', '00:40:00', '100.00', 'ggggggggggggggg', 'Daily', '2023-11-02 13:37:35', '2023-11-02 13:37:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `First_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Address`, `Email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'alex', 'Byrd', '2000-08-09', 'man', 'sffffffff', 'alex@gmail.com', 'alex321654', '2023-10-31 15:06:25', NULL),
(2, 'Dandiel', 'Poppy', '1993-11-11', 'man', 'rue hdbsbd', 'Poppy@gmail.com', '123582', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Service_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type_Service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Url_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `Service_Name`, `Description`, `Type_Service`, `Url_video`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ggggg', 'fffff', 'Professional', 'gggggg', NULL, NULL, '2023-10-26 13:54:11'),
(2, 'Physiotherapy for Tendinitis', 'Lorem ipsum dolor sit r adipiscing el  ipsum dolor sit r adipiscing el dolor sit r adipiscing el', 'Particular', 'www.test.com', NULL, NULL, NULL),
(3, 'ffffffffff', 'Lorem ipsum dolor sit r adipiscing el  ipsum dolor sit r adipiscing el', 'Particular', 'gggggg', NULL, NULL, '2023-10-26 10:25:04'),
(4, 'my test', 'Lorem ipsum dolor sit r adipiscing el  ipsum dolor sit r adipiscing el', 'Particular', 'gggggg', NULL, NULL, '2023-10-26 13:56:01'),
(5, 'Title service', 'kusqdghjqshdf', 'Professional', 'isudhjksh', NULL, NULL, NULL),
(6, 'my test', 'Lorem ipsum dolor sit r adipiscing el ipsum dolor sit r adipiscing el	', 'Particular', 'https://www.youtube.com/', '2023-10-30 14:01:50', '2023-10-31 12:39:29', NULL),
(8, 'ggggg', 'f', 'Particular', 'f', '2023-10-31 11:15:00', '2023-10-31 11:21:58', '2023-10-31 11:21:58'),
(9, 'my service 9', 'Tendinitis or tenosynovitis is a band tissue', 'Particular', 'www.service9.com', '2023-10-31 11:22:18', '2023-10-31 12:39:50', NULL),
(10, 'Title service 44', 'ggggggggg', 'Professional', 'ggggggggg', '2023-10-31 12:28:10', '2023-10-31 13:32:06', NULL),
(11, 'ggggg', 'hhhhhhh', 'Particular', 'gggggg', '2023-11-02 13:26:04', '2023-11-02 13:26:04', NULL),
(12, 'my service', 'hhhhhhhhkk', 'Particular', 'djkfhjkdh', '2023-11-02 13:26:23', '2023-11-02 13:26:23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `First_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Last_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` enum('Accepted','Pending','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`id`, `First_Name`, `Last_Name`, `Phone`, `Email`, `password`, `Specialization`, `Status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'Matt ', 'Dickerson', '2147483647', 'bouzinemari@gmail.com\n', '', 'Physiotherapy for Tendinitis', 'Accepted', NULL, '2023-11-01 12:48:08', NULL),
(15, 'Dandiel', 'Matt', '844', 'rajesh@gmail.com', '', 'Specialization', 'Rejected', '2023-10-02 14:42:20', '2023-11-02 09:03:37', NULL),
(16, 'kim', 'Matt', '844', 'rajesh1@gmail.com', '', 'Specialization', 'Pending', '2023-11-08 14:42:20', '2023-11-01 12:51:31', NULL),
(17, 'john', 'Matt', '844', 'rajesh2@gmail.com', '', 'Specialization', 'Pending', '2023-11-09 14:42:20', '2023-11-01 12:55:28', NULL),
(18, 'Wiktoria', 'Matt', '844', 'rajesh3@gmail.com', '', 'Specialization', 'Accepted', '2023-11-02 14:42:20', '2023-11-01 13:47:28', NULL),
(19, 'Trixie', 'Matt', '844', 'rajesh4@gmail.com', '', 'Specialization', 'Accepted', NULL, NULL, NULL),
(20, 'Byrd', 'Matt', '844', 'rajesh5@gmail.com', '', 'Specialization', 'Accepted', NULL, NULL, NULL),
(21, 'Brad', 'Matt', '844', 'rajesh6@gmail.com', '', 'Specialization', 'Accepted', NULL, NULL, NULL),
(22, 'Mason', 'Matt', '844', 'rajesh7@gmail.com', '', 'Specialization', 'Rejected', NULL, NULL, NULL),
(23, 'Sanderson', 'Matt', '844', 'rajesh8@gmail.com', '', 'Specialization', 'Rejected', NULL, NULL, NULL),
(24, 'Jun', 'Matt', '844', 'rajesh9@gmail.com', '', 'Specialization', 'Rejected', NULL, NULL, NULL),
(25, 'Redfern', 'Matt', '844', 'rajesh10@gmail.com', '', 'Specialization', 'Accepted', '2023-10-31 14:44:23', '2023-11-02 09:04:36', NULL),
(26, 'Poppy', 'Matt', '844', 'rajesh11@gmail.com', '', 'Specialization', 'Rejected', '2023-10-21 23:00:00', '2023-11-01 13:49:41', NULL),
(27, 'ahamd ', 'alami', '06235874', 'ahmad@gmail.com', '123456', 'Specialization', 'Pending', '2023-10-31 23:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2023-10-31 16:52:22', '123456', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_offer_id_foreign` (`offer_ID`),
  ADD KEY `appointments_patient_id_foreign` (`Patient_ID`);

--
-- Index pour la table `appointmentscoach`
--
ALTER TABLE `appointmentscoach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointmentscoach_coach_id_foreign` (`coach_id`),
  ADD KEY `appointmentscoach_appointment_id_foreign` (`appointment_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_service_id_foreign` (`service_id`),
  ADD KEY `offers_staff_id_foreign` (`staff_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`Email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`Email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `appointmentscoach`
--
ALTER TABLE `appointmentscoach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_offer_id_foreign` FOREIGN KEY (`offer_ID`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`Patient_ID`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `appointmentscoach`
--
ALTER TABLE `appointmentscoach`
  ADD CONSTRAINT `appointmentscoach_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointmentscoach_coach_id_foreign` FOREIGN KEY (`coach_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
