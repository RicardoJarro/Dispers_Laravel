<?php

use App\Category;
use App\Product;
use App\Image;
use App\User;
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


Route::get('/', function () {
    return view('welcome');

});

Route::get('/prueba', function () {
    
   
    return view('tienda.system.carrito_resumen');

});


// Route::get('/bienvenido', function () {
//     return "Hola como estas";
// });

// Route::get('fotos/{id}',function($id_foto){
//     return 'ests en la galeria de fotos '.$id_foto;
// });

// Route::get('/ejemplo/{nombre?}', function ($nombre=null) {
//     return 'usuario->'.$nombre;

// });

// Route::get('user/{id}', 'Admin\AdminUserController@index')->name('nombredelaruta');

Route::get('/hombre','Controller@hombre_catagolo');

// Route::get('/ejemplo', function () {
//     return view('/tienda/plantilla-categoria');
// });

/* ------RUTAS QUE YA VAN A QUEDARSE-------- */

/* ---Inicio admin--- */
Route::get('/admin', function () {
    return view('admin.system.admin_home');
})->name('admin');

/*------Acerca de Admin----- */
Route::get('/admin/acerca_de', function () {
    return view('admin.system.acerca_de');
});

/* ----Manejo de usuarios------- */

//para obtener todas las rutas del usuario
Route::resource('admin/user','Admin\AdminUserController')->names('admin.user');
Route::get('/admin/usuarios', 'Admin\AdminUserController@index');

Route::resource('usuario','Tienda\UserController')->names('tienda.user');


/* ----Admin Categoria----- */

Route::resource('admin/general_category', 'Admin\AdminGeneralCategoryController')->names('admin.general_category');
Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');

/* ---Admin Producto----- */
Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');

Route::get('cancelar/{ruta}', function ($ruta) {
    return redirect()->route($ruta)->with('cancelar','Accion cancelada');
})->name('cancelar');

/* ----Tienda Categorias----*/

Route::get('categoria/{category_slug}/{subcategory_slug?}', 'Tienda\CategoryController@index')->name('tienda.categoria');

/* -----Tienda Producto Especifico */

Route::get('producto/{producto_slug}', 'Tienda\TiendaController@producto')->name('tienda.prodcuto');

/* -----Carrito Compras----- */
Route::post('/carrito', 'Tienda\CarritoController@agregar')->name('carrito.agregar');
Route::get('/carrito_resumen', 'Tienda\CarritoController@resumen')->name('carrito.resumen');
Route::post('/carrito_remover', 'Tienda\CarritoController@remover')->name('carrito.remover');
Route::post('/carrito_vaciar', 'Tienda\CarritoController@vaciar')->name('carrito.vaciar');
