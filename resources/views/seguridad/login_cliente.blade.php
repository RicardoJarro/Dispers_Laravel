
@extends('tienda/system/plantilla_general')

@section('titulo','Iniciar Sesion')

@section('estilos')
<link href=" {!! asset('css/tienda/inicio_perfil_asistencia_preguntas.css') !!}" rel="stylesheet">
@endsection

@section('contenido')
    

<div class="container">
    <div class="row">
      <div class="mx-auto">
        <form class="formulario">
            <div class="form-group">
            <h2>Inicio de sesión</h2>
            <div class="contenedor">
         
         
             
             <div class="input-contenedor">
             <i class="fas fa-envelope icon"></i>
             <input type="text" placeholder="Correo Electronico">
             </div>
             
            <div class="input-contenedor">
            <i class="fas fa-key icon"></i>
            <input type="password" placeholder="Contraseña">
            </div>
            
            <p>
            {{-- <input type="checkbox" id="check1" >
            <label for="check1">Recordar</label >
            </p> --}}
    
             <input type="button" value="Iniciar" class="button btn btn-danger">
             {{-- <p><a href="">Olvido su contraseña</a></p> --}}
             <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
             <p>¿No tienes una cuenta? <a class="link" href="registrar_usuarios.php">Registrate </a></p>
         </div>
    
        <hr>
    
    
        <h5>Inicia sesión con tu cuenta de : </h5>
    
            <div class="button-facebook" >
                <i class="fab fa-facebook"></i>
                <input disabled=»disabled» type="button-fb" value="Facebook" class="button1"  >
                </div>
                <br>
    
                <div class="button-google btn-danger">
                    <i class="fab fa-google btn-danger"></i>
                    <input disabled=»disabled» type="button-g" value="Google" class="button1 btn-danger" >
                    </div>
    
                </div>
    </form >
   </div>
</div>



@endsection

