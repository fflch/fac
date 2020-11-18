<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\DependenteController;
use App\Http\Controllers\ConveniadoController;
use App\Http\Controllers\VendaController;

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

#Rotas Dependente
Route::resource('/dependentes', DependenteController::class);

#Rotas Conveniado
Route::resource('/conveniados', ConveniadoController::class);

#Rotas Vendas
Route::resource('/vendas', VendaController::class);

#Rotas parcelasvendas
Route::resource('/parcelasvendas', VendaController::class);

#Rotas lancamentos
Route::resource('/lancamentos', VendaController::class); 