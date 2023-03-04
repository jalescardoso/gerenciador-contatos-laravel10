<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use App\Models\Contato;

class ContatoController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ContatoRequest $request) {
        $contato = new Contato($request->all());
        $contato->save();
        return redirect()->route('pessoa.edit', [
            'id' => $contato->id_pessoa,
        ])->with('success', 'Categoria registrada com sucesso!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Contato $contato) {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contato $contato) {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ContatoRequest $request, Contato $contato) {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato) {
        //
    }
}
