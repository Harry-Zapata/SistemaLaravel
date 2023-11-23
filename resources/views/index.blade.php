@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- Cards de informacion --}}
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{count($cliente)}}</h3>
                    <span>Clientes</span>
                </div>
                <div class="icon">
                    <i class="fas fa-user-secret"></i>
                </div>
                <span class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></span>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{count($empleado)}}</h3>
                    <span>Empleados</span>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <span class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></span>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{count($boletas)}}</h3>
                    <span>Ventas</span>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <span class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></span>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')

@stop
