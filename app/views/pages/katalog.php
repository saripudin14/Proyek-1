<?php
session_start();
require_once __DIR__ . '/../../core/helpers.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@preline/preline@2.0.0/dist/preline.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/proyek-1/public/css/product.css">
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
    <style>
        .nav-link-underline {
            position: relative;
        }

        .nav-link-underline::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%) scaleX(0);
            transform-origin: center;
            width: 100%;
            height: 2px;
            background-color: currentColor;
            transition: transform 0.3s ease-out;
        }

        .nav-link-underline:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        .product-card {
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .filter-checkbox:checked+.filter-label {
            background-color: #3b82f6;
            color: white;
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            0% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-10px);
            }
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease-out forwards;
        }

        .animate-slide-up {
            animation: slideUp 0.2s ease-in forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        /* Custom dropdown select style for kategori */
        select[name="category"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #0e3a5e url('data:image/svg+xml;utf8,<svg fill="white" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M7.293 7.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414l-2 2a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z"/></svg>') no-repeat right 0.75rem center/1.2em auto;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 0.5rem;
            padding-right: 2.5rem;
            box-shadow: 0 4px 24px 0 rgba(0, 0, 0, 0.10);
            transition: box-shadow 0.2s, background 0.2s;
        }

        select[name="category"]:focus {
            outline: none;
            box-shadow: 0 6px 32px 0 rgba(59, 130, 246, 0.18);
            background-color: #155e75;
        }

        select[name="category"] option {
            color: #222;
            background: #f8fafc;
            font-weight: 500;
        }

        select[name="category"] option:checked,
        select[name="category"] option[selected] {
            background: #2563eb;
            color: #fff;
        }

        /* Dropdown arrow for select */
        .select-wrapper {
            position: relative;
            display: inline-block;
            width: 180px;
        }

        .select-wrapper::after {
            content: '\25BC';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            pointer-events: none;
            font-size: 0.9em;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Navigation -->
    <nav
        class="bg-white/90 dark:bg-gray-800/90 shadow-sm sticky top-0 z-50 backdrop-blur-md border-b border-sky-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="/proyek-1/public/"
                        class="text-2xl font-extrabold text-sky-600 dark:text-sky-300 tracking-tight flex items-center gap-2">
                        Paris Plastik
                    </a>
                </div>

                <div class="hidden sm:flex sm:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="/proyek-1/public/"
                        class="nav-link-underline text-sky-700 dark:text-white px-3 py-2 text-base font-semibold">Home</a>
                    <a href="/proyek-1/public/#about"
                        class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Tentang</a>
                    <a href="?url=katalog"
                        class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Produk</a>
                </div>

                <div class="flex items-center gap-3 sm:gap-4 ml-auto">

                    <div class="relative flex items-center">
                        <button id="cart-btn"
                            class="relative text-2xl text-sky-600 hover:text-sky-800 transition focus:outline-none"
                            title="Keranjang Belanja">
                            <i class="fas fa-shopping-cart"></i>
                            <?php $cartCount = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0; ?>
                            <?php if ($cartCount > 0): ?>
                                <span
                                    class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5 py-0.5 font-bold shadow">
                                    <?= $cartCount ?>
                                </span>
                            <?php endif; ?>
                        </button>
                    </div>

                    <div class="relative flex items-center">
                        <button id="guide-btn"
                            class="text-2xl text-sky-600 hover:text-sky-800 transition focus:outline-none"
                            title="Panduan Belanja">
                            <i class="fas fa-book-open"></i>
                        </button>

                        <div id="guide-backdrop" class="hidden fixed inset-0 bg-black/30 z-40"></div>
                        <div id="guide-popup"
                            class="hidden absolute right-0 mt-3 w-80 bg-white dark:bg-gray-800 border border-sky-200 dark:border-sky-700 rounded-2xl shadow-2xl z-50 animate-fade-in"
                            style="left:auto; right:0; top:48px;">
                            <div class="flex items-center justify-between p-4 border-b dark:border-gray-700">
                                <h3 class="text-lg font-bold text-sky-700 dark:text-sky-300 flex items-center gap-2">
                                    <i class="fas fa-shopping-basket"></i> Panduan Belanja
                                </h3>
                                <button id="close-guide-popup"
                                    class="text-gray-400 hover:text-red-500 text-xl">&times;</button>
                            </div>
                            <div class="p-4">
                                <ol class="list-decimal list-inside space-y-3 text-sm text-gray-600 dark:text-gray-300">
                                    <li>
                                        <span class="font-semibold text-gray-800 dark:text-white">Cari & Pilih
                                            Produk</span><br>
                                        Jelajahi produk kami melalui halaman "Produk" atau gunakan fitur pencarian. Klik
                                        pada produk untuk melihat detailnya.
                                    </li>
                                    <li>
                                        <span class="font-semibold text-gray-800 dark:text-white">Tambah ke
                                            Keranjang</span><br>
                                        Pada halaman produk, klik tombol "Tambah ke Keranjang" untuk memasukkan produk
                                        ke dalam daftar belanja Anda.
                                    </li>
                                    <li>
                                        <span class="font-semibold text-gray-800 dark:text-white">Cek Keranjang
                                            Belanja</span><br>
                                        Klik ikon keranjang <i class="fas fa-shopping-cart"></i> di pojok kanan atas
                                        untuk melihat ringkasan pesanan. Untuk mengubah jumlah atau menghapus produk, buka halaman <i class="fas fa-info-circle"></i> Info Keranjang.
                                    </li>
                                    <li>
                                        <span class="font-semibold text-gray-800 dark:text-white">Lanjutkan ke
                                            Checkout</span><br>
                                        Jika sudah sesuai, klik tombol "Checkout". Anda akan diminta untuk mengisi nama,
                                        alamat pengiriman, dan nomor telepon.
                                    </li>
                                    <li>
                                        <span class="font-semibold text-gray-800 dark:text-white">Selesaikan
                                            Pesanan</span><br>
                                        Periksa kembali semua informasi. Klik "Buat Pesanan" untuk menyelesaikan. Anda
                                        akan menerima detail pembayaran setelahnya.
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div id="cart-backdrop" class="hidden fixed inset-0 bg-black/30 z-40"></div>
                        <div id="cart-popup"
                            class="hidden absolute right-0 mt-3 w-80 bg-white border border-sky-200 rounded-2xl shadow-2xl z-50 animate-fade-in ring-2 ring-sky-200"
                            style="left:auto; right:0; top:48px;">
                            <div id="cart-popup-header"
                                class="p-4 border-b font-bold text-sky-700 flex items-center justify-between bg-gradient-to-r from-sky-50 to-sky-100 rounded-t-2xl select-none">
                                <span class="flex items-center gap-2"><i class="fas fa-shopping-cart text-sky-500"></i>
                                    Keranjang</span>
                                <button id="close-cart-popup" class="text-gray-400 hover:text-red-500 text-lg"><i
                                        class="fas fa-times"></i></button>
                            </div>
                            <div class="p-4 max-h-64 overflow-y-auto bg-white">
                                <?php if (!empty($_SESSION['cart'])): ?>
                                    <ul class="divide-y divide-gray-100">
                                        <?php foreach ($_SESSION['cart'] as $item): ?>
                                            <li class="py-2 flex items-center gap-3 group">
                                                <?php if (!empty($item['image'])): ?>
                                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt=""
                                                        class="w-12 h-12 object-cover rounded-lg border border-sky-100 shadow-sm">
                                                <?php endif; ?>
                                                <div class="flex-1">
                                                    <div class="font-semibold text-gray-800 text-sm line-clamp-1">
                                                        <?= htmlspecialchars($item['name']) ?>
                                                    </div>
                                                    <div class="text-xs text-gray-500">x<?= $item['qty'] ?> &bull; Rp
                                                        <?= number_format($item['price'], 0, ',', '.') ?>
                                                    </div>
                                                </div>
                                                <a href="?url=cart-remove&product_id=<?= $item['id'] ?>"
                                                    class="text-red-400 hover:text-red-600 transition text-base ml-2"
                                                    title="Hapus"><i class="fas fa-trash"></i></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <div class="text-gray-400 text-center py-8 flex flex-col items-center gap-2">
                                        <i class="fas fa-shopping-basket text-3xl mb-2"></i>
                                        Keranjang kosong.
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div
                                class="p-4 border-t flex justify-between items-center bg-gradient-to-r from-sky-50 to-sky-100 rounded-b-2xl">
                                <a href="?url=cart"
                                    class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-lg font-bold text-sm shadow flex items-center gap-2">
                                    <i class="fas fa-info-circle"></i> Info Keranjang
                                </a>
                                <a href="?url=order"
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-bold text-sm shadow flex items-center gap-2">
                                    <i class="fas fa-shopping-bag"></i> Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="sm:hidden">
                        <button id="mobile-menu-toggle" class="p-2 text-2xl text-gray-500 dark:text-gray-300">
                            <i id="menu-icon" class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="mobile-menu"
            class="sm:hidden hidden px-4 pb-4 bg-white/95 dark:bg-gray-800/95 rounded-b-lg shadow animate-fade-in">
            <a href="/proyek-1/public/"
                class="block text-base font-semibold text-sky-700 dark:text-white hover:text-sky-600 dark:hover:text-sky-300 py-2">Home</a>
            <a href="/proyek-1/public/#about"
                class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Tentang</a>
            <a href="?url=katalog"
                class="nav-link-underline block text-base font-semibold text-sky-600 dark:text-sky-300 py-2 transition-colors duration-300 font-bold">Produk</a>
        </div>
    </nav>
    <main class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300 mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="flex-1">
                <form method="get" action=""
                    class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-6 w-full">
                    <input type="hidden" name="url" value="katalog">
                    <div class="w-full sm:w-auto flex items-center gap-2">
                        <div class="relative w-full sm:w-64">
                            <input type="text" name="q" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
                                placeholder="Cari produk..."
                                class="border border-sky-200 focus:border-sky-400 focus:ring-2 focus:ring-sky-200 rounded-lg px-4 py-2 text-sm w-full transition placeholder-gray-400 bg-white shadow-sm" />
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-sky-400"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-2 bg-sky-50 dark:bg-sky-900 border border-sky-100 dark:border-sky-800 rounded-lg px-3 py-2 shadow-sm">
                        <span class="text-sm text-gray-600 dark:text-gray-300 font-semibold mr-1"><i
                                class="fas fa-filter mr-1"></i>Kategori</span>
                        <div class="select-wrapper">
                            <select name="category" onchange="this.form.submit()"
                                class="border-none bg-transparent text-sky-700 dark:text-sky-200 font-semibold focus:ring-0 focus:outline-none text-sm py-1 px-2 rounded">
                                <option value="">Semua Kategori</option>
                                <?php if (!empty($categories))
                                    foreach ($categories as $cat): ?>
                                        <option value="<?= htmlspecialchars($cat['id']) ?>" <?= (isset($_GET['category']) && $_GET['category'] == $cat['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($cat['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            <?php foreach ($products as $p): ?>
                <div
                    class="product-card bg-white rounded-2xl shadow-lg border border-sky-100 hover:shadow-2xl hover:border-blue-400 transition-all duration-300 group overflow-hidden relative flex flex-col h-full">
                    <a href="?url=produk-detail&id=<?= $p['id'] ?>" class="block">
                        <div class="relative overflow-hidden">
                            <?php if (!empty($p['image'])): ?>
                                <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>"
                                    class="w-full h-36 sm:h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                            <?php else: ?>
                                <div
                                    class="w-full h-36 sm:h-48 flex items-center justify-center bg-gray-100 text-gray-400 text-sm">
                                    Tidak ada gambar</div>
                            <?php endif; ?>
                        </div>
                    </a>
                    <div class="p-3 sm:p-4 flex flex-col gap-2 flex-1">
                        <h3
                            class="font-bold text-gray-800 text-sm sm:text-base leading-snug group-hover:text-blue-700 transition-colors line-clamp-2 min-h-[2.5em]">
                            <?= htmlspecialchars($p['name']) ?>
                        </h3>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-1 mb-2">
                            <span class="text-blue-600 font-extrabold text-base sm:text-lg">
                                Rp <?= number_format($p['price'], 0, ',', '.') ?>
                                <?= !empty($p['unit']) ? '<span class="text-gray-500 text-xs sm:text-sm">/' . htmlspecialchars($p['unit']) . '</span>' : '' ?>
                            </span>
                            <span
                                class="mt-1 sm:mt-0 inline-flex items-center gap-1 bg-gradient-to-r from-emerald-200 to-emerald-400/80 text-emerald-900 font-bold px-2 py-0.5 sm:px-3 sm:py-1 rounded-full shadow-sm border border-emerald-300 text-[10px] sm:text-xs self-start">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-emerald-700" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="18" height="13" rx="2" fill="#d1fae5" />
                                    <path d="M3 7V5a2 2 0 012-2h14a2 2 0 012 2v2" stroke="#059669" stroke-width="2" />
                                </svg>
                                Stok: <?= $p['stock'] ?>
                            </span>
                        </div>

                        <div class="text-xs sm:text-sm text-gray-600 space-y-2 my-1">
                            <?php if (!empty($p['category_name'])): ?>
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-gray-700 w-14 shrink-0">Kategori</span>
                                    <span>:</span>
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-blue-100 text-blue-800 font-semibold px-2.5 py-1 rounded-full">
                                        <i class="fas fa-tag text-blue-600 opacity-80"></i>
                                        <?= htmlspecialchars($p['category_name']) ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($p['color'])): ?>
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-gray-700 w-14 shrink-0">Warna</span>
                                    <span>:</span>
                                    <?php $colorCode = getColorCode($p['color']); ?>
                                    <span class="inline-block w-4 h-4 rounded-full border border-gray-300 shadow-sm"
                                        style="background:<?= htmlspecialchars($colorCode) ?>;"
                                        title="<?= htmlspecialchars($p['color']) ?>"></span>
                                    <span class="text-gray-500 font-medium"><?= htmlspecialchars($p['color']) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="pt-3 mt-auto">
                            <a href="?url=cart-add&product_id=<?= $p['id'] ?>"
                                class="w-full bg-gradient-to-r from-blue-600 to-sky-500 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg text-[11px] sm:text-sm font-bold shadow hover:from-blue-700 hover:to-sky-600 transition flex items-center justify-center gap-2"
                                onclick="event.preventDefault(); addToCart(<?= $p['id'] ?>);">
                                <span>Tambah ke Keranjang</span>
                                <i class="fas fa-shopping-cart text-white text-[11px] sm:text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <!-- Footer Section -->
    <footer class="bg-sky-800 text-white mt-12">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <div>
                    <h3 class="text-xl font-bold mb-3">Lokasi Kami</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4977418860835!2d106.88535447440961!3d-6.197870460716725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5045d4c5cc5%3A0x3e9a9ec26746ed3d!2sParis%20Plastik!5e0!3m2!1sen!2sid!4v1751128962289!5m2!1sen!2sid"
                        width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded-md shadow-md max-w-md"></iframe>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-3">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-sky-300 mt-1"></i>
                            <p class="text-gray-200 text-sm">Jl. Pinang Raya No.23, RT.9/RW.8, Rawamangun, Kec. Pulo
                                Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone-alt text-sky-300"></i>
                            <p class="text-gray-200">0822-6074-7187</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-sky-300"></i>
                            <p class="text-gray-200">farisplastik@gmail.com</p>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mt-5 mb-2">Ikuti Kami</h3>
                    <div class="flex space-x-4 mt-1">
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-sky-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-facebook-f text-lg"></i></a>
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-pink-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-instagram text-lg"></i></a>
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-green-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-whatsapp text-lg"></i></a>
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-black rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-tiktok text-lg"></i></a>
                    </div>
                </div>
            </div>
            <div
                class="border-t border-sky-700 mt-8 pt-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <div class="text-sm text-gray-200">&copy; 2025 Paris Plastik. Hak Cipta Dilindungi.</div>
                <div class="flex flex-wrap gap-4 text-sm">
                    <a href="#" class="text-gray-200 hover:text-white transition">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Cart popup logic
        const cartBtn = document.getElementById('cart-btn');
        const cartPopup = document.getElementById('cart-popup');
        const cartBackdrop = document.getElementById('cart-backdrop');
        const closeCartPopup = document.getElementById('close-cart-popup');
        if (cartBtn && cartPopup) {
            cartBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                cartPopup.classList.toggle('hidden');
                if (cartBackdrop) cartBackdrop.classList.toggle('hidden');
            });
            if (closeCartPopup) {
                closeCartPopup.addEventListener('click', function (e) {
                    cartPopup.classList.add('hidden');
                    if (cartBackdrop) cartBackdrop.classList.add('hidden');
                });
            }
            if (cartBackdrop) {
                cartBackdrop.addEventListener('click', function (e) {
                    cartPopup.classList.add('hidden');
                    cartBackdrop.classList.add('hidden');
                });
            }
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    cartPopup.classList.add('hidden');
                    if (cartBackdrop) cartBackdrop.classList.add('hidden');
                }
            });
        }

        function addToCart(productId) {
            fetch(`?url=cart-add&product_id=${productId}`, { credentials: 'same-origin' })
                .then(res => res.text())
                .then(() => {
                    location.reload();
                });
        }

        const html = document.documentElement;
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const themeToggles = document.querySelectorAll('#theme-toggle, #theme-toggle-mobile');
        let isOpen = false;
        menuToggle.addEventListener('click', () => {
            if (!isOpen) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.remove('animate-slide-up');
                mobileMenu.classList.add('animate-slide-down');
                menuIcon.classList.replace('fa-bars', 'fa-times');
                isOpen = true;
            } else {
                mobileMenu.classList.remove('animate-slide-down');
                mobileMenu.classList.add('animate-slide-up');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 200);
                menuIcon.classList.replace('fa-times', 'fa-bars');
                isOpen = false;
            }
        });
        themeToggles.forEach(btn => {
            btn.addEventListener('click', () => {
                html.classList.toggle('dark');
            });
        });

        // --- Logika untuk Pop-up Panduan (Gunakan kode ini) ---
        const guideBtn = document.getElementById('guide-btn');
        const guidePopup = document.getElementById('guide-popup');
        const guideBackdrop = document.getElementById('guide-backdrop');
        const closeGuidePopup = document.getElementById('close-guide-popup');
        if (guideBtn && guidePopup) {
            guideBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                guidePopup.classList.toggle('hidden');
                if (guideBackdrop) guideBackdrop.classList.toggle('hidden');
            });
            if (closeGuidePopup) {
                closeGuidePopup.addEventListener('click', function (e) {
                    guidePopup.classList.add('hidden');
                    if (guideBackdrop) guideBackdrop.classList.add('hidden');
                });
            }
            if (guideBackdrop) {
                guideBackdrop.addEventListener('click', function (e) {
                    guidePopup.classList.add('hidden');
                    guideBackdrop.classList.add('hidden');
                });
            }
        }

        // Menutup kedua pop-up dengan tombol Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                if (cartPopup && !cartPopup.classList.contains('hidden')) {
                    cartPopup.classList.add('hidden');
                    if (cartBackdrop) cartBackdrop.classList.add('hidden');
                }
                if (guidePopup && !guidePopup.classList.contains('hidden')) {
                    guidePopup.classList.add('hidden');
                    if (guideBackdrop) guideBackdrop.classList.add('hidden');
                }
            }
        });
    </script>
</body>

</html>