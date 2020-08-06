<?php

use App\Category;
use App\GeneralCategory;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::apiResource('user','API\UserController')->names('api.user');

Route::apiResource('product','API\ProductController')->names('api.product');
Route::apiResource('category','API\CategoryController')->names('api.category');
Route::apiResource('general_category','API\GeneralCategoryController')->names('api.generalcategory');
Route::delete('/eliminarimagen/{id}','API\ProductController@eliminarimagen')->name('api.eliminarimagen');
Route::get('service','API\ServicioController@index');
Route::get('service','API\ServicioController@index');


//devuelve todas las categorias
Route::get('categorias', function () {
    return GeneralCategory::get();
});


//devuelve todas las subcategorias de una categoria por ID
Route::get('categorias/{id}', function ($id) {
    return Category::where('general_category_id',$id)->get();
});


//devuelve todas los productos en una subcategoria
Route::get('subcategoria/{id}', function ($id) {
    return Product::where('category_id',$id)->get();
});


//devuelve las imagenes de un producto
Route::get('imagenes_producto/{id}',function($id){
    $producto=Product::find($id);
    return $producto->images;
});



//devuelve un producto en especifico buscado por ID
Route::get('producto/{id}',function($id){
    return Product::find($id);
});


//devuelve imagen buscando por id
Route::get('imagen/{id}',function($id){
    return Image::find($id);
});

//devuelve todos los productos tooodos
Route::get('todos_productos', function () {
    return Product::get();
});


//devuelve todos los subcategorias tooodos
Route::get('todos_subcategorias', function () {
    return Category::get();
    
});
//devuelve todos los categoriastooodos
Route::get('todos_categorias', function () {
    return GeneralCategory::get();
});
//devuelve todos los imagenes tooodos
Route::get('todas_imagenes', function ($id) {
    return Image::get();
});



