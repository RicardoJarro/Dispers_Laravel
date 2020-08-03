@extends('admin.system.admin')

@section('titulo', 'Gestion de admins')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

<div id="confirmareliminar" class="row">
    <span style="display:none;" id="urlbase">{{route('admin.user.index')}}</span>
    @include('custom.modal_eliminar')
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sección de administradores</h3>
  
            <div class="card-tools">
              
              <form>              
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="nombre" class="form-control float-right" 
                  placeholder="Buscar"
                  value="{{ request()->get('nombre') }}">
  
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
  
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 550px;">
                  <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.user.create') }}">Crear</a>
            <table class="table table-head-fixed">

                <table class="table table-light table-hover">
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
                            <td>Encrypted</td>
                            <td>{{$user->estado}}</td>
                            <td>
                                
                                <a class="btn btn-warning" href="{{ url('admin/user/'.$user->id.'/edit') }}">Editar</a>                      
                                <a class="btn btn-danger" href="{{ url('admin/user/cambiar/'.$user->id) }}">No admin</a>                      


                                {{-- <form method="post" action="{{ url('admin/user/'.$user->id) }}" style="display:inline">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Ud desea borrar los datos?');">Desactivar</button>
                                </form>     --}}
                            </td>
            
                        </tr>
                        @endforeach            
                    </tbody>
                </table>

            {{ $users->appends($_GET)->links() }}
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
   @endsection   











{{-- 









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
    
    </div> 
    @endsection   --}}  