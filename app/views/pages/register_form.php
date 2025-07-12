<?php
// Start session to display success/error messages
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin Baru - Paris Plastik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>

<body class="bg-sky-50 dark:bg-gray-900 min-h-screen flex items-center justify-center p-4">

    <div
        class="bg-white dark:bg-gray-800 shadow-2xl rounded-2xl p-8 w-full max-w-md animate-fade-in border border-sky-100 dark:border-gray-700">

        <div class="text-center mb-8">
            <a href="?url=home" class="text-3xl font-extrabold text-sky-600 dark:text-sky-300 tracking-tight">
                Paris Plastik
            </a>
            <h2 class="text-xl mt-2 font-bold text-gray-600 dark:text-gray-300">Daftarkan Admin Baru</h2>
        </div>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline"><?= $_SESSION['success_message']; ?></span>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline"><?= $_SESSION['error_message']; ?></span>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <form method="post" action="?url=register" class="space-y-6">
            <div>
                <label for="name" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-user text-gray-400"></i>
                    </span>
                    <input type="text" name="name" id="name"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                        required>
                </div>
            </div>
            <div>
                <label for="email" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </span>
                    <input type="email" name="email" id="email"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                        required>
                </div>
            </div>
            <div>
                <label for="phone" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-phone text-gray-400"></i>
                    </span>
                    <input type="tel" name="phone" id="phone"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                        required>
                </div>
            </div>
            <div>
                <label for="address" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Alamat</label>
                <div class="relative">
                    <span class="absolute left-0 top-0 pl-3 pt-3">
                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                    </span>
                    <textarea name="address" id="address" rows="3"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                        required></textarea>
                </div>
            </div>
            <div>
                <label for="password" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-lock text-gray-400"></i>
                    </span>
                    <input type="password" name="password" id="password" placeholder="Minimal 8 karakter"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                        required>
                </div>
            </div>
            <div>
                <label for="password_confirm" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Konfirmasi
                    Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-lock text-gray-400"></i>
                    </span>
                    <input type="password" name="password_confirm" id="password_confirm"
                        class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition"
                        required>
                </div>
            </div>
            <button type="submit"
                class="w-full bg-sky-600 text-white py-3 rounded-lg hover:bg-sky-700 font-semibold text-lg transition-transform hover:scale-105 shadow-lg hover:shadow-sky-300/50">
                <i class="fas fa-user-plus mr-2"></i> Daftarkan Admin
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="?url=admin-dashboard"
                class="inline-block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-colors">
                &larr; Kembali ke Dashboard
            </a>
        </div>

    </div>

</body>

</html>