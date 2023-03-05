<?php

namespace App\Models;
use App\Models\Contato;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome'
    ];

    public function contatos()
    {
        return $this->hasMany(Contato::class, 'id_pessoa');
    }
}
