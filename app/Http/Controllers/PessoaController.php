<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Pessoa, Contato};
use View;
use App\Http\Requests\{PessoaRequest};

class PessoaController extends Controller {
    public function index() {
        $pessoas = Pessoa::all();
        return View::make('pessoas.index')
            ->with('pessoas', $pessoas);
    }
    public function edit(Request $request) {
        $pessoa = Pessoa::find($request->id);
        return View::make('pessoas.edit')
            ->with('pessoa', ($pessoa ?? new Pessoa()));
    }
    public function store(PessoaRequest $request) {
        $pessoa = new Pessoa($request->all());
        $pessoa->save();
        return redirect()->route('pessoa.edit', [
            'id' => $pessoa->id,
        ])->with('success', 'Pessoa registrada com sucesso!');
    }
    public function update(PessoaRequest $request) {
        $pessoa =  Pessoa::find($request->id);
        $pessoa->fill($request->all());
        $pessoa->save();
        return redirect()->route('pessoa.edit', [
            'id' => $pessoa->id,
        ])->with('success', 'Pessoa alterada com sucesso!');
    }
    public function destroy(Request $request) {
        $pessoa =  Pessoa::find($request->id);
        $status = $pessoa->delete();
        return redirect()->route('pessoa.index')->with('success', 'Pessoa apagada com sucesso!');
    }
}