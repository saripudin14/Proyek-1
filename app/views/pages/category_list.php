<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kategori - Paris Plastik</title>
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
                    <a href="?url=kategori" class="flex items-center gap-3 px-4 py-2 text-white bg-sky-600 rounded-lg shadow">
                        <i class="fas fa-tags fa-fw"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="?url=pesanan" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
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
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 dark:text-white">Manajemen Kategori</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kelola semua kategori produk Anda.</p>
                </div>
                <div class="flex items-center gap-4">
                     <a href="?url=kategori-tambah" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        <span class="hidden sm:inline">Tambah Kategori</span>
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
                                <th class="px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nama Kategori</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-3 text-center font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php if (empty($categories)): ?>
                                <tr><td colspan="4" class="text-center py-8 text-gray-400">Belum ada kategori.</td></tr>
                            <?php else: ?>
                                <?php foreach ($categories as $i => $cat): ?>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100 font-medium"><?= $i+1 ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200 font-semibold"><?= htmlspecialchars($cat['name']) ?></td>
                                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                            <?= !empty($cat['description']) ? htmlspecialchars($cat['description']) : '-' ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="flex justify-center items-center gap-2">
                                                <a href="?url=kategori-edit&id=<?= $cat['id'] ?>" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="?url=kategori-hapus&id=<?= $cat['id'] ?>" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-600" onclick="return confirm('Yakin hapus kategori ini?')" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
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