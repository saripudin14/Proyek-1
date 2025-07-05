<?php
require_once dirname(__DIR__) . '/models/User.php';

class AuthController {

    public function login() {
        // Selalu mulai sesi di awal
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Jika sudah login, langsung arahkan ke dashboard yang sesuai
        if (isset($_SESSION['user'])) {
            // Jika role adalah admin, arahkan ke admin dashboard
            if ($_SESSION['user']['role'] === 'admin') {
                header('Location: ?url=admin-dashboard');
                exit;
            }
            // Anda bisa tambahkan logika untuk role lain di sini jika ada
        }

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // **PERBAIKAN**: Mengambil data dari 'email' bukan 'username'
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $error = 'Email dan password wajib diisi.';
            } else {
                $userModel = new User();
                $user = $userModel->findByEmail($email);

                // Verifikasi user, password, dan role admin
                if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
                    
                    // **KUNCI**: Buat session untuk user yang berhasil login
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];

                    // Arahkan ke dashboard admin setelah login berhasil
                    header('Location: ?url=admin-dashboard');
                    exit;
                } else {
                    $error = 'Email atau password salah, atau Anda bukan admin.';
                }
            }
        }
        
        // Tampilkan halaman login dengan pesan error jika ada
        require_once dirname(__DIR__) . '/views/pages/login.php';
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Hancurkan semua data sesi
        session_unset();
        session_destroy();
        
        // Arahkan kembali ke halaman login
        header('Location: ?url=login');
        exit;
    }
}