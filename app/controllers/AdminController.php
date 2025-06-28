<?php
class AdminController {
    public function dashboard() {
        session_start();
        // Proteksi: hanya admin yang boleh akses
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $user = $_SESSION['user'];
        // Statistik
        require_once dirname(__DIR__) . '/models/Product.php';
        require_once dirname(__DIR__) . '/models/Category.php';
        require_once dirname(__DIR__) . '/models/Order.php';
        $productModel = new Product();
        $categoryModel = new Category();
        $orderModel = new Order();
        $stat_produk = count($productModel->getAll());
        $stat_kategori = count($categoryModel->getAll());
        $orders = $orderModel->getAllWithCustomer();
        $stat_pesanan = count($orders);
        $stat_total_penjualan = 0;
        foreach ($orders as $o) {
            if (in_array($o['status_pesanan'], ['paid','processing','shipped','completed'])) {
                $stat_total_penjualan += $o['total_harga'];
            }
        }
        require_once dirname(__DIR__) . '/views/pages/admin_dashboard.php';
    }
}
