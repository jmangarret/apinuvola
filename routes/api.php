<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ViajesController;
use Illuminate\Support\Facades\Route;

Route::get('clientes/name', [ClientesController::class, 'filterByName']);
Route::get('clientes/email', [ClientesController::class, 'filterByEmail']);
Route::get('clientes/telf', [ClientesController::class, 'filterByTelf']);
Route::resource('clientes', ClientesController::class);
Route::resource('viajes', ViajesController::class);
