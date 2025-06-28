<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 p-4 text-white flex justify-between items-center">
        <div class="font-bold text-lg">Detail Pesanan</div>
        <div>
            <a href="/proyek-1/public/?url=pesanan" class="mr-4 hover:underline">Kembali</a>
            <a href="/proyek-1/public/?url=logout" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</a>
        </div>
    </nav>
    <main class="p-8">
        <div class="bg-white rounded shadow p-6 max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold text-blue-700 mb-4">Order ID: <?= htmlspecialchars($order['id']) ?></h1>
            <div class="mb-4">
                <div><b>Tanggal:</b> <?= htmlspecialchars($order['created_at']) ?></div>
                <div><b>User:</b> <?= htmlspecialchars($order['user_name'] ?? '-') ?> (<?= htmlspecialchars($order['user_email'] ?? '-') ?>)</div>
                <div><b>Alamat Pengiriman:</b> <?= htmlspecialchars($order['shipping_address']) ?></div>
                <div><b>Status:</b> <span class="font-semibold text-blue-700"><?= htmlspecialchars($order['status']) ?></span></div>
            </div>
            <form method="post" action="/proyek-1/public/?url=pesanan-status&id=<?= $order['id'] ?>" class="mb-4">
                <label class="block mb-1 font-medium">Ubah Status Pesanan</label>
                <select name="status" class="border rounded px-3 py-2" required>
                    <?php $statuses = ['pending','paid','shipped','completed','cancelled']; foreach ($statuses as $s): ?>
                        <option value="<?= $s ?>" <?= $order['status']===$s?'selected':'' ?>><?= ucfirst($s) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="ml-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </form>
            <h2 class="text-xl font-bold mb-2">Detail Produk</h2>
            <table class="min-w-full border text-sm mb-4">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-2 py-1">Nama Produk</th>
                        <th class="border px-2 py-1">Jumlah</th>
                        <th class="border px-2 py-1">Satuan</th>
                        <th class="border px-2 py-1">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order['details'] as $d): ?>
                        <tr>
                            <td class="border px-2 py-1"><?= htmlspecialchars($d['product_name']) ?></td>
                            <td class="border px-2 py-1 text-center"><?= $d['quantity'] ?></td>
                            <td class="border px-2 py-1 text-center"><?= htmlspecialchars($d['unit']) ?></td>
                            <td class="border px-2 py-1">Rp <?= number_format($d['price'],0,',','.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-right font-bold">Total: Rp <?= number_format($order['total'],0,',','.') ?></div>
        </div>
    </main>
</body>
</html>
