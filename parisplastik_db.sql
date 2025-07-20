-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2025 at 03:08 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parisplastik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Kantong', 'Wadah tipis dan fleksibel yang terbuat dari plastik, digunakan untuk membawa atau menyimpan berbagai barang seperti makanan, minuman, atau barang belanjaan.', '2025-07-13 04:13:45', '2025-07-13 04:50:50'),
(6, 'Alat Makan/Minum', 'Alat yang digunakan untuk menyajikan dan menikmati makanan dan minuman. ', '2025-07-13 04:33:28', '2025-07-13 04:33:28'),
(7, 'Kertas', 'Lembaran tipis yang terbuat dari serat tumbuhan, seperti kayu, dan diproses menjadi lembaran yang dapat digunakan untuk berbagai keperluan seperti menulis, mencetak, dan menggambar', '2025-07-13 04:50:41', '2025-07-13 04:50:41'),
(8, 'Wadah Makanan', 'Segala jenis tempat atau wadah yang digunakan untuk menyimpan, mengemas, atau mengangkut makanan. ', '2025-07-13 04:59:00', '2025-07-13 04:59:00'),
(9, 'Tali', 'Untaian bahan yang dipilin atau dikepang menjadi satu untuk membentuk suatu benda yang lebih kuat dan fleksibel, biasanya digunakan untuk mengikat, menarik, atau menggantung sesuatu. ', '2025-07-13 05:24:13', '2025-07-13 05:24:13'),
(10, 'Tisu', 'Sejenis kertas tipis dan ringan yang umumnya terbuat dari serat atau bubur kayu. ', '2025-07-13 06:22:42', '2025-07-13 06:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Saripudin', 'saripudin@gmail.com', '081779046661', 'malas', '2025-07-06 03:03:15'),
(4, 'Mia', 'mia@gmail.com', '081382626096', 'Jalanin aja dulu', '2025-07-13 06:25:05'),
(5, 'Ipun', 'ipun@gmail.com', '081382626096', 'Jalan Pisangan Lama 2', '2025-07-13 06:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total` decimal(12,2) NOT NULL,
  `status` enum('Belum Dibayar','Lunas','Dikirim','Selesai','Batal') DEFAULT 'Belum Dibayar',
  `shipping_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`, `shipping_address`, `created_at`, `updated_at`) VALUES
