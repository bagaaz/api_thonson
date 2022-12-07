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
            'cpf' => '15015573782',
            'email' => 'gabriel.acz.br@gmail.com',
            'senha' => Hash::make('96911431'),
            'niveis_acesso_id' => 1
        ]);

        \App\Models\Usuario::factory()->create([
            'nome' => 'Admin',
            'sobrenome' => 'User',
            'cpf' => '00000000000',
            'email' => 'admin@thonson.com.br',
            'senha' => Hash::make('admin'),
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
         * Prioridades
         */

        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'baixa'
        ]);

        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'media'
        ]);

        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'alta'
        ]);

        \App\Models\Prioridade::factory()->create([
            'prioridade' => 'critica'
        ]);
    }
}
