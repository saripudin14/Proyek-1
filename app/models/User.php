<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class User {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Cari user berdasarkan email
    public function findByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah user baru (SUDAH DIPERBARUI dengan alamat)
    public function create($data) {
        // 1. Query INSERT sekarang menyertakan kolom `address`
        $stmt = $this->db->prepare(
            'INSERT INTO users (name, email, password, phone, address, role) VALUES (:name, :email, :password, :phone, :address, :role)'
        );
        
        // 2. Eksekusi dengan data `address`
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'address' => $data['address'], // Data alamat ditambahkan di sini
            'role' => $data['role']
        ]);
    }
}