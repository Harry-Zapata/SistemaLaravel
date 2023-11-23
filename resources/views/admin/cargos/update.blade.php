@extends('adminlte::page')

@section('title', 'Cargos | Actualizar')

@section('content_header')
    <div>
        <h1>Actualizar Cargo</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/cargo/update/'.$cargo->id.'') }}" method="POST">
                @csrf
                <x-adminlte-input name="nombre_cargo" value="{{ $cargo->nombre_cargo }}" label="Nombre del cargo" type="text" placeholder="Nombre del cargo"/>

                <x-adminlte-button class="btn-flat" type="submit" label="Editar" theme="primary"/>

                <a href="{{ url('admin/cargo') }}" class="btn btn-danger">Volver <i class="fa fa-arrow-left"></i></a>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop


