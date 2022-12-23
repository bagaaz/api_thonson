<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use App\Interfaces\ComentarioRepositoryInterface;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    private ComentarioRepositoryInterface $comentarioRepository;

    public function __construct(ComentarioRepositoryInterface $comentarioRepository)
    {
        $this->comentarioRepository = $comentarioRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => $this->comentarioRepository->getComentarios()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreComentarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentarioRequest $request)
    {
        $comentario = $this->comentarioRepository->createComentario($request->validationData());

        return response()->json([
            'data' => $comentario
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario, int $idComentario)
    {
        return response()->json([
            'data' => $this->comentarioRepository->getComentario($idComentario)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComentarioRequest  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario, int $idComentario)
    {
        $comentario = $this->comentarioRepository->updateComentario($request->validationData(), $idComentario);

        return response()->json([
            'data' => $comentario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario, int $idComentario)
    {
        $this->comentarioRepository->deleteComentario($idComentario);

        return response()->json([
            'data' => 'Comentário excluído com sucesso!'
        ]);
    }
}
