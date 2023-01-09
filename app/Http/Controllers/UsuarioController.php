<?php

namespace App\Http\Controllers;

use App\Http\Repository\UsuarioRepository;
use App\Http\Requests\Usuario\UsuarioPostRequest;
use App\Http\Requests\Usuario\UsuarioPutRequest;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    private $usuarioRepository;

    public function __construct()
    {
        $this->usuarioRepository = new UsuarioRepository;
    }

    public function index() {
        try {
            return $this->usuarioRepository->getAllUsuarios();
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function show($id)
    {
        try {
            return $this->usuarioRepository->getUsuarioById($id);
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function create() {
        //
    }

    public function store(UsuarioPostRequest $request) {
        try {
            $user = $this->usuarioRepository->add($request->validated());
            return [
                'sucesso' => true,
                'dado' => $user
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function edit() {
        //
    }

    public function update($id, UsuarioPutRequest $request) {
        try {
            $user = $this->usuarioRepository->getUsuarioById($id);
            if(!$user) throw new \Exception("Usuário não cadastrado", 404);

            DB::transaction(function () use ($user, $request) {
                $user->update($request->validated());
            });

            return [
                'sucesso' => true,
                'dado' => $user
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function delete($id) {
        try {
            $user = $this->usuarioRepository->getUsuarioById($id);
            if(!$user) throw new \Exception("Usuário não cadastrado", 404);

            DB::transaction(function() use($user) {
                $user->delete();
            });

            return [
                'sucesso' => true,
                'resposta' => 'Usuário deletado com sucesso.'
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }
}
