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
     * @param  \App\Http\Requests\StoreComentarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentarioRequest $request)
    {
        $comentario = $this->comentarioRepository->createComentario($request->validated());

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
    public function show(Comentario $comentario)
    {
        $comentario = $this->comentarioRepository->getComentario($comentario->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComentarioRequest  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        $comentario = $this->comentarioRepository->updateComentario($comentario->id, $request->validated());

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
    public function destroy(Comentario $comentario)
    {
        $this->comentarioRepository->deleteComentario($comentario->id);

        return response()->json([
            'data' => 'Comentario eliminado correctamente'
        ]);
    }
}
