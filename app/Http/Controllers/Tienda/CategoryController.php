<?php

namespace App\Http\Controllers\Tienda;

use App\Category;
use App\GeneralCategory;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_slug, $subcategory_slug=null)
    {

        

        if($subcategory_slug==null){//si recibe un solo parametro
                // //obtengo todas las categorias con las subcategorias para mandarlas a la vista (llenar menu)
                 $categorias=GeneralCategory::with('categories')->get();
                // //obtengo todos los productos de esa subcategoria junto con sus imagenes para mandarlas a la vista
                 $categoria=GeneralCategory::where('slug',$category_slug)->firstOrFail();
                // //retorno todos los productos pertenecientes a la categoria principal
                $categorias_productos=GeneralCategory::with('categories.products.images')->where('slug',$category_slug)->firstOrFail()->categories;                
                
                //return Category::with('products.images')->where('general_category_id',$categoria->id)->products;                
                //return  $categorias_productos;
                return view('tienda.categorias.plantilla_categoria_aux',compact('categorias_productos','categorias','categoria'));    
            
        }else{//si recibe ambos parametros

            //obtengo todas las categorias con las subcategorias para mandarlas a la vista (llenar menu)
            $categorias=GeneralCategory::with('categories')->get();
            //obtengo la subcategoria que recibo buscando por el slug(poner titulo)
            $subcategoria=Category::where('slug',$subcategory_slug)->firstOrFail();
            //obtengo todos los productos de esa subcategoria junto con sus imagenes para mandarlas a la vista
            $productos=Product::with('images')->where('category_id',$subcategoria->id)->orderBy('nombre')->paginate(9);

             return view('tienda.categorias.plantilla_categoria',compact('productos','categorias','subcategoria'));
        }
        
        
       

        
    }
}
