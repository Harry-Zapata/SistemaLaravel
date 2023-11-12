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
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for unique constraint violation
                return redirect('admin/cargo')->with('error', 'Cargo with the same name already exists');
            }
        }
        // return redirect('admin/cargo');
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
