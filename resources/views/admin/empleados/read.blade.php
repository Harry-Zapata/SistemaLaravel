@extends('adminlte::page')

@section('title', 'Empleados | Ver')

@section('content_header')
    <div>
        <h1>Ver Empleado</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p>nombres: {{$empleado->nombres}}</p>
            <p>apellidos: {{$empleado->apellidos}}</p>
            <p>dni_empleado: {{$empleado->dni_empleado}}</p>
            <p>direccion: {{$empleado->direccion}}</p>
            <p>estado_civil: {{$empleado->estado_civil}}</p>
            <p>nivel_educacion: {{$empleado->nivel_educacion}}</p>
            <p>telefono: {{$empleado->telefono}}</p>
            <p>email: {{$empleado->email}}</p>
            <p>sueldo_basico: {{$empleado->sueldo_basico}}</p>
            <p>fecha_ingreso: {{$empleado->fecha_ingreso}}</p>
            <p>id_distrito: {{$distrito->find($empleado->id_distrito)->nombre_distrito}}</p>
            <p>cod_cargo: {{$cargo->find($empleado->cod_cargo)->nombre_cargo}}</p>

            <a href="{{ url('admin/empleado') }}" class="btn btn-danger">Volver <i class="fa fa-arrow-left"></i></a>
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
