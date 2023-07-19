<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/',[HomeController::class,"index"]);
Route::get('/about',[HomeController::class,"about"]);
Route::get('/testimonial',[HomeController::class,"testimonial"]);
Route::get('/contact',[HomeController::class,"contact"]);
Route::get('/blog',[HomeController::class,"blog"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/temp',[AdminController::class,"temp"]);// temp 

Route::get('/redirect',[HomeController::class,"redirect"])->middleware('auth','verified');

Route::get('/view_category',[AdminController::class,"view_category"]);// view category

Route::post('/add_category',[AdminController::class,"add_category"]);// add category

Route::get('/delete_category/{id}',[AdminController::class,"delete_category"]);// delete category

Route::get('/products',[AdminController::class,"products"]);// view products

Route::post('/add_products',[AdminController::class,"add_products"]);//add products

Route::get('/view_products',[AdminController::class,"view_products"]);//view products

Route::get('/delete_products/{id}',[AdminController::class,"delete_products"]);//delete product

Route::get('/update/{id}',[AdminController::class,"update"]);//update route

Route::post('/update_products/{id}',[AdminController::class,"update_products"]);//update product data

Route::get('/order',[AdminController::class,"order"]);//order view 

Route::get('/order_delivered/{id}',[AdminController::class,"order_delivered"]);//order deliverd

Route::get('/print_pdf/{id}',[AdminController::class,"print_pdf"]);//downlaod pdf

Route::get('/send_email/{id}',[AdminController::class,"send_email"]);//downlaod pdf

Route::post('/send_user_email/{id}',[AdminController::class,"send_user_email"]);//send emeil notification


Route::get('/search_data',[AdminController::class,"search_data"]);// seach data in order table









Route::post('/send_contact_email',[HomeController::class,"send_contact_email"]);//send contact notification

Route::get('/product_details/{id}',[HomeController::class,"product_details"]);// product delats page

Route::get('/add_cart/{id}',[HomeController::class,"add_cart"]);// add cart working here

Route::get('/show_cart',[HomeController::class,"show_cart"]);// ashow cart 

Route::get('/delete_cart/{id}',[HomeController::class,"delete_cart"]);// delete cart 

Route::get('/cash_order',[HomeController::class,"cash_order"]);//cash on order

Route::get('/stripe/{totalprice}',[HomeController::class,"stripe"]);//stripe

Route::post('stripe/{totalprice}', [HomeController::class ,'stripePost'])->name('stripe.post');//stripe

Route::get('/show_order',[HomeController::class,"show_order"]);// show order

Route::get('/cancel_order/{id}',[HomeController::class,"cancel_order"]);// cancel order

Route::get('/product_search',[HomeController::class,"product_search"]);// search product on honme

Route::get('/product',[HomeController::class,"product"]);// show all product page

Route::get('/search_product',[HomeController::class,"search_product"]);// show product on seprate page 