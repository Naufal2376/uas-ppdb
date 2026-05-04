<?php

// Paksa PHP mencetak semua error sekecil apa pun
ini_set('display_errors', '1');
error_reporting(E_ALL);

try {
    // 1. Panggil Composer Autoloader
    require __DIR__ . '/../vendor/autoload.php';

    // 2. Load aplikasi Laravel 12
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // 3. Tentukan folder /tmp sebagai storage utama di Vercel
    $storagePath = $_ENV['APP_STORAGE'] ?? '/tmp/storage';
    $app->useStoragePath($storagePath);

    // 4. BIKIN SUB-FOLDER OTOMATIS
    $directories = [
        $storagePath . '/app/public',
        $storagePath . '/framework/cache/data',
        $storagePath . '/framework/views',
        $storagePath . '/framework/sessions',
        $storagePath . '/logs',
    ];

    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true); // Gunakan 0777 agar Vercel pasti bisa nulis
        }
    }

    // 5. Tangkap dan jalankan request
    $app->handleRequest(Illuminate\Http\Request::capture());

} catch (\Throwable $e) {
    // 6. TANGKAP SEMUA ERROR FATAL DAN CETAK KE LAYAR!
    echo "<div style='font-family: monospace; background: #ffebee; padding: 20px; border: 1px solid #c62828; color: #b71c1c;'>";
    echo "<h2>🚨 BINGO! Ini Error Aslinya:</h2>";
    echo "<b>Pesan:</b> " . $e->getMessage() . "<br><br>";
    echo "<b>File:</b> " . $e->getFile() . "<br>";
    echo "<b>Baris:</b> " . $e->getLine() . "<br><br>";
    echo "<b>Jejak (Stack Trace):</b><br>";
    echo nl2br($e->getTraceAsString());
    echo "</div>";
}