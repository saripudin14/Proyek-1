<?php
// Logika untuk memproses form edit produk
require_once '../config/database.php';

if (isset($_POST['id'], $_POST['nama_produk'], $_POST['harga_jual'], $_POST['stok'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $kategori = $_POST['category_id'];
    $satuan = $_POST['satuan'];
    $deskripsi = $_POST['deskripsi'] ?? '';
    $kode_produk = $_POST['kode_produk'] ?? null;
    $gambar = $_POST['gambar_lama'] ?? null;
    if (isset($_FILES['gambar_produk']) && $_FILES['gambar_produk']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar_produk']['name'], PATHINFO_EXTENSION);
        $gambar = uniqid('prd_') . '.' . $ext;
        move_uploaded_file($_FILES['gambar_produk']['tmp_name'], '../../public/uploads/products/' . $gambar);
    }
    $stmt = $pdo->prepare('UPDATE products SET category_id=?, kode_produk=?, nama_produk=?, deskripsi=?, harga_jual=?, satuan=?, stok=?, gambar_produk=? WHERE id=?');
    $stmt->execute([$kategori, $kode_produk, $nama, $deskripsi, $harga, $satuan, $stok, $gambar, $id]);
    header('Location: /Proyek 1/public/admin/produk.php?edit=1');
    exit;
}
?>
