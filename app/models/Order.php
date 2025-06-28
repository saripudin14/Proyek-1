<?php
require_once dirname(__DIR__, 2) . '/app/core/Database.php';

class Order {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function createOrder($data) {
        // Buat nomor invoice unik
        $nomor_invoice = 'INV-' . date('YmdHis') . '-' . rand(100,999);
        // Ambil harga produk
        $stmt = $this->db->prepare('SELECT harga_jual FROM products WHERE id = :id');
        $stmt->execute(['id' => $data['product_id']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        $harga = $product ? $product['harga_jual'] : 0;
        $subtotal = $harga * $data['jumlah'];
        // Insert ke orders
        $stmt = $this->db->prepare('INSERT INTO orders (customer_id, nomor_invoice, total_harga, status_pesanan, tipe_pesanan, alamat_pengiriman, catatan_pesanan) VALUES (:customer_id, :nomor_invoice, :total_harga, :status_pesanan, :tipe_pesanan, :alamat_pengiriman, :catatan_pesanan)');
        $stmt->execute([
            'customer_id' => $data['customer_id'],
            'nomor_invoice' => $nomor_invoice,
            'total_harga' => $subtotal,
            'status_pesanan' => $data['status_pesanan'],
            'tipe_pesanan' => $data['tipe_pesanan'],
            'alamat_pengiriman' => $data['alamat_pengiriman'],
            'catatan_pesanan' => $data['catatan_pesanan']
        ]);
        $order_id = $this->db->lastInsertId();
        // Insert ke order_details
        $stmt = $this->db->prepare('INSERT INTO order_details (order_id, product_id, jumlah, harga_saat_transaksi, subtotal) VALUES (:order_id, :product_id, :jumlah, :harga, :subtotal)');
        $stmt->execute([
            'order_id' => $order_id,
            'product_id' => $data['product_id'],
            'jumlah' => $data['jumlah'],
            'harga' => $harga,
            'subtotal' => $subtotal
        ]);
        return $order_id;
    }
    public function getAllWithCustomer() {
        $sql = 'SELECT o.*, c.nama_lengkap as customer_nama, c.email as customer_email FROM orders o LEFT JOIN customers c ON o.customer_id = c.id ORDER BY o.tanggal_pesanan DESC';
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findByIdWithDetails($id) {
        $sql = 'SELECT o.*, c.nama_lengkap as customer_nama, c.email as customer_email FROM orders o LEFT JOIN customers c ON o.customer_id = c.id WHERE o.id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($order) {
            $sql2 = 'SELECT od.*, p.nama_produk, p.kode_produk FROM order_details od LEFT JOIN products p ON od.product_id = p.id WHERE od.order_id = :order_id';
            $stmt2 = $this->db->prepare($sql2);
            $stmt2->execute(['order_id' => $id]);
            $order['details'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }
        return $order;
    }
    public function updateStatus($id, $status) {
        $stmt = $this->db->prepare('UPDATE orders SET status_pesanan = :status WHERE id = :id');
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM orders WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
