<?php
class Router {
    public function dispatch() {
        $url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';
        if ($url === '' || $url === 'home') {
            require_once dirname(__DIR__) . '/controllers/HomeController.php';
            $controller = new HomeController();
            $controller->index();
        } elseif ($url === 'login') {
            require_once dirname(__DIR__) . '/controllers/AuthController.php';
            $controller = new AuthController();
            $controller->login();
        } elseif ($url === 'logout') {
            require_once dirname(__DIR__) . '/controllers/AuthController.php';
            $controller = new AuthController();
            $controller->logout();
        } elseif ($url === 'admin-dashboard') {
            require_once dirname(__DIR__) . '/controllers/AdminController.php';
            $controller = new AdminController();
            $controller->dashboard();
        } elseif ($url === 'order') {
            require_once dirname(__DIR__) . '/controllers/OrderController.php';
            $controller = new OrderController();
            $controller->orderForm();
        } elseif ($url === 'order-submit') {
            require_once dirname(__DIR__) . '/controllers/OrderController.php';
            $controller = new OrderController();
            $controller->submitOrder();
        } elseif ($url === 'produk') {
            require_once dirname(__DIR__) . '/controllers/ProductController.php';
            $controller = new ProductController();
            $controller->index();
        } elseif ($url === 'produk-tambah') {
            require_once dirname(__DIR__) . '/controllers/ProductController.php';
            $controller = new ProductController();
            $controller->create();
        } elseif ($url === 'produk-edit') {
            require_once dirname(__DIR__) . '/controllers/ProductController.php';
            $controller = new ProductController();
            $controller->edit();
        } elseif ($url === 'produk-hapus') {
            require_once dirname(__DIR__) . '/controllers/ProductController.php';
            $controller = new ProductController();
            $controller->delete();
        } elseif ($url === 'kategori') {
            require_once dirname(__DIR__) . '/controllers/CategoryController.php';
            $controller = new CategoryController();
            $controller->index();
        } elseif ($url === 'kategori-tambah') {
            require_once dirname(__DIR__) . '/controllers/CategoryController.php';
            $controller = new CategoryController();
            $controller->create();
        } elseif ($url === 'kategori-edit') {
            require_once dirname(__DIR__) . '/controllers/CategoryController.php';
            $controller = new CategoryController();
            $controller->edit();
        } elseif ($url === 'kategori-hapus') {
            require_once dirname(__DIR__) . '/controllers/CategoryController.php';
            $controller = new CategoryController();
            $controller->delete();
        } elseif ($url === 'pesanan') {
            require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
            $controller = new OrderAdminController();
            $controller->index();
        } elseif ($url === 'pesanan-detail') {
            require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
            $controller = new OrderAdminController();
            $controller->detail();
        } elseif ($url === 'pesanan-status') {
            require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
            $controller = new OrderAdminController();
            $controller->updateStatus();
        } elseif ($url === 'pesanan-hapus') {
            require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
            $controller = new OrderAdminController();
            $controller->delete();
        } else {
            http_response_code(404);
            echo '404 Not Found';
        }
    }
}
