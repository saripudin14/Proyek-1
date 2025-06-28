<?php
// Koneksi & konfigurasi database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_toko_plastik';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die('Koneksi gagal: ' . $e->getMessage());
}
?>
