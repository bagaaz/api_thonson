<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'comentario',
        'chamado_id',
        'usuario_id',
        'created_at'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];
}
