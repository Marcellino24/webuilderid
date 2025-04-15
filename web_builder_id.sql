-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2025 at 10:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_builder_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket_umkm`
--

CREATE TABLE `paket_umkm` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `fitur` text DEFAULT NULL,
  `durasi` int(11) NOT NULL COMMENT 'Durasi dalam bulan',
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Paid','Failed') DEFAULT 'Pending',
  `payment_method` enum('Bank Transfer','E-Wallet','Credit Card') DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `kategori`, `gambar`, `created_at`) VALUES
(1, 'Website Toko Online', 'Desain responsif untuk bisnis online', 2500000.00, 'E-Commerce', 'foto/Pica-enhance-20250222144102.png', '2025-02-22 06:11:16'),
(2, 'Landing Page UMKM', 'Website sederhana untuk UMKM', 1500000.00, 'Landing Page', 'foto/Jasa-Pembuatan-Landing-Page-Murah.WEBP', '2025-02-22 06:11:16'),
(3, 'Portfolio Website', 'Website untuk personal branding', 2000000.00, 'Portfolio', 'foto/ProVice - Consulting Agency Website Hero Section.jpg', '2025-02-22 06:11:16'),
(4, 'Company Profile', 'Website untuk perusahaan profesional', 3500000.00, 'Company Profile', 'foto/Startup Digital.jpg', '2025-02-22 06:11:16'),
(5, 'Website Berita', 'Portal berita dengan desain elegan', 5000000.00, 'Portal Berita', 'foto/Homepage on News Website.jpg', '2025-02-22 06:11:16'),
(6, 'Website Sekolah', 'Platform informasi sekolah modern', 4000000.00, 'Pendidikan', 'foto/School website Design online modern School.jpg', '2025-02-22 06:11:16'),
(7, 'Website Warung Sembako', 'Website katalog produk untuk warung sembako', 1800000.00, 'UMKM', 'foto/Farmart - Organic & Grocery Marketplace Redesign.jpg', '2025-02-22 06:13:01'),
(8, 'Website Laundry', 'Sistem informasi untuk jasa laundry', 2200000.00, 'UMKM', 'foto/Clino - Cleaning service UIUX design - Hamida Jannat ✪_.jpg', '2025-02-22 06:13:01'),
(9, 'Website Bengkel Mobil', 'Website profil dan booking servis bengkel', 2500000.00, 'UMKM', 'foto/I will design or clone an elementor site and fix wordpress issues_.jpg', '2025-02-22 06:13:01'),
(10, 'Website Toko Pakaian', 'Toko online untuk usaha fashion', 2700000.00, 'UMKM', 'foto/Batik E-commerce Website.jpg', '2025-02-22 06:13:01'),
(11, 'Website Barbershop', 'Website reservasi untuk barbershop dan salon', 2000000.00, 'UMKM', 'foto/download.jpg', '2025-02-22 06:13:01'),
(12, 'Website Catering', 'Sistem pemesanan makanan untuk usaha catering', 2800000.00, 'UMKM', 'foto/Catera - Catering & Event Planner Wordpress Theme.jpg', '2025-02-22 06:13:01'),
(13, 'Website Jasa Fotografi', 'Portofolio dan booking jasa fotografi', 2300000.00, 'UMKM', 'foto/Photography & Portfolio Web Design Inspiration (1).jpg', '2025-02-22 06:13:01'),
(14, 'Website Percetakan', 'Website pemesanan dan showcase layanan percetakan', 2600000.00, 'UMKM', 'foto/Blog home page — Untitled UI.jpg', '2025-02-22 06:13:01'),
(15, 'Website Toko Mainan', 'E-commerce untuk usaha mainan anak', 2500000.00, 'UMKM', 'foto/Shopic - Toys & Kids Store WP Theme Demo.jpg', '2025-02-22 06:13:01'),
(16, 'Website Toko Kue', 'Website untuk toko kue dan bakery', 2400000.00, 'UMKM', 'foto/Bakery Website Design Inspiration - 2024 Website Template.jpg', '2025-02-22 06:13:01'),
(17, 'Website Jasa Cuci Mobil', 'Platform pemesanan jasa cuci mobil', 2200000.00, 'UMKM', 'foto/Car Wash Service landing page design.jpg', '2025-02-22 06:13:01'),
(18, 'Website Toko Herbal', 'Toko online untuk produk herbal dan kesehatan', 2600000.00, 'UMKM', 'foto/Tea Shop online store website by Rimblex_.jpg', '2025-02-22 06:13:01'),
(19, 'Website Konveksi', 'Website katalog dan pemesanan untuk usaha konveksi', 2800000.00, 'UMKM', 'foto/download (1).jpg', '2025-02-22 06:13:01'),
(20, 'Website Petshop', 'Toko online dan layanan perawatan hewan', 2700000.00, 'UMKM', 'foto/PetMania - Pet Care Shop Ecommerce WordPress Theme.jpg', '2025-02-22 06:13:01'),
(21, 'Website Toko Elektronik', 'Website katalog produk elektronik', 2900000.00, 'UMKM', 'foto/9 of the Best OpenCart Themes for Tool & Hardware Stores.jpg', '2025-02-22 06:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `website_type` enum('Landing Page','E-commerce','Company Profile','Custom') NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Pending','In Progress','Completed','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hosting_type` enum('Bronze','Silver','Gold','Platinum') NOT NULL DEFAULT 'Bronze',
  `domain_type` enum('Domain.com','Domain.id','Domain.org','Domain.net') NOT NULL DEFAULT 'Domain.com',
  `total_price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('UMKM','Perusahaan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket_umkm`
--
ALTER TABLE `paket_umkm`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket_umkm`
--
ALTER TABLE `paket_umkm`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
