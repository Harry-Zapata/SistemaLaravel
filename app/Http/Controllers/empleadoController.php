<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleado;
use App\Models\distrito;
use App\Models\cargo;

class empleadoController extends Controller
{
    public function index()
    {
        $empleados = empleado::all();
        $distrito = distrito::all();
        $cargo = cargo::all();
        //que remplace el id_distrito y el cod_cargo por distrito y cargo
        $empleados = $empleados->map(function ($empleado) use ($distrito, $cargo) {
            $empleado->id_distrito = $distrito->find($empleado->id_distrito)->nombre_distrito;
            $empleado->cod_cargo = $cargo->find($empleado->cod_cargo)->nombre_cargo;
            return $empleado;
        });
        return view('admin.empleados.home', compact('empleados', 'distrito', 'cargo'));
    }

    public function create()
    {
        $distrito = distrito::all();
        $cargo = cargo::all();
        return view('admin.empleados.add', compact('distrito', 'cargo'));
    }

    public function store(Request $request)
    {
        $empleado = new empleado();
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->dni_empleado = $request->input('dni_empleado');
        $empleado->direccion = $request->input('direccion');
        $empleado->estado_civil = $request->input('estado_civil');
        $empleado->nivel_educacion = $request->input('nivel_educacion');
        $empleado->telefono = $request->input('telefono');
        $empleado->email = $request->input('email');
        $empleado->sueldo_basico = $request->input('sueldo_basico');
        $empleado->fecha_ingreso = $request->input('fecha_ingreso');
        $empleado->id_distrito = $request->input('id_distrito');
        $empleado->cod_cargo = $request->input('cod_cargo');
        try {
            $empleado->save();
            return redirect('admin/empleado')->with('success', 'empleado created successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('admin/empleado')->with('error', 'empleado with the same name already exists');
        }
    }

    public function show($id)
    {
        $distrito = distrito::all();
        $cargo = cargo::all();
        $empleado = empleado::find($id);
        return view('admin.empleados.read', compact('empleado', 'distrito', 'cargo'));
    }

    public function edit($id)
    {
        $empleados = empleado::find($id);
        $distrito = distrito::all();
        $cargo = cargo::all();
        return view('admin.empleados.update', compact('empleados', 'distrito', 'cargo'));
    }

    public function update(Request $request, $id)
    {
        $empleados = empleado::find($id);
        $empleados->nombres = $request->input('nombres');
        $empleados->apellidos = $request->input('apellidos');
        $empleados->dni_empleado = $request->input('dni_empleado');
        $empleados->direccion = $request->input('direccion');
        $empleados->estado_civil = $request->input('estado_civil');
        $empleados->nivel_educacion = $request->input('nivel_educacion');
        $empleados->telefono = $request->input('telefono');
        $empleados->email = $request->input('email');
        $empleados->sueldo_basico = $request->input('sueldo_basico');
        $empleados->fecha_ingreso = $request->input('fecha_ingreso');
        $empleados->id_distrito = $request->input('id_distrito');
        $empleados->cod_cargo = $request->input('cod_cargo');
        $empleados->save();
        return redirect('admin/empleado')->with('success', 'empleado updated successfully');
    }

    public function destroy($id)
    {
    }
}
