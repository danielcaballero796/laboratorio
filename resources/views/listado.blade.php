@extends('layouts.default')

@section('content')

    <div class="container ufps-fix-navbar-fixed">
        <div class="ufps-col-12 ufps-col-tablet-12">

            <!--Laboratorio-->
            <section>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="text-center">Listado de Dominios</h1>
                        <br>
                        <h4 class="text-center">Ingresa al sistema para poder hacer uso del Laboratorio SQL o
                        ver la informacion del ejercicio</h4>
                        <br>
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
                            <th>Ejercicio</th>
                            <th>Docente</th>
                            <th>Acciones</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($todos as $problema)
                                <tr>
                                    <td>{{$problema->nombre}}</td>
                                    <td>{{$problema->docente}}</td>
                                    <td><a href="{{ route('info',$problema->id)}}" class="btn ufps-btn">Informacion</a>
                                        <a href="{{route('ver',$problema->id)}}" class="btn ufps-btn">Ver</a></td>
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
@stop


