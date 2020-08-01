@extends('admin.system.admin')

@section('titulo', 'Administración de usuarios')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

    <div class="container">
    @if (Session::has('Mensaje')){{
        Session::get('Mensaje')
    }}
    @endif
    <br><br>
    <b>Pagina principal</b>
    <br><br>
    <a href="{{url('/admin/user/create')}}" class="btn btn-primary ">Agregar Empleado</a>
    <br><br>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>NickName</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Estado</th>                
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->nickname}}</td>
                <td>{{$user->nombre}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->estado}}</td>
                <td>
                    
                    <a class="btn btn-warning" href="{{ url('admin/user/'.$user->id.'/edit') }}">Editar</a>                      

                    <form method="post" action="{{ url('admin/user/'.$user->id) }}" style="display:inline">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Ud desea borrar los datos?');">Borrar</button>
                    </form>    
                </td>

            </tr>
            @endforeach            
        </tbody>
    </table>
    </div>
    @endsection     