<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'chamado_id' => $this->faker->numberBetween(1, 10),
            'usuario_id' => $this->faker->randomElement([1, 2]),
            'comentario' => $this->faker->text(250),
        ];
    }
}
