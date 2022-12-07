<?php

namespace App\Interfaces;

interface UsuarioRepositoryInterface
{
    public function getUsuarios();
    public function getUsuario($id);
    public function getNomeUsuario($id);
    public function createUsuario($data);
    public function updateUsuario($data, $id);
    public function deleteUsuario($id);
}
