<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Usuário administrador
         */

        \App\Models\User::factory()->create([
            'name' => 'Gabriel Oliveira',
            'email' => 'gabriel.acz.br@gmail.com',
            'password' => Hash::make('96911431')
        ]);

        \App\Models\Usuario::factory()->create([
            'nome' => 'Gabriel',
            'sobrenome' => 'Oliveira',
            'data_nascimento' => '1998-02-05',
            'telefone' => '27998700053',
            'cpf' => '15015573782',
            'email' => 'gabriel.acz.br@gmail.com',
            'senha' => Hash::make('96911431'),
            'foto' => 'https://avatars.githubusercontent.com/u/1?v=4',
            'niveis_acesso_id' => 1
        ]);

        \App\Models\Usuario::factory()->create([
            'nome' => 'Admin',
            'sobrenome' => 'User',
            'data_nascimento' => '1990-01-01',
            'telefone' => '27900000000',
            'cpf' => '00000000000',
            'email' => 'admin@thonson.com.br',
            'senha' => Hash::make('admin'),
            'foto' => 'https://avatars.githubusercontent.com/u/3?v=4',
            'niveis_acesso_id' => 1,
        ]);

        /*
         * Niveis de acesso
         */

        \App\Models\NivelDeAcesso::factory()->create([
            'nivel_de_acesso' => 'administrador'
        ]);

        \App\Models\NivelDeAcesso::factory()->create([
            'nivel_de_acesso' => 'suporte'
        ]);

        \App\Models\NivelDeAcesso::factory()->create([
            'nivel_de_acesso' => 'usuario'
        ]);

        /*
         * Prioridades Chamados
         */

        \App\Models\PrioridadesChamado::factory()->create([
            'prioridade' => 'baixa'
        ]);

        \App\Models\PrioridadesChamado::factory()->create([
            'prioridade' => 'media'
        ]);

        \App\Models\PrioridadesChamado::factory()->create([
            'prioridade' => 'alta'
        ]);

        \App\Models\PrioridadesChamado::factory()->create([
            'prioridade' => 'critica'
        ]);

        /*
         * Status Chamados
         */

        \App\Models\StatusChamado::factory()->create([
            'status_chamado' => 'aberto'
        ]);

        \App\Models\StatusChamado::factory()->create([
            'status_chamado' => 'em andamento'
        ]);

        \App\Models\StatusChamado::factory()->create([
            'status_chamado' => 'fechado'
        ]);
    }
}
