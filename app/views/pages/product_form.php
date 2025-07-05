<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($product) ? 'Edit' : 'Tambah' ?> Produk</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-emerald-50 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-2xl border border-blue-100 animate-fade-in">
        <h2 class="text-3xl font-extrabold mb-8 text-center text-blue-700 tracking-tight drop-shadow">
            <?= isset($product) ? 'Edit' : 'Tambah' ?> Produk
        </h2>
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-6 text-center border border-red-200 animate-pulse">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700">Nama Produk</label>
                        <input type="text" name="name" value="<?= $product['name'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
                    </div>
                    <div>
                        <label class="block mb-1 mt-1 font-semibold text-gray-700">Kategori</label>
                        <select name="category_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= (isset($product) && $product['category_id'] == $cat['id']) ? 'selected' : '' ?>><?= htmlspecialchars($cat['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-1 mt-1 font-semibold text-gray-700">Harga</label>
                            <input type="text" id="price-format" inputmode="numeric" pattern="[0-9.]*" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
                            <input type="hidden" name="price" id="price" value="<?= $product['price'] ?? '' ?>">
                        </div>
                         <div>
                            <label class="block mb-1 mt-1 font-semibold text-gray-700">Satuan</label>
                            <select name="unit" class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
                                <?php $units = ['pcs','pack','roll','kg','liter','other']; foreach ($units as $unit): ?>
                                    <option value="<?= $unit ?>" <?= (isset($product) && $product['unit'] == $unit) ? 'selected' : '' ?>><?= $unit ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    </div>
                    <div>
                        <div>
                            <label class="block mb-1 mt-1 font-semibold text-gray-700">Stok</label>
                            <input type="number" name="stock" value="<?= $product['stock'] ?? 0 ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required min="0">
                        </div>
                        <label class="block mb-1 mt-1 font-semibold text-gray-700">Dimensi</label>
                        <input type="text" name="dimensions" value="<?= $product['dimensions'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="cth: 20x30cm">
                    </div>
                        <div>
                            <label class="block mb-1 mt-1 font-semibold text-gray-700">Warna</label>
                            <input type="text" name="color" value="<?= $product['color'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" placeholder="cth: Biru, Putih">
                        </div>
                        
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <label class="block mb-1 font-semibold text-gray-700">Gambar Produk (Wajib)</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    <?php if (!empty($product['image'])): ?>
                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="Gambar Produk" class="mt-3 max-h-40 rounded-lg shadow border border-gray-200 w-full object-contain">
                    <?php endif; ?>
                    <label class="block mb-1 mt-1 font-semibold text-gray-700">Deskripsi</label>
                        <textarea name="description" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition" rows="3"><?= $product['description'] ?? '' ?></textarea>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4 mt-8 justify-end items-center">
                <a href="/proyek-1/public/?url=produk" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded font-semibold shadow transition-all duration-200 flex items-center gap-2 md:w-auto w-full justify-center">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded-lg font-bold shadow hover:bg-blue-700 transition md:w-auto w-full">Simpan</button>
            </div>
        </form>
    </div>
    <script>
    // Format harga otomatis ribuan
    const priceInput = document.getElementById('price-format');
    const priceHidden = document.getElementById('price');
    // Set initial value if edit
    if (priceHidden.value) {
        priceInput.value = Number(priceHidden.value).toLocaleString('id-ID');
    }
    priceInput.addEventListener('input', function(e) {
        let value = priceInput.value.replace(/[^\d]/g, '');
        priceInput.value = value ? Number(value).toLocaleString('id-ID') : '';
        priceHidden.value = value;
    });
    </script>
</body>
</html>
