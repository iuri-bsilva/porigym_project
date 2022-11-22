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
        "id_perfil",
        "id_academia",
        "ativo"
    ];

    use HasFactory;
}
