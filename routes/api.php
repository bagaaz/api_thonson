<?php

use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
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
    return $request->user();
});

Route::prefix('chamado')->group(function () {
    Route::get('/', [ChamadoController::class, 'index'])->name('chamado.index');
    Route::get('/create', [ChamadoController::class, 'create'])->name('chamado.create');
    Route::post('/store', [ChamadoController::class, 'store'])->name('chamado.store');
    Route::get('/show/{id}', [ChamadoController::class, 'show'])->where('id', '[0-9]+')->name('chamado.show');
    Route::get('/edit/{id}', [ChamadoController::class, 'edit'])->where('id', '[0-9]+')->name('chamado.edit');
    Route::post('/update/{id}', [ChamadoController::class, 'update'])->where('id', '[0-9]+')->name('chamado.update');
    Route::get('/destroy/{id}', [ChamadoController::class, 'destroy'])->where('id', '[0-9]+')->name('chamado.destroy');
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('/store', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/show/{id}', [UsuarioController::class, 'show'])->where('id', '[0-9]+')->name('usuario.show');
    Route::get('/edit/{id}', [UsuarioController::class, 'edit'])->where('id', '[0-9]+')->name('usuario.edit');
    Route::post('/update/{id}', [UsuarioController::class, 'update'])->where('id', '[0-9]+')->name('usuario.update');
    Route::get('/destroy/{id}', [UsuarioController::class, 'destroy'])->where('id', '[0-9]+')->name('usuario.destroy');
});

Route::prefix('comentario')->group(function () {
    Route::get('/', [ComentarioController::class, 'index'])->name('comentario.index');
    Route::get('/create', [ComentarioController::class, 'create'])->name('comentario.create');
    Route::post('/store', [ComentarioController::class, 'store'])->name('comentario.store');
    Route::get('/show/{id}', [ComentarioController::class, 'show'])->where('id', '[0-9]+')->name('comentario.show');
    Route::get('/edit/{id}', [ComentarioController::class, 'edit'])->where('id', '[0-9]+')->name('comentario.edit');
    Route::post('/update/{id}', [ComentarioController::class, 'update'])->where('id', '[0-9]+')->name('comentario.update');
    Route::get('/destroy/{id}', [ComentarioController::class, 'destroy'])->where('id', '[0-9]+')->name('comentario.destroy');
});
