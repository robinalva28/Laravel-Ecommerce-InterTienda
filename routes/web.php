<?php

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
    return view('inicio');
});

Route::get('/index', function(){
    return view('inicio');
});
Route::get('/carrito', function(){
    return view('carrito');
});
Route::get('/login', function(){
    return view('login');
});
Route::get('/register', function(){
    return view('register');
});
Route::get('/faq', function(){
    return view('faq');
});
Route::get('/contact', function(){
    return view('contact');
});
