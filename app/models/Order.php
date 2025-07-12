<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Order {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create($data) {
        $sql = 'INSERT INTO orders (customer_id, total, status, shipping_address) 
                VALUES (:customer_id, :total, :status, :shipping_address)';
        $stmt = $this->db->prepare($sql);
        
        $success = $stmt->execute([
            'customer_id' => $data['customer_id'],
            'total' => $data['total'],
            'status' => $data['status'],
            'shipping_address' => $data['shipping_address']
        ]);

        return $success ? $this->db->lastInsertId() : false;
    }

    public function addOrderItem($data) {
        $sql = 'INSERT INTO order_items (order_id, product_id, product_name, price, quantity, unit) 
                VALUES (:order_id, :product_id, :product_name, :price, :quantity, :unit)';
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            'order_id' => $data['order_id'],
            'product_id' => $data['product_id'],
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'unit' => $data['unit']
        ]);
    }
    
    // FUNGSI BARU: Mengambil pesanan yang BELUM selesai
    public function getUncompletedOrders() {
        $sql = "SELECT o.*, c.name as customer_name, c.email as customer_email, c.phone as customer_phone
                FROM orders o 
                LEFT JOIN customers c ON o.customer_id = c.id 
                WHERE o.status != 'Selesai'
                ORDER BY o.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // FUNGSI BARU: Mengambil pesanan yang SUDAH selesai
    public function getCompletedOrders() {
        $sql = "SELECT o.*, c.name as customer_name, c.email as customer_email, c.phone as customer_phone
                FROM orders o 
                LEFT JOIN customers c ON o.customer_id = c.id 
                WHERE o.status = 'Selesai'
                ORDER BY o.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByIdWithCustomerDetails($id) {
        $sql = 'SELECT o.*, c.name as customer_name, c.email as customer_email, c.phone as customer_phone
                FROM orders o 
                LEFT JOIN customers c ON o.customer_id = c.id 
                WHERE o.id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($order) {
            $sql2 = 'SELECT * FROM order_items WHERE order_id = :order_id';
            $stmt2 = $this->db->prepare($sql2);
            $stmt2->execute(['order_id' => $id]);
            $order['items'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $order;
    }

    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare('UPDATE orders SET status = :status WHERE id = :id');
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }

    public function delete($id) {
        $this->db->prepare('DELETE FROM order_items WHERE order_id = :id')->execute(['id' => $id]);
        $stmt = $this->db->prepare('DELETE FROM orders WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}