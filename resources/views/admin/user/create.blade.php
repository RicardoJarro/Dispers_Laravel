<html>
<head>

</head>

<body>


    <div class="container">
        <!--creacion de usuarios-->
        <b>Creacion de usuario</b> <br>
        <form action="{{url('admin/user')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="name">{{'nickname'}}</label>
            <input type="text" name="nickname" id="nickname" value=""> <br><br>

            <label for="name">{{'nombre'}}</label>
            <input type="text" name="nombre" id="nombre" value=""> <br><br>

            <label for="name">{{'slug'}}</label>
            <input type="text" name="slug" id="slug" value=""> <br><br>

            <label for="email">{{'email'}}</label>
            <input type="email" name="email" id="email" value=""> <br><br>
            <label for="password">{{'Password'}}</label>

            <input type="hidden" name="rol" id="rol" value="admnistrador">

            <input type="password" name="password" id="password"  value=""> <br><br>
            <input type="submit" value="Agregar">

            <a href="{{url('usuarios')}}">Regresar</a> 
        </form>
    </div>

</body>
</html>
