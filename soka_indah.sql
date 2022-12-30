-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2022 pada 05.37
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soka_indah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penilaian`
--

CREATE TABLE `detail_penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `id_lingkup` int(11) DEFAULT NULL,
  `id_kd_indikator` int(11) DEFAULT NULL,
  `id_indikator` int(11) DEFAULT NULL,
  `ceklis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anekdot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_karya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_penilaian`
--

INSERT INTO `detail_penilaian` (`id`, `id_penilaian`, `id_lingkup`, `id_kd_indikator`, `id_indikator`, `ceklis`, `anekdot`, `hasil_karya`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, 'BSH', 'BSH', 'BSH', NULL, NULL),
(2, 1, 2, 2, 3, 'BB', 'BB', 'BB', NULL, NULL),
(4, 2, 1, 1, 1, 'BSH', 'BSH', 'BSH', NULL, NULL),
(5, 3, 2, 2, 3, 'BSB', 'BSB', 'BSB', NULL, NULL),
(6, 3, 1, 1, 1, 'MB', 'MB', 'MB', NULL, NULL),
(7, 4, 1, 3, 5, 'BSB', 'BSB', 'BSB', NULL, NULL),
(8, 1, 3, 4, 8, 'BSB', 'BSB', 'BSB', NULL, NULL),
(9, 5, 1, 1, 2, 'BSH', 'BSH', 'BSB', NULL, NULL),
(10, 6, 1, 1, 1, 'BB', 'MB', NULL, NULL, NULL),
(12, 8, 6, 6, 12, 'BSH', 'BSH', 'BSB', NULL, NULL),
(13, 8, 1, 1, 2, 'BSH', 'MB', 'MB', NULL, NULL),
(14, 9, 1, 1, 2, 'BSH', 'BSH', 'MB', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_tumbuh_kembang`
--

CREATE TABLE `evaluasi_tumbuh_kembang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_master_evaluasi_tumbuh_kembang` int(11) NOT NULL,
  `b` tinyint(4) NOT NULL DEFAULT 0,
  `c` tinyint(4) NOT NULL DEFAULT 0,
  `k` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `evaluasi_tumbuh_kembang`
--

INSERT INTO `evaluasi_tumbuh_kembang` (`id`, `id_siswa`, `id_master_evaluasi_tumbuh_kembang`, `b`, `c`, `k`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 0, 1, 0, NULL, NULL),
(2, 12, 2, 0, 1, 0, NULL, NULL),
(3, 12, 3, 0, 1, 0, NULL, NULL),
(4, 12, 5, 0, 1, 0, NULL, NULL),
(5, 12, 6, 0, 1, 0, NULL, NULL),
(6, 12, 7, 0, 1, 0, NULL, NULL),
(7, 12, 4, 0, 0, 1, NULL, NULL),
(8, 14, 1, 0, 1, 0, NULL, NULL),
(9, 14, 3, 0, 1, 0, NULL, NULL),
(10, 14, 4, 0, 1, 0, NULL, NULL),
(11, 14, 5, 0, 1, 0, NULL, NULL),
(12, 14, 6, 0, 1, 0, NULL, NULL),
(13, 14, 7, 0, 1, 0, NULL, NULL),
(14, 14, 2, 0, 0, 1, NULL, NULL),
(15, 1, 1, 1, 0, 0, NULL, NULL),
(16, 1, 6, 1, 0, 0, NULL, NULL),
(17, 1, 7, 1, 0, 0, NULL, NULL),
(18, 1, 2, 0, 1, 0, NULL, NULL),
(19, 1, 3, 0, 1, 0, NULL, NULL),
(20, 1, 4, 0, 1, 0, NULL, NULL),
(21, 1, 5, 0, 1, 0, NULL, NULL);

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
-- Struktur dari tabel `indikator`
--

CREATE TABLE `indikator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kd_indikator` int(11) NOT NULL,
  `nama_indikator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`id`, `id_kd_indikator`, `nama_indikator`, `created_at`, `updated_at`) VALUES
