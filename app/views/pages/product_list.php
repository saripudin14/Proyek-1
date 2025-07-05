<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 p-4 text-white flex justify-between items-center">
        <div class="font-bold text-lg">Manajemen Produk</div>
        <div>
            <a href="/proyek-1/public/?url=admin-dashboard" class="inline-flex items-center gap-2 bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold px-4 py-2 rounded shadow transition-all duration-200 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V15.375c0-.621.504-1.125 1.125-1.125h1.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V9.75" />
                </svg>
                Dashboard
            </a>
        </div>
    </nav>
    <main class="p-8 bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
                <h1 class="text-3xl font-bold text-blue-800">Daftar Produk</h1>
                <a href="/proyek-1/public/?url=produk-tambah" class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 font-semibold shadow transition-all duration-200 text-lg flex items-center gap-2 group">
                    <span class="inline-flex items-center justify-center bg-white/80 group-hover:bg-white text-green-600 group-hover:text-green-700 rounded-full w-8 h-8 shadow transition-all duration-200">
                    </span>
                    <span>+ Tambah Produk</span>
                </a>
            </div>
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full text-sm bg-white rounded-lg">
                    <thead class="bg-blue-100 text-blue-800">
                        <tr>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">No</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Gambar</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Kategori</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Nama Produk</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Warna</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Dimensi</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Harga</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Satuan</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Stok</th>
                            <th class="px-4 py-2 font-bold text-center border border-blue-200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)): ?>
                            <tr><td colspan="10" class="text-center py-8 text-gray-400">Belum ada produk.</td></tr>
                        <?php else: ?>
                            <?php foreach ($products as $i => $p): ?>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-4 py-2 text-center align-middle font-semibold text-gray-700 border border-blue-100"><?= $i+1 ?></td>
                                    <td class="px-4 py-2 text-center align-middle border border-blue-100">
                                        <?php if (!empty($p['image'])): ?>
                                            <img src="<?= htmlspecialchars($p['image']) ?>" alt="Gambar Produk" class="h-16 w-16 object-cover mx-auto rounded shadow border border-gray-200">
                                        <?php else: ?>
                                            <span class="text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-2 text-center align-middle text-blue-700 font-semibold border border-blue-100">
                                        <?= isset($p['category_name']) && $p['category_name'] !== null && $p['category_name'] !== '' ? htmlspecialchars($p['category_name']) : '<span class="text-gray-400">-</span>' ?>
                                    </td>
                                    <td class="px-4 py-2 align-middle font-semibold text-gray-800 text-center border border-blue-100"><?= htmlspecialchars($p['name']) ?></td>
                                    <td class="px-4 py-2 text-center align-middle border border-blue-100">
                                        <?php 
                                            require_once dirname(__DIR__, 2) . '/core/helpers.php';
                                            $colorName = $p['color'] ?? '';
                                            $colorCode = $colorName ? getColorCode($colorName) : '';
                                        ?>
                                        <?php if (!empty($colorName)): ?>
                                            <span class="inline-flex items-center gap-2">
                                                <span class="w-5 h-5 rounded-full border border-gray-300" style="background: <?= htmlspecialchars($colorCode) ?>;"></span>
                                                <span class="text-gray-700 text-sm font-medium"><?= htmlspecialchars($colorName) ?></span>
                                            </span>
                                        <?php else: ?>
                                            <span class="text-gray-400">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-2 text-center align-middle border border-blue-100">
                                        <?= !empty($p['dimensions']) ? htmlspecialchars($p['dimensions']) : '<span class="text-gray-400">-</span>' ?>
                                    </td>
                                    <td class="px-4 py-2 align-middle text-green-700 font-bold border border-blue-100">Rp <?= number_format($p['price'],0,',','.') ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-blue-800 font-bold uppercase tracking-wide bg-blue-50 rounded-lg shadow-sm border border-blue-100">
                                        <?= htmlspecialchars($p['unit']) ?>
                                    </td>
                                    <td class="px-4 py-2 text-center align-middle font-semibold text-gray-700 border border-blue-100"><?= $p['stock'] ?></td>
                                    <td class="px-4 py-2 text-center align-middle border border-blue-100">
                                        <div class="flex justify-center gap-2">
                                            <a href="/proyek-1/public/?url=produk-edit&id=<?= $p['id'] ?>" class="inline-flex items-center gap-1 bg-blue-100 text-blue-700 hover:bg-blue-200 px-3 py-1 rounded font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                                <!-- Heroicons/Outline Pencil Square -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                                <span>Edit</span>
                                            </a>
                                            <a href="/proyek-1/public/?url=produk-hapus&id=<?= $p['id'] ?>" class="inline-flex items-center gap-1 bg-red-100 text-red-700 hover:bg-red-200 px-3 py-1 rounded font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-red-400" onclick="return confirm('Yakin hapus produk ini?')">
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