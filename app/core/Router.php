<?php
class Router {
    public function dispatch() {
        $url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';

        // Menggunakan switch-case untuk menangani semua rute
        switch ($url) {
            // --- Rute Halaman Utama ---
            case '':
            case 'home':
                require_once dirname(__DIR__) . '/controllers/HomeController.php';
                (new HomeController())->index();
                break;
            case 'katalog':
                require_once dirname(__DIR__) . '/controllers/HomeController.php';
                (new HomeController())->katalog();
                break;
            case 'produk-detail':
                require_once dirname(__DIR__) . '/controllers/HomeController.php';
                (new HomeController())->produkDetail();
                break;

            // --- Rute Keranjang Belanja ---
            case 'cart':
                require_once dirname(__DIR__) . '/controllers/CartController.php';
                (new CartController())->index();
                break;
            case 'cart-add':
                require_once dirname(__DIR__) . '/controllers/CartController.php';
                (new CartController())->add();
                break;
            case 'cart-remove':
                require_once dirname(__DIR__) . '/controllers/CartController.php';
                (new CartController())->remove();
                break;
            case 'cart-clear':
                require_once dirname(__DIR__) . '/controllers/CartController.php';
                (new CartController())->clear();
                break;
            case 'cart-ajax-update':
                require_once dirname(__DIR__) . '/controllers/CartController.php';
                (new CartController())->handleAjaxUpdate();
                break;

            // --- Rute Pemesanan (Order) ---
            case 'order':
                require_once dirname(__DIR__) . '/controllers/OrderController.php';
                (new OrderController())->orderForm();
                break;
            case 'order-submit':
                require_once dirname(__DIR__) . '/controllers/OrderController.php';
                (new OrderController())->submitOrder();
                break;
            case 'order-success':
                require_once dirname(__DIR__) . '/controllers/OrderController.php';
                (new OrderController())->orderSuccess();
                break;

            // --- Rute Autentikasi ---
            case 'login':
                require_once dirname(__DIR__) . '/controllers/AuthController.php';
                (new AuthController())->login();
                break;
            case 'logout':
                require_once dirname(__DIR__) . '/controllers/AuthController.php';
                (new AuthController())->logout();
                break;
            
            // RUTE BARU UNTUK REGISTRASI ADMIN
            case 'register':
                require_once dirname(__DIR__) . '/controllers/AuthController.php';
                (new AuthController())->register();
                break;

            // --- Rute Admin ---
            case 'admin-dashboard':
                 require_once dirname(__DIR__) . '/controllers/AdminController.php';
                 (new AdminController())->dashboard();
                 break;
            
            // Rute Produk (Admin)
            case 'produk':
                require_once dirname(__DIR__) . '/controllers/ProductController.php';
                (new ProductController())->index();
                break;
            case 'produk-tambah':
                require_once dirname(__DIR__) . '/controllers/ProductController.php';
                (new ProductController())->create();
                break;
            case 'produk-edit':
                require_once dirname(__DIR__) . '/controllers/ProductController.php';
                (new ProductController())->edit();
                break;
            case 'produk-hapus':
                require_once dirname(__DIR__) . '/controllers/ProductController.php';
                (new ProductController())->delete();
                break;

            // Rute Pesanan (Admin)
            case 'pesanan':
                require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
                (new OrderAdminController())->index();
                break;
             case 'pesanan-detail':
                require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
                (new OrderAdminController())->detail();
                break;
            case 'pesanan-status':
                require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
                (new OrderAdminController())->updateStatus();
                break;
            case 'pesanan-hapus':
                require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
                (new OrderAdminController())->delete();
                break;
            // RUTE BARU UNTUK RIWAYAT PESANAN
            case 'pesanan-riwayat':
                require_once dirname(__DIR__) . '/controllers/OrderAdminController.php';
                (new OrderAdminController())->history();
                break;

            // Rute Kategori (Admin)
            case 'kategori':
                require_once dirname(__DIR__) . '/controllers/CategoryController.php';
                (new CategoryController())->index();
                break;
            case 'kategori-tambah':
                require_once dirname(__DIR__) . '/controllers/CategoryController.php';
                (new CategoryController())->create();
                break;
            case 'kategori-edit':
                require_once dirname(__DIR__) . '/controllers/CategoryController.php';
                (new CategoryController())->edit();
                break;
            case 'kategori-hapus':
                require_once dirname(__DIR__) . '/controllers/CategoryController.php';
                (new CategoryController())->delete();
                break;

            default:
                http_response_code(404);
                echo '404 Not Found'; 
                break;
        }
    }
}