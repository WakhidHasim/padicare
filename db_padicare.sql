-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: db_padicare
-- Generation Time: 2023-07-27 9:30:07.4850 AM
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `diagnoses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `farmer_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentase` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_diagnoses_to_diseases` (`disease_id`),
  CONSTRAINT `fk_diagnoses_to_diseases` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `diseases` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `knowledge_bases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `symptom_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certainty_factor` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_knowledge_bases_to_symptoms` (`symptom_id`),
  KEY `fk_knowledge_bases_to_diseases` (`disease_id`),
  CONSTRAINT `fk_knowledge_bases_to_diseases` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_knowledge_bases_to_symptoms` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `symptoms` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `diagnoses` (`id`, `farmer_name`, `phone_number`, `address`, `disease_id`, `presentase`, `created_at`, `updated_at`) VALUES
(1, 'Feby Wibu Cupu', '12312313', 'surirejo', 'J001', 1.00, '2023-07-27 00:01:44', '2023-07-27 00:01:44'),
(2, 'Tes aja', '123345', 'tes aja', 'J001', 1.00, '2023-07-27 00:15:44', '2023-07-27 00:15:44'),
(3, 'tes', '123', 'tes', 'J001', 1.00, '2023-07-27 00:16:44', '2023-07-27 00:16:44'),
(4, 'fikri', '123456789', 'congcat', 'J003', 0.75, '2023-07-27 01:45:25', '2023-07-27 01:45:25'),
(5, 'fikri', '12345', 'cc', 'J011', 0.30, '2023-07-27 02:07:04', '2023-07-27 02:07:04'),
(6, 'feby dian maulana', '12345678', 'surirejo', 'J011', 0.15, '2023-07-27 02:17:02', '2023-07-27 02:17:02');

INSERT INTO `diseases` (`id`, `disease_name`, `slug`, `description`, `solution`, `created_at`, `updated_at`) VALUES
('J001', 'Tikus', '', '<div>Tikus merupakan hama tanaman padi yang merusak batang dan akar tanaman, dapat mengakibatkan gagal panen.</div>', '<div>Pengendalian tikus dapat dilakukan dengan menggunakan perangkap tikus, memasang jebakan tikus, atau dengan menggunakan umpan racun tikus.</div>', '2023-07-26 21:55:51', '2023-07-26 21:55:51'),
('J002', 'Keong Mas', '', '<div>Keong mas adalah hama yang merusak daun tanaman padi, biasanya menyerang tanaman pada fase pertumbuhan awal.</div>', '<div>Pengendalian keong mas dapat dilakukan dengan cara membersihkan gulma dan rerumputan di sekitar sawah, pemasangan perangkap, atau penggunaan obat pengendalian hama keong mas.</div>', '2023-07-26 21:56:46', '2023-07-26 21:56:46'),
('J003', 'Burung', '', '<div>Burung dapat merusak padi dengan memakan biji-bijian di areal persawahan.</div>', '<div>Pengendalian burung dapat dilakukan dengan pemasangan kertas berkilap atau perangkap burung di sekitar sawah, atau dengan menggunakan alat suara pengusir burung.</div>', '2023-07-26 21:57:16', '2023-07-26 21:57:16'),
('J004', 'Sundep (Cicadellidae)', '', '<div>Sundep adalah jenis wereng padi yang menyerang bagian daun padi dan menyebabkan daun berwarna kuning.</div>', '<div>Pengendalian sundep dapat dilakukan dengan penggunaan insektisida dan pemberantasan sumber perkembangbiakan seperti gulma dan rerumputan.</div>', '2023-07-26 21:58:16', '2023-07-26 21:58:16'),
('J005', 'Ulat', '', '<div>Ulat dapat merusak daun padi dengan cara menggerek bagian dalam daun.</div>', '<div>Pengendalian ulat dapat dilakukan dengan menggunakan insektisida yang aman bagi tanaman padi dan lingkungan sekitar.</div><div><br></div>', '2023-07-26 21:58:59', '2023-07-26 21:58:59'),
('J006', 'Wereng', '', '<div>Wereng adalah hama kecil yang menyerang batang dan daun padi. Serangan wereng dapat menyebabkan daun berubah warna menjadi kekuningan.</div>', '<div>Pengendalian wereng dapat dilakukan dengan penggunaan insektisida atau menggunakan musuh alami wereng seperti burung pemangsa wereng.</div>', '2023-07-26 21:59:32', '2023-07-26 21:59:32'),
('J007', 'Walang Sangit', '', '<div>Walang sangit adalah serangga yang menyerang tanaman padi dan menyebabkan daun padi berlubang.</div>', '<div>Pengendalian walang sangit dapat dilakukan dengan menggunakan insektisida atau menggunakan musuh alami walang sangit seperti burung pemangsa walang sangit.</div>', '2023-07-26 22:00:14', '2023-07-26 22:00:14'),
('J008', 'Ganjur', '', '<div>Ganjur adalah hama yang menyerang daun padi dan menyebabkan kerusakan pada tanaman.</div>', '<div>Pengendalian ganjur dapat dilakukan dengan menggunakan insektisida atau penggunaan agen hayati yang merupakan musuh alami ganjur.</div><div><br></div><div><br></div>', '2023-07-26 22:00:55', '2023-07-26 22:00:55'),
('J009', 'Hama Putih (Aleurodicus dispersus)', '', '<div>Hama putih adalah serangga kecil yang menyerang tanaman padi dan menyebabkan kerusakan pada daun.</div>', '<div>Pengendalian hama putih dapat dilakukan dengan menggunakan insektisida atau dengan menggunakan agen hayati yang menjadi musuh alami hama putih.</div>', '2023-07-26 22:02:39', '2023-07-26 22:02:39'),
('J010', 'Orong-Orong (Leptocorisa oratorius)', '', '<div>Orong-orong adalah hama yang menyerang malai padi dan menyebabkan kerusakan pada butir padi.</div>', '<div>Pengendalian orong-orong dapat dilakukan dengan menggunakan insektisida atau dengan pemanfaatan musuh alami orong-orong seperti burung pemangsa orong-orong.</div>', '2023-07-26 22:03:11', '2023-07-26 22:03:11'),
('J011', 'Penyakit Mentek (Blast)', '', '<div>Penyakit mentek adalah penyakit yang disebabkan oleh jamur Pyricularia oryzae yang menyerang tanaman padi, khususnya pada malai dan daun.</div>', '<div>Pengendalian penyakit mentek dapat dilakukan dengan pemilihan varietas padi tahan penyakit, penggunaan fungisida, dan praktik budidaya yang baik.</div>', '2023-07-26 22:03:55', '2023-07-26 22:03:55'),
('J012', 'Penyakit Tugro (Bacterial Leaf Blight)', '', '<div>Penyakit tugro adalah penyakit bakterial yang menyerang tanaman padi dan menyebabkan bercak-bercak pada daun yang berwarna cokelat.</div>', '<div>Pengendalian penyakit tugro dapat dilakukan dengan pemilihan varietas padi tahan penyakit, sanitasi lahan, dan penggunaan fungisida atau antibiotik.</div>', '2023-07-26 22:04:24', '2023-07-26 22:04:24'),
('J013', 'Penyakit Grassy Stunt', '', '<div>Penyakit grassy stunt disebabkan oleh Rice grassy stunt virus dan menyerang tanaman padi dengan menyebabkan pertumbuhan yang stunted.</div>', '<div>Pengendalian penyakit grassy stunt dapat dilakukan dengan memilih varietas padi tahan virus dan pemberantasan sumber penyebaran virus.</div>', '2023-07-26 22:05:02', '2023-07-26 22:05:02'),
('J014', 'Penyakit Kerdil Kuning (Ragged Stunt):', '', '<div>Penyakit kerdil kuning adalah penyakit yang menyerang tanaman padi dan menyebabkan pertumbuhan tanaman terhambat dan daun berwarna kuning.</div>', '<div>Pengendalian penyakit kerdil kuning dapat dilakukan dengan memilih varietas padi tahan penyakit, pemberantasan gulma inang, dan penggunaan agen hayati yang menghambat penyebaran virus.</div>', '2023-07-26 22:05:35', '2023-07-26 22:05:35'),
('J015', 'Penyakit Kresek (Bacterial Wilt)', '', '<div>Penyakit kresek adalah penyakit bakterial yang menyerang batang tanaman padi dan menyebabkan layu pada tanaman.</div>', '<div>Pengendalian penyakit kresek dapat dilakukan dengan pemilihan varietas padi tahan penyakit, sanitasi lahan, dan penggunaan fungisida atau antibiotik.</div>', '2023-07-26 22:06:05', '2023-07-26 22:06:05');

INSERT INTO `knowledge_bases` (`id`, `symptom_id`, `disease_id`, `certainty_factor`, `created_at`, `updated_at`) VALUES
(1, 'G006', 'J001', 0.80, '2023-07-26 23:51:46', '2023-07-27 01:55:27'),
(2, 'G004', 'J002', 1.00, '2023-07-26 23:51:56', '2023-07-27 01:55:10'),
(3, 'G003', 'J003', 0.60, '2023-07-26 23:52:05', '2023-07-27 01:57:34'),
(4, 'G008', 'J004', 0.40, '2023-07-27 01:56:04', '2023-07-27 01:56:04'),
(5, 'G002', 'J005', 0.80, '2023-07-27 01:56:25', '2023-07-27 01:56:25'),
(6, 'G012', 'J006', 0.20, '2023-07-27 01:58:06', '2023-07-27 01:58:06'),
(7, 'G014', 'J007', 0.40, '2023-07-27 01:58:33', '2023-07-27 01:58:33'),
(8, 'G016', 'J008', 0.20, '2023-07-27 01:59:34', '2023-07-27 01:59:34'),
(9, 'G018', 'J009', 0.20, '2023-07-27 02:00:10', '2023-07-27 02:00:10'),
(10, 'G021', 'J010', 0.80, '2023-07-27 02:00:51', '2023-07-27 02:00:51'),
(11, 'G022', 'J011', 0.60, '2023-07-27 02:01:35', '2023-07-27 02:01:35'),
(12, 'G026', 'J012', 0.60, '2023-07-27 02:02:26', '2023-07-27 02:02:26'),
(13, 'G031', 'J013', 0.40, '2023-07-27 02:02:54', '2023-07-27 02:02:54'),
(14, 'G032', 'J014', 0.20, '2023-07-27 02:03:40', '2023-07-27 02:03:40'),
(15, 'G033', 'J015', 0.80, '2023-07-27 02:20:57', '2023-07-27 02:20:57');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_09_085812_create_symptoms_table', 1),
(6, '2023_07_09_085847_create_diseases_table', 1),
(7, '2023_07_09_085935_create_knowledge_bases_table', 1),
(8, '2023_07_09_091503_create_diagnoses_table', 1),
(9, '2023_07_09_091726_add_foreign_key_to_knowledge_bases_table', 1),
(10, '2023_07_09_092120_add_foreign_key_to_diagnoses_table', 1);

INSERT INTO `symptoms` (`id`, `symptom_name`, `created_at`, `updated_at`) VALUES
('G001', 'Padi mengalami kerusakan sejak dari pesemaian hingga dalam penyimpanan', '2023-07-26 21:44:40', '2023-07-26 21:44:40'),
('G002', 'Tanaman yang terserang banyak bekas potongan dan terdapat bekas gigitan', '2023-07-26 21:44:58', '2023-07-26 21:44:58'),
('G003', 'Kerusakan tanaman banyak keliatan pada pagi hari', '2023-07-26 21:45:07', '2023-07-26 21:45:07'),
('G004', 'Daun dan batang hilang dari tanaman', '2023-07-26 21:45:19', '2023-07-26 21:45:19'),
('G005', 'Banyak potongan daun dan batang terlihat mengambang', '2023-07-26 21:45:31', '2023-07-26 21:45:31'),
('G006', 'Padi banyak terserang saat fase matang susu sampai pemasakan susu (sebelum panen)', '2023-07-26 21:45:43', '2023-07-26 21:45:43'),
('G007', 'Banyak biji hampa dan hilang', '2023-07-26 21:45:52', '2023-07-26 21:45:52'),
('G008', 'Banyak kupu kupu berwarna putih pada sore dan malam', '2023-07-26 21:46:01', '2023-07-26 21:46:01'),
('G009', 'Banyak daun padi muda menguning dan mati', '2023-07-26 21:46:17', '2023-07-26 21:46:17'),
('G010', 'Padi yang sedang bunting, bulir padinya keluar, berguguran gabah kosong dan berwarna keabu-abuan', '2023-07-26 21:46:25', '2023-07-26 21:46:25'),
('G011', 'Banyak Binatang kecil di tempat lembab, gelap, dan teduh', '2023-07-26 21:46:36', '2023-07-26 21:46:36'),
('G012', 'Banyak malai dan bulir padi yang hampa', '2023-07-26 21:46:48', '2023-07-26 21:46:48'),
('G013', 'Tanaman kerdil', '2023-07-26 21:46:56', '2023-07-26 21:46:56'),
('G014', 'Tanaman padi terserang pada masa masak susu', '2023-07-26 21:47:06', '2023-07-26 21:47:06'),
('G015', 'Terdapat bekas tusukan dan pecah', '2023-07-26 21:47:15', '2023-07-26 21:47:15'),
('G016', 'Daun mengulung rapat seperti daun bawang', '2023-07-26 21:47:28', '2023-07-26 21:47:28'),
('G017', 'Daun memuncat, menguning, dan mengering', '2023-07-26 21:47:38', '2023-07-26 21:47:38'),
('G018', 'Daun terpotong seperti di gunting', '2023-07-26 21:47:53', '2023-07-26 21:47:53'),
('G019', 'Tamanam padi yang diserang berasal dari bibit bibit yang lemah', '2023-07-26 21:48:04', '2023-07-26 21:48:04'),
('G020', 'Tanaman terpotong pada pangkal batang', '2023-07-26 21:48:12', '2023-07-26 21:48:12'),
('G021', 'Rusaknya akar muda dan bagian pangkal tanaman yang berada di bawah tanah', '2023-07-26 21:48:20', '2023-07-26 21:48:20'),
('G022', 'Tanaman padi muda yang diserang mati sehingga terlihat adanya spot-spot kosong di sawah', '2023-07-26 21:48:33', '2023-07-26 21:48:33'),
('G023', 'Warna daun menjadi kemerahan, atau daun-daun luar menguning, akhirnya menjadi kering', '2023-07-26 21:48:43', '2023-07-26 21:48:43'),
('G024', 'Pertumbuhan panjang terhenti, sehingga daun-daun teratur seperti kipas', '2023-07-26 21:48:53', '2023-07-26 21:48:53'),
('G025', 'Bunga tetap tersimpan di dalam upih-upih daun', '2023-07-26 21:49:05', '2023-07-26 21:49:05'),
('G026', 'Ujung daun berwarna kuning, hijau jingga atau kuning cokelat', '2023-07-26 21:49:13', '2023-07-26 21:49:13'),
('G027', 'Pada daun yang masih muda terdapat bintik-bintik cokelat', '2023-07-26 21:49:22', '2023-07-26 21:49:22'),
('G028', 'Pada daun terdapat bercak klorotis', '2023-07-26 21:49:33', '2023-07-26 21:49:33'),
('G029', 'Daunnya berbintik-bintik kecil berwarna cokelat hitam', '2023-07-26 21:49:43', '2023-07-26 21:49:43'),
('G030', 'Tanaman yang terserang justru malah banyak anakannya', '2023-07-26 21:50:00', '2023-07-26 21:50:14'),
('G031', 'Daunnya sempit dan lancip', '2023-07-26 21:50:25', '2023-07-26 21:50:25'),
('G032', 'Daun memutih kemudian menguning', '2023-07-26 21:50:36', '2023-07-26 21:50:36'),
('G033', 'Pada satu rumpun terdapat banyak anakan', '2023-07-26 21:50:53', '2023-07-26 21:50:53'),
('G034', 'Pada pucuk daun bagian atas, terdapat bercak-bercak kuning dan bercak-bercak tersebut sejajar dengan tulang daun', '2023-07-26 21:51:04', '2023-07-26 21:51:04'),
('G035', 'Pada serangan yang berat, penyakitnya merusak titik tumbuh, dan menyebabkan matinya tanaman itu', '2023-07-26 21:51:21', '2023-07-26 21:51:21');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$pCwbgaAShaYdhYUled2Q9u3f1I5p9jiMdJhkOD67Q/GKg3k5PvbYW', NULL, NULL, NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;