<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//auth routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login']);

// unauthenticated users
Route::prefix('website')->group(function() {
    Route::get('index', [WebsiteController::class, 'index'])->name('websites.index');
    Route::post('store', [WebsiteController::class, 'store'])->name('websites.store');
    Route::delete('{website}', [WebsiteController::class, 'delete'])->name('websites.delete');
});

// authenticated users
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
