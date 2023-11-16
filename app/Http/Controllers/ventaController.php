<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\boleta;
use App\Models\producto;
use App\Models\cliente;
use App\Models\empleado;

class ventaController extends Controller
{
    public function index()
    {
        $boleta = boleta::all();
        $producto = producto::all();
        $cliente = cliente::all();
        $empleado = empleado::all();
        return view('admin.venta.home', compact('boleta', 'producto', 'cliente', 'empleado'));
    }

    public function store(Request $request)
    {
        $boleta = new boleta();
        $boleta->fecha_emision = new \DateTime();
        $boleta->estado_boleta = true;
        $boleta->cliente_id = $request->input('id_cliente');
        $boleta->cod_empleado = $request->input('cod_emple');
        $boleta->save();
        $id_boleta = $boleta->id;
        $boleta = boleta::find($id_boleta);

        return redirect('admin/venta/insert/'.$boleta->id.'')->with('success', 'boleta created successfully');

    }
    public function show($id)
    {
        $producto = producto::all();
        $cliente = cliente::all();
        $empleado = empleado::all();
        $boleta = boleta::find($id);
        return view('admin.venta.update', compact('boleta', 'producto', 'cliente', 'empleado'));
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
