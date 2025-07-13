<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pesanan - Paris Plastik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 antialiased">

    <div x-data="{ sidebarOpen: false }" class="flex min-h-screen">
        
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="w-64 bg-white dark:bg-gray-800 shadow-lg fixed inset-y-0 left-0 z-50 flex-shrink-0 transform transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0 lg:shadow-md">
            
            <div class="p-6 text-center border-b border-gray-200 dark:border-gray-700">
                <a href="?url=admin-dashboard" class="text-2xl font-extrabold text-sky-600 dark:text-sky-300">
                    Paris Plastik
                </a>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 tracking-wider">ADMIN PANEL</p>
            </div>
            
            <div class="p-4">
                <nav class="space-y-2">
                    <a href="?url=admin-dashboard" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
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
                    <a href="?url=pesanan" class="flex items-center gap-3 px-4 py-2 text-white bg-sky-600 rounded-lg shadow">
                        <i class="fas fa-shopping-cart fa-fw"></i>
                        <span>Pesanan Aktif</span>
                    </a>
                    <a href="?url=pesanan-riwayat" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-history fa-fw"></i>
                        <span>Riwayat Pesanan</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 mt-auto border-t border-gray-200 dark:border-gray-700 space-y-2">
                 <a href="?url=logout" class="flex items-center justify-center gap-3 w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black opacity-50 z-40 lg:hidden"></div>

        <main class="flex-1 p-4 lg:p-8">
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 dark:text-white">Manajemen Pesanan</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Daftar pesanan yang sedang diproses.</p>
                </div>
                <div class="flex items-center gap-4">
                     <a href="?url=pesanan-riwayat" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors flex items-center gap-2">
                        <i class="fas fa-history"></i>
                        <span class="hidden sm:inline">Lihat Riwayat</span>
                    </a>
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </header>
            
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Pelanggan</th>
                                <th class="hidden md:table-cell px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-center font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th class="hidden lg:table-cell px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-center font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php if (empty($orders)): ?>
                                <tr><td colspan="5" class="text-center py-8 text-gray-400 dark:text-gray-500">Belum ada pesanan aktif.</td></tr>
                            <?php else: ?>
                                <?php foreach ($orders as $order): ?>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-semibold text-gray-800 dark:text-gray-200"><?= htmlspecialchars($order['customer_name'] ?? '-') ?></div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400"><?= htmlspecialchars($order['customer_email'] ?? '-') ?></div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1"><?= htmlspecialchars($order['customer_phone'] ?? '-') ?></div>
                                        </td>
                                        <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap text-green-600 dark:text-green-400 font-bold">Rp <?= number_format($order['total'], 0, ',', '.') ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span class="font-semibold py-1 px-3 rounded-full text-xs
                                                <?= $order['status'] == 'Belum Dibayar' ? 'bg-yellow-100 text-yellow-800' : '' ?>
                                                <?= $order['status'] == 'Lunas' ? 'bg-blue-100 text-blue-800' : '' ?>
                                                <?= $order['status'] == 'Dikirim' ? 'bg-indigo-100 text-indigo-800' : '' ?>
                                            ">
                                                <?= htmlspecialchars($order['status']) ?>
                                            </span>
                                        </td>
                                        <td class="hidden lg:table-cell px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400"><?= date('d M Y, H:i', strtotime($order['created_at'])) ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <a href="?url=pesanan-detail&id=<?= $order['id'] ?>" class="text-sky-500 hover:text-sky-700 dark:text-sky-400 dark:hover:text-sky-300 font-semibold">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>