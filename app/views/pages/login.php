<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Login Admin</h2>
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-center">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form method="post" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Email</label>
                <input type="text" name="username" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required autofocus>
            </div>
            <div>
                <label class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-semibold">Login</button>
        </form>
    </div>
</body>
</html>
