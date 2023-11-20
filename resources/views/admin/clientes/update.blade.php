@extends('adminlte::page')

@section('title', 'Clientes | Actualizar')

@section('content_header')
    <div>
        <h1>Editar Cliente</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/cliente/update/'.$cliente->id.'') }}" method="POST">
                @csrf
                <x-adminlte-input name="nombres" value="{{$cliente->nombres}}" label="Nombre del cliente" type="text" placeholder="Nombre"/>
                <x-adminlte-input name="apellidos" value="{{$cliente->apellidos}}" label="Apellidos del cliente" type="text" placeholder="Apellidos"/>
                <x-adminlte-input name="direccion" value="{{$cliente->direccion}}" label="Direccion" type="text" placeholder="Direccion"/>
                <x-adminlte-input name="telefono" value="{{$cliente->telefono}}" label="Telefono" type="text" placeholder="Telefono"/>
                <x-adminlte-input name="email" value="{{$cliente->email}}" label="Email" type="text" placeholder="Email"/>
                <x-adminlte-select2 name="id_distrito" label="Distrito" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($distrito as $distritos)
                        <option value="{{ $distritos->id }}" @if($distritos->id == $cliente->id_distrito) selected @endif>{{ $distritos->nombre_distrito }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary"/>
                <a href="{{ url('admin/cliente') }}" class="btn btn-flat btn-danger">Cancelar <i class="fas fa-times"></i></a>
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
