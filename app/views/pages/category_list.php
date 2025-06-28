<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 p-4 text-white flex justify-between items-center">
        <div class="font-bold text-lg">Manajemen Kategori</div>
        <div>
            <a href="/proyek-1/public/?url=admin-dashboard" class="mr-4 hover:underline">Dashboard</a>
            <a href="/proyek-1/public/?url=logout" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</a>
        </div>
    </nav>
    <main class="p-8">
        <div class="bg-white rounded shadow p-6 max-w-3xl mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-blue-700">Daftar Kategori</h1>
                <a href="/proyek-1/public/?url=kategori-tambah" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Kategori</a>
            </div>
            <table class="min-w-full border text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-2 py-1">No</th>
                        <th class="border px-2 py-1">Nama Kategori</th>
                        <th class="border px-2 py-1">Deskripsi</th>
                        <th class="border px-2 py-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($categories)): ?>
                        <tr><td colspan="4" class="text-center py-4">Belum ada kategori.</td></tr>
                    <?php else: ?>
                        <?php foreach ($categories as $i => $cat): ?>
                            <tr>
                                <td class="border px-2 py-1 text-center"><?= $i+1 ?></td>
                                <td class="border px-2 py-1"><?= htmlspecialchars($cat['nama_kategori']) ?></td>
                                <td class="border px-2 py-1"><?= htmlspecialchars($cat['deskripsi']) ?></td>
                                <td class="border px-2 py-1 text-center">
                                    <a href="/proyek-1/public/?url=kategori-edit&id=<?= $cat['id'] ?>" class="text-blue-600 hover:underline mr-2">Edit</a>
                                    <a href="/proyek-1/public/?url=kategori-hapus&id=<?= $cat['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin hapus kategori ini?')">Hapus</a>
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
