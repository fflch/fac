<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\ConveniadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ParcelaVendaController;


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

#Rotas Parcelas Venda
Route::resource('/parcelas', ParcelaVendaController::class);
