-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2024 at 11:13 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_si_lpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id` int UNSIGNED NOT NULL,
  `id_guru` int UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_komen` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Laki-Laki', '2022-12-25 10:53:41', '2022-12-25 10:53:41'),
(2, 'Perempuan', '2022-12-25 10:53:41', '2022-12-25 10:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `batas_start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `batas_end_time` time NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(2, 'Rias Pengantin', '2024-07-07 22:45:04', '2024-07-07 22:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `komen`
--

CREATE TABLE `komen` (
  `id` int UNSIGNED NOT NULL,
  `id_siswa` int UNSIGNED NOT NULL,
  `id_guru` int UNSIGNED NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_absen`
--

CREATE TABLE `ls_absen` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kehadiran_id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ls_kelas`
--

CREATE TABLE `ls_kelas` (
  `id` int UNSIGNED NOT NULL,
  `id_kelas` int UNSIGNED NOT NULL,
  `id_guru` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ls_kelas`
--

INSERT INTO `ls_kelas` (`id`, `id_kelas`, `id_guru`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, '2024-07-07 22:45:04', '2024-07-07 22:45:04'),
(5, 2, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi_harians`
--

CREATE TABLE `materi_harians` (
  `id` int UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi_harians`
--

INSERT INTO `materi_harians` (`id`, `judul`, `modul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'test', 'BAB I-III.docx', 'test', '2024-07-07 23:20:01', '2024-07-07 23:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `materi_videos`
--

CREATE TABLE `materi_videos` (
  `id` int UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi_videos`
--

INSERT INTO `materi_videos` (`id`, `judul`, `videos`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'tes', 'Focus Episode 1 + Addition Ad Desktop Arrow CTA.mp4', 'tes', '2024-07-07 23:22:51', '2024-07-07 23:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_17_121201_create_siswas_table', 1),
(6, '2022_11_17_121410_create_materi_harians_table', 1),
(7, '2022_11_17_121423_create_materi_videos_table', 1),
(8, '2022_11_21_144856_create_pendidiks_table', 1),
(9, '2022_11_22_114936_create_komen_table', 1),
(10, '2022_11_22_121336_create_diskusi_table', 1),
(11, '2022_12_01_152856_create_jenis_kelamin_table', 1),
(12, '2022_12_02_093746_create_kelas_table', 1),
(13, '2022_12_03_123719_create_ls_kelas_table', 1),
(14, '2022_12_06_174256_create_sw_kelas_table', 1),
(15, '2022_12_08_161131_create_penilaians_table', 1),
(16, '2022_12_25_173637_create_kehadiran_table', 1),
(17, '2022_12_25_173806_create_ls_absen_table', 1),
(18, '2022_12_25_173859_create_tb_libur_table', 1),
(19, '2022_12_25_175114_create_presences_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendidiks`
--

CREATE TABLE `pendidiks` (
  `id` int UNSIGNED NOT NULL,
  `nik` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidiks`
--

INSERT INTO `pendidiks` (`id`, `nik`, `nama`, `jenis_kelamin`, `email`, `no_hp`, `created_at`, `updated_at`) VALUES
(7, 123123, 'Raya', '1', 'raya@gmail.com', '089122321249', '2024-07-07 23:16:35', '2024-07-07 23:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id` int UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `tema_praktek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_kreatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_ketrampilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_sikap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kehadiran_id` int UNSIGNED NOT NULL,
  `presence_date` date NOT NULL,
  `presence_enter_time` time NOT NULL,
  `presence_out_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` int UNSIGNED NOT NULL,
  `nik` bigint NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nik`, `nama`, `jenis_kelamin`, `email`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 2300877434423, 'Winarta', '2', 'wina@gmail.com', '08796887733', '2022-12-25 11:16:26', '2022-12-25 11:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `sw_kelas`
--

CREATE TABLE `sw_kelas` (
  `id` int UNSIGNED NOT NULL,
  `id_kelas` int UNSIGNED NOT NULL,
  `id_guru` int UNSIGNED DEFAULT NULL,
  `id_siswa` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sw_kelas`
--

INSERT INTO `sw_kelas` (`id`, `id_kelas`, `id_guru`, `id_siswa`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, NULL, '2024-07-07 22:45:04', '2024-07-07 22:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_libur`
--

CREATE TABLE `tb_libur` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holiday_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$YpMxy2hYIIK9Qinpmd/et.JnTukunMa2f1WbPjHZKgL4v87FrFv/m', 1, NULL, '2022-12-25 10:53:38', '2022-12-25 10:53:38'),
(2, 'Winarta', 'wina@gmail.com', NULL, '045243954934348edc1e86a3c9c244e4', 3, NULL, '2022-12-25 11:16:26', '2023-03-11 02:09:15'),
(8, 'Cipung', 'bbkgoreng72@gmail.com', NULL, '$2y$10$swYwqWkWAzblW3LEUQneXe5sERtqiTEr1cvBUFiVFi4nZT2LXKwcS', 3, NULL, '2024-06-27 07:01:44', '2024-06-27 07:01:44'),
(14, 'raya', 'raya123@gmaill.com', NULL, '$2y$10$D6.JARTRE7i/.//sKK9IFOj0lzzJ2kLsIVkgKdDqs6tPqw/Mez73.', 2, NULL, '2024-07-07 23:09:49', '2024-07-07 23:09:49'),
(15, 'Raya', 'raya@gmail.com', NULL, '$2y$10$XzwyA5IC9p7wWoCe6GJwLuLSr7IcfO8tSplZO4QGhpWYzeByf1qRO', 2, NULL, '2024-07-07 23:16:36', '2024-07-07 23:16:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diskusi_id_guru_foreign` (`id_guru`),
  ADD KEY `diskusi_id_komen_foreign` (`id_komen`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komen`
--
ALTER TABLE `komen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komen_id_siswa_foreign` (`id_siswa`),
  ADD KEY `komen_id_guru_foreign` (`id_guru`);

--
-- Indexes for table `ls_absen`
--
ALTER TABLE `ls_absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ls_absen_user_id_foreign` (`user_id`),
  ADD KEY `ls_absen_kehadiran_id_foreign` (`kehadiran_id`);

--
-- Indexes for table `ls_kelas`
--
ALTER TABLE `ls_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ls_kelas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `ls_kelas_id_guru_foreign` (`id_guru`);

--
-- Indexes for table `materi_harians`
--
ALTER TABLE `materi_harians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_videos`
--
ALTER TABLE `materi_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendidiks`
--
ALTER TABLE `pendidiks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendidiks_nik_unique` (`nik`),
  ADD UNIQUE KEY `pendidiks_email_unique` (`email`);

--
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presences_user_id_foreign` (`user_id`),
  ADD KEY `presences_kehadiran_id_foreign` (`kehadiran_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nik_unique` (`nik`),
  ADD UNIQUE KEY `siswas_email_unique` (`email`),
  ADD UNIQUE KEY `siswas_no_hp_unique` (`no_hp`);

--
-- Indexes for table `sw_kelas`
--
ALTER TABLE `sw_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sw_kelas_id_guru_foreign` (`id_guru`),
  ADD KEY `sw_kelas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `sw_kelas_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `tb_libur`
--
ALTER TABLE `tb_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komen`
--
ALTER TABLE `komen`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_absen`
--
ALTER TABLE `ls_absen`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ls_kelas`
--
ALTER TABLE `ls_kelas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi_harians`
--
ALTER TABLE `materi_harians`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi_videos`
--
ALTER TABLE `materi_videos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pendidiks`
--
ALTER TABLE `pendidiks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sw_kelas`
--
ALTER TABLE `sw_kelas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_libur`
--
ALTER TABLE `tb_libur`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `diskusi_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `pendidiks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diskusi_id_komen_foreign` FOREIGN KEY (`id_komen`) REFERENCES `komen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komen`
--
ALTER TABLE `komen`
  ADD CONSTRAINT `komen_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `pendidiks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komen_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ls_absen`
--
ALTER TABLE `ls_absen`
  ADD CONSTRAINT `ls_absen_kehadiran_id_foreign` FOREIGN KEY (`kehadiran_id`) REFERENCES `kehadiran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ls_absen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ls_kelas`
--
ALTER TABLE `ls_kelas`
  ADD CONSTRAINT `ls_kelas_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `pendidiks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ls_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presences`
--
ALTER TABLE `presences`
  ADD CONSTRAINT `presences_kehadiran_id_foreign` FOREIGN KEY (`kehadiran_id`) REFERENCES `kehadiran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sw_kelas`
--
ALTER TABLE `sw_kelas`
  ADD CONSTRAINT `sw_kelas_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `pendidiks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sw_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sw_kelas_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
