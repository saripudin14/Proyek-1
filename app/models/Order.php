<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Order {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    // Membuat order baru (hanya untuk user yang sudah login, user_id wajib)
    public function createOrder($data) {
        // Insert ke orders
        $stmt = $this->db->prepare('INSERT INTO orders (user_id, total, status, shipping_address) VALUES (:user_id, :total, :status, :shipping_address)');
        $stmt->execute([
            'user_id' => $data['user_id'],
            'total' => $data['total'],
            'status' => $data['status'],
            'shipping_address' => $data['shipping_address']
        ]);
        $order_id = $this->db->lastInsertId();
        // Insert ke order_items (hanya satu produk per order untuk form sederhana)
        $stmt = $this->db->prepare('INSERT INTO order_items (order_id, product_id, product_name, price, quantity, unit) VALUES (:order_id, :product_id, :product_name, :price, :quantity, :unit)');
        $stmt->execute([
            'order_id' => $order_id,
            'product_id' => $data['product_id'],
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'unit' => $data['unit']
        ]);
        return $order_id;
    }
    // Ambil semua order beserta user (admin view)
    public function getAllWithUser() {
        $sql = 'SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Ambil detail order beserta item
    public function findByIdWithDetails($id) {
        $sql = 'SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE o.id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($order) {
            $sql2 = 'SELECT oi.*, p.name as product_name_ref FROM order_items oi LEFT JOIN products p ON oi.product_id = p.id WHERE oi.order_id = :order_id';
            $stmt2 = $this->db->prepare($sql2);
            $stmt2->execute(['order_id' => $id]);
            $order['details'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }
        return $order;
    }
    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare('UPDATE orders SET status = :status WHERE id = :id');
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM orders WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
