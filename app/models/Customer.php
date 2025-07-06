<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Customer {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM customers WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * PERBAIKAN FINAL: Menggunakan 'name' dan 'phone' sesuai database.
     */
    public function createNoPassword($data) {
        $sql = "INSERT INTO customers (name, email, phone, address) VALUES (:name, :email, :phone, :address)";
        $stmt = $this->db->prepare($sql);
        
        $success = $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);

        return $success ? $this->db->lastInsertId() : false;
    }

    public function countAll() {
        return $this->db->query('SELECT COUNT(*) FROM customers')->fetchColumn();
    }
}