<?php
// Logika untuk logout
session_start();
session_destroy();
header('Location: /Proyek 1/public/login.php');
exit;
?>
