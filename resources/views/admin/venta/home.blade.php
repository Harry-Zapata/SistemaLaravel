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
        <x-adminlte-select2 name="id_cliente" class="col-md-6" label="Cliente" igroup-size="lg"
            data-placeholder="Select an option...">
            <option />
            @foreach ($cliente as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nombres }}</option>
            @endforeach
        </x-adminlte-select2>
        <x-adminlte-select2 name="cod_emple" label="Empleado" igroup-size="lg" data-placeholder="Select an option...">
            <option />
            @foreach ($empleado as $empleado)
                <option value="{{ $empleado->id }}">{{ $empleado->nombres }}</option>
            @endforeach
        </x-adminlte-select2>
        <div>
            <x-adminlte-button class="btn btn-success w-100" type="submit" label="Generar Boleta" theme="primary" />
        </div>
    </form>
    <form action="{{ url('admin/venta/insert') }}" method="POST" class="form-2">
        @csrf
        <x-adminlte-select2 name="id_producto" label="Producto" igroup-size="lg" data-placeholder="Select an option..."
            disabled>
            <option />
            @foreach ($producto as $producto)
                <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
            @endforeach
        </x-adminlte-select2>
        <x-adminlte-input name="precio" disabled label="Precio" type="text" placeholder="Precio del Producto" />
        <x-adminlte-input name="cantidad" disabled label="Cantidad" type="text" placeholder="Cantidad de productos" />
        <div>
            <x-adminlte-button class="btn btn-primary w-100" disabled type="submit" label="Agregar" theme="primary" />
        </div>
    </form>
    {{-- tabla --}}
    @php
        $heads = ['Producto', 'cantidad', 'precio', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    @endphp
    <x-adminlte-datatable id="table1" head-theme="light" :heads="$heads" striped hoverable bordered/>

@stop

@section('css')

    <style>
        form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            justify-content: center;
            align-items: center;
        }

        .form-2 {
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
