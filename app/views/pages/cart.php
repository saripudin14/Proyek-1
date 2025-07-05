<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
    <meta name="description" content="Supplier produk plastik berkualitas, harga grosir, pelayanan ramah, dan pengiriman cepat.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@preline/preline@2.0.0/dist/preline.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            background-color: #0ea5e9;
            transition: transform 0.3s ease-out;
        }
        .nav-link-underline:hover::after {
            transform: translateX(-50%) scaleX(1);
        }
        .hero-bg {
            background-image: linear-gradient(rgba(2,132,199,0.7),rgba(2,132,199,0.7)), url('https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        .glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(6px);
            border-radius: 1rem;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.15);
        }
        .feature-icon {
            background: linear-gradient(135deg, #0ea5e9 60%, #38bdf8 100%);
        }
        .cta-btn {
            box-shadow: 0 4px 14px 0 rgba(14,165,233,0.15);
        }
        .cta-btn:hover {
            box-shadow: 0 8px 24px 0 rgba(14,165,233,0.25);
        }
        @keyframes slideDown {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            0% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-10px); }
        }
        .animate-slide-down { animation: slideDown 0.3s ease-out forwards; }
        .animate-slide-up { animation: slideUp 0.2s ease-in forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
    </style>
</head>
<body class="bg-gradient-to-br from-sky-50 to-white dark:from-gray-900 dark:to-gray-950 min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="bg-white/90 dark:bg-gray-800/90 shadow-sm sticky top-0 z-50 backdrop-blur-md border-b border-sky-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="?url=home" class="text-2xl font-extrabold text-sky-600 dark:text-sky-300 tracking-tight flex items-center gap-2">
                        Paris Plastik
                    </a>
                </div>
                <!-- Menu tengah desktop -->
                <div class="hidden sm:flex sm:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="?url=home" class="nav-link-underline text-sky-700 dark:text-white px-3 py-2 text-base font-semibold">Home</a>
                    <a href="#about" class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Tentang</a>
                    <a href="?url=katalog" class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Produk</a>
                </div>
                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button id="mobile-menu-toggle" class="p-2 text-2xl text-gray-500 dark:text-gray-300">
                        <i id="menu-icon" class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="sm:hidden hidden px-4 pb-4 bg-white/95 dark:bg-gray-800/95 rounded-b-lg shadow animate-fade-in">
            <a href="?url=home" class="block text-base font-semibold text-sky-700 dark:text-white hover:text-sky-600 dark:hover:text-sky-300 py-2">Home</a>
            <a href="#about" class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Tentang</a>
            <a href="?url=katalog" class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Produk</a>
        </div>
    </nav>
    <script>
        const html = document.documentElement;
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        let isOpen = false;
        if(menuToggle && mobileMenu && menuIcon) {
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
        }
    </script>
    <!-- END Navigation -->

    <div class="max-w-3xl mx-auto py-12 animate-fade-in">
        <h2 class="text-3xl font-extrabold mb-8 text-center text-sky-700 dark:text-sky-300 drop-shadow-lg">Keranjang Belanja</h2>
        <?php if (empty($cart)): ?>
            <div class="bg-yellow-100 text-yellow-800 px-6 py-4 rounded-lg text-center mb-8 shadow animate-fade-in">Keranjang masih kosong.</div>
        <?php else: ?>
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl p-6 md:p-10 mb-8 border border-sky-100 dark:border-gray-800">
            <table class="min-w-full text-base">
                <thead class="bg-sky-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-3 py-3 text-sky-700 dark:text-sky-300 font-bold text-left">Produk</th>
                        <th class="px-3 py-3 text-sky-700 dark:text-sky-300 font-bold">Harga</th>
                        <th class="px-3 py-3 text-sky-700 dark:text-sky-300 font-bold">Jumlah</th>
                        <th class="px-3 py-3 text-sky-700 dark:text-sky-300 font-bold">Subtotal</th>
                        <th class="px-3 py-3 text-sky-700 dark:text-sky-300 font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; foreach ($cart as $item): $subtotal = $item['price'] * $item['qty']; $total += $subtotal; ?>
                    <tr class="border-b border-sky-50 dark:border-gray-800 hover:bg-sky-50/60 dark:hover:bg-gray-800/60 transition">
                        <td class="px-3 py-4 flex items-center gap-4">
                            <?php if (!empty($item['image'])): ?>
                                <img src="<?= htmlspecialchars($item['image']) ?>" alt="" class="w-16 h-16 object-cover rounded-lg shadow border border-sky-100 dark:border-gray-700">
                            <?php endif; ?>
                            <span class="font-semibold text-slate-800 dark:text-sky-100 text-lg"><?= htmlspecialchars($item['name']) ?></span>
                        </td>
                        <td class="px-3 py-4 text-sky-700 dark:text-sky-300 font-medium">Rp <?= number_format($item['price'],0,',','.') ?>/<?= htmlspecialchars($item['unit']) ?></td>
                        <td class="px-3 py-4">
                            <div class="flex items-center gap-2 justify-center">
                                <a href="?url=cart-add&product_id=<?= $item['id'] ?>&action=decrement" class="bg-sky-100 dark:bg-gray-800 text-sky-600 dark:text-sky-300 rounded-full w-8 h-8 flex items-center justify-center hover:bg-sky-200 dark:hover:bg-gray-700 transition text-xl font-bold">-</a>
                                <span class="mx-2 text-lg font-semibold text-slate-800 dark:text-sky-100"><?= $item['qty'] ?></span>
                                <a href="?url=cart-add&product_id=<?= $item['id'] ?>&action=increment" class="bg-sky-100 dark:bg-gray-800 text-sky-600 dark:text-sky-300 rounded-full w-8 h-8 flex items-center justify-center hover:bg-sky-200 dark:hover:bg-gray-700 transition text-xl font-bold">+</a>
                            </div>
                        </td>
                        <td class="px-3 py-4 text-sky-700 dark:text-sky-300 font-semibold">Rp <?= number_format($subtotal,0,',','.') ?></td>
                        <td class="px-3 py-4">
                            <a href="?url=cart-remove&product_id=<?= $item['id'] ?>" class="inline-flex items-center gap-1 text-red-600 dark:text-red-400 hover:underline font-semibold"><i class="fas fa-trash-alt"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="flex flex-col md:flex-row md:justify-between items-center mt-8 gap-4">
                <div class="text-xl font-bold text-sky-700 dark:text-sky-300">Total: <span class="text-2xl">Rp <?= number_format($total,0,',','.') ?></span></div>
                <div class="flex gap-3 mt-2 md:mt-0">
                    <a href="?url=cart-clear" class="inline-flex items-center gap-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 px-5 py-2 rounded-lg font-semibold shadow transition"><i class="fas fa-trash"></i> Kosongkan</a>
                    <a href="?url=order" class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-6 py-2 rounded-lg font-bold shadow transition"><i class="fas fa-credit-card"></i> Checkout</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="mt-10 text-center">
            <a href="?url=katalog" class="inline-flex items-center gap-2 text-sky-600 dark:text-sky-300 hover:underline font-semibold text-lg"><i class="fas fa-arrow-left"></i> Kembali ke Katalog</a>
        </div>
    </div>

    <footer class="bg-sky-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <div>
                    <h3 class="text-xl font-bold mb-3">Lokasi Kami</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4977418860835!2d106.88535447440961!3d-6.197870460716725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5045d4c5cc5%3A0x3e9a9ec26746ed3d!2sParis%20Plastik!5e0!3m2!1sen!2sid!4v1751128962289!5m2!1sen!2sid" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-md shadow-md max-w-md"></iframe>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-3">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-sky-300 mt-1"></i>
                            <p class="text-gray-200 text-sm">Jl. Pinang Raya No.23, RT.9/RW.8, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
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
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-sky-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-facebook-f text-lg"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-pink-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-instagram text-lg"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-green-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-whatsapp text-lg"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-black rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-tiktok text-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-sky-700 mt-8 pt-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <div class="text-sm text-gray-200">&copy; 2025 Paris Plastik. Hak Cipta Dilindungi.</div>
                <div class="flex flex-wrap gap-4 text-sm">
                    <a href="#" class="text-gray-200 hover:text-white transition">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
