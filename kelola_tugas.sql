-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2022 pada 14.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelola_tugas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_task` bigint(20) UNSIGNED NOT NULL,
  `isi_jawaban` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_jawaban` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `answers`
--

INSERT INTO `answers` (`id`, `id_task`, `isi_jawaban`, `komentar`, `media_jawaban`, `created_at`, `updated_at`) VALUES
(1, 501, '<div>jawaban untuk tugas hello world</div>', NULL, '[\"310_zana.jpg\"]', '2022-06-19 11:18:54', '2022-06-19 11:18:54'),
(2, 2, NULL, NULL, '[]', '2022-06-19 11:19:54', '2022-06-19 11:19:54'),
(3, 4, '<div>heloo</div>', NULL, '[\"221_stephen.jpg\"]', '2022-06-19 11:23:59', '2022-06-19 11:23:59'),
(4, 6, '<div>aa</div>', NULL, '[]', '2022-06-19 11:24:55', '2022-06-19 11:24:55'),
(5, 10, NULL, 'hello', '[]', '2022-06-19 11:28:05', '2022-06-19 11:28:05'),
(6, 11, NULL, 'haha', '[]', '2022-06-19 11:29:30', '2022-06-19 11:29:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(2, 'Kimia', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(3, 'Fisika', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(4, 'Seni Budaya', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(5, 'Bahasa Inggris', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(6, 'Bahasa Indonesia', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(7, 'Bahasa Bali', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(8, 'Bahasa Jepang', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(9, 'Biologi', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(10, 'Ekonomi', '2022-06-13 18:12:12', '2022-06-13 18:12:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_04_125957_create_tasks_table', 1),
(6, '2022_05_08_125739_create_ststuses_table', 1),
(7, '2022_05_10_211322_create_mata_pelajaran_table', 1),
(8, '2022_05_21_215215_create_answers_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` tinyint(1) NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(0, 'Belum Selesai', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(1, 'Sudah Selesai', '2022-06-13 18:12:12', '2022-06-13 18:12:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `mata_pelajaran_id` bigint(20) UNSIGNED NOT NULL,
  `judul_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tugas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_tugas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline_at` datetime NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `tanggal_dikumpul` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tasks`
--

INSERT INTO `tasks` (`id`, `status_id`, `mata_pelajaran_id`, `judul_tugas`, `deskripsi_tugas`, `media_tugas`, `deadline_at`, `tanggal_dibuat`, `tanggal_dikumpul`, `created_at`, `updated_at`) VALUES
(2, 1, 10, 'Et tempora eaque.', 'Dolor vitae omnis ut sed a sed ex.', NULL, '2022-07-23 11:57:44', '2022-05-10 11:44:25', '2022-06-13 18:35:10', '2022-06-13 18:12:11', '2022-06-19 11:19:54'),
(3, 1, 10, 'Fugit tenetur occaecati.', 'Aut possimus totam soluta sint voluptates nesciunt veritatis maxime qui voluptas.', NULL, '2022-05-01 19:17:53', '2022-06-02 00:08:27', '2022-05-24 23:43:25', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(4, 1, 7, 'Sit eveniet.', 'Incidunt ab tenetur rerum ipsam esse qui quis.', NULL, '2022-05-08 09:07:16', '2022-04-23 08:54:50', '2022-04-06 08:31:59', '2022-06-13 18:12:11', '2022-06-19 11:23:59'),
(5, 1, 1, 'Consequatur unde veniam magni vitae.', 'Rem accusantium architecto non esse.', NULL, '2022-05-05 12:57:00', '2022-03-17 02:18:48', '2022-06-02 23:35:51', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(6, 1, 9, 'Placeat soluta nobis.', 'Inventore perferendis quis quo laudantium voluptatem consequuntur.', NULL, '2022-04-23 11:07:07', '2022-02-05 04:04:38', '2022-03-31 17:16:26', '2022-06-13 18:12:11', '2022-06-19 11:24:55'),
(7, 1, 6, 'Deserunt.', 'Dicta dolores perferendis impedit iure quae aut delectus.', NULL, '2022-04-14 13:17:09', '2022-02-08 06:01:47', '2022-03-25 13:18:35', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(8, 1, 8, 'Neque illum.', 'Ipsam enim modi temporibus ipsa temporibus libero vero.', NULL, '2022-05-09 14:48:45', '2022-02-01 03:31:38', '2022-04-11 01:11:46', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(9, 1, 8, 'Consequatur voluptatem cumque.', 'Itaque sed facilis maxime ut pariatur quo natus sed temporibus.', NULL, '2022-06-25 00:25:09', '2022-05-02 15:08:58', '2022-05-27 01:46:55', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(10, 1, 1, 'Eligendi quia ipsum.', 'Repellat repellendus maxime mollitia delectus vel.', NULL, '2022-05-03 22:47:25', '2022-02-06 10:22:41', '2022-05-06 15:15:44', '2022-06-13 18:12:11', '2022-06-19 11:28:05'),
(11, 1, 7, 'Rerum.', 'Doloremque debitis aut dicta culpa non vel recusandae voluptatum ipsa ut.', NULL, '2022-05-28 17:31:20', '2022-05-15 04:16:13', '2022-04-24 03:22:29', '2022-06-13 18:12:11', '2022-06-19 11:29:30'),
(12, 1, 8, 'Asperiores odit animi.', 'Voluptas et nihil vitae accusamus quia sint culpa et.', NULL, '2022-04-21 02:34:23', '2022-03-09 09:33:27', '2022-04-09 20:49:22', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(13, 1, 2, 'Qui et et.', 'Ullam perferendis nihil velit dolorem voluptatem adipisci velit et.', NULL, '2022-05-18 23:47:15', '2022-05-28 05:45:41', '2022-05-15 06:19:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(14, 0, 6, 'Ut tempore et qui.', 'Ea omnis et inventore ad voluptatibus laudantium ex est et facilis facere rerum velit.', NULL, '2022-05-17 07:06:03', '2022-04-23 00:14:17', '2022-05-11 23:27:47', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(15, 1, 9, 'Asperiores eos.', 'Porro ipsam minus soluta vel totam minima expedita sed.', NULL, '2022-04-23 22:05:37', '2022-06-04 04:09:39', '2022-06-06 03:25:24', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(16, 0, 8, 'Quia reiciendis enim.', 'Reiciendis dignissimos aliquam omnis eaque id quam eum quibusdam ipsum.', NULL, '2022-07-02 18:22:35', '2022-03-17 02:38:51', '2022-04-29 19:40:10', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(17, 0, 8, 'Nesciunt distinctio.', 'Repudiandae dolores quo ut error vitae aut molestiae.', NULL, '2022-05-22 04:18:12', '2022-02-21 11:05:34', '2022-06-04 08:41:08', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(18, 0, 6, 'Nemo dolor.', 'Veritatis quisquam doloremque a odio tenetur id et molestiae beatae tenetur.', NULL, '2022-06-29 05:46:16', '2022-01-24 17:36:51', '2022-04-06 07:10:24', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(19, 1, 10, 'Ab in.', 'Voluptatibus beatae occaecati quas et.', NULL, '2022-05-09 04:16:46', '2022-05-27 07:26:48', '2022-04-20 08:27:36', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(20, 0, 10, 'Molestiae rerum hic voluptatem.', 'Ipsum nihil vitae sequi.', NULL, '2022-07-10 23:43:53', '2022-02-19 00:16:52', '2022-04-22 02:36:57', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(21, 1, 10, 'Est voluptatem.', 'Qui a amet est voluptas autem ipsa quia eius sit.', NULL, '2022-07-12 07:16:40', '2022-03-11 20:46:23', '2022-03-26 01:05:46', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(22, 0, 8, 'Ipsum incidunt esse.', 'Consequuntur sunt quasi error architecto est quo dolores sequi aut occaecati.', NULL, '2022-07-06 03:18:43', '2022-04-10 12:46:43', '2022-04-17 22:02:01', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(23, 0, 4, 'Aliquam explicabo.', 'Rerum quia ullam illum quia sequi beatae quia voluptatem.', NULL, '2022-05-03 23:32:39', '2022-01-29 05:05:03', '2022-04-19 13:30:17', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(24, 0, 2, 'Vero.', 'Nobis porro nisi ut quod qui similique.', NULL, '2022-07-10 11:53:42', '2022-05-06 01:06:57', '2022-05-04 10:55:59', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(25, 1, 3, 'Repellendus.', 'Eius ullam maxime vel quo laudantium assumenda cupiditate et optio ipsam.', NULL, '2022-04-15 07:43:51', '2022-01-20 10:32:06', '2022-05-09 08:50:01', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(26, 1, 8, 'Sed.', 'Debitis quis voluptatem mollitia nulla repudiandae.', NULL, '2022-04-23 10:43:00', '2022-01-16 02:02:37', '2022-05-13 16:28:46', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(27, 0, 4, 'Fugiat exercitationem et.', 'Sit et id rerum magni in.', NULL, '2022-04-14 11:54:56', '2022-01-18 07:14:10', '2022-03-17 13:41:39', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(28, 0, 1, 'Omnis aspernatur magnam.', 'Id vel vitae placeat deserunt odit aliquid.', NULL, '2022-05-12 07:33:55', '2022-01-17 05:35:31', '2022-05-12 12:21:08', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(29, 0, 8, 'Neque architecto enim.', 'Consequatur ad quia nemo nam debitis nobis.', NULL, '2022-05-31 14:07:38', '2022-05-26 17:36:57', '2022-04-21 14:43:56', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(30, 1, 6, 'Magni consequuntur.', 'Consequuntur temporibus veritatis voluptatem amet voluptas nesciunt.', NULL, '2022-04-28 07:47:08', '2022-06-03 17:27:08', '2022-06-02 01:16:54', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(31, 1, 8, 'Aut eaque vitae.', 'Minus voluptate quidem iure sint odio ea illo veritatis suscipit nihil.', NULL, '2022-05-12 03:13:38', '2022-01-22 21:19:15', '2022-05-08 10:59:20', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(32, 1, 6, 'Laudantium.', 'Voluptatem dolorem et quidem autem iste.', NULL, '2022-05-25 02:32:48', '2022-03-17 07:42:42', '2022-05-21 10:00:17', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(33, 1, 3, 'Quasi.', 'Itaque commodi blanditiis suscipit voluptas ex dignissimos.', NULL, '2022-04-26 03:38:23', '2022-04-25 23:12:35', '2022-03-14 13:21:51', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(34, 0, 7, 'Natus quidem.', 'Itaque a omnis ab quam nemo voluptatem sunt quod est.', NULL, '2022-07-15 14:45:40', '2022-02-12 02:59:26', '2022-04-30 00:08:39', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(35, 0, 3, 'Quod est.', 'Quasi porro nesciunt voluptates sed magni laudantium.', NULL, '2022-06-03 03:33:29', '2022-01-14 04:02:19', '2022-06-04 07:01:35', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(36, 1, 6, 'Qui provident.', 'Quia aut voluptas impedit adipisci maxime facere.', NULL, '2022-05-20 16:15:15', '2022-01-18 11:49:58', '2022-05-19 14:37:23', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(37, 0, 5, 'Placeat modi nemo molestias.', 'Non quisquam ea quod est sed aspernatur.', NULL, '2022-04-14 20:06:22', '2022-05-27 13:21:39', '2022-03-30 00:57:41', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(38, 1, 2, 'Et adipisci.', 'Delectus tempora aut quo sit dolore culpa quis et sit enim.', NULL, '2022-05-01 09:24:52', '2022-01-18 07:38:30', '2022-03-31 11:03:18', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(39, 0, 8, 'Adipisci et.', 'Laborum totam dolor illo consectetur et reprehenderit quae officia ea vero necessitatibus.', NULL, '2022-05-05 10:44:54', '2022-01-29 11:07:20', '2022-05-02 20:45:40', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(40, 1, 7, 'Doloribus ratione.', 'Est at animi ipsam nemo cupiditate nihil fugit ullam placeat exercitationem repellat omnis.', NULL, '2022-07-08 17:09:07', '2022-03-10 02:24:06', '2022-04-04 15:56:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(41, 0, 8, 'Impedit eos sequi.', 'Nihil hic eum voluptatum modi dolores exercitationem asperiores sit suscipit corporis.', NULL, '2022-07-14 17:54:01', '2022-02-19 15:22:02', '2022-04-30 16:42:28', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(42, 0, 7, 'Voluptatum cupiditate.', 'Aut vel quia nihil ut dolores culpa itaque harum.', NULL, '2022-04-29 05:44:07', '2022-04-18 06:35:39', '2022-05-04 02:28:17', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(43, 1, 3, 'Ullam.', 'Rerum ut cumque quae eveniet totam aut.', NULL, '2022-05-15 20:25:24', '2022-05-16 23:12:04', '2022-05-08 00:16:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(44, 1, 3, 'Ipsam.', 'Voluptas et rerum occaecati reprehenderit tempore autem est commodi eum.', NULL, '2022-04-14 13:21:43', '2022-03-06 22:49:24', '2022-03-21 10:00:19', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(45, 1, 5, 'Vel.', 'Est odit dolorem sequi voluptatem deleniti voluptatem ipsa nobis.', NULL, '2022-07-19 10:02:37', '2022-02-08 11:57:52', '2022-04-15 16:09:30', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(46, 0, 7, 'Ut placeat.', 'Architecto voluptatum dolores qui autem quia.', NULL, '2022-07-12 18:17:03', '2022-05-31 01:25:47', '2022-04-10 08:05:04', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(47, 1, 7, 'Voluptas sit et accusantium laudantium.', 'Reiciendis deserunt voluptas expedita esse numquam fugit.', NULL, '2022-06-20 23:39:02', '2022-06-11 00:16:24', '2022-05-09 09:50:19', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(48, 0, 1, 'Repudiandae et.', 'Aut provident excepturi provident nesciunt non ut.', NULL, '2022-05-28 08:17:07', '2022-05-21 01:49:56', '2022-04-29 10:12:50', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(49, 1, 3, 'Et et libero.', 'Sint ab asperiores tenetur corporis mollitia expedita.', NULL, '2022-06-17 14:57:15', '2022-02-01 13:31:22', '2022-05-24 22:27:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(50, 1, 9, 'Cupiditate rerum doloremque.', 'Voluptate doloremque aliquid magni cum quod eos deserunt officia tempora laboriosam.', NULL, '2022-06-09 17:18:00', '2022-04-26 07:02:57', '2022-06-01 20:57:16', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(51, 1, 1, 'Ipsum facere fugit.', 'Dolor et vitae quibusdam omnis.', NULL, '2022-05-16 03:42:17', '2022-03-03 10:14:36', '2022-03-30 08:55:48', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(52, 1, 5, 'Voluptatem corrupti doloremque.', 'Provident blanditiis voluptate temporibus dolores nesciunt est.', NULL, '2022-06-13 08:02:55', '2022-05-25 06:40:42', '2022-04-02 08:46:33', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(53, 0, 3, 'Voluptas libero.', 'Est est aut nisi excepturi facilis aut eaque.', NULL, '2022-04-16 00:30:10', '2022-05-31 02:28:15', '2022-06-04 20:25:50', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(54, 1, 5, 'Deserunt iusto.', 'Corrupti libero molestiae aut sit dolore sed et perferendis voluptatem.', NULL, '2022-07-05 05:13:31', '2022-05-25 05:56:59', '2022-04-17 11:23:03', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(55, 1, 6, 'Saepe.', 'Rerum vel ut deleniti ullam.', NULL, '2022-06-01 19:03:49', '2022-04-20 03:08:29', '2022-03-25 21:09:14', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(56, 0, 8, 'Eos aperiam unde.', 'Aperiam nihil reiciendis ut minima nisi aspernatur dolores est reiciendis.', NULL, '2022-07-12 07:24:44', '2022-02-07 21:48:59', '2022-03-19 18:36:18', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(57, 0, 10, 'Dignissimos nihil rerum nam incidunt.', 'Inventore voluptas eaque sit quae animi consequuntur et enim.', NULL, '2022-06-10 13:38:40', '2022-03-05 10:25:51', '2022-06-02 22:32:13', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(58, 1, 2, 'Labore dolore.', 'Praesentium sint soluta aut.', NULL, '2022-07-17 11:51:14', '2022-02-11 16:03:16', '2022-03-23 06:48:06', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(59, 1, 9, 'Veniam ullam.', 'Voluptatem est quo saepe at officia consequatur itaque provident at.', NULL, '2022-04-28 07:49:14', '2022-01-14 23:37:42', '2022-05-23 19:38:08', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(60, 1, 3, 'Excepturi eum molestias.', 'Quae laudantium praesentium et rerum ut maiores.', NULL, '2022-07-12 08:14:25', '2022-01-30 21:45:36', '2022-04-25 12:18:15', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(61, 1, 9, 'Dolorem et.', 'Nesciunt tempora aliquam ut officiis iure.', NULL, '2022-06-06 00:30:09', '2022-03-18 11:19:08', '2022-04-24 06:25:44', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(62, 1, 4, 'Nesciunt odio.', 'In accusamus illo consequatur rem voluptas deleniti.', NULL, '2022-04-22 19:22:35', '2022-05-02 10:13:29', '2022-04-04 14:43:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(63, 0, 3, 'Omnis est qui cumque soluta.', 'Est iure deleniti iusto fuga consequatur qui quasi in porro rerum.', NULL, '2022-07-24 08:11:15', '2022-01-25 00:36:28', '2022-05-19 22:26:07', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(64, 1, 5, 'Aperiam aut quasi.', 'Saepe est explicabo doloremque natus ex voluptatem quos qui praesentium quis.', NULL, '2022-06-25 00:14:07', '2022-05-15 16:53:10', '2022-05-24 13:47:25', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(65, 0, 4, 'Mollitia facere.', 'Voluptatibus eius rerum consectetur voluptatem fuga odit voluptas.', NULL, '2022-06-03 06:53:25', '2022-04-10 00:02:09', '2022-03-21 07:55:02', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(66, 0, 7, 'Aliquid totam tempore.', 'Quidem iusto consequatur enim laborum.', NULL, '2022-05-22 05:38:19', '2022-03-09 20:19:58', '2022-04-22 03:33:02', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(67, 0, 6, 'Tempore nulla.', 'Facere nihil adipisci molestias culpa nesciunt excepturi maxime et magnam autem.', NULL, '2022-06-05 09:18:07', '2022-03-14 03:09:15', '2022-03-21 21:29:38', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(68, 1, 8, 'Et dolores in dolorem dolor.', 'Quidem consequatur provident temporibus deleniti unde id.', NULL, '2022-07-12 23:39:31', '2022-04-03 21:10:20', '2022-05-05 21:44:40', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(69, 0, 3, 'Sit cupiditate doloribus.', 'Tenetur ab amet sit blanditiis occaecati.', NULL, '2022-06-23 06:13:58', '2022-02-02 20:06:50', '2022-05-17 09:12:12', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(70, 0, 7, 'Consequatur porro.', 'Quis beatae voluptatem fugiat est cum quis.', NULL, '2022-05-16 20:42:51', '2022-04-23 14:24:29', '2022-04-30 15:11:06', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(71, 1, 7, 'Omnis.', 'Debitis non labore veritatis nihil molestias.', NULL, '2022-05-14 10:04:22', '2022-04-28 01:56:10', '2022-03-24 07:18:16', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(72, 1, 4, 'Ullam aliquam nihil aliquid.', 'Quae itaque vero sapiente quibusdam consequatur doloribus rerum quisquam harum alias.', NULL, '2022-07-07 11:17:54', '2022-02-06 01:53:11', '2022-06-02 02:33:13', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(73, 1, 4, 'Labore.', 'Facere corrupti fugit sed ea nulla consequatur et quo placeat sunt labore.', NULL, '2022-04-26 02:22:19', '2022-05-04 19:48:50', '2022-04-07 18:20:22', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(74, 1, 6, 'Voluptatibus.', 'Ducimus et aliquid dolorum soluta consequatur et inventore.', NULL, '2022-05-23 19:19:53', '2022-05-15 09:59:33', '2022-06-03 22:31:42', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(75, 0, 9, 'Non.', 'Voluptatem aut vero et neque aut placeat adipisci animi voluptatum nulla dolorum nemo voluptas.', NULL, '2022-05-26 13:42:27', '2022-04-23 14:19:45', '2022-05-31 04:53:31', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(76, 0, 3, 'Non consequatur quos.', 'Rem ut occaecati voluptatem dolores molestias rem.', NULL, '2022-07-09 16:53:29', '2022-05-28 03:58:52', '2022-04-21 16:05:59', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(77, 1, 3, 'Dicta est.', 'Sit a necessitatibus saepe culpa rerum illum facilis natus autem repudiandae.', NULL, '2022-04-20 19:03:55', '2022-02-23 09:52:41', '2022-05-15 23:14:47', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(78, 1, 8, 'Ut.', 'Et at eum eveniet rem quis earum eum est ut a sit qui.', NULL, '2022-06-13 03:48:27', '2022-02-26 13:34:44', '2022-04-17 15:42:59', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(79, 1, 8, 'Et adipisci dolores.', 'Perferendis eos facere nulla asperiores a.', NULL, '2022-05-16 21:40:21', '2022-06-04 21:32:23', '2022-03-16 03:46:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(80, 0, 4, 'Enim porro qui odio.', 'Molestiae voluptatem cupiditate vitae tenetur.', NULL, '2022-05-20 10:44:01', '2022-01-22 03:43:20', '2022-03-30 18:58:23', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(81, 0, 5, 'Repellat natus voluptas.', 'Est qui ducimus voluptas qui assumenda sint rerum omnis dolores.', NULL, '2022-04-17 21:46:33', '2022-03-14 05:45:27', '2022-03-26 22:11:00', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(82, 1, 1, 'Voluptas.', 'Earum odit veniam ratione ex molestias rerum natus.', NULL, '2022-07-05 03:01:49', '2022-03-19 16:13:25', '2022-05-06 14:26:34', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(83, 0, 2, 'Doloremque quisquam.', 'Exercitationem voluptatibus nemo asperiores eligendi tempora eligendi.', NULL, '2022-06-08 00:25:42', '2022-02-23 12:16:25', '2022-06-14 00:12:21', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(84, 1, 4, 'Ex ea aspernatur aliquam.', 'Et debitis fuga in placeat voluptatum ea.', NULL, '2022-05-17 16:05:52', '2022-03-13 02:46:09', '2022-04-02 09:38:53', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(85, 1, 9, 'Sit ipsa cum.', 'Saepe quibusdam tempore corporis et sed temporibus fuga.', NULL, '2022-05-18 21:27:38', '2022-03-18 11:50:22', '2022-04-19 07:19:03', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(86, 0, 6, 'Vel omnis.', 'Praesentium explicabo ad sint.', NULL, '2022-05-30 18:14:49', '2022-03-10 09:25:36', '2022-04-10 12:00:36', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(87, 0, 5, 'Enim voluptas et ut.', 'Rerum nobis laborum dolore eum sapiente.', NULL, '2022-04-26 15:45:43', '2022-01-23 14:57:42', '2022-06-03 09:18:05', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(88, 0, 2, 'Quasi animi eum.', 'Minima ad nostrum qui maxime.', NULL, '2022-05-05 20:54:27', '2022-03-17 08:44:44', '2022-05-01 23:34:08', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(89, 0, 3, 'Nemo velit et.', 'Fugiat ducimus in nihil perspiciatis et quisquam.', NULL, '2022-06-29 09:30:40', '2022-01-21 22:18:07', '2022-03-23 22:15:43', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(90, 1, 9, 'Quia in.', 'Et dolor dolore rerum et tempora temporibus non qui voluptatem.', NULL, '2022-06-25 09:51:00', '2022-06-13 01:03:06', '2022-04-05 10:30:17', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(91, 0, 4, 'Eligendi cum ut optio.', 'Molestiae dolor dolorum aperiam est recusandae quibusdam non.', NULL, '2022-06-07 13:51:10', '2022-03-10 21:43:52', '2022-03-21 23:48:35', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(92, 0, 9, 'Deserunt beatae.', 'Placeat iste ipsa ut non itaque harum dolorem eveniet eaque.', NULL, '2022-04-29 11:28:14', '2022-06-04 16:27:30', '2022-04-07 21:17:45', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(93, 1, 2, 'Nulla deserunt et.', 'Ex quia ut possimus labore beatae expedita sint natus iure et debitis.', NULL, '2022-05-31 14:58:16', '2022-03-22 13:47:48', '2022-06-07 17:55:46', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(94, 0, 2, 'Quia numquam ut sequi.', 'Deleniti quae fuga recusandae id.', NULL, '2022-06-20 14:25:15', '2022-04-20 23:37:47', '2022-04-23 11:45:22', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(95, 1, 1, 'Eveniet placeat.', 'Deleniti laborum molestias sapiente iusto ducimus omnis.', NULL, '2022-05-31 21:45:21', '2022-01-26 19:02:44', '2022-03-25 02:12:36', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(96, 0, 7, 'At aliquam.', 'Id sapiente hic rerum eos possimus.', NULL, '2022-04-17 14:00:31', '2022-06-06 13:02:37', '2022-04-23 19:03:34', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(97, 0, 7, 'Harum magni.', 'Quas aut placeat repellat ducimus reprehenderit molestiae deleniti ut.', NULL, '2022-05-21 17:33:34', '2022-02-21 01:55:24', '2022-04-28 23:58:59', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(98, 0, 10, 'Eos ipsum aut natus.', 'Odit est sed ab consequuntur soluta.', NULL, '2022-07-15 07:26:27', '2022-02-17 23:35:45', '2022-05-03 22:24:36', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(99, 1, 6, 'Aliquid natus ratione.', 'Aut odio dolor blanditiis earum officia laboriosam dolore nostrum.', NULL, '2022-07-04 12:35:30', '2022-05-12 01:33:27', '2022-06-07 02:21:55', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(100, 0, 9, 'Consequatur magni.', 'Est esse sint dolore libero ex.', NULL, '2022-05-05 12:04:20', '2022-05-26 12:17:19', '2022-04-26 04:13:14', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(101, 1, 8, 'Recusandae.', 'Qui officia sequi sit reprehenderit.', NULL, '2022-06-11 23:13:51', '2022-01-27 17:53:59', '2022-04-01 09:59:17', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(102, 1, 1, 'Minus et odit.', 'Amet quam quae quasi natus voluptatibus consectetur consectetur quisquam.', NULL, '2022-06-25 23:51:46', '2022-02-12 01:48:07', '2022-05-13 15:46:08', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(103, 0, 10, 'Dolor dolor molestiae pariatur.', 'Repudiandae autem voluptatem in sunt asperiores.', NULL, '2022-05-27 13:54:38', '2022-01-24 00:08:12', '2022-04-22 16:36:23', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(104, 0, 5, 'Quos.', 'Consequatur delectus et labore modi.', NULL, '2022-06-11 21:28:26', '2022-03-28 08:44:18', '2022-05-25 06:05:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(105, 0, 7, 'Laboriosam ipsa.', 'Corrupti voluptatem pariatur repellat aspernatur aut dolorum tempora recusandae reiciendis.', NULL, '2022-04-16 16:25:35', '2022-04-06 11:06:00', '2022-03-25 11:04:07', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(106, 0, 4, 'Qui consequatur.', 'Vel sed nisi explicabo ut mollitia.', NULL, '2022-05-10 14:43:11', '2022-01-31 09:44:14', '2022-04-13 03:30:47', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(107, 1, 9, 'Qui expedita molestiae.', 'Sint voluptatem quis omnis voluptatibus accusamus ad corporis.', NULL, '2022-06-20 22:13:45', '2022-05-05 03:08:12', '2022-03-24 14:05:46', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(108, 1, 5, 'Velit deserunt tempora.', 'Possimus ducimus non incidunt est consectetur dolor magnam ut.', NULL, '2022-06-26 12:22:08', '2022-05-14 08:33:00', '2022-05-10 07:50:53', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(109, 0, 3, 'Omnis iure voluptatum.', 'Dolor animi consectetur quod ut quidem et animi quo perferendis consectetur tempore quos sunt.', NULL, '2022-07-24 16:16:46', '2022-06-03 15:48:57', '2022-04-03 22:47:59', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(110, 0, 8, 'Incidunt ab et pariatur.', 'Labore rerum maxime at provident error neque et ipsam inventore.', NULL, '2022-04-15 15:44:23', '2022-03-26 04:57:12', '2022-04-14 11:16:48', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(111, 1, 7, 'Maxime.', 'Qui dolor incidunt qui ratione nobis ea cupiditate autem.', NULL, '2022-05-11 06:46:05', '2022-03-14 09:52:19', '2022-03-20 04:43:25', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(112, 1, 5, 'Sunt.', 'Sequi rerum ut error sed aut alias.', NULL, '2022-05-10 05:06:12', '2022-05-11 10:39:41', '2022-05-14 21:40:21', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(113, 0, 6, 'Ea aspernatur.', 'Natus sunt nihil vitae.', NULL, '2022-06-10 18:47:27', '2022-02-04 17:41:05', '2022-04-14 00:09:15', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(114, 0, 7, 'Et dicta.', 'Doloribus laboriosam aliquid nobis ullam.', NULL, '2022-04-19 23:51:29', '2022-03-30 20:43:49', '2022-06-12 07:49:17', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(115, 1, 5, 'Et repellendus et aliquam corporis.', 'Id illum facilis ut temporibus rerum.', NULL, '2022-05-25 00:25:27', '2022-01-30 02:04:18', '2022-03-27 14:16:01', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(116, 1, 4, 'In incidunt ut.', 'Cupiditate maxime voluptatibus molestias labore aut est nulla ad.', NULL, '2022-06-29 06:27:43', '2022-03-06 03:30:32', '2022-04-03 03:38:46', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(117, 0, 7, 'Voluptates quas dolores.', 'Incidunt commodi et voluptatem harum dolorem amet repellendus quibusdam debitis.', NULL, '2022-05-25 23:20:04', '2022-03-06 16:07:33', '2022-03-15 14:58:16', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(118, 1, 6, 'Officiis eaque ducimus.', 'Nihil laudantium voluptatum sit nisi voluptatem quasi saepe vero tempore.', NULL, '2022-04-27 06:17:45', '2022-04-07 02:57:29', '2022-05-06 00:58:44', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(119, 1, 10, 'Quia repudiandae autem aliquid.', 'Est aut qui aut consequatur.', NULL, '2022-06-17 03:06:53', '2022-03-02 17:02:24', '2022-04-26 00:48:27', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(120, 1, 1, 'Suscipit iste beatae.', 'Doloremque ea quo omnis repellendus quod inventore tempore a nihil dolorem.', NULL, '2022-06-13 18:27:32', '2022-02-03 06:32:49', '2022-03-26 12:42:39', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(121, 0, 5, 'Quasi.', 'Maxime hic blanditiis est.', NULL, '2022-07-08 06:18:42', '2022-02-09 15:49:38', '2022-04-27 22:20:42', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(122, 0, 10, 'Sit.', 'Qui temporibus reiciendis unde corporis illum voluptate corrupti voluptatem illum.', NULL, '2022-05-30 14:50:22', '2022-05-01 07:17:57', '2022-06-02 11:35:03', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(123, 0, 2, 'Rerum error labore.', 'Numquam dolorem quibusdam ipsa autem officia consequuntur impedit voluptatem nam modi sint.', NULL, '2022-07-21 18:59:34', '2022-03-24 04:48:14', '2022-05-23 01:50:28', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(124, 0, 3, 'Quos optio.', 'Libero minima sit et quae doloribus voluptatem rerum rerum magnam.', NULL, '2022-07-12 04:03:20', '2022-04-01 05:34:21', '2022-06-08 21:20:12', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(125, 0, 3, 'Rerum voluptates.', 'Perferendis praesentium ipsa debitis iusto perferendis earum et cum.', NULL, '2022-04-30 05:45:04', '2022-05-13 06:15:31', '2022-05-12 22:40:27', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(126, 0, 9, 'Sunt sed.', 'Itaque in amet ea ducimus minus consequatur.', NULL, '2022-05-19 00:26:51', '2022-05-26 05:53:44', '2022-04-02 21:30:12', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(127, 0, 9, 'Corrupti ea.', 'Ducimus sunt cumque aliquam possimus eum est molestias veritatis reprehenderit aut possimus accusantium distinctio et.', NULL, '2022-05-02 19:50:19', '2022-02-20 22:24:02', '2022-03-17 17:33:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(128, 1, 8, 'Eos dignissimos repudiandae.', 'Asperiores velit ea eaque inventore non iste consequatur omnis natus qui.', NULL, '2022-07-02 20:58:08', '2022-01-30 23:52:14', '2022-05-18 06:29:51', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(129, 0, 3, 'Magni nihil nisi.', 'Adipisci iure aliquam necessitatibus qui quis.', NULL, '2022-06-22 08:06:11', '2022-03-18 18:17:06', '2022-04-14 21:24:13', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(130, 0, 8, 'Nesciunt ut.', 'Dicta magni assumenda doloribus nihil nisi maxime aut libero alias voluptas maiores provident.', NULL, '2022-04-20 09:17:01', '2022-04-01 18:46:55', '2022-03-19 07:19:12', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(131, 0, 9, 'Et quidem.', 'Reiciendis voluptas omnis quas itaque fugiat consequatur dolor dolores eum corrupti.', NULL, '2022-04-22 02:57:15', '2022-04-24 11:45:37', '2022-04-07 13:52:32', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(132, 0, 2, 'Ea eveniet.', 'Aut mollitia ab dolorem harum.', NULL, '2022-05-08 18:29:37', '2022-05-19 15:01:16', '2022-05-12 22:04:26', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(133, 1, 7, 'Distinctio maxime ipsam ut.', 'Esse autem minima numquam voluptas suscipit possimus.', NULL, '2022-06-25 08:45:29', '2022-04-21 07:08:19', '2022-05-05 20:14:46', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(134, 1, 2, 'Voluptatem veniam id.', 'Eum laboriosam voluptatum rerum.', NULL, '2022-06-28 07:34:20', '2022-02-14 19:57:17', '2022-04-26 03:55:07', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(135, 1, 6, 'Mollitia quo doloremque.', 'Sit et architecto ex totam hic rerum a.', NULL, '2022-06-03 10:18:15', '2022-04-15 14:21:42', '2022-03-23 13:20:39', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(136, 1, 3, 'Enim cumque.', 'Officia et rerum provident.', NULL, '2022-06-21 00:39:23', '2022-04-11 19:46:11', '2022-06-02 15:46:07', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(137, 0, 4, 'Aperiam eveniet sit.', 'Voluptas sit incidunt perspiciatis.', NULL, '2022-05-15 17:47:38', '2022-01-26 06:36:59', '2022-04-26 06:50:24', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(138, 1, 1, 'Suscipit quidem suscipit voluptatem.', 'Ad assumenda eos deserunt aperiam quasi.', NULL, '2022-07-12 13:38:49', '2022-03-06 10:17:25', '2022-04-26 11:10:43', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(139, 0, 3, 'Similique tempora exercitationem recusandae.', 'Aperiam fuga aspernatur consequatur.', NULL, '2022-04-26 20:54:32', '2022-04-17 10:47:19', '2022-04-13 15:17:28', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(140, 0, 8, 'Dolorem corrupti.', 'Velit id culpa rerum blanditiis laboriosam qui suscipit.', NULL, '2022-06-27 01:05:31', '2022-03-22 23:54:31', '2022-04-07 13:08:05', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(141, 1, 2, 'Et non.', 'Deleniti autem unde quaerat quis veniam incidunt.', NULL, '2022-07-07 11:23:06', '2022-03-17 04:39:57', '2022-04-16 19:51:05', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(142, 1, 3, 'Dicta sit.', 'Qui sit quia eveniet ex delectus iusto distinctio.', NULL, '2022-05-08 21:28:30', '2022-02-06 23:28:44', '2022-04-19 03:16:45', '2022-06-13 18:12:11', '2022-06-13 18:12:11'),
(143, 1, 7, 'Assumenda optio.', 'Ab odit dolore omnis vel dolorem consequuntur.', NULL, '2022-05-01 13:38:00', '2022-02-02 06:43:51', '2022-05-26 02:21:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(144, 0, 10, 'Voluptatum accusamus itaque.', 'Et quia similique id ad dolores odit.', NULL, '2022-07-01 09:06:46', '2022-05-01 02:38:17', '2022-04-22 22:40:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(145, 0, 6, 'Alias.', 'Optio et sunt dicta eveniet incidunt ducimus est delectus et.', NULL, '2022-06-08 20:07:09', '2022-06-08 22:06:02', '2022-03-21 00:11:09', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(146, 1, 1, 'Rerum.', 'Ab atque sit sit deleniti ratione nam maiores at voluptatem similique explicabo.', NULL, '2022-05-13 16:17:52', '2022-04-02 04:47:16', '2022-05-03 17:33:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(147, 1, 1, 'Omnis eligendi vel.', 'Non odit aspernatur quo mollitia suscipit ipsum voluptatem.', NULL, '2022-07-17 11:51:10', '2022-04-05 23:33:13', '2022-05-05 16:35:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(148, 1, 8, 'Adipisci id qui omnis.', 'Similique labore libero porro sint harum cum.', NULL, '2022-04-14 06:57:45', '2022-04-25 00:43:12', '2022-05-16 02:00:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(149, 0, 4, 'Ut voluptate.', 'Consequatur beatae et nemo odio perspiciatis.', NULL, '2022-05-23 11:41:45', '2022-04-09 02:26:49', '2022-03-24 10:52:38', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(150, 0, 3, 'Ipsum.', 'Nostrum explicabo voluptatum aperiam harum et corporis.', NULL, '2022-06-17 05:13:01', '2022-01-18 10:09:05', '2022-05-15 09:54:25', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(151, 1, 8, 'Enim culpa.', 'Est quas placeat omnis blanditiis qui molestiae exercitationem pariatur nemo.', NULL, '2022-04-25 23:01:10', '2022-06-03 16:22:55', '2022-04-10 10:49:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(152, 0, 8, 'Ut.', 'Et qui sint quis quia totam sint ratione non ducimus omnis.', NULL, '2022-05-09 02:47:47', '2022-06-03 06:12:58', '2022-03-14 12:15:40', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(153, 0, 9, 'Sit aspernatur sapiente et.', 'Dolorum animi dolorem fugit facilis deleniti dolorum praesentium ex impedit.', NULL, '2022-04-24 14:08:48', '2022-03-19 11:57:58', '2022-05-17 17:22:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(154, 0, 2, 'Sequi at facilis officia.', 'Deleniti nulla qui aperiam voluptatem sit dolores.', NULL, '2022-07-05 14:32:29', '2022-03-14 21:44:25', '2022-05-03 10:05:46', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(155, 0, 9, 'Dolores est doloribus.', 'Aut iste est fugiat voluptatem veniam asperiores explicabo quia aut.', NULL, '2022-05-14 04:00:04', '2022-02-23 18:27:58', '2022-05-05 22:03:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(156, 0, 2, 'Aut et.', 'Fuga dolor praesentium vero voluptatem.', NULL, '2022-06-15 14:15:33', '2022-01-18 23:27:29', '2022-05-19 23:26:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(157, 1, 7, 'Maiores itaque minus nesciunt.', 'Qui aut minima amet aut aperiam natus quod.', NULL, '2022-05-11 02:21:42', '2022-02-26 10:36:02', '2022-03-23 17:24:38', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(158, 1, 7, 'Voluptatem.', 'Sint explicabo maiores et dolores aut qui et dicta.', NULL, '2022-07-18 09:48:17', '2022-06-03 07:25:38', '2022-04-12 22:32:24', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(159, 1, 6, 'Sit quis.', 'Reiciendis itaque labore earum eum commodi enim dolor enim earum omnis unde.', NULL, '2022-04-15 13:33:20', '2022-02-16 12:13:42', '2022-04-08 08:44:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(160, 0, 9, 'Cupiditate exercitationem tempora illo est.', 'Quo alias at repellendus odit rerum minima itaque.', NULL, '2022-05-19 01:30:57', '2022-02-21 19:56:34', '2022-05-29 07:18:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(161, 0, 3, 'Alias omnis.', 'Ad ut officia omnis atque sint quia aperiam.', NULL, '2022-06-27 00:04:26', '2022-06-12 02:56:27', '2022-04-18 11:57:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(162, 1, 4, 'Atque voluptate.', 'Laboriosam mollitia aliquid porro autem praesentium tempora sit voluptate qui quisquam.', NULL, '2022-07-14 09:03:28', '2022-05-22 09:39:16', '2022-04-03 08:17:06', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(163, 0, 1, 'Officia dolores.', 'Ipsum corrupti est incidunt eum dolore est.', NULL, '2022-06-18 12:35:57', '2022-03-13 07:46:33', '2022-06-05 16:20:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(164, 1, 6, 'Odio sit.', 'Eligendi quod hic necessitatibus aut dolor eveniet dolorum rerum facilis.', NULL, '2022-07-22 14:58:21', '2022-02-27 16:47:40', '2022-05-27 07:01:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(165, 1, 7, 'Molestias molestiae.', 'Ut incidunt ut placeat dolore nemo animi asperiores reiciendis quia.', NULL, '2022-04-23 13:13:14', '2022-01-25 18:13:05', '2022-03-19 10:30:18', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(166, 1, 4, 'Odit.', 'Consequatur repellat occaecati quo aut animi soluta voluptate iste.', NULL, '2022-07-22 23:14:57', '2022-03-23 21:31:12', '2022-03-16 11:49:31', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(167, 1, 8, 'Molestiae vel.', 'Debitis et nam et modi sapiente sit voluptatum ut officia.', NULL, '2022-04-21 09:58:28', '2022-03-18 15:37:29', '2022-03-14 05:29:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(168, 0, 1, 'Vitae.', 'Nesciunt et recusandae corporis veritatis voluptatem.', NULL, '2022-04-23 08:53:44', '2022-03-02 10:07:24', '2022-06-13 22:32:56', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(169, 1, 6, 'Distinctio qui.', 'Nostrum quia at odit officiis fuga quis eligendi dolorum.', NULL, '2022-04-16 15:05:27', '2022-05-17 07:38:07', '2022-04-10 10:48:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(170, 0, 10, 'Id non.', 'Recusandae aliquam quo minima.', NULL, '2022-05-23 14:48:54', '2022-03-11 10:54:44', '2022-05-22 01:46:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(171, 1, 6, 'Fuga in.', 'Quam dolores ex voluptatem iure rerum voluptate quas inventore dolor facere ullam ut.', NULL, '2022-04-16 16:43:35', '2022-06-03 09:30:31', '2022-03-15 16:14:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(172, 0, 5, 'Qui.', 'Earum vel sed sunt illo libero rerum aut omnis.', NULL, '2022-06-07 01:01:07', '2022-03-25 05:41:23', '2022-05-18 06:58:47', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(173, 0, 1, 'Est est incidunt.', 'Aut eveniet maiores ex velit est sed.', NULL, '2022-05-12 12:44:14', '2022-02-19 06:43:11', '2022-05-11 13:52:04', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(174, 1, 6, 'Et ipsam illum.', 'Laudantium velit earum saepe esse quibusdam et.', NULL, '2022-06-29 05:00:18', '2022-05-11 18:41:10', '2022-03-27 01:59:29', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(175, 1, 6, 'Labore tempore aperiam.', 'Sed recusandae possimus rerum quaerat incidunt fugit.', NULL, '2022-05-22 03:32:40', '2022-03-14 00:03:14', '2022-06-06 04:23:14', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(176, 0, 6, 'Laborum.', 'Quam sunt repellat voluptate reprehenderit quidem ut placeat in voluptatibus et et.', NULL, '2022-05-30 22:09:32', '2022-04-05 14:57:52', '2022-04-22 02:27:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(177, 0, 8, 'Molestiae iste quis quisquam.', 'Atque nihil inventore delectus aut assumenda tenetur tenetur ut omnis voluptatum ipsam.', NULL, '2022-05-28 23:37:51', '2022-04-04 15:16:55', '2022-04-20 14:14:13', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(178, 0, 5, 'Molestiae natus.', 'Et doloremque accusamus sint sed sed incidunt quo maxime beatae vel quia.', NULL, '2022-05-18 23:50:27', '2022-06-05 12:22:02', '2022-05-25 01:00:52', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(179, 1, 2, 'Quo cum dolores et.', 'Iusto voluptas voluptates ut dolorem rerum.', NULL, '2022-06-27 04:36:50', '2022-05-25 03:50:58', '2022-05-30 22:07:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(180, 0, 5, 'Iure.', 'Nobis qui rerum molestiae dolorem dolorem esse.', NULL, '2022-07-04 16:19:15', '2022-03-02 09:13:17', '2022-04-26 11:13:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(181, 1, 5, 'Aut facilis quam.', 'Sit vero earum libero et nostrum consequuntur nisi.', NULL, '2022-04-21 20:59:44', '2022-01-25 03:55:00', '2022-04-26 23:41:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(182, 0, 1, 'Maiores doloremque.', 'Quia dolores est dolorum ea officia doloribus occaecati unde.', NULL, '2022-07-24 00:34:10', '2022-02-17 15:31:07', '2022-04-24 07:00:56', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(183, 1, 5, 'Qui dolore non.', 'Est dolores cumque recusandae cumque omnis.', NULL, '2022-06-26 16:02:03', '2022-05-08 10:00:22', '2022-04-24 23:59:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(184, 1, 5, 'Suscipit a.', 'In vero quia amet modi.', NULL, '2022-06-04 11:50:22', '2022-04-18 19:02:36', '2022-04-25 22:35:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(185, 1, 7, 'Quo mollitia est.', 'Repellendus quasi omnis cupiditate exercitationem ipsam veniam temporibus.', NULL, '2022-05-29 14:50:40', '2022-02-12 01:45:39', '2022-06-07 06:07:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(186, 1, 9, 'Ratione id.', 'Enim placeat cupiditate odio omnis unde repudiandae natus maxime inventore.', NULL, '2022-06-07 00:00:36', '2022-02-07 01:19:38', '2022-05-22 21:10:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(187, 1, 8, 'Ab eius ratione velit.', 'Dolorem sed commodi qui placeat voluptatibus quo dicta repellat dolor.', NULL, '2022-07-01 20:15:36', '2022-05-11 09:06:28', '2022-04-22 12:15:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(188, 0, 6, 'Illo est.', 'Omnis sit sed et amet id.', NULL, '2022-05-25 19:36:56', '2022-04-09 23:42:40', '2022-05-17 03:00:04', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(189, 0, 2, 'Nihil.', 'Itaque rerum aut facilis id saepe quasi possimus numquam nihil culpa laboriosam.', NULL, '2022-05-05 14:45:57', '2022-03-12 13:36:29', '2022-05-30 17:37:23', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(190, 1, 1, 'Aspernatur velit voluptatem.', 'Sed corporis soluta iusto perferendis quam nobis odio voluptas reiciendis placeat quia.', NULL, '2022-07-18 10:35:27', '2022-05-15 22:01:19', '2022-06-09 13:18:30', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(191, 1, 8, 'Reiciendis consequatur.', 'Perspiciatis ipsam rerum blanditiis perspiciatis.', NULL, '2022-05-28 13:15:55', '2022-05-07 04:49:13', '2022-06-01 11:53:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(192, 0, 10, 'Odio nam.', 'Voluptatem sint dolor consequatur doloremque voluptates et voluptatem id repellat nam aut.', NULL, '2022-04-26 16:11:38', '2022-04-16 18:39:48', '2022-03-23 04:57:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(193, 0, 2, 'Neque vitae et.', 'Velit sunt ab quidem aperiam dolore.', NULL, '2022-07-17 09:00:21', '2022-03-18 23:11:57', '2022-05-28 15:51:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(194, 1, 5, 'Labore omnis.', 'Quisquam dolores repellat quos corporis ut placeat.', NULL, '2022-07-15 18:18:02', '2022-05-26 11:11:21', '2022-03-17 07:30:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(195, 0, 1, 'Optio cupiditate quia ea.', 'Modi minima necessitatibus accusantium mollitia voluptatibus sed quia magnam et reprehenderit.', NULL, '2022-07-08 07:04:18', '2022-04-05 05:42:50', '2022-04-19 11:08:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(196, 1, 4, 'Nulla est.', 'Aliquid provident hic saepe eligendi assumenda placeat nihil similique omnis est.', NULL, '2022-05-29 23:31:02', '2022-04-26 14:27:31', '2022-05-20 07:34:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(197, 0, 7, 'Veritatis rerum vero quo.', 'Praesentium consequatur ea magni est totam corporis atque.', NULL, '2022-05-21 21:28:20', '2022-03-10 00:19:50', '2022-05-20 18:49:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(198, 0, 3, 'Suscipit ipsa.', 'Quibusdam quo consequatur laudantium corporis dolor aliquam temporibus vero.', NULL, '2022-05-24 00:20:43', '2022-06-02 04:08:05', '2022-03-16 17:16:01', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(199, 1, 9, 'Officiis officiis.', 'Quisquam optio minima autem mollitia asperiores est cumque temporibus.', NULL, '2022-07-11 05:00:02', '2022-04-10 18:43:55', '2022-04-21 07:35:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(200, 1, 1, 'Consectetur dolorem.', 'Debitis hic omnis voluptatem vero aut temporibus magnam repellat et et.', NULL, '2022-06-17 19:14:01', '2022-03-04 09:36:50', '2022-03-15 02:53:43', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(201, 1, 10, 'Molestiae esse vel voluptates.', 'Eos hic aspernatur porro aut dolorum quis.', NULL, '2022-05-07 23:44:08', '2022-01-18 22:23:53', '2022-04-22 19:03:23', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(202, 0, 8, 'Architecto doloribus eaque.', 'Blanditiis eveniet in consequatur voluptas est reiciendis et error consectetur.', NULL, '2022-05-20 11:19:46', '2022-06-12 22:47:27', '2022-05-29 00:29:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(203, 0, 9, 'Qui ut ipsam.', 'Recusandae autem molestiae qui sed inventore officia dolore.', NULL, '2022-06-19 00:03:44', '2022-03-07 06:00:30', '2022-03-19 11:43:30', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(204, 1, 6, 'Adipisci deleniti.', 'Est nemo ut quo eum blanditiis dolore incidunt asperiores.', NULL, '2022-05-18 10:43:30', '2022-04-19 05:03:38', '2022-03-25 00:12:06', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(205, 0, 2, 'Minima eligendi et.', 'Voluptatem ipsa vero quisquam quia dolor ea facere accusantium voluptatem hic et et pariatur.', NULL, '2022-06-09 10:32:52', '2022-03-12 14:46:44', '2022-05-21 21:51:38', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(206, 1, 3, 'Et reprehenderit.', 'Est expedita cumque consequatur rerum ad.', NULL, '2022-07-01 08:16:32', '2022-03-31 06:36:39', '2022-04-22 23:16:33', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(207, 0, 4, 'Recusandae.', 'Voluptatem enim ipsa excepturi numquam odio porro dolorem voluptatibus illum nihil.', NULL, '2022-07-01 00:25:16', '2022-06-13 19:55:24', '2022-03-20 15:32:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(208, 1, 2, 'Incidunt est et consequuntur soluta.', 'Cum magnam laudantium dolorem eum molestias.', NULL, '2022-07-16 20:52:24', '2022-06-04 14:45:00', '2022-06-01 15:41:06', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(209, 0, 2, 'Occaecati nulla.', 'Quia alias quae suscipit ut.', NULL, '2022-06-08 13:08:09', '2022-04-24 12:18:16', '2022-03-22 14:26:39', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(210, 1, 5, 'Dolores.', 'Nesciunt unde recusandae et praesentium et molestias ut voluptatem.', NULL, '2022-07-22 11:02:53', '2022-03-23 13:45:52', '2022-05-20 11:36:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(211, 1, 4, 'Atque inventore.', 'Qui et est possimus ut minima dolores praesentium voluptates dolor.', NULL, '2022-05-27 08:30:05', '2022-02-06 16:14:20', '2022-04-19 18:45:35', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(212, 0, 8, 'Occaecati atque.', 'Sed consequatur dolorem blanditiis enim debitis.', NULL, '2022-07-11 07:27:49', '2022-03-03 11:27:22', '2022-04-07 00:07:14', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(213, 0, 10, 'Occaecati cupiditate eius.', 'Aut voluptas est quis reiciendis labore nemo reprehenderit aliquam autem rerum quidem non placeat assumenda.', NULL, '2022-07-16 15:11:51', '2022-01-29 07:10:15', '2022-04-08 07:36:04', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(214, 0, 10, 'Libero unde eaque recusandae.', 'Quis qui eveniet quaerat mollitia eos ipsa.', NULL, '2022-06-02 19:05:23', '2022-03-12 17:49:18', '2022-03-15 11:30:35', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(215, 1, 8, 'Minus.', 'Alias sit ipsa ad velit dolorem.', NULL, '2022-06-10 07:47:51', '2022-04-27 12:51:41', '2022-04-21 20:08:49', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(216, 0, 4, 'Ut.', 'Sunt asperiores deserunt dolorum est.', NULL, '2022-04-28 23:56:59', '2022-04-01 06:09:56', '2022-06-04 13:24:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(217, 1, 10, 'Quod inventore natus.', 'Non numquam et consequatur ea aut non deserunt laudantium dicta.', NULL, '2022-07-04 06:31:08', '2022-01-14 05:20:38', '2022-04-13 08:57:00', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(218, 1, 7, 'Et voluptatum eveniet.', 'Quasi perferendis reiciendis quod sit id ipsam qui.', NULL, '2022-05-31 15:22:09', '2022-02-16 19:30:03', '2022-04-01 11:48:37', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(219, 1, 8, 'Et.', 'Illum et sit dolor dolore et.', NULL, '2022-05-21 20:06:09', '2022-05-07 21:06:24', '2022-04-01 08:08:26', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(220, 1, 3, 'Rerum voluptatum dolores.', 'Et nihil nisi unde quibusdam.', NULL, '2022-07-22 06:25:22', '2022-03-08 19:46:34', '2022-06-06 12:39:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(221, 0, 2, 'Est.', 'Doloribus itaque est mollitia ipsam aperiam dolore et reiciendis iste velit dolorem.', NULL, '2022-06-08 10:38:58', '2022-04-14 05:48:47', '2022-05-01 11:55:39', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(222, 0, 3, 'Quam delectus.', 'Rerum consequatur porro tempore alias aliquid non quasi natus eveniet nemo consequatur ratione provident.', NULL, '2022-06-12 03:54:24', '2022-01-14 15:58:11', '2022-06-02 07:37:06', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(223, 0, 9, 'Ipsum sunt.', 'Et ea voluptatem ab enim.', NULL, '2022-07-01 09:28:56', '2022-01-23 04:49:06', '2022-04-12 23:00:00', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(224, 1, 4, 'Facilis inventore voluptate.', 'Est quia error corrupti et sunt id in iure.', NULL, '2022-05-25 10:55:53', '2022-05-28 15:12:20', '2022-05-14 12:39:37', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(225, 1, 9, 'Alias animi officia.', 'Aliquid unde necessitatibus id incidunt.', NULL, '2022-06-12 12:20:12', '2022-01-31 00:04:19', '2022-05-24 09:35:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(226, 0, 5, 'Veniam soluta.', 'Eum ut aut soluta at tempore libero corrupti quis corrupti.', NULL, '2022-04-23 21:56:38', '2022-03-19 00:31:10', '2022-05-22 01:46:47', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(227, 0, 4, 'Quia magnam reiciendis.', 'Unde amet sequi voluptatem placeat dolores.', NULL, '2022-05-01 18:32:50', '2022-02-22 20:34:21', '2022-04-10 05:08:25', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(228, 1, 6, 'Hic deleniti.', 'Voluptatem vel et suscipit asperiores soluta est assumenda ut.', NULL, '2022-04-19 16:26:02', '2022-02-10 01:28:33', '2022-04-15 00:05:38', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(229, 1, 10, 'Repellat non.', 'Tenetur maxime eos veritatis nesciunt cumque officia deleniti sint consequatur placeat.', NULL, '2022-07-21 21:13:18', '2022-01-21 01:00:49', '2022-05-06 04:25:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(230, 0, 10, 'Delectus eum incidunt.', 'Ducimus necessitatibus molestiae qui asperiores voluptatem magnam porro sapiente.', NULL, '2022-07-08 18:57:34', '2022-04-29 14:54:40', '2022-05-16 11:09:10', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(231, 0, 8, 'Distinctio.', 'Corrupti impedit cumque ut natus eveniet.', NULL, '2022-06-30 02:17:59', '2022-01-25 01:35:26', '2022-06-13 03:28:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(232, 1, 3, 'Est.', 'Ab et aut officiis tempore quia quis provident rerum at enim quo.', NULL, '2022-05-24 18:46:44', '2022-02-07 15:56:19', '2022-03-25 08:54:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(233, 1, 2, 'Odit.', 'Repellendus vero at mollitia fugiat dolores rerum odio quis dolorem.', NULL, '2022-07-20 22:45:29', '2022-06-02 02:44:10', '2022-05-16 01:47:08', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(234, 0, 3, 'Reprehenderit voluptatibus.', 'Iste id deserunt eligendi est velit dicta perferendis.', NULL, '2022-06-13 07:34:14', '2022-01-17 15:17:11', '2022-05-09 03:10:23', '2022-06-13 18:12:12', '2022-06-13 18:12:12');
INSERT INTO `tasks` (`id`, `status_id`, `mata_pelajaran_id`, `judul_tugas`, `deskripsi_tugas`, `media_tugas`, `deadline_at`, `tanggal_dibuat`, `tanggal_dikumpul`, `created_at`, `updated_at`) VALUES
(235, 1, 4, 'Tempora qui.', 'Inventore nisi veritatis dolorem minus ducimus soluta asperiores est quis.', NULL, '2022-05-29 11:08:09', '2022-03-07 00:10:27', '2022-03-15 04:47:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(236, 1, 9, 'Consectetur sequi reprehenderit.', 'Nisi molestiae quasi accusantium laborum blanditiis aut ex aspernatur.', NULL, '2022-04-27 23:30:44', '2022-03-17 18:08:33', '2022-04-03 10:58:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(237, 1, 4, 'Dolor consequatur error.', 'Dolor voluptas blanditiis nisi animi nulla eos possimus.', NULL, '2022-06-13 06:03:05', '2022-03-08 12:42:57', '2022-05-24 20:13:48', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(238, 0, 5, 'Expedita et ipsa.', 'Labore qui eius omnis cumque quos eaque ut dolorem assumenda velit.', NULL, '2022-07-01 11:34:35', '2022-06-04 17:23:55', '2022-06-04 02:43:01', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(239, 1, 2, 'Esse minus.', 'Veniam molestiae ullam et laboriosam quia suscipit molestiae.', NULL, '2022-04-20 20:20:51', '2022-01-20 12:52:26', '2022-03-31 03:03:44', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(240, 1, 5, 'Provident sed illum.', 'Quae sit possimus corrupti velit dolorem totam voluptatem.', NULL, '2022-07-05 03:53:57', '2022-04-13 13:41:17', '2022-05-25 08:19:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(241, 0, 8, 'Saepe est.', 'Ex aspernatur qui repudiandae ducimus pariatur facilis facere saepe.', NULL, '2022-05-02 08:36:19', '2022-02-01 17:22:54', '2022-04-12 08:01:07', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(242, 1, 4, 'Necessitatibus soluta.', 'Quibusdam possimus quaerat aspernatur nemo officia tempora voluptas ea.', NULL, '2022-06-25 18:34:21', '2022-04-21 01:46:12', '2022-04-02 13:54:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(243, 1, 2, 'Velit eveniet omnis.', 'Ratione consequuntur rem quo et facere.', NULL, '2022-06-14 05:39:31', '2022-03-08 04:08:16', '2022-03-27 00:37:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(244, 0, 7, 'Et consequuntur.', 'Architecto libero consequatur fugiat quia quisquam et id qui ullam eligendi maxime.', NULL, '2022-04-19 00:22:01', '2022-05-31 19:08:37', '2022-04-23 18:52:54', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(245, 0, 3, 'Et et.', 'Et dolores voluptas architecto facilis veritatis sunt cumque.', NULL, '2022-06-25 11:26:30', '2022-04-22 06:49:23', '2022-05-17 05:05:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(246, 1, 8, 'Quibusdam voluptas quo eaque.', 'Ab odio at ipsa at quisquam sed blanditiis vel.', NULL, '2022-07-09 10:33:14', '2022-03-24 12:30:37', '2022-06-11 00:47:56', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(247, 1, 9, 'Aliquid.', 'Maxime qui est cumque qui quia qui commodi ut cumque mollitia.', NULL, '2022-05-13 03:24:56', '2022-02-18 22:56:14', '2022-04-30 00:34:58', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(248, 0, 4, 'Nostrum animi.', 'Beatae quis amet necessitatibus et magnam error dolores exercitationem aut.', NULL, '2022-04-22 14:46:53', '2022-05-30 17:48:11', '2022-06-01 19:06:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(249, 0, 7, 'Suscipit et.', 'Debitis alias neque provident dolores odio praesentium esse modi omnis.', NULL, '2022-06-28 15:42:17', '2022-05-06 04:11:21', '2022-03-27 11:12:08', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(250, 0, 8, 'Vel commodi non laborum.', 'Sapiente voluptatem natus sed nobis vero aut.', NULL, '2022-07-12 04:08:58', '2022-03-22 09:54:08', '2022-05-29 14:50:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(251, 0, 2, 'Omnis et.', 'Nostrum architecto totam quibusdam sed blanditiis voluptatum.', NULL, '2022-05-15 11:32:58', '2022-06-12 08:24:13', '2022-03-25 17:22:43', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(252, 0, 10, 'Id.', 'Et laborum quibusdam doloribus eaque cumque tempora.', NULL, '2022-07-22 04:10:10', '2022-01-14 08:55:27', '2022-04-09 12:31:25', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(253, 0, 7, 'Est atque dolorem sit.', 'Quia modi voluptatum incidunt et magni qui.', NULL, '2022-07-03 20:13:12', '2022-02-10 01:39:54', '2022-04-02 08:43:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(254, 1, 3, 'Eaque et id.', 'Ullam omnis rem asperiores similique aut vel id necessitatibus qui.', NULL, '2022-06-26 05:05:02', '2022-02-16 14:14:51', '2022-03-20 22:34:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(255, 0, 2, 'Cum numquam quae.', 'Quia assumenda voluptatibus nostrum deserunt omnis non.', NULL, '2022-07-07 21:51:33', '2022-01-15 22:00:05', '2022-03-27 12:17:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(256, 1, 7, 'Non et.', 'Facere doloribus culpa nesciunt sunt voluptas dolores officia ducimus.', NULL, '2022-06-10 00:56:17', '2022-02-23 04:09:26', '2022-04-02 15:35:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(257, 0, 5, 'Omnis aut dolores quam eveniet.', 'Excepturi vel quis ut explicabo.', NULL, '2022-07-14 23:00:03', '2022-03-04 03:48:15', '2022-06-08 14:59:52', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(258, 1, 5, 'Consectetur.', 'Dicta explicabo vel excepturi excepturi sed.', NULL, '2022-05-27 18:45:07', '2022-03-15 20:08:02', '2022-05-02 03:57:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(259, 0, 1, 'Voluptatem.', 'Perspiciatis amet enim est perspiciatis sit itaque quo id itaque quia commodi.', NULL, '2022-07-18 12:16:47', '2022-02-22 23:20:57', '2022-03-21 21:57:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(260, 1, 5, 'Sit dicta doloremque.', 'Optio ut tempora error.', NULL, '2022-07-16 19:58:17', '2022-02-08 06:39:17', '2022-03-18 10:20:08', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(261, 1, 3, 'Tenetur iure voluptatem qui.', 'Dolorum id velit placeat sit expedita possimus.', NULL, '2022-07-10 14:24:19', '2022-03-06 11:37:50', '2022-04-01 03:09:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(262, 1, 5, 'Est quas.', 'Sed quia possimus aliquam libero et non rerum et et iste.', NULL, '2022-06-18 22:13:13', '2022-01-15 12:16:01', '2022-06-09 22:25:37', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(263, 0, 3, 'Soluta ut rerum.', 'Cumque doloribus nemo in mollitia natus ducimus dolorem.', NULL, '2022-04-23 16:35:40', '2022-02-22 20:39:11', '2022-04-29 14:05:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(264, 1, 8, 'Recusandae nemo corrupti.', 'Odit autem dolores quae atque omnis.', NULL, '2022-04-28 15:57:04', '2022-03-29 18:48:18', '2022-05-22 12:08:43', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(265, 0, 6, 'Sapiente excepturi.', 'Nam aut autem quo.', NULL, '2022-05-01 09:37:19', '2022-04-10 01:54:32', '2022-05-12 21:32:00', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(266, 0, 5, 'Est voluptas explicabo.', 'Autem voluptas et expedita ex similique facilis ut magnam.', NULL, '2022-07-14 09:26:27', '2022-04-04 07:52:49', '2022-05-14 20:27:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(267, 0, 4, 'Eius.', 'Est quia ad quidem itaque sed suscipit enim.', NULL, '2022-06-15 19:14:33', '2022-03-01 09:30:47', '2022-04-24 21:22:29', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(268, 0, 1, 'Consequatur odio quam dolores ipsa.', 'Ipsa voluptatibus ipsa totam blanditiis quia.', NULL, '2022-05-16 08:16:40', '2022-02-16 21:22:36', '2022-04-24 20:49:09', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(269, 0, 2, 'Dolores tempora est.', 'Accusantium iure ipsam sed quibusdam tempora sit non impedit.', NULL, '2022-04-20 20:42:19', '2022-03-05 03:07:19', '2022-03-30 05:24:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(270, 1, 2, 'Ut rem sit in.', 'Illum qui quibusdam qui commodi necessitatibus mollitia est voluptate et repellendus aperiam.', NULL, '2022-05-03 17:32:50', '2022-01-20 12:57:58', '2022-05-14 09:55:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(271, 1, 5, 'Labore sit minima.', 'Voluptas ea occaecati itaque laborum quo sequi et magni voluptatem.', NULL, '2022-05-06 12:48:03', '2022-03-22 10:59:26', '2022-03-28 17:23:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(272, 1, 9, 'Minima nesciunt ad blanditiis.', 'Officia dolorum in sunt.', NULL, '2022-07-23 22:35:20', '2022-01-18 18:25:48', '2022-04-16 13:37:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(273, 0, 8, 'Distinctio.', 'Enim officiis est dolorum eos iure in velit rerum magnam.', NULL, '2022-05-20 04:41:08', '2022-02-05 09:51:45', '2022-03-16 00:47:08', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(274, 0, 8, 'Aut vel quam sed.', 'Non similique consequatur laborum sed autem animi a quo qui id.', NULL, '2022-07-13 17:07:50', '2022-03-14 23:04:13', '2022-05-23 20:00:10', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(275, 0, 4, 'Repudiandae explicabo eos magnam.', 'Omnis enim nulla aperiam neque laudantium qui omnis eum ut ut.', NULL, '2022-07-19 21:51:45', '2022-06-09 08:33:51', '2022-06-04 00:00:19', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(276, 0, 3, 'Voluptas qui nesciunt ut eligendi.', 'Ut quia velit sint voluptas soluta.', NULL, '2022-06-19 09:50:15', '2022-03-26 12:02:06', '2022-04-08 03:12:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(277, 0, 9, 'Et sed unde.', 'Modi ut error minus unde.', NULL, '2022-06-20 16:47:24', '2022-06-01 01:05:05', '2022-05-29 04:56:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(278, 0, 9, 'Ut architecto.', 'Voluptatem eligendi iste fugit illum.', NULL, '2022-06-22 21:47:18', '2022-05-30 11:49:44', '2022-06-12 04:34:47', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(279, 0, 9, 'Ex eum asperiores sint.', 'Quos suscipit delectus debitis aspernatur ducimus repellat.', NULL, '2022-05-18 08:27:49', '2022-02-19 11:14:05', '2022-03-15 15:34:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(280, 1, 4, 'Voluptas repellat.', 'Dolores vitae sapiente ut ut asperiores in id occaecati nisi.', NULL, '2022-07-09 19:29:03', '2022-02-19 00:12:31', '2022-05-17 15:27:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(281, 0, 1, 'Dolor sunt.', 'Vel autem dolor ipsam labore maxime.', NULL, '2022-07-03 09:07:53', '2022-05-22 05:36:43', '2022-06-03 06:42:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(282, 1, 6, 'Officiis.', 'Quas tempore quam voluptatem.', NULL, '2022-05-03 23:10:10', '2022-04-20 16:22:12', '2022-05-03 17:16:52', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(283, 0, 7, 'Ut vero.', 'Omnis iusto qui aut quasi beatae commodi quasi corrupti eveniet officia corrupti iusto aut.', NULL, '2022-05-19 06:46:04', '2022-03-21 02:18:31', '2022-04-08 12:54:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(284, 0, 7, 'Harum ut rerum.', 'Et ut voluptatum possimus impedit ullam.', NULL, '2022-04-22 20:45:24', '2022-01-19 18:06:55', '2022-05-31 18:05:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(285, 1, 10, 'Sit sequi nulla.', 'Sapiente in ut omnis architecto eum quam nobis velit dignissimos.', NULL, '2022-06-29 04:55:13', '2022-03-27 20:38:22', '2022-04-20 06:26:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(286, 1, 9, 'Explicabo repellendus beatae.', 'Ut consequatur similique eveniet commodi delectus et molestiae.', NULL, '2022-06-27 13:28:58', '2022-05-06 03:10:30', '2022-06-11 12:48:44', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(287, 1, 2, 'Molestiae officiis minus.', 'Sunt cupiditate est eos vel assumenda.', NULL, '2022-04-28 01:05:34', '2022-05-29 14:40:17', '2022-05-17 23:21:29', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(288, 0, 6, 'Id neque.', 'Ullam quis commodi aut qui dolorem qui sunt.', NULL, '2022-05-26 23:09:16', '2022-02-04 04:17:23', '2022-04-01 03:58:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(289, 0, 10, 'Recusandae et cumque.', 'Ea deserunt ex totam a delectus.', NULL, '2022-05-25 15:15:24', '2022-01-28 23:54:03', '2022-05-05 17:59:46', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(290, 0, 4, 'Eos commodi ut.', 'Necessitatibus eveniet eos nemo.', NULL, '2022-05-10 12:32:00', '2022-04-18 05:17:24', '2022-04-16 21:27:24', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(291, 0, 6, 'Commodi sapiente in.', 'Dolorum et quas ipsum libero officiis quia praesentium exercitationem error autem autem.', NULL, '2022-05-12 18:33:42', '2022-06-11 06:40:18', '2022-03-15 16:15:47', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(292, 1, 3, 'Similique enim nostrum.', 'Aut aperiam omnis et deleniti.', NULL, '2022-06-26 05:41:31', '2022-05-26 00:21:54', '2022-04-28 06:45:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(293, 1, 7, 'Deleniti corrupti quae.', 'Aut accusamus aspernatur et ab.', NULL, '2022-05-01 15:11:29', '2022-03-22 16:33:06', '2022-04-11 20:14:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(294, 0, 10, 'Dolorum ipsum.', 'Est repudiandae tempore velit.', NULL, '2022-04-20 17:26:51', '2022-04-16 01:00:32', '2022-04-02 07:57:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(295, 0, 6, 'Sed minus ratione.', 'Nostrum facilis temporibus vel incidunt est totam vero quasi neque ut esse cupiditate.', NULL, '2022-06-18 15:53:11', '2022-05-20 17:48:51', '2022-05-25 18:16:05', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(296, 0, 1, 'Qui fugiat.', 'Corrupti eligendi expedita explicabo ipsam praesentium adipisci.', NULL, '2022-07-08 21:37:53', '2022-03-11 09:15:41', '2022-03-23 18:24:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(297, 1, 4, 'Sed et laudantium.', 'Velit aliquid nemo aliquam aliquam dolorum sit at et.', NULL, '2022-07-01 11:15:52', '2022-04-12 12:35:45', '2022-05-17 09:40:37', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(298, 0, 2, 'Quia.', 'Consequatur cupiditate qui perspiciatis nihil recusandae sint.', NULL, '2022-07-14 23:21:09', '2022-05-04 23:44:58', '2022-05-06 09:52:11', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(299, 1, 7, 'Vitae beatae nulla.', 'Sed sapiente sunt hic nostrum et esse earum esse dolorem qui dolores dicta.', NULL, '2022-06-03 19:31:46', '2022-02-27 16:22:39', '2022-04-12 14:12:41', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(300, 1, 1, 'Magni occaecati.', 'Labore sint corporis velit ex in eaque quo et.', NULL, '2022-06-08 20:26:21', '2022-05-14 10:56:54', '2022-04-25 23:25:26', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(301, 0, 3, 'Quibusdam temporibus omnis est.', 'Earum et illo voluptatem quidem temporibus ex soluta.', NULL, '2022-04-25 17:58:23', '2022-06-03 07:17:03', '2022-03-24 05:52:52', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(302, 1, 2, 'Voluptate voluptas.', 'Ea beatae eaque distinctio quis laudantium omnis.', NULL, '2022-07-07 04:14:08', '2022-01-15 07:23:00', '2022-03-30 21:18:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(303, 0, 4, 'Dolor velit.', 'Temporibus alias qui sint veniam dolor quis et commodi rerum et autem maxime magni.', NULL, '2022-05-16 09:05:54', '2022-04-24 01:21:51', '2022-05-02 07:24:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(304, 1, 1, 'Quidem ipsum explicabo.', 'Et ipsum ut et quam occaecati.', NULL, '2022-07-23 10:38:55', '2022-01-24 16:31:18', '2022-04-28 02:43:55', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(305, 0, 8, 'Et molestiae nihil ea.', 'Est ipsa asperiores adipisci voluptatem harum consequatur asperiores et.', NULL, '2022-06-30 06:26:18', '2022-03-29 18:16:49', '2022-04-11 00:32:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(306, 0, 6, 'Cum corporis saepe sit.', 'Ut esse omnis saepe et.', NULL, '2022-06-16 11:43:58', '2022-02-08 16:41:57', '2022-05-04 07:54:41', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(307, 0, 10, 'Aut minus blanditiis.', 'Mollitia accusamus aut consequuntur ut.', NULL, '2022-04-18 10:05:11', '2022-03-10 13:45:58', '2022-05-27 03:43:19', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(308, 1, 2, 'Sed tempore deleniti unde.', 'Qui tempore pariatur cumque ipsam.', NULL, '2022-04-17 19:15:35', '2022-03-26 02:49:16', '2022-03-23 03:39:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(309, 1, 3, 'Ad voluptatem quod.', 'Impedit rerum rem debitis consectetur corrupti voluptatibus occaecati quia praesentium labore.', NULL, '2022-05-19 06:36:47', '2022-05-19 04:42:07', '2022-05-22 00:55:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(310, 0, 3, 'Voluptate tenetur vel odio.', 'Est harum ea in doloribus voluptatibus neque consectetur quod consequatur ex.', NULL, '2022-05-05 23:34:52', '2022-02-15 21:32:39', '2022-05-04 00:37:58', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(311, 0, 9, 'Qui.', 'Consequatur ut rem qui voluptatem.', NULL, '2022-06-02 00:52:37', '2022-05-20 23:50:36', '2022-03-20 17:37:37', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(312, 1, 1, 'Animi omnis odio.', 'Eveniet est numquam consequuntur.', NULL, '2022-05-03 12:23:25', '2022-04-04 04:07:34', '2022-04-22 00:11:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(313, 1, 1, 'Quis.', 'Consequatur esse dolorem dolores dolorem porro odio assumenda.', NULL, '2022-05-15 21:40:29', '2022-02-13 05:01:16', '2022-05-11 00:58:28', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(314, 0, 6, 'Quam enim est.', 'Quos voluptates mollitia et.', NULL, '2022-05-02 00:15:14', '2022-01-17 04:59:27', '2022-04-20 07:04:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(315, 0, 3, 'Mollitia consequuntur eos.', 'Veniam veritatis inventore ut voluptatum quia.', NULL, '2022-06-06 08:46:27', '2022-03-09 00:03:55', '2022-05-29 03:59:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(316, 0, 9, 'Sed quas officia.', 'Voluptatem illum et et qui at.', NULL, '2022-04-24 23:31:37', '2022-05-09 03:07:16', '2022-03-25 06:25:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(317, 1, 9, 'Atque atque.', 'Suscipit tenetur minima rerum aliquam odit natus et culpa.', NULL, '2022-07-10 00:51:03', '2022-04-05 18:34:17', '2022-05-22 17:59:10', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(318, 0, 4, 'Non modi.', 'Ipsum ipsum quia sapiente qui deleniti ullam alias aut accusamus est illo.', NULL, '2022-04-25 08:00:53', '2022-03-13 00:51:31', '2022-05-12 15:04:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(319, 0, 1, 'Qui non.', 'Necessitatibus soluta eos minima.', NULL, '2022-05-26 05:10:07', '2022-06-10 06:29:43', '2022-05-09 03:34:48', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(320, 1, 3, 'Sed fugit omnis.', 'Voluptas autem explicabo sunt voluptatem.', NULL, '2022-06-22 08:41:35', '2022-06-05 17:27:08', '2022-06-10 05:46:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(321, 1, 4, 'Tenetur doloribus occaecati nihil.', 'Facilis cupiditate corporis provident dicta.', NULL, '2022-05-08 15:36:57', '2022-04-06 07:58:24', '2022-03-31 05:33:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(322, 1, 3, 'Aperiam.', 'Pariatur sint quia occaecati iure laboriosam excepturi porro ad consequatur.', NULL, '2022-06-26 19:47:01', '2022-04-30 12:35:41', '2022-04-19 09:30:11', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(323, 0, 7, 'Consectetur dolores.', 'Alias et facilis aut recusandae illo tenetur.', NULL, '2022-06-14 03:34:35', '2022-03-07 12:12:46', '2022-04-19 17:43:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(324, 1, 6, 'Voluptates quas.', 'Omnis rerum laboriosam nemo aut consectetur fugiat.', NULL, '2022-07-21 06:34:48', '2022-05-29 00:28:37', '2022-05-11 15:20:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(325, 1, 3, 'Unde quibusdam delectus.', 'Voluptatum excepturi reprehenderit quo aliquid commodi dolores.', NULL, '2022-07-11 04:04:10', '2022-02-17 17:55:39', '2022-06-11 20:33:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(326, 1, 2, 'Asperiores aperiam.', 'Velit inventore quis quia cupiditate ex voluptatem quis quisquam et qui.', NULL, '2022-05-11 09:52:26', '2022-02-14 22:21:25', '2022-04-13 10:14:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(327, 0, 1, 'Ab libero sit necessitatibus at.', 'Nemo ut itaque possimus animi ipsa rerum debitis sed maxime et beatae enim.', NULL, '2022-07-18 05:28:11', '2022-05-06 08:11:01', '2022-06-07 13:48:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(328, 1, 2, 'Aut.', 'Vel quidem vitae sit voluptatem illum magnam maiores.', NULL, '2022-06-22 21:34:57', '2022-03-22 22:10:39', '2022-05-26 13:07:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(329, 0, 8, 'Culpa animi.', 'Ex distinctio doloremque totam et ratione voluptatem omnis.', NULL, '2022-05-16 20:04:37', '2022-03-15 13:01:10', '2022-03-17 03:47:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(330, 0, 9, 'Non distinctio.', 'Rerum asperiores nostrum alias et quia aliquid.', NULL, '2022-05-20 06:37:47', '2022-05-18 04:08:14', '2022-04-23 03:41:58', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(331, 0, 10, 'Et optio.', 'Ut et ut in assumenda rerum animi ut quis quia et accusamus.', NULL, '2022-04-16 19:35:23', '2022-04-19 07:28:48', '2022-06-13 20:42:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(332, 1, 4, 'Esse quae molestiae.', 'Facere aliquam vero et et ducimus nobis nobis rerum.', NULL, '2022-06-29 00:50:17', '2022-03-07 22:41:12', '2022-03-23 18:24:26', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(333, 0, 1, 'Rerum enim.', 'Eos et omnis aut vel esse et consectetur et.', NULL, '2022-04-18 00:12:14', '2022-05-16 04:43:41', '2022-06-02 04:35:41', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(334, 0, 1, 'Rerum et.', 'Omnis officia impedit doloribus corporis fugiat autem molestias voluptate voluptatem dignissimos.', NULL, '2022-07-24 21:35:14', '2022-06-10 19:58:20', '2022-04-09 15:04:32', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(335, 1, 7, 'Et at veniam.', 'Voluptas voluptatem voluptatem magnam quia ipsam saepe libero architecto sint sapiente et doloribus totam.', NULL, '2022-04-17 03:55:09', '2022-02-20 04:21:19', '2022-03-15 23:57:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(336, 0, 9, 'Fugiat qui impedit.', 'Quia commodi quidem placeat in fugit aut.', NULL, '2022-06-03 09:41:20', '2022-05-24 10:26:57', '2022-04-29 16:54:32', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(337, 0, 9, 'Aut.', 'Unde et sunt architecto beatae.', NULL, '2022-05-13 10:13:37', '2022-05-26 16:21:49', '2022-06-09 23:51:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(338, 0, 7, 'Fugiat natus.', 'Iusto reprehenderit sed praesentium impedit ea nihil aut quo ea assumenda.', NULL, '2022-07-24 17:32:59', '2022-01-27 06:13:40', '2022-04-11 14:32:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(339, 1, 8, 'Illo perspiciatis est sunt.', 'Officia cupiditate aliquid eum placeat.', NULL, '2022-05-28 03:12:59', '2022-01-27 01:40:12', '2022-06-09 08:31:25', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(340, 0, 6, 'Vitae.', 'Et in delectus quia ut voluptatem provident.', NULL, '2022-07-11 00:59:09', '2022-04-03 06:31:29', '2022-06-11 04:48:39', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(341, 0, 9, 'Facere.', 'Qui unde qui adipisci magni adipisci.', NULL, '2022-05-27 04:33:00', '2022-01-18 21:57:55', '2022-04-29 10:05:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(342, 1, 9, 'Officia quia qui.', 'Est deleniti et sed ex deleniti beatae dolorem aut.', NULL, '2022-06-29 23:14:19', '2022-05-26 10:03:05', '2022-03-18 21:41:31', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(343, 0, 4, 'Maxime quisquam assumenda.', 'Aliquam in id et aut.', NULL, '2022-05-13 05:50:24', '2022-03-27 11:59:27', '2022-03-21 03:57:29', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(344, 1, 2, 'Quod.', 'Tenetur ut sed vel dolores fugiat dignissimos iste voluptates ut.', NULL, '2022-07-13 07:37:42', '2022-04-17 08:13:08', '2022-04-23 20:12:55', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(345, 0, 7, 'Ea sit.', 'Eius culpa eaque magnam incidunt corporis doloremque vitae.', NULL, '2022-07-19 04:06:04', '2022-01-31 01:07:12', '2022-05-05 10:26:24', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(346, 1, 1, 'Amet perferendis est.', 'Repudiandae ea sed molestias id et.', NULL, '2022-04-26 14:37:00', '2022-05-05 06:05:17', '2022-06-05 16:32:19', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(347, 1, 9, 'Quidem totam.', 'Dolores occaecati et nostrum aperiam explicabo aut enim et.', NULL, '2022-05-05 21:49:04', '2022-03-11 21:50:07', '2022-04-11 10:42:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(348, 1, 4, 'Minima est reprehenderit.', 'Modi et velit vero qui quia ipsum quas aliquid culpa numquam voluptatum dolores incidunt.', NULL, '2022-04-21 09:31:35', '2022-04-15 09:44:06', '2022-05-09 19:50:24', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(349, 0, 8, 'Et rerum.', 'Est aut recusandae consequatur nihil adipisci aliquam dolor aliquam.', NULL, '2022-06-07 09:16:58', '2022-02-04 11:43:57', '2022-04-07 06:23:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(350, 0, 3, 'Omnis beatae.', 'Voluptatum consectetur veritatis consequatur aliquid facere culpa dolores.', NULL, '2022-07-13 05:04:14', '2022-04-01 08:19:46', '2022-05-12 20:38:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(351, 0, 4, 'Cumque corrupti incidunt.', 'Id atque est excepturi sint ut.', NULL, '2022-05-17 04:51:58', '2022-04-08 11:53:39', '2022-04-17 15:26:32', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(352, 0, 3, 'Amet.', 'Culpa ipsam sint qui saepe sint est temporibus.', NULL, '2022-07-16 17:57:05', '2022-04-09 11:49:58', '2022-03-24 21:55:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(353, 1, 8, 'Ducimus error.', 'Quod eos eaque ipsum quaerat consectetur ullam commodi quia facere rerum unde.', NULL, '2022-06-30 06:29:26', '2022-02-14 20:28:30', '2022-05-11 21:44:54', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(354, 0, 4, 'Error recusandae.', 'Ratione eius quod adipisci dolores et dolorem.', NULL, '2022-04-30 12:07:20', '2022-05-06 17:32:26', '2022-04-16 20:34:47', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(355, 1, 4, 'Cumque ipsum.', 'Consequuntur possimus accusantium aperiam labore.', NULL, '2022-07-02 17:47:46', '2022-01-14 22:48:39', '2022-05-02 21:47:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(356, 1, 2, 'Tenetur corrupti.', 'Ut distinctio esse rem est.', NULL, '2022-06-12 17:24:46', '2022-03-30 23:14:34', '2022-03-15 22:06:49', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(357, 0, 8, 'Ipsa et.', 'Aut ut quos non cum officiis voluptas.', NULL, '2022-05-22 16:12:30', '2022-02-27 03:16:13', '2022-04-25 09:45:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(358, 0, 2, 'Consequatur nulla.', 'Debitis quisquam ut sunt ipsam labore.', NULL, '2022-05-05 23:30:48', '2022-02-20 16:06:34', '2022-05-21 04:32:49', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(359, 0, 10, 'Quam qui minus.', 'Aut nemo culpa excepturi corporis beatae nemo eaque eius est.', NULL, '2022-07-21 15:11:43', '2022-03-13 11:01:30', '2022-03-16 06:40:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(360, 1, 10, 'Laudantium dicta.', 'Ad quas dignissimos amet cumque quo dolore blanditiis eum neque ea.', NULL, '2022-04-16 14:23:11', '2022-01-20 17:07:23', '2022-04-05 08:29:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(361, 0, 7, 'Deserunt.', 'Fugiat provident eius molestiae facere eaque ipsum sed.', NULL, '2022-06-24 13:48:50', '2022-01-26 23:03:12', '2022-04-02 00:04:26', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(362, 1, 2, 'Qui tempora eius.', 'Voluptatem id aliquam eos est voluptatem.', NULL, '2022-06-18 17:49:57', '2022-04-10 01:40:49', '2022-04-27 03:34:52', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(363, 0, 7, 'Necessitatibus dolores inventore.', 'Delectus maiores omnis quos dicta voluptatem sint numquam.', NULL, '2022-06-08 01:12:08', '2022-04-24 07:46:17', '2022-06-10 06:48:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(364, 1, 5, 'Necessitatibus delectus.', 'Eaque culpa id nisi temporibus explicabo tempore dolorem tenetur.', NULL, '2022-05-04 07:25:25', '2022-02-13 07:08:23', '2022-03-30 09:32:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(365, 1, 8, 'Sapiente blanditiis.', 'Ut facere quis facere qui id hic laboriosam.', NULL, '2022-06-17 02:39:23', '2022-04-20 08:59:36', '2022-03-21 05:20:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(366, 0, 1, 'Quidem voluptas.', 'Vel est omnis laboriosam maxime adipisci quo.', NULL, '2022-04-19 03:53:19', '2022-03-05 07:31:05', '2022-03-27 17:53:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(367, 0, 1, 'Earum autem.', 'Non nostrum eaque eaque.', NULL, '2022-05-19 01:23:02', '2022-02-14 13:16:46', '2022-05-25 12:32:38', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(368, 0, 8, 'Et ullam sunt.', 'Cum aliquid aperiam quas sit adipisci quas a aut.', NULL, '2022-06-23 14:04:16', '2022-01-29 16:03:19', '2022-06-03 17:55:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(369, 1, 2, 'Illo corporis aut molestiae nulla.', 'Et commodi qui eligendi et pariatur.', NULL, '2022-05-31 04:26:36', '2022-03-21 20:24:39', '2022-04-03 16:08:47', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(370, 1, 2, 'Voluptatem incidunt omnis.', 'Quia nulla pariatur vel error et aliquam sequi est.', NULL, '2022-05-11 02:46:56', '2022-04-08 07:29:48', '2022-03-17 01:28:11', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(371, 1, 2, 'Facilis.', 'Odit ut rerum eaque voluptas qui aperiam optio nisi adipisci sint totam.', NULL, '2022-06-19 03:07:04', '2022-03-23 06:14:09', '2022-03-27 05:14:19', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(372, 0, 10, 'Qui et.', 'Quas aut quis quibusdam eligendi eos.', NULL, '2022-05-09 14:20:31', '2022-04-13 03:39:25', '2022-05-07 16:48:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(373, 1, 1, 'Et eius dolor.', 'Qui eum accusamus incidunt numquam explicabo ratione aut voluptatibus repellat quia.', NULL, '2022-04-24 11:33:23', '2022-04-07 01:53:22', '2022-03-18 03:54:54', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(374, 0, 3, 'Sapiente corporis ab.', 'Odio cupiditate sed aut.', NULL, '2022-04-27 05:58:25', '2022-04-15 20:22:22', '2022-04-22 11:47:10', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(375, 0, 4, 'Pariatur debitis occaecati deserunt.', 'Quae vel dolorem atque voluptates ut inventore ab ipsam molestiae sint eveniet.', NULL, '2022-06-14 17:26:03', '2022-01-30 16:35:07', '2022-04-13 06:48:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(376, 1, 4, 'Ab.', 'Labore consequatur facere velit placeat rem porro placeat voluptatem nulla cumque distinctio voluptatum.', NULL, '2022-05-08 05:38:13', '2022-04-09 07:34:12', '2022-06-01 15:15:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(377, 1, 7, 'Est natus velit.', 'Nemo praesentium quia aspernatur modi maiores perferendis.', NULL, '2022-06-27 11:36:40', '2022-03-19 08:23:45', '2022-06-12 22:43:37', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(378, 0, 5, 'Et.', 'Incidunt unde saepe neque odit nostrum.', NULL, '2022-06-21 16:28:01', '2022-02-07 05:21:51', '2022-03-29 15:27:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(379, 0, 6, 'Exercitationem cumque officia.', 'Perferendis ullam ea nihil.', NULL, '2022-06-21 18:42:21', '2022-04-29 03:43:47', '2022-05-26 06:38:28', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(380, 1, 2, 'Qui nobis.', 'Ipsum molestias veniam praesentium qui debitis.', NULL, '2022-07-15 13:32:52', '2022-02-11 12:03:04', '2022-03-18 22:40:54', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(381, 0, 10, 'Dolores est molestias.', 'Sit est tempora itaque quisquam repellendus et.', NULL, '2022-05-07 12:40:49', '2022-01-31 15:36:31', '2022-05-17 05:30:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(382, 1, 4, 'Eos illo praesentium.', 'Dolorum culpa cupiditate eos neque nostrum est tenetur ut.', NULL, '2022-05-28 04:15:03', '2022-01-30 00:08:34', '2022-03-31 03:01:46', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(383, 1, 4, 'Asperiores dolores suscipit.', 'Est aut rerum numquam et consequatur et sint deserunt.', NULL, '2022-07-06 10:28:43', '2022-02-03 17:14:33', '2022-06-09 11:58:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(384, 1, 9, 'Ut ut.', 'Nulla repudiandae ut nostrum est ut.', NULL, '2022-07-06 20:41:06', '2022-02-19 19:49:21', '2022-05-17 14:44:34', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(385, 0, 8, 'Aliquid.', 'Neque autem maiores eos aut magnam vero.', NULL, '2022-07-06 09:32:06', '2022-01-15 02:25:16', '2022-03-19 02:50:04', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(386, 0, 1, 'Libero et atque.', 'Dolor et provident dicta non rerum saepe aut accusantium quis libero voluptatum.', NULL, '2022-05-17 20:37:46', '2022-06-04 13:28:26', '2022-04-12 21:42:00', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(387, 0, 1, 'Quis quaerat.', 'Rerum magnam quasi qui ut molestiae qui earum necessitatibus officia natus minima facere velit.', NULL, '2022-07-14 22:00:22', '2022-05-07 09:30:27', '2022-04-11 11:57:14', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(388, 1, 3, 'Alias iusto nemo.', 'Tempora dolorem in ipsam temporibus voluptatum aperiam pariatur sunt.', NULL, '2022-06-23 14:47:42', '2022-04-17 21:50:15', '2022-03-25 07:39:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(389, 0, 3, 'Et ducimus eum.', 'Officia asperiores eos libero et est qui enim amet mollitia laboriosam molestiae.', NULL, '2022-05-28 09:16:43', '2022-02-13 22:54:19', '2022-03-22 09:23:15', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(390, 0, 7, 'Quo voluptas.', 'Dolor sit sint enim vel.', NULL, '2022-04-15 14:36:47', '2022-03-04 07:00:46', '2022-05-26 08:42:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(391, 1, 3, 'Corrupti molestias consequatur.', 'Ullam ut voluptatum dolor facilis itaque qui iure.', NULL, '2022-05-12 16:35:02', '2022-02-24 08:49:04', '2022-05-20 00:09:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(392, 1, 5, 'Ipsa numquam eligendi.', 'Quia unde rem rerum et voluptatem eius provident nihil aliquid.', NULL, '2022-05-26 01:06:17', '2022-05-04 15:08:23', '2022-04-22 22:48:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(393, 1, 8, 'Expedita est veritatis reprehenderit possimus.', 'Enim distinctio quia in illo voluptatem id nobis ratione expedita.', NULL, '2022-05-16 09:14:51', '2022-04-06 17:51:57', '2022-05-27 09:27:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(394, 1, 6, 'Neque dicta sint.', 'Laborum eveniet quis distinctio ullam similique autem nihil nemo.', NULL, '2022-06-17 06:29:44', '2022-05-09 08:39:39', '2022-06-03 21:09:56', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(395, 1, 7, 'Rem blanditiis.', 'Blanditiis et incidunt ut cupiditate tenetur assumenda voluptates reprehenderit.', NULL, '2022-06-14 00:55:26', '2022-04-13 16:34:46', '2022-04-17 18:42:19', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(396, 0, 8, 'Delectus magni.', 'Sequi cum qui rerum vel consequatur sed.', NULL, '2022-05-12 05:03:11', '2022-06-13 03:49:24', '2022-04-01 15:35:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(397, 1, 5, 'Id perferendis.', 'Voluptatem quis cupiditate iure recusandae ea debitis.', NULL, '2022-07-17 07:55:50', '2022-04-07 23:35:21', '2022-05-31 22:14:55', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(398, 1, 9, 'Impedit officiis iste.', 'Quis quia sed possimus cupiditate consectetur saepe est quia.', NULL, '2022-07-15 06:46:52', '2022-06-07 00:54:07', '2022-04-22 10:54:13', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(399, 0, 7, 'Expedita non culpa.', 'Officiis deserunt ut vel dignissimos ab dicta sit totam cupiditate laudantium perferendis necessitatibus.', NULL, '2022-07-23 22:29:32', '2022-03-29 21:55:48', '2022-06-04 19:54:49', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(400, 1, 10, 'Eos nobis minus.', 'Et aut sed porro maxime.', NULL, '2022-04-15 13:22:25', '2022-05-08 06:37:34', '2022-05-18 01:15:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(401, 1, 10, 'Laboriosam autem perspiciatis architecto.', 'Id et fugiat sed qui quo.', NULL, '2022-04-26 10:13:59', '2022-04-10 20:48:44', '2022-05-23 01:42:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(402, 1, 4, 'Voluptatem nulla.', 'Expedita dolores eius aut dolorem mollitia distinctio sit qui.', NULL, '2022-05-06 05:40:51', '2022-05-06 11:54:51', '2022-05-14 16:10:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(403, 0, 6, 'Dolore.', 'Distinctio aut voluptates modi dolores ut accusamus ex eos eum nesciunt.', NULL, '2022-05-15 23:13:30', '2022-01-18 22:54:14', '2022-05-21 10:41:09', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(404, 0, 1, 'Omnis eius.', 'Assumenda dolores perferendis tenetur sed consequatur.', NULL, '2022-05-18 02:11:38', '2022-05-13 12:16:42', '2022-03-27 17:49:07', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(405, 0, 7, 'Et iste.', 'Et voluptate blanditiis maxime dolores eveniet eveniet vero est ut.', NULL, '2022-05-07 22:09:41', '2022-02-21 21:56:44', '2022-05-08 14:48:48', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(406, 1, 7, 'Ut.', 'Ut occaecati nemo nemo natus sint.', NULL, '2022-06-16 10:25:09', '2022-04-11 20:32:50', '2022-05-20 07:43:39', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(407, 0, 2, 'Occaecati est reiciendis.', 'Sunt provident aliquam perferendis numquam harum ipsam.', NULL, '2022-07-14 03:00:48', '2022-03-19 15:21:03', '2022-04-21 19:40:19', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(408, 0, 2, 'Sint et reiciendis commodi.', 'Est quis reprehenderit quia nostrum qui quo.', NULL, '2022-05-07 01:15:30', '2022-05-12 12:09:58', '2022-04-04 22:56:30', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(409, 1, 8, 'Non voluptates.', 'Odit tempora sit quaerat consequatur.', NULL, '2022-04-21 08:21:41', '2022-04-02 14:43:16', '2022-04-28 20:36:11', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(410, 1, 6, 'Corporis.', 'Optio aut sit est sit modi.', NULL, '2022-05-25 13:10:24', '2022-01-26 08:45:20', '2022-04-07 00:13:09', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(411, 1, 1, 'Molestiae aliquam beatae.', 'Et suscipit et mollitia quidem qui.', NULL, '2022-07-23 23:39:57', '2022-02-17 11:51:11', '2022-03-27 05:12:56', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(412, 1, 6, 'Maxime quia.', 'Autem rerum alias deserunt tenetur animi est harum.', NULL, '2022-04-17 09:28:03', '2022-01-24 11:29:36', '2022-04-14 10:00:05', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(413, 1, 3, 'Quaerat odio.', 'Enim harum qui ducimus laudantium et ratione iste.', NULL, '2022-06-14 09:50:16', '2022-02-10 12:26:01', '2022-06-11 05:12:54', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(414, 0, 9, 'Sint suscipit.', 'Expedita impedit impedit est in sed et adipisci qui eos velit repellendus.', NULL, '2022-04-27 09:09:08', '2022-04-11 04:24:43', '2022-03-28 19:06:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(415, 0, 6, 'A molestiae.', 'Dicta illum sunt molestiae eum cumque error molestias quo neque temporibus.', NULL, '2022-06-23 09:04:37', '2022-05-30 13:23:35', '2022-05-09 15:51:55', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(416, 0, 1, 'Dolor.', 'Asperiores nulla in libero qui accusantium nobis nulla vero possimus illo autem.', NULL, '2022-06-21 22:40:15', '2022-04-02 13:01:02', '2022-05-02 11:02:43', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(417, 0, 8, 'Ipsam eos.', 'Facilis dignissimos in ut eos molestiae aliquam omnis.', NULL, '2022-04-24 11:11:10', '2022-05-04 00:03:07', '2022-04-23 02:50:29', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(418, 0, 6, 'Sapiente aut.', 'Nam corrupti nulla aliquam.', NULL, '2022-04-17 01:42:45', '2022-02-17 11:16:10', '2022-04-22 01:32:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(419, 1, 5, 'Exercitationem sunt voluptatem.', 'Ullam nemo dolore sunt est recusandae adipisci ratione fuga.', NULL, '2022-06-15 07:50:19', '2022-02-18 11:16:50', '2022-05-10 11:11:00', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(420, 1, 7, 'Odio omnis nam.', 'Mollitia eius nobis corporis tempora officia et consequatur facere dolores omnis dolore sed iusto.', NULL, '2022-04-22 17:17:09', '2022-05-11 14:26:22', '2022-04-23 16:42:23', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(421, 1, 10, 'Fugiat aliquid nobis.', 'Sit nostrum est dolor ipsum.', NULL, '2022-06-06 06:02:58', '2022-06-10 12:25:08', '2022-05-09 22:06:52', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(422, 0, 3, 'Est eum quidem.', 'Minus ab et enim eum et et aliquid voluptas ex.', NULL, '2022-04-20 19:32:25', '2022-02-21 01:30:05', '2022-04-18 02:13:00', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(423, 0, 8, 'Nobis.', 'Illum sint ut error maxime fuga et quaerat molestiae qui.', NULL, '2022-05-13 03:48:16', '2022-05-13 11:25:57', '2022-04-04 23:21:26', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(424, 1, 8, 'Possimus.', 'Ratione molestiae minus veniam et cumque.', NULL, '2022-07-13 00:12:33', '2022-02-12 14:04:46', '2022-06-09 13:07:58', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(425, 0, 6, 'Accusamus aut dicta.', 'Iste laborum dolor odit iure recusandae dignissimos.', NULL, '2022-06-13 04:33:22', '2022-05-13 14:09:34', '2022-05-17 16:04:05', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(426, 0, 3, 'Nisi dignissimos quibusdam.', 'Impedit hic consequuntur quia repellat.', NULL, '2022-05-14 10:11:34', '2022-01-15 19:07:16', '2022-04-08 12:39:23', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(427, 1, 5, 'Quas est.', 'Necessitatibus laborum optio quae quidem velit aut necessitatibus quae.', NULL, '2022-06-29 02:46:56', '2022-03-04 07:09:30', '2022-05-12 22:47:54', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(428, 1, 10, 'Rerum voluptatibus quos.', 'Aut maxime nostrum dolor quia ipsum quo.', NULL, '2022-07-08 00:29:02', '2022-05-30 03:18:48', '2022-05-27 03:02:13', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(429, 0, 10, 'Sunt nulla modi perspiciatis.', 'Vero et enim nihil voluptas veritatis eum blanditiis et.', NULL, '2022-07-01 05:31:14', '2022-04-05 06:32:40', '2022-04-10 13:00:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(430, 0, 4, 'Optio corrupti est tempora.', 'Qui ratione deserunt animi nihil nulla exercitationem vel.', NULL, '2022-07-09 15:11:22', '2022-01-19 09:41:15', '2022-05-13 03:57:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(431, 1, 3, 'Delectus nobis odit.', 'Et impedit minima quo ea nihil est.', NULL, '2022-07-10 02:31:18', '2022-02-20 19:40:30', '2022-05-28 11:37:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(432, 0, 10, 'Non veniam molestiae.', 'Consequatur eligendi harum illo excepturi eos veritatis nihil id.', NULL, '2022-06-21 12:10:41', '2022-02-13 07:02:31', '2022-03-24 06:21:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(433, 0, 10, 'Consequatur voluptatibus possimus.', 'Neque aut et incidunt doloribus quia debitis ut.', NULL, '2022-07-22 14:08:53', '2022-03-13 08:12:57', '2022-04-13 00:58:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(434, 0, 4, 'Quas atque.', 'Pariatur explicabo quis corporis nihil nihil perspiciatis.', NULL, '2022-06-10 09:43:04', '2022-04-04 18:15:26', '2022-05-08 12:17:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(435, 0, 8, 'Aut qui molestiae dolorem.', 'Est voluptas quos animi quidem voluptatem odio aut qui nihil aut consectetur.', NULL, '2022-04-25 08:13:11', '2022-05-25 20:40:48', '2022-05-15 18:05:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(436, 0, 2, 'Dolorem.', 'Enim quisquam molestias ut dolor neque non.', NULL, '2022-07-13 19:02:07', '2022-04-16 09:13:21', '2022-03-26 04:20:13', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(437, 0, 10, 'Quo.', 'Dolore reiciendis delectus iusto et.', NULL, '2022-04-25 18:36:07', '2022-04-04 20:42:33', '2022-05-18 07:13:11', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(438, 1, 3, 'Maiores expedita.', 'Optio dolor accusantium molestias doloribus ut voluptatem a optio odio.', NULL, '2022-05-15 17:36:26', '2022-02-25 10:43:14', '2022-04-09 17:44:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(439, 0, 5, 'Vitae.', 'Consequuntur eius voluptas quos saepe odit quas error.', NULL, '2022-05-01 03:19:46', '2022-03-27 09:36:32', '2022-04-21 20:46:14', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(440, 1, 7, 'Tempore aliquam.', 'Eveniet quo voluptatum est at harum ratione.', NULL, '2022-07-14 17:32:08', '2022-01-20 22:19:45', '2022-04-13 20:16:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(441, 1, 2, 'Occaecati sit eos.', 'Deserunt sit ullam aliquid eum.', NULL, '2022-06-29 11:30:17', '2022-05-03 21:05:10', '2022-04-14 00:18:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(442, 0, 3, 'Est animi eligendi vel adipisci.', 'Vero quod et possimus eligendi qui officiis.', NULL, '2022-04-21 07:37:24', '2022-05-18 12:21:25', '2022-05-17 06:12:07', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(443, 1, 10, 'Qui odio quisquam.', 'Dolor dolore commodi repudiandae sequi molestiae et ut repellendus ut.', NULL, '2022-05-02 00:16:42', '2022-05-17 01:15:19', '2022-05-15 12:20:06', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(444, 0, 2, 'Molestiae sed.', 'Aspernatur eveniet hic est occaecati odio nihil sequi.', NULL, '2022-06-21 21:21:58', '2022-03-24 07:01:01', '2022-05-20 01:42:40', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(445, 0, 2, 'Ea rerum ipsa.', 'Accusamus nostrum amet non culpa officiis.', NULL, '2022-04-23 11:57:45', '2022-01-20 06:45:02', '2022-04-30 16:08:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(446, 1, 4, 'Esse enim.', 'Saepe cum quidem est culpa.', NULL, '2022-05-24 21:39:31', '2022-03-01 23:11:51', '2022-03-14 05:32:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(447, 0, 5, 'Asperiores quia ea.', 'Velit est maiores vel qui sed ut.', NULL, '2022-05-31 22:33:54', '2022-06-04 00:21:05', '2022-05-09 22:51:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(448, 1, 6, 'Vel necessitatibus.', 'Similique assumenda aut ut voluptatem dolores saepe fuga soluta quisquam rerum.', NULL, '2022-06-04 04:48:21', '2022-05-25 02:12:59', '2022-04-17 06:39:37', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(449, 0, 7, 'Enim doloribus minus.', 'Qui inventore repudiandae quae voluptatem optio.', NULL, '2022-04-28 19:56:04', '2022-04-04 23:23:51', '2022-04-08 13:54:21', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(450, 0, 8, 'Amet et.', 'Omnis in aspernatur porro porro in suscipit est.', NULL, '2022-06-19 05:14:40', '2022-05-17 23:10:38', '2022-03-20 17:29:57', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(451, 1, 5, 'Incidunt atque.', 'Nihil est alias omnis quidem impedit nesciunt quia quam natus provident itaque aliquid vel.', NULL, '2022-06-20 22:47:58', '2022-06-02 01:20:35', '2022-04-08 17:39:38', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(452, 1, 5, 'Quod hic voluptas.', 'Dolorum est qui optio a in.', NULL, '2022-06-05 01:33:52', '2022-05-30 17:23:16', '2022-05-05 01:13:49', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(453, 1, 1, 'Praesentium sunt.', 'Quaerat omnis eligendi quia inventore maxime eum dolores esse.', NULL, '2022-04-30 10:04:21', '2022-03-12 01:44:35', '2022-04-13 22:26:55', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(454, 1, 8, 'Sed.', 'Fugit cupiditate nostrum repellendus excepturi et eveniet enim corrupti dolorem.', NULL, '2022-07-03 14:19:03', '2022-02-15 08:39:50', '2022-05-15 15:05:50', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(455, 1, 5, 'Iusto molestias.', 'Rerum impedit eos nesciunt debitis omnis accusantium unde.', NULL, '2022-06-04 15:21:52', '2022-03-28 09:04:57', '2022-03-27 04:10:38', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(456, 0, 5, 'Optio.', 'Porro suscipit excepturi repudiandae laboriosam commodi eaque accusamus ut.', NULL, '2022-05-04 02:26:10', '2022-03-17 14:56:29', '2022-05-06 05:20:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(457, 0, 9, 'Occaecati.', 'Atque debitis ut dolores in.', NULL, '2022-06-14 20:49:19', '2022-03-03 09:21:08', '2022-05-04 19:11:46', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(458, 0, 5, 'Mollitia vel.', 'Est omnis deleniti dolores repellendus rerum omnis qui.', NULL, '2022-06-24 23:15:16', '2022-02-06 05:40:39', '2022-03-21 13:40:45', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(459, 0, 5, 'Rerum.', 'Sint et consequatur assumenda.', NULL, '2022-07-02 02:05:16', '2022-04-24 11:33:19', '2022-06-07 13:57:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(460, 0, 8, 'Totam impedit commodi.', 'Velit esse consequatur quisquam non dolorum et unde officiis recusandae atque quaerat accusamus.', NULL, '2022-05-05 08:35:18', '2022-01-18 12:47:34', '2022-04-02 21:15:01', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(461, 0, 10, 'Nostrum.', 'Id vero illo mollitia ipsum nostrum delectus alias neque.', NULL, '2022-07-02 13:29:41', '2022-02-12 03:03:34', '2022-05-07 13:57:48', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(462, 0, 4, 'Dicta quo aut impedit qui.', 'Reiciendis sit et consequatur est vero aliquid eum eos.', NULL, '2022-07-08 03:32:54', '2022-04-22 20:52:30', '2022-05-18 07:22:14', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(463, 0, 9, 'Dignissimos nam.', 'Et blanditiis sed et harum reiciendis qui repellat excepturi voluptate quisquam quisquam.', NULL, '2022-05-27 08:04:29', '2022-01-25 15:53:44', '2022-04-13 07:58:05', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(464, 1, 3, 'Facilis dolores.', 'Natus libero est temporibus cum molestiae deserunt aliquam.', NULL, '2022-04-30 06:18:24', '2022-02-21 15:36:57', '2022-06-03 00:25:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(465, 1, 10, 'In unde.', 'Et et at quis corrupti occaecati exercitationem quia consequuntur nesciunt.', NULL, '2022-05-25 04:05:22', '2022-03-31 16:29:07', '2022-04-27 16:27:53', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(466, 1, 9, 'Rerum consequatur quia.', 'Ratione omnis consequuntur voluptatem qui.', NULL, '2022-06-07 02:10:27', '2022-03-25 03:14:09', '2022-03-14 12:34:16', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(467, 0, 4, 'Omnis beatae deleniti.', 'Dolorum sequi autem aperiam voluptas labore aspernatur.', NULL, '2022-05-15 00:00:59', '2022-01-22 16:54:19', '2022-05-27 18:22:36', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(468, 1, 6, 'Harum eos autem.', 'Eveniet earum quidem nulla exercitationem atque libero autem.', NULL, '2022-04-30 21:59:22', '2022-04-16 23:27:33', '2022-03-23 07:59:33', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(469, 0, 2, 'Eos ducimus assumenda.', 'Ratione error sapiente neque laborum voluptas harum.', NULL, '2022-05-05 05:00:47', '2022-05-25 04:50:04', '2022-05-29 11:41:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12');
INSERT INTO `tasks` (`id`, `status_id`, `mata_pelajaran_id`, `judul_tugas`, `deskripsi_tugas`, `media_tugas`, `deadline_at`, `tanggal_dibuat`, `tanggal_dikumpul`, `created_at`, `updated_at`) VALUES
(470, 0, 8, 'Necessitatibus repellat aperiam.', 'Consequatur id eius quo qui qui esse repellat beatae dolore.', NULL, '2022-04-16 22:24:37', '2022-03-14 05:29:03', '2022-06-03 23:34:07', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(471, 1, 8, 'Ipsum illum.', 'Nobis aliquam et illum quia eligendi a.', NULL, '2022-07-14 09:39:35', '2022-06-03 06:34:20', '2022-03-17 17:44:24', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(472, 0, 2, 'Distinctio.', 'Voluptatem quibusdam quo porro autem totam qui iste numquam ipsum molestias necessitatibus similique corporis.', NULL, '2022-05-23 19:26:06', '2022-05-01 16:04:27', '2022-04-06 21:22:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(473, 1, 3, 'Voluptas.', 'Distinctio doloribus sint aut quis sed vel aliquam cum exercitationem.', NULL, '2022-05-18 13:57:01', '2022-05-09 11:24:43', '2022-05-31 17:38:25', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(474, 1, 7, 'Neque neque enim.', 'Optio excepturi iure sunt minima magni.', NULL, '2022-05-23 14:15:40', '2022-02-17 20:31:33', '2022-04-26 15:53:12', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(475, 1, 10, 'Hic omnis vero.', 'Sapiente laborum non qui modi.', NULL, '2022-04-14 10:36:49', '2022-02-11 18:23:51', '2022-05-05 22:45:19', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(476, 1, 10, 'Eveniet tempora.', 'Omnis et fugit eos sed sint.', NULL, '2022-07-02 14:26:04', '2022-05-01 21:09:54', '2022-04-25 02:16:49', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(477, 0, 9, 'Natus ipsam.', 'Nobis sint eveniet quas magnam exercitationem eligendi consequatur earum ut.', NULL, '2022-04-28 19:43:40', '2022-02-28 00:09:01', '2022-04-25 18:08:59', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(478, 1, 1, 'Ab sunt quod.', 'Aut porro aut dolores.', NULL, '2022-06-13 05:08:35', '2022-05-01 10:25:58', '2022-04-19 09:02:35', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(479, 0, 3, 'Est est itaque.', 'In dolorem corrupti natus et id quae rerum.', NULL, '2022-06-03 20:17:20', '2022-04-17 13:31:33', '2022-03-29 05:09:22', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(480, 1, 7, 'Officia ipsam.', 'Repellendus atque quia iste et.', NULL, '2022-06-16 07:50:54', '2022-06-02 19:29:03', '2022-04-08 14:57:39', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(481, 0, 5, 'Enim tempora distinctio sed deleniti.', 'Dolorum facere voluptas omnis ipsa voluptatibus sunt aut et fuga.', NULL, '2022-05-02 19:39:04', '2022-04-20 00:45:03', '2022-04-27 20:07:00', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(482, 0, 9, 'Est.', 'Est provident unde sit vel dolores qui voluptatem saepe laboriosam.', NULL, '2022-04-29 12:22:40', '2022-05-22 21:40:25', '2022-03-30 18:23:29', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(483, 1, 4, 'Rerum nemo.', 'Rerum impedit ex architecto explicabo repellat iusto.', NULL, '2022-07-24 10:02:04', '2022-05-17 06:02:06', '2022-04-02 11:43:58', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(484, 0, 4, 'Doloremque voluptatem eaque sint.', 'Quisquam eligendi nisi pariatur suscipit ipsum ut aspernatur dignissimos est.', NULL, '2022-06-25 08:01:41', '2022-02-22 17:44:29', '2022-05-21 00:23:27', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(485, 0, 7, 'Eveniet vero sed explicabo.', 'Officia repellat corrupti alias sapiente consequatur ad.', NULL, '2022-07-02 21:44:41', '2022-03-10 14:54:33', '2022-04-02 11:01:44', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(486, 0, 2, 'Molestiae nihil.', 'Qui occaecati quo tempora libero quo fuga rem illo.', NULL, '2022-06-16 18:38:47', '2022-02-10 02:06:15', '2022-05-15 23:45:24', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(487, 0, 1, 'Quo laboriosam nemo.', 'Sapiente cumque sapiente ut perferendis quia quae.', NULL, '2022-06-27 01:31:49', '2022-05-04 20:16:14', '2022-03-24 05:43:32', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(488, 0, 4, 'Molestias culpa veniam.', 'Odio quos aut sunt itaque dignissimos aut voluptatum nobis placeat mollitia dicta deleniti provident.', NULL, '2022-05-13 08:57:37', '2022-06-05 16:44:34', '2022-03-25 16:07:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(489, 0, 5, 'Magni dicta ea et impedit.', 'Id atque aliquid occaecati quo.', NULL, '2022-05-19 13:08:51', '2022-03-20 01:47:54', '2022-05-14 13:55:02', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(490, 1, 4, 'Rerum.', 'Ducimus placeat quis nisi mollitia dignissimos exercitationem fuga dolor sit consectetur et.', NULL, '2022-06-04 18:35:32', '2022-01-15 04:03:14', '2022-03-17 16:45:05', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(491, 1, 7, 'Et amet.', 'Et eius minus aliquid iusto aliquam officia totam explicabo.', NULL, '2022-07-01 14:11:05', '2022-03-15 06:18:03', '2022-05-11 15:08:25', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(492, 1, 2, 'Recusandae quo.', 'Ea asperiores ut aut et magnam doloremque et non porro doloremque.', NULL, '2022-07-10 08:30:53', '2022-02-28 16:49:56', '2022-06-02 04:06:24', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(493, 0, 4, 'Nihil odit velit.', 'Magnam suscipit qui rerum aut veniam quaerat.', NULL, '2022-04-27 08:14:40', '2022-03-31 10:12:23', '2022-04-18 09:35:42', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(494, 1, 9, 'Blanditiis asperiores quis.', 'Corporis eos nam aspernatur mollitia error accusantium pariatur earum sit.', NULL, '2022-06-03 23:45:12', '2022-04-02 12:54:51', '2022-03-15 16:36:03', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(495, 1, 1, 'Eaque saepe assumenda et.', 'Dolorem et dolores quis ducimus fuga saepe.', NULL, '2022-06-13 09:07:59', '2022-03-03 05:38:31', '2022-04-08 09:09:17', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(496, 1, 10, 'Ipsum suscipit.', 'Labore accusantium expedita sit aut omnis soluta numquam.', NULL, '2022-04-20 16:39:11', '2022-02-26 22:47:29', '2022-05-06 17:06:51', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(497, 1, 2, 'Quidem aspernatur.', 'Sunt excepturi voluptates sapiente.', NULL, '2022-05-28 13:07:54', '2022-04-24 00:43:51', '2022-05-20 12:51:05', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(498, 1, 8, 'Ad.', 'Eligendi qui inventore voluptas nisi iste velit optio soluta voluptatum nihil voluptatem dolorem.', NULL, '2022-05-08 03:10:24', '2022-02-08 00:38:24', '2022-04-15 17:50:26', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(499, 1, 5, 'Repudiandae incidunt.', 'Iusto facilis consequatur autem.', NULL, '2022-04-24 16:21:25', '2022-02-21 10:22:17', '2022-06-14 01:47:20', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(500, 1, 3, 'Quia possimus consequatur.', 'Non veniam commodi maxime in delectus et dicta.', NULL, '2022-05-10 15:18:13', '2022-05-09 14:41:01', '2022-04-03 14:41:31', '2022-06-13 18:12:12', '2022-06-13 18:12:12'),
(501, 1, 1, 'hello world', 'hello world adalah kata pertama yang di cetak bila akan belajar pemrograman', '[\"934_stephen.jpg\"]', '2022-06-21 19:14:00', '2022-06-19 19:17:34', '2022-06-19 19:17:34', '2022-06-19 11:16:12', '2022-06-19 11:18:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answers_id_task_unique` (`id_task`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
