<?php

use App\Http\Controllers\cargoController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\distritoController;
use App\Http\Controllers\empleadoController;
use App\Http\Controllers\principalController;
use App\Http\Controllers\productoController;
use App\Models\categoria;
use Illuminate\Support\Facades\Route;

Route::get('',[principalController::class,'index']);
Route::get('/admin',[principalController::class,'index']);
Route::prefix('/admin')->group(function(){
    Route::prefix('cargo')->group(function(){
        Route::get('',[cargoController::class,'index']);
    });
    Route::prefix('distrito')->group(function(){
        Route::get('',[distritoController::class,'index']);
    });
    Route::prefix('empleado')->group(function(){
        Route::get('',[empleadoController::class,'index']);
    });
    Route::prefix('cliente')->group(function(){
        Route::get('',[clienteController::class,'index']);
    });
    Route::prefix('producto')->group(function(){
        Route::get('',[productoController::class,'index']);
    });
    Route::prefix('categoria')->group(function(){
        Route::get('',[categoriaController::class,'index']);
    });
});
