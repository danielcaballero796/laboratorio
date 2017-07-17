<?php

namespace laboratorio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use laboratorio\Consulta;
use laboratorio\Http\Controllers\Controller;
use laboratorio\Problema;
use laboratorio\Tabla;

class HomeController extends Controller
{
    public function index()
    {
        return view('inicio');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $sql = "Select * from usuario where usuario = '$request->usuario' and clave = '$request->clave' ";
        $validar = count(DB::select($sql));

       if ($validar==0){
            flash('No se ha encontrado en el sistema un usuario con esos datos, verifiquelos')->error();
            return redirect('/');
        }else{
            session_start();
           $_SESSION['estudiante'] = DB::select($sql)[0]->usuario;

           //para obtener el lisitado de los ejercicios mostrados despues del login
           $datos = Problema::orderBy('id','ASC')->paginate(5);
           return view('listado')->with('todos', $datos);

       }

    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    public function info($id)
    {
        //para obtener el lisitado de los ejercicios mostrados despues del login
        $datos = Tabla::orderBy('idproblema','ASC')->paginate(5);
        return view('tablasdominio')->with('todos', $datos);

    }

    public function ver($id)
    {
        //para obtener el lisitado de los ejercicios mostrados despues del login
        $datos = Consulta::orderBy('idproblema','ASC')->paginate(5);
        return view('verdominio')->with('todos', $datos);
    }

    public function practicar($id)
    {
        //para obtener el lisitado de los ejercicios mostrados despues del login
        $datos = Consulta::orderBy('idproblema','ASC')->paginate(5);
        return view('practicar')->with('todos', $datos);

    }

    public function hola(){
        dd('hola');
    }
}
