@extends('admin.system.admin')
@section('titulo','Nuevo admin')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Administradores</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')
<div id="apiuser">
  <form action="{{ route('admin.user.store')}}" method="POST" autocomplete="off">
    @csrf
    <!-- Default box -->
    <div class="card">
      @if( session('error') )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                
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
        <div class="form-group">






          <label for="name">Nombre</label>
          <input class="form-control " type="text" name="nombre" id="nombre" value="">

          <label for="name">Nickname</label>
          <input v-model="nickname" @blur="getUser" @focus="div_aparecer= false" class="form-control" type="text"
            id="nickname" name="nickname">

          <div v-if="div_aparecer" v-bind:class="div_clase_slug">
            @{{ div_mensajeslug }}
          </div>
          <br v-if="div_aparecer">
          {{-- <input class="form-control " type="text" name="nickname" id="nickname" value=""> --}}

          {{-- <label>Slug</label> --}}
          <input readonly v-model="generarSLug" class="form-control" type="hidden" id="slug" name="slug">



          <label for="email">Email</label>
          <input class="form-control " type="email" name="email" id="email" value="">

          <label for="password">Password</label>
          <input type="hidden" name="admin" id="admin" value="si">
          <input class="form-control " type="password" name="password" id="password" value="">
        </div>




      </div>
      <!-- /.card-body -->
      <div class="card-footer">

        <a class="btn btn-danger" href="{{ route('cancelar','admin.user.index') }}">Cancelar</a>


        <input 
                          :disabled = "deshabilitar_boton==1"
                        type="submit" value="Guardar" class="btn btn-primary float-right">

      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
  </form>
</div>

@endsection