<?php
class CartController {

    /**
     * Metode untuk menampilkan halaman keranjang belanja.
     * Metode ini tidak berubah.
     */
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        require_once dirname(__DIR__) . '/views/pages/cart.php';
    }

    /**
     * Metode untuk menambahkan item ke keranjang dari halaman katalog.
     * Metode ini tidak berubah dan tetap digunakan untuk penambahan awal.
     */
    public function add() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
        $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 1;

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

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['qty'] += $qty;
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

    /**
     * -------------------------------------------------------------------
     * METODE BARU: Untuk menangani update AJAX dari halaman keranjang
     * -------------------------------------------------------------------
     * Metode ini akan dipanggil oleh JavaScript.
     * Tugasnya adalah menerima data JSON, mengubah data session,
     * dan mengembalikan respons dalam format JSON.
     */
    public function handleAjaxUpdate() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Memberi tahu browser bahwa responsnya adalah JSON
        header('Content-Type: application/json');

        // Mengambil data JSON yang dikirim oleh JavaScript
        $input = json_decode(file_get_contents('php://input'), true);

        // Validasi input dasar
        if (!isset($input['product_id']) || !isset($input['action'])) {
            echo json_encode(['success' => false, 'message' => 'Permintaan tidak valid.']);
            exit;
        }

        $productId = intval($input['product_id']);
        $action = $input['action'];
        $itemRemoved = false;
        $newQty = 0;

        // Proses aksi (increment, decrement, remove)
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

        // Hitung ulang total dan subtotal setelah ada perubahan
        $total = 0;
        $subtotal = 0;
        if(isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $item) {
                $itemSubtotal = $item['price'] * $item['qty'];
                $total += $itemSubtotal;

                if ($id == $productId) {
                    $subtotal = $itemSubtotal;
                    $newQty = $item['qty'];
                }
            }
        }

        // Siapkan data respons untuk dikirim kembali ke JavaScript
        $response = [
            'success' => true,
            'product_id' => $productId,
            'item_removed' => $itemRemoved,
            'new_qty' => $newQty,
            'new_subtotal' => $subtotal,
            'new_total' => $total,
        ];

        // Cetak respons sebagai JSON lalu hentikan skrip
        echo json_encode($response);
        exit;
    }

    /**
     * Metode lama ini tidak akan kita gunakan untuk AJAX,
     * tapi kita biarkan saja untuk saat ini.
     */
    public function remove() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
        header('Location: /proyek-1/public/?url=cart');
        exit;
    }

    public function clear() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['cart']);
        header('Location: /proyek-1/public/?url=cart');
        exit;
    }
}