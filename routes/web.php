<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
use App\Http\Controllers\barangController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\registerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);




Route::get('/', [registerController::class,'registerPage']);
Route::post('/register', [registerController::class, 'register']);


Route::get('/kategori', [KategoriController::class, 'showAllKategori']);
Route::get('/barangList/{id}', [KategoriController::class, 'showBarangList']);

Route::get('/barangList', [barangController::class, 'showAllBarang']);
Route::get('/home_user', [barangController::class, 'showAllBarang']);

Route::post('/insert', [barangController::class, 'insert']);
Route::get('/insert', [barangController::class, 'showInsertBarangPage']);

Route::get('/search', [barangController::class, 'search']);

Route::delete('/delete/{id}', [barangController::class, 'delete'])->middleware('admin.security');

Route::get('/update/{id}', [barangController::class, 'showUpdateBarangPage'])->middleware('admin.security');
Route::put('/update/{id}', [barangController::class,'update']);


Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
