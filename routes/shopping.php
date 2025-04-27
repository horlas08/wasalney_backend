<?php

use App\Http\Controllers\Shopping\ShoppingController;


Route::post('/addProduct',[ShoppingController::class,'addProduct'])->name('shopping.addProduct');
Route::get('/getCountBasket',[ShoppingController::class,'getCountBasket'])->name('shopping.getCountBasket');