@extends('adminlte::page')

@section('title', 'Empleados | Crear')

@section('content_header')
    <div>
        <h1>Crear Empleado</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/empleado/insert') }}" method="POST">
                @csrf
                <x-adminlte-input name="nombres" label="Nombres" type="text" placeholder="Nombre del empleado" />

                <x-adminlte-input name="apellidos" label="Apellidos" type="text" placeholder="Apellido del empleado" />

                <x-adminlte-input name="dni_empleado" label="DNI" type="text" placeholder="DNI del empleado" />

                <x-adminlte-input name="direccion" label="Direccion" type="text" placeholder="Direccion del empleado" />

                {{-- <x-adminlte-input name="estado_civil" label="Estado Civil" type="text"
                    placeholder="Estado Civil del empleado" /> --}}
                <x-adminlte-select2 name="estado_civil" label="Estado Civil" igroup-size="lg" data-placeholder="Select an option...">
                    <option />
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viudo">Viudo</option>
                </x-adminlte-select2>
                {{-- <x-adminlte-input name="nivel_educacion" label="Educacion" type="text"
                    placeholder="Educacion del empleado" /> --}}
                <x-adminlte-select2 name="nivel_educacion" label="Educacion" igroup-size="lg" data-placeholder="Select an option...">
                    <option />
                    <option value="Preescolar">Inicial</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Superior">Superior Tecnica</option>
                    <option value="Universitario">Universitario</option>
                    <option value="Posgrado">Posgrado</option>
                    <option value="Doctorado">Doctorado</option>
                </x-adminlte-select2>
                <x-adminlte-input name="telefono" label="Telefono" type="tel" placeholder="Telefono del empleado" />

                <x-adminlte-input name="email" label="Email" type="mail" placeholder="Email del empleado" />
                <x-adminlte-input name="sueldo_basico" label="Sueldo" type="number" placeholder="Sueldo del empleado" />

                {{-- With Label --}}
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                <x-adminlte-input-date name="fecha_ingreso" :config="$config" placeholder="Choose a date..."
                    label="Datetime" />

                <x-adminlte-select2 name="id_distrito" label="Distrito" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($distrito as $distritos)
                        <option value="{{ $distritos->id }}">{{ $distritos->nombre_distrito }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 name="cod_cargo" label="Cargo" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($cargo as $cargos)
                        <option value="{{ $cargos->id }}">{{ $cargos->nombre_cargo }}</option>
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
