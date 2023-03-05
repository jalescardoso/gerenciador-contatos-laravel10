<?php

namespace App\Models;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model {
    use HasFactory;

    protected $fillable = [
        "id",
        "descricao",
        "valor",
        "id_pessoa",
        "tipo"
    ];
}
