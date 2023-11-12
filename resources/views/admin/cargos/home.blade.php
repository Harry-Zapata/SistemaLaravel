@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Cargos</h1>
        <a class="btn btn-primary" href="cargo/create">Crear Cargo</a>
    </div>
@stop

@section('content')
    {{-- @php
        $heads = ['ID', 'Nombre del cargo', ['label' => 'Actions', 'width' => 5]];
        $config = [
            'order' => [[1, 'asc']],
            'columns' => [['orderable' => false]],
        ];
    @endphp --}}

    {{-- <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config" striped hoverable with-buttons>
        @if ($cargo->count() == 0)
            <tr>
                <td colspan="3">No hay cargos registrados</td>
            </tr>
        @else
                @foreach ($cargo as $cargo)
                <tr>
                    <td>{{ $cargo->id }}</td>
                    <td>{{ $cargo->nombre_cargo }}</td>
                    <td>
                        <nobr>
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                            <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                        </nobr>
                    </td>
                </tr>
                @endforeach
        @endif
    </x-adminlte-datatable> --}}
    @php
        $heads = ['ID', 'Nombre del cargo', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                       <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';

        $config = [
            'data' => [
                // [
                //     22,
                //     'John Bender',
                //     '+02 (123) 123456789',
                //     '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'
                // ]
            ],
            'order' => [[1, 'asc']],
            'columns' => [null, null, ['orderable' => false]],
        ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
