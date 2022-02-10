<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderListController;




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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/plans', function(){
    return view('plan.index');
})->name('plans')->middleware('auth');

Route::resource('/plan',PlanController::class)->middleware('auth');

Route::get('/products',function(){
    return view('product.index');
})->name('products')->middleware('auth');

Route::resource('/product',ProductController::class)->middleware('auth');

Route::get('/customs',function(){
    return view('custom.index');
})->name('customs')->middleware('auth');

Route::resource('/custom',CustomController::class)->middleware('auth');

Route::get('/familys',function(){
    return view('family.index');
})->name('familys')->middleware('auth');

Route::resource('/family',FamilyController::class)->middleware('auth');

Route::get('/orders',function(){
    return view('order.index');
})->name('orders')->middleware('auth');

Route::resource('/order',OrderController::class)->middleware('auth');

Route::get('/orderlists',function(){
    return view('orderlist.index');
})->name('orderlists')->middleware('auth');

Route::resource('/orderlist',OrderListController::class)->middleware('auth');

