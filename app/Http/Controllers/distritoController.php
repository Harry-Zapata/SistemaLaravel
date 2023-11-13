<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\distrito;
class distritoController extends Controller
{
    public function index()
    {
        $distritos = distrito::all();
        return view('admin.distritos.home', compact('distritos'));
    }

    public function create()
    {
        return view('admin.distritos.add');
    }

    public function store(Request $request)
    {
        $distritos = new distrito();
        $distritos->nombre_distrito = $request->nombre_distrito;
        try {
            $distritos->save();
            return redirect('admin/distrito')->with('success', 'distritos created successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for unique constraint violation
                return redirect('admin/distrito')->with('error', 'distritos with the same name already exists');
            }
        }
        // return redirect('admin/distritos');
    }

    public function show($id)
    {
        $distritos = distrito::find($id);
        return view('admin.distritos.read', compact('distritos'));
    }

    public function edit($id)
    {
        $distritos = distrito::find($id);
        return view('admin.distritos.update', compact('distritos'));
    }

    public function update(Request $request, $id)
    {
        $distritos = distrito::find($id);
        $distritos->nombre_distrito = $request->input('nombre_distrito');
        $distritos->save();
        return redirect('admin/distrito')->with('success', 'distritos updated successfully');
    }

}
