@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Ventas</h1>
        <div>
            <span id="num_boleta">Boleta:{{ $boleta->id }}</span><br>
            <span id="stock_actual"></span>
        </div>
    </div>
@stop

@section('content')
    <form>
        @csrf
        <x-adminlte-select2 name="id_cliente" disabled onchange="mostrarPrecio()" class="col-md-6" label="Cliente"
            igroup-size="lg" data-placeholder="Select an option...">
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
        <x-adminlte-select2 oninput="mostrarPrecio({{ $producto }})" name="id_producto" label="Producto"
            igroup-size="lg" data-placeholder="Select an option...">
            <option />
            @foreach ($producto as $producto)
                <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
            @endforeach
        </x-adminlte-select2>
        {{-- cuando selecciona el producto debo mostrar el precio --}}
        <x-adminlte-input name="precio" disabled label="Precio" type="text" placeholder="Precio del Producto" />
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

    <div class="d-flex justify-content-between">
        <div class="btn btn-warning w-25 d-flex justify-content-between">
            Total : <span id="total">0</span>
        </div>
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
                table.innerHTML =
                    '<tr class="text-center"><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Acciones</th>';
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                td.textContent = 'No hay datos para mostrar';
                td.setAttribute('colspan', '4');
                tr.appendChild(td);
                table.appendChild(tr);
            } else {
                table.innerHTML =
                    '<tr class="text-center"><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Acciones</th>';
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
                    td.innerHTML = '<a class="btn btn-xs btn-default text-white bg-primary mx-1 shadow" onclick="sumar1(' +
                        i + ')">+</a>' + '<a class="btn btn-xs btn-default text-danger mx-1 shadow" onclick="borrar(' + i +
                        ')"><i class="fa fa-lg fa-fw fa-trash"></i></a>' +
                        '<a class="btn btn-xs btn-default text-white bg-primary mx-1 shadow" onclick="restar1(' + i +
                        ')">-</a>';
                    tr.appendChild(td);
                    table.appendChild(tr);
                }
            }
        }

        function checarFormulario() {
            let producto = document.getElementsByName('id_producto')[0];
            let cantidad = document.getElementsByName('cantidad')[0];
            if (cantidad.value == "") {
                return false;
            }
            if (producto.value == "") {
                return false;
            }
            return true;
        }

        function agregar() {
            if (!checarFormulario()) {
                alert('Todos los campos son obligatorios');
                return;
            }
            let stock_actual = document.getElementById('cantidad_stock').textContent;
            let cantidad_actual = document.getElementsByName('cantidad')[0].value;
            if (parseInt(stock_actual) < parseInt(cantidad_actual)) {
                alert('No hay suficiente stock');
                return;
            }
            for (let i = 0; i < data.length; i++) {
                if (data[i].id == document.getElementsByName('id_producto')[0].value) {
                    alert('Ya se agrego el producto');
                    return;
                }
            }
            let id_producto = document.getElementsByName('id_producto')[0].value;
            let precio = document.getElementsByName('precio')[0].value;
            let cantidad = document.getElementsByName('cantidad')[0].value;
            let nom_producto = document.getElementsByName('id_producto')[0].options[document.getElementsByName(
                'id_producto')[0].selectedIndex].text;
            let num_boleta = document.getElementById("num_boleta").textContent;
            let producto = {
                'id': id_producto,
                'precio': precio,
                'nom_producto': nom_producto,
                'cantidad': cantidad,
                'num_boleta': num_boleta
            }
            data.push(producto);
            verificar();
            total();
        }

        function borrar(i) {
            data.splice(i, 1);
            verificar();
            total();
        }

        function restar1(i) {
            if (data[i].cantidad == 1) {
                borrar(i);
                return;
            }
            data[i].cantidad--;
            verificar();
            total();
        }

        function sumar1(i) {
            let stock_actual = document.getElementById('cantidad_stock').textContent;
            let cantidad_actual = document.getElementsByName('cantidad')[0].value;
            if (parseInt(stock_actual) < parseInt(cantidad_actual)) {
                alert('Solo tenemos' + document.getElementById('cantidad_stock').textContent + 'en stock');
                return;
            }
            data[i].cantidad++;
            verificar();
            total();
        }

        function registrar() {
            //recorrer la data
            for (let i = 0; i < data.length; i++) {
                let element = data[i];
                registrardata(element);
            }
        }

        function registrardata(data) {
            var dataForm = {
                id_prod: data.id,
                cantidad: data.cantidad,
                precio: data.precio,
                num_boleta: data.num_boleta
            }
            console.log(dataForm);
            //   $.ajax({
            //       url: "{{ url('insert/detalle') }}",
            //       type: "POST",
            //       data: dataForm,
            //       success: function(data) {
            //           console.log(data);
            //       },
            //       error: function(data) {
            //           console.log("error"+data)
            //       }
            //   })
        }

        function mostrarPrecio(data) {
            let id = document.getElementsByName('id_producto')[0].value;
            let precio = document.getElementsByName('precio')[0];
            let cantidad = document.getElementsByName('cantidad')[0];
            let stock_actual = document.getElementById('stock_actual');
            //que filtre la data por id
            for (let i = 0; i < data.length; i++) {
                if (data[i].id == id) {
                    precio.value = data[i].precio_venta;
                    // modificar el placeholder para que diga max = data[i].stock
                    cantidad.placeholder = 'Hay ' + data[i].stock_actual + ' disponibles';
                    stock_actual.innerHTML = 'Stock Actual: ' + '<span id="cantidad_stock">' + data[i].stock_actual +
                        '</span>';
                }
            }
        }

        function total() {
            let total = 0;
            let btnTotal = document.getElementById('total');
            for (let i = 0; i < data.length; i++) {
                total += data[i].precio * data[i].cantidad;
                btnTotal.innerHTML = '$' + total;
            }
        }
    </script>
@stop
