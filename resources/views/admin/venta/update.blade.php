@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Ventas</h1>
    </div>
@stop

@section('content')
<form action="{{ url('admin/venta/insert') }}" method="POST">
    @csrf
    <x-adminlte-select2 name="id_cliente" disabled class="col-md-6" label="Cliente" igroup-size="lg"
        data-placeholder="Select an option...">
        <option />
        @foreach ($cliente as $cliente)
            <option value="{{ $cliente->id }}" @if($boleta->cliente_id == $cliente->id) selected @endif>{{ $cliente->nombres }}</option>
        @endforeach
    </x-adminlte-select2>
    <x-adminlte-select2 name="cod_emple" disabled label="Empleado" igroup-size="lg"
        data-placeholder="Select an option...">
        <option />
        @foreach ($empleado as $empleado)
            <option value="{{ $empleado->id }}" @if($boleta->cod_empleado == $empleado->id) selected @endif>{{ $empleado->nombres }}</option>
        @endforeach
    </x-adminlte-select2>
    <div>
        <x-adminlte-button class="btn btn-success w-100" disabled type="submit" label="Generar Boleta" theme="primary"/>
    </div>
</form>
<form action="{{ url('admin/venta/insert') }}" method="POST" class="form-2">
    @csrf
    <x-adminlte-select2 name="id_producto" label="Producto" igroup-size="lg"
        data-placeholder="Select an option...">
        <option />
        @foreach ($producto as $producto)
            <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
        @endforeach
    </x-adminlte-select2>
    <x-adminlte-input name="precio" label="Precio" type="text" placeholder="Precio del Producto"/>
    <x-adminlte-input name="cantidad" label="Cantidad" type="text" placeholder="Cantidad de productos"/>
    <div>
        <x-adminlte-button class="btn btn-primary w-100" type="submit" label="Agregar" theme="primary"/>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
          form{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            justify-content: center;
            align-items: center;
          }
          .form-2{
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 50px;
            justify-content: center;
            align-items: center;
          }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
