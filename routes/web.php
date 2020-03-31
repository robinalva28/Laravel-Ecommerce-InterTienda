<?php
use App\User;
use App\Producto;
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
    Route::post('/modificarCategoria/{id}', 'CategoriasController@update');
    Route::get('/eliminarCategoria/{id}','CategoriasController@destroy');

    ###### CRUD MARCAS
    Route::get('/adminMarcas', 'MarcasController@index');
    Route::get('/formAgregarMarca', 'MarcasController@create');
    Route::post('/agregarMarca', 'MarcasController@store');
    Route::get('/formModificarMarca/{id}', 'MarcasController@edit');
    Route::post('/modificarMarca', 'MarcasController@update');
    Route::get('/eliminarMarca/{id}','MarcasController@destroy');

    ############ SOBRE PRODUCTOS
    Route::get('/adminProductos', 'ProductosController@index');

    ############ EMPRESAS
    Route::get('/adminEmpresas', 'EmpresasController@index');
    Route::get('/formAgregarEmpresa', 'EmpresasController@create');
    Route::post('/agregarEmpresa', 'EmpresasController@store');
    Route::get('/formModificarEmpresa/{id}', 'EmpresasController@edit');
    Route::post('/modificarEmpresa/{id}', 'EmpresasController@update');
    Route::get('/asignarEmpresa/{id}','UsuariosController@asignarEmpresa');
    Route::get('/eliminarEmpresa/{id}','EmpresasController@destroy');

    ###### ADMIN SOBRE USUARIOS
    Route::get('/adminListaUsuarios','UsuariosController@listaUsuarios');
    Route::get('/habilitarUsuario/{id}','UsuariosController@habilitarUsuario');
    Route::get('/inhabilitarUsuario/{id}','UsuariosController@inhabilitarUsuario');


});
################################################################################################

    ###### RUTAS DE USUARIOS VALIDADOS
Route::group(['middleware' => 'validado'], function () {

    Route::get('/formAgregarProducto', 'ProductosController@create');
    Route::post('/formAgregarProducto', 'ProductosController@store');
    Route::get('/formModificarProducto/{id}', 'ProductosController@edit');
    Route::post('/modificarProducto/{id}', 'ProductosController@update');
    Route::get('/eliminarProducto/{id}','ProductosController@destroy');
    Route::get('/ventas','VentasController@ventas');
    Route::get('/compras','VentasController@compras');

    ############# COMPRAS
    Route::post('/addCompra','VentasController@addCompra');
    Route::get('/vendedor/{id}','VentasController@detalleVendedor');
    Route::get('/comprador/{id}','VentasController@detalleComprador');


    ##################### CARRITO ######################
    Route::get('/carrito', 'CarritoController@index');
    Route::post('/addACarrito','CarritoController@store');
    Route::post('/eliminarCarrito/{id}','CarritoController@destroy');



});

######################   USUARIO   ##########################
Route::get('/formModificarDatos','UsuariosController@edit');
Route::post('/modificarDatos','UsuariosController@update');

############## CRUD PRODUCTOS ###################
Route::get('/adminUsuarioProductos','ProductosController@productosUsuario');

########## CATEGORIAS VISIBLES
Route::get('/cat/{id}', 'ProductosController@prdEnCategorias');
Route::get('/mar/{id}', 'ProductosController@prdEnMarcas');
Route::get('/detallePublicacion/{id}', 'ProductosController@prdEnDetalle');
Route::get('/todosLosProductos','ProductosController@prdEnCategorias2');
Route::get('/allCategorias', 'ProductosController@allCategorias');
Route::get('/allMarcas', 'ProductosController@allMarcas');


####### PERFIL #######
Route::get('/perfil','UsuariosController@index');

########### INICIO ######################

Route::get('/', function(){

        return view ('/inicio');
});


Route::get('/login', function(){
    return view('/login');
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

Route::get('/home', 'HomeController@index')->name('home');
