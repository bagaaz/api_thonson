<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Interfaces\ChamadoRepositoryInterface;
use App\Interfaces\ComentarioRepositoryInterface;
use App\Interfaces\UsuarioRepositoryInterface;
use App\Models\Chamado;

class ChamadoRepository implements ChamadoRepositoryInterface
{

    private UsuarioRepositoryInterface $usuarioRepository;
    private ComentarioRepositoryInterface $comentarioRepository;

    public function __construct(UsuarioRepositoryInterface $usuarioRepository, ComentarioRepositoryInterface $comentarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        $this->comentarioRepository = $comentarioRepository;
    }

    public function getChamados()
    {
        $consultaChamados = Chamado::all();

        $chamados = $consultaChamados->collect()->map(function ($chamado) {
            return [
                'id' => $chamado->id,
                'titulo' => $chamado->titulo,
                'descricao' => $chamado->descricao,
                'os' => $chamado->os,
                'mnemonico_shift' => strtoupper($chamado->mnemonico_shift),
                'mnemonico_apoio' => strtoupper($chamado->mnemonico_apoio),
                'prioridade' => Helper::getPrioridade($chamado->prioridade_id),
                'status' => Helper::getStatus($chamado->status_id),
                'created_at' => Helper::formataDataHora($chamado->created_at),
                'imagem' => $chamado->imagem,
                'usuario' => $this->usuarioRepository->getUsuario($chamado->usuario_id),
                'comentarios' => $this->comentarioRepository->getComentariosByChamado($chamado->id)
            ];
        });

        return $chamados;
    }

    public function getChamado($id)
    {
        $consultaChamado = Chamado::find($id);

        $chamado = [
            'id' => $consultaChamado->id,
            'titulo' => $consultaChamado->titulo,
            'descricao' => $consultaChamado->descricao,
            'os' => $consultaChamado->os,
            'mnemonico_shift' => strtoupper($consultaChamado->mnemonico_shift),
            'mnemonico_apoio' => strtoupper($consultaChamado->mnemonico_apoio),
            'prioridade' => Helper::getPrioridade($consultaChamado->prioridade_id),
            'status' => Helper::getStatus($consultaChamado->status_id),
            'created_at' => Helper::formataDataHora($consultaChamado->created_at),
            'imagem' => $consultaChamado->imagem,
            'usuario' => $this->usuarioRepository->getUsuario($consultaChamado->usuario_id),
            'comentarios' => $this->comentarioRepository->getComentariosByChamado($consultaChamado->id)
        ];

        return $chamado;
    }

    public function createChamado($data)
    {
        return Chamado::create($data);
    }

    public function updateChamado($data, $id)
    {
        $chamado = Chamado::find($id);
        $chamado->update($data);
        return $chamado;
    }

    public function deleteChamado($id)
    {
        $chamado = Chamado::find($id);
        $chamado->delete();
        return $chamado;
    }
}
