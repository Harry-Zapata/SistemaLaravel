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

Route::get('', [principalController::class, 'index']);
Route::get('/admin', [principalController::class, 'index']);
Route::prefix('/admin/cargo')->group(function () {
    Route::get('', [cargoController::class, 'index']);
    Route::get('/create', [cargoController::class, 'create']);
    Route::post('/insert', [cargoController::class, 'store']);
    Route::get('/read/{id}', [cargoController::class, 'show']);
    Route::get('/edit/{id}', [cargoController::class, 'edit']);
    Route::post('/update/{id}', [cargoController::class, 'update']);
    Route::get('/delete/{id}', [cargoController::class, 'destroy']);
});
Route::prefix('/admin/distrito')->group(function () {
    Route::get('', [distritoController::class, 'index']);
    Route::get('/create', [distritoController::class, 'create']);
    Route::post('/insert', [distritoController::class, 'store']);
    Route::get('/read/{id}', [distritoController::class, 'show']);
    Route::get('/edit/{id}', [distritoController::class, 'edit']);
    Route::post('/update/{id}', [distritoController::class, 'update']);
    Route::get('/delete/{id}', [distritoController::class, 'destroy']);
});
Route::prefix('/admin/empleado')->group(function () {
    Route::get('', [empleadoController::class, 'index']);
});
Route::prefix('/admin/cliente')->group(function () {
    Route::get('', [clienteController::class, 'index']);
});
Route::prefix('/admin/producto')->group(function () {
    Route::get('', [productoController::class, 'index']);
});
Route::prefix('/admin/categoria')->group(function () {
    Route::get('', [categoriaController::class, 'index']);
});
