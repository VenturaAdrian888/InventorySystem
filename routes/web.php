<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::get('/login',[AuthenticationController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[AuthenticationController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user',[AuthenticationController::class,'registerUser'])->name('register-user'); //check if user is logined 
Route::post('/login-user',[AuthenticationController::class,'loginUser'])->name('login-user'); //check if user is logined
Route::get('/logout',[AuthenticationController::class,'logout']);

Route::get('/dashboard',[AuthenticationController::class, 'dashboard']) -> middleware('isLoggedIn')->name('dashboard');

//in products
Route::get('/addProduct', [ProductController::class, 'addProduct']);
Route::post('/add-product', [ProductController::class, 'addPushProduct'])->name('add-product');

//out products
Route::match(['get', 'post'],'/outProduct', [ProductController::class, 'outProduct'])->name('outProduct');
Route::match(['get', 'post'], '/selectOutProduct', [ProductController::class, 'selectOutProduct'])->name('selectOutProduct');
//edit
Route::get('product/edit/{id}',[ProductController::class, 'editProduct'])->name('product.edit');
Route::post('product/pushEdit/{id}', [ProductController::class, 'editPushProduct'])->name('push-edit');

//delete
Route::get('/product/remove/{id}', [ProductController::class , 'removeProduct'])->name('product.remove');

//useWebcam
Route::get('/webcam' , [ProductController::class, 'webcam'])->name('webcam');

//product sort search
Route::match(['get', 'post'], '/search', [ProductController::class, 'searchProduct'])->name('search');

