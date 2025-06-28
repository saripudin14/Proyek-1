<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class User {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Cari user berdasarkan username
    public function findByUsername($username) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah user baru
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO users (nama_lengkap, username, password, role) VALUES (:nama_lengkap, :username, :password, :role)');
        return $stmt->execute([
            'nama_lengkap' => $data['nama_lengkap'],
            'username' => $data['username'],
            'password' => $data['password'], // Sudah di-hash
            'role' => $data['role']
        ]);
    }
}
