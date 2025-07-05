<?php
require_once dirname(__DIR__) . '/models/Product.php';
require_once dirname(__DIR__) . '/models/Category.php'; 

class ProductController {

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ?url=login&error=Akses ditolak');
            exit;
        }
    }

    // Menampilkan daftar semua produk
    public function index() {
        $productModel = new Product();
        $products = $productModel->getFiltered([]);
        // **PERBAIKAN PATH**: Menghapus '/admin'
        require_once dirname(__DIR__) . '/views/pages/product_list.php';
    }

    // Menampilkan dan memproses form Tambah Produk
    public function create() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'] ?? null,
                'name' => trim($_POST['name'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'price' => filter_var($_POST['price'] ?? 0, FILTER_SANITIZE_NUMBER_INT),
                'stock' => filter_var($_POST['stock'] ?? 0, FILTER_SANITIZE_NUMBER_INT),
                'dimensions' => trim($_POST['dimensions'] ?? ''),
                'color' => trim($_POST['color'] ?? ''),
                'unit' => trim($_POST['unit'] ?? 'pcs'),
                'image' => ''
            ];

            if (empty($data['name']) || empty($data['price']) || empty($data['category_id'])) {
                $error = 'Nama Produk, Harga, dan Kategori wajib diisi!';
            }

            if (!$error && isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
                $imagePath = $this->handleImageUpload($_FILES['image_file']);
                if ($imagePath) {
                    $data['image'] = $imagePath;
                } else {
                    $error = 'Gagal upload gambar. Pastikan format (JPEG, PNG, WEBP) dan ukuran (maks 2MB) sesuai.';
                }
            }
            
            if (!$error) {
                $productModel = new Product();
                if ($productModel->create($data)) {
                    header('Location: ?url=produk');
                    exit;
                } else {
                    $error = "Gagal menyimpan produk ke database.";
                }
            }
        }
        
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        
        // **PERBAIKAN PATH**: Menghapus '/admin'
        require_once dirname(__DIR__) . '/views/pages/product_form.php';
    }

    // Menampilkan dan memproses form Edit Produk
    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) { header('Location: ?url=produk'); exit; }

        $productModel = new Product();
        $product = $productModel->findById($id);
        
        if (!$product) { header('Location: ?url=produk'); exit; }

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'category_id' => $_POST['category_id'] ?? null,
                'name' => trim($_POST['name'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'price' => filter_var($_POST['price'] ?? 0, FILTER_SANITIZE_NUMBER_INT),
                'stock' => filter_var($_POST['stock'] ?? 0, FILTER_SANITIZE_NUMBER_INT),
                'dimensions' => trim($_POST['dimensions'] ?? ''),
                'color' => trim($_POST['color'] ?? ''),
                'unit' => trim($_POST['unit'] ?? 'pcs'),
                'image' => $product['image'] // default ke gambar lama
            ];
            
            if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
                $imagePath = $this->handleImageUpload($_FILES['image_file'], $product['image']);
                if ($imagePath) {
                    $data['image'] = $imagePath;
                } else {
                    $error = 'Gagal mengupload gambar baru.';
                }
            }

            if (empty($data['name']) || empty($data['price']) || empty($data['category_id'])) {
                $error = 'Nama Produk, Harga, dan Kategori wajib diisi!';
            }

            if (!$error) {
                if ($productModel->update($id, $data)) {
                    header('Location: ?url=produk');
                    exit;
                } else {
                     $error = 'Gagal memperbarui produk.';
                }
            }
        }
        
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        
        // **PERBAIKAN PATH**: Menghapus '/admin'
        require_once dirname(__DIR__) . '/views/pages/product_form.php';
    }

    // Menghapus produk
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $productModel = new Product();
            $product = $productModel->findById($id);
            if ($product && !empty($product['image'])) {
                $this->handleImageUpload(null, $product['image']); // Gunakan helper untuk hapus gambar
            }
            $productModel->delete($id);
        }
        header('Location: ?url=produk');
        exit;
    }

    /**
     * Fungsi bantuan untuk menangani upload gambar.
     */
    private function handleImageUpload($file, $oldImagePath = null) {
        // Jika tidak ada file baru, hanya hapus file lama (jika ada)
        if ($file === null) {
            if ($oldImagePath) {
                $oldFileFullPath = dirname(__DIR__, 2) . str_replace('/proyek-1', '', $oldImagePath);
                if (file_exists($oldFileFullPath)) {
                    @unlink($oldFileFullPath);
                }
            }
            return true;
        }

        $allowed = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($file['type'], $allowed) || $file['size'] > 2 * 1024 * 1024) {
            return false;
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = 'product_' . time() . '.' . $ext;
        $targetDir = dirname(__DIR__, 2) . '/public/images/products/';
        
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetPath = $targetDir . $newName;
        // Path yang akan disimpan ke database
        $dbPath = '/proyek-1/public/images/products/' . $newName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Hapus gambar lama setelah yang baru berhasil diupload
            if ($oldImagePath) {
                 $oldFileFullPath = dirname(__DIR__, 2) . str_replace('/proyek-1', '', $oldImagePath);
                if (file_exists($oldFileFullPath)) {
                    @unlink($oldFileFullPath);
                }
            }
            return $dbPath;
        }
        return false;
    }
}