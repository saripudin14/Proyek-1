<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <main class="p-8 bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-blue-800 animate-fade-in">Selamat Datang,
                    <?= htmlspecialchars($user['name']) ?>!</h1>

                <div class="flex items-center gap-4">
                    <a href="?url=register"
                        class="bg-blue-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold shadow-md transition-all duration-200 flex items-center gap-2">
                        <i data-feather ="user-plus" class="w-5 h-5"></i>
                        Tambah Admin
                    </a>
                    <a href="/proyek-1/public/?url=logout"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-semibold shadow-md transition-all duration-200 flex items-center gap-2">
                        <i data-feather="log-out" class="w-5 h-5"></i>
                        Logout
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-100">
                    <div class="bg-blue-100 p-3 rounded-full mb-2"><i data-feather="box"
                            class="w-6 h-6 text-blue-600"></i></div>
                    <div class="text-2xl font-bold text-blue-700">Produk</div>
                    <div class="text-3xl font-extrabold text-blue-800 my-2"><?= $stat_produk ?></div>
                    <div class="text-gray-500">Manajemen Produk</div>
                    <a href="/proyek-1/public/?url=produk"
                        class="mt-3 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded font-semibold shadow transition-all duration-200 nav-link-underline">Lihat
                        Produk</a>
                </div>
                <div
                    class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-200">
                    <div class="bg-green-100 p-3 rounded-full mb-2"><i data-feather="layers"
                            class="w-6 h-6 text-green-600"></i></div>
                    <div class="text-2xl font-bold text-green-700">Kategori</div>
                    <div class="text-3xl font-extrabold text-green-800 my-2"><?= $stat_kategori ?></div>
                    <div class="text-gray-500">Manajemen Kategori</div>
                    <a href="/proyek-1/public/?url=kategori"
                        class="mt-3 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded font-semibold shadow transition-all duration-200">Lihat
                        Kategori</a>
                </div>
                <div
                    class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-300">
                    <div class="bg-green-100 p-3 rounded-full mb-2"><i data-feather="shopping-cart"
                            class="w-6 h-6 text-green-600"></i></div>
                    <div class="text-2xl font-bold text-green-700">Pesanan</div>
                    <div class="text-3xl font-extrabold text-green-800 my-2"><?= $stat_pesanan ?></div>
                    <div class="text-gray-500">Manajemen Pesanan</div>
                    <a href="/proyek-1/public/?url=pesanan"
                        class="mt-3 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded font-semibold shadow transition-all duration-200">Lihat
                        Pesanan</a>
                </div>
                <div
                    class="bg-white rounded shadow p-6 flex flex-col items-center product-card animate-fade-in delay-400">
                    <div class="bg-purple-100 p-3 rounded-full mb-2"><i data-feather="bar-chart-2"
                            class="w-6 h-6 text-purple-600"></i></div>
                    <div class="text-2xl font-bold text-purple-700">Penjualan</div>
                    <div class="text-3xl font-extrabold text-purple-800 my-2">Rp
                        <?= number_format($stat_total_penjualan, 0, ',', '.') ?></div>
                    <div class="text-gray-500">Total Penjualan</div>
                </div>
            </div>
        </div>
    </main>
    <script>feather.replace()</script>
</body>

</html>