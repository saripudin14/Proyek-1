<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 p-4 text-white flex justify-between items-center">
        <div class="font-bold text-lg">Manajemen Produk</div>
        <div>
            <a href="/proyek-1/public/?url=admin-dashboard" class="mr-4 hover:underline">Dashboard</a>
            <a href="/proyek-1/public/?url=logout" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</a>
        </div>
    </nav>
    <main class="p-8">
        <div class="bg-white rounded shadow p-6 max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-blue-700">Daftar Produk</h1>
                <a href="/proyek-1/public/?url=produk-tambah" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Produk</a>
            </div>
            <table class="min-w-full border text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-2 py-1">No</th>
                        <th class="border px-2 py-1">Kategori</th>
                        <th class="border px-2 py-1">Kode</th>
                        <th class="border px-2 py-1">Nama Produk</th>
                        <th class="border px-2 py-1">Harga</th>
                        <th class="border px-2 py-1">Stok</th>
                        <th class="border px-2 py-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr><td colspan="7" class="text-center py-4">Belum ada produk.</td></tr>
                    <?php else: ?>
                        <?php foreach ($products as $i => $p): ?>
                            <tr>
                                <td class="border px-2 py-1 text-center"><?= $i+1 ?></td>
                                <td class="border px-2 py-1"><?= htmlspecialchars($p['category_id']) ?></td>
                                <td class="border px-2 py-1"><?= htmlspecialchars($p['kode_produk']) ?></td>
                                <td class="border px-2 py-1"><?= htmlspecialchars($p['nama_produk']) ?></td>
                                <td class="border px-2 py-1">Rp <?= number_format($p['harga_jual'],0,',','.') ?></td>
                                <td class="border px-2 py-1 text-center"><?= $p['stok'] ?></td>
                                <td class="border px-2 py-1 text-center">
                                    <a href="/proyek-1/public/?url=produk-edit&id=<?= $p['id'] ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                                    <a href="/proyek-1/public/?url=produk-hapus&id=<?= $p['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
