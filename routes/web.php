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
Route::get('/registe', function(){
    return view('register');
});
######### ADD REGISTER #########
Route::post('/register/add', "UsuariosController@add");
######## PREG FRECUENTES #########
Route::get('/faq', function(){
    return view('faq');
});
######## FORM CONTACT ###########
Route::get('/contact', function(){
    return view('contact');
});
######### CATEGORIAS DE LOS PRODUCTOS #######
Route::get('/cat_otros', function(){
    return view('cat_otros');
});
Route::get('/cat_tecno', function(){
    return view('cat_tecno');
});
Route::get('/cat_vestimenta', function(){
    return view('cat_vestimenta');
});
####### PERFIL #######
Route::get('/perfil', function(){
    return view('perfil');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
