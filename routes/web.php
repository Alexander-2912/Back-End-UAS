<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SoldItemController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk halaman utama, mengarah ke halaman login
Route::get('/', function () {
    return view('auth.login');
});

// Rute untuk halaman utama setelah login, dengan middleware auth dan verified
Route::get('/mainpage', function () {
    return view('mainpage');
})->middleware(['auth', 'verified'])->name('mainpage');

// Grup rute yang memerlukan auth dan verified
Route::middleware(['auth', 'verified'])->group(function () {
    // Resource controller untuk 'mainpage' yang mengarah ke ProductController
    Route::resource("mainpage", ProductController::class);
// Resource controller untuk 'purchase' yang mengarah ke PurchaseController
    Route::resource('/purchase', PurchaseController::class);
    // Resource controller untuk 'sold_item' yang mengarah ke SoldItemController
    Route::resource('/sold_item', SoldItemController::class);
    // Resource controller untuk 'services' yang mengarah ke ServiceController
    Route::resource('/services', ServiceController::class);
    // Resource controller untuk 'notes' yang mengarah ke NoteController
    Route::resource('/notes', NoteController::class);

// Rute untuk ekspor PDF dari masing-masing resource controller
    Route::get("/mainpage/export/pdf", [ProductController::class, "export"])->name('product.export');
    Route::get("/purchase/export/pdf", [PurchaseController::class, "export"])->name('purchase.export');
    Route::get("/sold/export/pdf", [SoldItemController::class, "export"])->name('sold.export');
    Route::get("/service/export/pdf", [ServiceController::class, "export"])->name('service.export');
});

// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
// Rute untuk profile dengan aksi edit, update, dan hapus
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Memuat rute untuk otentikasi yang dihandle oleh file auth.php
require __DIR__ . '/auth.php';
