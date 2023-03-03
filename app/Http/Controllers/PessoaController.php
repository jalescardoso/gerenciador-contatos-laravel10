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

    public function edit(Request $request) {
        $pessoa = Pessoa::find($request->id);
        return View::make('pessoas.edit')
            ->with('pessoa', $pessoa);
    }

}
