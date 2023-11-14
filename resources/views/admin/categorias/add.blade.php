@extends('adminlte::page')

@section('title', 'Categorias | Crear')

@section('content_header')
    <div>
        <h1>Crear Categoría</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/categoria/insert') }}" method="POST">
                @csrf
                <x-adminlte-input name="nombre" label="Nombre de la categoría" type="text" placeholder="Nombre de la categoría"/>

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary"/>
                <a href="{{ url('admin/categoria') }}" class="btn btn-flat btn-danger">Cancelar <i class="fas fa-times"></i></a>
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
