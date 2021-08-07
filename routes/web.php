<?php

use App\Http\Controllers\ClienteswebController;
use App\Http\Controllers\ViajeswebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clientes', [ClienteswebController::class, 'index']);
Route::get('/clientes/{cliente}', [ClienteswebController::class, 'show']);
Route::get('/clientes/eliminar/{email}', [ClienteswebController::class, 'destroy']);
Route::get('/viajes', [ViajeswebController::class, 'index']);
Route::get('/viajes/{email}', [ViajeswebController::class, 'show']);

