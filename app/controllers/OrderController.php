<?php
require_once dirname(__DIR__) . '/models/Customer.php';
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Order.php';

class OrderController {
    public function orderForm() {
        // Ambil semua produk untuk pilihan di form
        $productModel = new Product();
        $products = $productModel->getAll();
        $success = $_GET['success'] ?? null;
        require_once dirname(__DIR__) . '/views/pages/order_form.php';
    }

    public function submitOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama_lengkap'] ?? '';
            $email = $_POST['email'] ?? '';
            $alamat = $_POST['alamat'] ?? '';
            $no_telepon = $_POST['no_telepon'] ?? '';
            $product_id = $_POST['product_id'] ?? '';
            $jumlah = $_POST['jumlah'] ?? 1;

            // Validasi sederhana
            if (!$nama || !$email || !$alamat || !$product_id || !$jumlah) {
                $error = 'Semua field wajib diisi!';
                $productModel = new Product();
                $products = $productModel->getAll();
                require dirname(__DIR__) . '/views/pages/order_form.php';
                return;
            }

            // Simpan customer (jika email belum ada, insert, jika sudah, ambil id)
            $customerModel = new Customer();
            $customer = $customerModel->findByEmail($email);
            if (!$customer) {
                $customer_id = $customerModel->createNoPassword([
                    'nama_lengkap' => $nama,
                    'email' => $email,
                    'no_telepon' => $no_telepon,
                    'alamat' => $alamat
                ]);
            } else {
                $customer_id = $customer['id'];
            }

            // Simpan order dan order_details
            $orderModel = new Order();
            $order_id = $orderModel->createOrder([
                'customer_id' => $customer_id,
                'alamat_pengiriman' => $alamat,
                'catatan_pesanan' => '',
                'tipe_pesanan' => 'online',
                'status_pesanan' => 'pending',
                'product_id' => $product_id,
                'jumlah' => $jumlah
            ]);

            // Redirect ke halaman sukses
            header('Location: /proyek-1/public/?url=order&success=1');
            exit;
        }
        // Jika bukan POST, redirect ke form
        header('Location: /proyek-1/public/?url=order');
        exit;
    }
}
