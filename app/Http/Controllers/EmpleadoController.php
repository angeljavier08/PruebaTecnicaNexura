<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\Role;
use App\Models\EmpleadoRol;

use Illuminate\Support\Facades\DB;


class EmpleadoController extends Controller
{

    const SEXOS = ["M" => 'Masculino', "F" => 'Femenino'];
    const BOLETINES = ["" => "Seleccione una opción", 1 => 'Si', 0 => 'No'];



    public function index()
    {
        return view("empleado.index");
    }


    public function getListarEmpleados()
    {
        $empleados =  Empleado::all();

        return datatables::of($empleados)
            ->addIndexColumn()

            ->addColumn('area', function ($empleados) {
                return $empleados->area->nombre;
            })
            ->rawColumns(['area'])
            ->make(true);
    }

    public function create()
    {
        $empleado = new Empleado;

        $sexos = self::SEXOS;
        $boletines = self::BOLETINES;
        $areas  =  Area::pluck('nombre', 'id');
        $roles = Role::all();

        return view("empleado.create", compact('sexos', 'boletines', 'areas', 'empleado', 'roles'));
    }


    public function show($id)
    {
        $empleado = Empleado::find($id);

        $sexos = self::SEXOS;
        $boletines = self::BOLETINES;
        $areas  =  Area::pluck('nombre', 'id');
        $roles = Role::all();

        return view('empleado.edit', compact('sexos', 'boletines', 'areas', 'empleado', 'roles'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'email' => 'required|email|max:191|unique:empleados,email,' . $id,
            'sexo' => 'required|max:2',
            'area' => 'required|max:2',
            'boletin' => 'nullable|max:2',
            'roles' => 'required'


        ]);

        DB::beginTransaction();

        try {

            $empleado = Empleado::where('id', $id)->first();

            $empleado->nombres = strip_tags($request->nombres);
            $empleado->email = strip_tags($request->email);
            $empleado->sexo = strip_tags($request->sexo);
            $empleado->area_id  = strip_tags($request->area);
            $empleado->descripcion =  strip_tags($request->descripcion);

            if (@$request->boletin) {
                $empleado->boletin =  1;
            } else {
                $empleado->boletin =  0;
            }


            $empleadoRol = EmpleadoRol::where("empleado_id", $id)->get();
            foreach ($empleadoRol as $rol) {
                $rol->delete();
            }

            foreach ($request->roles as $rol) {
                $empleadoRol = new  EmpleadoRol();
                $empleadoRol->rol_id  = $rol;
                $empleadoRol->empleado_id  = $id;
                $empleadoRol->save();
            }


            $empleado->save();

            DB::commit();
            return redirect()->route('empleados.index')->with('info', 'El empleado ha sido modificado con éxito.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('empleados.index')->with('error', 'Hubo un problema en la transacción, no se ha podido modificar el  empleado.');
        }
    }

    public function destroy($id)
    {
        Empleado::where('id', $id)->first()->delete();
        return response()->json(['msg' => 'Se ha eliminado el producto', 'success' => true]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'nombres' => 'required|string|max:255',
            'email' => 'required|email|max:191|unique:empleados',
            'sexo' => 'required|max:2',
            'area' => 'required|max:2',
            'boletin' => 'nullable|max:2',
            'roles' => 'required'


        ]);

        DB::beginTransaction();

        try {

            $empleado = new Empleado();

            $empleado->nombres = strip_tags($request->nombres);
            $empleado->email = strip_tags($request->email);
            $empleado->sexo = strip_tags($request->sexo);
            $empleado->area_id  = strip_tags($request->area);
            $empleado->descripcion =  strip_tags($request->descripcion);

            if (@$request->boletin) {
                $empleado->boletin =  1;
            } else {
                $empleado->boletin =  0;
            }

            $empleado->save();



            foreach ($request->roles as $rol) {
                $empleadoRol = new  EmpleadoRol();
                $empleadoRol->rol_id  = $rol;
                $empleadoRol->empleado_id  = $empleado->id;
                $empleadoRol->save();
            }



            DB::commit();
            return redirect()->route('empleados.index')->with('info', 'El empleado ha sido creado con éxito.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->route('empleados.index')->with('error', 'Hubo un problema en la transacción, no se ha podido crear el  empleado.');
        }
    }
}
