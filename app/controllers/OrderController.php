<?php
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Order.php';
require_once dirname(__DIR__) . '/models/Customer.php';

class OrderController {
    public function orderForm() {
        session_start();
        $productModel = new Product();
        $products = $productModel->getAll();
        $success = $_GET['success'] ?? null;
        // Hanya bisa order jika cart tidak kosong
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        if (empty($cart)) {
            header('Location: /proyek-1/public/?url=cart');
            exit;
        }
        require_once dirname(__DIR__) . '/views/pages/order_form.php';
    }

    public function submitOrder() {
        session_start();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        if (empty($cart)) {
            header('Location: /proyek-1/public/?url=cart');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['nama_lengkap'] ?? '';
            $email = $_POST['email'] ?? '';
            $alamat = $_POST['alamat'] ?? '';
            $no_telepon = $_POST['no_telepon'] ?? '';
            if (!$name || !$email || !$alamat) {
                $error = 'Semua field wajib diisi!';
                $productModel = new Product();
                $products = $productModel->getAll();
                require dirname(__DIR__) . '/views/pages/order_form.php';
                return;
            }
            // Cek/insert customer
            $customerModel = new Customer();
            $customer = $customerModel->findByEmail($email);
            if ($customer) {
                $customer_id = $customer['id'];
            } else {
                $customer_id = $customerModel->createNoPassword([
                    'nama_lengkap' => $name,
                    'email' => $email,
                    'no_telepon' => $no_telepon,
                    'alamat' => $alamat
                ]);
            }
            // Proses semua item di cart sebagai order terpisah (atau bisa juga satu order, tergantung kebutuhan)
            require_once dirname(__DIR__) . '/models/Order.php';
            $orderModel = new Order();
            foreach ($cart as $item) {
                $orderModel->createOrder([
                    'customer_id' => $customer_id,
                    'total' => $item['price'] * $item['qty'],
                    'status' => 'pending',
                    'shipping_address' => $alamat,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['qty'],
                    'unit' => $item['unit']
                ]);
            }
            unset($_SESSION['cart']);
            header('Location: /proyek-1/public/?url=order&success=1');
            exit;
        }
        header('Location: /proyek-1/public/?url=order');
        exit;
    }
}
