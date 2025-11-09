<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\CategoriesController;

$local=config('app.local');
Route::get($local.'/dashboard', [HomeController::class,'dashboard']
)->middleware(['auth', 'verified','marknotification','lastactiveuser','language'])->name('dashboard');
 Route::middleware('auth')->prefix($local)->group(function (){
     Route::resource('categories', CategoriesController::class);
     Route::prefix('category')->name('category.')->group(function (){
         Route::get('trash',[CategoriesController::class,'trash'])->name('trash');
         Route::put('{category}/restore',[CategoriesController::class,'restore'])->name('restore');
         Route::delete('{category}/forceDelete',[CategoriesController::class,'forcedelete'])->name('forcedelete');

     });
     Route::prefix('product')->name('product.')->group(function (){
         Route::get('show',[ProductController::class,'index'])->name('show');
         Route::get('edit/{id}',[ProductController::class,'edit'])->name('edit');
         Route::post('update/{product}',[ProductController::class,'update'])->name('update');

     });
     Route::prefix('store')->name('store.')->group(function (){
         Route::get('create',[\App\Http\Controllers\Web\StoreController::class,'create'])->name('create');

         Route::post('store',[\App\Http\Controllers\Web\StoreController::class,'store'])->name('insert');

     });

 });
