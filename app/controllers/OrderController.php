<?php
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Order.php';
require_once dirname(__DIR__) . '/models/Customer.php';

class OrderController {

    public function orderForm() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cart = $_SESSION['cart'] ?? [];
        if (empty($cart)) {
            header('Location: ?url=cart');
            exit;
        }
        require_once dirname(__DIR__) . '/views/pages/order_form.php';
    }

    public function submitOrder() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['cart'])) {
            header('Location: ?url=cart');
            exit;
        }

        // 1. Validasi Input Formulir
        $name = trim($_POST['nama_lengkap'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $alamat = trim($_POST['alamat'] ?? '');
        $no_telepon = trim($_POST['no_telepon'] ?? '');

        if (empty($name) || empty($email) || empty($alamat) || empty($no_telepon)) {
            $_SESSION['form_error'] = 'Semua field wajib diisi!';
            header('Location: ?url=order');
            exit;
        }

        // 2. Siapkan data pelanggan
        $customerModel = new Customer();
        $customer = $customerModel->findByEmail($email);
        if ($customer) {
            $customerId = $customer['id'];
        } else {
            // Menggunakan 'name' dan 'phone' sesuai database
            $customerId = $customerModel->createNoPassword([
                'name' => $name,
                'email' => $email,
                'phone' => $no_telepon,
                'address' => $alamat
            ]);
        }
        
        if (!$customerId) {
            $_SESSION['form_error'] = 'Gagal memproses data pelanggan.';
            header('Location: ?url=order');
            exit;
        }

        // 3. Hitung Total Harga
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // 4. Buat SATU Pesanan Utama
        $orderModel = new Order();
        $orderId = $orderModel->create([
            'customer_id' => $customerId,
            'total' => $total,
            // **PERBAIKAN**: Menggunakan status default yang baru
            'status' => 'Belum Dibayar',
            'shipping_address' => $alamat
        ]);

        // 5. Tambahkan Item-item ke Pesanan tersebut
        if ($orderId) {
            foreach ($_SESSION['cart'] as $item) {
                $orderModel->addOrderItem([
                    'order_id' => $orderId,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'quantity' => $item['qty'],
                    'price' => $item['price'],
                    'unit' => $item['unit']
                ]);
            }
            unset($_SESSION['cart']);
            header('Location: ?url=order-success&order_id=' . $orderId);
            exit;
        } else {
            $_SESSION['form_error'] = 'Gagal membuat pesanan. Silakan coba lagi.';
            header('Location: ?url=order');
            exit;
        }
    }
    
    public function orderSuccess() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $order_id = $_GET['order_id'] ?? null;
        if (!$order_id) {
            header('Location: ?url=home');
            exit;
        }

        require_once dirname(__DIR__) . '/views/pages/order_success.php';
    }
}