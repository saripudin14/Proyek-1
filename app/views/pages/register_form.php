<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin Baru - Paris Plastik</title>
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
                    <a href="?url=admin-dashboard" class="flex items-center gap-3 px-4 py-2 text-white bg-sky-600 rounded-lg shadow">
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
                        <span>Pesanan Aktif</span>
                    </a>
                    <a href="?url=pesanan-riwayat" class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-history fa-fw"></i>
                        <span>Riwayat Pesanan</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 mt-auto border-t border-gray-200 dark:border-gray-700 space-y-2">
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

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black opacity-50 z-40 lg:hidden"></div>

        <main class="flex-1 p-4 lg:p-8">
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 dark:text-white">Daftarkan Admin Baru</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Buat akun untuk admin atau staf baru.</p>
                </div>
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </header>
            
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 lg:p-8 max-w-2xl mx-auto">
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                        <p class="font-bold">Berhasil!</p>
                        <p><?= $_SESSION['success_message']; ?></p>
                    </div>
                    <?php unset($_SESSION['success_message']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                        <p class="font-bold">Gagal!</p>
                        <p><?= $_SESSION['error_message']; ?></p>
                    </div>
                    <?php unset($_SESSION['error_message']); ?>
                <?php endif; ?>

                <form method="post" action="?url=register" class="space-y-6">
                    <div>
                        <label for="name" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                    </div>
                     <div>
                        <label for="email" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                    </div>
                     <div>
                        <label for="phone" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                        <input type="tel" name="phone" id="phone" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                    </div>
                     <div>
                        <label for="address" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Alamat</label>
                        <textarea name="address" id="address" rows="3" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required></textarea>
                    </div>
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Password</label>
                            <input type="password" name="password" id="password" placeholder="Minimal 8 karakter" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                        </div>
                         <div>
                            <label for="password_confirm" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Konfirmasi Password</label>
                            <input type="password" name="password_confirm" id="password_confirm" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                        </div>
                    </div>
                    
                    <div class="flex flex-col-reverse sm:flex-row-reverse gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="?url=admin-dashboard" class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 dark:text-gray-800 dark:hover:bg-gray-400 font-bold py-2 px-6 rounded-lg transition-colors">Batal</a>
                        <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors">
                            <i class="fas fa-user-plus mr-2"></i>Daftarkan Admin
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>