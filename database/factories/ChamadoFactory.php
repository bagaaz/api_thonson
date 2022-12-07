<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chamado>
 */
class ChamadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(4),
            'descricao' => $this->faker->paragraph(),
            'os' => $this->faker->numerify('001-656##-####'),
            'mnemonico_shift' => $this->faker->lexify(),
            'mnemonico_apoio' => $this->faker->lexify(),
            'prioridade_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'status_id' => $this->faker->randomElement([1, 2, 3]),
            'usuario_id' => $this->faker->randomElement([1, 2]),
            'created_at' => $this->faker->dateTime(),
            'imagem' => $this->faker->imageUrl(640, 480, 'animals', true)
        ];
    }
}
