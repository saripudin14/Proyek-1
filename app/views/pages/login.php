<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Paris Plastik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-sky-50 dark:bg-gray-900 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-2xl p-8 w-full max-w-md animate-fade-in border border-sky-100 dark:border-gray-700">
        
        <div class="text-center mb-8">
             <a href="?url=home" class="text-3xl font-extrabold text-sky-600 dark:text-sky-300 tracking-tight">
                 Paris Plastik
             </a>
            <h2 class="text-xl mt-2 font-bold text-gray-600 dark:text-gray-300">Admin Login</h2>
        </div>

        <?php if (!empty($error)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Login Gagal!</strong>
                <span class="block sm:inline"><?= htmlspecialchars($error) ?></span>
            </div>
        <?php endif; ?>

        <form method="post" class="space-y-6">
            <div>
                <label for="email" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </span>
                    <input type="email" name="email" id="email" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required autofocus>
                </div>
            </div>
            <div>
                <label for="password" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Password</label>
                 <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-lock text-gray-400"></i>
                    </span>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                </div>
            </div>
            <button type="submit" class="w-full bg-sky-600 text-white py-3 rounded-lg hover:bg-sky-700 font-semibold text-lg transition-transform hover:scale-105 shadow-lg hover:shadow-sky-300/50">
                Login
            </button>
        </form>

    </div>

</body>
</html>