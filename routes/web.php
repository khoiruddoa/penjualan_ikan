<?php

use App\Models\Buy;
use App\Models\Sell;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PayController;

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
    return view('home', [
        "title" => "home",
        'active' => 'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'active' => 'about',
        "name" => "khoiruddoa",
        "email" => "khoiruddoa1995@gmail.com",
        "image" => "khoiruddoa.jpeg"
    ]);
});




Route::get('/posts', [PostController::class, 'index']); //panggil class controller dan methodnya dari controller post


//single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'post category',
        'active' => 'categories',

        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //untuk user yang belum login
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth'); //route memakai resource karena akan dibuatkan semua oleh laravel untuk crud
Route::resource('/dashboard/customers', CustomerController::class)->middleware('auth');
Route::resource('/dashboard/categories', CategoryController::class)->middleware('auth');
Route::resource('/dashboard/buys', BuyController::class)->middleware('auth');
Route::resource('/dashboard/suppliers', SupplierController::class)->middleware('auth');
Route::resource('/dashboard/sells/orders', OrderController::class)->middleware('auth');
Route::resource('/dashboard/sells', SellController::class)->middleware('auth');
Route::resource('/dashboard/bills', BillController::class)->middleware('auth');
Route::get('/dashboard/sells/orders/print', [OrderController::class, 'print'])->middleware('auth');
Route::get('/dashboard/report', [ReportController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/pays', PayController::class)->middleware('auth');
