<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\ConveniadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\RelatorioController;


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
    return view('main');
});

#Rotas Associado 
Route::resource('/associados', AssociadoController::class);

#Rotas Conveniado
Route::resource('/conveniados', ConveniadoController::class);

#Rotas Vendas
Route::resource('/vendas', VendaController::class);

#Relatórios
Route::get('/relatorios/conveniados/{conveniado}', [RelatorioController::class, 'conveniados']);
Route::get('/relatorios/associados/{associado}', [RelatorioController::class, 'associados']);
