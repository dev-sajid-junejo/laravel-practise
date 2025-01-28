<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Routing\RouteGroup;

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



Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/home', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);


//CheckoutController



Route::middleware(['auth'])->group(function(){
   Route::get('cart', [CartController::class, 'viewcart']);
   Route::get('checkout', [CheckoutController::class, 'index']);
   Route::post('place-order', [CheckoutController::class, 'placeorder']);
   Route::get('my-orders', [UserController::class, 'index']);
   Route::get('view-order/{id}', [UserController::class, 'view']);
   Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);


});
// Authentication routes
Auth::routes(); // Automatically sets up login, register, etc.

Route::get('/profile', [HomeController::class, 'profile'])->name('profile')->middleware('auth');

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/dashboard', function () {
       return view('admin.index');
    });
    Route::get('/dashboard', 'Admin\FrontendController@index');
    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('/add-category', 'Admin\CategoryController@add');
    Route::post('/insert-category', 'Admin\CategoryController@insert');
    Route::get('/edit-prod/{id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);

    //Products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-products', [ProductController::class, 'add']);
    Route::post('/insert-products', [ProductController::class, 'insert']);
    Route::get('/send-notification', [ProductController::class, 'sendNotification']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('users', [FrontendController::class, 'users']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);


    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-users/{id}', [DashboardController::class, 'viewusers']);
   });

