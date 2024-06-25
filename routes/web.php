<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SoldItemController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/mainpage', function () {
    return view('mainpage');
})->middleware(['auth', 'verified'])->name('mainpage');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource("mainpage", ProductController::class);
    Route::resource('/purchase', PurchaseController::class);
    Route::resource('/sold_item', SoldItemController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/notes', NoteController::class);
});





Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/sold', function () {
    return view('sold');
})->name('sold');

Route::get('/note', function () {
    return view('note');
})->name('note');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
