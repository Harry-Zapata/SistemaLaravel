<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\boleta;
use App\Models\producto;
use App\Models\cliente;
use App\Models\detalleBoleta;
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

        return redirect('admin/venta/insert/'.$boleta->id.'')->with('success', 'boleta creada exitosamente');

    }
    public function show($id)
    {
        $producto = producto::all();
        $cliente = cliente::all();
        $empleado = empleado::all();
        $boleta = boleta::find($id);
        $detalleBoleta = detalleBoleta::where('num_boleta', $boleta->id)->get();
        return view('admin.venta.update', compact('boleta', 'producto', 'cliente', 'empleado', 'detalleBoleta'));
    }
    public function update(Request $request)
    {
        $detalleBoleta = new detalleBoleta();
        $detalleBoleta->num_boleta = $request->input('num_boleta');
        $detalleBoleta->id_prod = $request->input('id_prod');
        $detalleBoleta->cantidad = $request->input('cantidad');
        $detalleBoleta->precio = $request->input('precio');
        $detalleBoleta->save();
    }

}
