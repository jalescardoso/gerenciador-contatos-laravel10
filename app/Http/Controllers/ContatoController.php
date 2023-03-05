<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use App\Models\Contato;

class ContatoController extends Controller {
    public function store(ContatoRequest $request) {
        $contato = new Contato($request->all());
        $contato->save();
        return redirect()->route('pessoa.edit', [
            'id' => $contato->id_pessoa,
        ])->with('success', 'Categoria registrada com sucesso!');
    }
}
