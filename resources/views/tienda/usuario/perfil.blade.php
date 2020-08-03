@extends('tienda/system/plantilla_general')

@section('titulo','Perfil del usuario')

@section('estilos')
<link rel="stylesheet" href="{!! asset('css/tienda/inicio_perfil_asistencia_preguntas.css')!!}">
@endsection


@section('contenido')

<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Modificar Datos </div>
    <div class="list-group list-group-flush">
      <a data-modal-target="modalNombre" class="list-group-item list-group-item-action bg-light">Nombre</a>
      <a data-modal-target="modalNick" class="list-group-item list-group-item-action bg-light">Nick</a>
      <a data-modal-target="modalCorreo" class="list-group-item list-group-item-action bg-light">Correo</a>
      <a data-modal-target="modalContraseña" class="list-group-item list-group-item-action bg-light">Contraseña</a>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-danger d-block" id="menu-toggle">Configuracion</button>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
            <div>
              <a class="fas fa-trash-alt icon href=" #" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a data-modal-target="modalEliminar" class="dropdown-item" href="#">Eliminar Cuenta</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class='centraTabla'>


      <!-- Contenido Pincipal datos Usuario -->
      <div class="container-fluid">
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
        <h1 class="mt-4">Perfil de {{$user->nombre}}</h1>
        <hr>
        <img src="{{URL::asset('/images/user.png')}}" width="120" height="100" HSPACE="180" VSPACE="10">
        <hr>
        <h6>Nick: {{$user->nickname}}</h6>
        <h6>Email: {{$user->email}}</h6>
      </div>
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->








<!-- Contenidos Modales -->

<!-- ******************Eliminar************************ -->
<div class="modal" id="modalEliminar">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h1>Eliminar tu Perfil</h1>
    <p>Lamentamos que quieras eliminar tu cuenta, nos encanto que formaras parte de nuestra pagina y las contribuciones
      que hiciste con nosotros.</p>
    <p>Para eliminar tu cuenta introduce tu contraseña :</p>
    <div class="input-contenedor">
      <i class="fas fa-key icon"></i>
      <form action="" method="POST">
        <input type="password" placeholder="Contraseña">
    </div>
    <input type="button" value="Confirmar" class="button">
    </form>
  </div>
</div>

<!-- ******************CAMBIAR NOMBRE************************ -->
<div class="modal" id="modalNombre">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h1>Nombre</h1>
    <p>Los cambios se veran reflejados en su perfil de usuario</p>
    <b>
      <p>Ingrese el nuevo nombre :</p>
    </b>

  <form action="{{route('user.actualizar')}}" method="post">
    @csrf
      <div class="input-contenedor">
        <i class="fas fa-user icon"></i>
        <input type="text" name="nuevo" placeholder="{{$user->nombre}}">
        <input type="hidden" name="id"  value="{{$user->id}}">
        <input type="hidden" name="atributo" value="nombre">
      </div>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </form>

  </div>
</div>

<!-- ******************CAMBIAR NICK************************ -->
<div class="modal" id="modalNick">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h1>Nick</h1>
    <p>Los cambios se veran reflejados en su perfil de usuario</p>
    <b>
      <p>Ingrese su nuevo nick :</p>
    </b>
    <form action="{{route('user.actualizar')}}" method="post">
      @csrf
      <div class="input-contenedor">
        <i class="fas fa-smile icon"></i>
        <input type="text" name="nuevo" placeholder="{{$user->nickname}}">
        <input type="hidden" name="id" value="{{$user->id}}">
        <input type="hidden" name="atributo" value="nickname">
      </div>
      <input type="submit" value="Actualizar" class="btn btn-primary">
    </form>
    
  </div>
</div>

<!-- ******************CAMBIAR CORREO************************ -->
<div class="modal" id="modalCorreo">
  <div class="modal-content">
    <form action="{{route('user.actualizar')}}" method="post">
      @csrf
    <span class="modal-close">&times;</span>
    <h1>Correo Electronico</h1>
    <p>Los cambios se veran reflejados en su perfil de usuario</p>
    <b>
      <p>Ingrese su nuevo correo :</p>
    </b>
    <div class="input-contenedor">
      <i class="fas fa-envelope icon"></i>
    <input type="email" name="nuevo" placeholder="{{$user->email}}">

    </div>
    <p>Al cambiar tu correo electronico te llegara un mensaje de autentificacion al nuevo correo, ademas todas las
      facturas generadas despues del cambio se reenviaran a este</p>
      <input type="hidden" name="id" value="{{$user->id}}">
      <input type="hidden" name="atributo" value="email">
      <input type="submit" value="Actualizar" class="btn btn-primary">
  </form>
  </div>
</div>
<!-- ******************CAMBIAR CONTRASEÑA************************ -->
<div class="modal" id="modalContraseña">
  <div class="modal-content">
    <form action="{{route('user.actualizar')}}" method="post">
      @csrf
    <span class="modal-close">&times;</span>
    <h1>Contraseña</h1>
    <p>Los cambios se veran reflejados en su perfil de usuario</p>
    <p>Se finalizara session en todos los dispositivos excepto en el que se esta realizando la modificacion :</p>
    <b>
      <p>Ingrese su nueva contraseña :</p>
    </b>
    <div class="input-contenedor">
      <i class="fas fa-key icon"></i>
      <input type="password" placeholder="Contraseña nueva" name='password1'>
    </div>
    <p>Utiliza 8 caracteres como minimo, no utilizes una contraseña de otro sitio o un termino que sea demasiado facil :
    </p>
    <b>
      <p>Confirme su contraseña</p>
    </b>
    <div class="input-contenedor">
      <i class="fas fa-lock icon"></i>
      <input type="password" placeholder="Confirmacion Contraseña" name="password2">
      <input type="hidden" name="id" value="{{$user->id}}">
      <input type="hidden" name="atributo" value="password">
      
    </div>

    <input type="submit" value="Actualizar" class="btn btn-primary">
  </form>
  </div>
</div>


@endsection
@section('addScript')
{{-- <script src="{{ asset('js/jquery.min.js')}}"></script> --}}
<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('js/modal.js')}}"></script>

<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>
@endsection