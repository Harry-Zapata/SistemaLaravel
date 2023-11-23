<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class productoController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        $categorias = Categoria::all();
        $producto = $producto->map(function ($producto) use ($categorias) {
            $producto->cod_categoria = $categorias->find($producto->cod_categoria)->nombre;
            return $producto;
        });
        return view('admin.productos.home', compact('producto', 'categorias'));
    }

    public function create()
    {
        $categoria = Categoria::all();
        return view('admin.productos.add', compact('categoria'));
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->descripcion = $request->input('descripcion');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->stock_minimo = $request->input('stock_minimo');
        $producto->stock_actual = $request->input('stock_actual');
        $producto->cod_categoria = $request->input('cod_categoria');
        try {
            $producto->save();
            return redirect('admin/producto')->with('success', 'producto creado exitosamente');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for unique constraint violation
                return redirect('admin/producto')->with('error', 'El producto ya existe, no se puede crear');
            }
        }
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('admin.productos.read', compact('producto', 'categorias'));
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categoria = Categoria::all();
        return view('admin.productos.update', compact('producto', 'categoria'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->descripcion = $request->input('descripcion');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->stock_minimo = $request->input('stock_minimo');
        $producto->stock_actual = $request->input('stock_actual');
        $producto->cod_categoria = $request->input('cod_categoria');
        try {
            $producto->save();
            return redirect('admin/producto')->with('success', 'producto actualizado exitosamente');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for unique constraint violation
                return redirect('admin/producto')->with('error', 'El producto ya existe, no se puede actualizar');
            }
        }
    }


    public function disminuir(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->stock_actual = $producto->stock_actual - $request->input('stock_actual');
        $producto->save();
    }
}
