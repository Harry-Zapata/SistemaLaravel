@extends('adminlte::page')

@section('title', 'Clientes | Ver')

@section('content_header')
    <div>
        <h1>Ver Cliente</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p>apellidos:{{$cliente->nombres}}</p>
            <p>nombres:{{$cliente->apellidos}}</p>
            <p>direccion:{{$cliente->direccion}}</p>
            <p>telefono:{{$cliente->telefono}}</p>
            <p>email:{{$cliente->email}}</p>
            <p>id_distrito: {{$distrito->find($cliente->id_distrito)->nombre_distrito}}</p>

            <a href="{{ url('admin/cliente') }}" class="btn btn-danger">Volver <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
