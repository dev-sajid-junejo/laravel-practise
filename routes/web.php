<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

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
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);

   });

