@extends('tienda/system/plantilla_general')

@section('titulo','Asistencia')

@section('estilos')

<link rel="stylesheet" href="{!! asset('css/tienda/inicio_perfil_asistencia_preguntas.css')!!}">

<style type="text/css">
    .borde {
        background-color: gray;
        text-align: center;
    }
</style>

@endsection

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">
                            <h1>Formulario</h1>
                        </legend>
                        <p class="col-12 text-center">Bienvenido al registo de datos, recuerda completar todos los
                            campos</p>
                        <p class="col-12 text-center text-danger small">*Todos los campos son obligatorios</p>



                        <div>
                            <select class="select-css" name="comboAsunto">
                                <option value="1" selected>Asunto</option>
                                <option value="2">Ayuda</option>
                                <option value="3">Pregunta</option>
                                <option value="3">Reclamo</option>
                                {{-- <option value="3">Asunto4 </option> --}}
                            </select>

                        </div>
                        <div class="form-group">
                            <div class="col-md-7">
                                <span class="col-md-0 offset-md-5">Nombre: </span>
                                <input id="nbame" name="name" type="texto" placeholder="Ingrese su nombre"
                                    class="form-control offset-md-5" required>
                            </div>
                        </div>


                        {{-- <div class="form-group">
                            <div class="col-md-7">
                                <span class="col-md-0 offset-md-5">Numero de Pedido: </span>
                                <input id="npedido" name="numero_pedido" type="texto"
                                    placeholder="Ingrese el numero de pedido" class="form-control offset-md-5" required>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-7">
                                <span class="col-md-0 offset-md-5">Correo electrónico: </i></span>
                                <input id="correo" name="correo" type="email" placeholder="Ingrese su correo"
                                    class="form-control offset-md-5" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7">

                                <input type="file" id="narchivo" name="archivo" type="email"
                                    placeholder="Archivo adjunto" class="form-control offset-md-5" required>
                            </div>
                        </div>

            </div>


            <p></p>


            <p> <textarea name="textarea" rows="10" cols="50">Mensaje

</textarea></p>



        </div>


        <p></p>

    </div>
    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-danger btn-lg">Enviar</button>
        </div>
    </div>
    <div class="col-md-12 ">
        <p class="text-center">
            Un asistente te respondera lo mas pronto posible gracias por visitar nuestra pagina,
        </p>
    </div>

    </fieldset>
    </form>
</div>

@endsection