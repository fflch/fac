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
Route::get('localLogin', [LoginController::class, 'localLogin']);

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
Route::get('/relatorios/conveniados/pdf/{conveniado_id}', [RelatorioController::class, 'conveniadoPdf']);
Route::get('/relatorios/parcelas/pdf', [IndexController::class, 'parcelasPdf']);
Route::get('/relatorios/associados/pdf/{associado_id}', [RelatorioController::class, 'associadoPdf']);


// Logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('can:admin');
