<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chamado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'descricao',
        'os',
        'mnemonico_shift',
        'mnemonico_apoio',
        'prioridade_id',
        'status_id',
        'usuario_id',
        'imagem'
    ];
}
