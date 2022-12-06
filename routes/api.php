<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\FacturaController;

Route::middleware('auth:sanctum')->group(function(){

});

//Proyecto final

//Cliente
Route::get('/clientes',[ClienteController::class, 'index']);
Route::get('/clientes/{idCliente}',[ClienteController::class, 'show']);
Route::post('/clientes',[ClienteController::class, 'store']);
//Route::put('/clientes/{idCliente}',[ClienteController::class, 'update']);
Route::put('/clientes/{idCliente}',[ClienteController::class, 'update']);
Route::delete('/clientes/{idCliente}',[ClienteController::class, 'destroy']);

//Factura
Route::get('/facturas',[FacturaController::class, 'index']);
Route::get('/facturas/{idFactura}',[FacturaController::class, 'show']);
Route::post('/facturas',[FacturaController::class, 'store']);
Route::put('/facturas/{idFactura}',[FacturaController::class, 'update']);
Route::delete('/facturas/{idFactura}',[FacturaController::class, 'destroy']);

//Detalle
Route::get('/detalles',[DetalleController::class, 'index']);
Route::get('/detalles/{idDetalle}',[DetalleController::class, 'show']);
Route::post('/detalles',[DetalleController::class, 'store']);
Route::put('/detalles/{idDetalle}',[DetalleController::class, 'update']);
Route::delete('/detalles/{idDetalle}',[DetalleController::class, 'destroy']);

//Login

Route::post('/login',[LoginController::class, 'login']);
