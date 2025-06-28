<?php
// Kumpulan fungsi helper (misal: format rupiah, validasi)
function format_rupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}
// Tambahkan helper lain sesuai kebutuhan
?>
