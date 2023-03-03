<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use View;

class PessoaController extends Controller {

    public function index() {
        $pessoas = Pessoa::all();
        return View::make('pessoas.index')
            ->with('pessoas', $pessoas);
    }

    public function create() {
        return View::make('pessoas.edit');
    }

    public function edit(string $id) {
        return View::make('pessoas.edit');
    }
}
