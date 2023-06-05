<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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


Route::get('/test',[ProductController::class,'index']);
Route::post('/test',[ProductController::class,'store']);
Route::get('/test/view',[ProductController::class,'view']);
Route::post('products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
Route::get('product/edit/{product}', [ProductController::class, 'edit']);
Route::put('product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('product/get', [ProductController::class, 'getproduct'])->name('get.product');
Route::get('product/{id}',[ProductController::class,'show']);


//Filestorage
Route::get('/upload', function () {
    return view('upload');
});

Route::post('upload', [ProductController::class,'upload']);


// Your login logic here
Route::get('/login', function () {
    return view('Frontend');
    })->name('login');


Route::get('/register', function () {
    return view('Frontend');
})->name('register');