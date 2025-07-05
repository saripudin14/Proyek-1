<?php
// Helper functions placeholder

// Konversi nama warna lokal ke kode hex/CSS
function getColorCode($colorName) {
    $map = [
        'merah' => '#ef4444',
        'biru' => '#3b82f6',
        'kuning' => '#fde047',
        'hijau' => '#22c55e',
        'hitam' => '#222',
        'putih' => '#fff',
        'abu' => '#a3a3a3',
        'abu-abu' => '#a3a3a3',
        'coklat' => '#a0522d',
        'orange' => '#fb923c',
        'ungu' => '#a21caf',
        'pink' => '#ec4899',
        'bening' => '#f1f5f9',
        'transparan' => '#f1f5f9',
        'silver' => '#d1d5db',
        'emas' => '#f59e42',
        'gold' => '#f59e42',
        'cream' => '#fef3c7',
        'navy' => '#1e293b',
        'toska' => '#2dd4bf',
        'biru muda' => '#60a5fa',
        'biru tua' => '#1e40af',
        'hijau muda' => '#4ade80',
        'hijau tua' => '#166534',
        'maroon' => '#7f1d1d',
        'magenta' => '#d946ef',
        'olive' => '#a3b18a',
        'lime' => '#bef264',
        'cyan' => '#22d3ee',
        'teal' => '#14b8a6',
        'lavender' => '#e0e7ff',
        'peach' => '#fdba74',
        'mocca' => '#bfa181',
    ];
    $key = strtolower(trim($colorName));
    return $map[$key] ?? $colorName;
}
