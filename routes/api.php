<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Unauthenticated users
Route::prefix('website')->group(function () {
    Route::get('index', [WebsiteController::class, 'index'])->name('websites.index');
});

// Authenticated users
Route::middleware('auth:sanctum')->group(function () {
    Route::post('store', [WebsiteController::class, 'store'])->name('websites.store');
    Route::delete('website/{website}', [WebsiteController::class, 'delete'])
        ->name('websites.delete')
        ->middleware('admin');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
