<?php

namespace App\Http\Controllers;

use App\Models\boleta;
use App\Models\cliente;
use App\Models\detalleBoleta;
use App\Models\empleado;
use Illuminate\Http\Request;

class boletaController extends Controller
{
    public function index()
    {
        $boletas = boleta::all();
        $clientes = cliente::all();
        $empleado = empleado::all();
        $boletas = $boletas->map(function ($boletas) use ($clientes, $empleado) {
            $boletas->estado_boleta = $boletas->estado_boleta ? 'Pagada' : 'Pendiente';
            $boletas->cliente_id = $clientes->find($boletas->cliente_id)->nombres. ' ' . $clientes->find($boletas->cliente_id)->apellidos;
            $boletas->cod_empleado = $empleado->find($boletas->cod_empleado)->nombres. ' ' . $empleado->find($boletas->cod_empleado)->apellidos;
            return $boletas;
        });
        return view('admin.boletas.home', compact('boletas'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
