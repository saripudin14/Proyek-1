<?php
require_once dirname(__DIR__) . '/models/Order.php';

class OrderAdminController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $orderModel = new Order();
        $orders = $orderModel->getAllWithCustomer();
        require_once dirname(__DIR__) . '/views/pages/order_list.php';
    }

    public function detail() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        $orderModel = new Order();
        $order = $orderModel->findByIdWithDetails($id);
        if (!$order) {
            header('Location: /proyek-1/public/?url=pesanan');
            exit;
        }
        require_once dirname(__DIR__) . '/views/pages/order_detail.php';
    }

    public function updateStatus() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        $status = $_POST['status_pesanan'] ?? null;
        if ($id && $status) {
            $orderModel = new Order();
            $orderModel->updateStatus($id, $status);
        }
        header('Location: /proyek-1/public/?url=pesanan-detail&id=' . $id);
        exit;
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        if ($id) {
            $orderModel = new Order();
            $orderModel->delete($id);
        }
        header('Location: /proyek-1/public/?url=pesanan');
        exit;
    }
}
