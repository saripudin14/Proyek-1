<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class User {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Cari user berdasarkan email (bukan username)
    public function findByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah user baru
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)');
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // Sudah di-hash
            'role' => $data['role']
        ]);
    }
}
