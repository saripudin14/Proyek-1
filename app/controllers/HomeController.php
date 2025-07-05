<?php
// Memanggil model yang diperlukan
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Category.php'; 

class HomeController {

    /**
     * Menampilkan halaman utama (home).
     */
    public function index() {
        require_once dirname(__DIR__) . '/views/pages/home.php';
    }

    /**
     * Menampilkan halaman katalog produk dengan filter.
     */
    public function katalog() {
        // Membuat instance dari masing-masing model
        $productModel = new Product();
        $categoryModel = new Category();

        // Mengambil parameter filter dari URL
        $filters = [
            'q' => $_GET['q'] ?? '',
            'category' => $_GET['category'] ?? ''
        ];
        
        // Mengambil data produk yang sudah difilter dari Product Model
        $products = $productModel->getFiltered($filters);
        
        // Mengambil semua data kategori dari Category Model
        $categories = $categoryModel->getAll();

        // Menampilkan halaman katalog dengan data yang sudah siap
        require_once dirname(__DIR__) . '/views/pages/katalog.php';
    }

    /**
     * Menampilkan halaman detail untuk satu produk.
     */
    public function produkDetail() {
        $productModel = new Product();
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if (!$id) {
            http_response_code(404);
            echo 'Produk tidak ditemukan.';
            return;
        }

        // Mengambil data produk tunggal (sudah termasuk nama kategori)
        $product = $productModel->findById($id);

        if (!$product) {
            http_response_code(404);
            echo 'Produk tidak ditemukan.';
            return;
        }

        // Nama kategori sudah didapat dari query di findById(), jadi tidak perlu loop manual
        $categoryName = $product['category_name'] ?? 'Tidak ada kategori';

        require dirname(__DIR__) . '/views/pages/produk_detail.php';
    }
}