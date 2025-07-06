<?php
// Pastikan file Product.php dipanggil jika belum
require_once dirname(__DIR__) . '/models/Product.php';

class CartController {

    /**
     * Menampilkan halaman keranjang belanja.
     */
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cart = $_SESSION['cart'] ?? [];
        require_once dirname(__DIR__) . '/views/pages/cart.php';
    }

    /**
     * Menambahkan item ke keranjang (untuk tombol di halaman katalog/detail).
     */
    public function add() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
        $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;

        if ($product_id > 0) {
            $productModel = new Product();
            $product = $productModel->findById($product_id);

            if ($product) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                if (isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id]['qty'] += $qty;
                } else {
                    $_SESSION['cart'][$product_id] = [
                        'id'    => $product['id'],
                        'name'  => $product['name'],
                        'price' => $product['price'],
                        'unit'  => $product['unit'],
                        'image' => $product['image'],
                        'qty'   => $qty
                    ];
                }
            }
        }
        // Redirect kembali ke halaman sebelumnya atau ke keranjang
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '?url=cart'));
        exit;
    }
    
    /**
     * Metode yang menangani semua update dari halaman keranjang (AJAX).
     */
    public function handleAjaxUpdate() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['product_id'], $input['action'])) {
            echo json_encode(['success' => false, 'message' => 'Permintaan tidak valid.']);
            exit;
        }

        $productId = intval($input['product_id']);
        $action = $input['action'];
        $itemRemoved = false;

        // Lakukan aksi pada item di keranjang
        if (isset($_SESSION['cart'][$productId])) {
            switch ($action) {
                case 'increment':
                    $_SESSION['cart'][$productId]['qty']++;
                    break;
                case 'decrement':
                    $_SESSION['cart'][$productId]['qty']--;
                    if ($_SESSION['cart'][$productId]['qty'] <= 0) {
                        unset($_SESSION['cart'][$productId]);
                        $itemRemoved = true;
                    }
                    break;
                case 'remove':
                    unset($_SESSION['cart'][$productId]);
                    $itemRemoved = true;
                    break;
            }
        }

        // **LOGIKA PENTING**: Hitung ulang total DARI AWAL setelah perubahan.
        $total = 0;
        $subtotal = 0;
        $newQty = 0;
        
        foreach ($_SESSION['cart'] as $id => $item) {
            $total += $item['price'] * $item['qty'];
        }

        // Dapatkan data subtotal dan qty baru khusus untuk item yang diubah (jika masih ada)
        if (isset($_SESSION['cart'][$productId])) {
            $item = $_SESSION['cart'][$productId];
            $subtotal = $item['price'] * $item['qty'];
            $newQty = $item['qty'];
        }

        // Siapkan dan kirim respons JSON yang akurat
        echo json_encode([
            'success'       => true,
            'product_id'    => $productId,
            'item_removed'  => $itemRemoved,
            'new_qty'       => $newQty,
            'new_subtotal'  => $subtotal,
            'new_total'     => $total,
        ]);
        exit;
    }

    /**
     * Mengosongkan seluruh keranjang.
     */
    public function clear() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['cart']);
        header('Location: ?url=cart');
        exit;
    }
}