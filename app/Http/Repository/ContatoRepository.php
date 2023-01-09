<?php

namespace App\Http\Repository;

use App\Models\Contato;

class ContatoRepository {

    public function getAllContatos()
    {
        return Contato::all();
    }

    public function getContatoById($id)
    {
        return Contato::where('id', $id)->first();
    }

    public function add($dados)
    {
        return Contato::create($dados);
    }

    public function getContatosByUsuarioId($usuarioId)
    {
        return Contato::where('id_usuario', $usuarioId)->get();
    }
}
