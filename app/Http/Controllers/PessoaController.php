<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pessoa;
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
        return View::make('pessoas.edit')
            ->with('pessoa', $pessoa);
    }

    public function store(PessoaRequest $request) {
        $pessoa = new Pessoa($request->all());
        $pessoa->save();
        return redirect()->route('pessoa.edit', [
            'id' => $pessoa->id,
        ])->with('success', 'Categoria registrada com sucesso!');
    }
    public function update(PessoaRequest $request, Pessoa $jales) {
        //
    }
}
