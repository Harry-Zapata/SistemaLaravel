@extends('adminlte::page')

@section('title', 'Clientes | Crear')

@section('content_header')
    <div>
        <h1>Crear Cliente</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/cliente/insert') }}" method="POST">
                @csrf
                <x-adminlte-input name="nombres" label="Nombre del cliente" type="text" placeholder="Nombre"/>
                <x-adminlte-input name="apellidos" label="Apellidos del cliente" type="text" placeholder="Apellidos"/>
                <x-adminlte-input name="direccion" label="Direccion" type="text" placeholder="Direccion"/>
                <x-adminlte-input name="telefono" label="Telefono" type="text" placeholder="Telefono"/>
                <x-adminlte-input name="email" label="Email" type="text" placeholder="Email"/>
                <x-adminlte-select2 name="id_distrito" label="Distrito" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($distrito as $distritos)
                        <option value="{{ $distritos->id }}">{{ $distritos->nombre_distrito }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary"/>
                <a href="{{ url('admin/cliente') }}" class="btn btn-flat btn-danger">Cancelar <i class="fas fa-times"></i></a>
            </form>
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
