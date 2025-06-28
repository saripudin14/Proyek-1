<?php
require_once dirname(__DIR__) . '/models/Product.php';

class ProductController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once dirname(__DIR__) . '/views/pages/product_list.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'] ?? '',
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? '',
                'stock' => $_POST['stock'] ?? 0,
                'dimensions' => $_POST['dimensions'] ?? '',
                'color' => $_POST['color'] ?? '',
                'unit' => $_POST['unit'] ?? 'pcs',
                'image' => ''
            ];
            // Handle image upload
            if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['image_file'];
                $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
                if (!in_array($file['type'], $allowed)) {
                    $error = 'Tipe file gambar tidak didukung!';
                } elseif ($file['size'] > 2*1024*1024) {
                    $error = 'Ukuran file gambar maksimal 2MB!';
                } else {
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $newName = 'product_' . time() . '_' . rand(1000,9999) . '.' . $ext;
                    $targetDir = '/public/images/';
                    $targetPath = dirname(__DIR__,2) . $targetDir . $newName;
                    $dbPath = '/proyek-1/public/images/' . $newName;
                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        $data['image'] = $dbPath;
                    } else {
                        $error = 'Gagal upload gambar!';
                    }
                }
            }
            if (!$data['category_id'] || !$data['name'] || !$data['price'] || !$data['unit']) {
                $error = 'Kategori, Nama Produk, Harga, dan Satuan wajib diisi!';
            }
            if (!$error) {
                $productModel = new Product();
                $productModel->create($data);
                header('Location: /proyek-1/public/?url=produk');
                exit;
            }
        }
        $productModel = new Product();
        $categories = $productModel->getCategories();
        require_once dirname(__DIR__) . '/views/pages/product_form.php';
    }

    public function edit() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        $productModel = new Product();
        $product = $productModel->findById($id);
        if (!$product) {
            header('Location: /proyek-1/public/?url=produk');
            exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'] ?? '',
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? '',
                'stock' => $_POST['stock'] ?? 0,
                'dimensions' => $_POST['dimensions'] ?? '',
                'color' => $_POST['color'] ?? '',
                'unit' => $_POST['unit'] ?? 'pcs',
                'image' => $product['image']
            ];
            // Handle image upload
            if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['image_file'];
                $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
                if (!in_array($file['type'], $allowed)) {
                    $error = 'Tipe file gambar tidak didukung!';
                } elseif ($file['size'] > 2*1024*1024) {
                    $error = 'Ukuran file gambar maksimal 2MB!';
                } else {
                    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $newName = 'product_' . time() . '_' . rand(1000,9999) . '.' . $ext;
                    $targetDir = '/public/images/';
                    $targetPath = dirname(__DIR__,2) . $targetDir . $newName;
                    $dbPath = '/proyek-1/public/images/' . $newName;
                    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                        // Delete old image if exists
                        if (!empty($product['image'])) {
                            $oldFile = dirname(__DIR__,2) . str_replace('/proyek-1','',$product['image']);
                            if (file_exists($oldFile)) @unlink($oldFile);
                        }
                        $data['image'] = $dbPath;
                    } else {
                        $error = 'Gagal upload gambar!';
                    }
                }
            }
            if (!$data['category_id'] || !$data['name'] || !$data['price'] || !$data['unit']) {
                $error = 'Kategori, Nama Produk, Harga, dan Satuan wajib diisi!';
            }
            if (!$error) {
                $productModel->update($id, $data);
                header('Location: /proyek-1/public/?url=produk');
                exit;
            }
        }
        $categories = $productModel->getCategories();
        require_once dirname(__DIR__) . '/views/pages/product_form.php';
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            $product = $productModel->findById($id);
            if ($product && !empty($product['image'])) {
                $oldFile = dirname(__DIR__, 2) . $product['image'];
                if (file_exists($oldFile)) @unlink($oldFile);
            }
            $productModel->delete($id);
        }
        header('Location: /proyek-1/public/?url=produk');
        exit;
    }
}
