<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratorio SQL - UFPS</title>
    <link href="../css/ufps.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="ufps-navbar ufps-navbar-fixed ufps-navbar-light" id="menuPrincipal">
    <div class="ufps-container">

        <div class="ufps-navbar-right">
            <a href="index" class="ufps-navbar-btn ufps-active">Cerrar Session</a>
        </div>
        <div class="ufps-navbar-left">
            <div class="ufps-navbar-corporate">
                <img src="../img/logo_ingsistemas.png" alt="">
                <img src="../img/logo_ufps.png" alt="">
            </div>
        </div>

        <div class="ufps-navbar-brand">
            Laboratorio SQL
        </div>

    </div>
</div>

    <div class="container ufps-fix-navbar-fixed">
        <div class="ufps-col-12 ufps-col-tablet-12">

            <!--Laboratorio-->
            <section>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="text-center">Sistema de de Base de Datos</h1>
                        <br>
                        <h4 class="text-center">Ingresa al sistema para poder hacer uso del Laboratorio SQL o
                            ver la informacion del ejercicio</h4>
                        <br>
                    </div>
                </div>

            </section>

            <!--Imagen Modelo Logico-->
            <section>
                <div class="panel panel-default">
                    <div class="panel-body">

                        <center><img src="../img/{{$todos[0]->idproblema}}.jpg"></center>

                    </div>
                </div>
            </section>

            <!--tabla de session-->
            <section>
                @include('flash::message')
                <div class="panel panel-default">
                    <div class="panel-body">

                        <table class="table">
                            <thead>
                            <th>Tabla</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($todos as $tabla)
                                <tr>
                                    <td>{{$tabla->nombre}}</td>
                                    <td>{{$tabla->descripcion}}</td>
                                    <td><a href="{{ route('info',$tabla->id)}}" class="btn ufps-btn">Datos</a>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $todos->render() }}

                    </div>
                </div>

            </section>

        </div>
    </div>

<script src="../js/ufps.js"></script>
</body>

</html>


