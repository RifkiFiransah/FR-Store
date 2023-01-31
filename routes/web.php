<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleriController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
Route::resource('/products', ProductController::class);
Route::resource('/product-galleri', ProductGalleriController::class)->except(['show', 'edit', 'update']);
Route::resource('/transactions', TransactionController::class);
Route::get('/transactions/{id}/status', [TransactionController::class, 'status'])->name('transactions.status');
Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
