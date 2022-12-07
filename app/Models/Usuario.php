<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'sobrenome',
        'data_nascimento',
        'telefone',
        'cpf',
        'email',
        'foto',
    ];

    protected $hidden = [
        'senha',
        'niveis_acesso_id',
        'created_at',
        'updated_at',
        'email_verified_at',
        'remember_token',
        'deleted_at'
    ];

    public function nivelAcesso()
    {
        return $this->belongsTo(NivelAcesso::class);
    }

    public function chamados()
    {
        return $this->hasMany(Chamado::class);
    }
}
