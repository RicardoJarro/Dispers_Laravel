@extends('admin.system.admin')
@section('titulo','Nuevo admin')
@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Administradores</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')
<div id="apicategory">
  <form action="{{ route('admin.user.store') }}" method="POST" autocomplete="off">
    @csrf
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Registro de administrador</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">              
                <div class="form-group" >
                    
                    <label for="name">Nombre</label>
                    <input class="form-control " type="text" name="nombre" id="nombre" value="" >                        
                    <label for="name">Slug</label>
                        <input class="form-control " type="text" name="slug" id="slug" value="">

                        <label for="name">Nickname</label>
                        <input class="form-control " type="text" name="nickname" id="nickname" value="">

                        <label for="email">Email</label>
                        <input class="form-control " type="email" name="email" id="email" value="">

                        <label for="password">Password</label>
                        <input type="hidden" name="admin" id="admin" value="si">                    
                        <input class="form-control " type="password" name="password" id="password"  value="">
                </div>
                        

                    
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
      
                <a class="btn btn-danger" href="{{ route('cancelar','admin.user.index') }}">Cancelar</a>
      
      
            <input type="submit" value="Guardar" class="btn btn-primary float-right">
                
                      
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </form>
      </div>
      
@endsection
