<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Product {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM products ORDER BY name ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO products (category_id, name, description, price, stock, dimensions, color, unit, image) VALUES (:category_id, :name, :description, :price, :stock, :dimensions, :color, :unit, :image)');
        $stmt->execute([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'dimensions' => $data['dimensions'],
            'color' => $data['color'],
            'unit' => $data['unit'],
            'image' => $data['image']
        ]);
        return $this->db->lastInsertId();
    }
    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data) {
        $stmt = $this->db->prepare('UPDATE products SET category_id = :category_id, name = :name, description = :description, price = :price, stock = :stock, dimensions = :dimensions, color = :color, unit = :unit, image = :image WHERE id = :id');
        return $stmt->execute([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'dimensions' => $data['dimensions'],
            'color' => $data['color'],
            'unit' => $data['unit'],
            'image' => $data['image'],
            'id' => $id
        ]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
    public function getCategories() {
        $stmt = $this->db->query('SELECT * FROM categories ORDER BY name ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
