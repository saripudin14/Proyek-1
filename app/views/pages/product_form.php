<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($product) ? 'Edit' : 'Tambah' ?> Produk - Paris Plastik</title>
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
                        class="flex items-center gap-3 px-4 py-2 text-white bg-sky-600 rounded-lg shadow">
                        <i class="fas fa-box fa-fw"></i>
                        <span>Produk</span>
                    </a>
                    <a href="?url=kategori"
                        class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-tags fa-fw"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="?url=pesanan"
                        class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-shopping-cart fa-fw"></i>
                        <span>Pesanan Aktif</span>
                    </a>
                    <a href="?url=pesanan-riwayat"
                        class="flex items-center gap-3 px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-history fa-fw"></i>
                        <span>Riwayat Pesanan</span>
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
                        <?= isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' ?>
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Isi detail produk di bawah ini.</p>
                </div>
                <button @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden p-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </header>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 lg:p-8">
                <?php if (!empty($error)): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                        <p><?= htmlspecialchars($error) ?></p>
                    </div>
                <?php endif; ?>

                <form method="post" enctype="multipart/form-data" class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Nama
                                Produk</label>
                            <input type="text" id="name" name="name" value="<?= $product['name'] ?? '' ?>"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                                required>
                        </div>
                        <div>
                            <label for="category_id"
                                class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Kategori</label>
                            <select id="category_id" name="category_id"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                                required>
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>" <?= (isset($product) && $product['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($cat['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="price-format"
                                class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Harga</label>
                            <input type="text" id="price-format" inputmode="numeric"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                                required>
                            <input type="hidden" name="price" id="price" value="<?= $product['price'] ?? '' ?>">
                        </div>
                        <div>
                            <label for="unit"
                                class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Satuan</label>
                            <select id="unit" name="unit"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                                required>
                                <?php $units = ['pcs', 'pack', 'roll', 'kg', 'liter'];
                                foreach ($units as $unit): ?>
                                    <option value="<?= $unit ?>" <?= (isset($product) && $product['unit'] == $unit) ? 'selected' : '' ?>><?= ucfirst($unit) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="stock"
                                class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Stok</label>
                            <input type="number" id="stock" name="stock" value="<?= $product['stock'] ?? 0 ?>"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                                required min="0">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="color"
                                class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Warna</label>
                            <input type="text" id="color" name="color" value="<?= $product['color'] ?? '' ?>"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                                placeholder="cth: Biru, Bening (opsional)">
                        </div>
                        <div>
                            <label for="dimensions"
                                class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Dimensi</label>
                            <input type="text" id="dimensions" name="dimensions"
                                value="<?= $product['dimensions'] ?? '' ?>"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                                placeholder="cth: 20x30 cm (opsional)">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="description"
                                class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <textarea id="description" name="description" rows="8"
                                class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-lg px-4 py-2 bg-white dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500 transition"><?= $product['description'] ?? '' ?></textarea>
                        </div>

                        <div
                            x-data="{ imagePreview: '<?= !empty($product['image']) ? htmlspecialchars($product['image']) : '' ?>' }">
                            <label class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Gambar
                                Produk</label>

                            <input type="file" name="image_file" accept="image/*" class="sr-only" x-ref="imageInput"
                                @change="
                                    let reader = new FileReader();
                                    reader.onload = (e) => { imagePreview = e.target.result; };
                                    reader.readAsDataURL($refs.imageInput.files[0]);
                                ">

                            <div @click="$refs.imageInput.click()"
                                class="w-full h-64 rounded-lg cursor-pointer bg-gray-100 dark:bg-gray-700 flex items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 hover:border-sky-500 dark:hover:border-sky-400 transition">
                                <div x-show="!imagePreview" class="text-center">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 dark:text-gray-500"></i>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Klik untuk upload gambar
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-500">PNG, JPG, atau WEBP</p>
                                </div>
                                <div x-show="imagePreview" class="relative w-full h-full">
                                    <img :src="imagePreview" alt="Pratinjau Gambar"
                                        class="w-full h-full object-contain">
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                        <p class="text-white font-semibold">Ganti Gambar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-col-reverse sm:flex-row-reverse gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="?url=produk"
                            class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-700 dark:text-gray-800 dark:hover:bg-gray-400 font-bold py-2 px-6 rounded-lg transition-colors">Batal</a>
                        <button type="submit"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition-colors">Simpan
                            Perubahan</button>
                    </div>

                </form>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const priceInput = document.getElementById('price-format');
            const priceHidden = document.getElementById('price');
            const formatPrice = (value) => Number(value).toLocaleString('id-ID');
            const unformatPrice = (value) => value.replace(/[^\d]/g, '');

            if (priceHidden.value) {
                priceInput.value = formatPrice(priceHidden.value);
            }

            priceInput.addEventListener('input', () => {
                let value = unformatPrice(priceInput.value);
                priceInput.value = value ? formatPrice(value) : '';
                priceHidden.value = value;
            });
        });
    </script>
</body>

</html>