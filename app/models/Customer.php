<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Customer {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function findByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM customers WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Tambah customer baru (opsional)
    public function create($data) {
        $stmt = $this->db->prepare('INSERT INTO customers (nama_lengkap, email, password, no_telepon, alamat) VALUES (:nama_lengkap, :email, :password, :no_telepon, :alamat)');
        return $stmt->execute([
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'password' => $data['password'],
            'no_telepon' => $data['no_telepon'],
            'alamat' => $data['alamat']
        ]);
    }
    public function createNoPassword($data) {
        $stmt = $this->db->prepare('INSERT INTO customers (nama_lengkap, email, no_telepon, alamat) VALUES (:nama_lengkap, :email, :no_telepon, :alamat)');
        $stmt->execute([
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'no_telepon' => $data['no_telepon'],
            'alamat' => $data['alamat']
        ]);
        return $this->db->lastInsertId();
    }
}
