<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Category {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM categories ORDER BY name ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO categories (name, description) VALUES (:name, :description)');
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
        return $this->db->lastInsertId();
    }
    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE categories SET name = :name, description = :description WHERE id = :id');
        return $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'id' => $id
        ]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
