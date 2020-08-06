@extends('tienda/system/plantilla_general')

@section('titulo','Registro')

@section('estilos')
<style type="text/css">
    .borde {
        background-color: gray;
        text-align: center;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
@endsection

@section('contenido')
<div id="apiuser">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm"><br>

                    @if( session('error') )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="{{route('registrar_usuario')}}" class="form-horizontal" method="post">
                        @csrf
                        <fieldset>

                            <legend class="text-center header">
                                <h1>Registro de datos</h1>
                            </legend>
                            <p class="col-12 text-center">Bienvenido al registo de datos, recuerda completar todos los
                                campos</p>
                            <p class="col-12 text-center text-danger small">*Todos los campos son obligatorios</p>

                            <div class="form-group">
                                <div class="col-md-7 ">
                                    <span class="col-md-0 offset-md-5">Nombre: </span>
                                    <input id="fname" name="nombre" type="text" placeholder="Ingrese su nombre"
                                        class="form-control offset-md-5" required>
                                </div>
                            </div>
                         

                            <div class="form-group">
                                <div class="col-md-7">

                                    <span class="col-md-0 offset-md-5">Nickname: </i></span>

                                    <input v-model="nickname" @blur="getUser" @focus="div_aparecer= false"
                                        class="form-control offset-md-5" type="text" id="nickname" name="nickname" placeholder="Ingrese su nickname">

                                    <div class="offset-md-5" v-if="div_aparecer" v-bind:class="div_clase_slug">
                                        @{{ div_mensajeslug }}
                                    </div>

                                    <br v-if="div_aparecer">
                                    <input readonly v-model="generarSLug" class="form-control" type="hidden" id="slug"
                                        name="slug">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7">
                                    <span class="col-md-0 offset-md-5">Correo electrónico: </i></span>
                                    <input id="correo" name="email" type="email" placeholder="Ingrese su correo"
                                        class="form-control offset-md-5" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7">
                                    <span class="col-md-0  offset-md-5">Contraseña: </span>
                                    <input id="password" name="password" type="password"
                                        placeholder="Ingrese su contraseña" class="form-control offset-md-5" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7">
                                    <span class="col-md-0  offset-md-5">Confirme la contraseña: </span>
                                    <input id="confirm_password" name="confirm_password" type="password"
                                        placeholder="Ingrese su contraseña" class="form-control offset-md-5" required>
                                    <br>
                                    <span class="col-md-0  offset-md-5" id='message'></span>
                                </div>
                            </div>

                            <input type="hidden" name="admin" value="no">

                            

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" :disabled="deshabilitar_boton==1" id="btn_submit"
                                        class="btn btn-danger btn-lg">Registrarse</button>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <p class="text-center">
                                    Al registrarte aceptas nuestras Condiciones de uso <br>
                                    y Política de provacidad
                                </p>
                            </div>
                            <div class="col-12 ">
                                <p class="col-12 text-center"> Ya tienes una cuenta? <a href="{{route('login')}}"
                                        class="alert-link">Inicia Sesion</a></p>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('addScript')

<script>
    $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Iguales').css('color', 'green');
    $('#btn_submit').attr("disabled", false);
  } else {
    $('#message').html('No iguales').css('color', 'red');
    $('#btn_submit').attr("disabled", true);
}
});


</script>

<script src="{{ asset('js/app_admin.js') }}" defer></script>
@endsection