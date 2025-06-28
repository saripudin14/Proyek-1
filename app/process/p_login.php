<?php
// Logika untuk memproses form login
require_once '../config/database.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: /Proyek 1/public/admin/index.php');
        exit;
    } else {
        header('Location: /Proyek 1/public/login.php?error=1');
        exit;
    }
}
?>
