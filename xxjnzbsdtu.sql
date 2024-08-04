-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_user_id_foreign` (`user_id`),
  CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	1,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44');

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `adresse` varchar(191) DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_user_id_foreign` (`user_id`),
  CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `clients` (`id`, `user_id`, `adresse`, `point`, `created_at`, `updated_at`) VALUES
(1,	4,	'39143 Koss Street\nMullermouth, WY 19935-9250',	0,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(2,	5,	'283 Connie Passage\nPort Roberta, AK 20080',	0,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(3,	3,	'79280 Bernier Lake\nNorth Juniusstad, NY 01226',	0,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(4,	5,	'115 Florida Drive Suite 735\nSouth Markus, KS 91784',	0,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(5,	11,	NULL,	0,	'2023-04-26 17:15:03',	'2023-04-26 17:15:03');

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `travail_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_travail_id_foreign` (`travail_id`),
  CONSTRAINT `contacts_travail_id_foreign` FOREIGN KEY (`travail_id`) REFERENCES `travails` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `converts`;
CREATE TABLE `converts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `solde` double(8,2) NOT NULL DEFAULT 0.00,
  `verifie` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `converts_user_id_foreign` (`user_id`),
  CONSTRAINT `converts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE `evaluations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `note` varchar(191) NOT NULL,
  `commentaire` varchar(191) NOT NULL,
  `travail_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_travail_id_foreign` (`travail_id`),
  CONSTRAINT `evaluations_travail_id_foreign` FOREIGN KEY (`travail_id`) REFERENCES `travails` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(191) NOT NULL,
  `imageable_type` varchar(191) NOT NULL,
  `imageable_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `images` (`id`, `path`, `imageable_type`, `imageable_id`, `created_at`, `updated_at`) VALUES
(1,	'public/services/GekJD5yXo7LTHTJnvGwvNZAS1CVkwLGQsUre0wpy.jpg',	'App\\Models\\Service',	1,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(2,	'public/services/8QjEh9x1ImFicFsfMbM3ibFKZpoL33L63tqcVT2S.jpg',	'App\\Models\\Service',	2,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(3,	'public/services/q25PmbtkTNKrLURGkJbho9gdSyJvHs8pxux1krgx.jpg',	'App\\Models\\Service',	3,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(4,	'public/services/mCfWO2cmDHhYWFc1uoVrxGNPNSrc8Nu17FrI0xec.jpg',	'App\\Models\\Service',	4,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(5,	'public/services/HyDWG2ZG4YDrPVfnuo0CFQK7yYLpoaENPeU5Wl2b.jpg',	'App\\Models\\Service',	5,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(6,	'public/services/bzLs0NabDCAYkhQSJS73dCi8AN0TO692rZi6eyo3.jpg',	'App\\Models\\Service',	6,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(7,	'public/services/fsK3hjP0i8Ik11Az46DTvJv2lgY3YmHIF41pIDCk.jpg',	'App\\Models\\Service',	7,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(8,	'public/services/JHhWdu6p9VfQWF9IK6hY0YOuugJ6ReCTi9c1Vlo2.jpg',	'App\\Models\\Service',	8,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(9,	'public/services/XXbqmu1yROqBUQBzENEF8rGcudIgf5pjdxKVrSsR.jpg',	'App\\Models\\Service',	9,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(10,	'public/services/hoXbYdNBd083f3feWMlkMYf7YShXh0mD6zR2McU2.jpg',	'App\\Models\\Service',	10,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(11,	'public/services/74t9S00M9BMJb2PwPepQIUtfxwzxUfCESIpd0s46.jpg',	'App\\Models\\Service',	11,	'2023-04-26 15:28:41',	'2023-04-26 15:28:41'),
(12,	'public/services/zVX83bFG1LgFbl8VQcWA6hWfiOUJj7lnGGaqSzV5.jpg',	'App\\Models\\Service',	12,	'2023-04-26 15:49:51',	'2023-04-26 15:49:51'),
(13,	'public/services/QDSXH1f35DUVCRtw9zET53cCKdU7W5JJkRHaIgT3.jpg',	'App\\Models\\Service',	1,	'2023-04-26 16:08:06',	'2023-04-26 16:08:06'),
(14,	'public/users/AkyeM1SuSfCJT9NouYyRZ2KPEb4SFyGbeQdl7LXc.png',	'App\\Models\\User',	11,	'2023-04-26 17:15:03',	'2023-04-26 17:15:03'),
(15,	'public/users/FQHHLD8ge4XcXKAI49gJhc4uEMpdHVHWgJQgbRBk.jpg',	'App\\Models\\User',	12,	'2023-04-26 17:56:28',	'2023-04-26 17:56:28'),
(16,	'public/portfolio/MBpjnWpoFU6pYOwWe5bVia7oTlwfPmXZhKNIOwJg.jpg',	'App\\Models\\Portfolio',	1,	'2023-04-26 18:00:24',	'2023-04-26 18:00:24'),
(17,	'public/users/vSJD77rFSUTj5DvbtH6ERh7E9ZhUN4X34l5kTFFt.jpg',	'App\\Models\\User',	13,	'2023-04-29 11:57:04',	'2023-04-29 11:57:04'),
(18,	'public/users/uR4wTQRh1FBR3fWiywZsXhQO78pwinHGNn3BkdfS.webp',	'App\\Models\\User',	14,	'2023-06-06 16:09:24',	'2023-06-06 16:09:24');

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `expediteur` bigint(20) unsigned NOT NULL,
  `destinataire` bigint(20) unsigned NOT NULL,
  `contact_id` bigint(20) unsigned NOT NULL,
  `message` varchar(191) NOT NULL,
  `vue` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_expediteur_foreign` (`expediteur`),
  KEY `messages_destinataire_foreign` (`destinataire`),
  KEY `messages_contact_id_foreign` (`contact_id`),
  CONSTRAINT `messages_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  CONSTRAINT `messages_destinataire_foreign` FOREIGN KEY (`destinataire`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_expediteur_foreign` FOREIGN KEY (`expediteur`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25,	'2014_10_12_000000_create_users_table',	1),
(26,	'2014_10_12_100000_create_password_resets_table',	1),
(27,	'2016_06_01_000001_create_oauth_auth_codes_table',	1),
(28,	'2016_06_01_000002_create_oauth_access_tokens_table',	1),
(29,	'2016_06_01_000003_create_oauth_refresh_tokens_table',	1),
(30,	'2016_06_01_000004_create_oauth_clients_table',	1),
(31,	'2016_06_01_000005_create_oauth_personal_access_clients_table',	1),
(32,	'2019_08_19_000000_create_failed_jobs_table',	1),
(33,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(34,	'2023_01_30_094553_create_images_table',	1),
(35,	'2023_01_30_095214_create_admins_table',	1),
(36,	'2023_01_30_095239_create_clients_table',	1),
(37,	'2023_01_30_095303_create_tacheurs_table',	1),
(38,	'2023_01_30_095512_create_services_table',	1),
(39,	'2023_01_30_095555_create_tacheur_services_table',	1),
(40,	'2023_01_30_095633_create_travails_table',	1),
(41,	'2023_01_30_095746_create_paiements_table',	1),
(42,	'2023_01_30_095832_create_transferts_table',	1),
(43,	'2023_01_30_100009_create_contacts_table',	1),
(44,	'2023_01_30_100035_create_messages_table',	1),
(45,	'2023_01_30_100104_create_evaluations_table',	1),
(46,	'2023_02_03_105115_create_portfolios_table',	1),
(47,	'2023_02_13_144156_create_converts_table',	1),
(48,	'2023_02_13_144814_create_reclames_table',	1);

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `paiements`;
CREATE TABLE `paiements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `montant` double(8,2) NOT NULL,
  `etat` varchar(191) NOT NULL,
  `travail_id` bigint(20) unsigned NOT NULL,
  `tacheur_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paiements_travail_id_foreign` (`travail_id`),
  KEY `paiements_tacheur_id_foreign` (`tacheur_id`),
  CONSTRAINT `paiements_tacheur_id_foreign` FOREIGN KEY (`tacheur_id`) REFERENCES `tacheurs` (`id`),
  CONSTRAINT `paiements_travail_id_foreign` FOREIGN KEY (`travail_id`) REFERENCES `travails` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE `portfolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `details` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `designation` varchar(191) NOT NULL,
  `tacheur_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolios_tacheur_id_foreign` (`tacheur_id`),
  CONSTRAINT `portfolios_tacheur_id_foreign` FOREIGN KEY (`tacheur_id`) REFERENCES `tacheurs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `reclames`;
CREATE TABLE `reclames` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(191) NOT NULL,
  `verifie` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL,
  `tacheur_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reclames_user_id_foreign` (`user_id`),
  CONSTRAINT `reclames_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `description` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1,	'Assemblage de meubles',	'Besoin d\'apporter quelque chose ou d\'aider dans votre maison dans le cadre d\'un déménagement? Nos Taskeurs sont là pour vous aider.',	'2023-04-26 16:08:06',	'2023-04-26 16:08:06');

DROP TABLE IF EXISTS `tacheurs`;
CREATE TABLE `tacheurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `online` tinyint(1) NOT NULL,
  `solde` double(8,2) NOT NULL DEFAULT 0.00,
  `verifie` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tacheurs_user_id_foreign` (`user_id`),
  CONSTRAINT `tacheurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tacheurs` (`id`, `online`, `solde`, `verifie`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	0,	0.00,	0,	8,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(2,	0,	0.00,	0,	7,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(3,	0,	0.00,	0,	7,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(4,	0,	0.00,	0,	8,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(5,	1,	0.00,	0,	12,	'2023-04-26 17:56:28',	'2023-04-26 17:56:28'),
(6,	1,	0.00,	0,	13,	'2023-04-29 11:57:04',	'2023-04-29 11:57:04'),
(7,	1,	0.00,	0,	14,	'2023-06-06 16:09:24',	'2023-06-06 16:09:24');

DROP TABLE IF EXISTS `tacheur_services`;
CREATE TABLE `tacheur_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tarifs` varchar(191) NOT NULL,
  `Task_Location` varchar(191) NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `tacheur_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tacheur_services_service_id_foreign` (`service_id`),
  KEY `tacheur_services_tacheur_id_foreign` (`tacheur_id`),
  CONSTRAINT `tacheur_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  CONSTRAINT `tacheur_services_tacheur_id_foreign` FOREIGN KEY (`tacheur_id`) REFERENCES `tacheurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tacheur_services` (`id`, `tarifs`, `Task_Location`, `service_id`, `tacheur_id`, `created_at`, `updated_at`) VALUES
(1,	'0',	'47796 Schamberger Ranch\nPort Johannaside, SC 25991-6782',	7,	3,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(2,	'0',	'34711 Wilkinson Ways Apt. 445\nPort Russstad, DC 21387',	3,	1,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(3,	'0',	'19329 Camille Corners\nJoantown, TN 66301',	3,	1,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(4,	'0',	'78169 Barton Motorway\nBiankaberg, NY 24813-5323',	4,	3,	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(5,	'19',	'rabat',	1,	5,	'2023-04-26 17:56:45',	'2023-04-26 17:56:45'),
(6,	'5',	'rabat',	1,	6,	'2023-04-29 11:57:14',	'2023-04-29 11:57:14'),
(7,	'20',	'rabat',	1,	7,	'2023-06-06 16:09:35',	'2023-06-06 16:09:35');

DROP TABLE IF EXISTS `transferts`;
CREATE TABLE `transferts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `montant` double(8,2) NOT NULL,
  `tacheur_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transferts_tacheur_id_foreign` (`tacheur_id`),
  CONSTRAINT `transferts_tacheur_id_foreign` FOREIGN KEY (`tacheur_id`) REFERENCES `tacheurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `travails`;
CREATE TABLE `travails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `adresse` varchar(191) NOT NULL,
  `detailTache` varchar(191) NOT NULL,
  `etat` varchar(191) DEFAULT NULL,
  `motifRefus` varchar(191) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `startTravail` datetime DEFAULT NULL,
  `finTravail` datetime DEFAULT NULL,
  `nbr_houre` int(11) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `tacheur_service_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `travails_user_id_foreign` (`user_id`),
  KEY `travails_tacheur_service_id_foreign` (`tacheur_service_id`),
  CONSTRAINT `travails_tacheur_service_id_foreign` FOREIGN KEY (`tacheur_service_id`) REFERENCES `tacheur_services` (`id`),
  CONSTRAINT `travails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `telephone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role` enum('Admin','Client','Tacheur') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `nom`, `prenom`, `telephone`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Kamryn Osinski Jr.',	'Josh Lebsack',	'1-571-931-0969',	'admin@gmail.com',	NULL,	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Admin',	'cbiya1zjK3fsCmgT8bc00z0lBymRSSiZbP8tfg2vjPZbUhm1eFFNzW1SgQ7t',	'2023-04-26 14:54:44',	'2023-04-26 15:09:44'),
(2,	'Dr. Colten King',	'Miss Dorothy Runolfsdottir',	'(520) 323-0802',	'stuart70@example.com',	'2023-04-26 14:54:44',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Admin',	'mWiZJXqZKG',	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(3,	'Willa Shields',	'Mr. Kraig Abbott',	'1-847-603-3097',	'client@gmail.com',	NULL,	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Client',	'LMxfYNDBq60Z5lQN1nyKZNeVSmqGtlfxvRKsJOe5z5DH4pIZk5fo0f0CtkIG',	'2023-04-26 14:54:44',	'2023-04-26 15:12:02'),
(4,	'Cullen Maggio',	'Garett Kertzmann',	'+1-808-777-6415',	'quigley.jaydon@example.org',	'2023-04-26 14:54:44',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Client',	'17dtk8FPsB',	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(5,	'Jeremy Zemlak',	'Prof. Dejon Vandervort',	'480-240-8471',	'myrtice35@example.net',	'2023-04-26 14:54:44',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Client',	'TtJCWTerQf',	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(6,	'Prof. Aida Waters',	'Maximillia Glover',	'+1-801-216-0457',	'clark21@example.net',	'2023-04-26 14:54:44',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Client',	'VsFDHWUb2o',	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(7,	'Prof. Frankie Bartell I',	'Dr. Maybell Heidenreich II',	'+1.248.228.0727',	'feest.orlo@example.org',	'2023-04-26 14:54:44',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Tacheur',	'T9yhXCMG53',	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(8,	'Albert Becker III',	'Dereck Ritchie',	'754.831.9552',	'tacheur@gmail.com',	NULL,	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Tacheur',	'zGK26axnPt0apjjzBrcxHscURYM8jDYrhXJS4Dl4rTdeOy4pObbHtiUJpbuG',	'2023-04-26 14:54:44',	'2023-04-26 15:16:02'),
(9,	'Mr. Devyn Hettinger',	'Mr. Kaley Bosco',	'(848) 487-1380',	'swift.eldridge@example.net',	'2023-04-26 14:54:44',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Tacheur',	'mXZuwok7Ad',	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(10,	'Casandra Koch',	'Rey Jakubowski',	'+1-562-849-5002',	'jdietrich@example.org',	'2023-04-26 14:54:44',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Tacheur',	'6TSLjGTa0h',	'2023-04-26 14:54:44',	'2023-04-26 14:54:44'),
(11,	'test',	'test',	'123456789',	'test@gmail.com',	NULL,	'$2y$10$fVmbW10mFovtpZA3Cv9X/e5GgFV4rxzfjNw27IW6/QhYCB2FuQ6TC',	'Client',	NULL,	'2023-04-26 17:15:03',	'2023-04-26 17:15:03'),
(12,	'tach1',	'tach1',	'123456789',	'tach1@gmail.com',	NULL,	'$2y$10$47M3ng5NJJ8VXSmVuXlspucqXxfewRWleTK7jFwbHcW.rmAZ8qciC',	'Tacheur',	NULL,	'2023-04-26 17:56:28',	'2023-04-26 17:56:28'),
(13,	'tach',	'tach',	'12346789',	'tach@gmail.com',	NULL,	'$2y$10$QmC9udu8OgYSP5qmuIDIiOnEo/O0dUSCHsp/sIleijkYBjonHYrEi',	'Tacheur',	NULL,	'2023-04-29 11:57:04',	'2023-04-29 11:57:04'),
(14,	'test',	'test',	'123456789',	'test1@gmail.com',	NULL,	'$2y$10$k8HlOEkzdIit1FUJYTuB8.dXAXm3MUjeJz4B/Qj7jpl9/ouug5rG6',	'Tacheur',	NULL,	'2023-06-06 16:09:24',	'2023-06-06 16:09:24');

-- 2024-07-03 09:19:06
