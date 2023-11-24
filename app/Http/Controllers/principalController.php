<?php

namespace App\Http\Controllers;

use App\Models\boleta;
use App\Models\cargo;
use App\Models\categoria;
use App\Models\cliente;
use App\Models\distrito;
use App\Models\empleado;
use App\Models\producto;
use Illuminate\Http\Request;

class principalController extends Controller
{
    public function index()
    {
        $boletas = boleta::all();
        $empleados = empleado::all();
        $empleado = empleado::all();
        $cliente = cliente::all();

        $categoria = categoria::all();
        $cargo = cargo::all();
        $distrito = distrito::all();
        $productos = producto::all();

        //  Inicializar un array para almacenar el número de boletas por empleado
        $boletasPorEmpleado = [];

        //  Inicializar el array con todos los empleados y establecer el número de boletas en 0
        foreach ($empleado as $empleado) {
            $boletasPorEmpleado[$empleado->id] = 0;
        }

        //Contar el número de boletas por empleado
        foreach ($boletas as $boleta) {
            $boletasPorEmpleado[$boleta->cod_empleado]++;
        }

        return view('index', compact('boletas','empleados', 'empleado', 'cliente', 'categoria', 'cargo', 'distrito', 'empleado', 'productos', 'boletasPorEmpleado'));
    }
}
