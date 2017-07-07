<?php

namespace laboratorio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use laboratorio\Consulta;
use laboratorio\Finals;
use laboratorio\Http\Controllers\Controller;
use laboratorio\Practica;

class PracticaController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        if ($request->seleccione == 'definitiva') {

            $nombreBD = DB:: select("SELECT p.nombre as 'nombrebd' FROM consulta c inner join problema p on (c.idproblema=p.id) where c.idproblema = $request->idconsulta")[0]->nombrebd;
            $consulta = str_replace("from ", "from " . $nombreBD . '.', $request->sql);//para poder anteponer el nombre de la bd que se usara

            $cero = count(DB::select($consulta));

            if ($cero == 0) {
                flash('La consulta no ha devuelto algún resultado')->error();
                $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
                return view('practicar')->with('todos', $datos);
            } else {

                $uno = DB:: select("select count(*) as 'numero' from final where idconsulta = $request->idconsulta and usuario = '1151267' ")[0]->numero;

                if ($uno >= 1) {
                    flash('Usted ya realizo un registro como definitivo de esta consulta')->error();
                    $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
                    return view('practicar')->with('todos', $datos);
                } else {

                    $definitiva = new Finals();
                    $definitiva->usuario = 1151267; //iria la variable de sesion
                    $definitiva->idconsulta = $request->idconsulta;
                    $definitiva->sql = $request->sql;
                    $definitiva->resultado = 'exito';
                    $definitiva->save();

                    flash('Se ha registrado su intento')->success();
                    $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
                    return view('practicar')->with('todos', $datos);
                }
            }


        }
        else if ($request->seleccione == 'practica') {
            try {
                $nombreBD = DB:: select("SELECT p.nombre as 'nombrebd' FROM consulta c inner join problema p on (c.idproblema=p.id) where c.idproblema = $request->idconsulta")[0]->nombrebd;

                $consulta = str_replace("from ", "from " . $nombreBD . '.', $request->sql);//para poder anteponer el nombre de la bd que se usara

                $cero = count(DB::select($consulta));
                $sql = "select numpracticas from consulta where id = $request->idconsulta";
                $numerodef = DB::select($sql)[0]->numpracticas; //numero de practicas def en la tabla consulta

                if ($cero == 0) {
                    flash('La consulta no ha devuelto algún resultado')->error();
                    $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
                    return view('practicar')->with('todos', $datos);
                } else {
                    //consulta el número de veces que ya practico
                    $dos = DB:: select("select count(*) as 'numero' from practica where idconsulta = $request->idconsulta and usuario = '1151267' ")[0]->numero;

                    if ($numerodef == $dos) {
                        flash('Usted ya realizo los ' . $dos . ' intentos de practica que correspondian a esta consulta')->error();
                        $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
                        return view('practicar')->with('todos', $datos);
                    } else {
                        $practica = new Practica();
                        $practica->usuario = 1151267; //iria la variable de sesion
                        $practica->idconsulta = $request->idconsulta;
                        $practica->sql = $request->sql;
                        $practica->resultado = 'exito';
                        $practica->save();

                        flash('Se ha registrado su intento')->success();
                        $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
                        return view('practicar')->with('todos', $datos);
                    }
                }

            } catch (\Illuminate\Database\QueryException $e) {

                flash('ha ocurrido un error ' . substr($e, 0, 230))->error();
                $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
                return view('practicar')->with('todos', $datos);

            }
        }
    }

    /**
     *
     */
    public
    function create()
    {
        //
    }

    /**
     * @param $id
     */
    public
    function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */
    public
    function destroy($id)
    {
        //
    }

    /**
     * @param $id
     */
    public
    function edit($id)
    {
        //

    }

    /**
     * @param $id
     */

    public
    function practicando()
    {

        //para obtener el lisitado de los ejercicios mostrados despues del login
        $datos = Consulta::orderBy('idproblema', 'ASC')->paginate(5);
        return view('practicar')->with('todos', $datos);

    }


}
