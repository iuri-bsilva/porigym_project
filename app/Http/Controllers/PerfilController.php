<?php

namespace App\Http\Controllers;

use App\Http\Repository\PerfilRepository;
use App\Http\Requests\Perfil\PerfilPostRequest;
use App\Http\Requests\Perfil\PerfilPutRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    private $perfilRepository;

    public function __construct()
    {
        $this->perfilRepository = new PerfilRepository;
    }

    public function store(PerfilPostRequest $request)
    {
        try {

            $perfil = $this->perfilRepository->create($request->all());
            return [
                'sucesso' => true,
                'dado' => $perfil
            ];

        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }
    public function update($id, PerfilPutRequest $request)
    {
        try {
            $perfil = $this->perfilRepository->getPerfilById($id);
            if(!$perfil) throw new \Exception("Perfil não cadastrado", 404);

            DB::transaction(function () use ($perfil, $request) {
                $perfil->update($request->validated());
            });

            return [
                'sucesso' => true,
                'dado' => $perfil
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function index()
    {
        try {
            return $this->perfilRepository->getAllPerfis();
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function show($id)
    {
        try {
            return $this->perfilRepository->getPerfilById($id);
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function delete($id)
    {
        try {
            $perfil = $this->perfilRepository->getPerfilById($id);
            if(!$perfil) throw new \Exception("Usuário não cadastrado", 404);

            DB::transaction(function() use($perfil) {
                $perfil->delete();
            });

            return [
                'sucesso' => true,
                'resposta' => 'perfil deletado com sucesso.'
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

}
