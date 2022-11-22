<?php

namespace App\Http\Controllers;

use App\Http\Repository\AcademiaRepository;
use App\Http\Requests\Academia\AcademiaPostRequest;
use Illuminate\Http\Request;

class AcademiaController extends Controller
{

    private $academiaRepository;

    public function __construct()
    {
        $this->academiaRepository = new AcademiaRepository;
    }

    public function store(AcademiaPostRequest $request)
    {
        try {

            $academia = $this->academiaRepository->addAcademia($request->all());
            return [
                'sucesso' => true,
                'dado' => $academia
            ];

        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }
    public function update($id, AcademiaPostRequest $request)
    {
        try {
            $academia = $this->academiaRepository->encontraAcademia($id);
            if(!$academia) throw new \Exception("Academia não cadastrada", 404);
            $this->academiaRepository->updateAcademia($academia, $request->all());
            return [
                'sucesso' => true,
                'dado' => $academia
            ];

        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }
    public function encontraAcademias()
    {
        return $this->academiaRepository->encontraTodasAcademias();
    }
    public function delete($id)
    {
        try {
            $academia = $this->academiaRepository->encontraAcademia($id);
            if(!$academia) throw new \Exception("Academia não cadastrada", 404);
            $this->academiaRepository->deleteAcademia($academia);
            return [
                'sucesso' => true,
                'dado' => $academia
            ];

        } catch (\Throwable $th) {
            return ['messages' => $th->getMessage()];
        }
    }
}
