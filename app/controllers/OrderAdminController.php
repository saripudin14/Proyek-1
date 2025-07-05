<?php
require_once dirname(__DIR__) . '/models/Order.php';

class OrderAdminController {

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ?url=login');
            exit;
        }
    }

    public function index() {
        $orderModel = new Order();
        // **PERBAIKAN**: Memanggil metode yang benar -> getAllWithCustomer()
        $orders = $orderModel->getAllWithCustomer(); 
        require_once dirname(__DIR__) . '/views/admin/order_list.php'; // Pastikan path ini benar
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ?url=pesanan');
            exit;
        }
        $orderModel = new Order();
        // **PERBAIKAN**: Memanggil metode yang benar -> findByIdWithCustomerDetails()
        $order = $orderModel->findByIdWithCustomerDetails($id); 
        
        if (!$order) {
            header('Location: ?url=pesanan');
            exit;
        }
        require_once dirname(__DIR__) . '/views/admin/order_detail.php'; // Pastikan path ini benar
    }

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