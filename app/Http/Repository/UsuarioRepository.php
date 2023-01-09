<?php

namespace App\Http\Repository;

use App\Models\Usuario;

class UsuarioRepository {

    public function getAllUsuarios()
    {
        return Usuario::all();
    }

    public function getUsuarioById($id)
    {
        return Usuario::where('id', $id)->first();
    }

    public function add($dados)
    {
        return Usuario::create($dados);
    }
}
