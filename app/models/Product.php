<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Mengambil produk dengan filter pencarian dan kategori.
     */
    public function getFiltered($filters = []) {
        $sql = "SELECT p.*, c.name as category_name 
                FROM products p 
                LEFT JOIN categories c ON p.category_id = c.id";

        $whereClauses = [];
        $params = [];

        if (!empty($filters['q'])) {
            $whereClauses[] = "p.name LIKE :q";
            $params[':q'] = '%' . $filters['q'] . '%';
        }

        if (!empty($filters['category'])) {
            $whereClauses[] = "p.category_id = :category_id";
            $params[':category_id'] = $filters['category'];
        }
        
        if (!empty($whereClauses)) {
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }
        
        $sql .= " ORDER BY p.name ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Menemukan satu produk berdasarkan ID.
     */
    public function findById($id) {
        $stmt = $this->db->prepare(
            "SELECT p.*, c.name as category_name 
             FROM products p
             LEFT JOIN categories c ON p.category_id = c.id
             WHERE p.id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Menghitung semua produk.
     */
    public function countAll() {
        return $this->db->query('SELECT COUNT(*) FROM products')->fetchColumn();
    }

    /**
     * ❗️ FUNGSI BARU ❗️
     * Membuat produk baru di database.
     */
    public function create($data) {
        $sql = "INSERT INTO products (category_id, name, description, price, stock, dimensions, color, unit, image) 
                VALUES (:category_id, :name, :description, :price, :stock, :dimensions, :color, :unit, :image)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * ❗️ FUNGSI BARU ❗️
     * Mengupdate produk yang sudah ada di database.
     */
    public function update($id, $data) {
        $data['id'] = $id;
        $sql = "UPDATE products SET 
                    category_id = :category_id, 
                    name = :name, 
                    description = :description, 
                    price = :price, 
                    stock = :stock, 
                    dimensions = :dimensions, 
                    color = :color, 
                    unit = :unit, 
                    image = :image 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * ❗️ FUNGSI BARU ❗️
     * Menghapus produk dari database.
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}