<?php

namespace App\Interfaces;

interface ComentarioRepositoryInterface
{
    public function getComentarios();
    public function getComentario($id);
    public function getComentariosByChamado($idChamado);
    public function createComentario($data);
    public function updateComentario($data, $id);
    public function deleteComentario($id);
}
