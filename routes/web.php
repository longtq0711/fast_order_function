<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
}); //Form input link
Route::get('/show', function () {
    return view('post');
}); //List san pham
Route::get('/test', function () {
    return view('welcome');
});
Route::resource('products', ProductsController::class);
//Route::resource('users', UsersController::class);


