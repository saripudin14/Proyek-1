<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($product) ? 'Edit' : 'Tambah' ?> Produk</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">
            <?= isset($product) ? 'Edit' : 'Tambah' ?> Produk
        </h2>
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form method="post" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Kategori</label>
                <select name="category_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (isset($product) && $product['category_id'] == $cat['id']) ? 'selected' : '' ?>><?= htmlspecialchars($cat['nama_kategori']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium">Kode Produk</label>
                <input type="text" name="kode_produk" value="<?= $product['kode_produk'] ?? '' ?>" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block mb-1 font-medium">Nama Produk</label>
                <input type="text" name="nama_produk" value="<?= $product['nama_produk'] ?? '' ?>" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border rounded px-3 py-2"><?= $product['deskripsi'] ?? '' ?></textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">Harga Jual</label>
                <input type="number" name="harga_jual" value="<?= $product['harga_jual'] ?? '' ?>" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Satuan</label>
                <input type="text" name="satuan" value="<?= $product['satuan'] ?? '' ?>" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Stok</label>
                <input type="number" name="stok" value="<?= $product['stok'] ?? 0 ?>" class="w-full border rounded px-3 py-2" required>
            </div>
            <!-- Gambar produk opsional, bisa dikembangkan upload -->
            <div>
                <label class="block mb-1 font-medium">Gambar Produk (opsional, URL)</label>
                <input type="text" name="gambar_produk" value="<?= $product['gambar_produk'] ?? '' ?>" class="w-full border rounded px-3 py-2">
            </div>
            <div class="flex justify-between">
                <a href="/proyek-1/public/?url=produk" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
