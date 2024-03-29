<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        "nome",
        "email",
        "senha",
        "id_academia",
        "ativo"
    ];

    public function contato()
    {
        return $this->hasMany(Contrato::class);
    }

    use HasFactory;
}
