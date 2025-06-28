<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Category {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM categories ORDER BY nama_kategori ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO categories (nama_kategori, deskripsi) VALUES (:nama_kategori, :deskripsi)');
        $stmt->execute([
            'nama_kategori' => $data['nama_kategori'],
            'deskripsi' => $data['deskripsi']
        ]);
        return $this->db->lastInsertId();
    }
    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE categories SET nama_kategori = :nama_kategori, deskripsi = :deskripsi WHERE id = :id');
        return $stmt->execute([
            'nama_kategori' => $data['nama_kategori'],
            'deskripsi' => $data['deskripsi'],
            'id' => $id
        ]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
