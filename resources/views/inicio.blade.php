@extends('layouts.default2')

@section('content')

<div class="container ufps-fix-navbar-fixed">
    <div class="ufps-col-12 ufps-col-tablet-12">

        <!--Laboratorio-->
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
            @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-body">

                {!! Form::open(['route' => 'store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                        <div class="col-sm-10">
                            {!! Form::text('usuario',null,['class' => 'form-control','placeholder'=>'Usuario', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            {!! Form::password('clave', ['class' => 'form-control','placeholder'=>'Contraseña', 'required']) !!}
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
                            {!! Form::submit('Registrar',['class'=>'btn ufps-btn']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>

        </section>


    </div>
</div>
@stop