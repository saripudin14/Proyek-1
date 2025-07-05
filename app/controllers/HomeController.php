<?php
class HomeController {
    public function index() {
        // Render view home.php
        require_once dirname(__DIR__) . '/views/pages/home.php';
    }

    public function katalog() {
        require_once dirname(__DIR__) . '/models/Product.php';
        $productModel = new Product();
        $q = isset($_GET['q']) ? trim($_GET['q']) : null;
        $category = isset($_GET['category']) ? trim($_GET['category']) : null;
        $products = $productModel->getFiltered($q, $category);
        $categories = $productModel->getCategories();
        require_once dirname(__DIR__) . '/views/pages/katalog.php';
    }

    public function produkDetail() {
        require_once dirname(__DIR__) . '/models/Product.php';
        $productModel = new Product();
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (!$id) {
            http_response_code(404);
            echo 'Produk tidak ditemukan.';
            return;
        }
        $product = $productModel->findById($id);
        if (!$product) {
            http_response_code(404);
            echo 'Produk tidak ditemukan.';
            return;
        }
        // Ambil nama kategori
        $categories = $productModel->getCategories();
        $categoryName = '';
        foreach ($categories as $cat) {
            if ($cat['id'] == $product['category_id']) {
                $categoryName = $cat['name'];
                break;
            }
        }
        require dirname(__DIR__) . '/views/pages/produk_detail.php';
    }
}
