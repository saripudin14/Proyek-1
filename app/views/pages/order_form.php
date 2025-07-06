<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Paris Plastik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-sky-50 dark:bg-gray-900">

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-sky-700 dark:text-sky-300">Checkout</h1>
                <p class="text-lg text-gray-500 dark:text-gray-400 mt-2">Selesaikan pesanan Anda dalam beberapa langkah mudah.</p>
            </div>

            <?php 
                // Mengambil pesan error dari session jika ada
                $error = $_SESSION['form_error'] ?? null; 
                // Hapus pesan error dari session agar tidak muncul lagi setelah refresh
                unset($_SESSION['form_error']); 
            ?>
            <?php if ($error): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg relative mb-8" role="alert">
                    <strong class="font-bold">Terjadi Kesalahan!</strong>
                    <span class="block sm:inline"><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endif; ?>

            <form method="post" action="?url=order-submit" class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-3"><i class="fas fa-user-circle text-sky-500"></i> Informasi Pengiriman</h2>
                    <div class="space-y-6">
                        <div>
                            <label for="nama_lengkap" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" id="email" name="email" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                        </div>
                        <div>
                            <label for="no_telepon" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">No. Telepon</label>
                            <input type="tel" id="no_telepon" name="no_telepon" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Alamat Lengkap Pengiriman</label>
                            <textarea id="alamat" name="alamat" rows="4" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-3"><i class="fas fa-receipt text-sky-500"></i> Ringkasan Pesanan</h2>
                    <div class="space-y-4">
                        <?php $total = 0; if (!empty($cart)): ?>
                            <?php foreach ($cart as $item): 
                                $subtotal = $item['price'] * $item['qty'];
                                $total += $subtotal;
                            ?>
                                <div class="flex justify-between items-center gap-4 border-b border-gray-100 dark:border-gray-700 pb-4">
                                    <div class="flex items-center gap-4 min-w-0">
                                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="" class="w-16 h-16 object-cover rounded-lg border flex-shrink-0">
                                        <div class="flex-1 min-w-0">
                                            <p class="font-semibold text-gray-800 dark:text-gray-200 truncate"><?= htmlspecialchars($item['name']) ?></p>
                                            <p class="text-sm text-gray-500">Jumlah: <?= $item['qty'] ?></p>
                                        </div>
                                    </div>
                                    <p class="font-semibold text-gray-800 dark:text-gray-200 flex-shrink-0">Rp <?= number_format($subtotal, 0, ',', '.') ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="mt-6 border-t-2 border-dashed pt-6 space-y-3">
                        <div class="flex justify-between font-semibold text-gray-600 dark:text-gray-300">
                            <span>Subtotal</span>
                            <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
                        </div>
                        <div class="flex justify-between font-semibold text-gray-600 dark:text-gray-300">
                            <span>Biaya Pengiriman</span>
                            <span>Akan diinfokan</span>
                        </div>
                        <div class="flex justify-between items-center font-bold text-xl text-gray-900 dark:text-white mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <span>Total</span>
                            <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
                        </div>
                    </div>
                     <button type="submit" class="mt-8 w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 font-semibold text-lg transition-transform hover:scale-105 shadow-lg hover:shadow-green-300/50 flex items-center justify-center gap-2">
                        <i class="fas fa-check-circle"></i>
                        Buat Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>