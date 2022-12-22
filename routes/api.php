<?php

use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = Auth::user();
    return response()->json($user, 200);
});

Route::post('/login', function (Request $request) {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();
        $token = $user->createToken('JWT');

        return response()->json(['token' => $token->plainTextToken], 200);
    }
    return response()->json('Usuário ou senha inválidos.', 401);
});

// Route::middleware('auth:sanctum')->apiResource('chamado', ChamadoController::class);

Route::middleware('auth:sanctum')->prefix('chamado')->group(function () {
    Route::get('/', [ChamadoController::class, 'index'])->name('chamado.index');
    Route::post('/store', [ChamadoController::class, 'store'])->name('chamado.store');
    Route::get('/show/{id}', [ChamadoController::class, 'show'])->where('id', '[0-9]+')->name('chamado.show');
    Route::post('/update/{id}', [ChamadoController::class, 'update'])->where('id', '[0-9]+')->name('chamado.update');
    Route::get('/destroy/{id}', [ChamadoController::class, 'destroy'])->where('id', '[0-9]+')->name('chamado.destroy');
});

Route::middleware('auth:sanctum')->prefix('usuario')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('usuario.index');
    Route::post('/store', [UserController::class, 'store'])->name('usuario.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->name('usuario.show');
    Route::post('/update/{id}', [UserController::class, 'update'])->where('id', '[0-9]+')->name('usuario.update');
    Route::get('/destroy/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+')->name('usuario.destroy');
});

Route::middleware('auth:sanctum')->prefix('comentario')->group(function () {
    Route::get('/', [ComentarioController::class, 'index'])->name('comentario.index');
    Route::get('/create', [ComentarioController::class, 'create'])->name('comentario.create');
    Route::post('/store', [ComentarioController::class, 'store'])->name('comentario.store');
    Route::get('/show/{id}', [ComentarioController::class, 'show'])->where('id', '[0-9]+')->name('comentario.show');
    Route::get('/edit/{id}', [ComentarioController::class, 'edit'])->where('id', '[0-9]+')->name('comentario.edit');
    Route::post('/update/{id}', [ComentarioController::class, 'update'])->where('id', '[0-9]+')->name('comentario.update');
    Route::get('/destroy/{id}', [ComentarioController::class, 'destroy'])->where('id', '[0-9]+')->name('comentario.destroy');
});
