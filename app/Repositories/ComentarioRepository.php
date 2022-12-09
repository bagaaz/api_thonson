<?php

namespace App\Repositories;

use App\Interfaces\ComentarioRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Comentario;

class ComentarioRepository implements ComentarioRepositoryInterface
{
    private UserRepositoryInterface $usuarioRepository;

    public function __construct(UserRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getComentarios()
    {
        $consultaComentarios = Comentario::all();

        $comentarios = $consultaComentarios->collect()->map(function ($comentario) {
            return [
                'id' => $comentario->id,
                'comentario' => $comentario->comentario,
                'chamado_id' => $comentario->chamado_id,
                'usuario' => $this->usuarioRepository->getNomeUsuario($comentario->usuario_id),
                'created_at' => $comentario->created_at
            ];
        });

        return $comentarios;
    }

    public function getComentario($id)
    {
        $consultaComentario = Comentario::find($id);

        $comentario = [
            'id' => $consultaComentario->id,
            'comentario' => $consultaComentario->comentario,
            'chamado_id' => $consultaComentario->chamado_id,
            'usuario' => $this->usuarioRepository->getNomeUsuario($consultaComentario->usuario_id),
            'created_at' => $consultaComentario->created_at
        ];
    }

    public function getComentariosByChamado($idChamado)
    {
        $consultaComentarios = Comentario::where('chamado_id', $idChamado)->get();

        $comentarios = $consultaComentarios->collect()->map(function ($comentario) {
            return [
                'id' => $comentario->id,
                'comentario' => $comentario->comentario,
                'chamado_id' => $comentario->chamado_id,
                'usuario' => $this->usuarioRepository->getNomeUsuario($comentario->usuario_id),
                'created_at' => $comentario->created_at
            ];
        });

        return $comentarios;
    }

    public function createComentario($data)
    {
        return Comentario::create($data);
    }

    public function updateComentario($data, $id)
    {
        $comentario = Comentario::find($id);
        $comentario->update($data);
        return $comentario;
    }

    public function deleteComentario($id)
    {
        $comentario = Comentario::find($id);
        $comentario->delete();
        return $comentario;
    }
}
