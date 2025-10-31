<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta de login directa en web.php (sin CSRF)
Route::post('/login', [AuthController::class, 'login']);

// Ruta de health
Route::get('/api/health', function () {
    return response()->json(['message' => 'API funciona']);
});

// Ruta principal
Route::get('/{any?}', function () {
    return view('app');
})->where('any', '.*');