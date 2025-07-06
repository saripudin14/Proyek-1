<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Paris Plastik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-sky-50 dark:bg-gray-900">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md mx-auto text-center bg-white dark:bg-gray-800 p-10 rounded-2xl shadow-2xl animate-fade-in border border-gray-200 dark:border-gray-700">
            <div class="mx-auto mb-6 w-24 h-24 flex items-center justify-center bg-green-100 rounded-full">
                <i class="fas fa-check-circle text-6xl text-green-500"></i>
            </div>
            <h1 class="text-3xl font-extrabold text-green-600 mb-2">Pesanan Berhasil!</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Terima kasih telah berbelanja di Paris Plastik. Kami akan segera memproses pesanan Anda.</p>
            
            <?php if (!empty($order_id)): ?>
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 mb-8">
                    <p class="text-gray-800 dark:text-gray-200 font-semibold">Nomor Pesanan Anda:</p>
                    <p class="text-2xl font-bold text-sky-600 dark:text-sky-300 mt-1 tracking-wider"><?= htmlspecialchars($order_id) ?></p>
                </div>
            <?php endif; ?>
            
            <a href="?url=katalog" class="inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-lg font-bold shadow-lg transition-transform hover:scale-105">
                <i class="fas fa-shopping-bag"></i> Lanjut Belanja
            </a>
        </div>
    </div>

</body>
</html>