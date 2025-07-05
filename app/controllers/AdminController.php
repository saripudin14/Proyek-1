<?php
require_once dirname(__DIR__) . '/models/Order.php';
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Customer.php';
require_once dirname(__DIR__) . '/models/Category.php'; // Tambahkan ini

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
        $customerModel = new Customer();
        $categoryModel = new Category(); // Buat instance Category

        // Mengambil data untuk ditampilkan di tabel
        $orders = $orderModel->getAllWithCustomer();
        
        // **PERBAIKAN**: Menghitung semua data statistik yang dibutuhkan oleh view
        $user = $_SESSION['user']; // 1. Mengambil data user dari sesi
        
        // 2. Statistik Total Penjualan
        $stat_total_penjualan = $this->calculateTotalSales($orders);

        // 3. Statistik Jumlah Pesanan
        $stat_pesanan = count($orders);

        // 4. Statistik Jumlah Produk
        $stat_produk = $productModel->countAll();

        // 5. Statistik Jumlah Kategori
        $stat_kategori = $categoryModel->countAll(); // Membutuhkan metode countAll() di Category.php
        
        // Memuat file view
        require_once dirname(__DIR__) . '/views/pages/admin_dashboard.php';
    }

    /**
     * Fungsi bantuan untuk menghitung total penjualan dari pesanan yang selesai.
     */
    private function calculateTotalSales($orders) {
        $total = 0;
        foreach ($orders as $order) {
            // Hanya hitung pesanan yang statusnya 'completed' atau 'shipped' (sesuaikan jika perlu)
            if (in_array($order['status'], ['completed', 'shipped', 'delivered'])) {
                $total += $order['total'];
            }
        }
        return $total;
    }
}