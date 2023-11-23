@extends('adminlte::page')

@section('title', 'Boletas')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Boletas</h1>
    </div>
@stop

@section('content')
    @php
        $heads = ['ID', 'Fecha', 'Estado', 'Cliente', 'Empleado', 'Ver Boleta'];

        $data = $boletas->toArray();
        $data = array_map(function ($row) {
            $row[3] =
                '<nobr>' .
                '<a href="boleta/show/' . $row['id'] . '/generateInvoice" target="_blank">
                    Ver Detalle de Boleta
                </a>' .
                '</nobr>';
            return $row;
        }, $data);
        $config = [
            'data' => $data,
            'order' => [[1, 'asc']],
            'columns' => [null, null, ['orderable' => false]],
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
@stop

@section('js')

@stop
