<?php

namespace App\Repositories;

use App\Interfaces\UsuarioRepositoryInterface;
use App\Models\Usuario;
use App\Helpers\Helper;

class UsuarioRepository implements UsuarioRepositoryInterface
{
    public function getUsuarios()
    {
        $consultaUsuarios = Usuario::all();

        $usuarios = $consultaUsuarios->collect()->map(function ($usuario) {
            return [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'sobrenome' => $usuario->sobrenome,
                'data_nascimento' => Helper::formataData($usuario->data_nascimento),
                'telefone' => Helper::formataTelefone($usuario->telefone),
                'cpf' => Helper::formataCPF($usuario->cpf),
                'email' => $usuario->email,
                'foto' => $usuario->foto,
            ];
        });

        return $usuarios;
    }

    public function getUsuario($id)
    {
        $consultaUsuario = Usuario::find($id);

        $usuario = [
            'id' => $consultaUsuario->id,
            'nome' => $consultaUsuario->nome,
            'sobrenome' => $consultaUsuario->sobrenome,
            'data_nascimento' => Helper::formataData($consultaUsuario->data_nascimento),
            'telefone' => Helper::formataTelefone($consultaUsuario->telefone),
            'cpf' => Helper::formataCPF($consultaUsuario->cpf),
            'email' => $consultaUsuario->email,
            'foto' => $consultaUsuario->foto,
        ];

        return $usuario;
    }

    public function getNomeUsuario($id)
    {
        $consultaUsuario = Usuario::find($id);

        $usuario = $consultaUsuario->nome . ' ' . $consultaUsuario->sobrenome;

        return $usuario;
    }

    public function createUsuario($data)
    {
        return Usuario::create($data);
    }

    public function updateUsuario($data, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->update($data);
        return $usuario;
    }

    public function deleteUsuario($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return $usuario;
    }
}
