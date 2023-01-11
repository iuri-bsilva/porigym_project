<?php

namespace App\Http\Repository;

use App\Models\Perfil;

class PerfilRepository {

    public function getAllPerfis()
    {
        return Perfil::all();
    }

    public function getPerfilById($id)
    {
        return Perfil::where('id', $id)->first();
    }

    public function create($dados)
    {
        return Perfil::create($dados);
    }
}
