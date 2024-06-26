<?php

use App\Http\Controllers\HomeControlller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
})->name('home');
Route::get('/supplements', [ProductController::class, 'supplementIndex'])->name('products.supplementIndex');
Route::get('/accessoires', [ProductController::class, 'accessoiresIndex'])->name('products.accessoiresIndex');

Route::get('/supplements/{id}', [ProductController::class, 'showSupplement'])->name('products.showSupplement');
Route::get('/accessoires/{id}', [ProductController::class, 'showAccessory'])->name('products.showAccessory');

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
