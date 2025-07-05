<?php
class CartController {
    public function add() {
        session_start();
        $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
        $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        if ($product_id < 1) {
            header('Location: /proyek-1/public/?url=katalog');
            exit;
        }
        require_once dirname(__DIR__) . '/models/Product.php';
        $productModel = new Product();
        $product = $productModel->findById($product_id);
        if (!$product) {
            header('Location: /proyek-1/public/?url=katalog');
            exit;
        }
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        if (isset($_SESSION['cart'][$product_id])) {
            if ($action === 'decrement') {
                $_SESSION['cart'][$product_id]['qty'] -= 1;
                if ($_SESSION['cart'][$product_id]['qty'] <= 0) {
                    unset($_SESSION['cart'][$product_id]);
                }
            } else { // increment atau default
                $_SESSION['cart'][$product_id]['qty'] += 1;
            }
        } else if ($qty > 0) {
            $_SESSION['cart'][$product_id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'unit' => $product['unit'],
                'image' => $product['image'],
                'qty' => $qty
            ];
        }
        header('Location: /proyek-1/public/?url=cart');
        exit;
    }

    public function index() {
        session_start();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        require_once dirname(__DIR__) . '/views/pages/cart.php';
    }

    public function remove() {
        session_start();
        $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
        header('Location: /proyek-1/public/?url=cart');
        exit;
    }

    public function clear() {
        session_start();
        unset($_SESSION['cart']);
        header('Location: /proyek-1/public/?url=cart');
        exit;
    }
}
