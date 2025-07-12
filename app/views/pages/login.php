<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Paris Plastik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-md flex-shrink-0">
            <div class="p-6 text-center border-b border-gray-200 dark:border-gray-700">
                <a href="?url=admin-dashboard" class="text-2xl font-extrabold text-sky-600 dark:text-sky-300">
                    Paris Plastik
                </a>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">ADMIN PANEL</p>
            </div>
            <div class="p-4">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 rounded-full bg-sky-100 dark:bg-sky-900 mx-auto flex items-center justify-center mb-2">
                        <i class="fas fa-user-shield text-4xl text-sky-500"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 dark:text-white"><?= htmlspecialchars($user['name']) ?></h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400"><?= htmlspecialchars($user['email']) ?></p>
                </div>

                <nav class="space-y-2">
                    <a href="?url=admin-dashboard" class="flex items-center gap-3 px-4 py-2 text-white bg-sky-600 rounded-lg">
                        <i class="fas fa-tachometer-alt fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="?url=produk" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-box fa-fw"></i>
                        <span>Produk</span>
                    </a>
                    <a href="?url=kategori" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-tags fa-fw"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="?url=pesanan" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-shopping-cart fa-fw"></i>
                        <span>Pesanan</span>
                    </a>
                    <a href="?url=pesanan-riwayat" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-history fa-fw"></i>
                        <span>Riwayat Pesanan</span>
                    </a>
                </nav>
            </div>
            <div class="p-4 mt-auto border-t border-gray-200 dark:border-gray-700">
                 <a href="?url=register" class="flex items-center justify-center gap-3 w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                    <i class="fas fa-user-plus"></i>
                    <span>Tambah Admin</span>
                </a>
                <a href="?url=logout" class="flex items-center justify-center gap-3 w-full mt-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 flex items-center gap-6">
                    <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-full">
                        <i class="fas fa-box text-2xl text-blue-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total Produk</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white"><?= $stat_produk ?></p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 flex items-center gap-6">
                    <div class="bg-green-100 dark:bg-green-900 p-4 rounded-full">
                        <i class="fas fa-tags text-2xl text-green-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total Kategori</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white"><?= $stat_kategori ?></p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 flex items-center gap-6">
                    <div class="bg-yellow-100 dark:bg-yellow-900 p-4 rounded-full">
                        <i class="fas fa-truck text-2xl text-yellow-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Pesanan Aktif</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white"><?= $stat_pesanan ?></p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 flex items-center gap-6">
                    <div class="bg-purple-100 dark:bg-purple-900 p-4 rounded-full">
                        <i class="fas fa-dollar-sign text-2xl text-purple-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total Penjualan</p>
                        <p class="text-3xl font-bold text-gray-800 dark:text-white">Rp <?= number_format($stat_total_penjualan, 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>

            </main>
    </div>

</body>
</html>