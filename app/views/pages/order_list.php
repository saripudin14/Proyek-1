<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 p-4 text-white flex justify-between items-center">
        <div class="font-bold text-lg">Manajemen Pesanan</div>
        <div>
            <a href="/proyek-1/public/?url=admin-dashboard" class="mr-4 hover:underline">Dashboard</a>
            <a href="/proyek-1/public/?url=logout" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</a>
        </div>
    </nav>
    <main class="p-8">
        <div class="bg-white rounded shadow p-6 max-w-5xl mx-auto">
            <h1 class="text-2xl font-bold text-blue-700 mb-4">Daftar Pesanan</h1>
            <table class="min-w-full border text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-2 py-1">No</th>
                        <th class="border px-2 py-1">Tanggal</th>
                        <th class="border px-2 py-1">User</th>
                        <th class="border px-2 py-1">Total</th>
                        <th class="border px-2 py-1">Status</th>
                        <th class="border px-2 py-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($orders)): ?>
                        <tr><td colspan="6" class="text-center py-4">Belum ada pesanan.</td></tr>
                    <?php else: ?>
                        <?php foreach ($orders as $i => $o): ?>
                            <tr>
                                <td class="border px-2 py-1 text-center"><?= $i+1 ?></td>
                                <td class="border px-2 py-1"><?= htmlspecialchars($o['created_at']) ?></td>
                                <td class="border px-2 py-1"><?= htmlspecialchars($o['user_name'] ?? '-') ?> (<?= htmlspecialchars($o['user_email'] ?? '-') ?>)</td>
                                <td class="border px-2 py-1">Rp <?= number_format($o['total'],0,',','.') ?></td>
                                <td class="border px-2 py-1 text-center"><?= htmlspecialchars($o['status']) ?></td>
                                <td class="border px-2 py-1 text-center">
                                    <a href="/proyek-1/public/?url=pesanan-detail&id=<?= $o['id'] ?>" class="text-blue-600 hover:underline mr-2">Detail</a>
                                    <a href="/proyek-1/public/?url=pesanan-hapus&id=<?= $o['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</a>
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
