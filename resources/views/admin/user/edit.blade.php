
<div class="container">
    <b>Editar datos</b> <br><br>
    <div class="form-group">
        <form action="{{url('admin/user/'.$user->id)}}" method="post" >
            <!--Metodo para la seguridad en laravel-->
            {{csrf_field()}}
            <!--metodo para actualizar los datos-->
            {{ method_field('PATCH') }}
            <label for="name" class="control-label">{{'Nick Name'}}</label>
            <input type="text" class="form-control" name="nickname" id="nickname" value="{{$user->nickname}}"> <br><br>

            <label for="name" class="control-label">{{'Nombre'}}</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$user->nombre}}"> <br><br>

            <label for="name" class="control-label">{{'slug'}}</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{$user->slug}}"> <br><br>

            <label for="email">{{'Email'}}</label>
            <input type="email" name="email" id="email" value="{{$user->email}}"> <br><br>

            <label for="password">{{'Password'}}</label>
            <input type="password" name="password" id="password" value="{{$user->password}}"> <br><br>

            <label for="estado">{{'Estado'}}</label>
            <input type="text" name="estado" id="estado" value="{{$user->estado}}"> <br><br>

            <br>
            <label for="rol">{{'Rol'}}</label>
            <input type="text" name="rol" id="rol" value="{{$user->rol}}"> <br><br>
            <br>
            <input type="submit" value="Modificar">
            <a href="{{url('usuarios')}}">Regresar</a>

        </form>

</div>



</div>