(1, 1, 'wudhu', NULL, NULL),
(2, 1, 'niat', NULL, NULL),
(3, 2, 'Menendang', NULL, NULL),
(4, 2, 'Menangkap', NULL, NULL),
(5, 3, 'Bacaan', NULL, NULL),
(6, 3, 'Kasroh', NULL, NULL),
(7, 3, 'Tajwid', NULL, NULL),
(8, 4, 'Mengelompokkan binatang kesayangan', NULL, NULL),
(9, 5, 'Membaca', NULL, NULL),
(10, 5, 'Menulis', NULL, NULL),
(11, 5, 'Mendengar', NULL, NULL),
(12, 6, 'Mewarnai', NULL, NULL),
(13, 6, 'Menggambar Garis', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_indikator`
--

CREATE TABLE `kd_indikator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `id_lingkup` int(11) NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kd_indikator`
--

INSERT INTO `kd_indikator` (`id`, `id_kelompok`, `id_lingkup`, `kode`, `nama_kd`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', 'Sholat', '2022-07-24 23:27:11', '2022-07-24 23:27:11'),
(2, 1, 2, '2', 'Bermain Bola', '2022-07-24 23:28:25', '2022-07-24 23:28:25'),
(3, 1, 1, '3.0', 'Hafalan Surat Pendek', '2022-07-26 01:25:08', '2022-07-26 01:25:08'),
(4, 1, 3, '2.3', 'Memiliki perilaku yang mencerminkan sikap kreatif', '2022-07-30 01:46:19', '2022-07-30 01:46:19'),
(5, 1, 4, '4.7', 'Mengenal nama hewan', '2022-08-03 21:52:59', '2022-08-03 21:52:59'),
(6, 4, 6, '4.6', 'Menggambar Rumah', '2022-08-04 02:10:34', '2022-08-04 02:10:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lingkup`
--

CREATE TABLE `lingkup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lingkup`
--

INSERT INTO `lingkup` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Nilai Agama dan Moral', '2022-07-24 23:22:55', '2022-07-24 23:22:55'),
(2, 'Fisik Motorik', '2022-07-24 23:22:55', '2022-07-24 23:22:55'),
(3, 'Kognitif', '2022-07-24 23:22:55', '2022-07-24 23:22:55'),
(4, 'Bahasa', '2022-07-24 23:22:55', '2022-07-24 23:22:55'),
(5, 'Sosial Emosional', '2022-07-24 23:22:55', '2022-07-24 23:22:55'),
(6, 'Seni', '2022-07-24 23:22:55', '2022-07-24 23:22:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mains`
--

CREATE TABLE `mains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_evaluasi_tumbuh_kembang`
--

CREATE TABLE `master_evaluasi_tumbuh_kembang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_evaluasi_tumbuh_kembang`
--

INSERT INTO `master_evaluasi_tumbuh_kembang` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Perkembangan Fisik', '2022-07-24 23:22:51', '2022-07-24 23:22:51'),
(2, 'Pengelihatan', '2022-07-24 23:22:51', '2022-07-24 23:22:51'),
(3, 'Pendengaran', '2022-07-24 23:22:51', '2022-07-24 23:22:51'),
(4, 'Kesehatan', '2022-07-24 23:22:51', '2022-07-24 23:22:51'),
(5, 'Kebersihan', '2022-07-24 23:22:51', '2022-07-24 23:22:51'),
(6, 'Kerapihan', '2022-07-24 23:22:51', '2022-07-24 23:22:51'),
(7, 'Keamanan', '2022-07-24 23:22:51', '2022-07-24 23:22:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_gurus`
--

CREATE TABLE `master_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kelompok`
--

CREATE TABLE `master_kelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelompok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok_umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_kelompok`
--

INSERT INTO `master_kelompok` (`id`, `nama_kelompok`, `kelompok_umur`, `wali_kelas`, `created_at`, `updated_at`) VALUES
(1, 'Kelas A', '4- 5 Tahun', 'Hj. Badriah', '2022-07-24 23:24:43', '2022-07-24 23:24:43'),
(4, 'Kelas B', '5 - 6 Tahun', 'Zubaedah', '2022-08-04 02:08:41', '2022-08-04 02:08:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kelompok_detail`
--

CREATE TABLE `master_kelompok_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_kelompok_detail`
--

INSERT INTO `master_kelompok_detail` (`id`, `id_kelompok`, `id_siswa`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 7, NULL, NULL),
(3, 3, 12, NULL, NULL),
(4, 4, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pendidikan_karakter`
--

CREATE TABLE `master_pendidikan_karakter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_pendidikan_karakter`
--

INSERT INTO `master_pendidikan_karakter` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Cinta tuhan dan segenap ciptaannya', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(2, 'Jujur', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(3, 'Toleran', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(4, 'Disiplin', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(5, 'Amanah', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(6, 'Kreatif', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(7, 'Mandiri', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(8, 'Berkata bijak', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(9, 'Rasa ingin tahu', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(10, 'Hormat dan santun', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(11, 'Pantang menyerah', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(12, 'Kerjasama', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(13, 'Percaya diri', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(14, 'Pemimpin yang baik dan adil', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(15, 'Baik dan rendah hati', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(16, 'Dermawan', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(17, 'Tanggung jawab', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(18, 'Cinta damai dan bersatu', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(19, 'Gemar membaca', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(20, 'Peduli lingkungan', '2022-07-24 23:22:35', '2022-07-24 23:22:35'),
(21, 'Cinta tanah air', '2022-07-24 23:22:35', '2022-07-24 23:22:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_pengguna`
--

CREATE TABLE `master_pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aktif','Non Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_pengguna`
--

INSERT INTO `master_pengguna` (`id`, `id_user`, `nama`, `email`, `telp`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 'Hj. Badriah', 'badriah@gmail.com', 234546, 'Jl. pahlawan', 'Aktif', '2022-08-03 21:31:28', '2022-08-03 21:31:28'),
(4, 7, 'Zubaedah', 'zubaedah@gmail.com', 234546, 'Jl. Balongan', 'Aktif', '2022-08-04 02:06:34', '2022-08-04 02:06:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_siswa`
--

CREATE TABLE `master_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `status` enum('Aktif','Non Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_siswa`
--

INSERT INTO `master_siswa` (`id`, `id_kelompok`, `nama`, `nama_panggilan`, `no_induk`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `anak_ke`, `tanggal_diterima`, `status`, `nama_wali`, `pekerjaan_wali`, `no_telp`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fiony', 'Fio', '2345654', '1970-01-01', 'Perempuan', 'Islam', '1', '1970-01-01', 'Aktif', 'Jaka', 'Presiden', '0235678', 'Jl. Pande', NULL, '2022-07-24 23:25:47', '2022-07-24 23:25:47'),
(7, 1, 'Raynego', 'Ipin', '12345', '2022-05-06', 'Laki - Laki', 'Islam', '2', '2022-05-02', 'Aktif', 'Jaka', 'Wiraswata', '0235678', 'Jl. Pande', NULL, '2022-07-26 00:41:05', '2022-07-26 00:41:05'),
(14, 1, 'Faisal Basri', 'Faisal', '12345', '2022-08-04', 'Laki - Laki', 'Islam', '2', '2022-08-04', 'Aktif', 'Tarwadi', 'Wiraswata', '0235678', 'Jl. Pahlawan Lemah Mekar Indramayu', NULL, '2022-08-04 02:03:53', '2022-08-04 02:03:53'),
(16, 1, 'Maulana', 'Ipin', '123', '2022-12-27', 'Laki - Laki', 'Islam', '2', '2022-12-27', 'Aktif', 'Jaka', 'Wiraswata', '0235678', 'Jl. Golf', NULL, '2022-12-26 21:32:43', '2022-12-26 21:32:43');

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
(5, '2022_04_05_184059_create_mains_table', 1),
(6, '2022_04_12_054838_create_profiles_table', 1),
(7, '2022_04_14_054436_create_master_siswas_table', 1),
(8, '2022_04_17_140755_create_master_gurus_table', 1),
(9, '2022_04_17_142704_create_master_penggunas_table', 1),
(10, '2022_04_17_152222_create_master_kelompoks_table', 1),
(11, '2022_04_17_153158_master_kelompok_detail', 1),
(12, '2022_04_19_134003_create_k_d_indikators_table', 1),
(13, '2022_04_19_134341_lingkup', 1),
(14, '2022_04_19_164714_indikator', 1),
(15, '2022_04_28_165158_create_master_pendidikan_karakters_table', 1),
(16, '2022_05_05_054231_create_pendidikan_karakters_table', 1),
(17, '2022_05_05_070709_master_evaluasi_tumbuh_kembang', 1),
(18, '2022_05_05_073052_create_evaluasi_tumbuh_kembangs_table', 1),
(19, '2022_05_05_085951_create_pertumbuhan_absensis_table', 1),
(20, '2022_05_09_153714_create_penilaians_table', 1),
(21, '2022_05_16_132320_create_detail_penilaians_table', 1),
(22, '2022_05_16_140312_create_pengaturans_table', 1);

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
-- Struktur dari tabel `pendidikan_karakter`
--

CREATE TABLE `pendidikan_karakter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_master_pendidikan_karakter` int(11) NOT NULL,
  `bm` tinyint(4) NOT NULL DEFAULT 0,
  `km` tinyint(4) NOT NULL DEFAULT 0,
  `sm` tinyint(4) NOT NULL DEFAULT 0,
  `k` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikan_karakter`
--

INSERT INTO `pendidikan_karakter` (`id`, `id_siswa`, `id_master_pendidikan_karakter`, `bm`, `km`, `sm`, `k`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, 0, 0, NULL, NULL),
(2, 1, 7, 1, 0, 0, 0, NULL, NULL),
(3, 1, 13, 1, 0, 0, 0, NULL, NULL),
(4, 1, 2, 0, 1, 0, 0, NULL, NULL),
(5, 1, 6, 0, 1, 0, 0, NULL, NULL),
(6, 1, 8, 0, 1, 0, 0, NULL, NULL),
(7, 1, 12, 0, 1, 0, 0, NULL, NULL),
(8, 1, 14, 0, 1, 0, 0, NULL, NULL),
(9, 1, 3, 0, 0, 1, 0, NULL, NULL),
(10, 1, 5, 0, 0, 1, 0, NULL, NULL),
(11, 1, 9, 0, 0, 1, 0, NULL, NULL),
(12, 1, 11, 0, 0, 1, 0, NULL, NULL),
(13, 1, 15, 0, 0, 1, 0, NULL, NULL),
(14, 1, 4, 0, 0, 0, 1, NULL, NULL),
(15, 1, 10, 0, 0, 0, 1, NULL, NULL),
(16, 1, 16, 0, 0, 0, 1, NULL, NULL),
(17, 12, 2, 0, 0, 1, 0, NULL, NULL),
(18, 12, 3, 0, 0, 1, 0, NULL, NULL),
(19, 12, 4, 0, 0, 1, 0, NULL, NULL),
(20, 12, 5, 0, 0, 1, 0, NULL, NULL),
(21, 12, 6, 0, 0, 1, 0, NULL, NULL),
(22, 12, 11, 0, 0, 1, 0, NULL, NULL),
(23, 12, 12, 0, 0, 1, 0, NULL, NULL),
(24, 12, 13, 0, 0, 1, 0, NULL, NULL),
(25, 12, 14, 0, 0, 1, 0, NULL, NULL),
(26, 12, 15, 0, 0, 1, 0, NULL, NULL),
(27, 12, 16, 0, 0, 1, 0, NULL, NULL),
(28, 12, 17, 0, 0, 1, 0, NULL, NULL),
(29, 12, 19, 0, 0, 1, 0, NULL, NULL),
(30, 12, 20, 0, 0, 1, 0, NULL, NULL),
(31, 12, 21, 0, 0, 1, 0, NULL, NULL),
(32, 12, 1, 0, 0, 0, 1, NULL, NULL),
(33, 12, 7, 0, 0, 0, 1, NULL, NULL),
(34, 12, 8, 0, 0, 0, 1, NULL, NULL),
(35, 12, 9, 0, 0, 0, 1, NULL, NULL),
(36, 12, 10, 0, 0, 0, 1, NULL, NULL),
(37, 12, 18, 0, 0, 0, 1, NULL, NULL),
(38, 14, 1, 0, 1, 0, 0, NULL, NULL),
(39, 14, 9, 0, 1, 0, 0, NULL, NULL),
(40, 14, 2, 0, 0, 1, 0, NULL, NULL),
(41, 14, 3, 0, 0, 1, 0, NULL, NULL),
(42, 14, 4, 0, 0, 1, 0, NULL, NULL),
(43, 14, 5, 0, 0, 1, 0, NULL, NULL),
(44, 14, 6, 0, 0, 1, 0, NULL, NULL),
(45, 14, 7, 0, 0, 1, 0, NULL, NULL),
(46, 14, 8, 0, 0, 1, 0, NULL, NULL),
(47, 14, 13, 0, 0, 1, 0, NULL, NULL),
(48, 14, 10, 0, 0, 0, 1, NULL, NULL),
(49, 14, 11, 0, 0, 0, 1, NULL, NULL),
(50, 14, 12, 0, 0, 0, 1, NULL, NULL),
(51, 14, 14, 0, 0, 0, 1, NULL, NULL),
(52, 14, 15, 0, 0, 0, 1, NULL, NULL),
(53, 14, 16, 0, 0, 0, 1, NULL, NULL),
(54, 14, 17, 0, 0, 0, 1, NULL, NULL),
(55, 14, 18, 0, 0, 0, 1, NULL, NULL),
(56, 14, 19, 0, 0, 0, 1, NULL, NULL),
(57, 14, 20, 0, 0, 0, 1, NULL, NULL),
(58, 14, 21, 0, 0, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_tema` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minggu_ke` int(11) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_siswa`, `tema`, `sub_tema`, `minggu_ke`, `semester`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diri Sendiri', 'Tubuhku', 1, 1, '2022-07-25', NULL, NULL),
(2, 1, 'Diri Sendiri', 'Identitas Diri', 2, 1, '2022-07-25', NULL, NULL),
(3, 1, 'Lingkunganku', 'Teman', 3, 1, '2022-07-25', NULL, NULL),
(4, 1, 'Lingkunganku', 'Teman', 4, 1, '2022-07-26', NULL, NULL),
(5, 7, 'Diri Sendiri', 'Identitas Diri', 1, 2, '2022-07-31', NULL, NULL),
(6, 7, 'Diri Sendiri', 'Tubuhku', 1, 1, '2022-08-04', NULL, NULL),
(8, 14, 'Diri Sendiri', 'Tubuhku', 1, 1, '2022-08-04', NULL, NULL),
(9, 1, 'Lingkunganku', 'Teman', 1, 2, '2022-08-08', NULL, NULL);

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
-- Struktur dari tabel `pertumbuhan_absensi`
--

CREATE TABLE `pertumbuhan_absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `lingkar_kepala` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT 0,
  `izin` int(11) DEFAULT 0,
  `tanpa_keterangan` int(11) DEFAULT 0,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertumbuhan_absensi`
--

INSERT INTO `pertumbuhan_absensi` (`id`, `id_siswa`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `sakit`, `izin`, `tanpa_keterangan`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 36, 100, 25, 2, 1, 0, 'Pertumbuhan cukup baik. Absensi anak cukup rajin dan semangat dal belajar', NULL, NULL),
(2, 12, 35, 100, 32, 2, 1, 1, 'Ini catatan', NULL, NULL),
(3, 14, 35, 100, 25, 2, 1, 1, 'Ini catatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama`, `program`, `npsn`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `created_at`, `updated_at`) VALUES
(1, 'PAUD SOKA INDAH', '1234', '123456', 'TEGALURUNG GG. PANDU', 'TEGALURUNG', 'BALONGAN', 'INDRAMAYU', 'JAWA BARAT', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'administrator@gmail.com', NULL, '$2y$10$xD0ecfq9X7DucxNKTYgl0.Raj7Ag8o0J26sOS4KuJE8hJQhl0UyBa', NULL, '2022-07-24 23:22:30', '2022-07-24 23:22:30'),
(5, 'Hj. Badriah', 'badriah', 'badriah@gmail.com', NULL, '$2y$10$OSfSqQnjkHUad9e.EA0hDOAVbzzabhon6jbaSjz2fPDgnt5c8lPQ6', NULL, NULL, NULL),
(7, 'Zubaedah', 'zubaedah', 'zubaedah@gmail.com', NULL, '$2y$10$51ceYsVIB7xg3Iglmtk.FewblP/Yg5SBisLpHVncJWBOpnxqiLDA6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `evaluasi_tumbuh_kembang`
--
ALTER TABLE `evaluasi_tumbuh_kembang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kd_indikator`
--
ALTER TABLE `kd_indikator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lingkup`
--
ALTER TABLE `lingkup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mains`
--
ALTER TABLE `mains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_evaluasi_tumbuh_kembang`
--
ALTER TABLE `master_evaluasi_tumbuh_kembang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_gurus`
--
ALTER TABLE `master_gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_kelompok`
--
ALTER TABLE `master_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_kelompok_detail`
--
ALTER TABLE `master_kelompok_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_pendidikan_karakter`
--
ALTER TABLE `master_pendidikan_karakter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_pengguna`
--
ALTER TABLE `master_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_siswa`
--
ALTER TABLE `master_siswa`
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
-- Indeks untuk tabel `pendidikan_karakter`
--
ALTER TABLE `pendidikan_karakter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pertumbuhan_absensi`
--
ALTER TABLE `pertumbuhan_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `evaluasi_tumbuh_kembang`
--
ALTER TABLE `evaluasi_tumbuh_kembang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kd_indikator`
--
ALTER TABLE `kd_indikator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lingkup`
--
ALTER TABLE `lingkup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mains`
--
ALTER TABLE `mains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_evaluasi_tumbuh_kembang`
--
ALTER TABLE `master_evaluasi_tumbuh_kembang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `master_gurus`
--
ALTER TABLE `master_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_kelompok`
--
ALTER TABLE `master_kelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_kelompok_detail`
--
ALTER TABLE `master_kelompok_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_pendidikan_karakter`
--
ALTER TABLE `master_pendidikan_karakter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `master_pengguna`
--
ALTER TABLE `master_pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `master_siswa`
--
ALTER TABLE `master_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_karakter`
--
ALTER TABLE `pendidikan_karakter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pertumbuhan_absensi`
--
ALTER TABLE `pertumbuhan_absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
