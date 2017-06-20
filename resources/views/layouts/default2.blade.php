<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratorio SQL - UFPS</title>
    <link href="css/ufps.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="ufps-navbar ufps-navbar-fixed ufps-navbar-light" id="menuPrincipal">
        <div class="ufps-container">

            <div class="ufps-navbar-left">
                <div class="ufps-navbar-corporate">
                    <img src="img/logo_ingsistemas.png" alt="">
                    <img src="img/logo_ufps.png" alt="">
                </div>
            </div>

            <div class="ufps-navbar-brand">
                Laboratorio SQL
            </div>

        </div>
    </div>

@yield('content')

@include('flash::message')

<script src="js/ufps.js"></script>
</body>

</html>