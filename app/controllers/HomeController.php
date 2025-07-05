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
}
