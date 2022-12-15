<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChamadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoRequest $request)
    {
        $chamado = $this->chamadoRepository->createChamado($request->validated());

        return response()->json([
            'data' => $chamado
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        $chamado = $this->chamadoRepository->getChamado($chamado->id);

        return response()->json([
            'data' => $chamado
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChamadoRequest  $request
     * @param  \App\Models\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoRequest $request, Chamado $chamado)
    {
        $chamado = $this->chamadoRepository->updateChamado($chamado->id, $request->validated());

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
    public function destroy(Chamado $chamado)
    {
        $this->chamadoRepository->deleteChamado($chamado->id);

        return response()->json([
            'data' => 'Chamado deletado com sucesso!'
        ]);
    }
}
