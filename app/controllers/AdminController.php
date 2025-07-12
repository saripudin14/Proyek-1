<?php
require_once dirname(__DIR__) . '/models/Order.php';
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Customer.php';
require_once dirname(__DIR__) . '/models/Category.php';

class AdminController {

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Pastikan hanya admin yang bisa mengakses controller ini
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ?url=login&error=Akses ditolak');
            exit;
        }
    }

    public function dashboard() {
        $orderModel = new Order();
        $productModel = new Product();
        $categoryModel = new Category();

        // --- PERBAIKAN DI SINI ---
        // 1. Ambil pesanan yang belum selesai untuk statistik "Pesanan Aktif"
        $uncompleted_orders = $orderModel->getUncompletedOrders();
        
        // 2. Ambil pesanan yang sudah selesai
        $completed_orders = $orderModel->getCompletedOrders();
        
        // 3. Gabungkan keduanya untuk statistik total penjualan
        $all_orders = array_merge($uncompleted_orders, $completed_orders);
        
        // Mengambil data user dari sesi
        $user = $_SESSION['user']; 
        
        // Statistik Total Penjualan (dihitung dari semua pesanan)
        $stat_total_penjualan = $this->calculateTotalSales($all_orders);

        // Statistik Jumlah Pesanan (sekarang hanya menghitung pesanan aktif)
        $stat_pesanan = count($uncompleted_orders);

        // Statistik Jumlah Produk
        $stat_produk = $productModel->countAll();

        // Statistik Jumlah Kategori
        $stat_kategori = $categoryModel->countAll();
        
        // Memuat file view
        require_once dirname(__DIR__) . '/views/pages/admin_dashboard.php';
    }

    /**
     * Fungsi bantuan untuk menghitung total penjualan dari pesanan.
     */
    private function calculateTotalSales($orders) {
        $total = 0;
        foreach ($orders as $order) {
            // Hanya hitung pesanan yang statusnya Lunas, Dikirim, atau Selesai
            if (in_array($order['status'], ['Lunas', 'Dikirim', 'Selesai'])) {
                $total += $order['total'];
            }
        }
        return $total;
    }
}