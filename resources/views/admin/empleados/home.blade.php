@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Empleados</h1>
        <a class="btn btn-primary" href="empleado/create">Crear Empleado</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success mt-4" id="alert">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger mt-4" id="alert">
            {{ session('error') }}
        </div>
    @endif
@stop

@section('content')
    @php
        $heads = ['ID', 'Nombre', 'Apellidos', 'DNI', 'Dirección', 'E.Civil', 'Educación', 'Teléfono', 'Email', 'Sueldo', 'F.Ingreso', 'Distrito', 'Cargo', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
        $data = $empleados->toArray();
        $data = array_map(function ($row) {
            $row[13] =
                '<nobr>' .
                '<a class="btn btn-xs btn-default text-primary mx-1 shadow" href="empleado/edit/' .
                json_encode($row['id']) .
                '" title="Edit">
            <i class="fa fa-lg fa-fw fa-pen"></i>
            </a>' .
                '<a class="btn btn-xs btn-default text-teal mx-1 shadow" href="empleado/read/' .
                json_encode($row['id']) .
                '" title="Details">
               <i class="fa fa-lg fa-fw fa-eye"></i>
           </a>' .
                '</nobr>';
            return $row;
        }, $data);
        $config = [
            'data' => $data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, null, null, null, null, null, null, null, null, null, null, ['orderable' => false]],
        ];
    @endphp

    <x-adminlte-datatable id="table1" head-theme="dark" :heads="$heads" striped hoverable bordered>
        @foreach ($config['data'] as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop

@section('css')
    <style>
        td {
            white-space: nowrap !important;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            let table1_info = document.getElementById('table1_info');
            let array = table1_info.textContent.split(' ');
            console.log(array);
            diccionario = {
                'Showing': 'Mostrando',
                'to': 'a',
                'of': 'de',
                'entries': 'registros',
            }
            for (let i = 0; i < array.length; i++) {
                if (array[i] in diccionario) {
                    array[i] = diccionario[array[i]];
                }
            }
            table1_info.textContent = array.join(' ');
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#alert").slideUp(500);
            })
        })
    </script>
@stop
