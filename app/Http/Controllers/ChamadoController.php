<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Interfaces\ChamadoRepositoryInterface;
use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use App\Models\Chamado;

class ChamadoController extends Controller
{
    private ChamadoRepositoryInterface $chamadoRepository;

    public function __construct(ChamadoRepositoryInterface $chamadoRepository)
    {
        $this->chamadoRepository = $chamadoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => $this->chamadoRepository->getChamados()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChamadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoRequest $request)
    {
        try {
            $chamado = $this->chamadoRepository->createChamado($request->validationData());

            return response()->json([
                'message' => 'Chamado criado com sucesso',
                'data' => $chamado
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar chamado',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado, int $idChamado)
    {
        $chamado = $this->chamadoRepository->getChamado($idChamado);

        return response()->json([
            'data' => $chamado
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChamadoRequest  $request
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoRequest $request, Chamado $chamado, int $idChamado)
    {
        $chamado = $this->chamadoRepository->updateChamado($request->validationData(), $idChamado);

        return response()->json([
            'data' => $chamado
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamado $chamado, int $idChamado)
    {
        $this->chamadoRepository->deleteChamado($idChamado);

        return response()->json([
            'data' => 'Chamado deletado com sucesso!'
        ]);
    }
}
