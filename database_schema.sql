-- Database: `db_toko_plastik`

-- 1. Tabel pengguna sistem (admin, kasir)
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL, -- Password sudah di-hash
  `role` ENUM('admin', 'kasir') NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) COMMENT='Data pengguna sistem (admin, kasir)';

-- 2. Tabel pelanggan
CREATE TABLE `customers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama_lengkap` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL, -- Password sudah di-hash
  `no_telepon` VARCHAR(20),
  `alamat` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) COMMENT='Data pelanggan toko plastik';

-- 3. Tabel kategori produk
CREATE TABLE `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nama_kategori` VARCHAR(100) NOT NULL UNIQUE,
  `deskripsi` TEXT
) COMMENT='Kategori produk';

-- 4. Tabel produk
CREATE TABLE `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category_id` INT NOT NULL,
  `kode_produk` VARCHAR(50) UNIQUE, -- SKU
  `nama_produk` VARCHAR(255) NOT NULL,
  `deskripsi` TEXT,
  `harga_jual` DECIMAL(10,2) NOT NULL,
  `satuan` VARCHAR(20) NOT NULL, -- Pcs, Lusin, Kg, dst
  `stok` INT NOT NULL DEFAULT 0,
  `gambar_produk` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE
) COMMENT='Data produk toko plastik';

-- 5. Tabel pesanan (header)
CREATE TABLE `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `customer_id` INT, -- NULL jika offline
  `user_id` INT,     -- NULL jika online
  `nomor_invoice` VARCHAR(50) NOT NULL UNIQUE,
  `total_harga` DECIMAL(12,2) NOT NULL,
  `metode_pembayaran` VARCHAR(50),
  `status_pesanan` ENUM('pending','paid','processing','shipped','completed','cancelled') NOT NULL,
  `tipe_pesanan` ENUM('online','offline') NOT NULL,
  `alamat_pengiriman` TEXT,
  `catatan_pesanan` TEXT,
  `tanggal_pesanan` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
) COMMENT='Header pesanan';

-- 6. Tabel detail pesanan
CREATE TABLE `order_details` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT NOT NULL,
  `product_id` INT,
  `jumlah` INT NOT NULL,
  `harga_saat_transaksi` DECIMAL(10,2) NOT NULL,
  `subtotal` DECIMAL(12,2) NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE SET NULL
) COMMENT='Detail item pesanan';

-- 7. Tabel pergerakan stok (opsional, sangat disarankan)
CREATE TABLE `stock_movements` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `product_id` INT NOT NULL,
  `tipe_pergerakan` ENUM('masuk','keluar','penyesuaian') NOT NULL,
  `jumlah` INT NOT NULL,
  `keterangan` VARCHAR(255),
  `user_id` INT,
  `tanggal_waktu` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
) COMMENT='Log pergerakan stok produk';
