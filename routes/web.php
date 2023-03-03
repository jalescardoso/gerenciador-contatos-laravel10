<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PessoaController, SuporteBalanceadosController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/', PessoaController::class);
Route::resource('suportes-balanceados', SuporteBalanceadosController::class);

