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
Route::get('loginType', [LoginController::class, 'loginType']);
Route::get('redirectToProvider', [LoginController::class, 'redirectToProvider']);
Route::get('login', [LoginController::class, 'handleProviderCallback']);
Route::get('callback', [LoginController::class, 'handleProviderCallback']);
Route::get('localLogin', [LoginController::class, 'localLogin']);
Route::post('logout', [LoginController::class, 'logout']);

#Rotas Associado 
Route::resource('/associados', AssociadoController::class);

#Rotas Conveniado
Route::resource('/conveniados', ConveniadoController::class);

#Rotas Vendas
Route::resource('/vendas', VendaController::class);

#Relatórios
Route::get('/relatorios/conveniados/{conveniado}', [RelatorioController::class, 'conveniados']);
Route::get('/relatorios/associados/{associado}', [RelatorioController::class, 'associados']);
