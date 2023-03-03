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

Route::get('/', [PessoaController::class, 'index'])->name('pessoa.index');
Route::get('/pessoa', [PessoaController::class, 'edit'])->name('pessoa.create');
Route::get('/pessoa/{id}', [PessoaController::class, 'edit'])->name('pessoa.edit');


Route::get('/suportes-balanceados', [SuporteBalanceadosController::class, 'index'])->name('suportes.index');
Route::post('/suportes-balanceados', [SuporteBalanceadosController::class, 'check'])->name('suportes.check');
