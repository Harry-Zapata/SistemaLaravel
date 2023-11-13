<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class cargoController extends Controller
{
    public function index()
    {
        $cargo = cargo::all();
        return view('admin.cargos.home', compact('cargo'));
    }

    public function create()
    {
        return view('admin.cargos.add');
    }

    public function store(Request $request)
    {
        $cargo = new cargo();
        $cargo->nombre_cargo = $request->cargo;
        try {
            $cargo->save();
            return redirect('admin/cargo')->with('success', 'Cargo created successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for unique constraint violation
                return redirect('admin/cargo')->with('error', 'Cargo with the same name already exists');
            }
        }
        // return redirect('admin/cargo');
    }

    public function show($id)
    {
        $cargo = cargo::find($id);
        return view('admin.cargos.read', compact('cargo'));
    }

    public function edit($id)
    {
        $cargo = cargo::find($id);
        return view('admin.cargos.update', compact('cargo'));
    }

    public function update(Request $request, $id)
    {
        $cargo = cargo::find($id);
        $cargo->nombre_cargo = $request->input('nombre_cargo');
        $cargo->save();
        return redirect('admin/cargo')->with('success', 'Cargo updated successfully');
    }

    public function destroy($id)
    {

    }
}
