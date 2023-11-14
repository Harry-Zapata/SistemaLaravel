<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
class categoriaController extends Controller
{
    public function index()
    {
        $categoria = categoria::all();
        return view('admin.categorias.home',compact('categoria'));
    }

    public function create()
    {
        return view('admin.categorias.add');
    }

    public function store(Request $request)
    {
        $categoria = new categoria();
        $categoria->nombre = $request->input('nombre');
        try {
            $categoria->save();
            return redirect('admin/categoria')->with('success', 'Categoria created successfully');
        }
        catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for unique constraint violation
                return redirect('admin/categoria')->with('error', 'Categoria with the same name already exists');
            }
        }
    }

    public function show($id)
    {
        $categoria = categoria::find($id);
        return view('admin.categorias.read', compact('categoria'));
    }

    public function edit($id)
    {
        $categoria = categoria::find($id);
        return view('admin.categorias.update', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = categoria::find($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->save();
        return redirect('admin/categoria')->with('success', 'Categoria updated successfully');
    }

    public function destroy($id)
    {

    }
}
