<?php
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Order.php';

class OrderController {
    public function orderForm() {
        $productModel = new Product();
        $products = $productModel->getAll();
        $success = $_GET['success'] ?? null;
        require_once dirname(__DIR__) . '/views/pages/order_form.php';
    }

    public function submitOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['nama_lengkap'] ?? '';
            $email = $_POST['email'] ?? '';
            $alamat = $_POST['alamat'] ?? '';
            $no_telepon = $_POST['no_telepon'] ?? '';
            $product_id = $_POST['product_id'] ?? '';
            $jumlah = $_POST['jumlah'] ?? 1;

            if (!$name || !$email || !$alamat || !$product_id || !$jumlah) {
                $error = 'Semua field wajib diisi!';
                $productModel = new Product();
                $products = $productModel->getAll();
                require dirname(__DIR__) . '/views/pages/order_form.php';
                return;
            }

            // Ambil data produk
            $productModel = new Product();
            $product = $productModel->findById($product_id);
            if (!$product) {
                $error = 'Produk tidak ditemukan!';
                $products = $productModel->getAll();
                require dirname(__DIR__) . '/views/pages/order_form.php';
                return;
            }

            // Simpan order (user_id = 1 untuk demo, shipping_address gabungan)
            $orderModel = new Order();
            $order_id = $orderModel->createOrder([
                'user_id' => 1, // Untuk demo, seharusnya dari session user
                'total' => $product['price'] * $jumlah,
                'status' => 'pending',
                'shipping_address' => $name . ' | ' . $email . ' | ' . $no_telepon . ' | ' . $alamat,
                'product_id' => $product_id,
                'product_name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $jumlah,
                'unit' => $product['unit']
            ]);

            header('Location: /proyek-1/public/?url=order&success=1');
            exit;
        }
        header('Location: /proyek-1/public/?url=order');
        exit;
    }
}
