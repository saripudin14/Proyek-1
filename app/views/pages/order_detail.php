<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-green-600 p-4 text-white flex justify-between items-center shadow-md">
        <div class="font-bold text-lg">Manajemen Pesanan</div>
        <div class="flex items-center gap-2">
            <a href="?url=pesanan"
                class="inline-flex items-center gap-2 bg-green-100 hover:bg-green-200 text-green-700 font-semibold px-4 py-2 rounded-lg shadow transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Pesanan
            </a>
        </div>
    </nav>
    <div class="p-4">
        <main class="p-4 md:p-8 bg-gradient-to-br from-green-50 to-teal-50 min-h-screen">
            <div class="max-w-6xl mx-auto">

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-green-800 mt-2">
                            Detail Pesanan <span
                                class="font-mono bg-green-100 text-green-800 px-3 py-1 rounded-lg text-2xl">#<?= htmlspecialchars($order['id']) ?></span>
                        </h1>
                    </div>
                    <div>
                        <?php
                        $status = $order['status'];
                        $statusColor = 'bg-gray-100 text-gray-800 border-gray-300'; // default
                        if ($status == 'pending')
                            $statusColor = 'bg-yellow-100 text-yellow-800 border-yellow-300';
                        if ($status == 'completed' || $status == 'shipped' || $status == 'paid')
                            $statusColor = 'bg-green-100 text-green-800 border-green-300';
                        if ($status == 'cancelled')
                            $statusColor = 'bg-red-100 text-red-800 border-red-300';
                        ?>
                        <div
                            class="px-4 py-2 rounded-full font-bold text-sm flex items-center gap-2 border <?= $statusColor ?>">
                            <span class="w-3 h-3 rounded-full bg-current"></span>
                            <span>Status: <?= ucfirst(htmlspecialchars($status)) ?></span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-6 md:p-8 border border-gray-200/80">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                            <i class="fas fa-receipt text-green-500"></i>
                            <span>Rincian Item Pesanan</span>
                        </h2>

                        <div class="space-y-6">
                            <?php foreach ($order['items'] as $item): ?>
                                <div class="flex justify-between items-start gap-4">
                                    <div class="min-w-0">
                                        <p class="font-bold text-gray-800 truncate">
                                            <?= htmlspecialchars($item['product_name']) ?>
                                        </p>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <?= htmlspecialchars($item['quantity']) ?> x Rp
                                            <?= number_format($item['price'], 0, ',', '.') ?>
                                        </p>
                                    </div>
                                    <p class="font-bold text-lg text-gray-800 flex-shrink-0">
                                        Rp <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-8 pt-6 border-t-2 border-dashed border-gray-200">
                            <div class="space-y-3 max-w-sm ml-auto">
                                <div class="flex justify-between font-semibold text-gray-600">
                                    <span>Subtotal</span>
                                    <span>Rp <?= number_format($order['total'], 0, ',', '.') ?></span>
                                </div>
                                <div
                                    class="flex justify-between items-center font-bold text-2xl text-gray-900 mt-2 pt-3 border-t border-gray-300">
                                    <span>Total</span>
                                    <span class="text-green-600">Rp
                                        <?= number_format($order['total'], 0, ',', '.') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-200/80">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <i class="fas fa-user-circle text-green-500"></i>
                                <span>Informasi Pelanggan</span>
                            </h2>
                            <div class="space-y-3 text-sm">
                                <div class="flex items-center gap-4">
                                    <span class="font-semibold text-gray-700 w-14 shrink-0">Nama</span>
                                    <span>:</span>
                                    <span class="w-28 shrink-0 font-semibold text-gray-700">
                                        <?= htmlspecialchars($order['customer_name']) ?>
                                    </span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="font-semibold text-gray-700 w-14 shrink-0">Email</span>
                                    <span>:</span>
                                    <span class="w-28 shrink-0 font-semibold text-gray-700">
                                        <?= htmlspecialchars($order['customer_email']) ?>
                                    </span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <span class="font-semibold text-gray-700 w-14 shrink-0">No.HP</span>
                                    <span>:</span>
                                    <span class="w-28 shrink-0 font-semibold text-gray-700">
                                        <?= htmlspecialchars($order['customer_phone']) ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-200/80">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <i class="fas fa-shipping-fast text-green-500"></i>
                                <span>Alamat Pengiriman</span>
                            </h2>
                            <address class="text-sm text-gray-600 leading-relaxed not-italic">
                                <?= nl2br(htmlspecialchars($order['shipping_address'])) ?>
                            </address>
                        </div>

                        <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-200/80">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                                <i class="fas fa-edit text-green-500"></i>
                                <span>Ubah Status</span>
                            </h2>
                            <form action="?url=pesanan-status&id=<?= $order['id'] ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $order['id'] ?>">

                                <div class="flex items-center gap-2">

                                    <select name="status"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                                        <option value="Belum Dibayar" <?= $order['status'] == 'Belum Dibayar' ? 'selected' : '' ?>>Belum Dibayar</option>
                                        <option value="Lunas" <?= $order['status'] == 'Lunas' ? 'selected' : '' ?>>Lunas
                                        </option>
                                        <option value="Dikirim" <?= $order['status'] == 'Dikirim' ? 'selected' : '' ?>>
                                            Dikirim</option>
                                        <option value="Selesai" <?= $order['status'] == 'Selesai' ? 'selected' : '' ?>>
                                            Selesai</option>
                                        <option value="Batal" <?= $order['status'] == 'Batal' ? 'selected' : '' ?>>Batal
                                        </option>
                                    </select>

                                    <button type="submit"
                                        class="w-full bg-green-600 text-white py-2.5 rounded-lg hover:bg-green-700 font-semibold transition-colors duration-300 shadow-lg hover:shadow-green-200 flex items-center justify-center gap-2">
                                        <i class="fas fa-save"></i>
                                        <span>Update Status</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>