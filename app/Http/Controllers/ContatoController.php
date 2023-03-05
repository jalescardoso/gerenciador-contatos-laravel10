<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;
use App\Models\Contato;
use View;

class ContatoController extends Controller {
    public function store(ContatoRequest $request) {
        $contato = new Contato($request->all());
        $contato->save();
        return redirect()->route('pessoa.edit', [
            'id' => $contato->id_pessoa,
        ])->with('success', 'Contato registrada com sucesso!');
    }
    public function edit(Request $request) {
        $contato = Contato::find($request->id);
        return response()->json($contato);
    }
    public function update(ContatoRequest $request) {
        $contato =  Contato::find($request->id);
        $contato->fill($request->all());
        $contato->save();
        return redirect()->route('pessoa.edit', ['id' => $contato->id_pessoa])->with('success', 'Contato alterado com sucesso!');
    }
    public function destroy(Request $request) {
        $contato =  Contato::find($request->id);
        $status = $contato->delete();
        return redirect()->route('pessoa.edit', ['id' => $contato->id_pessoa])->with('success', 'Contato apagado com sucesso!');
    }
}
