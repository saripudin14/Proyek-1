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
        .nav-link-underline { position: relative; }
        .nav-link-underline::after { content: ''; position: absolute; left: 50%; bottom: 0; transform: translateX(-50%) scaleX(0); transform-origin: center; width: 100%; height: 2px; background-color: currentColor; transition: transform 0.3s ease-out; }
        .nav-link-underline:hover::after { transform: translateX(-50%) scaleX(1); }
        .product-card { transition: all 0.3s ease; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); }
        .filter-checkbox:checked+.filter-label { background-color: #3b82f6; color: white; }
        @keyframes slideDown { 0% { opacity: 0; transform: translateY(-10px); } 100% { opacity: 1; transform: translateY(0); } }
        @keyframes slideUp { 0% { opacity: 1; transform: translateY(0); } 100% { opacity: 0; transform: translateY(-10px); } }
        .animate-slide-down { animation: slideDown 0.3s ease-out forwards; }
        .animate-slide-up { animation: slideUp 0.2s ease-in forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Navigation -->
    <nav class="bg-white/90 dark:bg-gray-800/90 shadow-sm sticky top-0 z-50 backdrop-blur-md border-b border-sky-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="/proyek-1/public/" class="text-2xl font-extrabold text-sky-600 dark:text-sky-300 tracking-tight flex items-center gap-2">
                        Paris Plastik
                    </a>
                </div>
                <!-- Menu tengah desktop -->
                <div class="hidden sm:flex sm:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="/proyek-1/public/" class="nav-link-underline text-sky-700 dark:text-white px-3 py-2 text-base font-semibold">Home</a>
                    <a href="/proyek-1/public/#about" class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Tentang</a>
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
            <a href="/proyek-1/public/" class="block text-base font-semibold text-sky-700 dark:text-white hover:text-sky-600 dark:hover:text-sky-300 py-2">Home</a>
            <a href="/proyek-1/public/#about" class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Tentang</a>
            <a href="?url=katalog" class="nav-link-underline block text-base font-semibold text-sky-600 dark:text-sky-300 py-2 transition-colors duration-300 font-bold">Produk</a>
        </div>
    </nav>
    <main class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300 mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="flex-1">
                <form method="get" action="" class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-6 w-full">
                    <input type="hidden" name="url" value="katalog">
                    <!-- pencarian -->
                    <div class="w-full sm:w-auto flex items-center gap-2">
                        <div class="relative w-full sm:w-64">
                            <input type="text" name="q" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" placeholder="Cari produk..." class="border border-sky-200 focus:border-sky-400 focus:ring-2 focus:ring-sky-200 rounded-lg px-4 py-2 text-sm w-full transition placeholder-gray-400 bg-white shadow-sm" />
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-sky-400"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <!-- sorting/filter kategori -->
                    <div class="flex items-center gap-2 bg-sky-50 dark:bg-sky-900 border border-sky-100 dark:border-sky-800 rounded-lg px-3 py-2 shadow-sm">
                        <span class="text-sm text-gray-600 dark:text-gray-300 font-semibold mr-1"><i class="fas fa-filter mr-1"></i>Kategori</span>
                        <select name="category" onchange="this.form.submit()" class="border-none bg-transparent text-sky-700 dark:text-sky-200 font-semibold focus:ring-0 focus:outline-none text-sm py-1 px-2 rounded">
                            <option value="">Pilih Kategori</option>
                            <?php if (!empty($categories)) foreach ($categories as $cat): ?>
                                <option value="<?= htmlspecialchars($cat['id']) ?>" <?= (isset($_GET['category']) && $_GET['category'] == $cat['id']) ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <!-- produk -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($products as $p): ?>
            <div class="product-card bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300">
                <div class="relative">
                    <?php if (!empty($p['image'])): ?>
                        <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="w-full h-48 object-cover">
                    <?php else: ?>
                        <div class="w-full h-48 flex items-center justify-center bg-gray-100 text-gray-400">Tidak ada gambar</div>
                    <?php endif; ?>
                </div>
                <div class="p-4 flex flex-col gap-2">
                    <h3 class="font-semibold text-gray-800 text-sm sm:text-base leading-snug">
                        <?= htmlspecialchars($p['name']) ?>
                    </h3>
                    <p class="text-sm text-blue-600 font-bold leading-tight">Rp <?= number_format($p['price'],0,',','.') ?></p>
                    <p class="text-sm text-gray-600 leading-tight">
                        <span class="font-medium text-gray-700">Stok:</span> <?= $p['stock'] ?>
                    </p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <?php if (!empty($p['category_name'])): ?>
                            <span class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full font-medium hover:bg-blue-200 transition"><?= htmlspecialchars($p['category_name']) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="pt-1">
                        <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition flex items-center justify-center gap-2">
                            Pesan
                            <i class="fas fa-shopping-cart text-white text-sm"></i>
                        </button>
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
    <script src="/proyek-1/public/js/product.js"></script>
</body>
</html>
