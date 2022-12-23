<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory, SoftDeletes;

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
