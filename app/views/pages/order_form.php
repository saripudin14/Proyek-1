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
                <label class="block mb-1 font-medium">Produk</label>
                <select name="product_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Produk --</option>
                    <?php foreach ($products as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nama_produk']) ?> (<?= number_format($p['harga_jual'],0,',','.') ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium">Jumlah</label>
                <input type="number" name="jumlah" min="1" value="1" class="w-full border rounded px-3 py-2" required>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 font-semibold">Order Sekarang</button>
        </form>
    </div>
</body>
</html>
