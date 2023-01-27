-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2022 pada 20.17
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_transaction`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akuns`
--

CREATE TABLE `akuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akuns`
--

INSERT INTO `akuns` (`id`, `kode_akun`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '123', 'Kas', '2022-07-19 10:41:56', '2022-07-19 10:42:30'),
(2, '456', 'Penjualan', '2022-07-19 10:42:11', '2022-07-19 10:42:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hrg` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `desc`, `uom`, `type`, `hrg`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Barang 1asd', 'uom1asd', 'type1asd', 50000, 190, '2022-07-03 05:03:02', '2022-07-03 05:03:25'),
(3, 'baran2', 'uom2', 'barang2', 50000, 180, '2022-07-04 20:30:05', '2022-07-04 20:30:05'),
(4, 'barang3', 'uom3', 'barang 3', 30000, 100, '2022-07-04 20:30:29', '2022-07-04 20:30:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactperson` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `companyname`, `contactperson`, `title`, `job`, `created_at`, `updated_at`) VALUES
(2, 'unknown', '1231231231231290', 'head executive', 'ceo', '2022-07-03 02:24:32', '2022-07-03 02:24:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dos`
--

CREATE TABLE `dos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_do` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_do` date NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_to` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dos`
--

INSERT INTO `dos` (`id`, `no_do`, `tgl_do`, `payment_id`, `desc`, `ship_to`, `pajak`, `shipping`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Do/001', '2022-07-08', 3, 'asd', 'ship to unknown', 10, 5000, 1325000, '2022-07-08 01:06:02', '2022-07-08 01:06:02'),
(2, 'Do/002', '2022-07-08', 4, 'project2', 'asd', 10, 5000, 555000, '2022-07-08 05:48:07', '2022-07-08 05:48:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `do_details`
--

CREATE TABLE `do_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `do_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `do_details`
--

INSERT INTO `do_details` (`id`, `do_id`, `payment_id`, `barang_id`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 10, 60000, '2022-07-08 01:06:02', '2022-07-08 01:06:02'),
(2, 1, 3, 3, 10, 60000, '2022-07-08 01:06:02', '2022-07-08 01:06:02'),
(3, 2, 4, 3, 10, 50000, '2022-07-08 05:48:07', '2022-07-08 05:48:07');

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
-- Struktur dari tabel `invs`
--

CREATE TABLE `invs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_inv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_inv` date NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invs`
--

INSERT INTO `invs` (`id`, `no_inv`, `tgl_inv`, `po_id`, `desc`, `pajak`, `shipping`, `total`, `created_at`, `updated_at`) VALUES
(1, 'INV/0001', '2022-07-07', 3, 'asd', 10, 5000, 1325000, '2022-07-07 02:10:13', '2022-07-07 02:10:13'),
(2, 'INV/0002', '2022-07-07', 4, 'project2', 10, 5000, 555000, '2022-07-07 02:26:27', '2022-07-07 02:26:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inv_details`
--

CREATE TABLE `inv_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inv_details`
--

INSERT INTO `inv_details` (`id`, `inv_id`, `po_id`, `barang_id`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 10, 60000, '2022-07-07 02:10:13', '2022-07-07 02:10:13'),
(2, 1, 3, 3, 10, 60000, '2022-07-07 02:10:13', '2022-07-07 02:10:13'),
(3, 2, 4, 3, 10, 50000, '2022-07-07 02:26:28', '2022-07-07 02:26:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnals`
--

CREATE TABLE `jurnals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_jurnal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `do_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `debit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kredit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit_akun_id` int(11) DEFAULT NULL,
  `kredit_akun_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurnals`
--

INSERT INTO `jurnals` (`id`, `no_jurnal`, `tgl_jurnal`, `do_id`, `user_id`, `debit`, `kredit`, `debit_akun_id`, `kredit_akun_id`, `created_at`, `updated_at`) VALUES
(2, 'J-0001', '2022-07-20', 1, 5, '1325000', '1325000', 1, 2, '2022-07-19 10:55:44', '2022-07-19 10:55:44'),
(3, 'J-0002', '2022-07-20', 2, 5, '555000', '555000', 1, 2, '2022-07-19 11:12:51', '2022-07-19 11:12:51');

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
(5, '2022_07_03_065641_create_clients_table', 2),
(6, '2022_07_03_065818_create_barangs_table', 2),
(7, '2022_07_04_094512_create_rfqs_table', 3),
(8, '2022_07_04_094857_create_rfq_details_table', 3),
(9, '2022_07_04_100704_create_sementaras_table', 4),
(10, '2022_07_05_034717_add_trigger', 5),
(11, '2022_07_05_124511_create_qts_table', 6),
(12, '2022_07_05_124523_create_qt_details_table', 6),
(13, '2022_07_06_061805_create_pos_table', 7),
(14, '2022_07_06_061824_create_po_details_table', 7),
(17, '2022_07_07_085451_create_invs_table', 8),
(18, '2022_07_07_085506_create_inv_details_table', 8),
(21, '2022_07_08_073626_create_payments_table', 9),
(22, '2022_07_08_073657_create_payment_details_table', 9),
(25, '2022_07_08_075508_create_dos_table', 10),
(26, '2022_07_08_075517_create_do_details_table', 10),
(31, '2022_07_08_123735_create_jurnals_table', 11),
(32, '2022_07_19_122035_create_akuns_table', 12);

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
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_payment` date NOT NULL,
  `inv_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `no_payment`, `tgl_payment`, `inv_id`, `desc`, `bank`, `account_name`, `pajak`, `shipping`, `total`, `created_at`, `updated_at`) VALUES
(3, 'P-001', '2022-07-08', 1, 'asd', 'BRI', 'NAME', 10, 5000, 1325000, '2022-07-08 00:47:58', '2022-07-08 00:47:58'),
(4, 'P-002', '2022-07-08', 2, 'project2', 'BCA', 'NAME2', 10, 5000, 555000, '2022-07-08 01:03:50', '2022-07-08 01:03:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `inv_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment_details`
--

INSERT INTO `payment_details` (`id`, `payment_id`, `inv_id`, `barang_id`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 10, 60000, '2022-07-08 00:47:58', '2022-07-08 00:47:58'),
(2, 3, 1, 3, 10, 60000, '2022-07-08 00:47:58', '2022-07-08 00:47:58'),
(3, 4, 2, 3, 10, 50000, '2022-07-08 01:03:50', '2022-07-08 01:03:50');

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
-- Struktur dari tabel `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_po` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_po` date NOT NULL,
  `qt_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pos`
--

INSERT INTO `pos` (`id`, `no_po`, `tgl_po`, `qt_id`, `desc`, `pajak`, `total`, `created_at`, `updated_at`) VALUES
(3, 'PO/001', '2022-07-06', 2, 'asd', 10, 1320000, '2022-07-05 23:38:47', '2022-07-05 23:38:47'),
(4, 'PO/002', '2022-07-07', 3, 'project2', 10, 550000, '2022-07-07 02:25:54', '2022-07-07 02:25:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_details`
--

CREATE TABLE `po_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL,
  `qt_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `po_details`
--

INSERT INTO `po_details` (`id`, `po_id`, `qt_id`, `barang_id`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 1, 10, 60000, '2022-07-05 23:38:47', '2022-07-05 23:38:47'),
(4, 3, 2, 3, 10, 60000, '2022-07-05 23:38:47', '2022-07-05 23:38:47'),
(5, 4, 3, 3, 10, 50000, '2022-07-07 02:25:54', '2022-07-07 02:25:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qts`
--

CREATE TABLE `qts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_qt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_qt` date NOT NULL,
  `rfq_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `qts`
--

INSERT INTO `qts` (`id`, `no_qt`, `tgl_qt`, `rfq_id`, `desc`, `pajak`, `total`, `created_at`, `updated_at`) VALUES
(2, '12312/asdas/001', '2022-07-05', 2, 'asd', 10, 1100000, '2022-07-05 10:11:46', '2022-07-05 10:11:46'),
(3, '12312/asdas/002', '2022-07-07', 4, 'project2', 10, 550000, '2022-07-07 02:25:22', '2022-07-07 02:25:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `qt_details`
--

CREATE TABLE `qt_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qt_id` bigint(20) UNSIGNED NOT NULL,
  `rfq_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `qt_details`
--

INSERT INTO `qt_details` (`id`, `qt_id`, `rfq_id`, `barang_id`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 1, 10, 50000, '2022-07-05 10:11:46', '2022-07-05 10:11:46'),
(4, 2, 2, 3, 10, 50000, '2022-07-05 10:11:46', '2022-07-05 10:11:46'),
(5, 3, 4, 3, 10, 50000, '2022-07-07 02:25:22', '2022-07-07 02:25:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfqs`
--

CREATE TABLE `rfqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_rfq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_rfq` date NOT NULL,
  `projectname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rfqs`
--

INSERT INTO `rfqs` (`id`, `no_rfq`, `tgl_rfq`, `projectname`, `client_id`, `desc`, `created_at`, `updated_at`) VALUES
(2, 'R-001', '2022-07-05', 'project asdasd', 2, 'asd', '2022-07-04 20:56:29', '2022-07-04 20:56:29'),
(4, 'R-002', '2022-07-07', 'project2', 2, 'project2', '2022-07-07 02:24:47', '2022-07-07 02:24:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfq_details`
--

CREATE TABLE `rfq_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfq_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rfq_details`
--

INSERT INTO `rfq_details` (`id`, `rfq_id`, `barang_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, '2022-07-04 20:56:29', '2022-07-04 20:56:29'),
(2, 2, 3, 10, '2022-07-04 20:56:29', '2022-07-04 20:56:29'),
(4, 4, 3, 10, '2022-07-07 02:24:47', '2022-07-07 02:24:47');

--
-- Trigger `rfq_details`
--
DELIMITER $$
CREATE TRIGGER `tg_rfq` AFTER INSERT ON `rfq_details` FOR EACH ROW BEGIN
                UPDATE barangs
                SET stock = stock - NEW.qty
                WHERE
                id = NEW.barang_id;
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementaras`
--

CREATE TABLE `sementaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'user', 'user', 'user@gmail.com', NULL, '$2y$10$GNVneU.Eayb2TkIM34iV9uwJFVHIOx2mxAR9FTuquwzV.VzgIPmi2', 'user', NULL, '2022-07-02 02:05:40', '2022-07-02 02:05:40'),
(3, 'user2', 'user2', 'user2@gmail.com', NULL, '$2y$10$t6XR6u.5e3EeNtpEy5t0r.f4RAP0kDiGGZdYSY8qMCHIXoO0MxA/i', 'user', NULL, '2022-07-02 05:34:27', '2022-07-02 05:34:27'),
(5, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$FgNHjlByWl7iuN.P3Zkw2Owqa7AR89WD5Zqmx5qnbIoeevhq1EXqW', 'admin', NULL, '2022-07-02 21:06:43', '2022-07-02 21:06:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akuns`
--
ALTER TABLE `akuns`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dos`
--
ALTER TABLE `dos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dos_payment_id_foreign` (`payment_id`);

--
-- Indeks untuk tabel `do_details`
--
ALTER TABLE `do_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `do_details_do_id_foreign` (`do_id`),
  ADD KEY `do_details_payment_id_foreign` (`payment_id`),
  ADD KEY `do_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `invs`
--
ALTER TABLE `invs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invs_po_id_foreign` (`po_id`);

--
-- Indeks untuk tabel `inv_details`
--
ALTER TABLE `inv_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_details_inv_id_foreign` (`inv_id`),
  ADD KEY `inv_details_po_id_foreign` (`po_id`),
  ADD KEY `inv_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `jurnals`
--
ALTER TABLE `jurnals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnals_do_id_foreign` (`do_id`),
  ADD KEY `jurnals_user_id_foreign` (`user_id`);

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
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_inv_id_foreign` (`inv_id`);

--
-- Indeks untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_payment_foreign` (`payment_id`),
  ADD KEY `payment_details_inv_id_foreign` (`inv_id`),
  ADD KEY `payment_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pos_qt_id_foreign` (`qt_id`);

--
-- Indeks untuk tabel `po_details`
--
ALTER TABLE `po_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_details_po_id_foreign` (`po_id`),
  ADD KEY `po_details_qt_id_foreign` (`qt_id`),
  ADD KEY `po_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `qts`
--
ALTER TABLE `qts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qts_rfq_id_foreign` (`rfq_id`);

--
-- Indeks untuk tabel `qt_details`
--
ALTER TABLE `qt_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qt_details_qt_id_foreign` (`qt_id`),
  ADD KEY `qt_details_rfq_id_foreign` (`rfq_id`),
  ADD KEY `qt_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `rfqs`
--
ALTER TABLE `rfqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rfqs_client_id_foreign` (`client_id`);

--
-- Indeks untuk tabel `rfq_details`
--
ALTER TABLE `rfq_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rfq_details_rfq_id_foreign` (`rfq_id`),
  ADD KEY `rfq_details_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `sementaras`
--
ALTER TABLE `sementaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sementaras_barang_id_foreign` (`barang_id`),
  ADD KEY `sementaras_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `akuns`
--
ALTER TABLE `akuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dos`
--
ALTER TABLE `dos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `do_details`
--
ALTER TABLE `do_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invs`
--
ALTER TABLE `invs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `inv_details`
--
ALTER TABLE `inv_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurnals`
--
ALTER TABLE `jurnals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `po_details`
--
ALTER TABLE `po_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `qts`
--
ALTER TABLE `qts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `qt_details`
--
ALTER TABLE `qt_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rfqs`
--
ALTER TABLE `rfqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rfq_details`
--
ALTER TABLE `rfq_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sementaras`
--
ALTER TABLE `sementaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dos`
--
ALTER TABLE `dos`
  ADD CONSTRAINT `dos_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `do_details`
--
ALTER TABLE `do_details`
  ADD CONSTRAINT `do_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `do_details_do_id_foreign` FOREIGN KEY (`do_id`) REFERENCES `dos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `do_details_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invs`
--
ALTER TABLE `invs`
  ADD CONSTRAINT `invs_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `pos` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `inv_details`
--
ALTER TABLE `inv_details`
  ADD CONSTRAINT `inv_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inv_details_inv_id_foreign` FOREIGN KEY (`inv_id`) REFERENCES `invs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inv_details_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `pos` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurnals`
--
ALTER TABLE `jurnals`
  ADD CONSTRAINT `jurnals_do_id_foreign` FOREIGN KEY (`do_id`) REFERENCES `dos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurnals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_inv_id_foreign` FOREIGN KEY (`inv_id`) REFERENCES `invs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_details_inv_id_foreign` FOREIGN KEY (`inv_id`) REFERENCES `invs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_details_payment_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pos`
--
ALTER TABLE `pos`
  ADD CONSTRAINT `pos_qt_id_foreign` FOREIGN KEY (`qt_id`) REFERENCES `qts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `po_details`
--
ALTER TABLE `po_details`
  ADD CONSTRAINT `po_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `po_details_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `pos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `po_details_qt_id_foreign` FOREIGN KEY (`qt_id`) REFERENCES `qts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `qts`
--
ALTER TABLE `qts`
  ADD CONSTRAINT `qts_rfq_id_foreign` FOREIGN KEY (`rfq_id`) REFERENCES `rfqs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `qt_details`
--
ALTER TABLE `qt_details`
  ADD CONSTRAINT `qt_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qt_details_qt_id_foreign` FOREIGN KEY (`qt_id`) REFERENCES `qts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qt_details_rfq_id_foreign` FOREIGN KEY (`rfq_id`) REFERENCES `rfqs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rfqs`
--
ALTER TABLE `rfqs`
  ADD CONSTRAINT `rfqs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rfq_details`
--
ALTER TABLE `rfq_details`
  ADD CONSTRAINT `rfq_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rfq_details_rfq_id_foreign` FOREIGN KEY (`rfq_id`) REFERENCES `rfqs` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sementaras`
--
ALTER TABLE `sementaras`
  ADD CONSTRAINT `sementaras_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sementaras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
