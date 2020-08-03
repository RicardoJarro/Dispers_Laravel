

@extends('admin.system.admin')
@section('titulo','Editar admin')
@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Administradores</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')
<div id="apicategory">
    <form action="{{url('admin/user/'.$user->id)}}" method="post" >
    @csrf
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Editar administrador</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">              
                
<div class="container">
    
    <div class="form-group">
        
            <!--Metodo para la seguridad en laravel-->
            {{csrf_field()}}
            <!--metodo para actualizar los datos-->
            {{ method_field('PATCH') }}
            <label for="name" class="control-label">Nickname</label>
            <input type="text" class="form-control" name="nickname" id="nickname" value="{{$user->nickname}}"> 

            <label for="name" class="control-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$user->nombre}}"> 

            <label for="name" class="control-label">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{$user->slug}}"> 

            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}"> 

            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password" id="password" value=""> <br>

            <div class="row">
                <div class="col-6">
                    <label for="estado">Estado</label><br>
                    <select class="form-control" name="estado" id="estado">
                        <option value="Activo" selected>Activo</option>
                        <option value="Desabilitado">Deshabilitado</option>
                    </select>
                </div>
                <div class="col-6">
                   
                    <label for="rol">Administrador</label><br>
                    <select class="form-control" name="admin" id="admin">
                         <option value="si" selected>Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            
            {{-- <input type="text" name="estado" id="estado" value="{{$user->estado}}"> <br><br> --}}

            
            
            {{-- <input type="text" name="rol" id="rol" value="{{$user->rol}}"> <br><br> --}}
            
            
            

        

</div>
</div>
                        

                    
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
      
                <a class="btn btn-danger" href="{{ route('cancelar','admin.user.index') }}">Cancelar</a>
      
      
            <input type="submit" value="Modificar" class="btn btn-primary float-right">
                      
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </form>
      </div>
      
@endsection





