<?php
//si el usuario tiene una imagen
$usuario=App\User::find(1);
$image=$usuario->image;
if($image){
    echo 'tiene una imagen';
}else{
    echo 'no tiene una imagen';
}
return $image;


/* -------PRUEBAS CON IMAGENES------- */
 
    //crear una imagen para un usuario utilizando save

    $imagen=new App\Image(['url'=>'images/tienda/avatar1.png']);
    $usuario=App\User::find(1);
    $usuario->image()->save($imagen);



// Mostrar imagenes

    $image=App\Image::orderBy('id','Desc')->get();
    return $image;

    //obtener las informciones de las imagenes
    $usuario=App\User::find(1);
    return $usuario->image->url;


    //crear varias imagenes para un producto utilizadno el metodo save many
    $producto=App\Product::find(3);
    $producto -> images()->saveMany([
        new App\Image(['url'=>'images/tienda/avatar1.png']),
        new App\Image(['url'=>'images/tienda/avatar2.png']),
    ]);
    return $producto;
        //que imagenes pertenecen a un prodcuto
        return $producto->images;

    // MEJOR crear imagen para el usuario con create
    $usuario=App\User::find(1);
    $usuario->image()->create([
            'url'=>'images/tienda/avatar1',
        ]);
    return $usuario;
     // otra forma
     $imagen=[];
     $imagen['url']='images/tienda/avatar2.png';
 
     $usuario=App\User::find(1);
     $usuario->image()->create([$imagen]);
     return $usuario;