(7, 1, 85000.00, 'Lunas', 'Jalanin aja dulu', '2025-07-13 06:01:50', '2025-07-13 06:25:25'),
(8, 4, 10000.00, 'Selesai', 'Jalanin aja dulu', '2025-07-13 06:25:05', '2025-07-13 06:37:33'),
(9, 5, 42000.00, 'Belum Dibayar', 'Jalan Pisangan Lama 2', '2025-07-13 06:36:51', '2025-07-13 06:36:51'),
(10, 5, 25000.00, 'Belum Dibayar', 'jalanin aja dulu', '2025-07-19 02:29:06', '2025-07-19 02:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(150) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` enum('pcs','pack','roll','kg','liter','other') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(9, 7, 10, 'Gelas Cap Wayang', 8000.00, 1, 'pack', '2025-07-13 06:01:50', '2025-07-13 06:01:50'),
(10, 7, 5, 'Kantong Plastik Cap Tiger', 25000.00, 1, 'pack', '2025-07-13 06:01:50', '2025-07-13 06:01:50'),
(11, 7, 6, 'Kantong Plastik Cap Tiger', 17000.00, 1, 'pack', '2025-07-13 06:01:50', '2025-07-13 06:01:50'),
(12, 7, 12, 'Kotak Makan Thinwall', 35000.00, 1, 'pack', '2025-07-13 06:01:50', '2025-07-13 06:01:50'),
(13, 8, 16, 'Tisu Multi', 10000.00, 1, 'pcs', '2025-07-13 06:25:05', '2025-07-13 06:25:05'),
(14, 9, 17, 'Paper Cup', 12000.00, 1, 'pack', '2025-07-13 06:36:51', '2025-07-13 06:36:51'),
(15, 9, 13, 'Sterofoam Makanan', 30000.00, 1, 'pack', '2025-07-13 06:36:51', '2025-07-13 06:36:51'),
(16, 10, 5, 'Kantong Plastik Cap Tiger', 25000.00, 1, 'pack', '2025-07-19 02:29:06', '2025-07-19 02:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `dimensions` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `unit` enum('pcs','pack','roll','kg','liter','other') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `dimensions`, `color`, `unit`, `image`, `created_at`, `updated_at`) VALUES
(5, 5, 'Kantong Plastik Cap Tiger', 'Kantong Plastik Kresek HdPe\r\n\r\nMerk : Tiger\r\nWarna : Merah\r\nHarga : Rp 50,000;/Pak, Beli banyak lebih Murah.\r\nBerat Barang per 1 pak : 1 kg\r\nUkuran Lebar : 50 Cm X 70Cm\r\nPenggumaan : Cocok untuk Segala Keperluan Pengepakkan, Terutama bagi Pengusaha Loundry, Pakaian, Dll', 25000.00, 1000, '50x70 cm', 'Merah', 'pack', '/images/products/product_1752380156.jpg', '2025-07-13 04:15:56', '2025-07-19 12:11:10'),
(6, 5, 'Kantong Plastik Cap Tiger', 'Berat Bersih : 300 grams\r\nIsi : sekitar 86 lembar\r\n\r\nKantong Plastik Kresek Tiger Bening, berbahan HDPE murni dengan qualitas prima sehingga menghasilkan kantong plastik yang kuat, elastis, higienis, tidak mudah bocor dan tahan lama.', 17000.00, 1000, '24x38 cm', 'Bening', 'pack', '/images/products/product_1752380535.jpg', '2025-07-13 04:22:15', '2025-07-19 12:11:10'),
(7, 5, 'Kantong Plastik Cap Tomat', 'Plastik PE merk Tomat\r\nUkuran = 4 x 23 cm\r\nBerat = 250 gram\r\nisi -/+250 lembar\r\n\r\nFungsi dari Kantong Plastik PE sebagai :\r\n• Kantong Plastik membungkus cairan khususnya jenis minyak dan santan.\r\n• Kantong Plastik membungkus barang padat dan berat.\r\n• Kantong Plastik khusus es cair atau es batu.\r\n• Kantong Plastik untuk mengisi sampah dalam jumlah banyak.', 10000.00, 700, '4x12 cm', 'Bening', 'pack', '/images/products/product_1752380712.jpg', '2025-07-13 04:25:12', '2025-07-19 12:11:10'),
(10, 6, 'Gelas Cap Wayang', 'Gelas Plastik Wayang 220 ml\r\n- 1 pack isi 50 Pcs\r\n\r\nTinggi 9,5cm\r\n\r\nHigienis sebagai wadah makanan dan minuman. Serta dapat digunakan untuk panas ataupun dingin', 8000.00, 800, '220 ml', 'Bening', 'pack', '/images/products/product_1752381908.jpg', '2025-07-13 04:45:08', '2025-07-19 12:11:10'),
(11, 7, 'Kertas Nasi Cap Hebat', 'merk hebat\r\nuk 25x35\r\n1 pak isi 250 lbr', 20000.00, 900, '25x35 cm', 'Coklat', 'pack', '/images/products/product_1752382346.jpg', '2025-07-13 04:52:26', '2025-07-19 12:11:10'),
(12, 8, 'Kotak Makan Thinwall', 'Bahan PP Foodgrade Original\r\nTahan di bawah suhu 18 Derajat Celcius\r\nTahan terhadap suhu Panas Microwave/oven dan kukus 100c\r\nKemasan Khusus untuk Makanan\r\nKetahanan yang baik terhadap lemak, stabil terhadap suhu tinggi dan cukup mengkilap\r\n\r\nPanjang bawah 14.5cm\r\nLebar bawah 9.5cm\r\nTebal 0.45mm\r\n\r\nBisa digunakan untuk :\r\nKotak nasi\r\nBox Sayur\r\nBekal Box Makanan', 35000.00, 200, '650 ml', 'Bening', 'pack', '/images/products/product_1752382869.jpg', '2025-07-13 05:01:09', '2025-07-19 12:11:10'),
(13, 8, 'Sterofoam Makanan', 'Ready Stock - Styrofoam / Sterofoam Makanan\r\n- Untuk bubur / bakmie / makanan lainnya\r\n- Isi 100 pcs\r\n- Harga per roll isi 100 pcs\r\n- Ukuran 18cm x 12.5cm', 30000.00, 100, '18x12 cm', 'Putih', 'pack', '/images/products/product_1752383180.jpg', '2025-07-13 05:06:20', '2025-07-19 12:11:10'),
(14, 9, 'Tali Rafia Cap Ladon', 'Spesifikasi:\r\n-Bahan = Grade K2\r\n-Kualitas Tali = Tebal & Kuat Tidak Mudah Putus\r\n-Warna = Hitam', 15000.00, 600, '', 'Hitam', 'roll', '/images/products/product_1752384428.jpg', '2025-07-13 05:27:08', '2025-07-19 12:11:10'),
(15, 8, 'Kardus Nasi', 'Spesifikasi:\r\n~Bahan kardus tebal\r\n~Kuat dan tidak mudah penyok ketika di tumpuk\r\nKeterangan\r\n~Cocok untuk wadah/tempat snack dan nasi\r\n~Cocok untuk yang mempunyai usaha catering.\r\n~Biasa digunakan untuk dus nasi hajatan ataupun kegiatan travel.', 50000.00, 100, '25x25 cm', 'Putih', 'pack', '/images/products/product_1752384824.jpg', '2025-07-13 05:33:44', '2025-07-19 12:11:10'),
(16, 10, 'Tisu Multi', 'Tisu serbaguna yang terbuat dari 100% serat kayu alami berkualitas, menghasilkan tisu yang higienis, lembut, dan kuat. Tisu ini cocok untuk berbagai kebutuhan keluarga, seperti membersihkan wajah, tangan, atau permukaan. Multi Tissue diproses secara higienis dan seringkali tidak mengandung pewarna, parfum, atau bahan kimia tambahan.', 10000.00, 500, '', '', 'pcs', '/images/products/product_1752387867.jpg', '2025-07-13 06:24:27', '2025-07-19 12:11:10'),
(17, 6, 'Paper Cup', 'Paper Cup 9oz Gelas Kertas Kopi Motif\r\n\r\nSpesifikasi Cup :\r\n- Diameter atas 7.5cm\r\n- Diameter bawah 5 cm\r\n- Tinggi Cup 8.8 cm', 12000.00, 300, '', '', 'pack', '/images/products/product_1752388295.jpg', '2025-07-13 06:31:35', '2025-07-19 12:11:10'),
(18, 6, 'Sedotan CSA', 'sedotan minuman isi 189 batang', 10000.00, 200, '', '', 'pack', '/images/products/product_1752388497.jpg', '2025-07-13 06:34:57', '2025-07-19 12:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'farisplastik@gmail.com', '$2y$10$XqFwwqw3nt8.F58x8GPZJOS8TyMixupKQORmg.NBreshdX3xKN/9q', NULL, NULL, 'admin', '2025-06-28 19:06:36', '2025-06-28 19:11:34'),
(3, 'Saripudin', 'saripudin@gmail.com', '$2y$10$bTvnjCjY4JZ0d.JXLh7P5OyS3bbt34JxNw.7kzL6mVieyCMIFmbSy', '08177904661', NULL, 'admin', '2025-07-12 04:05:45', '2025-07-12 04:05:45'),
(4, 'Udin', 'udin@gmail.com', '$2y$10$t4R3E9g2LvQnOeyaUQZnh.4aJ7z9STlYKhK90wEJOSQjYPbyuA/f6', '081779049879', 'Jl. Pisangan Lama 2', 'admin', '2025-07-12 04:22:38', '2025-07-12 04:22:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
