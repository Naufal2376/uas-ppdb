<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Models\Announcement;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Cache cleared successfully!';
});

// Ini rute yang wajib login (kamar terkunci)
Route::middleware('auth')->group(function () {
    Route::get('/student/download-proof', [PdfController::class, 'downloadProof'])
        ->name('student.download-proof');
}); // <-- Pintu kamarnya ditutup sampai sini aja!

Route::get('/faq', function () {
    return view('faq-kontak');
});

Route::view('/tentang-kami', 'tentangkami')->name('tentangkami');

Route::get('/pengumuman', function () {
    $pengumumans = Announcement::where('is_published', true)
        ->orderByDesc('published_at')
        ->get();

    return view('pengumuman', compact('pengumumans'));
});
