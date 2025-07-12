<?php
require_once dirname(__DIR__) . '/models/User.php';

class AuthController {

    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] === 'admin') {
                header('Location: ?url=admin-dashboard');
                exit;
            }
        }

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $error = 'Email dan password wajib diisi.';
            } else {
                $userModel = new User();
                $user = $userModel->findByEmail($email);

                if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    header('Location: ?url=admin-dashboard');
                    exit;
                } else {
                    $error = 'Email atau password salah, atau Anda bukan admin.';
                }
            }
        }
        
        require_once dirname(__DIR__) . '/views/pages/login.php';
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        session_unset();
        session_destroy();
        
        header('Location: ?url=login');
        exit;
    }

    public function register()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: ?url=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil semua data dari form, termasuk alamat
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']); // <-- DATA ALAMAT DIAMBIL
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $role = 'admin';

            // Validasi input, termasuk alamat
            if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($address)) {
                $_SESSION['error_message'] = "Semua field wajib diisi.";
            } elseif (!is_numeric($phone)) {
                $_SESSION['error_message'] = "Nomor telepon harus berupa angka.";
            } elseif ($password !== $password_confirm) {
                $_SESSION['error_message'] = "Password dan konfirmasi password tidak cocok.";
            } elseif (strlen($password) < 8) {
                $_SESSION['error_message'] = "Password minimal harus 8 karakter.";
            } else {
                $userModel = new User();
                if ($userModel->findByEmail($email)) {
                    $_SESSION['error_message'] = "Email sudah terdaftar.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    
                    // Menyiapkan data untuk dikirim ke model, termasuk alamat
                    $data = [
                        'name' => $name,
                        'email' => $email,
                        'password' => $hashedPassword,
                        'phone' => $phone,
                        'address' => $address, // <-- DATA ALAMAT DISERTAKAN
                        'role' => $role
                    ];
                    
                    if ($userModel->create($data)) {
                        $_SESSION['success_message'] = "Admin '{$name}' berhasil ditambahkan!";
                    } else {
                        $_SESSION['error_message'] = "Gagal menyimpan ke database.";
                    }
                }
            }
            header('Location: ?url=register');
            exit;
        } 
        
        require_once dirname(__DIR__) . '/views/pages/register_form.php';
    }
}