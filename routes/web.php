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
//rutas del administrador
Route::group(['middleware' => 'admin'], function () {
  /*  Route::get('/admin/series', 'Admin\SeriesController@index');
    Route::get('/admin/series/{id}', 'Admin\SeriesController@edit');*/
});
Route::get('/index', 'HomeController@index');/**/


Route::get('/', 'HomeController@index');

/*Route::get('index',function(){
    return view('/');
});*/

Route::get('/carrito', function(){
    return view('carrito');
});

Route::get('/login', function(){
    return view('login');
});


######## PREG FRECUENTES #########
Route::get('/faq', function(){
    return view('/faq');
});

######## FORM CONTACT ###########
Route::get('/contact', function(){
    return view('/contact');
});

######### PUBLICACIONES INICIO

Route::get('/inicioAuth', 'CategoriasController@allCategorias');

######### CATEGORIAS DE LOS PRODUCTOS #######
Route::get('/cat_otros', function(){
    return view('cat_otros');
});

Route::get('/cat_tecno', function(){
    return view('cat_tecno');
});
Route::get('tecno_01', function(){
   return view ('tecno_01');
});



Route::get('/cat_vestimenta', function(){
    return view('cat_vestimenta');
});

############## CRUD Categorias
Route::get('/adminCategorias', 'CategoriasController@index');
Route::get('/formAgregarCategoria', 'CategoriasController@create');
Route::post('/agregarCategoria', 'CategoriasController@store');
Route::get('/formModificarCategoria/{id}', 'CategoriasController@edit');
Route::post('/modificarCategoria', 'CategoriasController@update');

############## CRUD Marcas ###################
Route::get('/adminMarcas', 'MarcasController@index');
Route::get('/formAgregarMarca', 'MarcasController@create');
Route::post('/agregarMarca', 'MarcasController@store');
Route::get('/formModificarMarca/{id}', 'MarcasController@edit');
Route::post('/modificarMarca', 'MarcasController@update');

############## CRUD PRODUCTOS ###################
Route::get('/adminUsuarioProductos','ProductosController@productosUsuario');
Route::get('/adminProductos', 'ProductosController@index');
Route::get('/formAgregarProducto', 'ProductosController@create');
Route::post('/formAgregarProducto', 'ProductosController@store');
Route::get('/formModificarProducto/{id}', 'ProductosController@edit');
Route::post('/modificarProducto', 'ProductosController@update');

########## CATEGORIAS VISIBLES
Route::get('/cat/{id}', 'ProductosController@prdEnCategorias');
Route::get('/detallePublicacion/{id}', 'ProductosController@prdEnDetalle');
Route::get('/todosLosProductos','ProductosController@prdEnCategorias2');


####### PERFIL #######
Route::get('/perfil','UsuariosController@index');
/*Route::get('/perfil', function(){
    return view('perfil');
});*/

#################### ADMIN
Route::get('/adminListaUsuarios','UsuariosController@listaUsuarios');


//logout

Route::get('perfil/logout','auth\LoginController@logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
