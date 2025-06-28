<?php
// Fungsi terkait autentikasi (cek login, hak akses)
session_start();

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: /Proyek 1/public/login.php');
        exit;
    }
}

function user_role() {
    return $_SESSION['role'] ?? null;
}
?>
