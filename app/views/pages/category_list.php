<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-green-600 p-4 text-white flex justify-between items-center">
        <div class="font-bold text-lg">Manajemen Kategori</div>
        <div class="flex items-center gap-2">
            <a href="/proyek-1/public/?url=admin-dashboard" class="inline-flex items-center gap-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold px-4 py-2 rounded shadow transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V15.375c0-.621.504-1.125 1.125-1.125h1.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V9.75" />
                </svg>
                Dashboard
            </a>
        </div>
    </nav>
    <main class="p-8 bg-gradient-to-br from-green-100 via-green-50 to-green-200 min-h-screen">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
                <h1 class="text-3xl font-bold text-green-800">Daftar Kategori</h1>
                <a href="/proyek-1/public/?url=kategori-tambah" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 font-semibold shadow transition-all duration-200 text-lg flex items-center gap-2 group">
                    <span class="inline-flex items-center justify-center bg-white/80 group-hover:bg-white text-blue-600 group-hover:text-blue-700 rounded-full w-8 h-8 shadow transition-all duration-200">
                    </span>
                    <span>+ Tambah Kategori</span>
                </a>
            </div>
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full text-sm bg-white rounded-lg">
                    <thead class="bg-green-100 text-green-800">
                        <tr>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">No</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">Nama Kategori</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">Deskripsi</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)): ?>
                            <tr><td colspan="4" class="text-center py-8 text-gray-400">Belum ada kategori.</td></tr>
                        <?php else: ?>
                            <?php foreach ($categories as $i => $cat): ?>
                                <tr class="hover:bg-green-50 transition">
                                    <td class="px-4 py-2 text-center align-middle font-semibold text-green-900 border border-green-100 bg-green-50"><?= $i+1 ?></td>
                                    <td class="px-4 py-2 text-center align-middle font-semibold text-green-800 border border-green-100 bg-green-50"><?= htmlspecialchars($cat['name']) ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-green-700 border border-green-100 bg-green-50"><?= htmlspecialchars($cat['description']) ?></td>
                                    <td class="px-4 py-2 text-center align-middle border border-green-100 bg-green-50">
                                        <div class="flex justify-center gap-2">
                                            <a href="/proyek-1/public/?url=kategori-edit&id=<?= $cat['id'] ?>" class="inline-flex items-center gap-1 bg-green-100 text-green-700 hover:bg-green-200 px-3 py-1 rounded font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-green-400">
                                                <!-- Heroicons/Outline Pencil Square -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                                <span>Edit</span>
                                            </a>
                                            <a href="/proyek-1/public/?url=kategori-hapus&id=<?= $cat['id'] ?>" class="inline-flex items-center gap-1 bg-red-100 text-red-700 hover:bg-red-200 px-3 py-1 rounded font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-red-400" onclick="return confirm('Yakin hapus kategori ini?')">
                                                <!-- Heroicons/Outline Trash -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                                <span>Hapus</span>
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
</body>
</html>
