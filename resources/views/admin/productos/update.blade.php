@extends('adminlte::page')

@section('title', 'Productos | Editar')

@section('content_header')
    <div>
        <h1>Editar Producto</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/producto/update/'.$producto->id.'') }}" method="POST">
                @csrf
                <x-adminlte-input name="descripcion" value="{{$producto->descripcion}}" label="Descripcion del producto" type="text" placeholder="Descripcion del Producto"/>
                <x-adminlte-input name="precio_venta" value="{{$producto->precio_venta}}" label="Precio Venta" type="text" placeholder="Precio Venta"/>
                <x-adminlte-input name="stock_minimo" value="{{$producto->stock_minimo}}" label="Stock Minimo" type="text" placeholder="Stock Minimo"/>
                <x-adminlte-input name="stock_actual" value="{{$producto->stock_actual}}" label="Stock Actual" type="text" placeholder="Stock Actual"/>
                <x-adminlte-select2 name="cod_categoria" label="Categoria" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <option />
                    @foreach ($categoria as $categorias)
                        <option value="{{ $categorias->id }}" @if($categorias->id == $producto->cod_categoria) selected @endif>{{ $categorias->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>

                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="primary"/>
                <x-adminlte-button class="btn-flat" href="{{ url('admin/distrito') }}" label="Cancelar" theme="danger" />
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
