<?php
// Pastikan memuat model yang diperlukan
require_once dirname(__DIR__) . '/models/Order.php';

// Pastikan nama kelas persis seperti ini: OrderAdminController
class OrderAdminController {

    public function __construct() {
        // Memulai sesi dan memeriksa role admin untuk semua fungsi
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ?url=login&error=Akses ditolak');
            exit;
        }
    }

    // Menampilkan daftar semua pesanan
    public function index() {
        $orderModel = new Order();
        $orders = $orderModel->getAllWithCustomer(); 
        // Pastikan path view ini benar
        require_once dirname(__DIR__) . '/views/pages/order_list.php';
    }

    // Menampilkan detail satu pesanan
    public function detail() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?url=pesanan');
            exit;
        }
        $orderModel = new Order();
        $order = $orderModel->findByIdWithCustomerDetails($id); 
        
        if (!$order) {
            header('Location: ?url=pesanan');
            exit;
        }
        // Pastikan path view ini benar
        require_once dirname(__DIR__) . '/views/pages/order_detail.php';
    }

    // Memperbarui status pesanan
    public function updateStatus() {
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? null;
        
        if ($id && $status) {
            $orderModel = new Order();
            $orderModel->updateStatus($id, $status);
        }
        
        header('Location: ?url=pesanan-detail&id=' . $id);
        exit;
    }

    // Menghapus pesanan
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $orderModel = new Order();
            $orderModel->delete($id);
        }
        header('Location: ?url=pesanan');
        exit;
    }
}