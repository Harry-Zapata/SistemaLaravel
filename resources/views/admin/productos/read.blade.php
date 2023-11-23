@extends('adminlte::page')

@section('title', 'Productos | Ver')

@section('content_header')
    <div>
        <h1>Ver Producto</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p>id: {{$producto->id}}</p>
            <p>descripcion: {{$producto->descripcion}}</p>
            <p>precio_venta: {{$producto->precio_venta}}</p>
            <p>stock_minimo: {{$producto->stock_minimo}}</p>
            <p>stock_actual: {{$producto->stock_actual}}</p>
            <p>cod_categoria: {{$producto->cod_categoria}}</p>
            <a href="{{ url('admin/producto') }}" class="btn btn-danger">Volver <i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
