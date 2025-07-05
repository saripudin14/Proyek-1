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
    /**
     * Ambil produk dengan filter pencarian dan kategori (untuk katalog publik)
     * @param string|null $q
     * @param int|string|null $categoryId
     * @return array
     */
    public function getFiltered($q = null, $categoryId = null) {
        $sql = 'SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE 1';
        $params = [];
        if ($q) {
            $sql .= ' AND (p.name LIKE :q OR p.description LIKE :q)';
            $params['q'] = '%' . $q . '%';
        }
        if ($categoryId) {
            $sql .= ' AND p.category_id = :category_id';
            $params['category_id'] = $categoryId;
        }
        $sql .= ' ORDER BY p.name ASC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
