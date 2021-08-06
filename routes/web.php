<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupportController;
use App\Http\Middleware\Support;

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

Route::get('/',[ProductController::class,'index'])->name('index');

Route::prefix('support')->group(function(){
    Route::get('/',[SupportController::class,'index'])->middleware('auth','check.is.support');
    Route::get('/products',[SupportController::class,'products'])->name('support.products')->middleware('auth','check.is.support');
    Route::post('/products',[SupportController::class,'searchProduct'])->name('support.productsSearch')->middleware('auth','check.is.support');
    Route::get('/users',[SupportController::class,'users'])->name('support.users')->middleware('auth','check.is.support');
    Route::post('/users',[SupportController::class,'searchUser'])->name('support.searchUser')->middleware('auth','check.is.support');
    Route::get('/users/{id}',[SupportController::class,'productsUserList'])->name('support.productsUserList')->middleware('auth','check.is.support');
    Route::get('/users/deleteProduct/{id}',[SupportController::class,'alertDelete'])->name('support.alert.delete')->middleware('auth','check.is.support');
    Route::get('/users/deleteUser/{id}',[SupportController::class,'alertDeleteUser'])->name('support.alert.User')->middleware('auth','check.is.support');
    Route::delete('/users/deleteUser/{id}',[SupportController::class,'destroyUser'])->name('support.alertDeleteUser')->middleware('auth','check.is.support');
    Route::delete('/users/deleteProduct/{id}',[SupportController::class,'destroyProduct'])->name('support.destroy.product')->middleware('auth','check.is.support');
});

Route::prefix('produtos')->group(function (){
    Route::get('/create',[ProductController::class,'create'])->name('product.create')->middleware('auth');
    Route::get('/{id}',[ProductController::class,'show'])->name('product.showId');
    Route::post('/',[ProductController::class, 'store'])->name('product.post');
    Route::delete('/{id}',[ProductController::class,'destroy'])->name('product.destroy')->middleware('auth');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit')->middleware('auth');
    Route::put('/update/{id}',[ProductController::class,'update'])->name('product.update')->middleware('auth');
    Route::get('/like/{id}',[ProductController::class,'likeProduct'])->name('product.like')->middleware('auth');
    Route::get('/unlike/{id}',[ProductController::class,'unlikeProduct'])->name('product.like')->middleware('auth');
    Route::get('/info/{id}',[ProductController::class,'infoProduct'])->name('product.info')->middleware('auth');
    Route::get('/mylikes/{id}',[ProductController::class,'infoLike'])->name('product.mylikes')->middleware('auth');
    Route::get('/report/{id}',[ProductController::class,'report'])->name('product.report')->middleware('auth');
    Route::post('/report',[ProductController::class,'sendReport'])->name('product.sendreport')->middleware('auth');
    Route::get('/confirmDelete/{id}',[ProductController::class,'confirmDelete'])->name('product.confirm.delete')->middleware('auth');
    Route::get('/reportProduct/{id}',[ProductController::class,'sendEmailReport'])->name('product.report')->middleware('auth');
});

Route::get('/dashboard',[ProductController::class,'dashboard'])->middleware('auth');
Route::post('/dashboard',[ProductController::class,'search'])->name('dashboard.search')->middleware('auth');
Route::get('/dashboard/profile',[UserProfileController::class,'show'])->middleware('auth');
