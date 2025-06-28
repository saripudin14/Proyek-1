<?php
// Logika untuk memproses pesanan pelanggan (checkout)
require_once '../config/database.php';

if (isset($_POST['customer_id'], $_POST['items'])) {
    $customer_id = $_POST['customer_id'];
    $alamat = $_POST['alamat_pengiriman'] ?? '';
    $catatan = $_POST['catatan_pesanan'] ?? '';
    $total = $_POST['total_harga'];
    $metode = $_POST['metode_pembayaran'] ?? '';
    $invoice = 'INV' . time();
    $status = 'pending';
    $tipe = 'online';
    $stmt = $pdo->prepare('INSERT INTO orders (customer_id, nomor_invoice, total_harga, metode_pembayaran, status_pesanan, tipe_pesanan, alamat_pengiriman, catatan_pesanan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$customer_id, $invoice, $total, $metode, $status, $tipe, $alamat, $catatan]);
    $order_id = $pdo->lastInsertId();
    foreach ($_POST['items'] as $item) {
        $stmt = $pdo->prepare('INSERT INTO order_details (order_id, product_id, jumlah, harga_saat_transaksi, subtotal) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$order_id, $item['product_id'], $item['jumlah'], $item['harga'], $item['subtotal']]);
    }
    header('Location: /Proyek 1/public/keranjang.php?checkout=success');
    exit;
}
?>
