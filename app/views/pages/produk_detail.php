<?php session_start(); // <-- ❗️ TAMBAHKAN BARIS INI ❗️
require_once __DIR__ . '/../../core/helpers.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - <?= htmlspecialchars($product['name']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
    <style>
        .nav-link-underline {
            position: relative;
            transition: color 0.2s;
        }

        .nav-link-underline::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: #0ea5e9;
            border-radius: 2px;
            transform: scaleX(0);
            transition: transform 0.2s;
        }

        .nav-link-underline:hover::after,
        .nav-link-underline:focus::after,
        .nav-link-underline.active::after {
            transform: scaleX(1);
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
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
                                        untuk melihat ringkasan pesanan. Untuk mengubah jumlah atau menghapus produk,
                                        buka halaman <i class="fas fa-info-circle"></i> Info Keranjang.
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
    <main class="max-w-4xl mx-auto px-4 py-10">
        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-sky-100 dark:border-gray-700 flex flex-col md:flex-row gap-10 p-8 md:p-12 animate-fade-in">
            <div class="flex-shrink-0 w-full md:w-1/2 flex flex-col items-center justify-center">
                <?php if (!empty($product['image'])): ?>
                    <div class="relative w-full max-w-xs h-80 group">
                        <img src="<?= htmlspecialchars($product['image']) ?>"
                            alt="<?= htmlspecialchars($product['name']) ?>"
                            class="w-full h-80 object-contain bg-white rounded-2xl shadow-2xl border-4 border-sky-200 dark:border-sky-900 group-hover:scale-105 transition-transform duration-300 ring-4 ring-sky-100 dark:ring-sky-900">
                    </div>
                <?php else: ?>
                    <div
                        class="w-full h-80 flex items-center justify-center bg-gray-100 text-gray-400 text-lg rounded-xl mb-4 border-2 border-dashed border-sky-200">
                        Tidak ada gambar</div>
                <?php endif; ?>
            </div>
            <div class="flex-1 flex flex-col gap-4 justify-center">
                <h1
                    class="text-3xl md:text-4xl font-extrabold text-sky-700 dark:text-sky-300 mb-2 leading-tight drop-shadow-lg">
                    <?= htmlspecialchars($product['name']) ?>
                </h1>
                <div class="flex flex-wrap items-center gap-4 mb-2">
                    <span class="text-blue-600 font-extrabold text-2xl md:text-3xl">Rp
                        <?= number_format($product['price'], 0, ',', '.') ?><?= !empty($product['unit']) ? '/' . htmlspecialchars($product['unit']) : '' ?></span>
                </div>
                <div class="mb-2">
                    <span
                        class="inline-flex items-center gap-1 bg-gradient-to-r from-emerald-200 to-emerald-400/80 text-emerald-900 font-bold px-3 py-1 rounded-full shadow-sm border border-emerald-300 text-xs">
                        <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <rect x="3" y="7" width="18" height="13" rx="2" fill="#d1fae5" />
                            <path d="M3 7V5a2 2 0 012-2h14a2 2 0 012 2v2" stroke="#059669" stroke-width="2" />
                        </svg>
                        Stok: <?= $product['stock'] ?>
                    </span>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-2">
                    <div>
                        <span class="font-semibold text-gray-700 dark:text-gray-200">Kategori:</span>
                        <div class="text-gray-600 dark:text-gray-300">
                            <span
                                class="inline-block bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-semibold shadow-sm align-middle">
                                <i class="fas fa-tag mr-1"></i><?= htmlspecialchars($categoryName) ?>
                            </span>
                        </div>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-500 dark:text-gray-300">Warna:</span>
                        <div class="flex items-center gap-2 mt-1">
                            <?php if (!empty($product['color'])): ?>
                                <?php $colorCode = getColorCode($product['color']); ?>
                                <span class="inline-block w-5 h-5 rounded-full border-2 border-emerald-300 shadow"
                                    style="background:<?= htmlspecialchars($colorCode) ?>;"
                                    title="<?= htmlspecialchars($product['color']) ?>"></span>
                                <span
                                    class="text-emerald-900 dark:text-emerald-200 font-semibold text-sm"><?= htmlspecialchars($product['color']) ?></span>
                            <?php else: ?>
                                <span class="text-gray-400 italic">-</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700 dark:text-gray-200">Dimensi:</span>
                        <div class="flex items-center gap-2 mt-1">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-sky-100 to-sky-300/60 dark:from-sky-900 dark:to-sky-700 text-sky-900 dark:text-sky-100 font-semibold text-sm shadow border border-sky-200 dark:border-sky-800">
                                <i class="fas fa-ruler-combined mr-2 text-sky-400 dark:text-sky-200"></i>
                                <?= htmlspecialchars($product['dimensions']) ?: '<span class=\'text-gray-400 italic\'>-</span>' ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700 dark:text-gray-200">Deskripsi:</span>
                    <div
                        class="text-gray-600 dark:text-gray-300 leading-relaxed mt-1 bg-sky-50 dark:bg-sky-900/30 rounded-lg p-4 shadow-inner border border-sky-100 dark:border-sky-800">
                        <?= nl2br(htmlspecialchars($product['description'])) ?>
                    </div>
                </div>

                <div class="pt-3 mt-auto">
                    <a href="?url=cart-add&product_id=<?= $product['id'] ?>"
                        class="w-full bg-gradient-to-r from-blue-600 to-sky-500 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg text-[11px] sm:text-sm font-bold shadow hover:from-blue-700 hover:to-sky-600 transition flex items-center justify-center gap-2"
                        onclick="event.preventDefault(); addToCart(<?= $product['id'] ?>);">
                        <span>Tambah ke Keranjang</span>
                        <i class="fas fa-shopping-cart text-white text-[11px] sm:text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>
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
        // Fungsi untuk menambahkan produk ke keranjang
        function addToCart(productId) {
            fetch(`?url=cart-add&product_id=${productId}`, {
                credentials: 'same-origin'
            })
                .then(res => {
                    if (res.ok) {
                        location.reload();
                    } else {
                        alert('Gagal menambahkan produk ke keranjang.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan koneksi.');
                });
        }

        // Menjalankan script setelah seluruh halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {

            // Logika untuk Cart Popup
            const cartBtn = document.getElementById('cart-btn');
            const cartPopup = document.getElementById('cart-popup');
            const cartBackdrop = document.getElementById('cart-backdrop');
            const closeCartPopup = document.getElementById('close-cart-popup');

            if (cartBtn && cartPopup && cartBackdrop && closeCartPopup) {
                const toggleCart = () => {
                    cartPopup.classList.toggle('hidden');
                    cartBackdrop.classList.toggle('hidden');
                };
                const closeCart = () => {
                    cartPopup.classList.add('hidden');
                    cartBackdrop.classList.add('hidden');
                };

                cartBtn.addEventListener('click', toggleCart);
                closeCartPopup.addEventListener('click', closeCart);
                cartBackdrop.addEventListener('click', closeCart);
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && !cartPopup.classList.contains('hidden')) {
                        closeCart();
                    }
                });
            }

            // Logika untuk Mobile Menu
            const menuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');

            if (menuToggle && mobileMenu && menuIcon) {
                menuToggle.addEventListener('click', () => {
                    const isOpen = !mobileMenu.classList.contains('hidden');
                    if (!isOpen) {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.classList.remove('animate-slide-up');
                        mobileMenu.classList.add('animate-slide-down');
                        menuIcon.classList.replace('fa-bars', 'fa-times');
                    } else {
                        mobileMenu.classList.remove('animate-slide-down');
                        mobileMenu.classList.add('animate-slide-up');
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                        }, 200);
                        menuIcon.classList.replace('fa-times', 'fa-bars');
                    }
                });
            }
        });

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