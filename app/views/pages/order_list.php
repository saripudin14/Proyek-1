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
            <a href="/proyek-1/public/?url=admin-dashboard"
                class="inline-flex items-center gap-2 bg-green-100 hover:bg-green-200 text-green-700 font-semibold px-4 py-2 rounded shadow transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V15.375c0-.621.504-1.125 1.125-1.125h1.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621.504 1.125 1.125 1.125h3.75c.621 0 1.125-.504 1.125-1.125V9.75" />
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
                            <th
                                class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">
                                No
                            </th>
                            <th
                                class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">
                                Pelanggan
                            </th>
                            <th
                                class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">
                                Email
                            </th>
                            <th
                                class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">
                                No HP
                            </th>
                            <th
                                class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">
                                Total
                            </th>
                            <th
                                class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">
                                Status
                            </th>
                            <th
                                class="px-4 py-2 font-bold text-center border border-green-200 uppercase tracking-wide text-green-900">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="7" class="text-center py-8 text-gray-400">Belum ada pesanan.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $i => $o): ?>
                                <tr class="hover:bg-green-50 transition">
                                    <td
                                        class="px-4 py-2 text-center align-middle font-semibold text-green-900 border border-green-100 bg-green-50">
                                        <?= $i + 1 ?>
                                    </td>
                                    <td
                                        class="px-4 py-2 text-center align-middle text-green-800 border border-green-100 bg-green-50 font-semibold">
                                        <?= htmlspecialchars($o['customer_name'] ?? '-') ?>
                                    </td>
                                    <td
                                        class="px-4 py-2 text-center align-middle text-green-700 border border-green-100 bg-green-50">
                                        <?= htmlspecialchars($o['customer_email'] ?? '-') ?>
                                    </td>
                                    <td
                                        class="px-4 py-2 text-center align-middle text-green-700 border border-green-100 bg-green-50">
                                        <?= htmlspecialchars($o['customer_phone'] ?? '-') ?>
                                    </td>
                                    <td
                                        class="px-4 py-2 text-center align-middle text-green-700 font-bold border border-green-100 bg-green-50">
                                        Rp <?= number_format($o['total'], 0, ',', '.') ?>
                                    </td>
                                    <td
                                        class="px-4 py-2 text-center align-middle text-green-700 border border-green-100 bg-green-50">
                                        <?= htmlspecialchars($o['status']) ?>
                                    </td>
                                    <td class="px-4 py-2 text-center align-middle border border-green-100 bg-green-50">
                                        <div class="flex justify-center">
                                            <a href="/proyek-1/public/?url=pesanan-detail&id=<?= $o['id'] ?>"
                                                class="inline-flex items-center gap-2 bg-green-100 text-green-700 hover:bg-green-200 px-3 py-1 rounded-md font-semibold shadow-sm transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-green-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
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