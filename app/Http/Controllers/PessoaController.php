<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Pessoa, Contato};
use View;
use App\Http\Requests\{PessoaRequest};
use Illuminate\Support\Facades\DB;
class PessoaController extends Controller {
    public function index() {
        $pessoas = Pessoa::all();
        return View::make('pessoas.index')
            ->with('pessoas', $pessoas);
    }
    public function edit(Request $request) {
        $pessoa = Pessoa::find($request->id);
        // $contatos = Contato::where('id_pessoa', '=', $pessoa->id)->get();
        $contatos = $pessoa->Contatos();
        return View::make('pessoas.edit')
            ->with('pessoa', $pessoa)
            ->with('contatos', $contatos);
    }

    public function store(PessoaRequest $request) {
        $pessoa = new Pessoa($request->all());
        $pessoa->save();
        return redirect()->route('pessoa.edit', [
            'id' => $pessoa->id,
        ])->with('success', 'Categoria registrada com sucesso!');
    }
    public function update(PessoaRequest $request) {
        $pessoa =  Pessoa::find($request->id);
        $pessoa->fill($request->all());
        $pessoa->save();
        return redirect()->route('pessoa.edit', [
            'id' => $pessoa->id,
        ])->with('success', 'Categoria registrada com sucesso!');
    }
}
