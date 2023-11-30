<?php

use App\Http\Controllers\DashboardProductController;
use App\Models\History;
use App\Http\Livewire\Home;
use App\Http\Livewire\Status;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Keranjang;
use App\Http\Livewire\ProductBrand;
use App\Http\Livewire\ProductIndex;
use App\Http\Livewire\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::livewire('/', 'home')->name('home');
Route::get('/' , App\Http\Livewire\Home::class)->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/transaksi', [HomeController::class, 'transaksi'])->name('admin.transaksi')->middleware('is_admin');
Route::get('/products', App\Http\Livewire\ProductIndex::class)->name('products');
Route::get('/products/brand/{brandId}', App\Http\Livewire\ProductBrand::class)->name('products.brand');
Route::get('/products/{id}', App\Http\Livewire\ProductDetail::class)->name('products.detail');

Route::get('/keranjang', App\Http\Livewire\Keranjang::class)->name('keranjang');

Route::get('/checkout', App\Http\Livewire\Checkout::class)->name('checkout');
// Route::post('/checkout/selesai', App\Http\Livewire\Checkout::class)->name('checkout.selesai');
// Route::post('/checkout', [App\Http\Livewire\Checkout::class, 'store']);


Route::get('/status', App\Http\Livewire\Status::class)->name('status');

Route::get('/history', App\Http\Livewire\History::class)->name('history');

Route::resource('/dashboard/product', DashboardProductController::class)->middleware('is_admin');