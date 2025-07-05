<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Online</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-600">Order Online</h2>
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-center">
                Order berhasil! Kami akan segera memproses pesanan Anda.
            </div>
        <?php endif; ?>
        <form method="post" action="?url=order-submit" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block mb-1 font-medium">No. Telepon</label>
                <input type="text" name="no_telepon" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block mb-1 font-medium">Alamat Pengiriman</label>
                <textarea name="alamat" class="w-full border rounded px-3 py-2" required></textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">Produk yang Dipesan</label>
                <div class="bg-gray-50 border rounded p-3 mb-2">
                    <?php if (!empty($cart)): ?>
                        <ul class="divide-y divide-gray-200">
                        <?php foreach ($cart as $item): ?>
                            <li class="py-2 flex items-center gap-3">
                                <?php if (!empty($item['image'])): ?>
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="" class="w-10 h-10 object-cover rounded">
                                <?php endif; ?>
                                <span class="font-semibold text-gray-700 flex-1"><?= htmlspecialchars($item['name']) ?></span>
                                <span class="text-gray-500 text-sm">x<?= $item['qty'] ?></span>
                                <span class="text-gray-700 font-bold">Rp <?= number_format($item['price'],0,',','.') ?></span>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 font-semibold">Order Sekarang</button>
        </form>
    </div>
</body>
</html>
