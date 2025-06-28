<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($category) ? 'Edit' : 'Tambah' ?> Kategori</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">
            <?= isset($category) ? 'Edit' : 'Tambah' ?> Kategori
        </h2>
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form method="post" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?= $category['nama_kategori'] ?? '' ?>" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border rounded px-3 py-2"><?= $category['deskripsi'] ?? '' ?></textarea>
            </div>
            <div class="flex justify-between">
                <a href="/proyek-1/public/?url=kategori" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
