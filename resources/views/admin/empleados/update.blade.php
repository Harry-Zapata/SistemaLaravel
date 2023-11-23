@extends('adminlte::page')

@section('title', 'Empleados | Actualizar')

@section('content_header')
    <div>
        <h1>Actualizar Empleado</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/empleado/update/'.$empleados->id.'') }}" method="POST">
                @csrf
                <x-adminlte-input name="nombres" value="{{ $empleados->nombres }}" label="Nombres" type="text" placeholder="Nombre del empleado" />

                <x-adminlte-input name="apellidos" value="{{ $empleados->apellidos }}" label="Apellidos" type="text" placeholder="Apellido del empleado" />

                <x-adminlte-input name="dni_empleado" value="{{ $empleados->dni_empleado }}" label="DNI" type="text" placeholder="DNI del empleado" />

                <x-adminlte-input name="direccion" value="{{ $empleados->direccion }}" label="Direccion" type="text" placeholder="Direccion del empleado" />
                <x-adminlte-input name="estado_civil" value="{{ $empleados->estado_civil }}" label="Estado Civil" type="text"
                    placeholder="Estado Civil del empleado" />
                <x-adminlte-input name="nivel_educacion" value="{{ $empleados->nivel_educacion }}" label="Educacion" type="text"
                    placeholder="Educacion del empleado" />
                <x-adminlte-input name="telefono" label="Telefono" value="{{ $empleados->telefono }}" type="tel" placeholder="Telefono del empleado" />

                <x-adminlte-input name="email" label="Email" value="{{ $empleados->email }}" type="mail" placeholder="Email del empleado" />
                <x-adminlte-input name="sueldo_basico" label="Sueldo" value="{{ $empleados->sueldo_basico }}" type="number" placeholder="Sueldo del empleado" />

                {{-- With Label --}}
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="fecha_ingreso" value="{{ $empleados->fecha_ingreso }}" :config="$config" placeholder="Choose a date..."
                    label="Datetime" />

                    {{-- agregar distrito por default de la base de datos --}}
                <x-adminlte-select2 name="id_distrito" label="Distrito" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($distrito as $distritos)
                        <option value="{{ $distritos->id }}"  @if($distritos->id == $empleados->id_distrito) selected @endif>{{ $distritos->nombre_distrito }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 name="cod_cargo" label="Cargo" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($cargo as $cargos)
                        <option value="{{ $cargos->id }}" @if($cargos->id == $empleados->cod_cargo) selected @endif>{{ $cargos->nombre_cargo }}</option>
                    @endforeach
                </x-adminlte-select2>

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary" />
                <a href="{{ url('admin/empleado') }}" class="btn btn-flat btn-danger">Cancelar <i
                        class="fas fa-times"></i></a>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
