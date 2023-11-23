<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\distrito;

class clienteController extends Controller
{
    public function index()
    {
        $distrito = distrito::all();
        $cliente = cliente::all();
        $cliente = $cliente->map(function ($cliente) use ($distrito) {
            $cliente->id_distrito = $distrito->find($cliente->id_distrito)->nombre_distrito;
            return $cliente;
        });
        return view('admin.clientes.home', compact('cliente'));
    }

    public function create()
    {
        $distrito = distrito::all();
        return view('admin.clientes.add', compact('distrito'));
    }

    public function store(Request $request)
    {
        $cliente = new cliente();
        $cliente->nombres = $request->input('nombres');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->direccion = $request->input('direccion');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->id_distrito = $request->input('id_distrito');
        try {
            $cliente->save();
            return redirect('admin/cliente')->with('success', 'cliente creado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('admin/cliente')->with('error', 'no se puede crear el cliente');
        }
    }

    public function show($id)
    {
        $distrito = distrito::all();
        $cliente = cliente::find($id);
        return view('admin.clientes.read', compact('cliente', 'distrito'));
    }

    public function edit($id)
    {
        $cliente = cliente::find($id);
        $distrito = distrito::all();
        return view('admin.clientes.update', compact('cliente', 'distrito'));
    }

    public function update(Request $request, $id)
    {
        $cliente = cliente::find($id);
        $cliente->nombres = $request->input('nombres');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->direccion = $request->input('direccion');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->id_distrito = $request->input('id_distrito');
        try{
        $cliente->save();
        return redirect('admin/cliente')->with('success', 'cliente actualizado correctamente');
        }
        catch (\Illuminate\Database\QueryException $e) {
            return redirect('admin/cliente')->with('error', 'no se puede actualizar el cliente');
        }
    }

    public function destroy($id)
    {
    }
}
