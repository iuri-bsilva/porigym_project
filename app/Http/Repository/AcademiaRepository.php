<?php

namespace App\Http\Repository;

use App\Models\Academia;

class AcademiaRepository {

    public function addAcademia($dados)
    {
        return Academia::create($dados);
    }
    public function encontraAcademia($id)
    {
        return Academia::find($id);
    }
    public function updateAcademia($academia, $dados)
    {
        return $academia->update($dados);
    }
    public function encontraTodasAcademias()
    {
        return Academia::all();
    }
    public function deleteAcademia($academia)
    {
        return $academia->delete();
    }

}
