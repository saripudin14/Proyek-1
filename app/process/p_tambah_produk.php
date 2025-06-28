<?php
// Logika untuk memproses form tambah produk
require_once '../config/database.php';

if (isset($_POST['nama_produk'], $_POST['harga_jual'], $_POST['stok'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $kategori = $_POST['category_id'];
    $satuan = $_POST['satuan'];
    $deskripsi = $_POST['deskripsi'] ?? '';
    $kode_produk = $_POST['kode_produk'] ?? null;
    $gambar = null;
    if (isset($_FILES['gambar_produk']) && $_FILES['gambar_produk']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar_produk']['name'], PATHINFO_EXTENSION);
        $gambar = uniqid('prd_') . '.' . $ext;
        move_uploaded_file($_FILES['gambar_produk']['tmp_name'], '../../public/uploads/products/' . $gambar);
    }
    $stmt = $pdo->prepare('INSERT INTO products (category_id, kode_produk, nama_produk, deskripsi, harga_jual, satuan, stok, gambar_produk) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$kategori, $kode_produk, $nama, $deskripsi, $harga, $satuan, $stok, $gambar]);
    header('Location: /Proyek 1/public/admin/produk.php?success=1');
    exit;
}
?>
