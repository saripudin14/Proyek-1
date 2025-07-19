# Proyek Toko Plastik

Ini adalah aplikasi web sederhana untuk manajemen toko plastik, yang dibangun menggunakan PHP (tanpa framework besar), dengan struktur MVC (Model-View-Controller) sederhana.

## Fitur

- **Manajemen Produk**: Tambah, edit, hapus, dan lihat daftar produk.
- **Manajemen Kategori**: Kelola kategori produk.
- **Keranjang Belanja**: Fitur cart untuk pelanggan.
- **Proses Order**: Pelanggan dapat melakukan pemesanan dan melihat riwayat pesanan.
- **Autentikasi**: Login dan register untuk pelanggan dan admin.
- **Dashboard Admin**: Admin dapat mengelola produk, kategori, dan pesanan.
- **Tampilan Dinamis**: Menggunakan Tailwind CSS untuk styling.

## Struktur Folder

```
app/
  controllers/    # Logic untuk menangani request
  core/           # File inti (Database, Router, helper)
  models/         # Model untuk database (Product, Order, User, dll)
  views/          # Komponen dan halaman tampilan
config/
  database.php    # Konfigurasi koneksi database
public/
  css/            # File CSS (Tailwind)
  images/         # Gambar produk
  js/             # File JavaScript
  index.php       # Entry point aplikasi
tailwind/         # Sumber input Tailwind CSS
```

## Instalasi

1. **Clone repository ini**
2. **Setup Database**
   - Import file `toko_plastik.sql` ke MySQL Anda.
   - Atur koneksi database di `config/database.php`.
3. **Install Dependency Frontend**
   - Pastikan Node.js & npm sudah terinstall.
   - Jalankan:
     ```bash
     npm install
     ```
   - Untuk build Tailwind CSS:
     ```bash
     npx tailwindcss -i ./tailwind/input.css -o ./public/css/output.css --watch
     ```
4. **Jalankan Aplikasi**
   - Pastikan server Apache/Nginx dan MySQL berjalan.
   - Akses aplikasi melalui browser ke `http://localhost/proyek-1/public/index.php` (atau sesuai konfigurasi server Anda).

## Konfigurasi

- **Database**: Edit `config/database.php` sesuai kredensial MySQL Anda.
- **Gambar Produk**: Upload gambar ke `public/images/products/`.

## Teknologi yang Digunakan

- PHP (tanpa framework besar)
- MySQL
- Tailwind CSS
- JavaScript

## Kontribusi

Pull request dan issue sangat diterima untuk pengembangan lebih lanjut. 