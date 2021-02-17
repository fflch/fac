<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\ConveniadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('main');
});

# login
Route::get('login', [LoginController::class, 'redirectToProvider']);
Route::post('logout', [LoginController::class, 'logout']);
Route::get('callback', [LoginController::class, 'handleProviderCallback']);

#Rotas Associado 
Route::resource('/associados', AssociadoController::class);

#Rotas Conveniado
Route::resource('/conveniados', ConveniadoController::class);

#Rotas Vendas
Route::resource('/vendas', VendaController::class);

#Relatórios
Route::get('/relatorios/conveniados/{conveniado}', [RelatorioController::class, 'conveniados']);
Route::get('/relatorios/associados/{associado}', [RelatorioController::class, 'associados']);
