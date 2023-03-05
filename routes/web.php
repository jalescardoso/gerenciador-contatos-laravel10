<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PessoaController, SuporteBalanceadosController, ContatoController};
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
Route::post('/pessoa', [PessoaController::class, 'store'])->name('pessoa.store');
Route::put('/pessoa/{id}', [PessoaController::class, 'update'])->name('pessoa.update');
Route::delete('/pessoa/{id}', [PessoaController::class, 'destroy'])->name('pessoa.delete');

Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');
Route::put('/contato', [ContatoController::class, 'update'])->name('contato.update');
Route::get('/contato', [ContatoController::class, 'edit'])->name('contato.edit');
Route::put('/contato/{id}', [ContatoController::class, 'update'])->name('contato.update');
Route::delete('/contato/{id}', [ContatoController::class, 'destroy'])->name('contato.delete');

Route::get('/suportes-balanceados', [SuporteBalanceadosController::class, 'index'])->name('suportes.index');
Route::post('/suportes-balanceados', [SuporteBalanceadosController::class, 'check'])->name('suportes.check');
