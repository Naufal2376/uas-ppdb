<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/student/download-proof', [PdfController::class, 'downloadProof'])
        ->name('student.download-proof');
});

