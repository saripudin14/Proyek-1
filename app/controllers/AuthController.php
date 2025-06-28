<?php
require_once dirname(__DIR__) . '/models/User.php';

class AuthController {
    public function login() {
        session_start();
        // Jika sudah login, redirect ke dashboard admin
        if (isset($_SESSION['user'])) {
            header('Location: /proyek-1/public/?url=admin-dashboard');
            exit;
        }
        // Jika POST, proses login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $userModel = new User();
            $user = $userModel->findByUsername($username);
            if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                header('Location: /proyek-1/public/?url=admin-dashboard');
                exit;
            } else {
                $error = 'Username atau password salah!';
            }
        }
        // Tampilkan form login
        $error = $error ?? null;
        require_once dirname(__DIR__) . '/views/pages/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /proyek-1/public/?url=login');
        exit;
    }
}
