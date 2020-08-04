
@auth
<ul class="header-links">
    <div class="btn-group " id="boton-cuenta">
        <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-o"></i> Cuenta</button>
        <div class="dropdown-menu">
            <a href="{{route('perfil')}}" class="dropdown-item"> <i class="fa fa-user-o"></i> Perfil de usuario </a>
            <br> <a href="{{route('ver_compras')}}" class="dropdown-item"> <i class="fa fa-list-ol" aria-hidden="true"></i> Listar compras </a>            
            <br> <a href="{{route('logout')}}" class="dropdown-item"> <i class="fa fa-times" aria-hidden="true"></i> Cerrar Sesion </a>
        </div>
    </div>
</ul>
@endauth

@guest
<ul class="header-links">
    <div class="btn-group mt-1" >
    <li><a href="{{route('login')}}" class="btn btn-dark btn-sm">Ingresar</a></li>
    <li><a href="{{route('user.registro')}}" class="btn btn-dark btn-sm">Registrarse</a></li>
    </div>
</ul>
@endguest
