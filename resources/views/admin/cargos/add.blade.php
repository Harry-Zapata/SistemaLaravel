@extends('adminlte::page')

@section('title', 'Cargos | Crear')

@section('content_header')
    <div>
        <h1>Crear Cargo</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/cargo/insert') }}" method="POST">
                @csrf
                <x-adminlte-input name="cargo" label="Nombre del cargo" type="text" placeholder="Nombre del cargo"/>

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary"/>
                <a href="{{ url('admin/cargo') }}" class="btn btn-flat btn-danger">Cancelar <i class="fas fa-times"></i></a>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
