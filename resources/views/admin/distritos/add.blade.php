@extends('adminlte::page')

@section('title', 'distritos | Crear')

@section('content_header')
    <div>
        <h1>Crear distrito</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/distrito/insert') }}" method="POST">
                @csrf
                <x-adminlte-input name="nombre_distrito" label="Nombre del distrito" type="text" placeholder="Nombre del distrito"/>

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary"/>
                <x-adminlte-button class="btn-flat" href="{{ url('admin/distrito') }}" label="Cancelar" theme="danger" />
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
