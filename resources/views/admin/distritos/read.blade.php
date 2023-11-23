@extends('adminlte::page')

@section('title', 'Distritos | Ver')

@section('content_header')
    <div>
        <h1>Ver Distrito</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p>ID: {{ $distritos->id }}</p>
            <p>Nombre del distrito: {{ $distritos->nombre_distrito }}</p>

            <a href="{{ url('admin/distrito') }}" class="btn btn-danger">Volver</a>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
