@extends('adminlte::page')

@section('title', 'Categorias | Ver')

@section('content_header')
    <div>
        <h1>Ver Categoría</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p>ID: {{ $categoria->id }}</p>
            <p>Nombre del cargo: {{ $categoria->nombre }}</p>

            <a href="{{ url('admin/categoria') }}" class="btn btn-danger">Volver <i class="fa fa-arrow-left"></i></a>
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
