<?php

namespace App\Http\Controllers;

use App\Models\boleta;
use App\Models\cliente;
use App\Models\empleado;
use Illuminate\Http\Request;

class principalController extends Controller
{
    public function index()
    {
        $boletas = boleta::all();
        $empleado = empleado::all();
        $cliente = cliente::all();
        return view('index' , compact('boletas', 'empleado', 'cliente'));
    }
}
