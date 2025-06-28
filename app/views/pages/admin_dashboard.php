<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
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
    </style>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 p-4 text-white flex justify-between items-center shadow">
        <div class="font-bold text-lg flex items-center gap-2">
            <span class="inline-block bg-gradient-to-r from-blue-400 to-blue-700 p-2 rounded-full shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" style="display:none"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" style="display:none"/>
                    <!-- Ikon user -->
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1121 12a9 9 0 01-15.879 5.804z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14c-4 0-6 2-6 4v1h12v-1c0-2-2-4-6-4z" />
                </svg>
            </span>
            <span class="tracking-wide drop-shadow font-extrabold text-xl">Admin Dashboard</span>
        </div>
        <div>
            <span class="mr-4">Halo, <?= htmlspecialchars($user['nama_lengkap']) ?></span>
            <a href="/proyek-1/public/?url=logout" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-4 py-2 rounded shadow transition-all duration-200 font-semibold">
                <i data-feather="log-out" class="w-5 h-5"></i> Logout
            </a>
        </div>
    </nav>
    <main class="p-8 bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold text-blue-800 mb-6 animate-fade-in">Selamat Datang, <?= htmlspecialchars($user['nama_lengkap']) ?>!</h1>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-100">
                    <div class="bg-blue-100 p-3 rounded-full mb-2"><i data-feather="box" class="w-6 h-6 text-blue-600"></i></div>
                    <div class="text-2xl font-bold text-blue-700">Produk</div>
                    <div class="text-3xl font-extrabold text-blue-800 my-2"><?= $stat_produk ?></div>
                    <div class="text-gray-500">Manajemen Produk</div>
                    <a href="/proyek-1/public/?url=produk" class="mt-3 text-blue-600 hover:underline nav-link-underline">Lihat Produk</a>
                </div>
                <div class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-200">
                    <div class="bg-green-100 p-3 rounded-full mb-2"><i data-feather="layers" class="w-6 h-6 text-green-600"></i></div>
                    <div class="text-2xl font-bold text-green-700">Kategori</div>
                    <div class="text-3xl font-extrabold text-green-800 my-2"><?= $stat_kategori ?></div>
                    <div class="text-gray-500">Manajemen Kategori</div>
                    <a href="/proyek-1/public/?url=kategori" class="mt-3 text-green-600 hover:underline nav-link-underline">Lihat Kategori</a>
                </div>
                <div class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-300">
                    <div class="bg-yellow-100 p-3 rounded-full mb-2"><i data-feather="shopping-cart" class="w-6 h-6 text-yellow-600"></i></div>
                    <div class="text-2xl font-bold text-yellow-700">Pesanan</div>
                    <div class="text-3xl font-extrabold text-yellow-800 my-2"><?= $stat_pesanan ?></div>
                    <div class="text-gray-500">Manajemen Pesanan</div>
                    <a href="/proyek-1/public/?url=pesanan" class="mt-3 text-yellow-600 hover:underline nav-link-underline">Lihat Pesanan</a>
                </div>
                <div class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-400">
                    <div class="bg-purple-100 p-3 rounded-full mb-2"><i data-feather="bar-chart-2" class="w-6 h-6 text-purple-600"></i></div>
                    <div class="text-2xl font-bold text-purple-700">Penjualan</div>
                    <div class="text-3xl font-extrabold text-purple-800 my-2">Rp <?= number_format($stat_total_penjualan,0,',','.') ?></div>
                    <div class="text-gray-500">Total Penjualan</div>
                </div>
            </div>
            <div class="bg-white rounded shadow p-8 mt-8 animate-fade-in delay-200">
                <h2 class="text-xl font-bold mb-4 text-blue-700">Akses Cepat</h2>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <li><a href="/proyek-1/public/?url=produk-tambah" class="block bg-blue-600 text-white px-4 py-3 rounded hover:bg-blue-700 font-semibold text-center nav-link-underline">+ Tambah Produk</a></li>
                    <li><a href="/proyek-1/public/?url=kategori-tambah" class="block bg-green-600 text-white px-4 py-3 rounded hover:bg-green-700 font-semibold text-center nav-link-underline">+ Tambah Kategori</a></li>
                </ul>
            </div>
        </div>
    </main>
    <script>feather.replace()</script>
</body>
</html>
