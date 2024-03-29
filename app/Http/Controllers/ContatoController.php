<?php

namespace App\Http\Controllers;

use App\Http\Repository\ContatoRepository;
use App\Http\Requests\Contato\ContatoPutRequest;
use App\Http\Requests\Contato\ContatoPostRequest;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
    private $contatoRepository;

    public function __construct()
    {
        $this->contatoRepository = new ContatoRepository;
    }

    public function index($usuarioId)
    {
        try {
            return $this->contatoRepository->getContatosByUsuarioId($usuarioId)->map(function($contato) {
                    return [
                        'id' => $contato->id,
                        'telefone' => $contato->telefone,
                        'id_usuario' => $contato->id_usuario
                    ];
                });
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function store(ContatoPostRequest $request)
    {
        try {
            $contato = DB::transaction(function() use($request){
                return $this->contatoRepository->add($request->validated());
            });

            return [
                'sucesso' => true,
                'dados' => [
                    'telefone' => $contato->telefone,
                    'id_usuario' => $contato->id_usuario
                ]
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function update(ContatoPutRequest $request, $id)
    {
        try {
            $contato = $this->contatoRepository->getContatoById($id);

            if(!$contato) throw new \Exception("Contato não cadastrado", 404);
            DB::transaction(function () use ($contato, $request){
                $contato->update($request->validated());
            });

            return [
                'sucesso' => true,
                'dados' => [
                    'telefone' => $contato->telefone,
                    'id_usuario' => $contato->id_usuario
                ]
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }

    public function delete($id)
    {
        try {
            $contato = $this->contatoRepository->getContatoById($id);
            if(!$contato) throw new \Exception("Contato não cadastrado", 404);

            DB::transaction(function () use ($contato){
                $contato->delete();
            });

            return [
                'sucesso' => true
            ];
        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }
}
