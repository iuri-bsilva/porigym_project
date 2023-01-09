<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        "id_usuario",
        "telefone"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    use HasFactory;
}
