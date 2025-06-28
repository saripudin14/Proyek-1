<?php
require_once dirname(__DIR__) . '/models/Category.php';

class CategoryController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        require_once dirname(__DIR__) . '/views/pages/category_list.php';
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
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? ''
            ];
            if (!$data['name']) {
                $error = 'Nama kategori wajib diisi!';
            } else {
                $categoryModel = new Category();
                $categoryModel->create($data);
                header('Location: /proyek-1/public/?url=kategori');
                exit;
            }
        }
        require_once dirname(__DIR__) . '/views/pages/category_form.php';
    }

    public function edit() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        $categoryModel = new Category();
        $category = $categoryModel->findById($id);
        if (!$category) {
            header('Location: /proyek-1/public/?url=kategori');
            exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? ''
            ];
            if (!$data['name']) {
                $error = 'Nama kategori wajib diisi!';
            } else {
                $categoryModel->update($id, $data);
                header('Location: /proyek-1/public/?url=kategori');
                exit;
            }
        }
        require_once dirname(__DIR__) . '/views/pages/category_form.php';
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /proyek-1/public/?url=login');
            exit;
        }
        $id = $_GET['id'] ?? null;
        if ($id) {
            $categoryModel = new Category();
            $categoryModel->delete($id);
        }
        header('Location: /proyek-1/public/?url=kategori');
        exit;
    }
}
