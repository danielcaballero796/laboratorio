@extends('layouts.default2')

@section('content')

<div class="container ufps-fix-navbar-fixed">
    <div class="ufps-col-12 ufps-col-tablet-12">

        <!--Encabezado del Laboratorio-->
        <section>

        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center">Laboratorio SQL</h1>
                <br>
                <h4 class="text-center">Ingresa al sistema para poder hacer uso del Laboratorio SQL</h4>
                <br>
                <img class="center-block" src="img/logo_ufps.png">
            </div>
        </div>

        </section>

        <!--inicio de session-->
        <section>

        <div class="panel panel-default">
            <div class="panel-body">

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Recuerdame
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn ufps-btn">Ingresar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        </section>


    </div>
</div>
@stop