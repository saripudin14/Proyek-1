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

    public function createNoPassword($data) {
        $sql = "INSERT INTO customers (nama, email, no_telepon, alamat) VALUES (:nama, :email, :no_telepon, :alamat)";
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'no_telepon' => $data['no_telepon'],
            'alamat' => $data['alamat']
        ]);
        return $success ? $this->db->lastInsertId() : false;
    }

    /**
     * ❗️ METODE BARU YANG DITAMBAHKAN ❗️
     * Menghitung jumlah semua pelanggan.
     */
    public function countAll() {
        // Menjalankan query untuk menghitung semua baris di tabel customers
        return $this->db->query('SELECT COUNT(*) FROM customers')->fetchColumn();
    }
}