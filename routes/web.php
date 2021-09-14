<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ConveniadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParcelaVendaController;

// Home
Route::get('/', [IndexController::class, 'index']);

// Login
Route::get('loginType', [LoginController::class, 'loginType']);
Route::get('redirectToProvider', [LoginController::class, 'redirectToProvider']);
Route::get('login', [LoginController::class, 'handleProviderCallback']);
Route::get('callback', [LoginController::class, 'handleProviderCallback']);
Route::get('localLogin', [LoginController::class, 'localLogin']);
Route::post('logout', [LoginController::class, 'logout']);

// Rotas Associado
Route::resource('/associados', AssociadoController::class);

// Rotas Conveniado
Route::resource('/conveniados', ConveniadoController::class);

// Rotas Vendas
Route::resource('/vendas', VendaController::class);

// Atualização do status da parcela
Route::get('/parcelaVenda/baixarEmLote', [ParcelaVendaController::class, 'baixarEmLote']);
Route::patch('parcelaVenda/{parcelaVenda}', [ParcelaVendaController::class, 'update']);

// Relatórios
Route::get('/relatorios/conveniados/{conveniado_id}', [RelatorioController::class, 'conveniados']);
Route::get('/relatorios/conveniados/pdf/{conveniado_id}', [RelatorioController::class, 'pdf']);
Route::get('/relatorios/associados', [IndexController::class, 'pdf']);


// Logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('can:admin');
