<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
        <nav class="bg-green-600 p-4 text-white flex justify-between items-center">
        <div class="font-bold text-lg">Manajemen Pesanan</div>
        <div class="flex items-center gap-2">
            <a href="/proyek-1/public/?url=admin-dashboard" class="inline-flex items-center gap-2 bg-green-100 hover:bg-green-200 text-green-700 font-semibold px-4 py-2 rounded shadow transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V15.375c0-.621.504-1.125 1.125-1.125h1.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V9.75" />
                </svg>
                Dashboard
            </a>
        </div>
    </nav>
    <main class="p-8 bg-gradient-to-br from-green-100 to-green-200 min-h-screen">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-5xl mx-auto border-2 border-green-300">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
                <h1 class="text-3xl font-bold text-green-800">Daftar Pesanan</h1>
            </div>
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full text-sm bg-white rounded-lg">
                    <thead class="bg-green-100 text-green-800">
                        <tr>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">No</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">Tanggal</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">User</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">Total</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">Status</th>
                            <th class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)): ?>
                            <tr><td colspan="6" class="text-center py-8 text-gray-400">Belum ada pesanan.</td></tr>
                        <?php else: ?>
                            <?php foreach ($orders as $i => $o): ?>
                                <tr class="hover:bg-green-50 transition">
                                    <td class="px-4 py-2 text-center align-middle font-semibold text-green-900 border border-green-100 bg-green-50"><?= $i+1 ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-green-800 border border-green-100 bg-green-50"><?= htmlspecialchars($o['created_at']) ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-green-700 border border-green-100 bg-green-50"><?= htmlspecialchars($o['user_name'] ?? '-') ?> (<?= htmlspecialchars($o['user_email'] ?? '-') ?>)</td>
                                    <td class="px-4 py-2 text-center align-middle text-green-700 font-bold border border-green-100 bg-green-50">Rp <?= number_format($o['total'],0,',','.') ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-green-700 border border-green-100 bg-green-50"><?= htmlspecialchars($o['status']) ?></td>
                                    <td class="px-4 py-2 text-center align-middle border border-green-100 bg-green-50">
                                        <div class="flex justify-center gap-2">
                                            <a href="/proyek-1/public/?url=pesanan-detail&id=<?= $o['id'] ?>" class="inline-flex items-center gap-1 bg-green-100 text-green-700 hover:bg-green-200 px-3 py-1 rounded font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-green-400">
                                                <!-- Heroicons/Outline Eye -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                                <span>Detail</span>
                                            </a>
                                            <a href="/proyek-1/public/?url=pesanan-hapus&id=<?= $o['id'] ?>" class="inline-flex items-center gap-1 bg-red-600 text-white hover:bg-red-700 px-3 py-1 rounded font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-red-400" onclick="return confirm('Yakin hapus pesanan ini?')">
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
