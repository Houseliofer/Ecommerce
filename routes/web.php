<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Mail\mensaje;
use Illuminate\Support\Facades\Mail;
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
    return view('e-commerce.index');
});

//Route::get('/product',[SiteController::class, 'product']);

Route::get('/product-detail/{category_id?}/{product_id?}', [SiteController::class, 'productDetail'])->name("productDetail");

Route::post('/product-detail/{category_id?}/{product_id?}', [SiteController::class, 'productDetail'])->name("review_post");

Route::get('/product-list/{category_id?}', [SiteController::class, 'product'])->name("products");

Route::get('/productsByCat', [SiteController::class, 'productsByCategory'])->name("productsByCat");

Route::get('/contact', [SiteController::class, 'contact'])->name("contact");
Route::post('/contact', [SiteController::class, 'contact'])->name("contact_post");

Route::get('/admin/products', [SiteController::class, 'productJson'])->name('adminProduct');
/*
Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/', [SiteController::class, 'index']);
Route::get('/services', [SiteController::class, 'services']);
Route::get('/contact',[SiteController::class, 'contact']);
Route::get('/product',[SiteController::class, 'product']);
Route::get('/faq',[SiteController::class, 'faq']);
Route::get('/about',[SiteController::class, 'about']);
*/