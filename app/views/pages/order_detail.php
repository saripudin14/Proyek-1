<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #<?= htmlspecialchars($order['id']) ?> - Paris Plastik</title>
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

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="w-64 bg-white dark:bg-gray-800 shadow-lg fixed inset-y-0 left-0 z-50 flex-shrink-0 transform transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0 lg:shadow-md">

            <div class="p-6 text-center border-b border-gray-200 dark:border-gray-700">
                <a href="?url=admin-dashboard" class="text-2xl font-extrabold text-sky-600 dark:text-sky-300">
                    Paris Plastik
                </a>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 tracking-wider">ADMIN PANEL</p>
            </div>

            <div class="p-4">
                <nav class="space-y-2">
                    <a href="?url=admin-dashboard"
                        class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-tachometer-alt fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="?url=produk"
                        class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-box fa-fw"></i>
                        <span>Produk</span>
                    </a>
                    <a href="?url=kategori"
                        class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-tags fa-fw"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="?url=pesanan"
                        class="flex items-center gap-3 px-4 py-2 text-white bg-sky-600 rounded-lg shadow">
                        <i class="fas fa-shopping-cart fa-fw"></i>
                        <span>Pesanan</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 mt-auto border-t border-gray-200 dark:border-gray-700 space-y-2">
                <a href="?url=logout"
                    class="flex items-center justify-center gap-3 w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black opacity-50 z-40 lg:hidden">
        </div>

        <main class="flex-1 p-4 lg:p-8">
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 dark:text-white">
                        Detail Pesanan <span
                            class="text-sky-500 font-mono">#<?= htmlspecialchars($order['id']) ?></span>
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Dibuat pada:
                        <?= date('d F Y, H:i', strtotime($order['created_at'])) ?></p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="?url=pesanan"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg shadow-md transition-colors flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        <span class="hidden sm:inline">Kembali</span>
                    </a>
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="lg:hidden p-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Rincian Item</h2>
                    <div class="space-y-4">
                        <?php foreach ($order['items'] as $item): ?>
                            <div
                                class="flex items-center gap-4 pb-4 border-b border-gray-200 dark:border-gray-700 last:border-b-0">

                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800 dark:text-gray-200">
                                        <?= htmlspecialchars($item['product_name']) ?></p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        <?= htmlspecialchars($item['quantity']) ?> x Rp
                                        <?= number_format($item['price'], 0, ',', '.') ?></p>
                                </div>
                                <p class="font-bold text-gray-800 dark:text-white">Rp
                                    <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-6 pt-6 border-t-2 border-dashed border-gray-200 dark:border-gray-700 text-right">
                        <div class="text-lg font-bold text-gray-800 dark:text-white">Total Pesanan:
                            <span class="text-sky-600 dark:text-sky-400 text-2xl ml-2">Rp
                                <?= number_format($order['total'], 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Informasi Pelanggan</h2>
                        <div class="space-y-2 text-sm">
                            <p class="text-gray-600 dark:text-gray-300"><i
                                    class="fas fa-user fa-fw mr-2 text-gray-400"></i><?= htmlspecialchars($order['customer_name']) ?>
                            </p>
                            <p class="text-gray-600 dark:text-gray-300"><i
                                    class="fas fa-envelope fa-fw mr-2 text-gray-400"></i><?= htmlspecialchars($order['customer_email']) ?>
                            </p>
                            <p class="text-gray-600 dark:text-gray-300"><i
                                    class="fas fa-phone fa-fw mr-2 text-gray-400"></i><?= htmlspecialchars($order['customer_phone']) ?>
                            </p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Alamat Pengiriman</h2>
                        <address class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed not-italic">
                            <?= nl2br(htmlspecialchars($order['shipping_address'])) ?>
                        </address>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Ubah Status</h2>
                        <form action="?url=pesanan-status&id=<?= $order['id'] ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                            <div class="flex items-center gap-2">
                                <select name="status"
                                    class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 transition">
                                    <option value="Belum Dibayar" <?= $order['status'] == 'Belum Dibayar' ? 'selected' : '' ?>>Belum Dibayar</option>
                                    <option value="Lunas" <?= $order['status'] == 'Lunas' ? 'selected' : '' ?>>Lunas
                                    </option>
                                    <option value="Dikirim" <?= $order['status'] == 'Dikirim' ? 'selected' : '' ?>>Dikirim
                                    </option>
                                    <option value="Selesai" <?= $order['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai
                                    </option>
                                    <option value="Batal" <?= $order['status'] == 'Batal' ? 'selected' : '' ?>>Batal
                                    </option>
                                </select>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-lg shadow-md transition-colors">
                                    <i class="fas fa-save"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>

</html>