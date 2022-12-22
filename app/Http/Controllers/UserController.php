<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UserController extends Controller
{
    private UserRepositoryInterface $usuarioRepository;

    public function __construct(UserRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->usuarioRepository->getUsuarios()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $usuario = $this->usuarioRepository->createUsuario($request->validationData());

            return response()->json([
                'message' => 'Usuário criado com sucesso',
                'data' => $usuario
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar usuário',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario, int $idUsuario)
    {
        return response()->json([
            'data' => $this->usuarioRepository->getUsuario($idUsuario)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $usuario, int $idUsuario)
    {
        try {
            $usuario = $this->usuarioRepository->updateUsuario($request->validationData(), $idUsuario);

            return response()->json([
                'message' => 'Usuário atualizado com sucesso',
                'data' => $usuario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar usuário',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario, int $idUsuario)
    {
        try {
            $this->usuarioRepository->deleteUsuario($idUsuario);

            return response()->json([
                'message' => 'Usuário deletado com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar usuário',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
