@extends('adminlte::page')

@section('title', 'Cargos | Ver')

@section('content_header')
    <div>
        <h1>Ver Cargo</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Mostrar los datos del cargo --}}
            <p>ID: {{ $cargo->id }}</p>
            <p>Nombre del cargo: {{ $cargo->nombre_cargo }}</p>

            <a href="{{ url('admin/cargo') }}" class="btn btn-danger">Volver <i class="fa fa-arrow-left"></i></a>
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
