<?php
use App\User;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => 'admin',
                'prefix' => 'admin',
               /* 'namespace' => 'Admin'*/], function () {
    ###### CRUD CATEGORIAS
    Route::get('/adminCategorias', 'CategoriasController@index');
    Route::get('/formAgregarCategoria', 'CategoriasController@create');
    Route::post('/agregarCategoria', 'CategoriasController@store');
    Route::get('/formModificarCategoria/{id}', 'CategoriasController@edit');
    Route::post('/modificarCategoria', 'CategoriasController@update');
    Route::get('/eliminarCategoria/{id}','CategoriasController@destroy');


    ###### CRUD MARCAS
    Route::get('/adminMarcas', 'MarcasController@index');
    Route::get('/formAgregarMarca', 'MarcasController@create');
    Route::post('/agregarMarca', 'MarcasController@store');
    Route::get('/formModificarMarca/{id}', 'MarcasController@edit');
    Route::post('/modificarMarca', 'MarcasController@update');
    Route::get('/eliminarMarca/{id}','MarcasController@destroy');



    Route::get('/adminProductos', 'ProductosController@index');


    ###### ADMIN SOBRE USUARIOS
    Route::get('/adminListaUsuarios','UsuariosController@listaUsuarios');
    Route::get('/habilitarUsuario/{id}','UsuariosController@habilitarUsuario');
    Route::get('/inhabilitarUsuario/{id}','UsuariosController@inhabilitarUsuario');


});

    ###### RUTAS DE USUARIOS VALIDADOS
Route::group(['middleware' => 'validado'], function () {

    Route::get('/formAgregarProducto', 'ProductosController@create');
    Route::post('/formAgregarProducto', 'ProductosController@store');
    Route::get('/formModificarProducto/{id}', 'ProductosController@edit');
    Route::post('/modificarProducto', 'ProductosController@update');
    Route::get('/eliminarProducto/{id}','ProductosController@destroy');

});


############## CRUD PRODUCTOS ###################
Route::get('/adminUsuarioProductos','ProductosController@productosUsuario');
Route::get('/todosLosProductos','ProductosController@prdEnCategorias2');



########## CATEGORIAS VISIBLES
Route::get('/cat/{id}', 'ProductosController@prdEnCategorias');
Route::get('/detallePublicacion/{id}', 'ProductosController@prdEnDetalle');



####### PERFIL #######
Route::get('/perfil','UsuariosController@index');


Route::get('/inicioAuth' ,'ProductosController@allProductos');
Route::get('/', 'HomeController@index');




Route::get('/index', function(){
    return view('inicio');
});


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
//logout

Route::get('perfil/logout','auth\LoginController@logout');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
