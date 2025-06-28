<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Product {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM products ORDER BY nama_produk ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO products (category_id, kode_produk, nama_produk, deskripsi, harga_jual, satuan, stok, gambar_produk) VALUES (:category_id, :kode_produk, :nama_produk, :deskripsi, :harga_jual, :satuan, :stok, :gambar_produk)');
        $stmt->execute([
            'category_id' => $data['category_id'],
            'kode_produk' => $data['kode_produk'],
            'nama_produk' => $data['nama_produk'],
            'deskripsi' => $data['deskripsi'],
            'harga_jual' => $data['harga_jual'],
            'satuan' => $data['satuan'],
            'stok' => $data['stok'],
            'gambar_produk' => $data['gambar_produk']
        ]);
        return $this->db->lastInsertId();
    }
    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE products SET category_id = :category_id, kode_produk = :kode_produk, nama_produk = :nama_produk, deskripsi = :deskripsi, harga_jual = :harga_jual, satuan = :satuan, stok = :stok, gambar_produk = :gambar_produk WHERE id = :id');
        return $stmt->execute([
            'category_id' => $data['category_id'],
            'kode_produk' => $data['kode_produk'],
            'nama_produk' => $data['nama_produk'],
            'deskripsi' => $data['deskripsi'],
            'harga_jual' => $data['harga_jual'],
            'satuan' => $data['satuan'],
            'stok' => $data['stok'],
            'gambar_produk' => $data['gambar_produk'],
            'id' => $id
        ]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
    public function getCategories() {
        $stmt = $this->db->query('SELECT * FROM categories ORDER BY nama_kategori ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
