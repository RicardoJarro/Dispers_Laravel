@extends('tienda/system/plantilla_general')

@section('titulo','Iniciar Sesion')

@section('estilos')
<link href=" {!! asset('css/tienda/inicio_perfil_asistencia_preguntas.css') !!}" rel="stylesheet">
@endsection

@section('contenido')


<div class="container">
    <div class="row">
        <div class="mx-auto">
            <form class="formulario" action="{{route('login_post')}}" method="post">
                @csrf
                <div class="form-group">
                    <h2>Inicio de sesión</h2>
                    
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <div class="alert-text">
                            @foreach ($errors->all() as $error)
                            <span>{{$error}}</span>
                            @endforeach
                        </div>
                    </div>

                    @endif
                    <div class="contenedor">
                        <div class="input-contenedor">
                            <i class="fas fa-envelope icon"></i>
                            <input type="text" name='email' placeholder="Correo Electronico">
                        </div>

                        <div class="input-contenedor">
                            <i class="fas fa-key icon"></i>
                            <input type="password" name='password' placeholder="Contraseña">
                        </div>

                        <p>
                            {{-- <input type="checkbox" id="check1" >
            <label for="check1">Recordar</label >
            </p> --}}

                            <input type="submit" value="Iniciar" class="button btn btn-danger">
                            {{-- <p><a href="">Olvido su contraseña</a></p> --}}
                            <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
                            <p>¿No tienes una cuenta? <a class="link" href="registrar_usuarios.php">Registrate </a></p>
                    </div>

                    <hr>


                    <h5>Inicia sesión con tu cuenta de : </h5>
                    <a href="{{ url('/auth/redirect/facebook') }}" >
                    <div class="button-facebook">
                        <i class="fab fa-facebook"></i>
                         Facebook
                        {{-- <input disabled=»disabled» type="button-fb" value="Facebook" class="button1"> --}}
                    </div></a>
                    

                    <br>

                    {{-- <div class="button-google btn-danger">
                        <i class="fab fa-google btn-danger"></i>
                        <input disabled=»disabled» type="button-g" value="Google" class="button1 btn-danger">
                    </div> --}}

                </div>
            </form>
        </div>
    </div>



    @endsection