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
                'kode_produk' => $_POST['kode_produk'] ?? '',
                'nama_produk' => $_POST['nama_produk'] ?? '',
                'deskripsi' => $_POST['deskripsi'] ?? '',
                'harga_jual' => $_POST['harga_jual'] ?? '',
                'satuan' => $_POST['satuan'] ?? '',
                'stok' => $_POST['stok'] ?? 0,
                'gambar_produk' => $_POST['gambar_produk'] ?? ''
            ];
            if (!$data['category_id'] || !$data['nama_produk'] || !$data['harga_jual'] || !$data['satuan']) {
                $error = 'Kategori, Nama Produk, Harga, dan Satuan wajib diisi!';
            } else {
                $productModel = new Product();
                $productModel->create($data);
                header('Location: /proyek-1/public/?url=produk');
                exit;
            }
        }
        // Ambil kategori untuk dropdown
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
                'kode_produk' => $_POST['kode_produk'] ?? '',
                'nama_produk' => $_POST['nama_produk'] ?? '',
                'deskripsi' => $_POST['deskripsi'] ?? '',
                'harga_jual' => $_POST['harga_jual'] ?? '',
                'satuan' => $_POST['satuan'] ?? '',
                'stok' => $_POST['stok'] ?? 0,
                'gambar_produk' => $_POST['gambar_produk'] ?? ''
            ];
            if (!$data['category_id'] || !$data['nama_produk'] || !$data['harga_jual'] || !$data['satuan']) {
                $error = 'Kategori, Nama Produk, Harga, dan Satuan wajib diisi!';
            } else {
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
            $productModel->delete($id);
        }
        header('Location: /proyek-1/public/?url=produk');
        exit;
    }
}
