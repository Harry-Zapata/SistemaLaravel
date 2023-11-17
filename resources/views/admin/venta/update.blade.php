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
                <option value="{{ $cliente->id }}" @if ($boleta->cliente_id == $cliente->id) selected @endif>{{ $cliente->nombres }}
                </option>
            @endforeach
        </x-adminlte-select2>
        <x-adminlte-select2 name="cod_emple" disabled label="Empleado" igroup-size="lg"
            data-placeholder="Select an option...">
            <option />
            @foreach ($empleado as $empleado)
                <option value="{{ $empleado->id }}" @if ($boleta->cod_empleado == $empleado->id) selected @endif>
                    {{ $empleado->nombres }}</option>
            @endforeach
        </x-adminlte-select2>
        <div>
            <x-adminlte-button class="btn btn-success w-100" disabled type="submit" label="Generar Boleta"
                theme="primary" />
        </div>
    </form>
    <form class="form-2">
        <x-adminlte-select2 name="id_producto" label="Producto" igroup-size="lg" data-placeholder="Select an option...">
            <option />
            @foreach ($producto as $producto)
                <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
            @endforeach
        </x-adminlte-select2>
        <x-adminlte-input name="precio" label="Precio" type="text" placeholder="Precio del Producto" />
        <x-adminlte-input name="cantidad" label="Cantidad" type="text" placeholder="Cantidad de productos" />
        <div>
            <x-adminlte-button class="btn btn-primary w-100" onclick="agregar()" label="Agregar" theme="primary" />
        </div>
    </form>
    @php
        $data = [];
    @endphp
    {{-- Tabla --}}
    <table class="table table-bordered table-striped" id="table1">
        <tr class="text-center">
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>

    </table>

    <div class="d-flex justify-content-end">
        <x-adminlte-button class="btn btn-success w-25" onclick="registrar()" label="Registrar" theme="primary" />
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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

        td {
            text-align: center;
        }
    </style>
@stop

@section('js')
    <script>
        let data = [];
        let table = document.getElementById('table1');
        //que verifique si en data hay algo
        verificar();
        function verificar() {
            if (data.length == 0) {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.textContent = 'No hay datos para mostrar';
                td.setAttribute('colspan', '4');
                tr.appendChild(td);
                table.appendChild(tr);
            } else {
                // limpiar la tabla
                table.innerHTML = '<tr class="text-center"><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Acciones</th>';
                for (let i = 0; i < data.length; i++) {
                    let tr = document.createElement('tr');
                    let td = document.createElement('td');
                    td.textContent = data[i].nom_producto;
                    tr.appendChild(td);
                    td = document.createElement('td');
                    td.textContent = data[i].cantidad;
                    tr.appendChild(td);
                    td = document.createElement('td');
                    td.textContent = data[i].precio;
                    tr.appendChild(td);
                    td = document.createElement('td');
                    td.innerHTML = '<a class="btn btn-xs btn-default text-danger mx-1 shadow" onclick="borrar(' + i + ')"><i class="fa fa-lg fa-fw fa-trash"></i></a>';
                    tr.appendChild(td);
                    table.appendChild(tr);
                }
            }
        }

        function agregar() {
            let id_producto = document.getElementsByName('id_producto')[0].value;
            let precio = document.getElementsByName('precio')[0].value;
            let cantidad = document.getElementsByName('cantidad')[0].value;
            let nom_producto = document.getElementsByName('id_producto')[0].options[document.getElementsByName('id_producto')[0].selectedIndex].text;
            let producto = {
                'id': id_producto,
                'precio': precio,
                'nom_producto': nom_producto,
                'cantidad': cantidad,
            }
            data.push(producto);
            verificar();
        }

        function borrar(i) {
            data.splice(i, 1);
            verificar();
        }
        function registrar() {
            console.log(data);
        }
    </script>
@stop
