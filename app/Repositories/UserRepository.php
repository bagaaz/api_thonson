<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Helpers\Helper;

class UserRepository implements UserRepositoryInterface
{
    public function getUsuarios()
    {
        $consultaUsuarios = User::all();

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
        $consultaUsuario = User::find($id);

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
        $consultaUsuario = User::find($id);

        $usuario = $consultaUsuario->nome . ' ' . $consultaUsuario->sobrenome;

        return $usuario;
    }

    public function createUsuario($data)
    {
        return User::create($data);
    }

    public function updateUsuario($data, $id)
    {
        $usuario = User::find($id);
        $usuario->update($data);
        return $usuario;
    }

    public function deleteUsuario($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return $usuario;
    }
}
