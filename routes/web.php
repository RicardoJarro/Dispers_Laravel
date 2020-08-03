<?php

use App\Category;
use App\Product;
use App\Image;
use App\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::get('prueba','Seguridad\ClienteLoginController@verusuario')->middleware('IsClient');

Route::get('prueba2', function () {
    return "eres admin";
})->name('prueba2');





/* ------RUTAS QUE YA VAN A QUEDARSE-------- */

/* ---Inicio admin--- */

Route::post('seguridad/login','Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/login','Seguridad\LoginController@index')->name('login');

Route::get('seguridad/logout','Seguridad\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin','middleware'=>'auth' ], function () {

    Route::get('/', 'Admin\AdminController@index')->name('admin');

    /*------Acerca de Admin----- */
    Route::get('acerca_de', function () {
        return view('admin.system.acerca_de');
    });

    Route::resource('user', 'Admin\AdminUserController')->names('admin.user');
    Route::get('usuarios', 'Admin\AdminUserController@index');
    /* ----Admin Categoria----- */

    Route::resource('general_category', 'Admin\AdminGeneralCategoryController')->names('admin.general_category');
    Route::resource('category', 'Admin\AdminCategoryController')->names('admin.category');

    /* ---Admin Producto----- */
    Route::resource('product', 'Admin\AdminProductController')->names('admin.product');
});


/* ----Manejo de usuarios------- */

//para obtener todas las rutas del usuario
Route::resource('admin/user', 'Admin\AdminUserController')->names('admin.user');
Route::resource('usuario', 'Tienda\UserController')->names('tienda.user');


Route::get('cancelar/{ruta}', function ($ruta) {
    return redirect()->route($ruta)->with('cancelar', 'Accion cancelada');
})->name('cancelar');


Route::get('/','Tienda\TiendaController@index')->name('inicio');

/* ----Tienda Categorias----*/

Route::get('categoria/{category_slug}/{subcategory_slug?}', 'Tienda\CategoryController@index')->name('tienda.categoria');

/* -----Tienda Producto Especifico */

Route::get('producto/{producto_slug}', 'Tienda\TiendaController@producto')->name('tienda.prodcuto');

/* -----Carrito Compras----- */
Route::post('/carrito', 'Tienda\CarritoController@agregar')->name('carrito.agregar');
Route::get('/carrito_resumen', 'Tienda\CarritoController@resumen')->name('carrito.resumen');
Route::post('/carrito_remover', 'Tienda\CarritoController@remover')->name('carrito.remover');
Route::post('/carrito_vaciar', 'Tienda\CarritoController@vaciar')->name('carrito.vaciar');


/* -----clientes------ */
Route::get('/login', 'Seguridad\ClienteLoginController@index')->name('login.cliente');
