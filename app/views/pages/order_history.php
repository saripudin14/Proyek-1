<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <main class="p-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-7xl mx-auto border-2 border-gray-200">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Riwayat Pesanan</h1>
                    <p class="text-gray-500">Daftar semua pesanan yang telah selesai.</p>
                </div>
                <a href="?url=pesanan"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 font-semibold shadow transition-all duration-200 text-lg flex items-center gap-2 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                    Kembali ke Pesanan Aktif
                </a>
            </div>
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full text-sm bg-white rounded-lg">
                    <thead class="bg-gray-100 text-gray-800">
                        <tr>
                            <th class="px-4 py-2 font-bold text-center border border-gray-200 uppercase tracking-wide text-gray-900">No</th>
                            <th class="px-4 py-2 font-bold text-center border border-gray-200 uppercase tracking-wide text-gray-900">Pelanggan</th>
                            <th class="px-4 py-2 font-bold text-center border border-gray-200 uppercase tracking-wide text-gray-900">Email</th>
                            <th class="px-4 py-2 font-bold text-center border border-gray-200 uppercase tracking-wide text-gray-900">No HP</th>
                            <th class="px-4 py-2 font-bold text-center border border-gray-200 uppercase tracking-wide text-gray-900">Total</th>
                            <th class="px-4 py-2 font-bold text-center border border-gray-200 uppercase tracking-wide text-gray-900">Status</th>
                            <th class="px-4 py-2 font-bold text-center border border-gray-200 uppercase tracking-wide text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="7" class="text-center py-8 text-gray-400">Belum ada riwayat pesanan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $i => $o): ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-4 py-2 text-center align-middle font-semibold text-gray-900 border border-gray-100 bg-gray-50"><?= $i + 1 ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-gray-800 border border-gray-100 bg-gray-50 font-semibold"><?= htmlspecialchars($o['customer_name'] ?? '-') ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-gray-700 border border-gray-100 bg-gray-50"><?= htmlspecialchars($o['customer_email'] ?? '-') ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-gray-700 border border-gray-100 bg-gray-50"><?= htmlspecialchars($o['customer_phone'] ?? '-') ?></td>
                                    <td class="px-4 py-2 text-center align-middle text-gray-700 font-bold border border-gray-100 bg-gray-50">Rp <?= number_format($o['total'], 0, ',', '.') ?></td>
                                    <td class="px-4 py-2 text-center align-middle border border-gray-100 bg-gray-50">
                                        <span class="bg-green-200 text-green-800 font-semibold py-1 px-3 rounded-full text-xs">
                                            <?= htmlspecialchars($o['status']) ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-center align-middle border border-gray-100 bg-gray-50">
                                        <div class="flex justify-center">
                                            <a href="/proyek-1/public/?url=pesanan-detail&id=<?= $o['id'] ?>" class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 hover:bg-gray-200 px-3 py-1 rounded-md font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" /></svg>
                                                <span>Detail</span>
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